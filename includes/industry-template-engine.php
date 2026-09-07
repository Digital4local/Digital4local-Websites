<?php
/**
 * Digital4Local - Industry Pages v2 Master Engine
 * Fully compliant with Research-Backed SEO + GEO + AEO Specifications
 */

// Safety check for required data array
if (!isset($industry_data) || !is_array($industry_data)) {
    die("Industry data not defined.");
}

require_once __DIR__ . '/site-config.php';

$page_title = $industry_data['meta_title'] ?? ($industry_data['title'] . " | Digital4Local");
$page_description = $industry_data['meta_description'] ?? ($industry_data['direct_answer']);
$page_keywords = $industry_data['keywords'] ?? "Local SEO, GEO, AEO, Digital Marketing";
$canonical_url = $industry_data['canonical_url'] ?? ("https://digital4local.com/industries/" . ($industry_data['slug'] ?? ''));

$author_name = "Abhishek Raikwar";
$author_title = "Founder, Digital4Local";
$author_cred = "5+ years specializing in Local SEO, Generative Engine Optimization (GEO), and high-intent customer acquisition.";
$last_updated_date = $industry_data['last_updated'] ?? date('F Y');
$date_published = $industry_data['date_published'] ?? "2025-01-15";
$date_modified = $industry_data['date_modified'] ?? date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <?php include_once __DIR__ . '/seo.php'; ?>

  <!-- JSON-LD Structured Data: Breadcrumbs, Service, Article, and FAQPage -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
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
            "name": "Industries",
            "item": "https://digital4local.com/industries/"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": <?php echo json_encode($industry_data['title']); ?>,
            "item": <?php echo json_encode($canonical_url); ?>
          }
        ]
      },
      {
        "@type": "Service",
        "name": <?php echo json_encode($industry_data['title']); ?>,
        "serviceType": <?php echo json_encode($industry_data['service_type'] ?? 'Search Engine Optimization & Generative AI Visibility'); ?>,
        "provider": {
          "@type": "LocalBusiness",
          "name": "Digital4Local",
          "url": "https://digital4local.com",
          "logo": "https://digital4local.com/assets/images/logo.png"
        },
        "description": <?php echo json_encode($industry_data['direct_answer']); ?>,
        "areaServed": <?php echo json_encode($industry_data['area_served'] ?? ['United Kingdom', 'India', 'United States']); ?>
      },
      {
        "@type": "Article",
        "headline": <?php echo json_encode($industry_data['hero_h1']); ?>,
        "description": <?php echo json_encode($industry_data['meta_description']); ?>,
        "author": {
          "@type": "Person",
          "name": <?php echo json_encode($author_name); ?>,
          "jobTitle": <?php echo json_encode($author_title); ?>,
          "url": "https://digital4local.com/about.php"
        },
        "publisher": {
          "@type": "Organization",
          "name": "Digital4Local",
          "url": "https://digital4local.com"
        },
        "datePublished": <?php echo json_encode($date_published); ?>,
        "dateModified": <?php echo json_encode($date_modified); ?>,
        "mainEntityOfPage": <?php echo json_encode($canonical_url); ?>
      },
      {
        "@type": "FAQPage",
        "mainEntity": [
          <?php 
          $faq_elements = [];
          foreach ($industry_data['faqs'] as $faq) {
              $faq_elements[] = json_encode([
                  "@type" => "Question",
                  "name" => $faq['q'],
                  "acceptedAnswer" => [
                      "@type" => "Answer",
                      "text" => $faq['a']
                  ]
              ], JSON_UNESCAPED_SLASHES);
          }
          echo implode(",\n          ", $faq_elements);
          ?>
        ]
      }
    ]
  }
  </script>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] min-h-screen relative font-['Inter',sans-serif] selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <div class="bg-ambient-glow"></div>
  <?php include_once __DIR__ . '/header.php'; ?>

  <main class="relative z-10 pt-28 sm:pt-36 pb-24">

    <!-- 1. HERO SECTION -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 pb-12" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#1B5FAA]/10 border border-[#1B5FAA]/20 text-[#1B5FAA] text-xs font-mono font-bold tracking-wider uppercase">
        <span class="w-2 h-2 rounded-full bg-[#00B4D8] animate-pulse"></span>
        <?php echo htmlspecialchars($industry_data['badge'] ?? 'INDUSTRY GROWTH BLUEPRINT'); ?>
      </div>

      <h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold text-[#14151A] tracking-tight font-['Montserrat',sans-serif] leading-[1.15]">
        <?php echo $industry_data['hero_h1']; ?>
      </h1>

      <p class="text-base sm:text-xl text-[#5B5F6B] max-w-3xl mx-auto leading-relaxed">
        <?php echo htmlspecialchars($industry_data['hero_subheadline']); ?>
      </p>

      <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
        <button class="trigger-book-demo btn-primary px-8 py-4 text-sm font-bold shadow-lg">
          <i data-lucide="zap" class="w-4 h-4"></i> Request Free Industry Audit
        </button>
        <a href="#approach" class="btn-secondary px-6 py-4 text-sm font-bold">
          Explore Methodology ↓
        </a>
      </div>
    </section>

    <!-- 2. 40-60 WORD DIRECT-ANSWER CITATION BLOCK (Within first 150 words) -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 mb-12" data-aos="fade-up">
      <div class="relative bg-gradient-to-br from-[#1B5FAA]/5 via-[#F8FAFC] to-[#00B4D8]/10 border-2 border-[#00B4D8] rounded-2xl p-6 sm:p-8 shadow-sm">
        <div class="flex items-center gap-2 mb-3 text-xs font-mono font-bold text-[#1B5FAA] uppercase tracking-wider">
          <svg class="w-4 h-4 text-[#00B4D8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
          Direct Answer / Executive Summary
        </div>
        <p class="text-sm sm:text-base text-[#14151A] font-semibold leading-relaxed">
          <?php echo htmlspecialchars($industry_data['direct_answer']); ?>
        </p>
      </div>
    </section>

    <!-- 3. NAMED AUTHOR & CREDENTIALS TRUST BAR -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 mb-16" data-aos="fade-up">
      <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 sm:p-5 flex flex-wrap items-center justify-between gap-4 text-xs font-mono text-[#5B5F6B]">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full bg-[#1B5FAA] text-white flex items-center justify-center font-bold text-sm">
            AR
          </div>
          <div>
            <div class="text-[#14151A] font-bold text-xs sm:text-sm font-['Montserrat',sans-serif]">
              Written by <?php echo htmlspecialchars($author_name); ?>
            </div>
            <div class="text-[11px] text-[#64748B]">
              <?php echo htmlspecialchars($author_title); ?> · <?php echo htmlspecialchars($author_cred); ?>
            </div>
          </div>
        </div>
        <div class="flex items-center gap-3">
          <span class="bg-white border border-[#E2E8F0] px-3 py-1 rounded-md text-[#1B5FAA] font-bold">
            Last Updated: <?php echo htmlspecialchars($last_updated_date); ?>
          </span>
          <span class="bg-[#5A9E2F]/10 text-[#5A9E2F] px-2.5 py-1 rounded-md font-bold">
            ✓ E-E-A-T Verified
          </span>
        </div>
      </div>
    </section>

    <!-- 4. THE INDUSTRY PROBLEM (200-300 words) -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-6" data-aos="fade-up">
      <div class="space-y-3">
        <span class="text-xs font-mono text-[#E11D48] font-bold uppercase tracking-wider">MARKET REALITY & BOTTLENECKS</span>
        <h2 class="text-2xl sm:text-4xl font-extrabold text-[#14151A] font-['Montserrat',sans-serif] tracking-tight">
          <?php echo htmlspecialchars($industry_data['problem_h2']); ?>
        </h2>
      </div>
      <div class="prose prose-slate max-w-none text-[#475569] text-base leading-relaxed space-y-4">
        <?php echo $industry_data['problem_content']; ?>
      </div>
    </section>

    <!-- 5. DEFINITIONAL SECTION (Citation Magnet for LLMs) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14" data-aos="fade-up">
      <div class="text-center space-y-3 max-w-3xl mx-auto mb-12">
        <span class="text-xs font-mono text-[#1B5FAA] font-bold uppercase tracking-wider">HOW SEARCH HAS EVOLVED</span>
        <h2 class="text-2xl sm:text-4xl font-extrabold text-[#14151A] font-['Montserrat',sans-serif] tracking-tight">
          Understanding SEO, GEO & AEO for <?php echo htmlspecialchars($industry_data['industry_short']); ?>
        </h2>
        <p class="text-sm sm:text-base text-[#5B5F6B]">
          Clear, verifiable definitions of modern search pillars tailored specifically to how high-ticket customers research and hire contractors today.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Local SEO Definition -->
        <div class="bg-white border border-[#E2E8F0] rounded-2xl p-7 shadow-sm hover:shadow-md hover:border-[#1B5FAA] transition-all flex flex-col justify-between">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-[#1B5FAA]/10 text-[#1B5FAA] flex items-center justify-center font-mono font-bold">
              01
            </div>
            <h3 class="text-lg font-bold text-[#14151A] font-['Montserrat',sans-serif]">
              Local SEO (Google Maps & 3-Pack)
            </h3>
            <p class="text-sm text-[#475569] leading-relaxed">
              <?php echo htmlspecialchars($industry_data['def_local_seo']); ?>
            </p>
          </div>
          <div class="mt-6 pt-4 border-t border-[#E2E8F0] text-xs font-mono text-[#1B5FAA] font-bold">
            Target: Proximity-based phone calls & map directions
          </div>
        </div>

        <!-- GEO Definition -->
        <div class="bg-white border border-[#E2E8F0] rounded-2xl p-7 shadow-sm hover:shadow-md hover:border-[#5A9E2F] transition-all flex flex-col justify-between">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-[#5A9E2F]/10 text-[#5A9E2F] flex items-center justify-center font-mono font-bold">
              02
            </div>
            <h3 class="text-lg font-bold text-[#14151A] font-['Montserrat',sans-serif]">
              GEO (Generative Engine Optimization)
            </h3>
            <p class="text-sm text-[#475569] leading-relaxed">
              <?php echo htmlspecialchars($industry_data['def_geo']); ?>
            </p>
          </div>
          <div class="mt-6 pt-4 border-t border-[#E2E8F0] text-xs font-mono text-[#5A9E2F] font-bold">
            Target: Brand citations inside ChatGPT, Gemini & Claude
          </div>
        </div>

        <!-- AEO Definition -->
        <div class="bg-white border border-[#E2E8F0] rounded-2xl p-7 shadow-sm hover:shadow-md hover:border-[#00B4D8] transition-all flex flex-col justify-between">
          <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-[#00B4D8]/10 text-[#008DA8] flex items-center justify-center font-mono font-bold">
              03
            </div>
            <h3 class="text-lg font-bold text-[#14151A] font-['Montserrat',sans-serif]">
              AEO (Answer Engine Optimization)
            </h3>
            <p class="text-sm text-[#475569] leading-relaxed">
              <?php echo htmlspecialchars($industry_data['def_aeo']); ?>
            </p>
          </div>
          <div class="mt-6 pt-4 border-t border-[#E2E8F0] text-xs font-mono text-[#008DA8] font-bold">
            Target: Direct answer extraction in Google AI Overviews & Perplexity
          </div>
        </div>
      </div>
    </section>

    <!-- 6. OUR SPECIALIZED APPROACH (300-450 words) -->
    <section id="approach" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16" data-aos="fade-up">
      <div class="text-center space-y-3 max-w-3xl mx-auto mb-14">
        <span class="text-xs font-mono text-[#00B4D8] font-bold uppercase tracking-wider">THE DIGITAL4LOCAL METHODOLOGY</span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A] font-['Montserrat',sans-serif] tracking-tight">
          <?php echo htmlspecialchars($industry_data['approach_h2']); ?>
        </h2>
        <p class="text-sm sm:text-base text-[#5B5F6B]">
          We combine hyper-local proximity mapping with conversational AI prompt probing to guarantee verifiable inbound visibility.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <?php foreach ($industry_data['approach_pillars'] as $idx => $pillar): ?>
        <div class="bg-white border border-[#E2E8F0] rounded-2xl p-8 shadow-sm hover:shadow-md transition-all space-y-4">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-[#1B5FAA]/10 text-[#1B5FAA] flex items-center justify-center font-bold text-sm">
              Pillar 0<?php echo $idx + 1; ?>
            </div>
            <h3 class="text-xl font-bold text-[#14151A] font-['Montserrat',sans-serif]">
              <?php echo htmlspecialchars($pillar['title']); ?>
            </h3>
          </div>
          <p class="text-sm text-[#475569] leading-relaxed">
            <?php echo htmlspecialchars($pillar['description']); ?>
          </p>
          <div class="bg-[#F8FAFC] border border-[#E2E8F0] px-4 py-2.5 rounded-xl text-xs font-mono text-[#1B5FAA] font-bold">
            DELIVERABLE: <?php echo htmlspecialchars($pillar['deliverable']); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- 7. STRUCTURED COMPARISON TABLE (High-Extraction Factor for LLMs) -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16" data-aos="fade-up">
      <div class="text-center space-y-3 mb-10">
        <span class="text-xs font-mono text-[#1B5FAA] font-bold uppercase tracking-wider">STRATEGY BREAKDOWN MATRIX</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] font-['Montserrat',sans-serif]">
          Local SEO vs. GEO vs. AEO for <?php echo htmlspecialchars($industry_data['industry_short']); ?>
        </h2>
      </div>

      <div class="overflow-x-auto bg-white border border-[#E2E8F0] rounded-2xl shadow-sm">
        <table class="w-full text-left border-collapse text-xs sm:text-sm">
          <thead>
            <tr class="bg-[#F8FAFC] border-b border-[#E2E8F0] font-['Montserrat',sans-serif] text-[#14151A]">
              <th class="p-4 sm:p-5 font-bold">Search Dimension</th>
              <th class="p-4 sm:p-5 font-bold text-[#1B5FAA]">Local SEO (Maps)</th>
              <th class="p-4 sm:p-5 font-bold text-[#5A9E2F]">GEO (ChatGPT & Gemini)</th>
              <th class="p-4 sm:p-5 font-bold text-[#00A8B5]">AEO (Perplexity & Overviews)</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#E2E8F0] text-[#475569]">
            <?php foreach ($industry_data['comparison_matrix'] as $row): ?>
            <tr class="hover:bg-[#F8FAFC]/60 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A] font-mono"><?php echo htmlspecialchars($row['dimension']); ?></td>
              <td class="p-4 sm:p-5"><?php echo htmlspecialchars($row['local_seo']); ?></td>
              <td class="p-4 sm:p-5"><?php echo htmlspecialchars($row['geo']); ?></td>
              <td class="p-4 sm:p-5"><?php echo htmlspecialchars($row['aeo']); ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- 8. "HOW WE WORK" TIMELINE (Visual Stepper) -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16" data-aos="fade-up">
      <div class="text-center space-y-3 mb-14">
        <span class="text-xs font-mono text-[#1B5FAA] font-bold uppercase tracking-wider">EXECUTION ROADMAP</span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A] font-['Montserrat',sans-serif]">
          How We Work: From Audit to Market Dominance
        </h2>
        <p class="text-sm text-[#5B5F6B]">
          A structured 4-phase milestone delivery timeline designed for predictable local ROI.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php 
        $timeline_steps = [
            ['phase' => 'Week 1', 'title' => 'Audit & NAP Mesh', 'desc' => 'Complete technical crawl, local keyword matrix, competitor spam scan, and baseline AI answer probing.'],
            ['phase' => 'Month 1', 'title' => 'Schema & Geo Pages', 'desc' => 'Deploy JSON-LD entity schema, restructure GBP categories, and build geo-targeted landing page silos.'],
            ['phase' => 'Month 3', 'title' => 'Map Grid & Citations', 'desc' => 'Manual 20-source citation sync, review velocity workflow, and Wikidata/Wikimapia entity associations.'],
            ['phase' => 'Month 6', 'title' => 'AI Citation Scale', 'desc' => 'High-DR digital PR backlinks, continuous LLM probing, and dominant multi-county map grid rankings.']
        ];
        foreach ($timeline_steps as $idx => $st): ?>
        <div class="bg-white border border-[#E2E8F0] rounded-2xl p-6 shadow-sm flex flex-col justify-between space-y-4">
          <div class="space-y-2">
            <span class="text-xs font-mono font-bold text-[#1B5FAA] bg-[#1B5FAA]/10 px-2.5 py-1 rounded-md">
              <?php echo htmlspecialchars($st['phase']); ?>
            </span>
            <h3 class="text-base font-bold text-[#14151A] font-['Montserrat',sans-serif] pt-2">
              <?php echo htmlspecialchars($st['title']); ?>
            </h3>
            <p class="text-xs text-[#5B5F6B] leading-relaxed">
              <?php echo htmlspecialchars($st['desc']); ?>
            </p>
          </div>
          <div class="text-[10px] font-mono text-[#5A9E2F] font-bold">
            ✓ Milestone Deliverable
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- 11. TOOLS & AI WE USE -->
    <?php 
    $current_stack_key = 'local-seo';
    include __DIR__ . '/tools-stack.php'; 
    ?>

    <!-- 12. CLIENT TRUST MARQUEE STRIP -->
    <?php include __DIR__ . '/trust-strip.php'; ?>

    <!-- 13. EXPANDED 12-15 FAQ SECTION WITH INTERACTIVE ACCORDION -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20" data-aos="fade-up">
      <div class="text-center space-y-3 mb-12">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1B5FAA]/10 border border-[#1B5FAA]/20 text-[#1B5FAA] text-xs font-mono font-bold tracking-wider uppercase">
          <span class="w-2 h-2 rounded-full bg-[#5A9E2F] animate-pulse"></span>
          FREQUENTLY ASKED QUESTIONS (FAQPAGE SCHEMA VERIFIED)
        </div>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A] font-['Montserrat',sans-serif] tracking-tight">
          Common Questions for <?php echo htmlspecialchars($industry_data['industry_short']); ?>
        </h2>
        <p class="text-xs sm:text-sm text-[#5B5F6B]">
          Clear, direct answers to help you evaluate SEO, GEO, and AI search visibility for your business.
        </p>
      </div>

      <div class="space-y-4">
        <?php foreach ($industry_data['faqs'] as $idx => $faq): ?>
        <div class="faq-item bg-white border border-[#E2E8F0] rounded-2xl p-6 shadow-sm hover:border-[#00B4D8] transition-all cursor-pointer">
          <div class="faq-header flex items-center justify-between gap-4 font-bold text-sm sm:text-base text-[#14151A] font-['Montserrat',sans-serif]">
            <span><?php echo htmlspecialchars($faq['q']); ?></span>
            <svg class="w-5 h-5 text-[#1B5FAA] shrink-0 transform transition-transform faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </div>
          <div class="faq-answer text-xs sm:text-sm text-[#475569] mt-3 leading-relaxed hidden">
            <?php echo htmlspecialchars($faq['a']); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- 14. RELATED INDUSTRIES & CORE SERVICES CROSS-LINKS -->
    <?php include __DIR__ . '/explore-services.php'; ?>

    <!-- 15. RECENT RESEARCH & BLOG INSIGHTS -->
    <?php include_once __DIR__ . '/recent-blogs.php'; ?>

    <!-- 16. CLOSING CTA BANNER -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-12" data-aos="fade-up">
      <div class="bg-gradient-to-br from-[#00B4D8]/10 via-[#F8FAFC] to-[#1B5FAA]/10 border-2 border-[#1B5FAA] p-10 sm:p-14 rounded-3xl text-center space-y-6 shadow-xl">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1B5FAA]/10 text-[#1B5FAA] text-xs font-mono font-bold uppercase">
          EXCLUSIVE TERRITORY GUARANTEE
        </div>
        <h2 class="text-2xl sm:text-4xl font-extrabold text-[#14151A] tracking-tight font-['Montserrat',sans-serif]">
          Ready to Claim #1 Visibility for <?php echo htmlspecialchars($industry_data['industry_short']); ?> in Your Territory?
        </h2>
        <p class="text-sm sm:text-base text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          Digital4Local works exclusively with one contractor per zip code / primary service area to protect ranking equity. Get your free 15-point audit report before your competitor takes the top position.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4">
          <button class="trigger-book-demo btn-primary text-sm px-8 py-3.5 shadow-lg font-bold">
            <i data-lucide="calendar" class="w-4 h-4"></i> Claim Free Territory Audit
          </button>
        </div>
      </div>
    </section>

  </main>

  <?php include_once __DIR__ . '/footer.php'; ?>

  <!-- FAQ Accordion Toggle Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const faqItems = document.querySelectorAll('.faq-item');
      faqItems.forEach(item => {
        item.addEventListener('click', function() {
          const answer = this.querySelector('.faq-answer');
          const chevron = this.querySelector('.faq-chevron');
          const isHidden = answer.classList.contains('hidden');
          
          // Close other open FAQs
          faqItems.forEach(other => {
            other.querySelector('.faq-answer').classList.add('hidden');
            other.querySelector('.faq-chevron').classList.remove('rotate-180');
          });

          if (isHidden) {
            answer.classList.remove('hidden');
            chevron.classList.add('rotate-180');
          }
        });
      });
    });
  </script>
</body>
</html>
