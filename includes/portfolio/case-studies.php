<?php
/**
 * Case Studies & Proven Results Section Component for Portfolio Landing Page
 * Features 3 verified client case studies + Link to /case-studies hub
 * Strict Content Rule: Verified metrics and facts only. Zero placeholders.
 */
$base_path = function_exists('get_base_path') ? get_base_path() : '/';
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

    <!-- Featured Case Study 1: Solar4Good (UK) -->
    <div class="bg-gradient-to-br from-[#F6F8FB] via-[#FFFFFF] to-[#F6F8FB] border-2 border-[#00A8B5] rounded-3xl p-6 sm:p-10 lg:p-12 shadow-xl mb-12 relative overflow-hidden" data-aos="fade-up">
      
      <!-- Top Badge -->
      <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <div class="flex items-center gap-3">
          <div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-[#14151A] text-white text-xs font-bold shadow-sm">
            <span class="w-2 h-2 rounded-full bg-[#00F0FF]"></span>
            <span>Solar4Good (UK)</span>
          </div>
          <div>
            <span class="text-xs font-black tracking-widest text-[#008A94] uppercase block">Featured Case Study #1</span>
            <span class="text-xs text-[#5B5F6B]">🇬🇧 Renewable Energy & Solar Installation · UK</span>
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
            <span class="text-3xl sm:text-4xl font-black text-[#00A8B5]">#1–#2</span>
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
            <span class="text-3xl sm:text-4xl font-black text-[#16A34A]">200+</span>
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
            <span>GBP + Local SEO + Citations</span>
          </div>
        </div>

      </div>

      <!-- Execution Summary Narrative & CTA to Full Case Study -->
      <div class="bg-[#F6F8FB] border border-[#E4E7EC] rounded-2xl p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed max-w-2xl">
          <strong class="text-[#14151A]">Strategy Executed:</strong> Conducted complete citation NAP harmonization, optimized primary Google Business categories, built local geo-silo content, and deployed an automated review collection flow.
        </p>
        <div class="flex items-center gap-3 shrink-0">
          <a href="<?php echo $base_path; ?>case-studies/solar4good-uk" class="btn-primary !py-2.5 !px-5 !text-xs whitespace-nowrap">
            <span>Read Full Case Study</span>
            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
          </a>
        </div>
      </div>

    </div>

    <!-- Case Study 2 & 3 Grid: Higher Education Group + Smile Dental Clinic -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
      
      <!-- Case Study 2: Higher Education Group Bhopal -->
      <div class="bg-[#F6F8FB] border-2 border-[#E4E7EC] hover:border-[#00A8B5] rounded-3xl p-7 flex flex-col justify-between shadow-sm hover:shadow-xl transition-all group" data-aos="fade-up" data-aos-delay="100">
        <div>
          <div class="flex items-center justify-between mb-4">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-xl bg-[#14151A] text-white text-[11px] font-bold">
              <span class="w-2 h-2 rounded-full bg-[#00F0FF]"></span>
              <span>SRKU · RKDF · APJAKU</span>
            </div>
            <span class="text-xs font-bold text-[#5B5F6B]">🇮🇳 Bhopal, MP</span>
          </div>

          <h3 class="text-xl font-extrabold text-[#14151A] mb-2 group-hover:text-[#00A8B5] transition-colors">
            Higher Education Group: 40% Growth Across 3 Universities
          </h3>

          <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed mb-6">
            Complete website development, localized SEO silos, brand identity, and multi-campus social media management driving 40% growth in digital performance and admission enquiries.
          </p>

          <!-- Key Metrics -->
          <div class="grid grid-cols-2 gap-3 bg-white p-4 rounded-xl border border-[#E4E7EC] mb-6">
            <div>
              <div class="text-[10px] uppercase text-[#5B5F6B] font-bold">Digital Performance</div>
              <div class="text-xl font-black text-[#16A34A]">40% Growth</div>
              <div class="text-[10px] text-[#5B5F6B]">Admissions & Traffic</div>
            </div>
            <div>
              <div class="text-[10px] uppercase text-[#5B5F6B] font-bold">Universities Scaled</div>
              <div class="text-xl font-black text-[#008A94]">3 Campuses</div>
              <div class="text-[10px] text-[#5B5F6B]">Multi-Campus Retainer</div>
            </div>
          </div>
        </div>

        <div class="pt-4 border-t border-[#E4E7EC] flex items-center justify-between">
          <span class="text-xs text-[#5B5F6B] font-semibold">Web Dev · SEO · Social Media</span>
          <a href="<?php echo $base_path; ?>case-studies/higher-education-group-bhopal" class="inline-flex items-center gap-1 text-xs font-bold text-[#008A94] hover:text-[#00A8B5] group-hover:underline">
            <span>Read Case Study</span>
            <i data-lucide="arrow-right" class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform"></i>
          </a>
        </div>
      </div>

      <!-- Case Study 3: Smile Dental Clinic Bhopal -->
      <div class="bg-[#F6F8FB] border-2 border-[#E4E7EC] hover:border-[#00A8B5] rounded-3xl p-7 flex flex-col justify-between shadow-sm hover:shadow-xl transition-all group" data-aos="fade-up" data-aos-delay="200">
        <div>
          <div class="flex items-center justify-between mb-4">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-xl bg-[#14151A] text-white text-[11px] font-bold">
              <span class="w-2 h-2 rounded-full bg-[#16A34A]"></span>
              <span>Smile Dental Clinic</span>
            </div>
            <span class="text-xs font-bold text-[#5B5F6B]">🇮🇳 Bhopal, MP</span>
          </div>

          <h3 class="text-xl font-extrabold text-[#14151A] mb-2 group-hover:text-[#00A8B5] transition-colors">
            Smile Dental Clinic: 80% More Leads in 3 Months
          </h3>

          <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed mb-6">
            Google Business Profile re-engineering, treatment-specific local keyword ranking, and automated review acceleration in Bhopal.
          </p>

          <!-- Key Metrics -->
          <div class="grid grid-cols-2 gap-3 bg-white p-4 rounded-xl border border-[#E4E7EC] mb-6">
            <div>
              <div class="text-[10px] uppercase text-[#5B5F6B] font-bold">Patient Leads & Sales</div>
              <div class="text-xl font-black text-[#16A34A]">+80% Leads</div>
              <div class="text-[10px] text-[#5B5F6B]">In 3 Months</div>
            </div>
            <div>
              <div class="text-[10px] uppercase text-[#5B5F6B] font-bold">Google Maps Status</div>
              <div class="text-xl font-black text-[#008A94]">Top Visibility</div>
              <div class="text-[10px] text-[#5B5F6B]">Local Search in Bhopal</div>
            </div>
          </div>
        </div>

        <div class="pt-4 border-t border-[#E4E7EC] flex items-center justify-between">
          <span class="text-xs text-[#5B5F6B] font-semibold">GMB · Reviews · Local SEO</span>
          <a href="<?php echo $base_path; ?>case-studies/smile-dental-clinic-bhopal" class="inline-flex items-center gap-1 text-xs font-bold text-[#008A94] hover:text-[#00A8B5] group-hover:underline">
            <span>Read Case Study</span>
            <i data-lucide="arrow-right" class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform"></i>
          </a>
        </div>
      </div>

    </div>

    <!-- View All Case Studies Hub Bar -->
    <div class="text-center pt-4" data-aos="fade-up">
      <a href="<?php echo $base_path; ?>case-studies" class="btn-secondary !py-3.5 !px-8 !text-sm font-bold shadow-md hover:shadow-xl inline-flex items-center gap-2">
        <i data-lucide="grid" class="w-4 h-4 text-[#00A8B5]"></i>
        <span>View all 7 client case studies (Solar, Higher Ed, Healthcare, Hospitality, Retail & PR) →</span>
      </a>
    </div>

  </div>
</section>
