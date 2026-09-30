<?php
/**
 * Problem Section Component - Great business. Invisible online?
 */
?>
<section class="py-20 sm:py-28 bg-[#F6F8FB] border-y border-[#E4E7EC] relative overflow-hidden" id="problem">
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-red-100 text-red-700 border border-red-200 mb-4">
        <i data-lucide="alert-triangle" class="w-3.5 h-3.5"></i>
        <span>The Local Reality in Bhopal</span>
      </div>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#14151A] tracking-tight font-display mb-4">
        Great business. <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-rose-600 to-amber-600">Invisible online?</span>
      </h2>
      <p class="text-base sm:text-lg text-[#5B5F6B] leading-relaxed">
        You’ve built an exceptional clinic, restaurant, coaching center, or showroom. But if customers can’t find you on their phone in 3 seconds, your competitors win the sale by default.
      </p>
    </div>

    <!-- 4 Pain Points Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-14">
      <?php foreach ($p_cfg['pain_points'] as $idx => $pain): ?>
        <div class="bg-[#FFFFFF] border border-[#E4E7EC] hover:border-red-300 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="<?php echo $idx * 100; ?>">
          
          <div>
            <!-- Icon Container with Alert Glow -->
            <div class="w-12 h-12 rounded-xl bg-red-50 text-red-600 border border-red-100 flex items-center justify-center mb-5 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-200">
              <i data-lucide="<?php echo $pain['icon']; ?>" class="w-6 h-6"></i>
            </div>

            <!-- Title -->
            <h3 class="text-lg font-bold text-[#14151A] leading-snug mb-3 group-hover:text-red-600 transition-colors">
              <?php echo htmlspecialchars($pain['title']); ?>
            </h3>

            <!-- Description -->
            <p class="text-sm text-[#5B5F6B] leading-relaxed">
              <?php echo htmlspecialchars($pain['desc']); ?>
            </p>
          </div>

          <!-- Bottom Warning Line -->
          <div class="mt-6 pt-4 border-t border-[#E4E7EC] flex items-center gap-2 text-xs font-semibold text-red-600">
            <i data-lucide="x-circle" class="w-4 h-4 shrink-0"></i>
            <span>Lost revenue every week</span>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

    <!-- Punchline Banner -->
    <div class="bg-[#FFFFFF] border-2 border-red-200 rounded-2xl p-6 sm:p-8 text-center max-w-3xl mx-auto shadow-md" data-aos="zoom-in" data-aos-duration="600">
      <div class="flex items-center justify-center gap-2 text-red-600 font-extrabold text-lg sm:text-xl md:text-2xl mb-2">
        <i data-lucide="alert-circle" class="w-6 h-6 shrink-0"></i>
        <span>Every day you're invisible, those customers go somewhere else.</span>
      </div>
      <p class="text-sm sm:text-base text-[#5B5F6B]">
        Let’s stop letting inferior competitors take your clients. Turn your online visibility into your #1 customer acquisition channel.
      </p>
      <div class="mt-6">
        <a href="#audit-form" class="btn-primary !py-3 !px-7 !text-sm">
          <span>Claim Your Free Visibility Audit Now</span>
          <i data-lucide="arrow-down" class="w-4 h-4"></i>
        </a>
      </div>
    </div>

  </div>
</section>
