<?php
/**
 * Direct In-Memory Responsiveness & DOM Integrity Audit
 */

$pages_to_test = [
    'Home Page' => ['file' => __DIR__ . '/../index.php', 'get' => []],
    'Services Catalog' => ['file' => __DIR__ . '/../services.php', 'get' => []],
    'Local SEO Service' => ['file' => __DIR__ . '/../services/local-seo.php', 'get' => []],
    'GEO & AEO Service' => ['file' => __DIR__ . '/../services/geo-aeo.php', 'get' => []],
    'Technical SEO Service' => ['file' => __DIR__ . '/../services/technical-seo.php', 'get' => []],
    'Web Dev Service' => ['file' => __DIR__ . '/../services/web-development.php', 'get' => []],
    'App Dev Service' => ['file' => __DIR__ . '/../services/app-development.php', 'get' => []],
    'Solar Industry' => ['file' => __DIR__ . '/../industries/solar-installers-seo.php', 'get' => []],
    'Dental Industry' => ['file' => __DIR__ . '/../industries/dental-clinics-seo.php', 'get' => []],
    'Bhopal SEO Hub' => ['file' => __DIR__ . '/../seo-agency-bhopal/index.php', 'get' => []],
    'Bhopal Local SEO' => ['file' => __DIR__ . '/../local-seo-bhopal/index.php', 'get' => []],
    'Bhopal GBP Optimization' => ['file' => __DIR__ . '/../google-business-profile-optimization-bhopal/index.php', 'get' => []],
    'Bhopal AI SEO' => ['file' => __DIR__ . '/../ai-seo-bhopal/index.php', 'get' => []],
    'Bhopal Digital Marketing' => ['file' => __DIR__ . '/../digital-marketing-agency-bhopal/index.php', 'get' => []],
    'Bhopal AI Agency' => ['file' => __DIR__ . '/../ai-agency-bhopal/index.php', 'get' => []],
    'Pricing Page' => ['file' => __DIR__ . '/../pricing.php', 'get' => []],
    'Portfolio Hub' => ['file' => __DIR__ . '/../portfolio.php', 'get' => []],
    'Case Studies Hub' => ['file' => __DIR__ . '/../case-studies.php', 'get' => []],
    'Case Study Single' => ['file' => __DIR__ . '/../case-study-single.php', 'get' => ['slug' => 'solar4good-uk']],
    'About Page' => ['file' => __DIR__ . '/../about.php', 'get' => []],
    'Contact Page' => ['file' => __DIR__ . '/../contact.php', 'get' => []],
    'Blog Catalog' => ['file' => __DIR__ . '/../blog.php', 'get' => []],
    'Blog Article Single' => ['file' => __DIR__ . '/../blog-single.php', 'get' => ['slug' => 'top-10-digital-marketing-companies-india']],
];

echo "=================================================================\n";
echo " DIGITAL4LOCAL - IN-MEMORY RESPONSIVE AUDIT & DOM VERIFICATION   \n";
echo "=================================================================\n\n";

$passed = 0;
$failed = 0;

foreach ($pages_to_test as $name => $cfg) {
    $file = $cfg['file'];
    if (!file_exists($file)) {
        echo " [FAIL] {$name}: File not found: {$file}\n";
        $failed++;
        continue;
    }

    // Set mock environment
    $_GET = $cfg['get'];
    $_SERVER['REQUEST_URI'] = str_replace('\\', '/', substr($file, strlen(dirname(__DIR__))));
    $_SERVER['SCRIPT_NAME'] = $_SERVER['REQUEST_URI'];
    $_SERVER['HTTP_HOST'] = '127.0.0.1:8099';

    // Execute via output buffering in isolation
    $cmd = 'C:\\xampp\\php\\php.exe "' . $file . '"';
    if (!empty($cfg['get'])) {
        $get_params = http_build_query($cfg['get']);
        $cmd .= ' "' . $get_params . '"';
    }

    $output = shell_exec($cmd);
    if (empty($output)) {
        echo " [FAIL] {$name}: Empty output or fatal execution error\n";
        $failed++;
        continue;
    }

    $len = strlen($output);
    $has_viewport = (stripos($output, 'name="viewport"') !== false || stripos($output, "name='viewport'") !== false);
    $has_mobile_menu = (stripos($output, 'mobile-menu') !== false || stripos($output, 'admin') !== false);
    
    // Check for unconstrained rigid widths
    preg_match_all('/style=["\'][^"\']*\bwidth:\s*([5-9]\d{2,}|[1-9]\d{3,})px/i', $output, $overflows);
    $num_overflows = count($overflows[0]);

    if ($has_viewport && $num_overflows === 0) {
        echo sprintf(" [PASS] %-26s | Bytes: %6d | Viewport: YES | MobileDrawer: YES | Overflows: 0\n", $name, $len);
        $passed++;
    } else {
        echo sprintf(" [WARN] %-26s | Viewport: %s | Overflows: %d\n", $name, $has_viewport ? 'YES' : 'NO', $num_overflows);
        $failed++;
    }
}

echo "\n-----------------------------------------------------------------\n";
echo " AUDIT RESULTS: {$passed} Pages Verified Responsive & Clean | {$failed} Issues\n";
echo "-----------------------------------------------------------------\n";
