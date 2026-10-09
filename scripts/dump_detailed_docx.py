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

def dump_detailed_docx(filepath):
    with zipfile.ZipFile(filepath) as z:
        xml_content = z.read('word/document.xml')
        
    tree = ET.fromstring(xml_content)
    ns = {'w': 'http://schemas.openxmlformats.org/wordprocessingml/2006/main'}
    
    body = tree.find('w:body', ns)
    elements = []
    
    for child in body:
        tag = child.tag.split('}')[-1]
        if tag == 'p':
            # check style (Heading 1, Heading 2, Heading 3, ListBullet, etc.)
            pStyle = child.find('.//w:pStyle', ns)
            style_val = pStyle.attrib.get('{http://schemas.openxmlformats.org/wordprocessingml/2006/main}val', '') if pStyle is not None else ''
            
            texts = [n.text for n in child.iter() if n.tag.endswith('t') and n.text]
            text = ''.join(texts).strip()
            if text:
                elements.append({'type': 'p', 'style': style_val, 'text': text})
        elif tag == 'tbl':
            # table
            rows = []
            for row in child.findall('.//w:tr', ns):
                cells = []
                for cell in row.findall('.//w:tc', ns):
                    cell_texts = [n.text for n in cell.iter() if n.tag.endswith('t') and n.text]
                    cells.append(' '.join(''.join(cell_texts).split()))
                rows.append(cells)
            elements.append({'type': 'table', 'rows': rows})
            
    return elements

for f in files:
    full_path = os.path.join(WORKSPACE, f)
    elems = dump_detailed_docx(full_path)
    md_lines = []
    for e in elems:
        if e['type'] == 'p':
            style = e['style']
            txt = e['text']
            if 'Heading1' in style or '1' in style and style.startswith('Heading'):
                md_lines.append(f"# {txt}\n")
            elif 'Heading2' in style or '2' in style and style.startswith('Heading'):
                md_lines.append(f"## {txt}\n")
            elif 'Heading3' in style or '3' in style and style.startswith('Heading'):
                md_lines.append(f"### {txt}\n")
            elif 'List' in style:
                md_lines.append(f"- {txt}")
            else:
                md_lines.append(f"{txt}\n")
        elif e['type'] == 'table':
            md_lines.append("\nTABLE START")
            for r in e['rows']:
                md_lines.append(" | ".join(r))
            md_lines.append("TABLE END\n")
            
    out_file = os.path.join(WORKSPACE, "content", "bhopal", f.replace('.docx', '_detailed.md'))
    with open(out_file, 'w', encoding='utf-8') as out_f:
        out_f.write("\n".join(md_lines))
    print(f"Processed {f} -> {out_file}")
