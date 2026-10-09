<?php
/**
 * Helper to parse and render [[VERIFY ...]] chips and media placeholders
 */
if (!function_exists('d4l_render_verify_chips')) {
    function d4l_render_verify_chips($html) {
        if (empty($html)) return '';

        // Replace [[VERIFY: ...]] or [[VERIFY ...]] with visible yellow chip
        $pattern = '/\[\[VERIFY:?\s*([^\]]+)\]\]/i';
        $replacement = '<span class="inline-flex items-center gap-1.5 px-2.5 py-1 my-1 rounded-md text-xs font-mono font-semibold bg-amber-100 text-amber-900 border border-amber-300 shadow-sm" title="Unresolved Verification Placeholder"><svg class="w-3.5 h-3.5 text-amber-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg><span>VERIFY: $1</span></span>';
        
        return preg_replace($pattern, $replacement, $html);
    }
}

if (!function_exists('d4l_render_image_placeholder')) {
    function d4l_render_image_placeholder($label = "Real Bhopal office photo here", $aspect = "aspect-video", $extra_classes = "") {
        return <<<HTML
        <div class="relative w-full {$aspect} rounded-2xl bg-gradient-to-br from-slate-100 to-slate-200 border-2 border-dashed border-slate-300 flex flex-col items-center justify-center p-6 text-center overflow-hidden group {$extra_classes}">
          <div class="w-12 h-12 rounded-xl bg-white/80 backdrop-blur-sm border border-slate-200 text-slate-500 flex items-center justify-center mb-2 shadow-sm group-hover:scale-105 transition-transform">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
          </div>
          <span class="text-xs font-mono font-bold text-slate-700 uppercase tracking-wider">Image Placeholder</span>
          <span class="text-xs text-slate-500 mt-1 max-w-xs font-medium">{$label}</span>
          <span class="mt-2 inline-flex items-center gap-1 text-[10px] font-mono font-semibold bg-amber-100 text-amber-800 border border-amber-300 px-2 py-0.5 rounded">NO STOCK PHOTOS ALLOWED</span>
        </div>
HTML;
    }
}
