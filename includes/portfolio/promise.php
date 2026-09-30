<?php
/**
 * Our 90-Day Results Guarantee & Promise Component
 */
$promise = $p_cfg['promise'];
?>
<section class="py-16 sm:py-24 bg-[#F6F8FB] border-t border-[#E4E7EC] relative overflow-hidden" id="promise">
  
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="bg-gradient-to-br from-[#FFFFFF] via-[#EAF9FA] to-[#FFFFFF] border-3 border-[#00A8B5] rounded-3xl p-8 sm:p-12 shadow-2xl relative overflow-hidden text-center" data-aos="zoom-in">
      
      <!-- Top Guarantee Badge -->
      <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs sm:text-sm font-black uppercase tracking-widest bg-[#00A8B5] text-white shadow-md mb-6">
        <i data-lucide="shield-check" class="w-4 h-4"></i>
        <span><?php echo htmlspecialchars($promise['badge']); ?></span>
      </div>

      <!-- Headline -->
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#14151A] tracking-tight font-display mb-4 max-w-3xl mx-auto leading-snug">
        <?php echo htmlspecialchars($promise['headline']); ?>
      </h2>

      <!-- Subtext Small Print -->
      <p class="text-xs sm:text-sm text-[#5B5F6B] max-w-2xl mx-auto leading-relaxed mb-8">
        <?php echo htmlspecialchars($promise['subtext']); ?>
      </p>

      <!-- Trust Pillars Row -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-6 border-t border-[#00F0FF]/30 text-left">
        
        <div class="flex items-center gap-3 bg-white/80 p-3.5 rounded-xl border border-[#E4E7EC]">
          <div class="w-8 h-8 rounded-lg bg-[#16A34A]/20 text-[#16A34A] flex items-center justify-center shrink-0">
            <i data-lucide="check" class="w-4 h-4 font-bold"></i>
          </div>
          <span class="text-xs font-bold text-[#14151A]">No Long-Term Lock-in</span>
        </div>

        <div class="flex items-center gap-3 bg-white/80 p-3.5 rounded-xl border border-[#E4E7EC]">
          <div class="w-8 h-8 rounded-lg bg-[#00F0FF]/20 text-[#008A94] flex items-center justify-center shrink-0">
            <i data-lucide="award" class="w-4 h-4 font-bold"></i>
          </div>
          <span class="text-xs font-bold text-[#14151A]">100% White-Hat Optimization</span>
        </div>

        <div class="flex items-center gap-3 bg-white/80 p-3.5 rounded-xl border border-[#E4E7EC]">
          <div class="w-8 h-8 rounded-lg bg-[#8B5CF6]/20 text-[#8B5CF6] flex items-center justify-center shrink-0">
            <i data-lucide="lock" class="w-4 h-4 font-bold"></i>
          </div>
          <span class="text-xs font-bold text-[#14151A]">Dedicated Bhopal Support</span>
        </div>

      </div>

    </div>

  </div>
</section>
