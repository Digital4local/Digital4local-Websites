import urllib.request
import re

url = "http://127.0.0.1:8099/"
req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X)'})

with urllib.request.urlopen(req, timeout=10) as resp:
    html = resp.read().decode('utf-8', errors='ignore')

print("=== MOBILE MENU DOM ACCORDION VERIFICATION ===")

has_menu_drawer = 'id="mobile-menu"' in html
print(f"1. Mobile Menu Drawer Container: {'[OK]' if has_menu_drawer else '[FAIL]'}")

has_services_toggle = 'aria-controls="mobile-submenu-services"' in html
has_services_submenu = 'id="mobile-submenu-services"' in html and 'class="mobile-submenu hidden' in html
print(f"2. Services Accordion Toggle & Collapsed Container: {'[OK]' if has_services_toggle and has_services_submenu else '[FAIL]'}")

has_industries_toggle = 'aria-controls="mobile-submenu-industries"' in html
has_industries_submenu = 'id="mobile-submenu-industries"' in html and 'class="mobile-submenu hidden' in html
print(f"3. Industries Accordion Toggle & Collapsed Container: {'[OK]' if has_industries_toggle and has_industries_submenu else '[FAIL]'}")

has_locations_toggle = 'aria-controls="mobile-submenu-locations"' in html
has_locations_submenu = 'id="mobile-submenu-locations"' in html and 'class="mobile-submenu hidden' in html
print(f"4. Locations Accordion Toggle & Collapsed Container: {'[OK]' if has_locations_toggle and has_locations_submenu else '[FAIL]'}")

# Check JS file for accordion handler
js_url = "http://127.0.0.1:8099/assets/js/main.js"
with urllib.request.urlopen(js_url, timeout=10) as resp:
    js = resp.read().decode('utf-8', errors='ignore')

has_js_accordion = 'mobile-submenu-toggle' in js and 'mobile-submenu-arrow' in js and 'rotate-180' in js
print(f"5. Interactive Accordion JavaScript Engine: {'[OK]' if has_js_accordion else '[FAIL]'}")

all_ok = has_menu_drawer and has_services_toggle and has_services_submenu and has_industries_toggle and has_industries_submenu and has_locations_toggle and has_locations_submenu and has_js_accordion
print("\nOVERALL ACCORDION TEST RESULT: " + ("ALL PASSED [OK]" if all_ok else "SOME CHECKS FAILED [FAIL]"))
