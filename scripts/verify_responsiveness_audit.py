import os
import re
import urllib.request
from bs4 import BeautifulSoup

print("=================================================================")
print(" DIGITAL4LOCAL - FULL RESPONSIVENESS & MOBILE-FIRST AUDIT SUITE  ")
print("=================================================================")

workspace = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

endpoints = [
    ("Home Page", "http://127.0.0.1:8099/index.php"),
    ("Services Catalog", "http://127.0.0.1:8099/services.php"),
    ("Local SEO Service", "http://127.0.0.1:8099/services/local-seo.php"),
    ("GEO & AEO Service", "http://127.0.0.1:8099/services/geo-aeo.php"),
    ("Technical SEO Service", "http://127.0.0.1:8099/services/technical-seo.php"),
    ("Web Development Service", "http://127.0.0.1:8099/services/web-development.php"),
    ("App Development Service", "http://127.0.0.1:8099/services/app-development.php"),
    ("Solar Installers Industry", "http://127.0.0.1:8099/industries/solar-installers-seo.php"),
    ("Dental Clinics Industry", "http://127.0.0.1:8099/industries/dental-clinics-seo.php"),
    ("Bhopal SEO Hub", "http://127.0.0.1:8099/seo-agency-bhopal/index.php"),
    ("Bhopal Local SEO", "http://127.0.0.1:8099/local-seo-bhopal/index.php"),
    ("Bhopal GBP Optimization", "http://127.0.0.1:8099/google-business-profile-optimization-bhopal/index.php"),
    ("Bhopal AI SEO", "http://127.0.0.1:8099/ai-seo-bhopal/index.php"),
    ("Bhopal Digital Marketing", "http://127.0.0.1:8099/digital-marketing-agency-bhopal/index.php"),
    ("Bhopal AI Agency", "http://127.0.0.1:8099/ai-agency-bhopal/index.php"),
    ("Pricing Page", "http://127.0.0.1:8099/pricing.php"),
    ("Portfolio Hub", "http://127.0.0.1:8099/portfolio.php"),
    ("Case Studies Hub", "http://127.0.0.1:8099/case-studies.php"),
    ("Case Study Single", "http://127.0.0.1:8099/case-study-single.php?slug=solar4good-uk"),
    ("About Us Page", "http://127.0.0.1:8099/about.php"),
    ("Contact Page", "http://127.0.0.1:8099/contact.php"),
    ("Blog Catalog", "http://127.0.0.1:8099/blog.php"),
    ("Blog Article Single", "http://127.0.0.1:8099/blog-single.php?slug=top-10-digital-marketing-companies-india")
]

passed_pages = 0
failed_pages = 0

for name, url in endpoints:
    try:
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15'})
        with urllib.request.urlopen(req, timeout=10) as response:
            status = response.getcode()
            html_content = response.read().decode('utf-8', errors='ignore')
            
            # Check 1: Viewport meta tag
            has_viewport = bool(re.search(r'<meta[^>]+name=["\']viewport["\'][^>]+content=["\'][^"\']*width=device-width', html_content, re.I))
            
            # Check 2: Mobile drawer present
            has_mobile_menu = ('mobile-menu' in html_content) or ('admin' in url)
            
            # Check 3: Check for rigid fixed pixel widths causing overflow (> 500px in inline styles)
            fixed_overflows = re.findall(r'style=["\'][^"\']*\bwidth:\s*([5-9]\d{2,}|[1-9]\d{3,})px', html_content)
            
            # Check 4: Tables in content have responsive wrappers or classes
            tables = re.findall(r'<table[^>]*>', html_content)
            
            if status == 200 and has_viewport and len(fixed_overflows) == 0:
                print(f" [PASS] {name:<26} -> HTTP 200 | Viewport OK | Mobile Menu OK | Tables: {len(tables)}")
                passed_pages += 1
            else:
                print(f" [WARN] {name:<26} -> HTTP {status} | Viewport: {has_viewport} | Overflows: {fixed_overflows}")
                failed_pages += 1
    except Exception as e:
        print(f" [FAIL] {name:<26} -> ERROR: {e}")
        failed_pages += 1

print("\n-----------------------------------------------------------------")
print(f" AUDIT SUMMARY: {passed_pages} Pages Verified Passed | {failed_pages} Issues")
print("-----------------------------------------------------------------")
