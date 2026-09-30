import subprocess
import json
import re
import os

PHP_EXE = r"C:\xampp\php\php.exe"
BASE_DIR = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

def run_php(code):
    res = subprocess.run([PHP_EXE, "-r", code], cwd=BASE_DIR, capture_output=True, text=False)
    return res.stdout.decode('utf-8', errors='replace')

test_code = """
$_SERVER['REQUEST_URI'] = '/';
require_once 'includes/site-config.php';
ob_start();
include 'index.php';
$html = ob_get_clean();
echo $html;
"""

html = run_php(test_code)
scripts = re.findall(r'<script type="application/ld\+json">(.*?)</script>', html, re.DOTALL)
print(f"=== INDEX.PHP SCHEMAS ({len(scripts)} found) ===")
for i, s in enumerate(scripts):
    try:
        data = json.loads(s.strip())
        print(f"\n--- [Script {i+1}] @type: {data.get('@type')} ---")
        print(json.dumps(data, indent=2, ensure_ascii=False))
    except Exception as e:
        print(f"\n--- [Script {i+1}] JSON ERROR: {e} ---")
        print(s[:200])
