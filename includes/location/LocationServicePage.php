<?php
/**
 * Master Location Service Page Template Engine (LocationServicePage.php)
 * Universal, data-driven template powering all city clusters (Bhopal, Indore, Jabalpur, etc.)
 * Strictly follows SEO-first, E-E-A-T standards, responsive mobile design, and Schema.org specifications.
 */

require_once __DIR__ . '/../../config/business.php';
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/VerifyChip.php';
require_once __DIR__ . '/ClusterNav.php';
require_once __DIR__ . '/Timeline.php';
require_once __DIR__ . '/ComparisonTable.php';
require_once __DIR__ . '/HonestPromiseBox.php';
require_once __DIR__ . '/FaqAccordion.php';
require_once __DIR__ . '/RelatedServices.php';
require_once __DIR__ . '/RecentInsights.php';
require_once __DIR__ . '/AuthorBox.php';
require_once __DIR__ . '/StickyContactBar.php';
require_once __DIR__ . '/SchemaJsonLd.php';

if (!function_exists('d4l_get_location_page_data')) {
    function d4l_get_location_page_data($slug, $city = 'bhopal') {
        $clean_slug = str_replace('location_', '', $slug);

        // 1. Try fetching from Database first
        try {
            if (function_exists('db_get_location_page')) {
                $db_data = db_get_location_page($clean_slug, $city);
                if (!empty($db_data) && is_array($db_data) && !empty($db_data['h1'])) {
                    return $db_data;
                }
            }
        } catch (Exception $e) {
            // Fallback to JSON
        }

        // 2. Fallback to workspace data/{city}/{slug}.json
        $json_path = __DIR__ . '/../../data/' . $city . '/' . $clean_slug . '.json';
        if (file_exists($json_path)) {
            $content = @file_get_contents($json_path);
            $data = @json_decode($content, true);
            if (is_array($data) && !empty($data)) {
                // Auto-sync into DB for next fast read
                if (function_exists('db_save_location_page')) {
                    try { db_save_location_page($clean_slug, $city, $data); } catch (Exception $ex) {}
                }
                return $data;
            }
        }
        return [];
    }
}

if (!function_exists('d4l_get_all_location_pages')) {
    function d4l_get_all_location_pages() {
        $pages = [];

        // 1. Fetch from Database first
        try {
            if (function_exists('db_get_all_location_pages')) {
                $db_pages = db_get_all_location_pages();
                if (!empty($db_pages) && is_array($db_pages)) {
                    $pages = $db_pages;
                }
            }
        } catch (Exception $e) {
            // Fallback
        }

        // 2. Merge with data directory scan for safety
        $data_dir = __DIR__ . '/../../data';
        if (is_dir($data_dir)) {
            $cities = scandir($data_dir);
            foreach ($cities as $city) {
                if ($city === '.' || $city === '..' || !is_dir($data_dir . '/' . $city)) continue;
                $files = scandir($data_dir . '/' . $city);
                foreach ($files as $f) {
                    if (substr($f, -5) === '.json') {
                        $slug = substr($f, 0, -5);
                        $key = 'location_' . $slug;
                        if (!isset($pages[$key])) {
                            $page_data = d4l_get_location_page_data($slug, $city);
                            $pages[$key] = [
                                'key' => $key,
                                'slug' => $slug,
                                'city' => $city,
                                'title' => $page_data['h1'] ?? ucwords(str_replace('-', ' ', $slug)),
                                'badge' => $page_data['badge'] ?? strtoupper($city) . ' HUB',
                                'url' => $slug . '/',
                                'is_hub' => !empty($page_data['isHub']),
                                'type' => 'Location Cluster (' . ucfirst($city) . ')'
                            ];
                        }
                    }
                }
            }
        }
        return $pages;
    }
}

if (!function_exists('d4l_render_location_page')) {
    function d4l_render_location_page($page_data) {
        global $site_config;
        require_once __DIR__ . '/../site-config.php';
        $business_cfg = d4l_get_business_config();
        $nap = $business_cfg['nap'];
        $author_cfg = $business_cfg['author'];

        // Page Variables
        $slug = $page_data['slug'] ?? 'seo-agency-bhopal';
        $city = $page_data['city'] ?? 'Bhopal';
        $state = $page_data['state'] ?? 'Madhya Pradesh';
        $is_hub = !empty($page_data['isHub']);
        $h1 = htmlspecialchars($page_data['h1'] ?? 'SEO Agency in Bhopal');
        $page_title = $page_data['metaTitle'] ?? $h1 . ' | Digital4Local';
        $page_description = $page_data['metaDescription'] ?? ($page_data['heroDirectAnswer'] ?? '');
        $page_keywords = $page_data['primaryKeyword'] ?? ($h1 . ', Bhopal SEO, AI Search');
        $canonical_url = "https://digital4local.com/" . $slug . "/";
        $badge = htmlspecialchars($page_data['badge'] ?? strtoupper($city) . ' AGENCY HUB');
        $hero_direct_answer = d4l_render_verify_chips($page_data['heroDirectAnswer'] ?? '');
        $hero_subtitle = htmlspecialchars($page_data['heroSubtitle'] ?? '');
        $hero_motif = $page_data['heroMotif'] ?? 'combined';
        $last_updated = htmlspecialchars($page_data['lastUpdated'] ?? 'October 2026');
        
        $cta = $page_data['cta'] ?? [];
        $cta_label = htmlspecialchars($cta['label'] ?? 'Claim Your Free ' . $city . ' SEO Audit');
        $cta_sublabel = htmlspecialchars($cta['sublabel'] ?? 'We will analyze your map rankings and competitor gaps within 24 hours.');
        $cta_btn_text = htmlspecialchars($cta['buttonText'] ?? 'Claim Free Audit');
        $cta_wa_text = $cta['whatsappText'] ?? "Hi Abhishek, I want a free audit for my business in {$city}.";

        $wa_clean = $nap['whatsappClean'];
        $wa_url = "https://wa.me/" . $wa_clean . "?text=" . urlencode($cta_wa_text);
        $call_url = "tel:" . $nap['phone'];

        // Head Meta Configuration for includes/seo.php
        $og_image = "https://digital4local.com/assets/images/hero_dashboard_light_v2.png";
        $page_robots = "index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1";
        $base_path = function_exists('get_base_path') ? get_base_path() : '/';
        ?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
  <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
  <meta name="robots" content="<?php echo htmlspecialchars($page_robots); ?>">
  <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
  <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
  <meta property="og:image" content="<?php echo htmlspecialchars($og_image); ?>">
  <meta property="og:site_name" content="Digital4Local">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
  <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
  <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
  <meta name="twitter:image" content="<?php echo htmlspecialchars($og_image); ?>">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Tailwind CSS & Lucide Icons -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="<?php echo $base_path; ?>assets/css/custom.css">

  <!-- JSON-LD Structured Data Schema -->
  <?php echo d4l_render_location_schema_jsonld($page_data); ?>
</head>
<body class="bg-white text-[#14151A] font-['Plus_Jakarta_Sans',sans-serif] antialiased overflow-x-hidden pt-16 sm:pt-20">

  <!-- Shared Global Header -->
  <?php require __DIR__ . '/../header.php'; ?>

  <!-- 1. Breadcrumbs Component -->
  <div class="bg-[#F8FAFC] border-b border-[#E4E7EC] py-2.5 px-4 sm:px-8">
    <div class="max-w-7xl mx-auto">
      <nav aria-label="Breadcrumbs" class="flex items-center gap-1.5 text-xs text-[#5B5F6B] overflow-x-auto whitespace-nowrap">
        <a href="<?php echo $base_path; ?>" class="hover:text-[#00A8B5] transition-colors flex items-center gap-1">
          <i data-lucide="home" class="w-3.5 h-3.5"></i>
          <span>Home</span>
        </a>
        <span class="text-slate-300">/</span>
        <?php if ($is_hub): ?>
          <span class="font-bold text-[#14151A]" aria-current="page">SEO Agency in Bhopal</span>
        <?php else: ?>
          <a href="<?php echo $base_path; ?>seo-agency-bhopal/" class="hover:text-[#00A8B5] transition-colors">Bhopal</a>
          <span class="text-slate-300">/</span>
          <span class="font-bold text-[#14151A]" aria-current="page"><?php echo htmlspecialchars($page_data['shortTitle'] ?? $h1); ?></span>
        <?php endif; ?>
      </nav>
    </div>
  </div>

  <!-- 2. Hero Section -->
  <section class="relative bg-gradient-to-b from-[#F6F8FB] via-white to-white pt-10 pb-12 sm:pb-16 px-4 sm:px-8 overflow-hidden border-b border-slate-100">
    <!-- Ambient Backdrop Texture -->
    <div class="bg-ambient-glow"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#E2E8F0_1px,transparent_1px)] [background-size:24px_24px] opacity-40 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
        
        <!-- Hero Text & Value Proposition -->
        <div class="lg:col-span-7 space-y-6">
          
          <!-- Badge -->
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono font-bold bg-[#00A8B5]/10 text-[#00A8B5] border border-[#00A8B5]/25 shadow-xs">
            <span class="w-2 h-2 rounded-full bg-[#00A8B5] animate-pulse"></span>
            <span><?php echo $badge; ?></span>
          </div>

          <!-- Single Unique H1 -->
          <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#14151A] tracking-tight leading-[1.15]">
            <?php echo $h1; ?>
          </h1>

          <!-- 40-60 Word Direct Answer Paragraph (AEO/GEO Optimized) -->
          <div class="p-4 sm:p-5 rounded-2xl bg-white/90 backdrop-blur-sm border-l-4 border-[#00A8B5] border-y border-r border-slate-200/80 shadow-xs">
            <div class="text-[11px] font-mono font-bold uppercase tracking-wider text-[#00A8B5] mb-1.5 flex items-center gap-1.5">
              <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Direct Answer for Bhopal Businesses
            </div>
            <p class="text-xs sm:text-sm text-[#14151A] font-medium leading-relaxed">
              <?php echo $hero_direct_answer; ?>
            </p>
          </div>

          <!-- Hero Subtitle -->
          <?php if (!empty($hero_subtitle)): ?>
            <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed">
              <?php echo $hero_subtitle; ?>
            </p>
          <?php endif; ?>

          <!-- Primary Hero Actions -->
          <div class="flex flex-wrap items-center gap-3 pt-2">
            <a href="<?php echo $wa_url; ?>" target="_blank" rel="noopener noreferrer" class="btn-primary text-sm whitespace-nowrap shadow-md">
              <span><?php echo $cta_btn_text; ?></span>
              <i data-lucide="arrow-right" class="w-4 h-4 shrink-0"></i>
            </a>

            <a href="<?php echo $call_url; ?>" class="btn-secondary text-sm whitespace-nowrap shadow-xs">
              <i data-lucide="phone" class="w-4 h-4 text-[#00A8B5] shrink-0"></i>
              <span>Call +91 91311 40530</span>
            </a>
          </div>

          <!-- Byline Linking to Author Section -->
          <div class="pt-2 flex items-center gap-2.5 text-xs text-[#5B5F6B] border-t border-slate-200/60">
            <div class="w-6 h-6 rounded-full bg-[#00A8B5] text-white flex items-center justify-center text-[10px] font-bold">AR</div>
            <span>
              Written by <a href="#author-bio" class="font-bold text-[#14151A] hover:text-[#00A8B5] underline underline-offset-2">Abhishek Raikwar</a>, Founder & Lead AI Growth Strategist · Last updated <span class="font-mono text-slate-500"><?php echo $last_updated; ?></span>
            </span>
          </div>

        </div>

        <!-- Hero Motif / Interactive Visual Widget -->
        <div class="lg:col-span-5 relative">
          <div class="relative bg-white border border-[#E4E7EC] rounded-3xl p-6 sm:p-8 shadow-xl shadow-slate-200/50 space-y-6">
            
            <!-- Motif Visual Header -->
            <div class="flex items-center justify-between border-b border-[#E4E7EC] pb-4">
              <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full bg-rose-400"></div>
                <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                <span class="text-xs font-mono font-bold text-slate-600 ml-2">bhopal.growth.matrix</span>
              </div>
              <span class="pulse-badge text-[10px] py-0.5 px-2">● LIVE GEO SCAN</span>
            </div>

            <?php if ($hero_motif === 'map-pin' || $hero_motif === 'combined'): ?>
              <!-- 5x5 Geo-Grid Simulated Matrix -->
              <div class="space-y-3">
                <div class="flex items-center justify-between text-xs font-semibold text-slate-700">
                  <span class="flex items-center gap-1.5"><i data-lucide="map-pin" class="w-4 h-4 text-[#00A8B5]"></i> Bhopal 5x5 Geo-Grid Ranks</span>
                  <span class="text-emerald-600 font-bold">#1 Top 3 Across City</span>
                </div>
                <div class="grid grid-cols-5 gap-1.5 p-3 rounded-2xl bg-slate-50 border border-slate-200">
                  <?php for ($i = 0; $i < 25; $i++): ?>
                    <?php 
                      $rank = ($i % 7 == 0 || $i % 11 == 0) ? '2' : '1';
                      $bg = ($rank === '1') ? 'bg-emerald-500 text-white shadow-xs' : 'bg-emerald-400 text-white';
                    ?>
                    <div class="aspect-square rounded-lg <?php echo $bg; ?> flex items-center justify-center font-mono font-extrabold text-xs">
                      <?php echo $rank; ?>
                    </div>
                  <?php endfor; ?>
                </div>
                <div class="flex items-center justify-between text-[11px] text-slate-500 font-mono">
                  <span>MP Nagar</span>
                  <span>Arera Colony</span>
                  <span>Kolar Rd</span>
                  <span>Hoshangabad</span>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($hero_motif === 'ai-chat' || $hero_motif === 'workflow-nodes' || $hero_motif === 'profile-card' || $hero_motif === 'channels'): ?>
              <!-- AI Answer / Entity Simulation Card -->
              <div class="space-y-3">
                <div class="p-4 rounded-2xl bg-slate-900 text-white space-y-2">
                  <div class="flex items-center gap-2 text-[11px] font-mono text-[#00F0FF]">
                    <i data-lucide="bot" class="w-3.5 h-3.5"></i> ChatGPT & Gemini Recommendation
                  </div>
                  <p class="text-xs text-slate-300 leading-relaxed">
                    "Based on verified Bhopal customer reviews, entity authority, and proven search visibility, <strong class="text-[#00F0FF] font-semibold">Your Business</strong> is rated highest for quality & reliability."
                  </p>
                </div>
                <div class="flex items-center justify-between text-xs text-slate-500 font-mono pt-1">
                  <span class="flex items-center gap-1"><i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-500"></i> Entity Verified</span>
                  <span class="flex items-center gap-1"><i data-lucide="zap" class="w-3.5 h-3.5 text-[#00A8B5]"></i> Sub-60s Routing</span>
                </div>
              </div>
            <?php endif; ?>

            <!-- Verified Bhopal Office Marker -->
            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center justify-between text-xs">
              <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-xl bg-[#00A8B5]/15 text-[#00A8B5] flex items-center justify-center font-bold">
                  <i data-lucide="building-2" class="w-4 h-4"></i>
                </div>
                <div>
                  <div class="font-bold text-[#14151A]">Bhopal Agency Hub</div>
                  <div class="text-[11px] text-[#5B5F6B]">Bagmugaliya, Bhopal (MP 462043)</div>
                </div>
              </div>
              <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded">
                Verified Hub
              </span>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- 3. Bhopal Cluster Sub-Navigation (Scrollable Horizontal Bar) -->
  <?php echo d4l_render_cluster_nav($slug, 'bhopal'); ?>

  <!-- 4. Main Body Content Sections -->
  <main class="space-y-16 sm:space-y-24 py-12 sm:py-16 px-4 sm:px-8 max-w-7xl mx-auto">

    <?php 
    if (!empty($page_data['sections'])) {
        foreach ($page_data['sections'] as $section) {
            $stype = $section['type'] ?? 'content_block';
            
            if ($stype === 'timeline') {
                echo d4l_render_timeline($section);
            } elseif ($stype === 'comparison_table') {
                echo d4l_render_comparison_table($section);
            } elseif ($stype === 'honest_promises') {
                echo d4l_render_honest_promise_box($section);
            } elseif ($stype === 'locality_grid') {
                ?>
                <!-- Bhopal Localities Grid -->
                <div class="space-y-6">
                  <div class="text-center max-w-2xl mx-auto space-y-2">
                    <span class="pulse-badge"><?php echo htmlspecialchars($section['tag'] ?? 'LOCAL GEO COVERAGE'); ?></span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight"><?php echo htmlspecialchars($section['title'] ?? 'Bhopal Neighborhood Coverage'); ?></h2>
                    <p class="text-sm text-[#5B5F6B] leading-relaxed"><?php echo htmlspecialchars($section['subtitle'] ?? ''); ?></p>
                  </div>
                  <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4 pt-4">
                    <?php foreach ($section['localities'] as $loc): ?>
                      <div class="bg-white border border-[#E4E7EC] hover:border-[#00A8B5]/50 rounded-2xl p-4 shadow-xs hover:shadow-md transition-all">
                        <div class="w-8 h-8 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center mb-2">
                          <i data-lucide="map-pin" class="w-4 h-4"></i>
                        </div>
                        <h3 class="font-bold text-sm text-[#14151A]"><?php echo htmlspecialchars($loc['name']); ?></h3>
                        <div class="text-[11px] text-[#5B5F6B] mt-1"><?php echo htmlspecialchars($loc['tag']); ?></div>
                        <div class="text-[10px] font-mono text-[#00A8B5] font-semibold mt-2">PIN: <?php echo htmlspecialchars($loc['pincode']); ?></div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <?php
            } elseif ($stype === 'pricing_table') {
                ?>
                <!-- Pricing Retainers Section -->
                <div class="space-y-6">
                  <div class="text-center max-w-2xl mx-auto space-y-2">
                    <span class="pulse-badge"><?php echo htmlspecialchars($section['tag'] ?? 'TRANSPARENT PRICING'); ?></span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight"><?php echo htmlspecialchars($section['title'] ?? 'Bhopal SEO Retainers'); ?></h2>
                    <p class="text-sm text-[#5B5F6B] leading-relaxed"><?php echo htmlspecialchars($section['subtitle'] ?? ''); ?></p>
                  </div>

                  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 items-stretch">
                    <?php foreach ($section['tiers'] as $tier): ?>
                      <?php 
                        $popular = !empty($tier['popular']);
                        $card_class = $popular ? 'border-2 border-[#00A8B5] shadow-xl relative bg-white' : 'border border-[#E4E7EC] bg-white shadow-xs';
                      ?>
                      <div class="rounded-3xl p-6 sm:p-8 flex flex-col justify-between <?php echo $card_class; ?>">
                        <div class="space-y-4">
                          <?php if ($popular): ?>
                            <div class="inline-flex items-center gap-1 text-[10px] font-mono font-extrabold uppercase tracking-wider bg-[#00A8B5] text-white px-3 py-1 rounded-full">
                              ★ <?php echo htmlspecialchars($tier['badge'] ?? 'MOST POPULAR'); ?>
                            </div>
                          <?php else: ?>
                            <div class="inline-flex items-center gap-1 text-[10px] font-mono font-bold uppercase tracking-wider text-slate-500 bg-slate-100 px-3 py-1 rounded-full border border-slate-200">
                              <?php echo htmlspecialchars($tier['badge'] ?? 'TIER'); ?>
                            </div>
                          <?php endif; ?>

                          <div>
                            <h3 class="text-xl font-extrabold text-[#14151A]"><?php echo htmlspecialchars($tier['name']); ?></h3>
                            <p class="text-xs text-[#5B5F6B] mt-1 leading-relaxed"><?php echo htmlspecialchars($tier['description']); ?></p>
                          </div>

                          <div class="pt-2 border-t border-slate-100">
                            <div class="flex items-baseline gap-1">
                              <span class="text-3xl sm:text-4xl font-extrabold text-[#14151A] font-mono"><?php echo htmlspecialchars($tier['price']); ?></span>
                              <span class="text-xs text-[#5B5F6B]"><?php echo htmlspecialchars($tier['period'] ?? '/mo'); ?></span>
                            </div>
                            <div class="text-[11px] text-slate-400 font-mono mt-0.5">Fixed monthly scope · No lock-in</div>
                          </div>

                          <ul class="space-y-2.5 pt-4 text-xs text-[#14151A]">
                            <?php foreach ($tier['features'] as $feat): ?>
                              <li class="flex items-start gap-2">
                                <i data-lucide="check" class="w-4 h-4 text-[#00A8B5] shrink-0 mt-0.5"></i>
                                <span><?php echo htmlspecialchars($feat); ?></span>
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        </div>

                        <div class="pt-6 mt-6 border-t border-slate-100">
                          <a href="<?php echo $wa_url; ?>" target="_blank" rel="noopener noreferrer" class="<?php echo $popular ? 'btn-primary' : 'btn-secondary'; ?> w-full text-center text-xs">
                            <?php echo htmlspecialchars($tier['ctaText'] ?? 'Get Started'); ?>
                          </a>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <?php
            } else {
                // Generic content block
                ?>
                <div class="space-y-6">
                  <div class="space-y-2">
                    <?php if (!empty($section['tag'])): ?>
                      <span class="pulse-badge"><?php echo htmlspecialchars($section['tag']); ?></span>
                    <?php endif; ?>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight"><?php echo htmlspecialchars($section['title'] ?? ''); ?></h2>
                  </div>

                  <div class="prose max-w-none text-[#5B5F6B] text-sm sm:text-base leading-relaxed space-y-4">
                    <?php echo d4l_render_verify_chips($section['content'] ?? ''); ?>
                  </div>

                  <?php if (!empty($section['highlights'])): ?>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-4">
                      <?php foreach ($section['highlights'] as $hl): ?>
                        <div class="bg-white border border-[#E4E7EC] rounded-2xl p-5 shadow-xs hover:border-[#00A8B5]/40 transition-colors">
                          <div class="w-9 h-9 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center mb-3">
                            <i data-lucide="<?php echo htmlspecialchars($hl['icon'] ?? 'check'); ?>" class="w-4 h-4"></i>
                          </div>
                          <h3 class="font-bold text-sm text-[#14151A] mb-1"><?php echo htmlspecialchars($hl['title']); ?></h3>
                          <p class="text-xs text-[#5B5F6B] leading-relaxed"><?php echo htmlspecialchars($hl['desc']); ?></p>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                </div>
                <?php
            }
        }
    }
    ?>

    <!-- 5. FAQ Accordion (HTML details/summary) -->
    <?php if (!empty($page_data['faqs'])): ?>
      <section id="faqs" class="pt-4">
        <?php echo d4l_render_faq_accordion($page_data['faqs'], "Frequently Asked Questions in {$city}"); ?>
      </section>
    <?php endif; ?>

    <!-- 6. Connected Related Services Block ("Recommended for you in Bhopal") -->
    <section id="related-services" class="pt-4">
      <?php echo d4l_render_related_services($slug, 'bhopal', $is_hub); ?>
    </section>

    <!-- 7. Recent Insights Guides -->
    <section id="recent-insights" class="pt-4">
      <?php 
        $tags = $page_data['recentInsightsTags'] ?? ['local-seo', 'ai-search'];
        echo d4l_render_recent_insights($tags, $city); 
      ?>
    </section>

    <!-- 8. Author Box (Abhishek Raikwar E-E-A-T Signal) -->
    <section id="author-bio" class="pt-4">
      <?php echo d4l_render_author_box($page_data['author'] ?? $author_cfg); ?>
    </section>

    <!-- 9. Final CTA Band -->
    <section class="rounded-3xl bg-gradient-to-br from-[#0A0A0F] via-[#14151A] to-[#1E293B] text-white p-8 sm:p-12 relative overflow-hidden shadow-2xl border border-slate-800">
      <div class="absolute -right-20 -bottom-20 w-96 h-96 rounded-full bg-[#00F0FF]/15 blur-3xl pointer-events-none"></div>
      
      <div class="max-w-3xl mx-auto text-center space-y-6 relative z-10">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono font-bold bg-[#00F0FF]/20 text-[#00F0FF] border border-[#00F0FF]/30">
          ● READY TO DOMINATE <?php echo strtoupper($city); ?> SEARCH?
        </span>

        <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight">
          <?php echo $cta_label; ?>
        </h2>

        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed max-w-xl mx-auto">
          <?php echo $cta_sublabel; ?>
        </p>

        <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
          <a href="<?php echo $wa_url; ?>" target="_blank" rel="noopener noreferrer" class="btn-primary text-sm shadow-xl shadow-[#00F0FF]/25 whitespace-nowrap">
            <span>Message Abhishek on WhatsApp</span>
            <i data-lucide="arrow-right" class="w-4 h-4 shrink-0"></i>
          </a>
          <a href="<?php echo $call_url; ?>" class="btn-glass-white text-sm whitespace-nowrap">
            <i data-lucide="phone" class="w-4 h-4 text-[#00F0FF] shrink-0"></i>
            <span>Call +91 91311 40530</span>
          </a>
        </div>

        <div class="text-[11px] text-slate-400 font-mono pt-2">
          Dedicated Bhopal Team · Asia-Pacific Hub · Sant Aasharam Nagar, Bagmugaliya, Bhopal
        </div>
      </div>
    </section>

  </main>

  <!-- Sticky Mobile Bottom Bar -->
  <?php echo d4l_render_sticky_contact_bar($cta_wa_text); ?>

  <!-- Shared Global Footer -->
  <?php require __DIR__ . '/../footer.php'; ?>

  <!-- Lucide Icons Re-Init -->
  <script>
    if (typeof lucide !== 'undefined') {
      lucide.createIcons();
    }
  </script>

</body>
</html>
        <?php
    }
}
