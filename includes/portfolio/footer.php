<?php
/**
 * Footer Component for Portfolio Landing Page
 */
$base_path = function_exists('get_base_path') ? get_base_path() : '/';
$logo_path = $base_path . 'assets/images/digital4local_logo.png';
$gbp_url = $p_cfg['gbp_url'];
$insta_url = $p_cfg['instagram_url'];
$clean_phone = $p_cfg['whatsapp_number_clean'];
$email = $p_cfg['email'];
?>
<footer class="bg-[#14151A] text-white pt-16 pb-12 border-t border-slate-800 relative z-10" id="footer">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">
      
      <!-- Column 1 & 2: Brand, Positioning & Badges -->
      <div class="lg:col-span-2 space-y-4">
        <a href="<?php echo $base_path; ?>index.php" class="inline-block" aria-label="Digital4Local Home">
          <img src="<?php echo $logo_path; ?>" alt="Digital4Local" class="h-10 sm:h-12 w-auto object-contain brightness-0 invert" width="180" height="48">
        </a>
        <p class="text-xs sm:text-sm text-slate-400 leading-relaxed max-w-sm">
          Digital4Local is Bhopal’s premier AI-driven digital marketing and Local SEO agency. We rank local businesses, clinics, institutes, and showrooms #1 on Google Maps and drive qualified enquiries.
        </p>
        <div class="flex items-center gap-3 pt-2">
          <a href="<?php echo $gbp_url; ?>" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-white/10 hover:bg-[#00F0FF] hover:text-[#14151A] transition-all flex items-center justify-center text-slate-300" title="Google Business Profile" aria-label="Google Business Profile">
            <i data-lucide="map-pin" class="w-4 h-4"></i>
          </a>
          <a href="<?php echo $insta_url; ?>" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-white/10 hover:bg-pink-600 hover:text-white transition-all flex items-center justify-center text-slate-300" title="Instagram" aria-label="Instagram">
            <i data-lucide="instagram" class="w-4 h-4"></i>
          </a>
          <a href="https://wa.me/<?php echo $clean_phone; ?>" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-white/10 hover:bg-[#25D366] hover:text-white transition-all flex items-center justify-center text-slate-300" title="WhatsApp" aria-label="WhatsApp">
            <i data-lucide="message-circle" class="w-4 h-4"></i>
          </a>
        </div>
      </div>

      <!-- Column 3: Quick Navigation -->
      <div>
        <h4 class="text-xs font-black uppercase tracking-widest text-[#00F0FF] mb-4">
          Quick Links
        </h4>
        <ul class="space-y-2.5 text-xs sm:text-sm text-slate-400" role="list">
          <li><a href="#services" class="hover:text-[#00F0FF] transition-colors">Core Services</a></li>
          <li><a href="#system" class="hover:text-[#00F0FF] transition-colors">Growth System</a></li>
          <li><a href="#results" class="hover:text-[#00F0FF] transition-colors">Client Results</a></li>
          <li><a href="#reviews" class="hover:text-[#00F0FF] transition-colors">Google Reviews</a></li>
          <li><a href="#pricing" class="hover:text-[#00F0FF] transition-colors">Monthly Pricing</a></li>
          <li><a href="#calculator" class="hover:text-[#00F0FF] transition-colors">ROI Calculator</a></li>
          <li><a href="#faq" class="hover:text-[#00F0FF] transition-colors">FAQs</a></li>
        </ul>
      </div>

      <!-- Column 4: Industries We Serve -->
      <div>
        <h4 class="text-xs font-black uppercase tracking-widest text-[#00F0FF] mb-4">
          Industries in Bhopal
        </h4>
        <ul class="space-y-2.5 text-xs sm:text-sm text-slate-400" role="list">
          <li><a href="#industries" class="hover:text-[#00F0FF] transition-colors">Clinics & Dentists</a></li>
          <li><a href="#industries" class="hover:text-[#00F0FF] transition-colors">Coaching Institutes</a></li>
          <li><a href="#industries" class="hover:text-[#00F0FF] transition-colors">Restaurants & Cafés</a></li>
          <li><a href="#industries" class="hover:text-[#00F0FF] transition-colors">Real Estate & Plots</a></li>
          <li><a href="#industries" class="hover:text-[#00F0FF] transition-colors">Salons, Spas & Gyms</a></li>
          <li><a href="#industries" class="hover:text-[#00F0FF] transition-colors">Showrooms & Retail</a></li>
        </ul>
      </div>

      <!-- Column 5: Office & Contact -->
      <div>
        <h4 class="text-xs font-black uppercase tracking-widest text-[#00F0FF] mb-4">
          Bhopal Agency Hub
        </h4>
        <div class="space-y-3 text-xs text-slate-400">
          <p>
            <strong class="text-white block">Location:</strong>
            Sant Aasharam Nagar, Bagmugaliya, Bhopal, MP 462043
          </p>
          <p>
            <strong class="text-white block">WhatsApp:</strong>
            <a href="https://wa.me/<?php echo $clean_phone; ?>" class="hover:text-[#00F0FF]"><?php echo htmlspecialchars($p_cfg['whatsapp_number']); ?></a>
          </p>
          <p>
            <strong class="text-white block">Email:</strong>
            <a href="mailto:<?php echo $email; ?>" class="hover:text-[#00F0FF]"><?php echo htmlspecialchars($email); ?></a>
          </p>
        </div>
      </div>

    </div>

    <!-- Bottom Copyright -->
    <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
      <p>© <?php echo date('Y'); ?> Digital4Local. All rights reserved. Registered Digital Marketing Agency.</p>
      <div class="flex items-center gap-6">
        <a href="<?php echo $base_path; ?>page/privacy-policy" class="hover:text-slate-300 transition-colors">Privacy Policy</a>
        <a href="<?php echo $base_path; ?>page/terms-of-service" class="hover:text-slate-300 transition-colors">Terms of Service</a>
        <a href="#hero" class="hover:text-[#00F0FF] transition-colors flex items-center gap-1">
          <span>Back to Top</span>
          <i data-lucide="arrow-up" class="w-3.5 h-3.5"></i>
        </a>
      </div>
    </div>

  </div>
</footer>
