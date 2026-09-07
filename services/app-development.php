<?php
require_once __DIR__ . '/../includes/site-config.php';
$app_cfg = get_page_config('services_app_dev');

$page_title = "Mobile App Development Company in India — iOS & Android Apps | Digital4Local";
$page_description = "Mobile app development company building native and cross-platform iOS & Android apps with Flutter, React Native, and Swift. Custom UI/UX & secure backend.";
$canonical_url = "https://digital4local.com/services/app-development.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../includes/seo.php'; ?>

  <!-- FAQPage Schema for Mobile App Development -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "What is the difference between native and cross-platform app development?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Native development uses platform-specific languages (Swift for iOS, Kotlin for Android) to deliver maximum speed and direct hardware access. Cross-platform development uses frameworks like Flutter or React Native to compile a single codebase for both iOS and Android, reducing development cost and timeline by 40% to 50% while maintaining near-native performance."
        }
      },
      {
        "@type": "Question",
        "name": "How long does it take to develop a mobile app?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "A standard minimum viable product (MVP) or business utility app typically takes 6 to 10 weeks from discovery to app store submission. Complex enterprise applications, on-demand marketplaces, or apps with custom backend algorithms usually require 12 to 20 weeks of agile sprint development."
        }
      },
      {
        "@type": "Question",
        "name": "How much does it cost to build a mobile app in India?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Cost depends on feature complexity, platform architecture (iOS, Android, or cross-platform), backend integrations, and custom UI/UX requirements. A standalone MVP starts at an accessible project tier, whereas complex real-time platforms require custom milestone-based scoping."
        }
      },
      {
        "@type": "Question",
        "name": "Will my app work on both iOS and Android?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. Using modern cross-platform technologies like Flutter and React Native, we build unified applications that deliver smooth 60fps performance and native look-and-feel across all modern iPhone, iPad, and Android devices."
        }
      },
      {
        "@type": "Question",
        "name": "Who owns the source code and intellectual property (IP)?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "You retain 100% ownership of all source code, database architecture, design assets, and intellectual property. Upon project completion and handover, all repositories and credentials are fully transferred to your accounts."
        }
      },
      {
        "@type": "Question",
        "name": "How do you handle Apple App Store and Google Play approvals?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "We manage the entire submission pipeline — including developer account setup, privacy policy compliance, metadata and screenshot preparation, App Store Review Guidelines auditing, and resolving any review inquiries until your app is live."
        }
      },
      {
        "@type": "Question",
        "name": "Can you integrate payment gateways like Razorpay, Stripe, and UPI?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. We integrate secure, PCI-compliant payment gateways including Razorpay, Stripe, Apple Pay, Google Pay, UPI deep-linking, and subscription in-app purchases (IAP) with automated invoice generation."
        }
      },
      {
        "@type": "Question",
        "name": "What happens after the mobile app is launched?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "We provide warranty support to fix any post-launch edge cases, plus optional monthly maintenance plans covering OS version upgrades, security patches, performance monitoring, and iterative feature development."
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
        <span class="text-[#00A8B5] font-bold">App Development</span>
      </nav>

      <!-- Kicker -->
      <div>
        <span class="pulse-badge uppercase tracking-wider font-mono text-xs">
          BUILT FOR THE SCREEN YOUR CUSTOMERS NEVER PUT DOWN.
        </span>
      </div>

      <!-- Main Headline -->
      <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A] tracking-tight">
        Mobile App Development Company
      </h1>

      <!-- Direct-answer opening paragraph (AI extractable block) -->
      <div class="max-w-3xl mx-auto bg-[#F6F8FB] border border-[#E4E7EC] p-6 sm:p-8 rounded-2xl text-left shadow-sm">
        <div class="text-[11px] font-mono text-[#00A8B5] font-bold uppercase tracking-wider mb-2 flex items-center gap-1.5">
          <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Direct Answer Overview
        </div>
        <p class="text-base sm:text-lg text-[#14151A] leading-relaxed">
          Mobile app development is the practice of designing, building, and deploying software applications specifically engineered for mobile devices like smartphones and tablets — including iOS (iPhone/iPad) and Android platforms. Digital4Local is a mobile app development company building custom native and cross-platform mobile apps for businesses across India, with fluid UI/UX, enterprise-grade security, and scalable cloud backends built in from the first sprint. A mobile app built without architectural foresight usually suffers from performance lag, battery drain, and app store rejection.
        </p>
      </div>

      <!-- Action Buttons -->
      <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
        <button class="trigger-book-demo btn-primary text-xs px-6 py-3 shadow-md">
          <i data-lucide="smartphone" class="w-4 h-4"></i> Get a free app consultation
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
          What is native, cross-platform, and progressive web app (PWA) development?
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto">
          Three development approaches that determine how your app is built, deployed, and experienced. Each definition below is written to stand alone as an extractable answer.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#00A8B5] font-bold">01 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">01 · Native App Development</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Native app development is the process of building dedicated software for a specific mobile operating system using platform-exclusive languages — Swift for Apple iOS and Kotlin for Google Android. Native apps offer the highest possible performance, smoothest animations, and direct access to hardware features like camera, GPS, biometric sensors, and Apple Pay/Google Wallet.
            </p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#16A34A] font-bold">02 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">02 · Cross-Platform App Development</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Cross-platform app development is the practice of writing a single unified codebase that compiles and runs seamlessly across both iOS and Android platforms using frameworks like Flutter or React Native. It reduces development costs and time-to-market by 40% to 50% while delivering near-native performance and identical user experiences on both operating systems.
            </p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#8B5CF6] font-bold">03 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">03 · Progressive Web Apps (PWA)</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              A Progressive Web App is a website engineered to function like an installable mobile application inside a browser. PWAs work offline, send push notifications, and load instantly without requiring users to download from the Apple App Store or Google Play Store. While cost-effective, PWAs have limited access to deep hardware capabilities compared to installed mobile apps.
            </p>
          </div>
        </div>
      </div>

      <!-- Worth Knowing Callout -->
      <div class="card-dark p-6 border-l-4 border-l-[#00A8B5] bg-[#F8FAFC] rounded-r-2xl max-w-4xl mx-auto">
        <div class="text-xs font-mono text-[#00A8B5] font-bold mb-1">WORTH KNOWING</div>
        <p class="text-sm text-[#14151A] leading-relaxed">
          Choosing between native and cross-platform depends on your feature complexity, timeline, and budget. For 90% of business applications, cross-platform frameworks like Flutter and React Native provide the optimal balance of speed, performance, and cost-efficiency without compromising user experience.
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
          Native vs Cross-Platform vs Progressive Web Apps (PWA)
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
              <th class="p-4 sm:p-5 font-bold text-[#14151A] text-sm w-4/15 border-l border-[#E4E7EC]">Native (Swift / Kotlin)</th>
              <th class="p-4 sm:p-5 font-bold text-[#00A8B5] text-sm w-4/15 border-l border-[#E4E7EC] bg-[#00F0FF]/5">Cross-Platform (Flutter / React Native)</th>
              <th class="p-4 sm:p-5 font-bold text-[#5B5F6B] text-sm w-4/15 border-l border-[#E4E7EC]">Progressive Web App (PWA)</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#E4E7EC] text-[#5B5F6B]">
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Codebase</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Separate (iOS & Android)</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#16A34A]">Single Unified Codebase</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Single Web Codebase</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Performance</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-semibold text-[#14151A]">100% Maximum Speed (120fps)</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#14151A]">Near-Native (60–120fps)</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Browser-Dependent</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Development Cost</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444]">Higher (2 separate teams)</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#16A34A]">Moderate (40–50% cost savings)</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-semibold text-[#16A34A]">Lowest</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Time to Market</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono">12–20 weeks</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-mono font-bold text-[#00A8B5]">6–10 weeks</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-mono">3–6 weeks</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">App Store Distribution</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Apple App Store & Google Play</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#14151A]">Apple App Store & Google Play</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Direct browser URL install</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Hardware & Sensor Access</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] font-semibold text-[#16A34A]">Full & Direct</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#16A34A]">Full via native bridges</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444]">Limited</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Best For</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Complex 3D games, AR/VR, OS utilities</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-bold text-[#14151A]">E-commerce, booking, SaaS, healthcare, fintech</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Content portals, news sites, simple tools</td>
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
          Why a dedicated mobile app creates unprecedented customer retention
        </h2>
        
        <p class="text-base text-[#5B5F6B] leading-relaxed">
          A website is where customers discover you; a mobile app is where they stay with you. Installing your app places your brand icon directly on the user's home screen — the single most viewed piece of real estate in modern commerce.
        </p>

        <p class="text-base text-[#5B5F6B] leading-relaxed">
          Mobile apps bypass the noisy email inbox and social media algorithms entirely through push notifications. Push notifications boast 7x higher open rates and 4x higher transaction conversions than traditional marketing emails, allowing you to trigger flash sales, appointment reminders, and personalized re-engagement campaigns instantly.
        </p>

        <p class="text-base text-[#14151A] font-semibold leading-relaxed">
          Furthermore, in the era of AI and mobile-first search, well-structured app deep-links and App Store Optimization (ASO) ensure your brand is cited and recommended whenever users search for specialized services in Apple App Store, Google Play Store, and AI assistant directories.
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
          What's included in Digital4Local's app development service
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- 1. Strategy & Product Scoping -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">01</div>
          <h3 class="font-bold text-base text-[#14151A]">Strategy & Product Scoping</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Feature matrix breakdown, technical architecture planning, user flow mapping, and technology stack selection (Flutter, React Native, or Swift/Kotlin) matched to your business objectives.
          </p>
        </div>

        <!-- 2. UI/UX Design & Interactive Prototyping -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">02</div>
          <h3 class="font-bold text-base text-[#14151A]">UI/UX Design & Prototyping</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Pixel-perfect Figma wireframes and clickable prototypes adhering to Apple Human Interface Guidelines and Google Material Design 3 for frictionless user onboarding and retention.
          </p>
        </div>

        <!-- 3. iOS & Android Development -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold font-mono">03</div>
          <h3 class="font-bold text-base text-[#14151A]">iOS & Android Development</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Clean, modular code built on Flutter and React Native with 60fps animations, offline data caching, smooth biometric authentication, and native device hardware integration.
          </p>
        </div>

        <!-- 4. Cloud Backend & API Engineering -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#D97706]/15 text-[#D97706] flex items-center justify-center font-bold font-mono">04</div>
          <h3 class="font-bold text-base text-[#14151A]">Cloud Backend & API Engineering</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            High-speed RESTful and GraphQL APIs, serverless cloud databases (Firebase, AWS, PostgreSQL), automated push notification engines, and CRM webhook pipelines.
          </p>
        </div>

        <!-- 5. App Store Optimization & Submission -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#EC4899]/15 text-[#EC4899] flex items-center justify-center font-bold font-mono">05</div>
          <h3 class="font-bold text-base text-[#14151A]">App Store Optimization & Launch</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Full compliance auditing and submission handling for Apple App Store and Google Play Store, including keyword-optimized store listings, screenshots, and review approvals.
          </p>
        </div>

        <!-- 6. Rigorous QA & Security Testing -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00A8B5]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">06</div>
          <h3 class="font-bold text-base text-[#14151A]">QA, Device Testing & Security</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Automated and manual testing across 30+ physical iOS and Android screen resolutions, battery consumption audits, payment security validation, and SSL encryption checks.
          </p>
        </div>

        <!-- 7. Post-Launch Maintenance & Scaling -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all md:col-span-2 lg:col-span-1">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">07</div>
          <h3 class="font-bold text-base text-[#14151A]">Maintenance & Feature Scaling</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Continuous OS compatibility updates (iOS & Android major releases), real-time crash monitoring, server scaling, and phased rollouts for new feature iterations.
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
          <h3 class="text-lg font-bold text-[#14151A]">1. Discover & Scope</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            We review your business model, target audience, and core user workflows to produce a clear technical specification and interactive feature roadmap.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#16A34A] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#16A34A] font-bold">PHASE 02</span>
          <h3 class="text-lg font-bold text-[#14151A]">2. UI/UX Prototyping</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Figma wireframes and clickable screen prototypes. You test and approve every tap and transition before software engineering begins.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#8B5CF6] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#8B5CF6] font-bold">PHASE 03</span>
          <h3 class="text-lg font-bold text-[#14151A]">3. Agile Sprint Build</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Bi-weekly development sprints with test builds shared via TestFlight (iOS) and Internal App Sharing (Android) so you can track real-time progress.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#D97706] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#D97706] font-bold">PHASE 04</span>
          <h3 class="text-lg font-bold text-[#14151A]">4. Store Launch & Scale</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            App Store and Google Play publication, analytics tracking verification, crash-free session monitoring, and post-launch maintenance handoff.
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
              <span>A business with frequent customer re-orders, bookings, or recurring account activity</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Ready to launch a dedicated mobile product, on-demand service, or SaaS mobile companion</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Wanting push notifications to dramatically increase customer lifetime value (LTV)</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Looking for a single team to build and maintain both iOS and Android apps simultaneously</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Requiring native hardware features like GPS tracking, camera barcode scanning, or offline sync</span>
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
              <span>Only needing a simple information/brochure site — a <a href="web-development.php" class="text-[#00A8B5] underline font-bold">mobile-responsive website</a> is much cheaper and faster</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Expecting a fully functional custom app in under two weeks — quality engineering and store reviews take real time</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Unwilling to participate in product sprint reviews and milestone testing</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Looking for a zero-budget template wrapper with no backend functionality</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="text-center">
        <p class="text-xs text-[#5B5F6B] font-mono italic">
          We would rather tell you if a responsive web app is better for you before you invest in a mobile build.
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
          What mobile app development costs
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          There is no single number, and any quote given before a scoping call is a guess. Cost is driven by four things:
        </p>
      </div>

      <!-- 4 Cost Drivers -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">1. Platform architecture</div>
          <p class="text-xs text-[#5B5F6B]">Cross-platform Flutter apps cost significantly less than building two separate native Swift & Kotlin codebases.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">2. Backend complexity</div>
          <p class="text-xs text-[#5B5F6B]">Real-time chat, GPS geolocation, and payment gateways require custom server infrastructure.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">3. Third-party integrations</div>
          <p class="text-xs text-[#5B5F6B]">Razorpay, Stripe, Twilio SMS, WhatsApp bots, and CRM webhooks add engineering scope.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">4. UI/UX design depth</div>
          <p class="text-xs text-[#5B5F6B]">Custom animations, micro-interactions, and branded design systems take longer to craft than standard controls.</p>
        </div>
      </div>

      <!-- Currency Switcher & Packages Grid -->
      <div class="flex items-center justify-center gap-2 mb-8">
        <button data-currency="INR" class="currency-btn active px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#00F0FF] text-[#0A0A0F]">🇮🇳 INR (₹)</button>
        <button data-currency="USD" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇺🇸 USD ($)</button>
        <button data-currency="GBP" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇬🇧 GBP (£)</button>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        <!-- Standalone MVP App -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#5B5F6B] uppercase font-bold">MVP / Utility App</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹49,999" data-usd="$1,199" data-gbp="£949">₹49,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/project</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> iOS & Android Cross-Platform Build</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Up to 6 Custom App Screens</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Firebase Backend & User Authentication</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> App Store & Play Store Submission Support</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-secondary w-full text-xs justify-center py-2.5">Get Project Quote</button>
        </div>

        <!-- Cross-Platform Business App -->
        <div class="card-elevated p-8 space-y-6 flex flex-col justify-between relative border-2 border-[#00A8B5] bg-white rounded-2xl shadow-md">
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#00F0FF] text-[#0A0A0F] font-mono text-[10px] font-bold px-3 py-1 rounded-full uppercase">Most Requested</div>
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#00A8B5] uppercase font-bold">Cross-Platform Business App</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹99,999" data-usd="$2,399" data-gbp="£1,899">₹99,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/project</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Flutter / React Native High-Performance Build</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Payment Gateway (Razorpay/Stripe) + Push Notifications</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Admin Web Dashboard for Content & Orders</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 100% Guaranteed Store Approval Review Support</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-primary w-full text-xs justify-center py-2.5">Get Project Quote</button>
        </div>

        <!-- Enterprise / Custom Platform App -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#8B5CF6] uppercase font-bold">Enterprise / Marketplace</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹1,74,999+" data-usd="$3,999+" data-gbp="£3,199+">₹1,74,999+</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/project</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Real-Time GPS Tracking, Chat & WebSockets</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Multi-Role Architecture (Customer, Partner, Admin)</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Custom Scalable Microservices Backend</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Dedicated Senior Mobile Engineering Squad</li>
            </ul>
          </div>
          <a href="../contact.php" class="btn-secondary w-full text-xs justify-center py-2.5">Custom App Scope</a>
        </div>
      </div>

      <!-- What you always get -->
      <div class="bg-[#F8FAFC] border border-[#E4E7EC] p-6 rounded-xl text-center max-w-3xl mx-auto">
        <p class="text-xs sm:text-sm text-[#14151A] font-medium">
          <strong>What you always get:</strong> 100% source code and IP ownership, milestone-based delivery, full store approval assistance, and 60 days of free post-launch warranty support.
        </p>
      </div>
    </section>

    <!-- 9.5. SECTION — Tools & AI We Use for App Development -->
    <?php 
    $current_stack_key = 'app-development';
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
            <span>What is the difference between native and cross-platform app development?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Native development uses platform-specific languages (Swift for iOS, Kotlin for Android) to deliver maximum speed and direct hardware access. Cross-platform development uses frameworks like Flutter or React Native to compile a single codebase for both iOS and Android, reducing development cost and timeline by 40% to 50% while maintaining near-native performance.
          </div>
        </div>

        <!-- Q2 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How long does it take to develop a mobile app?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            A standard minimum viable product (MVP) or business utility app typically takes 6 to 10 weeks from discovery to app store submission. Complex enterprise applications, on-demand marketplaces, or apps with custom backend algorithms usually require 12 to 20 weeks of agile sprint development.
          </div>
        </div>

        <!-- Q3 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How much does it cost to build a mobile app in India?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Cost depends on feature complexity, platform architecture (iOS, Android, or cross-platform), backend integrations, and custom UI/UX requirements. A standalone MVP starts at an accessible project tier, whereas complex real-time platforms require custom milestone-based scoping.
          </div>
        </div>

        <!-- Q4 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Will my app work on both iOS and Android?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Yes. Using modern cross-platform technologies like Flutter and React Native, we build unified applications that deliver smooth 60fps performance and native look-and-feel across all modern iPhone, iPad, and Android devices.
          </div>
        </div>

        <!-- Q5 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Who owns the source code and intellectual property (IP)?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            You retain 100% ownership of all source code, database architecture, design assets, and intellectual property. Upon project completion and handover, all repositories and credentials are fully transferred to your accounts.
          </div>
        </div>

        <!-- Q6 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How do you handle Apple App Store and Google Play approvals?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            We manage the entire submission pipeline — including developer account setup, privacy policy compliance, metadata and screenshot preparation, App Store Review Guidelines auditing, and resolving any review inquiries until your app is live.
          </div>
        </div>

        <!-- Q7 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Can you integrate payment gateways like Razorpay, Stripe, and UPI?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Yes. We integrate secure, PCI-compliant payment gateways including Razorpay, Stripe, Apple Pay, Google Pay, UPI deep-linking, and subscription in-app purchases (IAP) with automated invoice generation.
          </div>
        </div>

        <!-- Q8 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What happens after the mobile app is launched?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            We provide warranty support to fix any post-launch edge cases, plus optional monthly maintenance plans covering OS version upgrades, security patches, performance monitoring, and iterative feature development.
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
          Have an app idea you want to bring to life?
        </h2>
        <p class="text-sm sm:text-base text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          Digital4Local designs, builds, and launches high-performance iOS and Android mobile apps for businesses across India. Tell us what you want to build and we'll provide a transparent scoping roadmap.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4">
          <button class="trigger-book-demo btn-primary text-sm px-8 py-3.5 shadow-lg font-bold">
            <i data-lucide="smartphone" class="w-4 h-4"></i> Get a free app consultation
          </button>
        </div>
      </div>
    </section>

  </main>

  <?php include_once '../includes/footer.php'; ?>
</body>
</html>
