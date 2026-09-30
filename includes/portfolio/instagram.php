<?php
/**
 * Instagram Work & Reels Showcase Component
 */
$base_path = function_exists('get_base_path') ? get_base_path() : '/';
$insta_url = $p_cfg['instagram_url'];
$insta_handle = $p_cfg['instagram_handle'];
$posts = $p_cfg['instagram_posts'];
?>
<section class="py-20 sm:py-28 bg-[#FFFFFF] relative overflow-hidden" id="instagram">
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Section Header with Follow Button -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-12" data-aos="fade-up">
      <div class="text-center md:text-left">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-pink-50 text-pink-600 border border-pink-200 mb-3">
          <i data-lucide="instagram" class="w-3.5 h-3.5"></i>
          <span>Creative Agency Production</span>
        </div>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A] tracking-tight font-display">
          See our work on Instagram <span class="text-pink-600"><?php echo htmlspecialchars($insta_handle); ?></span>
        </h2>
        <p class="text-xs sm:text-sm text-[#5B5F6B] mt-1">
          High-retention reels, local business transformations, and creative marketing campaigns designed for conversions.
        </p>
      </div>

      <a href="<?php echo $insta_url; ?>" target="_blank" rel="noopener noreferrer" class="btn-primary !bg-gradient-to-r !from-pink-500 !via-purple-600 !to-indigo-600 !border-pink-400 !text-white hover:!scale-105 !py-3 !px-6 !text-xs sm:!text-sm shrink-0 shadow-lg">
        <i data-lucide="instagram" class="w-4 h-4"></i>
        <span>Follow <?php echo htmlspecialchars($insta_handle); ?></span>
      </a>
    </div>

    <!-- 6-Tile Instagram Grid (3x2 Desktop, 2x3 Mobile) -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
      <?php foreach ($posts as $idx => $post): 
        $img_src = $base_path . ltrim($post['image'], '/');
      ?>
        <a href="<?php echo htmlspecialchars($post['url']); ?>" target="_blank" rel="noopener noreferrer" class="group relative rounded-2xl overflow-hidden border border-[#E4E7EC] bg-[#14151A] aspect-[4/5] shadow-sm hover:shadow-2xl transition-all duration-300 block" data-aos="fade-up" data-aos-delay="<?php echo $idx * 60; ?>">
          
          <!-- Image -->
          <img src="<?php echo $img_src; ?>" alt="<?php echo htmlspecialchars($post['caption']); ?>" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 opacity-90 group-hover:opacity-100" onerror="this.src='/assets/images/hero_dashboard_light_v2.png';">

          <!-- Dark Gradient & Play Overlay on Hover -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 group-hover:opacity-95 transition-opacity duration-300 flex flex-col justify-between p-4 sm:p-5 text-white">
            
            <!-- Top Tag -->
            <div class="flex items-center justify-between">
              <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-sm">
                <?php echo $post['type'] === 'reel' ? '▶ Reel' : '📷 Post'; ?>
              </span>
              <div class="w-7 h-7 rounded-full bg-pink-600/80 flex items-center justify-center group-hover:scale-125 transition-transform">
                <i data-lucide="instagram" class="w-3.5 h-3.5"></i>
              </div>
            </div>

            <!-- Middle Play Icon for Reels -->
            <div class="w-12 h-12 rounded-full bg-white/30 backdrop-blur-md text-white flex items-center justify-center mx-auto opacity-0 group-hover:opacity-100 scale-75 group-hover:scale-100 transition-all duration-300 shadow-xl">
              <i data-lucide="play" class="w-6 h-6 fill-white ml-0.5"></i>
            </div>

            <!-- Bottom Caption -->
            <div>
              <p class="text-[11px] sm:text-xs font-medium line-clamp-2 text-slate-200 group-hover:text-white leading-snug">
                <?php echo htmlspecialchars($post['caption']); ?>
              </p>
              <div class="text-[10px] text-pink-300 font-bold mt-1 flex items-center gap-1">
                <span>View on Instagram</span>
                <i data-lucide="arrow-up-right" class="w-3 h-3"></i>
              </div>
            </div>

          </div>

        </a>
      <?php endforeach; ?>
    </div>

  </div>
</section>
