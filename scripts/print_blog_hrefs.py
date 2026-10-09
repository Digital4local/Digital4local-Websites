import sqlite3
import json

conn = sqlite3.connect('config/database.sqlite')
c = conn.cursor()
c.execute('SELECT slug, title, content_html FROM blog_posts')
rows = c.fetchall()

for slug, title, content in rows:
    print(f"\n==================== {slug} ====================")
    lines = (content or '').split('\n')
    for l in lines:
        if 'href=' in l:
            print("  ", l.strip())
