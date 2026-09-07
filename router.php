<?php
/**
 * Local Development Server Router for PHP built-in web server (php -S)
 * Emulates Apache .htaccess rewrite rules
 */
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file_path = __DIR__ . $uri;

// 1. Static asset files (CSS, JS, images, fonts, etc.)
if ($uri !== '/' && file_exists($file_path) && !is_dir($file_path)) {
    $ext = pathinfo($file_path, PATHINFO_EXTENSION);
    if ($ext !== 'php') {
        return false; // Serve static file directly
    }
}

// 2. Sitemap XML rewrite
if ($uri === '/sitemap.xml') {
    require __DIR__ . '/sitemap.php';
    return true;
}

// 3. Blog URLs rewrite to blog-single.php
if (preg_match('#^/blog/([a-zA-Z0-9_-]+)(?:\.php|/)?$#', $uri, $matches)) {
    $_GET['slug'] = $matches[1];
    require __DIR__ . '/blog-single.php';
    return true;
}

// 4. Clean URLs: Check if adding .php matches an existing script
if ($uri !== '/' && file_exists(__DIR__ . $uri . '.php')) {
    require __DIR__ . $uri . '.php';
    return true;
}

// 5. Check if directory has an index.php
if (is_dir($file_path) && file_exists($file_path . '/index.php')) {
    require $file_path . '/index.php';
    return true;
}

// 6. Default root index
if ($uri === '/' || $uri === '') {
    require __DIR__ . '/index.php';
    return true;
}

// Fallback to 404 or index
if (file_exists($file_path)) {
    return false;
}

http_response_code(404);
echo "404 Not Found";
return true;
