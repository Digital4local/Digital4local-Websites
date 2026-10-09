<?php
/**
 * Site Configuration Helper & Loader
 * Centralizes all dynamic Database & JSON settings with complete fallback dictionary
 */

require_once __DIR__ . '/db.php';

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
        $script_dir = preg_replace('#/(services|industries|blog|api|case-studies|[a-z0-9_-]+-bhopal|location_[a-z0-9_-]+)(/.*)?$#i', '', $script_dir);
        $script_dir = trim($script_dir, '/');
        
        $base = !empty($script_dir) ? '/' . $script_dir . '/' : '/';
        return $base;
    }
}
$base_path = get_base_path();

if (!function_exists('d4l_resolve_content_images')) {
    /**
     * Re-writes relative image src attributes in dynamic HTML content
     * to always resolve correctly regardless of routing depth or subdirectory installs
     */
    function d4l_resolve_content_images($html, $base_path = null) {
        if (empty($html)) return $html;
        if ($base_path === null) {
            $base_path = function_exists('get_base_path') ? get_base_path() : '/';
        }
        $normalized_base = '/' . trim($base_path, '/') . '/';
        if ($normalized_base === '//') $normalized_base = '/';
        $base_folder = trim($base_path, '/');

        return preg_replace_callback('/<img([^>]+)src=["\']([^"\']+)["\']([^>]*)>/i', function($m) use ($normalized_base, $base_folder) {
            $before = $m[1];
            $src = $m[2];
            $after = $m[3];

            // If absolute URL (http, https, data:, blob:)
            if (preg_match('#^(https?:|data:|blob:)#i', $src)) {
                return $m[0];
            }

            // Strip leading slashes and dots
            $clean = ltrim($src, './');
            
            // If already prefixed with base folder, strip it first to prevent duplicate folder
            if (!empty($base_folder) && strpos($clean, $base_folder . '/') === 0) {
                $clean = substr($clean, strlen($base_folder) + 1);
            }

            $resolved_src = ($normalized_base === '/' ? '/' : $normalized_base) . ltrim($clean, '/');
            return "<img{$before}src=\"{$resolved_src}\"{$after}>";
        }, $html);
    }
}

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
    'stats' => [
        'clients_count' => '228+',
        'clients_label' => 'Clients Worked With Us',
        'revenue_count' => '$45M+',
        'revenue_label' => 'Client Revenue Generated',
        'accuracy_count' => '99.4%',
        'accuracy_label' => 'Geo-Grid Rank Accuracy',
        'markets_count' => '500+',
        'markets_label' => 'Metro Markets Dominated'
    ],
    'why_choose_us' => [
        'badge' => 'WHY DIGITAL4LOCAL',
        'heading' => 'Built for Local Businesses & Growth Brands',
        'subheading' => 'We don\'t sell vanity metrics. We build AI systems that capture market share, rank on Google Maps, and drive qualified inbound phone calls.',
        'feature1_title' => '5x5 Geo-Grid Precision Tracking',
        'feature1_desc' => 'Real-time zip-code pin rank monitoring so you see exact local search dominance.',
        'feature2_title' => 'Sub-60s Lead Response Automations',
        'feature2_desc' => 'Instant WhatsApp and SMS follow-ups powered by n8n and AI intent classification.',
        'feature3_title' => 'GEO & AEO Search Dominance',
        'feature3_desc' => 'Optimized metadata and schema structured specifically for ChatGPT, Claude & Perplexity citations.',
        'feature4_title' => 'Custom Web & Mobile Builds',
        'feature4_desc' => 'High-converting, lightning-fast modern websites and apps designed for maximum conversion.'
    ],
    'n8n_workflow' => [
        'badge' => 'AUTOMATION BLUEPRINT',
        'heading' => 'Our 4-Step n8n Lead Workflow Architecture',
        'subheading' => 'How Digital4Local captures, triages, and converts local high-intent leads in sub-60 seconds using AI webhooks.',
        'phase1_title' => 'Lead Scraper & Trigger Setup',
        'phase1_desc' => 'Capturing web form webhook events, meta ad forms, and incoming email inquiries instantly.',
        'phase2_title' => 'AI Intent Triage',
        'phase2_desc' => 'OpenAI API nodes analyze lead query urgency, budget indicators, and service requirements.',
        'phase3_title' => 'Omnichannel Dispatch',
        'phase3_desc' => 'Sub-60s SMS/WhatsApp notifications and automated calendar scheduling links dispatched to lead.',
        'phase4_title' => 'CRM Sync & Analytics',
        'phase4_desc' => 'Updating HubSpot/GoHighLevel deal stages and logging conversion metrics automatically.'
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

// 1. Initialize site_config with defaults
$site_config = $site_config_defaults;

// 2. Base layer from site_settings.json
if (file_exists($settings_file)) {
    $json_content = @file_get_contents($settings_file);
    if ($json_content) {
        $decoded = @json_decode($json_content, true);
        if (is_array($decoded)) {
            $site_config = array_replace_recursive($site_config, $decoded);
        }
    }
}

// 3. Database Overrides (Dynamic runtime settings)
try {
    $settings_to_load = ['brand', 'hero', 'stats', 'why_choose_us', 'n8n_workflow', 'contact', 'pricing', 'seo', 'footer'];
    foreach ($settings_to_load as $skey) {
        $db_val = db_get_setting($skey, null);
        if ($db_val !== null) {
            $site_config[$skey] = is_array($db_val) 
                ? array_replace_recursive($site_config[$skey] ?? [], $db_val) 
                : $db_val;
        }
    }
    $db_active_key = db_get_setting('active_page_key', 'index');
    if ($db_active_key !== null) {
        $site_config['active_page_key'] = $db_active_key;
    }

    // Load Pages from DB
    $db_pages = db_get_all_pages();
    if (!empty($db_pages)) {
        $site_config['pages'] = array_merge($site_config['pages'] ?? [], $db_pages);
        $site_config['custom_pages'] = array_values(array_filter($db_pages, function($p) {
            return ($p['page_type'] ?? '') === 'custom' || strpos($p['page_key'] ?? '', 'custom_') === 0;
        }));
    }

    // Load Blogs from DB
    $db_blogs = db_get_all_blogs(false);
    if (!empty($db_blogs)) {
        $site_config['blog_posts'] = $db_blogs;
    }
} catch (Exception $e) {
    // Keep JSON/default fallbacks intact
}

/**
 * Get Configuration For A Specific Page
 */
function get_page_config($page_key) {
    global $site_config;
    
    // 1. Try fetching directly from database
    try {
        $db_page = db_get_page_config($page_key);
        if ($db_page) {
            return $db_page;
        }
        
        $custom_key = 'custom_' . str_replace('custom_', '', $page_key);
        $db_custom = db_get_page_config($custom_key);
        if ($db_custom) {
            return $db_custom;
        }
    } catch (Exception $e) {
        // Fallback to array cache
    }
    
    // 2. Check in standard pages array
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
                (isset($cp['page_key']) && ($cp['page_key'] === $page_key || $cp['page_key'] === $custom_key)) ||
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
    
    // 1. Try fetching directly from database
    try {
        $db_posts = db_get_all_blogs($only_published);
        if (!empty($db_posts)) {
            return $db_posts;
        }
    } catch (Exception $e) {
        // Fallback to array cache
    }
    
    $posts = $site_config['blog_posts'] ?? [];
    if (!is_array($posts)) return [];
    
    if ($only_published) {
        $posts = array_values(array_filter($posts, function($p) {
            return ($p['status'] ?? 'published') === 'published';
        }));
    }
    
    // Sort all blog posts by date DESC so newly published articles always appear first
    usort($posts, function($a, $b) {
        $timeA = !empty($a['date']) ? strtotime($a['date']) : 0;
        $timeB = !empty($b['date']) ? strtotime($b['date']) : 0;
        if ($timeA === $timeB) return 0;
        return ($timeA > $timeB) ? -1 : 1;
    });
    
    return $posts;
}

/**
 * Get Single Blog Post by Slug
 */
function get_blog_post($slug) {
    global $site_config;
    if (empty($slug)) return null;
    
    $clean_slug = strtolower(urldecode(trim(str_replace('.php', '', $slug), '/')));
    
    // 1. Try fetching directly from database
    try {
        $db_post = db_get_blog_by_slug($clean_slug);
        if ($db_post) {
            return $db_post;
        }
    } catch (Exception $e) {
        // Fallback to array search
    }
    
    $posts = $site_config['blog_posts'] ?? [];
    if (is_array($posts)) {
        foreach ($posts as $post) {
            if (isset($post['slug']) && strcasecmp(trim($post['slug'], '/'), $clean_slug) === 0) {
                return $post;
            }
        }
    }
    return null;
}

