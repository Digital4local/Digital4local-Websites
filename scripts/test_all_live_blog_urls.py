import urllib.request
import ssl
import sys

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')

ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

headers = {
    'User-Agent': 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1',
    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
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

urls = [
    "https://digital4local.com/blog.php",
    "https://digital4local.com/blog",
    "https://digital4local.com/blog/"
]

for s in slugs:
    urls.append(f"https://digital4local.com/blog/{s}")
    urls.append(f"https://digital4local.com/blog/{s}/")
    urls.append(f"https://digital4local.com/blog/{s}.php")
    urls.append(f"https://digital4local.com/blog-single.php?slug={s}")

print("=== CHECKING ALL LIVE BLOG URL COMBINATIONS ===")
for u in urls:
    try:
        req = urllib.request.Request(u, headers=headers)
        res = urllib.request.urlopen(req, timeout=8, context=ctx)
        code = res.getcode()
        final_url = res.geturl()
        html = res.read().decode('utf-8', errors='ignore')
        title = ""
        if "<title>" in html:
            title = html.split("<title>")[1].split("</title>")[0].strip()
        is_404_text = "page does not exist" in html.lower() or "404 not found" in html.lower() or "not found" in title.lower()
        if is_404_text or code >= 400:
            print(f"[FAIL] {u} -> Status: {code} | Title: {title} | 404Text: {is_404_text}")
        else:
            print(f"[OK]   {u} -> Status: {code} | Title: {title[:35]}...")
    except urllib.error.HTTPError as e:
        print(f"[HTTP {e.code}] {u} -> Reason: {e.reason}")
    except Exception as e:
        print(f"[ERR]  {u} -> {e}")
