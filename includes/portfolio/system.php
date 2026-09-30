<?php
/**
 * The D4L Local Growth System™ - 4-Step Strategic Execution Framework
 */
?>
<section class="py-20 sm:py-28 bg-[#F6F8FB] border-y border-[#E4E7EC] relative overflow-hidden" id="system">
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-16 sm:mb-20" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30 mb-4">
        <i data-lucide="compass" class="w-3.5 h-3.5"></i>
        <span>Proprietary Methodology</span>
      </div>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#14151A] tracking-tight font-display mb-4">
        Not just posting. <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00A8B5] via-[#00F0FF] to-[#0284C7]">A complete growth system.</span>
      </h2>
      <p class="text-base sm:text-lg text-[#5B5F6B] leading-relaxed">
        Random marketing creates random results. Our 4-phase structured framework turns local search, social media, and AI recommendations into a predictable client pipeline.
      </p>
    </div>

    <!-- 4-Step Interactive Timeline Container -->
    <div class="relative">
      
      <!-- Desktop Connecting Horizontal Line -->
      <div class="hidden lg:block absolute top-1/2 -translate-y-6 left-12 right-12 h-1 bg-gradient-to-r from-[#00F0FF] via-[#00A8B5] to-[#0284C7] rounded-full z-0 opacity-40"></div>

      <!-- 4 Steps Cards Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative z-10">
        <?php foreach ($p_cfg['growth_system'] as $idx => $step): ?>
          <div class="bg-[#FFFFFF] border-2 border-[#E4E7EC] hover:border-[#00A8B5] rounded-2xl p-6 sm:p-7 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group relative overflow-hidden" data-aos="fade-up" data-aos-delay="<?php echo $idx * 120; ?>">
            
            <!-- Top Step & Phase Pill -->
            <div>
              <div class="flex items-center justify-between mb-6">
                <span class="w-12 h-12 rounded-2xl bg-[#00F0FF]/20 text-[#008A94] border border-[#00F0FF]/40 font-black text-lg flex items-center justify-center group-hover:bg-[#00A8B5] group-hover:text-white transition-all shadow-sm">
                  <?php echo htmlspecialchars($step['step']); ?>
                </span>
                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#F6F8FB] text-[#5B5F6B] border border-[#E4E7EC] group-hover:border-[#00A8B5] group-hover:text-[#008A94] transition-colors">
                  <?php echo htmlspecialchars($step['phase']); ?>
                </span>
              </div>

              <!-- Step Title & Subtitle -->
              <h3 class="text-xl font-extrabold text-[#14151A] mb-1 group-hover:text-[#00A8B5] transition-colors">
                <?php echo htmlspecialchars($step['name']); ?>
              </h3>
              <div class="text-xs font-bold text-[#008A94] uppercase tracking-wide mb-4">
                <?php echo htmlspecialchars($step['tagline']); ?>
              </div>

              <!-- Description -->
              <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed">
                <?php echo htmlspecialchars($step['desc']); ?>
              </p>
            </div>

            <!-- Bottom Progress Indicator -->
            <div class="mt-6 pt-4 border-t border-[#E4E7EC] flex items-center gap-2 text-xs font-semibold text-[#008A94]">
              <i data-lucide="check-circle" class="w-4 h-4 text-[#16A34A]"></i>
              <span>Phase <?php echo $idx + 1; ?> Deliverable</span>
            </div>

          </div>
        <?php endforeach; ?>
      </div>

    </div>

    <!-- Timeline Callout CTA -->
    <div class="mt-14 text-center">
      <p class="text-sm font-semibold text-[#5B5F6B] mb-4">
        Ready to see your business’s 90-Day Growth Roadmap?
      </p>
      <a href="#audit-form" class="btn-primary !py-3 !px-8">
        <span>Get Your Customized 90-Day Plan</span>
        <i data-lucide="arrow-right" class="w-4 h-4"></i>
      </a>
    </div>

  </div>
</section>
