import urllib.request

endpoints = [
    '/robots.txt',
    '/llms.txt',
    '/llm.txt',
    '/llms-full.txt',
    '/.well-known/llms.txt',
    '/.well-known/llm.txt',
    '/'
]

print("=== LIVE SERVER REAL-TIME VERIFICATION (digital4local.com) ===")
for ep in endpoints:
    url = 'https://digital4local.com' + ep
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0 (compatible; ClaudeBot/1.0; +claudebot@anthropic.com)'})
    try:
        with urllib.request.urlopen(req) as res:
            ctype = res.headers.get('Content-Type', '')
            body = res.read()
            print(f"  [PASS] {ep:25s} -> Status: {res.status} | Type: {ctype[:25]:25s} | Bytes: {len(body):6d}")
    except Exception as e:
        print(f"  [FAIL] {ep:25s} -> ERROR: {e}")
