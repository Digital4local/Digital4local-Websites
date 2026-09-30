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
    
    $saved = @file_put_contents(
        $settings_file, 
        json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    );

    if ($saved !== false) {
        echo json_encode([
            'success' => true,
            'message' => "New landing page '{$page_title}' created successfully!",
            'page_key' => $page_key,
            'page_url' => 'page/' . $page_slug,
            'page' => $new_page_data
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Failed to save new landing page to site_settings.json']);
    }
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
    
    if (isset($current_settings['pages'][$page_key])) {
        unset($current_settings['pages'][$page_key]);
    }
    if (isset($current_settings['custom_pages'])) {
        $current_settings['custom_pages'] = array_values(array_filter($current_settings['custom_pages'], function($p) use ($page_key) {
            return ($p['key'] ?? '') !== $page_key;
        }));
    }
    $current_settings['active_page_key'] = 'index';
    
    $saved = @file_put_contents(
        $settings_file, 
        json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    );
    
    if ($saved !== false) {
        echo json_encode([
            'success' => true,
            'message' => "Page '{$page_key}' deleted successfully!",
            'page_key' => $page_key
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Failed to update site_settings.json upon deletion.']);
    }
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
    
    $saved = @file_put_contents(
        $settings_file, 
        json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    );

    if ($saved !== false) {
        echo json_encode([
            'success' => true,
            'message' => "New blog post '{$post_title}' published successfully!",
            'post_slug' => $post_slug,
            'post_url' => 'blog/' . $post_slug,
            'post' => $new_post_data
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Failed to save new blog post to site_settings.json']);
    }
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
    
    if (isset($current_settings['blog_posts'])) {
        $current_settings['blog_posts'] = array_values(array_filter($current_settings['blog_posts'], function($p) use ($post_slug) {
            return ($p['slug'] ?? '') !== $post_slug;
        }));
    }
    $current_settings['active_page_key'] = 'blog';
    
    $saved = @file_put_contents(
        $settings_file, 
        json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    );
    
    if ($saved !== false) {
        echo json_encode([
            'success' => true,
            'message' => "Blog post '{$post_slug}' deleted successfully!",
            'post_slug' => $post_slug
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Failed to delete blog post from site_settings.json']);
    }
    exit;
}

// Action 5: Toggle Page / Post Status
if (isset($input_data['action']) && $input_data['action'] === 'toggle_page_status') {
    $page_key = trim($input_data['page_key'] ?? '');
    $new_status = (trim($input_data['status'] ?? 'published') === 'draft') ? 'draft' : 'published';
    
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
    
    $saved = @file_put_contents(
        $settings_file, 
        json_encode($current_settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    );
    echo json_encode(['success' => ($saved !== false), 'status' => $new_status]);
    exit;
}

// Action 6: Save Full CMS Settings / Page / Blog Post Data
foreach ($input_data as $key => $value) {
    if ($key === 'action' || $key === 'csrf_token') continue;
    
    // Check if updating a specific blog post
    if ($key === 'active_blog_post' && is_array($value) && isset($value['slug'])) {
        $target_slug = sanitize_safe_slug($value['slug']);
        $orig_slug = sanitize_safe_slug($input_data['original_blog_slug'] ?? ($input_data['blog_slug'] ?? $target_slug));
        
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
        
        if (!isset($current_settings['blog_posts'])) {
            $current_settings['blog_posts'] = [];
        }
        
        $value['slug'] = $target_slug;
        $found = false;
        foreach ($current_settings['blog_posts'] as &$bp) {
            if (($bp['slug'] ?? '') === $orig_slug || ($bp['slug'] ?? '') === $target_slug) {
                $bp = array_merge($bp, $value);
                $found = true;
                break;
            }
        }
        if (!$found) {
            array_unshift($current_settings['blog_posts'], $value);
        }
        
        $current_settings['active_page_key'] = 'blog_' . $target_slug;
        continue;
    }
    
    // Check if updating standard pages & custom pages
    if ($key === 'pages' && is_array($value)) {
        if (!isset($current_settings['pages'])) {
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
                if (!isset($current_settings['pages'][$page_k])) {
                    $current_settings['pages'][$page_k] = [];
                }
                $current_settings['pages'][$page_k] = array_merge($current_settings['pages'][$page_k], $page_val);
                
                // If custom page, sync to custom_pages array
                if (strpos($page_k, 'custom_') === 0 && isset($current_settings['custom_pages'])) {
                    foreach ($current_settings['custom_pages'] as &$cp) {
                        if (($cp['key'] ?? '') === $page_k) {
                            $cp = array_merge($cp, $current_settings['pages'][$page_k]);
                            break;
                        }
                    }
                }
            }
        }
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
$write_result = @file_put_contents($settings_file, $json_encoded, LOCK_EX);

if ($write_result === false) {
    http_response_code(500);
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
