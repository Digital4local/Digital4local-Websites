import os
import re
import datetime

workspace = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

suspicious_patterns = [
    (r'(?i)\beval\s*\(', "eval() call"),
    (r'(?i)\bgzinflate\s*\(', "gzinflate() decompression"),
    (r'(?i)\bstr_rot13\s*\(', "str_rot13() obfuscation"),
    (r'(?i)\bbase64_decode\s*\(', "base64_decode() call"),
    (r'(?i)\bassert\s*\(', "assert() dynamic execution"),
    (r'(?i)\bcreate_function\s*\(', "create_function() deprecated execution"),
    (r'(?i)\bpassthru\s*\(', "passthru() shell execution"),
    (r'(?i)\bshell_exec\s*\(', "shell_exec() shell execution"),
    (r'(?i)\bexec\s*\(', "exec() shell execution"),
    (r'(?i)\bsystem\s*\(', "system() shell execution"),
    (r'(?i)\bpreg_replace\s*\(\s*[\'"].*\/e[\'"]', "preg_replace /e modifier"),
    (r'(?i)(c99shell|r57shell|WSOshell|FilesMan|b374k)', "Known WebShell signature"),
    (r'(?i)(?:\\x[0-9a-fA-F]{2}){4,}', "Long hex-encoded sequence"),
    (r'(?i)(item/\d+|shoes/\d+|pants/\d+|nail-tips/\d+|cate-\d+)', "Hardcoded spam URL generator pattern")
]

file_inventory = []
suspicious_findings = []

for root, dirs, files in os.walk(workspace):
    # skip .git
    if '.git' in root.split(os.sep):
        continue
    for file in files:
        file_path = os.path.join(root, file)
        rel_path = os.path.relpath(file_path, workspace)
        mtime = datetime.datetime.fromtimestamp(os.path.getmtime(file_path)).strftime('%Y-%m-%d %H:%M:%S')
        size = os.path.getsize(file_path)
        
        file_inventory.append({
            "path": rel_path,
            "size": size,
            "mtime": mtime,
            "ext": os.path.splitext(file)[1].lower()
        })
        
        # Scan text / code files
        if file.endswith(('.php', '.html', '.htm', '.js', '.css', '.txt', '.json', '.htaccess', '.py', '.md')):
            try:
                with open(file_path, 'r', encoding='utf-8', errors='ignore') as f:
                    content = f.read()
                    for pattern, desc in suspicious_patterns:
                        matches = list(re.finditer(pattern, content))
                        for match in matches:
                            line_no = content[:match.start()].count('\n') + 1
                            snippet = content[max(0, match.start()-30):min(len(content), match.end()+30)].replace('\n', ' ')
                            suspicious_findings.append({
                                "file": rel_path,
                                "line": line_no,
                                "pattern": desc,
                                "snippet": snippet,
                                "mtime": mtime
                            })
            except Exception as e:
                print(f"Error reading {rel_path}: {e}")

print("=" * 80)
print(f"TOTAL FILES IN REPOSITORY: {len(file_inventory)}")
print("=" * 80)

print("\n--- SUSPICIOUS CODE SCAN RESULTS ---")
if not suspicious_findings:
    print("Zero suspicious obfuscated or malicious code patterns found!")
else:
    for s in suspicious_findings:
        print(f"  • File: {s['file']}:{s['line']} | Pattern: {s['pattern']} | Modified: {s['mtime']}")
        print(f"    Snippet: {s['snippet']}")

print("\n--- COMPLETE FILE INVENTORY ---")
for f in sorted(file_inventory, key=lambda x: x['path']):
    print(f"  • {f['path']:55s} | {f['size']:8d} bytes | {f['mtime']}")
