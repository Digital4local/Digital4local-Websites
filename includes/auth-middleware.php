<?php
/**
 * Digital4Local - Enterprise Admin Authentication & Security Middleware
 * Handles session hardening, bcrypt verification, CSRF token management, 
 * brute-force lockout, IP rate limiting, and access control.
 */

if (!function_exists('start_admin_session')) {
    function start_admin_session() {
        if (session_status() === PHP_SESSION_NONE) {
            if (!headers_sent()) {
                $is_https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || 
                            (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
                            (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443);

                @ini_set('session.cookie_httponly', 1);
                @ini_set('session.use_only_cookies', 1);
                @ini_set('session.cookie_samesite', 'Strict');
                if ($is_https) {
                    @ini_set('session.cookie_secure', 1);
                }
            }
            @session_start();
        }
    }
}

/**
 * Get sanitized client IP address
 */
if (!function_exists('get_client_ip')) {
    function get_client_ip() {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $parts = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = trim($parts[0]);
        }
        $filtered = filter_var($ip, FILTER_VALIDATE_IP);
        return $filtered ? $filtered : '127.0.0.1';
    }
}

/**
 * CSRF Token Management
 */
if (!function_exists('get_csrf_token')) {
    function get_csrf_token() {
        start_admin_session();
        if (empty($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
}

if (!function_exists('verify_csrf_token')) {
    function verify_csrf_token($token) {
        start_admin_session();
        if (empty($_SESSION['csrf_token']) || empty($token)) {
            return false;
        }
        return hash_equals($_SESSION['csrf_token'], (string)$token);
    }
}

/**
 * Check if current user has an active, valid admin session
 */
if (!function_exists('is_admin_logged_in')) {
    function is_admin_logged_in() {
        start_admin_session();
        if (!empty($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
            $login_time = $_SESSION['admin_login_time'] ?? 0;
            $max_lifetime = 180 * 60; // 180 minutes default
            
            if (time() - $login_time > $max_lifetime) {
                admin_logout();
                return false;
            }

            // Anti-hijacking user-agent check
            $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
            if (isset($_SESSION['admin_ua_hash']) && !hash_equals($_SESSION['admin_ua_hash'], md5($ua))) {
                admin_logout();
                return false;
            }

            return true;
        }
        return false;
    }
}

/**
 * Get the currently authenticated admin user details
 */
if (!function_exists('get_logged_in_admin')) {
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
}

/**
 * Sanitize and validate internal redirect URLs (Prevents Open Redirects)
 */
if (!function_exists('safe_redirect_url')) {
    function safe_redirect_url($target, $default = 'admin.php') {
        if (empty($target) || !is_string($target)) {
            return $default;
        }
        $target = trim($target);
        // Disallow external URLs, protocol relative URLs (//), javascript:, and CRLF
        if (preg_match('#^https?://#i', $target) || 
            strpos($target, '//') === 0 || 
            strpos($target, '\\') !== false ||
            preg_match('/[\r\n\t]/', $target) ||
            strpos($target, 'javascript:') !== false ||
            strpos($target, 'data:') !== false ||
            strpos($target, 'admin-login') !== false) {
            return $default;
        }
        // Allow safe internal script paths like admin.php, admin-cms.php, etc.
        $clean = ltrim($target, '/');
        if (preg_match('/^[a-zA-Z0-9_\-\.\/\?&=]+$/', $clean)) {
            return $clean;
        }
        return $default;
    }
}

/**
 * Protect page - Redirect to admin-login.php if not authenticated
 */
if (!function_exists('require_admin_login')) {
    function require_admin_login($redirect_target = null) {
        if (!is_admin_logged_in()) {
            $current_url = $redirect_target ?: ($_SERVER['REQUEST_URI'] ?? 'admin.php');
            $safe_url = safe_redirect_url($current_url, 'admin.php');
            header("Location: admin-login.php?redirect=" . urlencode($safe_url));
            exit;
        }
    }
}

/**
 * Rate Limiting and Brute Force Defense Store
 */
if (!function_exists('_get_rate_limit_file')) {
    function _get_rate_limit_file() {
        return __DIR__ . '/../config/security_lockouts.json';
    }
}

if (!function_exists('check_login_bruteforce')) {
    function check_login_bruteforce($ip, $identifier) {
        $file = _get_rate_limit_file();
        if (!file_exists($file)) {
            return ['allowed' => true, 'remaining_seconds' => 0];
        }
        $content = @file_get_contents($file);
        $data = $content ? @json_decode($content, true) : [];
        if (!is_array($data)) $data = [];

        $key = md5(strtolower(trim($identifier)) . '_' . $ip);
        $record = $data[$key] ?? null;

        if ($record && isset($record['attempts'], $record['last_attempt'])) {
            $window = 15 * 60; // 15-minute lock window
            $elapsed = time() - $record['last_attempt'];
            if ($elapsed < $window && $record['attempts'] >= 5) {
                return [
                    'allowed' => false,
                    'remaining_seconds' => $window - $elapsed,
                    'attempts' => $record['attempts']
                ];
            }
        }
        return ['allowed' => true, 'remaining_seconds' => 0];
    }
}

if (!function_exists('record_failed_login_attempt')) {
    function record_failed_login_attempt($ip, $identifier) {
        $file = _get_rate_limit_file();
        $data = [];
        if (file_exists($file)) {
            $content = @file_get_contents($file);
            $data = $content ? @json_decode($content, true) : [];
            if (!is_array($data)) $data = [];
        }

        // Clean up entries older than 2 hours
        $now = time();
        foreach ($data as $k => $item) {
            if (isset($item['last_attempt']) && ($now - $item['last_attempt'] > 7200)) {
                unset($data[$k]);
            }
        }

        $key = md5(strtolower(trim($identifier)) . '_' . $ip);
        $current_attempts = isset($data[$key]['attempts']) ? (int)$data[$key]['attempts'] : 0;
        
        $data[$key] = [
            'attempts' => $current_attempts + 1,
            'last_attempt' => $now,
            'ip' => $ip,
            'identifier' => substr($identifier, 0, 50)
        ];

        @file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}

if (!function_exists('clear_login_lockout')) {
    function clear_login_lockout($ip, $identifier) {
        $file = _get_rate_limit_file();
        if (!file_exists($file)) return;
        $content = @file_get_contents($file);
        $data = $content ? @json_decode($content, true) : [];
        if (!is_array($data)) return;

        $key = md5(strtolower(trim($identifier)) . '_' . $ip);
        if (isset($data[$key])) {
            unset($data[$key]);
            @file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        }
    }
}

/**
 * Inbound Leads Rate Limiting (Anti-Spam Bot Flooding)
 */
if (!function_exists('check_lead_submission_rate_limit')) {
    function check_lead_submission_rate_limit($ip, $max_submissions = 5, $window_seconds = 600) {
        $file = _get_rate_limit_file();
        $data = [];
        if (file_exists($file)) {
            $content = @file_get_contents($file);
            $data = $content ? @json_decode($content, true) : [];
            if (!is_array($data)) $data = [];
        }

        $now = time();
        $key = 'lead_' . md5($ip);
        $lead_data = $data[$key] ?? ['count' => 0, 'first_time' => $now];

        if ($now - $lead_data['first_time'] > $window_seconds) {
            $lead_data = ['count' => 1, 'first_time' => $now];
        } else {
            $lead_data['count'] = ($lead_data['count'] ?? 0) + 1;
            if ($lead_data['count'] > $max_submissions) {
                return false; // Rate limit exceeded
            }
        }

        $data[$key] = $lead_data;
        @file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        return true;
    }
}

/**
 * Authenticate credentials against config/admin_auth.json with Brute-Force lockout
 */
if (!function_exists('authenticate_admin')) {
    function authenticate_admin($identifier, $password) {
        $identifier = trim($identifier);
        $password = trim($password);
        $client_ip = get_client_ip();
        
        if (empty($identifier) || empty($password)) {
            return ['success' => false, 'message' => 'Please provide both username/email and password.'];
        }

        // Check Brute-Force Lockout
        $lock_status = check_login_bruteforce($client_ip, $identifier);
        if (!$lock_status['allowed']) {
            $mins = ceil($lock_status['remaining_seconds'] / 60);
            return [
                'success' => false, 
                'message' => "Too many failed login attempts. Account temporarily locked for {$mins} minute(s) for security."
            ];
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
        
        if (!$matched_user || !password_verify($password, $matched_user['password_hash'])) {
            record_failed_login_attempt($client_ip, $identifier);
            return ['success' => false, 'message' => 'Invalid credentials. Please verify username and password.'];
        }
        
        // Success: Clear failed attempts
        clear_login_lockout($client_ip, $identifier);

        // Start session and store auth state
        start_admin_session();
        session_regenerate_id(true);
        
        $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user_id'] = $matched_user['id'];
        $_SESSION['admin_username'] = $matched_user['username'];
        $_SESSION['admin_name'] = $matched_user['name'];
        $_SESSION['admin_email'] = $matched_user['email'];
        $_SESSION['admin_role'] = $matched_user['role'];
        $_SESSION['admin_login_time'] = time();
        $_SESSION['admin_ua_hash'] = md5($ua);
        $_SESSION['admin_ip'] = $client_ip;
        
        // Ensure CSRF token is refreshed
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        return [
            'success' => true,
            'user' => $matched_user
        ];
    }
}

/**
 * Logout and clear session
 */
if (!function_exists('admin_logout')) {
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
}
