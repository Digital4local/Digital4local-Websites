<?php
/**
 * Digital4Local - Lead Capture & Email Dispatch API
 * Handles all inbound strategy session requests, contact form submissions, and territory audits.
 * Logs leads to config/leads.json and dispatches notification emails to info@digital4local.com.
 */
header('Content-Type: application/json; charset=utf-8');

$leads_file = __DIR__ . '/../config/leads.json';
$target_notification_email = 'info@digital4local.com';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method. Only POST is accepted.']);
    exit;
}

$raw_input = file_get_contents('php://input');
$data = json_decode($raw_input, true);

if (!$data && !empty($_POST)) {
    $data = $_POST;
}

if (empty($data)) {
    echo json_encode(['success' => false, 'message' => 'No lead data provided.']);
    exit;
}

// Clean and sanitize input
$lead = [
    'id' => 'LEAD-' . date('Ymd-His') . '-' . bin2hex(random_bytes(2)),
    'name' => htmlspecialchars(trim($data['name'] ?? 'Anonymous')),
    'email' => filter_var(trim($data['email'] ?? ''), FILTER_SANITIZE_EMAIL),
    'phone' => htmlspecialchars(trim($data['phone'] ?? '')),
    'company' => htmlspecialchars(trim($data['company'] ?? '')),
    'website' => filter_var(trim($data['website'] ?? ''), FILTER_SANITIZE_URL),
    'industry' => htmlspecialchars(trim($data['industry'] ?? 'General')),
    'message' => htmlspecialchars(trim($data['message'] ?? '')),
    'date' => date('Y-m-d H:i:s'),
    'status' => 'New',
    'source' => htmlspecialchars(trim($data['source'] ?? 'Website Form'))
];

if (empty($lead['email']) || !filter_var($lead['email'], FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'A valid work email is required.']);
    exit;
}

// Read and append to existing leads
$leads = [];
if (file_exists($leads_file)) {
    $json = @file_get_contents($leads_file);
    if ($json) {
        $leads = @json_decode($json, true) ?: [];
    }
}

array_unshift($leads, $lead);

// Keep max 500 leads in record
if (count($leads) > 500) {
    $leads = array_slice($leads, 0, 500);
}

$saved = @file_put_contents($leads_file, json_encode($leads, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));

// Dispatch Email Notification to info@digital4local.com
$email_subject = "🔥 [New Inbound Lead] " . ($lead['company'] ? $lead['company'] . " - " : "") . $lead['name'] . " (" . $lead['source'] . ")";
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
    <div class='field'><strong>Timestamp:</strong> " . htmlspecialchars($lead['date']) . "</div>
    " . ($lead['message'] ? "<div class='field' style='margin-top: 16px;'><strong>Message / Notes:</strong><br><div style='background: #f1f5f9; padding: 12px; border-radius: 8px; margin-top: 6px;'>" . nl2br(htmlspecialchars($lead['message'])) . "</div></div>" : "") . "
    <div class='footer'>
      This lead was automatically captured and logged to Digital4Local Command Center.
    </div>
  </div>
</body>
</html>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Digital4Local Lead Engine <no-reply@digital4local.com>" . "\r\n";
$headers .= "Reply-To: " . $lead['email'] . "\r\n";

// Attempt mail dispatch
@mail($target_notification_email, $email_subject, $email_body, $headers);

if ($saved !== false) {
    echo json_encode([
        'success' => true,
        'message' => 'Strategy session requested successfully! A senior growth engineer will contact you shortly.',
        'lead_id' => $lead['id'],
        'routed_to' => $target_notification_email
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to record lead to storage. Please email directly at info@digital4local.com.'
    ]);
}
