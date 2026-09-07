<?php
require_once __DIR__ . '/../includes/site-config.php';
$web_cfg = get_page_config('services_web_dev');

$page_title = "Web Development Company in India — Sites Built to Rank | Digital4Local";
$page_description = "Web development company building fast, mobile-first websites that rank on Google and get cited by AI. Custom sites, ecommerce and web apps. Get a quote.";
$canonical_url = "https://digital4local.com/services/web-development.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../includes/seo.php'; ?>

  <!-- FAQPage Schema for Web Development -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "What is web development?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Web development is the practice of building the code and infrastructure behind a website — the front-end a visitor interacts with, the back-end that powers it, and the systems that connect it to everything else. It turns a design into a working, secure, fast site rather than a static image of one."
        }
      },
      {
        "@type": "Question",
        "name": "What is the difference between web design and web development?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Web design is how a site looks — layout, colour, typography and visual hierarchy. Web development is the code that makes it work — what loads, submits and functions correctly. Most projects need both delivered together, since a design with no working code behind it is not a website."
        }
      },
      {
        "@type": "Question",
        "name": "How long does it take to build a website?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "A marketing website with five to ten pages typically takes three to six weeks from approved design to launch. An ecommerce store runs six to ten weeks. A custom web application can take eight to sixteen weeks or more, depending on how complex the functionality is."
        }
      },
      {
        "@type": "Question",
        "name": "How much does it cost to hire a website developer in India?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Cost depends on project scope — a simple business site, an ecommerce store and a custom web application all sit at very different price points, and complexity, design depth and content readiness all affect the total. A fixed-scope quote should always follow a proper scoping conversation, not precede one."
        }
      },
      {
        "@type": "Question",
        "name": "Will a new website automatically rank on Google?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "No agency can honestly promise that. What a well-built site does is remove the technical barriers that stop a page from ranking — crawlability, speed, clean structure, mobile usability. Ranking itself still depends on content and ongoing SEO work after launch, which is why the site and SEO strategy should be planned together."
        }
      },
      {
        "@type": "Question",
        "name": "Can you redesign an existing website instead of building a new one?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. A redesign starts with an audit of what is currently working — traffic, rankings, conversion points — so nothing valuable is lost in the rebuild. Old URLs are mapped to new ones and redirects are handled carefully, since a rushed redesign is one of the most common causes of a sudden traffic drop."
        }
      },
      {
        "@type": "Question",
        "name": "Do you build ecommerce websites?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. Product catalogues, cart and checkout, payment gateway integration and customer accounts are all part of the web development service, sized to the number of products and the complexity of the buying flow."
        }
      },
      {
        "@type": "Question",
        "name": "What platform or technology do you build on?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "The platform is chosen to match the project rather than defaulting to one stack — a five-page brochure site, a high-traffic ecommerce store and a custom web application each have different right answers, recommended during the discovery call rather than assumed in advance."
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
        <span class="text-[#00A8B5] font-bold">Web Development</span>
      </nav>

      <!-- Kicker -->
      <div>
        <span class="pulse-badge uppercase tracking-wider font-mono text-xs">
          BUILT TO LOAD FAST, RANK WELL, AND WORK EVERYWHERE.
        </span>
      </div>

      <!-- Main Headline -->
      <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A] tracking-tight">
        Web Development Company
      </h1>

      <!-- Direct-answer opening paragraph (AI extractable block) -->
      <div class="max-w-3xl mx-auto bg-[#F6F8FB] border border-[#E4E7EC] p-6 sm:p-8 rounded-2xl text-left shadow-sm">
        <div class="text-[11px] font-mono text-[#00A8B5] font-bold uppercase tracking-wider mb-2 flex items-center gap-1.5">
          <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Direct Answer Overview
        </div>
        <p class="text-base sm:text-lg text-[#14151A] leading-relaxed">
          Web development is the process of building a website's structure, functionality and code — the engineering that turns a design into a working site. Digital4Local is a web development company building custom websites, ecommerce stores and web applications for businesses across India, with SEO and page speed built in from the first line of code rather than fixed afterward. A site built without that foundation usually needs a technical rebuild within a year of launch.
        </p>
      </div>

      <!-- Action Buttons -->
      <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
        <button class="trigger-book-demo btn-primary text-xs px-6 py-3 shadow-md">
          <i data-lucide="code" class="w-4 h-4"></i> Get a free project quote
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
          What is web development, and how is it different from web design?
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
            <h3 class="text-xl font-bold text-[#14151A]">01 · Web Development</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Web development is the practice of building the code and infrastructure behind a website — the front-end a visitor interacts with, the back-end that powers it, and the database and integrations that connect it to everything else. It turns a design into a functioning, secure, fast website rather than a static image of one.
            </p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#16A34A] font-bold">02 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">02 · Web Design</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Web design is how a site looks and how it is laid out — colour, typography, imagery and visual hierarchy. Design decides what a visitor sees first and where their eye goes next. Development decides whether the page actually loads, works on a phone, and submits a form correctly. A finished site needs both, usually in that order.
            </p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#8B5CF6] font-bold">03 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">03 · Web Application</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              A web application is software that runs in a browser and lets a user do something rather than only read something — log in, book an appointment, complete a purchase, view a personalised dashboard. A marketing website presents information; a web application performs a task. The two need different scoping and different budgets.
            </p>
          </div>
        </div>
      </div>

      <!-- Worth Knowing Callout -->
      <div class="card-dark p-6 border-l-4 border-l-[#00A8B5] bg-[#F8FAFC] rounded-r-2xl max-w-4xl mx-auto">
        <div class="text-xs font-mono text-[#00A8B5] font-bold mb-1">WORTH KNOWING</div>
        <p class="text-sm text-[#14151A] leading-relaxed">
          Most businesses that ask for "a website" are describing web design plus web development together, whether they use those terms or not. A beautiful design with no functioning code behind it is a picture, not a website — and a technically solid site with no design thought is a form nobody wants to fill in. Neither works alone.
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
          Marketing website vs ecommerce store vs web application
        </h2>
        <p class="text-xs text-[#5B5F6B]">
          (Keep as a real HTML table — highly extractable for AI answers. Never render as an image.)
        </p>
      </div>

      <div class="overflow-x-auto rounded-2xl border border-[#E4E7EC] shadow-sm bg-white">
        <table class="w-full text-left text-xs border-collapse">
          <thead>
            <tr class="bg-[#F8FAFC] border-b border-[#E4E7EC]">
              <th class="p-4 sm:p-5 font-mono uppercase text-[#5B5F6B] font-bold w-1/5">Criteria</th>
              <th class="p-4 sm:p-5 font-bold text-[#00A8B5] text-sm w-4/15 border-l border-[#E4E7EC] bg-[#00F0FF]/5">Marketing Website</th>
              <th class="p-4 sm:p-5 font-bold text-[#16A34A] text-sm w-4/15 border-l border-[#E4E7EC] bg-[#16A34A]/5">Ecommerce Store</th>
              <th class="p-4 sm:p-5 font-bold text-[#8B5CF6] text-sm w-4/15 border-l border-[#E4E7EC]">Web Application</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#E4E7EC] text-[#5B5F6B]">
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Purpose</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#14151A]">Present the business, generate enquiries</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#16A34A]/5 text-[#14151A]">Sell products directly online</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#14151A]">Run a process — booking, portal, dashboard</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Core pages</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5">Home, services, about, contact, blog</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#16A34A]/5">Product, category, cart, checkout</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Login, dashboard, forms, data views</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Typical timeline</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-mono text-[#16A34A] font-bold">3–6 weeks</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#16A34A]/5 font-mono text-[#00A8B5]">6–10 weeks</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono text-[#8B5CF6]">8–16+ weeks</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Needs ongoing SEO?</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#16A34A]">Yes — this is the growth engine</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#16A34A]/5 font-semibold text-[#16A34A]">Yes — product pages compound over time</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Sometimes — depends on public-facing pages</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Right for</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#14151A]">Most service businesses, clinics, agencies</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#16A34A]/5 text-[#14151A]">Retailers, D2C brands</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#14151A]">SaaS, marketplaces, businesses needing customer logins</td>
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
          Why the site is the foundation everything else depends on
        </h2>
        
        <p class="text-base text-[#5B5F6B] leading-relaxed">
          Every other marketing channel eventually points at your website. SEO drives search traffic to it. Social media sends people to check it. Paid ads spend money to land clicks on it. If the site itself is slow, confusing on mobile, or built in a way search engines struggle to crawl, every one of those channels is working to fill a bucket with a hole in it.
        </p>

        <p class="text-base text-[#5B5F6B] leading-relaxed">
          This is the single most common gap we see in an audit: a business investing steadily in traffic while the site receiving it hasn't been rebuilt in years and quietly loses a meaningful share of visitors before a page even finishes loading. A faster, better-structured site does not just look better — it directly affects whether Google ranks it, since page experience is a measured ranking factor, and it directly affects whether a visitor becomes an enquiry.
        </p>

        <p class="text-base text-[#14151A] font-semibold leading-relaxed">
          There is a newer reason this matters, too. AI answer engines can only cite what their crawlers can read. A site built on heavy, unoptimised JavaScript with content that never renders in a basic crawl is invisible to AI systems the same way it is difficult for Google — no matter how good the business behind it actually is. Building technically clean from the outset is now a precondition for both search rankings and AI visibility, not just a nice-to-have.
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
          What's included in Digital4Local's web development service
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- 1. Strategy & sitemap -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">01</div>
          <h3 class="font-bold text-base text-[#14151A]">Strategy & sitemap</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Before any design work starts, we map the pages a business actually needs, the goal of each one, and how they connect. A site built without this step ends up with pages competing with each other or missing entirely.
          </p>
        </div>

        <!-- 2. Custom design & development -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">02</div>
          <h3 class="font-bold text-base text-[#14151A]">Custom design & development</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Fully custom-coded websites — not a templated theme with the logo swapped. Responsive across devices, built on a stack matched to the project's actual complexity, so a five-page business site is not over-engineered and a complex platform is not under-built.
          </p>
        </div>

        <!-- 3. Ecommerce development -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold font-mono">03</div>
          <h3 class="font-bold text-base text-[#14151A]">Ecommerce development</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Product catalogues, cart and checkout, payment gateway integration and customer accounts, sized to your product range and built to handle real transaction volume rather than a demo.
          </p>
        </div>

        <!-- 4. Web application development -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#D97706]/15 text-[#D97706] flex items-center justify-center font-bold font-mono">04</div>
          <h3 class="font-bold text-base text-[#14151A]">Web application development</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Booking systems, customer portals, dashboards and anything requiring a login or handling live data. Scoped properly from the start, because web applications behave very differently from marketing pages once real users are logging in.
          </p>
        </div>

        <!-- 5. SEO-ready technical foundation -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#EC4899]/15 text-[#EC4899] flex items-center justify-center font-bold font-mono">05</div>
          <h3 class="font-bold text-base text-[#14151A]">SEO-ready technical foundation</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Clean URLs, proper heading structure, fast-loading code, schema markup and crawlability built in from day one — not retrofitted six months after launch once rankings are already suffering. Connects directly with our <a href="technical-seo.php" class="text-[#00A8B5] underline font-bold">technical SEO</a> service.
          </p>
        </div>

        <!-- 6. Speed & Core Web Vitals -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00A8B5]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">06</div>
          <h3 class="font-bold text-base text-[#14151A]">Speed & Core Web Vitals</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Image optimisation, code minification, caching and hosting configuration tuned specifically for load time, tested against real mobile network conditions rather than a fast office connection.
          </p>
        </div>

        <!-- 7. Ongoing support & maintenance -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all md:col-span-2 lg:col-span-1">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">07</div>
          <h3 class="font-bold text-base text-[#14151A]">Ongoing support & maintenance</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Security updates, content changes and periodic improvements after launch. A site is not a one-time project — it needs upkeep, and we offer support plans so it does not quietly go stale the year after it goes live.
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
            We review your current site if one exists, look at competitors, and map out exactly what the new site needs to do and for whom. For a fresh build, we start with the sitemap and the purpose of every page.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#16A34A] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#16A34A] font-bold">PHASE 02</span>
          <h3 class="text-lg font-bold text-[#14151A]">2. Design</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Wireframes first, then full visual design. You review and approve before development starts — changing a wireframe costs an hour; changing a built page costs a week.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#8B5CF6] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#8B5CF6] font-bold">PHASE 03</span>
          <h3 class="text-lg font-bold text-[#14151A]">3. Build</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Development, cross-device testing, content population, and a pre-launch technical and speed audit. You get a staging link to review before anything goes live.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#D97706] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#D97706] font-bold">PHASE 04</span>
          <h3 class="text-lg font-bold text-[#14151A]">4. Launch & grow</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Launch, then ongoing support and performance monitoring — with direct handoff into our <a href="local-seo.php" class="text-[#00A8B5] font-bold">SEO</a> and <a href="technical-seo.php" class="text-[#00A8B5] font-bold">technical SEO</a> services so the new site starts earning visibility immediately.
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
              <span>A business with no website yet, or one built years ago that no longer reflects the brand</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Running a slow, hard-to-update site that was not built with SEO in mind</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Ready to launch an ecommerce store or a customer-facing web application</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Investing in SEO or ads and sending that traffic to a site that is not converting it</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Wanting one team to build the site and then make it findable, instead of a developer and an SEO agency who never talk to each other</span>
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
              <span>Looking for a finished site in a few days — proper design and development takes real time, and rushing it shows in the result</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Wanting the absolute cheapest template build with no thought behind it — that costs more in lost enquiries than it saves upfront</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Not prepared to review and approve designs along the way — a site built with no input from you rarely matches what was actually needed</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Only dealing with a slow existing site and nothing else — a <a href="technical-seo.php" class="text-[#00A8B5] underline font-bold">technical SEO audit</a> will solve that faster and cheaper than a full rebuild</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="text-center">
        <p class="text-xs text-[#5B5F6B] font-mono italic">
          We would rather tell you that now than three weeks into a project.
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
          What web development costs
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          There is no single number, and any quote given before a scoping call is a guess. Cost is driven by four things:
        </p>
      </div>

      <!-- 4 Cost Drivers -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">1. Page count & complexity</div>
          <p class="text-xs text-[#5B5F6B]">A five-page business site costs a fraction of a full ecommerce catalogue.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">2. Custom functionality</div>
          <p class="text-xs text-[#5B5F6B]">Bookings, logins, payment integration and dashboards all add development time.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">3. Design depth</div>
          <p class="text-xs text-[#5B5F6B]">Fully custom design costs more than templates — and is worth it once visual identity matters.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">4. Content readiness</div>
          <p class="text-xs text-[#5B5F6B]">A client arriving with copy and images moves faster and costs less than starting from scratch.</p>
        </div>
      </div>

      <!-- Currency Switcher & Packages Grid -->
      <div class="flex items-center justify-center gap-2 mb-8">
        <button data-currency="INR" class="currency-btn active px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#00F0FF] text-[#0A0A0F]">🇮🇳 INR (₹)</button>
        <button data-currency="USD" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇺🇸 USD ($)</button>
        <button data-currency="GBP" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇬🇧 GBP (£)</button>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        <!-- High-Speed Marketing Website -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#5B5F6B] uppercase font-bold">Marketing Website</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹29,999" data-usd="$699" data-gbp="£559">₹29,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/project</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 5–10 Custom Responsive Pages</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Built-In SEO & Core Web Vitals Optimization</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Lead Capture Form & CRM Webhook Integration</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 3–5 Week Delivery with Staging Preview</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-secondary w-full text-xs justify-center py-2.5">Get Project Quote</button>
        </div>

        <!-- Full Ecommerce Store -->
        <div class="card-elevated p-8 space-y-6 flex flex-col justify-between relative border-2 border-[#00A8B5] bg-white rounded-2xl shadow-md">
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#00F0FF] text-[#0A0A0F] font-mono text-[10px] font-bold px-3 py-1 rounded-full uppercase">Most Requested</div>
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#00A8B5] uppercase font-bold">Ecommerce Store</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹59,999" data-usd="$1,399" data-gbp="£1,099">₹59,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/project</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Full Product Catalogue & Filtering System</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Razorpay / Stripe / UPI Payment Gateways</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> High-Converting Checkout & Cart Recovery</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Product Schema & Merchant Center Sync</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-primary w-full text-xs justify-center py-2.5">Get Project Quote</button>
        </div>

        <!-- Custom Web Application / SaaS -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#8B5CF6] uppercase font-bold">Custom Web App / Portal</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹99,999+" data-usd="$2,499+" data-gbp="£1,999+">₹99,999+</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/project</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> User Authentication & Role-Based Access</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Custom Database Architecture & REST/GraphQL API</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Client Portals, Booking Engines or SaaS Dashboards</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Dedicated Full-Stack Engineering Team</li>
            </ul>
          </div>
          <a href="../contact.php" class="btn-secondary w-full text-xs justify-center py-2.5">Custom App Scope</a>
        </div>
      </div>

      <!-- What you always get -->
      <div class="bg-[#F8FAFC] border border-[#E4E7EC] p-6 rounded-xl text-center max-w-3xl mx-auto">
        <p class="text-xs sm:text-sm text-[#14151A] font-medium">
          <strong>What you always get:</strong> a fixed-scope quote agreed before work starts, a staging environment to review before launch, and no surprise line items partway through the build.
        </p>
      </div>
    </section>

    <!-- 9.5. SECTION — Tools & AI We Use for Web Development -->
    <?php 
    $current_stack_key = 'web-development';
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
            <span>What is web development?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Web development is the practice of building the code and infrastructure behind a website — the front-end a visitor interacts with, the back-end that powers it, and the systems that connect it to everything else. It turns a design into a working, secure, fast site rather than a static image of one.
          </div>
        </div>

        <!-- Q2 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What is the difference between web design and web development?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Web design is how a site looks — layout, colour, typography and visual hierarchy. Web development is the code that makes it work — what loads, submits and functions correctly. Most projects need both delivered together, since a design with no working code behind it is not a website.
          </div>
        </div>

        <!-- Q3 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How long does it take to build a website?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            A marketing website with five to ten pages typically takes three to six weeks from approved design to launch. An ecommerce store runs six to ten weeks. A custom web application can take eight to sixteen weeks or more, depending on how complex the functionality is.
          </div>
        </div>

        <!-- Q4 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How much does it cost to hire a website developer in India?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Cost depends on project scope — a simple business site, an ecommerce store and a custom web application all sit at very different price points, and complexity, design depth and content readiness all affect the total. A fixed-scope quote should always follow a proper scoping conversation, not precede one.
          </div>
        </div>

        <!-- Q5 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Will a new website automatically rank on Google?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            No agency can honestly promise that. What a well-built site does is remove the technical barriers that stop a page from ranking — crawlability, speed, clean structure, mobile usability. Ranking itself still depends on content and ongoing SEO work after launch, which is why the site and SEO strategy should be planned together.
          </div>
        </div>

        <!-- Q6 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Can you redesign an existing website instead of building a new one?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Yes. A redesign starts with an audit of what is currently working — traffic, rankings, conversion points — so nothing valuable is lost in the rebuild. Old URLs are mapped to new ones and redirects are handled carefully, since a rushed redesign is one of the most common causes of a sudden traffic drop.
          </div>
        </div>

        <!-- Q7 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Do you build ecommerce websites?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Yes. Product catalogues, cart and checkout, payment gateway integration and customer accounts are all part of the web development service, sized to the number of products and the complexity of the buying flow.
          </div>
        </div>

        <!-- Q8 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What platform or technology do you build on?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            The platform is chosen to match the project rather than defaulting to one stack — a five-page brochure site, a high-traffic ecommerce store and a custom web application each have different right answers, recommended during the discovery call rather than assumed in advance.
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
          Ready for a website built to actually perform?
        </h2>
        <p class="text-sm sm:text-base text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          Digital4Local builds websites, ecommerce stores and web applications for businesses across India — with SEO and speed built in from day one. Tell us what you need built and we'll scope it honestly.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4">
          <button class="trigger-book-demo btn-primary text-sm px-8 py-3.5 shadow-lg font-bold">
            <i data-lucide="code" class="w-4 h-4"></i> Get a free project quote
          </button>
        </div>
      </div>
    </section>

  </main>

  <?php include_once '../includes/footer.php'; ?>
</body>
</html>
