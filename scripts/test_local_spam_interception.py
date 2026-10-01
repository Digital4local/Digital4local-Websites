import urllib.request
import urllib.parse
import urllib.error
import subprocess
import time
import sys

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')

sample_spam_paths = [
    "/item/35373102415151.htm",
    "/item/9593785",
    "/items/Z331286364/",
    "/shop/pg/42096214-1",
    "/comment.php?item/580676248",
    "/cate-13-2348",
    "/special/179049324.html",
    "/r32054776445557/",
    "/s11206964618609/",
    "/pants/4898499",
    "/shoes/7061712",
    "/nail-tips/4197879",
    "/shop/customer/menu",
    "/index.php?item/12345"
]

legit_paths = [
    "/",
    "/services.php",
    "/portfolio.php",
    "/case-studies.php",
    "/pricing.php",
    "/about.php",
    "/contact.php",
    "/blog.php",
    "/robots.txt",
    "/llms.txt",
    "/sitemap.xml"
]

print("Starting local PHP built-in server with router.php...")
proc = subprocess.Popen(
    ["C:\\xampp\\php\\php.exe", "-S", "127.0.0.1:8999", "router.php"],
    cwd=r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity",
    stdout=subprocess.PIPE,
    stderr=subprocess.PIPE
)

time.sleep(1.5)

try:
    print("=" * 80)
    print("TESTING LOCAL PHP ROUTER ON SPAM PATTERNS")
    print("=" * 80)
    for path in sample_spam_paths:
        url = f"http://127.0.0.1:8999{path}"
        req = urllib.request.Request(url, headers={"User-Agent": "curl/7.88.1"})
        try:
            with urllib.request.urlopen(req, timeout=5) as res:
                print(f"  • {path:40s} -> HTTP {res.status}")
        except urllib.error.HTTPError as he:
            print(f"  • {path:40s} -> HTTP {he.code} (Expected 410 Gone: {he.code == 410})")
        except Exception as e:
            print(f"  • {path:40s} -> Error: {e}")

    print("\n" + "=" * 80)
    print("TESTING LOCAL PHP ROUTER ON LEGITIMATE PAGES")
    print("=" * 80)
    for path in legit_paths:
        url = f"http://127.0.0.1:8999{path}"
        req = urllib.request.Request(url, headers={"User-Agent": "curl/7.88.1"})
        try:
            with urllib.request.urlopen(req, timeout=5) as res:
                print(f"  • {path:40s} -> HTTP {res.status} [PASS]")
        except urllib.error.HTTPError as he:
            print(f"  • {path:40s} -> HTTP {he.code} [FAIL]")
        except Exception as e:
            print(f"  • {path:40s} -> Error: {e}")
finally:
    proc.terminate()
    proc.wait()
    print("\nPHP server stopped.")
