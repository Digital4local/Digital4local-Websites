<!-- Digital4Local - Multi-step Book Demo Modal -->
<div id="book-demo-modal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-[#14151A]/60 backdrop-blur-md p-4 overflow-y-auto">
  
  <div class="relative w-full max-w-xl bg-[#FFFFFF] border border-[#E4E7EC] rounded-2xl shadow-2xl p-6 sm:p-8 overflow-hidden my-8">
    <!-- Confetti Canvas Background -->
    <canvas id="confetti-canvas" class="absolute inset-0 pointer-events-none z-20"></canvas>
    
    <!-- Close Button -->
    <button id="modal-close-btn" class="absolute top-4 right-4 text-[#5B5F6B] hover:text-[#14151A] p-2 rounded-lg bg-[#F6F8FB] border border-[#E4E7EC] z-30 transition-colors">
      <i data-lucide="x" class="w-5 h-5"></i>
    </button>

    <!-- Header Badge -->
    <div class="flex items-center gap-2 mb-4">
      <span class="pulse-badge py-0.5 px-2.5 text-xs">
        <span class="pulse-dot"></span> REAL-TIME CALENDAR ACTIVE
      </span>
      <span class="text-xs font-mono text-[#5B5F6B]">Step <span id="current-step-label">1</span> of 4</span>
    </div>

    <!-- Step Progress Bar Indicators -->
    <div class="flex items-center justify-between gap-2 mb-8 border-b border-[#E4E7EC] pb-4">
      <div class="flex items-center gap-2">
        <div id="step-indicator-1" class="w-7 h-7 rounded-full bg-[#00F0FF] text-[#0A0A0F] font-bold text-xs flex items-center justify-center transition-all shadow-sm">1</div>
        <span class="text-xs text-[#14151A] font-semibold hidden sm:inline">Info</span>
      </div>
      <div class="w-8 h-[1px] bg-[#E4E7EC]"></div>
      <div class="flex items-center gap-2">
        <div id="step-indicator-2" class="w-7 h-7 rounded-full bg-[#EEF2F6] text-[#5B5F6B] font-bold text-xs flex items-center justify-center transition-all">2</div>
        <span class="text-xs text-[#5B5F6B] font-medium hidden sm:inline">Business</span>
      </div>
      <div class="w-8 h-[1px] bg-[#E4E7EC]"></div>
      <div class="flex items-center gap-2">
        <div id="step-indicator-3" class="w-7 h-7 rounded-full bg-[#EEF2F6] text-[#5B5F6B] font-bold text-xs flex items-center justify-center transition-all">3</div>
        <span class="text-xs text-[#5B5F6B] font-medium hidden sm:inline">Schedule</span>
      </div>
      <div class="w-8 h-[1px] bg-[#E4E7EC]"></div>
      <div class="flex items-center gap-2">
        <div id="step-indicator-4" class="w-7 h-7 rounded-full bg-[#EEF2F6] text-[#5B5F6B] font-bold text-xs flex items-center justify-center transition-all">4</div>
        <span class="text-xs text-[#5B5F6B] font-medium hidden sm:inline">Confirm</span>
      </div>
    </div>

    <!-- STEP 1: Contact Information -->
    <div id="modal-step-1" class="space-y-4">
      <div>
        <h3 class="text-xl font-bold text-[#14151A]">Book Your AI Growth Strategy Session</h3>
        <p class="text-xs text-[#5B5F6B] mt-1">Get a custom AI Visibility & Local SEO Audit tailored for your brand.</p>
      </div>

      <div class="space-y-3">
        <div>
          <label class="block text-xs font-mono text-[#5B5F6B] mb-1">YOUR FULL NAME *</label>
          <input type="text" id="demo-name" placeholder="Alex Morgan" required class="w-full bg-[#F6F8FB] border border-[#E4E7EC] focus:border-[#00A8B5] rounded-lg px-4 py-2.5 text-sm text-[#14151A] outline-none">
        </div>
        <div>
          <label class="block text-xs font-mono text-[#5B5F6B] mb-1">WORK EMAIL *</label>
          <input type="email" id="demo-email" placeholder="alex@company.com" required class="w-full bg-[#F6F8FB] border border-[#E4E7EC] focus:border-[#00A8B5] rounded-lg px-4 py-2.5 text-sm text-[#14151A] outline-none">
        </div>
        <div>
          <label class="block text-xs font-mono text-[#5B5F6B] mb-1">PHONE / WHATSAPP (OPTIONAL)</label>
          <input type="tel" id="demo-phone" placeholder="+1 (555) 019-2834" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] focus:border-[#00A8B5] rounded-lg px-4 py-2.5 text-sm text-[#14151A] outline-none">
        </div>
      </div>

      <button id="step-1-next" class="btn-primary w-full mt-4 text-sm font-semibold">
        Next: Business Details <i data-lucide="arrow-right" class="w-4 h-4"></i>
      </button>
    </div>

    <!-- STEP 2: Business Profile & Goals -->
    <div id="modal-step-2" class="space-y-4 hidden">
      <div>
        <h3 class="text-xl font-bold text-[#14151A]">Tell Us About Your Brand</h3>
        <p class="text-xs text-[#5B5F6B] mt-1">We prepare live rank & citation data prior to our call.</p>
      </div>

      <div class="space-y-3">
        <div>
          <label class="block text-xs font-mono text-[#5B5F6B] mb-1">COMPANY NAME *</label>
          <input type="text" id="demo-company" placeholder="Apex Dental / ScaleTech SaaS" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] focus:border-[#00A8B5] rounded-lg px-4 py-2.5 text-sm text-[#14151A] outline-none">
        </div>
        <div>
          <label class="block text-xs font-mono text-[#5B5F6B] mb-1">WEBSITE URL</label>
          <input type="url" id="demo-website" placeholder="https://example.com" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] focus:border-[#00A8B5] rounded-lg px-4 py-2.5 text-sm text-[#14151A] outline-none">
        </div>
        <div>
          <label class="block text-xs font-mono text-[#5B5F6B] mb-1">PRIMARY INDUSTRY</label>
          <select id="demo-industry" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] focus:border-[#00A8B5] rounded-lg px-4 py-2.5 text-sm text-[#14151A] outline-none">
            <option value="local">Local Service Business (Dental, Legal, Solar, Plumbing, Real Estate)</option>
            <option value="startup">VC-Backed Startup / Emerging Brand</option>
            <option value="saas">B2B SaaS / Enterprise Tech</option>
          </select>
        </div>
      </div>

      <div class="flex gap-3 pt-2">
        <button onclick="showStep(1)" class="btn-secondary flex-1 text-sm">Back</button>
        <button id="step-2-next" class="btn-primary flex-1 text-sm font-semibold">Next: Pick Time <i data-lucide="arrow-right" class="w-4 h-4"></i></button>
      </div>
    </div>

    <!-- STEP 3: Date & Time Selector -->
    <div id="modal-step-3" class="space-y-4 hidden">
      <div>
        <h3 class="text-xl font-bold text-[#14151A]">Select Date & Time Slot</h3>
        <p class="text-xs text-[#5B5F6B] mt-1">30-Minute Live Strategy Session & Custom AI Growth Blueprint</p>
      </div>

      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block text-xs font-mono text-[#5B5F6B] mb-1">PREFERRED DATE</label>
          <input type="date" value="2026-09-02" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] focus:border-[#00A8B5] rounded-lg px-3 py-2.5 text-sm text-[#14151A] outline-none">
        </div>
        <div>
          <label class="block text-xs font-mono text-[#5B5F6B] mb-1">TIME SLOT (EST)</label>
          <select class="w-full bg-[#F6F8FB] border border-[#E4E7EC] focus:border-[#00A8B5] rounded-lg px-3 py-2.5 text-sm text-[#14151A] outline-none">
            <option>10:00 AM EST</option>
            <option>02:00 PM EST</option>
            <option>04:30 PM EST</option>
          </select>
        </div>
      </div>

      <div>
        <label class="block text-xs font-mono text-[#5B5F6B] mb-1">MAIN GROWTH BOTTLENECK / NOTES</label>
        <textarea rows="3" placeholder="e.g. Need to rank #1 on Google Maps in Austin, or get cited by ChatGPT for our SaaS..." class="w-full bg-[#F6F8FB] border border-[#E4E7EC] focus:border-[#00A8B5] rounded-lg px-4 py-2.5 text-sm text-[#14151A] outline-none resize-none"></textarea>
      </div>

      <div class="flex gap-3 pt-2">
        <button onclick="showStep(2)" class="btn-secondary flex-1 text-sm">Back</button>
        <button id="step-3-submit" class="btn-primary flex-1 text-sm font-semibold">Confirm Booking <i data-lucide="check-circle" class="w-4 h-4"></i></button>
      </div>
    </div>

    <!-- STEP 4: Success & Confirmation -->
    <div id="modal-step-4" class="space-y-4 text-center py-4 hidden">
      <div class="w-16 h-16 bg-[#00F0FF]/15 text-[#00A8B5] rounded-full flex items-center justify-center mx-auto border border-[#00F0FF]/40">
        <i data-lucide="check-circle-2" class="w-10 h-10"></i>
      </div>

      <h3 class="text-2xl font-bold text-[#14151A]">Demo Session Confirmed!</h3>
      <p class="text-xs text-[#5B5F6B] max-w-sm mx-auto">
        Calendar invitation & Google Meet link sent to your email. Our AI audit bot is currently crawling your target domain.
      </p>

      <div class="bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl p-4 text-left font-mono text-xs space-y-2">
        <div class="text-[#00A8B5] font-bold">STATUS: AUDIT QUEUED</div>
        <div class="text-[#5B5F6B]">• Domain Crawl: <span class="text-[#16A34A] font-bold">In Progress (89%)</span></div>
        <div class="text-[#5B5F6B]">• GBP Grid Analysis: <span class="text-[#16A34A] font-bold">Ready</span></div>
        <div class="text-[#5B5F6B]">• GEO/AEO Citations: <span class="text-[#00A8B5] font-bold">Simulating...</span></div>
      </div>

      <button onclick="document.getElementById('modal-close-btn').click()" class="btn-primary w-full mt-4 text-sm font-semibold">
        Done & Return to Site
      </button>
    </div>

  </div>
</div>
