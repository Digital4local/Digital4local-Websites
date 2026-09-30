import subprocess
import json
import re
import os

PHP_EXE = r"C:\xampp\php\php.exe"
BASE_DIR = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

def run_php_file(file_name):
    cmd = f"""
    $_SERVER['REQUEST_URI'] = '/{file_name}';
    $_SERVER['PHP_SELF'] = '/{file_name}';
    require_once 'includes/site-config.php';
    ob_start();
    include '{file_name}';
    $html = ob_get_clean();
    echo $html;
    """
    res = subprocess.run([PHP_EXE, "-r", cmd], cwd=BASE_DIR, capture_output=True, text=False)
    return res.stdout.decode('utf-8', errors='replace')

print("=" * 70)
print("TESTING PORTFOLIO.PHP COMPLETE RENDER & SCHEMAS")
print("=" * 70)

html = run_php_file("portfolio.php")
print(f"HTML Output Size: {len(html)} characters ({len(html.encode('utf-8'))} bytes)")

# 1. Check for Essential Section Anchors
anchors = ['#hero', '#problem', '#services', '#system', '#results', '#reviews', '#location', '#instagram', '#comparison', '#industries', '#pricing', '#addons', '#calculator', '#deliverables', '#promise', '#faq', '#audit-form', '#footer']
print("\n--- Checking 18 Required Section Anchors ---")
for a in anchors:
    clean_id = a.replace('#', '')
    found = f'id="{clean_id}"' in html or f"id='{clean_id}'" in html
    print(f"  [{'FOUND' if found else 'MISSING'}] {a}")

# 2. Check JSON-LD Schemas
scripts = re.findall(r'<script type="application/ld\+json">(.*?)</script>', html, re.DOTALL)
print(f"\n--- Checking JSON-LD Schemas ({len(scripts)} script tags found) ---")
for i, s in enumerate(scripts):
    try:
        data = json.loads(s.strip())
        st = data.get('@type', 'Unknown')
        print(f"  [VALID JSON] Script {i+1}: @type = {st}")
    except Exception as e:
        print(f"  [JSON ERROR] Script {i+1}: {e}")

# 3. Check WhatsApp Links
wa_matches = re.findall(r'https://wa\.me/919131140530\?text=[^\s"\'<>]+', html)
print(f"\n--- Checking WhatsApp Pre-filled Links ---")
print(f"  Found {len(wa_matches)} dynamic WhatsApp CTA links")

# 4. Check Config References (Reviews, Plans, ROI)
print(f"\n--- Checking Key Brand Proof Elements ---")
checks = [
    ("RKDF UNIVERSITY BHOPAL", "RKDF University Review"),
    ("Solar4Good (UK)", "Solar4Good Case Study"),
    ("LOCAL LAUNCH", "Launch Pricing Plan"),
    ("LOCAL GROWTH", "Growth Pricing Plan"),
    ("LOCAL LEADER", "Leader Pricing Plan"),
    ("roi-customer-val", "Interactive ROI Calculator Input"),
    ("audit-lead-form", "Free Audit Contact Form"),
    ("90-DAY RESULTS GUARANTEE", "90-Day Guarantee Promise")
]
for text, label in checks:
    status = "PRESENT" if text in html else "MISSING"
    print(f"  [{status}] {label}")

print("\n" + "=" * 70)
print("PORTFOLIO PAGE VERIFICATION COMPLETE")
print("=" * 70)
