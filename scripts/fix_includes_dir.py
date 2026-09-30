import os
import re

WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

files_to_fix = []
for root, dirs, files in os.walk(WORKSPACE):
    if '.git' in root:
        continue
    for f in files:
        if f.endswith('.php'):
            p = os.path.join(root, f)
            with open(p, 'r', encoding='utf-8', errors='ignore') as fp:
                content = fp.read()
            if "../includes/" in content:
                files_to_fix.append(p)

print(f"Found {len(files_to_fix)} files with '../includes/'")

for p in files_to_fix:
    with open(p, 'r', encoding='utf-8') as fp:
        content = fp.read()
    
    # Replace include_once '../includes/ with include_once __DIR__ . '/../includes/
    # Replace include '../includes/ with include __DIR__ . '/../includes/
    # Replace require_once '../includes/ with require_once __DIR__ . '/../includes/
    # Replace require '../includes/ with require __DIR__ . '/../includes/
    updated = re.sub(r"(include(?:_once)?|require(?:_once)?)\s+(['\"])(\.\./includes/[^'\"]+)\2", r"\1 __DIR__ . '/\3'", content)
    
    if updated != content:
        with open(p, 'w', encoding='utf-8') as fp:
            fp.write(updated)
        print(f"  Fixed includes in: {os.path.relpath(p, WORKSPACE)}")

print("All include paths normalized with __DIR__.")
