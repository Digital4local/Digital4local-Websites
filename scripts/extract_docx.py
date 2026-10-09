import zipfile
import xml.etree.ElementTree as ET
import os

WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"
files = [
    "D4L_Bhopal_01_seo-agency-bhopal.docx",
    "D4L_Bhopal_02_local-seo-bhopal.docx",
    "D4L_Bhopal_03_google-business-profile-optimization-bhopal.docx",
    "D4L_Bhopal_04_ai-seo-bhopal.docx",
    "D4L_Bhopal_05_digital-marketing-agency-bhopal.docx",
    "D4L_Bhopal_06_ai-agency-bhopal.docx"
]

def extract_docx_content(filepath):
    if not os.path.exists(filepath):
        return f"File not found: {filepath}"
    
    with zipfile.ZipFile(filepath) as z:
        xml_content = z.read('word/document.xml')
        
    tree = ET.fromstring(xml_content)
    namespaces = {'w': 'http://schemas.openxmlformats.org/wordprocessingml/2006/main'}
    
    paragraphs = []
    for elem in tree.iter():
        if elem.tag.endswith('p'): # paragraph
            texts = [node.text for node in elem.iter() if node.tag.endswith('t') and node.text]
            p_text = ''.join(texts).strip()
            if p_text:
                paragraphs.append(p_text)
        elif elem.tag.endswith('tbl'): # table
            # handled as paragraphs inside rows
            pass
            
    return "\n\n".join(paragraphs)

for f in files:
    full_path = os.path.join(WORKSPACE, f)
    print(f"="*70)
    print(f"FILE: {f}")
    print(f"="*70)
    content = extract_docx_content(full_path)
    # save extracted markdown/txt to content/bhopal/
    out_name = f.replace('.docx', '.md')
    os.makedirs(os.path.join(WORKSPACE, "content", "bhopal"), exist_ok=True)
    with open(os.path.join(WORKSPACE, "content", "bhopal", out_name), 'w', encoding='utf-8') as out_f:
        out_f.write(content)
    print(content[:500])
    print(f"\n[Saved to content/bhopal/{out_name}, total length: {len(content)} characters]\n")
