<?php
/**
 * Bhopal Cluster Sub-Navigation Component
 * Horizontal, touch-scrollable pill bar showing all 6 Bhopal cluster pages.
 * Current page is highlighted with aria-current="page".
 */
if (!function_exists('d4l_render_cluster_nav')) {
    function d4l_render_cluster_nav($current_slug = '', $city = 'bhopal') {
        require_once __DIR__ . '/../../config/business.php';
        $cfg = d4l_get_business_config();
        $cluster = $cfg['clusters'][$city] ?? $cfg['clusters']['bhopal'];
        $pages = $cluster['pages'] ?? [];

        $html = '<!-- Bhopal Cluster Sub-Nav -->' . "\n";
        $html .= '<nav aria-label="Bhopal Location Services Cluster" class="w-full bg-[#FFFFFF] border-y border-[#E4E7EC] sticky top-[61px] sm:top-[69px] z-40 shadow-xs backdrop-blur-md bg-white/95">' . "\n";
        $html .= '  <div class="max-w-7xl mx-auto px-4 sm:px-8 py-2.5">' . "\n";
        $html .= '    <div class="flex items-center gap-2 overflow-x-auto no-scrollbar py-1 scroll-smooth" role="tablist">' . "\n";
        
        $html .= '      <div class="shrink-0 flex items-center gap-1.5 px-2.5 py-1 text-[11px] font-mono font-bold uppercase tracking-wider text-slate-500 bg-slate-100 rounded-md mr-1 border border-slate-200/80">' . "\n";
        $html .= '        <svg class="w-3.5 h-3.5 text-[#00A8B5]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>' . "\n";
        $html .= '        <span>Bhopal Cluster:</span>' . "\n";
        $html .= '      </div>' . "\n";

        foreach ($pages as $p) {
            $is_current = ($p['slug'] === $current_slug);
            $url = $p['url'];
            $title = htmlspecialchars($p['shortTitle']);
            $is_hub = !empty($p['isHub']);

            if ($is_current) {
                $html .= '      <a href="' . $url . '" aria-current="page" class="shrink-0 inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold bg-[#00A8B5] text-white shadow-sm ring-2 ring-[#00A8B5]/20 transition-all cursor-default">' . "\n";
                if ($is_hub) {
                    $html .= '        <span class="w-1.5 h-1.5 rounded-full bg-white animate-ping"></span>' . "\n";
                }
                $html .= '        <span>' . $title . '</span>' . "\n";
                $html .= '      </a>' . "\n";
            } else {
                $html .= '      <a href="' . $url . '" class="shrink-0 inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#F6F8FB] text-[#14151A] hover:bg-[#EEF2F6] hover:text-[#00A8B5] border border-[#E4E7EC] hover:border-[#00A8B5]/40 transition-all">' . "\n";
                if ($is_hub) {
                    $html .= '        <span class="w-1.5 h-1.5 rounded-full bg-[#00A8B5]"></span>' . "\n";
                }
                $html .= '        <span>' . $title . '</span>' . "\n";
                $html .= '      </a>' . "\n";
            }
        }

        $html .= '    </div>' . "\n";
        $html .= '  </div>' . "\n";
        $html .= '</nav>' . "\n";

        return $html;
    }
}
