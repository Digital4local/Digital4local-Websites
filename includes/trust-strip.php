<?php
/**
 * Global Trust Strip Component — Smooth Infinite Marquee Slider
 * Displays 20 verified client & enterprise partner logos with continuous smooth sliding
 */
$is_subfolder = (strpos($_SERVER['SCRIPT_NAME'] ?? '', '/services/') !== false || strpos($_SERVER['SCRIPT_NAME'] ?? '', '/industries/') !== false || strpos($_SERVER['SCRIPT_NAME'] ?? '', '/blog/') !== false);
$clients_base_path = $is_subfolder ? '../assets/images/clients/' : 'assets/images/clients/';

$row1_logos = [
    ['name' => 'Startup India', 'file' => 'startup_india.png', 'img_class' => 'h-10 sm:h-12 max-w-[160px] sm:max-w-[190px]'],
    ['name' => 'Bajaj', 'file' => 'bajaj.png', 'img_class' => 'h-10 sm:h-12 max-w-[150px] sm:max-w-[180px]'],
    ['name' => 'Hostinger', 'file' => 'hostinger.png', 'img_class' => 'h-12 sm:h-15 max-w-[140px] sm:max-w-[170px]'],
    ['name' => 'Brightlocal', 'file' => 'brightlocal.png', 'img_class' => 'h-11 sm:h-13 max-w-[150px] sm:max-w-[180px]'],
    ['name' => 'Solar For You', 'file' => 'solar_for_you.png', 'img_class' => 'h-10 sm:h-12 max-w-[160px] sm:max-w-[190px]'],
    ['name' => 'Thrillophilia', 'file' => 'thrillophilia.png', 'img_class' => 'h-11 sm:h-13 max-w-[150px] sm:max-w-[180px]'],
    ['name' => 'Sportskeeda', 'file' => 'sportskeeda.png', 'img_class' => 'h-10 sm:h-12 max-w-[160px] sm:max-w-[190px]'],
    ['name' => 'Delhi Public School Bhopal', 'file' => 'dps_bhopal.jpg', 'img_class' => 'h-14 sm:h-16 max-w-[120px] sm:max-w-[140px]'],
    ['name' => 'Bansal Group', 'file' => 'bansal_group.jpg', 'img_class' => 'h-12 sm:h-15 max-w-[130px] sm:max-w-[160px]'],
    ['name' => 'MSME Mitra Academy', 'file' => 'msme_mitra.jpg', 'img_class' => 'h-13 sm:h-16 max-w-[130px] sm:max-w-[160px]']
];

$row2_logos = [
    ['name' => 'RKDF University', 'file' => 'rkdf_university.jpg', 'img_class' => 'h-14 sm:h-16 max-w-[110px] sm:max-w-[130px]'],
    ['name' => 'Mavlers', 'file' => 'mavlers.png', 'img_class' => 'h-11 sm:h-13 max-w-[150px] sm:max-w-[180px]'],
    ['name' => 'Chi-Link', 'file' => 'chi_link.png', 'img_class' => 'h-11 sm:h-13 max-w-[140px] sm:max-w-[170px]'],
    ['name' => 'Maxira Solar', 'file' => 'maxira_solar.png', 'img_class' => 'h-12 sm:h-15 max-w-[150px] sm:max-w-[180px]'],
    ['name' => 'Run For Life', 'file' => 'run_for_life.png', 'img_class' => 'h-13 sm:h-16 max-w-[130px] sm:max-w-[160px]'],
    ['name' => 'Northern Illinois Recovery Center', 'file' => 'northern_illinois.png', 'img_class' => 'h-13 sm:h-16 max-w-[140px] sm:max-w-[170px]'],
    ['name' => 'Crestview Recovery', 'file' => 'crestview_recovery.png', 'img_class' => 'h-11 sm:h-13 max-w-[150px] sm:max-w-[180px]'],
    ['name' => 'Solar 4 Good', 'file' => 'solar4good.png', 'img_class' => 'h-11 sm:h-13 max-w-[140px] sm:max-w-[170px]'],
    ['name' => 'Atwo Cloud', 'file' => 'atwocloud.jpg', 'img_class' => 'h-13 sm:h-16 max-w-[130px] sm:max-w-[160px]'],
    ['name' => 'SunMoon Events & Experience', 'file' => 'sunmoon_events.png', 'img_class' => 'h-14 sm:h-16 max-w-[120px] sm:max-w-[140px]']
];
?>
<style>
@keyframes trustMarqueeLeft {
  0% { transform: translate3d(0, 0, 0); }
  100% { transform: translate3d(-50%, 0, 0); }
}
@keyframes trustMarqueeRight {
  0% { transform: translate3d(-50%, 0, 0); }
  100% { transform: translate3d(0, 0, 0); }
}
.trust-marquee-track-left {
  display: flex;
  width: max-content;
  animation: trustMarqueeLeft 38s linear infinite;
  will-change: transform;
}
.trust-marquee-track-right {
  display: flex;
  width: max-content;
  animation: trustMarqueeRight 38s linear infinite;
  will-change: transform;
}
.trust-marquee-container:hover .trust-marquee-track-left,
.trust-marquee-container:hover .trust-marquee-track-right {
  animation-play-state: paused;
}
</style>

<section class="border-y border-[#E2E8F0] bg-[#F8FAFC] py-14 sm:py-16 my-12 relative overflow-hidden" data-aos="fade-up">
  
  <!-- Subtle Gradient Fade Edges for Smooth In/Out Transition -->
  <div class="pointer-events-none absolute inset-y-0 left-0 w-20 sm:w-44 bg-gradient-to-r from-[#F8FAFC] to-transparent z-10"></div>
  <div class="pointer-events-none absolute inset-y-0 right-0 w-20 sm:w-44 bg-gradient-to-l from-[#F8FAFC] to-transparent z-10"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
    
    <!-- Header Badge -->
    <div class="inline-flex items-center gap-2.5">
      <span class="w-2.5 h-2.5 rounded-full bg-[#00F0FF] animate-pulse"></span>
      <span class="text-xs sm:text-sm font-mono uppercase tracking-widest text-[#475569] font-bold">
        TRUSTED BY INDUSTRY LEADERS, ENTERPRISES & FAST-GROWING BRANDS
      </span>
      <span class="w-2.5 h-2.5 rounded-full bg-[#00F0FF] animate-pulse"></span>
    </div>

    <!-- Infinite Smooth Marquee Slider Container -->
    <div class="trust-marquee-container space-y-4 sm:space-y-6 overflow-hidden py-2">
      
      <!-- Track 1: Smooth Left Slide -->
      <div class="flex overflow-hidden">
        <div class="trust-marquee-track-left flex gap-4 sm:gap-6 pr-4 sm:pr-6">
          
          <!-- Original 10 Logos -->
          <?php foreach ($row1_logos as $logo): ?>
          <div class="h-24 sm:h-28 px-6 sm:px-8 py-4 bg-white border border-[#E2E8F0] rounded-2xl shadow-[0_2px_8px_rgba(0,0,0,0.04)] hover:shadow-[0_8px_20px_rgba(0,0,0,0.08)] hover:border-[#00A8B5] transition-all duration-300 flex items-center justify-center min-w-[200px] sm:min-w-[240px] flex-shrink-0 group">
            <img 
              src="<?php echo $clients_base_path . $logo['file']; ?>" 
              alt="<?php echo htmlspecialchars($logo['name']); ?>" 
              class="<?php echo $logo['img_class']; ?> w-auto object-contain transition-transform duration-300 group-hover:scale-105"
              loading="lazy"
            />
          </div>
          <?php endforeach; ?>

          <!-- Cloned 10 Logos for Seamless Infinite Loop -->
          <?php foreach ($row1_logos as $logo): ?>
          <div class="h-24 sm:h-28 px-6 sm:px-8 py-4 bg-white border border-[#E2E8F0] rounded-2xl shadow-[0_2px_8px_rgba(0,0,0,0.04)] hover:shadow-[0_8px_20px_rgba(0,0,0,0.08)] hover:border-[#00A8B5] transition-all duration-300 flex items-center justify-center min-w-[200px] sm:min-w-[240px] flex-shrink-0 group">
            <img 
              src="<?php echo $clients_base_path . $logo['file']; ?>" 
              alt="<?php echo htmlspecialchars($logo['name']); ?>" 
              class="<?php echo $logo['img_class']; ?> w-auto object-contain transition-transform duration-300 group-hover:scale-105"
              loading="lazy"
            />
          </div>
          <?php endforeach; ?>

        </div>
      </div>

      <!-- Track 2: Smooth Right Slide (Opposite Direction for Dynamic Motion) -->
      <div class="flex overflow-hidden">
        <div class="trust-marquee-track-right flex gap-4 sm:gap-6 pr-4 sm:pr-6">
          
          <!-- Original 10 Logos -->
          <?php foreach ($row2_logos as $logo): ?>
          <div class="h-24 sm:h-28 px-6 sm:px-8 py-4 bg-white border border-[#E2E8F0] rounded-2xl shadow-[0_2px_8px_rgba(0,0,0,0.04)] hover:shadow-[0_8px_20px_rgba(0,0,0,0.08)] hover:border-[#00A8B5] transition-all duration-300 flex items-center justify-center min-w-[200px] sm:min-w-[240px] flex-shrink-0 group">
            <img 
              src="<?php echo $clients_base_path . $logo['file']; ?>" 
              alt="<?php echo htmlspecialchars($logo['name']); ?>" 
              class="<?php echo $logo['img_class']; ?> w-auto object-contain transition-transform duration-300 group-hover:scale-105"
              loading="lazy"
            />
          </div>
          <?php endforeach; ?>

          <!-- Cloned 10 Logos for Seamless Infinite Loop -->
          <?php foreach ($row2_logos as $logo): ?>
          <div class="h-24 sm:h-28 px-6 sm:px-8 py-4 bg-white border border-[#E2E8F0] rounded-2xl shadow-[0_2px_8px_rgba(0,0,0,0.04)] hover:shadow-[0_8px_20px_rgba(0,0,0,0.08)] hover:border-[#00A8B5] transition-all duration-300 flex items-center justify-center min-w-[200px] sm:min-w-[240px] flex-shrink-0 group">
            <img 
              src="<?php echo $clients_base_path . $logo['file']; ?>" 
              alt="<?php echo htmlspecialchars($logo['name']); ?>" 
              class="<?php echo $logo['img_class']; ?> w-auto object-contain transition-transform duration-300 group-hover:scale-105"
              loading="lazy"
            />
          </div>
          <?php endforeach; ?>

        </div>
      </div>

    </div>

    <!-- Subtitle text -->
    <div class="text-xs sm:text-sm font-mono text-[#64748B] tracking-wide pt-2">
      Engineering search authority, AI citations & conversion pipelines across North America, UK & India
    </div>
  </div>
</section>
