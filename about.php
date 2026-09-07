<?php
require_once __DIR__ . '/includes/site-config.php';
$abt_cfg = get_page_config('about');
$page_title = $abt_cfg['meta_title'] ?? "About Us | Digital4Local AI Growth Agency";
$page_description = $abt_cfg['meta_description'] ?? "Learn how Digital4Local combines autonomous n8n workflows and Generative Engine Optimization.";
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
    <!-- Hero -->
    <section class="max-w-4xl mx-auto px-4 text-center space-y-6 pb-20" data-aos="fade-up">
      <span class="pulse-badge"><?php echo htmlspecialchars($abt_cfg['badge'] ?? 'OUR STORY & MISSION'); ?></span>
      <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A] tracking-tight">
        <?php echo htmlspecialchars($abt_cfg['hero_title'] ?? 'Engineering the Future of'); ?> <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1D70B8] via-[#00A8B5] to-[#70B22C]"><?php echo htmlspecialchars($abt_cfg['hero_highlight'] ?? 'Local Business Growth'); ?></span>
      </h1>
      <p class="text-lg text-[#5B5F6B] leading-relaxed"><?php echo htmlspecialchars($abt_cfg['hero_subheading'] ?? 'We are a team of AI engineers, search strategists, and software developers committed to delivering measurable revenue growth for local brands.'); ?></p>
    </section>

    <!-- Mission & Philosophy -->
    <section class="max-w-5xl mx-auto px-4 pb-20">
      <div class="card-dark p-8 md:p-12 space-y-6 bg-[#F6F8FB]">
        <h2 class="text-xs font-mono text-[#00A8B5] uppercase tracking-wider font-bold">OUR MISSION</h2>
        <h3 class="text-2xl sm:text-3xl font-bold text-[#14151A]"><?php echo htmlspecialchars($abt_cfg['mission_heading'] ?? 'Legacy SEO Is Slow. AI Search Is Exponential.'); ?></h3>
        <p class="text-[#5B5F6B] text-base leading-relaxed">
          <?php echo htmlspecialchars($abt_cfg['mission_text1'] ?? 'Traditional SEO agencies sell manual monthly PDF reports and slow keyword updates. Digital4Local was founded on a simple thesis: algorithm updates happen daily, and AI search engines like ChatGPT and Perplexity are completely changing how buyers find services.'); ?>
        </p>
        <p class="text-[#5B5F6B] text-base leading-relaxed">
          <?php echo htmlspecialchars($abt_cfg['mission_text2'] ?? 'We engineered proprietary n8n automation pipelines, real-time Google Maps grid rank monitoring, and entity-graph vector indexing to give local businesses, startups, and SaaS platforms an unfair competitive advantage in organic search.'); ?>
        </p>
      </div>
    </section>

    <!-- Tech Stack Grid -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-20">
      <h2 class="text-2xl font-bold text-[#14151A] mb-8 text-center">Engineered On A Modern Tech Stack</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="card-dark p-6 text-center space-y-2">
          <div class="text-[#00A8B5] font-mono font-bold text-xl">n8n Enterprise</div>
          <div class="text-xs text-[#5B5F6B]">Autonomous Workflow Orchestration</div>
        </div>
        <div class="card-dark p-6 text-center space-y-2">
          <div class="text-[#16A34A] font-mono font-bold text-xl">OpenAI & Perplexity</div>
          <div class="text-xs text-[#5B5F6B]">LLM Citation Vector Ingestion</div>
        </div>
        <div class="card-dark p-6 text-center space-y-2">
          <div class="text-[#8B5CF6] font-mono font-bold text-xl">Python Geo-Scrapers</div>
          <div class="text-xs text-[#5B5F6B]">Real-time 5x5 Map Grid Parsing</div>
        </div>
        <div class="card-dark p-6 text-center space-y-2">
          <div class="text-[#D97706] font-mono font-bold text-xl">Lighthouse Core</div>
          <div class="text-xs text-[#5B5F6B]">Sub-Second Web Vitals Auditing</div>
        </div>
      </div>
    </section>

    <!-- Timeline & Milestones -->
    <section class="max-w-4xl mx-auto px-4 pb-20">
      <h2 class="text-2xl font-bold text-[#14151A] mb-12 text-center">Company Milestones</h2>
      <div class="space-y-8 relative border-l border-[#E4E7EC] ml-4 pl-8">
        <div class="relative">
          <div class="absolute -left-[41px] top-1 w-4 h-4 rounded-full bg-[#00A8B5] border-4 border-[#FFFFFF]"></div>
          <span class="text-xs font-mono text-[#00A8B5] font-bold">2022 — FOUNDED</span>
          <h3 class="text-lg font-bold text-[#14151A]">Digital4Local Launch</h3>
          <p class="text-xs text-[#5B5F6B]">Started with a single mission: bring algorithmic precision to local Google Map ranking.</p>
        </div>
        <div class="relative">
          <div class="absolute -left-[41px] top-1 w-4 h-4 rounded-full bg-[#16A34A] border-4 border-[#FFFFFF]"></div>
          <span class="text-xs font-mono text-[#16A34A] font-bold">2023 — SCALE</span>
          <h3 class="text-lg font-bold text-[#14151A]">Geo-Grid Rank Matrix Engine</h3>
          <p class="text-xs text-[#5B5F6B]">Launched real-time map grid rank tracking across 50+ US & UK metros.</p>
        </div>
        <div class="relative">
          <div class="absolute -left-[41px] top-1 w-4 h-4 rounded-full bg-[#8B5CF6] border-4 border-[#FFFFFF]"></div>
          <span class="text-xs font-mono text-[#8B5CF6] font-bold">2024 — INNOVATION</span>
          <h3 class="text-lg font-bold text-[#14151A]">GEO & AEO Citation AI Stack</h3>
          <p class="text-xs text-[#5B5F6B]">Pioneered vector entity graph optimization for ChatGPT, Claude, and Perplexity answer engines.</p>
        </div>
        <div class="relative">
          <div class="absolute -left-[41px] top-1 w-4 h-4 rounded-full bg-[#D97706] border-4 border-[#FFFFFF]"></div>
          <span class="text-xs font-mono text-[#D97706] font-bold">2025 — PRESENT</span>
          <h3 class="text-lg font-bold text-[#14151A]">500+ Active Clients & Global Reach</h3>
          <p class="text-xs text-[#5B5F6B]">Managing over 2M organic search monthly queries across USD, GBP, and INR markets.</p>
        </div>
      </div>
    </section>

    <!-- Leadership / E-E-A-T Block -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-20">
      <h2 class="text-2xl sm:text-3xl font-bold text-[#14151A] mb-8 text-center font-['Montserrat',sans-serif]">Senior Growth Leadership</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="card-dark p-6 space-y-4 text-center rounded-2xl bg-white border border-[#E2E8F0] shadow-sm">
          <div class="w-20 h-20 rounded-full bg-[#1B5FAA]/15 text-[#1B5FAA] mx-auto flex items-center justify-center font-bold text-2xl font-mono">AR</div>
          <div>
            <h3 class="font-bold text-[#14151A] text-lg font-['Montserrat',sans-serif]">Abhishek Raikwar</h3>
            <p class="text-xs text-[#1B5FAA] font-bold">Founder & Head of Search & AI Strategy</p>
          </div>
          <p class="text-xs text-[#5B5F6B]">5+ years pioneering local Google Maps 3-Pack rank acceleration and Generative Engine Optimization (GEO/AEO) vector indexing.</p>
        </div>
        <div class="card-dark p-6 space-y-4 text-center rounded-2xl bg-white border border-[#E2E8F0] shadow-sm">
          <div class="w-20 h-20 rounded-full bg-[#5A9E2F]/15 text-[#5A9E2F] mx-auto flex items-center justify-center font-bold text-2xl font-mono">MS</div>
          <div>
            <h3 class="font-bold text-[#14151A] text-lg font-['Montserrat',sans-serif]">Maya Sterling</h3>
            <p class="text-xs text-[#5A9E2F] font-bold">Lead Automation Architect</p>
          </div>
          <p class="text-xs text-[#5B5F6B]">n8n workflow specialist engineered 300+ autonomous lead enrichment and CRM sync pipelines.</p>
        </div>
        <div class="card-dark p-6 space-y-4 text-center rounded-2xl bg-white border border-[#E2E8F0] shadow-sm">
          <div class="w-20 h-20 rounded-full bg-[#00B4D8]/15 text-[#00B4D8] mx-auto flex items-center justify-center font-bold text-2xl font-mono">DC</div>
          <div>
            <h3 class="font-bold text-[#14151A] text-lg font-['Montserrat',sans-serif]">David Chen</h3>
            <p class="text-xs text-[#00B4D8] font-bold">Director of Digital PR</p>
          </div>
          <p class="text-xs text-[#5B5F6B]">Secured editorial placements on Forbes, TechCrunch, and DR 80+ tier-1 publications.</p>
        </div>
      </div>
    </section>

    <!-- Recent Published Research & Articles -->
    <?php include_once 'includes/recent-blogs.php'; ?>

    <!-- CTA -->
    <section class="max-w-4xl mx-auto px-4 pt-16 text-center">
      <div class="bg-[#F6F8FB] border border-[#E2E8F0] p-10 rounded-2xl space-y-4">
        <h2 class="text-2xl font-bold text-[#14151A] font-['Montserrat',sans-serif]">Partner with an Engineering-First Agency</h2>
        <button class="trigger-book-demo btn-primary">
          <i data-lucide="calendar" class="w-4 h-4"></i> Book Strategy Session
        </button>
      </div>
    </section>
  </main>

  <?php include_once 'includes/footer.php'; ?>
</body>
</html>
