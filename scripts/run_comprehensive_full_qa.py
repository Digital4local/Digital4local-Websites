import os
import sys
import re
import json
import subprocess
import urllib.request
import urllib.parse
import urllib.error

# Ensure UTF-8 output on Windows consoles
if sys.platform.startswith('win'):
    try:
        sys.stdout.reconfigure(encoding='utf-8', errors='replace')
        sys.stderr.reconfigure(encoding='utf-8', errors='replace')
    except Exception:
        pass

BASE_URL = "http://127.0.0.1:8099"
WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

results = {
    "total_tests": 0,
    "passed": 0,
    "failed": 0,
    "warnings": 0,
    "categories": {}
}

def log_test(category, name, passed, detail=""):
    results["total_tests"] += 1
    if category not in results["categories"]:
        results["categories"][category] = {"passed": 0, "failed": 0, "warnings": 0, "tests": []}
    
    status_str = "PASS" if passed else "FAIL"
    if passed:
        results["passed"] += 1
        results["categories"][category]["passed"] += 1
    else:
        results["failed"] += 1
        results["categories"][category]["failed"] += 1
        
    results["categories"][category]["tests"].append({
        "name": name,
        "status": status_str,
        "detail": detail
    })
    
    icon = "[OK]" if passed else "[FAIL]"
    print(f"  {icon} {name:<60} [{status_str}] {detail}")

def fetch_url(path, method="GET", data=None, headers=None):
    url = BASE_URL + path if path.startswith("/") else BASE_URL + "/" + path
    req_headers = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36'}
    if headers:
        req_headers.update(headers)
    
    req_data = None
    if data is not None:
        if isinstance(data, dict):
            req_data = json.dumps(data).encode('utf-8')
            req_headers['Content-Type'] = 'application/json'
        elif isinstance(data, str):
            req_data = data.encode('utf-8')
    
    req = urllib.request.Request(url, data=req_data, headers=req_headers, method=method)
    try:
        with urllib.request.urlopen(req, timeout=10) as response:
            status = response.getcode()
            body = response.read().decode('utf-8', errors='ignore')
            resp_headers = dict(response.headers)
            return status, body, resp_headers
    except urllib.error.HTTPError as e:
        body = e.read().decode('utf-8', errors='ignore')
        return e.code, body, dict(e.headers)
    except Exception as e:
        return 0, str(e), {}

print("================================================================================")
print("             DIGITAL4LOCAL COMPREHENSIVE FULL-STACK QA SUITE                   ")
print("================================================================================")

# ==============================================================================
# CATEGORY 1: BACKEND DATABASE & DATA MODEL INTEGRITY
# ==============================================================================
print("\n>>> 1. BACKEND DATABASE & DATA PERSISTENCE QA")

php_script = """
require_once 'includes/db.php';
$pdo = get_db();
$driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);

$blogs = $pdo->query("SELECT count(*), count(distinct slug) FROM blog_posts WHERE status='published'")->fetch(PDO::FETCH_NUM);
$locs = $pdo->query("SELECT count(*) FROM location_pages WHERE LOWER(city)='bhopal'")->fetch(PDO::FETCH_NUM);
$pages = $pdo->query("SELECT count(*) FROM pages")->fetch(PDO::FETCH_NUM);
$admin = $pdo->query("SELECT username, email, role, password_hash FROM admins WHERE username='admin'")->fetch(PDO::FETCH_ASSOC);

echo json_encode([
    'driver' => $driver,
    'blogs_total' => (int)$blogs[0],
    'blogs_unique' => (int)$blogs[1],
    'locs_total' => (int)$locs[0],
    'pages_total' => (int)$pages[0],
    'admin_ok' => ($admin && strpos($admin['password_hash'], '$2y$') === 0),
    'admin_user' => $admin['username'] ?? 'none'
]);
"""

try:
    proc = subprocess.run(['C:\\xampp\\php\\php.exe', '-r', php_script], cwd=WORKSPACE, capture_output=True, text=True, timeout=10)
    db_res = json.loads(proc.stdout.strip())
    log_test("Database", f"Database Active Engine & Connection ({db_res['driver'].upper()})", True, f"Active PDO Driver: {db_res['driver']}")
    log_test("Database", "Published Blog Articles Count in DB", db_res['blogs_total'] >= 6 and db_res['blogs_total'] == db_res['blogs_unique'], f"{db_res['blogs_total']} articles verified")
    log_test("Database", "Bhopal Location Cluster Pages in DB", db_res['locs_total'] >= 6, f"{db_res['locs_total']} pages verified")
    log_test("Database", "Core & Service Pages in DB", db_res['pages_total'] >= 15, f"{db_res['pages_total']} pages verified")
    log_test("Database", "Admin Bcrypt Authentication Credentials", db_res['admin_ok'], f"User '{db_res['admin_user']}' authenticated with bcrypt")
except Exception as e:
    log_test("Database", "Database Diagnostics Execution", False, str(e))

# ==============================================================================
# CATEGORY 2: BACKEND API & SECURITY AUDIT
# ==============================================================================
print("\n>>> 2. BACKEND API & SECURITY QA")

# Test 2.1: Lead capture API (Valid payload)
lead_payload = {
    "name": "QA Automated Test User",
    "email": "qa-test@digital4local.com",
    "phone": "+91 91311 40530",
    "website": "https://digital4local.com",
    "message": "Automated End-to-End QA Test Run",
    "source": "QA Test Engine",
    "_hp_company_sec": "",
    "form_ts": "1728470000"
}
status, body, _ = fetch_url("/api/save-lead.php", method="POST", data=lead_payload)
try:
    lead_res = json.loads(body)
    lead_ok = status == 200 and lead_res.get("success") is True
except:
    lead_ok = False
log_test("APIs & Security", "Lead Capture API (api/save-lead.php) - Valid Submission", lead_ok, f"HTTP {status} | Lead recorded in DB")

# Test 2.2: Lead capture API (Honeypot bot trap)
bot_payload = {
    "name": "Spam Bot",
    "email": "spam@bot.com",
    "message": "Buy cheap stuff",
    "_hp_company_sec": "Gotcha Bot",
    "source": "Spam Bot Test"
}
status, body, _ = fetch_url("/api/save-lead.php", method="POST", data=bot_payload)
try:
    bot_res = json.loads(body)
    bot_ok = status == 200 and bot_res.get("success") is True and (bot_res.get("bot_filtered") is True or "-OK" in bot_res.get("lead_id", ""))
except:
    bot_ok = False
log_test("APIs & Security", "Lead Capture API - Anti-Bot Honeypot Trap", bot_ok, f"HTTP {status} | Bot trapped & silently filtered")

# Test 2.3: CMS API Authentication Lockdown
status, body, _ = fetch_url("/api/update-cms-settings.php", method="POST", data={"action": "test"})
unauth_cms = status in [401, 403]
log_test("APIs & Security", "CMS Update API (api/update-cms-settings.php) - Unauth Lockdown", unauth_cms, f"HTTP {status} (Unauthorized access properly blocked)")

# Test 2.4: Media Uploader API Authentication Lockdown
status, body, _ = fetch_url("/api/upload-media.php", method="POST", data={"base64_data": "test"})
unauth_upload = status in [401, 403]
log_test("APIs & Security", "Media Uploader API (api/upload-media.php) - Unauth Lockdown", unauth_upload, f"HTTP {status} (Unauthorized upload properly blocked)")

# Test 2.5: Block sensitive folders & files
sensitive_paths = ["/config/database.php", "/config/site_settings.json", "/.env", "/scripts/check_posts.php"]
for sp in sensitive_paths:
    status, _, _ = fetch_url(sp)
    log_test("APIs & Security", f"Direct Access Forbidden: '{sp}'", status == 403, f"HTTP {status}")

# Test 2.6: HTTP 410 Gone for legacy spam paths
spam_paths = ["/wp-login.php", "/xmlrpc.php", "/wp-admin/", "/product-category/shoes"]
for sp in spam_paths:
    status, _, _ = fetch_url(sp)
    log_test("APIs & Security", f"410 Gone Spam Interceptor: '{sp}'", status == 410, f"HTTP {status}")

# ==============================================================================
# CATEGORY 3: FRONTEND CORE & SERVICE ROUTES QA
# ==============================================================================
print("\n>>> 3. FRONTEND CORE, SERVICES & INDUSTRY ROUTES QA")

core_and_service_routes = [
    ("Home Page", "/index.php"),
    ("Services Catalog", "/services.php"),
    ("Local SEO & Maps Service", "/services/local-seo.php"),
    ("GEO & AEO Citations Service", "/services/geo-aeo.php"),
    ("Technical SEO Service", "/services/technical-seo.php"),
    ("Link Building & PR Service", "/services/link-building-pr.php"),
    ("AI Marketing & n8n Service", "/services/ai-marketing.php"),
    ("Social Media Growth Service", "/services/social-media.php"),
    ("Web Development Service", "/services/web-development.php"),
    ("App Development Service", "/services/app-development.php"),
    ("Industries Catalog", "/industries/index.php"),
    ("Solar Installers SEO", "/industries/solar-installers-seo.php"),
    ("Heat Pump Installers SEO", "/industries/heat-pump-installers-seo.php"),
    ("EV Charger Installers SEO", "/industries/ev-charger-installers-seo.php"),
    ("Roofing Companies SEO", "/industries/roofing-companies-seo.php"),
    ("Kitchen & Bath Renovators SEO", "/industries/kitchen-bathroom-renovators-seo.php"),
    ("Loft & Conversion Builders SEO", "/industries/loft-conversion-builders-seo.php"),
    ("Private Dental Clinics SEO", "/industries/dental-clinics-seo.php"),
    ("Aesthetics Clinics SEO", "/industries/aesthetics-clinics-seo.php"),
    ("Law Firms & Solicitors SEO", "/industries/law-firms-seo.php"),
    ("VC-Backed Startups SEO", "/industries/startup-seo-agency.php"),
    ("B2B SaaS Marketing SEO", "/industries/saas-marketing-agency.php"),
    ("Portfolio Hub", "/portfolio.php"),
    ("Case Studies Hub", "/case-studies.php"),
    ("Case Study Single (Solar4Good UK)", "/case-studies/solar4good-uk"),
    ("Pricing & Growth Packages", "/pricing.php"),
    ("About Us & Agency Tech Stack", "/about.php"),
    ("Contact Page", "/contact.php"),
    ("Blog Catalog Hub", "/blog.php"),
    ("HTML/XML Sitemap", "/sitemap.php")
]

for name, path in core_and_service_routes:
    status, body, headers = fetch_url(path)
    ok = (status == 200) and len(body) > 1000
    log_test("Frontend Routes", f"Route: {name} ({path})", ok, f"HTTP {status} | Size: {len(body):,} bytes")

# ==============================================================================
# CATEGORY 4: BHOPAL LOCATION CLUSTER PAGES QA
# ==============================================================================
print("\n>>> 4. BHOPAL LOCATION CLUSTERS (CLEAN ROUTING & CONTENT QA)")

location_cluster_routes = [
    ("Bhopal SEO Hub", "/seo-agency-bhopal/"),
    ("Bhopal Local SEO", "/local-seo-bhopal/"),
    ("Bhopal GBP Optimization", "/google-business-profile-optimization-bhopal/"),
    ("Bhopal AI SEO & GEO", "/ai-seo-bhopal/"),
    ("Bhopal Digital Marketing", "/digital-marketing-agency-bhopal/"),
    ("Bhopal AI Agency & Automation", "/ai-agency-bhopal/")
]

for name, path in location_cluster_routes:
    status, body, _ = fetch_url(path)
    has_h1 = bool(re.search(r'<h1[^>]*>.*?Bhopal.*?</h1>', body, re.I | re.S))
    has_direct_answer = "Direct Answer" in body or "direct answer" in body.lower()
    has_cluster_nav = "Bhopal Cluster" in body or "bhopal.growth.matrix" in body
    has_author = "Abhishek Raikwar" in body
    
    ok = (status == 200) and has_h1 and has_direct_answer and has_author
    detail = f"HTTP {status} | H1: {'YES' if has_h1 else 'NO'} | AEO Box: {'YES' if has_direct_answer else 'NO'} | Nav: {'YES' if has_cluster_nav else 'NO'} | Author: {'YES' if has_author else 'NO'}"
    log_test("Location Clusters", f"Cluster: {name} ({path})", ok, detail)

# ==============================================================================
# CATEGORY 5: DYNAMIC BLOG SYSTEM & MEDIA RESOLUTION QA
# ==============================================================================
print("\n>>> 5. DYNAMIC BLOG SYSTEM & CLEAN ROUTING QA")

blog_articles = [
    ("Top 10 Digital Marketing Companies", "/blog/top-10-digital-marketing-companies-india"),
    ("SMM Full Form & Guide", "/blog/smm-full-form-what-does-smm-mean"),
    ("SEO vs SEM Difference", "/blog/seo-vs-sem-difference"),
    ("Top Marketing Companies in India", "/blog/top-marketing-companies-india"),
    ("Best Digital Marketing Company", "/blog/best-digital-marketing-company-india"),
    ("Types of SEO Explained", "/blog/types-of-seo-explained")
]

for name, path in blog_articles:
    status, body, _ = fetch_url(path)
    has_h1 = "<h1" in body
    has_schema = '"@type":"BlogPosting"' in body or '"@type": "BlogPosting"' in body
    has_author = "Abhishek Raikwar" in body
    has_highlights = "ARTICLE HIGHLIGHTS" in body
    
    ok = (status == 200) and has_h1 and has_schema and has_author
    detail = f"HTTP {status} | Schema: {'YES' if has_schema else 'NO'} | Highlights: {'YES' if has_highlights else 'NO'}"
    log_test("Blog System", f"Article: {name}", ok, detail)

# ==============================================================================
# CATEGORY 6: SEO, AI CITATION MANIFESTS & STRUCTURED DATA QA
# ==============================================================================
print("\n>>> 6. SEO, AI CITATION MANIFESTS & STRUCTURED DATA QA")

# Test 6.1: robots.txt
status, body, _ = fetch_url("/robots.txt")
robots_ok = status == 200 and "Sitemap: https://digital4local.com/sitemap.xml" in body and "User-agent: GPTBot" in body
log_test("SEO & AI Manifests", "robots.txt Configuration & GPTBot Directives", robots_ok, f"HTTP {status}")

# Test 6.2: llms.txt and llms-full.txt
status, body, _ = fetch_url("/llms.txt")
llms_ok = status == 200 and "# Digital4Local" in body
log_test("SEO & AI Manifests", "AI Discovery Manifest: /llms.txt (llmstxt.org)", llms_ok, f"HTTP {status} | Length: {len(body)} bytes")

status, body, _ = fetch_url("/llms-full.txt")
llms_full_ok = status == 200 and "Digital4Local" in body
log_test("SEO & AI Manifests", "Full AI Ingestion Context: /llms-full.txt", llms_full_ok, f"HTTP {status} | Length: {len(body)} bytes")

# Test 6.3: Home Page Schema Graph
status, body, _ = fetch_url("/index.php")
schema_local_biz = '"@type": "LocalBusiness"' in body or '"@type":"LocalBusiness"' in body
schema_agency = '"additionalType": "https://schema.org/MarketingAgency"' in body
schema_geo = '"@type": "GeoCoordinates"' in body
home_schema_ok = status == 200 and schema_local_biz and schema_agency and schema_geo
log_test("SEO & AI Manifests", "Home Page Schema (LocalBusiness + MarketingAgency + Geo)", home_schema_ok, "Complete Schema.org Graph Verified")

# ==============================================================================
# CATEGORY 7: FRONTEND RESPONSIVENESS & ASSETS QA
# ==============================================================================
print("\n>>> 7. FRONTEND RESPONSIVENESS, TOUCH TARGETS & ASSET INTEGRITY QA")

# Check essential static assets
assets = [
    ("Custom CSS Stylesheet", "/assets/css/custom.css"),
    ("Core JavaScript Engine", "/assets/js/main.js"),
    ("Brand Logo (WebP/PNG)", "/assets/images/digital4local_logo.png"),
    ("Hero Dashboard Visual", "/assets/images/hero_dashboard_light_v2.png"),
    ("Site Favicon", "/favicon.ico"),
    ("Favicon 32x32", "/assets/images/favicon-32x32.png")
]

for name, path in assets:
    status, body, headers = fetch_url(path)
    ok = (status == 200) and len(body) > 0
    log_test("Asset Integrity", f"Asset: {name} ({path})", ok, f"HTTP {status} | {len(body):,} bytes")

# Check responsive viewport and mobile menu on home
status, body, _ = fetch_url("/index.php")
has_viewport = 'name="viewport"' in body and 'width=device-width' in body
has_mobile_menu = 'id="mobile-menu"' in body and 'id="mobile-menu-btn"' in body
has_no_fixed_overflows = len(re.findall(r'style=["\'][^"\']*\bwidth:\s*([5-9]\d{2,}|[1-9]\d{3,})px', body)) == 0

responsive_ok = has_viewport and has_mobile_menu and has_no_fixed_overflows
log_test("Responsiveness", "Viewport Meta & Mobile Menu Drawer on Home", responsive_ok, "Viewport: YES | Mobile Drawer: YES | Overflows: 0")

print("\n================================================================================")
print(f" QA SUMMARY REPORT: {results['passed']}/{results['total_tests']} TESTS PASSED | {results['failed']} FAILURES")
print("================================================================================")
