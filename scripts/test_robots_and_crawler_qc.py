import subprocess
import urllib.request
import urllib.parse
import urllib.error
import ssl
import sys
import xml.etree.ElementTree as ET

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')

ctx = ssl.create_default_context()

user_agents = {
    "Default Agent (curl/7.88)": "curl/7.88.1",
    "Googlebot": "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)",
    "GPTBot": "Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)",
    "ClaudeBot": "Mozilla/5.0 (compatible; ClaudeBot/1.0; +claudebot@anthropic.com)",
    "PerplexityBot": "Mozilla/5.0 (compatible; PerplexityBot/1.0; +https://perplexity.ai/perplexitybot)"
}

test_paths = [
    "/",
    "/robots.txt",
    "/llms.txt",
    "/sitemap.xml"
]

def test_live_domain():
    print("=" * 80)
    print("LIVE PRODUCTION AUDIT: https://digital4local.com")
    print("=" * 80)
    results = {}
    for path in test_paths:
        url = f"https://digital4local.com{path}"
        results[path] = {}
        print(f"\nTarget: {url}")
        for bot_label, ua in user_agents.items():
            req = urllib.request.Request(
                url,
                headers={
                    "User-Agent": ua,
                    "Accept": "*/*"
                }
            )
            try:
                with urllib.request.urlopen(req, context=ctx, timeout=12) as res:
                    status = res.status
                    ctype = res.headers.get("Content-Type", "None")
                    cache = res.headers.get("Cache-Control", "None")
                    results[path][bot_label] = {
                        "status": status,
                        "content_type": ctype,
                        "cache": cache
                    }
                    print(f"  • [{bot_label}] -> HTTP {status} | Type: {ctype} | Cache: {cache}")
            except urllib.error.HTTPError as he:
                results[path][bot_label] = {
                    "status": he.code,
                    "content_type": he.headers.get("Content-Type", "None"),
                    "cache": he.headers.get("Cache-Control", "None")
                }
                print(f"  • [{bot_label}] -> HTTP {he.code} | Type: {he.headers.get('Content-Type')}")
            except Exception as e:
                results[path][bot_label] = {"error": str(e)}
                print(f"  • [{bot_label}] -> ERROR: {e}")
    return results

def test_security_endpoints():
    print("\n" + "=" * 80)
    print("SECURITY & AUTH AUDIT ON SENSITIVE ENDPOINTS")
    print("=" * 80)
    sensitive_targets = [
        "https://digital4local.com/config/",
        "https://digital4local.com/config/admin_auth.json",
        "https://digital4local.com/config/site_settings.json",
        "https://digital4local.com/includes/",
        "https://digital4local.com/includes/auth-middleware.php",
        "https://digital4local.com/scripts/",
        "https://digital4local.com/scripts/check_dns_records.py",
        "https://digital4local.com/admin.php",
        "https://digital4local.com/admin-cms.php",
        "https://digital4local.com/admin-login.php",
        "https://digital4local.com/admin-logout.php",
        "https://digital4local.com/api/change-password.php",
        "https://digital4local.com/api/update-cms-settings.php",
        "https://digital4local.com/api/upload-media.php"
    ]
    for url in sensitive_targets:
        # Don't follow redirects automatically to see redirect status
        class NoRedirectHandler(urllib.request.HTTPRedirectHandler):
            def redirect_request(self, req, fp, code, msg, headers, newurl):
                return None
        opener = urllib.request.build_opener(NoRedirectHandler)
        req = urllib.request.Request(url, headers={"User-Agent": "curl/7.88.1"})
        try:
            with opener.open(req, timeout=10) as res:
                print(f"  • {url:60s} -> HTTP {res.status}")
        except urllib.error.HTTPError as he:
            loc = he.headers.get('Location', '')
            if he.code in (301, 302, 303, 307, 308):
                print(f"  • {url:60s} -> HTTP {he.code} Redirect -> {loc}")
            else:
                print(f"  • {url:60s} -> HTTP {he.code}")
        except Exception as e:
            print(f"  • {url:60s} -> Error: {e}")

if __name__ == "__main__":
    test_live_domain()
    test_security_endpoints()
