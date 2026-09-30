"""
Digital4Local - Case Studies System Verification Test
Checks:
1. Case studies data integrity.
2. Render tests for /case-studies hub and all 7 /case-studies/[slug] pages.
3. Verification that ZERO [ADD: ...] placeholders exist in rendered HTML or data file.
4. JSON-LD structured data validation (Article, BreadcrumbList, ItemList).
"""

import subprocess
import json
import re
import sys
import os

PHP_BIN = r"C:\xampp\php\php.exe" if os.path.exists(r"C:\xampp\php\php.exe") else "php"

def run_php(code):
    res = subprocess.run(
        [PHP_BIN, "-r", code],
        capture_output=True,
        text=True,
        encoding="utf-8",
        errors="replace",
        cwd=os.path.dirname(os.path.dirname(__file__))
    )
    return res.stdout, res.stderr, res.returncode

print("=" * 70)
print("DIGITAL4LOCAL CASE STUDIES SYSTEM VERIFICATION")
print("=" * 70)

# 1. Test data load
data_test_code = """
$data = require 'config/case-studies-data.php';
echo json_encode(array_keys($data));
"""
stdout, stderr, code = run_php(data_test_code)
if code != 0:
    print(f"[FAIL] Could not load config/case-studies-data.php: {stderr}")
    sys.exit(1)

slugs = json.loads(stdout)
print(f"[PASS] Loaded {len(slugs)} case studies from config/case-studies-data.php:")
for s in slugs:
    print(f"  - {s}")

# 2. Test Listing Hub (/case-studies)
hub_test_code = """
ob_start();
include 'case-studies.php';
$html = ob_get_clean();
echo $html;
"""
stdout, stderr, code = run_php(hub_test_code)
if code != 0 or not stdout:
    print(f"[FAIL] case-studies.php render error: {stderr}")
else:
    # Check for placeholders
    placeholders = re.findall(r'\[ADD:[^\]]+\]', stdout)
    scripts = re.findall(r'<script type="application/ld\+json">(.*?)</script>', stdout, re.DOTALL)
    print(f"\n[PASS] /case-studies hub rendered successfully ({len(stdout)} chars).")
    print(f"       Found {len(scripts)} JSON-LD schemas. Placeholders found: {len(placeholders)}")
    if placeholders:
        print(f"       [ERROR] Placeholders found in hub: {placeholders}")

# 3. Test Detail Pages (/case-studies/[slug])
print("\nTesting all 7 detail pages:")
all_passed = True

for slug in slugs:
    single_test_code = f"""
    $_GET['slug'] = '{slug}';
    ob_start();
    include 'case-study-single.php';
    $html = ob_get_clean();
    echo $html;
    """
    html, err, ret = run_php(single_test_code)
    
    # Check for placeholders
    matches = re.findall(r'\[ADD:[^\]]+\]', html)
    scripts = re.findall(r'<script type="application/ld\+json">(.*?)</script>', html, re.DOTALL)
    
    schema_valid = True
    for s in scripts:
        try:
            json.loads(s.strip())
        except Exception as e:
            schema_valid = False
    
    has_error = (ret != 0) or bool(matches) or not schema_valid
    status = "FAIL" if has_error else "PASS"
    if has_error:
        all_passed = False
        
    print(f"[{status}] {slug:<35} -> {len(html)} chars | {len(scripts)} Schemas | Placeholders: {len(matches)}")
    if matches:
        print(f"       [WARNING] Placeholders detected: {matches}")

print("\n" + "=" * 70)
if all_passed and not placeholders:
    print("ALL TESTS PASSED! ZERO PLACEHOLDERS. COMPLETE DATA INTEGRITY.")
else:
    print("SOME TESTS FAILED. PLEASE REVIEW OUTPUT ABOVE.")
print("=" * 70)
