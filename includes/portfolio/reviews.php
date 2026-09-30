<?php
/**
 * Google Reviews Section Component - 100% Real Client Transcripts
 */
$gbp_url = $p_cfg['gbp_url'];
$review_link = $p_cfg['google_review_link'];
$reviews_list = $p_cfg['reviews'];
$reviews_count = $p_cfg['trust_metrics']['reviews_count'];
$rating_val = $p_cfg['trust_metrics']['rating'];
?>
<section class="py-20 sm:py-28 bg-[#F6F8FB] border-y border-[#E4E7EC] relative overflow-hidden" id="reviews">
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-50 text-amber-700 border border-amber-200 mb-4">
        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
        <span>Verified Client Feedback</span>
      </div>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#14151A] tracking-tight font-display mb-4">
        What our clients <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-[#00A8B5]">actually say</span>
      </h2>
      <p class="text-base sm:text-lg text-[#5B5F6B] leading-relaxed">
        Read real, unedited Google reviews from universities, retail showrooms, realtors, and business owners we work with every month.
      </p>
    </div>

    <!-- Top Google Summary Bar -->
    <div class="bg-white border-2 border-[#E4E7EC] rounded-2xl p-4 sm:p-6 mb-12 shadow-sm flex flex-col md:flex-row items-center justify-between gap-6" data-aos="fade-up">
      
      <!-- Left: Google G + Star Rating -->
      <div class="flex items-center gap-4 text-left">
        <!-- SVG Google 'G' Icon -->
        <div class="w-12 h-12 rounded-xl bg-[#F6F8FB] border border-[#E4E7EC] flex items-center justify-center shrink-0 shadow-inner">
          <svg class="w-7 h-7" viewBox="0 0 24 24">
            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
          </svg>
        </div>

        <div>
          <div class="flex items-center gap-2">
            <span class="text-2xl font-black text-[#14151A]"><?php echo htmlspecialchars($rating_val); ?></span>
            <div class="flex text-amber-400">
              <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
              <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
              <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
              <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
              <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
            </div>
          </div>
          <p class="text-xs text-[#5B5F6B]">
            Based on <strong class="text-[#14151A]"><?php echo htmlspecialchars($reviews_count); ?> verified reviews</strong> on Google Business Profile
          </p>
        </div>
      </div>

      <!-- Right: Action Buttons -->
      <div class="flex flex-wrap items-center gap-3 w-full md:w-auto">
        <a href="<?php echo $gbp_url; ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary !py-2.5 !px-5 !text-xs w-full sm:w-auto text-center">
          <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
          <span>Read all reviews on Google</span>
        </a>

        <a href="<?php echo $review_link; ?>" target="_blank" rel="noopener noreferrer" class="btn-primary !py-2.5 !px-5 !text-xs w-full sm:w-auto text-center">
          <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
          <span>Worked with us? Leave a review</span>
        </a>
      </div>

    </div>

    <!-- Review Cards Grid (3 Columns on Desktop, Responsive Carousel Stack on Mobile) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
      <?php foreach ($reviews_list as $idx => $rev): ?>
        <div class="bg-[#FFFFFF] border border-[#E4E7EC] hover:border-[#00A8B5] rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="<?php echo $idx * 60; ?>">
          
          <div>
            <!-- Review Header: Avatar, Name, Location, Google Badge -->
            <div class="flex items-start justify-between gap-3 mb-4">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#00F0FF] to-[#0284C7] text-white font-extrabold text-sm flex items-center justify-center shrink-0 shadow-sm">
                  <?php echo htmlspecialchars($rev['initial']); ?>
                </div>
                <div>
                  <h3 class="font-bold text-sm text-[#14151A] leading-tight group-hover:text-[#00A8B5] transition-colors">
                    <?php echo htmlspecialchars($rev['author']); ?>
                  </h3>
                  <div class="text-[11px] text-[#5B5F6B]">
                    <?php echo htmlspecialchars($rev['role']); ?> · <?php echo htmlspecialchars($rev['location']); ?>
                  </div>
                </div>
              </div>

              <!-- Google Badge Icon -->
              <span class="w-6 h-6 rounded-full bg-[#F6F8FB] border border-[#E4E7EC] flex items-center justify-center shrink-0" title="Posted on Google">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24">
                  <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                  <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                  <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                  <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                </svg>
              </span>
            </div>

            <!-- Star Rating Row -->
            <div class="flex items-center gap-1 text-amber-400 mb-3">
              <?php for ($s = 0; $s < $rev['rating']; $s++): ?>
                <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
              <?php endfor; ?>
              <span class="text-[11px] font-bold text-slate-500 ml-1.5"><?php echo htmlspecialchars($rev['time_ago']); ?></span>
            </div>

            <!-- Review Body Text -->
            <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed italic mb-4">
              "<?php echo htmlspecialchars($rev['text']); ?>"
            </p>
          </div>

          <!-- Bottom: Verified Label -->
          <div class="pt-3 border-t border-[#E4E7EC] flex items-center justify-between text-[11px] text-[#5B5F6B]">
            <span class="flex items-center gap-1 text-[#16A34A] font-semibold">
              <i data-lucide="check-circle" class="w-3.5 h-3.5"></i> Verified Google Review
            </span>
            <span class="text-slate-400 font-mono">Bhopal Hub</span>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
