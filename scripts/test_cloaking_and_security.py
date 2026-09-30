import subprocess
import urllib.request
import urllib.parse
import hashlib
import time
import os
import re

PHP_PATH = r"C:\xampp\php\php.exe"
PORT = 8097
BASE_URL = f"http://127.0.0.1:{PORT}"

def main():
    print("=" * 80)
    print("DIGITAL4LOCAL SEO FORENSICS: CLOAKING, TAMPERING & 410 GONE AUDIT")
    print("=" * 80)

    # Start PHP built-in server
    server_proc = subprocess.Popen([PHP_PATH, "-S", f"127.0.0.1:{PORT}", "router.php"], stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL)
    time.sleep(1.2)

    try:
        # A. USER AGENT & REFERRER CLOAKING AUDIT
        user_agents = {
            "Desktop Chrome": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36",
            "Googlebot Desktop": "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)",
            "Googlebot Smartphone": "Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)",
            "Bingbot": "Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)",
            "Mobile iOS Safari": "Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1"
        }

        test_pages = [
            "/",
            "/services/local-seo.php",
            "/industries/solar-installers-seo.php",
            "/blog/top-10-digital-marketing-companies-india"
        ]

        print("\n--- 1. Testing for Cloaking / Differential Content Serving ---")
        for path in test_pages:
            print(f"\n[AUDITING ROUTE]: {path}")
            baseline_body = None
            baseline_status = None

            for ua_name, ua_string in user_agents.items():
                headers = {"User-Agent": ua_string}
                req = urllib.request.Request(BASE_URL + path, headers=headers)
                try:
                    with urllib.request.urlopen(req) as res:
                        status = res.status
                        body = res.read().decode('utf-8', errors='ignore')
                        h = hashlib.sha256(body.encode('utf-8')).hexdigest()[:12]
                        
                        # Check for Japanese / Cyrillic / Pharma spam injection
                        has_japanese = bool(re.search(r'[\u3040-\u30ff\u3400-\u4dbf\u4e00-\u9fff]', body))
                        has_pharma = bool(re.search(r'\b(viagra|cialis|levitra|poker|casino|replica|payday)\b', body, re.I))

                        print(f"  • {ua_name:22s} -> Status: {status} | Size: {len(body):6d} B | Hash: {h} | SpamDetected: {has_japanese or has_pharma}")
                except Exception as e:
                    print(f"  • {ua_name:22s} -> Error: {e}")

            # Test with Google Referrer
            google_ref_headers = {
                "User-Agent": user_agents["Desktop Chrome"],
                "Referer": "https://www.google.com/"
            }
            req_ref = urllib.request.Request(BASE_URL + path, headers=google_ref_headers)
            try:
                with urllib.request.urlopen(req_ref) as res:
                    status = res.status
                    body = res.read().decode('utf-8', errors='ignore')
                    h = hashlib.sha256(body.encode('utf-8')).hexdigest()[:12]
                    print(f"  • {'Google Referrer':22s} -> Status: {status} | Size: {len(body):6d} B | Hash: {h}")
            except Exception as e:
                print(f"  • {'Google Referrer':22s} -> Error: {e}")

        # B. HTTP 410 GONE SPAM URL VERIFICATION
        print("\n--- 2. Testing HTTP 410 Gone for SEO Spam Footprints ---")
        spam_test_urls = [
            "/wp-admin/",
            "/wp-login.php",
            "/wp-content/uploads/spam.php",
            "/xmlrpc.php",
            "/product/luxury-watches-replica/",
            "/shop/category/pharma/",
            "/cart/",
            "/tag/seo-spam/",
            "/author/hacker/",
            "/?s=buy+cheap+viagra",
            "/?s=%E3%82%B5%E3%82%A4%E3%83%88", # Japanese spam query
            "/?p=9876",
            "/?keyword=casino+online"
        ]

        for s_path in spam_test_urls:
            req = urllib.request.Request(BASE_URL + s_path, headers={"User-Agent": user_agents["Googlebot Desktop"]})
            try:
                with urllib.request.urlopen(req) as res:
                    print(f"  [FAIL] {s_path:40s} -> Returned HTTP {res.status} (Expected 410 Gone)")
            except urllib.error.HTTPError as e:
                if e.code == 410:
                    print(f"  [PASS] {s_path:40s} -> Correctly returned HTTP 410 Gone")
                else:
                    print(f"  [INFO] {s_path:40s} -> Returned HTTP {e.code}")
            except Exception as e:
                print(f"  [ERROR] {s_path:40s} -> {e}")

        # C. SITEMAP & ROBOTS.TXT CHECK
        print("\n--- 3. Verifying Sitemap and Robots.txt Cleanliness ---")
        with urllib.request.urlopen(BASE_URL + "/robots.txt") as res:
            robots_content = res.read().decode('utf-8')
            print("Robots.txt contains /admin.php block:", "Disallow: /admin.php" in robots_content)
            print("Robots.txt contains /*?s= block:", "Disallow: /*?s=" in robots_content)
            print("Robots.txt contains /product/ block:", "Disallow: /product/" in robots_content)

        with urllib.request.urlopen(BASE_URL + "/sitemap.php") as res:
            sitemap_content = res.read().decode('utf-8')
            has_spam = bool(re.search(r'(wp-|product|shop|cart|viagra|\?s=)', sitemap_content, re.I))
            print("Sitemap XML total size:", len(sitemap_content), "bytes")
            print("Sitemap is 100% clean of spam URLs:", not has_spam)

    finally:
        server_proc.terminate()
        print("\n" + "=" * 80)
        print("CLOAKING & SECURITY AUDIT EXECUTION COMPLETE!")
        print("=" * 80)

if __name__ == '__main__':
    main()
