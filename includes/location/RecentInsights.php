<?php
/**
 * Recent Insights Component ("Latest guides for Bhopal businesses")
 * Displays the 3 most recent blog posts filtered by tags, sorted by date DESC with date displayed.
 */
if (!function_exists('d4l_render_recent_insights')) {
    function d4l_render_recent_insights($tags = ['local-seo', 'ai-search'], $city = 'Bhopal') {
        require_once __DIR__ . '/../site-config.php';

        $all_blogs = [];
        if (function_exists('get_blog_posts')) {
            $all_blogs = get_blog_posts(true);
        }

        // Fallback typed array if DB/site-config is empty
        if (empty($all_blogs)) {
            // TODO: Connect live CMS endpoint when new articles are added
            $all_blogs = [
                [
                    'slug' => 'best-digital-marketing-company-india',
                    'title' => 'The Complete Blueprint to Dominate AI Answer Engines & Local Search in 2026',
                    'excerpt' => 'How modern local businesses transition from legacy directory listings to Generative Engine Optimization (GEO) and Google Maps dominance.',
                    'date' => '2026-03-15',
                    'author' => 'Abhishek Raikwar',
                    'category' => 'Local SEO',
                    'tags' => ['local-seo', 'ai-search']
                ],
                [
                    'slug' => 'seo-vs-sem-difference',
                    'title' => 'Local SEO vs Google Ads: Which Delivers Higher ROI for Local Practices?',
                    'excerpt' => 'A data-backed breakdown comparing paid search acquisition costs with long-term organic 3-Pack authority in tier-2 Indian cities.',
                    'date' => '2026-02-28',
                    'author' => 'Abhishek Raikwar',
                    'category' => 'Strategy',
                    'tags' => ['local-seo', 'digital-marketing']
                ],
                [
                    'slug' => 'types-of-seo-explained',
                    'title' => 'What is AEO & GEO? The Guide to Ranking Inside ChatGPT, Perplexity & Gemini',
                    'excerpt' => 'Learn how semantic entity graphs and Schema.org markup train LLM models to recommend your business for conversational queries.',
                    'date' => '2026-01-20',
                    'author' => 'Abhishek Raikwar',
                    'category' => 'AI Search',
                    'tags' => ['ai-search', 'ai-automation']
                ]
            ];
        }

        // Filter by tags if tags exist
        $filtered = [];
        if (!empty($tags)) {
            foreach ($all_blogs as $post) {
                $post_tags = $post['tags'] ?? [];
                if (is_string($post_tags)) {
                    $post_tags = array_map('trim', explode(',', strtolower($post_tags)));
                } else if (is_array($post_tags)) {
                    $post_tags = array_map('strtolower', $post_tags);
                }
                
                // Check intersection or category match
                $matches = false;
                foreach ($tags as $t) {
                    $t_clean = strtolower(trim($t));
                    if (in_array($t_clean, $post_tags) || 
                        stripos($post['category'] ?? '', $t_clean) !== false ||
                        stripos($post['title'] ?? '', $t_clean) !== false) {
                        $matches = true;
                        break;
                    }
                }
                if ($matches) {
                    $filtered[] = $post;
                }
            }
        }

        // Fallback to all if tag filter was too restrictive
        if (count($filtered) < 3) {
            foreach ($all_blogs as $post) {
                if (!in_array($post, $filtered)) {
                    $filtered[] = $post;
                }
                if (count($filtered) >= 3) break;
            }
        }

        // Slice top 3
        $display_posts = array_slice($filtered, 0, 3);

        $html = <<<HTML
        <!-- Recent Insights / Blog Block -->
        <div class="space-y-8">
          <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
              <span class="pulse-badge">LOCAL SEARCH & AI PLAYBOOKS</span>
              <h2 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] tracking-tight mt-2">Latest Guides for {$city} Businesses</h2>
              <p class="text-xs sm:text-sm text-[#5B5F6B] mt-1">Actionable insights on Google Maps optimization, AI search citations, and lead conversion.</p>
            </div>
            <div class="shrink-0">
              <a href="/blog.php" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#00A8B5] hover:text-[#008A95] transition-colors">
                <span>View All Agency Guides</span>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
              </a>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
HTML;

        foreach ($display_posts as $post) {
            $slug = $post['slug'] ?? 'seo-agency-bhopal';
            $title = htmlspecialchars($post['title'] ?? 'Search Growth Guide');
            $raw_date = $post['date'] ?? $post['created_at'] ?? '2026-03-01';
            $formatted_date = date('M d, Y', strtotime($raw_date));
            $author = htmlspecialchars($post['author'] ?? 'Abhishek Raikwar');
            $category = htmlspecialchars($post['category'] ?? 'SEO & AI');
            $url = "/blog/" . htmlspecialchars($slug);

            $html .= <<<HTML
            <article class="bg-white border border-[#E4E7EC] hover:border-[#00A8B5]/50 rounded-2xl p-6 shadow-xs hover:shadow-md transition-all flex flex-col justify-between group">
              <div class="space-y-3">
                <div class="flex items-center justify-between text-xs text-[#5B5F6B]">
                  <span class="font-mono font-semibold text-[#00A8B5] bg-[#00F0FF]/10 px-2 py-0.5 rounded text-[11px]">{$category}</span>
                  <time datetime="{$raw_date}" class="font-mono text-[11px]">{$formatted_date}</time>
                </div>
                <h3 class="text-sm sm:text-base font-bold text-[#14151A] group-hover:text-[#00A8B5] transition-colors line-clamp-2 leading-snug">
                  <a href="{$url}" class="hover:underline">{$title}</a>
                </h3>
              </div>

              <div class="pt-4 mt-4 border-t border-[#E4E7EC]/60 flex items-center justify-between text-xs">
                <span class="text-[#5B5F6B] font-medium">By {$author}</span>
                <a href="{$url}" class="font-bold text-[#00A8B5] inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                  Read Guide →
                </a>
              </div>
            </article>
HTML;
        }

        $html .= <<<HTML
          </div>
        </div>
HTML;

        return $html;
    }
}
