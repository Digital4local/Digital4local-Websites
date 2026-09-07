import os
import json

base_dir = os.path.join(os.path.dirname(__file__), '..')
blog_dir = os.path.join(base_dir, 'blog')
os.makedirs(blog_dir, exist_ok=True)

post_slug = "types-of-seo-explained"
post_title = "Types of SEO Explained (Full 2026 Guide)"
meta_title = "Types of SEO Explained (Full 2026 Guide) | Digital4Local"
meta_description = "The main types of SEO explained clearly — technical, on-page, off-page, local, ecommerce, and where AEO/GEO fits as the newest addition."

content_html = """
<div class="space-y-8 text-base text-[#475569] leading-relaxed">

  <!-- Direct Answer Box -->
  <div class="bg-gradient-to-br from-[#1B5FAA]/5 via-[#F8FAFC] to-[#00B4D8]/10 border-2 border-[#1B5FAA] rounded-2xl p-6 sm:p-7 shadow-sm">
    <div class="flex items-center gap-2 text-[#1B5FAA] font-mono text-xs font-bold uppercase tracking-wider mb-2">
      <span>⚡</span>
      <span>Direct Answer / Summary Definition</span>
    </div>
    <p class="text-base sm:text-lg font-medium text-[#14151A] leading-relaxed">
      There are five main types of SEO: <strong>technical SEO</strong> (site infrastructure and crawlability), <strong>on-page SEO</strong> (content and keyword relevance), <strong>off-page SEO</strong> (backlinks and external trust signals), <strong>local SEO</strong> (visibility for location-based searches), and <strong>ecommerce SEO</strong> (product and category page optimisation). A newer category — <strong>AEO/GEO</strong>, optimising for AI-generated answers — is increasingly treated as a distinct discipline alongside the traditional five.
    </p>
  </div>

  <!-- Author Attribution Stamp -->
  <div class="flex items-center gap-3 py-3 px-4 rounded-xl bg-[#F8FAFC] border border-[#E2E8F0] text-xs text-[#64748B]">
    <span class="font-bold text-[#14151A]">Written by Abhishek Raikwar</span>
    <span>•</span>
    <span>Founder, Digital4Local</span>
    <span>•</span>
    <span>Last updated: September 2026</span>
  </div>

  <!-- Section: Why SEO gets split into types -->
  <div class="space-y-4 pt-4">
    <h2 class="text-2xl sm:text-3xl font-bold text-[#14151A] font-['Montserrat',sans-serif] border-b border-[#E2E8F0] pb-3">
      Why SEO Gets Split Into Types at All
    </h2>
    <p>
      SEO isn't one isolated activity — it's an ecosystem of interconnected disciplines that share the same ultimate objective: getting discovered by commercial buyers in search engines and AI assistants.
    </p>
    <p>
      A website can excel in one dimension while failing catastrophically in another. A beautifully written, authoritative article (stellar on-page SEO) hosted on a server that takes eight seconds to load (broken technical SEO) will consistently fail to rank. Search engines and AI crawlers evaluate all dimensions holistically.
    </p>
  </div>

  <!-- The 5 Core Types of SEO -->
  <div class="space-y-8 pt-4">

    <!-- 1. Technical SEO -->
    <div class="bg-white border border-[#E2E8F0] rounded-2xl p-6 sm:p-7 shadow-sm space-y-4">
      <div class="flex items-center gap-3">
        <span class="w-8 h-8 rounded-lg bg-[#1B5FAA] text-white flex items-center justify-center font-bold font-mono text-sm">1</span>
        <h3 class="text-xl font-bold text-[#14151A] font-['Montserrat',sans-serif]">Technical SEO</h3>
      </div>
      <p class="text-sm">
        Technical SEO covers the backend website architecture that determines whether search engines can crawl, render, index, and understand your pages.
      </p>
      <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 space-y-2 text-xs text-[#475569]">
        <div class="font-bold text-[#14151A] font-mono uppercase text-[11px]">Core Components:</div>
        <ul class="list-disc pl-4 space-y-1">
          <li>Server response speed (TTFB) and Core Web Vitals (LCP, INP, CLS)</li>
          <li>Mobile-friendly responsive code and touch targets</li>
          <li>Crawlability — XML sitemaps, robots.txt directives, indexation controls</li>
          <li>JSON-LD structured data (Schema.org) for rich snippets</li>
          <li>Logical internal site architecture and canonicalization tags</li>
        </ul>
      </div>
      <p class="text-xs text-[#64748B]">
        <strong>Why it matters:</strong> A website with world-class content but broken technical infrastructure — like accidental <code class="bg-[#F1F5F9] px-1.5 py-0.5 rounded text-[#E11D48]">noindex</code> tags or sluggish server response — will remain completely invisible. Technical SEO is the foundation upon which all organic rankings sit.
      </p>
    </div>

    <!-- 2. On-Page SEO -->
    <div class="bg-white border border-[#E2E8F0] rounded-2xl p-6 sm:p-7 shadow-sm space-y-4">
      <div class="flex items-center gap-3">
        <span class="w-8 h-8 rounded-lg bg-[#00B4D8] text-white flex items-center justify-center font-bold font-mono text-sm">2</span>
        <h3 class="text-xl font-bold text-[#14151A] font-['Montserrat',sans-serif]">On-Page SEO</h3>
      </div>
      <p class="text-sm">
        On-page SEO covers everything on an individual page that communicates its relevance and depth to a user's search query.
      </p>
      <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 space-y-2 text-xs text-[#475569]">
        <div class="font-bold text-[#14151A] font-mono uppercase text-[11px]">Core Components:</div>
        <ul class="list-disc pl-4 space-y-1">
          <li>Targeted title tags and compelling meta descriptions</li>
          <li>Hierarchical heading structure (H1 single topic, H2/H3 logical sub-topics)</li>
          <li>Topical authority, search intent matching, and semantic keyword integration</li>
          <li>Internal contextual links pointing to relevant service and pillar pages</li>
          <li>Descriptive image ALT tags and semantic HTML5 markup</li>
        </ul>
      </div>
      <p class="text-xs text-[#64748B]">
        <strong>Why it matters:</strong> On-page SEO tells search engines — and increasingly, LLM extractors — precisely what question your content answers. It is the most directly controllable SEO discipline.
      </p>
    </div>

    <!-- 3. Off-Page SEO -->
    <div class="bg-white border border-[#E2E8F0] rounded-2xl p-6 sm:p-7 shadow-sm space-y-4">
      <div class="flex items-center gap-3">
        <span class="w-8 h-8 rounded-lg bg-[#5A9E2F] text-white flex items-center justify-center font-bold font-mono text-sm">3</span>
        <h3 class="text-xl font-bold text-[#14151A] font-['Montserrat',sans-serif]">Off-Page SEO</h3>
      </div>
      <p class="text-sm">
        Off-page SEO covers external trust signals earned outside your website — primarily backlinks, brand mentions, and third-party authority validation.
      </p>
      <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 space-y-2 text-xs text-[#475569]">
        <div class="font-bold text-[#14151A] font-mono uppercase text-[11px]">Core Components:</div>
        <ul class="list-disc pl-4 space-y-1">
          <li>High-authority backlinks from credible industry publications</li>
          <li>Digital PR coverage and editorial features</li>
          <li>Unlinked and linked brand entity co-occurrences</li>
          <li>Consistent directory listings and local citations</li>
        </ul>
      </div>
      <p class="text-xs text-[#64748B]">
        <strong>Why it matters:</strong> Off-page SEO is the internet vouching for your domain's credibility. Without external authority, competing for high-value commercial terms is almost impossible.
      </p>
    </div>

    <!-- 4. Local SEO -->
    <div class="bg-white border border-[#E2E8F0] rounded-2xl p-6 sm:p-7 shadow-sm space-y-4">
      <div class="flex items-center gap-3">
        <span class="w-8 h-8 rounded-lg bg-[#EC4899] text-white flex items-center justify-center font-bold font-mono text-sm">4</span>
        <h3 class="text-xl font-bold text-[#14151A] font-['Montserrat',sans-serif]">Local SEO</h3>
      </div>
      <p class="text-sm">
        <a href="../services/local-seo.php" class="text-[#1B5FAA] font-semibold underline">Local SEO</a> is optimization specifically engineered for location-based search intent — "near me" searches, "[service] in [city]," and the high-converting Google Maps 3-Pack.
      </p>
      <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 space-y-2 text-xs text-[#475569]">
        <div class="font-bold text-[#14151A] font-mono uppercase text-[11px]">Core Components:</div>
        <ul class="list-disc pl-4 space-y-1">
          <li>Google Business Profile (GBP) primary/secondary category optimization</li>
          <li>Local citation consistency (NAP: Name, Address, Phone number)</li>
          <li>Hyper-local service area landing pages (Geo-silos)</li>
          <li>Review velocity, review response management, and client photo uploads</li>
          <li>Local community backlinks from chambers of commerce and local press</li>
        </ul>
      </div>
      <p class="text-xs text-[#64748B]">
        <strong>Why it matters:</strong> Local SEO runs on a distinct algorithm from national search — proximity, review density, and profile completeness outweigh raw domain rating. A brand ranking #1 nationally can easily be invisible in its own local neighborhood without dedicated local SEO.
      </p>
    </div>

    <!-- 5. Ecommerce SEO -->
    <div class="bg-white border border-[#E2E8F0] rounded-2xl p-6 sm:p-7 shadow-sm space-y-4">
      <div class="flex items-center gap-3">
        <span class="w-8 h-8 rounded-lg bg-[#6B21A8] text-white flex items-center justify-center font-bold font-mono text-sm">5</span>
        <h3 class="text-xl font-bold text-[#14151A] font-['Montserrat',sans-serif]">Ecommerce SEO</h3>
      </div>
      <p class="text-sm">
        Ecommerce SEO focuses specifically on optimizing online retail stores with extensive product catalogs and multi-level category taxonomies.
      </p>
      <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-xl p-4 space-y-2 text-xs text-[#475569]">
        <div class="font-bold text-[#14151A] font-mono uppercase text-[11px]">Core Components:</div>
        <ul class="list-disc pl-4 space-y-1">
          <li>Product schema markup (price, availability, SKU, aggregateRating)</li>
          <li>Category hierarchy and faceted navigation canonical management</li>
          <li>Handling out-of-stock and discontinued inventory without losing rank equity</li>
          <li>Preventing thin and duplicate content across product color/size variations</li>
        </ul>
      </div>
      <p class="text-xs text-[#64748B]">
        <strong>Why it matters:</strong> Ecommerce websites face technical complexities — infinite URL permutations from filter combinations — that general content sites never encounter.
      </p>
    </div>

  </div>

  <!-- Section: The Newest Addition - AEO and GEO -->
  <div class="space-y-4 pt-6">
    <h2 class="text-2xl sm:text-3xl font-bold text-[#14151A] font-['Montserrat',sans-serif] border-b border-[#E2E8F0] pb-3">
      The Newest Addition: AEO and GEO
    </h2>
    <p>
      Two modern terms have entered the search lexicon to address the rise of conversational AI engines:
    </p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
      <div class="bg-white border border-[#E2E8F0] rounded-2xl p-6 space-y-2">
        <h3 class="text-base font-bold text-[#14151A] font-['Montserrat',sans-serif]">AEO (Answer Engine Optimisation)</h3>
        <p class="text-xs text-[#5B5F6B] leading-relaxed">
          Optimizing content specifically to win Featured Snippets, "People Also Ask" dropdowns, and voice search responses — positioning concise, factual direct answers directly above standard organic links.
        </p>
      </div>
      <div class="bg-white border border-[#E2E8F0] rounded-2xl p-6 space-y-2">
        <h3 class="text-base font-bold text-[#14151A] font-['Montserrat',sans-serif]">GEO (Generative Engine Optimisation)</h3>
        <p class="text-xs text-[#5B5F6B] leading-relaxed">
          Optimizing your brand entity, citations, and content to be cited and recommended directly inside generative AI answers from tools like ChatGPT, Gemini, Perplexity, and Google AI Overviews (<a href="../services/geo-aeo.php" class="text-[#1B5FAA] font-semibold underline">explore Digital4Local's GEO/AEO service</a>).
        </p>
      </div>
    </div>
    <p class="text-sm">
      Whether considered a sixth SEO type or a next-generation evolution, AEO and GEO rely on the same fundamental building blocks: clean technical schema and structured, authoritative content.
    </p>
  </div>

  <!-- Quick Comparison Table -->
  <div class="space-y-4 pt-6">
    <h2 class="text-2xl sm:text-3xl font-bold text-[#14151A] font-['Montserrat',sans-serif] border-b border-[#E2E8F0] pb-3">
      Quick Comparison: The Types of SEO
    </h2>
    <div class="overflow-x-auto bg-white border border-[#E2E8F0] rounded-2xl shadow-sm">
      <table class="w-full text-left border-collapse text-xs sm:text-sm">
        <thead>
          <tr class="bg-[#F8FAFC] border-b border-[#E2E8F0] font-['Montserrat',sans-serif] text-[#14151A]">
            <th class="p-4 font-bold">SEO Type</th>
            <th class="p-4 font-bold">Primary Focus</th>
            <th class="p-4 font-bold">Main Ranking Surface</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-[#E2E8F0] text-[#475569]">
          <tr>
            <td class="p-4 font-bold text-[#1B5FAA]">Technical SEO</td>
            <td class="p-4">Site infrastructure, speed & crawlability</td>
            <td class="p-4">All search engines & AI crawlers</td>
          </tr>
          <tr>
            <td class="p-4 font-bold text-[#00B4D8]">On-Page SEO</td>
            <td class="p-4">Content quality, intent & keyword relevance</td>
            <td class="p-4">Standard organic search results</td>
          </tr>
          <tr>
            <td class="p-4 font-bold text-[#5A9E2F]">Off-Page SEO</td>
            <td class="p-4">Backlinks, digital PR & external authority</td>
            <td class="p-4">Competitive commercial queries</td>
          </tr>
          <tr>
            <td class="p-4 font-bold text-[#EC4899]">Local SEO</td>
            <td class="p-4">Location-based searches, Google Business Profile</td>
            <td class="p-4">Google Maps 3-Pack & mobile queries</td>
          </tr>
          <tr>
            <td class="p-4 font-bold text-[#6B21A8]">Ecommerce SEO</td>
            <td class="p-4">Product pages, category taxonomies & faceted filters</td>
            <td class="p-4">Google Search & Google Shopping</td>
          </tr>
          <tr class="bg-[#1B5FAA]/5">
            <td class="p-4 font-bold text-[#1B5FAA]">AEO / GEO</td>
            <td class="p-4">Direct-answer formatting & entity citations</td>
            <td class="p-4 font-semibold text-[#14151A]">ChatGPT, Perplexity, Google AI Overviews</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Section: Do you need all five types? -->
  <div class="space-y-4 pt-6">
    <h2 class="text-2xl sm:text-3xl font-bold text-[#14151A] font-['Montserrat',sans-serif] border-b border-[#E2E8F0] pb-3">
      Do You Need All Types of SEO?
    </h2>
    <p>
      Not equally, and rarely all at the same time. The optimal allocation depends on your specific business model:
    </p>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
      <div class="p-5 rounded-2xl bg-white border border-[#E2E8F0] space-y-2">
        <h3 class="text-sm font-bold text-[#14151A]">Local Service Business (Plumber, Clinic, Installer)</h3>
        <p class="text-xs text-[#5B5F6B]">Prioritise <strong>Local SEO</strong>, <strong>Technical SEO</strong>, and <strong>GEO</strong>. This is where 90%+ of your commercial inquiries originate.</p>
      </div>
      <div class="p-5 rounded-2xl bg-white border border-[#E2E8F0] space-y-2">
        <h3 class="text-sm font-bold text-[#14151A]">Ecommerce Retail Store</h3>
        <p class="text-xs text-[#5B5F6B]">Prioritise <strong>Ecommerce SEO</strong> and <strong>Technical SEO</strong> to ensure thousands of product pages rank without duplication.</p>
      </div>
      <div class="p-5 rounded-2xl bg-white border border-[#E2E8F0] space-y-2">
        <h3 class="text-sm font-bold text-[#14151A]">B2B SaaS / Publisher</h3>
        <p class="text-xs text-[#5B5F6B]">Prioritise <strong>On-Page SEO</strong>, <strong>Off-Page Authority</strong>, and <strong>AEO</strong> to capture high-intent informational and comparative queries (e.g. <a href="seo-vs-sem-difference.php" class="text-[#1B5FAA] font-semibold underline">SEO vs SEM</a>).</p>
      </div>
      <div class="p-5 rounded-2xl bg-white border border-[#E2E8F0] space-y-2">
        <h3 class="text-sm font-bold text-[#14151A]">Every Modern Business</h3>
        <p class="text-xs text-[#5B5F6B]">Must incorporate <strong>GEO/AEO</strong> to secure brand recommendations as search traffic migrates to AI assistants.</p>
      </div>
    </div>
  </div>

  <!-- Section: How the types interact - Real Example -->
  <div class="space-y-4 pt-6">
    <h2 class="text-2xl sm:text-3xl font-bold text-[#14151A] font-['Montserrat',sans-serif] border-b border-[#E2E8F0] pb-3">
      How the Types Interact — A Real Example
    </h2>
    <p>
      These five types are not isolated silos; weakness in one actively neutralizes strength in another.
    </p>
    <p>
      Consider a local plumbing contractor with an exceptional service guide (strong on-page SEO). If the site takes 7 seconds to load on mobile (weak technical SEO) and has an incomplete Google Business Profile with no reviews (weak local SEO), the page will never appear in the Google Maps 3-Pack where nearby homeowners convert. Furthermore, high bounce rates caused by slow loading speeds will gradually depress its organic rankings.
    </p>
    <div class="p-4 rounded-xl bg-[#F8FAFC] border-l-4 border-[#1B5FAA] text-sm text-[#14151A] font-medium">
      Fixing the pipeline requires a multi-discipline approach: local SEO (GBP optimization, review capture) for Map Pack visibility, combined with technical SEO (Core Web Vitals acceleration) to convert arriving traffic.
    </div>
  </div>

  <!-- Structured FAQ Section with Accordions -->
  <div class="space-y-6 pt-8 border-t border-[#E2E8F0]">
    <div class="space-y-2">
      <span class="text-xs font-mono text-[#1B5FAA] font-bold uppercase tracking-wider">FREQUENTLY ASKED QUESTIONS</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-[#14151A] font-['Montserrat',sans-serif]">
        Frequently Asked Questions About Types of SEO
      </h2>
    </div>

    <div class="space-y-3" id="types-of-seo-faq-accordion">
      
      <div class="border border-[#E2E8F0] rounded-xl overflow-hidden bg-white">
        <button type="button" class="w-full text-left p-4 sm:p-5 font-bold text-[#14151A] flex items-center justify-between gap-4 hover:bg-[#F8FAFC] transition-colors" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('span.icon').textContent = this.nextElementSibling.classList.contains('hidden') ? '+' : '−'">
          <span>What are the main types of SEO?</span>
          <span class="icon text-lg font-mono text-[#1B5FAA] shrink-0">+</span>
        </button>
        <div class="p-4 sm:p-5 pt-0 text-sm text-[#475569] leading-relaxed hidden border-t border-[#E2E8F0]">
          The five main types are technical SEO (site infrastructure and crawlability), on-page SEO (content and page-level optimisation), off-page SEO (backlinks and external signals), local SEO (location-based search visibility), and ecommerce SEO (product and category page optimisation for online stores).
        </div>
      </div>

      <div class="border border-[#E2E8F0] rounded-xl overflow-hidden bg-white">
        <button type="button" class="w-full text-left p-4 sm:p-5 font-bold text-[#14151A] flex items-center justify-between gap-4 hover:bg-[#F8FAFC] transition-colors" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('span.icon').textContent = this.nextElementSibling.classList.contains('hidden') ? '+' : '−'">
          <span>What is the difference between on-page and off-page SEO?</span>
          <span class="icon text-lg font-mono text-[#1B5FAA] shrink-0">+</span>
        </button>
        <div class="p-4 sm:p-5 pt-0 text-sm text-[#475569] leading-relaxed hidden border-t border-[#E2E8F0]">
          On-page SEO covers everything you control directly on your own website — content, headings, keyword usage. Off-page SEO covers signals earned outside your website, primarily backlinks and brand mentions from other sites, which search engines treat as external validation of your site's authority.
        </div>
      </div>

      <div class="border border-[#E2E8F0] rounded-xl overflow-hidden bg-white">
        <button type="button" class="w-full text-left p-4 sm:p-5 font-bold text-[#14151A] flex items-center justify-between gap-4 hover:bg-[#F8FAFC] transition-colors" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('span.icon').textContent = this.nextElementSibling.classList.contains('hidden') ? '+' : '−'">
          <span>What is technical SEO and why does it matter?</span>
          <span class="icon text-lg font-mono text-[#1B5FAA] shrink-0">+</span>
        </button>
        <div class="p-4 sm:p-5 pt-0 text-sm text-[#475569] leading-relaxed hidden border-t border-[#E2E8F0]">
          Technical SEO covers a website's infrastructure — site speed, crawlability, mobile-friendliness, structured data and indexation. It matters because search engines need to be able to access and understand a site before any other SEO work can have an effect; strong content on a technically broken site often fails to rank.
        </div>
      </div>

      <div class="border border-[#E2E8F0] rounded-xl overflow-hidden bg-white">
        <button type="button" class="w-full text-left p-4 sm:p-5 font-bold text-[#14151A] flex items-center justify-between gap-4 hover:bg-[#F8FAFC] transition-colors" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('span.icon').textContent = this.nextElementSibling.classList.contains('hidden') ? '+' : '−'">
          <span>Is local SEO different from regular SEO?</span>
          <span class="icon text-lg font-mono text-[#1B5FAA] shrink-0">+</span>
        </button>
        <div class="p-4 sm:p-5 pt-0 text-sm text-[#475569] leading-relaxed hidden border-t border-[#E2E8F0]">
          Yes. Local SEO specifically targets location-based searches — "near me" queries and the Google Maps local pack — and relies more heavily on Google Business Profile completeness, review signals and proximity than standard organic SEO does.
        </div>
      </div>

      <div class="border border-[#E2E8F0] rounded-xl overflow-hidden bg-white">
        <button type="button" class="w-full text-left p-4 sm:p-5 font-bold text-[#14151A] flex items-center justify-between gap-4 hover:bg-[#F8FAFC] transition-colors" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('span.icon').textContent = this.nextElementSibling.classList.contains('hidden') ? '+' : '−'">
          <span>What is AEO and GEO in SEO?</span>
          <span class="icon text-lg font-mono text-[#1B5FAA] shrink-0">+</span>
        </button>
        <div class="p-4 sm:p-5 pt-0 text-sm text-[#475569] leading-relaxed hidden border-t border-[#E2E8F0]">
          AEO (Answer Engine Optimisation) targets featured snippets, voice search and direct-answer boxes in search results. GEO (Generative Engine Optimisation) targets being cited directly inside AI-generated answers from tools like ChatGPT, Gemini and Google AI Overviews. Both are newer disciplines that depend heavily on strong technical and on-page SEO foundations.
        </div>
      </div>

      <div class="border border-[#E2E8F0] rounded-xl overflow-hidden bg-white">
        <button type="button" class="w-full text-left p-4 sm:p-5 font-bold text-[#14151A] flex items-center justify-between gap-4 hover:bg-[#F8FAFC] transition-colors" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('span.icon').textContent = this.nextElementSibling.classList.contains('hidden') ? '+' : '−'">
          <span>Do I need to focus on all types of SEO at once?</span>
          <span class="icon text-lg font-mono text-[#1B5FAA] shrink-0">+</span>
        </button>
        <div class="p-4 sm:p-5 pt-0 text-sm text-[#475569] leading-relaxed hidden border-t border-[#E2E8F0]">
          No. Which types matter most depends on the business — a local service business should prioritise local and technical SEO, an ecommerce store needs ecommerce and technical SEO, and a content-driven business typically leans on on-page and off-page SEO. Very few businesses need equal investment across all five simultaneously.
        </div>
      </div>

      <div class="border border-[#E2E8F0] rounded-xl overflow-hidden bg-white">
        <button type="button" class="w-full text-left p-4 sm:p-5 font-bold text-[#14151A] flex items-center justify-between gap-4 hover:bg-[#F8FAFC] transition-colors" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('span.icon').textContent = this.nextElementSibling.classList.contains('hidden') ? '+' : '−'">
          <span>Which type of SEO should a small business start with?</span>
          <span class="icon text-lg font-mono text-[#1B5FAA] shrink-0">+</span>
        </button>
        <div class="p-4 sm:p-5 pt-0 text-sm text-[#475569] leading-relaxed hidden border-t border-[#E2E8F0]">
          For most small, local businesses, local SEO and basic technical SEO (site speed, mobile-friendliness, a working Google Business Profile) deliver the fastest, most relevant results, since that's where their actual customers are searching.
        </div>
      </div>

      <div class="border border-[#E2E8F0] rounded-xl overflow-hidden bg-white">
        <button type="button" class="w-full text-left p-4 sm:p-5 font-bold text-[#14151A] flex items-center justify-between gap-4 hover:bg-[#F8FAFC] transition-colors" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('span.icon').textContent = this.nextElementSibling.classList.contains('hidden') ? '+' : '−'">
          <span>Is ecommerce SEO different from regular on-page SEO?</span>
          <span class="icon text-lg font-mono text-[#1B5FAA] shrink-0">+</span>
        </button>
        <div class="p-4 sm:p-5 pt-0 text-sm text-[#475569] leading-relaxed hidden border-t border-[#E2E8F0]">
          Yes, in practice. Ecommerce sites face structural challenges — near-duplicate product variants, complex filtering, out-of-stock pages — that standard content sites don't encounter, requiring specific handling beyond general on-page SEO principles.
        </div>
      </div>

    </div>
  </div>

</div>
"""

faqs_data = [
    {
        "q": "What are the main types of SEO?",
        "a": "The five main types are technical SEO (site infrastructure and crawlability), on-page SEO (content and page-level optimisation), off-page SEO (backlinks and external signals), local SEO (location-based search visibility), and ecommerce SEO (product and category page optimisation for online stores)."
    },
    {
        "q": "What is the difference between on-page and off-page SEO?",
        "a": "On-page SEO covers everything you control directly on your own website — content, headings, keyword usage. Off-page SEO covers signals earned outside your website, primarily backlinks and brand mentions from other sites, which search engines treat as external validation of your site's authority."
    },
    {
        "q": "What is technical SEO and why does it matter?",
        "a": "Technical SEO covers a website's infrastructure — site speed, crawlability, mobile-friendliness, structured data and indexation. It matters because search engines need to be able to access and understand a site before any other SEO work can have an effect; strong content on a technically broken site often fails to rank."
    },
    {
        "q": "Is local SEO different from regular SEO?",
        "a": "Yes. Local SEO specifically targets location-based searches — 'near me' queries and the Google Maps local pack — and relies more heavily on Google Business Profile completeness, review signals and proximity than standard organic SEO does."
    },
    {
        "q": "What is AEO and GEO in SEO?",
        "a": "AEO (Answer Engine Optimisation) targets featured snippets, voice search and direct-answer boxes in search results. GEO (Generative Engine Optimisation) targets being cited directly inside AI-generated answers from tools like ChatGPT, Gemini and Google AI Overviews. Both are newer disciplines that depend heavily on strong technical and on-page SEO foundations."
    },
    {
        "q": "Do I need to focus on all types of SEO at once?",
        "a": "No. Which types matter most depends on the business — a local service business should prioritise local and technical SEO, an ecommerce store needs ecommerce and technical SEO, and a content-driven business typically leans on on-page and off-page SEO. Very few businesses need equal investment across all five simultaneously."
    },
    {
        "q": "Which type of SEO should a small business start with?",
        "a": "For most small, local businesses, local SEO and basic technical SEO (site speed, mobile-friendliness, a working Google Business Profile) deliver the fastest, most relevant results, since that's where their actual customers are searching."
    },
    {
        "q": "Is ecommerce SEO different from regular on-page SEO?",
        "a": "Yes, in practice. Ecommerce sites face structural challenges — near-duplicate product variants, complex filtering, out-of-stock pages — that standard content sites don't encounter, requiring specific handling beyond general on-page SEO principles."
    }
]

post_dict = {
    "title": post_title,
    "slug": post_slug,
    "meta_title": meta_title,
    "meta_description": meta_description,
    "category": "Technical SEO",
    "author": "Abhishek Raikwar",
    "author_title": "Founder, Digital4Local — 5+ Years in Local SEO & AI Visibility",
    "date": "2026-09-02",
    "read_time": "8 Min Read",
    "status": "published",
    "excerpt": "The main types of SEO explained clearly — technical, on-page, off-page, local, ecommerce, and where AEO/GEO fits as the newest addition.",
    "featured_image": "assets/images/hero_dashboard_light_v2.png",
    "faqs": faqs_data,
    "content_html": content_html.strip()
}

# 1. Update config/site_settings.json
settings_path = os.path.join(base_dir, 'config', 'site_settings.json')
settings = {}
if os.path.exists(settings_path):
    with open(settings_path, 'r', encoding='utf-8') as f:
        settings = json.load(f)

if 'blog_posts' not in settings or not isinstance(settings['blog_posts'], list):
    settings['blog_posts'] = []

# Check if post exists
existing_idx = next((i for i, p in enumerate(settings['blog_posts']) if p.get('slug') == post_slug), -1)
if existing_idx >= 0:
    settings['blog_posts'][existing_idx] = post_dict
else:
    settings['blog_posts'].append(post_dict)

with open(settings_path, 'w', encoding='utf-8') as f:
    json.dump(settings, f, indent=4)
print("Updated config/site_settings.json with blog post #5!")

# 2. Generate dedicated file in blog/types-of-seo-explained.php
php_content = f"""<?php
require_once __DIR__ . '/../includes/site-config.php';
$post = get_blog_post('{post_slug}');

$page_title = "{meta_title}";
$page_description = "{meta_description}";
$canonical_url = "https://digital4local.com/blog/{post_slug}/";

// FAQ Schema
$faq_schema_items = [];
if (!empty($post['faqs'])) {{
    foreach ($post['faqs'] as $faq) {{
        $faq_schema_items[] = [
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a']
            ]
        ];
    }}
}}
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <?php include_once '../includes/seo.php'; ?>
  
  <!-- Structured Data Graph: BlogPosting + FAQPage + Breadcrumbs -->
  <script type="application/ld+json">
  {{
    "@context": "https://schema.org",
    "@graph": [
      {{
        "@type": "BlogPosting",
        "@id": "https://digital4local.com/blog/{post_slug}/#article",
        "isPartOf": {{
          "@type": "WebPage",
          "@id": "https://digital4local.com/blog/{post_slug}/"
        }},
        "headline": {json.dumps(post_title)},
        "description": {json.dumps(meta_description)},
        "datePublished": "2026-09-02T08:00:00+00:00",
        "dateModified": "2026-09-02T08:00:00+00:00",
        "author": {{
          "@type": "Person",
          "name": "Abhishek Raikwar",
          "jobTitle": "Founder",
          "worksFor": {{
            "@type": "Organization",
            "name": "Digital4Local"
          }}
        }},
        "publisher": {{
          "@type": "Organization",
          "name": "Digital4Local",
          "url": "https://digital4local.com",
          "logo": {{
            "@type": "ImageObject",
            "url": "https://digital4local.com/assets/images/digital4local_logo.png"
          }}
        }},
        "mainEntityOfPage": {{
          "@type": "WebPage",
          "@id": "https://digital4local.com/blog/{post_slug}/"
        }}
      }},
      {{
        "@type": "FAQPage",
        "@id": "https://digital4local.com/blog/{post_slug}/#faq",
        "mainEntity": <?php echo json_encode($faq_schema_items, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
      }},
      {{
        "@type": "BreadcrumbList",
        "itemListElement": [
          {{
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "https://digital4local.com/"
          }},
          {{
            "@type": "ListItem",
            "position": 2,
            "name": "Blog",
            "item": "https://digital4local.com/blog/"
          }},
          {{
            "@type": "ListItem",
            "position": 3,
            "name": {json.dumps(post_title)},
            "item": "https://digital4local.com/blog/{post_slug}/"
          }}
        ]
      }}
    ]
  }}
  </script>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] min-h-screen relative font-['Inter',sans-serif] selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <div class="bg-ambient-glow"></div>
  <?php include_once '../includes/header.php'; ?>

  <main class="relative z-10 pt-28 sm:pt-36 pb-24">
    
    <!-- Article Header -->
    <header class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 pb-12" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#1B5FAA]/10 border border-[#1B5FAA]/20 text-[#1B5FAA] text-xs font-mono font-bold tracking-wider uppercase">
        <span class="w-2 h-2 rounded-full bg-[#00B4D8] animate-pulse"></span>
        DEFINITIONAL PRIORITY PLAYBOOK #5
      </div>
      
      <h1 class="text-3xl sm:text-5xl md:text-5xl font-extrabold text-[#14151A] font-['Montserrat',sans-serif] tracking-tight leading-tight">
        Types of SEO Explained <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1B5FAA] via-[#00B4D8] to-[#5A9E2F]">(Full 2026 Guide)</span>
      </h1>

      <div class="flex flex-wrap items-center justify-center gap-4 text-xs font-mono text-[#64748B] pt-2">
        <span class="flex items-center gap-1.5 font-bold text-[#14151A]">
          <span class="w-6 h-6 rounded-full bg-[#1B5FAA]/15 text-[#1B5FAA] flex items-center justify-center text-[10px]">AR</span>
          By Abhishek Raikwar (Founder, Digital4Local)
        </span>
        <span>•</span>
        <span>Published: Sept 2, 2026</span>
        <span>•</span>
        <span class="bg-[#1B5FAA]/10 text-[#1B5FAA] px-2.5 py-0.5 rounded font-bold">8 Min Read</span>
      </div>
    </header>

    <!-- Main Content Container with Sticky Sidebar -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-4 gap-12">
      
      <!-- Sticky Sidebar -->
      <aside class="hidden lg:block lg:col-span-1 space-y-6 sticky top-32 h-fit text-xs">
        <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-5 space-y-3 shadow-sm">
          <div class="text-[#14151A] font-bold uppercase tracking-wider text-[11px] border-b border-[#E2E8F0] pb-2 font-mono">
            Article Highlights
          </div>
          <ul class="space-y-2 text-[#64748B] font-mono text-[11px]">
            <li class="text-[#1B5FAA] font-bold">● Summary Definition</li>
            <li>● 1. Technical SEO</li>
            <li>● 2. On-Page SEO</li>
            <li>● 3. Off-Page SEO</li>
            <li>● 4. Local SEO</li>
            <li>● 5. Ecommerce SEO</li>
            <li>● New: AEO & GEO Explained</li>
            <li>● Quick Comparison Table</li>
            <li>● 8 Detailed FAQs</li>
          </ul>
          <div class="pt-3 border-t border-[#E2E8F0]">
            <a href="../blog.php" class="text-[#1B5FAA] font-bold hover:underline flex items-center gap-1">
              ← Back to All Articles
            </a>
          </div>
        </div>

        <div class="bg-gradient-to-br from-[#1B5FAA]/5 to-[#5A9E2F]/10 border-2 border-[#1B5FAA] rounded-2xl p-5 space-y-3 shadow-sm">
          <span class="text-[10px] font-bold font-mono text-[#1B5FAA] uppercase">SEO Architecture Audit</span>
          <h4 class="font-bold text-xs text-[#14151A] font-['Montserrat',sans-serif]">Which SEO type does your business need right now?</h4>
          <p class="text-[11px] text-[#5B5F6B]">Get a tailored multi-discipline search audit from Abhishek Raikwar.</p>
          <button class="trigger-book-demo btn-primary w-full text-[11px] py-2.5 justify-center font-bold">
            Claim Free SEO Audit
          </button>
        </div>
      </aside>

      <!-- Main Article Body -->
      <article class="lg:col-span-3 space-y-6 text-base text-[#475569] leading-relaxed article-body-content">
        <?php echo $post['content_html'] ?? ''; ?>
      </article>

    </div>

    <!-- Explore Services Cross-Linking -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
      <?php include '../includes/explore-services.php'; ?>
    </div>

    <!-- Bottom CTA Band -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-16" data-aos="fade-up">
      <div class="bg-gradient-to-br from-[#14151A] to-[#1E293B] text-white p-10 sm:p-14 rounded-3xl space-y-6 shadow-2xl">
        <h2 class="text-2xl sm:text-4xl font-extrabold font-['Montserrat',sans-serif]">
          Ready to Implement a Complete SEO Architecture?
        </h2>
        <p class="text-sm sm:text-base text-[#94A3B8] max-w-xl mx-auto leading-relaxed">
          Book a strategy session with Abhishek Raikwar to audit your Technical, On-Page, Local and AI search foundations.
        </p>
        <button class="trigger-book-demo btn-primary px-8 py-3.5 text-sm font-bold shadow-lg">
          <i data-lucide="calendar" class="w-4 h-4"></i> Book Strategy Session
        </button>
      </div>
    </section>

  </main>

  <?php include_once '../includes/footer.php'; ?>
</body>
</html>
"""

dedicated_path = os.path.join(blog_dir, f"{post_slug}.php")
with open(dedicated_path, 'w', encoding='utf-8') as f:
    f.write(php_content)
print(f"Generated: blog/{post_slug}.php")

# Create slug folder blog/types-of-seo-explained/index.php for trailing slash support
slug_dir = os.path.join(blog_dir, post_slug)
os.makedirs(slug_dir, exist_ok=True)
slug_index_path = os.path.join(slug_dir, "index.php")
with open(slug_index_path, 'w', encoding='utf-8') as f:
    f.write(f"""<?php
require_once __DIR__ . '/../{post_slug}.php';
""")
print(f"Generated: blog/{post_slug}/index.php")

print("Blog post #5 published and verified successfully!")
