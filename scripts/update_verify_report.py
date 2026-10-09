import os
import re

WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"
DATA_DIR = os.path.join(WORKSPACE, "data", "bhopal")

verify_report = ["# Bhopal Location Cluster - Verification & Fact-Check Report (VERIFY.md)\n"]
verify_report.append("This report logs all items tagged with `[[VERIFY ...]]` extracted from the 6 Bhopal location cluster Word documents. In development and staging modes, these render as visible yellow placeholder chips.\n")
verify_report.append("## Unresolved Verification Items by Page\n")

for f in os.listdir(DATA_DIR):
    if f.endswith('.json'):
        filepath = os.path.join(DATA_DIR, f)
        with open(filepath, 'r', encoding='utf-8') as jf:
            content = jf.read()
        
        matches = re.findall(r'\[\[VERIFY:?\s*([^\]]+)\]\]', content, re.IGNORECASE)
        page_slug = f.replace('.json', '')
        verify_report.append(f"### `/{page_slug}/`")
        if matches:
            for idx, m in enumerate(matches, 1):
                verify_report.append(f"{idx}. `[[VERIFY: {m}]]`")
        else:
            verify_report.append("No verification tags.")
        verify_report.append("")

out_file = os.path.join(WORKSPACE, "content", "bhopal", "VERIFY.md")
with open(out_file, 'w', encoding='utf-8') as out_f:
    out_f.write("\n".join(verify_report))

print("VERIFY.md updated with all tags!")
