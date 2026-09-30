<?php
/**
 * Comparison Table: Typical Agency vs Digital4Local
 */
$comp_rows = $p_cfg['comparison_table'];
?>
<section class="py-20 sm:py-28 bg-[#F6F8FB] border-y border-[#E4E7EC] relative overflow-hidden" id="comparison">
  
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30 mb-4">
        <i data-lucide="scale" class="w-3.5 h-3.5"></i>
        <span>Why Businesses Switch To Us</span>
      </div>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#14151A] tracking-tight font-display mb-4">
        Typical Agency vs <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00A8B5] to-[#0284C7]">Digital4Local</span>
      </h2>
      <p class="text-base sm:text-lg text-[#5B5F6B] leading-relaxed">
        See why local business owners in Bhopal are tired of vanity metrics and choosing our ROI-focused growth engineering model.
      </p>
    </div>

    <!-- Comparison Table Card -->
    <div class="bg-white border-2 border-[#E4E7EC] rounded-3xl overflow-hidden shadow-xl" data-aos="fade-up">
      
      <!-- Table Header -->
      <div class="grid grid-cols-12 bg-[#14151A] text-white p-4 sm:p-6 items-center text-xs sm:text-sm font-bold tracking-wider uppercase">
        <div class="col-span-4 sm:col-span-3 text-slate-400">Feature / Standard</div>
        <div class="col-span-4 sm:col-span-4 text-center sm:text-left text-red-400">Typical Agency</div>
        <div class="col-span-4 sm:col-span-5 text-center sm:text-left text-[#00F0FF] flex items-center justify-center sm:justify-start gap-1.5">
          <i data-lucide="sparkles" class="w-4 h-4"></i>
          <span>Digital4Local</span>
        </div>
      </div>

      <!-- Table Rows -->
      <div class="divide-y divide-[#E4E7EC]">
        <?php foreach ($comp_rows as $idx => $row): ?>
          <div class="grid grid-cols-12 p-4 sm:p-6 items-center text-xs sm:text-sm hover:bg-[#F6F8FB] transition-colors <?php echo $idx % 2 === 1 ? 'bg-slate-50/50' : ''; ?>">
            
            <!-- Feature Title -->
            <div class="col-span-4 sm:col-span-3 font-bold text-[#14151A]">
              <?php echo htmlspecialchars($row['feature']); ?>
            </div>

            <!-- Typical Agency Column (Negative Red) -->
            <div class="col-span-4 sm:col-span-4 flex items-start gap-2 text-slate-500 pr-2">
              <span class="w-5 h-5 rounded-full bg-red-100 text-red-600 flex items-center justify-center shrink-0 mt-0.5 font-black text-xs">
                ✕
              </span>
              <span class="text-xs sm:text-sm leading-tight text-slate-600">
                <?php echo htmlspecialchars($row['typical']); ?>
              </span>
            </div>

            <!-- Digital4Local Column (Positive Highlighted Cyan) -->
            <div class="col-span-4 sm:col-span-5 flex items-start gap-2 bg-[#00F0FF]/10 p-2.5 sm:p-3 rounded-xl border border-[#00F0FF]/30 text-[#14151A] font-semibold">
              <span class="w-5 h-5 rounded-full bg-[#00A8B5] text-white flex items-center justify-center shrink-0 mt-0.5 font-black text-xs shadow-sm">
                ✓
              </span>
              <span class="text-xs sm:text-sm leading-tight text-[#008A94] font-bold">
                <?php echo htmlspecialchars($row['d4l']); ?>
              </span>
            </div>

          </div>
        <?php endforeach; ?>
      </div>

      <!-- Table Footer CTA -->
      <div class="bg-[#F6F8FB] p-6 text-center border-t border-[#E4E7EC]">
        <p class="text-xs sm:text-sm text-[#5B5F6B] mb-3">
          Get transparent, data-driven marketing with a dedicated Bhopal strategy team.
        </p>
        <a href="#audit-form" class="btn-primary !py-2.5 !px-6 !text-xs sm:!text-sm">
          <span>Switch to Predictable Growth</span>
          <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
      </div>

    </div>

  </div>
</section>
