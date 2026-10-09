<?php
/**
 * Responsive Comparison Table Component
 * Renders as a clean multi-column comparison table on desktop, and stacked comparison cards on mobile.
 */
if (!function_exists('d4l_render_comparison_table')) {
    function d4l_render_comparison_table($section) {
        $tag = htmlspecialchars($section['tag'] ?? 'TRANSPARENCY & ROI');
        $title = htmlspecialchars($section['title'] ?? 'Comparison Matrix');
        $subtitle = htmlspecialchars($section['subtitle'] ?? '');
        $headers = $section['headers'] ?? ['Dimension', 'Traditional Agency', 'Digital4Local AI Engine'];
        $rows = $section['rows'] ?? [];

        $h0 = htmlspecialchars($headers[0] ?? 'Dimension');
        $h1 = htmlspecialchars($headers[1] ?? 'Competitors');
        $h2 = htmlspecialchars($headers[2] ?? 'Digital4Local');

        $html = <<<HTML
        <div class="space-y-6">
          <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="pulse-badge">{$tag}</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight">{$title}</h2>
            <p class="text-sm text-[#5B5F6B] leading-relaxed">{$subtitle}</p>
          </div>

          <!-- Desktop Table View (Hidden on Mobile) -->
          <div class="hidden md:block overflow-hidden rounded-2xl border border-[#E4E7EC] bg-white shadow-xs">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr class="bg-[#F6F8FB] border-b border-[#E4E7EC] text-xs font-mono font-bold uppercase tracking-wider text-[#14151A]">
                  <th class="py-4 px-6 w-1/4">{$h0}</th>
                  <th class="py-4 px-6 w-3/8 text-slate-500">{$h1}</th>
                  <th class="py-4 px-6 w-3/8 bg-[#00A8B5]/10 text-[#00A8B5] border-l border-[#00A8B5]/20">
                    <span class="flex items-center gap-1.5 font-extrabold">
                      <svg class="w-4 h-4 text-[#00A8B5]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                      {$h2}
                    </span>
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-[#E4E7EC] text-xs sm:text-sm">
HTML;

        foreach ($rows as $row) {
            $feat = htmlspecialchars($row['feature'] ?? '');
            $comp = htmlspecialchars($row['competitor'] ?? '');
            $d4l = htmlspecialchars($row['d4l'] ?? '');

            $html .= <<<HTML
                <tr class="hover:bg-slate-50/70 transition-colors">
                  <td class="py-4 px-6 font-bold text-[#14151A] align-top bg-slate-50/30">{$feat}</td>
                  <td class="py-4 px-6 text-[#5B5F6B] align-top leading-relaxed">
                    <div class="flex items-start gap-2">
                      <span class="text-rose-500 shrink-0 mt-0.5">✕</span>
                      <span>{$comp}</span>
                    </div>
                  </td>
                  <td class="py-4 px-6 font-semibold text-[#14151A] align-top leading-relaxed bg-[#00A8B5]/5 border-l border-[#00A8B5]/15">
                    <div class="flex items-start gap-2">
                      <span class="text-emerald-600 shrink-0 mt-0.5">✓</span>
                      <span>{$d4l}</span>
                    </div>
                  </td>
                </tr>
HTML;
        }

        $html .= <<<HTML
              </tbody>
            </table>
          </div>

          <!-- Mobile Stacked Card View (Hidden on Desktop) -->
          <div class="md:hidden space-y-4">
HTML;

        foreach ($rows as $row) {
            $feat = htmlspecialchars($row['feature'] ?? '');
            $comp = htmlspecialchars($row['competitor'] ?? '');
            $d4l = htmlspecialchars($row['d4l'] ?? '');

            $html .= <<<HTML
            <div class="bg-white border border-[#E4E7EC] rounded-2xl p-4 shadow-xs space-y-3">
              <div class="text-xs font-mono font-bold uppercase tracking-wider text-[#00A8B5] border-b border-[#E4E7EC] pb-2">
                {$feat}
              </div>
              <div class="space-y-2 text-xs">
                <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-200">
                  <div class="text-[10px] font-mono uppercase text-slate-400 font-bold mb-1">{$h1}</div>
                  <div class="flex items-start gap-1.5 text-slate-600">
                    <span class="text-rose-500 font-bold">✕</span>
                    <span>{$comp}</span>
                  </div>
                </div>
                <div class="p-2.5 rounded-xl bg-[#00A8B5]/10 border border-[#00A8B5]/20">
                  <div class="text-[10px] font-mono uppercase text-[#00A8B5] font-bold mb-1">{$h2}</div>
                  <div class="flex items-start gap-1.5 text-[#14151A] font-semibold">
                    <span class="text-emerald-600 font-bold">✓</span>
                    <span>{$d4l}</span>
                  </div>
                </div>
              </div>
            </div>
HTML;
        }

        $html .= <<<HTML
          </div>
        </div>
HTML;

        return $html;
    }
}
