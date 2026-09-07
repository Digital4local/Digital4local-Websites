<?php
/**
 * Digital4Local - Admin Authentication Middleware
 * Handles session security, login validation, bcrypt verification, and access protection.
 */

function start_admin_session() {
    if (session_status() === PHP_SESSION_NONE) {
        // Secure session parameters
        ini_set('session.cookie_httponly', 1);
        ini_set('session.use_only_cookies', 1);
        session_start();
    }
}

/**
 * Check if the current user has an active, valid admin session
 */
function is_admin_logged_in() {
    start_admin_session();
    if (!empty($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
        // Check session expiry
        $login_time = $_SESSION['admin_login_time'] ?? 0;
        $max_lifetime = 180 * 60; // 180 minutes default
        
        if (time() - $login_time > $max_lifetime) {
            admin_logout();
            return false;
        }
        return true;
    }
    return false;
}

/**
 * Get the currently authenticated admin user details
 */
function get_logged_in_admin() {
    if (!is_admin_logged_in()) {
        return null;
    }
    return [
        'id' => $_SESSION['admin_user_id'] ?? 'USR-001',
        'username' => $_SESSION['admin_username'] ?? 'admin',
        'name' => $_SESSION['admin_name'] ?? 'Abhishek Raikwar',
        'email' => $_SESSION['admin_email'] ?? 'admin@digital4local.com',
        'role' => $_SESSION['admin_role'] ?? 'Super Admin',
        'login_time' => $_SESSION['admin_login_time'] ?? time()
    ];
}

/**
 * Protect page - Redirect to admin-login.php if not authenticated
 */
function require_admin_login($redirect_target = null) {
    if (!is_admin_logged_in()) {
        $current_url = $redirect_target ?: $_SERVER['REQUEST_URI'] ?? 'admin.php';
        header("Location: admin-login.php?redirect=" . urlencode($current_url));
        exit;
    }
}

/**
 * Authenticate credentials against config/admin_auth.json
 */
function authenticate_admin($identifier, $password) {
    $identifier = trim($identifier);
    $password = trim($password);
    
    if (empty($identifier) || empty($password)) {
        return ['success' => false, 'message' => 'Please provide both username/email and password.'];
    }
    
    $auth_file = __DIR__ . '/../config/admin_auth.json';
    if (!file_exists($auth_file)) {
        return ['success' => false, 'message' => 'Authentication system configuration missing.'];
    }
    
    $auth_json = @file_get_contents($auth_file);
    $auth_data = @json_decode($auth_json, true);
    
    if (!$auth_data || !isset($auth_data['users']) || !is_array($auth_data['users'])) {
        return ['success' => false, 'message' => 'Corrupt authentication record.'];
    }
    
    $matched_user = null;
    foreach ($auth_data['users'] as $user) {
        if (strcasecmp($user['username'], $identifier) === 0 || strcasecmp($user['email'], $identifier) === 0) {
            $matched_user = $user;
            break;
        }
    }
    
    if (!$matched_user) {
        return ['success' => false, 'message' => 'Invalid username or password.'];
    }
    
    // Verify password hash
    if (!password_verify($password, $matched_user['password_hash'])) {
        return ['success' => false, 'message' => 'Invalid username or password.'];
    }
    
    // Start session and store auth state
    start_admin_session();
    session_regenerate_id(true);
    
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_user_id'] = $matched_user['id'];
    $_SESSION['admin_username'] = $matched_user['username'];
    $_SESSION['admin_name'] = $matched_user['name'];
    $_SESSION['admin_email'] = $matched_user['email'];
    $_SESSION['admin_role'] = $matched_user['role'];
    $_SESSION['admin_login_time'] = time();
    
    return [
        'success' => true,
        'user' => $matched_user
    ];
}

/**
 * Logout and clear session
 */
function admin_logout() {
    start_admin_session();
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
}
