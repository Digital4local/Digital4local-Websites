import urllib.request

urls = [
    "http://127.0.0.1:8099/assets/images/uploads/upload_20261008_124142_dfc95b52.jpeg",
    "http://127.0.0.1:8099/blog-single.php?slug=top-10-digital-marketing-companies-india",
    "http://127.0.0.1:8099/admin-cms.php",
]

for url in urls:
    try:
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
        with urllib.request.urlopen(req) as response:
            print(f"{url} -> HTTP {response.getcode()} (length: {len(response.read())})")
    except Exception as e:
        print(f"{url} -> ERROR: {e}")
