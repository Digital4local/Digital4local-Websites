import urllib.request
import urllib.parse
import socket
import ssl

print("=== DNS RESOLUTION ===")
for name in ["digital4local.com", "www.digital4local.com"]:
    try:
        info = socket.getaddrinfo(name, 443)
        ips = list(set([item[4][0] for item in info]))
        print(f"Domain: {name} -> IPs: {ips}")
    except Exception as e:
        print(f"Domain: {name} -> Error: {e}")

print("\n=== HTTP & HTTPS REDIRECT CHECKS ===")
urls = [
    "http://digital4local.com/",
    "http://www.digital4local.com/",
    "https://digital4local.com/",
    "https://www.digital4local.com/"
]

ctx = ssl.create_default_context()

for u in urls:
    req = urllib.request.Request(u, headers={"User-Agent": "Mozilla/5.0 (compatible; Claude-Web/1.0; +https://www.anthropic.com)"})
    try:
        with urllib.request.urlopen(req, context=ctx, timeout=10) as res:
            print(f"{u:35s} -> Final URL: {res.geturl()} | Status: {res.status}")
    except urllib.error.HTTPError as he:
        print(f"{u:35s} -> HTTP Error: {he.code} | {he.headers.get('Location')}")
    except Exception as e:
        print(f"{u:35s} -> Error: {e}")
