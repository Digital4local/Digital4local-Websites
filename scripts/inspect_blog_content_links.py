import sqlite3
import json
import re
import os
import sys

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')

conn = sqlite3.connect('config/database.sqlite')
c = conn.cursor()
c.execute('SELECT slug, title, content_html FROM blog_posts')
rows = c.fetchall()

print(f"Total blog posts in DB: {len(rows)}")
for slug, title, content in rows:
    print(f"\n==========================================")
    print(f"SLUG: {slug}")
    print(f"TITLE: {title}")
    links = re.findall(r'href=[\'"]([^\'"]+)[\'"]', content or '')
    print(f"LINKS COUNT: {len(links)}")
    for l in links:
        print(f"  -> {l}")
