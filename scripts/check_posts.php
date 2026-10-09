<?php
require_once __DIR__ . '/../includes/db.php';
$pdo = get_db();
$stmt = $pdo->query("SELECT slug, title, featured_image, content_html FROM blog_posts ORDER BY updated_at DESC");
while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "=== SLUG: {$r['slug']} | TITLE: {$r['title']} ===\n";
    echo "Featured: {$r['featured_image']}\n";
    preg_match_all('/<img[^>]+>/i', $r['content_html'], $imgs);
    echo "Images inside content:\n";
    foreach ($imgs[0] as $img) {
        echo "  " . $img . "\n";
    }
    echo "\n";
}
