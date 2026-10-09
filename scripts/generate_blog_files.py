import sqlite3
import os
import sys

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')

WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"
blog_dir = os.path.join(WORKSPACE, 'blog')
os.makedirs(blog_dir, exist_ok=True)

# 1. Main blog/index.php
blog_index_path = os.path.join(blog_dir, 'index.php')
with open(blog_index_path, 'w', encoding='utf-8') as f:
    f.write("<?php\nrequire_once __DIR__ . '/../blog.php';\n")
print(f"Verified: {blog_index_path}")

# 2. Query all posts from DB
db_path = os.path.join(WORKSPACE, 'config', 'database.sqlite')
conn = sqlite3.connect(db_path)
c = conn.cursor()
c.execute('SELECT slug, title FROM blog_posts')
posts = c.fetchall()
conn.close()

print(f"Generating dedicated blog files for {len(posts)} posts...")
for slug, title in posts:
    if not slug:
        continue
    
    # 2a. blog/{slug}.php
    slug_php = os.path.join(blog_dir, f"{slug}.php")
    with open(slug_php, 'w', encoding='utf-8') as f:
        f.write(f"""<?php
$_GET['slug'] = '{slug}';
require_once __DIR__ . '/../blog-single.php';
""")
    print(f"  Created: blog/{slug}.php")
    
    # 2b. blog/{slug}/index.php
    slug_subfolder = os.path.join(blog_dir, slug)
    os.makedirs(slug_subfolder, exist_ok=True)
    slug_sub_index = os.path.join(slug_subfolder, 'index.php')
    with open(slug_sub_index, 'w', encoding='utf-8') as f:
        f.write(f"""<?php
$_GET['slug'] = '{slug}';
require_once __DIR__ . '/../../blog-single.php';
""")
    print(f"  Created: blog/{slug}/index.php")

print("All dedicated blog physical routes generated successfully!")
