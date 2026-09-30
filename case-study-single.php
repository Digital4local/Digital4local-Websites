<?php
/**
 * Digital4Local - Dedicated Case Study Detail Page
 * Dynamic Route: /case-studies/[slug]
 * Strict Content Rule: Verified metrics and facts only. Zero placeholders.
 */

require_once __DIR__ . '/includes/site-config.php';
$p_cfg = require __DIR__ . '/config/portfolio-config.php';
$case_studies = require __DIR__ . '/config/case-studies-data.php';

$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
$slug = preg_replace('/\.php$/', '', $slug);

// Handle fallback / 404
if (empty($slug) || !isset($case_studies[$slug])) {
    http_response_code(404);
    $page_title = "Case Study Not Found | Digital4Local";
    $page_description = "The requested case study could not be found.";
    include __DIR__ . '/includes/seo.php';
    include __DIR__ . '/includes/header.php';
    echo '<main class="min-h-[60vh] flex flex-col items-center justify-center pt-32 pb-24 text-center px-4">';
    echo '<h1 class="text-4xl font-extrabold text-[#14151A] mb-4">Case Study Not Found</h1>';
    echo '<p class="text-slate-600 mb-8 max-w-md">The case study you are looking for has been moved or does not exist.</p>';
    echo '<a href="/case-studies" class="btn-primary"><span>View All Case Studies</span></a>';
    echo '</main>';
    include __DIR__ . '/includes/footer.php';
    exit;
}

$cs = $case_studies[$slug];
$clean_phone = $p_cfg['whatsapp_number_clean'];
$base_path = function_exists('get_base_path') ? get_base_path() : '/';

// Dynamic SEO tags
$page_title = $cs['meta_title'];
$page_description = $cs['meta_description'];
$canonical_url = "https://digital4local.com/case-studies/" . $cs['slug'];
$og_image = "https://digital4local.com/" . ltrim($cs['og_image'], '/');

// Next & Previous Navigation Keys
$keys = array_keys($case_studies);
$current_index = array_search($slug, $keys);
$prev_slug = $keys[($current_index - 1 + count($keys)) % count($keys)];
$next_slug = $keys[($current_index + 1) % count($keys)];
$prev_cs = $case_studies[$prev_slug];
$next_cs = $case_studies[$next_slug];

$wa_cta_url = "https://wa.me/{$clean_phone}?text=" . urlencode($cs['whatsapp_cta_msg']);
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <?php include_once __DIR__ . '/includes/seo.php'; ?>

  <!-- JSON-LD Article & Breadcrumb Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Article",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "<?php echo $canonical_url; ?>"
    },
    "headline": "<?php echo addslashes($cs['headline']); ?>",
    "description": "<?php echo addslashes($cs['meta_description']); ?>",
    "image": "<?php echo $og_image; ?>",
    "author": {
      "@type": "Person",
      "name": "Abhishek Raikwar",
      "jobTitle": "Founder & Growth Strategist",
      "url": "https://digital4local.com/about.php"
    },
    "publisher": {
      "@type": "Organization",
      "name": "Digital4Local",
      "url": "https://digital4local.com/",
      "logo": {
        "@type": "ImageObject",
        "url": "https://digital4local.com/assets/images/digital4local_logo.png"
      }
    },
    "datePublished": "2025-06-01T08:00:00+05:30",
    "dateModified": "2026-09-30T12:00:00+05:30"
  }
  </script>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "https://digital4local.com/"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "Case Studies",
        "item": "https://digital4local.com/case-studies"
      },
      {
        "@type": "ListItem",
        "position": 3,
        "name": "<?php echo addslashes($cs['short_name']); ?>",
        "item": "<?php echo $canonical_url; ?>"
      }
    ]
  }
  </script>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] font-sans antialiased selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <!-- Header -->
  <?php include __DIR__ . '/includes/header.php'; ?>

  <main class="relative z-10 pt-24 sm:pt-32 pb-24">
    
    <!-- 1. Hero Section -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-12 text-left" data-aos="fade-up">
      
      <!-- Breadcrumb Navigation -->
      <nav class="flex items-center gap-2 text-xs font-semibold text-[#5B5F6B] mb-6" aria-label="Breadcrumb">
        <a href="<?php echo $base_path; ?>" class="hover:text-[#00A8B5] transition-colors">Home</a>
        <span>/</span>
        <a href="<?php echo $base_path; ?>case-studies" class="hover:text-[#00A8B5] transition-colors">Case Studies</a>
        <span>/</span>
        <span class="text-[#14151A] truncate max-w-xs"><?php echo htmlspecialchars($cs['short_name']); ?></span>
      </nav>

      <!-- Client Pill Badge (Styled Wordmark) + Meta Badges -->
      <div class="flex flex-wrap items-center gap-3 mb-6">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-[#14151A] text-white text-xs font-bold shadow-sm">
          <span class="w-2 h-2 rounded-full bg-[#00F0FF]"></span>
          <span><?php echo htmlspecialchars($cs['short_name']); ?></span>
        </div>
        <span class="px-3.5 py-1.5 rounded-full text-xs font-black uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30">
          <?php echo htmlspecialchars($cs['industry']); ?>
        </span>
        <span class="px-3 py-1.5 rounded-full text-xs font-bold bg-[#F6F8FB] text-[#5B5F6B] border border-[#E4E7EC]">
          <?php echo $cs['flag']; ?> <?php echo htmlspecialchars($cs['location']); ?>
        </span>
        <span class="text-xs font-semibold text-[#5B5F6B] py-1">
          Timeline: <strong class="text-[#14151A]"><?php echo htmlspecialchars($cs['timeline']); ?></strong>
        </span>
      </div>

      <!-- Outcome Headline -->
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#14151A] tracking-tight font-display mb-6 leading-tight">
        <?php echo htmlspecialchars($cs['headline']); ?>
      </h1>

      <p class="text-base sm:text-lg text-[#5B5F6B] leading-relaxed mb-8 max-w-4xl">
        Client: <strong class="text-[#14151A]"><?php echo htmlspecialchars($cs['client_name']); ?></strong>
      </p>

      <!-- 3 Headline Stat Chips -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
        <?php foreach ($cs['stats_headline'] as $stat): ?>
          <div class="bg-[#F6F8FB] border-2 border-[#E4E7EC] p-5 rounded-2xl">
            <div class="text-[10px] text-[#5B5F6B] uppercase font-bold tracking-wider mb-1">
              <?php echo htmlspecialchars($stat['label']); ?>
            </div>
            <div class="text-2xl sm:text-3xl font-black text-[#008A94] mb-1">
              <?php echo htmlspecialchars($stat['value']); ?>
            </div>
            <div class="text-xs text-[#5B5F6B] font-medium">
              <?php echo htmlspecialchars($stat['sub']); ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </section>

    <!-- 2. Snapshot Bar -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-16" data-aos="fade-up">
      <div class="bg-[#14151A] text-white rounded-2xl p-6 sm:p-7 shadow-xl grid grid-cols-2 sm:grid-cols-5 gap-4 text-xs">
        <div>
          <span class="text-slate-400 block uppercase font-bold text-[10px] mb-1">Client</span>
          <span class="font-bold text-white"><?php echo htmlspecialchars($cs['short_name']); ?></span>
        </div>
        <div>
          <span class="text-slate-400 block uppercase font-bold text-[10px] mb-1">Industry</span>
          <span class="font-bold text-white"><?php echo htmlspecialchars($cs['industry']); ?></span>
        </div>
        <div>
          <span class="text-slate-400 block uppercase font-bold text-[10px] mb-1">Location</span>
          <span class="font-bold text-white"><?php echo htmlspecialchars($cs['location']); ?></span>
        </div>
        <div>
          <span class="text-slate-400 block uppercase font-bold text-[10px] mb-1">Duration</span>
          <span class="font-bold text-[#00F0FF]"><?php echo htmlspecialchars($cs['timeline']); ?></span>
        </div>
        <div class="col-span-2 sm:col-span-1">
          <span class="text-slate-400 block uppercase font-bold text-[10px] mb-1">Primary Scope</span>
          <span class="font-bold text-emerald-400">SEO, Maps & AI</span>
        </div>
      </div>
    </section>

    <!-- 3. The Challenge Section -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-16" data-aos="fade-up">
      <div class="bg-[#FFFFFF] border-2 border-[#E4E7EC] rounded-3xl p-8 sm:p-10 shadow-sm">
        
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-red-100 text-red-700 border border-red-200 mb-4">
          <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i>
          <span>The Bottleneck</span>
        </div>

        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight font-display mb-6">
          The Challenge
        </h2>

        <div class="space-y-4 text-sm sm:text-base text-[#5B5F6B] leading-relaxed">
          <?php foreach ($cs['challenge'] as $para): ?>
            <div class="flex items-start gap-3">
              <span class="w-5 h-5 rounded-full bg-red-50 text-red-600 flex items-center justify-center shrink-0 mt-0.5 text-xs font-black">
                ✕
              </span>
              <p><?php echo htmlspecialchars($para); ?></p>
            </div>
          <?php endforeach; ?>
        </div>

        <?php if (!empty($cs['institutions'])): ?>
          <!-- Sub-Institution Breakdown for Higher Education Group -->
          <div class="mt-8 pt-6 border-t border-[#E4E7EC]">
            <h3 class="text-xs font-bold uppercase tracking-wider text-[#14151A] mb-4">
              Campuses & Universities in Scope:
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
              <?php foreach ($cs['institutions'] as $inst): ?>
                <div class="bg-[#F6F8FB] p-4 rounded-xl border border-[#E4E7EC]">
                  <h4 class="font-bold text-xs text-[#14151A] mb-1"><?php echo htmlspecialchars($inst['name']); ?></h4>
                  <p class="text-[11px] text-[#5B5F6B] leading-relaxed"><?php echo htmlspecialchars($inst['focus']); ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

      </div>
    </section>

    <!-- 4. Our Strategy (4-Step Growth System Timeline) -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-16" data-aos="fade-up">
      <div class="bg-[#F6F8FB] border-2 border-[#E4E7EC] rounded-3xl p-8 sm:p-10 shadow-sm">
        
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30 mb-4">
          <i data-lucide="compass" class="w-3.5 h-3.5"></i>
          <span>Strategic Framework</span>
        </div>

        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight font-display mb-8">
          Our Strategy: The D4L Local Growth System™
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <?php foreach ($cs['strategy_steps'] as $idx => $step): ?>
            <div class="bg-white p-6 rounded-2xl border border-[#E4E7EC] shadow-sm flex flex-col justify-between">
              <div>
                <span class="text-xs font-black uppercase tracking-wider text-[#008A94] mb-1 block">
                  <?php echo htmlspecialchars($step['phase']); ?>
                </span>
                <h3 class="text-lg font-bold text-[#14151A] mb-2">
                  <?php echo htmlspecialchars($step['title']); ?>
                </h3>
                <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed">
                  <?php echo htmlspecialchars($step['desc']); ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </section>

    <!-- 5. What We Did (Service Execution Cards) -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-16" data-aos="fade-up">
      <div class="mb-8 text-left">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30 mb-3">
          <i data-lucide="layers" class="w-3.5 h-3.5"></i>
          <span>Execution Scope</span>
        </div>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight font-display">
          What We Did
        </h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($cs['what_we_did'] as $srv): ?>
          <div class="bg-[#FFFFFF] border-2 border-[#E4E7EC] rounded-2xl p-6 shadow-sm hover:border-[#00A8B5] transition-all">
            <div class="w-10 h-10 rounded-xl bg-[#00F0FF]/20 text-[#008A94] flex items-center justify-center mb-4 font-bold">
              <i data-lucide="<?php echo $srv['icon']; ?>" class="w-5 h-5"></i>
            </div>
            <h3 class="text-lg font-bold text-[#14151A] mb-3">
              <?php echo htmlspecialchars($srv['title']); ?>
            </h3>
            <ul class="space-y-2.5 text-xs sm:text-sm text-[#5B5F6B]">
              <?php foreach ($srv['bullets'] as $b): ?>
                <li class="flex items-start gap-2">
                  <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
                  <span><?php echo htmlspecialchars($b); ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- 6. The Results / Outcome Section -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-16" data-aos="fade-up">
      <div class="bg-gradient-to-br from-[#F6F8FB] via-[#FFFFFF] to-[#F6F8FB] border-2 border-[#16A34A] rounded-3xl p-8 sm:p-10 shadow-xl">
        
        <div class="flex flex-wrap items-center justify-between gap-3 mb-6">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#16A34A]/10 text-[#16A34A] border border-[#16A34A]/30">
            <i data-lucide="trending-up" class="w-3.5 h-3.5"></i>
            <span>Verified Business Outcome</span>
          </div>
          
          <?php if (!empty($cs['has_ai_verified_result'])): ?>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-purple-100 text-purple-800 border border-purple-200">
              <i data-lucide="award" class="w-3.5 h-3.5 text-purple-600"></i>
              <span><?php echo htmlspecialchars($cs['ai_verified_text']); ?></span>
            </span>
          <?php endif; ?>
        </div>

        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight font-display mb-6">
          <?php echo ($cs['results_type'] === 'stats') ? 'The Results' : 'Business Outcome'; ?>
        </h2>

        <?php if ($cs['results_type'] === 'stats' && !empty($cs['results_metrics'])): ?>
          <!-- Stat Grid for Numeric Results -->
          <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <?php foreach ($cs['results_metrics'] as $rm): ?>
              <div class="bg-white p-6 rounded-2xl border border-[#E4E7EC] shadow-sm flex flex-col justify-between">
                <div class="text-[10px] uppercase font-bold text-[#5B5F6B] mb-2">
                  <?php echo htmlspecialchars($rm['label']); ?>
                </div>
                <div class="text-2xl sm:text-3xl font-black text-[#16A34A] my-2">
                  <?php echo htmlspecialchars($rm['value']); ?>
                </div>
                <div class="text-xs text-[#5B5F6B] font-medium">
                  <?php echo htmlspecialchars($rm['note']); ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

        <?php elseif ($cs['results_type'] === 'outcome'): ?>
          <!-- Qualitative Outcome Card + Deliverables Checklist -->
          <div class="bg-white border border-[#E4E7EC] rounded-2xl p-6 sm:p-8 mb-8 shadow-sm">
            <div class="text-xs font-black uppercase tracking-wider text-[#008A94] mb-2">
              Key Business Impact
            </div>
            <p class="text-xl sm:text-2xl font-extrabold text-[#14151A] leading-snug mb-6">
              "<?php echo htmlspecialchars($cs['outcome_summary']); ?>"
            </p>

            <div class="pt-6 border-t border-[#E4E7EC]">
              <div class="text-xs font-bold uppercase tracking-wider text-[#5B5F6B] mb-4">
                What We Delivered:
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <?php foreach ($cs['delivered_checklist'] as $item): ?>
                  <div class="flex items-start gap-2.5 text-xs sm:text-sm text-[#14151A]">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
                    <span><?php echo htmlspecialchars($item); ?></span>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <!-- Results Narrative Paragraph -->
        <p class="text-sm sm:text-base text-[#14151A] leading-relaxed font-medium">
          <?php echo htmlspecialchars($cs['results_narrative']); ?>
        </p>

      </div>
    </section>

    <!-- 7. AI Search Strategy Block ("Built to be found on AI search") -->
    <?php $ai = $cs['ai_search_visibility']; ?>
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-16" data-aos="fade-up">
      <div class="bg-gradient-to-br from-[#0F172A] via-[#1E293B] to-[#0F172A] text-white rounded-3xl p-8 sm:p-10 shadow-2xl border-2 border-[#00F0FF]/30">
        
        <!-- Header & Engine Badges -->
        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
          <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-black uppercase tracking-wider bg-[#00F0FF] text-[#14151A]">
            <i data-lucide="bot" class="w-3.5 h-3.5"></i>
            <span>AI Search Strategy</span>
          </div>

          <!-- Verified badge for SolarForYou if applicable -->
          <?php if (!empty($cs['has_ai_verified_result'])): ?>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-[#16A34A]/20 text-[#4ADE80] border border-[#16A34A]/40">
              <i data-lucide="check-circle" class="w-3.5 h-3.5"></i>
              <span>Ranking in AI search within 6 months</span>
            </span>
          <?php endif; ?>
        </div>

        <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight mb-3">
          Built to be found on AI search
        </h2>

        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-6 max-w-3xl">
          We ensure <?php echo htmlspecialchars($cs['short_name']); ?> is structured, cited, and recommended when prospective customers ask conversational AI engines for recommendations.
        </p>

        <!-- AI Engine Badges Bar -->
        <div class="flex flex-wrap items-center gap-2 sm:gap-3 mb-8">
          <span class="text-xs font-bold text-slate-400 mr-2">Optimized For:</span>
          <span class="px-3 py-1 rounded-full text-xs font-bold bg-white/10 text-white border border-white/15">ChatGPT</span>
          <span class="px-3 py-1 rounded-full text-xs font-bold bg-white/10 text-white border border-white/15">Google Gemini</span>
          <span class="px-3 py-1 rounded-full text-xs font-bold bg-white/10 text-white border border-white/15">Google AI Overviews</span>
          <span class="px-3 py-1 rounded-full text-xs font-bold bg-white/10 text-white border border-white/15">Perplexity</span>
          <span class="px-3 py-1 rounded-full text-xs font-bold bg-white/10 text-white border border-white/15">Microsoft Copilot</span>
        </div>

        <!-- Prompts We Optimised For -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-6 mb-8">
          <div class="text-xs font-black uppercase tracking-wider text-[#00F0FF] mb-4 flex items-center gap-2">
            <i data-lucide="message-square" class="w-4 h-4"></i>
            <span>Target Prompts We Optimised For:</span>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <?php foreach ($ai['prompts'] as $prompt): ?>
              <div class="bg-white/5 border border-white/10 p-3.5 rounded-xl text-xs text-slate-200 font-medium flex items-start gap-2.5">
                <span class="text-[#00F0FF] font-bold">“</span>
                <span class="leading-relaxed"><?php echo htmlspecialchars($prompt); ?></span>
                <span class="text-[#00F0FF] font-bold ml-auto">”</span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- How We Did It: 4 Core Pillars -->
        <div>
          <div class="text-xs font-black uppercase tracking-wider text-slate-300 mb-4">
            How We Optimize for AI Answer Engines:
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <div class="bg-white/5 border border-white/10 p-4 rounded-xl">
              <div class="w-8 h-8 rounded-lg bg-[#00F0FF]/15 text-[#00F0FF] flex items-center justify-center mb-3">
                <i data-lucide="network" class="w-4 h-4"></i>
              </div>
              <h4 class="text-xs font-bold text-white mb-1">Entity & Brand Building</h4>
              <p class="text-[11px] text-slate-400 leading-relaxed">
                Establishing authoritative entity signals across digital Knowledge Graphs.
              </p>
            </div>

            <div class="bg-white/5 border border-white/10 p-4 rounded-xl">
              <div class="w-8 h-8 rounded-lg bg-[#00F0FF]/15 text-[#00F0FF] flex items-center justify-center mb-3">
                <i data-lucide="database" class="w-4 h-4"></i>
              </div>
              <h4 class="text-xs font-bold text-white mb-1">Citations & Consistency</h4>
              <p class="text-[11px] text-slate-400 leading-relaxed">
                Ensuring complete NAP data alignment across high-trust business directories.
              </p>
            </div>

            <div class="bg-white/5 border border-white/10 p-4 rounded-xl">
              <div class="w-8 h-8 rounded-lg bg-[#00F0FF]/15 text-[#00F0FF] flex items-center justify-center mb-3">
                <i data-lucide="code" class="w-4 h-4"></i>
              </div>
              <h4 class="text-xs font-bold text-white mb-1">Structured Data & Schema</h4>
              <p class="text-[11px] text-slate-400 leading-relaxed">
                Deploying semantic JSON-LD so AI engines parse services & locations accurately.
              </p>
            </div>

            <div class="bg-white/5 border border-white/10 p-4 rounded-xl">
              <div class="w-8 h-8 rounded-lg bg-[#00F0FF]/15 text-[#00F0FF] flex items-center justify-center mb-3">
                <i data-lucide="help-circle" class="w-4 h-4"></i>
              </div>
              <h4 class="text-xs font-bold text-white mb-1">Answer-First FAQ Content</h4>
              <p class="text-[11px] text-slate-400 leading-relaxed">
                Writing question-first copy tailored for direct conversational AI synthesis.
              </p>
            </div>

          </div>
        </div>

      </div>
    </section>

    <!-- 8. Client Testimonial (Rendered ONLY when real quote exists) -->
    <?php if (!empty($cs['testimonial']) && !empty($cs['testimonial']['quote'])): ?>
      <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-16" data-aos="fade-up">
        <div class="bg-[#FFFFFF] border-2 border-amber-300 rounded-3xl p-8 sm:p-10 shadow-lg relative">
          
          <div class="flex items-center gap-1 text-amber-400 mb-4">
            <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
            <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
            <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
            <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
            <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
            <span class="text-xs font-bold text-[#14151A] ml-2">Verified Client Review</span>
          </div>

          <blockquote class="text-base sm:text-lg text-[#14151A] italic leading-relaxed mb-6">
            "<?php echo htmlspecialchars($cs['testimonial']['quote']); ?>"
          </blockquote>

          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#00F0FF] to-[#0284C7] text-white font-extrabold text-sm flex items-center justify-center shrink-0">
              <?php echo htmlspecialchars($cs['testimonial']['avatar_initial'] ?? 'C'); ?>
            </div>
            <div>
              <div class="font-bold text-sm text-[#14151A]">
                <?php echo htmlspecialchars($cs['testimonial']['author']); ?>
              </div>
              <div class="text-xs text-[#5B5F6B]">
                <?php echo htmlspecialchars($cs['testimonial']['role']); ?> · <?php echo htmlspecialchars($cs['testimonial']['company']); ?>
              </div>
            </div>
          </div>

        </div>
      </section>
    <?php endif; ?>

    <!-- 9. Key Takeaways for Similar Businesses -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-16" data-aos="fade-up">
      <div class="bg-[#F6F8FB] border border-[#E4E7EC] rounded-3xl p-8 sm:p-10">
        <h3 class="text-xl font-extrabold text-[#14151A] font-display mb-6">
          Key Takeaways for <?php echo htmlspecialchars($cs['industry']); ?> Businesses
        </h3>
        <div class="space-y-4">
          <?php foreach ($cs['key_takeaways'] as $takeaway): ?>
            <div class="flex items-start gap-3 bg-white p-4 rounded-xl border border-[#E4E7EC]">
              <i data-lucide="lightbulb" class="w-5 h-5 text-[#00A8B5] shrink-0 mt-0.5 font-bold"></i>
              <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed">
                <?php echo htmlspecialchars($takeaway); ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- 10. Call to Action -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-16" data-aos="zoom-in">
      <div class="bg-gradient-to-r from-[#14151A] to-[#1E293B] text-white rounded-3xl p-8 sm:p-12 text-center shadow-2xl border border-[#00F0FF]/30">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold tracking-tight font-display mb-4">
          Want results like <?php echo htmlspecialchars($cs['short_name']); ?>?
        </h2>
        <p class="text-xs sm:text-sm text-slate-300 max-w-xl mx-auto mb-8 leading-relaxed">
          Get your free 5x5 Google Maps geo-grid scan, competitor gap analysis, and 90-day growth roadmap today.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
          <a href="<?php echo $wa_cta_url; ?>" target="_blank" rel="noopener noreferrer" class="btn-primary !py-3.5 !px-8 !text-sm font-bold shadow-xl">
            <i data-lucide="message-circle" class="w-4 h-4 text-[#14151A]"></i>
            <span>Chat on WhatsApp About Your Business</span>
          </a>
          <a href="<?php echo $base_path; ?>portfolio#audit-form" class="btn-secondary !bg-white/10 !text-white !border-white/20 hover:!bg-white/20 !py-3.5 !px-7 !text-sm">
            <span>Claim Free Audit Form</span>
          </a>
        </div>
      </div>
    </section>

    <!-- 11. Next / Previous Case Study Navigation -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-8 border-t border-[#E4E7EC]">
        
        <!-- Previous Case Study -->
        <a href="<?php echo $base_path; ?>case-studies/<?php echo $prev_cs['slug']; ?>" class="p-5 rounded-2xl bg-[#F6F8FB] border border-[#E4E7EC] hover:border-[#00A8B5] transition-all flex items-center gap-3 group">
          <i data-lucide="arrow-left" class="w-5 h-5 text-[#008A94] group-hover:-translate-x-1 transition-transform shrink-0"></i>
          <div class="truncate text-left">
            <div class="text-[10px] text-[#5B5F6B] uppercase font-bold">Previous Case Study</div>
            <div class="text-xs font-bold text-[#14151A] group-hover:text-[#00A8B5] truncate">
              <?php echo htmlspecialchars($prev_cs['short_name']); ?>
            </div>
          </div>
        </a>

        <!-- Next Case Study -->
        <a href="<?php echo $base_path; ?>case-studies/<?php echo $next_cs['slug']; ?>" class="p-5 rounded-2xl bg-[#F6F8FB] border border-[#E4E7EC] hover:border-[#00A8B5] transition-all flex items-center justify-between gap-3 group text-right">
          <div class="truncate text-right">
            <div class="text-[10px] text-[#5B5F6B] uppercase font-bold">Next Case Study</div>
            <div class="text-xs font-bold text-[#14151A] group-hover:text-[#00A8B5] truncate">
              <?php echo htmlspecialchars($next_cs['short_name']); ?>
            </div>
          </div>
          <i data-lucide="arrow-right" class="w-5 h-5 text-[#008A94] group-hover:translate-x-1 transition-transform shrink-0"></i>
        </a>

      </div>

      <!-- More Case Studies Link -->
      <div class="text-center mt-8">
        <a href="<?php echo $base_path; ?>case-studies" class="inline-flex items-center gap-2 text-xs font-bold text-[#008A94] hover:text-[#00A8B5] hover:underline">
          <i data-lucide="grid" class="w-4 h-4"></i>
          <span>View all 7 client case studies →</span>
        </a>
      </div>
    </section>

  </main>

  <!-- Footer -->
  <?php include __DIR__ . '/includes/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      if (typeof AOS !== 'undefined') {
        AOS.init({ once: true, duration: 600, easing: 'ease-out-cubic' });
      }
      if (typeof lucide !== 'undefined') {
        lucide.createIcons();
      }
    });
  </script>
</body>
</html>
