<?php
/**
 * CMS Settings Update API Endpoint
 * Handles atomic JSON updates for all website pages, custom pages, and blog posts
 */
header('Content-Type: application/json');

$settings_file = __DIR__ . '/../config/site_settings.json';

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method. Only POST is allowed.']);
    exit;
}

// Read incoming input (JSON or Form Data)
$raw_input = file_get_contents('php://input');
$input_data = json_decode($raw_input, true);

if (!$input_data && !empty($_POST)) {
    $input_data = $_POST;
}

if (!$input_data) {
    echo json_encode(['success' => false, 'message' => 'No valid payload received.']);
    exit;
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
    $page_title = trim($input_data['new_page_title'] ?? '');
    $page_slug = trim($input_data['new_page_slug'] ?? '');
    
    if (empty($page_title)) {
        echo json_encode(['success' => false, 'message' => 'Page title is required.']);
        exit;
    }
    
    if (empty($page_slug)) {
        $page_slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $page_title));
        $page_slug = trim($page_slug, '-');
    } else {
        $page_slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $page_slug));
        $page_slug = trim($page_slug, '-');
    }
    
    $page_key = 'custom_' . $page_slug;
    
    $new_page_data = [
        'key' => $page_key,
        'title' => $page_title,
        'url' => 'page.php?slug=' . $page_slug,
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
    
    if (!isset($current_settings['pages'])) {
        $current_settings['pages'] = [];
    }
    $current_settings['pages'][$page_key] = $new_page_data;
    
    if (!isset($current_settings['custom_pages'])) {
        $current_settings['custom_pages'] = [];
    }
    // Remove if existing
    $current_settings['custom_pages'] = array_values(array_filter($current_settings['custom_pages'], function($p) use ($page_key) {
        return ($p['key'] ?? '') !== $page_key;
    }));
    $current_settings['custom_pages'][] = $new_page_data;
    $current_settings['active_page_key'] = $page_key;
    
    $saved = @file_put_contents($settings_file, json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    
    if ($saved !== false) {
        echo json_encode([
            'success' => true,
            'message' => "New landing page '{$page_title}' created successfully!",
            'page_key' => $page_key,
            'page_url' => 'page.php?slug=' . $page_slug,
            'page' => $new_page_data
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save new landing page to site_settings.json']);
    }
    exit;
}

// Action 2: Delete Custom Landing Page
if (isset($input_data['action']) && $input_data['action'] === 'delete_custom_page') {
    $page_key = trim($input_data['page_key'] ?? '');
    
    if (empty($page_key)) {
        echo json_encode(['success' => false, 'message' => 'Page key is required to delete.']);
        exit;
    }
    
    if (isset($current_settings['pages'][$page_key])) {
        unset($current_settings['pages'][$page_key]);
    }
    if (isset($current_settings['custom_pages'])) {
        $current_settings['custom_pages'] = array_values(array_filter($current_settings['custom_pages'], function($p) use ($page_key) {
            return ($p['key'] ?? '') !== $page_key;
        }));
    }
    $current_settings['active_page_key'] = 'index';
    
    $saved = @file_put_contents($settings_file, json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    
    if ($saved !== false) {
        echo json_encode([
            'success' => true,
            'message' => "Page '{$page_key}' deleted successfully!",
            'page_key' => $page_key
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update site_settings.json upon deletion.']);
    }
    exit;
}

// Action 3: Add New Blog Post
if (isset($input_data['action']) && $input_data['action'] === 'add_blog_post') {
    $post_title = trim($input_data['new_post_title'] ?? '');
    $post_slug = trim($input_data['new_post_slug'] ?? '');
    $category = trim($input_data['new_post_category'] ?? 'Local SEO');
    
    if (empty($post_title)) {
        echo json_encode(['success' => false, 'message' => 'Post title is required.']);
        exit;
    }
    
    if (empty($post_slug)) {
        $post_slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $post_title));
        $post_slug = trim($post_slug, '-');
    } else {
        $post_slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $post_slug));
        $post_slug = trim($post_slug, '-');
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
        'content_html' => '<p class="text-lg text-[#14151A] leading-relaxed">Introduction to ' . htmlspecialchars($post_title) . '. Discover the key strategies and algorithmic frameworks required for modern organic search growth.</p><h2>1. Key Architectural Principles</h2><p>Breakdown of essential steps, technical configurations, and workflow execution.</p><div class="card-dark p-6 border-l-4 border-l-[#00A8B5] my-6 bg-[#F6F8FB]"><div class="text-xs font-mono text-[#00A8B5] font-bold mb-1">STRATEGIC TAKEAWAY</div><div class="text-sm text-[#14151A]">Execute structured data optimizations and vector schema to maximize AI search visibility.</div></div>'
    ];
    
    if (!isset($current_settings['blog_posts'])) {
        $current_settings['blog_posts'] = [];
    }
    
    // Filter existing post with same slug if any
    $current_settings['blog_posts'] = array_values(array_filter($current_settings['blog_posts'], function($p) use ($post_slug) {
        return ($p['slug'] ?? '') !== $post_slug;
    }));
    
    array_unshift($current_settings['blog_posts'], $new_post_data);
    $current_settings['active_page_key'] = 'blog_' . $post_slug;
    
    $saved = @file_put_contents($settings_file, json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    
    if ($saved !== false) {
        echo json_encode([
            'success' => true,
            'message' => "New blog post '{$post_title}' published successfully!",
            'post_slug' => $post_slug,
            'post_url' => 'blog-single.php?slug=' . $post_slug,
            'post' => $new_post_data
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save new blog post to site_settings.json']);
    }
    exit;
}

// Action 4: Delete Blog Post
if (isset($input_data['action']) && $input_data['action'] === 'delete_blog_post') {
    $post_slug = trim($input_data['post_slug'] ?? '');
    
    if (empty($post_slug)) {
        echo json_encode(['success' => false, 'message' => 'Post slug is required to delete.']);
        exit;
    }
    
    if (isset($current_settings['blog_posts'])) {
        $current_settings['blog_posts'] = array_values(array_filter($current_settings['blog_posts'], function($p) use ($post_slug) {
            return ($p['slug'] ?? '') !== $post_slug;
        }));
    }
    $current_settings['active_page_key'] = 'blog';
    
    $saved = @file_put_contents($settings_file, json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    
    if ($saved !== false) {
        echo json_encode([
            'success' => true,
            'message' => "Blog post '{$post_slug}' deleted successfully!",
            'post_slug' => $post_slug
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete blog post from site_settings.json']);
    }
    exit;
}

// Action 5: Toggle Page / Post Status
if (isset($input_data['action']) && $input_data['action'] === 'toggle_page_status') {
    $page_key = trim($input_data['page_key'] ?? '');
    $new_status = trim($input_data['status'] ?? 'published');
    
    if (strpos($page_key, 'blog_') === 0) {
        $slug = substr($page_key, 5);
        if (isset($current_settings['blog_posts'])) {
            foreach ($current_settings['blog_posts'] as &$bp) {
                if (($bp['slug'] ?? '') === $slug) {
                    $bp['status'] = $new_status;
                    break;
                }
            }
        }
    } else if (isset($current_settings['pages'][$page_key])) {
        $current_settings['pages'][$page_key]['status'] = $new_status;
    }
    
    $saved = @file_put_contents($settings_file, json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    echo json_encode(['success' => ($saved !== false), 'status' => $new_status]);
    exit;
}

// Action 6: Save Full CMS Settings / Page / Blog Post Data
// Merge incoming data recursively
foreach ($input_data as $key => $value) {
    if ($key === 'action') continue;
    
    // Check if updating a specific blog post
    if ($key === 'active_blog_post' && is_array($value) && isset($value['slug'])) {
        $target_slug = trim($value['slug']);
        $orig_slug = trim($input_data['original_blog_slug'] ?? $input_data['blog_slug'] ?? $target_slug);
        
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

        // Handle Highlights if passed as textarea string or array
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
        
        if (!isset($current_settings['blog_posts'])) {
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
        if (!$found) {
            $current_settings['blog_posts'][] = $value;
        }
        
        $current_settings['active_page_key'] = 'blog_' . $target_slug;
        continue;
    }
    
    if (is_array($value) && isset($current_settings[$key]) && is_array($current_settings[$key])) {
        $current_settings[$key] = array_replace_recursive($current_settings[$key], $value);
    } else {
        $current_settings[$key] = $value;
    }
}

// Atomic file write
$json_encoded = json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
$write_result = @file_put_contents($settings_file, $json_encoded);

if ($write_result === false) {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to write updated settings to config/site_settings.json. Check file permissions.'
    ]);
    exit;
}

echo json_encode([
    'success' => true,
    'message' => 'Website CMS configuration updated successfully!',
    'timestamp' => date('Y-m-d H:i:s'),
    'active_page_key' => $input_data['active_page_key'] ?? ($current_settings['active_page_key'] ?? 'index')
]);
