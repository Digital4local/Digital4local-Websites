<?php
/**
 * Services Section Component - 6 Core Offerings + Add-on Services Strip
 */
?>
<section class="py-20 sm:py-28 bg-[#FFFFFF] relative overflow-hidden" id="services">
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30 mb-4">
        <i data-lucide="layers" class="w-3.5 h-3.5"></i>
        <span>Complete Local Growth Engine</span>
      </div>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#14151A] tracking-tight font-display mb-4">
        Everything your business needs to <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00A8B5] to-[#0284C7]">dominate Bhopal</span>
      </h2>
      <p class="text-base sm:text-lg text-[#5B5F6B] leading-relaxed">
        No fragmented freelancers. No confusing technical jargon. We manage the entire digital footprint that drives real walk-ins, phone calls, and booked appointments.
      </p>
    </div>

    <!-- 6 Core Services Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-14">
      <?php foreach ($p_cfg['services'] as $idx => $srv): ?>
        <div class="card-dark p-7 flex flex-col justify-between border border-[#E4E7EC] hover:border-[#00A8B5] rounded-2xl transition-all duration-300 group hover:-translate-y-1.5 shadow-sm hover:shadow-xl bg-[#FFFFFF]" data-aos="fade-up" data-aos-delay="<?php echo $idx * 80; ?>">
          
          <div>
            <!-- Icon Badge with Accent Theme -->
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#00F0FF]/20 to-[#00A8B5]/10 text-[#008A94] border border-[#00F0FF]/40 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-[#00A8B5] group-hover:text-white transition-all duration-300 shadow-sm">
              <i data-lucide="<?php echo $srv['icon']; ?>" class="w-7 h-7"></i>
            </div>

            <!-- Title -->
            <h3 class="text-xl font-bold text-[#14151A] leading-snug mb-2 group-hover:text-[#00A8B5] transition-colors">
              <?php echo htmlspecialchars($srv['title']); ?>
            </h3>

            <!-- 1-Line Benefit -->
            <p class="text-sm font-semibold text-[#008A94] bg-[#00F0FF]/10 px-3 py-1.5 rounded-lg mb-5 inline-block">
              <?php echo htmlspecialchars($srv['benefit']); ?>
            </p>

            <!-- 3 Bullet Points -->
            <ul class="space-y-3 mb-6" role="list">
              <?php foreach ($srv['bullets'] as $bullet): ?>
                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-[#5B5F6B]">
                  <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5 font-bold"></i>
                  <span><?php echo htmlspecialchars($bullet); ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <!-- Bottom Action Link -->
          <div class="pt-4 border-t border-[#E4E7EC] flex items-center justify-between">
            <span class="text-xs font-bold text-[#5B5F6B] group-hover:text-[#14151A]">
              Included in Monthly Plans
            </span>
            <a href="#pricing" class="inline-flex items-center gap-1 text-xs font-bold text-[#00A8B5] hover:underline" aria-label="View pricing for <?php echo htmlspecialchars($srv['title']); ?>">
              <span>See Plans</span>
              <i data-lucide="chevron-right" class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform"></i>
            </a>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

    <!-- Also Available Smaller Strip -->
    <div class="bg-gradient-to-r from-[#F6F8FB] via-[#EAF9FA] to-[#F6F8FB] border border-[#00F0FF]/30 rounded-2xl p-6 sm:p-8 flex flex-col lg:flex-row items-center justify-between gap-6 shadow-sm" data-aos="fade-up">
      <div class="flex items-center gap-3 text-center lg:text-left">
        <div class="w-10 h-10 rounded-full bg-[#00F0FF]/20 text-[#008A94] flex items-center justify-center shrink-0">
          <i data-lucide="plus-circle" class="w-5 h-5"></i>
        </div>
        <div>
          <h4 class="text-sm sm:text-base font-bold text-[#14151A]">Also Available as Add-ons & Custom Builds:</h4>
          <p class="text-xs text-[#5B5F6B]">Flexible solutions tailored to multi-branch expansion & rapid scaling.</p>
        </div>
      </div>

      <div class="flex flex-wrap items-center justify-center gap-2">
        <?php foreach ($p_cfg['additional_services_strip'] as $add_srv): ?>
          <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold bg-[#FFFFFF] text-[#14151A] border border-[#E4E7EC] shadow-sm">
            <i data-lucide="sparkle" class="w-3 h-3 text-[#00A8B5]"></i>
            <span><?php echo htmlspecialchars($add_srv); ?></span>
          </span>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>
