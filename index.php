<?php
require_once __DIR__ . '/includes/site-config.php';
$index_cfg = get_page_config('index');
$page_title = $index_cfg['meta_title'] ?? $site_config['seo']['default_title'];
$page_description = $index_cfg['meta_description'] ?? $site_config['seo']['meta_description'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once 'includes/seo.php'; ?>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] min-h-screen relative selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <div class="bg-ambient-glow"></div>
  <?php include_once 'includes/header.php'; ?>

  <main class="relative z-10 pt-28 pb-24">
    
    <!-- 1. HERO SECTION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pt-8 pb-16">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        
        <!-- Left Hero Content -->
        <div class="lg:col-span-7 space-y-6 text-left" data-aos="fade-up">
          <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#00F0FF]/15 border border-[#00A8B5]/30 text-xs font-mono font-bold text-[#00A8B5] shadow-sm">
            <span class="w-2 h-2 rounded-full bg-[#16A34A] animate-ping"></span>
            <?php echo htmlspecialchars($index_cfg['badge'] ?? $site_config['hero']['badge']); ?>
          </div>

          <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A] tracking-tight leading-[1.1]">
            <?php echo htmlspecialchars($index_cfg['hero_title'] ?? $site_config['hero']['heading_part1']); ?> <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1D70B8] via-[#00A8B5] to-[#70B22C]"><?php echo htmlspecialchars($index_cfg['hero_highlight'] ?? $site_config['hero']['heading_highlight']); ?></span>
          </h1>

          <p class="text-base sm:text-lg text-[#5B5F6B] leading-relaxed max-w-2xl">
            <?php echo htmlspecialchars($index_cfg['hero_subheading'] ?? $site_config['hero']['subheading']); ?>
          </p>

          <!-- Dual Agency CTAs -->
          <div class="flex flex-wrap items-center gap-4 pt-4">
            <button class="trigger-book-demo btn-primary text-sm px-6 py-3.5 shadow-lg">
              <i data-lucide="calendar" class="w-4 h-4"></i> <?php echo htmlspecialchars($site_config['hero']['cta_primary_text'] ?? 'Book Strategy Session'); ?>
            </button>
            <button class="trigger-book-demo btn-secondary text-sm px-6 py-3.5">
              <i data-lucide="sparkles" class="w-4 h-4"></i> <?php echo htmlspecialchars($site_config['hero']['cta_secondary_text'] ?? 'Claim Free Rank Audit'); ?>
            </button>
          </div>

          <!-- Quick Trust Bullets -->
          <div class="flex flex-wrap items-center gap-6 pt-4 text-xs font-mono text-[#5B5F6B]">
            <span class="flex items-center gap-1.5"><i data-lucide="check-circle" class="w-4 h-4 text-[#16A34A]"></i> Senior Agency Engineers</span>
            <span class="flex items-center gap-1.5"><i data-lucide="check-circle" class="w-4 h-4 text-[#16A34A]"></i> Real-Time Grid Analytics</span>
            <span class="flex items-center gap-1.5"><i data-lucide="check-circle" class="w-4 h-4 text-[#16A34A]"></i> Guaranteed Performance SLA</span>
          </div>
        </div>

        <!-- Right Hero Mockup Image Visual & Floating Micro Badges -->
        <div class="lg:col-span-5 relative">
          <div class="relative rounded-2xl border border-[#E4E7EC] bg-[#FFFFFF] p-2 shadow-2xl overflow-hidden group">
            <img src="assets/images/hero_dashboard_light_v2.png" alt="Digital4Local AI Agency Growth Dashboard" class="w-full h-auto rounded-xl object-cover transform group-hover:scale-[1.01] transition-all duration-500">
            
            <!-- Floating Badge 1 -->
            <div class="absolute top-4 -left-4 bg-[#FFFFFF]/95 backdrop-blur-md border border-[#E4E7EC] p-3.5 rounded-xl shadow-xl flex items-center gap-3 animate-float">
              <div class="w-9 h-9 rounded-lg bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold">
                <i data-lucide="trending-up" class="w-5 h-5"></i>
              </div>
              <div>
                <div class="text-xs font-mono text-[#5B5F6B] uppercase font-bold">AGENCY CLIENT RESULT</div>
                <div class="text-sm font-extrabold text-[#14151A]">+340% Inbound Calls</div>
              </div>
            </div>

            <!-- Floating Badge 2 -->
            <div class="absolute bottom-6 -right-4 bg-[#FFFFFF]/95 backdrop-blur-md border border-[#E4E7EC] p-3.5 rounded-xl shadow-xl flex items-center gap-3 animate-float-delayed">
              <div class="w-9 h-9 rounded-lg bg-[#00F0FF]/20 text-[#00A8B5] flex items-center justify-center font-bold">
                <i data-lucide="bot" class="w-5 h-5"></i>
              </div>
              <div>
                <div class="text-xs font-mono text-[#5B5F6B] uppercase font-bold">CHATGPT CITATION SCORE</div>
                <div class="text-sm font-extrabold text-[#16A34A]">99.4% AI Accuracy</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- 2. STATS & CLIENT COUNTER BAR -->
    <section class="border-y border-[#E4E7EC] bg-[#F6F8FB] py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-8">
        
        <!-- Social Proof Stats Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center pb-8 border-b border-[#E4E7EC]">
          <div class="space-y-1">
            <div class="text-3xl sm:text-5xl font-extrabold text-[#14151A] font-mono count-up" data-target="<?php echo preg_replace('/[^0-9.]/', '', $site_config['stats']['clients_count'] ?? '228'); ?>"><?php echo htmlspecialchars($site_config['stats']['clients_count'] ?? '228+'); ?></div>
            <div class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider"><?php echo htmlspecialchars($site_config['stats']['clients_label'] ?? 'Clients Worked With Us'); ?></div>
          </div>
          <div class="space-y-1">
            <div class="text-3xl sm:text-5xl font-extrabold text-[#14151A] font-mono count-up" data-target="<?php echo preg_replace('/[^0-9.]/', '', $site_config['stats']['revenue_count'] ?? '45'); ?>"><?php echo htmlspecialchars($site_config['stats']['revenue_count'] ?? '$45M+'); ?></div>
            <div class="text-xs font-mono text-[#16A34A] font-bold uppercase tracking-wider"><?php echo htmlspecialchars($site_config['stats']['revenue_label'] ?? 'Client Revenue Generated'); ?></div>
          </div>
          <div class="space-y-1">
            <div class="text-3xl sm:text-5xl font-extrabold text-[#14151A] font-mono count-up" data-target="<?php echo preg_replace('/[^0-9.]/', '', $site_config['stats']['accuracy_count'] ?? '99.4'); ?>"><?php echo htmlspecialchars($site_config['stats']['accuracy_count'] ?? '99.4%'); ?></div>
            <div class="text-xs font-mono text-[#8B5CF6] font-bold uppercase tracking-wider"><?php echo htmlspecialchars($site_config['stats']['accuracy_label'] ?? 'Geo-Grid Rank Accuracy'); ?></div>
          </div>
          <div class="space-y-1">
            <div class="text-3xl sm:text-5xl font-extrabold text-[#14151A] font-mono count-up" data-target="<?php echo preg_replace('/[^0-9.]/', '', $site_config['stats']['markets_count'] ?? '500'); ?>"><?php echo htmlspecialchars($site_config['stats']['markets_count'] ?? '500+'); ?></div>
            <div class="text-xs font-mono text-[#D97706] font-bold uppercase tracking-wider"><?php echo htmlspecialchars($site_config['stats']['markets_label'] ?? 'Metro Markets Dominated'); ?></div>
          </div>
        </div>

        <!-- Trust Badges Strip -->
        <div class="pt-8">
          <?php include 'includes/trust-strip.php'; ?>
        </div>

      </div>
    </section>

    <!-- 3. WHY CHOOSE DIGITAL4LOCAL -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 py-24 sm:py-32" data-aos="fade-up">
      <div class="text-center space-y-4 max-w-3xl mx-auto mb-16">
        <span class="pulse-badge"><?php echo htmlspecialchars($site_config['why_choose_us']['badge']); ?></span>
        <h2 class="text-3xl sm:text-5xl font-extrabold text-[#14151A] tracking-tight">
          <?php echo htmlspecialchars($site_config['why_choose_us']['heading']); ?>
        </h2>
        <p class="text-base text-[#5B5F6B] leading-relaxed">
          <?php echo htmlspecialchars($site_config['why_choose_us']['subheading']); ?>
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Feature 1 -->
        <div class="card-dark p-8 space-y-4 relative overflow-hidden group">
          <div class="w-12 h-12 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold">
            <i data-lucide="map-pin" class="w-6 h-6"></i>
          </div>
          <h3 class="text-xl font-bold text-[#14151A]"><?php echo htmlspecialchars($site_config['why_choose_us']['feature1_title']); ?></h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            <?php echo htmlspecialchars($site_config['why_choose_us']['feature1_desc']); ?>
          </p>
          <ul class="space-y-2 text-xs font-mono text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 25-Point Zip Code Geo Grid Matrix</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Competitor Spam Removal Protocol</li>
          </ul>
        </div>

        <!-- Feature 2 -->
        <div class="card-dark p-8 space-y-4 relative overflow-hidden group">
          <div class="w-12 h-12 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold">
            <i data-lucide="bot" class="w-6 h-6"></i>
          </div>
          <h3 class="text-xl font-bold text-[#14151A]"><?php echo htmlspecialchars($site_config['why_choose_us']['feature3_title']); ?></h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            <?php echo htmlspecialchars($site_config['why_choose_us']['feature3_desc']); ?>
          </p>
          <ul class="space-y-2 text-xs font-mono text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> ChatGPT, Perplexity & SearchGPT Prompt Citation</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Wikidata & Knowledge Graph Ingestion</li>
          </ul>
        </div>

        <!-- Feature 3 -->
        <div class="card-dark p-8 space-y-4 relative overflow-hidden group">
          <div class="w-12 h-12 rounded-xl bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold">
            <i data-lucide="cpu" class="w-6 h-6"></i>
          </div>
          <h3 class="text-xl font-bold text-[#14151A]"><?php echo htmlspecialchars($site_config['why_choose_us']['feature2_title']); ?></h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            <?php echo htmlspecialchars($site_config['why_choose_us']['feature2_desc']); ?>
          </p>
          <ul class="space-y-2 text-xs font-mono text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Instant Lead Enrichment & CRM Sync</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 24/7 Voice & Chat AI Auto-responders</li>
          </ul>
        </div>

        <!-- Feature 4 -->
        <div class="card-dark p-8 space-y-4 relative overflow-hidden group">
          <div class="w-12 h-12 rounded-xl bg-[#D97706]/15 text-[#D97706] flex items-center justify-center font-bold">
            <i data-lucide="code" class="w-6 h-6"></i>
          </div>
          <h3 class="text-xl font-bold text-[#14151A]"><?php echo htmlspecialchars($site_config['why_choose_us']['feature4_title']); ?></h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            <?php echo htmlspecialchars($site_config['why_choose_us']['feature4_desc']); ?>
          </p>
          <ul class="space-y-2 text-xs font-mono text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 100/100 Core Web Vitals Optimization</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Native & Cross-Platform App Development</li>
          </ul>
        </div>

      </div>
    </section>

    <!-- 4. EXPANDED 8-SERVICE BENTO GRID -->
    <section id="services-grid" class="max-w-7xl mx-auto px-4 sm:px-8 py-24 sm:py-32" data-aos="fade-up">
      <div class="text-center space-y-4 max-w-3xl mx-auto mb-16">
        <span class="pulse-badge">AGENCY SERVICE CATALOG</span>
        <h2 class="text-3xl sm:text-5xl font-extrabold text-[#14151A] tracking-tight">
          Our 8 Integrated <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1D70B8] to-[#70B22C]">Growth Services</span>
        </h2>
        <p class="text-base text-[#5B5F6B] leading-relaxed">
          From Google Map dominance to custom software development, discover our 8 dedicated agency service verticals.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <!-- Service 1: Local SEO -->
        <a href="services/local-seo.php" class="card-dark p-6 space-y-4 flex flex-col justify-between group md:col-span-2">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-lg bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold">1</div>
            <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase">MAP GRID RANKING</span>
            <h3 class="text-xl font-bold text-[#14151A] group-hover:text-[#00A8B5] transition-colors">Local SEO & Google Maps 3-Pack</h3>
            <p class="text-xs text-[#5B5F6B] leading-relaxed">
              Capture high-intent local phone calls and directions with real-time 5x5 zip code grid tracking, GBP optimization, and citation spam removal.
            </p>
          </div>
          <div class="flex items-center justify-between text-xs font-mono text-[#00A8B5] border-t border-[#E4E7EC] pt-4 font-bold">
            <span>Explore Local SEO →</span>
            <span>Retainers from ₹<?php echo number_format((int)($site_config['pricing']['retainer_local_seo'] ?? 9999)); ?>/mo</span>
          </div>
        </a>

        <!-- Service 2: GEO / AEO -->
        <a href="services/geo-aeo.php" class="card-dark p-6 space-y-4 flex flex-col justify-between group md:col-span-2">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-lg bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold">2</div>
            <span class="text-xs font-mono text-[#16A34A] font-bold uppercase">AI ANSWER ENGINES</span>
            <h3 class="text-xl font-bold text-[#14151A] group-hover:text-[#16A34A] transition-colors">GEO & AEO Optimization</h3>
            <p class="text-xs text-[#5B5F6B] leading-relaxed">
              Structure entity vectors, JSON-LD schema graphs, and Wikidata nodes to get cited as the #1 recommended answer by ChatGPT, Perplexity & Gemini.
            </p>
          </div>
          <div class="flex items-center justify-between text-xs font-mono text-[#16A34A] border-t border-[#E4E7EC] pt-4 font-bold">
            <span>Explore GEO & AEO →</span>
            <span>Retainers from ₹<?php echo number_format((int)($site_config['pricing']['retainer_geo_aeo'] ?? 12999)); ?>/mo</span>
          </div>
        </a>

        <!-- Service 3: Technical SEO -->
        <a href="services/technical-seo.php" class="card-dark p-6 space-y-4 flex flex-col justify-between group">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-lg bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold">3</div>
            <span class="text-xs font-mono text-[#8B5CF6] font-bold uppercase">INFRASTRUCTURE</span>
            <h3 class="text-lg font-bold text-[#14151A] group-hover:text-[#8B5CF6] transition-colors">Technical SEO & Web Vitals</h3>
            <p class="text-xs text-[#5B5F6B]">Eliminate crawl blocks, fix sitemap errors, and achieve 95+ Core Web Vitals scores.</p>
          </div>
          <span class="text-xs font-mono text-[#8B5CF6] font-bold">Details →</span>
        </a>

        <!-- Service 4: Link Building & PR -->
        <a href="services/link-building-pr.php" class="card-dark p-6 space-y-4 flex flex-col justify-between group">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-lg bg-[#D97706]/15 text-[#D97706] flex items-center justify-center font-bold">4</div>
            <span class="text-xs font-mono text-[#D97706] font-bold uppercase">DOMAIN AUTHORITY</span>
            <h3 class="text-lg font-bold text-[#14151A] group-hover:text-[#D97706] transition-colors">Link Building & Digital PR</h3>
            <p class="text-xs text-[#5B5F6B]">Acquire high-DR (DR 60-90+) editorial backlinks and targeted press release placement.</p>
          </div>
          <span class="text-xs font-mono text-[#D97706] font-bold">Details →</span>
        </a>

        <!-- Service 5: AI Marketing -->
        <a href="services/ai-marketing.php" class="card-dark p-6 space-y-4 flex flex-col justify-between group">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-lg bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold">5</div>
            <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase">AUTOMATION</span>
            <h3 class="text-lg font-bold text-[#14151A] group-hover:text-[#00A8B5] transition-colors">AI Marketing & n8n Workflows</h3>
            <p class="text-xs text-[#5B5F6B]">Deploy 24/7 lead qualification workflows, automated CRM enrichment, and AI chat agents.</p>
          </div>
          <span class="text-xs font-mono text-[#00A8B5] font-bold">Details →</span>
        </a>

        <!-- Service 6: Social Media -->
        <a href="services/social-media.php" class="card-dark p-6 space-y-4 flex flex-col justify-between group">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-lg bg-[#EC4899]/15 text-[#EC4899] flex items-center justify-center font-bold">6</div>
            <span class="text-xs font-mono text-[#EC4899] font-bold uppercase">BRAND VIRALITY</span>
            <h3 class="text-lg font-bold text-[#14151A] group-hover:text-[#EC4899] transition-colors">Social Media & Growth</h3>
            <p class="text-xs text-[#5B5F6B]">Short-form video production (Reels/Shorts), founder personal branding, and organic lead funnels.</p>
          </div>
          <span class="text-xs font-mono text-[#EC4899] font-bold">Details →</span>
        </a>

        <!-- Service 7: Web Development -->
        <a href="services/web-development.php" class="card-dark p-6 space-y-4 flex flex-col justify-between group md:col-span-2">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-lg bg-[#00A8B5]/15 text-[#00A8B5] flex items-center justify-center font-bold">7</div>
            <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase">WEB ENGINEERING</span>
            <h3 class="text-xl font-bold text-[#14151A] group-hover:text-[#00A8B5] transition-colors">Custom Web Development</h3>
            <p class="text-xs text-[#5B5F6B]">Engineering static landing pages, dynamic CMS websites, and custom SaaS web applications built for speed and lead capture.</p>
          </div>
          <div class="flex items-center justify-between text-xs font-mono text-[#00A8B5] border-t border-[#E4E7EC] pt-4 font-bold">
            <span>Explore Web Dev →</span>
            <span>Setup from ₹<?php echo number_format((int)($site_config['pricing']['setup_web_dev'] ?? 24999)); ?></span>
          </div>
        </a>

        <!-- Service 8: App Development -->
        <a href="services/app-development.php" class="card-dark p-6 space-y-4 flex flex-col justify-between group md:col-span-2">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-lg bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold">8</div>
            <span class="text-xs font-mono text-[#8B5CF6] font-bold uppercase">MOBILE ENGINEERING</span>
            <h3 class="text-xl font-bold text-[#14151A] group-hover:text-[#8B5CF6] transition-colors">Native & Cross-Platform App Development</h3>
            <p class="text-xs text-[#5B5F6B]">Designing and publishing high-performance iOS, Android, and Flutter/React Native mobile apps for customer booking and SaaS platforms.</p>
          </div>
          <div class="flex items-center justify-between text-xs font-mono text-[#8B5CF6] border-t border-[#E4E7EC] pt-4 font-bold">
            <span>Explore App Dev →</span>
            <span>Setup from ₹<?php echo number_format((int)($site_config['pricing']['setup_app_dev'] ?? 79999)); ?></span>
          </div>
        </a>

      </div>
    </section>

    <!-- 4.5. TOOLS & AI WE USE -->
    <?php 
    $current_stack_key = 'home';
    include 'includes/tools-stack.php'; 
    ?>

    <!-- 5. INTERACTIVE AI SEARCH SPOTLIGHT -->
    <section class="max-w-5xl mx-auto px-4 py-16">
      <div class="card-elevated p-8 md:p-12 space-y-6 border-2 border-[#00A8B5]">
        <div class="flex items-center justify-between flex-wrap gap-4 border-b border-[#E4E7EC] pb-4">
          <div>
            <span class="pulse-badge">AGENCY DEMO</span>
            <h3 class="text-2xl font-bold text-[#14151A] mt-2">See How AI Answer Engines Cite Agency Clients</h3>
          </div>
          <div class="flex items-center gap-2">
            <button class="ai-spotlight-tab active px-4 py-2 rounded-xl text-xs font-mono font-bold bg-[#00F0FF]/15 border border-[#00A8B5] text-[#00A8B5]" data-scenario="local">Local Map Grid</button>
            <button class="ai-spotlight-tab px-4 py-2 rounded-xl text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]" data-scenario="startup">Startup AI Stack</button>
            <button class="ai-spotlight-tab px-4 py-2 rounded-xl text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]" data-scenario="saas">SaaS Enterprise</button>
          </div>
        </div>

        <div class="bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl p-6 space-y-4 font-mono text-xs">
          <div class="text-[#5B5F6B]">Simulated Prompt Query:</div>
          <div id="ai-query-display" class="text-sm font-bold text-[#14151A] italic">"Who is the highest-rated emergency dental surgeon in Austin with same-day AI scheduling?"</div>
          
          <div class="border-t border-[#E4E7EC] pt-4 text-[#14151A]">
            <div id="ai-response-box" class="space-y-2 leading-relaxed">
              Based on verified local patient reviews, live Google Maps index, and booking speed:
              <br><br>
              1. <strong>Austin Apex Dental & Facial Surgery</strong> (Score: 99.4/100)
              <br>
              - <strong>Highlights</strong>: Same-day emergency appointments, 4.9★ (380+ reviews), instant AI triage portal.
              <br>
              - <strong>Location</strong>: Central Austin (0.4 mi away)
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 6. CLIENT TESTIMONIALS SECTION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 py-24 sm:py-32" data-aos="fade-up">
      <div class="text-center space-y-4 max-w-3xl mx-auto mb-16">
        <span class="pulse-badge">VERIFIED CLIENT RESULTS</span>
        <h2 class="text-3xl sm:text-5xl font-extrabold text-[#14151A] tracking-tight">
          Loved By Founders & <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1D70B8] via-[#00A8B5] to-[#70B22C]">Search Strategists</span>
        </h2>
        <p class="text-base text-[#5B5F6B] leading-relaxed">
          Read how businesses across dentistry, legal, technology, and home services achieved exponential growth working with Digital4Local.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <div class="card-dark p-6 space-y-4 flex flex-col justify-between">
          <div class="space-y-3">
            <div class="flex items-center gap-1 text-[#D97706]">★ ★ ★ ★ ★</div>
            <p class="text-xs text-[#5B5F6B] leading-relaxed italic">
              "We jumped from position #14 to average #1.2 across our 7-mile radius grid in less than 90 days. Phone calls increased by 340%."
            </p>
          </div>
          <div class="border-t border-[#E4E7EC] pt-4 flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-[#00F0FF]/20 text-[#00A8B5] flex items-center justify-center font-bold text-xs font-mono">DR</div>
            <div>
              <div class="text-xs font-bold text-[#14151A]">Dr. Robert Vance</div>
              <div class="text-[10px] text-[#5B5F6B]">Austin Apex Dental • <span class="text-[#16A34A] font-bold">+340% Calls</span></div>
            </div>
          </div>
        </div>

        <div class="card-dark p-6 space-y-4 flex flex-col justify-between">
          <div class="space-y-3">
            <div class="flex items-center gap-1 text-[#D97706]">★ ★ ★ ★ ★</div>
            <p class="text-xs text-[#5B5F6B] leading-relaxed italic">
              "ChatGPT and Perplexity now cite our SaaS platform as the #1 workflow engine. Our inbound organic demo requests doubled."
            </p>
          </div>
          <div class="border-t border-[#E4E7EC] pt-4 flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-[#16A34A]/20 text-[#16A34A] flex items-center justify-center font-bold text-xs font-mono">SL</div>
            <div>
              <div class="text-xs font-bold text-[#14151A]">Sarah Lin</div>
              <div class="text-[10px] text-[#5B5F6B]">ScaleFlow AI • <span class="text-[#16A34A] font-bold">4.2x ROI</span></div>
            </div>
          </div>
        </div>

        <div class="card-dark p-6 space-y-4 flex flex-col justify-between">
          <div class="space-y-3">
            <div class="flex items-center gap-1 text-[#D97706]">★ ★ ★ ★ ★</div>
            <p class="text-xs text-[#5B5F6B] leading-relaxed italic">
              "The n8n lead automations respond to legal inquiries in sub-60 seconds. Our conversion rate shot up immediately."
            </p>
          </div>
          <div class="border-t border-[#E4E7EC] pt-4 flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-[#8B5CF6]/20 text-[#8B5CF6] flex items-center justify-center font-bold text-xs font-mono">MK</div>
            <div>
              <div class="text-xs font-bold text-[#14151A]">Marcus Kapoor</div>
              <div class="text-[10px] text-[#5B5F6B]">Metro Legal • <span class="text-[#16A34A] font-bold">$1.2M Pipeline</span></div>
            </div>
          </div>
        </div>

        <div class="card-dark p-6 space-y-4 flex flex-col justify-between">
          <div class="space-y-3">
            <div class="flex items-center gap-1 text-[#D97706]">★ ★ ★ ★ ★</div>
            <p class="text-xs text-[#5B5F6B] leading-relaxed italic">
              "They delivered our custom web app with 99/100 Google Web Vitals scores in just 3 weeks. Outstanding technical execution."
            </p>
          </div>
          <div class="border-t border-[#E4E7EC] pt-4 flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-[#D97706]/20 text-[#D97706] flex items-center justify-center font-bold text-xs font-mono">EH</div>
            <div>
              <div class="text-xs font-bold text-[#14151A]">Eric Hayes</div>
              <div class="text-[10px] text-[#5B5F6B]">Apex HVAC • <span class="text-[#16A34A] font-bold">99/100 Vitals</span></div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- 7. FAQS -->
    <section class="max-w-4xl mx-auto px-4 py-24 sm:py-32" data-aos="fade-up">
      <div class="text-center space-y-4 mb-16">
        <span class="pulse-badge">AGENCY FAQS</span>
        <h2 class="text-3xl sm:text-5xl font-extrabold text-[#14151A] tracking-tight">
          Frequently Asked <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1D70B8] to-[#70B22C]">Questions</span>
        </h2>
      </div>

      <div class="space-y-4">
        
        <div class="faq-item card-dark p-6 cursor-pointer">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How long does it take to rank on Google Maps 3-Pack?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Initial geo-grid movement is usually visible within 30 to 45 days. Top 3-pack rankings across target zip codes typically solidify between days 60 and 90 as review velocity and citations index.
          </div>
        </div>

        <div class="faq-item card-dark p-6 cursor-pointer">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What is GEO & AEO optimization and how does it help my business?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            GEO (Generative Engine Optimization) structures your entity vectors and JSON-LD schema so Large Language Models like ChatGPT, Claude, and Perplexity synthesize your brand into direct prompt recommendations.
          </div>
        </div>

        <div class="faq-item card-dark p-6 cursor-pointer">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Why are Setup Fee and Monthly Plan listed separately?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            The One-Time Setup Fee covers complete custom website or mobile app engineering and initial entity setup, while the Monthly Plan covers ongoing SEO, GEO citations, link building, and account management.
          </div>
        </div>

        <div class="faq-item card-dark p-6 cursor-pointer">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Can I select just one individual agency service?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Yes! You can choose bundled growth packages on our pricing page or select individual agency retainers (e.g. just Local SEO or just Web Development) directly on each service page.
          </div>
        </div>

        <div class="faq-item card-dark p-6 cursor-pointer">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Do you support multi-currency pricing for global clients?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Yes! We accept payments in INR (₹), USD ($), and GBP (£) with transparent multi-currency toggles across our entire platform.
          </div>
        </div>

      </div>
    </section>

    <!-- 8. RECENT PUBLISHED BLOG ARTICLES & RESEARCH -->
    <?php include_once 'includes/recent-blogs.php'; ?>

    <!-- 9. GLOBAL HIGH-IMPACT CTA BANNER -->
    <section class="max-w-5xl mx-auto px-4 pt-12 pb-16 text-center">
      <div class="card-elevated p-10 sm:p-16 border-2 border-[#00A8B5] relative overflow-hidden bg-gradient-to-br from-[#FFFFFF] via-[#F6F8FB] to-[#EEF2F6]">
        <div class="max-w-3xl mx-auto space-y-6">
          <span class="pulse-badge">GROW YOUR INBOUND REVENUE</span>
          <h2 class="text-3xl sm:text-5xl font-extrabold text-[#14151A]">
            Ready to Scale Inbound Client Revenue? Claim Your Free Audit.
          </h2>
          <p class="text-base text-[#5B5F6B] max-w-xl mx-auto">
            Join <?php echo htmlspecialchars($site_config['stats']['clients_count'] ?? '228+'); ?> businesses growing with Digital4Local's AI engine. Book a 15-minute live audit session today.
          </p>
          <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
            <button class="trigger-book-demo btn-primary text-sm px-8 py-4 shadow-xl">
              <i data-lucide="calendar" class="w-5 h-5"></i> <?php echo htmlspecialchars($site_config['hero']['cta_primary_text'] ?? 'Book Strategy Session'); ?>
            </button>
            <a href="contact.php" class="btn-secondary text-sm px-8 py-4">
              <i data-lucide="mail" class="w-5 h-5"></i> Contact Senior Strategist
            </a>
          </div>
          <p class="text-xs font-mono text-[#5B5F6B] pt-4">
            ✓ Guaranteed Performance SLA &nbsp;|&nbsp; ✓ Instant calendar booking &nbsp;|&nbsp; ✓ Sub-2hr response SLA
          </p>
        </div>
      </div>
    </section>

  </main>

  <?php include_once 'includes/footer.php'; ?>
</body>
</html>
