import urllib.request
import re

url = "http://127.0.0.1:8099/seo-agency-bhopal/"
req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'})

with urllib.request.urlopen(req, timeout=10) as resp:
    html = resp.read().decode('utf-8', errors='ignore')

print("=== LOCATION PAGE CTA RENDER VERIFICATION ===")

# Check CSS link
css_match = re.search(r'<link rel="stylesheet" href="([^"]*custom\.css[^"]*)">', html)
print(f"1. Custom CSS Link Path: {css_match.group(1) if css_match else 'NOT FOUND'}")

# Check CTA button classes
has_btn_primary = 'btn-primary text-sm shadow-xl' in html or 'btn-primary text-sm' in html
print(f"2. Primary Button Class Present: {'[OK]' if has_btn_primary else '[FAIL]'}")

has_btn_glass = 'btn-glass-white' in html
print(f"3. Glass White Button Class Present: {'[OK]' if has_btn_glass else '[FAIL]'}")

has_whitespace_nowrap = 'whitespace-nowrap' in html
print(f"4. Whitespace NoWrap Applied: {'[OK]' if has_whitespace_nowrap else '[FAIL]'}")

# Check Lucide re-init script
has_lucide_init = "lucide.createIcons()" in html
print(f"5. Lucide CreateIcons Hook: {'[OK]' if has_lucide_init else '[FAIL]'}")

print("\n--- CTA Button Snippet ---")
cta_snippet = re.search(r'(<section class="rounded-3xl bg-gradient-to-br.*?</section>)', html, re.S)
if cta_snippet:
    print(cta_snippet.group(1)[:600] + "...")
else:
    print("CTA Section not matched")
