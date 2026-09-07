<?php
/**
 * Digital4Local - Media & Image Uploader API Handler
 * Handles file uploads from Admin CMS and saves to assets/images/uploads/
 */
header('Content-Type: application/json');

$upload_dir = __DIR__ . '/../assets/images/uploads/';
if (!file_exists($upload_dir)) {
    @mkdir($upload_dir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method. Only POST is accepted.']);
    exit;
}

// Check if file is uploaded
if (!isset($_FILES['media_file']) || $_FILES['media_file']['error'] !== UPLOAD_ERR_OK) {
    // Check if JSON request with base64 image data
    $raw = file_get_contents('php://input');
    $json = json_decode($raw, true);
    if (isset($json['base64_data']) && !empty($json['base64_data'])) {
        $base64_string = $json['base64_data'];
        $extension = 'png';
        if (preg_match('/^data:image\/(\w+);base64,/', $base64_string, $type)) {
            $base64_string = substr($base64_string, strpos($base64_string, ',') + 1);
            $extension = strtolower($type[1]);
            if ($extension === 'jpeg') $extension = 'jpg';
        }
        $data = base64_decode($base64_string);
        if ($data !== false) {
            $filename = 'upload_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $extension;
            $filepath = $upload_dir . $filename;
            if (file_put_contents($filepath, $data) !== false) {
                $relative_url = 'assets/images/uploads/' . $filename;
                echo json_encode([
                    'success' => true,
                    'message' => 'Image uploaded successfully!',
                    'url' => $relative_url,
                    'filename' => $filename
                ]);
                exit;
            }
        }
    }

    $error_msg = 'No file uploaded or upload error occurred.';
    if (isset($_FILES['media_file']['error'])) {
        $error_code = $_FILES['media_file']['error'];
        $upload_errors = [
            UPLOAD_ERR_INI_SIZE   => 'File exceeds upload_max_filesize limit.',
            UPLOAD_ERR_FORM_SIZE  => 'File exceeds MAX_FILE_SIZE directive.',
            UPLOAD_ERR_PARTIAL    => 'File was only partially uploaded.',
            UPLOAD_ERR_NO_FILE    => 'No file was uploaded.',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder.',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
            UPLOAD_ERR_EXTENSION  => 'A PHP extension stopped the file upload.'
        ];
        $error_msg = $upload_errors[$error_code] ?? $error_msg;
    }
    echo json_encode(['success' => false, 'message' => $error_msg]);
    exit;
}

$file = $_FILES['media_file'];
$file_tmp = $file['tmp_name'];
$file_name = basename($file['name']);
$file_size = $file['size'];

// Max size: 10MB
if ($file_size > 10 * 1024 * 1024) {
    echo json_encode(['success' => false, 'message' => 'File size exceeds maximum limit of 10MB.']);
    exit;
}

// Validate file extension and MIME type
$allowed_extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg', 'ico'];
$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

if (!in_array($ext, $allowed_extensions)) {
    echo json_encode(['success' => false, 'message' => 'Invalid file format. Allowed formats: JPG, PNG, WEBP, GIF, SVG, ICO.']);
    exit;
}

// Generate unique clean file name
$clean_name = preg_replace('/[^a-zA-Z0-9_\-]/', '', pathinfo($file_name, PATHINFO_FILENAME));
$clean_name = substr($clean_name, 0, 30);
$unique_filename = $clean_name . '_' . date('Ymd_His') . '_' . bin2hex(random_bytes(3)) . '.' . $ext;
$target_file = $upload_dir . $unique_filename;

if (move_uploaded_file($file_tmp, $target_file)) {
    $relative_url = 'assets/images/uploads/' . $unique_filename;
    echo json_encode([
        'success' => true,
        'message' => 'Image uploaded successfully!',
        'url' => $relative_url,
        'filename' => $unique_filename,
        'size_kb' => round($file_size / 1024, 1)
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to move uploaded file to uploads directory.']);
}
