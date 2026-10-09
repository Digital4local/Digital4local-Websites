<?php
require_once __DIR__ . '/includes/auth-middleware.php';
require_admin_login();
$admin_user = get_logged_in_admin();

require_once __DIR__ . '/includes/site-config.php';
require_once __DIR__ . '/includes/location/LocationServicePage.php';

// Fetch all location pages & blogs for navigation
$blog_posts_list = get_blog_posts();
$location_pages = d4l_get_all_location_pages();

// Fetch active page or default to index
$active_key = $_GET['page'] ?? ($site_config['active_page_key'] ?? 'index');
$mode = $_GET['mode'] ?? '';

if ($mode === 'blogs' || $active_key === 'blogs' || $active_key === 'blog_list') {
    if (!empty($blog_posts_list)) {
        $active_key = 'blog_' . ($blog_posts_list[0]['slug'] ?? '');
    }
}
if ($mode === 'locations' || $active_key === 'locations' || $active_key === 'location_list') {
    if (!empty($location_pages)) {
        $first_loc_key = array_key_first($location_pages);
        $active_key = $first_loc_key;
    }
}

$active_blog_slug = '';
$is_blog_item = false;
$active_blog_post = null;

$active_location_slug = '';
$is_location_item = false;
$location_data = null;
$location_city = 'bhopal';

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
} elseif (strpos($active_key, 'location_') === 0 || isset($location_pages[$active_key])) {
    $is_location_item = true;
    $loc_item = $location_pages[$active_key] ?? null;
    $active_location_slug = $loc_item['slug'] ?? str_replace('location_', '', $active_key);
    $location_city = $loc_item['city'] ?? 'bhopal';
    $location_data = d4l_get_location_page_data($active_location_slug, $location_city);
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
    'industries_index' => ['title' => 'Industries Blueprint Hub', 'url' => 'industries/index.php', 'type' => 'Industry'],
    'industries_solar' => ['title' => 'Solar Installers', 'url' => 'industries/solar-installers-seo.php', 'type' => 'Industry'],
    'industries_heat_pump' => ['title' => 'Heat Pump Installers', 'url' => 'industries/heat-pump-installers-seo.php', 'type' => 'Industry'],
    'industries_ev_charger' => ['title' => 'EV Charger Installers', 'url' => 'industries/ev-charger-installers-seo.php', 'type' => 'Industry'],
    'industries_roofing' => ['title' => 'Roofing Companies', 'url' => 'industries/roofing-companies-seo.php', 'type' => 'Industry'],
    'industries_kitchen_bath' => ['title' => 'Kitchen & Bath', 'url' => 'industries/kitchen-bathroom-renovators-seo.php', 'type' => 'Industry'],
    'industries_loft' => ['title' => 'Lofts & Extensions', 'url' => 'industries/loft-conversion-builders-seo.php', 'type' => 'Industry'],
    'industries_dental' => ['title' => 'Private Dental Clinics', 'url' => 'industries/dental-clinics-seo.php', 'type' => 'Industry'],
    'industries_aesthetics' => ['title' => 'Aesthetics Clinics', 'url' => 'industries/aesthetics-clinics-seo.php', 'type' => 'Industry'],
    'industries_law' => ['title' => 'Law Firms & Solicitors', 'url' => 'industries/law-firms-seo.php', 'type' => 'Industry'],
    'industries_driveway' => ['title' => 'Driveways & Landscaping', 'url' => 'industries/driveway-landscaping-seo.php', 'type' => 'Industry'],
    'industries_pool' => ['title' => 'Swimming Pool Installers', 'url' => 'industries/pool-installers-seo.php', 'type' => 'Industry'],
    'industries_removal' => ['title' => 'Removal Companies', 'url' => 'industries/removal-companies-seo.php', 'type' => 'Industry'],
    'industries_security' => ['title' => 'Security & CCTV', 'url' => 'industries/security-cctv-installers-seo.php', 'type' => 'Industry'],
    'industries_local_biz' => ['title' => 'Local Businesses', 'url' => 'industries/local-business-seo.php', 'type' => 'Industry'],
    'industries_startups' => ['title' => 'Startups & Scaleups', 'url' => 'industries/startup-seo-agency.php', 'type' => 'Industry'],
    'industries_saas' => ['title' => 'SaaS Enterprise', 'url' => 'industries/saas-marketing-agency.php', 'type' => 'Industry']
];

$custom_pages = [];
if (isset($site_config['pages'])) {
    foreach ($site_config['pages'] as $k => $p) {
        if (strpos($k, 'custom_') === 0) {
            $custom_pages[$k] = [
                'title' => $p['title'] ?? 'Custom Landing Page',
                'url' => $p['url'] ?? ('page/' . str_replace('custom_', '', $k)),
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
                'url' => $cp['url'] ?? ('page/' . ($cp['slug'] ?? 'page')),
                'type' => 'Landing Page'
            ];
        }
    }
}

// Resolve active item data
if ($is_blog_item) {
    $active_title = $active_blog_post['title'] ?? 'Blog Article';
    $active_url = 'blog/' . urlencode($active_blog_slug);
    $active_status = $active_blog_post['status'] ?? 'published';
    $active_type = 'Blog Article';
} elseif ($is_location_item) {
    $active_title = $location_data['h1'] ?? ($loc_item['title'] ?? 'Location Page');
    $active_url = $active_location_slug . '/';
    $active_status = 'published';
    $active_type = 'Location Cluster (' . ucfirst($location_city) . ')';
} else {
    $all_registered = array_merge($core_pages, $service_pages, $industry_pages, $custom_pages, $location_pages);
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
  
  <!-- Favicon & Touch Icons -->
  <link rel="icon" type="image/x-icon" href="favicon.ico?v=2">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png?v=2">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png?v=2">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-touch-icon.png?v=2">
  
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

      <!-- Quick Action: Add New Location, Page or Blog -->
      <div class="p-2.5 border-b border-[#1F2937] flex gap-1.5">
        <button onclick="openModal('add-location-modal')" class="flex-1 py-1.5 px-2 bg-[#00F0FF]/15 hover:bg-[#00F0FF]/25 text-[#00F0FF] rounded-lg text-xs font-semibold flex items-center justify-center gap-1 border border-[#00F0FF]/30 transition-all" title="Add Location Cluster Landing Page">
          <i data-lucide="map-pin" class="w-3.5 h-3.5 text-[#00F0FF]"></i> + Location
        </button>
        <button onclick="openModal('add-page-modal')" class="flex-1 py-1.5 px-2 bg-[#1F2937] hover:bg-[#374151] text-[#E2E8F0] rounded-lg text-xs font-semibold flex items-center justify-center gap-1 border border-[#374151] transition-all">
          <i data-lucide="plus" class="w-3.5 h-3.5"></i> + Page
        </button>
        <button onclick="openModal('add-blog-modal')" class="flex-1 py-1.5 px-2 bg-[#10B981]/15 hover:bg-[#10B981]/25 text-[#10B981] rounded-lg text-xs font-semibold flex items-center justify-center gap-1 border border-[#10B981]/30 transition-all">
          <i data-lucide="file-plus" class="w-3.5 h-3.5"></i> + Blog
        </button>
      </div>

      <!-- Scrollable Tree Navigator -->
      <div class="flex-1 overflow-y-auto custom-scrollbar p-2 space-y-4">
        
        <!-- PAGES MODE CONTAINER -->
        <div id="tree-pages-mode" class="space-y-3 <?php echo $is_blog_item ? 'hidden' : ''; ?>">
          
          <!-- Location Cluster Pages (Bhopal & Multi-city) -->
          <div class="space-y-0.5">
            <div class="px-2 py-1 text-[10px] font-mono uppercase tracking-wider text-[#00F0FF] font-bold flex justify-between items-center">
              <span class="flex items-center gap-1.5"><i data-lucide="map-pin" class="w-3 h-3 text-[#00F0FF]"></i> Location Clusters</span>
              <span class="text-[#00F0FF] font-bold"><?php echo count($location_pages); ?></span>
            </div>
            <?php foreach ($location_pages as $k => $item): 
              $is_act = ($is_location_item && $active_location_slug === ($item['slug'] ?? ''));
            ?>
            <a href="admin-cms.php?page=<?php echo urlencode($k); ?>" class="page-nav-item <?php echo $is_act ? 'active' : ''; ?> px-2.5 py-1.5 rounded-md flex items-center justify-between text-xs text-[#D1D5DB] hover:bg-[#1F2937] transition-all">
              <span class="flex items-center gap-2 truncate">
                <i data-lucide="map-pin" class="w-3.5 h-3.5 <?php echo !empty($item['is_hub']) ? 'text-amber-400' : 'text-[#00A8B5]'; ?> shrink-0"></i>
                <span class="truncate"><?php echo htmlspecialchars($item['title']); ?></span>
              </span>
              <span class="w-2 h-2 rounded-full bg-[#10B981] shrink-0"></span>
            </a>
            <?php endforeach; ?>
          </div>

          <!-- Core Pages -->
          <div class="space-y-0.5">
            <div class="px-2 py-1 text-[10px] font-mono uppercase tracking-wider text-[#6B7280] font-bold">Core Pages</div>
            <?php foreach ($core_pages as $k => $item): 
              $is_act = (!$is_blog_item && !$is_location_item && $active_key === $k);
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
              $is_act = (!$is_blog_item && !$is_location_item && $active_key === $k);
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
        <?php if ($is_location_item): ?>
          <button onclick="switchEditorTab('loc_hero')" id="tab-btn-loc_hero" class="editor-tab-btn active px-3.5 py-2 rounded-t-lg text-xs flex items-center gap-1.5 transition-all">
            <i data-lucide="type" class="w-3.5 h-3.5 text-[#00F0FF]"></i> Hero & Direct Answer
          </button>
          <button onclick="switchEditorTab('loc_sections')" id="tab-btn-loc_sections" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
            <i data-lucide="layout-grid" class="w-3.5 h-3.5 text-[#8B5CF6]"></i> Dynamic Sections (<?php echo count($location_data['sections'] ?? []); ?>)
          </button>
          <button onclick="switchEditorTab('faqs')" id="tab-btn-faqs" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
            <i data-lucide="help-circle" class="w-3.5 h-3.5 text-[#00F0FF]"></i> FAQs Accordion (<?php echo count($location_data['faqs'] ?? []); ?>)
          </button>
          <button onclick="switchEditorTab('loc_seo')" id="tab-btn-loc_seo" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
            <i data-lucide="search" class="w-3.5 h-3.5 text-[#10B981]"></i> SEO & Schema
          </button>
          <button onclick="switchEditorTab('loc_author')" id="tab-btn-loc_author" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
            <i data-lucide="user-check" class="w-3.5 h-3.5 text-[#F59E0B]"></i> Author & CTA
          </button>
        <?php else: ?>
          <button onclick="switchEditorTab('body')" id="tab-btn-body" class="editor-tab-btn active px-3.5 py-2 rounded-t-lg text-xs flex items-center gap-1.5 transition-all">
            <i data-lucide="file-edit" class="w-3.5 h-3.5"></i> Body (CKEditor)
          </button>
          <button onclick="switchEditorTab('hero')" id="tab-btn-hero" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
            <i data-lucide="type" class="w-3.5 h-3.5"></i> <?php echo $is_blog_item ? 'Article Details' : 'Hero & Details'; ?>
          </button>
          <button onclick="switchEditorTab('media')" id="tab-btn-media" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
            <i data-lucide="image" class="w-3.5 h-3.5"></i> Featured Image
          </button>
          <button onclick="switchEditorTab('faqs')" id="tab-btn-faqs" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
            <i data-lucide="help-circle" class="w-3.5 h-3.5 text-[#00F0FF]"></i> FAQs (Accordion)
          </button>
          <button onclick="switchEditorTab('seo')" id="tab-btn-seo" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
            <i data-lucide="search" class="w-3.5 h-3.5"></i> SEO & Schema
          </button>
          <button onclick="switchEditorTab('features')" id="tab-btn-features" class="editor-tab-btn px-3.5 py-2 rounded-t-lg text-[#9CA3AF] hover:text-white text-xs flex items-center gap-1.5 transition-all">
            <i data-lucide="sliders" class="w-3.5 h-3.5"></i> Global Config
          </button>
        <?php endif; ?>
      </div>

      <!-- Editor Form Container -->
      <form id="cms-editor-form" class="flex-1 overflow-y-auto custom-scrollbar p-4 space-y-5" onsubmit="event.preventDefault(); saveCmsSettings();">
        <input type="hidden" name="active_page_key" id="form-active-page-key" value="<?php echo htmlspecialchars($active_key); ?>">
        <input type="hidden" name="is_blog_post" id="form-is-blog-post" value="<?php echo $is_blog_item ? '1' : '0'; ?>">
        <input type="hidden" name="is_location_page" id="form-is-location-page" value="<?php echo $is_location_item ? '1' : '0'; ?>">
        <input type="hidden" name="blog_slug" id="form-blog-slug" value="<?php echo htmlspecialchars($active_blog_slug); ?>">
        <input type="hidden" name="original_blog_slug" id="form-orig-blog-slug" value="<?php echo htmlspecialchars($active_blog_slug); ?>">
        <input type="hidden" name="location_slug" id="form-location-slug" value="<?php echo htmlspecialchars($active_location_slug); ?>">
        <input type="hidden" name="location_city" id="form-location-city" value="<?php echo htmlspecialchars($location_city); ?>">

        <?php if ($is_location_item): ?>
        <!-- ========================================================================= -->
        <!-- LOCATION CLUSTER TAB 1: HERO & DIRECT ANSWER (AEO / GEO) -->
        <!-- ========================================================================= -->
        <div id="tab-pane-loc_hero" class="space-y-4">
          <div class="card-dark p-4 space-y-4 bg-[#111827] border border-[#1F2937] rounded-xl shadow-lg">
            <div class="flex items-center justify-between border-b border-[#1F2937] pb-2">
              <h3 class="text-xs font-mono uppercase font-bold text-[#00F0FF] flex items-center gap-1.5">
                <i data-lucide="type" class="w-4 h-4 text-[#00F0FF]"></i>
                Hero Typography & AEO Direct Answer
              </h3>
              <span class="bg-[#00F0FF]/15 text-[#00F0FF] text-[10px] font-mono px-2 py-0.5 rounded font-bold">
                <?php echo ucfirst($location_city); ?> Hub
              </span>
            </div>

            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">PRIMARY H1 HEADLINE (Single H1 per Page) *</label>
              <input type="text" id="loc-h1-input" value="<?php echo htmlspecialchars($location_data['h1'] ?? ''); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none font-bold" placeholder="e.g. SEO Agency in Bhopal">
            </div>

            <div class="grid grid-cols-2 gap-3">
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">HERO TOP BADGE</label>
                <input type="text" id="loc-badge-input" value="<?php echo htmlspecialchars($location_data['badge'] ?? strtoupper($location_city) . ' AGENCY HUB'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-[#00F0FF] font-mono focus:border-[#00A8B5] outline-none font-bold">
              </div>
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">HERO MOTIF WIDGET</label>
                <select id="loc-hero-motif-input" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none font-semibold">
                  <?php 
                  $motifs = [
                    'combined' => 'Combined (5x5 Geo-Grid + Live Scan)',
                    'map-pin' => 'Google Maps 5x5 Matrix Pin Tracker',
                    'ai-chat' => 'ChatGPT & Gemini Answer Simulator',
                    'workflow-nodes' => 'n8n AI Workflow Automation Nodes',
                    'profile-card' => 'Verified Entity Profile Card',
                    'channels' => '4-Channel Search Overview'
                  ];
                  $cur_motif = $location_data['heroMotif'] ?? 'combined';
                  foreach ($motifs as $mk => $mv): ?>
                    <option value="<?php echo $mk; ?>" <?php echo $cur_motif === $mk ? 'selected' : ''; ?>><?php echo $mv; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div>
              <div class="flex items-center justify-between mb-1">
                <label class="text-[11px] font-mono text-[#00F0FF] font-bold">40–60 WORD DIRECT ANSWER (AEO / GEO Summary Box)</label>
                <span class="text-[10px] text-[#9CA3AF] font-mono">Supports [[VERIFY: ...]] chips</span>
              </div>
              <textarea rows="4" id="loc-hero-direct-answer-input" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none leading-relaxed"><?php echo htmlspecialchars($location_data['heroDirectAnswer'] ?? ''); ?></textarea>
              <p class="text-[10px] text-[#9CA3AF] mt-1">This paragraph directly answers local search intent for Google AI Overviews, Gemini, and ChatGPT.</p>
            </div>

            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">HERO SUBTITLE / SECONDARY VALUE PROP</label>
              <textarea rows="2" id="loc-hero-subtitle-input" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-[#CBD5E1] focus:border-[#00A8B5] outline-none leading-relaxed"><?php echo htmlspecialchars($location_data['heroSubtitle'] ?? ''); ?></textarea>
            </div>

            <div class="grid grid-cols-4 gap-3 pt-1">
              <div>
                <label class="block text-[10px] font-mono text-[#9CA3AF] mb-1 font-bold">CITY</label>
                <input type="text" id="loc-city-input" value="<?php echo htmlspecialchars($location_data['city'] ?? ucfirst($location_city)); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-2.5 py-1.5 text-xs text-white font-mono focus:border-[#00A8B5] outline-none">
              </div>
              <div>
                <label class="block text-[10px] font-mono text-[#9CA3AF] mb-1 font-bold">STATE</label>
                <input type="text" id="loc-state-input" value="<?php echo htmlspecialchars($location_data['state'] ?? 'Madhya Pradesh'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-2.5 py-1.5 text-xs text-white font-mono focus:border-[#00A8B5] outline-none">
              </div>
              <div>
                <label class="block text-[10px] font-mono text-[#9CA3AF] mb-1 font-bold">COUNTRY</label>
                <input type="text" id="loc-country-input" value="<?php echo htmlspecialchars($location_data['country'] ?? 'India'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-2.5 py-1.5 text-xs text-white font-mono focus:border-[#00A8B5] outline-none">
              </div>
              <div>
                <label class="block text-[10px] font-mono text-[#9CA3AF] mb-1 font-bold">LAST UPDATED</label>
                <input type="text" id="loc-last-updated-input" value="<?php echo htmlspecialchars($location_data['lastUpdated'] ?? date('F Y')); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-2.5 py-1.5 text-xs text-white font-mono focus:border-[#00A8B5] outline-none">
              </div>
            </div>

            <div class="pt-2 border-t border-[#1F2937] flex items-center justify-between">
              <label class="flex items-center gap-2 cursor-pointer text-xs text-[#E2E8F0] font-semibold">
                <input type="checkbox" id="loc-is-hub-input" class="rounded bg-[#1F2937] border-[#374151] text-[#00A8B5] focus:ring-0" <?php echo !empty($location_data['isHub']) ? 'checked' : ''; ?>>
                <span>Is Cluster Hub Page (Parent of Spoke Pages)?</span>
              </label>
              <div class="text-[10px] font-mono text-[#9CA3AF]">
                URL: <span class="text-[#00F0FF]">/<?php echo htmlspecialchars($active_location_slug); ?>/</span>
              </div>
            </div>

          </div>
        </div>

        <!-- ========================================================================= -->
        <!-- LOCATION CLUSTER TAB 2: DYNAMIC SECTIONS & STRUCTURED CONTENT BLOCKS -->
        <!-- ========================================================================= -->
        <div id="tab-pane-loc_sections" class="space-y-4 hidden">
          <div class="card-dark p-4 sm:p-5 space-y-4 bg-[#111827] border border-[#1F2937] rounded-xl shadow-lg">
            
            <!-- Tab 2 Header with Visual/Code Mode Switcher & Add Section Button -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-[#1F2937] pb-3.5">
              <div>
                <h3 class="text-xs font-mono uppercase font-bold text-[#8B5CF6] flex items-center gap-1.5">
                  <i data-lucide="layout-grid" class="w-4 h-4 text-[#8B5CF6]"></i>
                  Dynamic Page Sections Studio (100% Dynamic Engine)
                </h3>
                <p class="text-[11px] text-[#9CA3AF]">Customizable Section Cards: Content Blocks, 90-Day Timelines, Comparison Tables, Honest Promises, Localities Grids & Pricing Tiers.</p>
              </div>

              <div class="flex flex-wrap items-center gap-2">
                <!-- Mode Switcher -->
                <div class="bg-[#0B0F19] p-1 rounded-lg border border-[#1F2937] flex items-center gap-1">
                  <button type="button" onclick="setLocSectionsMode('visual')" id="loc-sec-mode-btn-visual" class="px-2.5 py-1 rounded text-xs font-bold transition-all bg-[#00A8B5] text-[#0F172A] flex items-center gap-1">
                    <i data-lucide="layout" class="w-3.5 h-3.5"></i> Visual Form Cards
                  </button>
                  <button type="button" onclick="setLocSectionsMode('code')" id="loc-sec-mode-btn-code" class="px-2.5 py-1 rounded text-xs font-mono text-[#9CA3AF] hover:text-white transition-all flex items-center gap-1">
                    <i data-lucide="code-2" class="w-3.5 h-3.5"></i> Raw JSON Code
                  </button>
                </div>

                <!-- Add Section Dropdown Button -->
                <div class="relative">
                  <button type="button" onclick="toggleAddSectionDropdown()" id="btn-add-section-dropdown" class="px-3 py-1.5 bg-gradient-to-r from-[#8B5CF6] to-[#00A8B5] hover:from-[#7C3AED] hover:to-[#00F0FF] text-white rounded-lg text-xs font-bold flex items-center gap-1.5 shadow-md transition-all">
                    <i data-lucide="plus-circle" class="w-3.5 h-3.5"></i>
                    <span>+ Add Section</span>
                    <i data-lucide="chevron-down" class="w-3 h-3 ml-0.5"></i>
                  </button>

                  <!-- Add Section Popup Menu -->
                  <div id="add-section-menu" class="hidden absolute right-0 mt-2 w-56 bg-[#1F2937] border border-[#374151] rounded-xl shadow-2xl z-50 p-1.5 space-y-1 text-xs">
                    <div class="px-2 py-1 text-[10px] font-mono uppercase text-[#9CA3AF] font-bold border-b border-[#374151]">Select Section Type:</div>
                    <button type="button" onclick="addNewLocationSection('content_block')" class="w-full text-left px-2.5 py-1.5 rounded-lg hover:bg-[#374151] text-white flex items-center gap-2">
                      <span class="w-2 h-2 rounded-full bg-blue-400"></span>
                      <span>Standard Content Block</span>
                    </button>
                    <button type="button" onclick="addNewLocationSection('timeline')" class="w-full text-left px-2.5 py-1.5 rounded-lg hover:bg-[#374151] text-white flex items-center gap-2">
                      <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                      <span>90-Day Sprint Timeline</span>
                    </button>
                    <button type="button" onclick="addNewLocationSection('comparison_table')" class="w-full text-left px-2.5 py-1.5 rounded-lg hover:bg-[#374151] text-white flex items-center gap-2">
                      <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
                      <span>Competitor Comparison Table</span>
                    </button>
                    <button type="button" onclick="addNewLocationSection('honest_promises')" class="w-full text-left px-2.5 py-1.5 rounded-lg hover:bg-[#374151] text-white flex items-center gap-2">
                      <span class="w-2 h-2 rounded-full bg-rose-400"></span>
                      <span>Honest Promises (Do / Don't)</span>
                    </button>
                    <button type="button" onclick="addNewLocationSection('locality_grid')" class="w-full text-left px-2.5 py-1.5 rounded-lg hover:bg-[#374151] text-white flex items-center gap-2">
                      <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                      <span>Localities & Areas Grid</span>
                    </button>
                    <button type="button" onclick="addNewLocationSection('pricing_table')" class="w-full text-left px-2.5 py-1.5 rounded-lg hover:bg-[#374151] text-white flex items-center gap-2">
                      <span class="w-2 h-2 rounded-full bg-purple-400"></span>
                      <span>Transparent Pricing Tiers</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- CONTAINER A: INTERACTIVE VISUAL FORM CARDS BUILDER -->
            <div id="loc-sections-visual-container" class="space-y-4">
              <div id="loc-sections-cards-list" class="space-y-4">
                <!-- Dynamically populated by renderLocationSectionsVisualBuilder() -->
              </div>
            </div>

            <!-- CONTAINER B: RAW JSON CODE VIEW (Hidden by Default) -->
            <div id="loc-sections-code-container" class="space-y-3 hidden">
              <div class="flex items-center justify-between">
                <label class="text-[11px] font-mono text-[#00A8B5] font-bold flex items-center gap-1.5">
                  <i data-lucide="file-code" class="w-3.5 h-3.5"></i> SECTIONS JSON SCHEMA (Advanced High-Performance Editor)
                </label>
                <div class="flex items-center gap-2">
                  <span id="loc-json-status" class="text-[10px] font-mono text-[#10B981] font-bold">● Valid JSON</span>
                  <button type="button" onclick="formatLocationSectionsJson()" class="px-2 py-0.5 bg-[#1F2937] hover:bg-[#374151] text-[#00F0FF] rounded text-[10px] font-mono font-bold border border-[#374151]">
                    Format JSON
                  </button>
                  <button type="button" onclick="validateLocationSectionsJson()" class="px-2 py-0.5 bg-[#10B981]/20 hover:bg-[#10B981]/30 text-[#10B981] rounded text-[10px] font-mono font-bold border border-[#10B981]/30">
                    Validate
                  </button>
                </div>
              </div>
              <textarea id="loc-sections-json" rows="20" class="w-full p-3 bg-[#050811] text-[#00F0FF] font-mono text-xs border border-[#1F2937] rounded-xl outline-none focus:border-[#00A8B5] transition-colors leading-relaxed selection:bg-[#00F0FF]/30 selection:text-white" oninput="liveValidateSectionsJson(this.value)"><?php 
                echo htmlspecialchars(json_encode($location_data['sections'] ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)); 
              ?></textarea>
            </div>

            <!-- Cheatsheet & Dynamic Status Footer -->
            <div class="p-3 bg-[#0B0F19] rounded-xl border border-[#1F2937] flex flex-col sm:flex-row sm:items-center justify-between gap-2 text-[11px] text-[#9CA3AF]">
              <div class="flex items-center gap-2 font-mono text-[10px]">
                <span class="text-white font-bold uppercase">Section Types:</span>
                <span class="text-blue-400">content_block</span> · 
                <span class="text-amber-400">timeline</span> · 
                <span class="text-cyan-400">comparison_table</span> · 
                <span class="text-rose-400">honest_promises</span> · 
                <span class="text-emerald-400">locality_grid</span> · 
                <span class="text-purple-400">pricing_table</span>
              </div>
              <div class="text-[10px] font-mono text-[#00A8B5] font-bold">
                Total Sections: <span id="loc-sections-count-badge">0</span>
              </div>
            </div>

          </div>
        </div>

        <!-- ========================================================================= -->
        <!-- LOCATION CLUSTER TAB 4: SEO & SCHEMAS -->
        <!-- ========================================================================= -->
        <div id="tab-pane-loc_seo" class="space-y-4 hidden">
          <div class="card-dark p-4 space-y-4 bg-[#111827] border border-[#1F2937] rounded-xl shadow-lg">
            <div class="flex items-center justify-between border-b border-[#1F2937] pb-2">
              <h3 class="text-xs font-mono uppercase font-bold text-[#10B981] flex items-center gap-1.5">
                <i data-lucide="search" class="w-4 h-4 text-[#10B981]"></i>
                Location SEO, Canonical & Schema.org Configuration
              </h3>
              <span class="bg-[#10B981]/20 text-[#10B981] px-2 py-0.5 rounded text-[10px] font-mono font-bold">100% Schema Validated</span>
            </div>

            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">PRIMARY KEYWORD (Core Search Query) *</label>
              <input type="text" id="loc-primary-keyword-input" value="<?php echo htmlspecialchars($location_data['primaryKeyword'] ?? ''); ?>" placeholder="e.g. SEO Agency in Bhopal" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-[#00F0FF] font-bold focus:border-[#00A8B5] outline-none">
            </div>

            <div>
              <div class="flex justify-between items-center mb-1">
                <label class="text-[11px] font-mono text-[#9CA3AF] font-bold">META TITLE</label>
                <span class="text-[10px] font-mono text-[#9CA3AF]"><span id="loc-meta-title-length"><?php echo strlen($location_data['metaTitle'] ?? ''); ?></span> / 60 chars</span>
              </div>
              <input type="text" id="loc-meta-title-input" value="<?php echo htmlspecialchars($location_data['metaTitle'] ?? ''); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none font-medium" oninput="updateLocSeoPreview()">
            </div>

            <div>
              <div class="flex justify-between items-center mb-1">
                <label class="text-[11px] font-mono text-[#9CA3AF] font-bold">META DESCRIPTION</label>
                <span class="text-[10px] font-mono text-[#9CA3AF]"><span id="loc-meta-desc-length"><?php echo strlen($location_data['metaDescription'] ?? ''); ?></span> / 160 chars</span>
              </div>
              <textarea rows="3" id="loc-meta-desc-input" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none leading-relaxed" oninput="updateLocSeoPreview()"><?php echo htmlspecialchars($location_data['metaDescription'] ?? ''); ?></textarea>
            </div>

            <div class="grid grid-cols-2 gap-3">
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">SCHEMA TYPE</label>
                <select id="loc-schema-type-input" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none font-semibold">
                  <option value="ProfessionalService" <?php echo ($location_data['schemaType'] ?? '') === 'ProfessionalService' ? 'selected' : ''; ?>>ProfessionalService</option>
                  <option value="LocalBusiness" <?php echo ($location_data['schemaType'] ?? '') === 'LocalBusiness' ? 'selected' : ''; ?>>LocalBusiness</option>
                  <option value="Organization" <?php echo ($location_data['schemaType'] ?? '') === 'Organization' ? 'selected' : ''; ?>>Organization</option>
                </select>
              </div>
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">URL SLUG</label>
                <input type="text" id="loc-slug-input" value="<?php echo htmlspecialchars($location_data['slug'] ?? $active_location_slug); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-[#00F0FF] font-mono focus:border-[#00A8B5] outline-none">
              </div>
            </div>

            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">CONNECTED CLUSTER SPOKE SLUGS (Comma-separated)</label>
              <input type="text" id="loc-related-slugs-input" value="<?php echo htmlspecialchars(implode(', ', $location_data['relatedSlugs'] ?? [])); ?>" placeholder="local-seo-bhopal, google-business-profile-optimization-bhopal, ai-seo-bhopal" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-[#00A8B5] outline-none">
              <p class="text-[10px] text-[#9CA3AF] mt-1 font-mono">Powers the "Related Services in <?php echo ucfirst($location_city); ?>" hub-and-spoke recommendation grid.</p>
            </div>

            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">RECENT INSIGHTS TAGS (Comma-separated)</label>
              <input type="text" id="loc-insights-tags-input" value="<?php echo htmlspecialchars(implode(', ', $location_data['recentInsightsTags'] ?? [])); ?>" placeholder="local-seo, ai-search, technical-seo" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-[#00A8B5] outline-none">
            </div>

            <!-- SERP Preview -->
            <div class="bg-[#1F2937] p-4 rounded-xl border border-[#374151] space-y-2">
              <div class="text-[10px] font-mono text-[#9CA3AF] font-bold uppercase">Google SERP & AI Citation Preview</div>
              <div class="bg-white p-3.5 rounded-lg text-left shadow-sm space-y-1">
                <div class="text-[11px] text-[#202124] flex items-center gap-1 font-sans">
                  <span>https://digital4local.com</span> › <span class="text-[#5F6368]"><?php echo htmlspecialchars($active_location_slug); ?>/</span>
                </div>
                <div id="loc-serp-preview-title" class="text-sm font-semibold text-[#1A0DAB] hover:underline cursor-pointer">
                  <?php echo htmlspecialchars($location_data['metaTitle'] ?? $location_data['h1'] ?? 'Location Page Title'); ?>
                </div>
                <div id="loc-serp-preview-desc" class="text-xs text-[#4D5156] leading-snug">
                  <?php echo htmlspecialchars($location_data['metaDescription'] ?? 'Meta description snippet appears here.'); ?>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- ========================================================================= -->
        <!-- LOCATION CLUSTER TAB 5: AUTHOR & CTA CONVERSIONS -->
        <!-- ========================================================================= -->
        <div id="tab-pane-loc_author" class="space-y-4 hidden">
          <div class="card-dark p-4 space-y-4 bg-[#111827] border border-[#1F2937] rounded-xl shadow-lg">
            <h3 class="text-xs font-mono uppercase font-bold text-[#F59E0B] flex items-center gap-1.5 border-b border-[#1F2937] pb-2">
              <i data-lucide="target" class="w-4 h-4 text-[#F59E0B]"></i>
              Call to Action & Conversion Hooks
            </h3>

            <?php $cta = $location_data['cta'] ?? []; ?>
            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">CTA HEADLINE / LABEL</label>
              <input type="text" id="loc-cta-label-input" value="<?php echo htmlspecialchars($cta['label'] ?? ''); ?>" placeholder="e.g. Get a free SEO audit for your Bhopal business" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none font-bold">
            </div>

            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">CTA SUBLABEL / PROMISE</label>
              <textarea rows="2" id="loc-cta-sublabel-input" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none"><?php echo htmlspecialchars($cta['sublabel'] ?? ''); ?></textarea>
            </div>

            <div class="grid grid-cols-2 gap-3">
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">CTA BUTTON TEXT</label>
                <input type="text" id="loc-cta-btn-text-input" value="<?php echo htmlspecialchars($cta['buttonText'] ?? 'Get a free SEO audit'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none">
              </div>
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">WHATSAPP PRE-FILLED TEXT</label>
                <input type="text" id="loc-cta-wa-text-input" value="<?php echo htmlspecialchars($cta['whatsappText'] ?? ''); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none font-mono">
              </div>
            </div>

            <h3 class="text-xs font-mono uppercase font-bold text-[#10B981] flex items-center gap-1.5 border-t border-[#1F2937] pt-4">
              <i data-lucide="user-check" class="w-4 h-4 text-[#10B981]"></i>
              E-E-A-T Author Profile Box
            </h3>

            <?php $auth = $location_data['author'] ?? []; ?>
            <div class="grid grid-cols-2 gap-3">
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">AUTHOR NAME</label>
                <input type="text" id="loc-author-name-input" value="<?php echo htmlspecialchars($auth['name'] ?? 'Abhishek Raikwar'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none font-bold">
              </div>
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">AUTHOR ROLE</label>
                <input type="text" id="loc-author-role-input" value="<?php echo htmlspecialchars($auth['role'] ?? 'Founder, Digital4Local'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none">
              </div>
            </div>

            <div>
              <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">AUTHOR BIO</label>
              <textarea rows="3" id="loc-author-bio-input" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white focus:border-[#00A8B5] outline-none leading-relaxed"><?php echo htmlspecialchars($auth['bio'] ?? ''); ?></textarea>
            </div>

            <div class="grid grid-cols-2 gap-3">
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">PHOTO PATH</label>
                <input type="text" id="loc-author-photo-input" value="<?php echo htmlspecialchars($auth['photo'] ?? '/assets/images/abhishek-raikwar.jpg'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-[#00A8B5] outline-none">
              </div>
              <div>
                <label class="block text-[11px] font-mono text-[#9CA3AF] mb-1 font-bold">LINKEDIN PROFILE</label>
                <input type="text" id="loc-author-linkedin-input" value="<?php echo htmlspecialchars($auth['linkedin'] ?? 'https://www.linkedin.com/in/abhishek-raikwar-seo/'); ?>" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white font-mono focus:border-[#00A8B5] outline-none">
              </div>
            </div>

          </div>
        </div>

        <?php else: ?>

        <!-- ========================================== -->
        <!-- TAB 1: CKEDITOR 5 BODY CONTENT EDITOR -->
        <!-- ========================================== -->
        <div id="tab-pane-body" class="space-y-4">
          <div class="bg-[#111827] border border-[#1F2937] rounded-xl overflow-hidden shadow-lg space-y-0">
            
            <!-- CKEditor Container -->
            <div id="ckeditor-wrapper" class="p-0">
              <textarea id="ck-content-editor" name="<?php echo $is_blog_item ? 'active_blog_post[content_html]' : 'pages['.$active_key.'][content_html]'; ?>" class="hidden"><?php 
                $raw_body = $is_blog_item ? ($active_blog_post['content_html'] ?? '<h2>1. Article Introduction</h2><p>Start writing your dynamic article body content here...</p>') : ($page_cfg['content_html'] ?? '<h2>Dynamic Section Content</h2><p>Edit or paste your rich body content here...</p>');
                echo htmlspecialchars(d4l_resolve_content_images($raw_body, $base_path)); 
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

        <?php endif; ?>

        <!-- ========================================== -->
        <!-- TAB 4: DYNAMIC FAQS & ACCORDION BUILDER (SHARED BY ALL) -->
        <!-- ========================================== -->
        <div id="tab-pane-faqs" class="space-y-4 hidden">
          <div class="card-dark p-4 space-y-4 bg-[#111827] border border-[#1F2937] rounded-xl shadow-lg">
            <div class="flex items-center justify-between border-b border-[#1F2937] pb-3">
              <div>
                <h3 class="text-xs font-mono uppercase font-bold text-[#00F0FF] flex items-center gap-1.5">
                  <i data-lucide="help-circle" class="w-4 h-4 text-[#00F0FF]"></i>
                  <span>Frequently Asked Questions (Accordion Builder)</span>
                </h3>
                <p class="text-[11px] text-[#9CA3AF]">Manage interactive collapsible FAQs with automated Accordion & FAQPage Schema.</p>
              </div>
              <button type="button" onclick="addNewFaqItem()" class="px-3 py-1.5 bg-[#00A8B5] hover:bg-[#00F0FF] text-[#0F172A] font-bold rounded-lg text-xs flex items-center gap-1 shadow-md">
                <i data-lucide="plus-circle" class="w-3.5 h-3.5"></i> Add Question
              </button>
            </div>

            <!-- FAQs Container -->
            <div id="faq-items-list" class="space-y-3">
              <!-- Render existing FAQs -->
              <?php 
              $existing_faqs = [];
              if ($is_blog_item && isset($active_blog_post['faqs']) && is_array($active_blog_post['faqs'])) {
                  $existing_faqs = $active_blog_post['faqs'];
              } elseif ($is_location_item && isset($location_data['faqs']) && is_array($location_data['faqs'])) {
                  $existing_faqs = $location_data['faqs'];
              } elseif (isset($page_cfg['faqs']) && is_array($page_cfg['faqs'])) {
                  $existing_faqs = $page_cfg['faqs'];
              }
              ?>
            </div>

            <!-- Hidden JSON Field for form submission -->
            <input type="hidden" name="<?php echo $is_blog_item ? 'active_blog_post[faqs]' : ($is_location_item ? 'loc_faqs' : 'pages['.$active_key.'][faqs]'); ?>" id="faq-json-payload" value="<?php echo htmlspecialchars(json_encode($existing_faqs)); ?>">

            <!-- Live Accordion Interactive Preview -->
            <div class="pt-4 border-t border-[#1F2937] space-y-2">
              <div class="text-[10px] font-mono text-[#00F0FF] font-bold uppercase flex items-center justify-between">
                <span>Interactive Live Accordion Preview</span>
                <span class="text-[10px] text-[#9CA3AF]">Click question to test accordion toggle</span>
              </div>
              <div id="faq-accordion-preview-box" class="space-y-2 bg-[#0B0F19] p-3 rounded-xl border border-[#1F2937]">
                <!-- Populated dynamically via Javascript -->
              </div>
            </div>

          </div>
        </div>

        <?php if (!$is_location_item): ?>
        <!-- ========================================== -->
        <!-- TAB 5: SEO & AEO OPTIMIZATION SUITE (STANDARD & BLOGS) -->
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
        <?php endif; ?>

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
            <span class="text-[#6B7280] font-mono">page/</span>
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
            <span class="text-[#6B7280] font-mono">blog/</span>
            <input type="text" id="new-post-slug-input" placeholder="ai-search-optimization-blueprint-2026" class="bg-transparent border-none text-[#10B981] font-mono outline-none flex-1" onkeydown="if(event.key==='Enter') submitCreateBlogPost()">
          </div>
        </div>
      </div>

      <div class="flex justify-end gap-2 pt-3 border-t border-[#1F2937]">
        <button type="button" onclick="closeModal('add-blog-modal')" class="px-4 py-2 bg-[#1F2937] hover:bg-[#374151] text-[#9CA3AF] hover:text-white rounded-lg text-xs font-semibold transition-colors">Cancel</button>
        <button type="button" onclick="submitCreateBlogPost()" class="px-5 py-2 bg-gradient-to-r from-[#10B981] to-[#00A8B5] hover:from-[#059669] hover:to-[#00F0FF] text-[#0F172A] font-bold rounded-lg text-xs shadow-lg flex items-center gap-1.5 transition-all transform hover:-translate-y-0.5">
          <i data-lucide="sparkles" class="w-4 h-4"></i>
          <span>Create & Start Writing</span>
        </button>
      </div>
    </div>
  </div>

  <!-- ========================================================================= -->
  <!-- MODAL 3: ADD NEW LOCATION CLUSTER PAGE -->
  <!-- ========================================================================= -->
  <div id="add-location-modal" class="fixed inset-0 z-50 bg-[#0F172A]/80 backdrop-blur-sm flex items-center justify-center p-4 hidden">
    <div class="bg-[#111827] border border-[#1F2937] rounded-2xl max-w-md w-full p-6 space-y-4 shadow-2xl">
      <div class="flex items-center justify-between border-b border-[#1F2937] pb-3">
        <h3 class="font-bold text-white text-sm flex items-center gap-2">
          <i data-lucide="map-pin" class="w-4 h-4 text-[#00F0FF]"></i>
          Create Location Cluster Landing Page
        </h3>
        <button onclick="closeModal('add-location-modal')" class="text-[#9CA3AF] hover:text-white p-1">
          <i data-lucide="x" class="w-4 h-4"></i>
        </button>
      </div>
      
      <div class="space-y-3 text-xs">
        <div>
          <label class="block font-mono text-[#9CA3AF] mb-1 font-bold">PAGE TITLE / H1 *</label>
          <input type="text" id="new-loc-title-input" placeholder="e.g. E-Commerce SEO Agency in Bhopal" class="w-full bg-[#1F2937] border border-[#374151] focus:border-[#00F0FF] rounded-lg px-3 py-2 text-white outline-none font-bold" oninput="autoGenerateLocSlug(this.value)">
        </div>
        <div class="grid grid-cols-2 gap-2">
          <div>
            <label class="block font-mono text-[#9CA3AF] mb-1 font-bold">CITY / CLUSTER</label>
            <input type="text" id="new-loc-city-input" value="Bhopal" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-white outline-none">
          </div>
          <div>
            <label class="block font-mono text-[#9CA3AF] mb-1 font-bold">CLUSTER TYPE</label>
            <select id="new-loc-type-select" class="w-full bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2 text-white outline-none">
              <option value="spoke">Cluster Spoke Page</option>
              <option value="hub">Cluster Parent Hub</option>
            </select>
          </div>
        </div>
        <div>
          <label class="block font-mono text-[#9CA3AF] mb-1 font-bold">URL SLUG</label>
          <div class="flex items-center bg-[#1F2937] border border-[#374151] rounded-lg px-3 py-2">
            <span class="text-[#6B7280] font-mono">/</span>
            <input type="text" id="new-loc-slug-input" placeholder="e-commerce-seo-bhopal" class="bg-transparent border-none text-[#00F0FF] font-mono outline-none flex-1">
            <span class="text-[#6B7280] font-mono">/</span>
          </div>
        </div>
      </div>

      <div class="flex justify-end gap-2 pt-2 border-t border-[#1F2937]">
        <button type="button" onclick="closeModal('add-location-modal')" class="px-4 py-2 bg-[#1F2937] text-[#9CA3AF] hover:text-white rounded-lg text-xs">Cancel</button>
        <button type="button" onclick="submitCreateLocationPage()" class="px-5 py-2 bg-gradient-to-r from-[#00F0FF] to-[#00A8B5] text-[#0F172A] font-bold rounded-lg text-xs">Create Location Page</button>
      </div>
    </div>
  </div>

  <!-- Toast Notification Container -->
  <div id="toast-container" class="fixed bottom-6 right-6 z-50 space-y-2 pointer-events-none"></div>

  <!-- Scripts -->
  <script>
    window.CSRF_TOKEN = '<?php echo htmlspecialchars(get_csrf_token()); ?>';
    window.BASE_PATH = '<?php echo htmlspecialchars($base_path); ?>';
    if (typeof lucide !== 'undefined') lucide.createIcons();

    // 1. CKEditor 5 Initialization (Only for standard & blog pages)
    let editorInstance = null;
    let isSourceMode = false;

    if (document.querySelector('#ck-content-editor')) {
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
          
          updateWordStatsFromCk();

          editor.model.document.on('change:data', () => {
            updateWordStatsFromCk();
            const rawTextarea = document.getElementById('raw-html-textarea');
            if (rawTextarea) rawTextarea.value = editor.getData();
          });
        })
        .catch(error => {
          console.warn('CKEditor not mounted or running in location mode:', error);
        });
    }

    function updateWordStatsFromCk() {
      if (!editorInstance) return;
      const html = editorInstance.getData();
      const tmp = document.createElement('div');
      tmp.innerHTML = html;
      const text = tmp.textContent || tmp.innerText || '';
      const words = text.trim() ? text.trim().split(/\s+/).length : 0;
      const wEl = document.getElementById('word-count');
      const cEl = document.getElementById('char-count');
      if (wEl) wEl.textContent = words;
      if (cEl) cEl.textContent = text.length;
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
      document.querySelectorAll('.editor-tab-btn').forEach(b => {
        b.classList.remove('active');
        b.classList.add('text-[#9CA3AF]');
      });
      if (event && event.currentTarget) {
        event.currentTarget.classList.add('active');
        event.currentTarget.classList.remove('text-[#9CA3AF]');
      }

      const allPanes = [
        'tab-pane-loc_hero', 'tab-pane-loc_sections', 'tab-pane-loc_seo', 'tab-pane-loc_author',
        'tab-pane-body', 'tab-pane-hero', 'tab-pane-media', 'tab-pane-faqs', 'tab-pane-seo', 'tab-pane-features'
      ];
      allPanes.forEach(p => {
        const el = document.getElementById(p);
        if (el) el.classList.add('hidden');
      });

      const target = document.getElementById('tab-pane-' + tab);
      if (target) target.classList.remove('hidden');
      if (typeof lucide !== 'undefined') lucide.createIcons();
    }

    // 4. Dynamic FAQs & Accordion Management
    let faqsData = <?php echo json_encode($existing_faqs); ?>;
    if (!Array.isArray(faqsData)) faqsData = [];

    function renderFaqItems() {
      const container = document.getElementById('faq-items-list');
      const previewBox = document.getElementById('faq-accordion-preview-box');
      if (!container || !previewBox) return;

      container.innerHTML = '';
      previewBox.innerHTML = '';

      if (faqsData.length === 0) {
        container.innerHTML = '<div class="p-4 rounded-xl bg-[#1F2937]/50 border border-dashed border-[#374151] text-center text-xs text-[#9CA3AF]">No FAQ questions added yet. Click "+ Add Question" above to add interactive accordions.</div>';
        previewBox.innerHTML = '<div class="p-3 text-center text-xs text-[#6B7280]">Accordion preview will appear here when FAQs are added.</div>';
        const payloadInput = document.getElementById('faq-json-payload');
        if (payloadInput) payloadInput.value = JSON.stringify([]);
        return;
      }

      faqsData.forEach((faq, index) => {
        // Builder item
        const itemCard = document.createElement('div');
        itemCard.className = 'p-3.5 bg-[#1F2937] border border-[#374151] rounded-xl space-y-2.5 shadow-sm';
        itemCard.innerHTML = `
          <div class="flex items-center justify-between border-b border-[#374151]/60 pb-2">
            <span class="px-2 py-0.5 rounded bg-[#00A8B5]/20 text-[#00F0FF] text-[10px] font-mono font-bold">FAQ Accordion Item #${index + 1}</span>
            <div class="flex items-center gap-1">
              ${index > 0 ? `<button type="button" onclick="moveFaq(${index}, -1)" class="p-1 hover:bg-[#374151] text-[#9CA3AF] hover:text-white rounded transition-colors" title="Move Up"><i data-lucide="arrow-up" class="w-3.5 h-3.5"></i></button>` : ''}
              ${index < faqsData.length - 1 ? `<button type="button" onclick="moveFaq(${index}, 1)" class="p-1 hover:bg-[#374151] text-[#9CA3AF] hover:text-white rounded transition-colors" title="Move Down"><i data-lucide="arrow-down" class="w-3.5 h-3.5"></i></button>` : ''}
              <button type="button" onclick="removeFaq(${index})" class="p-1 text-[#EF4444] hover:bg-[#EF4444]/20 rounded transition-colors" title="Delete Question"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
            </div>
          </div>
          <div>
            <label class="block text-[10px] font-mono text-[#9CA3AF] mb-1 font-bold">QUESTION (ACCORDION HEADER)</label>
            <input type="text" class="w-full bg-[#111827] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white outline-none focus:border-[#00A8B5] font-semibold transition-colors" value="${escapeHtml(faq.q || '')}" oninput="updateFaqQuestion(${index}, this.value)" placeholder="e.g. How does local SEO help my business?">
          </div>
          <div>
            <label class="block text-[10px] font-mono text-[#9CA3AF] mb-1 font-bold">ANSWER (ACCORDION COLLAPSED CONTENT)</label>
            <textarea rows="3" class="w-full bg-[#111827] border border-[#374151] rounded-lg px-3 py-2 text-xs text-[#CBD5E1] outline-none focus:border-[#00A8B5] transition-colors leading-relaxed" oninput="updateFaqAnswer(${index}, this.value)" placeholder="Enter comprehensive answer text...">${escapeHtml(faq.a || '')}</textarea>
          </div>
        `;
        container.appendChild(itemCard);

        // Preview Accordion item
        const previewItem = document.createElement('div');
        previewItem.className = 'border border-[#374151] rounded-xl overflow-hidden bg-[#111827] text-xs transition-all hover:border-[#00A8B5]/50';
        previewItem.innerHTML = `
          <button type="button" class="w-full p-3.5 text-left font-bold text-white flex items-center justify-between gap-3 hover:bg-[#1F2937] transition-colors" onclick="toggleCmsFaqPreview(this)">
            <span class="text-xs sm:text-sm font-semibold">${escapeHtml(faq.q || 'Untitled Question')}</span>
            <span class="preview-icon text-sm font-mono text-[#00F0FF] shrink-0 font-bold px-2 py-0.5 rounded bg-[#00F0FF]/10 transition-transform">+</span>
          </button>
          <div class="preview-ans p-3.5 pt-0 text-xs text-[#9CA3AF] hidden border-t border-[#1F2937] leading-relaxed bg-[#050811]/60">
            ${escapeHtml(faq.a || 'No answer provided yet.').replace(/\n/g, '<br>')}
          </div>
        `;
        previewBox.appendChild(previewItem);
      });

      const payloadInput = document.getElementById('faq-json-payload');
      if (payloadInput) payloadInput.value = JSON.stringify(faqsData);
      if (typeof lucide !== 'undefined') lucide.createIcons();
    }

    function toggleCmsFaqPreview(btn) {
      const ans = btn.nextElementSibling;
      const icon = btn.querySelector('.preview-icon');
      const isClosed = ans.classList.contains('hidden');
      
      document.querySelectorAll('#faq-accordion-preview-box .preview-ans').forEach(a => a.classList.add('hidden'));
      document.querySelectorAll('#faq-accordion-preview-box .preview-icon').forEach(i => { i.textContent = '+'; });
      
      if (isClosed) {
        ans.classList.remove('hidden');
        icon.textContent = '−';
      }
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
        const p = document.getElementById('faq-json-payload');
        if (p) p.value = JSON.stringify(faqsData);
      }
    }

    function updateFaqAnswer(index, val) {
      if (faqsData[index]) {
        faqsData[index].a = val;
        const p = document.getElementById('faq-json-payload');
        if (p) p.value = JSON.stringify(faqsData);
      }
    }

    // Initial render
    renderFaqItems();

    window.CSRF_TOKEN = <?php echo json_encode(get_csrf_token()); ?>;

    // =========================================================================
    // 5. LOCATION CLUSTER DYNAMIC SECTIONS VISUAL BUILDER ENGINE
    // =========================================================================
    let locationSectionsData = <?php echo json_encode($location_data['sections'] ?? []); ?>;
    if (!Array.isArray(locationSectionsData)) locationSectionsData = [];
    let locSectionsMode = 'visual';

    function setLocSectionsMode(mode) {
      locSectionsMode = mode;
      const visualContainer = document.getElementById('loc-sections-visual-container');
      const codeContainer = document.getElementById('loc-sections-code-container');
      const visualBtn = document.getElementById('loc-sec-mode-btn-visual');
      const codeBtn = document.getElementById('loc-sec-mode-btn-code');

      if (mode === 'visual') {
        // Sync from JSON textarea back to data array before showing visual
        const jsonText = document.getElementById('loc-sections-json')?.value || '[]';
        try {
          const parsed = JSON.parse(jsonText);
          if (Array.isArray(parsed)) {
            locationSectionsData = parsed;
          }
        } catch (e) {}
        
        renderLocationSectionsVisualBuilder();

        visualContainer?.classList.remove('hidden');
        codeContainer?.classList.add('hidden');

        visualBtn?.classList.add('bg-[#00A8B5]', 'text-[#0F172A]');
        visualBtn?.classList.remove('text-[#9CA3AF]');
        codeBtn?.classList.remove('bg-[#00A8B5]', 'text-[#0F172A]');
        codeBtn?.classList.add('text-[#9CA3AF]');
      } else {
        // Sync from data array to JSON textarea
        const textarea = document.getElementById('loc-sections-json');
        if (textarea) {
          textarea.value = JSON.stringify(locationSectionsData, null, 2);
          liveValidateSectionsJson(textarea.value);
        }

        visualContainer?.classList.add('hidden');
        codeContainer?.classList.remove('hidden');

        codeBtn?.classList.add('bg-[#00A8B5]', 'text-[#0F172A]');
        codeBtn?.classList.remove('text-[#9CA3AF]');
        visualBtn?.classList.remove('bg-[#00A8B5]', 'text-[#0F172A]');
        visualBtn?.classList.add('text-[#9CA3AF]');
      }
    }

    function toggleAddSectionDropdown() {
      const menu = document.getElementById('add-section-menu');
      if (menu) menu.classList.toggle('hidden');
    }

    // Close dropdown on outside click
    document.addEventListener('click', function(e) {
      const btn = document.getElementById('btn-add-section-dropdown');
      const menu = document.getElementById('add-section-menu');
      if (menu && btn && !btn.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add('hidden');
      }
    });

    function syncLocationSectionsToJson() {
      const textarea = document.getElementById('loc-sections-json');
      if (textarea) {
        textarea.value = JSON.stringify(locationSectionsData, null, 2);
        liveValidateSectionsJson(textarea.value);
      }
      const countBadge = document.getElementById('loc-sections-count-badge');
      if (countBadge) countBadge.textContent = locationSectionsData.length;
    }

    function renderLocationSectionsVisualBuilder() {
      const container = document.getElementById('loc-sections-cards-list');
      if (!container) return;
      container.innerHTML = '';

      const countBadge = document.getElementById('loc-sections-count-badge');
      if (countBadge) countBadge.textContent = locationSectionsData.length;

      if (locationSectionsData.length === 0) {
        container.innerHTML = `
          <div class="p-8 text-center rounded-2xl bg-[#0B0F19] border-2 border-dashed border-[#1F2937] space-y-3">
            <div class="w-12 h-12 rounded-2xl bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center mx-auto">
              <i data-lucide="layout-grid" class="w-6 h-6"></i>
            </div>
            <div class="font-bold text-white text-sm">No dynamic sections added yet</div>
            <p class="text-xs text-[#9CA3AF] max-w-md mx-auto">Click "+ Add Section" above to insert Timelines, Comparison Tables, Honest Promises, Localities Grids or Content Blocks.</p>
          </div>
        `;
        if (typeof lucide !== 'undefined') lucide.createIcons();
        syncLocationSectionsToJson();
        return;
      }

      locationSectionsData.forEach((sec, idx) => {
        const type = sec.type || 'content_block';
        let badgeColor = 'bg-blue-500/20 text-blue-300 border-blue-500/40';
        let typeName = 'Standard Content Block';
        if (type === 'timeline') {
          badgeColor = 'bg-amber-500/20 text-amber-300 border-amber-500/40';
          typeName = '90-Day Sprint Timeline';
        } else if (type === 'comparison_table') {
          badgeColor = 'bg-cyan-500/20 text-cyan-300 border-cyan-500/40';
          typeName = 'Comparison Matrix Table';
        } else if (type === 'honest_promises') {
          badgeColor = 'bg-rose-500/20 text-rose-300 border-rose-500/40';
          typeName = 'Honest Promises (Do / Don\'t)';
        } else if (type === 'locality_grid') {
          badgeColor = 'bg-emerald-500/20 text-emerald-300 border-emerald-500/40';
          typeName = 'Localities & Neighborhoods Grid';
        } else if (type === 'pricing_table') {
          badgeColor = 'bg-purple-500/20 text-purple-300 border-purple-500/40';
          typeName = 'Transparent Pricing Tiers';
        }

        const card = document.createElement('div');
        card.className = 'bg-[#0F172A] border border-[#1F2937] hover:border-[#374151] rounded-2xl p-4 sm:p-5 space-y-4 shadow-md transition-all';
        
        // Header
        let html = `
          <div class="flex items-center justify-between border-b border-[#1F2937] pb-3">
            <div class="flex items-center gap-2.5 truncate">
              <span class="w-6 h-6 rounded-lg bg-[#1F2937] text-white flex items-center justify-center font-mono font-bold text-xs shrink-0">
                #${idx + 1}
              </span>
              <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-bold border ${badgeColor} shrink-0">
                ${typeName}
              </span>
              <span class="text-xs font-bold text-white truncate max-w-[200px] sm:max-w-[300px]">
                ${escapeHtml(sec.title || sec.tag || 'Untitled Section')}
              </span>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-1 shrink-0">
              ${idx > 0 ? `<button type="button" onclick="moveLocationSection(${idx}, -1)" class="p-1.5 hover:bg-[#1F2937] text-[#9CA3AF] hover:text-white rounded-lg transition-colors" title="Move Section Up"><i data-lucide="arrow-up" class="w-3.5 h-3.5"></i></button>` : ''}
              ${idx < locationSectionsData.length - 1 ? `<button type="button" onclick="moveLocationSection(${idx}, 1)" class="p-1.5 hover:bg-[#1F2937] text-[#9CA3AF] hover:text-white rounded-lg transition-colors" title="Move Section Down"><i data-lucide="arrow-down" class="w-3.5 h-3.5"></i></button>` : ''}
              <button type="button" onclick="duplicateLocationSection(${idx})" class="p-1.5 hover:bg-[#1F2937] text-[#00F0FF] rounded-lg transition-colors" title="Duplicate Section"><i data-lucide="copy" class="w-3.5 h-3.5"></i></button>
              <button type="button" onclick="removeLocationSection(${idx})" class="p-1.5 text-[#EF4444] hover:bg-[#EF4444]/20 rounded-lg transition-colors" title="Delete Section"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
            </div>
          </div>
        `;

        // Section Core Controls
        html += `
          <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <div>
              <label class="block text-[10px] font-mono text-[#9CA3AF] mb-1 font-bold">SECTION TYPE</label>
              <select class="w-full bg-[#111827] border border-[#374151] rounded-lg px-2.5 py-1.5 text-xs text-white outline-none focus:border-[#00A8B5]" onchange="changeSectionType(${idx}, this.value)">
                <option value="content_block" ${type === 'content_block' ? 'selected' : ''}>Standard Content Block</option>
                <option value="timeline" ${type === 'timeline' ? 'selected' : ''}>90-Day Sprint Timeline</option>
                <option value="comparison_table" ${type === 'comparison_table' ? 'selected' : ''}>Comparison Matrix Table</option>
                <option value="honest_promises" ${type === 'honest_promises' ? 'selected' : ''}>Honest Promises (Do / Don't)</option>
                <option value="locality_grid" ${type === 'locality_grid' ? 'selected' : ''}>Localities Grid</option>
                <option value="pricing_table" ${type === 'pricing_table' ? 'selected' : ''}>Transparent Pricing Tiers</option>
              </select>
            </div>
            <div>
              <label class="block text-[10px] font-mono text-[#9CA3AF] mb-1 font-bold">SECTION HTML ID</label>
              <input type="text" class="w-full bg-[#111827] border border-[#374151] rounded-lg px-2.5 py-1.5 text-xs text-[#00F0FF] font-mono outline-none focus:border-[#00A8B5]" value="${escapeHtml(sec.id || '')}" oninput="updateSectionField(${idx}, 'id', this.value)" placeholder="e.g. why-choose">
            </div>
            <div>
              <label class="block text-[10px] font-mono text-[#9CA3AF] mb-1 font-bold">TAG / TOP BADGE</label>
              <input type="text" class="w-full bg-[#111827] border border-[#374151] rounded-lg px-2.5 py-1.5 text-xs text-amber-300 font-mono outline-none focus:border-[#00A8B5]" value="${escapeHtml(sec.tag || '')}" oninput="updateSectionField(${idx}, 'tag', this.value)" placeholder="e.g. 90-DAY ROADMAP">
            </div>
          </div>

          <div>
            <label class="block text-[10px] font-mono text-[#9CA3AF] mb-1 font-bold">SECTION TITLE (H2/H3 HEADLINE) *</label>
            <input type="text" class="w-full bg-[#111827] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white font-bold outline-none focus:border-[#00A8B5]" value="${escapeHtml(sec.title || '')}" oninput="updateSectionField(${idx}, 'title', this.value)" placeholder="e.g. Why Bhopal Businesses Choose Us">
          </div>

          <div>
            <label class="block text-[10px] font-mono text-[#9CA3AF] mb-1 font-bold">SUBTITLE / OVERVIEW TEXT</label>
            <textarea rows="2" class="w-full bg-[#111827] border border-[#374151] rounded-lg px-3 py-2 text-xs text-[#CBD5E1] outline-none focus:border-[#00A8B5] leading-relaxed" oninput="updateSectionField(${idx}, 'subtitle', this.value)" placeholder="Section overview and contextual explanation...">${escapeHtml(sec.subtitle || '')}</textarea>
          </div>
        `;

        // Body Paragraphs (For standard content blocks or intro text)
        if (type === 'content_block' || (sec.paragraphs && sec.paragraphs.length > 0)) {
          const paraText = Array.isArray(sec.paragraphs) ? sec.paragraphs.join('\n\n') : (sec.paragraphs || '');
          html += `
            <div>
              <div class="flex items-center justify-between mb-1">
                <label class="text-[10px] font-mono text-[#9CA3AF] font-bold">BODY PARAGRAPHS (Separate multiple paragraphs with blank lines)</label>
                <span class="text-[10px] text-[#00F0FF] font-mono">Supports [[VERIFY:...]]</span>
              </div>
              <textarea rows="4" class="w-full bg-[#111827] border border-[#374151] rounded-lg px-3 py-2 text-xs text-white outline-none focus:border-[#00A8B5] leading-relaxed" oninput="updateSectionParagraphs(${idx}, this.value)" placeholder="Enter paragraph copy here...">${escapeHtml(paraText)}</textarea>
            </div>
          `;
        }

        // Highlights List (Bullet Chips)
        if (sec.highlights && Array.isArray(sec.highlights)) {
          html += `
            <div class="space-y-2 pt-1 border-t border-[#1F2937]">
              <div class="flex items-center justify-between">
                <label class="text-[10px] font-mono text-[#00A8B5] font-bold uppercase">Key Highlights / Features List (${sec.highlights.length}):</label>
                <button type="button" onclick="addSectionHighlight(${idx})" class="text-[10px] text-[#00F0FF] hover:underline font-mono font-bold">+ Add Item</button>
              </div>
              <div class="space-y-1.5">
                ${sec.highlights.map((hl, hIdx) => `
                  <div class="flex items-center gap-2">
                    <input type="text" class="flex-1 bg-[#111827] border border-[#374151] rounded-lg px-2.5 py-1 text-xs text-[#E2E8F0] outline-none focus:border-[#00A8B5]" value="${escapeHtml(hl)}" oninput="updateSectionHighlight(${idx}, ${hIdx}, this.value)" placeholder="Bullet point item...">
                    <button type="button" onclick="removeSectionHighlight(${idx}, ${hIdx})" class="p-1 text-[#EF4444] hover:bg-[#EF4444]/20 rounded"><i data-lucide="x" class="w-3.5 h-3.5"></i></button>
                  </div>
                `).join('')}
              </div>
            </div>
          `;
        } else if (type === 'content_block') {
          html += `
            <div class="pt-1">
              <button type="button" onclick="initSectionHighlights(${idx})" class="text-[11px] text-[#00A8B5] hover:underline font-mono font-bold">+ Add Highlights / Bullet Points List</button>
            </div>
          `;
        }

        // ==========================================
        // TYPE-SPECIFIC EDITORS
        // ==========================================

        // 1. TIMELINE PHASES
        if (type === 'timeline') {
          const phases = sec.phases || [];
          html += `
            <div class="space-y-3 pt-3 border-t border-[#1F2937]">
              <div class="flex items-center justify-between">
                <label class="text-[11px] font-mono text-amber-400 font-bold uppercase flex items-center gap-1.5">
                  <i data-lucide="clock" class="w-3.5 h-3.5"></i> Timeline Sprint Phases (${phases.length}):
                </label>
                <button type="button" onclick="addTimelinePhase(${idx})" class="px-2 py-0.5 bg-amber-500/20 text-amber-300 hover:bg-amber-500/30 rounded text-xs font-mono font-bold border border-amber-500/30">
                  + Add Phase
                </button>
              </div>
              <div class="space-y-3">
                ${phases.map((ph, pIdx) => `
                  <div class="p-3 bg-[#111827] border border-[#374151] rounded-xl space-y-2">
                    <div class="flex items-center justify-between border-b border-[#374151]/60 pb-1.5">
                      <span class="text-[10px] font-mono font-bold text-amber-300">Phase #${pIdx + 1}</span>
                      <button type="button" onclick="removeTimelinePhase(${idx}, ${pIdx})" class="p-1 text-[#EF4444] hover:bg-[#EF4444]/20 rounded"><i data-lucide="trash-2" class="w-3 h-3"></i></button>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                      <div>
                        <label class="block text-[9px] font-mono text-[#9CA3AF]">PHASE LABEL</label>
                        <input type="text" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-2 py-1 text-xs text-white" value="${escapeHtml(ph.phase || '')}" oninput="updateTimelinePhaseField(${idx}, ${pIdx}, 'phase', this.value)" placeholder="e.g. Phase 1">
                      </div>
                      <div>
                        <label class="block text-[9px] font-mono text-[#9CA3AF]">TIMEFRAME</label>
                        <input type="text" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-2 py-1 text-xs text-amber-300 font-mono" value="${escapeHtml(ph.weeks || '')}" oninput="updateTimelinePhaseField(${idx}, ${pIdx}, 'weeks', this.value)" placeholder="e.g. Weeks 1–2">
                      </div>
                    </div>
                    <div>
                      <label class="block text-[9px] font-mono text-[#9CA3AF]">PHASE TITLE</label>
                      <input type="text" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-2 py-1 text-xs text-white font-bold" value="${escapeHtml(ph.title || '')}" oninput="updateTimelinePhaseField(${idx}, ${pIdx}, 'title', this.value)" placeholder="e.g. Technical Foundation & Entity Audit">
                    </div>
                    <div>
                      <label class="block text-[9px] font-mono text-[#9CA3AF]">DESCRIPTION</label>
                      <textarea rows="2" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-2 py-1 text-xs text-[#CBD5E1]" oninput="updateTimelinePhaseField(${idx}, ${pIdx}, 'description', this.value)">${escapeHtml(ph.description || '')}</textarea>
                    </div>
                    <div>
                      <label class="block text-[9px] font-mono text-[#9CA3AF]">KEY DELIVERABLE</label>
                      <input type="text" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-2 py-1 text-xs text-[#00F0FF] font-mono" value="${escapeHtml(ph.deliverable || '')}" oninput="updateTimelinePhaseField(${idx}, ${pIdx}, 'deliverable', this.value)" placeholder="e.g. 25-Point Fix Checklist + Live GBP Verification">
                    </div>
                  </div>
                `).join('')}
              </div>
            </div>
          `;
        }

        // 2. COMPARISON TABLE
        if (type === 'comparison_table') {
          const rows = sec.rows || [];
          html += `
            <div class="space-y-3 pt-3 border-t border-[#1F2937]">
              <div class="flex items-center justify-between">
                <label class="text-[11px] font-mono text-cyan-400 font-bold uppercase flex items-center gap-1.5">
                  <i data-lucide="table" class="w-3.5 h-3.5"></i> Comparison Rows Matrix (${rows.length}):
                </label>
                <button type="button" onclick="addComparisonRow(${idx})" class="px-2 py-0.5 bg-cyan-500/20 text-cyan-300 hover:bg-cyan-500/30 rounded text-xs font-mono font-bold border border-cyan-500/30">
                  + Add Row
                </button>
              </div>
              <div class="space-y-2">
                ${rows.map((rw, rIdx) => `
                  <div class="p-3 bg-[#111827] border border-[#374151] rounded-xl space-y-2">
                    <div class="flex items-center justify-between border-b border-[#374151]/60 pb-1">
                      <input type="text" class="w-1/2 bg-[#0B0F19] border border-[#374151] rounded px-2 py-1 text-xs text-white font-bold" value="${escapeHtml(rw.feature || '')}" oninput="updateComparisonRowField(${idx}, ${rIdx}, 'feature', this.value)" placeholder="Feature / Metric Name">
                      <button type="button" onclick="removeComparisonRow(${idx}, ${rIdx})" class="p-1 text-[#EF4444] hover:bg-[#EF4444]/20 rounded"><i data-lucide="trash-2" class="w-3 h-3"></i></button>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                      <div>
                        <label class="block text-[9px] font-mono text-[#00F0FF] font-bold">DIGITAL4LOCAL VALUE</label>
                        <textarea rows="2" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-2 py-1 text-xs text-emerald-300" oninput="updateComparisonRowField(${idx}, ${rIdx}, 'd4l', this.value)">${escapeHtml(rw.d4l || '')}</textarea>
                      </div>
                      <div>
                        <label class="block text-[9px] font-mono text-rose-400 font-bold">TRADITIONAL AGENCIES</label>
                        <textarea rows="2" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-2 py-1 text-xs text-slate-400" oninput="updateComparisonRowField(${idx}, ${rIdx}, 'competitor', this.value)">${escapeHtml(rw.competitor || '')}</textarea>
                      </div>
                    </div>
                  </div>
                `).join('')}
              </div>
            </div>
          `;
        }

        // 3. HONEST PROMISES
        if (type === 'honest_promises') {
          const doList = sec.whatWeDo || [];
          const dontList = sec.whatWeNeverDo || [];
          html += `
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-3 border-t border-[#1F2937]">
              <!-- What We Do -->
              <div class="p-3 bg-[#111827] border border-emerald-500/30 rounded-xl space-y-2">
                <div class="flex items-center justify-between border-b border-emerald-500/20 pb-1.5">
                  <span class="text-[10px] font-mono text-emerald-400 font-bold">✓ WHAT WE DO (${doList.length})</span>
                  <button type="button" onclick="addPromiseItem(${idx}, 'whatWeDo')" class="text-[10px] text-emerald-400 hover:underline font-mono font-bold">+ Add</button>
                </div>
                <div class="space-y-1.5">
                  ${doList.map((item, pIdx) => `
                    <div class="flex items-center gap-1.5">
                      <input type="text" class="flex-1 bg-[#0B0F19] border border-[#374151] rounded px-2 py-1 text-xs text-emerald-300" value="${escapeHtml(item)}" oninput="updatePromiseItem(${idx}, 'whatWeDo', ${pIdx}, this.value)">
                      <button type="button" onclick="removePromiseItem(${idx}, 'whatWeDo', ${pIdx})" class="p-1 text-[#EF4444] hover:bg-[#EF4444]/20 rounded"><i data-lucide="x" class="w-3 h-3"></i></button>
                    </div>
                  `).join('')}
                </div>
              </div>

              <!-- What We Never Do -->
              <div class="p-3 bg-[#111827] border border-rose-500/30 rounded-xl space-y-2">
                <div class="flex items-center justify-between border-b border-rose-500/20 pb-1.5">
                  <span class="text-[10px] font-mono text-rose-400 font-bold">✕ WHAT WE NEVER DO (${dontList.length})</span>
                  <button type="button" onclick="addPromiseItem(${idx}, 'whatWeNeverDo')" class="text-[10px] text-rose-400 hover:underline font-mono font-bold">+ Add</button>
                </div>
                <div class="space-y-1.5">
                  ${dontList.map((item, pIdx) => `
                    <div class="flex items-center gap-1.5">
                      <input type="text" class="flex-1 bg-[#0B0F19] border border-[#374151] rounded px-2 py-1 text-xs text-rose-300" value="${escapeHtml(item)}" oninput="updatePromiseItem(${idx}, 'whatWeNeverDo', ${pIdx}, this.value)">
                      <button type="button" onclick="removePromiseItem(${idx}, 'whatWeNeverDo', ${pIdx})" class="p-1 text-[#EF4444] hover:bg-[#EF4444]/20 rounded"><i data-lucide="x" class="w-3 h-3"></i></button>
                    </div>
                  `).join('')}
                </div>
              </div>
            </div>
          `;
        }

        // 4. LOCALITY GRID
        if (type === 'locality_grid') {
          const locs = sec.localities || [];
          html += `
            <div class="space-y-3 pt-3 border-t border-[#1F2937]">
              <div class="flex items-center justify-between">
                <label class="text-[11px] font-mono text-emerald-400 font-bold uppercase flex items-center gap-1.5">
                  <i data-lucide="map-pin" class="w-3.5 h-3.5"></i> City Neighborhoods & Localities (${locs.length}):
                </label>
                <button type="button" onclick="addLocalityCard(${idx})" class="px-2 py-0.5 bg-emerald-500/20 text-emerald-300 hover:bg-emerald-500/30 rounded text-xs font-mono font-bold border border-emerald-500/30">
                  + Add Neighborhood
                </button>
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                ${locs.map((loc, lIdx) => `
                  <div class="p-2.5 bg-[#111827] border border-[#374151] rounded-xl flex items-center justify-between gap-2">
                    <div class="flex-1 space-y-1">
                      <input type="text" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-2 py-0.5 text-xs text-white font-bold" value="${escapeHtml(loc.name || '')}" oninput="updateLocalityCardField(${idx}, ${lIdx}, 'name', this.value)" placeholder="Locality Name (e.g. MP Nagar)">
                      <div class="grid grid-cols-2 gap-1.5">
                        <input type="text" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-1.5 py-0.5 text-[11px] text-[#9CA3AF]" value="${escapeHtml(loc.tag || '')}" oninput="updateLocalityCardField(${idx}, ${lIdx}, 'tag', this.value)" placeholder="Commercial / Hub">
                        <input type="text" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-1.5 py-0.5 text-[11px] text-[#00F0FF] font-mono" value="${escapeHtml(loc.pincode || '')}" oninput="updateLocalityCardField(${idx}, ${lIdx}, 'pincode', this.value)" placeholder="PIN: 462011">
                      </div>
                    </div>
                    <button type="button" onclick="removeLocalityCard(${idx}, ${lIdx})" class="p-1 text-[#EF4444] hover:bg-[#EF4444]/20 rounded shrink-0"><i data-lucide="trash-2" class="w-3.5 h-3.5"></i></button>
                  </div>
                `).join('')}
              </div>
            </div>
          `;
        }

        // 5. PRICING TABLE
        if (type === 'pricing_table') {
          const plans = sec.plans || [];
          html += `
            <div class="space-y-3 pt-3 border-t border-[#1F2937]">
              <div class="flex items-center justify-between">
                <label class="text-[11px] font-mono text-purple-400 font-bold uppercase flex items-center gap-1.5">
                  <i data-lucide="tag" class="w-3.5 h-3.5"></i> Pricing Tiers & Retainers (${plans.length}):
                </label>
                <button type="button" onclick="addPricingPlan(${idx})" class="px-2 py-0.5 bg-purple-500/20 text-purple-300 hover:bg-purple-500/30 rounded text-xs font-mono font-bold border border-purple-500/30">
                  + Add Plan
                </button>
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                ${plans.map((pl, plIdx) => `
                  <div class="p-3 bg-[#111827] border border-[#374151] rounded-xl space-y-2">
                    <div class="flex items-center justify-between border-b border-[#374151]/60 pb-1">
                      <input type="text" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-2 py-1 text-xs text-white font-bold" value="${escapeHtml(pl.name || '')}" oninput="updatePricingPlanField(${idx}, ${plIdx}, 'name', this.value)" placeholder="Plan Name">
                      <button type="button" onclick="removePricingPlan(${idx}, ${plIdx})" class="p-1 text-[#EF4444] hover:bg-[#EF4444]/20 rounded ml-1"><i data-lucide="trash-2" class="w-3 h-3"></i></button>
                    </div>
                    <div class="grid grid-cols-2 gap-1.5">
                      <input type="text" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-1.5 py-1 text-[11px] text-purple-300 font-mono" value="${escapeHtml(pl.tag || '')}" oninput="updatePricingPlanField(${idx}, ${plIdx}, 'tag', this.value)" placeholder="Badge">
                      <input type="text" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-1.5 py-1 text-[11px] text-emerald-400 font-bold font-mono" value="${escapeHtml(pl.price || '')}" oninput="updatePricingPlanField(${idx}, ${plIdx}, 'price', this.value)" placeholder="₹9,999">
                    </div>
                    <div>
                      <label class="block text-[9px] font-mono text-[#9CA3AF]">FOCUS / IDEAL FOR</label>
                      <input type="text" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-1.5 py-1 text-[11px] text-slate-300" value="${escapeHtml(pl.focus || '')}" oninput="updatePricingPlanField(${idx}, ${plIdx}, 'focus', this.value)">
                    </div>
                    <div>
                      <label class="block text-[9px] font-mono text-[#9CA3AF]">FEATURES (1 per line)</label>
                      <textarea rows="3" class="w-full bg-[#0B0F19] border border-[#374151] rounded px-1.5 py-1 text-[11px] text-white font-mono" oninput="updatePricingPlanFeatures(${idx}, ${plIdx}, this.value)">${escapeHtml(Array.isArray(pl.features) ? pl.features.join('\n') : (pl.features || ''))}</textarea>
                    </div>
                  </div>
                `).join('')}
              </div>
            </div>
          `;
        }

        card.innerHTML = html;
        container.appendChild(card);
      });

      if (typeof lucide !== 'undefined') lucide.createIcons();
      syncLocationSectionsToJson();
    }

    // Helper mutating functions for Location Sections
    function updateSectionField(idx, field, val) {
      if (locationSectionsData[idx]) {
        locationSectionsData[idx][field] = val;
        syncLocationSectionsToJson();
      }
    }

    function updateSectionParagraphs(idx, val) {
      if (locationSectionsData[idx]) {
        const paras = val.split('\n\n').map(p => p.trim()).filter(Boolean);
        locationSectionsData[idx].paragraphs = paras.length > 0 ? paras : [val];
        syncLocationSectionsToJson();
      }
    }

    function changeSectionType(idx, newType) {
      if (!locationSectionsData[idx]) return;
      locationSectionsData[idx].type = newType;
      
      // Initialize defaults if newly converted
      if (newType === 'timeline' && !locationSectionsData[idx].phases) {
        locationSectionsData[idx].phases = [
          { phase: 'Phase 1', weeks: 'Weeks 1–2', title: 'Audit & Setup', description: 'Technical analysis and entity audit.', deliverable: '25-Point Fix Checklist' },
          { phase: 'Phase 2', weeks: 'Weeks 3–6', title: 'Local Citations & Optimization', description: 'Complete GBP and map radius scaling.', deliverable: 'Verified Citations' }
        ];
      } else if (newType === 'comparison_table' && !locationSectionsData[idx].rows) {
        locationSectionsData[idx].rows = [
          { feature: 'Search Engine Coverage', d4l: 'Google Maps + ChatGPT + Gemini + Perplexity', competitor: 'Basic Google Web SEO only' },
          { feature: 'Reporting Cadence', d4l: 'Real-time 5x5 Geo-Grid tracking dashboard', competitor: 'Monthly static PDF screenshots' }
        ];
      } else if (newType === 'honest_promises' && !locationSectionsData[idx].whatWeDo) {
        locationSectionsData[idx].whatWeDo = ['Audit real rankings before quoting', 'Provide verified local case studies', 'Build genuine local citations'];
        locationSectionsData[idx].whatWeNeverDo = ['Promise #1 rankings in 7 days', 'Use automated spam backlink bots', 'Lock you into opaque contracts'];
      } else if (newType === 'locality_grid' && !locationSectionsData[idx].localities) {
        locationSectionsData[idx].localities = [
          { name: 'MP Nagar', tag: 'Commercial Hub', pincode: '462011' },
          { name: 'Arera Colony', tag: 'Affluent / Healthcare', pincode: '462016' },
          { name: 'Kolar Road', tag: 'Residential & Retail', pincode: '462042' },
          { name: 'Hoshangabad Road', tag: 'Industrial & Auto', pincode: '462026' }
        ];
      } else if (newType === 'pricing_table' && !locationSectionsData[idx].plans) {
        locationSectionsData[idx].plans = [
          { name: 'Local Foundation', tag: 'STARTER', price: '₹9,999', period: '/ month', focus: 'Single location', features: ['Google Map 3-Pack Optimization', '10 Geo Citations', '5x5 Grid Tracking'] }
        ];
      }

      renderLocationSectionsVisualBuilder();
    }

    function initSectionHighlights(idx) {
      if (locationSectionsData[idx]) {
        locationSectionsData[idx].highlights = ['Key takeaway point #1', 'Key takeaway point #2'];
        renderLocationSectionsVisualBuilder();
      }
    }

    function addSectionHighlight(idx) {
      if (locationSectionsData[idx]) {
        if (!Array.isArray(locationSectionsData[idx].highlights)) locationSectionsData[idx].highlights = [];
        locationSectionsData[idx].highlights.push('');
        renderLocationSectionsVisualBuilder();
      }
    }

    function updateSectionHighlight(idx, hIdx, val) {
      if (locationSectionsData[idx] && locationSectionsData[idx].highlights) {
        locationSectionsData[idx].highlights[hIdx] = val;
        syncLocationSectionsToJson();
      }
    }

    function removeSectionHighlight(idx, hIdx) {
      if (locationSectionsData[idx] && locationSectionsData[idx].highlights) {
        locationSectionsData[idx].highlights.splice(hIdx, 1);
        renderLocationSectionsVisualBuilder();
      }
    }

    // Timeline helpers
    function addTimelinePhase(idx) {
      if (locationSectionsData[idx]) {
        if (!Array.isArray(locationSectionsData[idx].phases)) locationSectionsData[idx].phases = [];
        const pNum = locationSectionsData[idx].phases.length + 1;
        locationSectionsData[idx].phases.push({
          phase: `Phase ${pNum}`,
          weeks: `Weeks ${pNum * 2 - 1}–${pNum * 2}`,
          title: `New Sprint Milestone ${pNum}`,
          description: 'Milestone description and action steps.',
          deliverable: 'Verified Deliverable'
        });
        renderLocationSectionsVisualBuilder();
      }
    }

    function updateTimelinePhaseField(idx, pIdx, field, val) {
      if (locationSectionsData[idx] && locationSectionsData[idx].phases && locationSectionsData[idx].phases[pIdx]) {
        locationSectionsData[idx].phases[pIdx][field] = val;
        syncLocationSectionsToJson();
      }
    }

    function removeTimelinePhase(idx, pIdx) {
      if (locationSectionsData[idx] && locationSectionsData[idx].phases) {
        locationSectionsData[idx].phases.splice(pIdx, 1);
        renderLocationSectionsVisualBuilder();
      }
    }

    // Comparison row helpers
    function addComparisonRow(idx) {
      if (locationSectionsData[idx]) {
        if (!Array.isArray(locationSectionsData[idx].rows)) locationSectionsData[idx].rows = [];
        locationSectionsData[idx].rows.push({
          feature: 'New Comparison Feature',
          d4l: 'Digital4Local standard',
          competitor: 'Traditional standard'
        });
        renderLocationSectionsVisualBuilder();
      }
    }

    function updateComparisonRowField(idx, rIdx, field, val) {
      if (locationSectionsData[idx] && locationSectionsData[idx].rows && locationSectionsData[idx].rows[rIdx]) {
        locationSectionsData[idx].rows[rIdx][field] = val;
        syncLocationSectionsToJson();
      }
    }

    function removeComparisonRow(idx, rIdx) {
      if (locationSectionsData[idx] && locationSectionsData[idx].rows) {
        locationSectionsData[idx].rows.splice(rIdx, 1);
        renderLocationSectionsVisualBuilder();
      }
    }

    // Promise items helpers
    function addPromiseItem(idx, listKey) {
      if (locationSectionsData[idx]) {
        if (!Array.isArray(locationSectionsData[idx][listKey])) locationSectionsData[idx][listKey] = [];
        locationSectionsData[idx][listKey].push('');
        renderLocationSectionsVisualBuilder();
      }
    }

    function updatePromiseItem(idx, listKey, pIdx, val) {
      if (locationSectionsData[idx] && locationSectionsData[idx][listKey]) {
        locationSectionsData[idx][listKey][pIdx] = val;
        syncLocationSectionsToJson();
      }
    }

    function removePromiseItem(idx, listKey, pIdx) {
      if (locationSectionsData[idx] && locationSectionsData[idx][listKey]) {
        locationSectionsData[idx][listKey].splice(pIdx, 1);
        renderLocationSectionsVisualBuilder();
      }
    }

    // Locality helpers
    function addLocalityCard(idx) {
      if (locationSectionsData[idx]) {
        if (!Array.isArray(locationSectionsData[idx].localities)) locationSectionsData[idx].localities = [];
        locationSectionsData[idx].localities.push({ name: '', tag: 'Commercial / Retail', pincode: '462001' });
        renderLocationSectionsVisualBuilder();
      }
    }

    function updateLocalityCardField(idx, lIdx, field, val) {
      if (locationSectionsData[idx] && locationSectionsData[idx].localities && locationSectionsData[idx].localities[lIdx]) {
        locationSectionsData[idx].localities[lIdx][field] = val;
        syncLocationSectionsToJson();
      }
    }

    function removeLocalityCard(idx, lIdx) {
      if (locationSectionsData[idx] && locationSectionsData[idx].localities) {
        locationSectionsData[idx].localities.splice(lIdx, 1);
        renderLocationSectionsVisualBuilder();
      }
    }

    // Pricing plan helpers
    function addPricingPlan(idx) {
      if (locationSectionsData[idx]) {
        if (!Array.isArray(locationSectionsData[idx].plans)) locationSectionsData[idx].plans = [];
        locationSectionsData[idx].plans.push({
          name: 'Growth Plan',
          tag: 'POPULAR',
          price: '₹14,999',
          period: '/ month',
          focus: 'Scaling local businesses',
          features: ['Map 3-Pack Optimization', 'AI Overview Citations', 'Weekly Reporting']
        });
        renderLocationSectionsVisualBuilder();
      }
    }

    function updatePricingPlanField(idx, plIdx, field, val) {
      if (locationSectionsData[idx] && locationSectionsData[idx].plans && locationSectionsData[idx].plans[plIdx]) {
        locationSectionsData[idx].plans[plIdx][field] = val;
        syncLocationSectionsToJson();
      }
    }

    function updatePricingPlanFeatures(idx, plIdx, val) {
      if (locationSectionsData[idx] && locationSectionsData[idx].plans && locationSectionsData[idx].plans[plIdx]) {
        locationSectionsData[idx].plans[plIdx].features = val.split('\n').map(s => s.trim()).filter(Boolean);
        syncLocationSectionsToJson();
      }
    }

    function removePricingPlan(idx, plIdx) {
      if (locationSectionsData[idx] && locationSectionsData[idx].plans) {
        locationSectionsData[idx].plans.splice(plIdx, 1);
        renderLocationSectionsVisualBuilder();
      }
    }

    // Top Level Section Actions
    function addNewLocationSection(type) {
      toggleAddSectionDropdown();
      let newSec = {
        type: type,
        id: 'section-' + (locationSectionsData.length + 1),
        tag: 'NEW SECTION',
        title: 'New Dynamic Section Title',
        subtitle: 'Enter section description and strategic context.',
        paragraphs: ['Write rich paragraph text here to inform and convert prospective clients.']
      };

      if (type === 'timeline') {
        newSec.tag = '90-DAY ROADMAP';
        newSec.title = 'The 90-Day Local Dominance Sprint';
        newSec.phases = [
          { phase: 'Phase 1', weeks: 'Weeks 1–2', title: 'Audit & Entity Foundation', description: 'Technical analysis and profile cleanup.', deliverable: '25-Point Fix Plan' },
          { phase: 'Phase 2', weeks: 'Weeks 3–6', title: 'Local Grid Expansion', description: 'Radius scaling and geo-targeted citations.', deliverable: 'Live Grid Rankings' },
          { phase: 'Phase 3', weeks: 'Weeks 7–12', title: 'AI Citations & Review Velocity', description: 'ChatGPT & Gemini entity feeding.', deliverable: 'AI Overview Top Ranking' }
        ];
      } else if (type === 'comparison_table') {
        newSec.tag = 'HOW WE DIFFER';
        newSec.title = 'Digital4Local vs Traditional Agencies';
        newSec.rows = [
          { feature: 'Search Engines Optimized', d4l: 'Google Maps + ChatGPT + Gemini + Perplexity', competitor: 'Basic Google Web Only' },
          { feature: 'Ranking Tracking', d4l: '5x5 Live Geo-Grid Map Pin matrix', competitor: 'Static PDF report with generic rankings' },
          { feature: 'Contract Structure', d4l: 'No 12-month lock-in; performance driven', competitor: 'Rigid 6–12 month lock-in retainers' }
        ];
      } else if (type === 'honest_promises') {
        newSec.tag = 'OUR ETHICAL STANDARD';
        newSec.title = 'Honest Commitments We Make';
        newSec.whatWeDo = ['Audit real rankings before taking retainers', 'Track every neighborhood pin separately', 'Transparent weekly reporting'];
        newSec.whatWeNeverDo = ['Promise unrealistic 7-day #1 ranks', 'Build automated spam blog comments', 'Hold your accounts hostage'];
      } else if (type === 'locality_grid') {
        newSec.tag = 'LOCAL COVERAGE';
        newSec.title = 'Key Neighborhoods We Cover';
        newSec.localities = [
          { name: 'MP Nagar', tag: 'Commercial Core', pincode: '462011' },
          { name: 'Arera Colony', tag: 'Healthcare & High-End', pincode: '462016' },
          { name: 'Kolar Road', tag: 'Residential Corridor', pincode: '462042' },
          { name: 'Hoshangabad Road', tag: 'Industrial / Auto', pincode: '462026' }
        ];
      } else if (type === 'pricing_table') {
        newSec.tag = 'INVESTMENT PLANS';
        newSec.title = 'Transparent Monthly Retainers';
        newSec.plans = [
          { name: 'Local Foundation Sprint', tag: 'STARTER', price: '₹9,999', period: '/ month', focus: 'Single location', features: ['Google Map 3-Pack Optimization', '15 Local Citations', '5x5 Geo-Grid Tracking'] },
          { name: 'AI & Multi-Channel Dominance', tag: 'MOST POPULAR', price: '₹14,999', period: '/ month', focus: 'Multi-radius businesses', features: ['All Foundation features', 'ChatGPT & Gemini Entity Ingestion', 'Bi-weekly Strategy Call'] }
        ];
      }

      locationSectionsData.push(newSec);
      renderLocationSectionsVisualBuilder();
      showToast(`Added new ${type.replace('_', ' ')} section!`, 'success');
    }

    function removeLocationSection(idx) {
      if (confirm('Are you sure you want to delete this section?')) {
        locationSectionsData.splice(idx, 1);
        renderLocationSectionsVisualBuilder();
        showToast('Section removed', 'info');
      }
    }

    function moveLocationSection(idx, delta) {
      const newIdx = idx + delta;
      if (newIdx < 0 || newIdx >= locationSectionsData.length) return;
      const sec = locationSectionsData.splice(idx, 1)[0];
      locationSectionsData.splice(newIdx, 0, sec);
      renderLocationSectionsVisualBuilder();
    }

    function duplicateLocationSection(idx) {
      if (locationSectionsData[idx]) {
        const cloned = JSON.parse(JSON.stringify(locationSectionsData[idx]));
        cloned.id = cloned.id + '-copy';
        cloned.title = cloned.title + ' (Copy)';
        locationSectionsData.splice(idx + 1, 0, cloned);
        renderLocationSectionsVisualBuilder();
        showToast('Section duplicated!', 'success');
      }
    }

    // Initial render of Visual Sections
    renderLocationSectionsVisualBuilder();

    // 5.b Location Sections JSON Validation Helpers
    function liveValidateSectionsJson(val) {
      const statusEl = document.getElementById('loc-json-status');
      if (!statusEl) return;
      try {
        const parsed = JSON.parse(val);
        if (Array.isArray(parsed)) {
          statusEl.textContent = '● Valid JSON (' + parsed.length + ' sections)';
          statusEl.className = 'text-[10px] font-mono text-[#10B981] font-bold';
        } else {
          statusEl.textContent = '● JSON must be an array []';
          statusEl.className = 'text-[10px] font-mono text-[#EF4444] font-bold';
        }
      } catch (e) {
        statusEl.textContent = '● Invalid JSON: ' + e.message.substring(0, 30);
        statusEl.className = 'text-[10px] font-mono text-[#EF4444] font-bold';
      }
    }

    function formatLocationSectionsJson() {
      const textarea = document.getElementById('loc-sections-json');
      if (!textarea) return;
      try {
        const parsed = JSON.parse(textarea.value);
        textarea.value = JSON.stringify(parsed, null, 2);
        showToast('Sections JSON formatted cleanly!', 'success');
        liveValidateSectionsJson(textarea.value);
      } catch (e) {
        showToast('Could not format JSON: ' + e.message, 'error');
      }
    }

    function validateLocationSectionsJson() {
      const textarea = document.getElementById('loc-sections-json');
      if (!textarea) return;
      try {
        const parsed = JSON.parse(textarea.value);
        if (!Array.isArray(parsed)) {
          showToast('JSON root must be an array [] of section objects', 'error');
          return;
        }
        showToast(`Validation Passed! ${parsed.length} dynamic sections configured properly.`, 'success');
      } catch (e) {
        showToast('JSON Error: ' + e.message, 'error');
      }
    }

    function updateLocSeoPreview() {
      const title = document.getElementById('loc-meta-title-input')?.value || '';
      const desc = document.getElementById('loc-meta-desc-input')?.value || '';

      const tLen = document.getElementById('loc-meta-title-length');
      const dLen = document.getElementById('loc-meta-desc-length');
      if (tLen) tLen.textContent = title.length;
      if (dLen) dLen.textContent = desc.length;

      const pTitle = document.getElementById('loc-serp-preview-title');
      const pDesc = document.getElementById('loc-serp-preview-desc');
      if (pTitle) pTitle.textContent = title || 'Location Page Title';
      if (pDesc) pDesc.textContent = desc || 'Meta description snippet appears here.';
    }

    // Helper to resolve media URLs dynamically with window.BASE_PATH
    function resolveMediaUrl(rawUrl) {
      if (!rawUrl) return '';
      if (rawUrl.startsWith('http://') || rawUrl.startsWith('https://') || rawUrl.startsWith('data:') || rawUrl.startsWith('blob:')) {
        return rawUrl;
      }
      const basePath = window.BASE_PATH || '/';
      const cleanBase = basePath.endsWith('/') ? basePath : basePath + '/';
      const cleanRel = rawUrl.replace(/^\.?\/+/, '');
      
      // If rawUrl already starts with base folder name, prevent duplicate
      const folderName = cleanBase.replace(/^\/+|\/+$/g, '');
      if (folderName && cleanRel.startsWith(folderName + '/')) {
        return '/' + cleanRel;
      }
      return (cleanBase === '/' ? '/' : cleanBase) + cleanRel;
    }

    // 6. Inline & Featured Image Upload Handler
    async function handleInlineImageUpload(event) {
      const file = event.target.files[0];
      if (!file) return;

      const formData = new FormData();
      formData.append('media_file', file);
      formData.append('csrf_token', window.CSRF_TOKEN || '');
      showToast('Uploading image...', 'info');

      try {
        const response = await fetch('api/upload-media.php', { 
          method: 'POST', 
          headers: { 'X-CSRF-Token': window.CSRF_TOKEN || '' },
          body: formData 
        });
        const result = await response.json();
        if (result.success && editorInstance) {
          const resolvedSrc = resolveMediaUrl(result.url);
          const content = `<p><img src="${resolvedSrc}" alt="Uploaded Media" class="max-w-full rounded-xl my-4 shadow-sm" /></p>`;
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
      formData.append('csrf_token', window.CSRF_TOKEN || '');
      showToast('Uploading featured image...', 'info');

      try {
        const response = await fetch('api/upload-media.php', { 
          method: 'POST', 
          headers: { 'X-CSRF-Token': window.CSRF_TOKEN || '' },
          body: formData 
        });
        const result = await response.json();
        if (result.success) {
          const resolvedSrc = resolveMediaUrl(result.url);
          document.getElementById('featured-image-preview').src = resolvedSrc;
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
      formData.append('csrf_token', window.CSRF_TOKEN || '');
      showToast('Uploading media...', 'info');

      try {
        const response = await fetch('api/upload-media.php', { 
          method: 'POST', 
          headers: { 'X-CSRF-Token': window.CSRF_TOKEN || '' },
          body: formData 
        });
        const result = await response.json();
        if (result.success) {
          showToast('Media uploaded: ' + result.filename, 'success');
          const grid = document.getElementById('sidebar-media-grid');
          if (grid) {
            const resolvedSrc = resolveMediaUrl(result.url);
            const newCard = document.createElement('div');
            newCard.className = 'p-1 bg-[#1F2937] rounded-lg border border-[#374151] cursor-pointer hover:border-[#00A8B5]';
            newCard.onclick = () => copyMediaUrl(result.url);
            newCard.innerHTML = `<img src="${resolvedSrc}" class="w-full h-16 object-cover rounded"><div class="text-[9px] text-[#9CA3AF] truncate mt-1">${result.filename}</div>`;
            grid.prepend(newCard);
          }
        } else {
          showToast(result.message || 'Upload failed', 'error');
        }
      } catch (err) {
        showToast('Upload error: ' + err.message, 'error');
      }
    }

    function copyMediaUrl(url) {
      navigator.clipboard.writeText(url);
      showToast('Copied media URL to clipboard: ' + url, 'success');
    }

    function updateFeaturedPreview(url) {
      if (!url) return;
      document.getElementById('featured-image-preview').src = resolveMediaUrl(url);
    }

    function clearFeaturedImage() {
      const defaultImg = resolveMediaUrl('assets/images/hero_dashboard_light_v2.png');
      document.getElementById('featured-image-preview').src = defaultImg;
      document.getElementById('featured-image-url-input').value = '';
    }

    // 7. SEO Live Preview Updates (Standard Pages)
    function updateSeoPreview() {
      const titleEl = document.getElementById('seo-meta-title');
      const descEl = document.getElementById('seo-meta-description');
      if (!titleEl || !descEl) return;

      const title = titleEl.value;
      const desc = descEl.value;

      const tLen = document.getElementById('meta-title-length');
      const dLen = document.getElementById('meta-desc-length');
      if (tLen) tLen.textContent = title.length;
      if (dLen) dLen.textContent = desc.length;

      const pTitle = document.getElementById('serp-preview-title');
      const pDesc = document.getElementById('serp-preview-desc');
      if (pTitle) pTitle.textContent = title || 'Page Title | Digital4Local';
      if (pDesc) pDesc.textContent = desc || 'Description preview will appear here.';
    }
    updateSeoPreview();

    // 8. Viewport Switcher
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
      if (!iframe) return;
      const isBlog = document.getElementById('form-is-blog-post')?.value === '1';
      const isLoc = document.getElementById('form-is-location-page')?.value === '1';

      if (isBlog) {
        const slug = document.getElementById('edit-blog-slug')?.value || document.getElementById('form-blog-slug')?.value || '';
        iframe.src = 'blog/' + encodeURIComponent(slug) + '?t=' + new Date().getTime();
      } else if (isLoc) {
        const slug = document.getElementById('loc-slug-input')?.value || document.getElementById('form-location-slug')?.value || '';
        iframe.src = encodeURIComponent(slug) + '/?t=' + new Date().getTime();
      } else {
        iframe.src = iframe.src.split('?')[0] + '?t=' + new Date().getTime();
      }
    }

    // 9. Save All CMS Settings via API
    async function saveCmsSettings() {
      const isLoc = document.getElementById('form-is-location-page')?.value === '1';
      const isBlog = document.getElementById('form-is-blog-post')?.value === '1';
      const activeKey = document.getElementById('form-active-page-key')?.value;

      // Location Cluster Save Flow
      if (isLoc) {
        let parsedSections = locationSectionsData;
        if (locSectionsMode === 'code') {
          const rawSections = document.getElementById('loc-sections-json')?.value || '[]';
          try {
            parsedSections = JSON.parse(rawSections);
            if (!Array.isArray(parsedSections)) {
              showToast('Sections JSON must be an array []', 'error');
              return;
            }
          } catch (e) {
            showToast('Invalid Sections JSON syntax: ' + e.message, 'error');
            return;
          }
        }

        const locSlug = document.getElementById('loc-slug-input')?.value.trim() || document.getElementById('form-location-slug')?.value;
        const locCity = document.getElementById('loc-city-input')?.value.trim() || document.getElementById('form-location-city')?.value || 'bhopal';

        const locData = {
          slug: locSlug,
          city: locCity,
          state: document.getElementById('loc-state-input')?.value.trim() || 'Madhya Pradesh',
          country: document.getElementById('loc-country-input')?.value.trim() || 'India',
          isHub: document.getElementById('loc-is-hub-input')?.checked || false,
          schemaType: document.getElementById('loc-schema-type-input')?.value || 'ProfessionalService',
          h1: document.getElementById('loc-h1-input')?.value || '',
          badge: document.getElementById('loc-badge-input')?.value || '',
          heroDirectAnswer: document.getElementById('loc-hero-direct-answer-input')?.value || '',
          heroSubtitle: document.getElementById('loc-hero-subtitle-input')?.value || '',
          heroMotif: document.getElementById('loc-hero-motif-input')?.value || 'combined',
          lastUpdated: document.getElementById('loc-last-updated-input')?.value || '',
          primaryKeyword: document.getElementById('loc-primary-keyword-input')?.value || '',
          metaTitle: document.getElementById('loc-meta-title-input')?.value || '',
          metaDescription: document.getElementById('loc-meta-desc-input')?.value || '',
          relatedSlugs: (document.getElementById('loc-related-slugs-input')?.value || '').split(',').map(s => s.trim()).filter(Boolean),
          recentInsightsTags: (document.getElementById('loc-insights-tags-input')?.value || '').split(',').map(s => s.trim()).filter(Boolean),
          cta: {
            label: document.getElementById('loc-cta-label-input')?.value || '',
            sublabel: document.getElementById('loc-cta-sublabel-input')?.value || '',
            buttonText: document.getElementById('loc-cta-btn-text-input')?.value || '',
            whatsappText: document.getElementById('loc-cta-wa-text-input')?.value || ''
          },
          author: {
            name: document.getElementById('loc-author-name-input')?.value || 'Abhishek Raikwar',
            role: document.getElementById('loc-author-role-input')?.value || 'Founder, Digital4Local',
            bio: document.getElementById('loc-author-bio-input')?.value || '',
            photo: document.getElementById('loc-author-photo-input')?.value || '/assets/images/abhishek-raikwar.jpg',
            linkedin: document.getElementById('loc-author-linkedin-input')?.value || ''
          },
          faqs: faqsData,
          sections: parsedSections
        };

        showToast('Saving Location Cluster page...', 'info');

        try {
          const response = await fetch('api/update-cms-settings.php', {
            method: 'POST',
            headers: { 
              'Content-Type': 'application/json',
              'X-CSRF-Token': window.CSRF_TOKEN
            },
            body: JSON.stringify({
              action: 'save_location_page',
              location_slug: locSlug,
              city: locCity.toLowerCase(),
              location_data: locData,
              csrf_token: window.CSRF_TOKEN
            })
          });
          const result = await response.json();
          if (result.success) {
            showToast('Location page saved & synced live!', 'success');
            reloadPreviewIframe();
          } else {
            showToast('Save failed: ' + result.message, 'error');
          }
        } catch (err) {
          showToast('Error saving location page: ' + err.message, 'error');
        }
        return;
      }

      // Standard / Blog Page Save Flow
      if (editorInstance) {
        const ckEl = document.querySelector('#ck-content-editor');
        if (ckEl) ckEl.value = editorInstance.getData();
      }

      const form = document.getElementById('cms-editor-form');
      const formData = new FormData(form);
      
      const payload = { csrf_token: window.CSRF_TOKEN };
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

      const status = document.getElementById('editor-page-status').value;

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
        payload['pages'][activeKey]['faqs'] = faqsData;
      }

      showToast('Saving live changes...', 'info');

      try {
        const response = await fetch('api/update-cms-settings.php', {
          method: 'POST',
          headers: { 
            'Content-Type': 'application/json',
            'X-CSRF-Token': window.CSRF_TOKEN
          },
          body: JSON.stringify(payload)
        });
        const result = await response.json();
        if (result.success) {
          showToast('Configuration saved successfully!', 'success');
          if (isBlog && result.post_slug) {
            const newSlug = result.post_slug;
            if (document.getElementById('form-orig-blog-slug')) document.getElementById('form-orig-blog-slug').value = newSlug;
            if (document.getElementById('form-blog-slug')) document.getElementById('form-blog-slug').value = newSlug;
            if (document.getElementById('edit-blog-slug')) document.getElementById('edit-blog-slug').value = newSlug;
            if (document.getElementById('form-active-page-key')) document.getElementById('form-active-page-key').value = 'blog_' + newSlug;
            window.history.replaceState({}, '', 'admin-cms.php?page=blog_' + encodeURIComponent(newSlug));
          }
          reloadPreviewIframe();
        } else {
          showToast('Save failed: ' + result.message, 'error');
        }
      } catch (err) {
        showToast('Error saving settings: ' + err.message, 'error');
      }
    }

    const saveBtn = document.getElementById('btn-save-all');
    if (saveBtn) saveBtn.addEventListener('click', saveCmsSettings);

    // Ctrl+S Keyboard Shortcut
    window.addEventListener('keydown', e => {
      if ((e.ctrlKey || e.metaKey) && e.key === 's') {
        e.preventDefault();
        saveCmsSettings();
      }
    });

    // 10. Creation Modal Handlers
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

    function autoGenerateLocSlug(title) {
      const slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
      document.getElementById('new-loc-slug-input').value = slug;
    }

    function updateBlogSlugPreview(title) {}

    async function submitCreatePage() {
      const title = document.getElementById('new-page-title-input').value.trim();
      const slug = document.getElementById('new-page-slug-input').value.trim();
      if (!title) { alert('Please enter a page title.'); return; }

      const response = await fetch('api/update-cms-settings.php', {
        method: 'POST',
        headers: { 
          'Content-Type': 'application/json',
          'X-CSRF-Token': window.CSRF_TOKEN
        },
        body: JSON.stringify({ 
          action: 'add_custom_page', 
          new_page_title: title, 
          new_page_slug: slug,
          csrf_token: window.CSRF_TOKEN
        })
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
        headers: { 
          'Content-Type': 'application/json',
          'X-CSRF-Token': window.CSRF_TOKEN
        },
        body: JSON.stringify({ 
          action: 'add_blog_post', 
          new_post_title: title, 
          new_post_slug: slug, 
          new_post_category: category,
          csrf_token: window.CSRF_TOKEN
        })
      });
      const res = await response.json();
      if (res.success) {
        window.location.href = 'admin-cms.php?page=blog_' + encodeURIComponent(res.post_slug);
      } else {
        alert(res.message);
      }
    }

    async function submitCreateLocationPage() {
      const title = document.getElementById('new-loc-title-input').value.trim();
      const slug = document.getElementById('new-loc-slug-input').value.trim();
      const city = document.getElementById('new-loc-city-input').value.trim() || 'bhopal';
      const isHub = document.getElementById('new-loc-type-select').value === 'hub';
      if (!title) { alert('Please enter a location page title.'); return; }

      const response = await fetch('api/update-cms-settings.php', {
        method: 'POST',
        headers: { 
          'Content-Type': 'application/json',
          'X-CSRF-Token': window.CSRF_TOKEN
        },
        body: JSON.stringify({ 
          action: 'add_location_page', 
          location_title: title, 
          location_slug: slug, 
          location_city: city,
          is_hub: isHub,
          csrf_token: window.CSRF_TOKEN
        })
      });
      const res = await response.json();
      if (res.success) {
        window.location.href = 'admin-cms.php?page=' + encodeURIComponent(res.page_key);
      } else {
        alert(res.message);
      }
    }

    async function deleteCustomPage(pageKey, pageTitle) {
      if (!confirm(`Are you sure you want to permanently delete '${pageTitle}'?`)) return;
      const response = await fetch('api/update-cms-settings.php', {
        method: 'POST',
        headers: { 
          'Content-Type': 'application/json',
          'X-CSRF-Token': window.CSRF_TOKEN
        },
        body: JSON.stringify({ 
          action: 'delete_custom_page', 
          page_key: pageKey,
          csrf_token: window.CSRF_TOKEN
        })
      });
      const res = await response.json();
      if (res.success) window.location.href = 'admin-cms.php?page=index';
    }

    async function deleteBlogPost(slug, title) {
      if (!confirm(`Are you sure you want to delete blog article '${title}'?`)) return;
      const response = await fetch('api/update-cms-settings.php', {
        method: 'POST',
        headers: { 
          'Content-Type': 'application/json',
          'X-CSRF-Token': window.CSRF_TOKEN
        },
        body: JSON.stringify({ 
          action: 'delete_blog_post', 
          post_slug: slug,
          csrf_token: window.CSRF_TOKEN
        })
      });
      const res = await response.json();
      if (res.success) window.location.href = 'admin-cms.php?page=blog';
    }

    // 11. Toast Helper
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
