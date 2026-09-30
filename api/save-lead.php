<?php
/**
 * Digital4Local - Lead Capture & Autonomous CRM Dispatch API
 * Hardened with Multi-layer Anti-Bot Honeypots, Submission Velocity Detection,
 * IP Rate Limiting, Input Sanitization, and Email Injection Shielding.
 */
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../includes/auth-middleware.php';

$leads_file = __DIR__ . '/../config/leads.json';
$target_notification_email = 'info@digital4local.com';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method. Only POST is accepted.']);
    exit;
}

$client_ip = get_client_ip();

// 1. IP Rate Limiting (Max 5 submissions per 10 minutes)
if (!check_lead_submission_rate_limit($client_ip, 5, 600)) {
    http_response_code(429);
    echo json_encode([
        'success' => false,
        'message' => 'Too many submissions received from your network. Please wait a few minutes before submitting again.'
    ]);
    exit;
}

// 2. Read incoming payload
$raw_input = @file_get_contents('php://input');
$data = @json_decode($raw_input, true);

if (!$data && !empty($_POST)) {
    $data = $_POST;
}

if (empty($data) || !is_array($data)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'No valid lead payload provided.']);
    exit;
}

// 3. Bot Protection Layer A: Honeypot Detection
// If any hidden honeypot field is filled, silently discard without saving spam
$honeypot_fields = ['_hp_company_sec', '_hp_check', 'website_url_val', 'confirm_email_field'];
foreach ($honeypot_fields as $hp) {
    if (!empty($data[$hp])) {
        // Silently simulate success to prevent bots from adapting
        echo json_encode([
            'success' => true,
            'message' => 'Strategy session requested successfully! A senior growth engineer will contact you shortly.',
            'lead_id' => 'LEAD-' . date('Ymd-His') . '-OK'
        ]);
        exit;
    }
}

// 4. Bot Protection Layer B: Submission Speed Check (if timestamp passed)
if (isset($data['form_ts']) && is_numeric($data['form_ts'])) {
    $submit_time = (int)$data['form_ts'];
    $now = time();
    $elapsed = $now - $submit_time;
    // Submissions faster than 1.5 seconds from form load are automated bots
    if ($elapsed < 1 || $submit_time > $now) {
        echo json_encode([
            'success' => true,
            'message' => 'Strategy session requested successfully! A senior growth engineer will contact you shortly.',
            'lead_id' => 'LEAD-' . date('Ymd-His') . '-OK'
        ]);
        exit;
    }
}

// 5. Strict Input Validation and Sanitization
$raw_name = trim((string)($data['name'] ?? ''));
$raw_email = trim((string)($data['email'] ?? ''));
$raw_phone = trim((string)($data['phone'] ?? ''));
$raw_company = trim((string)($data['company'] ?? ''));
$raw_website = trim((string)($data['website'] ?? ''));
$raw_industry = trim((string)($data['industry'] ?? 'General'));
$raw_message = trim((string)($data['message'] ?? ''));
$raw_source = trim((string)($data['source'] ?? 'Website Form'));

// Strip all tags and normalize lengths
$clean_name = substr(strip_tags($raw_name), 0, 100);
$clean_email = substr(filter_var($raw_email, FILTER_SANITIZE_EMAIL), 0, 120);
$clean_phone = substr(preg_replace('/[^0-9+\-\s\(\)\.]/', '', $raw_phone), 0, 35);
$clean_company = substr(strip_tags($raw_company), 0, 150);
$clean_website = substr(filter_var($raw_website, FILTER_SANITIZE_URL), 0, 250);
$clean_industry = substr(strip_tags($raw_industry), 0, 100);
$clean_message = substr(strip_tags($raw_message), 0, 3000);
$clean_source = substr(strip_tags($raw_source), 0, 100);

// Validate Email
if (empty($clean_email) || !filter_var($clean_email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'A valid work email address is required.']);
    exit;
}

// Validate Name
if (empty($clean_name)) {
    $clean_name = 'Anonymous Partner';
}

$lead = [
    'id' => 'LEAD-' . date('Ymd-His') . '-' . bin2hex(random_bytes(3)),
    'name' => htmlspecialchars($clean_name, ENT_QUOTES, 'UTF-8'),
    'email' => htmlspecialchars($clean_email, ENT_QUOTES, 'UTF-8'),
    'phone' => htmlspecialchars($clean_phone, ENT_QUOTES, 'UTF-8'),
    'company' => htmlspecialchars($clean_company, ENT_QUOTES, 'UTF-8'),
    'website' => htmlspecialchars($clean_website, ENT_QUOTES, 'UTF-8'),
    'industry' => htmlspecialchars($clean_industry, ENT_QUOTES, 'UTF-8'),
    'message' => htmlspecialchars($clean_message, ENT_QUOTES, 'UTF-8'),
    'ip_address' => $client_ip,
    'date' => date('Y-m-d H:i:s'),
    'status' => 'New',
    'source' => htmlspecialchars($clean_source, ENT_QUOTES, 'UTF-8')
];

// 6. Thread-Safe Lead Recording
$leads = [];
if (file_exists($leads_file)) {
    $json = @file_get_contents($leads_file);
    if ($json) {
        $leads = @json_decode($json, true) ?: [];
    }
}

array_unshift($leads, $lead);

// Retain max 500 recent leads
if (count($leads) > 500) {
    $leads = array_slice($leads, 0, 500);
}

$saved = @file_put_contents(
    $leads_file, 
    json_encode($leads, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
    LOCK_EX
);

// 7. Security Hardened Email Dispatch (Anti-Header Injection)
$safe_email_address = str_replace(["\r", "\n", "%0a", "%0d"], '', $clean_email);
$safe_company = str_replace(["\r", "\n"], '', $clean_company);
$safe_name = str_replace(["\r", "\n"], '', $clean_name);
$safe_source = str_replace(["\r", "\n"], '', $clean_source);

$email_subject = "🔥 [New Inbound Lead] " . ($safe_company ? $safe_company . " - " : "") . $safe_name . " (" . $safe_source . ")";
$email_subject = str_replace(["\r", "\n"], '', $email_subject);

$email_body = "
<html>
<head>
  <style>
    body { font-family: Arial, sans-serif; background-color: #f8fafc; color: #14151a; padding: 20px; }
    .card { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; max-width: 600px; margin: 0 auto; }
    .header { border-bottom: 2px solid #1B5FAA; padding-bottom: 12px; margin-bottom: 16px; }
    .badge { background: #1B5FAA; color: #ffffff; padding: 4px 10px; border-radius: 6px; font-size: 11px; font-weight: bold; }
    .field { margin-bottom: 12px; font-size: 14px; }
    .field strong { color: #14151a; display: inline-block; width: 140px; }
    .footer { font-size: 12px; color: #64748b; margin-top: 20px; border-top: 1px solid #e2e8f0; padding-top: 12px; }
  </style>
</head>
<body>
  <div class='card'>
    <div class='header'>
      <span class='badge'>DIGITAL4LOCAL INBOUND LEAD</span>
      <h2 style='margin: 8px 0 0 0; color: #14151a;'>New Strategy Session Request</h2>
    </div>
    <div class='field'><strong>Lead ID:</strong> " . htmlspecialchars($lead['id']) . "</div>
    <div class='field'><strong>Full Name:</strong> " . htmlspecialchars($lead['name']) . "</div>
    <div class='field'><strong>Email:</strong> <a href='mailto:" . htmlspecialchars($lead['email']) . "'>" . htmlspecialchars($lead['email']) . "</a></div>
    <div class='field'><strong>Phone:</strong> " . htmlspecialchars($lead['phone'] ?: 'N/A') . "</div>
    <div class='field'><strong>Company:</strong> " . htmlspecialchars($lead['company'] ?: 'N/A') . "</div>
    <div class='field'><strong>Website:</strong> " . ($lead['website'] ? "<a href='" . htmlspecialchars($lead['website']) . "'>" . htmlspecialchars($lead['website']) . "</a>" : 'N/A') . "</div>
    <div class='field'><strong>Industry/Focus:</strong> " . htmlspecialchars($lead['industry']) . "</div>
    <div class='field'><strong>Source Page:</strong> " . htmlspecialchars($lead['source']) . "</div>
    <div class='field'><strong>IP Address:</strong> " . htmlspecialchars($lead['ip_address']) . "</div>
    <div class='field'><strong>Timestamp:</strong> " . htmlspecialchars($lead['date']) . "</div>
    " . ($lead['message'] ? "<div class='field' style='margin-top: 16px;'><strong>Message / Notes:</strong><br><div style='background: #f1f5f9; padding: 12px; border-radius: 8px; margin-top: 6px;'>" . nl2br(htmlspecialchars($lead['message'])) . "</div></div>" : "") . "
    <div class='footer'>
      This lead was securely captured and verified by Digital4Local Lead Engine.
    </div>
  </div>
</body>
</html>";

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=UTF-8\r\n";
$headers .= "From: Digital4Local Lead Engine <no-reply@digital4local.com>\r\n";
if (!empty($safe_email_address)) {
    $headers .= "Reply-To: " . $safe_email_address . "\r\n";
}

@mail($target_notification_email, $email_subject, $email_body, $headers);

if ($saved !== false) {
    echo json_encode([
        'success' => true,
        'message' => 'Strategy session requested successfully! A senior growth engineer will contact you shortly.',
        'lead_id' => $lead['id']
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Failed to record lead. Please email directly at info@digital4local.com.'
    ]);
}
