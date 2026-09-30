<?php
/**
 * Interactive ROI Calculator Component
 */
$clean_phone = $p_cfg['whatsapp_number_clean'];
?>
<section class="py-20 sm:py-28 bg-[#F6F8FB] border-y border-[#E4E7EC] relative overflow-hidden" id="calculator">
  
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Section Header -->
    <div class="text-center max-w-2xl mx-auto mb-12" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#16A34A]/10 text-[#16A34A] border border-[#16A34A]/30 mb-4">
        <i data-lucide="calculator" class="w-3.5 h-3.5"></i>
        <span>Live Return on Investment</span>
      </div>
      <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A] tracking-tight font-display mb-3">
        Will it pay off? <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#16A34A] to-[#00A8B5]">Do the maths.</span>
      </h2>
      <p class="text-xs sm:text-sm text-[#5B5F6B]">
        Calculate the exact number of new patients, diners, admissions, or customers you need per month to break even.
      </p>
    </div>

    <!-- Interactive Calculator Card -->
    <div class="bg-white border-2 border-[#E4E7EC] rounded-3xl p-6 sm:p-10 shadow-xl" data-aos="zoom-in">
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        
        <!-- Left: Inputs Form -->
        <div class="space-y-6">
          
          <!-- Input 1: Customer Lifetime Value -->
          <div>
            <label for="roi-customer-val" class="block text-xs font-bold uppercase tracking-wider text-[#14151A] mb-2">
              Average Value of 1 Customer / Patient (₹)
            </label>
            <div class="relative rounded-xl shadow-sm">
              <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-[#5B5F6B] font-bold text-sm">
                ₹
              </div>
              <input type="number" 
                     id="roi-customer-val" 
                     value="3000" 
                     min="100" 
                     step="100" 
                     class="block w-full rounded-xl border-2 border-[#E4E7EC] pl-8 pr-4 py-3 text-sm font-bold text-[#14151A] focus:border-[#00A8B5] focus:outline-none focus:ring-2 focus:ring-[#00F0FF]/30 transition-all">
            </div>
            <p class="text-[11px] text-[#5B5F6B] mt-1.5">E.g., consultation fee, average dining bill, or course fee.</p>
          </div>

          <!-- Input 2: Plan Selection -->
          <div>
            <label for="roi-plan-select" class="block text-xs font-bold uppercase tracking-wider text-[#14151A] mb-2">
              Select Growth Plan
            </label>
            <div class="relative">
              <select id="roi-plan-select" class="block w-full rounded-xl border-2 border-[#E4E7EC] px-4 py-3 text-sm font-bold text-[#14151A] focus:border-[#00A8B5] focus:outline-none focus:ring-2 focus:ring-[#00F0FF]/30 bg-white appearance-none cursor-pointer transition-all">
                <option value="14999" data-name="Launch">LOCAL LAUNCH (₹14,999 / mo)</option>
                <option value="24999" data-name="Growth" selected>LOCAL GROWTH (₹24,999 / mo) — Most Popular</option>
                <option value="39999" data-name="Leader">LOCAL LEADER (₹39,999 / mo)</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3.5 text-[#5B5F6B]">
                <i data-lucide="chevron-down" class="w-4 h-4"></i>
              </div>
            </div>
          </div>

        </div>

        <!-- Right: Live Result Box -->
        <div class="bg-gradient-to-br from-[#F6F8FB] via-[#EAF9FA] to-[#F6F8FB] border-2 border-[#00A8B5] rounded-2xl p-6 sm:p-8 text-center flex flex-col justify-between shadow-md">
          
          <div class="text-xs font-black uppercase tracking-widest text-[#008A94] mb-2">
            Break-Even Requirement
          </div>

          <div class="my-4">
            <span class="text-xs text-[#5B5F6B] block mb-1">You need just</span>
            <div class="flex items-center justify-center gap-1 my-1">
              <span id="roi-customers-needed" class="text-5xl sm:text-6xl font-black text-[#14151A] tracking-tight">9</span>
              <span class="text-lg font-bold text-[#008A94]">customers</span>
            </div>
            <span class="text-xs text-[#5B5F6B] block">per month to completely cover your plan investment.</span>
          </div>

          <div class="pt-4 border-t border-[#00F0FF]/30">
            <p class="text-[11px] text-[#008A94] font-semibold mb-3">
              ★ Most local businesses in Bhopal generate 25–100+ new customer enquiries a month from Google Maps and Reels alone.
            </p>
            <a href="#audit-form" class="btn-primary !py-2.5 !px-5 !text-xs w-full">
              <span>Claim Free Audit & Forecast</span>
              <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </a>
          </div>

        </div>

      </div>

    </div>

  </div>
</section>
