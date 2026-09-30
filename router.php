<?php
/**
 * Local Development & Reverse Proxy Server Router for PHP (php -S / built-in)
 * Emulates Apache .htaccess rewrite rules, blocks sensitive files, and enforces 410 Gone & LLM Manifests.
 */
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$file_path = __DIR__ . $uri;

// 1. Global Security Headers
if (!headers_sent()) {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('X-Permitted-Cross-Domain-Policies: none');
}

// 2. HTTP 410 Gone Interceptor for SEO Spam URLs and legacy parameters
$query_string = $_SERVER['QUERY_STRING'] ?? '';
$is_spam_path = preg_match('#^/(?:wp-admin|wp-includes|wp-content|xmlrpc\.php|wp-login\.php|wp-cron\.php|wp-json|product|product-category|shop|cart|checkout|tag|author|category|feed|comments|trackback|attachment|goods|item)#i', $uri);
$is_spam_query = preg_match('#(?:pharmacy|viagra|cialis|casino|poker|slot|buy-|cheap-|discount-|replica|outlet)#i', $query_string) ||
                 preg_match('#(?:[\xd0-\xd3][\x80-\xbf]|[\xe4-\xe9][\x80-\xbf]{2})#', $query_string) ||
                 preg_match('#(?:^|&)(?:s|search|keyword|page_id|p|cat|tag|author)=#i', $query_string);

if ($is_spam_path || $is_spam_query) {
    http_response_code(410);
    header('Content-Type: text/html; charset=UTF-8');
    echo '<!DOCTYPE html><html><head><title>410 Gone</title><meta name="robots" content="noindex, nofollow"></head><body><h1>410 Gone</h1><p>The requested resource has been permanently removed and is no longer available.</p></body></html>';
    return true;
}

// 3. AI / LLM Context Manifests (https://llmstxt.org specification)
if (in_array($uri, ['/llms.txt', '/llm.txt', '/llms-full.txt', '/.well-known/llms.txt', '/.well-known/llm.txt'])) {
    header('Content-Type: text/plain; charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, HEAD, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
    header('Cache-Control: public, max-age=3600, stale-while-revalidate=86400');
    
    if ($uri === '/llm.txt' || $uri === '/.well-known/llm.txt') {
        $llm_file = __DIR__ . '/llm.txt';
    } elseif ($uri === '/llms-full.txt') {
        $llm_file = __DIR__ . '/llms-full.txt';
    } else {
        $llm_file = __DIR__ . '/llms.txt';
    }
    
    if (file_exists($llm_file)) {
        readfile($llm_file);
    } else {
        echo "# Digital4Local\n\nAI Growth Engine & Search Marketing Agency\nhttps://digital4local.com";
    }
    return true;
}

// 4. Block Direct Access to Sensitive Folders and Extensions (HTTP 403 Forbidden)
// Explicitly permits /.well-known/ (for ACME SSL and LLM discovery)
$is_sensitive_folder = preg_match('#^/(?:config|scripts|includes|\.git)(?:/|$)#i', $uri);
$is_hidden_file = preg_match('#(?:^|/)\.(?!well-known)[a-zA-Z0-9]#', $uri);
$is_sensitive_ext = preg_match('#\.(json|py|md|env|lock|zip|tar|gz|sql|bak|log|sh|ini|config|dist|fla|inc|psd|sw[op])$#i', $uri);

if ($is_sensitive_folder || $is_hidden_file || $is_sensitive_ext) {
    http_response_code(403);
    header('Content-Type: text/html; charset=UTF-8');
    echo '<!DOCTYPE html><html><head><title>403 Forbidden</title><meta name="robots" content="noindex, nofollow"></head><body><h1>403 Forbidden</h1><p>Access to this resource is denied.</p></body></html>';
    return true;
}

// 5. Asset rewrite fallback for subfolder requests (e.g. /blog/assets/... -> /assets/...)
if (preg_match('#^/(?:blog|services|industries|page)/assets/(.*)$#', $uri, $m)) {
    $real_asset = __DIR__ . '/assets/' . $m[1];
    if (file_exists($real_asset) && !is_dir($real_asset)) {
        $mimes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'webp' => 'image/webp',
            'txt' => 'text/plain; charset=utf-8'
        ];
        $ext = strtolower(pathinfo($real_asset, PATHINFO_EXTENSION));
        header('Content-Type: ' . ($mimes[$ext] ?? 'application/octet-stream'));
        readfile($real_asset);
        return true;
    }
}

// 6. Clean 301 Redirect for legacy /blog-single.php?slug=xyz -> /blog/xyz
if (preg_match('#^/blog-single(?:\.php)?$#i', $uri) && !empty($_GET['slug'])) {
    $clean_slug = preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['slug']);
    header("Location: /blog/" . $clean_slug, true, 301);
    exit;
}

// 6.1 Clean 301 Redirect for legacy /page.php?slug=xyz -> /page/xyz
if (preg_match('#^/page(?:\.php)?$#i', $uri) && !empty($_GET['slug'])) {
    $clean_slug = preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['slug']);
    header("Location: /page/" . $clean_slug, true, 301);
    exit;
}

// 7. Direct file requests (PHP files, CSS, JS, images, fonts, txt, etc.)
if ($uri !== '/' && file_exists($file_path) && !is_dir($file_path)) {
    $ext = pathinfo($file_path, PATHINFO_EXTENSION);
    if ($ext === 'php') {
        require $file_path;
        return true;
    }
    if ($ext === 'txt') {
        header('Content-Type: text/plain; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        readfile($file_path);
        return true;
    }
    return false; // Serve static asset file directly
}

// 8. Sitemap XML rewrite
if ($uri === '/sitemap.xml') {
    require __DIR__ . '/sitemap.php';
    return true;
}

// 9. Blog URLs rewrite to blog-single.php
if (preg_match('#^/blog/([a-zA-Z0-9_-]+)(?:\.php|/)?$#', $uri, $matches)) {
    $_GET['slug'] = $matches[1];
    require __DIR__ . '/blog-single.php';
    return true;
}

// 9.1 Custom Page URLs rewrite to page.php
if (preg_match('#^/page/([a-zA-Z0-9_-]+)(?:\.php|/)?$#', $uri, $matches)) {
    $_GET['slug'] = $matches[1];
    require __DIR__ . '/page.php';
    return true;
}

// 9.2 Portfolio & Standalone Case Study URLs rewrite
if (preg_match('#^/(?:portfolio/)?case-studies/([a-zA-Z0-9_-]+)(?:\.php|/)?$#', $uri, $matches)) {
    $_GET['slug'] = $matches[1];
    require __DIR__ . '/case-study-single.php';
    return true;
}

if (preg_match('#^/(?:portfolio/)?case-studies(?:\.php|/)?$#', $uri)) {
    require __DIR__ . '/case-studies.php';
    return true;
}

// 10. Clean URLs: Check if adding .php matches an existing script
if ($uri !== '/' && file_exists(__DIR__ . $uri . '.php')) {
    require __DIR__ . $uri . '.php';
    return true;
}

// 11. Check if directory has an index.php
if (is_dir($file_path) && file_exists($file_path . '/index.php')) {
    require $file_path . '/index.php';
    return true;
}

// 12. Default root index
if ($uri === '/' || $uri === '') {
    require __DIR__ . '/index.php';
    return true;
}

// Fallback to 404
http_response_code(404);
echo "<!DOCTYPE html><html><head><title>404 Not Found</title></head><body><h1>404 Not Found</h1><p>The requested URL was not found on this server.</p></body></html>";
return true;
