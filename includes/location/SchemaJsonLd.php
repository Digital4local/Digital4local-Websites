<?php
/**
 * Dynamic JSON-LD Structured Data Schema Generator for Location Cluster Pages
 * Generates:
 * 1. ProfessionalService (shared @id https://digital4local.com/#organization) with verified Bhopal address
 * 2. Person schema for Abhishek Raikwar (Author & Founder)
 * 3. Service schema for spoke pages (pages 2-6)
 * 4. FAQPage schema built from the page's own FAQs
 * 5. BreadcrumbList schema with exact hierarchical trail
 */
if (!function_exists('d4l_render_location_schema_jsonld')) {
    function d4l_render_location_schema_jsonld($page_data) {
        require_once __DIR__ . '/../../config/business.php';
        $cfg = d4l_get_business_config();
        $nap = $cfg['nap'];
        $author = $cfg['author'];

        $slug = $page_data['slug'] ?? 'seo-agency-bhopal';
        $is_hub = !empty($page_data['isHub']);
        $canonical_url = "https://digital4local.com/" . $slug . "/";
        $page_title = $page_data['metaTitle'] ?? $page_data['h1'] ?? 'SEO Agency in Bhopal';
        $page_desc = $page_data['metaDescription'] ?? $page_data['heroDirectAnswer'] ?? '';

        $schemas = [];

        // 1. Shared Organization / ProfessionalService Schema
        $org_schema = [
            "@type" => "ProfessionalService",
            "@id" => "https://digital4local.com/#organization",
            "name" => $nap['name'],
            "legalName" => $nap['legalName'],
            "url" => "https://digital4local.com",
            "logo" => $nap['logoUrl'],
            "image" => "https://digital4local.com/assets/images/hero_dashboard_light_v2.png",
            "description" => "Bhopal's premier AI-driven SEO, Google Maps and Generative Engine Optimization agency.",
            "email" => $nap['email'],
            "telephone" => $nap['phone'],
            "priceRange" => $nap['priceRange'],
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => $nap['address']['streetAddress'],
                "addressLocality" => $nap['address']['addressLocality'],
                "addressRegion" => $nap['address']['addressRegion'],
                "postalCode" => $nap['address']['postalCode'],
                "addressCountry" => $nap['address']['addressCountry']
            ],
            "geo" => [
                "@type" => "GeoCoordinates",
                "latitude" => $nap['geo']['latitude'],
                "longitude" => $nap['geo']['longitude']
            ],
            "areaServed" => [
                [
                    "@type" => "City",
                    "name" => "Bhopal",
                    "sameAs" => "https://en.wikipedia.org/wiki/Bhopal"
                ],
                [
                    "@type" => "AdministrativeArea",
                    "name" => "Madhya Pradesh"
                ],
                [
                    "@type" => "Country",
                    "name" => "India"
                ]
            ],
            "founder" => [
                "@type" => "Person",
                "@id" => "https://digital4local.com/#author-abhishek-raikwar",
                "name" => $author['name'],
                "jobTitle" => $author['role'],
                "sameAs" => $author['sameAs']
            ]
        ];
        $schemas[] = $org_schema;

        // 2. Person Schema for Abhishek Raikwar
        $person_schema = [
            "@type" => "Person",
            "@id" => "https://digital4local.com/#author-abhishek-raikwar",
            "name" => $author['name'],
            "jobTitle" => $author['role'],
            "worksFor" => [
                "@id" => "https://digital4local.com/#organization"
            ],
            "description" => $author['bio'],
            "sameAs" => $author['sameAs']
        ];
        $schemas[] = $person_schema;

        // 3. WebPage Schema
        $webpage_schema = [
            "@type" => "WebPage",
            "@id" => $canonical_url . "#webpage",
            "url" => $canonical_url,
            "name" => $page_title,
            "description" => $page_desc,
            "isPartOf" => [
                "@type" => "WebSite",
                "@id" => "https://digital4local.com/#website",
                "name" => "Digital4Local",
                "url" => "https://digital4local.com"
            ],
            "about" => [
                "@id" => "https://digital4local.com/#organization"
            ],
            "author" => [
                "@id" => "https://digital4local.com/#author-abhishek-raikwar"
            ],
            "inLanguage" => "en-IN"
        ];
        $schemas[] = $webpage_schema;

        // 4. BreadcrumbList Schema
        $breadcrumb_items = [
            [
                "@type" => "ListItem",
                "position" => 1,
                "name" => "Home",
                "item" => "https://digital4local.com/"
            ]
        ];

        if ($is_hub) {
            $breadcrumb_items[] = [
                "@type" => "ListItem",
                "position" => 2,
                "name" => "SEO Agency in Bhopal",
                "item" => $canonical_url
            ];
        } else {
            $breadcrumb_items[] = [
                "@type" => "ListItem",
                "position" => 2,
                "name" => "Bhopal",
                "item" => "https://digital4local.com/seo-agency-bhopal/"
            ];
            $breadcrumb_items[] = [
                "@type" => "ListItem",
                "position" => 3,
                "name" => $page_data['h1'] ?? $page_title,
                "item" => $canonical_url
            ];
        }

        $schemas[] = [
            "@type" => "BreadcrumbList",
            "@id" => $canonical_url . "#breadcrumb",
            "itemListElement" => $breadcrumb_items
        ];

        // 5. Service Schema on Pages 2-6 (Spoke Pages)
        if (!$is_hub) {
            $service_schema = [
                "@type" => "Service",
                "@id" => $canonical_url . "#service",
                "name" => $page_data['h1'] ?? $page_title,
                "description" => $page_desc,
                "serviceType" => $page_data['primaryKeyword'] ?? 'Search Marketing',
                "provider" => [
                    "@id" => "https://digital4local.com/#organization"
                ],
                "areaServed" => [
                    "@type" => "City",
                    "name" => "Bhopal"
                ]
            ];
            $schemas[] = $service_schema;
        }

        // 6. FAQPage Schema
        if (!empty($page_data['faqs'])) {
            $faq_entities = [];
            foreach ($page_data['faqs'] as $faq) {
                $q = strip_tags($faq['q'] ?? '');
                $a = strip_tags($faq['a'] ?? '');
                // Clean any verification tags
                $a = preg_replace('/\[\[VERIFY:?\s*([^\]]+)\]\]/i', '$1', $a);
                if (!empty($q) && !empty($a)) {
                    $faq_entities[] = [
                        "@type" => "Question",
                        "name" => $q,
                        "acceptedAnswer" => [
                            "@type" => "Answer",
                            "text" => $a
                        ]
                    ];
                }
            }

            if (!empty($faq_entities)) {
                $schemas[] = [
                    "@type" => "FAQPage",
                    "@id" => $canonical_url . "#faq",
                    "mainEntity" => $faq_entities
                ];
            }
        }

        // Wrap in unified Schema Graph
        $graph = [
            "@context" => "https://schema.org",
            "@graph" => $schemas
        ];

        return '<script type="application/ld+json">' . "\n" . json_encode($graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n" . '</script>' . "\n";
    }
}
