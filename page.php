<?php
require_once __DIR__ . '/includes/site-config.php';

$slug = $_GET['slug'] ?? '';
$page_key = 'custom_' . $slug;
$cfg = get_page_config($page_key);

$is_draft = ($cfg['status'] ?? 'published') === 'draft';
$page_title = ($cfg['meta_title'] ?? $cfg['title']) . " | Digital4Local";
$page_description = $cfg['meta_description'] ?? ($cfg['hero_subheading'] ?? 'Custom high-converting growth solution page powered by Digital4Local AI engine.');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once 'includes/seo.php'; ?>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] min-h-screen relative selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <?php if ($is_draft): ?>
  <!-- Draft Preview Sticky Banner -->
  <div class="fixed top-0 left-0 right-0 z-50 bg-[#F59E0B] text-[#0A0A0F] text-xs font-mono font-bold py-2 px-4 text-center shadow-md flex items-center justify-center gap-2">
    <span class="w-2 h-2 rounded-full bg-[#0A0A0F] animate-pulse"></span>
    <span>DRAFT MODE PREVIEW: This page is currently unpublished. Only visible during live preview.</span>
    <a href="admin-cms.php?page=<?php echo urlencode($page_key); ?>" class="underline ml-2">Edit in CMS →</a>
  </div>
  <?php endif; ?>

  <div class="bg-ambient-glow"></div>
  <?php include_once 'includes/header.php'; ?>

  <main class="relative z-10 pt-32 pb-24">
    
    <!-- Dynamic Hero -->
    <section class="max-w-4xl mx-auto px-4 text-center space-y-6 pb-16" data-aos="fade-up">
      <span class="pulse-badge"><?php echo htmlspecialchars($cfg['badge'] ?? strtoupper($cfg['title'] ?? 'CUSTOM SOLUTION')); ?></span>
      <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A] tracking-tight">
        <?php echo htmlspecialchars($cfg['hero_title'] ?? $cfg['title']); ?> <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1D70B8] via-[#00A8B5] to-[#70B22C]"><?php echo htmlspecialchars($cfg['hero_highlight'] ?? 'AI Growth Engine'); ?></span>
      </h1>
      <p class="text-base sm:text-lg text-[#5B5F6B] leading-relaxed max-w-2xl mx-auto">
        <?php echo htmlspecialchars($cfg['hero_subheading'] ?? 'Tailored AI search optimization, real-time rank tracking, and sub-60s automated lead responses.'); ?>
      </p>

      <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
        <button class="trigger-book-demo btn-primary text-xs">
          <i data-lucide="calendar" class="w-4 h-4"></i> Book Strategy Session
        </button>
        <button class="trigger-book-demo btn-secondary text-xs">
          <i data-lucide="sparkles" class="w-4 h-4"></i> Claim Free Growth Audit
        </button>
      </div>
    </section>

    <?php if (!empty($cfg['featured_image'])): ?>
    <!-- Featured Image Banner -->
    <section class="max-w-5xl mx-auto px-4 pb-16">
      <div class="rounded-2xl overflow-hidden border border-[#E4E7EC] shadow-sm">
        <img src="<?php echo htmlspecialchars($cfg['featured_image']); ?>" alt="<?php echo htmlspecialchars($cfg['title']); ?>" class="w-full h-auto object-cover max-h-96">
      </div>
    </section>
    <?php endif; ?>

    <!-- Main Rich Body Content Section -->
    <section class="max-w-4xl mx-auto px-4 pb-20">
      <div class="card-dark p-8 md:p-12 bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl landing-body-content">
        <?php
        echo $cfg['content_html'] ?? '<h2>Tailored Growth Blueprint</h2><p>Engineering specialized search optimization and conversion solutions for your business.</p>';
        ?>
      </div>
    </section>

    <!-- Value Proposition 3-Pillar Grid -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-20">
      <h2 class="text-2xl font-bold text-[#14151A] mb-8 text-center">Engineered For Measurable Results</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="card-dark p-6 space-y-3 border-t-2 border-t-[#00A8B5]">
          <div class="w-10 h-10 rounded-xl bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center font-bold text-sm font-mono">01</div>
          <h3 class="font-bold text-[#14151A]">Algorithmic Search Optimization</h3>
          <p class="text-xs text-[#5B5F6B]">Target high-intent keywords and 5x5 geo-grid pins to capture active in-market buyers.</p>
        </div>
        <div class="card-dark p-6 space-y-3 border-t-2 border-t-[#16A34A]">
          <div class="w-10 h-10 rounded-xl bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center font-bold text-sm font-mono">02</div>
          <h3 class="font-bold text-[#14151A]">Generative Engine (GEO) Ready</h3>
          <p class="text-xs text-[#5B5F6B]">Structured entity graph microdata ensuring direct recommendations on ChatGPT and Perplexity.</p>
        </div>
        <div class="card-dark p-6 space-y-3 border-t-2 border-t-[#8B5CF6]">
          <div class="w-10 h-10 rounded-xl bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center font-bold text-sm font-mono">03</div>
          <h3 class="font-bold text-[#14151A]">Sub-60s Automated Triage</h3>
          <p class="text-xs text-[#5B5F6B]">Automated n8n webhook response pipelines converting inquiries at peak buying intent.</p>
        </div>
      </div>
    </section>

    <!-- Bottom Conversion CTA -->
    <section class="max-w-4xl mx-auto px-4 text-center">
      <div class="card-dark bg-[#F6F8FB] border border-[#E4E7EC] p-10 rounded-2xl space-y-4">
        <h2 class="text-2xl font-bold text-[#14151A]">Ready to Deploy This Growth Architecture?</h2>
        <p class="text-xs text-[#5B5F6B]">Schedule a free consultation with our senior growth engineers.</p>
        <button class="trigger-book-demo btn-primary">
          <i data-lucide="calendar" class="w-4 h-4"></i> Book Strategy Session
        </button>
      </div>
    </section>

  </main>

  <?php include_once 'includes/footer.php'; ?>

  <style>
    /* Landing Page Body Typography Styles */
    .landing-body-content h2 {
      font-size: 1.5rem;
      font-weight: 700;
      color: #14151A;
      margin-top: 1.5rem;
      margin-bottom: 0.75rem;
      padding-bottom: 0.5rem;
      border-bottom: 1px solid #E4E7EC;
    }
    .landing-body-content h3 {
      font-size: 1.25rem;
      font-weight: 700;
      color: #14151A;
      margin-top: 1.25rem;
      margin-bottom: 0.5rem;
    }
    .landing-body-content p {
      margin-bottom: 1rem;
      line-height: 1.7;
      color: #5B5F6B;
    }
    .landing-body-content ul, .landing-body-content ol {
      margin-bottom: 1rem;
      padding-left: 1.5rem;
      color: #5B5F6B;
    }
    .landing-body-content ul { list-style-type: disc; }
    .landing-body-content ol { list-style-type: decimal; }
    .landing-body-content li { margin-bottom: 0.5rem; }
    .landing-body-content blockquote {
      border-left: 4px solid #00A8B5;
      padding: 1rem 1.25rem;
      background: #FFFFFF;
      border-radius: 0 0.5rem 0.5rem 0;
      margin: 1.5rem 0;
      font-style: italic;
      color: #14151A;
    }
    .landing-body-content img {
      max-width: 100%;
      border-radius: 0.75rem;
      margin: 1.5rem 0;
      border: 1px solid #E4E7EC;
    }
  </style>
</body>
</html>
