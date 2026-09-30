<?php
/**
 * Sticky Header & Floating Elements for Portfolio / Bhopal Landing Page
 */
$base_path = function_exists('get_base_path') ? get_base_path() : '/';
$logo_path = $base_path . 'assets/images/digital4local_logo.png';
$clean_phone = $p_cfg['whatsapp_number_clean'];
$wa_url = "https://wa.me/{$clean_phone}?text=" . urlencode("Hi Digital4Local, I want a free audit for my business in Bhopal.");
?>

<!-- Sticky Header -->
<header id="portfolio-sticky-header" class="fixed top-0 left-0 right-0 z-50 bg-[#FFFFFF]/95 backdrop-blur-md border-b border-[#E4E7EC] shadow-sm transition-all duration-300">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 sm:h-20 flex items-center justify-between">
    
    <!-- Logo -->
    <a href="<?php echo $base_path; ?>index.php" class="flex items-center gap-3 group" aria-label="Digital4Local Home">
      <img src="<?php echo $logo_path; ?>" alt="Digital4Local" class="h-9 sm:h-12 w-auto object-contain transition-transform duration-200 group-hover:scale-105" width="180" height="48">
      <span class="hidden sm:inline-block px-2.5 py-0.5 rounded-full text-[11px] font-bold tracking-wide uppercase bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30">
        Bhopal Hub
      </span>
    </a>

    <!-- Desktop Navigation Anchors -->
    <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-[#14151A]" aria-label="Landing Page Navigation">
      <a href="#services" class="hover:text-[#00A8B5] transition-colors">Services</a>
      <a href="#system" class="hover:text-[#00A8B5] transition-colors">Growth System</a>
      <a href="#results" class="hover:text-[#00A8B5] transition-colors">Results</a>
      <a href="#reviews" class="hover:text-[#00A8B5] transition-colors">Reviews</a>
      <a href="#pricing" class="hover:text-[#00A8B5] transition-colors">Pricing</a>
      <a href="#calculator" class="hover:text-[#00A8B5] transition-colors">ROI Calculator</a>
      <a href="#faq" class="hover:text-[#00A8B5] transition-colors">FAQs</a>
    </nav>

    <!-- Header Actions -->
    <div class="flex items-center gap-3">
      <!-- Call / WhatsApp Quick Button -->
      <a href="<?php echo $wa_url; ?>" target="_blank" rel="noopener noreferrer" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold text-[#14151A] bg-[#F6F8FB] hover:bg-[#E4E7EC] border border-[#E4E7EC] transition-all">
        <i data-lucide="message-circle" class="w-4 h-4 text-[#16A34A]"></i>
        <span>WhatsApp</span>
      </a>

      <!-- Primary Sticky CTA -->
      <a href="#audit-form" class="btn-primary !py-2.5 !px-5 !text-xs sm:!text-sm">
        <span>Get Free Audit</span>
        <i data-lucide="arrow-right" class="w-4 h-4"></i>
      </a>
    </div>

  </div>
</header>

<!-- Floating WhatsApp Action Button (Bottom Right) -->
<aside class="fixed bottom-5 right-5 sm:bottom-8 sm:right-8 z-50 flex flex-col items-end gap-2" aria-label="Instant WhatsApp Help">
  <div class="hidden sm:flex items-center gap-2 bg-[#FFFFFF] text-[#14151A] text-xs font-semibold px-3 py-1.5 rounded-full border border-[#E4E7EC] shadow-lg animate-bounce">
    <span class="w-2 h-2 rounded-full bg-[#16A34A] animate-pulse"></span>
    <span>Online · Instant Reply</span>
  </div>
  <a href="<?php echo $wa_url; ?>" target="_blank" rel="noopener noreferrer" class="group relative flex items-center justify-center w-14 h-14 sm:w-16 sm:h-16 rounded-full bg-[#25D366] text-white shadow-2xl hover:scale-110 active:scale-95 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-[#25D366]/40" aria-label="Chat with Digital4Local Strategist on WhatsApp">
    <!-- Pulse ring -->
    <span class="absolute -inset-1 rounded-full bg-[#25D366]/40 animate-ping opacity-75"></span>
    <i data-lucide="message-circle" class="w-7 h-7 sm:w-8 sm:h-8 relative z-10 fill-current"></i>
  </a>
</aside>
