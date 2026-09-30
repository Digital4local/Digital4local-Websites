<?php
/**
 * Industry Playbooks for Bhopal Businesses Component
 */
$playbooks = $p_cfg['industry_playbooks'];
$clean_phone = $p_cfg['whatsapp_number_clean'];
?>
<section class="py-20 sm:py-28 bg-[#FFFFFF] relative overflow-hidden" id="industries">
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30 mb-4">
        <i data-lucide="briefcase" class="w-3.5 h-3.5"></i>
        <span>Niche Expertise</span>
      </div>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#14151A] tracking-tight font-display mb-4">
        Built for <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00A8B5] via-[#00F0FF] to-[#0284C7]">Bhopal businesses</span>
      </h2>
      <p class="text-base sm:text-lg text-[#5B5F6B] leading-relaxed">
        Every industry has different buyer behaviors. Click your category to see how our tailored local growth playbook attracts your exact customers.
      </p>
    </div>

    <!-- 6 Industry Playbook Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
      <?php foreach ($playbooks as $idx => $pb): 
        $wa_industry_link = "https://wa.me/{$clean_phone}?text=" . urlencode($pb['whatsapp_msg']);
      ?>
        <div class="bg-[#F6F8FB] border border-[#E4E7EC] hover:border-[#00A8B5] rounded-2xl p-7 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="<?php echo $idx * 80; ?>">
          
          <div>
            <!-- Top Icon -->
            <div class="w-12 h-12 rounded-xl bg-white border border-[#E4E7EC] text-[#008A94] flex items-center justify-center mb-5 group-hover:bg-[#00A8B5] group-hover:text-white group-hover:scale-110 transition-all shadow-sm">
              <i data-lucide="<?php echo $pb['icon']; ?>" class="w-6 h-6"></i>
            </div>

            <!-- Title & Tagline -->
            <h3 class="text-xl font-bold text-[#14151A] mb-1 group-hover:text-[#00A8B5] transition-colors">
              <?php echo htmlspecialchars($pb['title']); ?>
            </h3>
            <div class="text-xs font-semibold text-[#008A94] mb-4">
              <?php echo htmlspecialchars($pb['tagline']); ?>
            </div>

            <!-- Strategic Approach -->
            <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed mb-6">
              <?php echo htmlspecialchars($pb['approach']); ?>
            </p>
          </div>

          <!-- Bottom WhatsApp CTA -->
          <div class="pt-4 border-t border-[#E4E7EC]">
            <a href="<?php echo $wa_industry_link; ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-between w-full text-xs font-bold text-[#008A94] hover:text-[#00A8B5] group-hover:underline">
              <span>Chat About Your Business</span>
              <div class="flex items-center gap-1 text-[#16A34A]">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                <i data-lucide="arrow-right" class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform"></i>
              </div>
            </a>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
