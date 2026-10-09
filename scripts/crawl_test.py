import subprocess
import urllib.request
import urllib.parse
import json
import time
import re
import sys
from html.parser import HTMLParser

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')
    sys.stderr.reconfigure(encoding='utf-8', errors='replace')

PHP_PATH = r"C:\xampp\php\php.exe"
PORT = 8246
BASE_URL = f"http://127.0.0.1:{PORT}"
WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

proc = subprocess.Popen(
    [PHP_PATH, "-S", f"127.0.0.1:{PORT}", "router.php"],
    cwd=WORKSPACE,
    stdout=subprocess.PIPE,
    stderr=subprocess.PIPE
)

time.sleep(1.5)

visited = set()
broken_links = []
all_found_links = {}

class LinkExtractor(HTMLParser):
    def __init__(self):
        super().__init__()
        self.links = []
    def handle_starttag(self, tag, attrs):
        if tag == 'a':
            for k, v in attrs:
                if k.lower() == 'href' and v:
                    self.links.append(v)

to_visit = ["/", "/blog.php", "/blog", "/blog/top-10-digital-marketing-companies-india"]

mobile_headers = {
    'User-Agent': 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.5 Mobile/15E148 Safari/604.1'
}

print("CRAWLING ALL PAGES ON LOCAL SERVER...")
while to_visit:
    curr = to_visit.pop(0)
    if curr in visited:
        continue
    visited.add(curr)
    
    url = urllib.parse.urljoin(BASE_URL, curr)
    try:
        req = urllib.request.Request(url, headers=mobile_headers)
        res = urllib.request.urlopen(req, timeout=10)
        content = res.read().decode('utf-8', errors='ignore')
        code = res.getcode()
        
        parser = LinkExtractor()
        parser.feed(content)
        
        # Check for 404 text
        if "does not exist" in content.lower() or "404 not found" in content.lower():
            print(f"[PAGE CONTENT 404 DETECTED] {curr} returned 200 but contains 'does not exist' or '404'!")
        
        for link in parser.links:
            if link.startswith('#') or link.startswith('javascript:') or link.startswith('tel:') or link.startswith('mailto:'):
                continue
            parsed_link = urllib.parse.urlparse(link)
            if parsed_link.netloc and parsed_link.netloc != f"127.0.0.1:{PORT}" and parsed_link.netloc != "digital4local.com":
                continue # External
            
            path = parsed_link.path
            if parsed_link.query:
                path += '?' + parsed_link.query
            
            if not path:
                continue
                
            test_url = urllib.parse.urljoin(url, link)
            if test_url not in all_found_links:
                try:
                    treq = urllib.request.Request(test_url, headers=mobile_headers)
                    tres = urllib.request.urlopen(treq, timeout=10)
                    tcode = tres.getcode()
                    tcontent = tres.read().decode('utf-8', errors='ignore')
                    has_err = "does not exist" in tcontent.lower() or "404 not found" in tcontent.lower()
                    all_found_links[test_url] = (tcode, has_err)
                    if tcode >= 400 or has_err:
                        print(f"[BROKEN] from {curr} -> {link} (Code: {tcode}, ErrorText: {has_err})")
                        broken_links.append((curr, link, tcode, has_err))
                    else:
                        if path.startswith('/') and path not in visited and len(visited) < 100:
                            to_visit.append(path)
                except urllib.error.HTTPError as e:
                    print(f"[HTTP ERROR] from {curr} -> {link} : {e.code} {e.reason}")
                    broken_links.append((curr, link, e.code, str(e.reason)))
                    all_found_links[test_url] = (e.code, str(e.reason))
                except Exception as e:
                    print(f"[ERROR] from {curr} -> {link} : {e}")
                    broken_links.append((curr, link, 0, str(e)))
                    all_found_links[test_url] = (0, str(e))
    except Exception as e:
        print(f"[FAIL] to load {curr}: {e}")

proc.terminate()
print(f"\nCrawling complete! Visited {len(visited)} pages, tested {len(all_found_links)} links.")
print(f"Total Broken Links: {len(broken_links)}")
for b in broken_links:
    print("  ->", b)
