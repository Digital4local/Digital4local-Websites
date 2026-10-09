<?php
/**
 * Vertical Timeline Component for Numbered Process Steps
 */
if (!function_exists('d4l_render_timeline')) {
    function d4l_render_timeline($section) {
        $tag = htmlspecialchars($section['tag'] ?? 'PROCESS & TIMELINE');
        $title = htmlspecialchars($section['title'] ?? 'Our Step-by-Step Methodology');
        $subtitle = htmlspecialchars($section['subtitle'] ?? '');
        $steps = $section['steps'] ?? [];

        $html = <<<HTML
        <div class="space-y-6">
          <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="pulse-badge">{$tag}</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight">{$title}</h2>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">{$subtitle}</p>
          </div>

          <div class="relative max-w-3xl mx-auto pt-6">
            <!-- Central connecting line on md+ -->
            <div class="absolute left-6 md:left-8 top-8 bottom-8 w-0.5 bg-gradient-to-b from-[#00A8B5] via-[#00F0FF] to-slate-200"></div>

            <div class="space-y-8 relative">
HTML;

        foreach ($steps as $idx => $step) {
            $num = htmlspecialchars($step['number'] ?? sprintf('%02d', $idx + 1));
            $phase = htmlspecialchars($step['phase'] ?? '');
            $step_title = htmlspecialchars($step['title'] ?? '');
            $step_desc = htmlspecialchars($step['description'] ?? '');

            $html .= <<<HTML
              <div class="relative flex items-start gap-4 md:gap-6 pl-2">
                <!-- Step Number Bubble -->
                <div class="w-10 h-10 md:w-12 md:h-12 rounded-2xl bg-gradient-to-br from-[#00F0FF] to-[#00A8B5] text-[#0A0A0F] font-mono font-bold text-sm md:text-base flex items-center justify-center shrink-0 shadow-md ring-4 ring-white z-10">
                  {$num}
                </div>

                <!-- Step Content Card -->
                <div class="flex-1 bg-white border border-[#E4E7EC] rounded-2xl p-5 md:p-6 shadow-xs hover:border-[#00A8B5]/50 hover:shadow-md transition-all">
                  <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                    <h3 class="text-base sm:text-lg font-bold text-[#14151A]">{$step_title}</h3>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-mono font-bold bg-[#F6F8FB] text-[#00A8B5] border border-[#E4E7EC]">
                      {$phase}
                    </span>
                  </div>
                  <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed">{$step_desc}</p>
                </div>
              </div>
HTML;
        }

        $html .= <<<HTML
            </div>
          </div>
        </div>
HTML;

        return $html;
    }
}
