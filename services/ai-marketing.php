<?php
require_once __DIR__ . '/../includes/site-config.php';
$aim_cfg = get_page_config('services_ai_marketing');

$page_title = "AI Marketing & Automation Services — Convert Leads Faster | Digital4Local";
$page_description = "AI digital marketing and automation services using n8n workflows, AI sales agents, and automated lead triage. Turn traffic into booked calls in sub-60s.";
$canonical_url = "https://digital4local.com/services/ai-marketing.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../includes/seo.php'; ?>

  <!-- FAQPage Schema for AI Digital Marketing -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "What is AI digital marketing?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "AI digital marketing is the application of artificial intelligence, machine learning, and automated workflow engines to streamline marketing operations — including instant lead qualification, personalized multi-channel follow-ups, predictive customer scoring, and automated campaign optimization."
        }
      },
      {
        "@type": "Question",
        "name": "What is n8n and why is it better than Zapier or Make?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "n8n is an open-source, enterprise-grade workflow automation platform that can be self-hosted. Unlike cloud tools like Zapier or Make with restrictive per-step pricing, n8n offers unlimited workflow executions, native AI agent nodes, total data privacy, and direct database integration at a fraction of the cost."
        }
      },
      {
        "@type": "Question",
        "name": "How fast can an AI workflow respond to incoming leads?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Our automated pipelines trigger responses in under 60 seconds across WhatsApp, SMS, and email the moment a prospect submits a web form or clicks a Facebook/Google lead ad, capturing prospect interest at peak buying intent."
        }
      },
      {
        "@type": "Question",
        "name": "Can AI qualify leads before booking sales calls?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. AI conversational agents can ask qualifying questions regarding budget, timeline, location, and specific requirements, route high-priority leads directly to your calendar, and tag or nurture lower-intent prospects automatically."
        }
      },
      {
        "@type": "Question",
        "name": "Will AI send generic, robotic-sounding messages?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "No. We fine-tune LLMs with custom system prompts, your brand's unique tone of voice, past customer conversational data, and dynamic variables (name, company, specific service requested) so every message reads naturally and human."
        }
      },
      {
        "@type": "Question",
        "name": "Does this integrate with our existing CRM and WhatsApp?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. We connect with all major CRMs (HubSpot, Zoho, Salesforce, Pipedrive, Google Sheets) and official WhatsApp Business Cloud APIs to ensure two-way data synchronization with zero manual copy-pasting."
        }
      },
      {
        "@type": "Question",
        "name": "How much does AI marketing automation cost?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Costs depend on the number of automated workflows, CRM integrations, AI agent logic, and self-hosted infrastructure requirements. We offer transparent starter and enterprise packages with fixed implementation scopes."
        }
      },
      {
        "@type": "Question",
        "name": "Who owns the automation workflows and data?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "You retain 100% ownership of all n8n workflows, prompt templates, API configurations, and customer database records. Everything runs on your dedicated cloud servers with no proprietary vendor lock-in."
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
        <span class="text-[#00A8B5] font-bold">AI Marketing & Automation</span>
      </nav>

      <!-- Kicker -->
      <div>
        <span class="pulse-badge uppercase tracking-wider font-mono text-xs">
          REPLACE MANUAL SLOW FOLLOW-UPS WITH SUB-60-SECOND AI PIPELINES.
        </span>
      </div>

      <!-- Main Headline -->
      <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A] tracking-tight">
        AI Marketing & Automation Services
      </h1>

      <!-- Direct-answer opening paragraph (AI extractable block) -->
      <div class="max-w-3xl mx-auto bg-[#F6F8FB] border border-[#E4E7EC] p-6 sm:p-8 rounded-2xl text-left shadow-sm">
        <div class="text-[11px] font-mono text-[#00A8B5] font-bold uppercase tracking-wider mb-2 flex items-center gap-1.5">
          <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Direct Answer Overview
        </div>
        <p class="text-base sm:text-lg text-[#14151A] leading-relaxed">
          AI digital marketing is the use of artificial intelligence, machine learning, and automated workflow engines (like n8n) to analyze customer intent, personalize campaigns, qualify leads, and trigger instantaneous follow-ups across channels. Digital4Local builds end-to-end AI marketing systems for businesses across India — connecting web forms, ad accounts, WhatsApp Business, and CRMs so every lead is engaged within 60 seconds of enquiry. A business relying on manual lead response loses up to 80% of booking conversion to faster competitors.
        </p>
      </div>

      <!-- Action Buttons -->
      <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
        <button class="trigger-book-demo btn-primary text-xs px-6 py-3 shadow-md">
          <i data-lucide="cpu" class="w-4 h-4"></i> Get a free automation audit
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
          What is AI marketing, workflow automation, and conversational AI?
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto">
          Three core automation technologies that transform lead acquisition into predictable revenue. Each definition below stands alone as a complete, quotable answer.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#00A8B5] font-bold">01 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">01 · AI Marketing</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              AI marketing is the deployment of artificial intelligence algorithms and large language models (LLMs) to automate marketing operations — including predictive audience segmentation, dynamic ad copywriting, lead intent scoring, and customer journey orchestration.
            </p>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#16A34A] font-bold">02 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">02 · Workflow Automation (n8n)</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Workflow automation is the programmatic connection between your website, advertising platforms, email tools, and CRM using event-driven triggers. When a customer submits an enquiry, automated nodes instantly enrich their profile, alert your team, and dispatch customized communications without human delay.
            </p>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card-dark p-8 space-y-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl flex flex-col justify-between">
          <div class="space-y-3">
            <div class="text-xs font-mono text-[#8B5CF6] font-bold">03 · DEFINITION</div>
            <h3 class="text-xl font-bold text-[#14151A]">03 · Conversational AI Agents</h3>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              Conversational AI refers to intelligent chatbots and voice agents trained on your business knowledge base to answer inquiries, check calendar availability, handle FAQs, and book confirmed appointments directly through WhatsApp, web chat, or SMS 24 hours a day, 7 days a week.
            </p>
          </div>
        </div>
      </div>

      <!-- Worth Knowing Callout -->
      <div class="card-dark p-6 border-l-4 border-l-[#00A8B5] bg-[#F8FAFC] rounded-r-2xl max-w-4xl mx-auto">
        <div class="text-xs font-mono text-[#00A8B5] font-bold mb-1">WORTH KNOWING</div>
        <p class="text-sm text-[#14151A] leading-relaxed">
          Speed to lead is the single highest leverage lever in digital marketing. Studies show contacting an inbound lead within 5 minutes results in 21x higher qualification rates than waiting 30 minutes. AI automations make sub-60-second response times automatic and 100% reliable.
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
          Manual Lead Follow-Up vs Traditional Drips vs AI Automated Workflows
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
              <th class="p-4 sm:p-5 font-bold text-[#5B5F6B] text-sm w-4/15 border-l border-[#E4E7EC]">Manual Sales Team</th>
              <th class="p-4 sm:p-5 font-bold text-[#D97706] text-sm w-4/15 border-l border-[#E4E7EC]">Generic Email Drip</th>
              <th class="p-4 sm:p-5 font-bold text-[#00A8B5] text-sm w-4/15 border-l border-[#E4E7EC] bg-[#00F0FF]/5">AI n8n Pipeline</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#E4E7EC] text-[#5B5F6B]">
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Response Speed</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444]">2 to 24 hours</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">5 to 15 minutes (Email only)</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-mono font-bold text-[#16A34A]">Sub-60 seconds</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Lead Qualification</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Manual phone triage</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444]">None (Static forms)</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#14151A]">Autonomous AI conversation & scoring</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Channel Reach</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Phone or 1-to-1 email</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Email inbox only</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#16A34A]">Omnichannel (WhatsApp, SMS, Email, CRM)</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Conversion Rate</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Moderate (High drop-off)</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444]">Low (1–3% CTR)</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-bold text-[#16A34A]">Highest (Up to 4x calendar bookings)</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">24/7 Availability</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444]">Business hours only</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">Automated email only</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#16A34A]">100% 24/7/365 instant availability</td>
            </tr>
            <tr class="hover:bg-[#F8FAFC]/50 transition-colors">
              <td class="p-4 sm:p-5 font-bold text-[#14151A]">Personalization Depth</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC]">High but inconsistent</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] text-[#EF4444]">Basic merge tags ({First_Name})</td>
              <td class="p-4 sm:p-5 border-l border-[#E4E7EC] bg-[#00F0FF]/5 font-semibold text-[#14151A]">Dynamic contextual AI personalization</td>
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
          Why speed and intelligent automation decide who wins the lead
        </h2>
        
        <p class="text-base text-[#5B5F6B] leading-relaxed">
          Modern buyers expect immediate answers. When a prospective client fills out a form on your website or social media ad, they are in active research mode. If you take three hours to call them back, they have already spoken with your competitor.
        </p>

        <p class="text-base text-[#5B5F6B] leading-relaxed">
          With custom n8n workflows and AI conversational agents, your business responds instantly on WhatsApp — the default messaging channel for Indian customers. The AI answers their specific questions, calculates estimates, checks real-time calendar availability, and locks in a booking before they ever leave your ecosystem.
        </p>

        <p class="text-base text-[#14151A] font-semibold leading-relaxed">
          Behind the scenes, the automation enriches lead profiles, updates your CRM, notifies your sales team on Slack, and syncs conversion data back to Google Ads and Meta Ads to train bidding algorithms on high-value buyers rather than window shoppers.
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
          What's included in Digital4Local's AI marketing service
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- 1. n8n Workflow Engineering -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">01</div>
          <h3 class="font-bold text-base text-[#14151A]">n8n Workflow Engineering</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Custom self-hosted automation pipelines connecting forms, webhooks, databases, and APIs with zero recurring per-execution platform fees.
          </p>
        </div>

        <!-- 2. Sub-60s WhatsApp & SMS Auto-Responders -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">02</div>
          <h3 class="font-bold text-base text-[#14151A]">Sub-60s WhatsApp & SMS Pipelines</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Instant two-way messaging using official WhatsApp Business APIs to qualify inbound prospects and answer service inquiries within seconds.
          </p>
        </div>

        <!-- 3. CRM Integration & Lead Enrichment -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold font-mono">03</div>
          <h3 class="font-bold text-base text-[#14151A]">CRM Integration & Enrichment</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Automatic data syncing across HubSpot, Zoho, Google Sheets, or custom SQL databases with company headcount and location enrichment.
          </p>
        </div>

        <!-- 4. AI Knowledge-Base Chatbots -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#D97706]/15 text-[#D97706] flex items-center justify-center font-bold font-mono">04</div>
          <h3 class="font-bold text-base text-[#14151A]">AI Knowledge-Base Chatbots</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            RAG (Retrieval-Augmented Generation) agents trained on your pricing, brochures, and SOPs to provide accurate, hallucination-free answers.
          </p>
        </div>

        <!-- 5. Predictive Lead Scoring & Routing -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#EC4899]/15 text-[#EC4899] flex items-center justify-center font-bold font-mono">05</div>
          <h3 class="font-bold text-base text-[#14151A]">Predictive Lead Scoring</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Real-time intent analysis grading leads as Hot, Warm, or Cold, instantly routing high-value prospects to senior sales representatives.
          </p>
        </div>

        <!-- 6. Dynamic Meta & Google Ads Optimisation -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all">
          <div class="w-10 h-10 rounded-xl bg-[#00A8B5]/15 text-[#00A8B5] flex items-center justify-center font-bold font-mono">06</div>
          <h3 class="font-bold text-base text-[#14151A]">Ad Algorithm Feedback Loops</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Offline conversion API (CAPI) sync feeding qualified lead signals back to Meta and Google to train bidding algorithms on actual revenue.
          </p>
        </div>

        <!-- 7. Conversion Dashboards & Monitoring -->
        <div class="card-dark p-6 space-y-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm hover:border-[#00A8B5] transition-all md:col-span-2 lg:col-span-1">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold font-mono">07</div>
          <h3 class="font-bold text-base text-[#14151A]">Real-Time Analytics Dashboards</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Custom live tracking dashboards monitoring response times, conversion rates, booked consultations, and pipeline revenue attribution.
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
          <h3 class="text-lg font-bold text-[#14151A]">1. Audit & Map</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            We review your current enquiry channels, sales response delays, and CRM setup to map out the highest-impact automated workflow opportunities.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#16A34A] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#16A34A] font-bold">PHASE 02</span>
          <h3 class="text-lg font-bold text-[#14151A]">2. Architecture & Prompts</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            We engineer the n8n pipeline nodes, integrate official APIs, and craft custom system prompts tuned to your company's tone and qualification criteria.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#8B5CF6] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#8B5CF6] font-bold">PHASE 03</span>
          <h3 class="text-lg font-bold text-[#14151A]">3. Deploy & Connect</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            We launch the automations on your secure server, connect webhooks to forms and ads, and conduct sandbox test runs before going live.
          </p>
        </div>

        <div class="card-dark p-6 space-y-3 border-t-4 border-t-[#D97706] bg-[#FFFFFF] rounded-xl shadow-sm">
          <span class="text-xs font-mono text-[#D97706] font-bold">PHASE 04</span>
          <h3 class="text-lg font-bold text-[#14151A]">4. Optimize & Scale</h3>
          <p class="text-xs text-[#5B5F6B] leading-relaxed">
            Continuous prompt tuning, conversion rate monitoring, and scaling workflow capacity as your inbound lead volume grows.
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
              <span>Generating 50+ inbound leads per month and struggling with delayed manual follow-ups</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Spending on Google or Meta Ads and wanting to maximize booking conversion rates</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Seeking 24/7 automated WhatsApp qualification and calendar scheduling</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Tired of expensive Zapier bills and wanting scalable, self-hosted n8n workflows</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
              <span>Wanting clean, real-time CRM data hygiene with zero manual rep overhead</span>
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
              <span>Having zero web traffic or lead volume — <a href="local-seo.php" class="text-[#00A8B5] underline font-bold">Local SEO</a> will do far more for you first to generate traffic</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Looking to blast spam cold emails or unconsented WhatsApp bulk messages</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Unwilling to connect official business APIs or provide business SOP knowledge</span>
            </li>
            <li class="flex items-start gap-2.5">
              <i data-lucide="x" class="w-4 h-4 text-[#EF4444] shrink-0 mt-0.5"></i>
              <span>Expecting AI to close deals without human sales reps for high-ticket complex enterprise sales</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="text-center">
        <p class="text-xs text-[#5B5F6B] font-mono italic">
          We build automations that drive actual revenue, not complex tech demos for the sake of complexity.
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
          What AI marketing & automation costs
        </h2>
        <p class="text-sm text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          There is no single number. Implementation cost is driven by four things:
        </p>
      </div>

      <!-- 4 Cost Drivers -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">1. Workflow complexity</div>
          <p class="text-xs text-[#5B5F6B]">A simple form-to-WhatsApp trigger costs less than a multi-branch AI qualification engine.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">2. Knowledge base scope</div>
          <p class="text-xs text-[#5B5F6B]">RAG-based AI agents with deep product catalogues require custom vector embedding setups.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">3. Integration endpoints</div>
          <p class="text-xs text-[#5B5F6B]">Connecting web forms, Meta Ads, Google Ads, CRM, and WhatsApp requires tailored API mappings.</p>
        </div>
        <div class="card-dark p-6 space-y-2 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl">
          <div class="font-bold text-sm text-[#14151A]">4. Server & token monitoring</div>
          <p class="text-xs text-[#5B5F6B]">Self-hosted n8n infrastructure setup, failover logic, and automated error-alerting pipelines.</p>
        </div>
      </div>

      <!-- Currency Switcher & Packages Grid -->
      <div class="flex items-center justify-center gap-2 mb-8">
        <button data-currency="INR" class="currency-btn active px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#00F0FF] text-[#0A0A0F]">🇮🇳 INR (₹)</button>
        <button data-currency="USD" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇺🇸 USD ($)</button>
        <button data-currency="GBP" class="currency-btn px-4 py-1.5 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇬🇧 GBP (£)</button>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        <!-- Lead Triage Starter -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#5B5F6B] uppercase font-bold">Speed-to-Lead Starter</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹24,999" data-usd="$599" data-gbp="£479">₹24,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/setup</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Sub-60s Form-to-WhatsApp/SMS Trigger</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Google Sheets / Basic CRM Auto-Sync</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Instant Sales Team Email & Telegram Alerts</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Self-Hosted n8n Instance Deployment</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-secondary w-full text-xs justify-center py-2.5">Deploy Pipeline</button>
        </div>

        <!-- Complete AI Growth System -->
        <div class="card-elevated p-8 space-y-6 flex flex-col justify-between relative border-2 border-[#00A8B5] bg-white rounded-2xl shadow-md">
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#00F0FF] text-[#0A0A0F] font-mono text-[10px] font-bold px-3 py-1 rounded-full uppercase">Most Requested</div>
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#00A8B5] uppercase font-bold">Autonomous AI Growth Funnel</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹49,999" data-usd="$1,199" data-gbp="£949">₹49,999</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/setup</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> 2-Way AI WhatsApp Qualification & Booking Agent</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Full CRM Integration (HubSpot, Zoho, Salesforce)</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Meta & Google Ads Offline Conversion CAPI Sync</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Automated Calendar Scheduling (Cal.com / Calendly)</li>
            </ul>
          </div>
          <button class="trigger-book-demo btn-primary w-full text-xs justify-center py-2.5">Deploy Pipeline</button>
        </div>

        <!-- Enterprise Custom AI Infrastructure -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-sm">
          <div class="space-y-4">
            <span class="text-xs font-mono text-[#8B5CF6] uppercase font-bold">Enterprise Engine</span>
            <div class="text-3xl font-extrabold text-[#14151A] font-mono">
              <span class="service-price" data-inr="₹99,999+" data-usd="$2,399+" data-gbp="£1,899+">₹99,999+</span>
              <span class="text-xs text-[#5B5F6B] font-normal">/setup</span>
            </div>
            <ul class="space-y-2.5 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Multi-Brand / Multi-Location Omnichannel Mesh</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Custom RAG Vector Database & Fine-Tuned LLM</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Voice AI Call Agent Integration & Transcription</li>
              <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A]"></i> Dedicated Automation Engineer & 24/7 SLA</li>
            </ul>
          </div>
          <a href="../contact.php" class="btn-secondary w-full text-xs justify-center py-2.5">Custom Scope</a>
        </div>
      </div>

      <!-- What you always get -->
      <div class="bg-[#F8FAFC] border border-[#E4E7EC] p-6 rounded-xl text-center max-w-3xl mx-auto">
        <p class="text-xs sm:text-sm text-[#14151A] font-medium">
          <strong>What you always get:</strong> full self-hosted workflow ownership, zero locked-in proprietary tools, clear documentation, and 30 days of post-deployment fine-tuning.
        </p>
      </div>
    </section>

    <!-- 9.5. SECTION — Tools & AI We Use for AI Digital Marketing -->
    <?php 
    $current_stack_key = 'ai-marketing';
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
            <span>What is AI digital marketing?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            AI digital marketing is the application of artificial intelligence, machine learning, and automated workflow engines to streamline marketing operations — including instant lead qualification, personalized multi-channel follow-ups, predictive customer scoring, and automated campaign optimization.
          </div>
        </div>

        <!-- Q2 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What is n8n and why is it better than Zapier or Make?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            n8n is an open-source, enterprise-grade workflow automation platform that can be self-hosted. Unlike cloud tools like Zapier or Make with restrictive per-step pricing, n8n offers unlimited workflow executions, native AI agent nodes, total data privacy, and direct database integration at a fraction of the cost.
          </div>
        </div>

        <!-- Q3 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How fast can an AI workflow respond to incoming leads?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Our automated pipelines trigger responses in under 60 seconds across WhatsApp, SMS, and email the moment a prospect submits a web form or clicks a Facebook/Google lead ad, capturing prospect interest at peak buying intent.
          </div>
        </div>

        <!-- Q4 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Can AI qualify leads before booking sales calls?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Yes. AI conversational agents can ask qualifying questions regarding budget, timeline, location, and specific requirements, route high-priority leads directly to your calendar, and tag or nurture lower-intent prospects automatically.
          </div>
        </div>

        <!-- Q5 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Will AI send generic, robotic-sounding messages?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            No. We fine-tune LLMs with custom system prompts, your brand's unique tone of voice, past customer conversational data, and dynamic variables (name, company, specific service requested) so every message reads naturally and human.
          </div>
        </div>

        <!-- Q6 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Does this integrate with our existing CRM and WhatsApp?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Yes. We connect with all major CRMs (HubSpot, Zoho, Salesforce, Pipedrive, Google Sheets) and official WhatsApp Business Cloud APIs to ensure two-way data synchronization with zero manual copy-pasting.
          </div>
        </div>

        <!-- Q7 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How much does AI marketing automation cost?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Costs depend on the number of automated workflows, CRM integrations, AI agent logic, and self-hosted infrastructure requirements. We offer transparent starter and enterprise packages with fixed implementation scopes.
          </div>
        </div>

        <!-- Q8 -->
        <div class="faq-item card-dark p-6 cursor-pointer bg-[#F8FAFC] border border-[#E4E7EC] rounded-xl transition-all">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Who owns the automation workflows and data?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            You retain 100% ownership of all n8n workflows, prompt templates, API configurations, and customer database records. Everything runs on your dedicated cloud servers with no proprietary vendor lock-in.
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
          Stop losing qualified leads to slow response times
        </h2>
        <p class="text-sm sm:text-base text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed">
          Digital4Local designs, builds, and deploys autonomous AI marketing pipelines for businesses across India. Get an honest audit of your current lead funnel and see what automation can unlock.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4">
          <button class="trigger-book-demo btn-primary text-sm px-8 py-3.5 shadow-lg font-bold">
            <i data-lucide="cpu" class="w-4 h-4"></i> Get a free automation audit
          </button>
        </div>
      </div>
    </section>

  </main>

  <?php include_once '../includes/footer.php'; ?>
</body>
</html>
