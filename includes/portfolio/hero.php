<?php
/**
 * Hero Section Component - Bhopal & Portfolio Landing Page
 */
$wa_hero_cta = "https://wa.me/{$p_cfg['whatsapp_number_clean']}?text=" . urlencode("Hi Digital4Local, I want a free audit for my business in Bhopal");
$gbp_url = $p_cfg['gbp_url'];
?>

<section class="relative pt-24 sm:pt-32 pb-16 sm:pb-24 overflow-hidden bg-gradient-to-b from-[#FFFFFF] via-[#F6F8FB] to-[#FFFFFF]" id="hero">
  
  <!-- Subtle Ambient Glow -->
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-6xl h-96 bg-gradient-to-r from-[#00F0FF]/15 via-[#8B5CF6]/10 to-[#00F0FF]/15 blur-3xl pointer-events-none -z-10"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
      
      <!-- Left Column: Copy, Badges, CTAs, Trust Proof -->
      <div class="lg:col-span-7 flex flex-col items-start text-left" data-aos="fade-up" data-aos-duration="600">
        
        <!-- Eyebrow Badge -->
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#00F0FF]/10 border border-[#00F0FF]/30 text-[#008A94] text-xs sm:text-sm font-bold tracking-wide uppercase mb-6 shadow-sm">
          <span class="w-2 h-2 rounded-full bg-[#00A8B5] animate-ping"></span>
          <span>Bhopal’s Local SEO, Google Maps & AI Search Agency</span>
        </div>

        <!-- H1 Headline (Fluid Clamp Scale) -->
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-[3.25rem] font-extrabold text-[#14151A] tracking-tight leading-[1.12] mb-6 font-display">
          Customers in Bhopal are searching for you. <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00A8B5] via-[#00F0FF] to-[#0284C7]">Let’s make sure they find you, not your competitor.</span>
        </h1>

        <!-- Sub-headline -->
        <p class="text-base sm:text-lg md:text-xl text-[#5B5F6B] leading-relaxed max-w-2xl mb-8 font-normal">
          We get local businesses to the top of Google Maps, grow your Instagram with reels that sell, and make you visible on ChatGPT and Google AI search—all managed by one team with one clear plan.
        </p>

        <!-- Primary & Secondary CTAs -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 w-full sm:w-auto mb-10">
          <a href="#audit-form" class="btn-primary !py-3.5 !px-8 !text-sm sm:!text-base shadow-xl">
            <span>Get My Free Local Visibility Audit</span>
            <i data-lucide="arrow-right" class="w-5 h-5"></i>
          </a>

          <a href="<?php echo $wa_hero_cta; ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary !py-3.5 !px-7 !text-sm sm:!text-base">
            <i data-lucide="message-circle" class="w-5 h-5 text-[#16A34A]"></i>
            <span>Chat on WhatsApp</span>
          </a>
        </div>

        <!-- Trust Row Under CTAs -->
        <div class="w-full pt-6 border-t border-[#E4E7EC] grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6 text-left">
          
          <!-- 1. Google Star Rating -->
          <a href="<?php echo $gbp_url; ?>" target="_blank" rel="noopener noreferrer" class="group flex flex-col" title="View Google Reviews">
            <div class="flex items-center gap-1 text-amber-500 mb-1">
              <i data-lucide="star" class="w-4 h-4 fill-amber-400"></i>
              <span class="font-black text-sm text-[#14151A]">5.0 Rating</span>
            </div>
            <span class="text-xs text-[#5B5F6B] group-hover:text-[#00A8B5] transition-colors underline-offset-2 hover:underline">
              40+ Google Reviews ↗
            </span>
          </a>

          <!-- 2. Experience -->
          <div class="flex flex-col">
            <div class="flex items-center gap-1 text-[#00A8B5] mb-1">
              <i data-lucide="award" class="w-4 h-4"></i>
              <span class="font-black text-sm text-[#14151A]">5+ Years</span>
            </div>
            <span class="text-xs text-[#5B5F6B]">Specialized in SEO</span>
          </div>

          <!-- 3. Market Footprint -->
          <div class="flex flex-col">
            <div class="flex items-center gap-1 text-[#8B5CF6] mb-1">
              <i data-lucide="globe-2" class="w-4 h-4"></i>
              <span class="font-black text-sm text-[#14151A]">India & UK</span>
            </div>
            <span class="text-xs text-[#5B5F6B]">Client Footprint</span>
          </div>

          <!-- 4. Result Speed -->
          <div class="flex flex-col">
            <div class="flex items-center gap-1 text-[#16A34A] mb-1">
              <i data-lucide="trending-up" class="w-4 h-4"></i>
              <span class="font-black text-sm text-[#14151A]">#14 → #1–2</span>
            </div>
            <span class="text-xs text-[#5B5F6B]">Average in 90 Days</span>
          </div>

        </div>

      </div>

      <!-- Right Column: Interactive HTML/CSS/SVG Mock (Google Maps #1 + iPhone Reel + AI Bubble) -->
      <div class="lg:col-span-5 relative mt-4 lg:mt-0 flex justify-center" data-aos="fade-left" data-aos-duration="800">
        
        <div class="relative w-full max-w-md">
          
          <!-- Outer Glow Container -->
          <div class="absolute -inset-2 rounded-2xl bg-gradient-to-tr from-[#00F0FF]/30 to-[#8B5CF6]/20 blur-xl opacity-75"></div>

          <!-- Main Composite Dashboard Mock Card -->
          <div class="relative bg-[#FFFFFF] border-2 border-[#E4E7EC] rounded-2xl p-5 shadow-2xl space-y-4">
            
            <!-- Top Google Maps Local Pack Simulation -->
            <div class="bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl p-3.5 space-y-3">
              
              <!-- Search Bar Mock -->
              <div class="flex items-center justify-between bg-[#FFFFFF] border border-[#E4E7EC] rounded-lg px-3 py-2 text-xs text-[#5B5F6B] shadow-inner">
                <div class="flex items-center gap-2 truncate">
                  <i data-lucide="search" class="w-3.5 h-3.5 text-[#00A8B5] shrink-0"></i>
                  <span class="font-medium truncate">best local business in bhopal near me</span>
                </div>
                <span class="w-2 h-2 rounded-full bg-[#16A34A] shrink-0"></span>
              </div>

              <!-- #1 Ranked Business Card (Highlighted) -->
              <div class="bg-white border-2 border-[#00A8B5] rounded-xl p-3 shadow-md relative overflow-hidden transition-transform hover:scale-[1.02]">
                <div class="absolute top-0 right-0 bg-[#00A8B5] text-white text-[10px] font-black px-2.5 py-0.5 rounded-bl-lg uppercase tracking-wider flex items-center gap-1">
                  <i data-lucide="crown" class="w-3 h-3"></i>
                  <span>Rank #1 (Google 3-Pack)</span>
                </div>

                <div class="flex items-start gap-3 mt-1">
                  <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-[#00F0FF] to-[#0284C7] text-white font-black text-base flex items-center justify-center shadow-md shrink-0">
                    D4L
                  </div>
                  <div class="flex-1 min-w-0 pr-20">
                    <h3 class="font-bold text-sm text-[#14151A] truncate">Your Business Name</h3>
                    <div class="flex items-center gap-1 text-[11px] text-amber-500 font-bold">
                      <span>5.0</span>
                      <div class="flex">
                        <i data-lucide="star" class="w-3 h-3 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3 h-3 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3 h-3 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3 h-3 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3 h-3 fill-amber-400"></i>
                      </div>
                      <span class="text-[#5B5F6B] font-normal">(120+ reviews)</span>
                    </div>
                    <p class="text-[11px] text-[#5B5F6B] truncate">Bhopal, Madhya Pradesh · Open 9am - 7pm</p>
                  </div>
                </div>

                <!-- Call & Direction Action Buttons -->
                <div class="mt-3 pt-2.5 border-t border-[#E4E7EC] flex items-center justify-between text-xs font-bold text-[#00A8B5]">
                  <span class="flex items-center gap-1.5 hover:underline cursor-pointer">
                    <i data-lucide="phone-call" class="w-3.5 h-3.5 text-[#16A34A]"></i> 200+ Calls/mo
                  </span>
                  <span class="flex items-center gap-1.5 hover:underline cursor-pointer">
                    <i data-lucide="navigation" class="w-3.5 h-3.5 text-[#00A8B5]"></i> Directions
                  </span>
                  <span class="flex items-center gap-1.5 text-slate-700 bg-slate-100 px-2 py-0.5 rounded text-[11px]">
                    <i data-lucide="check-circle" class="w-3 h-3 text-[#16A34A]"></i> Verified
                  </span>
                </div>
              </div>

              <!-- #2 & #3 Competitor Mock (Dimmed) -->
              <div class="bg-white/60 border border-[#E4E7EC] rounded-lg p-2.5 flex items-center justify-between text-xs text-[#5B5F6B] opacity-75">
                <div class="flex items-center gap-2">
                  <span class="text-xs font-bold text-slate-400">#2</span>
                  <span class="font-medium text-slate-700">Competitor A (Lower Reviews)</span>
                </div>
                <span class="text-[11px] text-amber-600">4.1 ★ (18)</span>
              </div>

            </div>

            <!-- Two Sub-Mocks: Mobile Reel Card & AI Recommendation Bubble -->
            <div class="grid grid-cols-2 gap-3 pt-1">
              
              <!-- Sub-Mock 1: Instagram Reel Simulator -->
              <div class="bg-[#14151A] text-white rounded-xl p-3 flex flex-col justify-between relative overflow-hidden shadow-lg group">
                <div class="flex items-center justify-between mb-2">
                  <div class="flex items-center gap-1.5 text-[10px] text-pink-400 font-bold">
                    <i data-lucide="instagram" class="w-3 h-3"></i>
                    <span>Reel Viral</span>
                  </div>
                  <span class="text-[10px] text-slate-400">45.2K Views</span>
                </div>

                <div class="my-2 text-center py-3 bg-white/5 rounded-lg border border-white/10 relative">
                  <div class="w-8 h-8 rounded-full bg-pink-500/30 text-pink-300 flex items-center justify-center mx-auto mb-1 animate-pulse">
                    <i data-lucide="play" class="w-4 h-4 fill-pink-300"></i>
                  </div>
                  <span class="text-[10px] font-bold text-white tracking-wide">High-Hook Script</span>
                </div>

                <div class="flex items-center justify-between text-[9px] text-slate-300 pt-1 border-t border-white/10">
                  <span>+185 Enquiries</span>
                  <span class="text-[#25D366] font-bold">WhatsApp Direct</span>
                </div>
              </div>

              <!-- Sub-Mock 2: AI Search (ChatGPT/Gemini) Recommendation Bubble -->
              <div class="bg-gradient-to-br from-[#0F172A] to-[#1E293B] text-white rounded-xl p-3 flex flex-col justify-between shadow-lg border border-[#00F0FF]/30">
                <div class="flex items-center gap-1.5 text-[10px] text-[#00F0FF] font-bold mb-1">
                  <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
                  <span>AI Engine Citation</span>
                </div>

                <div class="bg-white/10 rounded p-2 text-[10px] text-slate-200 leading-tight my-1 border-l-2 border-[#00F0FF]">
                  "Based on verified Bhopal reviews, <strong class="text-[#00F0FF]">Your Business</strong> is rated highest for quality & trust."
                </div>

                <div class="flex items-center justify-between text-[9px] text-slate-400 pt-1">
                  <span>ChatGPT · Gemini</span>
                  <span class="text-emerald-400 font-bold">Cited #1</span>
                </div>
              </div>

            </div>

          </div>

          <!-- Floating Accent Badge -->
          <div class="absolute -bottom-4 -left-4 bg-[#FFFFFF] border-2 border-[#16A34A] text-[#14151A] rounded-xl px-3.5 py-2 shadow-xl flex items-center gap-2 text-xs font-bold animate-float">
            <div class="w-6 h-6 rounded-full bg-[#16A34A]/20 text-[#16A34A] flex items-center justify-center shrink-0">
              <i data-lucide="phone" class="w-3.5 h-3.5"></i>
            </div>
            <div>
              <div class="text-[10px] text-[#5B5F6B]">Direct Phone Inbound</div>
              <div class="text-[#16A34A] font-extrabold">+2,122% Call Growth</div>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Service Chips Row (Below Hero Grid) -->
    <div class="mt-16 pt-8 border-t border-[#E4E7EC]" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
      <p class="text-xs font-bold text-center uppercase tracking-widest text-[#5B5F6B] mb-4">
        Complete End-to-End Growth Stack Managed for Your Business
      </p>
      <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3.5">
        <?php foreach ($p_cfg['service_chips'] as $chip): ?>
          <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#FFFFFF] text-[#14151A] border border-[#E4E7EC] shadow-sm hover:border-[#00A8B5] hover:text-[#00A8B5] transition-all">
            <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-[#00A8B5]"></i>
            <span><?php echo htmlspecialchars($chip); ?></span>
          </span>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>
