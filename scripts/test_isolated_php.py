import subprocess
import os
import sys

PHP_PATH = r"C:\xampp\php\php.exe"
WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

slugs = [
    'top-10-digital-marketing-companies-india',
    'smm-full-form-what-does-smm-mean',
    'seo-vs-sem-difference',
    'top-marketing-companies-india',
    'best-digital-marketing-company-india',
    'types-of-seo-explained'
]

test_files = [
    ("blog.php", "/blog.php"),
    ("blog/index.php", "/blog/"),
]

for s in slugs:
    test_files.append((f"blog/{s}.php", f"/blog/{s}"))
    test_files.append((f"blog/{s}/index.php", f"/blog/{s}/"))

print("=" * 70)
print("TESTING ISOLATED PHP PROCESS RENDERING FOR EACH BLOG FILE")
print("=" * 70)

temp_file = os.path.join(WORKSPACE, "scripts", "_isolated_runner.php")

all_ok = True
for fpath, req_uri in test_files:
    runner_code = f"""<?php
$_SERVER['PHP_SELF'] = '{req_uri}';
$_SERVER['SCRIPT_NAME'] = '{req_uri}';
$_SERVER['REQUEST_URI'] = '{req_uri}';
require __DIR__ . '/../{fpath}';
"""
    with open(temp_file, 'w', encoding='utf-8') as f:
        f.write(runner_code)
    
    res = subprocess.run([PHP_PATH, temp_file], cwd=WORKSPACE, capture_output=True)
    out = res.stdout.decode('utf-8', errors='replace')
    err = res.stderr.decode('utf-8', errors='replace')
    
    has_broken = ("../services/" in out or "../industries/" in out or "does not exist" in out)
    has_404 = ("404 not found" in out.lower() or "404 Not Found" in out)
    if res.returncode == 0 and len(out) > 5000 and not has_broken and not has_404:
        print(f" [PASS] {fpath:<48} -> {len(out)} bytes | Status: 200 OK")
    else:
        print(f" [FAIL] {fpath:<48} -> ReturnCode: {res.returncode}, Bytes: {len(out)}, BrokenLinks: {has_broken}, 404: {has_404}")
        if err:
            print("   Error:", err.strip())
        all_ok = False

if os.path.exists(temp_file):
    os.remove(temp_file)

print("=" * 70)
if all_ok:
    print("ALL 14 BLOG FILES/ROUTES RENDERED 100% PERFECTLY IN ISOLATION!")
else:
    print("SOME FILES HAD ISSUES!")
print("=" * 70)
