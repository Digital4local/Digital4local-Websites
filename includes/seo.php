<?php
/**
 * Digital4Local - SEO Dynamic Head & Schema Component
 * Engineered for 100% Google, Bing, ChatGPT, and Perplexity Search Indexation & GEO
 */

require_once __DIR__ . '/site-config.php';
$seo_base_path = function_exists('get_base_path') ? get_base_path() : '/';

if (!isset($page_title) || empty($page_title)) {
    $page_title = "Digital4Local | The AI Growth Engine for Local Businesses, Startups & SaaS";
}
if (!isset($page_description) || empty($page_description)) {
    $page_description = "Digital4Local is an AI-driven growth agency specializing in Local SEO, GEO (Generative Engine Optimization), AEO, Technical SEO, Link Building & PR, and Social Media growth.";
}
if (!isset($page_keywords) || empty($page_keywords)) {
    $page_keywords = "AI SEO, Local SEO, GEO, Generative Engine Optimization, AEO, Answer Engine Optimization, Digital PR, Technical SEO, SaaS SEO, Startup Marketing";
}

// Clean Canonical URL calculation (Stripping tracking/debug query parameters)
if (!isset($canonical_url) || empty($canonical_url)) {
    $req_uri = $_SERVER['REQUEST_URI'] ?? '/';
    $parsed_url = parse_url($req_uri);
    $path = $parsed_url['path'] ?? '/';
    
    // Only preserve valid content queries like ?slug=
    $query_str = '';
    if (isset($parsed_url['query'])) {
        parse_str($parsed_url['query'], $query_params);
        $clean_params = [];
        if (isset($query_params['slug']) && !empty($query_params['slug'])) {
            $clean_params['slug'] = $query_params['slug'];
        }
        if (!empty($clean_params)) {
            $query_str = '?' . http_build_query($clean_params);
        }
    }
    
    $canonical_url = "https://digital4local.com" . $path . $query_str;
}

// Robots Indexation Control (Prevents indexing of draft, staging, or admin pages)
if (!isset($page_robots)) {
    $is_draft_mode = (isset($is_draft) && $is_draft) || (isset($page_status) && $page_status === 'draft') || (strpos($_SERVER['REQUEST_URI'] ?? '', 'admin') !== false);
    if ($is_draft_mode) {
        $page_robots = "noindex, nofollow";
    } else {
        $page_robots = "index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1";
    }
}

// Featured / OpenGraph Image
if (!isset($og_image) || empty($og_image)) {
    $og_image = "https://digital4local.com/assets/images/hero_dashboard_light_v2.png";
} else if (strpos($og_image, 'http') !== 0) {
    $og_image = "https://digital4local.com/" . ltrim($og_image, '/');
}

// Multi-Node Entity Graph JSON-LD Schema (Optimized for LLM & GEO Answer Engines)
$schema_data = [
    "@context" => "https://schema.org",
    "@graph" => [
        [
            "@type" => ["Organization", "ProfessionalService"],
            "@id" => "https://digital4local.com/#organization",
            "name" => "Digital4Local",
            "legalName" => "Digital4Local AI Growth Agency",
            "url" => "https://digital4local.com",
            "logo" => "https://digital4local.com/assets/images/digital4local_logo.png",
            "image" => "https://digital4local.com/assets/images/hero_dashboard_light_v2.png",
            "description" => "Digital4Local is the premier international AI growth agency specializing in Generative Engine Optimization (GEO), Answer Engine Optimization (AEO) for ChatGPT & Perplexity, 5x5 Google Maps grid rank tracking, and custom Web & App Development.",
            "email" => "contact@digital4local.com",
            "telephone" => "+1-512-890-4400",
            "contactPoint" => [
                [
                    "@type" => "ContactPoint",
                    "email" => "contact@digital4local.com",
                    "contactType" => "customer support",
                    "areaServed" => ["UK", "US", "IN", "Global"]
                ],
                [
                    "@type" => "ContactPoint",
                    "email" => "info@digital4local.com",
                    "contactType" => "general inquiries",
                    "areaServed" => ["UK", "US", "IN", "Global"]
                ]
            ],
            "address" => [
                [
                    "@type" => "PostalAddress",
                    "addressLocality" => "London",
                    "addressCountry" => "UK",
                    "name" => "London European HQ"
                ],
                [
                    "@type" => "PostalAddress",
                    "addressLocality" => "Austin",
                    "addressRegion" => "TX",
                    "addressCountry" => "USA",
                    "name" => "Austin North America Hub"
                ],
                [
                    "@type" => "PostalAddress",
                    "addressLocality" => "Bhopal",
                    "addressCountry" => "India",
                    "name" => "Bhopal Asia Engineering Hub"
                ]
            ],
            "priceRange" => "$$$",
            "aggregateRating" => [
                "@type" => "AggregateRating",
                "ratingValue" => "4.9",
                "reviewCount" => "384"
            ],
            "hasOfferCatalog" => [
                "@type" => "OfferCatalog",
                "name" => "AI Growth Agency Services",
                "itemListElement" => [
                    ["@type" => "Offer", "name" => "Local SEO & 5x5 Google Maps Grid Optimization"],
                    ["@type" => "Offer", "name" => "Generative Engine Optimization (GEO & AEO)"],
                    ["@type" => "Offer", "name" => "Technical SEO & 100/100 Core Web Vitals"],
                    ["@type" => "Offer", "name" => "High-DR Link Building & Digital PR"],
                    ["@type" => "Offer", "name" => "AI Digital Marketing & n8n Lead Automations"],
                    ["@type" => "Offer", "name" => "Social Media Growth & Viral Funnels"],
                    ["@type" => "Offer", "name" => "Custom High-Speed Web Development"],
                    ["@type" => "Offer", "name" => "Native & Cross-Platform App Development"]
                ]
            ],
            "sameAs" => [
                "https://twitter.com/digital4local",
                "https://linkedin.com/company/digital4local",
                "https://github.com/digital4local"
            ]
        ],
        [
            "@type" => "WebSite",
            "@id" => "https://digital4local.com/#website",
            "url" => "https://digital4local.com",
            "name" => "Digital4Local",
            "description" => "AI Growth Engine for Local Businesses, Startups & SaaS",
            "publisher" => [
                "@id" => "https://digital4local.com/#organization"
            ]
        ]
    ]
];
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($page_title); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
<meta name="robots" content="<?php echo htmlspecialchars($page_robots); ?>">
<link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">

<!-- Favicon & Touch Icons -->
<link rel="icon" type="image/x-icon" href="<?php echo $seo_base_path; ?>favicon.ico?v=2">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $seo_base_path; ?>assets/images/favicon-32x32.png?v=2">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $seo_base_path; ?>assets/images/favicon-16x16.png?v=2">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $seo_base_path; ?>assets/images/apple-touch-icon.png?v=2">

<!-- Open Graph / Facebook / LinkedIn -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
<meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($og_image); ?>">
<meta property="og:site_name" content="Digital4Local">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
<meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
<meta name="twitter:image" content="<?php echo htmlspecialchars($og_image); ?>">

<!-- Google Fonts: Inter, Plus Jakarta Sans & JetBrains Mono -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>

<!-- AOS Animation Library CSS -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<!-- Custom Design System CSS -->
<?php
$seo_base_path = function_exists('get_base_path') ? get_base_path() : '/';
$css_path = $seo_base_path . 'assets/css/custom.css';
?>
<link rel="stylesheet" href="<?php echo $css_path; ?>">

<!-- JSON-LD Schema Markup -->
<script type="application/ld+json">
<?php echo json_encode($schema_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
