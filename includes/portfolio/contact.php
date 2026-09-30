<?php
/**
 * Final CTA & Free Local Visibility Audit Contact Form Component
 */
$gbp_url = $p_cfg['gbp_url'];
$insta_url = $p_cfg['instagram_url'];
$clean_phone = $p_cfg['whatsapp_number_clean'];
$email = $p_cfg['email'];
?>
<section class="py-20 sm:py-28 bg-[#F6F8FB] border-t border-[#E4E7EC] relative overflow-hidden" id="audit-form">
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      
      <!-- Left Column: Direct Contact Details & Value Proof -->
      <div class="lg:col-span-5 space-y-8 text-left" data-aos="fade-right">
        
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30">
          <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
          <span>100% Free · No Obligation</span>
        </div>

        <div>
          <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#14151A] tracking-tight font-display mb-4">
            Get your free <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00A8B5] via-[#00F0FF] to-[#0284C7]">Local Visibility Audit</span>
          </h2>
          <p class="text-base sm:text-lg text-[#5B5F6B] leading-relaxed">
            We’ll show you exactly where you rank across Bhopal pin codes, what your top 3 competitors do better, and the step-by-step roadmap to outrank them.
          </p>
        </div>

        <!-- What You Will Receive List -->
        <div class="space-y-3.5 bg-white p-6 rounded-2xl border border-[#E4E7EC] shadow-sm">
          <div class="text-xs font-black uppercase tracking-wider text-[#008A94] mb-2">
            Your Audit Includes (Delivered in 24h):
          </div>

          <div class="flex items-start gap-3 text-xs sm:text-sm text-[#14151A]">
            <i data-lucide="check-circle" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
            <span><strong>5x5 Google Maps Geo-Grid Scan:</strong> Pin-point rank visualization.</span>
          </div>

          <div class="flex items-start gap-3 text-xs sm:text-sm text-[#14151A]">
            <i data-lucide="check-circle" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
            <span><strong>Competitor Gap Analysis:</strong> Citation & review deficit check.</span>
          </div>

          <div class="flex items-start gap-3 text-xs sm:text-sm text-[#14151A]">
            <i data-lucide="check-circle" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
            <span><strong>AI Engine Citation Check:</strong> ChatGPT & Perplexity visibility.</span>
          </div>

          <div class="flex items-start gap-3 text-xs sm:text-sm text-[#14151A]">
            <i data-lucide="check-circle" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5"></i>
            <span><strong>Custom 90-Day Action Plan:</strong> Immediate revenue quick-wins.</span>
          </div>
        </div>

        <!-- Direct Contact Channels -->
        <div class="grid grid-cols-2 gap-4 pt-2">
          <a href="https://wa.me/<?php echo $clean_phone; ?>?text=<?php echo urlencode('Hi Digital4Local, I would like to request my free business audit.'); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 p-3.5 rounded-xl bg-white border border-[#E4E7EC] hover:border-[#16A34A] transition-all group">
            <div class="w-9 h-9 rounded-lg bg-[#25D366]/20 text-[#16A34A] flex items-center justify-center shrink-0">
              <i data-lucide="message-circle" class="w-4 h-4"></i>
            </div>
            <div class="text-left truncate">
              <div class="text-[10px] text-[#5B5F6B] font-medium">WhatsApp Direct</div>
              <div class="text-xs font-bold text-[#14151A] group-hover:text-[#16A34A] truncate">+91 91311 40530</div>
            </div>
          </a>

          <a href="mailto:<?php echo $email; ?>" class="flex items-center gap-3 p-3.5 rounded-xl bg-white border border-[#E4E7EC] hover:border-[#00A8B5] transition-all group">
            <div class="w-9 h-9 rounded-lg bg-[#00F0FF]/20 text-[#008A94] flex items-center justify-center shrink-0">
              <i data-lucide="mail" class="w-4 h-4"></i>
            </div>
            <div class="text-left truncate">
              <div class="text-[10px] text-[#5B5F6B] font-medium">Email Us</div>
              <div class="text-xs font-bold text-[#14151A] group-hover:text-[#00A8B5] truncate"><?php echo $email; ?></div>
            </div>
          </a>
        </div>

      </div>

      <!-- Right Column: Interactive Audit Lead Form -->
      <div class="lg:col-span-7" data-aos="fade-left">
        
        <div class="bg-white border-2 border-[#E4E7EC] rounded-3xl p-6 sm:p-10 shadow-2xl relative">
          
          <div class="mb-6">
            <h3 class="text-2xl font-extrabold text-[#14151A] font-display">
              Request Your Free Audit
            </h3>
            <p class="text-xs sm:text-sm text-[#5B5F6B] mt-1">
              Fill in your details below. Our senior strategist will analyze your local presence and connect via WhatsApp within 2 hours.
            </p>
          </div>

          <form id="audit-lead-form" class="space-y-4" novalidate>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <!-- Name -->
              <div>
                <label for="form-name" class="block text-xs font-bold text-[#14151A] uppercase tracking-wider mb-1.5">
                  Your Full Name *
                </label>
                <input type="text" id="form-name" name="name" required placeholder="e.g. Dr. Rajesh Sharma" class="w-full rounded-xl border-2 border-[#E4E7EC] px-4 py-3 text-xs sm:text-sm font-medium text-[#14151A] focus:border-[#00A8B5] focus:outline-none focus:ring-2 focus:ring-[#00F0FF]/20 transition-all">
              </div>

              <!-- Business Name -->
              <div>
                <label for="form-biz-name" class="block text-xs font-bold text-[#14151A] uppercase tracking-wider mb-1.5">
                  Business / Clinic Name *
                </label>
                <input type="text" id="form-biz-name" name="business_name" required placeholder="e.g. Apex Dental Clinic Bhopal" class="w-full rounded-xl border-2 border-[#E4E7EC] px-4 py-3 text-xs sm:text-sm font-medium text-[#14151A] focus:border-[#00A8B5] focus:outline-none focus:ring-2 focus:ring-[#00F0FF]/20 transition-all">
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <!-- Phone / WhatsApp -->
              <div>
                <label for="form-phone" class="block text-xs font-bold text-[#14151A] uppercase tracking-wider mb-1.5">
                  WhatsApp Number *
                </label>
                <input type="tel" id="form-phone" name="phone" required placeholder="e.g. 9131140530" class="w-full rounded-xl border-2 border-[#E4E7EC] px-4 py-3 text-xs sm:text-sm font-medium text-[#14151A] focus:border-[#00A8B5] focus:outline-none focus:ring-2 focus:ring-[#00F0FF]/20 transition-all">
              </div>

              <!-- Category Dropdown -->
              <div>
                <label for="form-category" class="block text-xs font-bold text-[#14151A] uppercase tracking-wider mb-1.5">
                  Business Category *
                </label>
                <div class="relative">
                  <select id="form-category" name="category" required class="w-full rounded-xl border-2 border-[#E4E7EC] px-4 py-3 text-xs sm:text-sm font-medium text-[#14151A] focus:border-[#00A8B5] focus:outline-none focus:ring-2 focus:ring-[#00F0FF]/20 bg-white appearance-none cursor-pointer transition-all">
                    <option value="" disabled selected>Select Your Industry</option>
                    <option value="Clinics & Dentists">Clinics & Dentists</option>
                    <option value="Coaching Institutes">Coaching Institutes & Colleges</option>
                    <option value="Restaurants & Cafés">Restaurants & Cafés</option>
                    <option value="Real Estate">Real Estate & Construction</option>
                    <option value="Salons & Gyms">Salons, Spas & Gyms</option>
                    <option value="Showrooms & Retail">Showrooms & Retail Stores</option>
                    <option value="Other Local Business">Other Local Business</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3.5 text-[#5B5F6B]">
                    <i data-lucide="chevron-down" class="w-4 h-4"></i>
                  </div>
                </div>
              </div>
            </div>

            <!-- Website / Google Maps Link (Optional) -->
            <div>
              <label for="form-link" class="block text-xs font-bold text-[#14151A] uppercase tracking-wider mb-1.5">
                Google Maps or Website Link <span class="text-[#5B5F6B] font-normal lowercase">(optional)</span>
              </label>
              <input type="url" id="form-link" name="maps_link" placeholder="https://maps.app.goo.gl/... or https://yourwebsite.com" class="w-full rounded-xl border-2 border-[#E4E7EC] px-4 py-3 text-xs sm:text-sm font-medium text-[#14151A] focus:border-[#00A8B5] focus:outline-none focus:ring-2 focus:ring-[#00F0FF]/20 transition-all">
            </div>

            <!-- Message (Optional) -->
            <div>
              <label for="form-message" class="block text-xs font-bold text-[#14151A] uppercase tracking-wider mb-1.5">
                Current Goal or Biggest Challenge <span class="text-[#5B5F6B] font-normal lowercase">(optional)</span>
              </label>
              <textarea id="form-message" name="message" rows="2" placeholder="e.g. Want more patient walk-ins from MP Nagar and Arera Colony area..." class="w-full rounded-xl border-2 border-[#E4E7EC] px-4 py-3 text-xs sm:text-sm font-medium text-[#14151A] focus:border-[#00A8B5] focus:outline-none focus:ring-2 focus:ring-[#00F0FF]/20 transition-all"></textarea>
            </div>

            <!-- Form Validation Alert Box -->
            <div id="form-alert" class="hidden p-3 rounded-xl text-xs font-bold bg-red-50 text-red-700 border border-red-200"></div>

            <!-- Submit Button -->
            <button type="submit" id="form-submit-btn" class="btn-primary w-full !py-4 !text-sm sm:!text-base shadow-xl mt-2 font-extrabold">
              <i data-lucide="send" class="w-4 h-4"></i>
              <span>Get My Free Audit on WhatsApp Now</span>
            </button>

            <!-- Privacy Guarantee -->
            <p class="text-[11px] text-center text-[#5B5F6B] mt-2">
              🔒 100% Privacy. Zero spam. We never share your contact details.
            </p>

          </form>

        </div>

      </div>

    </div>

  </div>
</section>
