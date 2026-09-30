<?php
/**
 * Google Business Profile & Find Us Map Component
 */
$gbp_url = $p_cfg['gbp_url'];
?>
<section class="py-16 sm:py-24 bg-[#FFFFFF] relative overflow-hidden" id="location">
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="bg-gradient-to-br from-[#F6F8FB] to-[#FFFFFF] border-2 border-[#E4E7EC] rounded-3xl p-6 sm:p-10 shadow-lg" data-aos="fade-up">
      
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
        
        <!-- Left Column: Business Details, Address, Actions -->
        <div class="lg:col-span-5 space-y-6 text-left">
          
          <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30">
            <i data-lucide="map-pin" class="w-3.5 h-3.5"></i>
            <span>Headquarters & Local Presence</span>
          </div>

          <div>
            <h3 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] mb-2 font-display">
              Digital4Local Agency Hub
            </h3>
            <p class="text-xs sm:text-sm text-[#5B5F6B]">
              Bhopal’s Premier AI Search & Local SEO Agency
            </p>
          </div>

          <!-- Address & Service Areas -->
          <div class="space-y-3 pt-2">
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 rounded-lg bg-[#00F0FF]/20 text-[#008A94] flex items-center justify-center shrink-0 mt-0.5">
                <i data-lucide="building" class="w-4 h-4"></i>
              </div>
              <div class="text-xs sm:text-sm text-[#14151A]">
                <strong class="block text-[#14151A]">Office Address:</strong>
                <?php echo htmlspecialchars($p_cfg['address']); ?>
              </div>
            </div>

            <div class="flex items-start gap-3">
              <div class="w-8 h-8 rounded-lg bg-[#16A34A]/20 text-[#16A34A] flex items-center justify-center shrink-0 mt-0.5">
                <i data-lucide="globe" class="w-4 h-4"></i>
              </div>
              <div class="text-xs sm:text-sm text-[#14151A]">
                <strong class="block text-[#14151A]">Service Area:</strong>
                <span>Bhopal & across India · UK clients served remotely</span>
              </div>
            </div>

            <div class="flex items-start gap-3">
              <div class="w-8 h-8 rounded-lg bg-[#8B5CF6]/20 text-[#8B5CF6] flex items-center justify-center shrink-0 mt-0.5">
                <i data-lucide="clock" class="w-4 h-4"></i>
              </div>
              <div class="text-xs sm:text-sm text-[#14151A]">
                <strong class="block text-[#14151A]">Working Hours:</strong>
                <span>Monday – Saturday: 09:00 AM – 07:00 PM IST</span>
              </div>
            </div>
          </div>

          <!-- Buttons -->
          <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-4 border-t border-[#E4E7EC]">
            <a href="<?php echo $gbp_url; ?>" target="_blank" rel="noopener noreferrer" class="btn-primary !py-2.5 !px-5 !text-xs text-center">
              <i data-lucide="map" class="w-4 h-4"></i>
              <span>Find us on Google</span>
            </a>
            
            <a href="tel:<?php echo $p_cfg['whatsapp_number']; ?>" class="btn-secondary !py-2.5 !px-5 !text-xs text-center">
              <i data-lucide="phone" class="w-4 h-4 text-[#16A34A]"></i>
              <span>Call: <?php echo htmlspecialchars($p_cfg['whatsapp_number']); ?></span>
            </a>
          </div>

        </div>

        <!-- Right Column: Lazy-Loaded Responsive Google Map -->
        <div class="lg:col-span-7">
          <div class="w-full h-80 sm:h-96 rounded-2xl overflow-hidden border-2 border-[#E4E7EC] shadow-inner relative bg-[#E4E7EC]">
            <!-- Embedded Google Map -->
            <iframe 
              src="https://maps.google.com/maps?q=Digital4local%20Bhopal&t=&z=14&ie=UTF8&iwloc=&output=embed" 
              class="w-full h-full border-0" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade"
              title="Digital4Local Location on Google Maps">
            </iframe>
          </div>
        </div>

      </div>

    </div>

  </div>
</section>
