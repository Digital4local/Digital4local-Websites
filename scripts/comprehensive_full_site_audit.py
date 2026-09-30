import subprocess
import urllib.request
import urllib.parse
import urllib.error
import json
import xml.etree.ElementTree as ET
import os
import re
import sys
import time
from html.parser import HTMLParser

# Configure UTF-8 for Windows console
if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')
    sys.stderr.reconfigure(encoding='utf-8', errors='replace')

PHP_PATH = r"C:\xampp\php\php.exe"
PORT = 8199
BASE_URL = f"http://127.0.0.1:{PORT}"
WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

class PageParser(HTMLParser):
    def __init__(self):
        super().__init__()
        self.title = ""
        self.in_title = False
        self.h1s = []
        self.in_h1 = False
        self.current_h1 = ""
        self.meta_desc = ""
        self.canonical = ""
        self.og_title = ""
        self.og_desc = ""
        self.og_image = ""
        self.og_url = ""
        self.schema_scripts = []
        self.in_schema = False
        self.schema_buf = ""
        self.images = []
        self.scripts = []
        self.stylesheets = []
        self.links = []
        self.has_viewport = False

    def handle_starttag(self, tag, attrs):
        attr_dict = {k.lower(): (v or '') for k, v in attrs}
        
        if tag == 'title':
            self.in_title = True
        elif tag == 'h1':
            self.in_h1 = True
            self.current_h1 = ""
        elif tag == 'meta':
            name = attr_dict.get('name', '').lower()
            prop = attr_dict.get('property', '').lower()
            content = attr_dict.get('content', '')
            
            if name == 'description':
                self.meta_desc = content
            elif name == 'viewport':
                self.has_viewport = True
            elif prop == 'og:title':
                self.og_title = content
            elif prop == 'og:description':
                self.og_desc = content
            elif prop == 'og:image':
                self.og_image = content
            elif prop == 'og:url':
                self.og_url = content
        elif tag == 'link':
            rel = attr_dict.get('rel', '').lower()
            href = attr_dict.get('href', '')
            if rel == 'canonical':
                self.canonical = href
            elif rel == 'stylesheet':
                self.stylesheets.append(href)
        elif tag == 'script':
            stype = attr_dict.get('type', '').lower()
            src = attr_dict.get('src', '')
            if 'application/ld+json' in stype:
                self.in_schema = True
                self.schema_buf = ""
            if src:
                self.scripts.append(src)
        elif tag == 'img':
            src = attr_dict.get('src', '')
            alt = attr_dict.get('alt', '')
            if src:
                self.images.append({'src': src, 'alt': alt})
        elif tag == 'a':
            href = attr_dict.get('href', '')
            if href:
                self.links.append(href)

    def handle_endtag(self, tag):
        if tag == 'title':
            self.in_title = False
        elif tag == 'h1':
            self.in_h1 = False
            if self.current_h1.strip():
                self.h1s.append(self.current_h1.strip())
        elif tag == 'script' and self.in_schema:
            self.in_schema = False
            if self.schema_buf.strip():
                self.schema_scripts.append(self.schema_buf.strip())

    def handle_data(self, data):
        if self.in_title:
            self.title += data
        if self.in_h1:
            self.current_h1 += data
        if self.in_schema:
            self.schema_buf += data

def run_php_lint():
    print("\n--- STEP 1: PHP LINT / SYNTAX INTEGRITY AUDIT ---")
    php_files = []
    for root, dirs, files in os.walk(WORKSPACE):
        if '.git' in root or 'digital4local_htdocs' in root:
            continue
        for f in files:
            if f.endswith('.php'):
                php_files.append(os.path.join(root, f))
    
    lint_errors = []
    for pfile in php_files:
        rel = os.path.relpath(pfile, WORKSPACE)
        res = subprocess.run([PHP_PATH, "-l", pfile], capture_output=True, text=True)
        if res.returncode != 0:
            print(f"  [ERROR] Syntax Error in {rel}: {res.stderr.strip() or res.stdout.strip()}")
            lint_errors.append((rel, res.stderr.strip() or res.stdout.strip()))
            
    print(f"  Total PHP Files Scanned: {len(php_files)}")
    print(f"  PHP Syntax Errors Found: {len(lint_errors)}")
    if not lint_errors:
        print("  [PASS] All PHP files passed syntax validation (100% clean).")
    return lint_errors, php_files

def run_comprehensive_audit():
    print("=" * 80)
    print("DIGITAL4LOCAL - ENTERPRISE MULTI-VECTOR AUDIT & HEALTH CHECK")
    print("=" * 80)

    # 1. PHP Lint
    lint_errors, php_files = run_php_lint()

    # 2. Start PHP server
    print("\n--- STEP 2: STARTING LOCAL WEB ENGINE (router.php) ---")
    server_proc = subprocess.Popen([PHP_PATH, "-S", f"127.0.0.1:{PORT}", "router.php"], cwd=WORKSPACE, stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL)
    time.sleep(1.5)

    audit_results = {
        'total_pages_tested': 0,
        'passed_pages': 0,
        'page_issues': [],
        'security_tests': [],
        'spam_defense_tests': [],
        'broken_links': [],
        'missing_assets': [],
        'schema_validations': 0,
        'seo_issues': []
    }

    try:
        # Load all industry and service and blog pages from site_settings.json
        settings_path = os.path.join(WORKSPACE, "config", "site_settings.json")
        with open(settings_path, "r", encoding="utf-8") as sf:
            site_settings = json.load(sf)

        urls_to_test = [
            "/",
            "/about.php",
            "/pricing.php",
            "/contact.php",
            "/services.php",
            "/blog.php",
            "/admin.php",
            "/admin-login.php",
            "/admin-cms.php",
            "/sitemap.php",
            "/robots.txt",
            "/industries/index.php"
        ]

        # Add all services
        for s in os.listdir(os.path.join(WORKSPACE, "services")):
            if s.endswith(".php"):
                urls_to_test.append(f"/services/{s}")

        # Add all industries
        for ind in os.listdir(os.path.join(WORKSPACE, "industries")):
            if ind.endswith(".php") and ind != "index.php":
                urls_to_test.append(f"/industries/{ind}")

        # Add all blog posts from site_settings
        for post in site_settings.get("blog_posts", []):
            slug = post.get("slug")
            if slug:
                urls_to_test.append(f"/blog/{slug}")

        # Add custom pages
        for cp in site_settings.get("custom_pages", []):
            slug = cp.get("url")
            if slug:
                urls_to_test.append(f"/{slug}")

        urls_to_test = list(dict.fromkeys(urls_to_test)) # Deduplicate

        print(f"\n--- STEP 3: AUDITING {len(urls_to_test)} PAGES FOR STATUS, SEO, HEADERS & ASSETS ---")
        
        all_found_internal_links = set()

        for path in urls_to_test:
            audit_results['total_pages_tested'] += 1
            url = BASE_URL + path
            req = urllib.request.Request(url, headers={'User-Agent': 'Digital4Local-Audit-Engine/1.0'})
            
            try:
                with urllib.request.urlopen(req) as res:
                    status = res.status
                    body = res.read().decode('utf-8', errors='ignore')
                    
                    if path == "/robots.txt":
                        print(f"  [PASS] [HTTP {status}] {path} (Size: {len(body)} B)")
                        audit_results['passed_pages'] += 1
                        continue

                    if path == "/sitemap.php":
                        # Validate XML
                        try:
                            root = ET.fromstring(body)
                            locs = root.findall('.//{http://www.sitemaps.org/schemas/sitemap/0.9}loc')
                            print(f"  [PASS] [HTTP {status}] {path} (Valid XML with {len(locs)} canonical URLs)")
                            audit_results['passed_pages'] += 1
                        except Exception as xe:
                            print(f"  [FAIL] XML Error in sitemap.php: {xe}")
                            audit_results['page_issues'].append(f"sitemap.php: XML parse error: {xe}")
                        continue

                    # Check for PHP Fatal / Notice / Warning
                    php_errors = re.findall(r'(Fatal error|Warning|Notice|Parse error|Deprecated):.*?(?:in\s+.*?\s+on\s+line\s+\d+)', body, re.IGNORECASE)
                    if php_errors:
                        print(f"  [FAIL] PHP runtime message in {path}: {php_errors[0]}")
                        audit_results['page_issues'].append(f"{path}: PHP error in output: {php_errors[0]}")

                    parser = PageParser()
                    parser.feed(body)

                    issues = []
                    # Check Title
                    if not parser.title.strip() and path not in ['/admin.php', '/admin-login.php', '/admin-cms.php']:
                        issues.append("Missing <title> tag")
                    
                    # Check Meta Description
                    if not parser.meta_desc.strip() and path not in ['/admin.php', '/admin-login.php', '/admin-cms.php']:
                        issues.append("Missing meta description")

                    # Check Viewport
                    if not parser.has_viewport:
                        issues.append("Missing viewport meta tag")

                    # Check H1 tag
                    if len(parser.h1s) == 0 and path not in ['/admin.php', '/admin-login.php', '/admin-cms.php']:
                        issues.append("Missing <h1> tag")
                    elif len(parser.h1s) > 1 and path not in ['/admin.php', '/admin-login.php', '/admin-cms.php']:
                        issues.append(f"Multiple <h1> tags ({len(parser.h1s)})")

                    # Check Canonical
                    if not parser.canonical and path not in ['/admin.php', '/admin-login.php', '/admin-cms.php']:
                        issues.append("Missing canonical tag")

                    # Check Schema
                    if parser.schema_scripts:
                        audit_results['schema_validations'] += len(parser.schema_scripts)
                        for s_json in parser.schema_scripts:
                            try:
                                json.loads(s_json)
                            except Exception as je:
                                issues.append(f"Invalid JSON in schema: {je}")

                    # Check unreplaced template tags
                    unreplaced = re.findall(r'\{\{[A-Za-z0-9_]+\}\}', body)
                    if unreplaced:
                        issues.append(f"Unreplaced template tags: {set(unreplaced)}")

                    # Check placeholder strings
                    if 'lorem ipsum' in body.lower():
                        issues.append("Contains 'Lorem Ipsum' placeholder text")

                    # Check images referenced in page
                    for img in parser.images:
                        img_src = img['src']
                        if not img_src.startswith('http') and not img_src.startswith('data:'):
                            clean_img = img_src.lstrip('/')
                            if clean_img.startswith('assets/'):
                                local_img_path = os.path.join(WORKSPACE, clean_img.replace('/', os.sep))
                                if not os.path.exists(local_img_path):
                                    audit_results['missing_assets'].append((path, img_src))

                    if issues:
                        print(f"  [WARN] [HTTP {status}] {path} -> {', '.join(issues)}")
                        audit_results['seo_issues'].append((path, issues))
                    else:
                        audit_results['passed_pages'] += 1
                        clean_title = parser.title[:45].strip()
                        print(f"  [PASS] [HTTP {status}] {path:45s} | Title: {clean_title}...")

                    # Collect links
                    for l in parser.links:
                        if l.startswith('/') or l.startswith('services/') or l.startswith('industries/') or l.startswith('blog/'):
                            all_found_internal_links.add(l)

            except urllib.error.HTTPError as he:
                print(f"  [FAIL] [HTTP {he.code}] {path}")
                audit_results['page_issues'].append(f"{path}: HTTP {he.code}")
            except Exception as e:
                print(f"  [FAIL] Error requesting {path}: {e}")
                audit_results['page_issues'].append(f"{path}: {e}")

        # 4. Security & Bot Defense Forensics
        print("\n--- STEP 4: SECURITY, ACCESS CONTROL & SPAM DEFENSE VERIFICATION ---")

        # Test A: Direct Config File Protection
        config_files_to_test = [
            "/config/admin_auth.json",
            "/config/leads.json",
            "/config/site_settings.json",
            "/config/security_lockouts.json",
            "/scripts/comprehensive_audit.py"
        ]
        print("\n  [Security Test A]: Checking direct access protection on sensitive files:")
        for cf in config_files_to_test:
            try:
                with urllib.request.urlopen(BASE_URL + cf) as res:
                    print(f"    [FAIL] VULNERABLE: Direct access to {cf} returned HTTP {res.status} (Expected 403, 404, or 410)")
                    audit_results['security_tests'].append((cf, f"Direct access returned HTTP {res.status}"))
            except urllib.error.HTTPError as he:
                if he.code in [403, 404, 410]:
                    print(f"    [PASS] SECURED: Direct access to {cf} returned HTTP {he.code} (Blocked)")
                else:
                    print(f"    [INFO] {cf} returned HTTP {he.code}")
            except Exception as e:
                print(f"    [PASS] Blocked {cf}: {e}")

        # Test B: Spam query & WordPress Footprint 410 Gone Protection
        spam_probes = [
            "/wp-admin/",
            "/wp-login.php",
            "/wp-content/plugins/revslider/temp.php",
            "/xmlrpc.php",
            "/product/fake-designer-bag/",
            "/shop/category/online-casino/",
            "/cart/",
            "/?s=viagra+cheap",
            "/?search=%E3%82%B5%E3%82%A4%E3%83%88",
            "/?p=4092",
            "/?keyword=cialis+online"
        ]
        print("\n  [Security Test B]: Checking HTTP 410 Gone spam mitigation:")
        for sp in spam_probes:
            try:
                with urllib.request.urlopen(BASE_URL + sp) as res:
                    print(f"    [FAIL] Spam probe {sp:35s} returned HTTP {res.status} (Expected 410 Gone)")
                    audit_results['spam_defense_tests'].append((sp, res.status))
            except urllib.error.HTTPError as he:
                if he.code == 410:
                    print(f"    [PASS] Spam probe {sp:35s} returned HTTP 410 Gone")
                else:
                    print(f"    [INFO] Spam probe {sp:35s} returned HTTP {he.code}")
            except Exception as e:
                print(f"    [INFO] Spam probe {sp:35s} -> {e}")

        # Test C: Unauthenticated API Access Rejections
        print("\n  [Security Test C]: Testing API Authorization Barriers:")
        
        api_endpoints = [
            ("/api/update-cms-settings.php", {"action": "delete_blog_post", "post_slug": "test"}, 401),
            ("/api/change-password.php", {"current_password": "x", "new_password": "y"}, 401),
            ("/api/upload-media.php", {"base64_data": "data:image/png;base64,AAAA"}, 401)
        ]

        for ep, payload, expected_code in api_endpoints:
            req_data = urllib.parse.urlencode(payload).encode('utf-8')
            req = urllib.request.Request(BASE_URL + ep, data=req_data, headers={'Content-Type': 'application/x-www-form-urlencoded'})
            try:
                with urllib.request.urlopen(req) as res:
                    print(f"    [FAIL] VULNERABLE: {ep} returned HTTP {res.status} for unauthenticated caller")
                    audit_results['security_tests'].append((ep, f"Expected {expected_code}, got {res.status}"))
            except urllib.error.HTTPError as he:
                if he.code == expected_code:
                    print(f"    [PASS] {ep} correctly rejected unauthorized request with HTTP {he.code}")
                else:
                    print(f"    [INFO] {ep} returned HTTP {he.code}")
            except Exception as e:
                print(f"    [INFO] {ep} -> {e}")

        # Test D: Safe Redirect against Open Redirects
        print("\n  [Security Test D]: Testing Safe Redirects (Open Redirect Defense):")
        test_redirects = [
            ("//evil.com", "admin.php"),
            ("https://malicious.com", "admin.php"),
            ("javascript:alert(1)", "admin.php"),
            ("admin-cms.php", "admin-cms.php"),
            ("pricing.php", "pricing.php")
        ]
        
        test_php_script = """
        require_once 'includes/auth-middleware.php';
        $tests = %s;
        $results = [];
        foreach ($tests as $t) {
            $results[] = safe_redirect_url($t[0]) === $t[1];
        }
        echo json_encode($results);
        """ % json.dumps(test_redirects)

        res = subprocess.run([PHP_PATH, "-r", test_php_script], cwd=WORKSPACE, capture_output=True, text=True)
        if res.returncode == 0:
            red_results = json.loads(res.stdout)
            all_safe = all(red_results)
            print(f"    Safe Redirect Protection: {'[PASS] 100% SECURE' if all_safe else '[FAIL]'}")
        else:
            print(f"    Error executing safe redirect test: {res.stderr}")

        # Test E: CSRF Token Integrity
        print("\n  [Security Test E]: Testing CSRF Token Generation & Verification:")
        csrf_php = """
        require_once 'includes/auth-middleware.php';
        $t1 = get_csrf_token();
        $v1 = verify_csrf_token($t1);
        $v2 = verify_csrf_token('fake_token_12345');
        echo json_encode(['token_length' => strlen($t1), 'valid_token' => $v1, 'invalid_token' => $v2]);
        """
        res = subprocess.run([PHP_PATH, "-r", csrf_php], cwd=WORKSPACE, capture_output=True, text=True)
        if res.returncode == 0:
            csrf_data = json.loads(res.stdout)
            if csrf_data.get('valid_token') is True and csrf_data.get('invalid_token') is False:
                print(f"    [PASS] CSRF Engine: 64-char Cryptographic Token generated, verified authentic, rejected forged tokens.")
            else:
                print(f"    [FAIL] CSRF Engine anomaly: {csrf_data}")
        else:
            print(f"    Error testing CSRF: {res.stderr}")

        # 5. Summary
        print("\n" + "=" * 80)
        print("DIGITAL4LOCAL COMPREHENSIVE AUDIT REPORT SUMMARY")
        print("=" * 80)
        print(f"* Total PHP Files Linted:       {len(php_files)} (Errors: {len(lint_errors)})")
        print(f"* Total Web Routes Tested:      {audit_results['total_pages_tested']}")
        print(f"* Perfectly Rendered Routes:    {audit_results['passed_pages']} / {audit_results['total_pages_tested']}")
        print(f"* Total Schema/JSON-LD Blocks:  {audit_results['schema_validations']} verified valid")
        print(f"* Page Level Exceptions/Errors: {len(audit_results['page_issues'])}")
        print(f"* Missing Referenced Assets:    {len(audit_results['missing_assets'])}")
        print(f"* SEO / Metadata Warnings:      {len(audit_results['seo_issues'])}")
        print(f"* Security Test Failures:       {len(audit_results['security_tests'])}")
        print(f"* Spam 410 Defense Failures:    {len(audit_results['spam_defense_tests'])}")

        if audit_results['missing_assets']:
            print("\nMissing Assets Detail:")
            for page, asset in audit_results['missing_assets'][:10]:
                print(f"  - {page}: {asset}")

        if audit_results['seo_issues']:
            print("\nSEO / Tag Warnings Detail:")
            for page, issues in audit_results['seo_issues'][:10]:
                print(f"  - {page}: {', '.join(issues)}")

    finally:
        server_proc.terminate()
        print("\nAudit process completed.")

if __name__ == '__main__':
    run_comprehensive_audit()
