<?php
require_once __DIR__ . '/site-config.php';
$base_path = get_base_path();
$current_page = basename($_SERVER['PHP_SELF']);
$logo_rel_path = ltrim($site_config['brand']['logo_path'], '/');
?>
<header id="main-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-3 px-4 sm:px-8 bg-[#FFFFFF]/95 backdrop-blur-md border-b border-[#E4E7EC] shadow-sm">
  <div class="max-w-7xl mx-auto flex items-center justify-between">
    
    <!-- Official Digital4Local Brand Logo -->
    <a href="<?php echo $base_path; ?>index.php" class="flex items-center group py-1" aria-label="Digital4Local Home">
      <img src="<?php echo $base_path . htmlspecialchars($logo_rel_path); ?>" onerror="this.onerror=null; if(!this.dataset.retried){this.dataset.retried='1';this.src='/assets/images/digital4local_logo.png';}else if(this.dataset.retried==='1'){this.dataset.retried='2';this.src='../assets/images/digital4local_logo.png';}" alt="<?php echo htmlspecialchars($site_config['brand']['logo_alt']); ?>" class="<?php echo htmlspecialchars($site_config['brand']['logo_header_height']); ?> w-auto object-contain group-hover:scale-105 transition-transform duration-200">
    </a>

    <!-- Desktop Navigation -->
    <nav class="hidden lg:flex items-center gap-8">
      
      <!-- Services Dropdown -->
      <div class="relative group py-2">
        <a href="<?php echo $base_path; ?>services.php" class="flex items-center gap-1.5 text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] transition-colors">
          Services
          <i data-lucide="chevron-down" class="w-4 h-4 text-[#5B5F6B] group-hover:rotate-180 transition-transform duration-200"></i>
        </a>
        <div class="absolute top-full left-0 w-80 bg-[#FFFFFF] border border-[#E4E7EC] rounded-xl p-3 shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-1">
          <a href="<?php echo $base_path; ?>services/local-seo.php" class="flex items-start gap-3 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-8 h-8 rounded-lg bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center shrink-0 mt-0.5">
              <i data-lucide="map-pin" class="w-4 h-4"></i>
            </div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Local SEO & Google Maps</div>
              <div class="text-[11px] text-[#5B5F6B]">Dominate local search & map pack</div>
            </div>
          </a>
          <a href="<?php echo $base_path; ?>services/geo-aeo.php" class="flex items-start gap-3 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-8 h-8 rounded-lg bg-[#00F59B]/20 text-[#16A34A] flex items-center justify-center shrink-0 mt-0.5">
              <i data-lucide="bot" class="w-4 h-4"></i>
            </div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">GEO & AEO Optimization</div>
              <div class="text-[11px] text-[#5B5F6B]">Be cited by ChatGPT & Perplexity</div>
            </div>
          </a>
          <a href="<?php echo $base_path; ?>services/technical-seo.php" class="flex items-start gap-3 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-8 h-8 rounded-lg bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center shrink-0 mt-0.5">
              <i data-lucide="code" class="w-4 h-4"></i>
            </div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Technical SEO</div>
              <div class="text-[11px] text-[#5B5F6B]">Core Web Vitals & Crawl budget</div>
            </div>
          </a>
          <a href="<?php echo $base_path; ?>services/link-building-pr.php" class="flex items-start gap-3 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-8 h-8 rounded-lg bg-[#D97706]/15 text-[#D97706] flex items-center justify-center shrink-0 mt-0.5">
              <i data-lucide="newspaper" class="w-4 h-4"></i>
            </div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Link Building & PR</div>
              <div class="text-[11px] text-[#5B5F6B]">High-DR backlink authority</div>
            </div>
          </a>
          <a href="<?php echo $base_path; ?>services/ai-marketing.php" class="flex items-start gap-3 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-8 h-8 rounded-lg bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center shrink-0 mt-0.5">
              <i data-lucide="cpu" class="w-4 h-4"></i>
            </div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">AI Digital Marketing</div>
              <div class="text-[11px] text-[#5B5F6B]">Automated lead engines & n8n</div>
            </div>
          </a>
          <a href="<?php echo $base_path; ?>services/social-media.php" class="flex items-start gap-3 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-8 h-8 rounded-lg bg-[#EC4899]/15 text-[#EC4899] flex items-center justify-center shrink-0 mt-0.5">
              <i data-lucide="share-2" class="w-4 h-4"></i>
            </div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Social Media Growth</div>
              <div class="text-[11px] text-[#5B5F6B]">Viral brand scaling</div>
            </div>
          </a>
          <!-- Service #7: Web Development -->
          <a href="<?php echo $base_path; ?>services/web-development.php" class="flex items-start gap-3 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors border-t border-[#E4E7EC] mt-1 pt-2">
            <div class="w-8 h-8 rounded-lg bg-[#00A8B5]/15 text-[#00A8B5] flex items-center justify-center shrink-0 mt-0.5">
              <i data-lucide="layout" class="w-4 h-4"></i>
            </div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Web Development</div>
              <div class="text-[11px] text-[#5B5F6B]">High-converting custom sites</div>
            </div>
          </a>
          <!-- Service #8: App Development -->
          <a href="<?php echo $base_path; ?>services/app-development.php" class="flex items-start gap-3 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-8 h-8 rounded-lg bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center shrink-0 mt-0.5">
              <i data-lucide="smartphone" class="w-4 h-4"></i>
            </div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">App Development</div>
              <div class="text-[11px] text-[#5B5F6B]">Scalable web & mobile apps</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Industries Dropdown -->
      <div class="relative group py-2">
        <a href="<?php echo $base_path; ?>industries/index.php" class="flex items-center gap-1.5 text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] transition-colors">
          Industries
          <i data-lucide="chevron-down" class="w-4 h-4 text-[#5B5F6B] group-hover:rotate-180 transition-transform duration-200"></i>
        </a>
        <div class="absolute top-full left-1/2 -translate-x-1/2 w-[540px] bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl p-4 shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-1 grid grid-cols-2 gap-2">
          
          <a href="<?php echo $base_path; ?>industries/solar-installers-seo.php" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#1B5FAA]/10 text-[#1B5FAA] flex items-center justify-center shrink-0 mt-0.5 text-xs">⚡</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Solar Installers</div>
              <div class="text-[10px] text-[#5B5F6B]">Residential & commercial PV</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>industries/heat-pump-installers-seo.php" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#5A9E2F]/10 text-[#5A9E2F] flex items-center justify-center shrink-0 mt-0.5 text-xs">♨️</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Heat Pump Installers</div>
              <div class="text-[10px] text-[#5B5F6B]">Air & ground source heating</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>industries/ev-charger-installers-seo.php" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#00B4D8]/10 text-[#008DA8] flex items-center justify-center shrink-0 mt-0.5 text-xs">🔋</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">EV Charger Installers</div>
              <div class="text-[10px] text-[#5B5F6B]">Wallbox & commercial fleet</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>industries/roofing-companies-seo.php" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#1B5FAA]/10 text-[#1B5FAA] flex items-center justify-center shrink-0 mt-0.5 text-xs">🏠</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Roofing Companies</div>
              <div class="text-[10px] text-[#5B5F6B]">Re-roofs & emergency repairs</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>industries/kitchen-bathroom-renovators-seo.php" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#1B5FAA]/10 text-[#1B5FAA] flex items-center justify-center shrink-0 mt-0.5 text-xs">🚿</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Kitchen & Bath</div>
              <div class="text-[10px] text-[#5B5F6B]">Bespoke luxury renovations</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>industries/loft-conversion-builders-seo.php" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#1B5FAA]/10 text-[#1B5FAA] flex items-center justify-center shrink-0 mt-0.5 text-xs">🏗️</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Loft & Extensions</div>
              <div class="text-[10px] text-[#5B5F6B]">Structural home builds</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>industries/dental-clinics-seo.php" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#00B4D8]/10 text-[#008DA8] flex items-center justify-center shrink-0 mt-0.5 text-xs">🦷</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Private Dental Clinics</div>
              <div class="text-[10px] text-[#5B5F6B]">Invisalign & dental implants</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>industries/aesthetics-clinics-seo.php" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#EC4899]/10 text-[#EC4899] flex items-center justify-center shrink-0 mt-0.5 text-xs">✨</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Aesthetics Clinics</div>
              <div class="text-[10px] text-[#5B5F6B]">Doctor-led cosmetic clinics</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>industries/law-firms-seo.php" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#6B21A8]/10 text-[#6B21A8] flex items-center justify-center shrink-0 mt-0.5 text-xs">⚖️</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Law Firms & Solicitors</div>
              <div class="text-[10px] text-[#5B5F6B]">Personal injury & litigation</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>industries/startup-seo-agency.php" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#10A37F]/10 text-[#10A37F] flex items-center justify-center shrink-0 mt-0.5 text-xs">🚀</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">VC-Backed Startups</div>
              <div class="text-[10px] text-[#5B5F6B]">Seed & Series A category scale</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>industries/saas-marketing-agency.php" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#8B5CF6]/10 text-[#8B5CF6] flex items-center justify-center shrink-0 mt-0.5 text-xs">💻</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">B2B SaaS Companies</div>
              <div class="text-[10px] text-[#5B5F6B]">MRR growth & trial conversions</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>industries/index.php" class="flex items-start gap-2.5 p-2 rounded-lg bg-[#1B5FAA]/5 hover:bg-[#1B5FAA]/10 text-[#1B5FAA] transition-colors border border-[#1B5FAA]/20">
            <div class="w-7 h-7 rounded-lg bg-[#1B5FAA] text-white flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">→</div>
            <div>
              <div class="text-xs font-bold text-[#1B5FAA]">View All 16 Verticals</div>
              <div class="text-[10px] text-[#1B5FAA]/80">Explore industry blueprints</div>
            </div>
          </a>

        </div>
      </div>

      <!-- Locations Dropdown (Bhopal Hub Cluster) -->
      <div class="relative group py-2">
        <a href="<?php echo $base_path; ?>seo-agency-bhopal/" class="flex items-center gap-1.5 text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] transition-colors <?php echo (strpos($_SERVER['REQUEST_URI'] ?? '', 'bhopal') !== false) ? 'text-[#00A8B5]' : ''; ?>">
          <span class="inline-block w-2 h-2 rounded-full bg-[#00A8B5] animate-pulse"></span>
          Locations
          <i data-lucide="chevron-down" class="w-4 h-4 text-[#5B5F6B] group-hover:rotate-180 transition-transform duration-200"></i>
        </a>
        <div class="absolute top-full left-1/2 -translate-x-1/2 w-[380px] bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl p-3 shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-1">
          <div class="px-2 py-1.5 mb-1 border-b border-[#E4E7EC] flex items-center justify-between">
            <span class="text-[11px] font-mono font-bold uppercase tracking-wider text-[#00A8B5]">Bhopal Agency Hub</span>
            <span class="text-[10px] font-mono bg-[#00F0FF]/15 text-[#00A8B5] px-2 py-0.5 rounded font-bold">6 Connected Services</span>
          </div>

          <a href="<?php echo $base_path; ?>seo-agency-bhopal/" class="flex items-start gap-2.5 p-2 rounded-lg bg-[#00A8B5]/5 hover:bg-[#00A8B5]/10 text-[#14151A] transition-colors border border-[#00A8B5]/20 mb-1">
            <div class="w-7 h-7 rounded-lg bg-[#00A8B5] text-white flex items-center justify-center shrink-0 mt-0.5 text-xs font-bold">★</div>
            <div>
              <div class="text-xs font-bold text-[#00A8B5]">SEO Agency in Bhopal <span class="text-[10px] text-amber-700 bg-amber-100 px-1.5 py-0.2 rounded font-mono ml-1">HUB</span></div>
              <div class="text-[10px] text-[#5B5F6B]">Full-funnel search & AI growth engine</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>local-seo-bhopal/" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#00F0FF]/15 text-[#00A8B5] flex items-center justify-center shrink-0 mt-0.5 text-xs">📍</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Local SEO in Bhopal</div>
              <div class="text-[10px] text-[#5B5F6B]">Dominate "near me" local queries</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>google-business-profile-optimization-bhopal/" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#16A34A]/15 text-[#16A34A] flex items-center justify-center shrink-0 mt-0.5 text-xs">🏪</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">GBP Optimization Bhopal</div>
              <div class="text-[10px] text-[#5B5F6B]">Rank #1 on Google Maps 3-Pack</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>ai-seo-bhopal/" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#8B5CF6]/15 text-[#8B5CF6] flex items-center justify-center shrink-0 mt-0.5 text-xs">✨</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">AI SEO & GEO Services</div>
              <div class="text-[10px] text-[#5B5F6B]">ChatGPT & Perplexity citations</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>digital-marketing-agency-bhopal/" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#EC4899]/15 text-[#EC4899] flex items-center justify-center shrink-0 mt-0.5 text-xs">📣</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">Digital Marketing Agency</div>
              <div class="text-[10px] text-[#5B5F6B]">Performance ads & lead funnels</div>
            </div>
          </a>

          <a href="<?php echo $base_path; ?>ai-agency-bhopal/" class="flex items-start gap-2.5 p-2 rounded-lg hover:bg-[#F6F8FB] transition-colors">
            <div class="w-7 h-7 rounded-lg bg-[#00A8B5]/15 text-[#00A8B5] flex items-center justify-center shrink-0 mt-0.5 text-xs">🤖</div>
            <div>
              <div class="text-xs font-semibold text-[#14151A]">AI Agency & Automation</div>
              <div class="text-[10px] text-[#5B5F6B]">AI agents & sub-60s workflows</div>
            </div>
          </a>
        </div>
      </div>

      <a href="<?php echo $base_path; ?>portfolio.php" class="text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] transition-colors <?php echo ($current_page == 'portfolio.php') ? 'text-[#00A8B5]' : ''; ?>">Portfolio</a>
      <a href="<?php echo $base_path; ?>case-studies.php" class="text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] transition-colors <?php echo ($current_page == 'case-studies.php' || $current_page == 'case-study-single.php') ? 'text-[#00A8B5]' : ''; ?>">Case Studies</a>
      <a href="<?php echo $base_path; ?>pricing.php" class="text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] transition-colors <?php echo ($current_page == 'pricing.php') ? 'text-[#00A8B5]' : ''; ?>">Pricing</a>
      <a href="<?php echo $base_path; ?>about.php" class="text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] transition-colors <?php echo ($current_page == 'about.php') ? 'text-[#00A8B5]' : ''; ?>">About</a>
      <a href="<?php echo $base_path; ?>blog.php" class="text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] transition-colors <?php echo ($current_page == 'blog.php' || $current_page == 'blog-single.php') ? 'text-[#00A8B5]' : ''; ?>">Blog</a>
      <a href="<?php echo $base_path; ?>contact.php" class="text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] transition-colors <?php echo ($current_page == 'contact.php') ? 'text-[#00A8B5]' : ''; ?>">Contact</a>
    </nav>

    <!-- Header Actions -->
    <div class="hidden lg:flex items-center gap-4">
      <button class="trigger-book-demo btn-primary text-xs tracking-wide uppercase">
        <i data-lucide="calendar" class="w-4 h-4"></i>
        Book Demo
      </button>
    </div>

    <!-- Mobile Menu Button -->
    <button id="mobile-menu-btn" class="lg:hidden text-[#14151A] p-2 hover:bg-[#F6F8FB] rounded-lg">
      <i data-lucide="menu" class="w-6 h-6"></i>
    </button>
  </div>

  <!-- Mobile Drawer Menu with Collapsible Sub-Menus -->
  <div id="mobile-menu" class="hidden lg:hidden mt-3 bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl p-4 sm:p-6 shadow-2xl space-y-3 max-h-[calc(100vh-5.5rem)] overflow-y-auto overscroll-contain transition-all">
    
    <!-- 1. Services Accordion Item -->
    <div class="mobile-menu-item border-b border-[#E4E7EC] pb-3">
      <button type="button" class="mobile-submenu-toggle w-full flex items-center justify-between py-2 text-sm font-bold text-[#14151A] hover:text-[#00A8B5] transition-colors focus:outline-none" aria-expanded="false" aria-controls="mobile-submenu-services">
        <span class="flex items-center gap-2">
          <i data-lucide="layers" class="w-4 h-4 text-[#00A8B5]"></i>
          <span>Services</span>
        </span>
        <div class="flex items-center gap-2">
          <span class="text-[10px] font-mono bg-[#00A8B5]/10 text-[#00A8B5] px-2 py-0.5 rounded font-bold">8 Services</span>
          <i data-lucide="chevron-down" class="w-4 h-4 text-[#5B5F6B] mobile-submenu-arrow transition-transform duration-200"></i>
        </div>
      </button>
      <div id="mobile-submenu-services" class="mobile-submenu hidden pt-2 pb-1 pl-3 space-y-1 border-l-2 border-[#00A8B5]/30 ml-2 mt-1">
        <a href="<?php echo $base_path; ?>services.php" class="block text-xs font-bold text-[#00A8B5] hover:underline py-1.5 flex items-center gap-1.5">
          <span>Explore All Services</span>
          <i data-lucide="arrow-right" class="w-3 h-3"></i>
        </a>
        <a href="<?php echo $base_path; ?>services/local-seo.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">Local SEO & Google Maps</a>
        <a href="<?php echo $base_path; ?>services/geo-aeo.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">GEO & AEO Optimization</a>
        <a href="<?php echo $base_path; ?>services/technical-seo.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">Technical SEO</a>
        <a href="<?php echo $base_path; ?>services/link-building-pr.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">Link Building & Digital PR</a>
        <a href="<?php echo $base_path; ?>services/ai-marketing.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">AI Digital Marketing</a>
        <a href="<?php echo $base_path; ?>services/social-media.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">Social Media Growth</a>
        <a href="<?php echo $base_path; ?>services/web-development.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5 font-semibold text-[#00A8B5]">Web Development</a>
        <a href="<?php echo $base_path; ?>services/app-development.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5 font-semibold text-[#8B5CF6]">App Development</a>
      </div>
    </div>

    <!-- 2. Industries Accordion Item -->
    <div class="mobile-menu-item border-b border-[#E4E7EC] pb-3">
      <button type="button" class="mobile-submenu-toggle w-full flex items-center justify-between py-2 text-sm font-bold text-[#14151A] hover:text-[#00A8B5] transition-colors focus:outline-none" aria-expanded="false" aria-controls="mobile-submenu-industries">
        <span class="flex items-center gap-2">
          <i data-lucide="briefcase" class="w-4 h-4 text-[#16A34A]"></i>
          <span>Industries</span>
        </span>
        <div class="flex items-center gap-2">
          <span class="text-[10px] font-mono bg-[#16A34A]/10 text-[#16A34A] px-2 py-0.5 rounded font-bold">11 Verticals</span>
          <i data-lucide="chevron-down" class="w-4 h-4 text-[#5B5F6B] mobile-submenu-arrow transition-transform duration-200"></i>
        </div>
      </button>
      <div id="mobile-submenu-industries" class="mobile-submenu hidden pt-2 pb-1 pl-3 space-y-1 border-l-2 border-[#16A34A]/30 ml-2 mt-1">
        <a href="<?php echo $base_path; ?>industries/index.php" class="block text-xs font-bold text-[#1B5FAA] hover:underline py-1.5 flex items-center gap-1.5">
          <span>View All 16 Industry Blueprints</span>
          <i data-lucide="arrow-right" class="w-3 h-3"></i>
        </a>
        <a href="<?php echo $base_path; ?>industries/solar-installers-seo.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">⚡ Solar Installers</a>
        <a href="<?php echo $base_path; ?>industries/heat-pump-installers-seo.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">♨️ Heat Pump Installers</a>
        <a href="<?php echo $base_path; ?>industries/ev-charger-installers-seo.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">🔋 EV Charger Installers</a>
        <a href="<?php echo $base_path; ?>industries/roofing-companies-seo.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">🏠 Roofing Companies</a>
        <a href="<?php echo $base_path; ?>industries/kitchen-bathroom-renovators-seo.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">🚿 Kitchen & Bathroom</a>
        <a href="<?php echo $base_path; ?>industries/loft-conversion-builders-seo.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">🏗️ Loft & Extensions</a>
        <a href="<?php echo $base_path; ?>industries/dental-clinics-seo.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">🦷 Private Dental Clinics</a>
        <a href="<?php echo $base_path; ?>industries/aesthetics-clinics-seo.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">✨ Aesthetics Clinics</a>
        <a href="<?php echo $base_path; ?>industries/law-firms-seo.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">⚖️ Law Firms & Solicitors</a>
        <a href="<?php echo $base_path; ?>industries/startup-seo-agency.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">🚀 VC-Backed Startups</a>
        <a href="<?php echo $base_path; ?>industries/saas-marketing-agency.php" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">💻 B2B SaaS Companies</a>
      </div>
    </div>

    <!-- 3. Locations Accordion Item -->
    <div class="mobile-menu-item border-b border-[#E4E7EC] pb-3">
      <button type="button" class="mobile-submenu-toggle w-full flex items-center justify-between py-2 text-sm font-bold text-[#14151A] hover:text-[#00A8B5] transition-colors focus:outline-none" aria-expanded="false" aria-controls="mobile-submenu-locations">
        <span class="flex items-center gap-2">
          <span class="inline-block w-2 h-2 rounded-full bg-[#00A8B5] animate-pulse"></span>
          <span>Locations (Bhopal)</span>
        </span>
        <div class="flex items-center gap-2">
          <span class="text-[10px] font-mono bg-[#00A8B5]/10 text-[#00A8B5] px-2 py-0.5 rounded font-bold">6 Pages</span>
          <i data-lucide="chevron-down" class="w-4 h-4 text-[#5B5F6B] mobile-submenu-arrow transition-transform duration-200"></i>
        </div>
      </button>
      <div id="mobile-submenu-locations" class="mobile-submenu hidden pt-2 pb-1 pl-3 space-y-1 border-l-2 border-[#00A8B5]/30 ml-2 mt-1">
        <a href="<?php echo $base_path; ?>seo-agency-bhopal/" class="block text-sm font-bold text-[#00A8B5] hover:text-[#008A95] py-1.5 flex items-center justify-between">
          <span>SEO Agency in Bhopal</span>
          <span class="text-[10px] text-amber-700 bg-amber-100 px-1.5 py-0.2 rounded font-mono">HUB</span>
        </a>
        <a href="<?php echo $base_path; ?>local-seo-bhopal/" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">📍 Local SEO in Bhopal</a>
        <a href="<?php echo $base_path; ?>google-business-profile-optimization-bhopal/" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">🏪 GBP Optimization Bhopal</a>
        <a href="<?php echo $base_path; ?>ai-seo-bhopal/" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">✨ AI SEO & GEO Services</a>
        <a href="<?php echo $base_path; ?>digital-marketing-agency-bhopal/" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">📣 Digital Marketing Agency</a>
        <a href="<?php echo $base_path; ?>ai-agency-bhopal/" class="block text-sm text-[#14151A] hover:text-[#00A8B5] py-1.5">🤖 AI Agency & Automation</a>
      </div>
    </div>

    <!-- 4. Direct Pages & Actions -->
    <div class="pt-1 flex flex-col gap-2.5">
      <a href="<?php echo $base_path; ?>portfolio.php" class="text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] py-1 transition-colors">Portfolio</a>
      <a href="<?php echo $base_path; ?>case-studies.php" class="text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] py-1 transition-colors">Case Studies</a>
      <a href="<?php echo $base_path; ?>pricing.php" class="text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] py-1 transition-colors">Pricing</a>
      <a href="<?php echo $base_path; ?>about.php" class="text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] py-1 transition-colors">About</a>
      <a href="<?php echo $base_path; ?>blog.php" class="text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] py-1 transition-colors">Blog</a>
      <a href="<?php echo $base_path; ?>contact.php" class="text-sm font-semibold text-[#14151A] hover:text-[#00A8B5] py-1 transition-colors">Contact</a>
      <button class="trigger-book-demo btn-primary w-full text-sm mt-2">
        <i data-lucide="calendar" class="w-4 h-4"></i> Book Demo
      </button>
    </div>
  </div>
</header>
