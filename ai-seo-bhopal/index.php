<?php
/**
 * Bhopal Cluster: AI SEO & GEO in Bhopal (/ai-seo-bhopal/)
 * Powered by Master Location Template Engine
 */
require_once __DIR__ . '/../includes/location/LocationServicePage.php';

$json_file = __DIR__ . '/../data/bhopal/ai-seo-bhopal.json';
if (!file_exists($json_file)) {
    http_response_code(404);
    echo "Location data not found.";
    exit;
}

$page_data = json_decode(file_get_contents($json_file), true);
d4l_render_location_page($page_data);
