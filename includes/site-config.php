<?php
/**
 * Site Configuration Helper & Loader
 * Centralizes all dynamic JSON settings with complete fallback dictionary
 */

$settings_file = __DIR__ . '/../config/site_settings.json';

if (!function_exists('get_base_path')) {
    /**
     * Helper to compute dynamic base URL path for assets and links
     * Works on domain root (https://digital4local.com -> '/')
     * and subfolders (http://localhost/digital4local/ -> '/digital4local/')
     */
    function get_base_path() {
        static $base = null;
        if ($base !== null) return $base;
        
        $script = $_SERVER['SCRIPT_NAME'] ?? '';
        $script_dir = dirname($script);
        $script_dir = str_replace('\\', '/', $script_dir);
        $script_dir = preg_replace('#/(services|industries|blog|api)(/.*)?$#i', '', $script_dir);
        $script_dir = trim($script_dir, '/');
        
        $base = !empty($script_dir) ? '/' . $script_dir . '/' : '/';
        return $base;
    }
}
$base_path = get_base_path();

// Default Fallback Array
$site_config_defaults = [
    'brand' => [
        'site_name' => 'Digital4Local',
        'tagline' => 'The AI Growth Engine for Local Businesses, Startups & SaaS',
        'logo_path' => 'assets/images/digital4local_logo.png',
        'logo_alt' => 'Digital4Local AI Growth Engine',
        'logo_header_height' => 'h-10 sm:h-12 lg:h-14',
        'logo_footer_height' => 'h-14 sm:h-16'
    ],
    'hero' => [
        'badge' => '● ELITE AI GROWTH AGENCY — LONDON, AUSTIN & BHOPAL HUBS',
        'heading_part1' => 'The AI Agency That Engineers',
        'heading_highlight' => '#1 Google Map Ranks & ChatGPT Dominance.',
        'subheading' => 'Digital4Local replaces slow legacy agency retainers with real-time 5x5 Google Maps grid rank tracking, Generative Engine Optimization (GEO/AEO) for ChatGPT & Perplexity, sub-60s lead automations, and custom Web & App builds.',
        'cta_primary_text' => 'Book Strategy Session',
        'cta_secondary_text' => 'Claim Free Rank Audit'
    ],
    'contact' => [
        'email_primary' => 'contact@digital4local.com',
        'email_secondary' => 'info@digital4local.com',
        'phone' => '+1 (512) 890-4400',
        'whatsapp' => '+44 20 7946 0912',
        'hubs' => [
            ['city' => 'London', 'country' => 'UK', 'label' => 'Europe & Global Operations Hub'],
            ['city' => 'Austin', 'country' => 'USA', 'label' => 'North America Client Operations'],
            ['city' => 'Bhopal', 'country' => 'India', 'label' => 'Asia-Pacific Engineering & R&D Center']
        ]
    ],
    'pricing' => [
        'currency_default' => 'INR',
        'retainer_local_seo' => '9999',
        'retainer_geo_aeo' => '12999',
        'setup_web_dev' => '24999',
        'setup_app_dev' => '79999',
        'packages' => [
            'launch' => [
                'name' => 'Launch',
                'setup_inr' => '₹29,999',
                'setup_usd' => '$699',
                'setup_gbp' => '£559',
                'monthly_inr' => '₹14,999/mo',
                'monthly_usd' => '$349/mo',
                'monthly_gbp' => '£279/mo'
            ],
            'growth' => [
                'name' => 'Growth',
                'setup_inr' => '₹79,999',
                'setup_usd' => '$1,799',
                'setup_gbp' => '£1,439',
                'monthly_inr' => '₹44,999/mo',
                'monthly_usd' => '$999/mo',
                'monthly_gbp' => '£799/mo'
            ],
            'enterprise' => [
                'name' => 'Enterprise',
                'setup_inr' => '₹1,49,999',
                'setup_usd' => '$3,499',
                'setup_gbp' => '£2,799',
                'monthly_inr' => '₹89,999/mo',
                'monthly_usd' => '$1,999/mo',
                'monthly_gbp' => '£1,599/mo'
            ]
        ]
    ],
    'pages' => [],
    'blog_posts' => [],
    'custom_pages' => [],
    'seo' => [
        'default_title' => 'Digital4Local | The AI Growth Engine for Local Businesses, Startups & SaaS',
        'meta_description' => 'Digital4Local is an AI-driven growth agency specializing in Local SEO, GEO, AEO, Technical SEO, Link Building & PR, and Social Media growth.',
        'target_keywords' => 'AI SEO, Local SEO, GEO, Generative Engine Optimization, AEO, Answer Engine Optimization, Digital PR, Technical SEO, SaaS SEO, Startup Marketing'
    ],
    'footer' => [
        'copyright' => '© 2026 Digital4Local. All rights reserved.',
        'description' => 'The international-standard AI growth engine powering Local Businesses, Startups, and SaaS enterprises to dominate Google Maps, Local SEO, and AI Search Engines (GEO & AEO).'
    ]
];

// Load site settings JSON
$site_config = $site_config_defaults;
if (file_exists($settings_file)) {
    $json_content = @file_get_contents($settings_file);
    if ($json_content) {
        $decoded = @json_decode($json_content, true);
        if (is_array($decoded)) {
            $site_config = array_replace_recursive($site_config_defaults, $decoded);
        }
    }
}

/**
 * Get Configuration For A Specific Page
 */
function get_page_config($page_key) {
    global $site_config;
    
    // Check in standard pages
    if (isset($site_config['pages'][$page_key]) && is_array($site_config['pages'][$page_key])) {
        return $site_config['pages'][$page_key];
    }
    
    // Check in custom pages with custom_ prefix
    $custom_key = 'custom_' . str_replace('custom_', '', $page_key);
    if (isset($site_config['pages'][$custom_key]) && is_array($site_config['pages'][$custom_key])) {
        return $site_config['pages'][$custom_key];
    }
    
    // Search custom_pages array
    if (isset($site_config['custom_pages']) && is_array($site_config['custom_pages'])) {
        foreach ($site_config['custom_pages'] as $cp) {
            if ((isset($cp['key']) && ($cp['key'] === $page_key || $cp['key'] === $custom_key)) ||
                (isset($cp['slug']) && $cp['slug'] === $page_key)) {
                return $cp;
            }
        }
    }
    
    // Default fallback
    return [
        'title' => ucwords(str_replace(['services_', 'industries_', '_', '-'], ' ', $page_key)),
        'badge' => 'DIGITAL4LOCAL AI ENGINE',
        'hero_title' => ucwords(str_replace(['services_', 'industries_', '_', '-'], ' ', $page_key)),
        'hero_highlight' => 'AI Growth & Dominance',
        'hero_subheading' => 'High-performance AI search optimization and autonomous acquisition pipelines.',
        'meta_title' => 'Digital4Local | ' . ucwords(str_replace(['services_', 'industries_', '_', '-'], ' ', $page_key)),
        'meta_description' => 'AI-driven growth engine for ambitious brands seeking search dominance.',
        'status' => 'published',
        'featured_image' => 'assets/images/hero_dashboard_light_v2.png',
        'content_html' => '<h2>Custom Growth Architecture</h2><p>Engineering specialized search optimization and conversion solutions for your business.</p>'
    ];
}

/**
 * Get Page Status Helper
 */
function get_page_status($page_key) {
    $cfg = get_page_config($page_key);
    return $cfg['status'] ?? 'published';
}

/**
 * Get All Blog Posts Helper
 */
function get_blog_posts($only_published = false) {
    global $site_config;
    $posts = $site_config['blog_posts'] ?? [];
    if (!is_array($posts)) return [];
    
    if ($only_published) {
        return array_values(array_filter($posts, function($p) {
            return ($p['status'] ?? 'published') === 'published';
        }));
    }
    return $posts;
}

/**
 * Get Single Blog Post by Slug
 */
function get_blog_post($slug) {
    global $site_config;
    $posts = $site_config['blog_posts'] ?? [];
    if (is_array($posts)) {
        foreach ($posts as $post) {
            if (isset($post['slug']) && $post['slug'] === $slug) {
                return $post;
            }
        }
    }
    return null;
}
