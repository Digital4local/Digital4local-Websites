<?php
/**
 * Dynamic XML Sitemap Generator
 * Outputs clean canonical URLs for search engines (Google, Bing, Perplexity, ChatGPT, Claude)
 * Covers all 8 Core Services, 16 Industry Verticals, 6 Research Playbooks, and Main Pages.
 */
header('Content-Type: application/xml; charset=utf-8');
require_once __DIR__ . '/includes/site-config.php';

$base_domain = 'https://digital4local.com';
$today = date('Y-m-d');

$urls = [
    // Core Navigation Hubs
    ['loc' => $base_domain . '/', 'lastmod' => $today, 'changefreq' => 'daily', 'priority' => '1.0'],
    ['loc' => $base_domain . '/services.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.9'],
    ['loc' => $base_domain . '/pricing.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.9'],
    ['loc' => $base_domain . '/about.php', 'lastmod' => $today, 'changefreq' => 'monthly', 'priority' => '0.8'],
    ['loc' => $base_domain . '/contact.php', 'lastmod' => $today, 'changefreq' => 'monthly', 'priority' => '0.9'],
    ['loc' => $base_domain . '/blog.php', 'lastmod' => $today, 'changefreq' => 'daily', 'priority' => '0.9'],
    ['loc' => $base_domain . '/industries/index.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.9'],

    // 8 Core Service Pages
    ['loc' => $base_domain . '/services/local-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.9'],
    ['loc' => $base_domain . '/services/geo-aeo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.9'],
    ['loc' => $base_domain . '/services/technical-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.9'],
    ['loc' => $base_domain . '/services/link-building-pr.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.8'],
    ['loc' => $base_domain . '/services/ai-marketing.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.9'],
    ['loc' => $base_domain . '/services/social-media.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.8'],
    ['loc' => $base_domain . '/services/web-development.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.9'],
    ['loc' => $base_domain . '/services/app-development.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.8'],

    // 16 Verified Live Industry Vertical Blueprints
    ['loc' => $base_domain . '/industries/solar-installers-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/heat-pump-installers-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/ev-charger-installers-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/roofing-companies-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/kitchen-bathroom-renovators-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/loft-conversion-builders-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/dental-clinics-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/aesthetics-clinics-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/law-firms-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/startup-seo-agency.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/saas-marketing-agency.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/driveway-landscaping-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/pool-installers-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/removal-companies-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/security-cctv-installers-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85'],
    ['loc' => $base_domain . '/industries/local-business-seo.php', 'lastmod' => $today, 'changefreq' => 'weekly', 'priority' => '0.85']
];

// Add Published Custom Landing Pages
if (isset($site_config['pages'])) {
    foreach ($site_config['pages'] as $k => $p) {
        if (strpos($k, 'custom_') === 0 && ($p['status'] ?? 'published') === 'published') {
            $slug = str_replace('custom_', '', $k);
            $urls[] = [
                'loc' => $base_domain . '/page.php?slug=' . urlencode($slug),
                'lastmod' => $today,
                'changefreq' => 'weekly',
                'priority' => '0.8'
            ];
        }
    }
}

// Add Published Blog Playbooks (Clean Direct Canonical URLs)
$published_posts = get_blog_posts(true);
foreach ($published_posts as $post) {
    if (!empty($post['slug'])) {
        $urls[] = [
            'loc' => $base_domain . '/blog/' . urlencode($post['slug']) . '.php',
            'lastmod' => $post['date'] ?? $today,
            'changefreq' => 'weekly',
            'priority' => '0.85'
        ];
    }
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($urls as $u): ?>
  <url>
    <loc><?php echo htmlspecialchars($u['loc']); ?></loc>
    <lastmod><?php echo htmlspecialchars($u['lastmod']); ?></lastmod>
    <changefreq><?php echo htmlspecialchars($u['changefreq']); ?></changefreq>
    <priority><?php echo htmlspecialchars($u['priority']); ?></priority>
  </url>
<?php endforeach; ?>
</urlset>
