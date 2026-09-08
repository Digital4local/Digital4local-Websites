<?php
require_once __DIR__ . '/includes/site-config.php';

$slug = $_GET['slug'] ?? '';
$slug = str_replace('.php', '', trim($slug, '/'));

$post = null;
if (!empty($slug)) {
    $post = get_blog_post($slug);
}

// Fallback to first published post if not found or empty
if (!$post) {
    $all_posts = get_blog_posts(true);
    if (!empty($all_posts)) {
        $post = $all_posts[0];
    } else {
        $post = [
            'slug' => 'digital-marketing-growth-guide',
            'title' => 'Digital Marketing & AI Search Growth Playbook',
            'meta_title' => 'Digital Marketing & AI Search Growth Playbook | Digital4Local',
            'meta_description' => 'In-depth guide on AI search optimization, local SEO, and generative search visibility.',
            'category' => 'GEO & AEO',
            'author' => 'Abhishek Raikwar',
            'author_title' => 'Founder, Digital4Local',
            'date' => date('Y-m-d'),
            'read_time' => '8 Min Read',
            'status' => 'published',
            'excerpt' => 'An actionable guide to modern search visibility and generative AI citations.',
            'featured_image' => 'assets/images/hero_dashboard_light_v2.png',
            'content_html' => '<div class="space-y-6"><p class="text-base text-[#475569] leading-relaxed">Search engines and generative AI platforms are fundamentally reshaping how customers discover and choose businesses. This guide breaks down the core ranking signals and citation frameworks.</p></div>'
        ];
    }
}

$page_title = !empty($post['meta_title']) ? $post['meta_title'] : ($post['title'] . ' | Digital4Local');
if (strpos($page_title, 'Digital4Local') === false) {
    $page_title .= ' | Digital4Local';
}
$page_description = $post['meta_description'] ?? ($post['excerpt'] ?? 'Actionable research and growth playbooks from Digital4Local search engineers.');
$canonical_url = "https://digital4local.com/blog/" . ($post['slug'] ?? 'article') . "/";
$og_image = !empty($post['featured_image']) ? $post['featured_image'] : 'assets/images/hero_dashboard_light_v2.png';

// FAQ Schema Items
$faq_schema_items = [];
if (!empty($post['faqs']) && is_array($post['faqs'])) {
    foreach ($post['faqs'] as $faq) {
        if (!empty($faq['q']) && !empty($faq['a'])) {
            $faq_schema_items[] = [
                '@type' => 'Question',
                'name' => $faq['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => strip_tags($faq['a'])
                ]
            ];
        }
    }
}

// Author Details & Initials
$author_name = !empty($post['author']) ? $post['author'] : 'Abhishek Raikwar';
$author_title = !empty($post['author_title']) ? $post['author_title'] : 'Founder, Digital4Local';
$author_words = explode(' ', trim($author_name));
$author_initials = '';
foreach ($author_words as $w) {
    if (!empty($w)) $author_initials .= strtoupper($w[0]);
    if (strlen($author_initials) >= 2) break;
}
if (empty($author_initials)) $author_initials = 'AR';

$publish_date = !empty($post['date']) ? date('M j, Y', strtotime($post['date'])) : date('M j, Y');
$publish_iso = !empty($post['date']) ? date('c', strtotime($post['date'])) : date('c');
$read_time = !empty($post['read_time']) ? $post['read_time'] : '8 Min Read';
$category = !empty($post['category']) ? $post['category'] : 'Local SEO & AI';

// Build structured graph schema
$schema_graph = [
    [
        "@type" => "BlogPosting",
        "@id" => $canonical_url . "#article",
        "isPartOf" => [
            "@type" => "WebPage",
            "@id" => $canonical_url
        ],
        "headline" => $post['title'] ?? '',
        "description" => $page_description,
        "datePublished" => $publish_iso,
        "dateModified" => $publish_iso,
        "author" => [
            "@type" => "Person",
            "name" => $author_name,
            "jobTitle" => $author_title,
            "worksFor" => [
                "@type" => "Organization",
                "name" => "Digital4Local"
            ]
        ],
        "publisher" => [
            "@type" => "Organization",
            "name" => "Digital4Local",
            "url" => "https://digital4local.com",
            "logo" => [
                "@type" => "ImageObject",
                "url" => "https://digital4local.com/assets/images/digital4local_logo.png"
            ]
        ],
        "mainEntityOfPage" => [
            "@type" => "WebPage",
            "@id" => $canonical_url
        ]
    ]
];

if (!empty($faq_schema_items)) {
    $schema_graph[] = [
        "@type" => "FAQPage",
        "@id" => $canonical_url . "#faq",
        "mainEntity" => $faq_schema_items
    ];
}

$schema_graph[] = [
    "@type" => "BreadcrumbList",
    "itemListElement" => [
        [
            "@type" => "ListItem",
            "position" => 1,
            "name" => "Home",
            "item" => "https://digital4local.com/"
        ],
        [
            "@type" => "ListItem",
            "position" => 2,
            "name" => "Blog",
            "item" => "https://digital4local.com/blog.php"
        ],
        [
            "@type" => "ListItem",
            "position" => 3,
            "name" => $post['title'] ?? 'Article',
            "item" => $canonical_url
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <?php include_once __DIR__ . '/includes/seo.php'; ?>
  
  <!-- Structured Data Graph: BlogPosting + FAQPage + Breadcrumbs -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": <?php echo json_encode($schema_graph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); ?>
  }
  </script>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] min-h-screen relative font-['Inter',sans-serif] selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <div class="bg-ambient-glow"></div>
  <?php include_once __DIR__ . '/includes/header.php'; ?>

  <main class="relative z-10 pt-28 sm:pt-36 pb-24">
    
    <!-- Article Header -->
    <header class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 pb-12" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#1B5FAA]/10 border border-[#1B5FAA]/20 text-[#1B5FAA] text-xs font-mono font-bold tracking-wider uppercase">
        <span class="w-2 h-2 rounded-full bg-[#00B4D8] animate-pulse"></span>
        <?php echo htmlspecialchars($category); ?> PLAYBOOK
      </div>
      
      <h1 class="text-3xl sm:text-5xl md:text-5xl font-extrabold text-[#14151A] font-['Montserrat',sans-serif] tracking-tight leading-tight">
        <?php echo htmlspecialchars($post['title'] ?? ''); ?>
      </h1>

      <div class="flex flex-wrap items-center justify-center gap-4 text-xs font-mono text-[#64748B] pt-2">
        <span>Published: <?php echo htmlspecialchars($publish_date); ?></span>
        <span>•</span>
        <span class="bg-[#1B5FAA]/10 text-[#1B5FAA] px-2.5 py-0.5 rounded font-bold"><?php echo htmlspecialchars($read_time); ?></span>
      </div>
    </header>

    <!-- Main Content Container with Sticky Sidebar -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-4 gap-12">
      
      <!-- Sticky Sidebar -->
      <aside class="hidden lg:block lg:col-span-1 space-y-6 sticky top-32 h-fit text-xs">
        
        <?php
        $highlights = $post['highlights'] ?? [];
        if (empty($highlights)) {
            // Auto fallback: extract from H2s or generate
            preg_match_all('/<h2[^>]*>(.*?)<\/h2>/is', $post['content_html'] ?? '', $h_matches);
            if (!empty($h_matches[1])) {
                foreach (array_slice($h_matches[1], 0, 5) as $h_item) {
                    $cleaned_h = trim(strip_tags($h_item));
                    if (!empty($cleaned_h) && strlen($cleaned_h) <= 60) {
                        $highlights[] = $cleaned_h;
                    }
                }
            }
            if (!empty($post['faqs']) && is_array($post['faqs'])) {
                $highlights[] = count($post['faqs']) . ' Detailed FAQs';
            }
        }
        if (empty($highlights)) {
            $highlights = [
                'Executive Overview',
                'Strategic Methodology',
                'Comparative Framework',
                'Actionable Implementation',
                'Detailed FAQs'
            ];
        }
        ?>

        <!-- Article Highlights Sidebar Card -->
        <div class="bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-5 space-y-3.5 shadow-sm">
          <div class="text-[#14151A] font-bold uppercase tracking-wider text-[11px] border-b border-[#E2E8F0] pb-2.5 font-mono">
            ARTICLE HIGHLIGHTS
          </div>
          <ul class="space-y-2.5 text-[#475569] font-mono text-[11px]">
            <?php foreach ($highlights as $h_idx => $hl): 
              $clean_text = trim(ltrim($hl, '●•- '));
              $is_first = ($h_idx === 0);
            ?>
            <li class="<?php echo $is_first ? 'text-[#1B5FAA] font-bold' : 'text-[#475569]'; ?> flex items-start gap-2">
              <span class="text-[#1B5FAA] font-bold select-none shrink-0">•</span>
              <span class="leading-relaxed"><?php echo htmlspecialchars($clean_text); ?></span>
            </li>
            <?php endforeach; ?>
          </ul>
          <div class="pt-3 border-t border-[#E2E8F0]">
            <a href="<?php echo $base_path; ?>blog.php" class="text-[#1B5FAA] font-bold hover:underline flex items-center gap-1 font-sans text-xs">
              ← Back to All Articles
            </a>
          </div>
        </div>

        <div class="bg-gradient-to-br from-[#1B5FAA]/5 to-[#00B4D8]/10 border-2 border-[#1B5FAA] rounded-2xl p-5 space-y-3 shadow-sm">
          <span class="text-[10px] font-bold font-mono text-[#1B5FAA] uppercase">Free Verification</span>
          <h4 class="font-bold text-xs text-[#14151A] font-['Montserrat',sans-serif]">Want a direct evaluation of your business search presence?</h4>
          <p class="text-[11px] text-[#5B5F6B]">Get an objective 5x5 geo-grid analysis and AI citation scan for your domain.</p>
          <button class="trigger-book-demo btn-primary w-full text-[11px] py-2.5 justify-center font-bold">
            Book 15-Min Evaluation
          </button>
        </div>
      </aside>

      <!-- Main Article Body -->
      <article class="lg:col-span-3 space-y-6 text-base text-[#475569] leading-relaxed article-body-content">
        
        <?php if (!empty($post['featured_image'])): 
          $img_src = $post['featured_image'];
          if (strpos($img_src, 'http://') !== 0 && strpos($img_src, 'https://') !== 0) {
              $img_src = $base_path . ltrim($img_src, '/.');
          }
        ?>
        <div class="w-full rounded-2xl overflow-hidden border border-[#E2E8F0] shadow-sm mb-6">
          <img src="<?php echo htmlspecialchars($img_src); ?>" alt="<?php echo htmlspecialchars($post['title'] ?? 'Blog Article'); ?>" class="w-full h-auto object-cover max-h-[480px]" />
        </div>
        <?php endif; ?>

        <!-- Mobile Article Highlights Card (Visible only on < lg screens) -->
        <div class="block lg:hidden bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl p-5 mb-6 shadow-sm">
          <div class="text-[#14151A] font-bold uppercase tracking-wider text-[11px] border-b border-[#E2E8F0] pb-2.5 font-mono flex items-center justify-between">
            <span>ARTICLE HIGHLIGHTS</span>
            <a href="<?php echo $base_path; ?>blog.php" class="text-[#1B5FAA] text-[10px] font-bold hover:underline font-sans">← All Articles</a>
          </div>
          <ul class="space-y-2.5 text-[#475569] font-mono text-[11px] pt-3">
            <?php foreach ($highlights as $h_idx => $hl): 
              $clean_text = trim(ltrim($hl, '●•- '));
              $is_first = ($h_idx === 0);
            ?>
            <li class="<?php echo $is_first ? 'text-[#1B5FAA] font-bold' : 'text-[#475569]'; ?> flex items-start gap-2">
              <span class="text-[#1B5FAA] font-bold select-none shrink-0">•</span>
              <span class="leading-relaxed"><?php echo htmlspecialchars($clean_text); ?></span>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Automated Executive Summary / Direct Answer Box (if not already in content_html) -->
        <?php 
        $has_direct_answer = (strpos($post['content_html'] ?? '', 'EXECUTIVE SUMMARY') !== false || strpos($post['content_html'] ?? '', 'Executive Summary') !== false || strpos($post['content_html'] ?? '', 'Direct Answer') !== false);
        if (!$has_direct_answer && !empty($post['excerpt'])): 
        ?>
        <div class="bg-gradient-to-br from-[#1B5FAA]/5 via-[#F8FAFC] to-[#00B4D8]/10 border-2 border-[#1B5FAA] rounded-2xl p-6 sm:p-7 shadow-sm mb-8">
          <div class="flex items-center gap-2 text-[#1B5FAA] font-mono text-xs font-bold uppercase tracking-wider mb-2">
            <span>⚡</span>
            <span>EXECUTIVE SUMMARY / DIRECT ANSWER</span>
          </div>
          <p class="text-base sm:text-lg font-medium text-[#14151A] leading-relaxed">
            <?php echo htmlspecialchars($post['excerpt']); ?>
          </p>
        </div>
        <?php endif; ?>

        <!-- Primary HTML Body Content -->
        <?php echo $post['content_html'] ?? '<p>No content written for this post yet.</p>'; ?>

        <!-- Automated Dynamic FAQ Accordion Section (if FAQs array exists and not already hardcoded in content_html) -->
        <?php 
        $content_has_faqs = (strpos($post['content_html'] ?? '', 'blog-faq-accordion') !== false);
        if (!$content_has_faqs && !empty($post['faqs']) && is_array($post['faqs'])): 
        ?>
        <div class="space-y-6 pt-10 mt-10 border-t border-[#E2E8F0]">
          <div class="space-y-2">
            <span class="text-xs font-mono text-[#00B4D8] font-bold uppercase tracking-wider">FREQUENTLY ASKED QUESTIONS</span>
            <h2 class="text-2xl sm:text-3xl font-bold text-[#14151A] font-['Montserrat',sans-serif]">
              Frequently Asked Questions
            </h2>
          </div>

          <div class="space-y-3" id="blog-faq-accordion">
            <?php foreach ($post['faqs'] as $idx => $faq): 
              if (empty($faq['q']) || empty($faq['a'])) continue;
            ?>
            <div class="border border-[#E2E8F0] rounded-xl overflow-hidden bg-white shadow-sm transition-all hover:border-[#1B5FAA]/40">
              <button type="button" class="w-full text-left p-4 sm:p-5 font-bold text-[#14151A] flex items-center justify-between gap-4 hover:bg-[#F8FAFC] transition-colors faq-accordion-btn" onclick="toggleFaqAccordion(this)">
                <span class="text-sm sm:text-base font-semibold"><?php echo htmlspecialchars($faq['q']); ?></span>
                <span class="icon text-lg font-mono text-[#1B5FAA] shrink-0 font-bold">+</span>
              </button>
              <div class="faq-accordion-content p-4 sm:p-5 pt-0 text-sm text-[#475569] leading-relaxed hidden border-t border-[#E2E8F0]">
                <?php echo nl2br(htmlspecialchars($faq['a'])); ?>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

      </article>

    </div>

    <!-- Explore Services Cross-Linking -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
      <?php include_once __DIR__ . '/includes/explore-services.php'; ?>
    </div>

    <!-- Enhanced 360-Degree Full-Stack CTA Band -->
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-16" data-aos="fade-up">
      <div class="relative overflow-hidden bg-gradient-to-br from-[#0B0F19] via-[#111827] to-[#0A192F] text-white p-8 sm:p-12 lg:p-16 rounded-3xl space-y-10 border border-[#00F0FF]/30 shadow-2xl shadow-cyan-950/60">
        
        <!-- Ambient Glowing Orbs Background -->
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#1B5FAA]/30 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-[#00F0FF]/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-[#00F59B]/10 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="relative z-10 space-y-8 max-w-4xl mx-auto">
          
          <!-- Top Pulsing Badge -->
          <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#1B5FAA]/25 border border-[#00F0FF]/40 text-[#00F0FF] text-xs font-mono font-bold tracking-wider uppercase shadow-sm">
            <span class="relative flex h-2 w-2">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#00F59B] opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2 w-2 bg-[#00F59B]"></span>
            </span>
            <span>360° AI GROWTH & DIGITAL ENGINEERING POWERHOUSE</span>
          </div>

          <!-- Headline with Multi-Color Gradient Accent -->
          <div class="space-y-3">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white font-['Montserrat',sans-serif] tracking-tight leading-tight">
              Scale Your Brand With an <br class="hidden sm:inline" />
              <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#00F0FF] via-[#00B4D8] to-[#00F59B]">
                All-In-One AI & Tech Agency
              </span>
            </h2>
            <p class="text-sm sm:text-base text-[#94A3B8] leading-relaxed max-w-3xl mx-auto">
              Digital4Local replaces slow, disconnected vendors with a single unified growth engine — engineering #1 organic search rankings, ChatGPT citations, custom high-speed web & mobile apps, automated lead pipelines, and high-ROI acquisition funnels.
            </p>
          </div>

          <!-- 4-Pillar Full Stack Capabilities Grid -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-left pt-2">
            
            <!-- Pillar 1: Search & AI Dominance -->
            <div class="p-5 rounded-2xl bg-white/[0.04] border border-white/10 hover:border-[#00F0FF]/50 hover:bg-white/[0.07] transition-all space-y-2.5 group">
              <div class="w-9 h-9 rounded-xl bg-[#00F0FF]/15 text-[#00F0FF] flex items-center justify-center font-bold">
                <i data-lucide="search" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
              </div>
              <h3 class="font-bold text-white text-sm font-['Montserrat',sans-serif]">Search & AI Dominance</h3>
              <p class="text-[11px] text-[#94A3B8] leading-relaxed">
                #1 Google Maps 3-Pack, Technical SEO, Core Web Vitals, and Generative AI citations (ChatGPT & Perplexity).
              </p>
            </div>

            <!-- Pillar 2: AI Lead Automations -->
            <div class="p-5 rounded-2xl bg-white/[0.04] border border-white/10 hover:border-[#00F59B]/50 hover:bg-white/[0.07] transition-all space-y-2.5 group">
              <div class="w-9 h-9 rounded-xl bg-[#00F59B]/15 text-[#00F59B] flex items-center justify-center font-bold">
                <i data-lucide="zap" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
              </div>
              <h3 class="font-bold text-white text-sm font-['Montserrat',sans-serif]">AI Lead Automations</h3>
              <p class="text-[11px] text-[#94A3B8] leading-relaxed">
                Sub-60s WhatsApp & SMS lead triage, custom AI chatbot sales agents, and autonomous CRM routing.
              </p>
            </div>

            <!-- Pillar 3: Web & App Engineering -->
            <div class="p-5 rounded-2xl bg-white/[0.04] border border-white/10 hover:border-[#A855F7]/50 hover:bg-white/[0.07] transition-all space-y-2.5 group">
              <div class="w-9 h-9 rounded-xl bg-[#A855F7]/15 text-[#A855F7] flex items-center justify-center font-bold">
                <i data-lucide="code-2" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
              </div>
              <h3 class="font-bold text-white text-sm font-['Montserrat',sans-serif]">Web & App Builds</h3>
              <p class="text-[11px] text-[#94A3B8] leading-relaxed">
                Bespoke high-converting Next.js / PHP websites, custom SaaS portals, and native iOS & Android apps.
              </p>
            </div>

            <!-- Pillar 4: Performance & Digital PR -->
            <div class="p-5 rounded-2xl bg-white/[0.04] border border-white/10 hover:border-[#F59E0B]/50 hover:bg-white/[0.07] transition-all space-y-2.5 group">
              <div class="w-9 h-9 rounded-xl bg-[#F59E0B]/15 text-[#F59E0B] flex items-center justify-center font-bold">
                <i data-lucide="trending-up" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
              </div>
              <h3 class="font-bold text-white text-sm font-['Montserrat',sans-serif]">Paid Ads & Digital PR</h3>
              <p class="text-[11px] text-[#94A3B8] leading-relaxed">
                High-converting Google & Meta ad funnels, viral local social campaigns, and tier-1 press link building.
              </p>
            </div>

          </div>

          <!-- Quick Metrics Ribbon -->
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 py-3 px-4 rounded-2xl bg-white/[0.02] border border-white/5 text-center font-mono">
            <div>
              <div class="text-base sm:text-lg font-extrabold text-[#00F0FF]">40+</div>
              <div class="text-[10px] text-[#64748B] uppercase">Brands Scaled</div>
            </div>
            <div>
              <div class="text-base sm:text-lg font-extrabold text-[#00F59B]">&lt; 60s</div>
              <div class="text-[10px] text-[#64748B] uppercase">Lead Response</div>
            </div>
            <div>
              <div class="text-base sm:text-lg font-extrabold text-[#A855F7]">100%</div>
              <div class="text-[10px] text-[#64748B] uppercase">Code & IP Ownership</div>
            </div>
            <div>
              <div class="text-base sm:text-lg font-extrabold text-[#F59E0B]">₹0</div>
              <div class="text-[10px] text-[#64748B] uppercase">Hidden Markups</div>
            </div>
          </div>

          <!-- Action Buttons Group -->
          <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-2">
            <button class="trigger-book-demo btn-primary w-full sm:w-auto px-8 py-4 text-sm font-extrabold shadow-xl shadow-cyan-500/25 flex items-center justify-center gap-2 hover:scale-105 transition-all duration-300">
              <i data-lucide="calendar" class="w-4 h-4"></i>
              <span>Book 15-Min 360° Strategy Call</span>
            </button>
            <a href="/pricing.php" class="w-full sm:w-auto px-7 py-4 rounded-xl bg-white/5 hover:bg-white/10 border border-white/15 text-white text-sm font-bold flex items-center justify-center gap-2 hover:border-[#00F0FF]/40 transition-all">
              <i data-lucide="layers" class="w-4 h-4 text-[#00F0FF]"></i>
              <span>Explore Plans & Retainers →</span>
            </a>
          </div>

          <!-- Footer Trust Statement -->
          <div class="flex flex-wrap items-center justify-center gap-3 text-xs font-mono text-[#64748B] pt-1">
            <span class="flex items-center gap-1 text-[#F59E0B]">★★★★★ 5.0 Rating</span>
            <span>•</span>
            <span>London, Austin & Bhopal Operations Hubs</span>
            <span>•</span>
            <span>Direct Access to Principal Engineers</span>
          </div>

        </div>
      </div>
    </section>

  </main>

  <?php include_once __DIR__ . '/includes/footer.php'; ?>

  <!-- FAQ Accordion Helper Script -->
  <script>
    function toggleFaqAccordion(btn) {
      const content = btn.nextElementSibling;
      const icon = btn.querySelector('span.icon');
      const isHidden = content.classList.contains('hidden');
      
      // Close other accordions in the same container if desired
      const parent = btn.closest('#blog-faq-accordion');
      if (parent) {
        parent.querySelectorAll('.faq-accordion-content').forEach(c => {
          if (c !== content) c.classList.add('hidden');
        });
        parent.querySelectorAll('.faq-accordion-btn span.icon').forEach(i => {
          if (i !== icon) i.textContent = '+';
        });
      }

      if (isHidden) {
        content.classList.remove('hidden');
        if (icon) icon.textContent = '−';
      } else {
        content.classList.add('hidden');
        if (icon) icon.textContent = '+';
      }
    }
  </script>

  <style>
    /* Article Body Typography Styles */
    .article-body-content h2 {
      font-size: 1.75rem;
      font-weight: 700;
      color: #14151A;
      font-family: 'Montserrat', sans-serif;
      margin-top: 2.25rem;
      margin-bottom: 0.85rem;
      padding-bottom: 0.5rem;
      border-bottom: 1px solid #E4E7EC;
    }
    .article-body-content h3 {
      font-size: 1.35rem;
      font-weight: 700;
      color: #14151A;
      font-family: 'Montserrat', sans-serif;
      margin-top: 1.75rem;
      margin-bottom: 0.65rem;
    }
    .article-body-content h4 {
      font-size: 1.15rem;
      font-weight: 600;
      color: #14151A;
      margin-top: 1.25rem;
      margin-bottom: 0.5rem;
    }
    .article-body-content p {
      margin-bottom: 1.25rem;
      line-height: 1.75;
      color: #475569;
    }
    .article-body-content ul, .article-body-content ol {
      margin-bottom: 1.25rem;
      padding-left: 1.5rem;
    }
    .article-body-content ul { list-style-type: disc; }
    .article-body-content ol { list-style-type: decimal; }
    .article-body-content li { margin-bottom: 0.5rem; color: #475569; }
    .article-body-content blockquote {
      border-left: 4px solid #1B5FAA;
      padding: 1rem 1.25rem;
      background: #F8FAFC;
      border-radius: 0 0.75rem 0.75rem 0;
      margin: 1.75rem 0;
      font-style: italic;
      color: #1E293B;
    }
    .article-body-content img {
      max-width: 100%;
      height: auto;
      border-radius: 1rem;
      margin: 1.75rem 0;
      border: 1px solid #E4E7EC;
    }
    .article-body-content table {
      width: 100%;
      border-collapse: collapse;
      margin: 1.75rem 0;
      font-size: 0.875rem;
    }
    .article-body-content th, .article-body-content td {
      padding: 0.75rem 1rem;
      border: 1px solid #E2E8F0;
    }
    .article-body-content th {
      background-color: #F8FAFC;
      font-weight: 700;
      color: #14151A;
    }
    .article-body-content a {
      color: #1B5FAA;
      text-decoration: underline;
      font-weight: 500;
    }
    .article-body-content a:hover {
      color: #00B4D8;
    }
  </style>
</body>
</html>
