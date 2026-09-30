import urllib.request
import re

url = "https://digital4local.com/"
req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0 (compatible; ClaudeBot/1.0; +claudebot@anthropic.com)"})
res = urllib.request.urlopen(req)
body = res.read().decode('utf-8', errors='ignore')

print("=== LIVE RESPONSE HEADERS ===")
for k, v in res.headers.items():
    print(f"{k}: {v}")

print("\n=== LIVE ROBOTS / META TAGS ===")
for m in re.findall(r'<meta[^>]*robots[^>]*>', body, re.I):
    print("Meta Tag:", m)

for m in re.findall(r'<meta[^>]*charset[^>]*>', body, re.I):
    print("Charset:", m)

for m in re.findall(r'<link[^>]*canonical[^>]*>', body, re.I):
    print("Canonical:", m)
