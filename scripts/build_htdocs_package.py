import os
import shutil
import zipfile
import stat

def remove_readonly(func, path, excinfo):
    try:
        os.chmod(path, stat.S_IWRITE)
        func(path)
    except Exception:
        pass

source_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
htdocs_dest = r"C:\xampp\htdocs\digital4local"
zip_dest = os.path.join(source_dir, "digital4local_htdocs.zip")

include_dirs = ['assets', 'includes', 'config', 'api', 'services', 'industries', 'blog', '.well-known']
include_files = [
    'index.php', 'services.php', 'pricing.php', 'about.php', 'contact.php',
    'blog.php', 'blog-single.php', 'page.php', 'admin.php', 'admin-cms.php',
    'admin-login.php', 'admin-logout.php', 'sitemap.php', 'robots.txt', 'favicon.ico', 'logo.png', '.htaccess', 'router.php',
    'llms.txt', 'llm.txt', 'llms-full.txt'
]

print("=" * 70)
print("BUILDING HTDOCS DEPLOYMENT PACKAGE & DIRECTORY")
print("=" * 70)

# 1. Prepare C:\xampp\htdocs\digital4local directory
if os.path.exists(htdocs_dest):
    print(f"Cleaning existing {htdocs_dest}...")
    shutil.rmtree(htdocs_dest, onerror=remove_readonly)

os.makedirs(htdocs_dest, exist_ok=True)
print(f"Created directory: {htdocs_dest}")

# Copy directories
for d in include_dirs:
    src_path = os.path.join(source_dir, d)
    dest_path = os.path.join(htdocs_dest, d)
    if os.path.exists(src_path):
        shutil.copytree(src_path, dest_path, ignore=shutil.ignore_patterns('.git*', '__pycache__', '*.pyc'))
        print(f"  -> Copied folder: {d}/")

# Copy files
for f in include_files:
    src_file = os.path.join(source_dir, f)
    dest_file = os.path.join(htdocs_dest, f)
    if os.path.exists(src_file):
        shutil.copy2(src_file, dest_file)
        print(f"  -> Copied file: {f}")

# 2. Build ZIP Archive for Portable Deployment
if os.path.exists(zip_dest):
    os.remove(zip_dest)

print(f"\nCompressing into {zip_dest}...")
with zipfile.ZipFile(zip_dest, 'w', zipfile.ZIP_DEFLATED) as zipf:
    for root, dirs, files in os.walk(htdocs_dest):
        for file in files:
            abs_file_path = os.path.join(root, file)
            rel_path = os.path.relpath(abs_file_path, htdocs_dest)
            zipf.write(abs_file_path, rel_path)

zip_size_mb = os.path.getsize(zip_dest) / (1024 * 1024)
print(f"ZIP package created successfully! Size: {zip_size_mb:.2f} MB")

print("\n" + "=" * 70)
print("DEPLOYMENT PACKAGE BUILD COMPLETE!")
print("=" * 70)
