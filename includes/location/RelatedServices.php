<?php
/**
 * Related Bhopal Services Component ("Recommended for you in Bhopal")
 * Renders 3 prioritized service recommendation cards + secondary cross-links + Hub backlink on spoke pages.
 */
if (!function_exists('d4l_render_related_services')) {
    function d4l_render_related_services($current_slug, $city = 'bhopal', $is_hub = false) {
        require_once __DIR__ . '/../../config/business.php';
        $cfg = d4l_get_business_config();
        $cluster = $cfg['clusters'][$city] ?? $cfg['clusters']['bhopal'];
        $pages = $cluster['pages'] ?? [];

        // Build slug-indexed dictionary
        $pages_by_slug = [];
        foreach ($pages as $p) {
            $pages_by_slug[$p['slug']] = $p;
        }

        // Strict prompt-defined mapping
        $mapping = [
            'seo-agency-bhopal' => [
                'primary' => ['local-seo-bhopal', 'google-business-profile-optimization-bhopal', 'ai-seo-bhopal'],
                'secondary' => ['digital-marketing-agency-bhopal', 'ai-agency-bhopal']
            ],
            'local-seo-bhopal' => [
                'primary' => ['google-business-profile-optimization-bhopal', 'seo-agency-bhopal', 'ai-seo-bhopal'],
                'secondary' => ['digital-marketing-agency-bhopal', 'ai-agency-bhopal']
            ],
            'google-business-profile-optimization-bhopal' => [
                'primary' => ['local-seo-bhopal', 'seo-agency-bhopal', 'ai-agency-bhopal'],
                'secondary' => ['ai-seo-bhopal', 'digital-marketing-agency-bhopal']
            ],
            'ai-seo-bhopal' => [
                'primary' => ['seo-agency-bhopal', 'local-seo-bhopal', 'ai-agency-bhopal'],
                'secondary' => ['google-business-profile-optimization-bhopal', 'digital-marketing-agency-bhopal']
            ],
            'digital-marketing-agency-bhopal' => [
                'primary' => ['seo-agency-bhopal', 'ai-agency-bhopal', 'local-seo-bhopal'],
                'secondary' => ['google-business-profile-optimization-bhopal', 'ai-seo-bhopal']
            ],
            'ai-agency-bhopal' => [
                'primary' => ['ai-seo-bhopal', 'digital-marketing-agency-bhopal', 'local-seo-bhopal'],
                'secondary' => ['seo-agency-bhopal', 'google-business-profile-optimization-bhopal']
            ]
        ];

        $current_map = $mapping[$current_slug] ?? [
            'primary' => ['local-seo-bhopal', 'google-business-profile-optimization-bhopal', 'ai-seo-bhopal'],
            'secondary' => ['digital-marketing-agency-bhopal', 'ai-agency-bhopal']
        ];

        $html = <<<HTML
        <!-- Recommended Related Bhopal Services Block -->
        <div class="space-y-8">
          <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
              <span class="pulse-badge">CONNECTED BHOPAL CLUSTER</span>
              <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight mt-2">Recommended for You in Bhopal</h2>
              <p class="text-xs sm:text-sm text-[#5B5F6B] mt-1">Explore complementary search marketing and AI automation capabilities across our Bhopal network.</p>
            </div>
HTML;

        if (!$is_hub) {
            $html .= <<<HTML
            <div class="shrink-0">
              <a href="/seo-agency-bhopal/" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#00A8B5] hover:text-[#008A95] bg-[#00A8B5]/10 hover:bg-[#00A8B5]/15 px-3.5 py-2 rounded-full border border-[#00A8B5]/25 transition-all">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Back to All SEO Services in Bhopal (Hub)</span>
              </a>
            </div>
HTML;
        }

        $html .= <<<HTML
          </div>

          <!-- 3 Primary Recommendation Cards -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
HTML;

        foreach ($current_map['primary'] as $slug) {
            if (!isset($pages_by_slug[$slug])) continue;
            $p = $pages_by_slug[$slug];
            $title = htmlspecialchars($p['title']);
            $tagline = htmlspecialchars($p['tagline']);
            $benefit = htmlspecialchars($p['primaryBenefit']);
            $url = $p['url'];
            $is_target_hub = !empty($p['isHub']);
            $hub_badge = $is_target_hub ? '<span class="text-[10px] font-mono font-extrabold text-amber-800 bg-amber-100 border border-amber-300 px-2 py-0.5 rounded">HUB</span>' : '';

            $html .= <<<HTML
            <div class="bg-white border border-[#E4E7EC] hover:border-[#00A8B5]/60 rounded-2xl p-6 shadow-xs hover:shadow-md transition-all flex flex-col justify-between group">
              <div class="space-y-3">
                <div class="flex items-center justify-between">
                  <span class="text-[11px] font-mono font-bold uppercase tracking-wider text-[#00A8B5] bg-[#00F0FF]/10 px-2.5 py-1 rounded-md">
                    {$tagline}
                  </span>
                  {$hub_badge}
                </div>
                <h3 class="text-base sm:text-lg font-bold text-[#14151A] group-hover:text-[#00A8B5] transition-colors">
                  {$title}
                </h3>
                <p class="text-xs text-[#5B5F6B] leading-relaxed">
                  {$benefit}
                </p>
              </div>

              <div class="pt-5 mt-4 border-t border-[#E4E7EC]/60">
                <a href="{$url}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#14151A] group-hover:text-[#00A8B5] group-hover:translate-x-1 transition-all">
                  <span>Explore {$title}</span>
                  <svg class="w-3.5 h-3.5 text-[#00A8B5]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
              </div>
            </div>
HTML;
        }

        $html .= <<<HTML
          </div>
HTML;

        // Secondary small text links for hub
        if (!empty($current_map['secondary'])) {
            $html .= <<<HTML
            <div class="pt-2 flex flex-wrap items-center gap-2 text-xs text-[#5B5F6B]">
              <span class="font-semibold text-[#14151A]">Also in Bhopal:</span>
HTML;
            foreach ($current_map['secondary'] as $slug) {
                if (!isset($pages_by_slug[$slug])) continue;
                $p = $pages_by_slug[$slug];
                $title = htmlspecialchars($p['title']);
                $url = $p['url'];
                $html .= '<a href="' . $url . '" class="inline-flex items-center gap-1 px-3 py-1 bg-[#F6F8FB] hover:bg-[#EEF2F6] hover:text-[#00A8B5] text-[#14151A] font-medium rounded-full border border-[#E4E7EC] transition-colors">' . $title . ' →</a>';
            }
            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }
}
