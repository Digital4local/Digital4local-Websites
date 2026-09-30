import os
import sys
import json
import subprocess

PHP_PATH = r"C:\xampp\php\php.exe"

def run_php(code):
    cmd = [PHP_PATH, "-r", code]
    res = subprocess.run(cmd, capture_output=True, text=True)
    return res.stdout, res.stderr, res.returncode

def main():
    print("=== DIGITAL4LOCAL COMPREHENSIVE SECURITY & AUDIT TEST ===")
    
    # 1. Test Auth Middleware
    code_auth = """
    require_once 'includes/auth-middleware.php';
    echo 'Auth functions loaded: ' . (function_exists('authenticate_admin') ? 'YES' : 'NO') . "\n";
    echo 'CSRF token generator: ' . (function_exists('get_csrf_token') ? 'YES' : 'NO') . "\n";
    $token = get_csrf_token();
    echo 'CSRF token valid: ' . (verify_csrf_token($token) ? 'YES' : 'NO') . "\n";
    echo 'Brute force checker: ' . (function_exists('check_login_bruteforce') ? 'YES' : 'NO') . "\n";
    echo 'Safe redirect checker: ' . (safe_redirect_url('//evil.com') === 'admin.php' ? 'YES' : 'NO') . "\n";
    """
    out, err, ret = run_php(code_auth)
    print("Auth Middleware Test:")
    print(out)
    if err: print("Errors:", err)

    # 2. Test Dynamic Blog Rendering
    code_blog = """
    $_GET['slug'] = 'top-10-digital-marketing-companies-india';
    ob_start();
    require 'blog-single.php';
    $html = ob_get_clean();
    echo 'Blog Rendered Bytes: ' . strlen($html) . "\n";
    echo 'Contains Headline: ' . (strpos($html, 'Top 10 Digital Marketing Companies') !== false ? 'YES' : 'NO') . "\n";
    """
    out, err, ret = run_php(code_blog)
    print("Blog-Single Dynamic Rendering Test:")
    print(out)
    if err: print("Errors:", err)

    # 3. Test Lead Capture Honeypot Rejection
    code_lead = """
    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_POST = [
        'name' => 'SpamBot 3000',
        'email' => 'spambot@example.com',
        '_hp_company_sec' => 'I am a bot filling hidden fields'
    ];
    ob_start();
    require 'api/save-lead.php';
    $res = ob_get_clean();
    echo 'Honeypot Response: ' . $res . "\n";
    """
    out, err, ret = run_php(code_lead)
    print("Honeypot Bot Defense Test:")
    print(out)
    if err: print("Errors:", err)

    # 4. Test Unauthenticated CMS Access Rejection
    code_cms = """
    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_POST = ['action' => 'delete_blog_post', 'post_slug' => 'test'];
    ob_start();
    require 'api/update-cms-settings.php';
    $res = ob_get_clean();
    echo 'Unauthenticated CMS Access Response: ' . $res . "\n";
    """
    out, err, ret = run_php(code_cms)
    print("CMS Access Control Test:")
    print(out)
    if err: print("Errors:", err)

    # 5. Test Unauthenticated Password Reset Rejection
    code_pwd = """
    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_POST = ['new_password' => 'Hacked1234!'];
    ob_start();
    require 'api/change-password.php';
    $res = ob_get_clean();
    echo 'Unauthenticated Password Change Response: ' . $res . "\n";
    """
    out, err, ret = run_php(code_pwd)
    print("Password Change Access Control Test:")
    print(out)
    if err: print("Errors:", err)

if __name__ == '__main__':
    main()
