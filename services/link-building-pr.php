<?php
require_once __DIR__ . '/../includes/site-config.php';
$link_cfg = get_page_config('services_link_pr');

$page_title = "Link Building & Digital PR Services — Earned, Not Bought | Digital4Local";
$page_description = "Link building and digital PR that earns real backlinks — no PBNs, no bought links, no directory spam. Build authority Google and AI can actually trust.";
$canonical_url = "https://digital4local.com/services/link-building-pr.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../includes/seo.php'; ?>

  <!-- FAQPage Schema for Link Building & Digital PR -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "What is link building?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Link building is the practice of earning links from other websites to your own. Search engines treat a link as an editorial signal that another site considers your content worth referencing, which contributes to how authoritative your site appears. Legitimate link building earns links through coverage, useful content and outreach rather than purchasing them."
        }
      },
      {
        "@type": "Question",
        "name": "What is the difference between link building and digital PR?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Link building is the broader goal of earning backlinks. Digital PR is a specific method of achieving it — earning media coverage and mentions on online publications through newsworthy stories, expert commentary or original data, with links arising as a byproduct. Digital PR also produces brand mentions and referral traffic that pure link building does not."
        }
      },
      {
        "@type": "Question",
        "name": "Is buying backlinks safe?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "No. Paid links that pass ranking signals violate search engine spam policies, and sites can be penalised for participating in link schemes. The consequences affect the website owner rather than the provider who sold the links, and recovering from a link-based penalty typically takes longer than the rankings the links produced."
        }
      },
      {
        "@type": "Question",
        "name": "How many backlinks does my website need?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "There is no target number, and any provider quoting one is selling volume rather than quality. What matters is relevance and credibility of the linking sites. For a local business, a modest number of genuine links from relevant local and industry sources typically outperforms hundreds of low-quality directory links."
        }
      },
      {
        "@type": "Question",
        "name": "How long does link building take to show results?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Link building is the slowest SEO discipline. Outreach and coverage take weeks to land, and search engines then need time to recrawl and reassess authority. Meaningful ranking movement usually takes three to six months, and results compound over a longer period rather than appearing at a single point."
        }
      },
      {
        "@type": "Question",
        "name": "What are toxic backlinks and should I disavow them?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Toxic backlinks come from spam sites, link farms or paid networks, often left behind by a previous provider. Not every low-quality link needs action, since search engines discount many automatically. A backlink audit determines whether the profile is genuinely harmful and whether a disavow file is warranted, rather than disavowing indiscriminately."
        }
      },
      {
        "@type": "Question",
        "name": "Do backlinks help my business get mentioned by AI tools?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Indirectly, yes. AI answer engines weigh what independent, credible sources say about a business when deciding whether to cite it. Coverage and mentions across trusted publications help a model verify that a business is real and reputable, which supports citation — and digital PR produces those mentions whether or not they include a link."
        }
      },
      {
        "@type": "Question",
        "name": "Can I do link building myself?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Some of it. A local business can build genuine citations, join relevant industry associations and pitch local stories without an agency. What is harder to do alone is sustained outreach at scale and identifying which opportunities are worth pursuing. Avoid free backlink lists and directory submission tools — those are the sources search engines discount."
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
        <span class="text-[#00A8B5] font-bold">Link Building & Digital PR</span>
      </nav>

      <!-- Kicker -->
      <div>
        <span class="pulse-badge uppercase tracking-wider font-mono text-xs">
          AUTHORITY YOU EARN. NOT AUTHORITY YOU BUY.
        </span>
      </div>

      <!-- Main Headline -->
      <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A] tracking-tight">
        Link Building & Digital PR Services
      </h1>

      <!-- Direct-answer opening paragraph (AI extractable block) -->
      <div class="max-w-3xl mx-auto bg-[#F6F8FB] border border-[#E4E7EC] p-6 sm:p-8 rounded-2xl text-left shadow-sm">
        <div class="text-[11px] font-mono text-[#00A8B5] font-bold uppercase tracking-wider mb-2 flex items-center gap-1.5">
          <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Direct Answer Overview
        </div>
        <p class="text-base sm:text-lg text-[#14151A] leading-relaxed">
          Link building is the practice of earning links from other websites to your own, because search engines treat a link as a signal that another site considers your content worth referencing. Digital PR is how those links are earned legitimately — through genuine coverage, useful content and real relationships, rather than purchased placements. Digital4Local builds links for local businesses across India using methods that comply with search engine guidelines. We do not sell private blog networks, paid link packages or bulk directory submissions, because those carry real risk of penalty.
        </p>
      </div>

      <!-- Action Buttons -->
      <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
        <button class="trigger-book-demo btn-primary text-xs px-6 py-3 shadow-md">
          <i data-lucide="shield-check" class="w-4 h-4"></i> Get a free backlink audit
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
    <!-- 3. SECTION — What we will not do (Differentiator) -->
    <!-- ========================================================================= -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 pb-20" data-aos="fade-up">
      <div class="card-dark p-8 sm:p-12 border-2 border-[#EF4444]/30 bg-[#FFFDFD] rounded-3xl space-y-6 shadow-sm">
        <div class="text-center space-y-2">
          <span class="text-xs font-mono text-[#EF4444] font-bold uppercase tracking-wider">OUR LINE</span>
          <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A]">
            What we will not do — and why
          </h2>
          <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto">
            Link building is the one SEO service where the wrong provider can actively damage your site. Google's spam policies treat link schemes as a violation, and the consequences fall on your domain, not the agency's. So it is worth being explicit about what we refuse:
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
          <div class="p-4 bg-white border border-[#FEE2E2] rounded-xl flex items-start gap-3">
            <i data-lucide="ban" class="w-5 h-5 text-[#EF4444] shrink-0 mt-0.5"></i>
            <div class="text-xs text-[#5B5F6B] leading-relaxed">
              <strong class="text-[#14151A] block mb-0.5">We do not sell links or buy placements.</strong>
              Paid links that pass ranking signals violate search engine guidelines. Sites get penalised for it, and the penalty outlasts the agency relationship.
            </div>
          </div>

          <div class="p-4 bg-white border border-[#FEE2E2] rounded-xl flex items-start gap-3">
            <i data-lucide="ban" class="w-5 h-5 text-[#EF4444] shrink-0 mt-0.5"></i>
            <div class="text-xs text-[#5B5F6B] leading-relaxed">
              <strong class="text-[#14151A] block mb-0.5">We do not use private blog networks (PBNs).</strong>
              Networks of sites existing only to link out are the clearest form of link scheme, and detecting them is something search engines have invested heavily in.
            </div>
          </div>

          <div class="p-4 bg-white border border-[#FEE2E2] rounded-xl flex items-start gap-3">
            <i data-lucide="ban" class="w-5 h-5 text-[#EF4444] shrink-0 mt-0.5"></i>
            <div class="text-xs text-[#5B5F6B] leading-relaxed">
              <strong class="text-[#14151A] block mb-0.5">We do not do bulk directory submissions.</strong>
              Submitting your site to hundreds of low-quality directories produces links no one will ever click and search engines discount or penalise.
            </div>
          </div>

          <div class="p-4 bg-white border border-[#FEE2E2] rounded-xl flex items-start gap-3">
            <i data-lucide="ban" class="w-5 h-5 text-[#EF4444] shrink-0 mt-0.5"></i>
            <div class="text-xs text-[#5B5F6B] leading-relaxed">
              <strong class="text-[#14151A] block mb-0.5">We do not do automated or spun-content guest posting.</strong>
              Mass-produced articles placed on sites that accept anything are a link scheme wearing a content costume.
            </div>
          </div>

          <div class="p-4 bg-white border border-[#FEE2E2] rounded-xl flex items-start gap-3">
            <i data-lucide="ban" class="w-5 h-5 text-[#EF4444] shrink-0 mt-0.5"></i>
            <div class="text-xs text-[#5B5F6B] leading-relaxed">
              <strong class="text-[#14151A] block mb-0.5">We do not promise a specific number of links per month.</strong>
              Volume promises force whoever delivers them toward exactly the shortcuts above.
            </div>
          </div>

          <div class="p-4 bg-white border border-[#FEE2E2] rounded-xl flex items-start gap-3">
            <i data-lucide="ban" class="w-5 h-5 text-[#EF4444] shrink-0 mt-0.5"></i>
            <div class="text-xs text-[#5B5F6B] leading-relaxed">
              <strong class="text-[#14151A] block mb-0.5">We do not use link exchanges at scale.</strong>
              Reciprocal linking arrangements built for ranking purposes rather than genuine relevance are explicitly covered by spam policies.
            </div>
          </div>
        </div>

        <div class="p-4 bg-[#FEF2F2] border-l-4 border-l-[#EF4444] rounded-r-xl text-xs text-[#14151A] leading-relaxed">
          <strong>Warning for buyers:</strong> If another provider has offered you "100 backlinks for a fixed monthly fee," that is what is being sold. It may produce a short-term ranking movement. It is a liability sitting on your domain.
        </div>

        <div class="text-xs text-[#5B5F6B] leading-relaxed pt-2">
          <strong>The honest trade-off:</strong> legitimate link building is slower and produces fewer links than a spam package. What it produces instead is links that keep working, cannot be revoked, and will not require a disavow file and a recovery project two years from now.
        </div>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 4. SECTION — Definitions (3-card grid) -->
    <!-- ========================================================================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-20" data-aos="fade-up">
      <div class="text-center space-y-3 mb-12">
        <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">DEFINITIONS</span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A]">
          What are backlinks, link building and digital PR?
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto">
          Each definition below is written to stand alone as a complete, quotable answer.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#00A8B5] font-bold">01 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">01 · Backlinks</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              A backlink is a link from one website to another. Search engines use backlinks as a signal of credibility, on the reasoning that a link is an editorial vote — one site pointing readers toward another. Not all backlinks carry equal weight: a link from a relevant, trusted site is worth far more than many links from unrelated or low-quality sources.
            </p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#16A34A] font-bold">02 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">02 · Link Building</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Link building is the practice of earning backlinks to your website. Legitimate link building works by creating something worth referencing and then making the right people aware of it — through outreach, digital PR, useful resources and genuine relationships. Illegitimate link building buys or manufactures links, which search engines classify as a link scheme.
            </p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#8B5CF6] font-bold">03 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">03 · Digital PR</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Digital PR is the practice of earning media coverage and mentions online, with links as a byproduct rather than the sole purpose. It uses the methods of traditional public relations — newsworthy stories, expert commentary, original data — applied to online publications. It is currently the most durable way to earn high-quality links at scale.
            </p>
          </div>
        </div>
      </div>

      <!-- Worth Knowing Callout -->
      <div class="card-dark p-6 border-l-4 border-l-[#00A8B5] bg-[#F8FAFC] rounded-r-2xl max-w-4xl mx-auto">
        <div class="text-xs font-mono text-[#00A8B5] font-bold mb-1">WORTH KNOWING</div>
        <p class="text-sm text-[#14151A] leading-relaxed">
          For a local business, unlinked brand mentions matter too. A mention of your business name on a credible local site builds recognition and helps AI models verify you exist, even without a clickable link. Digital PR produces both, which is why we treat them as one service rather than two.
        </p>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 5. SECTION — At a glance (comparison table) -->
    <!-- ========================================================================= -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 pb-20" data-aos="fade-up">
      <div class="text-center space-y-3 mb-10">
        <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">AT A GLANCE</span>
        <h2 class="text-3xl font-extrabold text-[#14151A]">
          Legitimate link building vs link schemes — the short comparison
        </h2>
        <p class="text-xs text-[#5B5F6B]">
          (Keep as a real HTML table — highly extractable for AI answers. Never render as an image.)
        </p>
      </div>

      <div class="overflow-x-auto rounded-2xl border border-[#E4E7EC] shadow-sm bg-white">
        <table class="w-full text-left text-xs border-collapse">
          <thead>
            <tr class="bg-[#F8FAFC] border-b border-[#E4E7EC]">
              <th class="p-4 sm:p-5 font-mono uppercase text-[#5B5F6B] font-bold w-1/4">Criteria</th>
              <th class="p-4 sm:p-5 font-bold text-[#00A8B5] text-sm w-3/8 border-l border-[#E4E7EC] bg-[#00F0FF]/5">Earned links (what we do)</th>
              <th class="p-4 sm:p-5 font-bold text-[#EF4444] text-sm w-3/8 border-l border-[#E4E7EC]">Bought / manufactured links</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#E4E7EC] text-[#5B5F6B]">
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">How it works</td>
              <td class="p-4 sm:p-5 font-semibold text-[#14151A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Coverage, outreach, useful content</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444]">Payment, networks, bulk submission</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Speed</td>
              <td class="p-4 sm:p-5 font-semibold text-[#14151A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Slower — weeks to months</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Fast — days</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Volume</td>
              <td class="p-4 sm:p-5 font-semibold text-[#14151A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Fewer, higher quality</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Many, low quality</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Cost per link</td>
              <td class="p-4 sm:p-5 font-semibold text-[#14151A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Higher</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Lower</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Risk to your site</td>
              <td class="p-4 sm:p-5 font-semibold text-[#16A34A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">None — compliant with guidelines</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444] font-semibold">Real — link schemes violate spam policies</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Durability</td>
              <td class="p-4 sm:p-5 font-semibold text-[#16A34A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Permanent; keeps working</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Can be devalued or removed at any time</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Referral traffic</td>
              <td class="p-4 sm:p-5 font-semibold text-[#14151A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Real people click them</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Almost none</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Helps AI cite you?</td>
              <td class="p-4 sm:p-5 font-semibold text-[#00A8B5] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Yes — corroborates your legitimacy</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">No — low-trust sources carry no weight</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">What happens if the agency leaves</td>
              <td class="p-4 sm:p-5 font-semibold text-[#16A34A] border-l border-[#E4E7EC] bg-[#00F0FF]/5">Links remain yours</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444]">Rented links often disappear</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 6. SECTION — Why it matters -->
    <!-- ========================================================================= -->
    <section class="max-w-4xl mx-auto px-4 pb-20" data-aos="fade-up">
      <div class="card-dark p-8 md:p-12 space-y-6 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl">
        <div class="text-xs font-mono text-[#00A8B5] uppercase font-bold tracking-wider">WHY IT MATTERS</div>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A]">
          Why links still matter — and why they now matter twice
        </h2>
        
        <p class="text-base text-[#5B5F6B] leading-relaxed">
          Backlinks remain one of the strongest signals search engines use to judge whether a site deserves to rank. Two sites with comparable content and comparable technical health will be separated largely by authority, and authority is built substantially through what other credible sites say about you.
        </p>

        <p class="text-base text-[#5B5F6B] leading-relaxed">
          For local businesses, the bar is lower than most people assume. You are not competing with national publishers — you are competing with other local businesses, most of whom have very few genuine links. A modest number of real, relevant links can move a local site meaningfully, which is why this work suits smaller businesses better than the industry usually admits.
        </p>

        <p class="text-base text-[#5B5F6B] leading-relaxed">
          The second reason is newer. AI answer engines weigh what independent sources say about a business when deciding whether to cite it. A business mentioned across credible local publications, industry sites and directories is easier for a model to verify and trust than one that exists only on its own website. Digital PR now builds search authority and AI citability at the same time — the same coverage does both jobs.
        </p>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 7. SECTION — What's included (7-card grid) -->
    <!-- ========================================================================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-20" data-aos="fade-up">
      <div class="text-center space-y-3 mb-12">
        <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">WHAT'S INCLUDED</span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A]">
          What's included in Digital4Local's link building and digital PR service
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- 1. Backlink audit & disavow review -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">01</div>
          <h3 class="font-bold text-base text-[#14151A]">Backlink audit & disavow review</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            We map your existing backlink profile, identify toxic or spam links from previous providers, and advise on whether a disavow is warranted. This comes first — there is no point building new links onto a profile that is already damaged.
          </p>
        </div>

        <!-- 2. Competitor link gap analysis -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">02</div>
          <h3 class="font-bold text-base text-[#14151A]">Competitor link gap analysis</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Analysing where your competitors earn links that you do not. This is the fastest route to a realistic target list, because a site that linked to a competitor has already demonstrated it links to businesses like yours.
          </p>
        </div>

        <!-- 3. Digital PR & media outreach -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold font-mono">03</div>
          <h3 class="font-bold text-base text-[#14151A]">Digital PR & media outreach</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Developing angles worth covering — local stories, expert commentary, original data — and pitching them to relevant publications. Coverage earns links, mentions and referral traffic simultaneously.
          </p>
        </div>

        <!-- 4. Local citation building -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#D97706]/15 text-[#D97706] flex items-center justify-center font-bold font-mono">04</div>
          <h3 class="font-bold text-base text-[#14151A]">Local citation building</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Consistent listings on directories, industry associations and local platforms that genuinely matter in your category. This is different from bulk directory spam: fewer listings, chosen for relevance, with consistent business details throughout.
          </p>
        </div>

        <!-- 5. Linkable asset development -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#EC4899]/15 text-[#EC4899] flex items-center justify-center font-bold font-mono">05</div>
          <h3 class="font-bold text-base text-[#14151A]">Linkable asset development</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Building the thing worth linking to — original research, a genuinely useful tool, a local guide, a data study. Outreach without a linkable asset is just asking strangers for favours; with one, you are offering them something their readers want.
          </p>
        </div>

        <!-- 6. Relationship-based outreach -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00A8B5]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">06</div>
          <h3 class="font-bold text-base text-[#14151A]">Relationship-based outreach</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Personalised outreach to publications, local organisations and industry sites. Not mass email templates — those get ignored and damage your brand with the exact people you need on your side.
          </p>
        </div>

        <!-- 7. Reporting on what actually landed -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all md:col-span-2 lg:col-span-1">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">07</div>
          <h3 class="font-bold text-base text-[#14151A]">Reporting on what actually landed</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Monthly: links earned with the referring domain and its relevance, mentions without links, referral traffic, and change in overall authority. No inflated counts of directory submissions dressed up as link building.
          </p>
        </div>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 8. SECTION — How we work (4 steps) -->
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
            We review your existing backlink profile first — what you have, what is helping, and whether anything from a previous provider is actively harmful. You get the findings in writing, including an honest read on whether link building is even your bottleneck.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#16A34A] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#16A34A] font-bold">PHASE 02</span>
          <h3 class="text-lg font-bold text-[#14151A]">2. Plan</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Competitor link gap analysis, a realistic target list, and agreement on the angles and assets we will use to earn coverage. We set expectations on volume honestly — legitimate link building produces fewer links than a spam package, and you should know that before starting.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#8B5CF6] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#8B5CF6] font-bold">PHASE 03</span>
          <h3 class="text-lg font-bold text-[#14151A]">3. Earn</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Asset development, outreach and digital PR. Every placement is reviewed for relevance and quality before we pursue it. Nothing is placed on a site we would not be comfortable showing you.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#D97706] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#D97706] font-bold">PHASE 04</span>
          <h3 class="text-lg font-bold text-[#14151A]">4. Report</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Monthly reporting on links earned, mentions gained and authority movement. We report what landed and what did not — outreach has a natural rejection rate, and any agency reporting a hundred percent success is not doing outreach.
          </p>
        </div>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 9. SECTION — Fit check (two-column) -->
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
              <span>Ranking below competitors who have stronger backlink profiles despite comparable content</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Recovering from a previous provider's low-quality link building</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>A local business in a competitive category where every competitor has similar on-page work</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Able to contribute something genuinely newsworthy — data, expertise, a local story</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Building for the long term and willing to accept a slower, safer approach</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Wanting the authority signals that help both search rankings and AI citation</span>
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
              <span>Looking for a fixed number of links per month at a low price — that is the spam package, and we do not sell it</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Expecting ranking movement within weeks — link building is the slowest SEO discipline to show results</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Unwilling to invest in something worth linking to — outreach without an asset rarely succeeds</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Still carrying unresolved technical SEO problems — links pointing at pages that cannot be crawled or indexed pass no benefit</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Hoping to rank on links alone — links amplify good content; they do not substitute for it</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="text-center">
        <p class="text-xs text-[#5B5F6B] font-mono italic">
          We would rather lose the sale than sell you something that puts your domain at risk.
        </p>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 10. SECTION — Investment / cost -->
    <!-- ========================================================================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-20" data-aos="fade-up">
      <div class="text-center space-y-4 mb-12">
        <span class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">INVESTMENT</span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A]">
          What link building and digital PR costs
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          There is no per-link price, and that is deliberate — pricing per link is what pushes providers toward buying them. Four things drive cost:
        </p>
      </div>

      <!-- 4 Cost Drivers -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">1. Category competition</div>
          <p class="text-xs text-[#5B5F6B]">Earning links in national categories takes far more outreach than in a local service area.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">2. Asset development</div>
          <p class="text-xs text-[#5B5F6B]">Outreach supported by original research or custom data tools performs better and costs more.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">3. Profile condition</div>
          <p class="text-xs text-[#5B5F6B]">A site needing toxic link cleanup or disavow files before new outreach begins carries additional scope.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">4. Campaign scope</div>
          <p class="text-xs text-[#5B5F6B]">A one-off digital PR story campaign is priced differently from a continuous monthly programme.</p>
        </div>
      </div>

      <!-- Currency Switcher & Packages Grid -->
      <div class="flex items-center justify-center gap-2 mb-8">
        <button data-currency="INR" class="currency-btn active px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#00F0FF] text-[#0A0A0F]">🇮🇳 INR (₹)</button>
        <button data-currency="USD" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇺🇸 USD ($)</button>
        <button data-currency="GBP" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇬🇧 GBP (£)</button>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        <!-- Local Authority Foundation -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#5B5F6B] uppercase font-bold">Local Authority</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹19,999" data-usd="$499" data-gbp="£399">₹19,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/month</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Full Toxic Link Audit & Disavow Review</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Competitor Link Gap Analysis</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> High-Relevance Local Directory Outreach</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Monthly Earned Link & Mention Report</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-secondary w-full text-xs justify-center py-2.5">Book intro call</button>
        </div>

        <!-- Growth Digital PR Retainer -->
        <div class="card-elevated p-8 space-y-6 flex flex-col justify-between relative border-2 border-[#00A8B5] bg-white rounded-2xl shadow-md">
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#00F0FF] text-[#0A0A0F] font-mono text-[10px] font-bold px-3 py-1 rounded-full uppercase">Most Popular</div>
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#00A8B5] uppercase font-bold">Growth Digital PR</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹39,999" data-usd="$949" data-gbp="£749">₹39,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/month</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Targeted Editorial Media Pitching</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Custom Linkable Asset Development</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> High-DR Industry Contextual Outreach</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> AI Brand Citation & Corroboration Setup</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-primary w-full text-xs justify-center py-2.5">Book intro call</button>
        </div>

        <!-- Scale & Brand Category Leader -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#8B5CF6] uppercase font-bold">Category Leadership</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹74,999" data-usd="$1,799" data-gbp="£1,399">₹74,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/month</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> National News & Trade Journal PR Campaigns</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Original Data & Industry Benchmark Studies</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Unlinked Brand Mention Reclamation</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Dedicated Senior PR Strategist</li>
            </ul>
          </div>
          <a href="../contact.php" class="btn-secondary w-full text-xs justify-center py-2.5">Custom PR Quote</a>
        </div>
      </div>

      <!-- What you always get -->
      <div class="bg-[#F8FAFC] border border-[#E4E7EC] p-6 rounded-xl text-center max-w-3xl mx-auto">
        <p class="text-xs sm:text-sm text-[#14151A] font-medium">
          <strong>What you always get:</strong> the backlink audit findings in writing whether or not you continue, honest reporting including outreach that did not land, and no placement on a site we would not show you.
        </p>
      </div>
    </section>

    <!-- 10.5. SECTION — Tools & AI We Use for Link Building & PR -->
    <?php 
    $current_stack_key = 'link-building-pr';
    include '../includes/tools-stack.php'; 
    ?>

    <!-- 10.6. SECTION — We Get You Featured On (Top 10 PR & News Websites) -->
    <?php include '../includes/pr-features.php'; ?>

    <!-- 10.7. SECTION — Top 20 Citation Sources We Build -->
    <?php include '../includes/citation-sources.php'; ?>

    <!-- ========================================================================= -->
    <!-- 11. SECTION — Frequently asked questions (8 questions) -->
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
            <span>What is link building?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Link building is the practice of earning links from other websites to your own. Search engines treat a link as an editorial signal that another site considers your content worth referencing, which contributes to how authoritative your site appears. Legitimate link building earns links through coverage, useful content and outreach rather than purchasing them.
          </div>
        </div>

        <!-- Q2 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What is the difference between link building and digital PR?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Link building is the broader goal of earning backlinks. Digital PR is a specific method of achieving it — earning media coverage and mentions on online publications through newsworthy stories, expert commentary or original data, with links arising as a byproduct. Digital PR also produces brand mentions and referral traffic that pure link building does not.
          </div>
        </div>

        <!-- Q3 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Is buying backlinks safe?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            No. Paid links that pass ranking signals violate search engine spam policies, and sites can be penalised for participating in link schemes. The consequences affect the website owner rather than the provider who sold the links, and recovering from a link-based penalty typically takes longer than the rankings the links produced.
          </div>
        </div>

        <!-- Q4 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How many backlinks does my website need?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            There is no target number, and any provider quoting one is selling volume rather than quality. What matters is relevance and credibility of the linking sites. For a local business, a modest number of genuine links from relevant local and industry sources typically outperforms hundreds of low-quality directory links.
          </div>
        </div>

        <!-- Q5 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How long does link building take to show results?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Link building is the slowest SEO discipline. Outreach and coverage take weeks to land, and search engines then need time to recrawl and reassess authority. Meaningful ranking movement usually takes three to six months, and results compound over a longer period rather than appearing at a single point.
          </div>
        </div>

        <!-- Q6 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What are toxic backlinks and should I disavow them?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Toxic backlinks come from spam sites, link farms or paid networks, often left behind by a previous provider. Not every low-quality link needs action, since search engines discount many automatically. A backlink audit determines whether the profile is genuinely harmful and whether a disavow file is warranted, rather than disavowing indiscriminately.
          </div>
        </div>

        <!-- Q7 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Do backlinks help my business get mentioned by AI tools?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Indirectly, yes. AI answer engines weigh what independent, credible sources say about a business when deciding whether to cite it. Coverage and mentions across trusted publications help a model verify that a business is real and reputable, which supports citation — and digital PR produces those mentions whether or not they include a link.
          </div>
        </div>

        <!-- Q8 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Can I do link building myself?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Some of it. A local business can build genuine citations, join relevant industry associations and pitch local stories without an agency. What is harder to do alone is sustained outreach at scale and identifying which opportunities are worth pursuing. Avoid free backlink lists and directory submission tools — those are the sources search engines discount.
          </div>
        </div>

      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 12. SECTION — Explore more (Official 8 Services Cross-linking) -->
    <!-- ========================================================================= -->
    <?php include '../includes/explore-services.php'; ?>

    <!-- ========================================================================= -->
    <!-- 13. SECTION — Closing CTA banner -->
    <!-- ========================================================================= -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6" data-aos="fade-up">
      <div class="card-dark bg-gradient-to-br from-[#00F0FF]/10 via-[#F8FAFC] to-[#16A34A]/10 border-2 border-[#00A8B5] p-10 sm:p-14 rounded-3xl text-center space-y-6 shadow-xl">
        <h2 class="text-2xl sm:text-4xl font-extrabold text-[#14151A] tracking-tight">
          Find out what your backlink profile actually looks like
        </h2>
        <p class="text-sm sm:text-base text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          Digital4Local audits backlink profiles for local businesses across India — what you have, what is helping, and whether anything from a previous provider needs cleaning up. In writing, before you commit to anything.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4">
          <button class="trigger-book-demo btn-primary text-sm px-8 py-3.5 shadow-lg font-bold">
            <i data-lucide="shield-check" class="w-4 h-4"></i> Get a free backlink audit
          </button>
        </div>
      </div>
    </section>

  </main>

  <?php include_once '../includes/footer.php'; ?>
</body>
</html>
