<?php
/**
 * Global Explore More Services Cross-Linking Component
 * Interlinks only the 8 official core services offered by Digital4Local
 */

$is_in_services_dir = (strpos($_SERVER['SCRIPT_NAME'] ?? '', '/services/') !== false);
$prefix = $is_in_services_dir ? '' : 'services/';
$current_page_file = basename($_SERVER['SCRIPT_NAME'] ?? '');

$core_services_list = [
    [
        'file' => 'local-seo.php',
        'title' => 'Local SEO & Google Maps',
        'badge' => 'Map 3-Pack'
    ],
    [
        'file' => 'geo-aeo.php',
        'title' => 'SEO, GEO & AEO',
        'badge' => 'AI Citations'
    ],
    [
        'file' => 'technical-seo.php',
        'title' => 'Technical SEO',
        'badge' => 'Core Web Vitals'
    ],
    [
        'file' => 'link-building-pr.php',
        'title' => 'Link Building & PR',
        'badge' => 'High-DR Backlinks'
    ],
    [
        'file' => 'ai-marketing.php',
        'title' => 'AI Marketing & Automation',
        'badge' => 'Agentic Workflows'
    ],
    [
        'file' => 'social-media.php',
        'title' => 'Social Media Marketing',
        'badge' => 'Local Customer Funnels'
    ],
    [
        'file' => 'web-development.php',
        'title' => 'Web Development',
        'badge' => 'Fast Modern Sites'
    ],
    [
        'file' => 'app-development.php',
        'title' => 'App Development',
        'badge' => 'iOS & Android'
    ]
];
?>

<section class="max-w-7xl mx-auto px-4 sm:px-8 pb-20 border-t border-[#E4E7EC] pt-16" data-aos="fade-up">
  <div class="text-center space-y-3 mb-8">
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#00A8B5]/10 border border-[#00A8B5]/20 text-[#00A8B5] text-xs font-mono font-bold tracking-wider uppercase">
      <span class="w-2 h-2 rounded-full bg-[#00F0FF] animate-pulse"></span>
      EXPLORE OUR CORE SERVICES
    </div>
    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] font-['Montserrat',sans-serif] tracking-tight">
      Complete Growth & Digital Engineering Services
    </h3>
    <p class="text-xs sm:text-sm text-[#5B5F6B] font-['Inter',sans-serif] max-w-2xl mx-auto">
      Explore our 8 specialized pillars engineered to capture search rankings, generative AI citations, and high-converting customer pipelines.
    </p>
  </div>

  <!-- Centered Cross-Linking Service Pills -->
  <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-4 max-w-5xl mx-auto">
    <?php foreach ($core_services_list as $svc): 
      $is_active = ($current_page_file === $svc['file']);
      $href = $prefix . $svc['file'];
    ?>
      <?php if ($is_active): ?>
        <span class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-[#00F0FF]/15 border-2 border-[#00A8B5] text-[#00A8B5] font-bold text-xs sm:text-sm shadow-sm cursor-default">
          <span class="w-2 h-2 rounded-full bg-[#00A8B5]"></span>
          <?php echo htmlspecialchars($svc['title']); ?>
          <span class="text-[10px] font-mono bg-[#00A8B5]/20 px-2 py-0.5 rounded text-[#007A85]">Active</span>
        </span>
      <?php else: ?>
        <a href="<?php echo htmlspecialchars($href); ?>" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-[#E2E8F0] hover:border-[#1B5FAA] hover:text-[#1B5FAA] hover:shadow-md hover:-translate-y-0.5 transition-all text-xs sm:text-sm font-semibold text-[#14151A] group">
          <span><?php echo htmlspecialchars($svc['title']); ?></span>
          <span class="text-[10px] font-mono text-[#64748B] group-hover:text-[#1B5FAA] bg-[#F1F5F9] px-2 py-0.5 rounded border border-[#E2E8F0] group-hover:border-[#1B5FAA]/30 transition-colors">
            <?php echo htmlspecialchars($svc['badge']); ?>
          </span>
          <span class="text-[#CBD5E1] group-hover:text-[#1B5FAA] group-hover:translate-x-0.5 transition-transform">→</span>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</section>
