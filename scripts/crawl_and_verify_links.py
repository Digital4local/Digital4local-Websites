import subprocess
import urllib.request
import urllib.parse
import urllib.error
import json
import os
import re
import sys
import time
from html.parser import HTMLParser

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')
    sys.stderr.reconfigure(encoding='utf-8', errors='replace')

PHP_PATH = r"C:\xampp\php\php.exe"
PORT = 8201
BASE_URL = f"http://127.0.0.1:{PORT}"
WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

class LinkExtractor(HTMLParser):
    def __init__(self):
        super().__init__()
        self.links = []

    def handle_starttag(self, tag, attrs):
        if tag == 'a':
            for k, v in attrs:
                if k.lower() == 'href' and v:
                    self.links.append(v)

def crawl_all_links():
    server_proc = subprocess.Popen([PHP_PATH, "-S", f"127.0.0.1:{PORT}", "router.php"], cwd=WORKSPACE, stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL)
    time.sleep(1.5)

    visited_pages = set()
    to_visit = {"/", "/services.php", "/pricing.php", "/about.php", "/contact.php", "/blog.php", "/industries/index.php"}
    
    # Add all service and industry files
    for f in os.listdir(os.path.join(WORKSPACE, "services")):
        if f.endswith(".php"):
            to_visit.add(f"/services/{f}")
    for f in os.listdir(os.path.join(WORKSPACE, "industries")):
        if f.endswith(".php") and f != "index.php":
            to_visit.add(f"/industries/{f}")

    settings_path = os.path.join(WORKSPACE, "config", "site_settings.json")
    with open(settings_path, "r", encoding="utf-8") as sf:
        site_settings = json.load(sf)
    for post in site_settings.get("blog_posts", []):
        slug = post.get("slug")
        if slug:
            to_visit.add(f"/blog/{slug}")
    for cp in site_settings.get("custom_pages", []):
        slug = cp.get("url")
        if slug:
            to_visit.add(f"/{slug}")

    discovered_links = set()
    link_sources = {}
    broken_links = []

    try:
        while to_visit:
            path = to_visit.pop()
            if path in visited_pages:
                continue
            visited_pages.add(path)

            url = BASE_URL + path
            req = urllib.request.Request(url, headers={'User-Agent': 'Digital4Local-Crawler/1.0'})
            try:
                with urllib.request.urlopen(req) as res:
                    body = res.read().decode('utf-8', errors='ignore')
                    parser = LinkExtractor()
                    parser.feed(body)

                    for raw_href in parser.links:
                        # Skip anchor-only, tel:, mailto:, javascript:
                        if raw_href.startswith('#') or raw_href.startswith('mailto:') or raw_href.startswith('tel:') or raw_href.startswith('javascript:'):
                            continue
                        
                        # Handle absolute site URLs
                        normalized = raw_href
                        if normalized.startswith('https://digital4local.com'):
                            normalized = normalized.replace('https://digital4local.com', '')
                        elif normalized.startswith('http://digital4local.com'):
                            normalized = normalized.replace('http://digital4local.com', '')

                        # If external, skip
                        if normalized.startswith('http://') or normalized.startswith('https://') or normalized.startswith('//'):
                            continue

                        # Resolve relative links
                        if not normalized.startswith('/'):
                            # Check current directory
                            curr_dir = os.path.dirname(path)
                            if curr_dir and curr_dir != '/':
                                normalized = curr_dir + '/' + normalized
                            else:
                                normalized = '/' + normalized

                        # Remove anchor or query for checking
                        clean_target = normalized.split('#')[0].split('?')[0]
                        if not clean_target:
                            clean_target = '/'

                        discovered_links.add(clean_target)
                        if clean_target not in link_sources:
                            link_sources[clean_target] = []
                        link_sources[clean_target].append((path, raw_href))

            except urllib.error.HTTPError as he:
                print(f"[FAIL HTTP {he.code}] Page {path}")
            except Exception as e:
                print(f"[ERROR] Page {path}: {e}")

        print(f"\nDiscovered {len(discovered_links)} unique internal link targets across {len(visited_pages)} pages.")
        print("\nVerifying all internal link targets...")

        for target in sorted(discovered_links):
            t_url = BASE_URL + target
            treq = urllib.request.Request(t_url, headers={'User-Agent': 'Digital4Local-Crawler/1.0'})
            try:
                with urllib.request.urlopen(treq) as tres:
                    if tres.status != 200:
                        print(f"  [WARN] Target {target} returned HTTP {tres.status}")
                        broken_links.append((target, tres.status, link_sources.get(target, [])))
                    else:
                        pass # 200 OK
            except urllib.error.HTTPError as the:
                print(f"  [FAIL] Broken link {target} -> HTTP {the.code}")
                broken_links.append((target, the.code, link_sources.get(target, [])))
            except Exception as te:
                print(f"  [FAIL] Broken link {target} -> {te}")
                broken_links.append((target, str(te), link_sources.get(target, [])))

        print("\n" + "=" * 70)
        print("INTERNAL LINK VERIFICATION SUMMARY")
        print("=" * 70)
        print(f"Total Unique Targets Checked: {len(discovered_links)}")
        print(f"Broken Internal Links:        {len(broken_links)}")
        if broken_links:
            print("\nBroken Links Details:")
            for b_target, b_code, b_origins in broken_links:
                print(f"\n* Broken Target: {b_target} (Status: {b_code})")
                for origin, raw_h in b_origins[:3]:
                    print(f"    Found on: {origin} (href=\"{raw_h}\")")
        else:
            print(">>> 100% CLEAN: ZERO BROKEN INTERNAL LINKS FOUND! <<<")

    finally:
        server_proc.terminate()

if __name__ == '__main__':
    crawl_all_links()
