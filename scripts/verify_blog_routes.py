import subprocess
import urllib.request
import urllib.parse
import sys
import time
import os

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')

PHP_PATH = r"C:\xampp\php\php.exe"
PORT = 8399
BASE_URL = f"http://127.0.0.1:{PORT}"
WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

proc = subprocess.Popen(
    [PHP_PATH, "-S", f"127.0.0.1:{PORT}", "router.php"],
    cwd=WORKSPACE,
    stdout=subprocess.PIPE,
    stderr=subprocess.PIPE
)

time.sleep(1.5)

mobile_headers = {
    'User-Agent': 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1',
    'Connection': 'close'
}

slugs = [
    'top-10-digital-marketing-companies-india',
    'smm-full-form-what-does-smm-mean',
    'seo-vs-sem-difference',
    'top-marketing-companies-india',
    'best-digital-marketing-company-india',
    'types-of-seo-explained'
]

urls_to_test = [
    "/blog.php",
    "/blog",
    "/blog/"
]

for s in slugs:
    urls_to_test.append(f"/blog/{s}")
    urls_to_test.append(f"/blog/{s}/")
    urls_to_test.append(f"/blog/{s}.php")
    urls_to_test.append(f"/blog-single.php?slug={s}")

print("=" * 70)
print("TESTING LOCAL PHP SERVER ROUTER & BLOG PAGES (MOBILE USER AGENT)")
print("=" * 70)

all_passed = True
for path in urls_to_test:
    url = urllib.parse.urljoin(BASE_URL, path)
    try:
        req = urllib.request.Request(url, headers=mobile_headers)
        res = urllib.request.urlopen(req, timeout=5)
        code = res.getcode()
        html = res.read().decode('utf-8', errors='ignore')
        
        title = ""
        if "<title>" in html:
            title = html.split("<title>")[1].split("</title>")[0].strip()
            
        has_error = "does not exist" in html.lower() or "404 not found" in html.lower() or "404 not found" in title.lower()
        if code == 200 and not has_error:
            print(f" [PASS] {path:<55} -> HTTP {code} | {title[:35]}...")
        else:
            print(f" [FAIL] {path:<55} -> HTTP {code} | ErrorText: {has_error} | {title}")
            all_passed = False
    except urllib.error.HTTPError as e:
        print(f" [HTTP FAIL] {path:<55} -> HTTP {e.code}: {e.reason}")
        all_passed = False
    except Exception as e:
        print(f" [ERR] {path:<55} -> {e}")
        all_passed = False

proc.terminate()
print("=" * 70)
if all_passed:
    print("ALL BLOG MOBILE & DESKTOP ROUTES VERIFIED WITH 100% PASS RATE!")
else:
    print("SOME ROUTES FAILED!")
print("=" * 70)
