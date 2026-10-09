import subprocess
import os

PHP_PATH = r"C:\xampp\php\php.exe"
WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

test_code = """<?php
require_once __DIR__ . '/../includes/db.php';

try {
    $pdo = get_db();
    echo "Database Connected Successfully!\\n";
    
    // Check Admins
    $admins = $pdo->query("SELECT id, username, email, role FROM admins")->fetchAll();
    echo "Admins count in DB: " . count($admins) . "\\n";
    foreach ($admins as $a) {
        echo " - Admin: " . $a['username'] . " (" . $a['email'] . ") [" . $a['role'] . "]\\n";
    }
    
    // Check Blog Posts
    $blogs = db_get_all_blogs();
    echo "Blog posts count in DB: " . count($blogs) . "\\n";
    foreach ($blogs as $b) {
        echo " - Blog: " . $b['title'] . " [slug: " . $b['slug'] . "] [status: " . $b['status'] . "]\\n";
    }

    // Check Pages
    $pages = db_get_all_pages();
    echo "Pages count in DB: " . count($pages) . "\\n";
    
    // Check Global Settings
    $brand = db_get_setting('brand');
    echo "Brand Site Name from DB: " . ($brand['site_name'] ?? 'None') . "\\n";
    
    $pricing = db_get_setting('pricing');
    echo "Local SEO Retainer from DB: " . ($pricing['retainer_local_seo'] ?? 'None') . "\\n";

    echo "ALL DATABASE ENGINE TESTS PASSED!\\n";
} catch (Exception $e) {
    echo "DB ERROR: " . $e->getMessage() . "\\n";
    exit(1);
}
"""

with open(os.path.join(WORKSPACE, "scripts", "temp_db_test.php"), "w", encoding="utf-8") as f:
    f.write(test_code)

res = subprocess.run([PHP_PATH, os.path.join(WORKSPACE, "scripts", "temp_db_test.php")], capture_output=True, text=True)
print("STDOUT:\n", res.stdout)
print("STDERR:\n", res.stderr)
print("Return code:", res.returncode)

if os.path.exists(os.path.join(WORKSPACE, "scripts", "temp_db_test.php")):
    os.remove(os.path.join(WORKSPACE, "scripts", "temp_db_test.php"))
