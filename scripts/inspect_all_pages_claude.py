import urllib.request
import urllib.parse
import urllib.error
import ssl
import sys

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')

ctx = ssl.create_default_context()

claude_headers = {
    "User-Agent": "Mozilla/5.0 (compatible; ClaudeBot/1.0; +claudebot@anthropic.com)",
    "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8"
}

claude_web_headers = {
    "User-Agent": "Mozilla/5.0 (compatible; Claude-Web/1.0; +https://www.anthropic.com)",
    "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8",
    "Accept-Language": "en-US,en;q=0.9"
}

test_urls = [
    "https://digital4local.com/",
    "https://digital4local.com/services.php",
    "https://digital4local.com/services",
    "https://digital4local.com/services/local-seo.php",
    "https://digital4local.com/services/local-seo",
    "https://digital4local.com/pricing.php",
    "https://digital4local.com/pricing",
    "https://digital4local.com/about.php",
    "https://digital4local.com/about",
    "https://digital4local.com/contact.php",
    "https://digital4local.com/contact",
    "https://digital4local.com/blog.php",
    "https://digital4local.com/blog",
    "https://digital4local.com/blog/top-10-digital-marketing-companies-india",
    "https://digital4local.com/case-studies.php",
    "https://digital4local.com/case-studies",
    "https://digital4local.com/portfolio.php",
    "https://digital4local.com/portfolio",
    "https://digital4local.com/industries/solar-installers-seo.php",
    "https://digital4local.com/llms.txt",
    "https://digital4local.com/sitemap.xml"
]

class NoRedirectHandler(urllib.request.HTTPRedirectHandler):
    def redirect_request(self, req, fp, code, msg, headers, newurl):
        return None

opener = urllib.request.build_opener(NoRedirectHandler)

print("=" * 85)
print("TESTING CLAUDE ACCESS ON ALL PAGES (WITHOUT AUTO-REDIRECT FOLLOW)")
print("=" * 85)

for url in test_urls:
    for name, hdrs in [("ClaudeBot", claude_headers), ("Claude-Web", claude_web_headers)]:
        req = urllib.request.Request(url, headers=hdrs)
        try:
            with opener.open(req, timeout=10) as res:
                body = res.read(200).decode('utf-8', errors='ignore')
                print(f"{name:12s} | {url:55s} -> HTTP {res.status} | Bytes: {len(body)}")
        except urllib.error.HTTPError as he:
            loc = he.headers.get('Location', '')
            if loc:
                print(f"{name:12s} | {url:55s} -> HTTP {he.code} Redirect -> {loc}")
            else:
                body = he.read(200).decode('utf-8', errors='ignore')
                print(f"{name:12s} | {url:55s} -> HTTP {he.code} ({he.reason}) | Body: {body[:60].strip()}")
        except Exception as e:
            print(f"{name:12s} | {url:55s} -> ERROR: {e}")
