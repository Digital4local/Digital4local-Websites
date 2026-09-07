<?php
/**
 * Link Building & PR Special Section — We Get You Featured On (Top 10 PR & News Outlets)
 */
$is_subfolder = (strpos($_SERVER['SCRIPT_NAME'] ?? '', '/services/') !== false || strpos($_SERVER['SCRIPT_NAME'] ?? '', '/industries/') !== false || strpos($_SERVER['SCRIPT_NAME'] ?? '', '/blog/') !== false);
$pr_base = $is_subfolder ? '../assets/images/pr/' : 'assets/images/pr/';

$pr_outlets = [
    ['name' => 'Forbes', 'authority' => 'DA 95 · Tier 1 Business', 'file' => 'forbes.svg'],
    ['name' => 'Business Insider', 'authority' => 'DA 94 · Global Markets', 'file' => 'businessinsider.svg'],
    ['name' => 'TechCrunch', 'authority' => 'DA 93 · Tech & Venture', 'file' => 'techcrunch.svg'],
    ['name' => 'Entrepreneur', 'authority' => 'DA 92 · Leadership & Growth', 'file' => 'entrepreneur.svg'],
    ['name' => 'Yahoo! Finance', 'authority' => 'DA 93 · Syndicated Wire', 'file' => 'yahoo_finance.svg'],
    ['name' => 'AP News', 'authority' => 'DA 94 · Wire Service', 'file' => 'ap_news.svg'],
    ['name' => 'Reuters', 'authority' => 'DA 95 · Global Media Wire', 'file' => 'reuters.svg'],
    ['name' => 'Bloomberg', 'authority' => 'DA 95 · Financial News', 'file' => 'bloomberg.svg'],
    ['name' => 'Inc. Magazine', 'authority' => 'DA 92 · High-Growth Business', 'file' => 'inc.svg'],
    ['name' => 'MarketWatch', 'authority' => 'DA 93 · Real-Time Financials', 'file' => 'marketwatch.svg']
];
?>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20" data-aos="fade-up">
  
  <!-- Section Heading -->
  <div class="text-center space-y-3 max-w-3xl mx-auto mb-12 sm:mb-14">
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#1B5FAA]/10 border border-[#1B5FAA]/20 text-[#1B5FAA] text-xs font-mono font-bold tracking-wider uppercase">
      <span class="w-2 h-2 rounded-full bg-[#5A9E2F] animate-pulse"></span>
      EARNED EDITORIAL COVERAGE
    </div>
    
    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A] tracking-tight font-['Montserrat',sans-serif]">
      We Get You Featured On
    </h2>
    
    <p class="text-sm sm:text-base text-[#5B5F6B] font-['Inter',sans-serif]">
      Authoritative national publications, tier-1 trade media, and syndicated news wires where our digital PR team lands brand citations and editorial backlinks.
    </p>
  </div>

  <!-- Top 10 PR Outlets (Centered Flex Wrap) -->
  <div class="flex flex-wrap items-stretch justify-center gap-4 sm:gap-6 max-w-7xl mx-auto">
    <?php foreach ($pr_outlets as $outlet): ?>
    <div class="bg-white border border-[#E2E8F0] rounded-2xl p-5 shadow-[0_2px_8px_rgba(0,0,0,0.04)] hover:shadow-[0_12px_24px_rgba(27,95,170,0.12)] hover:border-[#00B4D8] hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-center justify-center text-center group min-h-[130px] w-[calc(50%-12px)] sm:w-[calc(33.333%-16px)] md:w-[calc(25%-18px)] lg:w-[calc(20%-20px)] max-w-[240px] min-w-[170px]">
      
      <!-- Outlet Logo -->
      <div class="h-10 sm:h-12 w-full flex items-center justify-center mb-2.5 group-hover:scale-105 transition-transform duration-300">
        <img 
          src="<?php echo $pr_base . $outlet['file']; ?>" 
          alt="<?php echo htmlspecialchars($outlet['name']); ?>" 
          class="h-8 sm:h-9 w-auto max-w-[130px] sm:max-w-[150px] object-contain"
          loading="lazy"
        />
      </div>

      <!-- Domain Authority Metric -->
      <span class="text-[11px] font-mono font-bold text-[#5B5F6B] bg-[#F1F5F9] px-2.5 py-0.5 rounded-md border border-[#E2E8F0] mt-1 group-hover:bg-[#1B5FAA]/10 group-hover:text-[#1B5FAA] transition-colors">
        <?php echo htmlspecialchars($outlet['authority']); ?>
      </span>

    </div>
    <?php endforeach; ?>
  </div>

</section>
