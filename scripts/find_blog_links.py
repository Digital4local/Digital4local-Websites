import os
import re

for root, dirs, files in os.walk('.'):
    if '.git' in root or 'node_modules' in root:
        continue
    for f in files:
        if f.endswith('.php') or f.endswith('.html') or f.endswith('.js'):
            path = os.path.join(root, f)
            with open(path, 'r', encoding='utf-8', errors='ignore') as fh:
                content = fh.read()
                matches = re.findall(r'href=[\'"]([^\'"]*blog[^\'"]*)[\'"]', content, re.IGNORECASE)
                if matches:
                    print(f"{path}:")
                    for m in sorted(set(matches)):
                        print(f"   {m}")
