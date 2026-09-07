<?php
require_once __DIR__ . '/../includes/site-config.php';
$tech_cfg = get_page_config('services_tech_seo');

$page_title = "Technical SEO Services — Fix What Blocks Rankings | Digital4Local";
$page_description = "Technical SEO services that fix crawling, indexing, Core Web Vitals and structured data — so search engines and AI can actually read your site. Free audit.";
$canonical_url = "https://digital4local.com/services/technical-seo.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../includes/seo.php'; ?>

  <!-- FAQPage Schema for Technical SEO -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "What is technical SEO?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Technical SEO is the practice of optimising a website's infrastructure so search engines can crawl, render, index and trust it. It covers site speed and Core Web Vitals, crawlability, indexation, mobile usability, structured data, site architecture and security. It does not involve content writing or link building, but it determines whether either of those can work."
        }
      },
      {
        "@type": "Question",
        "name": "What is the difference between technical SEO and on-page SEO?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "On-page SEO optimises the content of individual pages — titles, headings, copy and internal links — to make them relevant to a search query. Technical SEO optimises the site infrastructure so those pages can be found, crawled, rendered and indexed at all. A page needs both: relevance from on-page work, accessibility from technical work."
        }
      },
      {
        "@type": "Question",
        "name": "How do I know if my website has technical SEO problems?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Most technical problems are invisible from the front end, so a site can look perfect and still be broken to a crawler. Common signals include pages missing from Google, slow mobile loading, coverage errors in Google Search Console, and content that does not appear when you view the page source. A crawl-based audit is the reliable way to find them."
        }
      },
      {
        "@type": "Question",
        "name": "What are Core Web Vitals?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Core Web Vitals are Google's metrics for page experience, measuring loading performance, interactivity and visual stability. They are part of how Google evaluates pages, and they affect users directly: slow or unstable pages lose visitors before content loads, particularly on mobile connections where most local search happens."
        }
      },
      {
        "@type": "Question",
        "name": "How long does technical SEO take to show results?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Some fixes show quickly — removing an accidental noindex tag or correcting a robots.txt block can restore pages within days of recrawling. Speed improvements typically show over weeks. Site architecture changes take longer, because search engines must recrawl and reassess the whole structure. Most engagements see meaningful movement within one to three months."
        }
      },
      {
        "@type": "Question",
        "name": "Does technical SEO affect whether AI tools like ChatGPT mention my business?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. AI answer engines can only cite content their crawlers can reach, render and parse. Blocked crawlers, JavaScript-dependent content that does not render server-side, and missing structured data all make a site harder to cite — even when it is the best answer available. Technical SEO is the foundation of AI search visibility."
        }
      },
      {
        "@type": "Question",
        "name": "Do I need technical SEO if I already have a fast website?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Speed is one part of technical SEO, not all of it. A fast site can still have indexation problems, broken canonicals, missing structured data, blocked sections or poor architecture. An audit confirms whether the rest is sound, and if it is, that is a useful thing to know rather than something to guess at."
        }
      },
      {
        "@type": "Question",
        "name": "Can technical SEO fix a website that lost rankings after a redesign?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Often, yes. Ranking drops after a redesign or migration are usually caused by identifiable technical problems — missing redirects from old URLs, changed site structure, lost metadata, or newly blocked pages. A technical audit is the standard first step in diagnosing a post-migration drop."
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
        <span class="text-[#00A8B5] font-bold">Technical SEO</span>
      </nav>

      <!-- Kicker -->
      <div>
        <span class="pulse-badge uppercase tracking-wider font-mono text-xs">
          IF SEARCH ENGINES CAN'T READ IT, NOTHING ELSE MATTERS.
        </span>
      </div>

      <!-- Main Headline -->
      <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A] tracking-tight">
        Technical SEO Services
      </h1>

      <!-- Direct-answer opening paragraph (AI extractable block) -->
      <div class="max-w-3xl mx-auto bg-[#F6F8FB] border border-[#E4E7EC] p-6 sm:p-8 rounded-2xl text-left shadow-sm">
        <div class="text-[11px] font-mono text-[#00A8B5] font-bold uppercase tracking-wider mb-2 flex items-center gap-1.5">
          <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Direct Answer Overview
        </div>
        <p class="text-base sm:text-lg text-[#14151A] leading-relaxed">
          Technical SEO is the practice of fixing the parts of a website that determine whether search engines and AI systems can crawl it, understand it, and trust it — site speed, crawlability, indexing, mobile usability, structured data and site architecture. Digital4Local runs technical SEO for local businesses across India. It is the least visible SEO work and usually the highest-leverage: content and links cannot rank a page that Google struggles to crawl or that takes eight seconds to load on a phone.
        </p>
      </div>

      <!-- Action Buttons -->
      <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
        <button class="trigger-book-demo btn-primary text-xs px-6 py-3 shadow-md">
          <i data-lucide="activity" class="w-4 h-4"></i> Get a free technical audit
        </button>
        <a href="#how-we-work" class="btn-secondary text-xs px-6 py-3">
          See how we work <i data-lucide="arrow-down" class="w-4 h-4"></i>
        </a>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 2. SECTION — Trust strip (Global Logo Strip) -->
    <!-- ========================================================================= -->
    <?php include '../includes/trust-strip.php'; ?>

    <!-- ========================================================================= -->
    <!-- 3. SECTION — Definitions (3-card grid) -->
    <!-- ========================================================================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-20" data-aos="fade-up">
      <div class="text-center space-y-3 mb-12">
        <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">DEFINITIONS</span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A]">
          What is technical SEO, and how is it different from on-page and off-page SEO?
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto">
          Three layers of the same discipline. Each definition below is written to stand alone as a complete, quotable answer — the format AI answer engines extract.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#00A8B5] font-bold">01 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">01 · Technical SEO</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Technical SEO is the practice of optimising a website's infrastructure so search engines can crawl, render, index and trust it. It covers site speed and Core Web Vitals, crawlability, indexation control, mobile usability, structured data, site architecture and security. It does not involve writing content or building links — it makes both of those able to work.
            </p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#16A34A] font-bold">02 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">02 · On-Page SEO</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              On-page SEO is the optimisation of individual page content — titles, headings, body copy, internal links, keyword targeting and image alt text. It determines whether a page is relevant to a query. Technical SEO determines whether that page can be found and read in the first place.
            </p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#8B5CF6] font-bold">03 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">03 · Off-Page SEO</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Off-page SEO covers signals earned outside your website — backlinks, brand mentions, citations and reviews. It builds authority and trust. Off-page work is wasted on a site with technical problems, because links pointing to pages that cannot be crawled or indexed pass no benefit.
            </p>
          </div>
        </div>
      </div>

      <!-- Worth Knowing Callout -->
      <div class="card-dark p-6 border-l-4 border-l-[#00A8B5] bg-[#F8FAFC] rounded-r-2xl max-w-4xl mx-auto">
        <div class="text-xs font-mono text-[#00A8B5] font-bold mb-1">WORTH KNOWING</div>
        <p class="text-sm text-[#14151A] leading-relaxed">
          Technical SEO is the only one of the three that can silently cancel out the other two. A site can have excellent content and strong backlinks and still rank poorly because a stray noindex tag, a broken canonical, or a slow mobile experience is quietly blocking it. That is why a technical audit should come first, not last.
        </p>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 4. SECTION — At a glance (comparison table) -->
    <!-- ========================================================================= -->
    <section class="max-w-6xl mx-auto px-4 sm:px-6 pb-20" data-aos="fade-up">
      <div class="text-center space-y-3 mb-10">
        <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">AT A GLANCE</span>
        <h2 class="text-3xl font-extrabold text-[#14151A]">
          The technical SEO issues that actually cost rankings
        </h2>
        <p class="text-xs text-[#5B5F6B]">
          (Structured HTML table engineered for direct extraction by Google Snippets & AI Answer Engines)
        </p>
      </div>

      <div class="overflow-x-auto rounded-2xl border border-[#E4E7EC] shadow-sm bg-white mb-6">
        <table class="w-full text-left text-xs border-collapse">
          <thead>
            <tr class="bg-[#F8FAFC] border-b border-[#E4E7EC]">
              <th class="p-4 sm:p-5 font-mono uppercase text-[#5B5F6B] font-bold w-1/4">Issue</th>
              <th class="p-4 sm:p-5 font-bold text-[#14151A] text-sm w-1/3 border-l border-[#E4E7EC]">What it breaks</th>
              <th class="p-4 sm:p-5 font-bold text-[#D97706] text-sm w-1/5 border-l border-[#E4E7EC]">How visible is it?</th>
              <th class="p-4 sm:p-5 font-bold text-[#00A8B5] text-sm w-1/5 border-l border-[#E4E7EC]">Typical fix time</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#E4E7EC] text-[#5B5F6B]">
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Slow mobile load speed</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#14151A]">Rankings + conversions</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#D97706] font-medium">Invisible until measured</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono text-[#16A34A]">Days to weeks</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Accidental noindex</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444] font-semibold">Page disappears entirely</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444] font-medium">Completely invisible</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono text-[#16A34A] font-bold">Minutes</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Broken or wrong canonicals</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#14151A]">Wrong page ranks, or none</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#D97706] font-medium">Invisible without a crawl</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono text-[#16A34A]">Hours</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Blocked in robots.txt</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444]">Whole sections uncrawlable</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444] font-medium">Invisible</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono text-[#16A34A] font-bold">Minutes</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">No structured data</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#14151A]">Lost rich results, weaker AI understanding</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#D97706] font-medium">Invisible</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono text-[#16A34A]">Days</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">JavaScript-rendered content</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#14151A]">Content search engines never see</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#D97706] font-medium">Invisible</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono text-[#16A34A]">Days to weeks</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Duplicate content</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#14151A]">Split ranking signals</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#5B5F6B]">Semi-visible</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono text-[#16A34A]">Days</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Poor site architecture</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#14151A]">Deep pages never get crawled</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#5B5F6B]">Semi-visible</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono text-[#16A34A]">Weeks</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Missing HTTPS</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#14151A]">Trust signal + browser warnings</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#16A34A] font-medium">Visible to users</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono text-[#16A34A]">Hours</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Table Takeaway -->
      <div class="bg-[#F8FAFC] border border-[#E4E7EC] p-6 rounded-xl max-w-4xl mx-auto text-center">
        <p class="text-xs sm:text-sm text-[#14151A] leading-relaxed">
          <strong>Notice the pattern:</strong> almost every serious technical problem is invisible from the front end. A site can look perfect to its owner and be badly broken to a crawler. That is the entire case for auditing rather than assuming.
        </p>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 5. SECTION — Why it matters -->
    <!-- ========================================================================= -->
    <section class="max-w-4xl mx-auto px-4 pb-20" data-aos="fade-up">
      <div class="card-dark p-8 md:p-12 space-y-6 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl">
        <div class="text-xs font-mono text-[#00A8B5] uppercase font-bold tracking-wider">WHY IT MATTERS</div>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A]">
          Why technical SEO decides whether the rest of your marketing works
        </h2>
        
        <p class="text-base text-[#5B5F6B] leading-relaxed">
          Every other marketing investment points at your website. Local SEO drives map-pack traffic to it. Paid ads send expensive clicks to it. Content builds authority for it. If the site itself is slow, uncrawlable or confusing to a search engine, every one of those budgets is being spent to send people somewhere that cannot convert them — or, worse, somewhere Google will not rank in the first place.
        </p>

        <p class="text-base text-[#5B5F6B] leading-relaxed">
          For local businesses this is sharper than for most. The majority of local search traffic arrives on a mobile phone, frequently on an average connection. A page that takes several seconds to load loses a meaningful share of visitors before it finishes rendering. You have already paid for that click or earned that ranking; the technical failure throws it away at the last step.
        </p>

        <p class="text-base text-[#5B5F6B] leading-relaxed">
          There is now a second reason, and it is growing. AI answer engines can only cite content they can access and parse. ChatGPT, Perplexity, Gemini and Google's AI Overviews rely on crawlers reaching your pages, rendering them, and reading clean structured content. A site with blocked crawlers, JavaScript-dependent content or missing schema is difficult to cite even when it is genuinely the best answer available. Technical SEO has quietly become the entry requirement for AI visibility as well as search rankings.
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
          What's included in Digital4Local's technical SEO service
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- 1. Full technical audit -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">01</div>
          <h3 class="font-bold text-base text-[#14151A]">Full technical audit</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            A complete crawl of your site checking indexation, crawl errors, redirect chains, canonicals, duplicate content, broken links, orphaned pages and site architecture. You get the findings in writing, prioritised by impact — not a 200-page automated export nobody reads.
          </p>
        </div>

        <!-- 2. Core Web Vitals & site speed -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">02</div>
          <h3 class="font-bold text-base text-[#14151A]">Core Web Vitals & site speed</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Diagnosing and fixing what actually slows your pages: uncompressed images, render-blocking scripts, server response time, layout shift and caching. Tested against real mobile network conditions, because that is how your customers experience the site.
          </p>
        </div>

        <!-- 3. Crawlability & indexation control -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold font-mono">03</div>
          <h3 class="font-bold text-base text-[#14151A]">Crawlability & indexation control</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Robots.txt configuration, XML sitemaps, canonical tags and index directives set deliberately rather than inherited from a template. We find the pages that should be indexed and are not, and the pages that are indexed and should not be.
          </p>
        </div>

        <!-- 4. Structured data & schema markup -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#D97706]/15 text-[#D97706] flex items-center justify-center font-bold font-mono">04</div>
          <h3 class="font-bold text-base text-[#14151A]">Structured data & schema markup</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            LocalBusiness, Service, FAQ, Product and Organisation schema implemented and validated. Structured data is how you remove ambiguity about what your business is — for search engines and, increasingly, for AI models deciding whether to cite you.
          </p>
        </div>

        <!-- 5. Mobile usability & responsive fixes -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#EC4899]/15 text-[#EC4899] flex items-center justify-center font-bold font-mono">05</div>
          <h3 class="font-bold text-base text-[#14151A]">Mobile usability & responsive fixes</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Tap target sizing, viewport configuration, intrusive interstitials, and layout problems that only appear on real devices. Mobile is the primary experience for local search, so it is treated as the primary layout, not an adaptation.
          </p>
        </div>

        <!-- 6. AI crawler accessibility -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00A8B5]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">06</div>
          <h3 class="font-bold text-base text-[#14151A]">AI crawler accessibility</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Verifying that AI crawlers can actually reach and render your content — server-side rendering where needed, robots directives reviewed deliberately, and clean semantic HTML. This is the technical foundation of AI search visibility.
          </p>
        </div>

        <!-- 7. Site architecture & internal linking -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all md:col-span-2 lg:col-span-1">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">07</div>
          <h3 class="font-bold text-base text-[#14151A]">Site architecture & internal linking</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Restructuring how pages connect so crawl budget reaches what matters and authority flows to your commercial pages. Deep pages that take five clicks to reach often never get crawled properly at all.
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
          <h3 class="text-lg font-bold text-[#14151A]">1. Audit</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            We crawl your site, review Search Console data, test real-device speed, and check whether search and AI crawlers can access your content. You receive a prioritised findings document — including the issues we consider low-priority and why.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#16A34A] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#16A34A] font-bold">PHASE 02</span>
          <h3 class="text-lg font-bold text-[#14151A]">2. Prioritise</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Not every technical issue is worth fixing. We rank findings by likely ranking impact against implementation effort, and tell you plainly which items will move results and which are housekeeping.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#8B5CF6] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#8B5CF6] font-bold">PHASE 03</span>
          <h3 class="text-lg font-bold text-[#14151A]">3. Fix</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Implementation, working with your developer or handling it directly. Every change is documented, and anything that affects indexation is deployed carefully — a rushed technical fix can remove pages from Google faster than it can add them.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#D97706] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#D97706] font-bold">PHASE 04</span>
          <h3 class="text-lg font-bold text-[#14151A]">4. Monitor</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Technical health degrades over time as sites get updated. Ongoing monitoring of crawl errors, Core Web Vitals, indexation coverage and structured data validity, with a monthly report in plain English.
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
              <span>Publishing good content and building links but seeing little ranking movement</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Running a site that is visibly slow on mobile</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Unsure whether all your important pages are actually indexed by Google</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Planning a site migration or redesign — the highest-risk moment for technical SEO</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Investing in local SEO or paid ads and sending that traffic to a site you have never had audited</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Wanting to be visible in AI search and needing the technical foundation in place first</span>
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
              <span>Expecting technical SEO alone to produce rankings — it removes obstacles; content and authority still have to do the ranking</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Unwilling to make development changes — the audit will identify fixes, and findings that never get implemented change nothing</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Looking for overnight results — some fixes show within days, architectural work takes longer to be recrawled and reflected</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Hoping to avoid the underlying problem with a plugin — plugins help with specific tasks, but they do not diagnose or fix site architecture</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="text-center">
        <p class="text-xs text-[#5B5F6B] font-mono italic">
          We would rather tell you that before the audit than after.
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
          What technical SEO costs
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          There is no single price. Four things drive it:
        </p>
      </div>

      <!-- 4 Cost Drivers -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">1. Site size</div>
          <p class="text-xs text-[#5B5F6B]">Auditing a 20-page local business site is very different from a 5,000-page catalogue.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">2. Current condition</div>
          <p class="text-xs text-[#5B5F6B]">Speed issues need less work than broken canonicals, duplicate content and blocked paths.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">3. Implementation mode</div>
          <p class="text-xs text-[#5B5F6B]">An audit with developer recommendations costs less than hands-on code engineering.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">4. Platform CMS</div>
          <p class="text-xs text-[#5B5F6B]">Some platforms make fixes straightforward; legacy stacks require custom workarounds.</p>
        </div>
      </div>

      <!-- Currency Switcher & Packages Grid -->
      <div class="flex items-center justify-center gap-2 mb-8">
        <button data-currency="INR" class="currency-btn active px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#00F0FF] text-[#0A0A0F]">🇮🇳 INR (₹)</button>
        <button data-currency="USD" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇺🇸 USD ($)</button>
        <button data-currency="GBP" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇬🇧 GBP (£)</button>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        <!-- One-Time Technical Audit -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#5B5F6B] uppercase font-bold">One-Time Diagnostic</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹12,999" data-usd="$349" data-gbp="£279">₹12,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/one-time</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Full 150+ Point Technical Crawl Audit</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Core Web Vitals & Speed Diagnosis</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Prioritised Developer Action Plan</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 45-Min Engineer Walkthrough Call</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-secondary w-full text-xs justify-center py-2.5">Request Audit</button>
        </div>

        <!-- Full Remediation & Retainer -->
        <div class="card-elevated p-8 space-y-6 flex flex-col justify-between relative border-2 border-[#00A8B5] bg-white rounded-2xl shadow-md">
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#00F0FF] text-[#0A0A0F] font-mono text-[10px] font-bold px-3 py-1 rounded-full uppercase">Most Comprehensive</div>
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#00A8B5] uppercase font-bold">Hands-On Remediation</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹24,999" data-usd="$599" data-gbp="£479">₹24,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/month</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Hands-On Code Fixes (Speed & Vitals)</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Structured Data & Schema Implementation</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Indexation & Canonical Tag Repair</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Monthly Degradation & Search Console Monitoring</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-primary w-full text-xs justify-center py-2.5">Start Remediation</button>
        </div>

        <!-- Migration & Enterprise Architecture -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#8B5CF6] uppercase font-bold">Migration & Enterprise</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹49,999" data-usd="$1,199" data-gbp="£949">₹49,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/project</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Full Site Redesign / Migration Safeguard</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 1:1 URL Redirect Mapping & Preservation</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> AI Crawler & SSR Architecture Config</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 60-Day Post-Launch Crawl Supervision</li>
            </ul>
          </div>
          <a href="../contact.php" class="btn-secondary w-full text-xs justify-center py-2.5">Custom Migration Scope</a>
        </div>
      </div>

      <!-- What you always get -->
      <div class="bg-[#F8FAFC] border border-[#E4E7EC] p-6 rounded-xl text-center max-w-3xl mx-auto">
        <p class="text-xs sm:text-sm text-[#14151A] font-medium">
          <strong>What you always get:</strong> the audit findings in writing whether or not you continue, a prioritised fix list with reasoning, and no changes to your live site without approval.
        </p>
      </div>
    </section>

    <!-- 9.5. SECTION — Tools & AI We Use for Technical SEO -->
    <?php 
    $current_stack_key = 'technical-seo';
    include '../includes/tools-stack.php'; 
    ?>

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
          (8 questions · FAQPage schema included · each answer self-contained and 40–70 words)
        </p>
      </div>

      <div class="space-y-4">
        
        <!-- Q1 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What is technical SEO?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Technical SEO is the practice of optimising a website's infrastructure so search engines can crawl, render, index and trust it. It covers site speed and Core Web Vitals, crawlability, indexation, mobile usability, structured data, site architecture and security. It does not involve content writing or link building, but it determines whether either of those can work.
          </div>
        </div>

        <!-- Q2 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What is the difference between technical SEO and on-page SEO?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            On-page SEO optimises the content of individual pages — titles, headings, copy and internal links — to make them relevant to a search query. Technical SEO optimises the site infrastructure so those pages can be found, crawled, rendered and indexed at all. A page needs both: relevance from on-page work, accessibility from technical work.
          </div>
        </div>

        <!-- Q3 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How do I know if my website has technical SEO problems?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Most technical problems are invisible from the front end, so a site can look perfect and still be broken to a crawler. Common signals include pages missing from Google, slow mobile loading, coverage errors in Google Search Console, and content that does not appear when you view the page source. A crawl-based audit is the reliable way to find them.
          </div>
        </div>

        <!-- Q4 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What are Core Web Vitals?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Core Web Vitals are Google's metrics for page experience, measuring loading performance, interactivity and visual stability. They are part of how Google evaluates pages, and they affect users directly: slow or unstable pages lose visitors before content loads, particularly on mobile connections where most local search happens.
          </div>
        </div>

        <!-- Q5 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How long does technical SEO take to show results?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Some fixes show quickly — removing an accidental noindex tag or correcting a robots.txt block can restore pages within days of recrawling. Speed improvements typically show over weeks. Site architecture changes take longer, because search engines must recrawl and reassess the whole structure. Most engagements see meaningful movement within one to three months.
          </div>
        </div>

        <!-- Q6 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Does technical SEO affect whether AI tools like ChatGPT mention my business?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Yes. AI answer engines can only cite content their crawlers can reach, render and parse. Blocked crawlers, JavaScript-dependent content that does not render server-side, and missing structured data all make a site harder to cite — even when it is the best answer available. Technical SEO is the foundation of AI search visibility.
          </div>
        </div>

        <!-- Q7 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Do I need technical SEO if I already have a fast website?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Speed is one part of technical SEO, not all of it. A fast site can still have indexation problems, broken canonicals, missing structured data, blocked sections or poor architecture. An audit confirms whether the rest is sound, and if it is, that is a useful thing to know rather than something to guess at.
          </div>
        </div>

        <!-- Q8 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Can technical SEO fix a website that lost rankings after a redesign?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Often, yes. Ranking drops after a redesign or migration are usually caused by identifiable technical problems — missing redirects from old URLs, changed site structure, lost metadata, or newly blocked pages. A technical audit is the standard first step in diagnosing a post-migration drop.
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
          Find out what's actually blocking your rankings
        </h2>
        <p class="text-sm sm:text-base text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          Digital4Local runs technical SEO audits for local businesses across India. We will tell you what is broken, what it is costing you, and what is worth fixing first — in writing, before you commit to anything.
        </p>
        <div>
          <button class="trigger-book-demo btn-primary text-sm px-8 py-3.5 shadow-lg font-bold">
            <i data-lucide="activity" class="w-4 h-4"></i> Get a free technical audit
          </button>
        </div>
      </div>
    </section>

  </main>

  <?php include_once '../includes/footer.php'; ?>
</body>
</html>
