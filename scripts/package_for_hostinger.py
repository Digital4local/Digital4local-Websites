import os
import zipfile

WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"
OUTPUT_ZIP = os.path.join(WORKSPACE, "digital4local_hostinger_deploy.zip")

EXCLUDE_DIRS = {'.git', '.gemini', '.system_generated', 'node_modules', '__pycache__', 'scratch'}
EXCLUDE_EXTS = {'.pyc', '.log'}

print("Packaging Digital4Local for Hostinger production deployment...")

count = 0
with zipfile.ZipFile(OUTPUT_ZIP, 'w', zipfile.ZIP_DEFLATED) as zipf:
    for root, dirs, files in os.walk(WORKSPACE):
        # Filter out excluded directories
        dirs[:] = [d for d in dirs if d not in EXCLUDE_DIRS and not d.startswith('.')]
        
        for file in files:
            if file == "digital4local_hostinger_deploy.zip":
                continue
            ext = os.path.splitext(file)[1].lower()
            if ext in EXCLUDE_EXTS:
                continue
            
            full_path = os.path.join(root, file)
            rel_path = os.path.relpath(full_path, WORKSPACE)
            
            # Skip python test scripts inside scripts folder if any, but keep other essential data
            if rel_path.startswith("scripts") and ext == ".py":
                continue
            
            zipf.write(full_path, rel_path)
            count += 1

size_mb = os.path.getsize(OUTPUT_ZIP) / (1024 * 1024)
print(f"Deployment ZIP created successfully: {OUTPUT_ZIP}")
print(f"Total Files Packaged: {count} | Archive Size: {size_mb:.2f} MB")
