<?php
/**
 * Digital4Local - Admin Change Password API
 * Securely hashes and updates user password in config/admin_auth.json
 */
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../includes/auth-middleware.php';

$auth_file = __DIR__ . '/../config/admin_auth.json';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Only POST requests are allowed.']);
    exit;
}

$raw_input = file_get_contents('php://input');
$data = json_decode($raw_input, true);
if (!$data && !empty($_POST)) {
    $data = $_POST;
}

$current_password = $data['current_password'] ?? '';
$new_password = trim($data['new_password'] ?? '');
$confirm_password = trim($data['confirm_password'] ?? '');
$target_user_id = $data['user_id'] ?? null;

// Validate password requirements
if (strlen($new_password) < 6) {
    echo json_encode(['success' => false, 'message' => 'New password must be at least 6 characters long.']);
    exit;
}

if (!empty($confirm_password) && $new_password !== $confirm_password) {
    echo json_encode(['success' => false, 'message' => 'New password and confirmation do not match.']);
    exit;
}

if (!file_exists($auth_file)) {
    echo json_encode(['success' => false, 'message' => 'Authentication database not found.']);
    exit;
}

$auth_json = @file_get_contents($auth_file);
$auth_data = @json_decode($auth_json, true);

if (!$auth_data || !isset($auth_data['users']) || !is_array($auth_data['users'])) {
    echo json_encode(['success' => false, 'message' => 'Corrupt authentication record.']);
    exit;
}

// Find user
$user_index = -1;
if ($target_user_id) {
    foreach ($auth_data['users'] as $idx => $u) {
        if ($u['id'] === $target_user_id || $u['username'] === $target_user_id || $u['email'] === $target_user_id) {
            $user_index = $idx;
            break;
        }
    }
}

// Default to first admin user if logged in or not specified
if ($user_index === -1) {
    $current_admin = get_logged_in_admin();
    if ($current_admin) {
        foreach ($auth_data['users'] as $idx => $u) {
            if ($u['id'] === $current_admin['id']) {
                $user_index = $idx;
                break;
            }
        }
    }
}

if ($user_index === -1) {
    $user_index = 0; // fallback to master admin
}

// Optional check of current password if provided
if (!empty($current_password)) {
    if (!password_verify($current_password, $auth_data['users'][$user_index]['password_hash'])) {
        echo json_encode(['success' => false, 'message' => 'Current password entered is incorrect.']);
        exit;
    }
}

// Hash new password with Bcrypt
$new_hash = password_hash($new_password, PASSWORD_BCRYPT);
$auth_data['users'][$user_index]['password_hash'] = $new_hash;
$auth_data['users'][$user_index]['password_updated_at'] = date('Y-m-d H:i:s');

// Also update secondary user alias if it's the master user
if (count($auth_data['users']) > 1 && $user_index === 0) {
    $auth_data['users'][1]['password_hash'] = $new_hash;
}

$saved = @file_put_contents($auth_file, json_encode($auth_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

if ($saved !== false) {
    echo json_encode([
        'success' => true,
        'message' => 'Password updated successfully! You can now log in with your new password.',
        'user' => $auth_data['users'][$user_index]['email']
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to write updated password to config/admin_auth.json.'
    ]);
}
