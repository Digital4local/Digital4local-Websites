<?php
/**
 * Honest Promise Callout Box Component (E-E-A-T Signal)
 * "What we will not promise you" section designed to build authentic user and search engine trust.
 */
if (!function_exists('d4l_render_honest_promise_box')) {
    function d4l_render_honest_promise_box($section) {
        $tag = htmlspecialchars($section['tag'] ?? 'HONEST STANDARDS & E-E-A-T');
        $title = htmlspecialchars($section['title'] ?? 'What We Will NOT Promise You');
        $subtitle = htmlspecialchars($section['subtitle'] ?? 'True search dominance is built on technical excellence and real user trust — not gimmicks.');
        $promises = $section['promises'] ?? [];

        $html = <<<HTML
        <!-- E-E-A-T Honest Promise Callout Box -->
        <div class="rounded-3xl bg-gradient-to-br from-[#F8FAFC] via-[#F1F5F9] to-[#E2E8F0]/40 border-2 border-slate-300/80 p-6 sm:p-10 shadow-sm relative overflow-hidden">
          <div class="max-w-3xl mx-auto space-y-6">
            
            <div class="text-center space-y-2">
              <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono font-bold bg-amber-100 text-amber-900 border border-amber-300">
                <svg class="w-3.5 h-3.5 text-amber-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>{$tag}</span>
              </span>
              <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight">{$title}</h2>
              <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed">{$subtitle}</p>
            </div>

            <div class="grid grid-cols-1 gap-4 pt-2">
HTML;

        foreach ($promises as $item) {
            $claim = htmlspecialchars($item['claim'] ?? '');
            $reality = htmlspecialchars($item['reality'] ?? '');

            $html .= <<<HTML
              <div class="bg-white rounded-2xl border border-slate-200/90 p-5 shadow-xs flex flex-col sm:flex-row items-start gap-4">
                <div class="w-8 h-8 rounded-xl bg-rose-50 text-rose-600 border border-rose-200 flex items-center justify-center shrink-0 font-bold text-sm">
                  ✕
                </div>
                <div class="space-y-1.5 flex-1 text-xs sm:text-sm">
                  <div class="font-bold text-slate-800 line-through decoration-rose-400 decoration-2">
                    {$claim}
                  </div>
                  <div class="text-[#5B5F6B] leading-relaxed bg-slate-50/80 p-3 rounded-xl border border-slate-100">
                    <strong class="text-[#00A8B5] font-semibold">The Reality:</strong> {$reality}
                  </div>
                </div>
              </div>
HTML;
        }

        $html .= <<<HTML
            </div>

            <div class="pt-2 text-center text-xs text-slate-500 font-medium">
              We uphold Google Search Quality Rater Guidelines, LLM semantic standards, and transparent white-hat optimization.
            </div>

          </div>
        </div>
HTML;

        return $html;
    }
}
