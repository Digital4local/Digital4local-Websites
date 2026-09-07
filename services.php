<?php
require_once __DIR__ . '/includes/site-config.php';
$srv_cfg = get_page_config('services');
$page_title = $srv_cfg['meta_title'] ?? "Services Suite | Digital4Local - AI SEO, GEO, Web & App Development";
$page_description = $srv_cfg['meta_description'] ?? "Explore Digital4Local's 8 core services: Local SEO, GEO & AEO, Technical SEO, Link Building & PR, AI Marketing, Social Media, Web Development, and App Development.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once 'includes/seo.php'; ?>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] min-h-screen relative selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <div class="bg-ambient-glow"></div>
  <?php include_once 'includes/header.php'; ?>

  <main class="relative z-10 pt-32 pb-24">
    <!-- Header Hero -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 text-center space-y-6 pb-20" data-aos="fade-up">
      <span class="pulse-badge"><?php echo htmlspecialchars($srv_cfg['badge'] ?? 'COMPLETE GROWTH & ENGINEERING STACK'); ?></span>
      <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-[#14151A]">
        <?php echo htmlspecialchars($srv_cfg['hero_title'] ?? '8 Core Services For'); ?> <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1D70B8] via-[#00A8B5] to-[#70B22C]"><?php echo htmlspecialchars($srv_cfg['hero_highlight'] ?? 'Search, AI & Web Domination'); ?></span>
      </h1>
      <p class="text-base sm:text-lg text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
        <?php echo htmlspecialchars($srv_cfg['hero_subheading'] ?? 'From local Google Map Pack rankings and ChatGPT AI citations to conversion-first websites and scalable mobile apps.'); ?>
      </p>
    </section>

    <!-- Services Grid Overview (8 Services Grid) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 space-y-12">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        
        <!-- 1. Local SEO -->
        <div class="card-dark p-6 space-y-4 flex flex-col justify-between group hover:border-[#00A8B5]">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold">
              <i data-lucide="map-pin" class="w-5 h-5"></i>
            </div>
            <h2 class="text-xl font-bold text-[#14151A]">Local SEO & Google Maps</h2>
            <p class="text-[#5B5F6B] text-xs leading-relaxed">
              Capture high-intent local customers on Google Maps & organic search. GBP optimization, geo-citations, and real-time rank tracking.
            </p>
          </div>
          <a href="services/local-seo.php" class="btn-primary w-full text-xs text-center justify-center">
            Explore Local SEO <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
        </div>

        <!-- 2. GEO & AEO -->
        <div class="card-dark p-6 space-y-4 flex flex-col justify-between group hover:border-[#16A34A]">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-[#00F59B]/20 text-[#16A34A] flex items-center justify-center font-bold">
              <i data-lucide="bot" class="w-5 h-5"></i>
            </div>
            <h2 class="text-xl font-bold text-[#14151A]">GEO & AEO Optimization</h2>
            <p class="text-[#5B5F6B] text-xs leading-relaxed">
              Be cited as the primary authority when users prompt ChatGPT, Perplexity, or Gemini. Entity graph matching & AI answer formatting.
            </p>
          </div>
          <a href="services/geo-aeo.php" class="btn-primary w-full text-xs text-center justify-center">
            Explore GEO & AEO <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
        </div>

        <!-- 3. Technical SEO -->
        <div class="card-dark p-6 space-y-4 flex flex-col justify-between group hover:border-[#8B5CF6]">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold">
              <i data-lucide="code" class="w-5 h-5"></i>
            </div>
            <h2 class="text-xl font-bold text-[#14151A]">Technical SEO Audit</h2>
            <p class="text-[#5B5F6B] text-xs leading-relaxed">
              Eliminate crawl blocks, optimize Core Web Vitals to 95+, and implement dynamic Schema microdata architecture.
            </p>
          </div>
          <a href="services/technical-seo.php" class="btn-primary w-full text-xs text-center justify-center">
            Explore Technical SEO <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
        </div>

        <!-- 4. Link Building & PR -->
        <div class="card-dark p-6 space-y-4 flex flex-col justify-between group hover:border-[#D97706]">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-[#D97706]/15 text-[#D97706] flex items-center justify-center font-bold">
              <i data-lucide="newspaper" class="w-5 h-5"></i>
            </div>
            <h2 class="text-xl font-bold text-[#14151A]">Link Building & Digital PR</h2>
            <p class="text-[#5B5F6B] text-xs leading-relaxed">
              Build unshakeable domain authority with editorial backlinks from DR 60–90+ publications & press release syndication.
            </p>
          </div>
          <a href="services/link-building-pr.php" class="btn-primary w-full text-xs text-center justify-center">
            Explore Link Building <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
        </div>

        <!-- 5. AI Marketing Stack -->
        <div class="card-dark p-6 space-y-4 flex flex-col justify-between group hover:border-[#00A8B5]">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold">
              <i data-lucide="cpu" class="w-5 h-5"></i>
            </div>
            <h2 class="text-xl font-bold text-[#14151A]">AI Digital Marketing</h2>
            <p class="text-[#5B5F6B] text-xs leading-relaxed">
              Deploy automated n8n lead workflows, WhatsApp auto-responders, CRM data enrichment, and 24/7 AI chat agents.
            </p>
          </div>
          <a href="services/ai-marketing.php" class="btn-primary w-full text-xs text-center justify-center">
            Explore AI Marketing <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
        </div>

        <!-- 6. Social Media & Personal Brand -->
        <div class="card-dark p-6 space-y-4 flex flex-col justify-between group hover:border-[#EC4899]">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-[#EC4899]/15 text-[#EC4899] flex items-center justify-center font-bold">
              <i data-lucide="share-2" class="w-5 h-5"></i>
            </div>
            <h2 class="text-xl font-bold text-[#14151A]">Social Media Growth</h2>
            <p class="text-[#5B5F6B] text-xs leading-relaxed">
              Scale organic brand authority and high-engagement short-form video funnels across LinkedIn, Instagram, and YouTube Shorts.
            </p>
          </div>
          <a href="services/social-media.php" class="btn-primary w-full text-xs text-center justify-center">
            Explore Social Media <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
        </div>

        <!-- 7. Web Development -->
        <div class="card-dark p-6 space-y-4 flex flex-col justify-between group hover:border-[#00A8B5]">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-[#00A8B5]/15 text-[#00A8B5] flex items-center justify-center font-bold">
              <i data-lucide="layout" class="w-5 h-5"></i>
            </div>
            <h2 class="text-xl font-bold text-[#14151A]">Web Development</h2>
            <p class="text-[#5B5F6B] text-xs leading-relaxed">
              Custom high-speed website and dynamic CMS builds engineered with Tailwind CSS and PHP for sub-second speeds and maximum conversions.
            </p>
          </div>
          <a href="services/web-development.php" class="btn-primary w-full text-xs text-center justify-center">
            Explore Web Dev <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
        </div>

        <!-- 8. App Development -->
        <div class="card-dark p-6 space-y-4 flex flex-col justify-between group hover:border-[#8B5CF6]">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold">
              <i data-lucide="smartphone" class="w-5 h-5"></i>
            </div>
            <h2 class="text-xl font-bold text-[#14151A]">App Development</h2>
            <p class="text-[#5B5F6B] text-xs leading-relaxed">
              High-performance iOS, Android, and Flutter/React Native mobile applications for customer booking, customer portals, and SaaS platforms.
            </p>
          </div>
          <a href="services/app-development.php" class="btn-primary w-full text-xs text-center justify-center">
            Explore App Dev <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
        </div>

      </div>
    </section>

    <!-- Recent Published Research & Articles -->
    <?php include_once 'includes/recent-blogs.php'; ?>

    <!-- Bottom CTA Band -->
    <section class="max-w-4xl mx-auto px-4 pt-16 text-center">
      <div class="card-dark bg-[#F6F8FB] border border-[#E2E8F0] p-10 rounded-2xl space-y-4">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] font-['Montserrat',sans-serif]">Need a custom hybrid growth package?</h2>
        <p class="text-[#5B5F6B] text-xs">We craft tailored combinations of Web Builds, Local SEO, and AI Lead Automations.</p>
        <div class="pt-2">
          <button class="trigger-book-demo btn-primary">
            <i data-lucide="calendar" class="w-4 h-4"></i> Schedule Custom Scope Call
          </button>
        </div>
      </div>
    </section>
  </main>

  <?php include_once 'includes/footer.php'; ?>
</body>
</html>
