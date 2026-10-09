import subprocess
import os
import sys

PHP_PATH = r"C:\xampp\php\php.exe"
WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"
test_runner = os.path.join(WORKSPACE, "scripts", "_temp_test_runner.php")

php_script = """<?php
$slugs = [
    'top-10-digital-marketing-companies-india',
    'smm-full-form-what-does-smm-mean',
    'seo-vs-sem-difference',
    'top-marketing-companies-india',
    'best-digital-marketing-company-india',
    'types-of-seo-explained'
];

echo "=======================================================\\n";
echo "TESTING BLOG PAGES PHP RENDERING\\n";
echo "=======================================================\\n";

// 1. Test blog.php
ob_start();
$_SERVER['PHP_SELF'] = '/blog.php';
$_SERVER['SCRIPT_NAME'] = '/blog.php';
$_SERVER['REQUEST_URI'] = '/blog.php';
require __DIR__ . '/../blog.php';
$html = ob_get_clean();
if (strlen($html) > 5000 && strpos($html, 'Digital4Local') !== false) {
    echo "[PASS] blog.php rendered (" . strlen($html) . " bytes)\\n";
} else {
    echo "[FAIL] blog.php render failed\\n";
}

// 2. Test blog/index.php
ob_start();
$_SERVER['PHP_SELF'] = '/blog/index.php';
$_SERVER['SCRIPT_NAME'] = '/blog/index.php';
$_SERVER['REQUEST_URI'] = '/blog/';
require __DIR__ . '/../blog/index.php';
$html = ob_get_clean();
if (strlen($html) > 5000 && strpos($html, 'Digital4Local') !== false) {
    echo "[PASS] blog/index.php rendered (" . strlen($html) . " bytes)\\n";
} else {
    echo "[FAIL] blog/index.php render failed\\n";
}

// 3. Test blog/{slug}.php
foreach ($slugs as $s) {
    ob_start();
    $_SERVER['PHP_SELF'] = "/blog/{$s}.php";
    $_SERVER['SCRIPT_NAME'] = "/blog/{$s}.php";
    $_SERVER['REQUEST_URI'] = "/blog/{$s}";
    require __DIR__ . "/../blog/{$s}.php";
    $html = ob_get_clean();
    $has_broken = (strpos($html, '../services/') !== false || strpos($html, '../industries/') !== false || strpos($html, 'does not exist') !== false);
    if (strlen($html) > 5000 && !$has_broken) {
        echo "[PASS] blog/{$s}.php (" . strlen($html) . " bytes) - Clean URLs\\n";
    } else {
        echo "[FAIL] blog/{$s}.php - Has broken links or failed render!\\n";
    }
}

// 4. Test blog/{slug}/index.php
foreach ($slugs as $s) {
    ob_start();
    $_SERVER['PHP_SELF'] = "/blog/{$s}/index.php";
    $_SERVER['SCRIPT_NAME'] = "/blog/{$s}/index.php";
    $_SERVER['REQUEST_URI'] = "/blog/{$s}/";
    require __DIR__ . "/../blog/{$s}/index.php";
    $html = ob_get_clean();
    $has_broken = (strpos($html, '../services/') !== false || strpos($html, '../industries/') !== false || strpos($html, 'does not exist') !== false);
    if (strlen($html) > 5000 && !$has_broken) {
        echo "[PASS] blog/{$s}/index.php (" . strlen($html) . " bytes) - Clean URLs\\n";
    } else {
        echo "[FAIL] blog/{$s}/index.php - Has broken links or failed render!\\n";
    }
}

echo "=======================================================\\n";
echo "ALL PHP RENDERING TESTS COMPLETE!\\n";
echo "=======================================================\\n";
"""

with open(test_runner, 'w', encoding='utf-8') as f:
    f.write(php_script)

res = subprocess.run([PHP_PATH, test_runner], cwd=WORKSPACE, capture_output=True, text=True)
print(res.stdout)
if res.stderr:
    print("STDERR:", res.stderr)

if os.path.exists(test_runner):
    os.remove(test_runner)
