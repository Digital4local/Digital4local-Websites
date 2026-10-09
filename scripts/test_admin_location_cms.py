import urllib.request
import urllib.parse
import json
import http.cookiejar

BASE = "http://127.0.0.1:8099"

# 1. Test Admin CMS with mock session or cookie
cj = http.cookiejar.CookieJar()
opener = urllib.request.build_opener(urllib.request.HTTPCookieProcessor(cj))

# First login to admin to establish session
login_url = f"{BASE}/admin-login.php"
login_data = urllib.parse.urlencode({
    'username': 'admin',
    'password': 'password123'
}).encode('utf-8')

print("1. Logging into Admin Panel...")
try:
    req = urllib.request.Request(login_url, data=login_data, headers={'User-Agent': 'Mozilla/5.0'})
    with opener.open(req) as resp:
        print(f"Login Response: HTTP {resp.status}")
except Exception as e:
    print(f"Login Note: {e}")

# 2. Test accessing location page in admin-cms.php
for slug in ['seo-agency-bhopal', 'local-seo-bhopal', 'google-business-profile-optimization-bhopal', 'ai-seo-bhopal', 'digital-marketing-agency-bhopal', 'ai-agency-bhopal']:
    url = f"{BASE}/admin-cms.php?page=location_{slug}"
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
    try:
        with opener.open(req) as resp:
            html = resp.read().decode('utf-8')
            has_hero = 'tab-pane-loc_hero' in html
            has_sec = 'tab-pane-loc_sections' in html
            has_seo = 'tab-pane-loc_seo' in html
            has_auth = 'tab-pane-loc_author' in html
            has_faqs = 'tab-pane-faqs' in html
            print(f"Admin CMS [/admin-cms.php?page=location_{slug}] -> HTTP {resp.status}, Hero: {has_hero}, Sections: {has_sec}, FAQs: {has_faqs}, SEO: {has_seo}, Author: {has_auth}")
    except Exception as e:
        print(f"Admin CMS Error for {slug}: {e}")

print("\n2. Testing Location Page Live Rendering...")
for slug in ['seo-agency-bhopal', 'local-seo-bhopal', 'google-business-profile-optimization-bhopal', 'ai-seo-bhopal', 'digital-marketing-agency-bhopal', 'ai-agency-bhopal']:
    url = f"{BASE}/{slug}/"
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
    try:
        with opener.open(req) as resp:
            html = resp.read().decode('utf-8')
            print(f"Page [/{slug}/] -> HTTP {resp.status}, Size: {len(html)} bytes")
    except Exception as e:
        print(f"Live page Error for {slug}: {e}")

print("\nAudit complete!")
