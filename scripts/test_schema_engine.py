import os
import subprocess
import json
import re

PHP_EXEC = r"C:\xampp\php\php.exe"
WORKSPACE_DIR = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

def run_php_code(code):
    cmd = [PHP_EXEC, "-r", code]
    res = subprocess.run(cmd, cwd=WORKSPACE_DIR, stdout=subprocess.PIPE, stderr=subprocess.PIPE, text=True)
    return res.stdout, res.stderr

def test_page_schema(file_rel, server_vars={}):
    vars_code = "".join([f"$_SERVER['{k}'] = '{v}';\n" for k, v in server_vars.items()])
    test_script = f"""<?php
{vars_code}
ob_start();
include '{file_rel}';
$output = ob_get_clean();

// Extract all <script type="application/ld+json"> blocks
preg_match_all('#<script type="application/ld\+json">(.*?)</script>#is', $output, $matches);

$schemas = [];
foreach ($matches[1] as $raw_json) {{
    $trimmed = trim($raw_json);
    $decoded = json_decode($trimmed, true);
    if ($decoded) {{
        $schemas[] = $decoded;
    }} else {{
        $schemas[] = ['_PARSE_ERROR' => true, 'raw' => $trimmed];
    }}
}}

echo json_encode(['count' => count($schemas), 'schemas' => $schemas], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
"""
    tmp_path = os.path.join(WORKSPACE_DIR, "scripts", "_temp_schema_test.php")
    with open(tmp_path, "w", encoding="utf-8") as f:
        f.write(test_script)
    
    cmd = [PHP_EXEC, tmp_path]
    res = subprocess.run(cmd, cwd=WORKSPACE_DIR, stdout=subprocess.PIPE, stderr=subprocess.PIPE, text=True)
    
    if os.path.exists(tmp_path):
        os.remove(tmp_path)
        
    try:
        return json.loads(res.stdout), res.stderr
    except Exception as e:
        return {"error": str(e), "raw": res.stdout, "stderr": res.stderr}, res.stderr

def run_all_schema_tests():
    print("=" * 70)
    print("TESTING DYNAMIC SCHEMA ARCHITECTURE ACROSS WEBSITE")
    print("=" * 70)

    test_cases = [
        {
            "name": "1. Homepage (index.php)",
            "file": "index.php",
            "vars": {"REQUEST_URI": "/", "SCRIPT_NAME": "/index.php"},
            "expected_types": ["MarketingAgency", "WebPage", "BreadcrumbList"],
            "prohibited_types": ["Review", "AggregateRating"]
        },
        {
            "name": "2. Services Overview (services.php)",
            "file": "services.php",
            "vars": {"REQUEST_URI": "/services.php", "SCRIPT_NAME": "/services.php"},
            "expected_types": ["WebPage", "BreadcrumbList"],
            "prohibited_types": ["Review", "AggregateRating"]
        },
        {
            "name": "3. Local SEO Service (services/local-seo.php)",
            "file": "services/local-seo.php",
            "vars": {"REQUEST_URI": "/services/local-seo.php", "SCRIPT_NAME": "/services/local-seo.php"},
            "expected_types": ["WebPage", "BreadcrumbList", "Service", "FAQPage"],
            "prohibited_types": ["Review", "AggregateRating", "LocalBusiness"]
        },
        {
            "name": "4. GEO & AEO Service (services/geo-aeo.php)",
            "file": "services/geo-aeo.php",
            "vars": {"REQUEST_URI": "/services/geo-aeo.php", "SCRIPT_NAME": "/services/geo-aeo.php"},
            "expected_types": ["WebPage", "BreadcrumbList", "Service", "FAQPage"],
            "prohibited_types": ["Review", "AggregateRating"]
        },
        {
            "name": "5. Web Development Service (services/web-development.php)",
            "file": "services/web-development.php",
            "vars": {"REQUEST_URI": "/services/web-development.php", "SCRIPT_NAME": "/services/web-development.php"},
            "expected_types": ["WebPage", "BreadcrumbList", "Service", "FAQPage"],
            "prohibited_types": ["Review", "AggregateRating"]
        },
        {
            "name": "6. Industry Blueprint (industries/law-firms-seo.php)",
            "file": "industries/law-firms-seo.php",
            "vars": {"REQUEST_URI": "/industries/law-firms-seo.php", "SCRIPT_NAME": "/industries/law-firms-seo.php"},
            "expected_types": ["WebPage", "BreadcrumbList", "Service", "Article", "FAQPage"],
            "prohibited_types": ["Review", "AggregateRating"]
        },
        {
            "name": "7. Blog Single Post (blog-single.php)",
            "file": "blog-single.php",
            "vars": {"REQUEST_URI": "/blog/digital-marketing-growth-guide", "SCRIPT_NAME": "/blog-single.php"},
            "expected_types": ["WebPage", "BreadcrumbList", "BlogPosting"],
            "prohibited_types": ["Review", "AggregateRating"]
        },
        {
            "name": "8. Pricing Page (pricing.php)",
            "file": "pricing.php",
            "vars": {"REQUEST_URI": "/pricing.php", "SCRIPT_NAME": "/pricing.php"},
            "expected_types": ["WebPage", "BreadcrumbList", "FAQPage"],
            "prohibited_types": ["Review", "AggregateRating"]
        },
        {
            "name": "9. Contact Page (contact.php)",
            "file": "contact.php",
            "vars": {"REQUEST_URI": "/contact.php", "SCRIPT_NAME": "/contact.php"},
            "expected_types": ["WebPage", "BreadcrumbList", "FAQPage"],
            "prohibited_types": ["Review", "AggregateRating"]
        },
        {
            "name": "10. About Us Page (about.php)",
            "file": "about.php",
            "vars": {"REQUEST_URI": "/about.php", "SCRIPT_NAME": "/about.php"},
            "expected_types": ["WebPage", "BreadcrumbList"],
            "prohibited_types": ["Review", "AggregateRating"]
        }
    ]

    all_passed = True

    for tc in test_cases:
        print(f"\n[TEST] Testing: {tc['name']}...")
        data, err = test_page_schema(tc["file"], tc["vars"])
        if "error" in data:
            print(f"  [ERROR] FAILED to execute: {data['error']}")
            print(f"  Stderr: {err}")
            all_passed = False
            continue

        found_types = []
        for s in data.get("schemas", []):
            st = s.get("@type")
            if st:
                found_types.append(st)
        
        print(f"  Found Schema Types ({len(found_types)}): {', '.join(found_types)}")

        # Check required types
        missing = [req for req in tc["expected_types"] if req not in found_types]
        if missing:
            print(f"  [FAIL] MISSING expected schema types: {missing}")
            all_passed = False
        else:
            print(f"  [PASS] All expected schema types present!")

        # Check prohibited types
        prohibited_found = [p for p in tc["prohibited_types"] if p in found_types]
        if prohibited_found:
            print(f"  [FAIL] PROHIBITED schema types found: {prohibited_found}")
            all_passed = False
        else:
            print(f"  [PASS] No prohibited schema types found.")

        # Detailed validation for specific types
        for s in data.get("schemas", []):
            st = s.get("@type")
            if st == "Service":
                provider = s.get("provider", {})
                p_type = provider.get("@type")
                p_name = provider.get("name")
                offers = s.get("offers", [])
                print(f"    - Service Provider: {p_name} (@type: {p_type})")
                print(f"    - Service Offers count: {len(offers)}")
                if p_type != "Organization":
                    print(f"    [FAIL] Provider @type should be Organization, got {p_type}")
                    all_passed = False
            elif st == "BlogPosting" or st == "Article":
                author = s.get("author", {})
                publisher = s.get("publisher", {})
                print(f"    - Article Author: {author.get('name')} (@type: {author.get('@type')})")
                print(f"    - Article Publisher: {publisher.get('name')} (@type: {publisher.get('@type')})")
            elif st == "BreadcrumbList":
                items = s.get("itemListElement", [])
                crumbs = " > ".join([it.get("name", "") for it in items])
                print(f"    - Breadcrumbs: {crumbs}")
            elif st == "FAQPage":
                faqs = s.get("mainEntity", [])
                print(f"    - FAQs Count: {len(faqs)} items")

    print("\n" + "=" * 70)
    if all_passed:
        print("[SUCCESS] ALL DYNAMIC SCHEMA TESTS PASSED 100% SUCCESSFULLY!")
    else:
        print("[FAIL] SOME SCHEMA TESTS FAILED! PLEASE REVIEW OUTPUT ABOVE.")
    print("=" * 70)

if __name__ == "__main__":
    run_all_schema_tests()
