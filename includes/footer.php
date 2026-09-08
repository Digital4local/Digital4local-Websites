<?php
require_once __DIR__ . '/site-config.php';
$footer_base_path = get_base_path();
$footer_logo_rel_path = ltrim($site_config['brand']['logo_path'], '/');
?>
<!-- Global Footer -->
<footer class="bg-[#F8FAFC] border-t border-[#E4E7EC] text-[#14151A] pt-16 pb-12 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-[#E4E7EC]">
      
      <!-- Brand Info Column -->
      <div class="lg:col-span-2 space-y-4">
        <a href="<?php echo $footer_base_path; ?>index.php" class="inline-block" aria-label="Digital4Local Home">
          <img src="<?php echo $footer_base_path . htmlspecialchars($footer_logo_rel_path); ?>" onerror="this.onerror=null; if(!this.dataset.retried){this.dataset.retried='1';this.src='/assets/images/digital4local_logo.png';}else if(this.dataset.retried==='1'){this.dataset.retried='2';this.src='../assets/images/digital4local_logo.png';}" alt="<?php echo htmlspecialchars($site_config['brand']['logo_alt']); ?>" class="<?php echo htmlspecialchars($site_config['brand']['logo_footer_height']); ?> w-auto object-contain">
        </a>
        <p class="text-[#5B5F6B] leading-relaxed max-w-sm">
          <?php echo htmlspecialchars($site_config['footer']['description']); ?>
        </p>

        <!-- Global Locations Summary (City, Country Only) -->
        <div class="space-y-1.5 pt-1 text-xs">
          <div class="font-mono text-[#14151A] font-bold uppercase tracking-wider text-[11px]">Global Hubs</div>
          <div class="flex flex-wrap items-center gap-2 text-[#5B5F6B]">
            <?php foreach ($site_config['contact']['hubs'] as $hub): ?>
              <span class="inline-flex items-center gap-1 bg-[#FFFFFF] border border-[#E4E7EC] px-2.5 py-1 rounded-md text-[11px] font-semibold text-[#14151A]">
                <i data-lucide="map-pin" class="w-3 h-3 text-[#00A8B5]"></i> <?php echo htmlspecialchars($hub['city'] . ', ' . $hub['country']); ?>
              </span>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Official Contact Emails -->
        <div class="space-y-1.5 pt-2 text-xs">
          <div class="font-mono text-[#14151A] font-bold uppercase tracking-wider text-[11px]">Official Contact Emails</div>
          <div class="flex flex-col gap-1 text-[#00A8B5] font-semibold">
            <a href="mailto:<?php echo htmlspecialchars($site_config['contact']['email_primary']); ?>" class="hover:underline flex items-center gap-1.5">
              <i data-lucide="mail" class="w-3.5 h-3.5 text-[#00A8B5]"></i> <?php echo htmlspecialchars($site_config['contact']['email_primary']); ?>
            </a>
            <a href="mailto:<?php echo htmlspecialchars($site_config['contact']['email_secondary']); ?>" class="hover:underline flex items-center gap-1.5">
              <i data-lucide="mail" class="w-3.5 h-3.5 text-[#00A8B5]"></i> <?php echo htmlspecialchars($site_config['contact']['email_secondary']); ?>
            </a>
          </div>
        </div>

        <div class="flex items-center gap-3 pt-2">
          <span class="pulse-badge">
            <span class="pulse-dot"></span> ALL SYSTEMS OPERATIONAL
          </span>
          <span class="text-xs font-mono text-[#5B5F6B]">24/7 Operations</span>
        </div>
      </div>

      <!-- Services Column -->
      <div class="space-y-3">
        <div class="text-xs font-mono text-[#14151A] uppercase tracking-wider font-bold">Services</div>
        <ul class="space-y-2 text-[#5B5F6B] text-xs">
          <li><a href="<?php echo $footer_base_path; ?>services/local-seo.php" class="hover:text-[#00A8B5] transition-colors">Local SEO & Google Maps</a></li>
          <li><a href="<?php echo $footer_base_path; ?>services/geo-aeo.php" class="hover:text-[#00A8B5] transition-colors">GEO & AEO Optimization</a></li>
          <li><a href="<?php echo $footer_base_path; ?>services/technical-seo.php" class="hover:text-[#00A8B5] transition-colors">Technical SEO Audit</a></li>
          <li><a href="<?php echo $footer_base_path; ?>services/link-building-pr.php" class="hover:text-[#00A8B5] transition-colors">Link Building & Digital PR</a></li>
          <li><a href="<?php echo $footer_base_path; ?>services/ai-marketing.php" class="hover:text-[#00A8B5] transition-colors">AI Digital Marketing</a></li>
          <li><a href="<?php echo $footer_base_path; ?>services/social-media.php" class="hover:text-[#00A8B5] transition-colors">Social Media Growth</a></li>
          <li><a href="<?php echo $footer_base_path; ?>services/web-development.php" class="hover:text-[#00A8B5] transition-colors font-semibold">Web Development</a></li>
          <li><a href="<?php echo $footer_base_path; ?>services/app-development.php" class="hover:text-[#00A8B5] transition-colors font-semibold">App Development</a></li>
        </ul>
      </div>

      <!-- Industries & Agency Column -->
      <div class="space-y-3">
        <div class="text-xs font-mono text-[#14151A] uppercase tracking-wider font-bold">Platform & Agency</div>
        <ul class="space-y-2 text-[#5B5F6B] text-xs">
          <li><a href="<?php echo $footer_base_path; ?>industries/solar-installers-seo.php" class="hover:text-[#00A8B5] transition-colors">Solar Installers SEO</a></li>
          <li><a href="<?php echo $footer_base_path; ?>industries/dental-clinics-seo.php" class="hover:text-[#00A8B5] transition-colors">Dental Clinics SEO</a></li>
          <li><a href="<?php echo $footer_base_path; ?>industries/aesthetics-clinics-seo.php" class="hover:text-[#00A8B5] transition-colors">Aesthetics Clinics SEO</a></li>
          <li><a href="<?php echo $footer_base_path; ?>industries/index.php" class="hover:text-[#00A8B5] transition-colors font-semibold text-[#1B5FAA]">View All 16 Verticals →</a></li>
          <li><a href="<?php echo $footer_base_path; ?>pricing.php" class="hover:text-[#00A8B5] transition-colors">Pricing & Plans</a></li>
          <li><a href="<?php echo $footer_base_path; ?>about.php" class="hover:text-[#00A8B5] transition-colors">About & Tech Stack</a></li>
          <li><a href="<?php echo $footer_base_path; ?>blog.php" class="hover:text-[#00A8B5] transition-colors font-semibold">Blog & Playbooks</a></li>
          <li><a href="<?php echo $footer_base_path; ?>admin-cms.php" class="text-[#00A8B5] font-bold hover:underline transition-colors flex items-center gap-1"><i data-lucide="layers" class="w-3.5 h-3.5"></i> Page Manager CMS</a></li>
          <li><a href="<?php echo $footer_base_path; ?>admin.php" class="text-[#475569] font-medium hover:text-[#0F172A] transition-colors flex items-center gap-1"><i data-lucide="layout-dashboard" class="w-3.5 h-3.5"></i> CRM & Leads Admin</a></li>
        </ul>
      </div>

      <!-- Newsletter Column -->
      <div class="space-y-3">
        <div class="text-xs font-mono text-[#14151A] uppercase tracking-wider font-bold">AI Insights Newsletter</div>
        <p class="text-xs text-[#5B5F6B]">Get weekly GEO algorithms updates and AI growth teardowns.</p>
        <form onsubmit="event.preventDefault(); alert('Subscribed to Digital4Local AI Insights!');" class="pt-1">
          <div class="flex items-center bg-[#FFFFFF] border border-[#E4E7EC] focus-within:border-[#00A8B5] rounded-full p-1 shadow-sm transition-all focus-within:shadow-md">
            <input type="email" placeholder="enter@email.com" required class="w-full bg-transparent px-3.5 py-2 text-xs text-[#14151A] placeholder-[#8B909D] outline-none font-mono">
            <button type="submit" class="btn-primary rounded-full px-4 py-2 text-xs font-bold whitespace-nowrap shadow-sm">
              Subscribe <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </button>
          </div>
        </form>
      </div>

    </div>

    <!-- Bottom Bar -->
    <div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-[#5B5F6B]">
      <div>
        <?php echo htmlspecialchars($site_config['footer']['copyright']); ?>
      </div>
      <div class="flex items-center gap-6">
        <a href="<?php echo $footer_base_path; ?>index.php" class="hover:text-[#14151A] transition-colors">Privacy Policy</a>
        <a href="<?php echo $footer_base_path; ?>index.php" class="hover:text-[#14151A] transition-colors">Terms of Service</a>
        <a href="<?php echo $footer_base_path; ?>admin-cms.php" class="hover:text-[#00A8B5] transition-colors font-bold">CMS Manager</a>
      </div>
      <div class="flex items-center gap-4 text-[#14151A]">
        <a href="https://twitter.com/digital4local" target="_blank" class="p-2 hover:bg-[#EEF2F6] rounded-full transition-colors"><i data-lucide="twitter" class="w-4 h-4"></i></a>
        <a href="https://linkedin.com/company/digital4local" target="_blank" class="p-2 hover:bg-[#EEF2F6] rounded-full transition-colors"><i data-lucide="linkedin" class="w-4 h-4"></i></a>
        <a href="https://github.com/digital4local" target="_blank" class="p-2 hover:bg-[#EEF2F6] rounded-full transition-colors"><i data-lucide="github" class="w-4 h-4"></i></a>
      </div>
    </div>
  </div>
</footer>

<!-- Include Book Demo Multi-Step Modal -->
<?php include_once __DIR__ . '/book-demo-modal.php'; ?>

<!-- AOS Animation Library JS -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<!-- Include Main Interactive JS -->
<?php
$js_path = $footer_base_path . 'assets/js/main.js';
?>
<script src="<?php echo $js_path; ?>"></script>
<script>
  // Initialize Lucide Icons & AOS Animations
  if (typeof lucide !== 'undefined') {
    lucide.createIcons();
  }
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 800,
      easing: 'ease-in-out-cubic',
      once: true,
      offset: 50
    });
  }
</script>
