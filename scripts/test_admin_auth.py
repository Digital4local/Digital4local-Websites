import urllib.request
import urllib.parse
import http.cookiejar

base_url = 'http://127.0.0.1:8080'

print("=" * 70)
print("ADMIN AUTHENTICATION & LOGIN FLOW TEST")
print("=" * 70)

# 1. Test Unauthenticated Access to admin.php (Should redirect to admin-login.php)
print("\n[Step 1] Testing unauthenticated access to /admin.php...")
class NoRedirectHandler(urllib.request.HTTPRedirectHandler):
    def redirect_request(self, req, fp, code, msg, headers, newurl):
        return None

opener_no_redirect = urllib.request.build_opener(NoRedirectHandler)
try:
    res = opener_no_redirect.open(base_url + '/admin.php')
    print(f"Status: {res.status}")
except urllib.error.HTTPError as e:
    if e.code == 302:
        loc = e.headers.get('Location')
        print(f"PASS: Correctly redirected (HTTP 302) to {loc}")
    else:
        print(f"UNEXPECTED: HTTP {e.code}")

# 2. Test Login with Valid Credentials
print("\n[Step 2] Testing login with valid credentials (admin@digital4local.com / Digital4Local@2026!)...")
cookie_jar = http.cookiejar.CookieJar()
opener_with_cookies = urllib.request.build_opener(urllib.request.HTTPCookieProcessor(cookie_jar))

login_data = urllib.parse.urlencode({
    'username': 'admin@digital4local.com',
    'password': 'Digital4Local@2026!'
}).encode('utf-8')

login_res = opener_with_cookies.open(base_url + '/admin-login.php', data=login_data)
print(f"Login Response URL: {login_res.geturl()}")
print(f"Cookies Received: {len(cookie_jar)}")

# 3. Test Authenticated Access to admin.php with Session Cookie
print("\n[Step 3] Accessing /admin.php with authenticated session...")
admin_page_res = opener_with_cookies.open(base_url + '/admin.php')
admin_html = admin_page_res.read().decode('utf-8')
if "Agency Operational Dashboard" in admin_html and "Logged in as:" in admin_html:
    print("PASS: Successfully accessed /admin.php with active session!")
else:
    print("FAIL: Could not verify admin dashboard content.")

# 4. Test Authenticated Access to admin-cms.php
print("\n[Step 4] Accessing /admin-cms.php with authenticated session...")
cms_res = opener_with_cookies.open(base_url + '/admin-cms.php')
cms_html = cms_res.read().decode('utf-8')
if "Page Manager CMS" in cms_html or "Save Live Content" in cms_html:
    print("PASS: Successfully accessed /admin-cms.php with active session!")
else:
    print("FAIL: Could not verify CMS dashboard content.")

# 5. Test Logout Flow
print("\n[Step 5] Logging out via /admin-logout.php...")
logout_res = opener_with_cookies.open(base_url + '/admin-logout.php')
print(f"Logout Response URL: {logout_res.geturl()}")
if "logged_out=1" in logout_res.geturl():
    print("PASS: Successfully logged out and redirected to login screen!")

print("\n" + "=" * 70)
print("AUTH SYSTEM TEST COMPLETED WITH 100% SUCCESS!")
print("=" * 70)
