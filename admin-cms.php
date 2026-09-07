<?php
require_once __DIR__ . '/includes/auth-middleware.php';
require_admin_login();
$admin_user = get_logged_in_admin();

require_once __DIR__ . '/includes/site-config.php';

// Fetch active page or default to index
$active_key = $_GET['page'] ?? ($site_config['active_page_key'] ?? 'index');
$active_blog_slug = '';

$is_blog_item = false;
$active_blog_post = null;

if (strpos($active_key, 'blog_') === 0) {
    $is_blog_item = true;
    $active_blog_slug = substr($active_key, 5);
    $active_blog_post = get_blog_post($active_blog_slug);
    if (!$active_blog_post) {
        $active_blog_post = [
            'slug' => $active_blog_slug,
            'title' => ucwords(str_replace('-', ' ', $active_blog_slug)),
            'status' => 'published',
            'category' => 'Local SEO',
            'author' => 'Abhishek Raikwar',
            'author_title' => 'Founder, Digital4Local',
            'date' => date('Y-m-d'),
            'read_time' => '6 Min Read',
            'featured_image' => 'assets/images/hero_dashboard_light_v2.png',
            'excerpt' => 'Article description and strategic summary.',
            'meta_title' => ucwords(str_replace('-', ' ', $active_blog_slug)) . ' | Digital4Local Blog',
            'meta_description' => 'Comprehensive playbook engineered for modern businesses.',
            'focus_keyword' => ucwords(str_replace('-', ' ', $active_blog_slug)),
            'faqs' => [],
            'content_html' => '<h2>1. Introduction</h2><p>Write or paste your article body content here...</p>'
        ];
    }
}

// All standard and custom pages list
$core_pages = [
    'index' => ['title' => 'Home Page', 'url' => 'index.php', 'type' => 'Core'],
    'services' => ['title' => 'Services Catalog', 'url' => 'services.php', 'type' => 'Core'],
    'pricing' => ['title' => 'Pricing & Plans', 'url' => 'pricing.php', 'type' => 'Core'],
    'about' => ['title' => 'About Us', 'url' => 'about.php', 'type' => 'Core'],
    'contact' => ['title' => 'Contact & Hubs', 'url' => 'contact.php', 'type' => 'Core'],
    'blog' => ['title' => 'Blog & Playbooks', 'url' => 'blog.php', 'type' => 'Core']
];

$service_pages = [
    'services_local_seo' => ['title' => 'Local SEO & Maps', 'url' => 'services/local-seo.php', 'type' => 'Service'],
    'services_geo_aeo' => ['title' => 'GEO & AEO Citations', 'url' => 'services/geo-aeo.php', 'type' => 'Service'],
    'services_tech_seo' => ['title' => 'Technical SEO', 'url' => 'services/technical-seo.php', 'type' => 'Service'],
    'services_link_pr' => ['title' => 'Link Building & PR', 'url' => 'services/link-building-pr.php', 'type' => 'Service'],
    'services_ai_marketing' => ['title' => 'AI Marketing & n8n', 'url' => 'services/ai-marketing.php', 'type' => 'Service'],
    'services_social_media' => ['title' => 'Social Media Growth', 'url' => 'services/social-media.php', 'type' => 'Service'],
    'services_web_dev' => ['title' => 'Web Development', 'url' => 'services/web-development.php', 'type' => 'Service'],
    'services_app_dev' => ['title' => 'App Development', 'url' => 'services/app-development.php', 'type' => 'Service']
];

$industry_pages = [
    'industries_index' => ['title' => 'Industries Hub', 'url' => 'industries/index.php', 'type' => 'Industry'],
    'industries_local_biz' => ['title' => 'Local Businesses', 'url' => 'industries/local-business.php', 'type' => 'Industry'],
    'industries_startups' => ['title' => 'Startups & Scaleups', 'url' => 'industries/startups.php', 'type' => 'Industry'],
    'industries_saas' => ['title' => 'SaaS Enterprise', 'url' => 'industries/saas.php', 'type' => 'Industry']
];

$custom_pages = [];
if (isset($site_config['pages'])) {
    foreach ($site_config['pages'] as $k => $p) {
        if (strpos($k, 'custom_') === 0) {
            $custom_pages[$k] = [
                'title' => $p['title'] ?? 'Custom Landing Page',
                'url' => $p['url'] ?? ('page.php?slug=' . str_replace('custom_', '', $k)),
                'type' => 'Landing Page'
            ];
        }
    }
}
if (isset($site_config['custom_pages']) && is_array($site_config['custom_pages'])) {
    foreach ($site_config['custom_pages'] as $cp) {
        $k = $cp['key'] ?? ('custom_' . ($cp['slug'] ?? 'page'));
        if (!isset($custom_pages[$k])) {
            $custom_pages[$k] = [
                'title' => $cp['title'] ?? 'Custom Landing Page',
                'url' => $cp['url'] ?? ('page.php?slug=' . ($cp['slug'] ?? 'page')),
                'type' => 'Landing Page'
            ];
        }
    }
}

$blog_posts_list = get_blog_posts();

// Resolve active item data
if ($is_blog_item) {
    $active_title = $active_blog_post['title'] ?? 'Blog Article';
    $active_url = 'blog-single.php?slug=' . urlencode($active_blog_slug);
    $active_status = $active_blog_post['status'] ?? 'published';
    $active_type = 'Blog Article';
} else {
    $all_registered = array_merge($core_pages, $service_pages, $industry_pages, $custom_pages);
    $active_item = $all_registered[$active_key] ?? ['title' => 'Home Page', 'url' => 'index.php', 'type' => 'Core'];
    $active_title = $active_item['title'];
    $active_url = $active_item['url'];
    $active_type = $active_item['type'];
    $active_status = get_page_status($active_key);
}

$page_cfg = get_page_config($active_key);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CMS Studio & Content Suite | Digital4Local</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&family=Montserrat:wght@500;600;700;800&display=swap" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  
  <!-- CKEditor 5 CDN -->
  <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

  <style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
    .font-mono { font-family: 'JetBrains Mono', monospace; }
    
    /* Custom Scrollbars */
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: #0F172A; }
    ::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: #475569; }

    .page-nav-item.active {
      background: linear-gradient(90deg, rgba(0, 240, 255, 0.15) 0%, rgba(0, 168, 181, 0.05) 100%);
      border-left: 3px solid #00F0FF;
      color: #00F0FF;
      font-weight: 700;
    }

    .editor-tab-btn.active {
      border-bottom: 2px solid #00A8B5;
      color: #00F0FF;
      background: rgba(0, 168, 181, 0.1);
      font-weight: 700;
    }

    .sidebar-mode-btn.active {
      background: #00A8B5;
      color: #0F172A;
      font-weight: 700;
    }

    /* CKEditor Custom Styling for CMS Studio */
    .ck-editor__editable_inline {
      min-height: 380px !important;
      max-height: 540px !important;
      background-color: #0B0F19 !important;
      color: #E2E8F0 !important;
      padding: 1.25rem !important;
      font-size: 0.925rem !important;
      line-height: 1.7 !important;
    }
    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
      border-color: #1F2937 !important;
    }
    .ck.ck-editor__main>.ck-editor__editable.ck-focused {
      border-color: #00A8B5 !important;
      box-shadow: 0 0 0 2px rgba(0, 168, 181, 0.2) !important;
    }
    .ck.ck-toolbar {
      background: #1E293B !important;
      border-color: #334155 !important;
      border-top-left-radius: 0.75rem !important;
      border-top-right-radius: 0.75rem !important;
    }
    .ck.ck-toolbar .ck-button {
      color: #CBD5E1 !important;
    }
    .ck.ck-toolbar .ck-button:hover {
      background: #334155 !important;
      color: #FFFFFF !important;
    }
    .ck.ck-toolbar .ck-button.ck-on {
      background: #00A8B5 !important;
      color: #0F172A !important;
    }
    .ck.ck-dropdown__panel {
      background: #1E293B !important;
      border-color: #334155 !important;
    }
    .ck.ck-list__item .ck-button:hover {
      background: #334155 !important;
      color: #00F0FF !important;
    }
    .ck.ck-list__item .ck-button {
      color: #E2E8F0 !important;
    }
  </style>
</head>
<body class="bg-[#0B0F19] text-[#E2E8F0] min-h-screen flex flex-col antialiased selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <!-- Top Global Command Bar -->
  <header class="h-14 bg-[#111827] border-b border-[#1F2937] px-4 flex items-center justify-between z-40 shrink-0">
    <div class="flex items-center gap-3">
      <a href="admin.php" class="flex items-center gap-2 group">
        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#00F0FF] to-[#00A8B5] flex items-center justify-center text-[#0F172A] font-extrabold text-sm shadow-md group-hover:scale-105 transition-transform">
          D4L
        </div>
        <div>
          <span class="font-extrabold text-white text-sm tracking-tight">CMS Studio</span>
          <span class="text-[10px] text-[#00F0FF] font-mono block -mt-1 font-bold">DIGITAL4LOCAL v3.0</span>
        </div>
      </a>
      <span class="text-[#374151] mx-2">|</span>
      <div class="flex items-center gap-2 text-xs">
        <span class="text-[#9CA3AF]">Active:</span>
        <span class="px-2.5 py-0.5 rounded-full bg-[#1F2937] text-white border border-[#374151] font-mono font-semibold flex items-center gap-1.5">
          <span class="w-1.5 h-1.5 rounded-full <?php echo $is_blog_item ? 'bg-[#10B981]' : 'bg-[#00F0FF]'; ?> animate-pulse"></span>
          <?php echo htmlspecialchars($active_title); ?>
        </span>
      </div>
    </div>

    <div class="flex items-center gap-3">
      <!-- Direct Preview Link -->
      <a href="<?php echo htmlspecialchars($active_url); ?>" target="_blank" class="px-3 py-1.5 rounded-lg bg-[#1F2937] hover:bg-[#374151] text-[#9CA3AF] hover:text-white text-xs font-semibold flex items-center gap-1.5 transition-colors" title="Open in new tab">
        <i data-lucide="external-link" class="w-3.5 h-3.5 text-[#00F0FF]"></i>
        <span>Live URL</span>
      </a>

      <!-- Save Button -->
      <button id="btn-save-all" type="button" class="px-4 py-1.5 rounded-lg bg-gradient-to-r from-[#00A8B5] to-[#10B981] hover:from-[#00F0FF] hover:to-[#059669] text-[#0F172A] text-xs font-extrabold flex items-center gap-1.5 shadow-lg hover:shadow-cyan-500/20 transition-all transform hover:-translate-y-0.5">
        <i data-lucide="save" class="w-4 h-4"></i>
        <span>Save Changes (Ctrl+S)</span>
      </button>

      <span class="text-[#374151]">|</span>
      <a href="admin.php" class="p-2 text-[#9CA3AF] hover:text-white rounded-lg hover:bg-[#1F2937] transition-colors" title="Command Center">
        <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
      </a>
      <a href="admin-logout.php" class="p-2 text-[#EF4444] hover:bg-[#EF4444]/10 rounded-lg transition-colors" title="Sign Out">
        <i data-lucide="log-out" class="w-4 h-4"></i>
      </a>
    </div>
  </header>

  <!-- 3-Column Studio Workspace -->
  <div class="flex-1 flex overflow-hidden">
    
    <!-- ========================================================================= -->
    <!-- COLUMN 1: LEFT SIDEBAR (PAGE TREE & BLOG MANAGER) (22% Width) -->
    <!-- ========================================================================= -->
    <aside class="w-[22%] bg-[#111827] border-r border-[#1F2937] flex flex-col shrink-0 overflow-hidden">
      
      <!-- Top Mode Switcher (Pages / Blogs / Media) -->
      <div class="p-2 bg-[#0F172A] border-b border-[#1F2937] grid grid-cols-3 gap-1">
        <button onclick="switchSidebarMode('pages')" id="tab-btn-pages" class="sidebar-mode-btn <?php echo !$is_blog_item ? 'active' : ''; ?> py-1.5 px-2 rounded-lg text-xs flex items-center justify-center gap-1 text-[#9CA3AF] transition-all font-bold">
          <i data-lucide="layers" class="w-3.5 h-3.5"></i> Pages
        </button>
        <button onclick="switchSidebarMode('blogs')" id="tab-btn-blogs" class="sidebar-mode-btn <?php echo $is_blog_item ? 'active' : ''; ?> py-1.5 px-2 rounded-lg text-xs flex items-center justify-center gap-1 text-[#9CA3AF] transition-all font-bold">
          <i data-lucide="book-open" class="w-3.5 h-3.5"></i> Blogs (<?php echo count($blog_posts_list); ?>)
        </button>
        <button onclick="switchSidebarMode('media')" id="tab-btn-media" class="sidebar-mode-btn py-1.5 px-2 rounded-lg text-xs flex items-center justify-center gap-1 text-[#9CA3AF] transition-all font-bold">
          <i data-lucide="image" class="w-3.5 h-3.5"></i> Media
        </button>
      </div>

      <!-- Quick Action: Add New Page or Blog -->
      <div class="p-2.5 border-b border-[#1F2937] flex gap-2">
        <button onclick="openModal('add-page-modal')" class="flex-1 py-1.5 px-2.5 bg-[#1F2937] hover:bg-[#374151] text-[#00F0FF] rounded-lg text-xs font-semibold flex items-center justify-center gap-1 border border-[#374151] transition-all">
          <i data-lucide="plus" class="w-3.5 h-3.5"></i> + Landing Page
        </button>
        <button onclick="openModal('add-blog-modal')" class="flex-1 py-1.5 px-2.5 bg-[#10B981]/15 hover:bg-[#10B981]/25 text-[#10B981] rounded-lg text-xs font-semibold flex items-center justify-center gap-1 border border-[#10B981]/30 transition-all">
          <i data-lucide="file-plus" class="w-3.5 h-3.5"></i> + New Blog
        </button>
      </div>

      <!-- Scrollable Tree Navigator -->
      <div class="flex-1 overflow-y-auto custom-scrollbar p-2 space-y-4">
        
        <!-- PAGES MODE CONTAINER -->
        <div id="tree-pages-mode" class="space-y-3 <?php echo $is_blog_item ? 'hidden' : ''; ?>">
          <!-- Core Pages -->
          <div class="space-y-0.5">
            <div class="px-2 py-1 text-[10px] font-mono uppercase tracking-wider text-[#6B7280] font-bold">Core Pages</div>
            <?php foreach ($core_pages as $k => $item): 
              $is_act = (!$is_blog_item && $active_key === $k);
              $p_status = get_page_status($k);
            ?>
            <a href="admin-cms.php?page=<?php echo urlencode($k); ?>" class="page-nav-item <?php echo $is_act ? 'active' : ''; ?> px-2.5 py-1.5 rounded-md flex items-center justify-between text-xs text-[#D1D5DB] hover:bg-[#1F2937] transition-all">
              <span class="flex items-center gap-2">
                <i data-lucide="file-text" class="w-3.5 h-3.5 text-[#9CA3AF]"></i>
                <span class="font-medium"><?php echo htmlspecialchars($item['title']); ?></span>
              </span>
              <span class="w-2 h-2 rounded-full <?php echo $p_status === 'published' ? 'bg-[#10B981]' : 'bg-[#F59E0B]'; ?>"></span>
            </a>
            <?php endforeach; ?>
          </div>

          <!-- Services (8 Verticals) -->
          <div class="space-y-0.5">
            <div class="px-2 py-1 text-[10px] font-mono uppercase tracking-wider text-[#6B7280] font-bold">Services Suite</div>
            <?php foreach ($service_pages as $k => $item): 
              $is_act = (!$is_blog_item && $active_key === $k);
              $p_status = get_page_status($k);
            ?>
            <a href="admin-cms.php?page=<?php echo urlencode($k); ?>" class="page-nav-item <?php echo $is_act ? 'active' : ''; ?> px-2.5 py-1.5 rounded-md flex items-center justify-between text-xs text-[#D1D5DB] hover:bg-[#1F2937] transition-all">
              <span class="flex items-center gap-2 truncate">
                <i data-lucide="cpu" class="w-3.5 h-3.5 text-[#00A8B5] shrink-0"></i>
                <span class="truncate"><?php echo htmlspecialchars($item['title']); ?></span>
              </span>
              <span class="w-2 h-2 rounded-full <?php echo $p_status === 'published' ? 'bg-[#10B981]' : 'bg-[#F59E0B]'; ?> shrink-0"></span>
            </a>
            <?php endforeach; ?>
          </div>

          <!-- Industries -->
          <div class="space-y-0.5">
            <div class="px-2 py-1 text-[10px] font-mono uppercase tracking-wider text-[#6B7280] font-bold">Industry Solutions</div>
            <?php foreach ($industry_pages as $k => $item): 
              $is_act = (!$is_blog_item && $active_key === $k);
              $p_status = get_page_status($k);
            ?>
            <a href="admin-cms.php?page=<?php echo urlencode($k); ?>" class="page-nav-item <?php echo $is_act ? 'active' : ''; ?> px-2.5 py-1.5 rounded-md flex items-center justify-between text-xs text-[#D1D5DB] hover:bg-[#1F2937] transition-all">
              <span class="flex items-center gap-2 truncate">
                <i data-lucide="briefcase" class="w-3.5 h-3.5 text-[#8B5CF6] shrink-0"></i>
                <span class="truncate"><?php echo htmlspecialchars($item['title']); ?></span>
              </span>
              <span class="w-2 h-2 rounded-full <?php echo $p_status === 'published' ? 'bg-[#10B981]' : 'bg-[#F59E0B]'; ?> shrink-0"></span>
            </a>
            <?php endforeach; ?>
          </div>

          <!-- Custom Dynamic Landing Pages -->
          <div class="space-y-0.5">
            <div class="px-2 py-1 text-[10px] font-mono uppercase tracking-wider text-[#6B7280] font-bold flex justify-between items-center">
              <span>Custom Landing Pages</span>
              <span class="text-[#00F0FF] font-bold"><?php echo count($custom_pages); ?></span>
            </div>
            <?php if (empty($custom_pages)): ?>
              <div class="px-2.5 py-2 text-[11px] text-[#6B7280] italic">No custom pages created yet. Click "+ Landing Page" above.</div>
            <?php else: ?>
              <?php foreach ($custom_pages as $k => $item): 
                $is_act = (!$is_blog_item && $active_key === $k);
                $p_status = get_page_status($k);
              ?>
              <div class="flex items-center justify-between group rounded-md hover:bg-[#1F2937] pr-2">
                <a href="admin-cms.php?page=<?php echo urlencode($k); ?>" class="page-nav-item <?php echo $is_act ? 'active' : ''; ?> flex-1 px-2.5 py-1.5 rounded-md flex items-center justify-between text-xs text-[#D1D5DB]">
                  <span class="flex items-center gap-2 truncate">
                    <i data-lucide="layout" class="w-3.5 h-3.5 text-[#00F0FF] shrink-0"></i>
                    <span class="truncate"><?php echo htmlspecialchars($item['title']); ?></span>
                  </span>
                  <span class="w-2 h-2 rounded-full <?php echo $p_status === 'published' ? 'bg-[#10B981]' : 'bg-[#F59E0B]'; ?> ml-2 shrink-0"></span>
                </a>
                <button onclick="deleteCustomPage('<?php echo htmlspecialchars($k); ?>', '<?php echo htmlspecialchars($item['title']); ?>')" class="opacity-0 group-hover:opacity-100 p-1 text-[#EF4444] hover:bg-[#EF4444]/20 rounded transition-all" title="Delete Page">
                  <i data-lucide="trash-2" class="w-3 h-3"></i>
                </button>
              </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>

        </div>

        <!-- BLOGS MODE CONTAINER -->
        <div id="tree-blogs-mode" class="space-y-2 <?php echo !$is_blog_item ? 'hidden' : ''; ?>">
          <div class="px-2 py-1 text-[10px] font-mono uppercase tracking-wider text-[#10B981] font-bold flex justify-between items-center">
            <span>Blog Articles & Playbooks (<?php echo count($blog_posts_list); ?>)</span>
          </div>
          <div class="space-y-1">
            <?php foreach ($blog_posts_list as $bp): 
              $b_key = 'blog_' . ($bp['slug'] ?? '');
              $is_b_act = ($is_blog_item && $active_blog_slug === ($bp['slug'] ?? ''));
              $b_status = $bp['status'] ?? 'published';
            ?>
            <div class="flex items-center justify-between group rounded-lg hover:bg-[#1F2937] pr-2 transition-colors">
              <a href="admin-cms.php?page=<?php echo urlencode($b_key); ?>" class="page-nav-item <?php echo $is_b_act ? 'active' : ''; ?> flex-1 px-2.5 py-2 rounded-lg flex items-center justify-between text-xs text-[#D1D5DB]">
                <div class="truncate">
                  <div class="font-medium text-white truncate"><?php echo htmlspecialchars($bp['title'] ?? 'Untitled Article'); ?></div>
                  <div class="text-[10px] text-[#6B7280] font-mono"><?php echo htmlspecialchars($bp['category'] ?? 'SEO'); ?> • <?php echo htmlspecialchars($bp['date'] ?? ''); ?></div>
                </div>
                <span class="w-2 h-2 rounded-full <?php echo $b_status === 'published' ? 'bg-[#10B981]' : 'bg-[#F59E0B]'; ?> ml-2 shrink-0"></span>
              </a>
              <button onclick="deleteBlogPost('<?php echo htmlspecialchars($bp['slug']); ?>', '<?php echo htmlspecialchars($bp['title']); ?>')" class="opacity-0 group-hover:opacity-100 p-1.5 text-[#EF4444] hover:bg-[#EF4444]/20 rounded transition-all ml-1" title="Delete Blog Post">
                <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
              </button>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- MEDIA LIBRARY MODE CONTAINER -->
        <div id="tree-media-mode" class="space-y-3 hidden">
          <div class="px-2 py-1 text-[10px] font-mono uppercase tracking-wider text-[#8B5CF6] font-bold">
            <span>Media Library & Uploads</span>
          </div>
          
          <!-- Dropzone Box -->
          <div class="p-4 border-2 border-dashed border-[#374151] hover:border-[#00A8B5] rounded-xl text-center bg-[#1F2937]/50 space-y-2 cursor-pointer transition-colors" onclick="document.getElementById('sidebar-file-upload').click()">
            <input type="file" id="sidebar-file-upload" class="hidden" accept="image/*" onchange="handleSidebarUpload(event)">
            <i data-lucide="upload-cloud" class="w-6 h-6 text-[#00A8B5] mx-auto"></i>
            <div class="font-bold text-white text-xs">Upload New Image</div>
            <div class="text-[10px] text-[#9CA3AF]">Click or Drag & Drop (PNG, JPG, WEBP, SVG)</div>
          </div>

          <!-- Existing Images Quick List -->
          <div class="space-y-1.5 pt-2">
            <div class="text-[10px] font-mono text-[#9CA3AF] px-1 uppercase font-bold">Recent Uploads</div>
            <div class="grid grid-cols-2 gap-2" id="sidebar-media-grid">
              <div class="p-1 bg-[#1F2937] rounded-lg border border-[#374151] cursor-pointer hover:border-[#00A8B5]" onclick="copyMediaUrl('assets/images/hero_dashboard_light_v2.png')">
                <img src="assets/images/hero_dashboard_light_v2.png" class="w-full h-16 object-cover rounded">
                <div class="text-[9px] text-[#9CA3AF] truncate mt-1">hero_dashboard.png</div>
              </div>
              <div class="p-1 bg-[#1F2937] rounded-lg border border-[#374151] cursor-pointer hover:border-[#00A8B5]" onclick="copyMediaUrl('assets/images/digital4local_logo.png')">
                <img src="assets/images/digital4local_logo.png" class="w-full h-16 object-contain bg-white rounded p-1">
                <div class="text-[9px] text-[#9CA3AF] truncate mt-1">logo.png</div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Sidebar Footer -->
      <div class="p-3 border-t border-[#1F2937] bg-[#0F172A] flex items-center justify-between text-[11px] text-[#6B7280]">
        <span>Total Items: <strong class="text-white"><?php echo count($core_pages) + count($service_pages) + count($industry_pages) + count($custom_pages) + count($blog_posts_list); ?></strong></span>
        <span class="text-[#00A8B5] font-mono font-bold">Unified Template Engine</span>
      </div>
    </aside>

    <!-- ========================================================================= -->
    <!-- COLUMN 2: MIDDLE WORKSPACE (EDITOR SUITE WITH CKEDITOR & FAQ ACCORDION) (45% Width) -->
    <!-- ========================================================================= -->
    <main class="w-[45%] bg-[#0F172A] border-r border-[#1F2937] flex flex-col shrink-0 overflow-hidden">
      
      <!-- Editor Header Sticky Bar -->
      <div class="p-3.5 bg-[#111827] border-b border-[#1F2937] flex items-center justify-between shrink-0">
        <div class="space-y-0.5 truncate max-w-[65%]">
          <div class="flex items-center gap-2 truncate">
            <h1 class="text-sm font-bold text-white truncate"><?php echo htmlspecialchars($active_title); ?></h1>
            <span class="bg-[#1F2937] text-[#00F0FF] border border-[#374151] px-2 py-0.5 rounded text-[10px] font-mono font-semibold truncate shrink-0">
              <?php echo htmlspecialchars($active_url); ?>
            </span>
          </div>
        </div>

        <div class="flex items-center gap-2 shrink-0">
          <label class="text-[11px] text-[#9CA3AF] font-medium">Status:</label>
          <select id="editor-page-status" class="bg-[#1F2937] border border-[#374151] text-white rounded-lg px-2.5 py-1 text-xs outline-none focus:border-[#00A8B5] font-semibold">
            <option value="published" <?php echo $active_status === 'published' ? 'selected' : ''; ?>>🟢 Published</option>
            <option value="draft" <?php echo $active_status === 'draft' ? 'selected' : ''; ?>>🟡 Draft Mode</option>
          </select>
        </div>
      </div>

      <!-- Editor Tab Navigation -->
      <div class="flex items-center gap-1 px-3 pt-2 bg-[#111827] border-b border-[#1F2937] overflow-x-auto">
        <button onclick="switchEditorTab('body')" class="editor-tab-btn active px-3.5 py-2 rounded-t-lg text-xs flex items-center gap-1.5 transition-all">
          <i data-lucide="file-edit" class="w-3.5 h-3.5"></i> Body (CKEditor)
        </button>
        <button onclick="switchEditorTab('hero')" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
          <i data-lucide="type" class="w-3.5 h-3.5"></i> <?php echo $is_blog_item ? 'Article Details' : 'Hero & Details'; ?>
        </button>
        <button onclick="switchEditorTab('media')" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
          <i data-lucide="image" class="w-3.5 h-3.5"></i> Featured Image
        </button>
        <?php if ($is_blog_item): ?>
        <button onclick="switchEditorTab('faqs')" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
          <i data-lucide="help-circle" class="w-3.5 h-3.5 text-[#00F0FF]"></i> FAQs (Accordion)
        </button>
        <?php endif; ?>
        <button onclick="switchEditorTab('seo')" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
          <i data-lucide="search" class="w-3.5 h-3.5"></i> SEO & Schema
        </button>
        <button onclick="switchEditorTab('features')" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
          <i data-lucide="sliders" class="w-3.5 h-3.5"></i> Global Config
        </button>
      </div>

      <!-- Editor Form Container -->
      <form id="cms-editor-form" class="flex-1 overflow-y-auto custom-scrollbar p-4 space-y-5" onsubmit="event.preventDefault(); saveCmsSettings();">
        <input type="hidden" name="active_page_key" id="form-active-page-key" value="<?php echo htmlspecialchars($active_key); ?>">
        <input type="hidden" name="is_blog_post" id="form-is-blog-post" value="<?php echo $is_blog_item ? '1' : '0'; ?>">
        <input type="hidden" name="blog_slug" id="form-blog-slug" value="<?php echo htmlspecialchars($active_blog_slug); ?>">
        <input type="hidden" name="original_blog_slug" id="form-orig-blog-slug" value="<?php echo htmlspecialchars($active_blog_slug); ?>">

        <!-- ========================================== -->
        <!-- TAB 1: CKEDITOR 5 BODY CONTENT EDITOR -->
        <!-- ========================================== -->
        <div id="tab-pane-body" class="space-y-4">
          <div class="bg-[#111827] border border-[#1F2937] rounded-xl overflow-hidden shadow-lg space-y-0">
            
            <!-- CKEditor Container -->
            <div id="ckeditor-wrapper" class="p-0">
              <textarea id="ck-content-editor" name="<?php echo $is_blog_item ? 'active_blog_post[content_html]' : 'pages['.$active_key.'][content_html]'; ?>" class="hidden"><?php 
                echo htmlspecialchars($is_blog_item ? ($active_blog_post['content_html'] ?? '<h2>1. Article Introduction</h2><p>Start writing your dynamic article body content here...</p>') : ($page_cfg['content_html'] ?? '<h2>Dynamic Section Content</h2><p>Edit or paste your rich body content here...</p>')); 
              ?></textarea>
            </div>

            <!-- Raw HTML Code View (Hidden by Default) -->
            <div id="raw-html-wrapper" class="hidden p-3 bg-[#050811]">
              <textarea id="raw-html-textarea" class="w-full p-3 bg-[#050811] text-[#10B981] font-mono text-xs min-h-[380px] max-h-[500px] border border-[#1F2937] rounded-lg outline-none resize-y" oninput="syncRawToCkeditor()"></textarea>
            </div>

            <!-- Editor Action Bar & Word Counter Footer -->
            <div class="bg-[#1E293B] border-t border-[#334155] px-4 py-2.5 flex items-center justify-between text-[11px] font-mono text-[#9CA3AF]">
              <div class="flex items-center gap-4">
                <span>Words: <strong id="word-count" class="text-white">0</strong></span>
                <span>Characters: <strong id="char-count" class="text-white">0</strong></span>
              </div>
              
              <div class="flex items-center gap-2">
                <button type="button" onclick="toggleHtmlSourceMode()" id="btn-toggle-source" class="px-2.5 py-1 bg-[#0F172A] border border-[#334155] hover:border-[#00A8B5] text-white rounded text-[10px] font-mono flex items-center gap-1 font-bold">
                  <i data-lucide="code" class="w-3 h-3 text-[#00A8B5]"></i> <span id="source-toggle-text">HTML Code</span>
                </button>
                <button type="button" onclick="document.getElementById('body-inline-image-upload').click()" class="px-2.5 py-1 bg-[#00A8B5]/20 border border-[#00A8B5]/40 hover:bg-[#00A8B5]/30 text-[#00F0FF] rounded text-[10px] font-mono flex items-center gap-1 font-bold">
                  <i data-lucide="image" class="w-3 h-3"></i> Insert Media
                </button>
                <input type="file" id="body-inline-image-upload" class="hidden" accept="image/*" onchange="handleInlineImageUpload(event)">
              </div>
            </div>

          </div>
        </div>

        <!-- ========================================== -->
        <!-- TAB 2: HERO & ARTICLE DETAILS / AUTHOR -->
        <!-- ========================================== -->
        <div id="tab-pane-hero" class="space-y-4 hidden">
          <div class="card-dark p-4 space-y-4 bg-[#111827] border border-[#1F2937] rounded-xl">
            <h3 class="text-xs font-mono uppercase font-bold text-[#00A8B5]">
              <?php echo $is_blog_item ? 'Article Metadata & Publishing Details' : 'Hero Section Typography'; ?>
            </h3>
            
            <?php if ($is_blog_item): ?>
            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">ARTICLE TITLE *</label>
              <input type="text" name="active_blog_post[title]" id="edit-blog-title" value="<?php echo htmlspecialchars($active_blog_post['title'] ?? ''); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none font-bold" oninput="updateBlogSlugPreview(this.value)">
            </div>

            <div class="grid grid-cols-2 gap-3">
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">URL SLUG</label>
                <input type="text" name="active_blog_post[slug]" id="edit-blog-slug" value="<?php echo htmlspecialchars($active_blog_slug); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-[#00F0FF] font-mono focus:border-[#00A8B5] outline-none">
              </div>
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">CATEGORY</label>
                <select name="active_blog_post[category]" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none">
                  <?php 
                  $cats = ['Local SEO', 'GEO & AEO', 'AI Automation', 'Technical SEO', 'Social Media', 'Web Development', 'App Development'];
                  $cur_cat = $active_blog_post['category'] ?? 'Local SEO';
                  foreach ($cats as $c): ?>
                    <option value="<?php echo $c; ?>" <?php echo $cur_cat === $c ? 'selected' : ''; ?>><?php echo $c; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">PUBLISHED DATE</label>
                <input type="date" name="active_blog_post[date]" value="<?php echo htmlspecialchars($active_blog_post['date'] ?? date('Y-m-d')); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none">
              </div>
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">READ TIME</label>
                <input type="text" name="active_blog_post[read_time]" value="<?php echo htmlspecialchars($active_blog_post['read_time'] ?? '8 Min Read'); ?>" placeholder="e.g. 8 Min Read" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none">
              </div>
            </div>

            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">ARTICLE EXCERPT / SUMMARY</label>
              <textarea rows="3" name="active_blog_post[excerpt]" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none"><?php echo htmlspecialchars($active_blog_post['excerpt'] ?? ''); ?></textarea>
            </div>

            <div>
              <label class="block text-[11px] font-mono text-[#00A8B5] mb-1 font-bold">ARTICLE HIGHLIGHTS (1 per line for Sidebar Card)</label>
              <textarea rows="4" name="active_blog_post[highlights_text]" placeholder="4-Point Evaluation Method&#10;10 Agency Profiles&#10;Comparison Matrix Table&#10;5 Pre-Signing Filter Questions&#10;7 Detailed FAQs" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none font-mono"><?php 
                if (!empty($active_blog_post['highlights'])) {
                  if (is_array($active_blog_post['highlights'])) {
                    echo htmlspecialchars(implode("\n", $active_blog_post['highlights']));
                  } else {
                    echo htmlspecialchars($active_blog_post['highlights']);
                  }
                }
              ?></textarea>
              <p class="text-[10px] text-[#9CA3AF] mt-1 font-mono">Bullet points displayed in the "ARTICLE HIGHLIGHTS" card.</p>
            </div>

            <?php else: ?>
            <!-- Standard Page Hero Inputs -->
            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">SECTION BADGE</label>
              <input type="text" name="pages[<?php echo $active_key; ?>][badge]" value="<?php echo htmlspecialchars($page_cfg['badge'] ?? 'DIGITAL4LOCAL AI ENGINE'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none">
            </div>

            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">MAIN HERO HEADLINE</label>
              <input type="text" name="pages[<?php echo $active_key; ?>][hero_title]" value="<?php echo htmlspecialchars($page_cfg['hero_title'] ?? $active_title); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none font-bold">
            </div>

            <div>
              <label class="block text-[11px] font-mono text-[#00A8B5] mb-1 font-bold">GRADIENT HIGHLIGHT ACCENT</label>
              <input type="text" name="pages[<?php echo $active_key; ?>][hero_highlight]" value="<?php echo htmlspecialchars($page_cfg['hero_highlight'] ?? '#1 Google Map Ranks'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-[#00F0FF] focus:border-[#00A8B5] outline-none font-bold">
            </div>

            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">HERO SUBHEADING / SUMMARY</label>
              <textarea rows="3" name="pages[<?php echo $active_key; ?>][hero_subheading]" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none"><?php echo htmlspecialchars($page_cfg['hero_subheading'] ?? ''); ?></textarea>
            </div>
            <?php endif; ?>

          </div>
        </div>

        <!-- ========================================== -->
        <!-- TAB 3: FEATURED IMAGE & MEDIA UPLOADER -->
        <!-- ========================================== -->
        <div id="tab-pane-media" class="space-y-4 hidden">
          <div class="card-dark p-4 space-y-4 bg-[#111827] border border-[#1F2937] rounded-xl">
            <h3 class="text-xs font-mono uppercase font-bold text-[#8B5CF6]">Featured Image & OpenGraph Media</h3>

            <!-- Live Thumbnail Preview Box -->
            <div class="bg-[#1F2937] border border-[#374151] p-4 rounded-xl space-y-3 text-center">
              <div class="relative max-w-sm mx-auto overflow-hidden rounded-lg border border-[#475569] bg-[#0F172A]">
                <img id="featured-image-preview" src="<?php echo htmlspecialchars($is_blog_item ? ($active_blog_post['featured_image'] ?? 'assets/images/hero_dashboard_light_v2.png') : ($page_cfg['featured_image'] ?? 'assets/images/hero_dashboard_light_v2.png')); ?>" class="w-full h-44 object-cover">
              </div>
              
              <div class="flex items-center justify-center gap-2">
                <button type="button" onclick="document.getElementById('featured-image-file-input').click()" class="px-4 py-2 bg-[#00A8B5] hover:bg-[#00F0FF] text-[#0F172A] font-bold rounded-lg text-xs flex items-center gap-1.5 shadow-md">
                  <i data-lucide="upload-cloud" class="w-4 h-4"></i> Upload New Image
                </button>
                <button type="button" onclick="clearFeaturedImage()" class="px-3 py-2 bg-[#374151] hover:bg-[#EF4444] text-white rounded-lg text-xs">
                  Remove
                </button>
              </div>
              <input type="file" id="featured-image-file-input" class="hidden" accept="image/*" onchange="handleFeaturedImageUpload(event)">
            </div>

            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">IMAGE URL PATH</label>
              <input type="text" id="featured-image-url-input" name="<?php echo $is_blog_item ? 'active_blog_post[featured_image]' : 'pages['.$active_key.'][featured_image]'; ?>" value="<?php echo htmlspecialchars($is_blog_item ? ($active_blog_post['featured_image'] ?? 'assets/images/hero_dashboard_light_v2.png') : ($page_cfg['featured_image'] ?? 'assets/images/hero_dashboard_light_v2.png')); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-[#00A8B5] outline-none" oninput="updateFeaturedPreview(this.value)">
            </div>
          </div>
        </div>

        <!-- ========================================== -->
        <!-- TAB 4: DYNAMIC FAQS & ACCORDION BUILDER -->
        <!-- ========================================== -->
        <?php if ($is_blog_item): ?>
        <div id="tab-pane-faqs" class="space-y-4 hidden">
          <div class="card-dark p-4 space-y-4 bg-[#111827] border border-[#1F2937] rounded-xl">
            <div class="flex items-center justify-between border-b border-[#1F2937] pb-3">
              <div>
                <h3 class="text-xs font-mono uppercase font-bold text-[#00F0FF] flex items-center gap-1.5">
                  <i data-lucide="help-circle" class="w-4 h-4 text-[#00F0FF]"></i>
                  <span>Frequently Asked Questions (Accordion)</span>
                </h3>
                <p class="text-[11px] text-[#9CA3AF]">Manage interactive collapsible FAQs with automated FAQPage Schema.</p>
              </div>
              <button type="button" onclick="addNewFaqItem()" class="px-3 py-1.5 bg-[#00A8B5] hover:bg-[#00F0FF] text-[#0F172A] font-bold rounded-lg text-xs flex items-center gap-1 shadow-md">
                <i data-lucide="plus-circle" class="w-3.5 h-3.5"></i> Add Question
              </button>
            </div>

            <!-- FAQs Container -->
            <div id="faq-items-list" class="space-y-3">
              <!-- Render existing FAQs -->
              <?php 
              $existing_faqs = $active_blog_post['faqs'] ?? [];
              if (empty($existing_faqs)) {
                  $existing_faqs = [];
              }
              ?>
            </div>

            <!-- Hidden JSON Field for form submission -->
            <input type="hidden" name="active_blog_post[faqs]" id="faq-json-payload" value="<?php echo htmlspecialchars(json_encode($existing_faqs)); ?>">

            <!-- Live Accordion Interactive Preview -->
            <div class="pt-4 border-t border-[#1F2937] space-y-2">
              <div class="text-[10px] font-mono text-[#00F0FF] font-bold uppercase flex items-center justify-between">
                <span>Interactive Live Accordion Preview</span>
                <span class="text-[10px] text-[#9CA3AF]">Click question to test toggle</span>
              </div>
              <div id="faq-accordion-preview-box" class="space-y-2 bg-[#0B0F19] p-3 rounded-xl border border-[#1F2937]">
                <!-- Populated dynamically via Javascript -->
              </div>
            </div>

          </div>
        </div>
        <?php endif; ?>

        <!-- ========================================== -->
        <!-- TAB 5: SEO & AEO OPTIMIZATION SUITE -->
        <!-- ========================================== -->
        <div id="tab-pane-seo" class="space-y-4 hidden">
          <div class="card-dark p-4 space-y-4 bg-[#111827] border border-[#1F2937] rounded-xl">
            <div class="flex items-center justify-between border-b border-[#1F2937] pb-2">
              <h3 class="text-xs font-mono uppercase font-bold text-[#10B981]">SEO & Generative Engine Optimization</h3>
              <span class="bg-[#10B981]/20 text-[#10B981] px-2 py-0.5 rounded text-[10px] font-mono font-bold">Targeted Score: 98/100</span>
            </div>

            <!-- Focus Keyword Input -->
            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">FOCUS KEYWORD (Primary Search Query)</label>
              <input type="text" id="seo-focus-keyword" name="<?php echo $is_blog_item ? 'active_blog_post[focus_keyword]' : 'pages['.$active_key.'][focus_keyword]'; ?>" value="<?php echo htmlspecialchars($is_blog_item ? ($active_blog_post['focus_keyword'] ?? '') : ($page_cfg['focus_keyword'] ?? '')); ?>" placeholder="e.g. Best Digital Marketing Company in India" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-[#00F0FF] font-bold focus:border-[#00A8B5] outline-none">
            </div>

            <!-- Meta Title with Character Progress -->
            <div>
              <div class="flex justify-between items-center mb-1">
                <label class="text-[11px] font-mono text-[#9CA3AF] font-bold">SEO META TITLE</label>
                <span class="text-[10px] font-mono text-[#9CA3AF]"><span id="meta-title-length">0</span> / 60 chars</span>
              </div>
              <input type="text" id="seo-meta-title" name="<?php echo $is_blog_item ? 'active_blog_post[meta_title]' : 'pages['.$active_key.'][meta_title]'; ?>" value="<?php echo htmlspecialchars($is_blog_item ? ($active_blog_post['meta_title'] ?? '') : ($page_cfg['meta_title'] ?? '')); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none font-medium" oninput="updateSeoPreview()">
            </div>

            <!-- Meta Description with Progress Bar -->
            <div>
              <div class="flex justify-between items-center mb-1">
                <label class="text-[11px] font-mono text-[#9CA3AF] font-bold">META DESCRIPTION</label>
                <span class="text-[10px] font-mono text-[#9CA3AF]"><span id="meta-desc-length">0</span> / 160 chars</span>
              </div>
              <textarea rows="3" id="seo-meta-description" name="<?php echo $is_blog_item ? 'active_blog_post[meta_description]' : 'pages['.$active_key.'][meta_description]'; ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none" oninput="updateSeoPreview()"><?php echo htmlspecialchars($is_blog_item ? ($active_blog_post['meta_description'] ?? '') : ($page_cfg['meta_description'] ?? '')); ?></textarea>
            </div>

            <!-- Google Search & AI Citation SERP Preview Card -->
            <div class="bg-[#1F2937] p-4 rounded-xl border border-[#374151] space-y-2">
              <div class="text-[10px] font-mono text-[#9CA3AF] font-bold uppercase">Google SERP & AI Citation Preview</div>
              <div class="bg-white p-3.5 rounded-lg text-left shadow-sm space-y-1">
                <div class="text-[11px] text-[#202124] flex items-center gap-1 font-sans">
                  <span>https://digital4local.com</span> › <span class="text-[#5F6368]"><?php echo htmlspecialchars($active_url); ?></span>
                </div>
                <div id="serp-preview-title" class="text-sm font-semibold text-[#1A0DAB] hover:underline cursor-pointer">
                  <?php echo htmlspecialchars($is_blog_item ? ($active_blog_post['meta_title'] ?? $active_title) : ($page_cfg['meta_title'] ?? $active_title)); ?>
                </div>
                <div id="serp-preview-desc" class="text-xs text-[#4D5156] leading-snug">
                  <?php echo htmlspecialchars($is_blog_item ? ($active_blog_post['meta_description'] ?? '') : ($page_cfg['meta_description'] ?? '')); ?>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- ========================================== -->
        <!-- TAB 6: GLOBAL CONFIG & PRICING -->
        <!-- ========================================== -->
        <div id="tab-pane-features" class="space-y-4 hidden">
          <div class="card-dark p-4 space-y-4 bg-[#111827] border border-[#1F2937] rounded-xl">
            <h3 class="text-xs font-mono uppercase font-bold text-[#D97706]">Global Agency Retainers & Contact</h3>

            <div class="grid grid-cols-2 gap-3">
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">LOCAL SEO RETAINER (INR)</label>
                <input type="text" name="pricing[retainer_local_seo]" value="<?php echo htmlspecialchars($site_config['pricing']['retainer_local_seo'] ?? '9999'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white font-mono">
              </div>
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">GEO/AEO RETAINER (INR)</label>
                <input type="text" name="pricing[retainer_geo_aeo]" value="<?php echo htmlspecialchars($site_config['pricing']['retainer_geo_aeo'] ?? '12999'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white font-mono">
              </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">PRIMARY EMAIL</label>
                <input type="email" name="contact[email_primary]" value="<?php echo htmlspecialchars($site_config['contact']['email_primary'] ?? 'contact@digital4local.com'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white font-mono">
              </div>
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">WHATSAPP NUMBER</label>
                <input type="text" name="contact[whatsapp]" value="<?php echo htmlspecialchars($site_config['contact']['whatsapp'] ?? '+44 20 7946 0912'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white font-mono">
              </div>
            </div>
          </div>
        </div>

      </form>
    </main>

    <!-- ========================================================================= -->
    <!-- COLUMN 3: RIGHT LIVE PREVIEW PANE (FLEX-1 RESPONSIVE IFRAME) -->
    <!-- ========================================================================= -->
    <section class="flex-1 bg-[#090D16] flex flex-col overflow-hidden relative">
      
      <!-- Top Responsive Viewport Control Bar -->
      <div class="h-10 bg-[#111827] border-b border-[#1F2937] px-3 flex items-center justify-between shrink-0">
        <div class="flex items-center gap-2">
          <span class="text-[11px] font-mono text-[#9CA3AF]">Live Template Preview:</span>
          <span class="bg-[#1F2937] text-[#00F0FF] px-2 py-0.5 rounded text-[10px] font-mono font-bold"><?php echo htmlspecialchars($active_url); ?></span>
        </div>

        <!-- Viewport Switcher -->
        <div class="flex items-center gap-1 bg-[#1F2937] p-0.5 rounded-lg border border-[#374151]">
          <button onclick="setViewport('100%')" id="vp-desktop" class="p-1 rounded bg-[#00A8B5] text-[#0F172A]" title="Desktop View (100%)">
            <i data-lucide="monitor" class="w-3.5 h-3.5"></i>
          </button>
          <button onclick="setViewport('768px')" id="vp-tablet" class="p-1 rounded text-[#9CA3AF] hover:text-white" title="Tablet View (768px)">
            <i data-lucide="tablet" class="w-3.5 h-3.5"></i>
          </button>
          <button onclick="setViewport('375px')" id="vp-mobile" class="p-1 rounded text-[#9CA3AF] hover:text-white" title="Mobile View (375px)">
            <i data-lucide="smartphone" class="w-3.5 h-3.5"></i>
          </button>
        </div>

        <button onclick="reloadPreviewIframe()" class="p-1.5 rounded hover:bg-[#1F2937] text-[#9CA3AF] hover:text-white transition-colors" title="Refresh Live Preview">
          <i data-lucide="rotate-cw" class="w-3.5 h-3.5"></i>
        </button>
      </div>

      <!-- Iframe Container -->
      <div class="flex-1 flex items-center justify-center p-2 bg-[#090D16] overflow-hidden">
        <div id="preview-wrapper" class="h-full w-full transition-all duration-300 rounded-xl overflow-hidden border border-[#1F2937] shadow-2xl bg-white">
          <iframe id="cms-live-preview-frame" src="<?php echo htmlspecialchars($active_url); ?>" class="w-full h-full border-none"></iframe>
        </div>
      </div>
    </section>

  </div>

  <!-- ========================================================================= -->
  <!-- MODAL 1: ADD NEW CUSTOM LANDING PAGE -->
  <!-- ========================================================================= -->
  <div id="add-page-modal" class="fixed inset-0 z-50 bg-[#0F172A]/80 backdrop-blur-sm flex items-center justify-center p-4 hidden">
    <div class="bg-[#111827] border border-[#1F2937] rounded-2xl max-w-md w-full p-6 space-y-4 shadow-2xl">
      <div class="flex items-center justify-between border-b border-[#1F2937] pb-3">
        <h3 class="font-bold text-white text-sm flex items-center gap-2">
          <i data-lucide="plus-circle" class="w-4 h-4 text-[#00F0FF]"></i>
          Create New Landing Page
        </h3>
        <button onclick="closeModal('add-page-modal')" class="text-[#9CA3AF] hover:text-white p-1">
          <i data-lucide="x" class="w-4 h-4"></i>
        </button>
      </div>
      
      <div class="space-y-3 text-xs">
        <div>
          <label class="block font-mono text-[#9CA3AF] mb-1 font-bold">PAGE TITLE *</label>
          <input type="text" id="new-page-title-input" placeholder="e.g. Dentist SEO Services" class="w-full bg-[#1F2937] border border-[#374151] focus:border-[#00A8B5] rounded-lg px-3 py-2 text-white outline-none" oninput="autoGenerateSlug(this.value)">
        </div>
        <div>
          <label class="block font-mono text-[#9CA3AF] mb-1 font-bold">URL SLUG</label>
          <div class="flex items-center bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2">
            <span class="text-[#6B7280] font-mono">page.php?slug=</span>
            <input type="text" id="new-page-slug-input" placeholder="dentist-seo-services" class="bg-transparent border-none text-[#00F0FF] font-mono outline-none flex-1">
          </div>
        </div>
      </div>

      <div class="flex justify-end gap-2 pt-2 border-t border-[#1F2937]">
        <button type="button" onclick="closeModal('add-page-modal')" class="px-4 py-2 bg-[#1F2937] text-[#9CA3AF] hover:text-white rounded-lg text-xs">Cancel</button>
        <button type="button" onclick="submitCreatePage()" class="px-5 py-2 bg-gradient-to-r from-[#00A8B5] to-[#10B981] text-[#0F172A] font-bold rounded-lg text-xs">Create Page</button>
      </div>
    </div>
  </div>

  <!-- ========================================================================= -->
  <!-- MODAL 2: ADD NEW BLOG ARTICLE -->
  <!-- ========================================================================= -->
  <div id="add-blog-modal" class="fixed inset-0 z-50 bg-[#0F172A]/80 backdrop-blur-sm flex items-center justify-center p-4 hidden">
    <div class="bg-[#111827] border border-[#1F2937] rounded-2xl max-w-md w-full p-6 space-y-4 shadow-2xl">
      <div class="flex items-center justify-between border-b border-[#1F2937] pb-3">
        <h3 class="font-bold text-white text-sm flex items-center gap-2">
          <i data-lucide="file-plus" class="w-4 h-4 text-[#10B981]"></i>
          Publish New Blog Article
        </h3>
        <button onclick="closeModal('add-blog-modal')" class="text-[#9CA3AF] hover:text-white p-1">
          <i data-lucide="x" class="w-4 h-4"></i>
        </button>
      </div>
      
      <div class="space-y-3 text-xs">
        <div>
          <label class="block font-mono text-[#9CA3AF] mb-1 font-bold">ARTICLE TITLE *</label>
          <input type="text" id="new-post-title-input" placeholder="e.g. AI Search Optimization Blueprint for 2026" class="w-full bg-[#1F2937] border border-[#374151] focus:border-[#10B981] rounded-lg px-3 py-2 text-white outline-none" oninput="autoGenerateBlogSlug(this.value)">
        </div>
        <div>
          <label class="block font-mono text-[#9CA3AF] mb-1 font-bold">CATEGORY</label>
          <select id="new-post-category-select" class="w-full bg-[#1F2937] border border-[#374151] text-white rounded-lg px-3 py-2 outline-none">
            <option value="Local SEO">Local SEO</option>
            <option value="GEO & AEO">GEO & AEO</option>
            <option value="AI Automation">AI Automation</option>
            <option value="Technical SEO">Technical SEO</option>
            <option value="Social Media">Social Media</option>
            <option value="Web Development">Web Development</option>
          </select>
        </div>
        <div>
          <label class="block font-mono text-[#9CA3AF] mb-1 font-bold">URL SLUG</label>
          <div class="flex items-center bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2">
            <span class="text-[#6B7280] font-mono">blog-single.php?slug=</span>
            <input type="text" id="new-post-slug-input" placeholder="ai-search-optimization-blueprint-2026" class="bg-transparent border-none text-[#10B981] font-mono outline-none flex-1">
          </div>
        </div>
      </div>

      <div class="flex justify-end gap-2 pt-2 border-t border-[#1F2937]">
        <button type="button" onclick="closeModal('add-blog-modal')" class="px-4 py-2 bg-[#1F2937] text-[#9CA3AF] hover:text-white rounded-lg text-xs">Cancel</button>
        <button type="button" onclick="submitCreateBlogPost()" class="px-5 py-2 bg-gradient-to-r from-[#10B981] to-[#00A8B5] text-[#0F172A] font-bold rounded-lg text-xs">Publish Article</button>
      </div>
    </div>
  </div>

  <!-- Toast Notification Container -->
  <div id="toast-container" class="fixed bottom-6 right-6 z-50 space-y-2 pointer-events-none"></div>

  <!-- Scripts -->
  <script>
    if (typeof lucide !== 'undefined') lucide.createIcons();

    // 1. CKEditor 5 Initialization
    let editorInstance = null;
    let isSourceMode = false;

    ClassicEditor
      .create(document.querySelector('#ck-content-editor'), {
        toolbar: [
          'heading', '|',
          'bold', 'italic', 'underline', 'strikethrough', '|',
          'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
          'insertTable', '|',
          'undo', 'redo'
        ],
        heading: {
          options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
          ]
        }
      })
      .then(editor => {
        editorInstance = editor;
        
        // Initial word count
        updateWordStatsFromCk();

        editor.model.document.on('change:data', () => {
          updateWordStatsFromCk();
          const rawTextarea = document.getElementById('raw-html-textarea');
          if (rawTextarea) rawTextarea.value = editor.getData();
        });
      })
      .catch(error => {
        console.error('CKEditor initialization error:', error);
      });

    function updateWordStatsFromCk() {
      if (!editorInstance) return;
      const html = editorInstance.getData();
      const tmp = document.createElement('div');
      tmp.innerHTML = html;
      const text = tmp.textContent || tmp.innerText || '';
      const words = text.trim() ? text.trim().split(/\s+/).length : 0;
      document.getElementById('word-count').textContent = words;
      document.getElementById('char-count').textContent = text.length;
    }

    function toggleHtmlSourceMode() {
      if (!editorInstance) return;
      const ckWrapper = document.getElementById('ckeditor-wrapper');
      const rawWrapper = document.getElementById('raw-html-wrapper');
      const rawTextarea = document.getElementById('raw-html-textarea');
      const toggleText = document.getElementById('source-toggle-text');

      isSourceMode = !isSourceMode;
      if (isSourceMode) {
        rawTextarea.value = editorInstance.getData();
        ckWrapper.classList.add('hidden');
        rawWrapper.classList.remove('hidden');
        toggleText.textContent = 'Visual CKEditor';
      } else {
        editorInstance.setData(rawTextarea.value);
        rawWrapper.classList.add('hidden');
        ckWrapper.classList.remove('hidden');
        toggleText.textContent = 'HTML Code';
      }
    }

    function syncRawToCkeditor() {
      const rawTextarea = document.getElementById('raw-html-textarea');
      if (editorInstance && rawTextarea) {
        editorInstance.setData(rawTextarea.value);
      }
    }

    // 2. Sidebar Mode Switcher
    function switchSidebarMode(mode) {
      document.querySelectorAll('.sidebar-mode-btn').forEach(b => b.classList.remove('active', 'text-white'));
      document.querySelectorAll('.sidebar-mode-btn').forEach(b => b.classList.add('text-[#9CA3AF]'));
      
      document.getElementById('tree-pages-mode').classList.add('hidden');
      document.getElementById('tree-blogs-mode').classList.add('hidden');
      document.getElementById('tree-media-mode').classList.add('hidden');

      if (mode === 'pages') {
        document.getElementById('tab-btn-pages').classList.add('active', 'text-white');
        document.getElementById('tree-pages-mode').classList.remove('hidden');
      } else if (mode === 'blogs') {
        document.getElementById('tab-btn-blogs').classList.add('active', 'text-white');
        document.getElementById('tree-blogs-mode').classList.remove('hidden');
      } else if (mode === 'media') {
        document.getElementById('tab-btn-media').classList.add('active', 'text-white');
        document.getElementById('tree-media-mode').classList.remove('hidden');
      }
    }

    // Check if initial load is blog
    <?php if ($is_blog_item): ?>
    switchSidebarMode('blogs');
    <?php endif; ?>

    // 3. Editor Tab Switcher
    function switchEditorTab(tab) {
      document.querySelectorAll('.editor-tab-btn').forEach(b => b.classList.remove('active'));
      event.currentTarget.classList.add('active');

      document.getElementById('tab-pane-body').classList.add('hidden');
      document.getElementById('tab-pane-hero').classList.add('hidden');
      document.getElementById('tab-pane-media').classList.add('hidden');
      if (document.getElementById('tab-pane-faqs')) document.getElementById('tab-pane-faqs').classList.add('hidden');
      document.getElementById('tab-pane-seo').classList.add('hidden');
      document.getElementById('tab-pane-features').classList.add('hidden');

      const target = document.getElementById('tab-pane-' + tab);
      if (target) target.classList.remove('hidden');
      if (typeof lucide !== 'undefined') lucide.createIcons();
    }

    // 4. Dynamic FAQs & Accordion Management
    let faqsData = <?php echo json_encode($active_blog_post['faqs'] ?? []); ?>;
    if (!Array.isArray(faqsData)) faqsData = [];

    function renderFaqItems() {
      const container = document.getElementById('faq-items-list');
      const previewBox = document.getElementById('faq-accordion-preview-box');
      if (!container || !previewBox) return;

      container.innerHTML = '';
      previewBox.innerHTML = '';

      if (faqsData.length === 0) {
        container.innerHTML = '<div class="p-4 rounded-xl bg-[#1F2937]/50 border border-dashed border-[#374151] text-center text-xs text-[#9CA3AF]">No FAQ questions added yet. Click "+ Add Question" above.</div>';
        previewBox.innerHTML = '<div class="p-3 text-center text-xs text-[#6B7280]">Accordion preview will appear here when FAQs are added.</div>';
        document.getElementById('faq-json-payload').value = JSON.stringify([]);
        return;
      }

      faqsData.forEach((faq, index) => {
        // Builder item
        const itemCard = document.createElement('div');
        itemCard.className = 'p-3.5 bg-[#1F2937] border border-[#374151] rounded-xl space-y-2.5';
        itemCard.innerHTML = `
          <div class="flex items-center justify-between">
            <span class="px-2 py-0.5 rounded bg-[#00A8B5]/20 text-[#00F0FF] text-[10px] font-mono font-bold">FAQ #${index + 1}</span>
            <div class="flex items-center gap-1">
              ${index > 0 ? `<button type="button" onclick="moveFaq(${index}, -1)" class="p-1 hover:bg-[#374151] text-[#9CA3AF] hover:text-white rounded" title="Move Up"><i data-lucide="arrow-up" class="w-3 h-3"></i></button>` : ''}
              ${index < faqsData.length - 1 ? `<button type="button" onclick="moveFaq(${index}, 1)" class="p-1 hover:bg-[#374151] text-[#9CA3AF] hover:text-white rounded" title="Move Down"><i data-lucide="arrow-down" class="w-3 h-3"></i></button>` : ''}
              <button type="button" onclick="removeFaq(${index})" class="p-1 text-[#EF4444] hover:bg-[#EF4444]/20 rounded" title="Delete Question"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
            </div>
          </div>
          <div>
            <label class="block text-[10px] font-mono text-[#9CA3AF] mb-1 font-bold">QUESTION</label>
            <input type="text" class="w-full bg-[#111827] border border-[#374151] rounded-lg px-2.5 py-1.5 text-xs text-white outline-none focus:border-[#00A8B5] font-semibold" value="${escapeHtml(faq.q || '')}" oninput="updateFaqQuestion(${index}, this.value)" placeholder="e.g. How does AI search citation work?">
          </div>
          <div>
            <label class="block text-[10px] font-mono text-[#9CA3AF] mb-1 font-bold">ANSWER</label>
            <textarea rows="2" class="w-full bg-[#111827] border border-[#374151] rounded-lg px-2.5 py-1.5 text-xs text-[#CBD5E1] outline-none focus:border-[#00A8B5]" oninput="updateFaqAnswer(${index}, this.value)" placeholder="Enter comprehensive answer...">${escapeHtml(faq.a || '')}</textarea>
          </div>
        `;
        container.appendChild(itemCard);

        // Preview Accordion item
        const previewItem = document.createElement('div');
        previewItem.className = 'border border-[#374151] rounded-lg overflow-hidden bg-[#111827] text-xs';
        previewItem.innerHTML = `
          <button type="button" class="w-full p-2.5 text-left font-bold text-white flex items-center justify-between gap-2 hover:bg-[#1F2937]" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.preview-icon').textContent = this.nextElementSibling.classList.contains('hidden') ? '+' : '−'">
            <span>${escapeHtml(faq.q || 'Untitled Question')}</span>
            <span class="preview-icon text-sm font-mono text-[#00F0FF] shrink-0 font-bold">+</span>
          </button>
          <div class="p-2.5 pt-0 text-[11px] text-[#9CA3AF] hidden border-t border-[#1F2937] leading-relaxed">
            ${escapeHtml(faq.a || 'No answer provided yet.').replace(/\n/g, '<br>')}
          </div>
        `;
        previewBox.appendChild(previewItem);
      });

      document.getElementById('faq-json-payload').value = JSON.stringify(faqsData);
      if (typeof lucide !== 'undefined') lucide.createIcons();
    }

    function escapeHtml(str) {
      return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    function addNewFaqItem() {
      faqsData.push({ q: '', a: '' });
      renderFaqItems();
    }

    function removeFaq(index) {
      faqsData.splice(index, 1);
      renderFaqItems();
    }

    function moveFaq(index, delta) {
      const newIdx = index + delta;
      if (newIdx < 0 || newIdx >= faqsData.length) return;
      const item = faqsData.splice(index, 1)[0];
      faqsData.splice(newIdx, 0, item);
      renderFaqItems();
    }

    function updateFaqQuestion(index, val) {
      if (faqsData[index]) {
        faqsData[index].q = val;
        document.getElementById('faq-json-payload').value = JSON.stringify(faqsData);
      }
    }

    function updateFaqAnswer(index, val) {
      if (faqsData[index]) {
        faqsData[index].a = val;
        document.getElementById('faq-json-payload').value = JSON.stringify(faqsData);
      }
    }

    // Initial render
    renderFaqItems();

    // 5. Inline & Featured Image Upload Handler
    async function handleInlineImageUpload(event) {
      const file = event.target.files[0];
      if (!file) return;

      const formData = new FormData();
      formData.append('media_file', file);
      showToast('Uploading image...', 'info');

      try {
        const response = await fetch('api/upload-media.php', { method: 'POST', body: formData });
        const result = await response.json();
        if (result.success && editorInstance) {
          const content = `<p><img src="${result.url}" alt="Uploaded Media" class="max-w-full rounded-xl my-4" /></p>`;
          const viewFragment = editorInstance.data.processor.toView(content);
          const modelFragment = editorInstance.data.toModel(viewFragment);
          editorInstance.model.insertContent(modelFragment);
          showToast('Image inserted into CKEditor!', 'success');
        } else {
          showToast(result.message || 'Upload failed', 'error');
        }
      } catch (err) {
        showToast('Error uploading media: ' + err.message, 'error');
      }
    }

    async function handleFeaturedImageUpload(event) {
      const file = event.target.files[0];
      if (!file) return;

      const formData = new FormData();
      formData.append('media_file', file);
      showToast('Uploading featured image...', 'info');

      try {
        const response = await fetch('api/upload-media.php', { method: 'POST', body: formData });
        const result = await response.json();
        if (result.success) {
          document.getElementById('featured-image-preview').src = result.url;
          document.getElementById('featured-image-url-input').value = result.url;
          showToast('Featured image updated!', 'success');
        } else {
          showToast(result.message || 'Upload failed', 'error');
        }
      } catch (err) {
        showToast('Error uploading featured image: ' + err.message, 'error');
      }
    }

    async function handleSidebarUpload(event) {
      const file = event.target.files[0];
      if (!file) return;

      const formData = new FormData();
      formData.append('media_file', file);
      showToast('Uploading media...', 'info');

      try {
        const response = await fetch('api/upload-media.php', { method: 'POST', body: formData });
        const result = await response.json();
        if (result.success) {
          showToast('Media uploaded: ' + result.filename, 'success');
          const grid = document.getElementById('sidebar-media-grid');
          const newCard = document.createElement('div');
          newCard.className = 'p-1 bg-[#1F2937] rounded-lg border border-[#374151] cursor-pointer hover:border-[#00A8B5]';
          newCard.onclick = () => copyMediaUrl(result.url);
          newCard.innerHTML = `<img src="${result.url}" class="w-full h-16 object-cover rounded"><div class="text-[9px] text-[#9CA3AF] truncate mt-1">${result.filename}</div>`;
          grid.prepend(newCard);
        } else {
          showToast(result.message, 'error');
        }
      } catch (err) {
        showToast('Upload error', 'error');
      }
    }

    function copyMediaUrl(url) {
      navigator.clipboard.writeText(url);
      showToast('Copied media URL to clipboard: ' + url, 'success');
    }

    function updateFeaturedPreview(url) {
      if (url) document.getElementById('featured-image-preview').src = url;
    }

    function clearFeaturedImage() {
      document.getElementById('featured-image-preview').src = 'assets/images/hero_dashboard_light_v2.png';
      document.getElementById('featured-image-url-input').value = '';
    }

    // 6. SEO Live Preview Updates
    function updateSeoPreview() {
      const title = document.getElementById('seo-meta-title').value;
      const desc = document.getElementById('seo-meta-description').value;

      document.getElementById('meta-title-length').textContent = title.length;
      document.getElementById('meta-desc-length').textContent = desc.length;

      document.getElementById('serp-preview-title').textContent = title || 'Page Title | Digital4Local';
      document.getElementById('serp-preview-desc').textContent = desc || 'Description preview will appear here.';
    }
    updateSeoPreview();

    // 7. Viewport Switcher
    function setViewport(w) {
      const wrapper = document.getElementById('preview-wrapper');
      wrapper.style.width = w;

      document.querySelectorAll('#vp-desktop, #vp-tablet, #vp-mobile').forEach(b => {
        b.classList.remove('bg-[#00A8B5]', 'text-[#0F172A]');
        b.classList.add('text-[#9CA3AF]');
      });
      if (w === '100%') document.getElementById('vp-desktop').classList.add('bg-[#00A8B5]', 'text-[#0F172A]');
      if (w === '768px') document.getElementById('vp-tablet').classList.add('bg-[#00A8B5]', 'text-[#0F172A]');
      if (w === '375px') document.getElementById('vp-mobile').classList.add('bg-[#00A8B5]', 'text-[#0F172A]');
    }

    function reloadPreviewIframe() {
      const iframe = document.getElementById('cms-live-preview-frame');
      iframe.src = iframe.src.split('?')[0] + '?slug=' + encodeURIComponent(document.getElementById('form-blog-slug')?.value || '') + '&t=' + new Date().getTime();
    }

    // 8. Save All CMS Settings via API
    async function saveCmsSettings() {
      // Sync CKEditor data to textarea
      if (editorInstance) {
        document.querySelector('#ck-content-editor').value = editorInstance.getData();
      }

      const form = document.getElementById('cms-editor-form');
      const formData = new FormData(form);
      
      // Convert form data to nested JSON object
      const payload = {};
      for (const [key, value] of formData.entries()) {
        const matches = key.match(/^([^\[]+)\[([^\]]+)\](?:\[([^\]]+)\])?$/);
        if (matches) {
          const root = matches[1];
          const sub = matches[2];
          const leaf = matches[3];
          if (!payload[root]) payload[root] = {};
          if (leaf) {
            if (!payload[root][sub]) payload[root][sub] = {};
            payload[root][sub][leaf] = value;
          } else {
            payload[root][sub] = value;
          }
        } else {
          payload[key] = value;
        }
      }

      // Add status & slugs
      const status = document.getElementById('editor-page-status').value;
      const isBlog = document.getElementById('form-is-blog-post').value === '1';
      const activeKey = document.getElementById('form-active-page-key').value;

      if (isBlog) {
        if (!payload['active_blog_post']) payload['active_blog_post'] = {};
        payload['active_blog_post']['status'] = status;
        payload['active_blog_post']['slug'] = document.getElementById('edit-blog-slug')?.value || document.getElementById('form-blog-slug').value;
        payload['active_blog_post']['content_html'] = editorInstance ? editorInstance.getData() : '';
        payload['active_blog_post']['faqs'] = faqsData;
        payload['original_blog_slug'] = document.getElementById('form-orig-blog-slug').value;
      } else {
        if (!payload['pages']) payload['pages'] = {};
        if (!payload['pages'][activeKey]) payload['pages'][activeKey] = {};
        payload['pages'][activeKey]['status'] = status;
        payload['pages'][activeKey]['content_html'] = editorInstance ? editorInstance.getData() : '';
      }

      showToast('Saving live changes...', 'info');

      try {
        const response = await fetch('api/update-cms-settings.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(payload)
        });
        const result = await response.json();
        if (result.success) {
          showToast('Blog & CMS configuration saved successfully!', 'success');
          reloadPreviewIframe();
        } else {
          showToast('Save failed: ' + result.message, 'error');
        }
      } catch (err) {
        showToast('Error saving settings: ' + err.message, 'error');
      }
    }

    document.getElementById('btn-save-all').addEventListener('click', saveCmsSettings);

    // Ctrl+S Keyboard Shortcut
    window.addEventListener('keydown', e => {
      if ((e.ctrlKey || e.metaKey) && e.key === 's') {
        e.preventDefault();
        saveCmsSettings();
      }
    });

    // 9. Custom Page & Blog Creation Handlers
    function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

    function autoGenerateSlug(title) {
      const slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
      document.getElementById('new-page-slug-input').value = slug;
    }

    function autoGenerateBlogSlug(title) {
      const slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
      document.getElementById('new-post-slug-input').value = slug;
    }

    function updateBlogSlugPreview(title) {
      // Optional live suggestion
    }

    async function submitCreatePage() {
      const title = document.getElementById('new-page-title-input').value.trim();
      const slug = document.getElementById('new-page-slug-input').value.trim();
      if (!title) { alert('Please enter a page title.'); return; }

      const response = await fetch('api/update-cms-settings.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'add_custom_page', new_page_title: title, new_page_slug: slug })
      });
      const res = await response.json();
      if (res.success) {
        window.location.href = 'admin-cms.php?page=' + encodeURIComponent(res.page_key);
      } else {
        alert(res.message);
      }
    }

    async function submitCreateBlogPost() {
      const title = document.getElementById('new-post-title-input').value.trim();
      const slug = document.getElementById('new-post-slug-input').value.trim();
      const category = document.getElementById('new-post-category-select').value;
      if (!title) { alert('Please enter an article title.'); return; }

      const response = await fetch('api/update-cms-settings.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'add_blog_post', new_post_title: title, new_post_slug: slug, new_post_category: category })
      });
      const res = await response.json();
      if (res.success) {
        window.location.href = 'admin-cms.php?page=blog_' + encodeURIComponent(res.post_slug);
      } else {
        alert(res.message);
      }
    }

    async function deleteCustomPage(pageKey, pageTitle) {
      if (!confirm(`Are you sure you want to permanently delete '${pageTitle}'?`)) return;
      const response = await fetch('api/update-cms-settings.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'delete_custom_page', page_key: pageKey })
      });
      const res = await response.json();
      if (res.success) window.location.href = 'admin-cms.php?page=index';
    }

    async function deleteBlogPost(slug, title) {
      if (!confirm(`Are you sure you want to delete blog article '${title}'?`)) return;
      const response = await fetch('api/update-cms-settings.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'delete_blog_post', post_slug: slug })
      });
      const res = await response.json();
      if (res.success) window.location.href = 'admin-cms.php?page=blog';
    }

    // 10. Toast Helper
    function showToast(msg, type = 'success') {
      const container = document.getElementById('toast-container');
      const toast = document.createElement('div');
      const bg = type === 'success' ? 'bg-[#10B981]' : (type === 'error' ? 'bg-[#EF4444]' : 'bg-[#00A8B5]');
      toast.className = `${bg} text-[#0F172A] px-4 py-2.5 rounded-xl shadow-2xl font-bold text-xs flex items-center gap-2 pointer-events-auto transition-all animate-bounce`;
      toast.innerHTML = `<i data-lucide="${type === 'success' ? 'check-circle' : 'info'}" class="w-4 h-4"></i> <span>${msg}</span>`;
      container.appendChild(toast);
      if (typeof lucide !== 'undefined') lucide.createIcons();
      setTimeout(() => toast.remove(), 3500);
    }
  </script>
</body>
</html>
