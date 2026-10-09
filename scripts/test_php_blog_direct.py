import subprocess
import os
import sys

if sys.platform == "win32":
    sys.stdout.reconfigure(encoding='utf-8', errors='replace')

PHP_PATH = r"C:\xampp\php\php.exe"
WORKSPACE = r"c:\Users\ASUS\OneDrive\Desktop\Digital4local websites -Antigreavity"

def test_php_code(code_snippet, env_vars=None):
    env = os.environ.copy()
    if env_vars:
        env.update(env_vars)
    res = subprocess.run(
        [PHP_PATH, "-r", code_snippet],
        cwd=WORKSPACE,
        capture_output=True,
        env=env
    )
    stdout = res.stdout.decode('utf-8', errors='replace')
    stderr = res.stderr.decode('utf-8', errors='replace')
    return stdout, stderr, res.returncode

print("=" * 70)
print("TESTING PHP EXECUTION OF BLOG PAGES")
print("=" * 70)

# 1. Test blog.php directly
out, err, ret = test_php_code("""
$_SERVER['PHP_SELF'] = '/blog.php';
$_SERVER['SCRIPT_NAME'] = '/blog.php';
$_SERVER['REQUEST_URI'] = '/blog.php';
require 'blog.php';
""")
if ret == 0 and "Digital4Local" in out and "Local SEO" in out:
    print(f" [PASS] blog.php rendered successfully ({len(out)} bytes)")
else:
    print(f" [FAIL] blog.php render failed: {err}")

# 2. Test blog/index.php
out, err, ret = test_php_code("""
$_SERVER['PHP_SELF'] = '/blog/index.php';
$_SERVER['SCRIPT_NAME'] = '/blog/index.php';
$_SERVER['REQUEST_URI'] = '/blog/';
require 'blog/index.php';
""")
if ret == 0 and "Digital4Local" in out:
    print(f" [PASS] blog/index.php rendered successfully ({len(out)} bytes)")
else:
    print(f" [FAIL] blog/index.php render failed: {err}")

# 3. Test all 6 blog posts via blog/{slug}.php
slugs = [
    'top-10-digital-marketing-companies-india',
    'smm-full-form-what-does-smm-mean',
    'seo-vs-sem-difference',
    'top-marketing-companies-india',
    'best-digital-marketing-company-india',
    'types-of-seo-explained'
]

for s in slugs:
    file_path = f"blog/{s}.php"
    out, err, ret = test_php_code(f"""
    $_SERVER['PHP_SELF'] = '/blog/{s}.php';
    $_SERVER['SCRIPT_NAME'] = '/blog/{s}.php';
    $_SERVER['REQUEST_URI'] = '/blog/{s}';
    require '{file_path}';
    """)
    if ret == 0 and len(out) > 5000:
        has_broken = "../services/" in out or "../industries/" in out or "does not exist" in out
        if not has_broken:
            print(f" [PASS] {file_path:<48} -> Rendered {len(out)} bytes | Clean links verified")
        else:
            print(f" [FAIL] {file_path:<48} -> Contains broken relative links or error text!")
    else:
        print(f" [FAIL] {file_path:<48} -> Error: {err}")

# 4. Test all 6 blog posts via blog/{slug}/index.php
for s in slugs:
    file_path = f"blog/{s}/index.php"
    out, err, ret = test_php_code(f"""
    $_SERVER['PHP_SELF'] = '/blog/{s}/index.php';
    $_SERVER['SCRIPT_NAME'] = '/blog/{s}/index.php';
    $_SERVER['REQUEST_URI'] = '/blog/{s}/';
    require '{file_path}';
    """)
    if ret == 0 and len(out) > 5000:
        has_broken = "../services/" in out or "../industries/" in out or "does not exist" in out
        if not has_broken:
            print(f" [PASS] {file_path:<48} -> Rendered {len(out)} bytes | Clean links verified")
        else:
            print(f" [FAIL] {file_path:<48} -> Contains broken relative links or error text!")
    else:
        print(f" [FAIL] {file_path:<48} -> Error: {err}")

print("=" * 70)
print("DIRECT PHP RENDERING TESTS COMPLETE!")
print("=" * 70)
