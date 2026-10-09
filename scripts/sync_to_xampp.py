import os
import shutil

source_dir = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"
dest_dir = r"C:\xampp\htdocs\digital4local"

if not os.path.exists(dest_dir):
    print("XAMPP destination does not exist. Skipping.")
    exit(0)

ignore_dirs = {'.git', '.gemini', '__pycache__', 'node_modules'}

copied = 0
for root, dirs, files in os.walk(source_dir):
    # filter ignore dirs
    dirs[:] = [d for d in dirs if d not in ignore_dirs]
    rel_path = os.path.relpath(root, source_dir)
    target_root = os.path.join(dest_dir, rel_path) if rel_path != '.' else dest_dir
    os.makedirs(target_root, exist_ok=True)
    
    for f in files:
        if f.endswith('.pyc') or f.endswith('.zip') or f.endswith('.docx'):
            continue
        s_file = os.path.join(root, f)
        d_file = os.path.join(target_root, f)
        
        try:
            # Check if modified or not existing
            if not os.path.exists(d_file) or os.path.getmtime(s_file) > os.path.getmtime(d_file) or os.path.getsize(s_file) != os.path.getsize(d_file):
                shutil.copy2(s_file, d_file)
                copied += 1
        except Exception as e:
            print(f"Error copying {f}: {e}")

print(f"Synced {copied} files to {dest_dir} successfully.")
