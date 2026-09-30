<?php
/**
 * Digital4Local - Portfolio & Bhopal Sales Landing Page Central Configuration
 * All client links, WhatsApp numbers, reviews, pricing, case studies, and FAQs are managed here.
 */

return [
    // Core Business & Contact Links
    'business_name' => 'Digital4Local',
    'tagline' => "Bhopal's Local SEO, Google Maps & AI Search Agency",
    'city' => 'Bhopal',
    'state' => 'Madhya Pradesh',
    'country' => 'India',
    'address' => 'H.N 90 Priyadarshani Co Operative Society Sant Aasharam Nagar Bagmugaliya, Bhopal, MP 462043',
    'geo' => [
        'lat' => 23.1908003,
        'lng' => 77.464107
    ],
    'email' => 'info@digital4local.com',
    'whatsapp_number' => '+919131140530',
    'whatsapp_number_clean' => '919131140530',
    'gbp_url' => 'https://share.google/5zZZZh6iBjHNJYzuu',
    'google_review_link' => 'https://share.google/5zZZZh6iBjHNJYzuu',
    'instagram_url' => 'https://www.instagram.com/_digital4local',
    'instagram_handle' => '@_digital4local',
    
    // Live Google Reviews API Toggle (Optional; falls back to static verified reviews)
    'enable_live_google_reviews_api' => false,
    'google_places_api_key' => '',
    'google_place_id' => 'ChIJ0VqYwN6ZezkRENoZ7qO-hB4',

    // Trust Metrics & Key Statistics
    'trust_metrics' => [
        'rating' => '5.0',
        'reviews_count' => '40+',
        'experience_years' => '5+',
        'markets' => 'India & UK',
        'rank_improvement' => 'Rank #14 → #1–2 in 90 Days',
        'client_retention' => '94%'
    ],

    // Service Chips in Hero
    'service_chips' => [
        'Google Business Profile',
        'Local SEO',
        'Citation Building',
        'Reels & Social Media',
        'Review Management',
        'AI Search (AEO/GEO)',
        'Meta & Google Ads'
    ],

    // 4 Pain Points (Problem Section)
    'pain_points' => [
        [
            'icon' => 'map-pin-off',
            'title' => 'Your competitor shows up on Google Maps, you don’t.',
            'desc' => 'When high-intent customers in Bhopal search "near me", your competitor captures the phone call and the walk-in.'
        ],
        [
            'icon' => 'heart-crack',
            'title' => 'Instagram posts get likes, not customers.',
            'desc' => 'Random Canva templates and vanity engagement don’t generate enquiries, bookings, or revenue for your business.'
        ],
        [
            'icon' => 'message-square-off',
            'title' => 'Few Google reviews, or bad ones left unanswered.',
            'desc' => '78% of local buyers check Google reviews first. Without an automated review engine, you lose instant credibility.'
        ],
        [
            'icon' => 'bot-off',
            'title' => 'When people ask ChatGPT for the best in Bhopal, your name isn’t there.',
            'desc' => 'AI answer engines like ChatGPT & Perplexity cite structured entities. If you aren’t optimized, you are completely invisible.'
        ]
    ],

    // 6 Core Services
    'services' => [
        [
            'id' => 'gbp-optimization',
            'icon' => 'map-pin',
            'title' => 'Google Business Profile Optimisation',
            'benefit' => 'Rank higher on Google Maps and get more calls and direction requests.',
            'bullets' => [
                'Primary & secondary category precision mapping',
                'Weekly localized geo-tagged photo & offer updates',
                '5x5 Geo-Grid rank monitoring across Bhopal pin codes'
            ]
        ],
        [
            'id' => 'local-seo',
            'icon' => 'search',
            'title' => 'Local SEO & Keyword Ranking',
            'benefit' => 'Rank your website for high-intent "near me" and "in Bhopal" searches.',
            'bullets' => [
                'On-page localized silo architecture & meta tuning',
                'Bhopal locality landing pages (Arera, MP Nagar, Kolar)',
                'Local search intent keyword targeting with high commercial value'
            ]
        ],
        [
            'id' => 'citation-building',
            'icon' => 'globe',
            'title' => 'Citation Building & NAP Consistency',
            'benefit' => 'Consistent listings across 20–60+ directories to build rock-solid local trust.',
            'bullets' => [
                'Justdial, Sulekha, IndiaMART, YellowPages syndication',
                '100% NAP (Name, Address, Phone) consistency clean-up',
                'Bhopal & MP niche business directory submissions'
            ]
        ],
        [
            'id' => 'social-media-management',
            'icon' => 'instagram',
            'title' => 'Social Media Management (Reels + Posts)',
            'benefit' => 'Instagram & Facebook content planned, designed, edited and published for you.',
            'bullets' => [
                'High-converting short-form Reels with trending local audio',
                'Custom brand design, carousel breakdowns & stories',
                'End-to-end copywriting, hashtag strategy & monthly calendar'
            ]
        ],
        [
            'id' => 'review-management',
            'icon' => 'star',
            'title' => 'Review & Reputation Management',
            'benefit' => 'Review-generation system (QR code + WhatsApp link) and professional replies.',
            'bullets' => [
                'Tap-to-review QR codes & automated WhatsApp review funnels',
                'Human response to every positive & critical review within 24h',
                'Google review sentiment tracking & spam review flag support'
            ]
        ],
        [
            'id' => 'ai-search-visibility',
            'icon' => 'bot',
            'title' => 'AI Search Visibility (AEO & GEO)',
            'benefit' => 'Get your business recommended by ChatGPT, Gemini and Google AI Overviews.',
            'bullets' => [
                'Structured JSON-LD schema entity graph deployment',
                'LLM knowledge base optimization (llms.txt manifest)',
                'Direct answer formatting for zero-click AI recommendations'
            ]
        ]
    ],

    // Also Available Strip
    'additional_services_strip' => [
        'Meta Ads (Facebook & Instagram)',
        'Google Search & Maps Ads',
        'Custom Business Websites',
        'WhatsApp Automation Funnels',
        'High-Converting Landing Pages'
    ],

    // The D4L Local Growth System™ (4-Step Timeline)
    'growth_system' => [
        [
            'step' => '01',
            'phase' => 'Week 1',
            'name' => 'Discover',
            'tagline' => 'Local Visibility Audit',
            'desc' => 'We perform an exhaustive audit of your Google Business Profile score, 5x5 Maps geo-grid rankings, competitor gaps, citation health, and AI search visibility baseline.'
        ],
        [
            'step' => '02',
            'phase' => 'Week 2',
            'name' => 'Strategy',
            'tagline' => '90-Day Growth Roadmap',
            'desc' => 'We build your custom growth blueprint: target local commercial keywords, high-converting content pillars, competitor conquesting plan, and exact monthly KPIs.'
        ],
        [
            'step' => '03',
            'phase' => 'Months 1–3',
            'name' => 'Execute',
            'tagline' => 'Full-Stack Execution',
            'desc' => 'GMB optimization, directory citations, high-retention Instagram reels, on-page SEO, and review acceleration run seamlessly from an approved monthly calendar.'
        ],
        [
            'step' => '04',
            'phase' => 'Month 4+',
            'name' => 'Scale',
            'tagline' => 'Dominate & Expand',
            'desc' => 'We double down on top-performing lead channels, eliminate low-ROI activities, launch targeted paid ad funnels, and expand visibility to nearby territories.'
        ]
    ],

    // Case Studies & Results
    'case_studies' => [
        [
            'type' => 'featured',
            'client' => 'Solar4Good (UK)',
            'industry' => 'Renewable Energy & Solar Installation',
            'logo' => 'assets/images/clients/solar4good.png',
            'highlight' => 'Maps #14 to #1–2 in 90 Days',
            'before_after' => [
                [
                    'label' => 'Google Maps Rank',
                    'before' => '#14 (Invisible)',
                    'after' => '#1–#2 (Top 3 Pack)',
                    'lift' => 'Top 3 Domination'
                ],
                [
                    'label' => 'Inbound Phone Calls',
                    'before' => '9 / month',
                    'after' => '200 / month',
                    'lift' => '+2,122% Increase'
                ],
                [
                    'label' => 'Time to Result',
                    'before' => 'Baseline',
                    'after' => '90 Days',
                    'lift' => 'Compounding Growth'
                ]
            ],
            'summary' => 'Executed deep citation clean-up, review acceleration, localized geo-silo content, and technical on-page SEO to conquer competitive regional search grids.'
        ],
        [
            'type' => 'placeholder',
            'client' => '[Add case study: Bhopal Healthcare Clinic]',
            'industry' => 'Dental & Healthcare',
            'logo' => '',
            'highlight' => '+350% Patient Consultations via Google Maps',
            'summary' => 'Slot reserved for upcoming verified client data. Case study details, before/after metrics, and growth graphs will be published here upon client sign-off.'
        ],
        [
            'type' => 'placeholder',
            'client' => '[Add case study: Bhopal Retail Showroom & Café]',
            'industry' => 'Retail & F&B',
            'logo' => '',
            'highlight' => '10x Footfall & Viral Instagram Reach',
            'summary' => 'Slot reserved for upcoming verified client data. Case study details, before/after metrics, and growth graphs will be published here upon client sign-off.'
        ]
    ],

    // Real Verified Google Reviews (Exact Transcripts from Clients)
    'reviews' => [
        [
            'author' => 'RKDF UNIVERSITY BHOPAL',
            'initial' => 'R',
            'role' => 'Higher Education Institution',
            'location' => 'Bhopal',
            'rating' => 5,
            'time_ago' => 'Verified Client',
            'text' => 'Solid digital marketing company. Their work is clear focused and easy to understand. Good choice for businesses looking to improve their online presence.',
            'owner_response' => 'Thank you so much for the 5-star rating, RKDF University! We are thrilled to partner with esteemed institutions in Bhopal to elevate their online presence.'
        ],
        [
            'author' => 'APJAKU',
            'initial' => 'A',
            'role' => 'Educational Organization',
            'location' => 'Bhopal',
            'rating' => 5,
            'time_ago' => 'Verified Client',
            'text' => 'Good company for digital marketing and online visibility. Abhishek and the team are professional easy to communicate with and have a good understanding of SEO and digital growth.',
            'owner_response' => 'Thank you for the fantastic feedback! Abhishek and the entire Digital4Local team are incredibly proud to support your digital growth in Bhopal.'
        ],
        [
            'author' => 'srku media',
            'initial' => 'S',
            'role' => 'Media & University Marketing',
            'location' => 'Bhopal',
            'rating' => 5,
            'time_ago' => '4-Month Active Retainer',
            'text' => 'Good experience working with Digital4Local for the last 4 months. They handle our SEO, website development and social media marketing for our university . Their efforts have improved our digital presence and contributed to increased admissions. If you’re looking for an SEO and digital marketing company in Bhopal, they are worth considering.',
            'owner_response' => 'Thank you for the stellar review! It has been an absolute privilege managing your website development, social media, and SEO over the past 4 months.'
        ],
        [
            'author' => 'Maa Tara Realtors',
            'initial' => 'M',
            'role' => 'Real Estate & Runforlife NGO',
            'location' => 'Bhopal',
            'rating' => 5,
            'time_ago' => 'Verified Client',
            'text' => 'We came to know about Digital4Local through a friend, and decided to work with them for the Runforlife NGO website and SEO. They did a good job with the website and have also been helping us with SEO. The team is easy to communicate with and always available when we need any help. Overall, a good experience working with them. Would definitely recommend them.',
            'owner_response' => 'Hi Maa Tara Realtors! Thank you so much for the fantastic review and the kind referral. It has been an absolute privilege working on the Runforlife NGO website.'
        ],
        [
            'author' => 'Tufail Ahmed',
            'initial' => 'T',
            'role' => 'Business Owner',
            'location' => 'India',
            'rating' => 5,
            'time_ago' => '6-Month Active Retainer',
            'text' => 'Worked with Digital4local for the past 6 months now on SEO and link building, and the difference has been clear. Their team handled everything from technical SEO to link building and content strategy, and our organic traffic and keyword rankings improved significantly. Digital4local was transparent throughout, with clear monthly reporting. Would recommend to anyone looking for a digital marketing partner who actually does the work.',
            'owner_response' => 'Hi Tufail! Thank you for sharing your experience. We are thrilled to see the significant improvements in your organic traffic and keyword rankings over these past 6 months.'
        ],
        [
            'author' => 'Vistyle Brand junction',
            'initial' => 'V',
            'role' => 'Retail Showroom',
            'location' => 'Bhopal',
            'rating' => 5,
            'time_ago' => 'Showroom Client',
            'text' => 'I had a good experience with the Digital4Local team for my showroom, Vistyle Brand Junction, in Bhopal. Abhishek and Ayush have been supportive with SEO strategies and Instagram management for our business.',
            'owner_response' => 'Thank you so much for the fantastic review! Abhishek, Ayush, and the entire Digital4local team have truly enjoyed partnering with Vistyle Brand Junction in Bhopal.'
        ],
        [
            'author' => 'Blackbuck Harmony',
            'initial' => 'B',
            'role' => 'Hospitality & Luxury Resort',
            'location' => 'Madhya Pradesh',
            'rating' => 5,
            'time_ago' => 'Resort Client',
            'text' => 'I availed digital marketing, social media, and local SEO services from the Digital4Local team, and I’m truly impressed with their fast turnaround and the results from our local SEO and social media campaigns for our resort.',
            'owner_response' => 'Thank you for the wonderful feedback! It has been an absolute pleasure working with Blackbuck Harmony Resort.'
        ]
    ],

    // Instagram Grid Content (6 Tiles)
    'instagram_posts' => [
        [
            'image' => 'assets/images/hero_dashboard_light_v2.png',
            'caption' => 'How we took a local brand from rank #14 to #1 on Google Maps in 90 days #LocalSEO #Bhopal',
            'url' => 'https://www.instagram.com/_digital4local',
            'type' => 'reel'
        ],
        [
            'image' => 'assets/images/hero_dashboard.png',
            'caption' => 'Behind the scenes: Shooting viral reels for Bhopal showrooms & retail brands #InstagramGrowth',
            'url' => 'https://www.instagram.com/_digital4local',
            'type' => 'reel'
        ],
        [
            'image' => 'assets/images/clients/rkdf_university.jpg',
            'caption' => 'Scaling student admissions & university visibility with full-funnel digital strategy #CaseStudy',
            'url' => 'https://www.instagram.com/_digital4local',
            'type' => 'post'
        ],
        [
            'image' => 'assets/images/clients/sunmoon_events.jpg',
            'caption' => 'Generating high-ticket event bookings with targeted local SEO & WhatsApp automation',
            'url' => 'https://www.instagram.com/_digital4local',
            'type' => 'reel'
        ],
        [
            'image' => 'assets/images/clients/bansal_group.jpg',
            'caption' => 'Why 78% of local business owners lose calls to competitors on Google Maps #BhopalBusiness',
            'url' => 'https://www.instagram.com/_digital4local',
            'type' => 'reel'
        ],
        [
            'image' => 'assets/images/clients/dps_bhopal.jpg',
            'caption' => 'AI Search Optimization: Getting local businesses recommended inside ChatGPT & Gemini #GEO',
            'url' => 'https://www.instagram.com/_digital4local',
            'type' => 'post'
        ]
    ],

    // Comparison: Typical Agency vs Digital4Local
    'comparison_table' => [
        [
            'feature' => 'Strategy',
            'typical' => 'Random posting with zero growth plan',
            'd4l' => 'Custom 90-Day Growth Roadmap with clear KPIs'
        ],
        [
            'feature' => 'Primary Focus',
            'typical' => 'Vanity likes, comments & fake followers',
            'd4l' => 'Inbound calls, direction requests & paying customers'
        ],
        [
            'feature' => 'Google Maps Optimization',
            'typical' => 'Ignored or basic profile setup only',
            'd4l' => 'Core focus with 5x5 geo-grid rank domination'
        ],
        [
            'feature' => 'AI Search (ChatGPT / Gemini)',
            'typical' => 'Not offered / No understanding of AEO/GEO',
            'd4l' => 'Included: Structured entity & LLM optimization'
        ],
        [
            'feature' => 'Reporting & Transparency',
            'typical' => 'Vague screenshots at month end (if any)',
            'd4l' => 'Monthly report in plain English + Live 24/7 dashboard'
        ],
        [
            'feature' => 'Communication & Speed',
            'typical' => 'Hard to reach, slow email tickets',
            'd4l' => 'Dedicated WhatsApp group with direct strategist access'
        ]
    ],

    // 6 Industry Playbooks for Bhopal Businesses
    'industry_playbooks' => [
        [
            'id' => 'clinics-dentists',
            'icon' => 'stethoscope',
            'title' => 'Clinics & Dentists',
            'tagline' => 'Fill appointment books with high-intent patient searches.',
            'approach' => "Rank for 'best dentist near me' and build trust with automated 5-star Google patient reviews.",
            'whatsapp_msg' => 'Hi Digital4Local, I run a clinic/dental practice in Bhopal and want more patient appointments through Google Maps.'
        ],
        [
            'id' => 'coaching-institutes',
            'icon' => 'graduation-cap',
            'title' => 'Coaching Institutes',
            'tagline' => 'Dominate admission season across Bhopal student hubs.',
            'approach' => 'Win admission season with viral faculty reels, Maps pack visibility, and course-specific landing pages.',
            'whatsapp_msg' => 'Hi Digital4Local, I run a coaching institute/college in Bhopal and want to scale student admissions.'
        ],
        [
            'id' => 'restaurants-cafes',
            'icon' => 'utensils',
            'title' => 'Restaurants & Cafés',
            'tagline' => 'Pack tables on weekdays and weekends alike.',
            'approach' => 'Fill tables with cinematic food reels, influencer tagging, and top-3 Google Maps food pack visibility.',
            'whatsapp_msg' => 'Hi Digital4Local, I run a restaurant/café in Bhopal and want to drive consistent footfall.'
        ],
        [
            'id' => 'real-estate',
            'icon' => 'building-2',
            'title' => 'Real Estate & Developers',
            'tagline' => 'Generate qualified buyers for plots, flats & commercial units.',
            'approach' => 'Generate high-intent site-visit leads with targeted Meta ads, local SEO, and video walkthroughs.',
            'whatsapp_msg' => 'Hi Digital4Local, I am in real estate in Bhopal and want qualified site-visit buyer enquiries.'
        ],
        [
            'id' => 'salons-gyms',
            'icon' => 'sparkles',
            'title' => 'Salons, Spas & Gyms',
            'tagline' => 'Turn local Instagram scrollers into paying members.',
            'approach' => 'Turn Instagram into steady bookings with festive offers, transformation reels, and Maps ranking.',
            'whatsapp_msg' => 'Hi Digital4Local, I run a salon/gym in Bhopal and want more membership and service bookings.'
        ],
        [
            'id' => 'showrooms-retail',
            'icon' => 'shopping-bag',
            'title' => 'Showrooms & Retail Stores',
            'tagline' => 'Drive walking customers to your store counters.',
            'approach' => 'Drive footfall with Google Maps directions, seasonal festival campaigns, and location-targeted ads.',
            'whatsapp_msg' => 'Hi Digital4Local, I run a retail showroom/store in Bhopal and want to increase store walk-ins.'
        ]
    ],

    // Pricing Plans Configuration
    'pricing' => [
        'currency_symbol' => '₹',
        'currency_code' => 'INR',
        'gst_note' => 'Prices exclude 18% GST.',
        'setup_fee_standard' => 4999,
        'setup_fee_note' => 'One-time setup fee ₹4,999 (FREE on 6-month & annual plans) · Minimum 3 months · Ad spend paid directly by client',
        
        'billing_options' => [
            'monthly' => [
                'name' => 'Monthly',
                'badge' => 'Standard',
                'discount_percent' => 0,
                'setup_free' => false
            ],
            'six_month' => [
                'name' => '6 Months',
                'badge' => 'Save 10% + Free Setup',
                'discount_percent' => 10,
                'setup_free' => true
            ],
            'annual' => [
                'name' => 'Annual',
                'badge' => '2 Months Free (Pay for 10)',
                'discount_percent' => 16.6667,
                'setup_free' => true
            ]
        ],

        'plans' => [
            [
                'id' => 'launch',
                'name' => 'LOCAL LAUNCH',
                'tagline' => 'Essential foundation for local market visibility',
                'best_for' => 'Single shop, clinic, café, salon',
                'price_monthly' => 14999,
                'is_popular' => false,
                'badge' => '',
                'cta_text' => 'Start with Launch',
                'features' => [
                    'Google Business Profile full optimisation',
                    '8 GMB localized posts / month',
                    '20 citations (setup month) + NAP clean-up',
                    '8 social posts + 4 reels / month (IG + FB)',
                    'Reply to all Google reviews within 24h',
                    '10 local commercial keywords tracked',
                    'Local Visibility Audit + 90-Day Roadmap',
                    'Monthly content calendar approval',
                    'Monthly report · WhatsApp support group'
                ]
            ],
            [
                'id' => 'growth',
                'name' => 'LOCAL GROWTH',
                'tagline' => 'Aggressive growth engine for market leadership',
                'best_for' => 'Growing clinics, coaching institutes, showrooms',
                'price_monthly' => 24999,
                'is_popular' => true,
                'badge' => '⭐ Most Popular',
                'cta_text' => 'Grow with Growth',
                'features' => [
                    'Everything in Launch plan, plus:',
                    '12 GMB posts + photo & Q&A management',
                    '40 citations incl. Bhopal & MP local directories',
                    '12 social posts + 8 reels / month (IG + FB)',
                    'Review-generation system (QR + WhatsApp link)',
                    'On-page local SEO for up to 10 website pages',
                    '2 SEO blog articles / month',
                    'Meta Ads management (ad spend extra)',
                    '25 keywords + top-5 competitor tracking',
                    'Live performance dashboard (24/7 access)',
                    'Content calendar with approval workflow',
                    '1 monthly strategy call · quarterly roadmap refresh'
                ]
            ],
            [
                'id' => 'leader',
                'name' => 'LOCAL LEADER',
                'tagline' => 'Total multi-channel and AI search dominance',
                'best_for' => 'Hospitals, real estate, multi-branch brands',
                'price_monthly' => 39999,
                'is_popular' => false,
                'badge' => 'Enterprise Grade',
                'cta_text' => 'Lead Your Market',
                'features' => [
                    'Everything in Growth plan, plus:',
                    'Up to 2 GMB locations (16 posts / month)',
                    '60+ citations incl. industry-niche directories',
                    '16 social posts + 12 reels + daily stories / month',
                    'Negative-review escalation & removal strategy',
                    'Full website local SEO + location pages',
                    '4 high-ranking SEO blogs / month',
                    'Meta + Google Ads management (spend up to ₹50K)',
                    'AI Search Visibility (ChatGPT, Gemini, AI Overviews)',
                    '50 keywords + top-10 competitor intelligence report',
                    'Dashboard with lead & ROI revenue tracking',
                    'Festival & seasonal campaign planning',
                    '6-month roadmap + quarterly business review',
                    '2 strategy calls / month · Priority WhatsApp (4h SLA)'
                ]
            ]
        ]
    ],

    // Expandable Comparison Matrix Categories
    'comparison_matrix' => [
        'Google Maps & Local Presence' => [
            'Google Business Profile Optimisation' => ['Launch' => 'Full Setup', 'Growth' => 'Advanced + Q&A', 'Leader' => 'Multi-location (Up to 2)'],
            'Monthly GMB Posts & Updates' => ['Launch' => '8 Posts', 'Growth' => '12 Posts', 'Leader' => '16 Posts'],
            'Geo-Grid Rank Tracking' => ['Launch' => '10 Keywords', 'Growth' => '25 Keywords', 'Leader' => '50 Keywords'],
            'Directory Citations' => ['Launch' => '20 Citations', 'Growth' => '40 Citations', 'Leader' => '60+ Citations']
        ],
        'Social Media & Content Creation' => [
            'Instagram & Facebook Posts' => ['Launch' => '8 Posts / mo', 'Growth' => '12 Posts / mo', 'Leader' => '16 Posts / mo'],
            'High-Converting Video Reels' => ['Launch' => '4 Reels / mo', 'Growth' => '8 Reels / mo', 'Leader' => '12 Reels / mo'],
            'Story Management' => ['Launch' => '✗', 'Growth' => 'Weekly', 'Leader' => 'Daily Stories'],
            'Content Calendar Approval' => ['Launch' => '✓', 'Growth' => '✓ (Custom)', 'Leader' => '✓ (Priority)']
        ],
        'Website SEO & AI Search' => [
            'On-Page Local SEO' => ['Launch' => 'Audit Only', 'Growth' => 'Up to 10 Pages', 'Leader' => 'Full Website + Silos'],
            'SEO Blog Content' => ['Launch' => '✗', 'Growth' => '2 Blogs / mo', 'Leader' => '4 Blogs / mo'],
            'AI Search (ChatGPT / Gemini / GEO)' => ['Launch' => '✗', 'Growth' => '✗', 'Leader' => '✓ Included']
        ],
        'Reputation & Review Engine' => [
            'Review Reply Management' => ['Launch' => 'All Reviews', 'Growth' => 'All Reviews', 'Leader' => 'Priority (<4h)'],
            'QR Code & WhatsApp Review Funnel' => ['Launch' => '✗', 'Growth' => '✓ Included', 'Leader' => '✓ Custom Branded']
        ],
        'Paid Advertising' => [
            'Meta Ads Management' => ['Launch' => '✗', 'Growth' => '✓ Included', 'Leader' => '✓ Included'],
            'Google Ads Management' => ['Launch' => '✗', 'Growth' => '✗', 'Leader' => '✓ Included (Up to ₹50K)']
        ],
        'Support & Strategy' => [
            'Support Channel' => ['Launch' => 'WhatsApp Group', 'Growth' => 'WhatsApp Group', 'Leader' => 'Priority WhatsApp (<4h)'],
            'Live Performance Dashboard' => ['Launch' => 'Monthly Report', 'Growth' => '✓ 24/7 Live Dashboard', 'Leader' => '✓ 24/7 Live + ROI Tracking'],
            'Strategy Calls' => ['Launch' => 'Onboarding Call', 'Growth' => '1 Call / month', 'Leader' => '2 Calls / month']
        ]
    ],

    // Add-ons Menu
    'addons' => [
        [
            'name' => 'GMB-Only Maintenance',
            'price' => '₹6,999/mo',
            'desc' => 'Weekly GMB posts, photo uploads, review replies & 5x5 geo-grid rank monitoring.'
        ],
        [
            'name' => 'Extra Video Reel',
            'price' => '₹1,499 / each',
            'desc' => 'Scripted, color-graded, captioned with trending local audio and custom hook.'
        ],
        [
            'name' => 'On-Site Shoot Day (Bhopal)',
            'price' => '₹4,999',
            'desc' => 'Professional on-location photography & 4K reel footage capture at your premises.'
        ],
        [
            'name' => 'One-Time Citation Pack',
            'price' => '₹4,999',
            'desc' => '50 high-authority Indian & local business directory submissions with 100% NAP consistency.'
        ],
        [
            'name' => 'Custom Business Website',
            'price' => '₹14,999 – ₹29,999',
            'desc' => '5–8 page lightning-fast, mobile-optimized, SEO-ready conversion website.'
        ],
        [
            'name' => 'WhatsApp Automation Setup',
            'price' => '₹7,999 one-time',
            'desc' => 'Automated enquiry capture, instant brochure delivery & appointment booking chatbot.'
        ],
        [
            'name' => 'High-Converting Landing Page',
            'price' => '₹5,999 one-time',
            'desc' => 'Dedicated ad landing page with sub-second loading speed and direct lead capture.'
        ]
    ],

    // Our 90-Day Money-Back / 4th Month Free Guarantee
    'promise' => [
        'badge' => '90-DAY RESULTS GUARANTEE',
        'headline' => 'If your Google Business calls and direction requests don’t improve within 90 days, your 4th month is 100% FREE.',
        'subtext' => 'Applies to 3-month+ plans with timely client approvals and access. We never promise fake #1 rankings; we promise real work, transparent data, and measurable progress.'
    ],

    // FAQ Section (Accordions + JSON-LD Schema)
    'faqs' => [
        [
            'q' => 'Why is there a 3-month minimum commitment?',
            'a' => 'Google Maps algorithms and local search indexing require 60 to 90 days to process citation syndications, geo-grid trust signals, review velocity, and content consistency. A 3-month runway ensures you see real, compounding business enquiries rather than short-lived spikes.'
        ],
        [
            'q' => 'Who pays for the Meta and Google Ads budget?',
            'a' => 'You pay the ad spend directly to Meta (Facebook/Instagram) and Google from your own business ad account or credit card. Our monthly fee covers professional strategy, ad copywriting, creative design, conversion tracking setup, and daily bid optimization.'
        ],
        [
            'q' => 'Do I need a website to get started?',
            'a' => 'Not necessarily to begin! A fully optimized Google Business Profile and active Instagram Reels funnel can start generating direct WhatsApp enquiries and phone calls immediately. If your business grows to need a high-ranking website, we can build a fast, custom conversion site for you as an add-on.'
        ],
        [
            'q' => 'Will your team come and shoot the Instagram Reels?',
            'a' => 'Our team plans, scripts, edits, captions, color-grades, and publishes all reels. For footage, you can easily share raw mobile video clips via WhatsApp/Drive, or book our professional on-site Bhopal shoot day add-on (₹4,999) where our videographer captures all monthly footage at your clinic, showroom, or café.'
        ],
        [
            'q' => 'How will I know if our marketing is actually working?',
            'a' => 'Complete transparency is our cornerstone. You get a monthly performance report written in simple business language (showing calls, direction requests, search impressions, and reel reach), weekly updates in your dedicated WhatsApp group, and 24/7 access to your live data dashboard.'
        ],
        [
            'q' => 'Can I upgrade or change my plan later?',
            'a' => 'Yes, absolutely! You can upgrade, adjust, or add custom services at any billing cycle. As your local business expands, we seamlessly transition your account from Launch to Growth or Leader.'
        ],
        [
            'q' => 'Do you only work with businesses in Bhopal?',
            'a' => 'While our engineering and content team is based in Bhopal, Madhya Pradesh, we manage Local SEO, Social Media, and AI search campaigns for clients across India as well as overseas brands in the United Kingdom and North America.'
        ]
    ]
];
