<?php
require_once __DIR__ . '/../includes/site-config.php';
$smm_cfg = get_page_config('services_social_media');

$page_title = "Social Media Marketing Services for Local Businesses | Digital4Local";
$page_description = "Social media marketing that brings local customers, not vanity metrics. Strategy, content, community and reporting for local businesses across India.";
$canonical_url = "https://digital4local.com/services/social-media.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../includes/seo.php'; ?>

  <!-- FAQPage Schema for Social Media Marketing -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "What is the full form of SMM?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "SMM stands for Social Media Marketing. It refers to using social platforms such as Instagram, Facebook and LinkedIn to achieve business outcomes including awareness, engagement, leads and sales. The abbreviation is used interchangeably with the full term across the industry, including in agency packages and pricing."
        }
      },
      {
        "@type": "Question",
        "name": "What is the difference between social media marketing and social media management?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Social media management is the day-to-day operational work — planning, scheduling, publishing and responding to comments and messages. Social media marketing is the broader discipline that includes management plus strategy, content direction, paid advertising and measurement. Management keeps accounts running; marketing decides what they are running for."
        }
      },
      {
        "@type": "Question",
        "name": "Which social media platform is best for a local business?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "For most local businesses in India, Instagram and Google Business Profile posts deliver the most, with WhatsApp handling the enquiries they generate. Facebook remains strong for community and older audiences. LinkedIn only matters if you sell to other businesses. Doing two platforms properly beats doing six badly."
        }
      },
      {
        "@type": "Question",
        "name": "How much does social media marketing cost?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Cost depends on how many platforms are managed, how often content is published, how complex that content is, and whether community management is included. Paid advertising is quoted separately, since ad spend goes to the platform and management is a separate charge. Any quote given before understanding your platforms and goals is a guess."
        }
      },
      {
        "@type": "Question",
        "name": "Should I buy followers to grow faster?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "No. Purchased followers come from bots and inactive accounts, violate platform terms, and can lead to account restrictions. They also distort your engagement rate, which can reduce how often the platform shows your content to real people. A smaller genuine audience in your service area is worth more than a large fake one."
        }
      },
      {
        "@type": "Question",
        "name": "How long does social media marketing take to work?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Meaningful audience growth typically takes three to six months of consistent posting. Individual posts or campaigns can generate engagement within days, but trust and recall — which is what social media actually builds for a local business — accumulate over a longer period rather than appearing at a single point."
        }
      },
      {
        "@type": "Question",
        "name": "Does social media help my local search rankings?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Not directly as a ranking factor, but it supports local visibility in practical ways. Active profiles reinforce that your business is real and operating, social content can be repurposed as Google Business Profile posts that appear at the moment of search intent, and consistent profiles help AI assistants verify your business when recommending local options."
        }
      },
      {
        "@type": "Question",
        "name": "Can I manage social media myself instead of hiring an agency?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes, up to a point. A single-location business with someone willing to spend a few consistent hours a week can manage one platform well. It becomes worth outsourcing when consistency slips, when you are running multiple platforms, or when the time spent is worth more applied to running the business itself."
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
        <span class="text-[#00A8B5] font-bold">Social Media Marketing</span>
      </nav>

      <!-- Kicker -->
      <div>
        <span class="pulse-badge uppercase tracking-wider font-mono text-xs">
          FOLLOWERS DON'T FILL A DIARY. CUSTOMERS DO.
        </span>
      </div>

      <!-- Main Headline -->
      <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A] tracking-tight">
        Social Media Marketing Services
      </h1>

      <!-- Direct-answer opening paragraph (AI extractable block) -->
      <div class="max-w-3xl mx-auto bg-[#F6F8FB] border border-[#E4E7EC] p-6 sm:p-8 rounded-2xl text-left shadow-sm">
        <div class="text-[11px] font-mono text-[#00A8B5] font-bold uppercase tracking-wider mb-2 flex items-center gap-1.5">
          <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Direct Answer Overview
        </div>
        <p class="text-base sm:text-lg text-[#14151A] leading-relaxed">
          Social media marketing is the practice of using platforms like Instagram, Facebook and LinkedIn to build an audience and drive business results — through strategy, content, community management and paid promotion. Digital4Local runs social media marketing for local businesses across India, measured against enquiries and customers rather than follower counts. We do not buy followers, likes or engagement, because fake metrics violate platform terms and tell you nothing about whether the work is producing customers.
        </p>
      </div>

      <!-- Action Buttons -->
      <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
        <button class="trigger-book-demo btn-primary text-xs px-6 py-3 shadow-md">
          <i data-lucide="share-2" class="w-4 h-4"></i> Get a free social media audit
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
          What is social media marketing, SMM and social media management?
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto">
          Three terms used interchangeably that describe different scopes of work. Each definition below stands alone as a complete, quotable answer.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#00A8B5] font-bold">01 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">01 · Social Media Marketing (SMM)</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Social media marketing is the use of social platforms to achieve business outcomes — awareness, engagement, leads or sales. SMM is simply the standard abbreviation for social media marketing; the two terms mean the same thing. It covers strategy, content, community management, and often paid social advertising as well.
            </p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#16A34A] font-bold">02 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">02 · Social Media Management</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Social media management is the day-to-day operational side: planning and scheduling posts, publishing, responding to comments and messages, and monitoring mentions. It is a component of social media marketing rather than a synonym — management keeps accounts running, marketing decides what they are running for.
            </p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#8B5CF6] font-bold">03 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">03 · Organic vs Paid Social</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Organic social is unpaid content posted to your own accounts, reaching followers and whoever the algorithm shows it to. Paid social is advertising bought through the platform, reaching a targeted audience regardless of follower count. Organic builds trust slowly; paid buys reach immediately. Most local businesses need both, in different proportions depending on stage.
            </p>
          </div>
        </div>
      </div>

      <!-- Worth Knowing Callout -->
      <div class="card-dark p-6 border-l-4 border-l-[#00A8B5] bg-[#F8FAFC] rounded-r-2xl max-w-4xl mx-auto">
        <div class="text-xs font-mono text-[#00A8B5] font-bold mb-1">WORTH KNOWING</div>
        <p class="text-sm text-[#14151A] leading-relaxed">
          For a local business, social media rarely works as a direct sales channel the way it does for e-commerce. It works as a trust and recall channel — the thing a customer checks before calling you, and the reason they remember your name when they need what you sell. Judging it purely on direct sales from posts usually undervalues it.
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
          Which platform actually matters for a local business?
        </h2>
        <p class="text-xs text-[#5B5F6B]">
          (Keep as a real HTML table — highly extractable for AI answers. Never render as an image.)
        </p>
      </div>

      <div class="overflow-x-auto rounded-2xl border border-[#E4E7EC] shadow-sm bg-white mb-6">
        <table class="w-full text-left text-xs border-collapse">
          <thead>
            <tr class="bg-[#F8FAFC] border-b border-[#E4E7EC]">
              <th class="p-4 sm:p-5 font-mono uppercase text-[#5B5F6B] font-bold w-1/5">Platform</th>
              <th class="p-4 sm:p-5 font-bold text-[#14151A] text-sm w-1/3 border-l border-[#E4E7EC]">Best for</th>
              <th class="p-4 sm:p-5 font-bold text-[#00A8B5] text-sm w-1/3 border-l border-[#E4E7EC] bg-[#00F0FF]/5">Local business fit</th>
              <th class="p-4 sm:p-5 font-bold text-[#5B5F6B] text-sm w-1/6 border-l border-[#E4E7EC]">Effort level</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#E4E7EC] text-[#5B5F6B]">
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Instagram</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Visual services, food, retail, beauty, fitness</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#14151A]">High — strong local discovery via location tags and Reels</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-medium text-[#EF4444]">High — needs consistent visual content</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Facebook</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Community, events, older demographics, local groups</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#14151A]">High — still dominant for local audiences in India</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#D97706]">Medium</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors bg-[#00F0FF]/5">
              <td class="p-4 sm:p-5 font-bold text-[#00A8B5]">Google Business Profile posts</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-semibold text-[#14151A]">Appearing at the moment of local search intent</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-bold text-[#16A34A]">Highest — closest to a ready-to-buy customer</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono text-[#16A34A] font-bold">Low</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">WhatsApp Business</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Direct enquiries, catalogues, follow-up</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#14151A]">High — the default channel for Indian customers</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#16A34A]">Low–Medium</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">LinkedIn</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">B2B services, professional services, recruitment</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5">Medium — only if you sell to businesses</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#D97706]">Medium</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">YouTube</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Explanations, demonstrations, before-and-after</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5">Medium — high effort, long shelf life</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444]">High</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">X / Twitter</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Real-time commentary, news</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 text-[#5B5F6B]">Low for most local businesses</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#D97706]">Medium</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Table Takeaway -->
      <div class="bg-[#F8FAFC] border border-[#E4E7EC] p-6 rounded-xl max-w-4xl mx-auto text-center">
        <p class="text-xs sm:text-sm text-[#14151A] leading-relaxed">
          <strong>The honest read:</strong> most local businesses are better served doing two platforms properly than six badly. For a typical Indian local business, that usually means Instagram plus Google Business Profile posts, with WhatsApp handling the enquiries both generate.
        </p>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 5. SECTION — What we will not do (Our Line) -->
    <!-- ========================================================================= -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 pb-20" data-aos="fade-up">
      <div class="card-dark p-8 sm:p-12 border-2 border-[#EF4444]/30 bg-[#FFFDFD] rounded-3xl space-y-6 shadow-sm">
        <div class="text-center space-y-2">
          <span class="text-xs font-mono text-[#EF4444] font-bold uppercase tracking-wider">OUR LINE</span>
          <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A]">
            What we will not do
          </h2>
          <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto">
            A large part of the "social media marketing" market in India is not marketing at all — it is selling fake engagement. So, plainly:
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
          <div class="p-4 bg-white border border-[#FEE2E2] rounded-xl flex items-start gap-3">
            <i data-lucide="ban" class="w-5 h-5 text-[#EF4444] shrink-0 mt-0.5"></i>
            <div class="text-xs text-[#5B5F6B] leading-relaxed">
              <strong class="text-[#14151A] block mb-0.5">We do not buy followers, likes, views or comments.</strong>
              These come from bots and inactive accounts. They violate platform terms, can get accounts restricted, and produce metrics that describe nothing real.
            </div>
          </div>

          <div class="p-4 bg-white border border-[#FEE2E2] rounded-xl flex items-start gap-3">
            <i data-lucide="ban" class="w-5 h-5 text-[#EF4444] shrink-0 mt-0.5"></i>
            <div class="text-xs text-[#5B5F6B] leading-relaxed">
              <strong class="text-[#14151A] block mb-0.5">We do not use SMM panels.</strong>
              Panels selling cheap engagement are the most common shortcut in this market and the least defensible. Nothing they deliver will ever call your business.
            </div>
          </div>

          <div class="p-4 bg-white border border-[#FEE2E2] rounded-xl flex items-start gap-3">
            <i data-lucide="ban" class="w-5 h-5 text-[#EF4444] shrink-0 mt-0.5"></i>
            <div class="text-xs text-[#5B5F6B] leading-relaxed">
              <strong class="text-[#14151A] block mb-0.5">We do not run engagement pods or artificial comment loops.</strong>
              Platforms detect coordinated inauthentic behaviour, and the reach penalty outlasts the temporary boost.
            </div>
          </div>

          <div class="p-4 bg-white border border-[#FEE2E2] rounded-xl flex items-start gap-3">
            <i data-lucide="ban" class="w-5 h-5 text-[#EF4444] shrink-0 mt-0.5"></i>
            <div class="text-xs text-[#5B5F6B] leading-relaxed">
              <strong class="text-[#14151A] block mb-0.5">We do not report follower count as the headline result.</strong>
              Followers are the easiest number to inflate and the least connected to revenue.
            </div>
          </div>
        </div>

        <div class="text-xs text-[#5B5F6B] leading-relaxed pt-2">
          <strong>The honest trade-off:</strong> genuine social media growth is slower and the numbers look smaller. What you get instead is an audience that actually lives near you, actually buys what you sell, and actually responds when you post.
        </div>
      </div>
    </section>

    <!-- ========================================================================= -->
    <!-- 6. SECTION — Why it matters -->
    <!-- ========================================================================= -->
    <section class="max-w-4xl mx-auto px-4 pb-20" data-aos="fade-up">
      <div class="card-dark p-8 md:p-12 space-y-6 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl">
        <div class="text-xs font-mono text-[#00A8B5] uppercase font-bold tracking-wider">WHY IT MATTERS</div>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A]">
          What social media actually does for a local business
        </h2>
        <p class="text-sm text-[#5B5F6B]">
          Most local businesses are told they need social media without ever being told what it is supposed to achieve. Here is the realistic version.
        </p>
        
        <p class="text-base text-[#5B5F6B] leading-relaxed">
          <strong>It is the verification step.</strong> Someone finds you through search, a map result, or a recommendation — then checks your Instagram or Facebook before deciding. An account that has not posted in eight months reads as a business that might have closed. An active account with real photos and recent activity reads as one that is running properly. That check happens constantly and silently, and it costs you customers when it goes badly.
        </p>

        <p class="text-base text-[#5B5F6B] leading-relaxed">
          <strong>It builds recall before the need exists.</strong> Most people are not looking for a dentist, an installer or a photographer today. Social media keeps you in mind for the month when they are.
        </p>

        <p class="text-base text-[#5B5F6B] leading-relaxed">
          <strong>It feeds the channels that do convert.</strong> Social content gives your Google Business Profile something to post, gives WhatsApp follow-ups something to reference, and produces the photos and video your website needs.
        </p>

        <p class="text-base text-[#14151A] font-semibold leading-relaxed">
          <strong>And increasingly, it corroborates you.</strong> AI answer engines weigh whether a business appears consistent and real across multiple sources. Active, consistent social profiles are part of how a model verifies you exist and does what you claim — which supports being recommended when someone asks an AI for a local suggestion.
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
          What's included in Digital4Local's social media marketing service
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- 1. Social media audit & strategy -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">01</div>
          <h3 class="font-bold text-base text-[#14151A]">Social media audit & strategy</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            We review your current accounts, your competitors, and where your actual customers spend time — then recommend which platforms are worth your effort and which are not. Most local businesses are told to be everywhere; we will usually tell you to do less, better.
          </p>
        </div>

        <!-- 2. Content planning & production -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">02</div>
          <h3 class="font-bold text-base text-[#14151A]">Content planning & production</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            A monthly content plan built around your actual business — what you do, what you sell, the questions customers ask — with graphics, captions and short-form video produced to a consistent look. You approve the calendar before anything publishes.
          </p>
        </div>

        <!-- 3. Local content that uses your location -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold font-mono">03</div>
          <h3 class="font-bold text-base text-[#14151A]">Local content that uses your location</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Location tags, local landmarks, community events, and content built for the area you serve. Local relevance is what makes social content discoverable to nearby customers rather than a random national audience who will never visit.
          </p>
        </div>

        <!-- 4. Community management & response -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#D97706]/15 text-[#D97706] flex items-center justify-center font-bold font-mono">04</div>
          <h3 class="font-bold text-base text-[#14151A]">Community management & response</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Replying to comments and direct messages, monitoring mentions of your business, and handling routine enquiries. An account that never replies looks abandoned even when it is posting daily.
          </p>
        </div>

        <!-- 5. Google Business Profile posts -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#EC4899]/15 text-[#EC4899] flex items-center justify-center font-bold font-mono">05</div>
          <h3 class="font-bold text-base text-[#14151A]">Google Business Profile posts</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Social content repurposed as Google Business Profile posts, so the same work also shows up at the moment someone is searching for what you sell. This is the highest-intent surface most local businesses ignore, connecting directly to our <a href="local-seo.php" class="text-[#00A8B5] underline font-bold">local SEO</a> work.
          </p>
        </div>

        <!-- 6. Paid social campaigns -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00A8B5]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">06</div>
          <h3 class="font-bold text-base text-[#14151A]">Paid social campaigns</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Targeted advertising on Meta platforms where it makes sense — local awareness, offers, lead generation. Run with proper tracking so you can see what the spend produced, not just what it reached.
          </p>
        </div>

        <!-- 7. Reporting that connects to enquiries -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all md:col-span-2 lg:col-span-1">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">07</div>
          <h3 class="font-bold text-base text-[#14151A]">Reporting that connects to enquiries</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Monthly: reach and engagement, but also profile visits, direction requests, clicks to WhatsApp, and enquiries you can trace back. If the only number going up is followers, we will say so.
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
            We review your existing accounts, your competitors' activity, and what your customers actually respond to. You get an honest read — including whether social media is genuinely your priority, or whether your budget would do more elsewhere first.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#16A34A] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#16A34A] font-bold">PHASE 02</span>
          <h3 class="text-lg font-bold text-[#14151A]">2. Plan</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Platform selection, content pillars, posting cadence and the specific outcomes we are aiming at. Agreed before anything is produced, so there are no surprises on your own feed.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#8B5CF6] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#8B5CF6] font-bold">PHASE 03</span>
          <h3 class="text-lg font-bold text-[#14151A]">3. Publish</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Content production, scheduling and publishing, with community management running alongside. You see and approve the calendar in advance every month.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#D97706] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#D97706] font-bold">PHASE 04</span>
          <h3 class="text-lg font-bold text-[#14151A]">4. Review</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Monthly reporting against the outcomes we agreed, and a quarterly reset — dropping what is not working rather than continuing it because it is on the plan.
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
              <span>A local business whose customers check social profiles before deciding — clinics, restaurants, salons, studios, retail, fitness</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Posting inconsistently, or dormant, and aware it looks bad</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Producing photos or video already but with no plan behind them</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Wanting social content to feed your Google Business Profile and WhatsApp enquiries, not exist in isolation</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Willing to give access, input and occasional photos from your actual business</span>
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
              <span>Looking for follower growth as the goal — we do not sell that, and the businesses that want it are usually better served elsewhere</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Expecting social media to generate direct sales immediately — for most local businesses it builds trust and recall before it produces enquiries</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Unable to provide any input, photos or approvals — content produced with zero involvement from the business rarely sounds like the business</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Not yet visible in local search — if customers cannot find you at the moment of intent, <a href="local-seo.php" class="text-[#00A8B5] underline font-bold">local SEO</a> will do more for you first, and we will tell you that</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="text-center">
        <p class="text-xs text-[#5B5F6B] font-mono italic">
          We would rather point you at the right service than take budget for this one.
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
          What social media marketing costs
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          There is no single price. Four things drive it:
        </p>
      </div>

      <!-- 4 Cost Drivers -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">1. Number of platforms</div>
          <p class="text-xs text-[#5B5F6B]">Running Instagram properly costs less than running Instagram, Facebook and LinkedIn together.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">2. Posting frequency</div>
          <p class="text-xs text-[#5B5F6B]">A daily cadence requires substantially more production than three posts a week.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">3. Content type</div>
          <p class="text-xs text-[#5B5F6B]">Static graphics are quicker to produce than custom short-form video or motion reels.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">4. Community management</div>
          <p class="text-xs text-[#5B5F6B]">Daily DM and comment response handling is ongoing work; a monthly content drop is not.</p>
        </div>
      </div>

      <!-- Currency Switcher & Packages Grid -->
      <div class="flex items-center justify-center gap-2 mb-8">
        <button data-currency="INR" class="currency-btn active px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#00F0FF] text-[#0A0A0F]">🇮🇳 INR (₹)</button>
        <button data-currency="USD" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇺🇸 USD ($)</button>
        <button data-currency="GBP" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇬🇧 GBP (£)</button>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        <!-- Local Presence Starter -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#5B5F6B] uppercase font-bold">Local Presence</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹14,999" data-usd="$399" data-gbp="£319">₹14,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/month</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 2 Core Platforms (e.g. IG + GBP Posts)</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 12 High-Quality Branded Posts / Month</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Monthly Approved Content Calendar</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Basic Enquiry Tracking Report</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-secondary w-full text-xs justify-center py-2.5">Book intro call</button>
        </div>

        <!-- Growth & Video Funnel -->
        <div class="card-elevated p-8 space-y-6 flex flex-col justify-between relative border-2 border-[#00A8B5] bg-white rounded-2xl shadow-md">
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#00F0FF] text-[#0A0A0F] font-mono text-[10px] font-bold px-3 py-1 rounded-full uppercase">Most Popular</div>
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#00A8B5] uppercase font-bold">Growth & Short-Form Video</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹29,999" data-usd="$699" data-gbp="£559">₹29,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/month</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 3 Platforms (Instagram, Facebook & GBP)</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 20 Posts/Month incl. 8 Edited Short-Form Reels</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Active DM & Comment Community Management</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Meta Paid Ad Campaign Setup & Tracking</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-primary w-full text-xs justify-center py-2.5">Book intro call</button>
        </div>

        <!-- Multi-Location Domination -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#8B5CF6] uppercase font-bold">Multi-Location Brand</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹54,999" data-usd="$1,299" data-gbp="£1,049">₹54,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/month</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Full Multi-Location Social Distribution</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Daily Publishing (Reels, Carousels & Stories)</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> WhatsApp Automation Funnel Integration</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Dedicated Content Producer & Strategist</li>
            </ul>
          </div>
          <a href="../contact.php" class="btn-secondary w-full text-xs justify-center py-2.5">Custom Brand Quote</a>
        </div>
      </div>

      <!-- What you always get -->
      <div class="bg-[#F8FAFC] border border-[#E4E7EC] p-6 rounded-xl text-center max-w-3xl mx-auto">
        <p class="text-xs sm:text-sm text-[#14151A] font-medium">
          <strong>What you always get:</strong> an approved content calendar before anything publishes, a fixed monthly scope, and reporting that goes past follower count.
        </p>
      </div>
    </section>

    <!-- 10.5. SECTION — Tools & AI We Use for Social Media -->
    <?php 
    $current_stack_key = 'social-media';
    include '../includes/tools-stack.php'; 
    ?>

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
            <span>What is the full form of SMM?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            SMM stands for Social Media Marketing. It refers to using social platforms such as Instagram, Facebook and LinkedIn to achieve business outcomes including awareness, engagement, leads and sales. The abbreviation is used interchangeably with the full term across the industry, including in agency packages and pricing.
          </div>
        </div>

        <!-- Q2 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What is the difference between social media marketing and social media management?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Social media management is the day-to-day operational work — planning, scheduling, publishing and responding to comments and messages. Social media marketing is the broader discipline that includes management plus strategy, content direction, paid advertising and measurement. Management keeps accounts running; marketing decides what they are running for.
          </div>
        </div>

        <!-- Q3 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Which social media platform is best for a local business?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            For most local businesses in India, Instagram and Google Business Profile posts deliver the most, with WhatsApp handling the enquiries they generate. Facebook remains strong for community and older audiences. LinkedIn only matters if you sell to other businesses. Doing two platforms properly beats doing six badly.
          </div>
        </div>

        <!-- Q4 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How much does social media marketing cost?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Cost depends on how many platforms are managed, how often content is published, how complex that content is, and whether community management is included. Paid advertising is quoted separately, since ad spend goes to the platform and management is a separate charge. Any quote given before understanding your platforms and goals is a guess.
          </div>
        </div>

        <!-- Q5 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Should I buy followers to grow faster?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            No. Purchased followers come from bots and inactive accounts, violate platform terms, and can lead to account restrictions. They also distort your engagement rate, which can reduce how often the platform shows your content to real people. A smaller genuine audience in your service area is worth more than a large fake one.
          </div>
        </div>

        <!-- Q6 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How long does social media marketing take to work?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Meaningful audience growth typically takes three to six months of consistent posting. Individual posts or campaigns can generate engagement within days, but trust and recall — which is what social media actually builds for a local business — accumulate over a longer period rather than appearing at a single point.
          </div>
        </div>

        <!-- Q7 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Does social media help my local search rankings?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Not directly as a ranking factor, but it supports local visibility in practical ways. Active profiles reinforce that your business is real and operating, social content can be repurposed as Google Business Profile posts that appear at the moment of search intent, and consistent profiles help AI assistants verify your business when recommending local options.
          </div>
        </div>

        <!-- Q8 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Can I manage social media myself instead of hiring an agency?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Yes, up to a point. A single-location business with someone willing to spend a few consistent hours a week can manage one platform well. It becomes worth outsourcing when consistency slips, when you are running multiple platforms, or when the time spent is worth more applied to running the business itself.
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
          Find out whether your social media is actually doing anything
        </h2>
        <p class="text-sm sm:text-base text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          Digital4Local audits social media accounts for local businesses across India — what is working, what is not, and whether this is even where your budget should go next. In writing, before you commit to anything.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4">
          <button class="trigger-book-demo btn-primary text-sm px-8 py-3.5 shadow-lg font-bold">
            <i data-lucide="share-2" class="w-4 h-4"></i> Get a free social media audit
          </button>
        </div>
      </div>
    </section>

  </main>

  <?php include_once '../includes/footer.php'; ?>
</body>
</html>
