import urllib.request
import urllib.parse
import urllib.error
import ssl
import sys
import subprocess
import time

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')

ctx = ssl.create_default_context()

sample_spam_urls = [
    "https://digital4local.com/item/35373102415151.htm",
    "https://digital4local.com/item/9593785",
    "https://digital4local.com/items/Z331286364/",
    "https://digital4local.com/shop/pg/42096214-1",
    "https://digital4local.com/comment.php?item/580676248",
    "https://digital4local.com/cate-13-2348",
    "https://digital4local.com/special/179049324.html",
    "https://digital4local.com/r32054776445557/",
    "https://digital4local.com/s11206964618609/",
    "https://digital4local.com/pants/4898499",
    "https://digital4local.com/shoes/7061712",
    "https://digital4local.com/nail-tips/4197879",
    "https://digital4local.com/shop/customer/menu"
]

legitimate_urls = [
    "https://digital4local.com/",
    "https://digital4local.com/services.php",
    "https://digital4local.com/portfolio.php",
    "https://digital4local.com/case-studies.php",
    "https://digital4local.com/pricing.php",
    "https://digital4local.com/about.php",
    "https://digital4local.com/contact.php",
    "https://digital4local.com/blog.php",
    "https://digital4local.com/services/local-seo.php",
    "https://digital4local.com/industries/solar-installers-seo.php",
    "https://digital4local.com/robots.txt",
    "https://digital4local.com/llms.txt",
    "https://digital4local.com/sitemap.xml"
]

print("=" * 80)
print("TESTING SPAM URLS ON LIVE PRODUCTION SERVER (https://digital4local.com)")
print("=" * 80)

for url in sample_spam_urls:
    req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36"})
    try:
        with urllib.request.urlopen(req, context=ctx, timeout=10) as res:
            print(f"  • {url:60s} -> HTTP {res.status}")
    except urllib.error.HTTPError as he:
        print(f"  • {url:60s} -> HTTP {he.code} ({he.reason})")
    except Exception as e:
        print(f"  • {url:60s} -> Error: {e}")

print("\n" + "=" * 80)
print("TESTING LEGITIMATE SITE PAGES ON LIVE SERVER")
print("=" * 80)

for url in legitimate_urls:
    req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36"})
    try:
        with urllib.request.urlopen(req, context=ctx, timeout=10) as res:
            print(f"  • {url:60s} -> HTTP {res.status} [OK]")
    except urllib.error.HTTPError as he:
        print(f"  • {url:60s} -> HTTP {he.code} [FAILED]")
    except Exception as e:
        print(f"  • {url:60s} -> Error: {e}")
