<?php
/**
 * Author Box Component (E-E-A-T Credibility Signal)
 * Displays author details for Abhishek Raikwar (Founder & Lead AI Growth Strategist).
 */
if (!function_exists('d4l_render_author_box')) {
    function d4l_render_author_box($author = null) {
        require_once __DIR__ . '/../../config/business.php';
        $cfg = d4l_get_business_config();
        $default_author = $cfg['author'];

        $name = htmlspecialchars($author['name'] ?? $default_author['name']);
        $role = htmlspecialchars($author['role'] ?? $default_author['role']);
        $bio = htmlspecialchars($author['bio'] ?? $default_author['bio']);
        $linkedin = htmlspecialchars($author['linkedin'] ?? $default_author['linkedin']);
        $photo = htmlspecialchars($author['photo'] ?? $default_author['photoUrl']);

        $html = <<<HTML
        <!-- E-E-A-T Author Card -->
        <div class="bg-white border border-[#E4E7EC] rounded-3xl p-6 sm:p-8 shadow-xs relative overflow-hidden">
          <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
            
            <!-- Author Avatar with Fallback Placeholder -->
            <div class="relative shrink-0">
              <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl bg-gradient-to-br from-[#00A8B5] to-[#00F0FF] p-0.5 shadow-md">
                <div class="w-full h-full rounded-2xl bg-slate-100 flex flex-col items-center justify-center overflow-hidden text-center">
                  <!-- Headshot or Initials Placeholder -->
                  <img src="{$photo}" alt="{$name} - {$role}" class="w-full h-full object-cover" onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                  <div style="display:none;" class="w-full h-full bg-slate-800 text-white flex-col items-center justify-center font-mono font-bold text-lg">
                    AR
                    <span class="text-[9px] font-normal text-slate-300">FOUNDER</span>
                  </div>
                </div>
              </div>
              <div class="absolute -bottom-1 -right-1 bg-emerald-500 text-white p-1 rounded-full border-2 border-white shadow-xs" title="Verified Author">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              </div>
            </div>

            <!-- Author Bio & Social Links -->
            <div class="space-y-2 flex-1">
              <div class="flex flex-wrap items-center justify-between gap-2">
                <div>
                  <div class="text-[11px] font-mono font-bold uppercase tracking-wider text-[#00A8B5]">Content Author & Strategist</div>
                  <h3 class="text-lg sm:text-xl font-bold text-[#14151A]">{$name}</h3>
                  <div class="text-xs font-medium text-[#5B5F6B]">{$role}</div>
                </div>
                <div>
                  <a href="{$linkedin}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-[#0A66C2]/10 text-[#0A66C2] hover:bg-[#0A66C2]/20 border border-[#0A66C2]/30 transition-colors">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    <span>Connect on LinkedIn</span>
                  </a>
                </div>
              </div>

              <p class="text-xs sm:text-sm text-[#5B5F6B] leading-relaxed pt-1">
                {$bio}
              </p>
            </div>

          </div>
        </div>
HTML;

        return $html;
    }
}
