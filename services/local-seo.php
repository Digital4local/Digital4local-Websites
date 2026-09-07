<?php
require_once __DIR__ . '/../includes/site-config.php';
$seo_cfg = get_page_config('services_local_seo');

$page_title = "Local SEO Services | Google Maps & Map Pack Ranking | Digital4Local";
$page_description = "Local SEO services for businesses across India: Google Business Profile optimisation, review systems, local landing pages and citation consistency that decides who ranks.";
$canonical_url = "https://digital4local.com/services/local-seo.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../includes/seo.php'; ?>

  <!-- FAQPage Schema for Local SEO -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "What is local SEO?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Local SEO is the practice of optimising a business's online presence to appear in searches from nearby customers — 'near me' queries, 'in [city]' searches, and the Google map pack. Its main levers are the Google Business Profile, review signals, consistent business listings across the web, and location-relevant content."
        }
      },
      {
        "@type": "Question",
        "name": "How long does local SEO take to show results?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Google Business Profile improvements and citation corrections often show movement within four to eight weeks. Competitive map-pack positions in dense urban categories typically take three to six months. Local SEO is generally faster than national SEO because the competitive set is smaller."
        }
      },
      {
        "@type": "Question",
        "name": "What is the Google map pack and how do I get into it?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "The map pack is the group of three local businesses Google displays above standard results for local queries. Getting into it depends primarily on proximity to the searcher, the completeness and accuracy of your Google Business Profile, and your review signals — quantity, recency and content. Backlinks matter less here than in standard organic results."
        }
      },
      {
        "@type": "Question",
        "name": "How many reviews do I need to rank locally?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "There is no fixed number. What matters more is a steady, ongoing flow of recent reviews rather than a single burst, along with the detail contained in them. Descriptive reviews mentioning specific services also help AI assistants recommend your business for specific queries."
        }
      },
      {
        "@type": "Question",
        "name": "Does local SEO work without a physical address?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Partly. Service-area businesses without a storefront can rank in local search by defining service areas in the Google Business Profile, though options differ from businesses with a public address. Some categories and features require a verifiable address, so this should be confirmed for your specific situation."
        }
      },
      {
        "@type": "Question",
        "name": "What is NAP consistency and why does it matter?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "NAP stands for name, address and phone number. Consistency means these details are identical everywhere they appear online — your website, Google Business Profile, and every directory. Inconsistent details reduce a search engine's confidence in which information is correct, which weakens local rankings."
        }
      },
      {
        "@type": "Question",
        "name": "Can local SEO help my business appear in AI answers?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. When someone asks an AI assistant for a recommendation near them, the answer draws on many of the same signals local SEO builds: a complete business profile, consistent details across sources, and review content. Local SEO and generative engine optimisation overlap significantly for local businesses."
        }
      },
      {
        "@type": "Question",
        "name": "Do I need local SEO if I already run Google Ads?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "They serve different purposes. Ads stop producing the moment spending stops; local SEO builds a position that continues generating enquiries. Most local businesses run both, using ads for immediate volume and local SEO as the compounding foundation."
        }
      }
    ]
  }
  </script>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] min-h-screen relative selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <div class="bg-ambient-glow"></div>
  <?php include_once '../includes/header.php'; ?>

  <main class="relative z-10 pt-28 pb-24">
    
    <!-- ========================================================================= -->
    <!-- 1. SECTION — Breadcrumb + Hero -->
    <!-- ========================================================================= -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 pt-6 pb-14 text-center space-y-6" data-aos="fade-up">
      <!-- Breadcrumb -->
      <nav class="flex items-center justify-center gap-2 text-xs font-mono text-[#5B5F6B]">
        <a href="../services.php" class="hover:text-[#00A8B5] transition-colors">Services</a>
        <span>/</span>
        <span class="text-[#5B5F6B]">SEO, AEO & GEO</span>
        <span>/</span>
        <span class="text-[#00A8B5] font-bold">Local SEO</span>
      </nav>

      <!-- Kicker -->
      <div>
        <span class="pulse-badge uppercase tracking-wider font-mono text-xs">
          BE THE BUSINESS THEY FIND FIRST.
        </span>
      </div>

      <!-- Main Headline -->
      <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A] tracking-tight">
        Local SEO Services
      </h1>

      <!-- Direct-answer opening paragraph (AI extractable block) -->
      <div class="max-w-3xl mx-auto bg-[#F6F8FB] border border-[#E4E7EC] p-6 sm:p-8 rounded-2xl text-left shadow-sm">
        <div class="text-[11px] font-mono text-[#00A8B5] font-bold uppercase tracking-wider mb-2 flex items-center gap-1.5">
          <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Direct Answer Overview
        </div>
        <p class="text-base sm:text-lg text-[#14151A] leading-relaxed">
          Local SEO is the practice of making a business visible to customers searching nearby — in the Google map pack, in "near me" results, and increasingly in AI answers. Digital4Local runs local SEO for businesses across India: Google Business Profile optimisation, review systems, local landing pages and the citation consistency that decides who ranks. Most local searches carry immediate intent, which is why local SEO usually returns faster than any other organic channel.
        </p>
      </div>

      <!-- Action Buttons -->
      <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
        <button class="trigger-book-demo btn-primary text-xs px-6 py-3 shadow-md">
          <i data-lucide="calendar" class="w-4 h-4"></i> Book an intro call
        </button>
        <a href="#how-we-work" class="btn-secondary text-xs px-6 py-3">
          See how we work <i data-lucide="arrow-down" class="w-4 h-4"></i>
        </a>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 2. SECTION — Trusted By (Global Logo Strip) -->
    <!-- ========================================================================= -->
    <?php include '../includes/trust-strip.php'; ?>

    <!-- ========================================================================= -->
    <!-- 3. SECTION — Definitions (3-card grid) -->
    <!-- ========================================================================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-20" data-aos="fade-up">
      <div class="text-center space-y-3 mb-12">
        <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">DEFINITIONS</span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A]">
          What is local SEO, and how is it different from regular SEO?
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto">
          Three terms that get used together and mean different things. Each card below is written as a standalone extractable definition — the format AI answer engines quote.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#00A8B5] font-bold">01 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">01 · Local SEO</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Local SEO is search optimisation for businesses that serve a specific geographic area. It targets queries with local intent — "near me", "in [city]", "open now" — and its main ranking surface is the Google map pack rather than the standard results list. Its core levers are the Google Business Profile, review signals, citation consistency and location-relevant content.
            </p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#16A34A] font-bold">02 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">02 · The Map Pack</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              The map pack is the block of three local businesses Google shows above the regular results for local queries, with a map. It is the highest-value real estate in local search, because it appears first and carries the call button, directions and reviews. Ranking factors for the map pack differ from standard organic results — proximity, profile completeness and review signals matter more than backlinks.
            </p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#8B5CF6] font-bold">03 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">03 · Citations & NAP</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              A citation is any online mention of your business name, address and phone number — directories, listings, social profiles. NAP consistency means those details are identical everywhere they appear. Inconsistent NAP data is one of the most common causes of weak local rankings, because it makes a search engine less confident which information about your business is correct.
            </p>
          </div>
        </div>
      </div>

      <!-- Worth Knowing Callout -->
      <div class="card-dark p-6 border-l-4 border-l-[#00A8B5] bg-[#F8FAFC] rounded-r-2xl max-w-4xl mx-auto">
        <div class="text-xs font-mono text-[#00A8B5] font-bold mb-1">WORTH KNOWING</div>
        <p class="text-sm text-[#14151A] leading-relaxed">
          Local SEO and national SEO compete on different signals. A business can rank in the map pack for its own city without ranking nationally for the same term — and for most service businesses, the local ranking is worth far more, because the searcher is nearby and ready to act.
        </p>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 4. SECTION — At a glance (comparison table) -->
    <!-- ========================================================================= -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 pb-20" data-aos="fade-up">
      <div class="text-center space-y-3 mb-10">
        <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">AT A GLANCE</span>
        <h2 class="text-3xl font-extrabold text-[#14151A]">
          Local SEO vs national SEO — the short comparison
        </h2>
        <p class="text-xs text-[#5B5F6B]">
          (Structured HTML table engineered for direct extraction by Google Snippets & AI Answer Engines)
        </p>
      </div>

      <div class="overflow-x-auto rounded-2xl border border-[#E4E7EC] shadow-sm bg-white">
        <table class="w-full text-left text-xs border-collapse">
          <thead>
            <tr class="bg-[#F8FAFC] border-b border-[#E4E7EC]">
              <th class="p-4 sm:p-5 font-mono uppercase text-[#5B5F6B] font-bold w-1/4">Criteria</th>
              <th class="p-4 sm:p-5 font-bold text-[#00A8B5] text-sm w-3/8 border-l border-[#E4E7EC] bg-[#00F0FF]/5">Local SEO</th>
              <th class="p-4 sm:p-5 font-bold text-[#14151A] text-sm w-3/8 border-l border-[#E4E7EC]">National SEO</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#E4E7EC] text-[#5B5F6B]">
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Goal</td>
              <td class="p-4 sm:p-5 font-semibold text-[#14151A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Rank for nearby, ready-to-act searches</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Rank for a topic across a country</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Main surface</td>
              <td class="p-4 sm:p-5 font-semibold text-[#14151A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Google map pack, "near me" results</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Standard organic results</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Biggest lever</td>
              <td class="p-4 sm:p-5 font-semibold text-[#14151A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Google Business Profile + reviews</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Content depth + backlinks</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Time to first movement</td>
              <td class="p-4 sm:p-5 font-semibold text-[#16A34A] border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-mono">4–8 weeks</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono">3–6 months</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Cost to start</td>
              <td class="p-4 sm:p-5 font-semibold text-[#14151A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Lower — the biggest wins are free</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Higher — content and links take time</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Searcher intent</td>
              <td class="p-4 sm:p-5 font-semibold text-[#14151A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Immediate: call, visit, book</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Researching, comparing</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Right for</td>
              <td class="p-4 sm:p-5 font-semibold text-[#14151A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Clinics, restaurants, salons, installers, local services</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Ecommerce, SaaS, national brands, publishers</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 5. SECTION — Why it matters -->
    <!-- ========================================================================= -->
    <section class="max-w-4xl mx-auto px-4 pb-20" data-aos="fade-up">
      <div class="card-dark p-8 md:p-12 space-y-6 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl">
        <div class="text-xs font-mono text-[#00A8B5] uppercase font-bold tracking-wider">WHY IT MATTERS</div>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A]">
          Why local SEO returns faster than almost anything else
        </h2>
        
        <p class="text-base text-[#5B5F6B] leading-relaxed">
          A local search is rarely idle curiosity. Someone searching "dentist near me" or "solar installer in [city]" is close to acting — often the same day. That intent is what makes local SEO unusual: the traffic is smaller than national SEO but converts at a much higher rate.
        </p>

        <p class="text-base text-[#5B5F6B] leading-relaxed">
          It's also the cheapest organic channel to start. A complete, active Google Business Profile costs nothing and is frequently the single highest-return hour a local business will spend on marketing. Most competitors have one and neglect it, which is the opening.
        </p>

        <p class="text-base text-[#5B5F6B] leading-relaxed">
          The dynamic is now shifting again. When someone asks an AI assistant "best [service] near me", the answer draws on the same signals local SEO builds — profile completeness, review text, consistent business data. Local SEO has become the foundation for AI recommendation as well as map rankings, which means the work compounds across two channels at once.
        </p>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 6. SECTION — What's included (7-card grid) -->
    <!-- ========================================================================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-20" data-aos="fade-up">
      <div class="text-center space-y-3 mb-12">
        <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">WHAT'S INCLUDED</span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A]">
          What's included in Digital4Local's local SEO service
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- 1. Google Business Profile optimisation -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">01</div>
          <h3 class="font-bold text-base text-[#14151A]">Google Business Profile optimisation</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Complete setup or overhaul: accurate categories, service areas, hours, attributes, services and products, and real photos. Profile completeness is a direct ranking signal, and most profiles we audit are missing attributes that customers filter on.
          </p>
        </div>

        <!-- 2. Local keyword and intent mapping -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">02</div>
          <h3 class="font-bold text-base text-[#14151A]">Local keyword and intent mapping</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Identifying the "near me", "in [city]" and service-plus-location queries that actually matter for your business — then mapping each to a page rather than letting them compete for the same one.
          </p>
        </div>

        <!-- 3. Citation building and NAP cleanup -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold font-mono">03</div>
          <h3 class="font-bold text-base text-[#14151A]">Citation building and NAP cleanup</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Auditing every place your business details appear online, correcting inconsistencies, and building listings on directories that matter in your category. This is unglamorous work with a disproportionate effect on map rankings.
          </p>
        </div>

        <!-- 4. Local landing pages -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#D97706]/15 text-[#D97706] flex items-center justify-center font-bold font-mono">04</div>
          <h3 class="font-bold text-base text-[#14151A]">Local landing pages</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Genuine, useful pages for each area you serve — not thin templates with the city name swapped. Search engines and AI models both discount duplicated location pages.
          </p>
        </div>

        <!-- 5. Review generation and management -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#EC4899]/15 text-[#EC4899] flex items-center justify-center font-bold font-mono">05</div>
          <h3 class="font-bold text-base text-[#14151A]">Review generation and management</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            A system for asking at the right moment, responding to every review, and building the steady recency that local ranking rewards. Review text also feeds AI recommendations, so we focus on getting descriptive reviews, not just five stars.
          </p>
        </div>

        <!-- 6. Local schema and technical setup -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00A8B5]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">06</div>
          <h3 class="font-bold text-base text-[#14151A]">Local schema and technical setup</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            LocalBusiness and relevant schema markup, embedded map, correct address markup, and mobile speed — the technical foundations that let both crawlers and AI models read your location data unambiguously.
          </p>
        </div>

        <!-- 7. Reporting you can actually read -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all md:col-span-2 lg:col-span-1">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">07</div>
          <h3 class="font-bold text-base text-[#14151A]">Reporting you can actually read</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Monthly: map pack positions for your priority terms, profile views and actions, review growth, and calls or direction requests generated. Plain English, no vanity metrics.
          </p>
        </div>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 7. SECTION — How we work (4 steps) -->
    <!-- ========================================================================= -->
    <section id="how-we-work" class="max-w-7xl mx-auto px-4 sm:px-8 pb-20" data-aos="fade-up">
      <div class="text-center space-y-3 mb-12">
        <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">HOW WE WORK</span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A]">
          How we work
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#00A8B5] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#00A8B5] font-bold">PHASE 01</span>
          <h3 class="text-lg font-bold text-[#14151A]">1. Discover</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            We audit your Google Business Profile, your citation consistency across the web, your current map-pack positions, and what your competitors are doing differently. You get the findings whether or not you continue.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#16A34A] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#16A34A] font-bold">PHASE 02</span>
          <h3 class="text-lg font-bold text-[#14151A]">2. Design</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            A prioritised plan — usually profile completeness and NAP cleanup first because they move fastest, then local pages and review systems. We tell you what to expect and when.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#8B5CF6] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#8B5CF6] font-bold">PHASE 03</span>
          <h3 class="text-lg font-bold text-[#14151A]">3. Deliver</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Profile optimisation, citation corrections, page builds and review-system setup. You approve anything that changes how your business appears publicly.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#D97706] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#D97706] font-bold">PHASE 04</span>
          <h3 class="text-lg font-bold text-[#14151A]">4. Grow</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Monthly reporting, ongoing review generation, profile posts, and quarterly reassessment as competitors move and Google changes what it weights.
          </p>
        </div>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 8. SECTION — Fit check (two-column) -->
    <!-- ========================================================================= -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 pb-20" data-aos="fade-up">
      <div class="text-center space-y-3 mb-10">
        <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">FIT CHECK</span>
        <h2 class="text-3xl font-extrabold text-[#14151A]">
          Who this service is for
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
        <!-- Good Fit Column -->
        <div class="card-dark p-8 bg-[#F6F8FB] border-2 border-[#16A34A]/40 rounded-2xl space-y-4">
          <div class="flex items-center gap-2 text-[#16A34A] font-bold text-sm font-mono uppercase">
            <i data-lucide="check-circle" class="w-5 h-5"></i> A good fit if you are:
          </div>
          <ul class="space-y-3 text-xs sm:text-sm text-[#14151A]">
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>A business serving customers in a defined area — one city, a few neighbourhoods, a service radius</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>A clinic, restaurant, salon, installer, dealership, or local service business</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Running multiple locations that each need to rank in their own area</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Already investing in ads and want an organic channel that doesn't stop when spending stops</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Getting found by existing customers but not by new ones nearby</span>
            </li>
          </ul>
        </div>

        <!-- Not A Good Fit Column -->
        <div class="card-dark p-8 bg-[#F6F8FB] border-2 border-[#EF4444]/30 rounded-2xl space-y-4">
          <div class="flex items-center gap-2 text-[#EF4444] font-bold text-sm font-mono uppercase">
            <i data-lucide="x-circle" class="w-5 h-5"></i> Not a good fit if you are:
          </div>
          <ul class="space-y-3 text-xs sm:text-sm text-[#5B5F6B]">
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Selling nationally or online with no location relevant to the buyer — you need national SEO instead</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Unable to serve a physical service area, or unwilling to publish a real address where the category requires one</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Looking for map-pack results in a week — profile fixes move in weeks, competitive terms take months</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Not willing to ask customers for reviews — reviews are the fuel here, and no agency can manufacture them honestly</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="text-center">
        <p class="text-xs text-[#5B5F6B] font-mono italic">
          We'd rather tell you that upfront than take budget for the wrong service.
        </p>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 9. SECTION — Investment / cost -->
    <!-- ========================================================================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-20" data-aos="fade-up">
      <div class="text-center space-y-4 mb-12">
        <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">INVESTMENT</span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A]">
          What local SEO costs
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          There's no single price, and any quote before an audit is a guess. Four things drive it:
        </p>
      </div>

      <!-- 4 Cost Drivers -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">1. Number of locations</div>
          <p class="text-xs text-[#5B5F6B]">One profile is straightforward; twenty locations is a different operation.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">2. Competitiveness</div>
          <p class="text-xs text-[#5B5F6B]">Ranking a dentist in a metro is harder than in a tier-3 city.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">3. Current state</div>
          <p class="text-xs text-[#5B5F6B]">Consistent citations need less remedial work than suspended listings.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">4. Content scope</div>
          <p class="text-xs text-[#5B5F6B]">Local landing pages add scope beyond profile and citation work.</p>
        </div>
      </div>

      <!-- Currency Switcher & Packages Grid -->
      <div class="flex items-center justify-center gap-2 mb-8">
        <button data-currency="INR" class="currency-btn active px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#00F0FF] text-[#0A0A0F]">🇮🇳 INR (₹)</button>
        <button data-currency="USD" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇺🇸 USD ($)</button>
        <button data-currency="GBP" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇬🇧 GBP (£)</button>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        <!-- Single Location Starter -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#5B5F6B] uppercase font-bold">Single Location</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹9,999" data-usd="$249" data-gbp="£199">₹9,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/month</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 1 Target Location Google Business Profile</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Full Category & NAP Audit</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 25 Local Citations Setup</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Monthly Map Pack Actions Report</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-secondary w-full text-xs justify-center py-2.5">Book intro call</button>
        </div>

        <!-- Multi-Area Growth -->
        <div class="card-elevated p-8 space-y-6 flex flex-col justify-between relative border-2 border-[#00A8B5] bg-white rounded-2xl shadow-md">
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#00F0FF] text-[#0A0A0F] font-mono text-[10px] font-bold px-3 py-1 rounded-full uppercase">Most Common</div>
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#00A8B5] uppercase font-bold">Multi-Area Growth</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹19,999" data-usd="$499" data-gbp="£399">₹19,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/month</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Up to 3 Target Locations / Service Radii</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 60+ Directory Listings & Cleanup</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Local Landing Pages Creation</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Review Generation & Response System</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-primary w-full text-xs justify-center py-2.5">Book intro call</button>
        </div>

        <!-- Multi-Location / Franchise -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#8B5CF6] uppercase font-bold">Enterprise / Franchise</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹34,999" data-usd="$799" data-gbp="£649">₹34,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/month</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Up to 10 Locations Across Cities</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Full Programmatic Landing Pages</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Competitor Spam Redress & Removal</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Dedicated Local SEO Strategist</li>
            </ul>
          </div>
          <a href="../contact.php" class="btn-secondary w-full text-xs justify-center py-2.5">Custom Enterprise Quote</a>
        </div>
      </div>

      <!-- What you always get -->
      <div class="bg-[#F8FAFC] border border-[#E4E7EC] p-6 rounded-xl text-center max-w-3xl mx-auto">
        <p class="text-xs sm:text-sm text-[#14151A] font-medium">
          <strong>What you always get:</strong> the audit findings in writing, a fixed monthly scope, and reporting that shows map positions and actual customer actions — not impressions.
        </p>
      </div>
    </section>

    <!-- 9.5. SECTION — Tools & AI We Use for Local SEO -->
    <?php 
    $current_stack_key = 'local-seo';
    include '../includes/tools-stack.php'; 
    ?>

    <!-- 9.6. SECTION — Top 20 Citation Sources We Build -->
    <?php include '../includes/citation-sources.php'; ?>

    <!-- ========================================================================= -->
    <!-- 10. SECTION — Frequently asked questions (8 questions) -->
    <!-- ========================================================================= -->
    <section class="max-w-4xl mx-auto px-4 pb-20" data-aos="fade-up">
      <div class="text-center space-y-3 mb-12">
        <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">FREQUENTLY ASKED QUESTIONS</span>
        <h2 class="text-3xl font-extrabold text-[#14151A]">
          Frequently Asked Questions
        </h2>
        <p class="text-xs text-[#5B5F6B]">
          (8 questions · FAQPage schema included · written as standalone extractable answers)
        </p>
      </div>

      <div class="space-y-4">
        
        <!-- Q1 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What is local SEO?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Local SEO is the practice of optimising a business's online presence to appear in searches from nearby customers — "near me" queries, "in [city]" searches, and the Google map pack. Its main levers are the Google Business Profile, review signals, consistent business listings across the web, and location-relevant content.
          </div>
        </div>

        <!-- Q2 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How long does local SEO take to show results?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Google Business Profile improvements and citation corrections often show movement within four to eight weeks. Competitive map-pack positions in dense urban categories typically take three to six months. Local SEO is generally faster than national SEO because the competitive set is smaller.
          </div>
        </div>

        <!-- Q3 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What is the Google map pack and how do I get into it?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            The map pack is the group of three local businesses Google displays above standard results for local queries. Getting into it depends primarily on proximity to the searcher, the completeness and accuracy of your Google Business Profile, and your review signals — quantity, recency and content. Backlinks matter less here than in standard organic results.
          </div>
        </div>

        <!-- Q4 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How many reviews do I need to rank locally?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            There is no fixed number. What matters more is a steady, ongoing flow of recent reviews rather than a single burst, along with the detail contained in them. Descriptive reviews mentioning specific services also help AI assistants recommend your business for specific queries.
          </div>
        </div>

        <!-- Q5 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Does local SEO work without a physical address?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Partly. Service-area businesses without a storefront can rank in local search by defining service areas in the Google Business Profile, though options differ from businesses with a public address. Some categories and features require a verifiable address, so this should be confirmed for your specific situation.
          </div>
        </div>

        <!-- Q6 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What is NAP consistency and why does it matter?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            NAP stands for name, address and phone number. Consistency means these details are identical everywhere they appear online — your website, Google Business Profile, and every directory. Inconsistent details reduce a search engine's confidence in which information is correct, which weakens local rankings.
          </div>
        </div>

        <!-- Q7 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Can local SEO help my business appear in AI answers?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Yes. When someone asks an AI assistant for a recommendation near them, the answer draws on many of the same signals local SEO builds: a complete business profile, consistent details across sources, and review content. Local SEO and generative engine optimisation overlap significantly for local businesses.
          </div>
        </div>

        <!-- Q8 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Do I need local SEO if I already run Google Ads?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            They serve different purposes. Ads stop producing the moment spending stops; local SEO builds a position that continues generating enquiries. Most local businesses run both, using ads for immediate volume and local SEO as the compounding foundation.
          </div>
        </div>

      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 11. SECTION — Explore more (Official 8 Services Cross-linking) -->
    <!-- ========================================================================= -->
    <?php include '../includes/explore-services.php'; ?>

    <!-- ========================================================================= -->
    <!-- 12. SECTION — Closing CTA banner -->
    <!-- ========================================================================= -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6" data-aos="fade-up">
      <div class="card-dark bg-gradient-to-br from-[#00F0FF]/10 via-[#F8FAFC] to-[#16A34A]/10 border-2 border-[#00A8B5] p-10 sm:p-14 rounded-3xl text-center space-y-6 shadow-xl">
        <h2 class="text-2xl sm:text-4xl font-extrabold text-[#14151A] tracking-tight">
          Ready to be found by the customers closest to you?
        </h2>
        <p class="text-sm sm:text-base text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          Digital4Local runs local SEO for businesses across India — profile, reviews, citations and local pages, reported in plain English. Tell us where you want to rank and we'll audit where you stand today.
        </p>
        <div>
          <button class="trigger-book-demo btn-primary text-sm px-8 py-3.5 shadow-lg font-bold">
            <i data-lucide="calendar" class="w-4 h-4"></i> Book an intro call
          </button>
        </div>
      </div>
    </section>

  </main>

  <?php include_once '../includes/footer.php'; ?>
</body>
</html>
