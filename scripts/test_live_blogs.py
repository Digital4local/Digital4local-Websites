import urllib.request
import json
import ssl

ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

headers = {
    'User-Agent': 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1'
}

urls = [
    "https://digital4local.com/blog.php",
    "https://digital4local.com/blog",
    "https://digital4local.com/blog/",
    "https://digital4local.com/blog/top-10-digital-marketing-companies-india",
    "https://digital4local.com/blog/top-10-digital-marketing-companies-india/",
    "https://digital4local.com/blog/smm-full-form-what-does-smm-mean",
    "https://digital4local.com/blog/seo-vs-sem-difference",
    "https://digital4local.com/blog/top-marketing-companies-india",
    "https://digital4local.com/blog/best-digital-marketing-company-india",
    "https://digital4local.com/blog/types-of-seo-explained",
    "https://digital4local.com/blog-single.php?slug=top-10-digital-marketing-companies-india",
]

print("TESTING LIVE URLs (MOBILE USER-AGENT):")
for u in urls:
    try:
        req = urllib.request.Request(u, headers=headers)
        res = urllib.request.urlopen(req, timeout=10, context=ctx)
        code = res.getcode()
        final_url = res.geturl()
        content = res.read().decode('utf-8', errors='ignore')
        title = ""
        if "<title>" in content:
            title = content.split("<title>")[1].split("</title>")[0]
        has_not_found = "does not exist" in content or "404 Not Found" in content or "not found" in content.lower()
        print(f"[{code}] {u} -> Final: {final_url} | Title: {title[:40]}... | HasNotFoundText: {has_not_found}")
    except urllib.error.HTTPError as e:
        print(f"[{e.code}] {u} -> HTTP Error: {e.reason}")
    except Exception as e:
        print(f"[ERR] {u} -> {e}")
