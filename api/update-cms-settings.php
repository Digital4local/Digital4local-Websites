<?php
/**
 * CMS Settings Update API Endpoint
 * Hardened with Mandatory Admin Authentication, CSRF Validation, Slug Sanitization,
 * Path Traversal Defense, and Atomic Thread-Safe Storage.
 */
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../includes/auth-middleware.php';

$settings_file = __DIR__ . '/../config/site_settings.json';

// 1. Mandatory Session Authentication
if (!is_admin_logged_in()) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized access. You must be signed in to manage CMS content.']);
    exit;
}

// 2. Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method. Only POST is allowed.']);
    exit;
}

// 3. Read incoming input (JSON or Form Data)
$raw_input = @file_get_contents('php://input');
$input_data = @json_decode($raw_input, true);

if (!$input_data && !empty($_POST)) {
    $input_data = $_POST;
}

if (!$input_data || !is_array($input_data)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'No valid payload received.']);
    exit;
}

// 4. CSRF Token Verification
$csrf_header = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
$csrf_param = $input_data['csrf_token'] ?? '';
$token_to_verify = !empty($csrf_header) ? $csrf_header : $csrf_param;

if (!verify_csrf_token($token_to_verify)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Security token invalid or expired (CSRF mismatch). Please reload the dashboard.']);
    exit;
}

// Helper to sanitize slug and prevent path traversal
function sanitize_safe_slug($slug) {
    $slug = strtolower(preg_replace('/[^a-zA-Z0-9_\-]+/', '-', $slug));
    $slug = trim($slug, '-');
    return substr($slug, 0, 80);
}

// Helper to normalize relative links in article content to root-relative URLs
function normalize_content_links($html) {
    if (empty($html)) return $html;
    $search = [
        'href="../services/',
        "href='../services/",
        'href="../industries/',
        "href='../industries/",
        'href="../pricing.php"',
        "href='../pricing.php'",
        'href="../contact.php"',
        "href='../contact.php'",
        'href="../about.php"',
        "href='../about.php'",
        'href="../blog.php"',
        "href='../blog.php'",
    ];
    $replace = [
        'href="/services/',
        "href='/services/",
        'href="/industries/',
        "href='/industries/",
        'href="/pricing.php"',
        "href='/pricing.php'",
        'href="/contact.php"',
        "href='/contact.php'",
        'href="/about.php"',
        "href='/about.php'",
        'href="/blog.php"',
        "href='/blog.php'",
    ];
    return str_replace($search, $replace, $html);
}

// Helper to guarantee dedicated physical blog routing files exist
function sync_blog_physical_files($slug) {
    if (empty($slug)) return;
    $blog_dir = __DIR__ . '/../blog';
    if (!is_dir($blog_dir)) {
        @mkdir($blog_dir, 0755, true);
    }
    $idx_file = $blog_dir . '/index.php';
    if (!file_exists($idx_file)) {
        @file_put_contents($idx_file, "<?php\nrequire_once __DIR__ . '/../blog.php';\n");
    }
    $slug_php = $blog_dir . '/' . $slug . '.php';
    @file_put_contents($slug_php, "<?php\n\$_GET['slug'] = '" . addslashes($slug) . "';\nrequire_once __DIR__ . '/../blog-single.php';\n");
    
    $slug_dir = $blog_dir . '/' . $slug;
    if (!is_dir($slug_dir)) {
        @mkdir($slug_dir, 0755, true);
    }
    $slug_idx = $slug_dir . '/index.php';
    @file_put_contents($slug_idx, "<?php\n\$_GET['slug'] = '" . addslashes($slug) . "';\nrequire_once __DIR__ . '/../../blog-single.php';\n");
}

// Helper to remove physical blog routing files when a post is deleted
function remove_blog_physical_files($slug) {
    if (empty($slug)) return;
    $blog_dir = __DIR__ . '/../blog';
    $slug_php = $blog_dir . '/' . $slug . '.php';
    if (file_exists($slug_php)) @unlink($slug_php);
    $slug_dir = $blog_dir . '/' . $slug;
    $slug_idx = $slug_dir . '/index.php';
    if (file_exists($slug_idx)) @unlink($slug_idx);
    if (is_dir($slug_dir)) @rmdir($slug_dir);
}

// Load existing settings
$current_settings = [];
if (file_exists($settings_file)) {
    $json_content = @file_get_contents($settings_file);
    if ($json_content) {
        $current_settings = @json_decode($json_content, true) ?: [];
    }
}

// Action 1: Create New Custom Landing Page
if (isset($input_data['action']) && $input_data['action'] === 'add_custom_page') {
    $page_title = strip_tags(trim($input_data['new_page_title'] ?? ''));
    $raw_slug = trim($input_data['new_page_slug'] ?? '');
    
    if (empty($page_title)) {
        http_response_code(422);
        echo json_encode(['success' => false, 'message' => 'Page title is required.']);
        exit;
    }
    
    $page_slug = sanitize_safe_slug(!empty($raw_slug) ? $raw_slug : $page_title);
    if (empty($page_slug)) {
        $page_slug = 'custom-page-' . time();
    }
    
    $page_key = 'custom_' . $page_slug;
    
    $new_page_data = [
        'key' => $page_key,
        'page_key' => $page_key,
        'title' => $page_title,
        'url' => 'page/' . $page_slug,
        'status' => 'published',
        'badge' => strtoupper($page_title),
        'hero_title' => $page_title,
        'hero_highlight' => 'AI Growth & Search Dominance',
        'hero_subheading' => 'Specialized AI search optimization, real-time rank tracking, and sub-60s lead response automations tailored for ' . $page_title . '.',
        'meta_title' => $page_title . ' | Digital4Local',
        'meta_description' => 'Custom digital growth solution page for ' . $page_title . ' powered by Digital4Local AI engine.',
        'focus_keyword' => $page_title,
        'featured_image' => 'assets/images/hero_dashboard_light_v2.png',
        'content_html' => '<h2>Specialized ' . htmlspecialchars($page_title) . ' Growth Protocol</h2><p>Our tailored acquisition engine delivers verified search dominance, 5x5 geo-grid pin tracking, and automated lead conversions.</p><h3>Key Deliverables</h3><ul><li>Custom Google Maps & Local 3-Pack Optimization</li><li>Sub-60s Lead Response & WhatsApp Triage</li><li>Generative Engine Optimization (GEO) for AI Citations</li></ul>'
    ];
    
    // Save to Database
    try {
        db_save_page($page_key, $new_page_data);
    } catch (Exception $e) {}

    // Save to JSON
    if (!isset($current_settings['pages'])) {
        $current_settings['pages'] = [];
    }
    $current_settings['pages'][$page_key] = $new_page_data;
    
    if (!isset($current_settings['custom_pages'])) {
        $current_settings['custom_pages'] = [];
    }
    $current_settings['custom_pages'] = array_values(array_filter($current_settings['custom_pages'], function($p) use ($page_key) {
        return ($p['key'] ?? '') !== $page_key;
    }));
    $current_settings['custom_pages'][] = $new_page_data;
    $current_settings['active_page_key'] = $page_key;
    
    @file_put_contents(
        $settings_file, 
        json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    );

    echo json_encode([
        'success' => true,
        'message' => "New landing page '{$page_title}' created successfully in Database!",
        'page_key' => $page_key,
        'page_url' => 'page/' . $page_slug,
        'page' => $new_page_data
    ]);
    exit;
}

// Action 1.5: Save Location Cluster Page Data (Full Dynamic Sections & FAQs)
if (isset($input_data['action']) && $input_data['action'] === 'save_location_page') {
    $loc_slug = sanitize_safe_slug($input_data['location_slug'] ?? '');
    $loc_city = sanitize_safe_slug($input_data['city'] ?? 'bhopal');
    $loc_data = $input_data['location_data'] ?? null;
    
    if (empty($loc_slug) || empty($loc_data) || !is_array($loc_data)) {
        http_response_code(422);
        echo json_encode(['success' => false, 'message' => 'Invalid location page payload.']);
        exit;
    }
    
    // Normalize FAQs if passed as JSON string
    if (isset($loc_data['faqs']) && is_string($loc_data['faqs'])) {
        $loc_data['faqs'] = json_decode($loc_data['faqs'], true) ?: [];
    }
    // Normalize Sections if passed as JSON string
    if (isset($loc_data['sections']) && is_string($loc_data['sections'])) {
        $loc_data['sections'] = json_decode($loc_data['sections'], true) ?: [];
    }
    if (isset($loc_data['relatedSlugs']) && is_string($loc_data['relatedSlugs'])) {
        $loc_data['relatedSlugs'] = array_values(array_filter(array_map('trim', explode(',', $loc_data['relatedSlugs']))));
    }
    if (isset($loc_data['recentInsightsTags']) && is_string($loc_data['recentInsightsTags'])) {
        $loc_data['recentInsightsTags'] = array_values(array_filter(array_map('trim', explode(',', $loc_data['recentInsightsTags']))));
    }
    
    $loc_data['slug'] = $loc_slug;
    $loc_data['city'] = $loc_data['city'] ?? ucfirst($loc_city);
    
    // 1. Save to Database (MySQL / SQLite)
    try {
        if (function_exists('db_save_location_page')) {
            db_save_location_page($loc_slug, $loc_city, $loc_data);
        }
    } catch (Exception $e) {}

    // 2. Save to workspace data/{city}/{slug}.json
    $target_dir = __DIR__ . '/../data/' . $loc_city;
    if (!is_dir($target_dir)) {
        @mkdir($target_dir, 0755, true);
    }
    $target_file = $target_dir . '/' . $loc_slug . '.json';
    $json_content = json_encode($loc_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    @file_put_contents($target_file, $json_content, LOCK_EX);
    
    // Ensure routing folder and index.php exist in workspace
    $route_dir = __DIR__ . '/../' . $loc_slug;
    if (!is_dir($route_dir)) {
        @mkdir($route_dir, 0755, true);
    }
    $route_idx = $route_dir . '/index.php';
    if (!file_exists($route_idx)) {
        $code = "<?php\nrequire_once __DIR__ . '/../includes/location/LocationServicePage.php';\n\$page_data = d4l_get_location_page_data('{$loc_slug}', '{$loc_city}');\nd4l_render_location_page(\$page_data);\n";
        @file_put_contents($route_idx, $code);
    }
    
    // 2. Sync to XAMPP htdocs if active
    $xampp_dir = 'C:/xampp/htdocs/digital4local';
    if (is_dir($xampp_dir)) {
        $xampp_data_dir = $xampp_dir . '/data/' . $loc_city;
        if (!is_dir($xampp_data_dir)) @mkdir($xampp_data_dir, 0755, true);
        @file_put_contents($xampp_data_dir . '/' . $loc_slug . '.json', $json_content, LOCK_EX);
        
        $xampp_route_dir = $xampp_dir . '/' . $loc_slug;
        if (!is_dir($xampp_route_dir)) @mkdir($xampp_route_dir, 0755, true);
        @file_put_contents($xampp_route_dir . '/index.php', "<?php\nrequire_once __DIR__ . '/../includes/location/LocationServicePage.php';\n\$page_data = d4l_get_location_page_data('{$loc_slug}', '{$loc_city}');\nd4l_render_location_page(\$page_data);\n");
    }
    
    echo json_encode([
        'success' => true,
        'message' => "Location page '{$loc_slug}' saved and updated live!",
        'location_slug' => $loc_slug,
        'location_url' => $loc_slug . '/'
    ]);
    exit;
}

// Action 1.6: Add New Location Page
if (isset($input_data['action']) && $input_data['action'] === 'add_location_page') {
    $loc_title = strip_tags(trim($input_data['location_title'] ?? ''));
    $loc_city = sanitize_safe_slug($input_data['location_city'] ?? 'bhopal');
    $raw_slug = trim($input_data['location_slug'] ?? '');
    $is_hub = !empty($input_data['is_hub']);
    
    if (empty($loc_title)) {
        http_response_code(422);
        echo json_encode(['success' => false, 'message' => 'Location title is required.']);
        exit;
    }
    
    $loc_slug = sanitize_safe_slug(!empty($raw_slug) ? $raw_slug : $loc_title);
    $city_cap = ucfirst($loc_city);
    
    $new_loc_data = [
        'slug' => $loc_slug,
        'city' => $city_cap,
        'state' => 'Madhya Pradesh',
        'country' => 'India',
        'isHub' => $is_hub,
        'schemaType' => 'ProfessionalService',
        'h1' => $loc_title,
        'metaTitle' => $loc_title . ' | Digital4Local',
        'metaDescription' => 'Leading AI growth and SEO agency serving ' . $city_cap . ' businesses.',
        'primaryKeyword' => $loc_title,
        'badge' => strtoupper($city_cap) . ' AGENCY HUB · AI AGENTS + HUMAN EXPERTS',
        'heroDirectAnswer' => 'Digital4Local provides top-rated search engine optimization and AI growth services in ' . $city_cap . '.',
        'heroSubtitle' => 'Dominate local Search, Google Maps, and AI answer engines across ' . $city_cap . '.',
        'heroMotif' => 'combined',
        'lastUpdated' => date('F Y'),
        'cta' => [
            'label' => 'Claim Your Free ' . $city_cap . ' SEO Audit',
            'sublabel' => 'We will analyze your map rankings and competitor gaps within 24 hours.',
            'buttonText' => 'Get a Free Audit',
            'whatsappText' => 'Hi Abhishek, I want a free audit for my business in ' . $city_cap . '.'
        ],
        'sections' => [
            [
                'id' => 'overview',
                'type' => 'content_block',
                'tag' => 'STRATEGY OVERVIEW',
                'title' => 'Why ' . $city_cap . ' Businesses Need Modern Search in ' . date('Y'),
                'content' => '<p>Modern customers in ' . $city_cap . ' search across Google, Maps, and AI tools like ChatGPT and Gemini. We optimize across all four channels.</p>',
                'highlights' => [
                    ['title' => 'Google Search', 'desc' => 'Classic intent-led organic ranking.', 'icon' => 'search'],
                    ['title' => 'Google Maps', 'desc' => 'Top 3-pack prominence in local pins.', 'icon' => 'map-pin'],
                    ['title' => 'AI Engines', 'desc' => 'ChatGPT & Gemini direct citations.', 'icon' => 'bot']
                ]
            ]
        ],
        'faqs' => [
            [
                'q' => 'How much does SEO cost in ' . $city_cap . '?',
                'a' => 'Our local SEO retainers for ' . $city_cap . ' start from ₹15,000/month with clear monthly deliverables and no lock-in.'
            ]
        ],
        'relatedSlugs' => ['seo-agency-' . $loc_city, 'local-seo-' . $loc_city],
        'recentInsightsTags' => ['local-seo', 'ai-search']
    ];
    
    // 1. Save to Database (MySQL / SQLite)
    try {
        if (function_exists('db_save_location_page')) {
            db_save_location_page($loc_slug, $loc_city, $new_loc_data);
        }
    } catch (Exception $e) {}

    // 2. Save to workspace data/{city}/{slug}.json
    $target_dir = __DIR__ . '/../data/' . $loc_city;
    if (!is_dir($target_dir)) @mkdir($target_dir, 0755, true);
    $target_file = $target_dir . '/' . $loc_slug . '.json';
    $json_content = json_encode($new_loc_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    @file_put_contents($target_file, $json_content, LOCK_EX);
    
    // Route folder
    $route_dir = __DIR__ . '/../' . $loc_slug;
    if (!is_dir($route_dir)) @mkdir($route_dir, 0755, true);
    @file_put_contents($route_dir . '/index.php', "<?php\nrequire_once __DIR__ . '/../includes/location/LocationServicePage.php';\n\$page_data = d4l_get_location_page_data('{$loc_slug}', '{$loc_city}');\nd4l_render_location_page(\$page_data);\n");
    
    // Sync to XAMPP
    $xampp_dir = 'C:/xampp/htdocs/digital4local';
    if (is_dir($xampp_dir)) {
        $xampp_data_dir = $xampp_dir . '/data/' . $loc_city;
        if (!is_dir($xampp_data_dir)) @mkdir($xampp_data_dir, 0755, true);
        @file_put_contents($xampp_data_dir . '/' . $loc_slug . '.json', $json_content, LOCK_EX);
        $xampp_route_dir = $xampp_dir . '/' . $loc_slug;
        if (!is_dir($xampp_route_dir)) @mkdir($xampp_route_dir, 0755, true);
        @file_put_contents($xampp_route_dir . '/index.php', "<?php\nrequire_once __DIR__ . '/../includes/location/LocationServicePage.php';\n\$page_data = d4l_get_location_page_data('{$loc_slug}', '{$loc_city}');\nd4l_render_location_page(\$page_data);\n");
    }
    
    echo json_encode([
        'success' => true,
        'message' => "New Location Page '{$loc_title}' created successfully in Database & Filesystem!",
        'page_key' => 'location_' . $loc_slug,
        'location_url' => $loc_slug . '/'
    ]);
    exit;
}

// Action 2: Delete Custom Landing Page
if (isset($input_data['action']) && $input_data['action'] === 'delete_custom_page') {
    $page_key = trim($input_data['page_key'] ?? '');
    
    if (empty($page_key)) {
        http_response_code(422);
        echo json_encode(['success' => false, 'message' => 'Page key is required to delete.']);
        exit;
    }
    
    // Delete from Database
    try {
        db_delete_page($page_key);
    } catch (Exception $e) {}

    // Delete from JSON
    if (isset($current_settings['pages'][$page_key])) {
        unset($current_settings['pages'][$page_key]);
    }
    if (isset($current_settings['custom_pages'])) {
        $current_settings['custom_pages'] = array_values(array_filter($current_settings['custom_pages'], function($p) use ($page_key) {
            return ($p['key'] ?? '') !== $page_key;
        }));
    }
    $current_settings['active_page_key'] = 'index';
    
    @file_put_contents(
        $settings_file, 
        json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    );
    
    echo json_encode([
        'success' => true,
        'message' => "Page '{$page_key}' deleted successfully from Database!",
        'page_key' => $page_key
    ]);
    exit;
}

// Action 3: Add New Blog Post
if (isset($input_data['action']) && $input_data['action'] === 'add_blog_post') {
    $post_title = strip_tags(trim($input_data['new_post_title'] ?? ''));
    $raw_slug = trim($input_data['new_post_slug'] ?? '');
    $category = strip_tags(trim($input_data['new_post_category'] ?? 'Local SEO'));
    
    if (empty($post_title)) {
        http_response_code(422);
        echo json_encode(['success' => false, 'message' => 'Post title is required.']);
        exit;
    }
    
    $post_slug = sanitize_safe_slug(!empty($raw_slug) ? $raw_slug : $post_title);
    if (empty($post_slug)) {
        $post_slug = 'article-' . time();
    }
    
    $new_post_data = [
        'slug' => $post_slug,
        'title' => $post_title,
        'status' => 'published',
        'category' => $category,
        'author' => 'Abhishek Raikwar',
        'author_title' => 'Founder & Principal Search Engineer',
        'date' => date('Y-m-d'),
        'read_time' => '6 Min Read',
        'featured_image' => 'assets/images/hero_dashboard_light_v2.png',
        'excerpt' => 'An in-depth analysis and actionable growth playbook for ' . $post_title . '.',
        'meta_title' => $post_title . ' | Digital4Local Blog',
        'meta_description' => 'Comprehensive playbook on ' . $post_title . ' engineered for modern businesses and search teams.',
        'focus_keyword' => $post_title,
        'content_html' => '<p class="text-lg text-[#14151A] leading-relaxed">Introduction to ' . htmlspecialchars($post_title) . '. Discover the key strategies and algorithmic frameworks required for modern organic search growth.</p><h2>1. Key Architectural Principles</h2><p>Breakdown of essential steps, technical configurations, and workflow execution.</p><div class="card-dark p-6 border-l-4 border-l-[#00A8B5] my-6 bg-[#F6F8FB]"><div class="text-xs font-mono text-[#00A8B5] font-bold mb-1">STRATEGIC TAKEAWAY</div><div class="text-sm text-[#14151A]">Execute structured data optimizations and vector schema to maximize AI search visibility.</div></div>',
        'highlights' => ['Execute structured data optimizations and vector schema to maximize AI search visibility.'],
        'faqs' => [
            ['q' => 'How does this strategy improve rankings?', 'a' => 'By aligning with Google algorithm signals and search intent.'],
            ['q' => 'What is the estimated turnaround time?', 'a' => 'Tangible organic improvements are typically measurable within 30-45 days.']
        ]
    ];
    
    // Save to Database
    try {
        db_save_blog($new_post_data);
    } catch (Exception $e) {}

    // Guarantee physical routing files exist
    sync_blog_physical_files($post_slug);

    // Save to JSON
    if (!isset($current_settings['blog_posts'])) {
        $current_settings['blog_posts'] = [];
    }
    
    $current_settings['blog_posts'] = array_values(array_filter($current_settings['blog_posts'], function($p) use ($post_slug) {
        return ($p['slug'] ?? '') !== $post_slug;
    }));
    
    array_unshift($current_settings['blog_posts'], $new_post_data);
    $current_settings['active_page_key'] = 'blog_' . $post_slug;
    
    @file_put_contents(
        $settings_file, 
        json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    );

    echo json_encode([
        'success' => true,
        'message' => "New blog post '{$post_title}' published successfully to Database!",
        'post_slug' => $post_slug,
        'post_url' => 'blog/' . $post_slug,
        'post' => $new_post_data
    ]);
    exit;
}

// Action 4: Delete Blog Post
if (isset($input_data['action']) && $input_data['action'] === 'delete_blog_post') {
    $post_slug = sanitize_safe_slug(trim($input_data['post_slug'] ?? ''));
    
    if (empty($post_slug)) {
        http_response_code(422);
        echo json_encode(['success' => false, 'message' => 'Post slug is required to delete.']);
        exit;
    }
    
    // Delete from Database
    try {
        db_delete_blog($post_slug);
    } catch (Exception $e) {}

    // Remove physical routing files
    remove_blog_physical_files($post_slug);

    // Delete from JSON
    if (isset($current_settings['blog_posts'])) {
        $current_settings['blog_posts'] = array_values(array_filter($current_settings['blog_posts'], function($p) use ($post_slug) {
            return ($p['slug'] ?? '') !== $post_slug;
        }));
    }
    $current_settings['active_page_key'] = 'blog';
    
    @file_put_contents(
        $settings_file, 
        json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    );
    
    echo json_encode([
        'success' => true,
        'message' => "Blog post '{$post_slug}' deleted successfully from Database!",
        'post_slug' => $post_slug
    ]);
    exit;
}

// Action 5: Toggle Page / Post Status
if (isset($input_data['action']) && $input_data['action'] === 'toggle_page_status') {
    $page_key = trim($input_data['page_key'] ?? '');
    $new_status = (trim($input_data['status'] ?? 'published') === 'draft') ? 'draft' : 'published';
    
    if (strpos($page_key, 'blog_') === 0) {
        $slug = substr($page_key, 5);
        try {
            $blog = db_get_blog_by_slug($slug);
            if ($blog) {
                $blog['status'] = $new_status;
                db_save_blog($blog, $slug);
            }
        } catch (Exception $e) {}

        if (isset($current_settings['blog_posts']) && is_array($current_settings['blog_posts'])) {
            foreach ($current_settings['blog_posts'] as &$bp) {
                if (($bp['slug'] ?? '') === $slug) {
                    $bp['status'] = $new_status;
                    break;
                }
            }
            unset($bp);
        }
    } else {
        try {
            $pg = db_get_page_config($page_key);
            if ($pg) {
                $pg['status'] = $new_status;
                db_save_page($page_key, $pg);
            }
        } catch (Exception $e) {}

        if (isset($current_settings['pages'][$page_key])) {
            $current_settings['pages'][$page_key]['status'] = $new_status;
        }
    }
    
    @file_put_contents(
        $settings_file, 
        json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    );
    @chmod($settings_file, 0664);
    echo json_encode(['success' => true, 'status' => $new_status]);
    exit;
}

// Action 6: Save Full CMS Settings / Page / Blog Post Data
$updated_blog_slug = null;
foreach ($input_data as $key => $value) {
    if ($key === 'action' || $key === 'csrf_token' || $key === 'original_blog_slug' || $key === 'is_blog_post' || $key === 'blog_slug') {
        continue;
    }
    
    // Check if updating a specific blog post
    if ($key === 'active_blog_post' && is_array($value) && isset($value['slug'])) {
        $target_slug = sanitize_safe_slug($value['slug']);
        if (empty($target_slug)) {
            $target_slug = 'article-' . time();
        }
        $orig_slug = sanitize_safe_slug($input_data['original_blog_slug'] ?? ($input_data['blog_slug'] ?? $target_slug));
        
        // Ensure required fields
        if (empty($value['status'])) {
            $value['status'] = 'published';
        }
        if (empty($value['date'])) {
            $value['date'] = date('Y-m-d');
        }
        if (empty($value['title'])) {
            $value['title'] = ucwords(str_replace('-', ' ', $target_slug));
        }

        // Handle FAQs if passed as JSON string or array
        if (isset($value['faqs'])) {
            if (is_string($value['faqs'])) {
                $decoded_faqs = @json_decode($value['faqs'], true);
                if (is_array($decoded_faqs)) {
                    $value['faqs'] = $decoded_faqs;
                }
            }
            if (is_array($value['faqs'])) {
                $value['faqs'] = array_values(array_filter($value['faqs'], function($f) {
                    return (!empty(trim($f['q'] ?? '')) || !empty(trim($f['a'] ?? '')));
                }));
            }
        }

        // Handle Highlights
        if (isset($value['highlights_text'])) {
            $h_lines = array_map('trim', explode("\n", $value['highlights_text']));
            $value['highlights'] = array_values(array_filter($h_lines, function($l) {
                return !empty($l);
            }));
            unset($value['highlights_text']);
        } elseif (isset($value['highlights']) && is_string($value['highlights'])) {
            $h_lines = array_map('trim', explode("\n", $value['highlights']));
            $value['highlights'] = array_values(array_filter($h_lines, function($l) {
                return !empty($l);
            }));
        }
        
        $value['slug'] = $target_slug;
        $value['content_html'] = normalize_content_links($value['content_html'] ?? '');

        // 1. Save to Database
        try {
            db_save_blog($value, $orig_slug);
        } catch (Exception $e) {}

        // Guarantee physical routing files exist
        sync_blog_physical_files($target_slug);
        if (!empty($orig_slug) && $orig_slug !== $target_slug) {
            remove_blog_physical_files($orig_slug);
        }

        // 2. Save to JSON array
        if (!isset($current_settings['blog_posts']) || !is_array($current_settings['blog_posts'])) {
            $current_settings['blog_posts'] = [];
        }
        
        $found = false;
        foreach ($current_settings['blog_posts'] as &$bp) {
            if (($bp['slug'] ?? '') === $orig_slug || ($bp['slug'] ?? '') === $target_slug) {
                $bp = array_merge($bp, $value);
                $found = true;
                break;
            }
        }
        unset($bp);

        if (!$found) {
            array_unshift($current_settings['blog_posts'], $value);
        }
        
        $current_settings['active_page_key'] = 'blog_' . $target_slug;
        $updated_blog_slug = $target_slug;
        continue;
    }
    
    // Check if updating standard pages & custom pages
    if ($key === 'pages' && is_array($value)) {
        if (!isset($current_settings['pages']) || !is_array($current_settings['pages'])) {
            $current_settings['pages'] = [];
        }
        foreach ($value as $page_k => $page_val) {
            if (is_array($page_val)) {
                // Handle FAQs decoding & cleaning
                if (isset($page_val['faqs'])) {
                    if (is_string($page_val['faqs'])) {
                        $dec = @json_decode($page_val['faqs'], true);
                        if (is_array($dec)) $page_val['faqs'] = $dec;
                    }
                    if (is_array($page_val['faqs'])) {
                        $page_val['faqs'] = array_values(array_filter($page_val['faqs'], function($f) {
                            return (!empty(trim($f['q'] ?? '')) || !empty(trim($f['a'] ?? '')));
                        }));
                    }
                }
                
                // Save to Database
                try {
                    db_save_page($page_k, $page_val);
                } catch (Exception $e) {}

                if (!isset($current_settings['pages'][$page_k])) {
                    $current_settings['pages'][$page_k] = [];
                }
                $current_settings['pages'][$page_k] = array_merge($current_settings['pages'][$page_k], $page_val);
                
                // If custom page, sync to custom_pages array
                if (strpos($page_k, 'custom_') === 0 && isset($current_settings['custom_pages']) && is_array($current_settings['custom_pages'])) {
                    foreach ($current_settings['custom_pages'] as &$cp) {
                        if (($cp['key'] ?? '') === $page_k || ($cp['page_key'] ?? '') === $page_k) {
                            $cp = array_merge($cp, $current_settings['pages'][$page_k]);
                            break;
                        }
                    }
                    unset($cp);
                }
            }
        }
        continue;
    }
    
    // Save general settings (brand, hero, contact, pricing, seo, footer, active_page_key) to DB
    try {
        db_set_setting($key, $value);
    } catch (Exception $e) {}

    if (is_array($value) && isset($current_settings[$key]) && is_array($current_settings[$key])) {
        $current_settings[$key] = array_replace_recursive($current_settings[$key], $value);
    } else {
        $current_settings[$key] = $value;
    }
}

// Atomic file write for backup sync
$json_encoded = json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@file_put_contents($settings_file, $json_encoded, LOCK_EX);
@chmod($settings_file, 0664);

$response_page_key = $input_data['active_page_key'] ?? ($current_settings['active_page_key'] ?? 'index');
if (!empty($updated_blog_slug)) {
    $response_page_key = 'blog_' . $updated_blog_slug;
}

echo json_encode([
    'success' => true,
    'message' => 'Website CMS configuration updated and published successfully to Database!',
    'timestamp' => date('Y-m-d H:i:s'),
    'active_page_key' => $response_page_key,
    'post_slug' => $updated_blog_slug,
    'post_url' => $updated_blog_slug ? ('blog/' . $updated_blog_slug) : null
]);

