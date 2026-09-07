<?php
/**
 * Local SEO & Link Building Special Section — Top 20 Citation Sources We Build
 */
$is_subfolder = (strpos($_SERVER['SCRIPT_NAME'] ?? '', '/services/') !== false || strpos($_SERVER['SCRIPT_NAME'] ?? '', '/industries/') !== false || strpos($_SERVER['SCRIPT_NAME'] ?? '', '/blog/') !== false);
$citations_base = $is_subfolder ? '../assets/images/citations/' : 'assets/images/citations/';

$citations_list = [
    ['name' => 'Google Business Profile', 'type' => 'Tier 1 Map Ecosystem', 'file' => 'google_business.svg', 'color' => '#4285F4'],
    ['name' => 'Apple Maps', 'type' => 'iOS & Siri Core Data', 'file' => 'apple_maps.svg', 'color' => '#000000'],
    ['name' => 'Bing Places', 'type' => 'Microsoft & Copilot Sync', 'file' => 'bing_places.svg', 'color' => '#008373'],
    ['name' => 'Yelp', 'type' => 'Authority Review Hub', 'file' => 'yelp.svg', 'color' => '#D32323'],
    ['name' => 'YellowPages', 'type' => 'High-DA Directory', 'file' => 'yellowpages.svg', 'color' => '#EAB308'],
    ['name' => 'BBB (Better Business Bureau)', 'type' => 'Accredited Trust Signal', 'file' => 'bbb.svg', 'color' => '#005A70'],
    ['name' => 'Trustpilot', 'type' => 'Global Review Platform', 'file' => 'trustpilot.svg', 'color' => '#00B67A'],
    ['name' => 'Tripadvisor', 'type' => 'Hospitality & Local Map', 'file' => 'tripadvisor.svg', 'color' => '#34E0A1'],
    ['name' => 'Foursquare', 'type' => 'Location Data Aggregator', 'file' => 'foursquare.svg', 'color' => '#F94877'],
    ['name' => 'MapQuest', 'type' => 'Turn-by-Turn GPS Directory', 'file' => 'mapquest.svg', 'color' => '#82B336'],
    ['name' => 'Angi (Angie\'s List)', 'type' => 'Verified Service Directory', 'file' => 'angi.svg', 'color' => '#FF4C00'],
    ['name' => 'Nextdoor', 'type' => 'Hyper-Local Neighborhood Hub', 'file' => 'nextdoor.svg', 'color' => '#00B246'],
    ['name' => 'Superpages', 'type' => 'Local Business Index', 'file' => 'superpages.svg', 'color' => '#F59E0B'],
    ['name' => 'Brownbook', 'type' => 'Global Commercial Directory', 'file' => 'brownbook.svg', 'color' => '#78350F'],
    ['name' => 'Hotfrog', 'type' => 'Local Industry Registry', 'file' => 'hotfrog.svg', 'color' => '#E11D48'],
    ['name' => 'Citysearch', 'type' => 'Metro Area Directory', 'file' => 'citysearch.svg', 'color' => '#2563EB'],
    ['name' => 'Cylex', 'type' => 'Multi-Region Business Index', 'file' => 'cylex.svg', 'color' => '#0284C7'],
    ['name' => 'Justdial', 'type' => 'Pan-India Local Hub', 'file' => 'justdial.svg', 'color' => '#F97316'],
    ['name' => 'Sulekha', 'type' => 'Verified Local Services', 'file' => 'sulekha.svg', 'color' => '#059669'],
    ['name' => 'IndiaMART', 'type' => 'B2B Commercial Directory', 'file' => 'indiamart.svg', 'color' => '#2E3192']
];
?>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20" data-aos="fade-up">
  
  <!-- Section Heading -->
  <div class="text-center space-y-3 max-w-3xl mx-auto mb-12 sm:mb-14">
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#5A9E2F]/10 border border-[#5A9E2F]/20 text-[#5A9E2F] text-xs font-mono font-bold tracking-wider uppercase">
      <span class="w-2 h-2 rounded-full bg-[#5A9E2F] animate-pulse"></span>
      100% NAP CONSISTENCY & TIER-1 AGGREGATORS
    </div>
    
    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A] tracking-tight font-['Montserrat',sans-serif]">
      Top 20 Citation Sources We Build
    </h2>
    
    <p class="text-sm sm:text-base text-[#5B5F6B] font-['Inter',sans-serif]">
      We claim, verify, and manually sync your business name, address, phone number (NAP), and categories across the top 20 high-trust directories and primary map aggregators.
    </p>
  </div>

  <!-- Top 20 Citations (Centered Flex Wrap) -->
  <div class="flex flex-wrap items-stretch justify-center gap-4 sm:gap-6 max-w-7xl mx-auto">
    <?php foreach ($citations_list as $citation): ?>
    <div class="bg-white border border-[#E2E8F0] rounded-2xl p-4 sm:p-5 shadow-[0_2px_8px_rgba(0,0,0,0.04)] hover:shadow-[0_12px_24px_rgba(27,95,170,0.12)] hover:border-[#00B4D8] hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-center justify-center text-center group min-h-[140px] w-[calc(50%-12px)] sm:w-[calc(33.333%-16px)] md:w-[calc(25%-18px)] lg:w-[calc(20%-20px)] max-w-[240px] min-w-[160px]">
      
      <!-- Citation Logo Container -->
      <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform duration-300">
        <img 
          src="<?php echo $citations_base . $citation['file']; ?>" 
          alt="<?php echo htmlspecialchars($citation['name']); ?>" 
          class="w-10 h-10 object-contain"
          loading="lazy"
        />
      </div>

      <!-- Citation Name -->
      <h3 class="text-xs sm:text-sm font-bold text-[#14151A] font-['Montserrat',sans-serif] tracking-tight group-hover:text-[#1B5FAA] transition-colors line-clamp-1">
        <?php echo htmlspecialchars($citation['name']); ?>
      </h3>

      <!-- Type / Tag -->
      <span class="text-[10px] sm:text-[11px] text-[#64748B] font-['Inter',sans-serif] mt-0.5 line-clamp-1">
        <?php echo htmlspecialchars($citation['type']); ?>
      </span>

    </div>
    <?php endforeach; ?>
  </div>

  <!-- Footnote -->
  <div class="mt-8 text-center text-xs font-mono text-[#64748B]">
    Manual claiming · Duplicate suppression · Exact coordinate pinning · Ongoing sync
  </div>

</section>
