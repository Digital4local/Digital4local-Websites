<?php
require_once __DIR__ . '/includes/site-config.php';
$blg_cfg = get_page_config('blog');
$page_title = $blg_cfg['meta_title'] ?? "Insights & AI SEO Playbooks | Digital4Local Blog";
$page_description = $blg_cfg['meta_description'] ?? "Actionable guides on Generative Engine Optimization (GEO), Google Maps grid ranking, n8n marketing workflows.";

$all_posts = get_blog_posts(true);
$featured_post = !empty($all_posts) ? $all_posts[0] : null;
$grid_posts = !empty($all_posts) ? array_slice($all_posts, 1) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once 'includes/seo.php'; ?>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] min-h-screen relative selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <div class="bg-ambient-glow"></div>
  <?php include_once 'includes/header.php'; ?>

  <main class="relative z-10 pt-32 pb-24">
    <!-- Hero -->
    <section class="max-w-4xl mx-auto px-4 text-center space-y-6 pb-12" data-aos="fade-up">
      <span class="pulse-badge"><?php echo htmlspecialchars($blg_cfg['badge'] ?? 'INSIGHTS & PLAYBOOKS'); ?></span>
      <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A]">
        <?php echo htmlspecialchars($blg_cfg['hero_title'] ?? 'Local SEO & AI Marketing'); ?> <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1D70B8] via-[#00A8B5] to-[#70B22C]"><?php echo htmlspecialchars($blg_cfg['hero_highlight'] ?? 'Strategy Playbooks'); ?></span>
      </h1>
      <p class="text-lg text-[#5B5F6B]"><?php echo htmlspecialchars($blg_cfg['hero_subheading'] ?? 'Read our latest research on 5x5 geo-grid tracking, ChatGPT citations, n8n automation triggers, and web speed optimization.'); ?></p>

      <!-- Category Filter Pills -->
      <div class="flex flex-wrap items-center justify-center gap-2 pt-4">
        <button class="blog-cat-filter active px-4 py-2 rounded-xl bg-[#00F0FF] text-[#0A0A0F] text-xs font-bold" data-cat="all">All Articles</button>
        <button class="blog-cat-filter px-4 py-2 rounded-xl bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B] hover:text-[#14151A] text-xs font-medium" data-cat="Local SEO">Local SEO</button>
        <button class="blog-cat-filter px-4 py-2 rounded-xl bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B] hover:text-[#14151A] text-xs font-medium" data-cat="GEO & AEO">GEO & AEO</button>
        <button class="blog-cat-filter px-4 py-2 rounded-xl bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B] hover:text-[#14151A] text-xs font-medium" data-cat="AI Automation">AI Automation</button>
        <button class="blog-cat-filter px-4 py-2 rounded-xl bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B] hover:text-[#14151A] text-xs font-medium" data-cat="Technical SEO">Technical SEO</button>
      </div>
    </section>

    <?php if ($featured_post): ?>
    <!-- Featured Hero Article -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-16">
      <a href="blog/<?php echo urlencode($featured_post['slug']); ?>.php" class="block group">
        <div class="card-dark p-6 sm:p-10 border-l-4 border-l-[#1B5FAA] flex flex-col lg:flex-row gap-8 items-center justify-between group-hover:border-[#00B4D8] bg-[#F6F8FB] rounded-3xl shadow-sm hover:shadow-xl transition-all">
          <div class="space-y-4 max-w-2xl">
            <div class="flex items-center gap-3 text-xs font-mono">
              <span class="px-2.5 py-1 rounded-md bg-[#1B5FAA]/10 text-[#1B5FAA] font-bold uppercase"><?php echo htmlspecialchars($featured_post['category'] ?? 'FEATURED PLAYBOOK'); ?></span>
              <span class="text-[#5B5F6B]"><?php echo htmlspecialchars($featured_post['read_time'] ?? '9 Min Read'); ?></span>
              <span class="text-[#5B5F6B]">• <?php echo htmlspecialchars(date('F j, Y', strtotime($featured_post['date'] ?? 'now'))); ?></span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-bold text-[#14151A] group-hover:text-[#1B5FAA] transition-colors leading-tight font-['Montserrat',sans-serif]">
              <?php echo htmlspecialchars($featured_post['title']); ?>
            </h2>
            <p class="text-[#5B5F6B] text-sm leading-relaxed">
              <?php echo htmlspecialchars($featured_post['excerpt'] ?? 'Step-by-step breakdown of how vector search engines parse brand entity data.'); ?>
            </p>
            <div class="pt-2">
              <span class="inline-flex items-center gap-1.5 text-xs font-mono font-bold text-[#1B5FAA] group-hover:underline">
                Read Playbook →
              </span>
            </div>
          </div>
          <div class="w-full lg:w-96 rounded-2xl overflow-hidden border border-[#E4E7EC] bg-white shadow-md group-hover:shadow-lg transition-all shrink-0">
            <?php if (!empty($featured_post['featured_image'])): ?>
              <img src="<?php echo htmlspecialchars($featured_post['featured_image']); ?>" alt="<?php echo htmlspecialchars($featured_post['title']); ?>" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500" />
            <?php else: ?>
              <div class="w-full h-56 flex flex-col justify-center items-center p-6 text-center space-y-2 bg-gradient-to-br from-[#1B5FAA]/5 to-[#00B4D8]/10">
                <i data-lucide="book-open" class="w-12 h-12 text-[#1B5FAA]"></i>
                <span class="text-xs font-mono text-[#1B5FAA] font-bold">READ ARTICLE</span>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </a>
    </section>
    <?php endif; ?>

    <!-- Articles Grid -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-20">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="blog-posts-grid">
        <?php foreach ($grid_posts as $post): ?>
        <a href="blog/<?php echo urlencode($post['slug']); ?>.php" class="blog-card card-dark overflow-hidden flex flex-col justify-between group rounded-3xl bg-white border border-[#E2E8F0] shadow-sm hover:shadow-xl hover:border-[#1B5FAA] transition-all" data-category="<?php echo htmlspecialchars($post['category'] ?? 'General'); ?>">
          <div>
            <?php if (!empty($post['featured_image'])): ?>
            <div class="w-full h-48 overflow-hidden bg-slate-100 border-b border-[#E2E8F0]">
              <img src="<?php echo htmlspecialchars($post['featured_image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
            </div>
            <?php endif; ?>
            <div class="p-6 space-y-3">
              <span class="px-2.5 py-1 rounded text-[10px] font-mono bg-[#1B5FAA]/10 text-[#1B5FAA] font-bold uppercase"><?php echo htmlspecialchars($post['category'] ?? 'Local SEO'); ?></span>
              <h3 class="font-bold text-[#14151A] text-lg group-hover:text-[#1B5FAA] transition-colors leading-snug font-['Montserrat',sans-serif]">
                <?php echo htmlspecialchars($post['title']); ?>
              </h3>
              <p class="text-xs text-[#5B5F6B] leading-relaxed line-clamp-3">
                <?php echo htmlspecialchars($post['excerpt'] ?? ''); ?>
              </p>
            </div>
          </div>
          <div class="px-6 pb-6 pt-2 flex items-center justify-between text-[11px] font-mono text-[#5B5F6B] border-t border-[#F1F5F9]">
            <span><?php echo htmlspecialchars($post['read_time'] ?? '5 Min Read'); ?></span>
            <span><?php echo htmlspecialchars(date('M d, Y', strtotime($post['date'] ?? 'now'))); ?></span>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Bottom CTA Band -->
    <section class="max-w-4xl mx-auto px-4 pt-12 text-center">
      <div class="card-dark bg-[#F6F8FB] border border-[#E4E7EC] p-10 rounded-2xl space-y-4">
        <h2 class="text-2xl font-bold text-[#14151A]">Want custom growth playbooks for your business?</h2>
        <p class="text-xs text-[#5B5F6B]">Subscribe to our bi-weekly search engineer research reports or book a strategy session.</p>
        <button class="trigger-book-demo btn-primary">
          <i data-lucide="sparkles" class="w-4 h-4"></i> Claim Free Growth Audit
        </button>
      </div>
    </section>
  </main>

  <?php include_once 'includes/footer.php'; ?>

  <script>
    // Category filter logic
    document.querySelectorAll('.blog-cat-filter').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.blog-cat-filter').forEach(b => {
          b.classList.remove('active', 'bg-[#00F0FF]', 'text-[#0A0A0F]', 'font-bold');
          b.classList.add('bg-[#F6F8FB]', 'border', 'border-[#E4E7EC]', 'text-[#5B5F6B]');
        });
        btn.classList.add('active', 'bg-[#00F0FF]', 'text-[#0A0A0F]', 'font-bold');
        btn.classList.remove('bg-[#F6F8FB]', 'border', 'border-[#E4E7EC]', 'text-[#5B5F6B]');

        const cat = btn.getAttribute('data-cat');
        document.querySelectorAll('.blog-card').forEach(card => {
          if (cat === 'all' || card.getAttribute('data-category').toLowerCase().includes(cat.toLowerCase())) {
            card.style.display = 'flex';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  </script>
</body>
</html>
