<?php
/**
 * Add-Ons & Standalone Services Menu Component
 */
$addons = $p_cfg['addons'];
$clean_phone = $p_cfg['whatsapp_number_clean'];
?>
<section class="py-16 sm:py-24 bg-[#FFFFFF] relative overflow-hidden" id="addons">
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30 mb-4">
        <i data-lucide="plus-circle" class="w-3.5 h-3.5"></i>
        <span>Flexible Upgrades</span>
      </div>
      <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A] tracking-tight font-display mb-3">
        Add-ons & <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00A8B5] to-[#0284C7]">Modular Services</span>
      </h2>
      <p class="text-xs sm:text-sm text-[#5B5F6B]">
        Need a specific one-time sprint or custom asset? Pick standalone add-ons at transparent rates.
      </p>
    </div>

    <!-- Addons Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
      <?php foreach ($addons as $idx => $addon): 
        $addon_msg = "Hi Digital4Local, I want to book the {$addon['name']} ({$addon['price']}) add-on.";
        $addon_wa = "https://wa.me/{$clean_phone}?text=" . urlencode($addon_msg);
      ?>
        <div class="bg-[#F6F8FB] border border-[#E4E7EC] hover:border-[#00A8B5] rounded-2xl p-5 flex flex-col justify-between hover:shadow-lg transition-all duration-300 group" data-aos="fade-up" data-aos-delay="<?php echo $idx * 50; ?>">
          
          <div>
            <div class="flex items-center justify-between mb-3">
              <span class="w-8 h-8 rounded-lg bg-[#00F0FF]/20 text-[#008A94] flex items-center justify-center font-bold text-xs">
                +
              </span>
              <span class="text-xs font-black text-[#008A94] bg-white px-2.5 py-1 rounded-lg border border-[#E4E7EC]">
                <?php echo htmlspecialchars($addon['price']); ?>
              </span>
            </div>

            <h3 class="font-bold text-sm text-[#14151A] mb-2 group-hover:text-[#00A8B5] transition-colors">
              <?php echo htmlspecialchars($addon['name']); ?>
            </h3>

            <p class="text-xs text-[#5B5F6B] leading-relaxed mb-4">
              <?php echo htmlspecialchars($addon['desc']); ?>
            </p>
          </div>

          <div class="pt-3 border-t border-[#E4E7EC]">
            <a href="<?php echo $addon_wa; ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-between w-full text-[11px] font-bold text-[#008A94] hover:text-[#00A8B5]">
              <span>Book this Add-on</span>
              <i data-lucide="arrow-right" class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform"></i>
            </a>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
