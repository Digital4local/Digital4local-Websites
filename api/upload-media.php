<?php
/**
 * Digital4Local - Media & Image Uploader API Handler
 * Hardened with Admin Session Authentication, CSRF Validation, Real MIME Type Verification,
 * SVG XML Sanitization (Anti-Stored XSS / Anti-XXE), and Upload Directory Execution Lockdown.
 */
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../includes/auth-middleware.php';

$upload_dir = __DIR__ . '/../assets/images/uploads/';
if (!file_exists($upload_dir)) {
    @mkdir($upload_dir, 0755, true);
}

// 1. Mandatory Session Authentication
if (!is_admin_logged_in()) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized. Admin authentication required to upload media.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method. Only POST is accepted.']);
    exit;
}

// 2. CSRF Token Verification
$csrf_header = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
$csrf_param = $_POST['csrf_token'] ?? '';
$token_to_verify = !empty($csrf_header) ? $csrf_header : $csrf_param;

if (!verify_csrf_token($token_to_verify)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'CSRF validation failed. Please reload your admin panel and try again.']);
    exit;
}

// Ensure .htaccess protection in upload directory
$upload_htaccess = $upload_dir . '.htaccess';
if (!file_exists($upload_htaccess)) {
    $htaccess_security = "# Prevent execution of any scripts in upload directory\n" .
                         "<FilesMatch \"\.(php|phtml|php3|php4|php5|php7|phps|phar|cgi|pl|py|sh|exe|bat|cmd)$\">\n" .
                         "    Order Deny,Allow\n" .
                         "    Deny from all\n" .
                         "</FilesMatch>\n" .
                         "Options -ExecCGI -Indexes\n" .
                         "php_flag engine off\n";
    @file_put_contents($upload_htaccess, $htaccess_security);
}

$allowed_extensions = [
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'png' => 'image/png',
    'webp' => 'image/webp',
    'gif' => 'image/gif',
    'svg' => 'image/svg+xml',
    'ico' => ['image/x-icon', 'image/vnd.microsoft.icon', 'image/ico']
];

/**
 * Sanitize SVG content to prevent Stored XSS and XML Entity Injection (XXE)
 */
function sanitize_svg_content($content) {
    // Check for dangerous XXE declarations
    if (stripos($content, '<!ENTITY') !== false || stripos($content, 'SYSTEM') !== false) {
        return false;
    }
    // Remove script tags and embedded event handlers
    $content = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $content);
    $content = preg_replace('#<foreignObject(.*?)>(.*?)</foreignObject>#is', '', $content);
    $content = preg_replace('#<iframe(.*?)>(.*?)</iframe>#is', '', $content);
    $content = preg_replace('#\son\w+\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]+)#i', '', $content);
    $content = preg_replace('#href\s*=\s*["\']javascript:[^"\']*["\']#i', '', $content);
    $content = preg_replace('#xlink:href\s*=\s*["\']javascript:[^"\']*["\']#i', '', $content);
    return $content;
}

$uploaded_content = null;
$detected_ext = '';
$original_name = '';

// Check Multipart Upload
if (isset($_FILES['media_file']) && $_FILES['media_file']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['media_file'];
    $file_size = $file['size'];
    $original_name = basename($file['name']);

    if ($file_size > 5 * 1024 * 1024) {
        http_response_code(413);
        echo json_encode(['success' => false, 'message' => 'File size exceeds maximum allowed limit of 5MB.']);
        exit;
    }

    $ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
    if (!array_key_exists($ext, $allowed_extensions)) {
        http_response_code(415);
        echo json_encode(['success' => false, 'message' => 'Invalid file extension. Allowed formats: JPG, PNG, WEBP, GIF, SVG, ICO.']);
        exit;
    }

    $uploaded_content = @file_get_contents($file['tmp_name']);
    $detected_ext = $ext;
} else {
    // Check Base64 Payload
    $raw = @file_get_contents('php://input');
    $json = @json_decode($raw, true);

    if (isset($json['base64_data']) && !empty($json['base64_data'])) {
        $base64_string = $json['base64_data'];
        $ext = 'png';
        if (preg_match('/^data:image\/(\w+);base64,/', $base64_string, $type)) {
            $base64_string = substr($base64_string, strpos($base64_string, ',') + 1);
            $ext = strtolower($type[1]);
            if ($ext === 'jpeg') $ext = 'jpg';
        }
        
        if (!array_key_exists($ext, $allowed_extensions)) {
            http_response_code(415);
            echo json_encode(['success' => false, 'message' => 'Unsupported image format.']);
            exit;
        }

        $decoded = @base64_decode($base64_string);
        if ($decoded !== false && strlen($decoded) <= 5 * 1024 * 1024) {
            $uploaded_content = $decoded;
            $detected_ext = $ext;
            $original_name = 'upload_' . $ext;
        }
    }
}

if ($uploaded_content === null || empty($detected_ext)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'No valid media file provided or upload error occurred.']);
    exit;
}

// 3. Deep MIME Type Verification
if ($detected_ext !== 'svg') {
    if (function_exists('finfo_open')) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $real_mime = finfo_buffer($finfo, $uploaded_content);
        finfo_close($finfo);

        $expected_mime = $allowed_extensions[$detected_ext];
        $is_valid_mime = false;
        if (is_array($expected_mime)) {
            $is_valid_mime = in_array($real_mime, $expected_mime);
        } else {
            $is_valid_mime = ($real_mime === $expected_mime);
        }

        if (!$is_valid_mime && $detected_ext !== 'ico') {
            http_response_code(415);
            echo json_encode(['success' => false, 'message' => "MIME type mismatch ({$real_mime}). Upload aborted for security."]);
            exit;
        }
    }
} else {
    // Sanitize SVG XML
    $sanitized_svg = sanitize_svg_content($uploaded_content);
    if ($sanitized_svg === false) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'SVG file contains unsafe scripts or entities.']);
        exit;
    }
    $uploaded_content = $sanitized_svg;
}

// 4. Generate Safe Filename
$clean_basename = preg_replace('/[^a-zA-Z0-9_-]/', '', pathinfo($original_name, PATHINFO_FILENAME));
$clean_basename = substr($clean_basename ?: 'media', 0, 25);
$unique_filename = 'upload_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $detected_ext;
$target_file = $upload_dir . $unique_filename;

if (@file_put_contents($target_file, $uploaded_content, LOCK_EX) !== false) {
    @chmod($target_file, 0644);
    $relative_url = 'assets/images/uploads/' . $unique_filename;
    echo json_encode([
        'success' => true,
        'message' => 'Image uploaded and sanitized successfully!',
        'url' => $relative_url,
        'filename' => $unique_filename,
        'size_kb' => round(strlen($uploaded_content) / 1024, 1)
    ]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to write uploaded file to disk.']);
}
