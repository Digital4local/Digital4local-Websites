import urllib.request
import json

# Check DNS NS records via Google Public DNS JSON API
url = "https://dns.google/resolve?name=digital4local.com&type=NS"
req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0"})
with urllib.request.urlopen(req) as res:
    data = json.loads(res.read().decode('utf-8'))
    print("=== DNS NS RECORDS ===")
    for ans in data.get('Answer', []):
        print(ans.get('data'))

url_a = "https://dns.google/resolve?name=digital4local.com&type=A"
with urllib.request.urlopen(urllib.request.Request(url_a, headers={"User-Agent": "Mozilla/5.0"})) as res:
    data_a = json.loads(res.read().decode('utf-8'))
    print("\n=== DNS A RECORDS ===")
    for ans in data_a.get('Answer', []):
        print(ans.get('data'))
