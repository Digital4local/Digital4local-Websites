<?php
/**
 * Native FAQ Accordion Component using <details> / <summary>
 * All answers are present in the static HTML on initial load for 100% crawlability & SEO indexing.
 */
if (!function_exists('d4l_render_faq_accordion')) {
    function d4l_render_faq_accordion($faqs = [], $title = "Frequently Asked Questions", $subtitle = "Everything you need to know about our search optimization and AI marketing in Bhopal.") {
        if (empty($faqs)) return '';

        $title = htmlspecialchars($title);
        $subtitle = htmlspecialchars($subtitle);

        $html = <<<HTML
        <div class="space-y-6">
          <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="pulse-badge">FREQUENTLY ASKED QUESTIONS</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight">{$title}</h2>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">{$subtitle}</p>
          </div>

          <div class="max-w-3xl mx-auto space-y-3 pt-4">
HTML;

        foreach ($faqs as $idx => $faq) {
            $q = htmlspecialchars($faq['q'] ?? '');
            $a = $faq['a'] ?? '';
            // Allow verify chips inside answers
            if (function_exists('d4l_render_verify_chips')) {
                $a = d4l_render_verify_chips($a);
            } else {
                $a = htmlspecialchars($a);
            }

            $is_first = ($idx === 0) ? 'open' : '';

            $html .= <<<HTML
            <details class="group bg-white border border-[#E4E7EC] rounded-2xl p-4 sm:p-5 shadow-xs hover:border-[#00A8B5]/40 transition-all duration-200" {$is_first}>
              <summary class="flex items-center justify-between cursor-pointer list-none font-bold text-sm sm:text-base text-[#14151A] group-open:text-[#00A8B5] transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-[#00A8B5]/50 rounded-lg">
                <span class="pr-4 leading-snug">{$q}</span>
                <span class="w-7 h-7 rounded-full bg-[#F6F8FB] border border-[#E4E7EC] flex items-center justify-center shrink-0 group-open:rotate-180 group-open:bg-[#00A8B5] group-open:text-white transition-all duration-200">
                  <svg class="w-4 h-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                  </svg>
                </span>
              </summary>
              <div class="pt-3.5 mt-2 border-t border-[#E4E7EC]/60 text-xs sm:text-sm text-[#5B5F6B] leading-relaxed">
                {$a}
              </div>
            </details>
HTML;
        }

        $html .= <<<HTML
          </div>
        </div>
HTML;

        return $html;
    }
}
