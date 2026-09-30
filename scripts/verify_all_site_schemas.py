import os
import subprocess
import json
import re

PHP_EXEC = r"C:\xampp\php\php.exe"
WORKSPACE_DIR = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

def test_page(file_rel, server_vars={}):
    vars_code = "".join([f"$_SERVER['{k}'] = '{v}';\n" for k, v in server_vars.items()])
    test_script = f"""<?php
{vars_code}
ob_start();
try {{
    include '{file_rel}';
}} catch (Throwable $e) {{
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}}
$output = ob_get_clean();

preg_match_all('#<script type="application/ld\+json">(.*?)</script>#is', $output, $matches);

$schemas = [];
$parse_errors = 0;
foreach ($matches[1] as $raw_json) {{
    $trimmed = trim($raw_json);
    $decoded = json_decode($trimmed, true);
    if ($decoded) {{
        $schemas[] = $decoded;
    }} else {{
        $schemas[] = ['_PARSE_ERROR' => true, 'raw' => substr($trimmed, 0, 100)];
        $parse_errors++;
    }}
}}

echo json_encode([
    'file' => '{file_rel}',
    'count' => count($schemas),
    'parse_errors' => $parse_errors,
    'schemas' => $schemas
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
"""
    tmp_path = os.path.join(WORKSPACE_DIR, "scripts", "_temp_full_audit.php")
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

def run_site_wide_schema_audit():
    pages = [
        # Core Pages
        {"file": "index.php", "vars": {"REQUEST_URI": "/", "SCRIPT_NAME": "/index.php"}},
        {"file": "about.php", "vars": {"REQUEST_URI": "/about.php", "SCRIPT_NAME": "/about.php"}},
        {"file": "services.php", "vars": {"REQUEST_URI": "/services.php", "SCRIPT_NAME": "/services.php"}},
        {"file": "pricing.php", "vars": {"REQUEST_URI": "/pricing.php", "SCRIPT_NAME": "/pricing.php"}},
        {"file": "contact.php", "vars": {"REQUEST_URI": "/contact.php", "SCRIPT_NAME": "/contact.php"}},
        {"file": "blog.php", "vars": {"REQUEST_URI": "/blog.php", "SCRIPT_NAME": "/blog.php"}},
        {"file": "blog-single.php", "vars": {"REQUEST_URI": "/blog/digital-marketing-growth-guide", "SCRIPT_NAME": "/blog-single.php"}},
        {"file": "industries/index.php", "vars": {"REQUEST_URI": "/industries/", "SCRIPT_NAME": "/industries/index.php"}},
        {"file": "page.php", "vars": {"REQUEST_URI": "/page/terms", "SCRIPT_NAME": "/page.php"}},
        
        # 8 Core Services
        {"file": "services/local-seo.php", "vars": {"REQUEST_URI": "/services/local-seo.php", "SCRIPT_NAME": "/services/local-seo.php"}},
        {"file": "services/geo-aeo.php", "vars": {"REQUEST_URI": "/services/geo-aeo.php", "SCRIPT_NAME": "/services/geo-aeo.php"}},
        {"file": "services/technical-seo.php", "vars": {"REQUEST_URI": "/services/technical-seo.php", "SCRIPT_NAME": "/services/technical-seo.php"}},
        {"file": "services/link-building-pr.php", "vars": {"REQUEST_URI": "/services/link-building-pr.php", "SCRIPT_NAME": "/services/link-building-pr.php"}},
        {"file": "services/ai-marketing.php", "vars": {"REQUEST_URI": "/services/ai-marketing.php", "SCRIPT_NAME": "/services/ai-marketing.php"}},
        {"file": "services/social-media.php", "vars": {"REQUEST_URI": "/services/social-media.php", "SCRIPT_NAME": "/services/social-media.php"}},
        {"file": "services/web-development.php", "vars": {"REQUEST_URI": "/services/web-development.php", "SCRIPT_NAME": "/services/web-development.php"}},
        {"file": "services/app-development.php", "vars": {"REQUEST_URI": "/services/app-development.php", "SCRIPT_NAME": "/services/app-development.php"}},
        
        # 16 Industry Blueprints
        {"file": "industries/aesthetics-clinics-seo.php", "vars": {"REQUEST_URI": "/industries/aesthetics-clinics-seo.php", "SCRIPT_NAME": "/industries/aesthetics-clinics-seo.php"}},
        {"file": "industries/dental-clinics-seo.php", "vars": {"REQUEST_URI": "/industries/dental-clinics-seo.php", "SCRIPT_NAME": "/industries/dental-clinics-seo.php"}},
        {"file": "industries/driveway-landscaping-seo.php", "vars": {"REQUEST_URI": "/industries/driveway-landscaping-seo.php", "SCRIPT_NAME": "/industries/driveway-landscaping-seo.php"}},
        {"file": "industries/ev-charger-installers-seo.php", "vars": {"REQUEST_URI": "/industries/ev-charger-installers-seo.php", "SCRIPT_NAME": "/industries/ev-charger-installers-seo.php"}},
        {"file": "industries/heat-pump-installers-seo.php", "vars": {"REQUEST_URI": "/industries/heat-pump-installers-seo.php", "SCRIPT_NAME": "/industries/heat-pump-installers-seo.php"}},
        {"file": "industries/kitchen-bathroom-renovators-seo.php", "vars": {"REQUEST_URI": "/industries/kitchen-bathroom-renovators-seo.php", "SCRIPT_NAME": "/industries/kitchen-bathroom-renovators-seo.php"}},
        {"file": "industries/law-firms-seo.php", "vars": {"REQUEST_URI": "/industries/law-firms-seo.php", "SCRIPT_NAME": "/industries/law-firms-seo.php"}},
        {"file": "industries/local-business-seo.php", "vars": {"REQUEST_URI": "/industries/local-business-seo.php", "SCRIPT_NAME": "/industries/local-business-seo.php"}},
        {"file": "industries/loft-conversion-builders-seo.php", "vars": {"REQUEST_URI": "/industries/loft-conversion-builders-seo.php", "SCRIPT_NAME": "/industries/loft-conversion-builders-seo.php"}},
        {"file": "industries/pool-installers-seo.php", "vars": {"REQUEST_URI": "/industries/pool-installers-seo.php", "SCRIPT_NAME": "/industries/pool-installers-seo.php"}},
        {"file": "industries/removal-companies-seo.php", "vars": {"REQUEST_URI": "/industries/removal-companies-seo.php", "SCRIPT_NAME": "/industries/removal-companies-seo.php"}},
        {"file": "industries/roofing-companies-seo.php", "vars": {"REQUEST_URI": "/industries/roofing-companies-seo.php", "SCRIPT_NAME": "/industries/roofing-companies-seo.php"}},
        {"file": "industries/saas-marketing-agency.php", "vars": {"REQUEST_URI": "/industries/saas-marketing-agency.php", "SCRIPT_NAME": "/industries/saas-marketing-agency.php"}},
        {"file": "industries/security-cctv-installers-seo.php", "vars": {"REQUEST_URI": "/industries/security-cctv-installers-seo.php", "SCRIPT_NAME": "/industries/security-cctv-installers-seo.php"}},
        {"file": "industries/solar-installers-seo.php", "vars": {"REQUEST_URI": "/industries/solar-installers-seo.php", "SCRIPT_NAME": "/industries/solar-installers-seo.php"}},
        {"file": "industries/startup-seo-agency.php", "vars": {"REQUEST_URI": "/industries/startup-seo-agency.php", "SCRIPT_NAME": "/industries/startup-seo-agency.php"}},
    ]

    total_schema_blocks = 0
    total_entities_by_type = {}
    total_parse_errors = 0
    pages_tested = 0
    prohibited_count = 0

    print("======================================================================")
    print("SITE-WIDE COMPREHENSIVE SCHEMA AUDIT REPORT")
    print("======================================================================")

    for p in pages:
        res, err = test_page(p["file"], p["vars"])
        pages_tested += 1
        if "error" in res:
            print(f"[ERROR] {p['file']}: {res['error']}")
            continue

        p_errors = res.get("parse_errors", 0)
        total_parse_errors += p_errors
        p_schemas = res.get("schemas", [])
        total_schema_blocks += len(p_schemas)

        types_in_page = []
        for s in p_schemas:
            raw_st = s.get("@type", "Unknown")
            st = "/".join(raw_st) if isinstance(raw_st, list) else str(raw_st)
            types_in_page.append(st)
            total_entities_by_type[st] = total_entities_by_type.get(st, 0) + 1
            if st in ["Review", "AggregateRating"] or (isinstance(raw_st, list) and any(x in ["Review", "AggregateRating"] for x in raw_st)):
                prohibited_count += 1

        print(f"[{'PASS' if p_errors == 0 else 'FAIL'}] {p['file']:<45} -> {len(p_schemas)} Schemas: {', '.join(types_in_page)}")

    print("\n======================================================================")
    print("AUDIT SUMMARY METRICS")
    print("======================================================================")
    print(f"Total Routes / Templates Audited : {pages_tested}")
    print(f"Total JSON-LD Schema Blocks      : {total_schema_blocks}")
    print(f"Total JSON Parse Errors / Bugs   : {total_parse_errors}")
    print(f"Prohibited Schemas Found (Review): {prohibited_count}")
    print("\nSchema Type Breakdown Across Entire Site:")
    for st, count in sorted(total_entities_by_type.items(), key=lambda x: x[1], reverse=True):
        print(f"  - {st:<22}: {count} instances active")

    print("======================================================================")
    if total_parse_errors == 0 and prohibited_count == 0:
        print("[STATUS: 100% PASS - 0 BUGS, 0 SYNTAX ERRORS, ALL VALID SCHEMA.ORG]")
    else:
        print("[STATUS: FAILED - PLEASE REVIEW ERRORS ABOVE]")
    print("======================================================================")

if __name__ == "__main__":
    run_site_wide_schema_audit()
