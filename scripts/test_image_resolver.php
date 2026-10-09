<?php
require_once __DIR__ . '/../includes/site-config.php';

// Test 1: Test d4l_resolve_content_images with various image URLs
$sample_html = '
<p>Intro text</p>
<img src="assets/images/uploads/upload_20261008_124142_dfc95b52.jpeg" alt="Uploaded Media" class="rounded" />
<img src="/assets/images/hero.png" alt="Hero" />
<img src="/digital4local/assets/images/logo.png" alt="Logo" />
<img src="https://example.com/cdn/image.webp" alt="CDN" />
';

echo "=== RESOLVED (Base: /) ===\n";
echo d4l_resolve_content_images($sample_html, '/') . "\n";

echo "=== RESOLVED (Base: /digital4local/) ===\n";
echo d4l_resolve_content_images($sample_html, '/digital4local/') . "\n";

// Test 2: Check active blog post rendering
$slug = 'top-10-digital-marketing-companies-india';
$post = get_blog_post($slug);
if ($post) {
    echo "Found post: " . $post['title'] . "\n";
    $rendered = d4l_resolve_content_images($post['content_html'] ?? '', '/');
    echo "Post HTML length: " . strlen($rendered) . "\n";
} else {
    echo "Post not found\n";
}
