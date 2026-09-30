<?php
/**
 * Digital4Local - Dedicated Case Study Detail Page
 * Dynamic Route: /case-studies/[slug]
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
    "dateModified": "2026-09-30T10:00:00+05:30"
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

  <style>
    .placeholder-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.25rem;
      padding: 0.2rem 0.6rem;
      border-radius: 0.375rem;
      font-family: monospace;
      font-size: 0.75rem;
      font-weight: 700;
      background-color: #FEF3C7;
      color: #92400E;
      border: 1px dashed #F59E0B;
    }
  </style>
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

      <!-- Client Tag + Industry + Country Flag -->
      <div class="flex flex-wrap items-center gap-3 mb-6">
        <span class="px-3.5 py-1 rounded-full text-xs font-black uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30">
          <?php echo htmlspecialchars($cs['industry']); ?>
        </span>
        <span class="px-3 py-1 rounded-full text-xs font-bold bg-[#F6F8FB] text-[#5B5F6B] border border-[#E4E7EC]">
          <?php echo $cs['flag']; ?> <?php echo htmlspecialchars($cs['location']); ?>
        </span>
        <span class="text-xs font-semibold text-[#5B5F6B]">
          Timeline: <?php echo htmlspecialchars($cs['timeline']); ?>
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
              <?php 
                if (strpos($stat['sub'], '[ADD:') !== false) {
                  echo '<span class="placeholder-badge">' . htmlspecialchars($stat['sub']) . '</span>';
                } else {
                  echo htmlspecialchars($stat['sub']);
                }
              ?>
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
            <h3 class="text-sm font-bold uppercase tracking-wider text-[#14151A] mb-4">
              Institutions in Scope:
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
              <?php foreach ($cs['institutions'] as $inst): ?>
                <div class="bg-[#F6F8FB] p-4 rounded-xl border border-[#E4E7EC]">
                  <h4 class="font-bold text-xs text-[#14151A] mb-1"><?php echo htmlspecialchars($inst['name']); ?></h4>
                  <p class="text-[11px] text-[#5B5F6B] mb-2"><?php echo htmlspecialchars($inst['focus']); ?></p>
                  <span class="text-[10px] font-bold text-[#008A94] uppercase"><?php echo htmlspecialchars($inst['status']); ?></span>
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
                  <span>
                    <?php 
                      if (strpos($b, '[ADD:') !== false) {
                        echo '<span class="placeholder-badge">' . htmlspecialchars($b) . '</span>';
                      } else {
                        echo htmlspecialchars($b);
                      }
                    ?>
                  </span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- 6. The Results (Verified Metrics & Narrative) -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-16" data-aos="fade-up">
      <div class="bg-gradient-to-br from-[#F6F8FB] via-[#FFFFFF] to-[#F6F8FB] border-2 border-[#16A34A] rounded-3xl p-8 sm:p-10 shadow-xl">
        
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#16A34A]/10 text-[#16A34A] border border-[#16A34A]/30 mb-4">
          <i data-lucide="trending-up" class="w-3.5 h-3.5"></i>
          <span>Verified Business Outcome</span>
        </div>

        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight font-display mb-6">
          The Results
        </h2>

        <!-- Before / After Stat Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
          <?php foreach ($cs['results_metrics'] as $rm): ?>
            <div class="bg-white p-6 rounded-2xl border border-[#E4E7EC] shadow-sm flex flex-col justify-between">
              <div class="text-[10px] uppercase font-bold text-[#5B5F6B] mb-2">
                <?php echo htmlspecialchars($rm['label']); ?>
              </div>
              <div class="flex items-baseline gap-2 my-2">
                <span class="text-sm font-bold text-slate-400 line-through">
                  <?php 
                    if (strpos($rm['before'], '[ADD:') !== false) {
                      echo '<span class="placeholder-badge">' . htmlspecialchars($rm['before']) . '</span>';
                    } else {
                      echo htmlspecialchars($rm['before']);
                    }
                  ?>
                </span>
                <i data-lucide="arrow-right" class="w-4 h-4 text-[#16A34A]"></i>
                <span class="text-xl sm:text-2xl font-black text-[#16A34A]">
                  <?php 
                    if (strpos($rm['after'], '[ADD:') !== false) {
                      echo '<span class="placeholder-badge">' . htmlspecialchars($rm['after']) . '</span>';
                    } else {
                      echo htmlspecialchars($rm['after']);
                    }
                  ?>
                </span>
              </div>
              <div class="text-xs text-[#5B5F6B]">
                <?php 
                  if (strpos($rm['note'], '[ADD:') !== false) {
                    echo '<span class="placeholder-badge">' . htmlspecialchars($rm['note']) . '</span>';
                  } else {
                    echo htmlspecialchars($rm['note']);
                  }
                ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Results Narrative Paragraph -->
        <p class="text-sm sm:text-base text-[#14151A] leading-relaxed mb-6 font-medium">
          <?php 
            $narrative = $cs['results_narrative'];
            if (strpos($narrative, '[ADD:') !== false) {
              $narrative = preg_replace('/(\[ADD:[^\]]+\])/', '<span class="placeholder-badge">$1</span>', $narrative);
              echo $narrative;
            } else {
              echo htmlspecialchars($narrative);
            }
          ?>
        </p>

        <!-- Chart Slot Placeholder Box -->
        <div class="bg-white border-2 border-dashed border-[#CBD5E1] rounded-2xl p-6 text-center text-xs text-[#5B5F6B] flex items-center justify-center gap-2">
          <i data-lucide="image" class="w-4 h-4 text-slate-400"></i>
          <span class="placeholder-badge"><?php echo htmlspecialchars($cs['chart_placeholder']); ?></span>
        </div>

      </div>
    </section>

    <!-- 7. AI Search Visibility Block (Centrepiece) -->
    <?php $ai = $cs['ai_search_visibility']; ?>
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-16" data-aos="fade-up">
      <div class="bg-gradient-to-br from-[#0F172A] via-[#1E293B] to-[#0F172A] text-white rounded-3xl p-8 sm:p-10 shadow-2xl border-2 border-[#00F0FF]/30">
        
        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
          <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-black uppercase tracking-wider bg-[#00F0FF] text-[#14151A]">
            <i data-lucide="bot" class="w-3.5 h-3.5"></i>
            <span>AI Search Visibility (AEO / GEO)</span>
          </div>
          <span class="text-xs text-[#00F0FF] font-mono">
            ChatGPT · Gemini · AI Overviews · Perplexity · Copilot
          </span>
        </div>

        <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight mb-4">
          How <?php echo htmlspecialchars($cs['short_name']); ?> Became Visible in AI Answer Engines
        </h2>

        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-8 max-w-3xl">
          <?php echo htmlspecialchars($ai['narrative']); ?>
        </p>

        <!-- AI Mention Status Grid -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 mb-6 overflow-x-auto">
          <div class="text-xs font-bold uppercase tracking-wider text-[#00F0FF] mb-4">
            AI Engine × Prompt Citation Benchmark:
          </div>
          <table class="w-full text-left text-xs min-w-[500px]">
            <thead>
              <tr class="border-b border-white/10 text-slate-400 font-mono">
                <th class="pb-2 w-1/3">Target Query Prompt</th>
                <th class="pb-2 text-center">ChatGPT</th>
                <th class="pb-2 text-center">Gemini</th>
                <th class="pb-2 text-center">AI Overviews</th>
                <th class="pb-2 text-center">Perplexity</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
              <?php foreach ($ai['prompts'] as $prompt): ?>
                <tr>
                  <td class="py-2.5 pr-2 font-medium text-slate-200">
                    "<?php echo htmlspecialchars($prompt); ?>"
                  </td>
                  <td class="py-2.5 text-center"><span class="placeholder-badge">[ADD: Status]</span></td>
                  <td class="py-2.5 text-center"><span class="placeholder-badge">[ADD: Status]</span></td>
                  <td class="py-2.5 text-center"><span class="placeholder-badge">[ADD: Status]</span></td>
                  <td class="py-2.5 text-center"><span class="placeholder-badge">[ADD: Status]</span></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <!-- AI Screenshot Slot -->
        <div class="bg-white/5 border border-dashed border-white/20 rounded-xl p-5 text-center text-xs text-slate-400 flex items-center justify-center gap-2">
          <i data-lucide="image" class="w-4 h-4 text-[#00F0FF]"></i>
          <span class="placeholder-badge"><?php echo htmlspecialchars($ai['screenshot_placeholder']); ?></span>
        </div>

      </div>
    </section>

    <!-- 8. Client Testimonial (Hidden if null/empty) -->
    <?php if (!empty($cs['testimonial'])): ?>
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
            <?php 
              $q = $cs['testimonial']['quote'];
              if (strpos($q, '[ADD:') !== false) {
                echo '<span class="placeholder-badge">' . htmlspecialchars($q) . '</span>';
              } else {
                echo '"' . htmlspecialchars($q) . '"';
              }
            ?>
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
          Get your free 5x5 Google Maps geo-grid scan, competitor audit, and 90-day growth roadmap today.
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
