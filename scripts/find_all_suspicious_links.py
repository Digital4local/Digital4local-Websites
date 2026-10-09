import os
import re
import sys

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')

for root, dirs, files in os.walk('.'):
    if '.git' in root or 'node_modules' in root or 'scratch' in root or '.system_generated' in root:
        continue
    for f in files:
        if f.endswith('.php'):
            path = os.path.join(root, f)
            with open(path, 'r', encoding='utf-8', errors='ignore') as fh:
                content = fh.read()
                # Find hrefs that start with ../ or don't use base_path / absolute slash
                hrefs = re.findall(r'href=[\'"]([^\'"]+)[\'"]', content)
                suspicious = []
                for h in hrefs:
                    if h.startswith('http') or h.startswith('#') or h.startswith('javascript:') or h.startswith('mailto:') or h.startswith('tel:'):
                        continue
                    if '<?php' in h or 'get_base_path' in h or '$base_path' in h or '$footer_base_path' in h:
                        continue
                    if h.startswith('../') or (not h.startswith('/') and '.php' in h):
                        suspicious.append(h)
                if suspicious:
                    print(f"\n{path}:")
                    for s in set(suspicious):
                        print(f"   {s}")
