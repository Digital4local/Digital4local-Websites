<?php
/**
 * Digital4Local - Case Studies Hub & Portfolio Listing Page
 * Route: /case-studies
 */

require_once __DIR__ . '/includes/site-config.php';
$p_cfg = require __DIR__ . '/config/portfolio-config.php';
$case_studies = require __DIR__ . '/config/case-studies-data.php';

$page_title = "Digital4Local Case Studies | Verified Client SEO, Maps & AI Search Results";
$page_description = "Explore real case studies from Digital4Local. See how businesses across Bhopal, India, and the UK achieved top Google Maps rankings, viral reels, and ChatGPT citations.";
$page_keywords = "Digital4Local Case Studies, SEO Case Studies Bhopal, Local SEO Results UK, Google Maps Case Study, AI Search Optimization Results";
$canonical_url = "https://digital4local.com/case-studies";
$og_image = "https://digital4local.com/assets/images/hero_dashboard_light_v2.png";

$clean_phone = $p_cfg['whatsapp_number_clean'];
$base_path = function_exists('get_base_path') ? get_base_path() : '/';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <?php include_once __DIR__ . '/includes/seo.php'; ?>

  <!-- JSON-LD ItemList & BreadcrumbList Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ItemList",
    "name": "Digital4Local Client Growth Case Studies",
    "description": "<?php echo htmlspecialchars($page_description); ?>",
    "itemListElement": [
      <?php 
      $cs_json = [];
      $i = 1;
      foreach ($case_studies as $cs) {
          $cs_json[] = json_encode([
              '@type' => 'ListItem',
              'position' => $i++,
              'name' => $cs['client_name'],
              'url' => 'https://digital4local.com/case-studies/' . $cs['slug']
          ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
      }
      echo implode(",\n      ", $cs_json);
      ?>
    ]
  }
  </script>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "https://digital4local.com/"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "Case Studies",
        "item": "https://digital4local.com/case-studies"
      }
    ]
  }
  </script>

  <style>
    .filter-chip.active {
      background: linear-gradient(135deg, #00F0FF 0%, #00A8B5 100%) !important;
      color: #0A0A0F !important;
      border-color: #00F0FF !important;
      box-shadow: 0 4px 15px -2px rgba(0, 240, 255, 0.4) !important;
    }
  </style>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] font-sans antialiased selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <!-- Header -->
  <?php include __DIR__ . '/includes/header.php'; ?>

  <main class="relative z-10 pt-24 sm:pt-32 pb-24">
    
    <!-- 1. Hero Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16 sm:mb-20 text-center" data-aos="fade-up">
      
      <!-- Eyebrow Badge -->
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#00F0FF]/15 border border-[#00F0FF]/30 text-[#008A94] text-xs font-bold tracking-wide uppercase mb-6 shadow-sm">
        <i data-lucide="award" class="w-4 h-4"></i>
        <span>Verified Proof & Data-Backed Results</span>
      </div>

      <!-- H1 -->
      <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-[#14151A] tracking-tight font-display mb-6">
        Real businesses. <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00A8B5] via-[#00F0FF] to-[#0284C7]">Real growth.</span>
      </h1>

      <p class="text-base sm:text-lg md:text-xl text-[#5B5F6B] leading-relaxed max-w-3xl mx-auto">
        Explore how local clinics, universities, showrooms, and UK energy brands transformed their inbound leads, Google Maps positions, and AI search visibility with Digital4Local.
      </p>

    </section>

    <!-- 2. Interactive Filter Chips Bar -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12" data-aos="fade-up">
      <div class="flex items-center justify-center flex-wrap gap-2.5 sm:gap-3" id="case-study-filters" role="group" aria-label="Case Study Industry Filter">
        <button type="button" class="filter-chip active px-4 py-2 rounded-full text-xs sm:text-sm font-bold bg-[#00F0FF]/15 text-[#008A94] border border-[#00A8B5] transition-all shadow-sm" data-filter="all">
          All Case Studies (7)
        </button>
        <button type="button" class="filter-chip px-4 py-2 rounded-full text-xs sm:text-sm font-bold bg-[#F6F8FB] text-[#5B5F6B] hover:text-[#14151A] border border-[#E4E7EC] hover:border-[#00A8B5] transition-all" data-filter="education">
          🎓 Education
        </button>
        <button type="button" class="filter-chip px-4 py-2 rounded-full text-xs sm:text-sm font-bold bg-[#F6F8FB] text-[#5B5F6B] hover:text-[#14151A] border border-[#E4E7EC] hover:border-[#00A8B5] transition-all" data-filter="healthcare">
          🩺 Healthcare
        </button>
        <button type="button" class="filter-chip px-4 py-2 rounded-full text-xs sm:text-sm font-bold bg-[#F6F8FB] text-[#5B5F6B] hover:text-[#14151A] border border-[#E4E7EC] hover:border-[#00A8B5] transition-all" data-filter="solar-energy">
          ☀️ Solar & Energy
        </button>
        <button type="button" class="filter-chip px-4 py-2 rounded-full text-xs sm:text-sm font-bold bg-[#F6F8FB] text-[#5B5F6B] hover:text-[#14151A] border border-[#E4E7EC] hover:border-[#00A8B5] transition-all" data-filter="hospitality">
          🏨 Hospitality
        </button>
        <button type="button" class="filter-chip px-4 py-2 rounded-full text-xs sm:text-sm font-bold bg-[#F6F8FB] text-[#5B5F6B] hover:text-[#14151A] border border-[#E4E7EC] hover:border-[#00A8B5] transition-all" data-filter="retail">
          🛍️ Retail
        </button>
        <button type="button" class="filter-chip px-4 py-2 rounded-full text-xs sm:text-sm font-bold bg-[#F6F8FB] text-[#5B5F6B] hover:text-[#14151A] border border-[#E4E7EC] hover:border-[#00A8B5] transition-all" data-filter="link-building-pr">
          📰 Link Building & PR
        </button>
        <button type="button" class="filter-chip px-4 py-2 rounded-full text-xs sm:text-sm font-bold bg-[#F6F8FB] text-[#5B5F6B] hover:text-[#14151A] border border-[#E4E7EC] hover:border-[#00A8B5] transition-all" data-filter="ai-search">
          🤖 AI Search (AEO/GEO)
        </button>
      </div>
    </section>

    <!-- 3. Featured Top Case Study (Solar4Good UK) -->
    <?php $featured = $case_studies['solar4good-uk']; ?>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16" data-aos="fade-up">
      <div class="bg-gradient-to-br from-[#14151A] via-[#1E293B] to-[#0F172A] text-white rounded-3xl p-8 sm:p-12 shadow-2xl border-2 border-[#00F0FF]/40 relative overflow-hidden group">
        
        <!-- Glow Effect -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#00F0FF]/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
          
          <div class="lg:col-span-8 space-y-5 text-left">
            <div class="flex flex-wrap items-center gap-3">
              <span class="px-3.5 py-1 rounded-full text-xs font-black uppercase tracking-wider bg-[#00F0FF] text-[#14151A] shadow-md">
                ★ Featured Results Leader
              </span>
              <span class="px-3 py-1 rounded-full text-xs font-bold bg-white/10 text-slate-300 border border-white/15">
                <?php echo $featured['flag']; ?> <?php echo htmlspecialchars($featured['location']); ?>
              </span>
              <span class="text-xs font-semibold text-emerald-400">
                <?php echo htmlspecialchars($featured['industry']); ?>
              </span>
            </div>

            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold tracking-tight leading-snug">
              <?php echo htmlspecialchars($featured['headline']); ?>
            </h2>

            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed max-w-2xl">
              <?php echo htmlspecialchars($featured['results_narrative']); ?>
            </p>

            <!-- 2 Large Stat Chips -->
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-2">
              <div class="bg-white/10 p-3.5 rounded-xl border border-white/10 backdrop-blur-sm">
                <div class="text-[10px] text-slate-400 uppercase font-bold">Google Maps</div>
                <div class="text-xl sm:text-2xl font-black text-[#00F0FF]">#14 → #1–2</div>
                <div class="text-[10px] text-emerald-400 font-bold">Top 3 Domination</div>
              </div>

              <div class="bg-white/10 p-3.5 rounded-xl border border-white/10 backdrop-blur-sm">
                <div class="text-[10px] text-slate-400 uppercase font-bold">Inbound Phone Calls</div>
                <div class="text-xl sm:text-2xl font-black text-emerald-400">9 → 200+ /mo</div>
                <div class="text-[10px] text-emerald-300 font-bold">+2,122% Increase</div>
              </div>

              <div class="hidden sm:block bg-white/10 p-3.5 rounded-xl border border-white/10 backdrop-blur-sm">
                <div class="text-[10px] text-slate-400 uppercase font-bold">Timeline</div>
                <div class="text-xl sm:text-2xl font-black text-purple-400">90 Days</div>
                <div class="text-[10px] text-slate-300">Rapid Execution</div>
              </div>
            </div>
          </div>

          <div class="lg:col-span-4 flex flex-col items-start lg:items-end justify-between gap-6">
            <a href="<?php echo $base_path; ?>case-studies/<?php echo $featured['slug']; ?>" class="btn-primary !py-4 !px-8 !text-sm w-full sm:w-auto text-center font-black">
              <span>Read Full Case Study</span>
              <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
            <span class="text-xs text-slate-400 text-right">
              Includes full strategy breakdown, AI search engine audit & review playbook.
            </span>
          </div>

        </div>

      </div>
    </section>

    <!-- 4. Grid of All Case Studies -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="case-studies-grid">
        <?php foreach ($case_studies as $slug => $cs): 
          $cats_attr = implode(' ', $cs['filter_categories']);
          $cs_url = $base_path . 'case-studies/' . $cs['slug'];
        ?>
          <div class="case-study-card bg-[#FFFFFF] border-2 border-[#E4E7EC] hover:border-[#00A8B5] rounded-3xl p-6 sm:p-7 flex flex-col justify-between shadow-sm hover:shadow-2xl transition-all duration-300 group hover:-translate-y-1.5" data-categories="<?php echo htmlspecialchars($cats_attr); ?>" data-aos="fade-up">
            
            <div>
              <!-- Visual Cover Graphic Banner -->
              <div class="h-36 rounded-2xl bg-gradient-to-br from-[#14151A] via-[#1E293B] to-[#0F172A] p-5 flex flex-col justify-between text-white relative overflow-hidden mb-6 shadow-inner">
                <div class="flex items-center justify-between z-10">
                  <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/20 border border-white/20 backdrop-blur-sm">
                    <?php echo htmlspecialchars($cs['industry']); ?>
                  </span>
                  <span class="text-base" title="<?php echo htmlspecialchars($cs['country']); ?>">
                    <?php echo $cs['flag']; ?>
                  </span>
                </div>

                <div class="z-10">
                  <div class="text-base sm:text-lg font-black tracking-tight text-white line-clamp-1">
                    <?php echo htmlspecialchars($cs['short_name']); ?>
                  </div>
                  <div class="text-[11px] text-[#00F0FF] font-semibold">
                    <?php echo htmlspecialchars($cs['location']); ?>
                  </div>
                </div>

                <!-- Ambient Radial Blob -->
                <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-[#00F0FF]/25 rounded-full blur-xl pointer-events-none"></div>
              </div>

              <!-- Outcome Headline -->
              <h3 class="text-lg sm:text-xl font-extrabold text-[#14151A] leading-snug mb-4 group-hover:text-[#00A8B5] transition-colors">
                <?php echo htmlspecialchars($cs['headline']); ?>
              </h3>

              <!-- 2 Key Stat Chips -->
              <div class="grid grid-cols-2 gap-3 mb-6">
                <div class="bg-[#F6F8FB] p-3 rounded-xl border border-[#E4E7EC]">
                  <div class="text-[10px] text-[#5B5F6B] uppercase font-bold"><?php echo htmlspecialchars($cs['stats_headline'][0]['label']); ?></div>
                  <div class="text-sm sm:text-base font-black text-[#008A94] truncate"><?php echo htmlspecialchars($cs['stats_headline'][0]['value']); ?></div>
                </div>

                <div class="bg-[#F6F8FB] p-3 rounded-xl border border-[#E4E7EC]">
                  <div class="text-[10px] text-[#5B5F6B] uppercase font-bold"><?php echo htmlspecialchars($cs['stats_headline'][1]['label']); ?></div>
                  <div class="text-sm sm:text-base font-black text-[#16A34A] truncate"><?php echo htmlspecialchars($cs['stats_headline'][1]['value']); ?></div>
                </div>
              </div>
            </div>

            <!-- Bottom CTA Link -->
            <div class="pt-4 border-t border-[#E4E7EC]">
              <a href="<?php echo $cs_url; ?>" class="inline-flex items-center justify-between w-full text-xs font-bold text-[#008A94] hover:text-[#00A8B5] group-hover:underline">
                <span>Read Full Case Study</span>
                <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1.5 transition-transform"></i>
              </a>
            </div>

          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- 5. Bottom Conversion Strip: "Your business could be next" -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="zoom-in">
      <div class="bg-gradient-to-r from-[#F6F8FB] via-[#EAF9FA] to-[#F6F8FB] border-2 border-[#00A8B5] rounded-3xl p-8 sm:p-12 text-center shadow-xl">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30 mb-4">
          <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
          <span>Partner With Bhopal’s Growth Leaders</span>
        </div>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A] tracking-tight font-display mb-4">
          Your business could be our next <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00A8B5] to-[#0284C7]">#1 ranking success story</span>
        </h2>
        <p class="text-sm sm:text-base text-[#5B5F6B] max-w-2xl mx-auto mb-8 leading-relaxed">
          Claim your free 5x5 Google Maps geo-grid scan, competitor gap analysis, and 90-day roadmap. No obligations, 100% transparent data.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
          <a href="<?php echo $base_path; ?>portfolio#audit-form" class="btn-primary !py-3.5 !px-8 !text-sm shadow-xl font-bold">
            <span>Get My Free Local Visibility Audit</span>
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
          </a>
          <a href="https://wa.me/<?php echo $clean_phone; ?>?text=<?php echo urlencode('Hi Digital4Local, I saw your case studies and want a free growth audit for my business.'); ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary !py-3.5 !px-7 !text-sm">
            <i data-lucide="message-circle" class="w-4 h-4 text-[#16A34A]"></i>
            <span>Chat on WhatsApp</span>
          </a>
        </div>
      </div>
    </section>

  </main>

  <!-- Footer -->
  <?php include __DIR__ . '/includes/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      if (typeof AOS !== 'undefined') {
        AOS.init({ once: true, duration: 600, easing: 'ease-out-cubic' });
      }
      if (typeof lucide !== 'undefined') {
        lucide.createIcons();
      }

      // Smooth Filter Functionality
      const filterBtns = document.querySelectorAll('.filter-chip');
      const caseCards = document.querySelectorAll('.case-study-card');

      filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
          filterBtns.forEach(b => b.classList.remove('active'));
          this.classList.add('active');

          const filterVal = this.getAttribute('data-filter');

          caseCards.forEach(card => {
            const cardCats = card.getAttribute('data-categories') || '';
            if (filterVal === 'all' || cardCats.includes(filterVal)) {
              card.style.display = 'flex';
              card.style.opacity = '1';
            } else {
              card.style.display = 'none';
              card.style.opacity = '0';
            }
          });
        });
      });
    });
  </script>
</body>
</html>
