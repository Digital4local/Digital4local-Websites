import urllib.request
import json
import re

urls = [
    "https://digital4local.com/",
    "https://digital4local.com/index.php",
    "https://digital4local.com/services/local-seo.php",
    "https://digital4local.com/services/geo-aeo.php",
    "https://digital4local.com/pricing.php",
    "https://digital4local.com/about.php",
    "https://digital4local.com/contact.php",
    "https://digital4local.com/blog.php",
    "https://digital4local.com/industries/law-firms-seo.php"
]

print("CHECKING LIVE SERVER (HOSTINGER) FOR SCHEMA UPDATES:")
for url in urls:
    try:
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'})
        html = urllib.request.urlopen(req, timeout=10).read().decode('utf-8')
        schemas = re.findall(r'<script type="application/ld\+json">(.*?)</script>', html, re.DOTALL)
        print(f"\nURL: {url}")
        print(f"Total Schema blocks found in live response: {len(schemas)}")
        for idx, s in enumerate(schemas):
            try:
                data = json.loads(s.strip())
                stype = data.get('@type') or (data.get('@graph')[0].get('@type') if '@graph' in data else 'Unknown')
                print(f"  [{idx+1}] @type: {stype}")
            except Exception as e:
                print(f"  [{idx+1}] Parse Error: {e}")
    except Exception as e:
        print(f"\nURL: {url} -> ERROR: {e}")
