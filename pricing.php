<?php
require_once __DIR__ . '/includes/site-config.php';
$prc_cfg = get_page_config('pricing');
$page_title = $prc_cfg['meta_title'] ?? "Pricing & Agency Growth Packages | Digital4Local";
$page_description = $prc_cfg['meta_description'] ?? "Transparent growth packages combining custom web build setup fees and ongoing AI SEO & marketing retainers.";

$pkg_launch = $site_config['pricing']['packages']['launch'] ?? [];
$pkg_growth = $site_config['pricing']['packages']['growth'] ?? [];
$pkg_enterprise = $site_config['pricing']['packages']['enterprise'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once 'includes/seo.php'; ?>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] min-h-screen relative selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <div class="bg-ambient-glow"></div>
  <?php include_once 'includes/header.php'; ?>

  <main class="relative z-10 pt-32 pb-24">
    
    <!-- Hero Section -->
    <section class="max-w-4xl mx-auto px-4 text-center space-y-6 pb-16" data-aos="fade-up">
      <span class="pulse-badge"><?php echo htmlspecialchars($prc_cfg['badge'] ?? 'TRANSPARENT GROWTH PACKAGES'); ?></span>
      <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A] tracking-tight">
        <?php echo htmlspecialchars($prc_cfg['hero_title'] ?? 'Predictable Monthly Pricing &'); ?> <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1D70B8] via-[#00A8B5] to-[#70B22C]"><?php echo htmlspecialchars($prc_cfg['hero_highlight'] ?? 'High ROI Growth'); ?></span>
      </h1>
      <p class="text-base sm:text-lg text-[#5B5F6B] leading-relaxed">
        <?php echo htmlspecialchars($prc_cfg['hero_subheading'] ?? 'Choose from our Local SEO 5x5 Geo-Grid retainers, AI GEO/AEO optimization plans, or custom Web & App build packages.'); ?>
      </p>

      <!-- Currency Switcher Pill -->
      <div class="flex items-center justify-center gap-2 pt-4">
        <button data-currency="INR" class="currency-btn active px-5 py-2 rounded-full text-xs font-mono font-bold bg-[#00F0FF] text-[#0A0A0F] shadow-sm">🇮🇳 INR (₹)</button>
        <button data-currency="USD" class="currency-btn px-5 py-2 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇺🇸 USD ($)</button>
        <button data-currency="GBP" class="currency-btn px-5 py-2 rounded-full text-xs font-mono font-bold bg-[#F6F8FB] border border-[#E4E7EC] text-[#5B5F6B]">🇬🇧 GBP (£)</button>
      </div>
    </section>

    <!-- Combined 3-Package Cards Grid -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-16">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
        
        <!-- 1. LAUNCH PACKAGE -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between border border-[#E4E7EC]">
          <div class="space-y-4">
            <div class="flex justify-between items-center">
              <span class="text-xs font-mono text-[#5B5F6B] uppercase tracking-wider font-bold">LAUNCH BUNDLE</span>
            </div>
            <h2 class="text-2xl font-bold text-[#14151A]">Launch</h2>
            <p class="text-xs text-[#5B5F6B]">Local businesses looking to dominate Google Map 3-Pack and regional search.</p>

            <!-- Dual Pricing Lines -->
            <div class="bg-[#F6F8FB] border border-[#E4E7EC] p-4 rounded-xl space-y-3 font-mono">
              <div class="flex justify-between items-center text-xs">
                <span class="text-[#5B5F6B]">ONE-TIME SETUP (Website Build):</span>
                <span class="font-bold text-[#14151A] package-setup" data-inr="<?php echo htmlspecialchars($pkg_launch['setup_inr'] ?? '₹29,999'); ?>" data-usd="<?php echo htmlspecialchars($pkg_launch['setup_usd'] ?? '$699'); ?>" data-gbp="<?php echo htmlspecialchars($pkg_launch['setup_gbp'] ?? '£559'); ?>"><?php echo htmlspecialchars($pkg_launch['setup_inr'] ?? '₹29,999'); ?></span>
              </div>
              <div class="border-t border-[#E4E7EC] pt-2 flex justify-between items-center text-sm">
                <span class="text-[#00A8B5] font-bold">MONTHLY PLAN:</span>
                <span class="font-extrabold text-[#16A34A] package-monthly" data-inr="<?php echo htmlspecialchars($pkg_launch['monthly_inr'] ?? '₹14,999/mo'); ?>" data-usd="<?php echo htmlspecialchars($pkg_launch['monthly_usd'] ?? '$349/mo'); ?>" data-gbp="<?php echo htmlspecialchars($pkg_launch['monthly_gbp'] ?? '£279/mo'); ?>"><?php echo htmlspecialchars($pkg_launch['monthly_inr'] ?? '₹14,999/mo'); ?></span>
              </div>
            </div>

            <!-- Features -->
            <ul class="space-y-3 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Website:</strong> Static site (up to 7 pages)</span></li>
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Search:</strong> Local SEO + GEO/AEO basics</span></li>
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Growth:</strong> Strategy & GBP setup</span></li>
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Reporting:</strong> Monthly performance report</span></li>
            </ul>
          </div>

          <button class="trigger-book-demo btn-secondary w-full text-xs justify-center py-3">Book Strategy Session</button>
        </div>

        <!-- 2. GROWTH PACKAGE (MOST POPULAR) -->
        <div class="card-elevated p-8 space-y-6 flex flex-col justify-between relative border-2 border-[#00A8B5] shadow-lg">
          <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-[#00F0FF] text-[#0A0A0F] font-mono text-[10px] font-bold px-4 py-1 rounded-full uppercase tracking-wider shadow-sm">
            ★ MOST POPULAR AGENCY BUNDLE
          </div>

          <div class="space-y-4 pt-2">
            <div class="flex justify-between items-center">
              <span class="text-xs font-mono text-[#00A8B5] uppercase tracking-wider font-bold">GROWTH BUNDLE</span>
            </div>
            <h2 class="text-2xl font-bold text-[#14151A]">Growth</h2>
            <p class="text-xs text-[#5B5F6B]">Businesses ready to compete across local + national search & AI answers.</p>

            <!-- Dual Pricing Lines -->
            <div class="bg-[#F6F8FB] border border-[#00A8B5]/30 p-4 rounded-xl space-y-3 font-mono">
              <div class="flex justify-between items-center text-xs">
                <span class="text-[#5B5F6B]">ONE-TIME SETUP (Website Build):</span>
                <span class="font-bold text-[#14151A] package-setup" data-inr="<?php echo htmlspecialchars($pkg_growth['setup_inr'] ?? '₹79,999'); ?>" data-usd="<?php echo htmlspecialchars($pkg_growth['setup_usd'] ?? '$1,799'); ?>" data-gbp="<?php echo htmlspecialchars($pkg_growth['setup_gbp'] ?? '£1,439'); ?>"><?php echo htmlspecialchars($pkg_growth['setup_inr'] ?? '₹79,999'); ?></span>
              </div>
              <div class="border-t border-[#E4E7EC] pt-2 flex justify-between items-center text-sm">
                <span class="text-[#00A8B5] font-bold">MONTHLY PLAN:</span>
                <span class="font-extrabold text-[#16A34A] package-monthly" data-inr="<?php echo htmlspecialchars($pkg_growth['monthly_inr'] ?? '₹44,999/mo'); ?>" data-usd="<?php echo htmlspecialchars($pkg_growth['monthly_usd'] ?? '$999/mo'); ?>" data-gbp="<?php echo htmlspecialchars($pkg_growth['monthly_gbp'] ?? '£799/mo'); ?>"><?php echo htmlspecialchars($pkg_growth['monthly_inr'] ?? '₹44,999/mo'); ?></span>
              </div>
            </div>

            <!-- Features -->
            <ul class="space-y-3 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Website:</strong> Dynamic CMS multi-page site + blog</span></li>
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Search:</strong> Full SEO + GEO/AEO + Technical SEO</span></li>
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Growth:</strong> Link building & digital PR</span></li>
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Social:</strong> Social media management (2 platforms)</span></li>
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Reporting:</strong> Weekly report + strategy call</span></li>
            </ul>
          </div>

          <button class="trigger-book-demo btn-primary w-full text-xs justify-center py-3">Book Strategy Session</button>
        </div>

        <!-- 3. SCALE / ENTERPRISE PACKAGE -->
        <div class="card-dark p-8 space-y-6 flex flex-col justify-between border border-[#E4E7EC]">
          <div class="space-y-4">
            <div class="flex justify-between items-center">
              <span class="text-xs font-mono text-[#8B5CF6] uppercase tracking-wider font-bold">ENTERPRISE BUNDLE</span>
            </div>
            <h2 class="text-2xl font-bold text-[#14151A]">Enterprise</h2>
            <p class="text-xs text-[#5B5F6B]">Multi-location enterprises, startups, and SaaS wanting full-stack AI growth.</p>

            <!-- Dual Pricing Lines -->
            <div class="bg-[#F6F8FB] border border-[#E4E7EC] p-4 rounded-xl space-y-3 font-mono">
              <div class="flex justify-between items-center text-xs">
                <span class="text-[#5B5F6B]">ONE-TIME SETUP (Web/App):</span>
                <span class="font-bold text-[#14151A] package-setup" data-inr="<?php echo htmlspecialchars($pkg_enterprise['setup_inr'] ?? '₹1,49,999'); ?>" data-usd="<?php echo htmlspecialchars($pkg_enterprise['setup_usd'] ?? '$3,499'); ?>" data-gbp="<?php echo htmlspecialchars($pkg_enterprise['setup_gbp'] ?? '£2,799'); ?>"><?php echo htmlspecialchars($pkg_enterprise['setup_inr'] ?? '₹1,49,999'); ?></span>
              </div>
              <div class="border-t border-[#E4E7EC] pt-2 flex justify-between items-center text-sm">
                <span class="text-[#8B5CF6] font-bold">MONTHLY PLAN:</span>
                <span class="font-extrabold text-[#16A34A] package-monthly" data-inr="<?php echo htmlspecialchars($pkg_enterprise['monthly_inr'] ?? '₹89,999/mo'); ?>" data-usd="<?php echo htmlspecialchars($pkg_enterprise['monthly_usd'] ?? '$1,999/mo'); ?>" data-gbp="<?php echo htmlspecialchars($pkg_enterprise['monthly_gbp'] ?? '£1,599/mo'); ?>"><?php echo htmlspecialchars($pkg_enterprise['monthly_inr'] ?? '₹89,999/mo'); ?></span>
              </div>
            </div>

            <!-- Features -->
            <ul class="space-y-3 text-xs text-[#5B5F6B] border-t border-[#E4E7EC] pt-4">
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Website:</strong> Custom website or web app, full-stack build</span></li>
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Search:</strong> Full-stack AI SEO (SEO+GEO+AEO+Technical)</span></li>
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Growth:</strong> AI marketing, automation, content engine</span></li>
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Social:</strong> Full social + paid social management</span></li>
              <li class="flex items-start gap-2"><i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i> <span><strong>Reporting:</strong> Weekly report + dedicated account manager</span></li>
            </ul>
          </div>

          <a href="contact.php" class="btn-secondary w-full text-xs justify-center py-3">Contact Sales</a>
        </div>

      </div>

      <!-- Single Service Note Link -->
      <div class="text-center pt-8">
        <p class="text-xs text-[#5B5F6B] font-mono">
          Looking for a standalone service retainer? <a href="services.php" class="text-[#00A8B5] font-bold hover:underline">Explore individual services starting from ₹<?php echo number_format((int)($site_config['pricing']['retainer_local_seo'] ?? 9999)); ?>/mo →</a>
        </p>
      </div>
    </section>

    <!-- Pricing FAQs Section -->
    <section class="max-w-4xl mx-auto px-4 pb-20">
      <div class="text-center space-y-4 mb-12">
        <span class="pulse-badge">COMMON QUESTIONS</span>
        <h2 class="text-3xl font-bold text-[#14151A]">Pricing & Retainer FAQs</h2>
      </div>

      <div class="space-y-4">
        
        <div class="faq-item card-dark p-6 cursor-pointer">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>What is the difference between Setup Fee and Monthly Retainer?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            The One-Time Setup Fee covers complete custom web or mobile development, technical audit, and initial entity graph configuration. The Monthly Retainer covers active link acquisition, 5x5 geo-grid monitoring, schema updates, and account management.
          </div>
        </div>

        <div class="faq-item card-dark p-6 cursor-pointer">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>Are there long-term contracts?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            No! All retainers operate month-to-month. You can scale, pause, or upgrade at any billing cycle.
          </div>
        </div>

      </div>
    </section>

    <!-- Recent Published Research & Articles -->
    <?php include_once 'includes/recent-blogs.php'; ?>

  </main>

  <?php include_once 'includes/footer.php'; ?>
  
  <script>
    // Multi-currency switcher script
    document.querySelectorAll('.currency-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.currency-btn').forEach(b => {
          b.classList.remove('active', 'bg-[#00F0FF]', 'text-[#0A0A0F]', 'shadow-sm');
          b.classList.add('bg-[#F6F8FB]', 'border', 'border-[#E4E7EC]', 'text-[#5B5F6B]');
        });
        btn.classList.add('active', 'bg-[#00F0FF]', 'text-[#0A0A0F]', 'shadow-sm');
        btn.classList.remove('bg-[#F6F8FB]', 'border', 'border-[#E4E7EC]', 'text-[#5B5F6B]');

        const cur = btn.getAttribute('data-currency').toLowerCase();

        document.querySelectorAll('.package-setup').forEach(el => {
          el.textContent = el.getAttribute('data-' + cur);
        });
        document.querySelectorAll('.package-monthly').forEach(el => {
          el.textContent = el.getAttribute('data-' + cur);
        });
      });
    });
  </script>
</body>
</html>
