import os

base_dir = os.path.join(os.path.dirname(__file__), '..')
tools_dir = os.path.join(base_dir, 'assets', 'images', 'tools')
pr_dir = os.path.join(base_dir, 'assets', 'images', 'pr')
citations_dir = os.path.join(base_dir, 'assets', 'images', 'citations')

def save_svg(directory, filename, content):
    path = os.path.join(directory, filename)
    with open(path, 'w', encoding='utf-8') as f:
        f.write(content.strip())
    print(f"Refined {filename}")

# --- TOOLS REFINEMENT ---
# Ahrefs
save_svg(tools_dir, "ahrefs.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#0062FF"/>
  <path fill="#FFFFFF" d="M32 14L16 50H24L27 42H37L40 50H48L32 14ZM29 36L32 26L35 36H29Z"/>
  <path fill="#FF6B00" d="M37 42H27L25 47H39L37 42Z"/>
</svg>''')

# n8n
save_svg(tools_dir, "n8n.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#EA4B71"/>
  <circle cx="22" cy="24" r="6" fill="#FFFFFF"/>
  <circle cx="42" cy="24" r="6" fill="#FFFFFF"/>
  <circle cx="32" cy="42" r="6" fill="#FFFFFF"/>
  <line x1="22" y1="24" x2="32" y2="42" stroke="#FFFFFF" stroke-width="4"/>
  <line x1="42" y1="24" x2="32" y2="42" stroke="#FFFFFF" stroke-width="4"/>
  <line x1="22" y1="24" x2="42" y2="24" stroke="#FFFFFF" stroke-width="4"/>
</svg>''')

# Moz
save_svg(tools_dir, "moz.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#0096D6"/>
  <path fill="#FFFFFF" d="M16 46V18H24L32 32L40 18H48V46H41V28L34 40H30L23 28V46H16Z"/>
</svg>''')

# Profound AI
save_svg(tools_dir, "profound.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#6366F1"/>
  <polygon points="32,14 48,24 48,44 32,54 16,44 16,24" fill="none" stroke="#FFFFFF" stroke-width="3.5"/>
  <circle cx="32" cy="34" r="6" fill="#FFFFFF"/>
  <line x1="32" y1="14" x2="32" y2="34" stroke="#FFFFFF" stroke-width="2"/>
  <line x1="48" y1="44" x2="32" y2="34" stroke="#FFFFFF" stroke-width="2"/>
  <line x1="16" y1="44" x2="32" y2="34" stroke="#FFFFFF" stroke-width="2"/>
</svg>''')

# Majestic SEO
save_svg(tools_dir, "majestic.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#B91C1C"/>
  <path fill="#FBBF24" d="M16 46L18 24L26 34L32 18L38 34L46 24L48 46H16Z"/>
  <circle cx="18" cy="22" r="2.5" fill="#FFFFFF"/>
  <circle cx="32" cy="16" r="2.5" fill="#FFFFFF"/>
  <circle cx="46" cy="22" r="2.5" fill="#FFFFFF"/>
</svg>''')

# Midjourney
save_svg(tools_dir, "midjourney.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#0F172A"/>
  <path fill="#38BDF8" d="M32 14C32 14 38 26 46 32C40 34 32 34 32 34V14Z"/>
  <path fill="#FFFFFF" d="M30 18C30 18 24 28 18 34C24 35 30 35 30 35V18Z"/>
  <path fill="#0284C7" d="M16 38C22 42 42 42 48 38C44 46 20 46 16 38Z"/>
</svg>''')

# Sitebulb
save_svg(tools_dir, "sitebulb.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#6B21A8"/>
  <path fill="#FDE047" d="M32 16C25.4 16 20 21.4 20 28C20 32.6 22.8 36.6 26.8 38.6V42C26.8 43.1 27.7 44 28.8 44H35.2C36.3 44 37.2 43.1 37.2 42V38.6C41.2 36.6 44 32.6 44 28C44 21.4 38.6 16 32 16ZM29 48H35V46H29V48Z"/>
</svg>''')


# --- PR OUTLETS REFINEMENT ---
# Forbes
save_svg(pr_dir, "forbes.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 50" width="160" height="50">
  <text x="80" y="34" font-family="Georgia, serif" font-weight="900" font-size="28" fill="#14151A" text-anchor="middle" letter-spacing="1">Forbes</text>
</svg>''')

# Business Insider
save_svg(pr_dir, "businessinsider.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180 50" width="180" height="50">
  <text x="90" y="24" font-family="Montserrat, sans-serif" font-weight="900" font-size="14" fill="#1F5A95" text-anchor="middle" letter-spacing="1.5">BUSINESS</text>
  <text x="90" y="40" font-family="Montserrat, sans-serif" font-weight="900" font-size="14" fill="#14151A" text-anchor="middle" letter-spacing="2">INSIDER</text>
</svg>''')

# TechCrunch
save_svg(pr_dir, "techcrunch.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 50" width="160" height="50">
  <rect x="15" y="10" width="30" height="30" rx="6" fill="#00A562"/>
  <text x="30" y="31" font-family="Montserrat, sans-serif" font-weight="900" font-size="16" fill="#FFFFFF" text-anchor="middle">TC</text>
  <text x="105" y="32" font-family="Montserrat, sans-serif" font-weight="800" font-size="16" fill="#14151A" text-anchor="middle">TechCrunch</text>
</svg>''')

# Yahoo Finance
save_svg(pr_dir, "yahoo_finance.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180 50" width="180" height="50">
  <text x="90" y="25" font-family="Montserrat, sans-serif" font-weight="900" font-size="16" fill="#6001D2" text-anchor="middle">yahoo!</text>
  <text x="90" y="41" font-family="Inter, sans-serif" font-weight="700" font-size="12" fill="#14151A" text-anchor="middle" letter-spacing="1">FINANCE</text>
</svg>''')

# AP News
save_svg(pr_dir, "ap_news.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 50" width="160" height="50">
  <rect x="20" y="10" width="30" height="30" rx="4" fill="#CC0000"/>
  <text x="35" y="32" font-family="Montserrat, sans-serif" font-weight="900" font-size="18" fill="#FFFFFF" text-anchor="middle">AP</text>
  <text x="100" y="32" font-family="Montserrat, sans-serif" font-weight="800" font-size="17" fill="#14151A" text-anchor="middle">NEWS</text>
</svg>''')

# Reuters
save_svg(pr_dir, "reuters.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 50" width="160" height="50">
  <circle cx="28" cy="25" r="10" fill="#FF8000"/>
  <circle cx="28" cy="25" r="5" fill="#FFFFFF"/>
  <text x="95" y="32" font-family="Montserrat, sans-serif" font-weight="800" font-size="18" fill="#14151A" text-anchor="middle" letter-spacing="1">REUTERS</text>
</svg>''')

# Bloomberg
save_svg(pr_dir, "bloomberg.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 50" width="160" height="50">
  <text x="80" y="33" font-family="Helvetica, Arial, sans-serif" font-weight="900" font-size="20" fill="#14151A" text-anchor="middle" letter-spacing="0.5">Bloomberg</text>
</svg>''')

# MarketWatch
save_svg(pr_dir, "marketwatch.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 170 50" width="170" height="50">
  <text x="85" y="24" font-family="Montserrat, sans-serif" font-weight="900" font-size="13" fill="#008000" text-anchor="middle" letter-spacing="1">MARKET</text>
  <text x="85" y="40" font-family="Montserrat, sans-serif" font-weight="900" font-size="13" fill="#14151A" text-anchor="middle" letter-spacing="1.5">WATCH</text>
</svg>''')


# --- CITATION SOURCES REFINEMENT ---
# Bing Places
save_svg(citations_dir, "bing_places.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#008373"/>
  <path fill="#FFFFFF" d="M22 14L28 17V39L40 32L36 24L44 20L44 38L28 47L22 43V14Z"/>
</svg>''')

# BBB
save_svg(citations_dir, "bbb.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#005A70"/>
  <text x="32" y="40" font-family="Montserrat, sans-serif" font-weight="900" font-size="20" fill="#FFFFFF" text-anchor="middle" letter-spacing="1">BBB</text>
</svg>''')

# MapQuest
save_svg(citations_dir, "mapquest.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#82B336"/>
  <text x="32" y="39" font-family="Montserrat, sans-serif" font-weight="900" font-size="22" fill="#FFFFFF" text-anchor="middle">MQ</text>
</svg>''')

# Angi
save_svg(citations_dir, "angi.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#FF4C00"/>
  <text x="32" y="40" font-family="Montserrat, sans-serif" font-weight="900" font-size="18" fill="#FFFFFF" text-anchor="middle">angi</text>
</svg>''')

# Superpages
save_svg(citations_dir, "superpages.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#F59E0B"/>
  <text x="32" y="40" font-family="Montserrat, sans-serif" font-weight="900" font-size="20" fill="#FFFFFF" text-anchor="middle">SP</text>
</svg>''')

# Hotfrog
save_svg(citations_dir, "hotfrog.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#E11D48"/>
  <text x="32" y="40" font-family="Montserrat, sans-serif" font-weight="900" font-size="18" fill="#FFFFFF" text-anchor="middle">HF</text>
</svg>''')

# Citysearch
save_svg(citations_dir, "citysearch.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#2563EB"/>
  <text x="32" y="40" font-family="Montserrat, sans-serif" font-weight="900" font-size="19" fill="#FFFFFF" text-anchor="middle">CS</text>
</svg>''')

# Cylex
save_svg(citations_dir, "cylex.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#0284C7"/>
  <text x="32" y="40" font-family="Montserrat, sans-serif" font-weight="900" font-size="18" fill="#FFFFFF" text-anchor="middle">CY</text>
</svg>''')

# Sulekha
save_svg(citations_dir, "sulekha.svg", '''<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="64" height="64">
  <rect width="64" height="64" rx="14" fill="#059669"/>
  <text x="32" y="40" font-family="Montserrat, sans-serif" font-weight="900" font-size="18" fill="#FFFFFF" text-anchor="middle">SL</text>
</svg>''')

print("All vector assets refined!")
