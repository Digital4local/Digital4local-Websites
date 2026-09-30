<?php
/**
 * FAQ Accordion Section Component with Micro-Interactions
 */
$faqs = $p_cfg['faqs'];
?>
<section class="py-20 sm:py-28 bg-[#FFFFFF] relative overflow-hidden" id="faq">
  
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Section Header -->
    <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30 mb-4">
        <i data-lucide="help-circle" class="w-3.5 h-3.5"></i>
        <span>Got Questions?</span>
      </div>
      <h2 class="text-3xl sm:text-4xl font-extrabold text-[#14151A] tracking-tight font-display mb-3">
        Frequently Asked <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00A8B5] to-[#0284C7]">Questions</span>
      </h2>
      <p class="text-xs sm:text-sm text-[#5B5F6B]">
        Clear, honest answers about our deliverables, ad budgets, timelines, and guarantees.
      </p>
    </div>

    <!-- FAQ Accordion Container -->
    <div class="space-y-4" id="faq-accordion-group">
      <?php foreach ($faqs as $idx => $faq): ?>
        <div class="faq-item bg-[#F6F8FB] border-2 border-[#E4E7EC] rounded-2xl p-5 sm:p-6 transition-all duration-300 cursor-pointer select-none" data-aos="fade-up" data-aos-delay="<?php echo $idx * 50; ?>">
          
          <button type="button" class="faq-question-btn w-full flex items-center justify-between gap-4 text-left focus:outline-none" aria-expanded="false">
            <span class="text-base sm:text-lg font-bold text-[#14151A] leading-snug">
              <?php echo htmlspecialchars($faq['q']); ?>
            </span>
            <div class="w-8 h-8 rounded-full bg-white border border-[#E4E7EC] flex items-center justify-center shrink-0 shadow-sm">
              <i data-lucide="chevron-down" class="faq-chevron w-4 h-4 text-[#14151A] transition-transform duration-300"></i>
            </div>
          </button>

          <div class="faq-answer">
            <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed pt-2 border-t border-[#E4E7EC]/60">
              <?php echo htmlspecialchars($faq['a']); ?>
            </p>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

    <!-- Bottom Help Line -->
    <div class="text-center mt-12 pt-8 border-t border-[#E4E7EC]">
      <p class="text-xs sm:text-sm text-[#5B5F6B]">
        Have a question not listed here? 
        <a href="https://wa.me/<?php echo $p_cfg['whatsapp_number_clean']; ?>?text=<?php echo urlencode('Hi Digital4Local, I have a quick question about your marketing services.'); ?>" target="_blank" rel="noopener noreferrer" class="font-bold text-[#00A8B5] hover:underline">
          Ask us directly on WhatsApp ↗
        </a>
      </p>
    </div>

  </div>
</section>
