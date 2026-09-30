<?php
/**
 * Case Studies & Proven Results Section Component
 */
$base_path = function_exists('get_base_path') ? get_base_path() : '/';
$solar_logo = $base_path . 'assets/images/clients/solar4good.png';
?>
<section class="py-20 sm:py-28 bg-[#FFFFFF] relative overflow-hidden" id="results">
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#16A34A]/10 text-[#16A34A] border border-[#16A34A]/30 mb-4">
        <i data-lucide="trending-up" class="w-3.5 h-3.5"></i>
        <span>Verified Client Proof</span>
      </div>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#14151A] tracking-tight font-display mb-4">
        Real businesses. <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#16A34A] to-[#00A8B5]">Measurable rank & call growth.</span>
      </h2>
      <p class="text-base sm:text-lg text-[#5B5F6B] leading-relaxed">
        We track success in real phone calls, store directions, and booked revenue—not vague impressions. Here is how our growth engine compounds over 90 days.
      </p>
    </div>

    <!-- Featured Case Study Card: Solar4Good (UK) -->
    <div class="bg-gradient-to-br from-[#F6F8FB] via-[#FFFFFF] to-[#F6F8FB] border-2 border-[#00A8B5] rounded-3xl p-6 sm:p-10 lg:p-12 shadow-xl mb-12 relative overflow-hidden" data-aos="fade-up">
      
      <!-- Top Badge -->
      <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <div class="flex items-center gap-4">
          <div class="w-14 h-14 rounded-2xl bg-white p-2 border border-[#E4E7EC] shadow-sm flex items-center justify-center">
            <img src="<?php echo $solar_logo; ?>" alt="Solar4Good" class="max-h-10 w-auto object-contain" onerror="this.src='/assets/images/digital4local_logo.png';">
          </div>
          <div>
            <span class="text-xs font-black tracking-widest text-[#008A94] uppercase">Featured Case Study</span>
            <h3 class="text-2xl font-extrabold text-[#14151A]">Solar4Good (UK)</h3>
            <span class="text-xs text-[#5B5F6B]">Renewable Energy & Solar Installation</span>
          </div>
        </div>

        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#16A34A]/10 text-[#16A34A] border border-[#16A34A]/30 text-xs sm:text-sm font-bold">
          <i data-lucide="check-circle-2" class="w-4 h-4"></i>
          <span>90-Day Turnaround Verified</span>
        </div>
      </div>

      <!-- Before / After Metrics Row (3 Large Animated Stat Blocks) -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <!-- Metric 1: Maps Rank -->
        <div class="bg-white border border-[#E4E7EC] rounded-2xl p-6 shadow-sm hover:border-[#00A8B5] transition-all flex flex-col justify-between">
          <div class="text-xs font-bold uppercase tracking-wider text-[#5B5F6B] mb-2">Google Maps Rank</div>
          <div class="flex items-baseline gap-3 my-2">
            <span class="text-lg font-bold text-slate-400 line-through">#14</span>
            <i data-lucide="arrow-right" class="w-5 h-5 text-[#00A8B5]"></i>
            <span class="text-3xl sm:text-4xl font-black text-[#00A8B5] counter" data-target="2">#1–#2</span>
          </div>
          <div class="text-xs font-bold text-[#16A34A] flex items-center gap-1">
            <i data-lucide="trophy" class="w-3.5 h-3.5"></i>
            <span>Top 3 Local Pack Domination</span>
          </div>
        </div>

        <!-- Metric 2: Monthly Inbound Calls -->
        <div class="bg-white border border-[#E4E7EC] rounded-2xl p-6 shadow-sm hover:border-[#16A34A] transition-all flex flex-col justify-between">
          <div class="text-xs font-bold uppercase tracking-wider text-[#5B5F6B] mb-2">Inbound Phone Calls</div>
          <div class="flex items-baseline gap-3 my-2">
            <span class="text-lg font-bold text-slate-400 line-through">9 / mo</span>
            <i data-lucide="arrow-right" class="w-5 h-5 text-[#16A34A]"></i>
            <span class="text-3xl sm:text-4xl font-black text-[#16A34A] counter" data-target="200">200+</span>
          </div>
          <div class="text-xs font-bold text-[#16A34A] flex items-center gap-1">
            <i data-lucide="phone-incoming" class="w-3.5 h-3.5"></i>
            <span>+2,122% Call Growth in 90 Days</span>
          </div>
        </div>

        <!-- Metric 3: Strategy & Scope -->
        <div class="bg-white border border-[#E4E7EC] rounded-2xl p-6 shadow-sm hover:border-[#8B5CF6] transition-all flex flex-col justify-between">
          <div class="text-xs font-bold uppercase tracking-wider text-[#5B5F6B] mb-2">Execution Timeline</div>
          <div class="flex items-baseline gap-3 my-2">
            <span class="text-3xl sm:text-4xl font-black text-[#8B5CF6]">90 Days</span>
          </div>
          <div class="text-xs font-bold text-[#8B5CF6] flex items-center gap-1">
            <i data-lucide="zap" class="w-3.5 h-3.5"></i>
            <span>Local SEO + Citations + Reviews</span>
          </div>
        </div>

      </div>

      <!-- Execution Summary Narrative -->
      <div class="bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed max-w-3xl">
          <strong class="text-[#14151A]">Strategy Executed:</strong> Conducted complete citation NAP harmonization, optimized primary Google Business categories, built local geo-silo content, and deployed an automated review collection flow that pushed the business into the top 3 Google Maps pack.
        </p>
        <a href="#audit-form" class="btn-primary !py-2.5 !px-5 !text-xs shrink-0 whitespace-nowrap">
          <span>Get Same Results For Your Business</span>
          <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
        </a>
      </div>

    </div>

    <!-- 2 Clearly Marked Case Study Placeholder Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      
      <!-- Placeholder 1: Healthcare / Clinic -->
      <div class="bg-[#F6F8FB] border-2 border-dashed border-[#CBD5E1] rounded-2xl p-8 flex flex-col justify-between hover:border-[#00A8B5] transition-colors group" data-aos="fade-up" data-aos-delay="100">
        <div>
          <div class="flex items-center justify-between mb-4">
            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white border border-[#E4E7EC] text-[#5B5F6B]">
              [Add case study]
            </span>
            <span class="text-xs font-bold text-[#008A94]">Healthcare & Dental</span>
          </div>
          <h4 class="text-xl font-bold text-[#14151A] mb-2 group-hover:text-[#00A8B5] transition-colors">
            Bhopal Healthcare & Dental Clinic
          </h4>
          <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed mb-6">
            Slot reserved for upcoming verified client data. Case study details, before/after metrics, and growth graphs will be published here upon client sign-off.
          </p>

          <!-- Mock Metric Preview -->
          <div class="grid grid-cols-2 gap-3 bg-white p-4 rounded-xl border border-[#E4E7EC] text-center mb-4">
            <div>
              <div class="text-[10px] uppercase text-[#5B5F6B] font-bold">Patient Calls</div>
              <div class="text-lg font-extrabold text-[#16A34A]">+350% Lift</div>
            </div>
            <div>
              <div class="text-[10px] uppercase text-[#5B5F6B] font-bold">Google Reviews</div>
              <div class="text-lg font-extrabold text-[#00A8B5]">18 → 140+</div>
            </div>
          </div>
        </div>

        <div class="text-xs text-slate-400 font-mono text-center pt-2">
          // Content slot ready for client data update
        </div>
      </div>

      <!-- Placeholder 2: Showroom / Café -->
      <div class="bg-[#F6F8FB] border-2 border-dashed border-[#CBD5E1] rounded-2xl p-8 flex flex-col justify-between hover:border-[#00A8B5] transition-colors group" data-aos="fade-up" data-aos-delay="200">
        <div>
          <div class="flex items-center justify-between mb-4">
            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white border border-[#E4E7EC] text-[#5B5F6B]">
              [Add case study]
            </span>
            <span class="text-xs font-bold text-[#8B5CF6]">Retail Showroom & Dining</span>
          </div>
          <h4 class="text-xl font-bold text-[#14151A] mb-2 group-hover:text-[#00A8B5] transition-colors">
            Bhopal Retail Showroom & Café
          </h4>
          <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed mb-6">
            Slot reserved for upcoming verified client data. Case study details, before/after metrics, and growth graphs will be published here upon client sign-off.
          </p>

          <!-- Mock Metric Preview -->
          <div class="grid grid-cols-2 gap-3 bg-white p-4 rounded-xl border border-[#E4E7EC] text-center mb-4">
            <div>
              <div class="text-[10px] uppercase text-[#5B5F6B] font-bold">Store Walk-ins</div>
              <div class="text-lg font-extrabold text-[#16A34A]">10x Growth</div>
            </div>
            <div>
              <div class="text-[10px] uppercase text-[#5B5F6B] font-bold">Reel Impressions</div>
              <div class="text-lg font-extrabold text-[#8B5CF6]">250K+ Views</div>
            </div>
          </div>
        </div>

        <div class="text-xs text-slate-400 font-mono text-center pt-2">
          // Content slot ready for client data update
        </div>
      </div>

    </div>

  </div>
</section>
