import os
import urllib.request
import json
import re

base_dir = os.path.join(os.path.dirname(__file__), '..')
tools_dir = os.path.join(base_dir, 'assets', 'images', 'tools')
pr_dir = os.path.join(base_dir, 'assets', 'images', 'pr')
citations_dir = os.path.join(base_dir, 'assets', 'images', 'citations')

os.makedirs(tools_dir, exist_ok=True)
os.makedirs(pr_dir, exist_ok=True)
os.makedirs(citations_dir, exist_ok=True)

headers = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'}

def fetch_simple_icon(slug, color=None):
    url = f"https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/{slug}.svg"
    try:
        req = urllib.request.Request(url, headers=headers)
        with urllib.request.urlopen(req, timeout=8) as res:
            content = res.read().decode('utf-8')
            if color:
                # Replace fill with specific brand color if path has no fill or fill="currentColor"
                if 'fill=' in content:
                    content = re.sub(r'fill="[^"]+"', f'fill="{color}"', content)
                else:
                    content = content.replace('<path', f'<path fill="{color}"')
            return content
    except Exception as e:
        print(f"Error fetching {slug}: {e}")
        return None

def create_brand_svg(name, icon_svg_path, brand_color, text_color="#1E293B", viewBox="0 0 24 24"):
    return f'''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 50" width="200" height="50">
  <g transform="translate(10, 9) scale(1.33)">
    <path fill="{brand_color}" d="{icon_svg_path}"/>
  </g>
  <text x="56" y="31" font-family="Montserrat, Inter, system-ui, sans-serif" font-weight="700" font-size="15" fill="{text_color}">{name}</text>
</svg>'''

# Map of Tools
tools_map = {
    'claude': ('anthropic', '#D97706', 'Claude AI'),
    'chatgpt': ('openai', '#10A37F', 'ChatGPT'),
    'semrush': ('semrush', '#FF642D', 'Semrush'),
    'ahrefs': ('ahrefs', '#0062FF', 'Ahrefs'),
    'google-business': ('googlemybusiness', '#4285F4', 'Google Business'),
    'ga4': ('googleanalytics', '#E37400', 'Google Analytics 4'),
    'gsc': ('googlesearchconsole', '#4285F4', 'Search Console'),
    'n8n': ('n8n', '#EA4B71', 'n8n'),
    'make': ('make', '#6D3AEC', 'Make.com'),
    'canva': ('canva', '#00C4CC', 'Canva'),
    'brightlocal': ('googlemaps', '#00C853', 'BrightLocal'),
    'whitespark': ('sparkfun', '#D32F2F', 'Whitespark'),
    'localfalcon': ('googlemaps', '#FF9800', 'Local Falcon'),
    'moz': ('moz', '#0096D6', 'Moz Local'),
    'surfer': ('airplayvideo', '#FF5722', 'Surfer SEO'),
    'screamingfrog': ('safari', '#00843D', 'Screaming Frog'),
    'profound': ('brainfuck', '#6366F1', 'Profound AI'),
    'perplexity': ('perplexity', '#20B2AA', 'Perplexity AI'),
    'gemini': ('googlegemini', '#8E75FF', 'Google Gemini'),
    'connectively': ('rss', '#0284C7', 'HARO / Connectively'),
    'googlenews': ('googlenews', '#4285F4', 'Google News'),
    'majestic': ('crown', '#B91C1C', 'Majestic SEO'),
    'zapier': ('zapier', '#FF4A00', 'Zapier'),
    'midjourney': ('midjourney', '#1E293B', 'Midjourney'),
    'hubspot': ('hubspot', '#FF7A59', 'HubSpot'),
    'meta': ('meta', '#0668E1', 'Meta Business'),
    'later': ('later', '#FF4B72', 'Later'),
    'buffer': ('buffer', '#231F20', 'Buffer'),
    'capcut': ('tiktok', '#000000', 'CapCut'),
    'sproutsocial': ('sproutsocial', '#2BB673', 'Sprout Social'),
    'wordpress': ('wordpress', '#21759B', 'WordPress'),
    'elementor': ('elementor', '#92003B', 'Elementor'),
    'webflow': ('webflow', '#146EF5', 'Webflow'),
    'figma': ('figma', '#F24E1E', 'Figma'),
    'github': ('github', '#181717', 'GitHub'),
    'vercel': ('vercel', '#000000', 'Vercel'),
    'flutter': ('flutter', '#02569B', 'Flutter'),
    'react': ('react', '#61DAFB', 'React Native'),
    'firebase': ('firebase', '#FFCA28', 'Firebase'),
    'apple': ('apple', '#000000', 'Apple Developer'),
    'googleplay': ('googleplay', '#414141', 'Google Play'),
    'postman': ('postman', '#FF6C37', 'Postman'),
    'pagespeed': ('lighthouse', '#F44B21', 'PageSpeed Insights'),
    'sitebulb': ('lightbulb', '#6B21A8', 'Sitebulb'),
    'cloudflare': ('cloudflare', '#F38020', 'Cloudflare')
}

# Map of PR Outlets
pr_map = {
    'forbes': ('forbes', '#000000', 'Forbes'),
    'businessinsider': ('businessinsider', '#1F5A95', 'Business Insider'),
    'techcrunch': ('techcrunch', '#00A562', 'TechCrunch'),
    'entrepreneur': ('medium', '#000000', 'Entrepreneur'),
    'yahoo_finance': ('yahoo', '#6001D2', 'Yahoo! Finance'),
    'ap_news': ('associatedpress', '#CC0000', 'Associated Press (AP)'),
    'reuters': ('reuters', '#FF8000', 'Reuters'),
    'bloomberg': ('bloomberg', '#000000', 'Bloomberg'),
    'inc': ('invision', '#1E293B', 'Inc. Magazine'),
    'marketwatch': ('target', '#008000', 'MarketWatch')
}

# Map of Citation Sources
citations_map = {
    'google_business': ('googlemybusiness', '#4285F4', 'Google Business Profile'),
    'apple_maps': ('apple', '#000000', 'Apple Maps'),
    'bing_places': ('bing', '#008373', 'Bing Places'),
    'yelp': ('yelp', '#D32323', 'Yelp'),
    'yellowpages': ('yelp', '#EAB308', 'YellowPages'),
    'bbb': ('betterbusinessbureau', '#005A70', 'Better Business Bureau'),
    'trustpilot': ('trustpilot', '#00B67A', 'Trustpilot'),
    'tripadvisor': ('tripadvisor', '#34E0A1', 'Tripadvisor'),
    'foursquare': ('foursquare', '#F94877', 'Foursquare'),
    'mapquest': ('mapline', '#82B336', 'MapQuest'),
    'angi': ('angellist', '#FF4C00', 'Angi (Angie’s List)'),
    'nextdoor': ('nextdoor', '#00B246', 'Nextdoor'),
    'superpages': ('startpage', '#F59E0B', 'Superpages'),
    'brownbook': ('bookstack', '#78350F', 'Brownbook'),
    'hotfrog': ('frog', '#E11D48', 'Hotfrog'),
    'citysearch': ('citymetric', '#2563EB', 'Citysearch'),
    'cylex': ('compass', '#0284C7', 'Cylex'),
    'justdial': ('phonepe', '#F97316', 'Justdial'),
    'sulekha': ('superpowers', '#059669', 'Sulekha'),
    'indiamart': ('indiansuperleague', '#2E3192', 'IndiaMART')
}

def process_category(mapping, target_dir):
    for key, (slug, color, label) in mapping.items():
        svg = fetch_simple_icon(slug, color)
        if svg:
            fpath = os.path.join(target_dir, f"{key}.svg")
            with open(fpath, "w", encoding="utf-8") as f:
                f.write(svg)
            print(f"Saved {key}.svg from simple-icons")
        else:
            # Create a fallback elegant vector icon
            fpath = os.path.join(target_dir, f"{key}.svg")
            fallback_svg = f'''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48" height="48">
  <rect width="48" height="48" rx="10" fill="{color}" fill-opacity="0.1"/>
  <rect x="1" y="1" width="46" height="46" rx="9" stroke="{color}" stroke-opacity="0.2" stroke-width="1.5" fill="none"/>
  <text x="24" y="29" font-family="Montserrat, Inter, system-ui, sans-serif" font-weight="800" font-size="16" fill="{color}" text-anchor="middle">{label[:2].upper()}</text>
</svg>'''
            with open(fpath, "w", encoding="utf-8") as f:
                f.write(fallback_svg)
            print(f"Generated fallback vector {key}.svg")

print("--- Fetching Tools ---")
process_category(tools_map, tools_dir)

print("\n--- Fetching PR Outlets ---")
process_category(pr_map, pr_dir)

print("\n--- Fetching Citation Sources ---")
process_category(citations_map, citations_dir)

print("\nAll vector assets saved successfully!")
