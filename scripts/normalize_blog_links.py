import sqlite3
import json
import os
import sys

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')

WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"
db_path = os.path.join(WORKSPACE, 'config', 'database.sqlite')
json_path = os.path.join(WORKSPACE, 'config', 'site_settings.json')

conn = sqlite3.connect(db_path)
c = conn.cursor()

# Replacements map for relative to absolute links
replacements = {
    '../services/local-seo.php': '/services/local-seo.php',
    '../services/geo-aeo.php': '/services/geo-aeo.php',
    '../services/technical-seo.php': '/services/technical-seo.php',
    '../services/link-building-pr.php': '/services/link-building-pr.php',
    '../services/ai-marketing.php': '/services/ai-marketing.php',
    '../services/social-media.php': '/services/social-media.php',
    '../services/web-development.php': '/services/web-development.php',
    '../services/app-development.php': '/services/app-development.php',
    '../industries/solar-installers-seo.php': '/industries/solar-installers-seo.php',
    '../pricing.php': '/pricing.php',
    '../contact.php': '/contact.php',
    '../about.php': '/about.php',
    '../blog.php': '/blog.php',
    'top-10-digital-marketing-companies-india.php': '/blog/top-10-digital-marketing-companies-india',
    'smm-full-form-what-does-smm-mean.php': '/blog/smm-full-form-what-does-smm-mean',
    'seo-vs-sem-difference.php': '/blog/seo-vs-sem-difference',
    'top-marketing-companies-india.php': '/blog/top-marketing-companies-india',
    'best-digital-marketing-company-india.php': '/blog/best-digital-marketing-company-india',
    'types-of-seo-explained.php': '/blog/types-of-seo-explained',
}

c.execute('SELECT slug, title, content_html FROM blog_posts')
posts = c.fetchall()

print("Updating database.sqlite blog posts...")
for slug, title, content in posts:
    new_content = content or ''
    for old_link, new_link in replacements.items():
        if f'"{old_link}"' in new_content:
            new_content = new_content.replace(f'"{old_link}"', f'"{new_link}"')
            print(f"  [{slug}] Replaced \"{old_link}\" -> \"{new_link}\"")
        if f"'{old_link}'" in new_content:
            new_content = new_content.replace(f"'{old_link}'", f"'{new_link}'")
            print(f"  [{slug}] Replaced '{old_link}' -> '{new_link}'")
    c.execute('UPDATE blog_posts SET content_html = ? WHERE slug = ?', (new_content, slug))

conn.commit()
conn.close()
print("Database update complete!")

print("Updating site_settings.json blog posts...")
if os.path.exists(json_path):
    with open(json_path, 'r', encoding='utf-8') as fh:
        settings = json.load(fh)
    
    if 'blog_posts' in settings and isinstance(settings['blog_posts'], list):
        for bp in settings['blog_posts']:
            slug = bp.get('slug', '')
            c_html = bp.get('content_html', '')
            for old_link, new_link in replacements.items():
                if f'"{old_link}"' in c_html:
                    c_html = c_html.replace(f'"{old_link}"', f'"{new_link}"')
                if f"'{old_link}'" in c_html:
                    c_html = c_html.replace(f"'{old_link}'", f"'{new_link}'")
            bp['content_html'] = c_html
            
    with open(json_path, 'w', encoding='utf-8') as fh:
        json.dump(settings, fh, indent=4, ensure_ascii=False)
    print("site_settings.json update complete!")
