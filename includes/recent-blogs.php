<?php
/**
 * Recent Published Blogs & Articles Section Component
 * Reusable across Home, Services, Pricing, About, and Industry landing pages.
 */
require_once __DIR__ . '/site-config.php';

// Path resolution for subfolders
$current_script = $_SERVER['SCRIPT_NAME'] ?? '';
$is_subfolder = (strpos($current_script, '/services/') !== false || strpos($current_script, '/industries/') !== false || strpos($current_script, '/blog/') !== false);
$asset_prefix = $is_subfolder ? '../' : '';

$all_recent_posts = get_blog_posts(true);
// Sort by date or show up to 3 latest posts
$recent_display_posts = array_slice($all_recent_posts, 0, 3);
?>

<?php if (!empty($recent_display_posts)): ?>
<section class="py-20 sm:py-28 relative bg-[#F8FAFC] border-y border-[#E2E8F0] overflow-hidden">
  
  <!-- Subtle Background Glows -->
  <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#1B5FAA]/5 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-[#00B4D8]/5 rounded-full blur-3xl pointer-events-none"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    
    <!-- Section Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-12 sm:pb-16" data-aos="fade-up">
      <div class="space-y-4 max-w-2xl">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#1B5FAA]/10 border border-[#1B5FAA]/20 text-[#1B5FAA] text-xs font-mono font-bold tracking-wider uppercase">
          <span class="w-2 h-2 rounded-full bg-[#00B4D8] animate-pulse"></span>
          LATEST SEARCH & AI PLAYBOOKS
        </div>
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#14151A] font-['Montserrat',sans-serif] tracking-tight leading-tight">
          Recent Research, Guides & <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1B5FAA] via-[#00B4D8] to-[#5A9E2F]">Industry Insights</span>
        </h2>
        <p class="text-sm sm:text-base text-[#64748B] leading-relaxed">
          Actionable research on local SEO dominance, ChatGPT citations, and organic search engineering written by Abhishek Raikwar.
        </p>
      </div>

      <div class="shrink-0">
        <a href="<?php echo $asset_prefix; ?>blog.php" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-white border border-[#CBD5E1] text-[#14151A] font-bold text-sm hover:border-[#1B5FAA] hover:text-[#1B5FAA] hover:shadow-md transition-all group">
          <span>View All 6+ Articles</span>
          <span class="group-hover:translate-x-1 transition-transform">→</span>
        </a>
      </div>
    </div>

    <!-- 3-Column Recent Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($recent_display_posts as $post): 
        $post_img = $post['featured_image'] ?? 'assets/images/hero_dashboard_light_v2.png';
        if (strpos($post_img, 'http') !== 0 && strpos($post_img, '/') !== 0) {
            $post_img_resolved = $asset_prefix . $post_img;
        } else {
            $post_img_resolved = $post_img;
        }
        $post_link = $asset_prefix . 'blog/' . urlencode($post['slug']) . '.php';
      ?>
      <article class="bg-white rounded-3xl border border-[#E2E8F0] shadow-sm hover:shadow-xl hover:border-[#1B5FAA] transition-all flex flex-col justify-between overflow-hidden group" data-aos="fade-up">
        
        <div>
          <!-- Featured Image Container -->
          <a href="<?php echo $post_link; ?>" class="block w-full h-52 overflow-hidden bg-slate-100 border-b border-[#E2E8F0] relative">
            <img src="<?php echo htmlspecialchars($post_img_resolved); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
            <div class="absolute top-4 left-4">
              <span class="px-3 py-1 rounded-full text-[10px] font-mono bg-white/95 backdrop-blur-sm text-[#1B5FAA] font-bold shadow-sm uppercase">
                <?php echo htmlspecialchars($post['category'] ?? 'SEO'); ?>
              </span>
            </div>
          </a>

          <!-- Content Padding -->
          <div class="p-6 sm:p-7 space-y-3">
            <div class="flex items-center gap-2 text-xs font-mono text-[#64748B]">
              <span><?php echo htmlspecialchars($post['read_time'] ?? '8 Min Read'); ?></span>
              <span>•</span>
              <span><?php echo htmlspecialchars(date('M d, Y', strtotime($post['date'] ?? 'now'))); ?></span>
            </div>

            <h3 class="text-lg sm:text-xl font-bold text-[#14151A] group-hover:text-[#1B5FAA] transition-colors leading-snug font-['Montserrat',sans-serif]">
              <a href="<?php echo $post_link; ?>">
                <?php echo htmlspecialchars($post['title']); ?>
              </a>
            </h3>

            <p class="text-xs sm:text-sm text-[#64748B] leading-relaxed line-clamp-3">
              <?php echo htmlspecialchars($post['excerpt'] ?? ''); ?>
            </p>
          </div>
        </div>

        <!-- Card Footer with Link -->
        <div class="px-6 sm:px-7 pb-6 pt-3 flex items-center justify-between border-t border-[#F1F5F9] text-xs">
          <span class="text-[#64748B] font-mono text-[11px]">Digital4Local Research</span>

          <a href="<?php echo $post_link; ?>" class="text-[#1B5FAA] font-bold inline-flex items-center gap-1 group-hover:underline">
            Read <span class="group-hover:translate-x-0.5 transition-transform">→</span>
          </a>
        </div>

      </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>
<?php endif; ?>
