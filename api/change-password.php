<?php
/**
 * Digital4Local - Admin Change Password API
 * Securely hashes and updates user password in config/admin_auth.json
 * Enforces session authentication, CSRF validation, mandatory current-password check,
 * and password complexity rules.
 */
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../includes/auth-middleware.php';

$auth_file = __DIR__ . '/../config/admin_auth.json';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Only POST requests are allowed.']);
    exit;
}

// 1. Mandatory Session Authentication
if (!is_admin_logged_in()) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized. You must be signed in as an administrator to change credentials.']);
    exit;
}

$current_admin = get_logged_in_admin();
if (!$current_admin) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Session expired. Please sign in again.']);
    exit;
}

$raw_input = @file_get_contents('php://input');
$data = @json_decode($raw_input, true);
if (!$data && !empty($_POST)) {
    $data = $_POST;
}

// 2. CSRF Token Verification
$csrf_header = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
$csrf_param = $data['csrf_token'] ?? '';
$token_to_verify = !empty($csrf_header) ? $csrf_header : $csrf_param;

if (!verify_csrf_token($token_to_verify)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'CSRF validation failed. Please refresh your dashboard and try again.']);
    exit;
}

$current_password = $data['current_password'] ?? '';
$new_password = trim((string)($data['new_password'] ?? ''));
$confirm_password = trim((string)($data['confirm_password'] ?? ''));

// 3. Mandatory Current Password
if (empty($current_password)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Current password is required to confirm identity.']);
    exit;
}

// 4. Validate New Password Complexity
if (strlen($new_password) < 8) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'New password must be at least 8 characters long.']);
    exit;
}

if (!preg_match('/[A-Za-z]/', $new_password) || !preg_match('/[0-9\W]/', $new_password)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'New password must contain both letters and at least one number or symbol.']);
    exit;
}

if (!empty($confirm_password) && $new_password !== $confirm_password) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'New password and confirmation do not match.']);
    exit;
}

if (!file_exists($auth_file)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Authentication database not found.']);
    exit;
}

$auth_json = @file_get_contents($auth_file);
$auth_data = @json_decode($auth_json, true);

if (!$auth_data || !isset($auth_data['users']) || !is_array($auth_data['users'])) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Corrupt authentication record.']);
    exit;
}

// 5. Locate Logged In User
$user_index = -1;
foreach ($auth_data['users'] as $idx => $u) {
    if (($u['id'] ?? '') === $current_admin['id'] || ($u['username'] ?? '') === $current_admin['username']) {
        $user_index = $idx;
        break;
    }
}

if ($user_index === -1) {
    // Fallback to first matching user
    $user_index = 0;
}

// 6. Verify Current Password Hash
if (!password_verify($current_password, $auth_data['users'][$user_index]['password_hash'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'The current password you entered is incorrect.']);
    exit;
}

// 7. Hash New Password with Bcrypt
$new_hash = password_hash($new_password, PASSWORD_BCRYPT);
$auth_data['users'][$user_index]['password_hash'] = $new_hash;
$auth_data['users'][$user_index]['password_updated_at'] = date('Y-m-d H:i:s');

// Also update secondary user alias if it's master admin
if (count($auth_data['users']) > 1 && $user_index === 0) {
    $auth_data['users'][1]['password_hash'] = $new_hash;
    $auth_data['users'][1]['password_updated_at'] = date('Y-m-d H:i:s');
}

$saved = @file_put_contents(
    $auth_file, 
    json_encode($auth_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
    LOCK_EX
);

if ($saved !== false) {
    echo json_encode([
        'success' => true,
        'message' => 'Password updated successfully! All future sessions will require the new credentials.',
        'user' => $auth_data['users'][$user_index]['email']
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Failed to save updated password to config/admin_auth.json.'
    ]);
}
