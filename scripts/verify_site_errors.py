import urllib.request
import re

urls = [
    '/',
    '/services.php',
    '/pricing.php',
    '/about.php',
    '/contact.php',
    '/blog.php',
    '/seo-agency-bhopal/',
    '/local-seo-bhopal/',
    '/google-business-profile-optimization-bhopal/',
    '/ai-seo-bhopal/',
    '/digital-marketing-agency-bhopal/',
    '/ai-agency-bhopal/'
]

all_clean = True
for u in urls:
    full_url = 'http://127.0.0.1:8099' + u
    try:
        req = urllib.request.Request(full_url, headers={'User-Agent': 'Mozilla/5.0'})
        with urllib.request.urlopen(req) as resp:
            html = resp.read().decode('utf-8')
            errs = re.findall(r'(Notice|Warning|Fatal error|Deprecated):\s*([^<]+)', html)
            if errs:
                print(f'[FAIL] {u} has errors: {errs}')
                all_clean = False
            else:
                print(f'[PASS] {u} (HTTP {resp.status}, 0 errors)')
    except Exception as e:
        print(f'[FAIL] {u} exception: {e}')
        all_clean = False

if all_clean:
    print('\n--> ALL SITE URLS ARE 100% CLEAN AND ERROR-FREE!')
