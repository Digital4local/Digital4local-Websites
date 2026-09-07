<?php
/**
 * Global Tech & AI Tools Stack Component
 * Displays verified industry-recognised platforms and AI models used by Digital4Local
 */

// Determine base path for assets depending on root or subfolder execution
$is_subfolder = (strpos($_SERVER['SCRIPT_NAME'] ?? '', '/services/') !== false || strpos($_SERVER['SCRIPT_NAME'] ?? '', '/industries/') !== false || strpos($_SERVER['SCRIPT_NAME'] ?? '', '/blog/') !== false);
$tools_base = $is_subfolder ? '../assets/images/tools/' : 'assets/images/tools/';

// Page key passed from parent page (defaults to 'home')
$current_stack_key = $current_stack_key ?? 'home';

$stacks_data = [
    'home' => [
        'badge' => 'POWERED BY ENTERPRISE PLATFORMS & FRONTIER AI',
        'title' => 'Tools & AI We Use',
        'subtitle' => 'Our Trusted Tech & AI Stack',
        'description' => 'We combine cutting-edge frontier AI reasoning models with battle-tested enterprise analytics, search intelligence engines, and automated webhook pipelines to guarantee verifiable performance.',
        'tools' => [
            ['name' => 'Claude 3.5', 'category' => 'Generative Reasoning', 'file' => 'claude.svg', 'color' => '#D97706'],
            ['name' => 'ChatGPT / GPT-4o', 'category' => 'Frontier LLM Engine', 'file' => 'chatgpt.svg', 'color' => '#10A37F'],
            ['name' => 'Semrush', 'category' => 'Competitive Intelligence', 'file' => 'semrush.svg', 'color' => '#FF642D'],
            ['name' => 'Ahrefs', 'category' => 'Backlinks & Gap Analysis', 'file' => 'ahrefs.svg', 'color' => '#0062FF'],
            ['name' => 'Google Business', 'category' => 'Local Search Authority', 'file' => 'google-business.svg', 'color' => '#4285F4'],
            ['name' => 'Google Analytics 4', 'category' => 'Conversion Tracking', 'file' => 'ga4.svg', 'color' => '#E37400'],
            ['name' => 'Search Console', 'category' => 'Indexation & Health', 'file' => 'gsc.svg', 'color' => '#4285F4'],
            ['name' => 'n8n Workflows', 'category' => 'AI Agent Automation', 'file' => 'n8n.svg', 'color' => '#EA4B71'],
            ['name' => 'Make.com', 'category' => 'Webhook & CRM Pipelines', 'file' => 'make.svg', 'color' => '#6D3AEC'],
            ['name' => 'Canva Enterprise', 'category' => 'Visual Asset Production', 'file' => 'canva.svg', 'color' => '#00C4CC']
        ]
    ],
    'local-seo' => [
        'badge' => 'LOCAL SEARCH & GEOGRID DIAGNOSTICS',
        'title' => 'Tools & AI We Use for Local SEO',
        'subtitle' => 'Specialist Local Authority & Ranking Stack',
        'description' => 'Precision geogrid rank tracking, multi-location citation syndication, review velocity automation, and localized entity relevance modeling.',
        'tools' => [
            ['name' => 'Google Business', 'category' => 'Core Local Hub', 'file' => 'google-business.svg', 'color' => '#4285F4'],
            ['name' => 'BrightLocal', 'category' => 'Citation & Audit Engine', 'file' => 'brightlocal.svg', 'color' => '#00C853'],
            ['name' => 'Whitespark', 'category' => 'Local Citation Builder', 'file' => 'whitespark.svg', 'color' => '#D32F2F'],
            ['name' => 'Local Falcon', 'category' => 'Geogrid Map Rank Tracker', 'file' => 'localfalcon.svg', 'color' => '#FF9800'],
            ['name' => 'Moz Local', 'category' => 'Directory Aggregation', 'file' => 'moz.svg', 'color' => '#0096D6'],
            ['name' => 'Google Analytics 4', 'category' => 'Call & Form Analytics', 'file' => 'ga4.svg', 'color' => '#E37400'],
            ['name' => 'Search Console', 'category' => 'Local Query Performance', 'file' => 'gsc.svg', 'color' => '#4285F4'],
            ['name' => 'Claude AI', 'category' => 'Geo-targeted Copy Engine', 'file' => 'claude.svg', 'color' => '#D97706'],
            ['name' => 'ChatGPT Plus', 'category' => 'Review Response & FAQs', 'file' => 'chatgpt.svg', 'color' => '#10A37F']
        ]
    ],
    'geo-aeo' => [
        'badge' => 'GENERATIVE ENGINE & ANSWER EXTRACTION',
        'title' => 'Tools & AI We Use for SEO, GEO & AEO',
        'subtitle' => 'AI Citation Verification & Entity Synthesis Stack',
        'description' => 'Engineered for citation verification and factual answer extraction across ChatGPT, Perplexity, Gemini, Claude, and Google AI Overviews.',
        'tools' => [
            ['name' => 'Perplexity AI', 'category' => 'Citation Tracking & Probing', 'file' => 'perplexity.svg', 'color' => '#20B2AA'],
            ['name' => 'Claude 3.5', 'category' => 'Direct Answer Synthesis', 'file' => 'claude.svg', 'color' => '#D97706'],
            ['name' => 'ChatGPT / GPT-4o', 'category' => 'Entity Association Probing', 'file' => 'chatgpt.svg', 'color' => '#10A37F'],
            ['name' => 'Google Gemini', 'category' => 'AI Overview Verification', 'file' => 'gemini.svg', 'color' => '#8E75FF'],
            ['name' => 'Profound AI', 'category' => 'Generative Engine Analytics', 'file' => 'profound.svg', 'color' => '#6366F1'],
            ['name' => 'Surfer SEO', 'category' => 'Information Density Auditing', 'file' => 'surfer.svg', 'color' => '#FF5722'],
            ['name' => 'Semrush', 'category' => 'SERP AI Overview Tracking', 'file' => 'semrush.svg', 'color' => '#FF642D'],
            ['name' => 'Ahrefs', 'category' => 'Brand Mention & Entity Mesh', 'file' => 'ahrefs.svg', 'color' => '#0062FF'],
            ['name' => 'Screaming Frog', 'category' => 'JSON-LD Schema Validation', 'file' => 'screamingfrog.svg', 'color' => '#00843D'],
            ['name' => 'Search Console', 'category' => 'AI Overview Query Tracking', 'file' => 'gsc.svg', 'color' => '#4285F4']
        ]
    ],
    'technical-seo' => [
        'badge' => 'CRAWLABILITY, SPEED & ARCHITECTURE',
        'title' => 'Tools & AI We Use for Technical SEO',
        'subtitle' => 'Site Speed, Core Web Vitals & Code Health Stack',
        'description' => 'Enterprise-grade crawlers, Core Web Vitals profilers, structured data linters, edge CDN routing, and server log analysis.',
        'tools' => [
            ['name' => 'Screaming Frog', 'category' => 'Deep Site Crawler', 'file' => 'screamingfrog.svg', 'color' => '#00843D'],
            ['name' => 'Sitebulb', 'category' => 'Architecture & Visual Auditing', 'file' => 'sitebulb.svg', 'color' => '#6B21A8'],
            ['name' => 'PageSpeed Insights', 'category' => 'Core Web Vitals Profiler', 'file' => 'pagespeed.svg', 'color' => '#F44B21'],
            ['name' => 'Search Console', 'category' => 'Indexation & Coverage Logs', 'file' => 'gsc.svg', 'color' => '#4285F4'],
            ['name' => 'Ahrefs Webmaster', 'category' => 'Broken Links & Cannibalization', 'file' => 'ahrefs.svg', 'color' => '#0062FF'],
            ['name' => 'Semrush Site Audit', 'category' => 'HTTPS & Technical Health', 'file' => 'semrush.svg', 'color' => '#FF642D'],
            ['name' => 'Cloudflare', 'category' => 'Edge Caching & Security', 'file' => 'cloudflare.svg', 'color' => '#F38020'],
            ['name' => 'Claude AI', 'category' => 'Schema & Regex Automation', 'file' => 'claude.svg', 'color' => '#D97706']
        ]
    ],
    'link-building-pr' => [
        'badge' => 'AUTHORITY & MEDIA PROSPECTING',
        'title' => 'Tools & AI We Use for Link Building & PR',
        'subtitle' => 'Media Query Monitoring, Pitching & Authority Acquisition',
        'description' => 'Real-time media query monitoring, journalist relationship management, backlink equity analysis, and earned coverage tracking.',
        'tools' => [
            ['name' => 'Ahrefs', 'category' => 'Domain Authority & Link Gap', 'file' => 'ahrefs.svg', 'color' => '#0062FF'],
            ['name' => 'Semrush', 'category' => 'Competitive Backlink Audits', 'file' => 'semrush.svg', 'color' => '#FF642D'],
            ['name' => 'Connectively / HARO', 'category' => 'Journalist Query Sourcing', 'file' => 'connectively.svg', 'color' => '#0284C7'],
            ['name' => 'Google News', 'category' => 'Media Monitoring & Trends', 'file' => 'googlenews.svg', 'color' => '#4285F4'],
            ['name' => 'Moz Link Explorer', 'category' => 'Spam Score & Link Equity', 'file' => 'moz.svg', 'color' => '#0096D6'],
            ['name' => 'Majestic SEO', 'category' => 'Trust Flow & Topical Equity', 'file' => 'majestic.svg', 'color' => '#B91C1C'],
            ['name' => 'Claude AI', 'category' => 'Journalist Pitch Customizer', 'file' => 'claude.svg', 'color' => '#D97706'],
            ['name' => 'ChatGPT Plus', 'category' => 'Data Story Angle Synthesis', 'file' => 'chatgpt.svg', 'color' => '#10A37F']
        ]
    ],
    'ai-marketing' => [
        'badge' => 'AGENTIC WORKFLOWS & LLM AUTOMATION',
        'title' => 'Tools & AI We Use for AI Digital Marketing',
        'subtitle' => 'Frontier LLMs, Multi-System Pipelines & Autonomous Agents',
        'description' => 'Self-healing automation pipelines, sub-60-second lead routing, multi-agent generative workflows, and CRM synchronizers.',
        'tools' => [
            ['name' => 'Claude 3.5', 'category' => 'Autonomous Agent Reasoning', 'file' => 'claude.svg', 'color' => '#D97706'],
            ['name' => 'ChatGPT / GPT-4o', 'category' => 'Natural Language Automation', 'file' => 'chatgpt.svg', 'color' => '#10A37F'],
            ['name' => 'n8n Self-Hosted', 'category' => 'Node-based AI Agent Engine', 'file' => 'n8n.svg', 'color' => '#EA4B71'],
            ['name' => 'Make.com', 'category' => 'Webhook & Cloud Pipelines', 'file' => 'make.svg', 'color' => '#6D3AEC'],
            ['name' => 'Zapier', 'category' => 'Instant App Integrations', 'file' => 'zapier.svg', 'color' => '#FF4A00'],
            ['name' => 'Perplexity Pro', 'category' => 'Real-Time Market Research', 'file' => 'perplexity.svg', 'color' => '#20B2AA'],
            ['name' => 'Canva AI', 'category' => 'Generative Brand Graphics', 'file' => 'canva.svg', 'color' => '#00C4CC'],
            ['name' => 'Midjourney v6', 'category' => 'High-Fidelity Visual Generation', 'file' => 'midjourney.svg', 'color' => '#1E293B'],
            ['name' => 'HubSpot AI', 'category' => 'CRM & Lead Scoring Intelligence', 'file' => 'hubspot.svg', 'color' => '#FF7A59']
        ]
    ],
    'social-media' => [
        'badge' => 'CREATIVE PRODUCTION & ENGAGEMENT',
        'title' => 'Tools & AI We Use for Social Media',
        'subtitle' => 'Visual Production, Scheduling & Audience Intelligence',
        'description' => 'High-impact visual creative production, algorithmic scheduling, engagement monitoring, and hyper-local audience analytics.',
        'tools' => [
            ['name' => 'Canva Enterprise', 'category' => 'Carousel & Banner Design', 'file' => 'canva.svg', 'color' => '#00C4CC'],
            ['name' => 'Meta Business', 'category' => 'FB & IG Ad / Post Operations', 'file' => 'meta.svg', 'color' => '#0668E1'],
            ['name' => 'ChatGPT', 'category' => 'Hook Writing & Scripting', 'file' => 'chatgpt.svg', 'color' => '#10A37F'],
            ['name' => 'Claude AI', 'category' => 'Content Repurposing & Threads', 'file' => 'claude.svg', 'color' => '#D97706'],
            ['name' => 'Later', 'category' => 'Visual Grid Scheduling', 'file' => 'later.svg', 'color' => '#FF4B72'],
            ['name' => 'Buffer', 'category' => 'Multi-Platform Publishing', 'file' => 'buffer.svg', 'color' => '#231F20'],
            ['name' => 'CapCut Pro', 'category' => 'Reels & Shorts Video Editing', 'file' => 'capcut.svg', 'color' => '#000000'],
            ['name' => 'Sprout Social', 'category' => 'Social Listening & Reporting', 'file' => 'sproutsocial.svg', 'color' => '#2BB673']
        ]
    ],
    'web-development' => [
        'badge' => 'HIGH-PERFORMANCE CMS & CLOUD STACK',
        'title' => 'Tools & AI We Use for Web Development',
        'subtitle' => 'Semantic Architecture, UI/UX & Cloud Deployment',
        'description' => 'Clean-code semantic architecture, sub-second TTFB, responsive design systems, and automated cloud deployments.',
        'tools' => [
            ['name' => 'WordPress', 'category' => 'Scalable CMS Architecture', 'file' => 'wordpress.svg', 'color' => '#21759B'],
            ['name' => 'Elementor Pro', 'category' => 'Visual Page Builder', 'file' => 'elementor.svg', 'color' => '#92003B'],
            ['name' => 'Webflow', 'category' => 'Custom Interactions & HTML', 'file' => 'webflow.svg', 'color' => '#146EF5'],
            ['name' => 'Figma', 'category' => 'UI/UX Prototypes & Tokens', 'file' => 'figma.svg', 'color' => '#F24E1E'],
            ['name' => 'GitHub', 'category' => 'CI/CD & Version Control', 'file' => 'github.svg', 'color' => '#181717'],
            ['name' => 'Vercel', 'category' => 'Edge Hosting & Next.js Builds', 'file' => 'vercel.svg', 'color' => '#000000'],
            ['name' => 'Cloudflare', 'category' => 'Global CDN & DDoS Defense', 'file' => 'cloudflare.svg', 'color' => '#F38020'],
            ['name' => 'PageSpeed Insights', 'category' => 'Core Web Vitals Benchmarking', 'file' => 'pagespeed.svg', 'color' => '#F44B21']
        ]
    ],
    'app-development' => [
        'badge' => 'MOBILE ENGINEERING & API ARCHITECTURE',
        'title' => 'Tools & AI We Use for App Development',
        'subtitle' => 'Native & Cross-Platform Mobile Engineering Stack',
        'description' => 'iOS & Android multi-platform frameworks, secure cloud backends, API testing, and automated store deployments.',
        'tools' => [
            ['name' => 'Figma', 'category' => 'Mobile UX & Design Systems', 'file' => 'figma.svg', 'color' => '#F24E1E'],
            ['name' => 'Flutter', 'category' => 'Cross-Platform Dart Engine', 'file' => 'flutter.svg', 'color' => '#02569B'],
            ['name' => 'React Native', 'category' => 'Native JS Mobile Architecture', 'file' => 'react.svg', 'color' => '#61DAFB'],
            ['name' => 'Firebase', 'category' => 'Auth, Realtime DB & Push', 'file' => 'firebase.svg', 'color' => '#FFCA28'],
            ['name' => 'GitHub', 'category' => 'Git Workflows & Fastlane CI', 'file' => 'github.svg', 'color' => '#181717'],
            ['name' => 'Apple Developer', 'category' => 'App Store Connect & TestFlight', 'file' => 'apple.svg', 'color' => '#000000'],
            ['name' => 'Google Play', 'category' => 'Android Release & App Bundles', 'file' => 'googleplay.svg', 'color' => '#414141'],
            ['name' => 'Postman', 'category' => 'REST & GraphQL API Testing', 'file' => 'postman.svg', 'color' => '#FF6C37']
        ]
    ]
];

$active_stack = $stacks_data[$current_stack_key] ?? $stacks_data['home'];
?>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-24" data-aos="fade-up">
  
  <!-- Section Heading -->
  <div class="text-center space-y-4 max-w-3xl mx-auto mb-14 sm:mb-16">
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1B5FAA]/10 border border-[#1B5FAA]/20 text-[#1B5FAA] text-xs font-mono font-bold tracking-wider uppercase">
      <span class="w-2 h-2 rounded-full bg-[#00B4D8] animate-pulse"></span>
      <?php echo htmlspecialchars($active_stack['badge']); ?>
    </div>
    
    <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#14151A] tracking-tight font-['Montserrat',sans-serif]">
      <?php echo htmlspecialchars($active_stack['title']); ?>
    </h2>
    
    <p class="text-base sm:text-lg text-[#5B5F6B] font-['Inter',sans-serif] leading-relaxed">
      <?php echo htmlspecialchars($active_stack['description']); ?>
    </p>
  </div>

  <!-- Tools Grid (Centered Flex Wrap — Incomplete Rows are Automatically Centered) -->
  <div class="flex flex-wrap items-stretch justify-center gap-4 sm:gap-6 max-w-7xl mx-auto">
    <?php foreach ($active_stack['tools'] as $tool): ?>
    <div class="bg-white border border-[#E2E8F0] rounded-2xl p-5 sm:p-6 shadow-[0_2px_8px_rgba(0,0,0,0.04)] hover:shadow-[0_12px_24px_rgba(27,95,170,0.12)] hover:border-[#00B4D8] hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-center justify-center text-center group min-h-[140px] sm:min-h-[160px] w-[calc(50%-12px)] sm:w-[calc(33.333%-16px)] md:w-[calc(25%-18px)] lg:w-[calc(20%-20px)] max-w-[240px] min-w-[170px]">
      
      <!-- Tool Icon Container -->
      <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl flex items-center justify-center mb-3.5 group-hover:scale-110 transition-transform duration-300">
        <img 
          src="<?php echo $tools_base . $tool['file']; ?>" 
          alt="<?php echo htmlspecialchars($tool['name']); ?>" 
          class="w-10 h-10 sm:w-11 sm:h-11 object-contain"
          loading="lazy"
        />
      </div>

      <!-- Tool Name -->
      <h3 class="text-sm sm:text-base font-bold text-[#14151A] font-['Montserrat',sans-serif] tracking-tight group-hover:text-[#1B5FAA] transition-colors">
        <?php echo htmlspecialchars($tool['name']); ?>
      </h3>

      <!-- Tool Category / Purpose -->
      <span class="text-[11px] sm:text-xs text-[#64748B] font-['Inter',sans-serif] mt-1 line-clamp-1">
        <?php echo htmlspecialchars($tool['category']); ?>
      </span>

    </div>
    <?php endforeach; ?>
  </div>

  <!-- Credibility Assurance Strip -->
  <div class="mt-10 text-center">
    <div class="inline-flex flex-wrap items-center justify-center gap-4 text-xs font-mono text-[#5B5F6B] bg-[#F8FAFC] border border-[#E2E8F0] px-5 py-2.5 rounded-full">
      <span class="flex items-center gap-1.5 font-bold text-[#1B5FAA]">
        <svg class="w-4 h-4 text-[#5A9E2F]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        Direct API Integrations
      </span>
      <span class="text-[#CBD5E1]">·</span>
      <span class="flex items-center gap-1.5 font-bold text-[#1B5FAA]">
        <svg class="w-4 h-4 text-[#5A9E2F]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        Enterprise-Tier Subscriptions
      </span>
      <span class="text-[#CBD5E1]">·</span>
      <span class="flex items-center gap-1.5 font-bold text-[#1B5FAA]">
        <svg class="w-4 h-4 text-[#5A9E2F]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        100% White-Hat Verified Execution
      </span>
    </div>
  </div>

</section>
