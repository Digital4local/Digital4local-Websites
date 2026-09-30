import urllib.request
import urllib.parse
import urllib.error
import ssl
import sys

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')

ctx = ssl.create_default_context()

user_agents = {
    "ClaudeBot": "Mozilla/5.0 (compatible; ClaudeBot/1.0; +claudebot@anthropic.com)",
    "Claude-Web": "Mozilla/5.0 (compatible; Claude-Web/1.0; +https://www.anthropic.com)",
    "anthropic-ai": "anthropic-ai",
    "GPTBot": "Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)",
    "ChatGPT-User": "Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ChatGPT-User/1.0; +https://openai.com/bot)",
    "PerplexityBot": "Mozilla/5.0 (compatible; PerplexityBot/1.0; +https://perplexity.ai/perplexitybot)",
    "Desktop Chrome": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36"
}

target_urls = [
    "https://digital4local.com/robots.txt",
    "https://digital4local.com/",
    "https://digital4local.com/llms.txt",
    "https://digital4local.com/services/local-seo.php"
]

print("=" * 80)
print("TESTING LIVE SERVER (https://digital4local.com) WITH AI CRAWLER USER AGENTS")
print("=" * 80)

for url in target_urls:
    print(f"\nTarget: {url}")
    for bot_name, ua in user_agents.items():
        req = urllib.request.Request(url, headers={"User-Agent": ua, "Accept": "text/html,text/plain,*/*"})
        try:
            with urllib.request.urlopen(req, context=ctx, timeout=10) as res:
                body = res.read().decode('utf-8', errors='ignore')
                server_hdr = res.headers.get('Server', 'Unknown')
                cf_ray = res.headers.get('CF-RAY', 'None')
                print(f"  • {bot_name:15s} -> Status {res.status} | Bytes: {len(body):6d} | Server: {server_hdr} | Cloudflare: {bool(cf_ray != 'None')}")
        except urllib.error.HTTPError as he:
            body = he.read().decode('utf-8', errors='ignore')[:150].replace('\n', ' ')
            cf_ray = he.headers.get('CF-RAY', 'None')
            print(f"  • {bot_name:15s} -> HTTP {he.code} | Cloudflare: {bool(cf_ray != 'None')} | Msg: {body}")
        except Exception as e:
            print(f"  • {bot_name:15s} -> Error: {e}")
