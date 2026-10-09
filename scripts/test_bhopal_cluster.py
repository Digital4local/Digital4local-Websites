import subprocess
import os
import sys

PHP_PATH = r"C:\xampp\php\php.exe"
WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"
test_runner = os.path.join(WORKSPACE, "scripts", "_temp_bhopal_test.php")

php_script = r"""<?php
$pages = [
    'seo-agency-bhopal' => true,
    'local-seo-bhopal' => false,
    'google-business-profile-optimization-bhopal' => false,
    'ai-seo-bhopal' => false,
    'digital-marketing-agency-bhopal' => false,
    'ai-agency-bhopal' => false
];

echo "=======================================================\n";
echo "TESTING BHOPAL CLUSTER 6 PAGES RENDERING\n";
echo "=======================================================\n";

$all_passed = true;

foreach ($pages as $slug => $is_hub) {
    ob_start();
    $_SERVER['PHP_SELF'] = "/{$slug}/index.php";
    $_SERVER['SCRIPT_NAME'] = "/{$slug}/index.php";
    $_SERVER['REQUEST_URI'] = "/{$slug}/";
    
    $entry_file = __DIR__ . "/../{$slug}/index.php";
    if (!file_exists($entry_file)) {
        echo "[FAIL] Entry file missing: {$entry_file}\n";
        $all_passed = false;
        ob_end_clean();
        continue;
    }
    
    require $entry_file;
    $html = ob_get_clean();
    
    $len = strlen($html);
    $has_h1 = preg_match('/<h1[^>]*>(.*?)<\/h1>/si', $html, $h1_m);
    $h1_text = $has_h1 ? trim(strip_tags($h1_m[1])) : 'NONE';
    
    $has_schema = strpos($html, 'application/ld+json') !== false;
    $has_canonical = strpos($html, 'rel="canonical" href="https://digital4local.com/' . $slug . '/"') !== false;
    $has_cluster_nav = strpos($html, 'aria-label="Bhopal Location Services Cluster"') !== false;
    $has_author = strpos($html, 'Abhishek Raikwar') !== false;
    $has_faq = strpos($html, '<details') !== false;
    $has_related = strpos($html, 'Recommended for You in Bhopal') !== false;
    $has_honest = (strpos($html, 'What we will not promise') !== false || strpos($html, 'What We Will NOT Promise') !== false || strpos($html, 'What we will never do') !== false || strpos($html, 'principles for using AI responsibly') !== false);
    
    if ($len > 8000 && $has_h1 && $has_schema && $has_canonical && $has_cluster_nav && $has_author && $has_faq && $has_related && $has_honest) {
        echo "[PASS] /{$slug}/ ({$len} bytes) | H1: \"{$h1_text}\"\n";
    } else {
        echo "[FAIL] /{$slug}/ - Failed check! len:{$len}, h1:{$has_h1}, schema:{$has_schema}, canonical:{$has_canonical}, nav:{$has_cluster_nav}, faq:{$has_faq}, honest:{$has_honest}\n";
        $all_passed = false;
    }
}

echo "=======================================================\n";
if ($all_passed) {
    echo "ALL 6 BHOPAL PAGES RENDERED PERFECTLY WITH SCHEMA, CANONICAL & SUBNAV!\n";
} else {
    echo "SOME CHECKS FAILED.\n";
}
echo "=======================================================\n";
"""

with open(test_runner, 'w', encoding='utf-8') as f:
    f.write(php_script)

res = subprocess.run([PHP_PATH, test_runner], cwd=WORKSPACE, capture_output=True)
stdout_str = res.stdout.decode('utf-8', errors='replace')
stderr_str = res.stderr.decode('utf-8', errors='replace')
print(stdout_str)
if stderr_str:
    print("STDERR:", stderr_str)

if os.path.exists(test_runner):
    os.remove(test_runner)
