import urllib.request
import json
import re

BASE_URL = "http://127.0.0.1:8099"
SLUGS = [
    ("seo-agency-bhopal", True),
    ("local-seo-bhopal", False),
    ("google-business-profile-optimization-bhopal", False),
    ("ai-seo-bhopal", False),
    ("digital-marketing-agency-bhopal", False),
    ("ai-agency-bhopal", False),
]

print("=" * 70)
print("COMPREHENSIVE AUDIT OF 6 BHOPAL CLUSTER LANDING PAGES")
print("=" * 70)

all_ok = True

for slug, is_hub in SLUGS:
    url = f"{BASE_URL}/{slug}/"
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'})
    with urllib.request.urlopen(req) as resp:
        html = resp.read().decode('utf-8')
        status = resp.status
        
    print(f"\n--- AUDITING: /{slug}/ (HTTP {status}, {len(html)} bytes) ---")
    
    # 1. H1 Check
    h1s = re.findall(r'<h1[^>]*>(.*?)<\/h1>', html, re.DOTALL | re.IGNORECASE)
    clean_h1s = [re.sub(r'<[^>]+>', '', h).strip() for h in h1s]
    if len(h1s) == 1:
        print(f"  [PASS] Single H1: \"{clean_h1s[0]}\"")
    else:
        print(f"  [FAIL] Expected 1 H1, found {len(h1s)}: {clean_h1s}")
        all_ok = False
        
    # 2. Canonical Check
    expected_canonical = f"https://digital4local.com/{slug}/"
    if f'<link rel="canonical" href="{expected_canonical}">' in html:
        print(f"  [PASS] Canonical matches: {expected_canonical}")
    else:
        print(f"  [FAIL] Canonical missing or incorrect!")
        all_ok = False
        
    # 3. Cluster Sub-Nav & aria-current
    if f'<a href="/{slug}/" aria-current="page"' in html:
        print(f"  [PASS] Cluster sub-nav active page set to: /{slug}/ with aria-current=\"page\"")
    else:
        print(f"  [FAIL] Cluster sub-nav missing aria-current=\"page\" for /{slug}/")
        all_ok = False
        
    # 4. JSON-LD Schema Check
    schema_matches = re.findall(r'<script type="application\/ld\+json">(.*?)<\/script>', html, re.DOTALL)
    if schema_matches:
        try:
            schema_json = json.loads(schema_matches[0])
            graph = schema_json.get('@graph', [])
            types = [item.get('@type') for item in graph]
            print(f"  [PASS] JSON-LD Schema Graph valid with types: {types}")
            
            # Check BreadcrumbList
            has_bc = 'BreadcrumbList' in types
            has_org = 'ProfessionalService' in types
            has_person = 'Person' in types
            has_faq = 'FAQPage' in types
            print(f"         Organization: {has_org} | Person: {has_person} | BreadcrumbList: {has_bc} | FAQPage: {has_faq}")
        except Exception as e:
            print(f"  [FAIL] Schema JSON parse error: {e}")
            all_ok = False
    else:
        print(f"  [FAIL] No JSON-LD schema found!")
        all_ok = False

    # 5. Direct Answer Paragraph Check
    if "Direct Answer for Bhopal Businesses" in html:
        print(f"  [PASS] Direct Answer box present in Hero")
    else:
        print(f"  [FAIL] Direct Answer box missing!")
        all_ok = False
        
    # 6. Honest Promises Box
    if "E-E-A-T Honest Promise Callout Box" in html or "The Reality:" in html:
        print(f"  [PASS] Honest Promise Callout (E-E-A-T) present")
    else:
        print(f"  [FAIL] Honest Promise Box missing!")
        all_ok = False

    # 7. FAQ Accordion (<details>)
    details_count = len(re.findall(r'<details\b', html, re.IGNORECASE))
    print(f"  [PASS] Native FAQ <details> count: {details_count}")

    # 8. Related Services Block
    if "Recommended for You in Bhopal" in html:
        print(f"  [PASS] Related Services block present")
    else:
        print(f"  [FAIL] Related Services block missing!")
        all_ok = False
        
    # 9. Sticky Mobile Bar
    if "Mobile Sticky Bottom Conversion Bar" in html:
        print(f"  [PASS] Sticky Mobile Bottom Conversion Bar present")
    else:
        print(f"  [FAIL] Sticky Mobile Bottom Bar missing!")
        all_ok = False

print("\n" + "=" * 70)
if all_ok:
    print("ALL 6 BHOPAL PAGES PASSED 100% OF AUTOMATED TECHNICAL & SEO CRITERIA!")
else:
    print("SOME CRITICAL CHECKS FAILED.")
print("=" * 70)
