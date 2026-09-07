<?php
require_once __DIR__ . '/../includes/site-config.php';
$geo_cfg = get_page_config('services_geo_aeo');

$page_title = "GEO & AEO Services — Get Cited by AI | Digital4local";
$page_description = "Generative Engine Optimization and Answer Engine Optimization services. Get your brand cited by ChatGPT, Perplexity, Gemini and Google AI Overviews.";
$canonical_url = "https://digital4local.com/services/geo-aeo.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../includes/seo.php'; ?>

  <!-- FAQPage Schema for GEO & AEO -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "What is Generative Engine Optimization (GEO)?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Generative Engine Optimization is the practice of structuring content so AI answer engines such as ChatGPT, Perplexity, Gemini and Google's AI Overviews cite your business when answering a question. It focuses on being named as a source inside an AI-generated answer, rather than only ranking in a traditional search results list."
        }
      },
      {
        "@type": "Question",
        "name": "What is Answer Engine Optimization (AEO)?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Answer Engine Optimization is the practice of structuring content to win the direct answer on a search results page — featured snippets, People Also Ask boxes and voice assistant responses. It rewards content that answers a specific question plainly and immediately, typically within the first 40 to 60 words under a clear heading."
        }
      },
      {
        "@type": "Question",
        "name": "Does GEO mean geographic SEO?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "No. GEO stands for Generative Engine Optimization, which means optimising to be cited by generative AI answer engines. It is unrelated to geography. Optimising a business to rank in a specific city or area is called Local SEO, which is a separate discipline with different ranking signals."
        }
      },
      {
        "@type": "Question",
        "name": "What is the difference between SEO, AEO and GEO?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "SEO targets a ranking position in the results list and aims to earn a click. AEO targets the direct answer box above those results. GEO targets a citation inside an AI-generated answer. They share a foundation of clear, credible, well-structured content, but they succeed on different surfaces and are measured differently."
        }
      },
      {
        "@type": "Question",
        "name": "How do AI answer engines decide which sources to cite?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "While the exact mechanisms are not published, AI answer engines consistently favour content that states answers clearly and early, comes from a source with consistent and unambiguous entity signals, is corroborated by credible third-party mentions, and has been updated recently. Content that buries its answer or contradicts other sources is harder to cite."
        }
      },
      {
        "@type": "Question",
        "name": "Can you guarantee my business will be cited by ChatGPT?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "No, and any agency offering that guarantee is overselling. No one controls what a generative model cites. What can be committed to is a clear plan, a measured baseline, structural and content improvements that demonstrably increase citability, and honest monthly reporting on citation share."
        }
      },
      {
        "@type": "Question",
        "name": "How do you measure GEO results if there is no click?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Across four layers: citation share across a fixed prompt set, AI referral traffic in analytics, branded search lift in Search Console as a proxy for zero-click visibility, and enquiries that mention an AI assistant when asked how they found you. Measuring GEO on sessions alone understates it substantially."
        }
      },
      {
        "@type": "Question",
        "name": "Do I need GEO if my SEO is already working?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "GEO is increasingly the protection for SEO that is already working. As more searches end inside AI answers, ranking well matters less if the AI does not name you. GEO builds on existing SEO rather than replacing it — a site with strong SEO foundations is usually faster to make citable."
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
        <span class="text-[#00A8B5] font-bold">GEO & AEO</span>
      </nav>

      <!-- Kicker -->
      <div>
        <span class="pulse-badge uppercase tracking-wider font-mono text-xs">
          BE THE ANSWER, NOT THE TENTH BLUE LINK.
        </span>
      </div>

      <!-- Main Headline -->
      <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A] tracking-tight">
        GEO & AEO Services
      </h1>

      <!-- Direct-answer opening paragraph (AI extractable block) -->
      <div class="max-w-3xl mx-auto bg-[#F6F8FB] border border-[#E4E7EC] p-6 sm:p-8 rounded-2xl text-left shadow-sm">
        <div class="text-[11px] font-mono text-[#00A8B5] font-bold uppercase tracking-wider mb-2 flex items-center gap-1.5">
          <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Direct Answer Overview
        </div>
        <p class="text-base sm:text-lg text-[#14151A] leading-relaxed">
          Generative Engine Optimization (GEO) is the practice of structuring content so AI answer engines — ChatGPT, Perplexity, Gemini and Google's AI Overviews — cite your business when they answer a question. Answer Engine Optimization (AEO) is the related practice of winning featured snippets, People Also Ask boxes and voice answers. digital4local runs both as one service, because they share a foundation: content that answers a question clearly enough to be quoted. Traditional SEO competes for a click. GEO and AEO compete to be the answer given before any click happens.
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
          What are SEO, AEO and GEO?
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto">
          Three disciplines, three different targets. Each definition below is written to stand alone as a complete, quotable answer.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#00A8B5] font-bold">01 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">01 · SEO — Search Engine Optimization</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              SEO is the practice of earning visibility in a search engine's results list. Its target is a ranking position, and its success metric is a click. It runs on content relevance, technical health and backlinks. SEO is the foundation the other two build on — a page that no search engine can crawl or trust will not be cited by an AI either.
            </p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#16A34A] font-bold">02 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">02 · AEO — Answer Engine Optimization</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              AEO is the practice of structuring content to win the direct answer on a results page — featured snippets, People Also Ask boxes and voice assistant responses. Its target is the extracted answer block above the results, not a position within them. AEO rewards content that answers a specific question plainly and immediately, usually in 40 to 60 words.
            </p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#8B5CF6] font-bold">03 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">03 · GEO — Generative Engine Optimization</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              GEO is the practice of making content the kind of source a generative AI model trusts, understands and repeats. Its target is a citation inside an AI-generated answer in ChatGPT, Perplexity, Gemini or Google's AI Overviews. GEO depends on clear extractable answers, consistent entity signals, third-party corroboration and content freshness.
            </p>
          </div>
        </div>
      </div>

      <!-- Clarification Callout -->
      <div class="card-dark p-6 border-l-4 border-l-[#00A8B5] bg-[#F8FAFC] rounded-r-2xl max-w-4xl mx-auto">
        <div class="text-xs font-mono text-[#00A8B5] font-bold mb-1">IMPORTANT CLARIFICATION</div>
        <p class="text-sm text-[#14151A] leading-relaxed">
          Important clarification, and one digital4local applies consistently: GEO means Generative Engine Optimization. It does not mean geographic or geographical SEO. Ranking a business in a specific city is Local SEO — a separate discipline we run as a <a href="local-seo.php" class="text-[#00A8B5] font-bold underline hover:text-[#14151A]">separate service</a>. The acronym collision causes real confusion in briefs and strategy documents, so we state the definition explicitly on every page where it appears.
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
          SEO vs AEO vs GEO — the short comparison
        </h2>
        <p class="text-xs text-[#5B5F6B]">
          (Keep as a real HTML table. Tables are among the most reliably extracted formats in AI answers — never render this as an image.)
        </p>
      </div>

      <div class="overflow-x-auto rounded-2xl border border-[#E4E7EC] shadow-sm bg-white">
        <table class="w-full text-left text-xs border-collapse">
          <thead>
            <tr class="bg-[#F8FAFC] border-b border-[#E4E7EC]">
              <th class="p-4 sm:p-5 font-mono uppercase text-[#5B5F6B] font-bold w-1/5">Dimension</th>
              <th class="p-4 sm:p-5 font-bold text-[#14151A] text-sm w-4/15 border-l border-[#E4E7EC]">SEO</th>
              <th class="p-4 sm:p-5 font-bold text-[#16A34A] text-sm w-4/15 border-l border-[#E4E7EC] bg-[#16A34A]/5">AEO</th>
              <th class="p-4 sm:p-5 font-bold text-[#00A8B5] text-sm w-4/15 border-l border-[#E4E7EC] bg-[#00F0FF]/5">GEO</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#E4E7EC] text-[#5B5F6B]">
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Target</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">A ranking position</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#16A34A]/5 font-semibold text-[#14151A]">The answer box</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#00A8B5]">A citation inside an AI answer</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Where it shows</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Search results list</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#16A34A]/5">Featured snippets, PAA, voice</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#14151A]">ChatGPT, Perplexity, Gemini, AI Overviews</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Success looks like</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Position 1–3, a click</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#16A34A]/5">Your text read aloud or boxed</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#14151A]">Your brand named as a source</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Wins on</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Relevance, authority, links</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#16A34A]/5">Direct answers, clear structure</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5">Clarity, entity signals, corroboration, freshness</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Produces a click?</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-semibold text-[#16A34A]">Yes — that's the goal</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#16A34A]/5">Sometimes</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 italic text-[#5B5F6B]">Often not — and that's still a win</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Measured by</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Rankings, sessions, conversions</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#16A34A]/5">Snippet ownership, PAA presence</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5">Citation share, brand mentions, branded search lift</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Time to signal</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono">3–6 months</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#16A34A]/5 font-mono text-[#16A34A]">4–12 weeks</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-mono text-[#00A8B5]">3–6 months</td>
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
          Why being ranked is no longer the same as being found
        </h2>
        
        <p class="text-base text-[#5B5F6B] leading-relaxed">
          A search that ends in an AI answer often ends without a click. The user asks, the model answers, and the businesses named in that answer are the only ones that existed as far as that user is concerned. There is no scrolling past the answer to find you.
        </p>

        <p class="text-base text-[#5B5F6B] leading-relaxed">
          This changes what "visibility" means. Under traditional SEO, ranking fifth still got you seen by someone scanning results. Under an AI answer, being absent means being absent entirely — not lower down.
        </p>

        <p class="text-base text-[#5B5F6B] leading-relaxed">
          The uncomfortable part for most businesses is that AI models can only cite what they can read and verify. A site that buries its answers under three paragraphs of brand language, publishes its key facts inside PDFs, and describes itself inconsistently across the web is difficult to cite even when it is genuinely the best option available. Plenty of excellent businesses are invisible to AI for entirely fixable reasons.
        </p>

        <p class="text-base text-[#14151A] font-semibold leading-relaxed">
          GEO does not replace SEO. It sits on top of it. If your site is not crawlable, fast and trustworthy, no amount of GEO work will make it citable.
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
          What's included in digital4local GEO and AEO service
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- 1. AI visibility audit -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">01</div>
          <h3 class="font-bold text-base text-[#14151A]">AI visibility audit</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            We test a fixed set of the questions your customers actually ask across ChatGPT, Perplexity, Gemini and Google AI Overviews, and record where you are cited, merely mentioned, absent, or described inaccurately. Inaccuracies get fixed first — wrong information in an AI answer is worse than absence.
          </p>
        </div>

        <!-- 2. Answer-first content restructuring -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">02</div>
          <h3 class="font-bold text-base text-[#14151A]">Answer-first content restructuring</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Rewriting key pages so the direct answer appears in the first 40 to 60 words under a question-phrased heading, then expands. This single structural change is the highest-leverage AEO and GEO fix available, and most sites fail it.
          </p>
        </div>

        <!-- 3. Entity and consistency work -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold font-mono">03</div>
          <h3 class="font-bold text-base text-[#14151A]">Entity and consistency work</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Making your business name, category, location, services and contact details identical everywhere they appear online, so a model can identify you confidently and retrieve you for the right questions. Ambiguous entities do not get cited.
          </p>
        </div>

        <!-- 4. Structured data and AI crawler access -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#D97706]/15 text-[#D97706] flex items-center justify-center font-bold font-mono">04</div>
          <h3 class="font-bold text-base text-[#14151A]">Structured data and AI crawler access</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Organisation, FAQ, Article, Service and relevant schema, plus verifying that AI crawlers can actually reach your content — server-side rendering where needed, and robots directives checked deliberately rather than inherited.
          </p>
        </div>

        <!-- 5. Question and prompt research -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#EC4899]/15 text-[#EC4899] flex items-center justify-center font-bold font-mono">05</div>
          <h3 class="font-bold text-base text-[#14151A]">Question and prompt research</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Mapping the conversational prompts buyers type into AI assistants, not just the keywords they type into Google. Prompts are the demand signal traditional keyword tools do not capture, and they drive what content gets built.
          </p>
        </div>

        <!-- 6. Third-party corroboration -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00A8B5]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">06</div>
          <h3 class="font-bold text-base text-[#14151A]">Third-party corroboration</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            AI models weigh what other credible sources say about you. We build the directory listings, review presence and genuine mentions that corroborate your own claims — the same off-page work that supports SEO, aimed at a different outcome.
          </p>
        </div>

        <!-- 7. Citation tracking and reporting -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all md:col-span-2 lg:col-span-1">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">07</div>
          <h3 class="font-bold text-base text-[#14151A]">Citation tracking and reporting</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Monthly: citation share across your prompt set, cited-versus-mentioned split, inaccuracy count, AI referral traffic, and branded search lift. Six numbers, reported the same way every month, so progress is visible.
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
            We build your prompt set — the real questions buyers ask AI about your category — and run a full baseline audit across the major engines. You get the baseline in writing, including where competitors are cited instead of you.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#16A34A] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#16A34A] font-bold">PHASE 02</span>
          <h3 class="text-lg font-bold text-[#14151A]">2. Design</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            A prioritised plan: inaccuracies first, then entity and technical fixes, then the content that closes your biggest citation gaps. We tell you which gaps are realistically closeable and which are not.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#8B5CF6] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#8B5CF6] font-bold">PHASE 03</span>
          <h3 class="text-lg font-bold text-[#14151A]">3. Deliver</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Content restructuring, schema, entity cleanup and crawler access work. Your subject-matter expertise goes into the content through interviews and review — content that does not carry genuine expertise does not get cited.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#D97706] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#D97706] font-bold">PHASE 04</span>
          <h3 class="text-lg font-bold text-[#14151A]">4. Grow</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Monthly citation tracking, quarterly prompt-set review as buyer language shifts, and a content refresh cycle. AI answers favour current information, so freshness is maintenance, not a one-off.
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
              <span>Already investing in SEO and want to protect visibility as clicks move into AI answers</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>In a considered-purchase category where buyers research before contacting anyone</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Seeing competitors named in AI answers where you are not</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Willing to contribute genuine subject expertise — through interviews or review — rather than outsourcing authority entirely</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Able to judge progress on citations and brand lift, not only on sessions</span>
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
              <span>Looking for guaranteed AI citations — nobody controls what a model cites, and any agency promising placements is overselling</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Expecting results in weeks — GEO moves on a similar timeline to SEO, roughly three to six months for meaningful movement</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Working from a site with unresolved technical SEO problems — fix the foundation first, and we will say so</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Measuring success purely in traffic — GEO's largest wins produce no click by design, and judged on sessions alone the work will look like it failed</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="text-center">
        <p class="text-xs text-[#5B5F6B] font-mono italic">
          We would rather set that expectation now than report against the wrong metric later.
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
          What GEO and AEO services cost
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          There is no fixed price. Four things drive it:
        </p>
      </div>

      <!-- 4 Cost Drivers -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">1. Prompt set & estate size</div>
          <p class="text-xs text-[#5B5F6B]">Tracking 20 prompts is a different scope to 200 prompts across a large estate.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">2. Starting condition</div>
          <p class="text-xs text-[#5B5F6B]">Clean technical SEO needs far less remediation than scattered entity data.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">3. Category competition</div>
          <p class="text-xs text-[#5B5F6B]">Displacing well-established cited sources in competitive niches takes longer.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">4. Content production volume</div>
          <p class="text-xs text-[#5B5F6B]">Restructuring existing pages costs less than producing new authority assets.</p>
        </div>
      </div>

      <!-- Currency Switcher & Packages Grid -->
      <div class="flex items-center justify-center gap-2 mb-8">
        <button data-currency="INR" class="currency-btn active px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#00F0FF] text-[#0A0A0F]">🇮🇳 INR (₹)</button>
        <button data-currency="USD" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇺🇸 USD ($)</button>
        <button data-currency="GBP" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇬🇧 GBP (£)</button>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        <!-- Starter GEO Engine -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#5B5F6B] uppercase font-bold">GEO Starter</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹14,999" data-usd="$399" data-gbp="£319">₹14,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/month</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 25 Core Buyer Prompt Monitoring</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Answer-First Page Restructuring</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Organization & FAQ Schema Setup</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Monthly 6-Number Citation Report</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-secondary w-full text-xs justify-center py-2.5">Book intro call</button>
        </div>

        <!-- Growth AI Citation Engine -->
        <div class="card-elevated p-8 space-y-6 flex flex-col justify-between relative border-2 border-[#00A8B5] bg-white rounded-2xl shadow-md">
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#00F0FF] text-[#0A0A0F] font-mono text-[10px] font-bold px-3 py-1 rounded-full uppercase">Most Popular</div>
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#00A8B5] uppercase font-bold">Growth GEO & AEO</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹29,999" data-usd="$699" data-gbp="£559">₹29,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/month</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 75+ Conversational Prompt Vectors</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Complete Entity & Knowledge Graph Sync</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Third-Party Corroboration & Digital PR</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Bi-Weekly Prompt & Citation Analytics</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-primary w-full text-xs justify-center py-2.5">Book intro call</button>
        </div>

        <!-- Enterprise Authority Domination -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#8B5CF6] uppercase font-bold">Enterprise Authority</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹59,999" data-usd="$1,399" data-gbp="£1,099">₹59,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/month</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 200+ Prompt Sets Across All Engines</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Programmatic Comparison Page Architecture</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Custom LLM Crawler Rendering Optimization</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Dedicated Search & GEO Strategist</li>
            </ul>
          </div>
          <a href="../contact.php" class="btn-secondary w-full text-xs justify-center py-2.5">Custom Enterprise Quote</a>
        </div>
      </div>

      <!-- What you always get -->
      <div class="bg-[#F8FAFC] border border-[#E4E7EC] p-6 rounded-xl text-center max-w-3xl mx-auto">
        <p class="text-xs sm:text-sm text-[#14151A] font-medium">
          <strong>What you always get:</strong> the baseline audit findings in writing, a fixed monthly scope, and the same six-number report every month.
        </p>
      </div>
    </section>

    <!-- 9.5. SECTION — Tools & AI We Use for SEO, GEO & AEO -->
    <?php 
    $current_stack_key = 'geo-aeo';
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
            <span>What is Generative Engine Optimization (GEO)?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Generative Engine Optimization is the practice of structuring content so AI answer engines such as ChatGPT, Perplexity, Gemini and Google's AI Overviews cite your business when answering a question. It focuses on being named as a source inside an AI-generated answer, rather than only ranking in a traditional search results list.
          </div>
        </div>

        <!-- Q2 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What is Answer Engine Optimization (AEO)?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Answer Engine Optimization is the practice of structuring content to win the direct answer on a search results page — featured snippets, People Also Ask boxes and voice assistant responses. It rewards content that answers a specific question plainly and immediately, typically within the first 40 to 60 words under a clear heading.
          </div>
        </div>

        <!-- Q3 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Does GEO mean geographic SEO?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            No. GEO stands for Generative Engine Optimization, which means optimising to be cited by generative AI answer engines. It is unrelated to geography. Optimising a business to rank in a specific city or area is called Local SEO, which is a separate discipline with different ranking signals.
          </div>
        </div>

        <!-- Q4 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What is the difference between SEO, AEO and GEO?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            SEO targets a ranking position in the results list and aims to earn a click. AEO targets the direct answer box above those results. GEO targets a citation inside an AI-generated answer. They share a foundation of clear, credible, well-structured content, but they succeed on different surfaces and are measured differently.
          </div>
        </div>

        <!-- Q5 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How do AI answer engines decide which sources to cite?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            While the exact mechanisms are not published, AI answer engines consistently favour content that states answers clearly and early, comes from a source with consistent and unambiguous entity signals, is corroborated by credible third-party mentions, and has been updated recently. Content that buries its answer or contradicts other sources is harder to cite.
          </div>
        </div>

        <!-- Q6 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Can you guarantee my business will be cited by ChatGPT?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            No, and any agency offering that guarantee is overselling. No one controls what a generative model cites. What can be committed to is a clear plan, a measured baseline, structural and content improvements that demonstrably increase citability, and honest monthly reporting on citation share.
          </div>
        </div>

        <!-- Q7 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How do you measure GEO results if there is no click?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Across four layers: citation share across a fixed prompt set, AI referral traffic in analytics, branded search lift in Search Console as a proxy for zero-click visibility, and enquiries that mention an AI assistant when asked how they found you. Measuring GEO on sessions alone understates it substantially.
          </div>
        </div>

        <!-- Q8 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Do I need GEO if my SEO is already working?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            GEO is increasingly the protection for SEO that is already working. As more searches end inside AI answers, ranking well matters less if the AI does not name you. GEO builds on existing SEO rather than replacing it — a site with strong SEO foundations is usually faster to make citable.
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
          Want to know what AI says about your business right now?
        </h2>
        <p class="text-sm sm:text-base text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          Digital4local runs Generative Engine Optimization and Answer Engine Optimization as one service — audit, restructure, track. We will show you where you are cited today before you commit to anything.
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
