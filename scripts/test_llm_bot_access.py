import subprocess
import urllib.request
import urllib.parse
import urllib.error
import os
import sys
import time

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')
    sys.stderr.reconfigure(encoding='utf-8', errors='replace')

PHP_PATH = r"C:\xampp\php\php.exe"
PORT = 8244
BASE_URL = f"http://127.0.0.1:{PORT}"
WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

ai_user_agents = {
    "OpenAI GPTBot": "Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.0; +https://openai.com/gptbot)",
    "OpenAI ChatGPT-User": "Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ChatGPT-User/1.0; +https://openai.com/bot)",
    "Anthropic ClaudeBot": "Mozilla/5.0 (compatible; ClaudeBot/1.0; +claudebot@anthropic.com)",
    "Anthropic Claude-Web": "Mozilla/5.0 (compatible; Claude-Web/1.0; +https://www.anthropic.com)",
    "Perplexity AI Bot": "Mozilla/5.0 (compatible; PerplexityBot/1.0; +https://perplexity.ai/perplexitybot)",
    "Google Gemini (Extended)": "Mozilla/5.0 (compatible; Google-Extended; +https://developers.google.com/search/docs/crawling-indexing/overview-google-crawlers)",
    "Apple Intelligence Bot": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.4 Safari/605.1.15 (Applebot-Extended/0.1)"
}

llm_endpoints = [
    "/llms.txt",
    "/llm.txt",
    "/llms-full.txt",
    "/.well-known/llms.txt",
    "/.well-known/llm.txt",
    "/robots.txt",
    "/",
    "/services/local-seo.php",
    "/services/geo-aeo.php",
    "/industries/solar-installers-seo.php",
    "/blog/top-10-digital-marketing-companies-india"
]

def main():
    print("=" * 80)
    print("DIGITAL4LOCAL — LLM & AI CRAWLER ACCESSIBILITY AUDIT & TEST")
    print("=" * 80)

    # Start PHP built-in server with router.php
    server_proc = subprocess.Popen([PHP_PATH, "-S", f"127.0.0.1:{PORT}", "router.php"], cwd=WORKSPACE, stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL)
    time.sleep(1.5)

    passed_tests = 0
    total_tests = 0
    failures = []

    try:
        # Part 1: Test LLM Manifest Endpoints
        print("\n--- 1. Testing LLM Manifest Endpoints (llmstxt.org Standard) ---")
        for ep in ["/llms.txt", "/llm.txt", "/llms-full.txt", "/.well-known/llms.txt", "/.well-known/llm.txt"]:
            total_tests += 1
            url = BASE_URL + ep
            req = urllib.request.Request(url, headers={"User-Agent": ai_user_agents["OpenAI ChatGPT-User"]})
            try:
                with urllib.request.urlopen(req) as res:
                    status = res.status
                    content_type = res.headers.get("Content-Type", "")
                    cors = res.headers.get("Access-Control-Allow-Origin", "")
                    body = res.read().decode('utf-8', errors='ignore')
                    
                    has_company = "Digital4Local" in body
                    is_txt = "text/plain" in content_type
                    has_cors = cors == "*"
                    
                    if status == 200 and has_company and is_txt:
                        passed_tests += 1
                        print(f"  [PASS] {ep:25s} -> HTTP {status} | Type: {content_type:24s} | CORS: {cors:3s} | Size: {len(body):5d} B")
                    else:
                        failures.append((ep, f"Status: {status}, Type: {content_type}, CORS: {cors}"))
                        print(f"  [FAIL] {ep:25s} -> HTTP {status} | Type: {content_type} | CORS: {cors}")
            except Exception as e:
                failures.append((ep, str(e)))
                print(f"  [FAIL] {ep:25s} -> Error: {e}")

        # Part 2: Test Multi-Agent Crawling across ChatGPT, Claude, Perplexity, Gemini
        print("\n--- 2. Testing Direct Website Scrolling & Access by AI Models ---")
        for bot_name, bot_ua in ai_user_agents.items():
            print(f"\n[Testing AI Model]: {bot_name}")
            for path in ["/", "/services/geo-aeo.php", "/industries/solar-installers-seo.php", "/blog/seo-vs-sem-difference", "/llms.txt"]:
                total_tests += 1
                url = BASE_URL + path
                req = urllib.request.Request(url, headers={"User-Agent": bot_ua})
                try:
                    with urllib.request.urlopen(req) as res:
                        status = res.status
                        body = res.read().decode('utf-8', errors='ignore')
                        has_title = "<title>" in body or "# Digital4Local" in body
                        has_llm_link = 'href="https://digital4local.com/llms.txt"' in body or path == "/llms.txt"
                        
                        if status == 200 and has_title:
                            passed_tests += 1
                            print(f"  [PASS] {path:40s} -> HTTP {status} | Size: {len(body):6d} B | LLM Alternate Link: {has_llm_link}")
                        else:
                            failures.append((f"{bot_name} - {path}", f"Status {status}"))
                            print(f"  [FAIL] {path:40s} -> HTTP {status}")
                except Exception as e:
                    failures.append((f"{bot_name} - {path}", str(e)))
                    print(f"  [FAIL] {path:40s} -> Error: {e}")

        # Part 3: Verify robots.txt AI Bot Directives
        print("\n--- 3. Verifying robots.txt AI Permissions ---")
        total_tests += 1
        with urllib.request.urlopen(BASE_URL + "/robots.txt") as res:
            rtext = res.read().decode('utf-8')
            gpt_allowed = "User-agent: GPTBot\nUser-agent: ChatGPT-User\nAllow: /" in rtext
            claude_allowed = "User-agent: ClaudeBot\nUser-agent: Claude-Web\nAllow: /" in rtext
            perplexity_allowed = "User-agent: PerplexityBot\nAllow: /" in rtext
            gemini_allowed = "User-agent: Google-Extended\nAllow: /" in rtext
            
            if gpt_allowed and claude_allowed and perplexity_allowed and gemini_allowed:
                passed_tests += 1
                print("  [PASS] GPTBot, ChatGPT-User, ClaudeBot, Claude-Web, PerplexityBot, Google-Extended explicitly permitted in robots.txt!")
            else:
                failures.append(("robots.txt AI directives", "Missing explicit bot allow blocks"))
                print("  [FAIL] Missing explicit bot directives in robots.txt")

        print("\n" + "=" * 80)
        print("LLM & AI ACCESSIBILITY AUDIT SUMMARY")
        print("=" * 80)
        print(f"Total AI Tests Executed: {total_tests}")
        print(f"Passed Tests:           {passed_tests} / {total_tests}")
        print(f"Failed Tests:           {len(failures)}")
        
        if not failures:
            print("\n>>> 100% SUCCESS: CHATGPT, CLAUDE, PERPLEXITY & GEMINI HAVE FULL DIRECT ACCESS WITH DEDICATED LLM.TXT MANIFESTS! <<<")
        else:
            print(f"\nFailures: {failures}")

    finally:
        server_proc.terminate()

if __name__ == '__main__':
    main()
