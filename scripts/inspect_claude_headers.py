import urllib.request
import urllib.parse
import urllib.error
import ssl

ctx = ssl.create_default_context()

test_cases = [
    ("Claude-Web Headless", {
        "User-Agent": "Mozilla/5.0 (compatible; Claude-Web/1.0; +https://www.anthropic.com)",
        "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8",
        "Accept-Language": "en-US,en;q=0.9",
        "Sec-Fetch-Site": "none",
        "Sec-Fetch-Mode": "navigate",
        "Sec-Fetch-User": "?1",
        "Sec-Fetch-Dest": "document"
    }),
    ("ClaudeBot Raw", {
        "User-Agent": "Mozilla/5.0 (compatible; ClaudeBot/1.0; +claudebot@anthropic.com)",
        "Accept": "*/*"
    }),
    ("Anthropic-AI Generic", {
        "User-Agent": "anthropic-ai",
        "Accept": "*/*"
    }),
    ("ChatGPT-User", {
        "User-Agent": "Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ChatGPT-User/1.0; +https://openai.com/bot)",
        "Accept": "*/*"
    })
]

print("=== DEEP HTTP INSPECTION ON DIGITAL4LOCAL.COM ===")

for name, headers in test_cases:
    req = urllib.request.Request("https://digital4local.com/", headers=headers)
    try:
        with urllib.request.urlopen(req, context=ctx, timeout=10) as res:
            body = res.read().decode('utf-8', errors='ignore')
            print(f"\n[{name}] -> Status: {res.status}")
            print(f"  Server Header: {res.headers.get('Server')}")
            print(f"  X-HCDN-Cache-Status: {res.headers.get('x-hcdn-cache-status')}")
            print(f"  Content-Length / Bytes: {len(body)}")
            print(f"  First 200 chars: {body[:200].strip().replace('\n', ' ')}")
    except urllib.error.HTTPError as he:
        body = he.read().decode('utf-8', errors='ignore')
        print(f"\n[{name}] -> FAILED HTTP {he.code}")
        print(f"  Headers: {he.headers}")
        print(f"  Body: {body[:300]}")
    except Exception as e:
        print(f"\n[{name}] -> Exception: {e}")
