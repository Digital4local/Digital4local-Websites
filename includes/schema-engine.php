<?php
/**
 * Digital4Local - Dynamic JSON-LD Structured Data (Schema Markup) Engine
 * Generates standards-compliant, rich Schema.org metadata across the entire website architecture:
 * 1. Global WebPage Schema (All Pages)
 * 2. Global BreadcrumbList Schema (All Pages with exact routing hierarchy)
 * 3. Service Schema with Offers & Pricing (All 8 Core Service Pages & Industry Blueprints)
 * 4. Article / BlogPosting Schema (All Blog Posts with Author "Abhishek Raikwar" & Publisher "Digital4local")
 * 5. Global FAQPage Schema (Any Page with FAQs)
 *
 * Strict Constraints Applied:
 * - Injected as valid <script type="application/ld+json"> inside <head>
 * - ZERO Review or AggregateRating schema generated anywhere on the site
 * - Skips duplicate LocalBusiness / MarketingAgency on Homepage (manually defined)
 * - Provider property is always Organization with name "Digital4local"
 */

if (!defined('DIGITAL4LOCAL_SCHEMA_ENGINE_LOADED')) {
    define('DIGITAL4LOCAL_SCHEMA_ENGINE_LOADED', true);

    /**
     * Master registry for the 8 core agency services with structured offers & FAQs.
     */
    function d4l_get_services_registry() {
        return [
            'local-seo' => [
                'name' => 'Local SEO & Google Maps Optimization',
                'description' => 'Local SEO services for businesses across India and global markets: Google Business Profile optimization, review acceleration, local landing pages, geo-grid rank tracking, and citation consistency.',
                'service_type' => 'Local SEO & Search Marketing',
                'url' => 'https://digital4local.com/services/local-seo.php',
                'breadcrumb_name' => 'Local SEO',
                'offers' => [
                    [
                        'name' => 'Starter Local SEO Retainer',
                        'price' => '9999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹9,999/mo',
                        'description' => 'Google Business Profile optimization, citation audit, 5x5 geo-grid rank tracking, and review generation playbook.'
                    ],
                    [
                        'name' => 'Growth Local SEO Retainer',
                        'price' => '19999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹19,999/mo',
                        'description' => 'Multi-location GBP optimization, citation syndication, local PR mentions, and sub-60s automated lead response.'
                    ],
                    [
                        'name' => 'Market Dominance Retainer',
                        'price' => '34999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹34,999/mo',
                        'description' => 'Aggressive multi-city dominance, custom local geo-silo landing pages, and automated competitor spam removal.'
                    ]
                ],
                'faqs' => [
                    [
                        'q' => 'What is local SEO?',
                        'a' => "Local SEO is the practice of optimising a business's online presence to appear in searches from nearby customers — 'near me' queries, 'in [city]' searches, and the Google map pack. Its main levers are the Google Business Profile, review signals, consistent business listings across the web, and location-relevant content."
                    ],
                    [
                        'q' => 'How long does local SEO take to show results?',
                        'a' => "Google Business Profile improvements and citation corrections often show movement within four to eight weeks. Competitive map-pack positions in dense urban categories typically take three to six months. Local SEO is generally faster than national SEO because the competitive set is smaller."
                    ],
                    [
                        'q' => 'What is the Google map pack and how do I get into it?',
                        'a' => "The map pack is the group of three local businesses Google displays above standard results for local queries. Getting into it depends primarily on proximity to the searcher, the completeness and accuracy of your Google Business Profile, and your review signals — quantity, recency and content. Backlinks matter less here than in standard organic results."
                    ],
                    [
                        'q' => 'How many reviews do I need to rank locally?',
                        'a' => "There is no fixed number. What matters more is a steady, ongoing flow of recent reviews rather than a single burst, along with the detail contained in them. Descriptive reviews mentioning specific services also help AI assistants recommend your business for specific queries."
                    ],
                    [
                        'q' => 'Does local SEO work without a physical address?',
                        'a' => "Partly. Service-area businesses without a storefront can rank in local search by defining service areas in the Google Business Profile, though options differ from businesses with a public address. Some categories and features require a verifiable address, so this should be confirmed for your specific situation."
                    ],
                    [
                        'q' => 'What is NAP consistency and why does it matter?',
                        'a' => "NAP stands for name, address and phone number. Consistency means these details are identical everywhere they appear online — your website, Google Business Profile, and every directory. Inconsistent details reduce a search engine's confidence in which information is correct, which weakens local rankings."
                    ],
                    [
                        'q' => 'Can local SEO help my business appear in AI answers?',
                        'a' => "Yes. When someone asks an AI assistant for a recommendation near them, the answer draws on many of the same signals local SEO builds: a complete business profile, consistent details across sources, and review content. Local SEO and generative engine optimisation overlap significantly for local businesses."
                    ],
                    [
                        'q' => 'Do I need local SEO if I already run Google Ads?',
                        'a' => "They serve different purposes. Ads stop producing the moment spending stops; local SEO builds a position that continues generating enquiries. Most local businesses run both, using ads for immediate volume and local SEO as the compounding foundation."
                    ]
                ]
            ],
            'geo-aeo' => [
                'name' => 'GEO & AEO Services (Generative Engine & Answer Engine Optimization)',
                'description' => 'Generative Engine Optimization and Answer Engine Optimization services. Get your brand cited by ChatGPT, Perplexity, Gemini and Google AI Overviews.',
                'service_type' => 'AI Search Optimization',
                'url' => 'https://digital4local.com/services/geo-aeo.php',
                'breadcrumb_name' => 'GEO & AEO',
                'offers' => [
                    [
                        'name' => 'AI Citation Audit & Baseline',
                        'price' => '14999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹14,999/mo',
                        'description' => 'Comprehensive AI answer engine audit, brand entity graph evaluation, and baseline citation share analysis across ChatGPT, Perplexity & Gemini.'
                    ],
                    [
                        'name' => 'Entity Optimization & LLM Graph Retainer',
                        'price' => '29999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹29,999/mo',
                        'description' => 'Active LLM entity syndication, schema graph injection, direct answer structuring, and AI crawler optimization.'
                    ],
                    [
                        'name' => 'Omnichannel AI Domination Retainer',
                        'price' => '59999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹59,999/mo',
                        'description' => 'Full-spectrum AI search optimization, proprietary data research publishing, brand citation reclamation, and monthly prompt share reporting.'
                    ]
                ],
                'faqs' => [
                    [
                        'q' => 'What is Generative Engine Optimization (GEO)?',
                        'a' => "Generative Engine Optimization is the practice of structuring content so AI answer engines such as ChatGPT, Perplexity, Gemini and Google's AI Overviews cite your business when answering a question. It focuses on being named as a source inside an AI-generated answer, rather than only ranking in a traditional search results list."
                    ],
                    [
                        'q' => 'What is Answer Engine Optimization (AEO)?',
                        'a' => "Answer Engine Optimization is the practice of structuring content to win the direct answer on a search results page — featured snippets, People Also Ask boxes and voice assistant responses. It rewards content that answers a specific question plainly and immediately, typically within the first 40 to 60 words under a clear heading."
                    ],
                    [
                        'q' => 'Does GEO mean geographic SEO?',
                        'a' => "No. GEO stands for Generative Engine Optimization, which means optimising to be cited by generative AI answer engines. It is unrelated to geography. Optimising a business to rank in a specific city or area is called Local SEO, which is a separate discipline with different ranking signals."
                    ],
                    [
                        'q' => 'What is the difference between SEO, AEO and GEO?',
                        'a' => "SEO targets a ranking position in the results list and aims to earn a click. AEO targets the direct answer box above those results. GEO targets a citation inside an AI-generated answer. They share a foundation of clear, credible, well-structured content, but they succeed on different surfaces and are measured differently."
                    ],
                    [
                        'q' => 'How do AI answer engines decide which sources to cite?',
                        'a' => "While the exact mechanisms are not published, AI answer engines consistently favour content that states answers clearly and early, comes from a source with consistent and unambiguous entity signals, is corroborated by credible third-party mentions, and has been updated recently. Content that buries its answer or contradicts other sources is harder to cite."
                    ],
                    [
                        'q' => 'Can you guarantee my business will be cited by ChatGPT?',
                        'a' => "No, and any agency offering that guarantee is overselling. No one controls what a generative model cites. What can be committed to is a clear plan, a measured baseline, structural and content improvements that demonstrably increase citability, and honest monthly reporting on citation share."
                    ],
                    [
                        'q' => 'How do you measure GEO results if there is no click?',
                        'a' => "Across four layers: citation share across a fixed prompt set, AI referral traffic in analytics, branded search lift in Search Console as a proxy for zero-click visibility, and enquiries that mention an AI assistant when asked how they found you. Measuring GEO on sessions alone understates it substantially."
                    ],
                    [
                        'q' => 'Do I need GEO if my SEO is already working?',
                        'a' => "GEO is increasingly the protection for SEO that is already working. As more searches end inside AI answers, ranking well matters less if the AI does not name you. GEO builds on existing SEO rather than replacing it — a site with strong SEO foundations is usually faster to make citable."
                    ]
                ]
            ],
            'technical-seo' => [
                'name' => 'Technical SEO & Core Web Vitals Optimization',
                'description' => 'Technical SEO services for complex and high-traffic websites: Core Web Vitals, crawl budget, JS rendering, international architecture and structured data.',
                'service_type' => 'Technical SEO',
                'url' => 'https://digital4local.com/services/technical-seo.php',
                'breadcrumb_name' => 'Technical SEO',
                'offers' => [
                    [
                        'name' => 'Technical SEO Deep Audit',
                        'price' => '12999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Setup from ₹12,999',
                        'description' => 'Full crawl analysis, Core Web Vitals profiling, crawl budget optimization, and indexation hygiene audit.'
                    ],
                    [
                        'name' => 'Technical Implementation Retainer',
                        'price' => '24999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹24,999/mo',
                        'description' => 'Hands-on code fixes, server response tuning, structured data deployment, and log-file monitoring.'
                    ],
                    [
                        'name' => 'Enterprise Architecture SLA',
                        'price' => '49999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹49,999/mo',
                        'description' => 'Continuous technical monitoring, international hreflang management, JS rendering optimization, and Core Web Vitals maintenance.'
                    ]
                ],
                'faqs' => [
                    [
                        'q' => 'What is technical SEO?',
                        'a' => "Technical SEO is the practice of optimising a website's infrastructure so search engines can crawl, render, index and trust it. It covers site speed and Core Web Vitals, crawlability, indexation, mobile usability, structured data, site architecture and security. It does not involve content writing or link building, but it determines whether either of those can work."
                    ],
                    [
                        'q' => 'What is the difference between technical SEO and on-page SEO?',
                        'a' => "On-page SEO optimises the content of individual pages — titles, headings, copy and internal links — to make them relevant to a search query. Technical SEO optimises the site infrastructure so those pages can be found, crawled, rendered and indexed at all. A page needs both: relevance from on-page work, accessibility from technical work."
                    ],
                    [
                        'q' => 'How do I know if my website has technical SEO problems?',
                        'a' => "Most technical problems are invisible from the front end, so a site can look perfect and still be broken to a crawler. Common signals include pages missing from Google, slow mobile loading, coverage errors in Google Search Console, and content that does not appear when you view the page source. A crawl-based audit is the reliable way to find them."
                    ],
                    [
                        'q' => 'What are Core Web Vitals?',
                        'a' => "Core Web Vitals are Google's metrics for page experience, measuring loading performance, interactivity and visual stability. They are part of how Google evaluates pages, and they affect users directly: slow or unstable pages lose visitors before content loads, particularly on mobile connections where most local search happens."
                    ],
                    [
                        'q' => 'How long does technical SEO take to show results?',
                        'a' => "Some fixes show quickly — removing an accidental noindex tag or correcting a robots.txt block can restore pages within days of recrawling. Speed improvements typically show over weeks. Site architecture changes take longer, because search engines must recrawl and reassess the whole structure. Most engagements see meaningful movement within one to three months."
                    ],
                    [
                        'q' => 'Does technical SEO affect whether AI tools like ChatGPT mention my business?',
                        'a' => "Yes. AI answer engines can only cite content their crawlers can reach, render and parse. Blocked crawlers, JavaScript-dependent content that does not render server-side, and missing structured data all make a site harder to cite — even when it is the best answer available. Technical SEO is the foundation of AI search visibility."
                    ],
                    [
                        'q' => 'Do I need technical SEO if I already have a fast website?',
                        'a' => "Speed is one part of technical SEO, not all of it. A fast site can still have indexation problems, broken canonicals, missing structured data, blocked sections or poor architecture. An audit confirms whether the rest is sound, and if it is, that is a useful thing to know rather than something to guess at."
                    ],
                    [
                        'q' => 'Can technical SEO fix a website that lost rankings after a redesign?',
                        'a' => "Often, yes. Ranking drops after a redesign or migration are usually caused by identifiable technical problems — missing redirects from old URLs, changed site structure, lost metadata, or newly blocked pages. A technical audit is the standard first step in diagnosing a post-migration drop."
                    ]
                ]
            ],
            'link-building-pr' => [
                'name' => 'Digital PR & High-Authority Link Building',
                'description' => 'Editorial link building and digital PR for high-growth brands: data-led PR campaigns, unlinked brand mention reclamation, and niche authority placements.',
                'service_type' => 'Digital PR & Link Acquisition',
                'url' => 'https://digital4local.com/services/link-building-pr.php',
                'breadcrumb_name' => 'Link Building & PR',
                'offers' => [
                    [
                        'name' => 'Foundation Link Acquisition Retainer',
                        'price' => '19999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹19,999/mo',
                        'description' => 'High-relevance niche authority editorial placements and unlinked brand mention reclamation.'
                    ],
                    [
                        'name' => 'Authority Digital PR Retainer',
                        'price' => '39999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹39,999/mo',
                        'description' => 'Data-driven PR asset creation, journalist outreach, and verified editorial coverage across tier-2 and tier-1 media.'
                    ],
                    [
                        'name' => 'Tier-1 National Media PR Retainer',
                        'price' => '74999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹74,999/mo',
                        'description' => 'Exclusive national news features, original industry survey syndication, and high-impact thought leadership citations.'
                    ]
                ],
                'faqs' => [
                    [
                        'q' => 'What is link building?',
                        'a' => "Link building is the practice of earning links from other websites to your own. Search engines treat a link as an editorial signal that another site considers your content worth referencing, which contributes to how authoritative your site appears. Legitimate link building earns links through coverage, useful content and outreach rather than purchasing them."
                    ],
                    [
                        'q' => 'What is the difference between link building and digital PR?',
                        'a' => "Link building is the broader goal of earning backlinks. Digital PR is a specific method of achieving it — earning media coverage and mentions on online publications through newsworthy stories, expert commentary or original data, with links arising as a byproduct. Digital PR also produces brand mentions and referral traffic that pure link building does not."
                    ],
                    [
                        'q' => 'Is buying backlinks safe?',
                        'a' => "No. Paid links that pass ranking signals violate search engine spam policies, and sites can be penalised for participating in link schemes. The consequences affect the website owner rather than the provider who sold the links, and recovering from a link-based penalty typically takes longer than the rankings the links produced."
                    ],
                    [
                        'q' => 'How many backlinks does my website need?',
                        'a' => "There is no target number, and any provider quoting one is selling volume rather than quality. What matters is relevance and credibility of the linking sites. For a local business, a modest number of genuine links from relevant local and industry sources typically outperforms hundreds of low-quality directory links."
                    ],
                    [
                        'q' => 'How long does link building take to show results?',
                        'a' => "Link building is the slowest SEO discipline. Outreach and coverage take weeks to land, and search engines then need time to recrawl and reassess authority. Meaningful ranking movement usually takes three to six months, and results compound over a longer period rather than appearing at a single point."
                    ],
                    [
                        'q' => 'What are toxic backlinks and should I disavow them?',
                        'a' => "Toxic backlinks come from spam sites, link farms or paid networks, often left behind by a previous provider. Not every low-quality link needs action, since search engines discount many automatically. A backlink audit determines whether the profile is genuinely harmful and whether a disavow file is warranted, rather than disavowing indiscriminately."
                    ],
                    [
                        'q' => 'Do backlinks help my business get mentioned by AI tools?',
                        'a' => "Indirectly, yes. AI answer engines weigh what independent, credible sources say about a business when deciding whether to cite it. Coverage and mentions across trusted publications help a model verify that a business is real and reputable, which supports citation — and digital PR produces those mentions whether or not they include a link."
                    ],
                    [
                        'q' => 'Can I do link building myself?',
                        'a' => "Some of it. A local business can build genuine citations, join relevant industry associations and pitch local stories without an agency. What is harder to do alone is sustained outreach at scale and identifying which opportunities are worth pursuing. Avoid free backlink lists and directory submission tools — those are the sources search engines discount."
                    ]
                ]
            ],
            'ai-marketing' => [
                'name' => 'AI Digital Marketing & Workflow Automation',
                'description' => 'AI marketing and workflow automation: sub-60s lead response engines, automated content distribution, and predictive analytics that reduce customer acquisition cost.',
                'service_type' => 'AI Marketing & Automation',
                'url' => 'https://digital4local.com/services/ai-marketing.php',
                'breadcrumb_name' => 'AI Marketing',
                'offers' => [
                    [
                        'name' => 'Starter AI Workflow Automation',
                        'price' => '24999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹24,999/mo',
                        'description' => 'Self-hosted n8n automation, sub-60s instant lead response via WhatsApp & Email, and CRM synchronization.'
                    ],
                    [
                        'name' => 'Growth AI Marketing Retainer',
                        'price' => '49999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹49,999/mo',
                        'description' => 'Conversational AI qualification bots, automated multi-channel nurturing sequences, and lead scoring.'
                    ],
                    [
                        'name' => 'Custom Autonomous Marketing Stack',
                        'price' => '99999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Setup from ₹99,999',
                        'description' => 'Bespoke AI agent architectures, custom model fine-tuning, predictive churn analysis, and full database automation.'
                    ]
                ],
                'faqs' => [
                    [
                        'q' => 'What is AI digital marketing?',
                        'a' => "AI digital marketing is the application of artificial intelligence, machine learning, and automated workflow engines to streamline marketing operations — including instant lead qualification, personalized multi-channel follow-ups, predictive customer scoring, and automated campaign optimization."
                    ],
                    [
                        'q' => 'What is n8n and why is it better than Zapier or Make?',
                        'a' => "n8n is an open-source, enterprise-grade workflow automation platform that can be self-hosted. Unlike cloud tools like Zapier or Make with restrictive per-step pricing, n8n offers unlimited workflow executions, native AI agent nodes, total data privacy, and direct database integration at a fraction of the cost."
                    ],
                    [
                        'q' => 'How fast can an AI workflow respond to incoming leads?',
                        'a' => "Our automated pipelines trigger responses in under 60 seconds across WhatsApp, SMS, and email the moment a prospect submits a web form or clicks a Facebook/Google lead ad, capturing prospect interest at peak buying intent."
                    ],
                    [
                        'q' => 'Can AI qualify leads before booking sales calls?',
                        'a' => "Yes. AI conversational agents can ask qualifying questions regarding budget, timeline, location, and specific requirements, route high-priority leads directly to your calendar, and tag or nurture lower-intent prospects automatically."
                    ],
                    [
                        'q' => 'Will AI send generic, robotic-sounding messages?',
                        'a' => "No. We fine-tune LLMs with custom system prompts, your brand's unique tone of voice, past customer conversational data, and dynamic variables so every message reads naturally and human."
                    ],
                    [
                        'q' => 'Does this integrate with our existing CRM and WhatsApp?',
                        'a' => "Yes. We connect with all major CRMs (HubSpot, Zoho, Salesforce, Pipedrive, Google Sheets) and official WhatsApp Business Cloud APIs to ensure two-way data synchronization with zero manual copy-pasting."
                    ],
                    [
                        'q' => 'How much does AI marketing automation cost?',
                        'a' => "Costs depend on the number of automated workflows, CRM integrations, AI agent logic, and self-hosted infrastructure requirements. We offer transparent starter and enterprise packages with fixed implementation scopes."
                    ],
                    [
                        'q' => 'Who owns the automation workflows and data?',
                        'a' => "You retain 100% ownership of all n8n workflows, prompt templates, API configurations, and customer database records. Everything runs on your dedicated cloud servers with no proprietary vendor lock-in."
                    ]
                ]
            ],
            'social-media' => [
                'name' => 'Social Media Marketing & Management (SMM)',
                'description' => 'Full-service social media management: content creation, short-form video production, community engagement, and paid social performance campaigns.',
                'service_type' => 'Social Media Marketing',
                'url' => 'https://digital4local.com/services/social-media.php',
                'breadcrumb_name' => 'Social Media',
                'offers' => [
                    [
                        'name' => 'Essential Social Media Retainer',
                        'price' => '14999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹14,999/mo',
                        'description' => '12 branded posts & reels monthly across Instagram & Facebook, community monitoring, and profile optimization.'
                    ],
                    [
                        'name' => 'Growth Omnichannel Retainer',
                        'price' => '29999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹29,999/mo',
                        'description' => '20 high-production reels & carousels, active comment engagement, paid ad campaign management, and weekly performance reporting.'
                    ],
                    [
                        'name' => 'Omnichannel Brand Scale Retainer',
                        'price' => '54999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Retainers from ₹54,999/mo',
                        'description' => 'Full multi-platform scale across Instagram, LinkedIn, YouTube Shorts & Facebook, dedicated creator shooting, and conversion funnel optimization.'
                    ]
                ],
                'faqs' => [
                    [
                        'q' => 'What is the full form of SMM?',
                        'a' => "SMM stands for Social Media Marketing. It refers to using social platforms such as Instagram, Facebook and LinkedIn to achieve business outcomes including awareness, engagement, leads and sales. The abbreviation is used interchangeably with the full term across the industry, including in agency packages and pricing."
                    ],
                    [
                        'q' => 'What is the difference between social media marketing and social media management?',
                        'a' => "Social media management is the day-to-day operational work — planning, scheduling, publishing and responding to comments and messages. Social media marketing is the broader discipline that includes management plus strategy, content direction, paid advertising and measurement. Management keeps accounts running; marketing decides what they are running for."
                    ],
                    [
                        'q' => 'Which social media platform is best for a local business?',
                        'a' => "For most local businesses in India, Instagram and Google Business Profile posts deliver the most, with WhatsApp handling the enquiries they generate. Facebook remains strong for community and older audiences. LinkedIn only matters if you sell to other businesses. Doing two platforms properly beats doing six badly."
                    ],
                    [
                        'q' => 'How much does social media marketing cost?',
                        'a' => "Cost depends on how many platforms are managed, how often content is published, how complex that content is, and whether community management is included. Paid advertising is quoted separately, since ad spend goes to the platform and management is a separate charge. Any quote given before understanding your platforms and goals is a guess."
                    ],
                    [
                        'q' => 'Should I buy followers to grow faster?',
                        'a' => "No. Purchased followers come from bots and inactive accounts, violate platform terms, and can lead to account restrictions. They also distort your engagement rate, which can reduce how often the platform shows your content to real people. A smaller genuine audience in your service area is worth more than a large fake one."
                    ],
                    [
                        'q' => 'How long does social media marketing take to work?',
                        'a' => "Meaningful audience growth typically takes three to six months of consistent posting. Individual posts or campaigns can generate engagement within days, but trust and recall — which is what social media actually builds for a local business — accumulate over a longer period rather than appearing at a single point."
                    ],
                    [
                        'q' => 'Does social media help my local search rankings?',
                        'a' => "Not directly as a ranking factor, but it supports local visibility in practical ways. Active profiles reinforce that your business is real and operating, social content can be repurposed as Google Business Profile posts that appear at the moment of search intent, and consistent profiles help AI assistants verify your business when recommending local options."
                    ],
                    [
                        'q' => 'Can I manage social media myself instead of hiring an agency?',
                        'a' => "Yes, up to a point. A single-location business with someone willing to spend a few consistent hours a week can manage one platform well. It becomes worth outsourcing when consistency slips, when you are running multiple platforms, or when the time spent is worth more applied to running the business itself."
                    ]
                ]
            ],
            'web-development' => [
                'name' => 'Custom Web Development & High-Speed Architecture',
                'description' => 'Custom website development built for speed, conversion, and search visibility: lightweight PHP architecture, sub-second load times, and mobile-first design.',
                'service_type' => 'Web Development',
                'url' => 'https://digital4local.com/services/web-development.php',
                'breadcrumb_name' => 'Web Development',
                'offers' => [
                    [
                        'name' => 'Launch Speed Build Package',
                        'price' => '29999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Setup from ₹29,999',
                        'description' => 'High-performance 5-page custom PHP website, 98+ Google PageSpeed score, mobile-first design, and core SEO configuration.'
                    ],
                    [
                        'name' => 'Custom Business Architecture',
                        'price' => '59999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Setup from ₹59,999',
                        'description' => '10–15 bespoke conversion pages, dynamic CMS, Schema.org entity graphs, lead capture automation, and Core Web Vitals SLA.'
                    ],
                    [
                        'name' => 'Advanced Enterprise Portal',
                        'price' => '99999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Setup from ₹99,999',
                        'description' => 'Complex custom web applications, custom API integrations, dynamic client portal, high-security infrastructure, and CRM pipeline hooks.'
                    ]
                ],
                'faqs' => [
                    [
                        'q' => 'What is web development?',
                        'a' => "Web development is the practice of building the code and infrastructure behind a website — the front-end a visitor interacts with, the back-end that powers it, and the systems that connect it to everything else. It turns a design into a working, secure, fast site rather than a static image of one."
                    ],
                    [
                        'q' => 'What is the difference between web design and web development?',
                        'a' => "Web design is how a site looks — layout, colour, typography and visual hierarchy. Web development is the code that makes it work — what loads, submits and functions correctly. Most projects need both delivered together, since a design with no working code behind it is not a website."
                    ],
                    [
                        'q' => 'How long does it take to build a website?',
                        'a' => "A marketing website with five to ten pages typically takes three to six weeks from approved design to launch. An ecommerce store runs six to ten weeks. A custom web application can take eight to sixteen weeks or more, depending on how complex the functionality is."
                    ],
                    [
                        'q' => 'How much does it cost to hire a website developer in India?',
                        'a' => "Cost depends on project scope — a simple business site, an ecommerce store and a custom web application all sit at very different price points, and complexity, design depth and content readiness all affect the total. A fixed-scope quote should always follow a proper scoping conversation, not precede one."
                    ],
                    [
                        'q' => 'Will a new website automatically rank on Google?',
                        'a' => "No agency can honestly promise that. What a well-built site does is remove the technical barriers that stop a page from ranking — crawlability, speed, clean structure, mobile usability. Ranking itself still depends on content and ongoing SEO work after launch, which is why the site and SEO strategy should be planned together."
                    ],
                    [
                        'q' => 'Can you redesign an existing website instead of building a new one?',
                        'a' => "Yes. A redesign starts with an audit of what is currently working — traffic, rankings, conversion points — so nothing valuable is lost in the rebuild. Old URLs are mapped to new ones and redirects are handled carefully, since a rushed redesign is one of the most common causes of a sudden traffic drop."
                    ],
                    [
                        'q' => 'Do you build ecommerce websites?',
                        'a' => "Yes. Product catalogues, cart and checkout, payment gateway integration and customer accounts are all part of the web development service, sized to the number of products and the complexity of the buying flow."
                    ],
                    [
                        'q' => 'What platform or technology do you build on?',
                        'a' => "The platform is chosen to match the project rather than defaulting to one stack — a five-page brochure site, a high-traffic ecommerce store and a custom web application each have different right answers, recommended during the discovery call rather than assumed in advance."
                    ]
                ]
            ],
            'app-development' => [
                'name' => 'Custom Mobile App Development (iOS & Android)',
                'description' => 'Custom mobile app development for iOS and Android: native and cross-platform apps built for performance, security, and seamless user experience.',
                'service_type' => 'Mobile App Development',
                'url' => 'https://digital4local.com/services/app-development.php',
                'breadcrumb_name' => 'App Development',
                'offers' => [
                    [
                        'name' => 'MVP Mobile App Package',
                        'price' => '49999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Setup from ₹49,999',
                        'description' => 'Cross-platform Flutter / React Native app for iOS & Android, core user authentication, API integration, and App Store submission.'
                    ],
                    [
                        'name' => 'Production Full Product App',
                        'price' => '99999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Setup from ₹99,999',
                        'description' => 'Complete mobile application suite, payment gateway integration, real-time push notifications, custom admin dashboard, and analytics.'
                    ],
                    [
                        'name' => 'Enterprise Mobile Suite',
                        'price' => '174999',
                        'priceCurrency' => 'INR',
                        'priceSpecification' => 'Setup from ₹1,74,999',
                        'description' => 'Complex on-demand marketplace or SaaS mobile ecosystem, real-time tracking, offline sync, advanced cloud microservices, and dedicated SLA.'
                    ]
                ],
                'faqs' => [
                    [
                        'q' => 'What is the difference between native and cross-platform app development?',
                        'a' => "Native development uses platform-specific languages (Swift for iOS, Kotlin for Android) to deliver maximum speed and direct hardware access. Cross-platform development uses frameworks like Flutter or React Native to compile a single codebase for both iOS and Android, reducing development cost and timeline by 40% to 50% while maintaining near-native performance."
                    ],
                    [
                        'q' => 'How long does it take to develop a mobile app?',
                        'a' => "A standard minimum viable product (MVP) or business utility app typically takes 6 to 10 weeks from discovery to app store submission. Complex enterprise applications, on-demand marketplaces, or apps with custom backend algorithms usually require 12 to 20 weeks of agile sprint development."
                    ],
                    [
                        'q' => 'How much does it cost to build a mobile app in India?',
                        'a' => "Cost depends on feature complexity, platform architecture (iOS, Android, or cross-platform), backend integrations, and custom UI/UX requirements. A standalone MVP starts at an accessible project tier, whereas complex real-time platforms require custom milestone-based scoping."
                    ],
                    [
                        'q' => 'Will my app work on both iOS and Android?',
                        'a' => "Yes. Using modern cross-platform technologies like Flutter and React Native, we build unified applications that deliver smooth 60fps performance and native look-and-feel across all modern iPhone, iPad, and Android devices."
                    ],
                    [
                        'q' => 'Who owns the source code and intellectual property (IP)?',
                        'a' => "You retain 100% ownership of all source code, database architecture, design assets, and intellectual property. Upon project completion and handover, all repositories and credentials are fully transferred to your accounts."
                    ],
                    [
                        'q' => 'How do you handle Apple App Store and Google Play approvals?',
                        'a' => "We manage the entire submission pipeline — including developer account setup, privacy policy compliance, metadata and screenshot preparation, App Store Review Guidelines auditing, and resolving any review inquiries until your app is live."
                    ],
                    [
                        'q' => 'Can you integrate payment gateways like Razorpay, Stripe, and UPI?',
                        'a' => "Yes. We integrate secure, PCI-compliant payment gateways including Razorpay, Stripe, Apple Pay, Google Pay, UPI deep-linking, and subscription in-app purchases (IAP) with automated invoice generation."
                    ],
                    [
                        'q' => 'What happens after the mobile app is launched?',
                        'a' => "We provide warranty support to fix any post-launch edge cases, plus optional monthly maintenance plans covering OS version upgrades, security patches, performance monitoring, and iterative feature development."
                    ]
                ]
            ]
        ];
    }

    /**
     * Core function to generate all JSON-LD schemas for the current request.
     */
    function d4l_generate_dynamic_schemas($context = []) {
        // Resolve Environment Variables
        $canonical_url = $context['canonical_url'] ?? $GLOBALS['canonical_url'] ?? 'https://digital4local.com/';
        $page_title = $context['page_title'] ?? $GLOBALS['page_title'] ?? 'Digital4Local | The AI Growth Engine';
        $page_description = $context['page_description'] ?? $GLOBALS['page_description'] ?? 'Digital4Local is an AI-driven digital marketing and SEO agency.';
        $og_image = $context['og_image'] ?? $GLOBALS['og_image'] ?? 'https://digital4local.com/assets/images/hero_dashboard_light_v2.png';
        if (strpos($og_image, 'http') !== 0) {
            $og_image = 'https://digital4local.com/' . ltrim($og_image, '/');
        }

        $req_uri = strtolower($_SERVER['REQUEST_URI'] ?? '/');
        $script_name = strtolower($_SERVER['SCRIPT_NAME'] ?? '');
        $parsed_path = trim(parse_url($canonical_url, PHP_URL_PATH) ?? '', '/');

        // Identify Context Type
        $is_homepage = ($canonical_url === 'https://digital4local.com/' || $canonical_url === 'https://digital4local.com' || (empty($parsed_path) && strpos($script_name, 'index.php') !== false && strpos($script_name, 'services') === false && strpos($script_name, 'industries') === false));
        
        $is_services_hub = (strpos($script_name, 'services.php') !== false || $parsed_path === 'services.php' || $parsed_path === 'services');
        $is_service_single = (strpos($script_name, '/services/') !== false || strpos($canonical_url, '/services/') !== false);
        
        $is_industries_hub = (strpos($script_name, 'industries/index.php') !== false || $parsed_path === 'industries' || $parsed_path === 'industries/');
        $is_industry_single = (isset($GLOBALS['industry_data']) || (strpos($script_name, '/industries/') !== false && !$is_industries_hub) || (strpos($canonical_url, '/industries/') !== false && !$is_industries_hub));
        
        $is_blog_hub = (strpos($script_name, 'blog.php') !== false || $parsed_path === 'blog.php' || $parsed_path === 'blog');
        $is_blog_single = (isset($GLOBALS['post']) || strpos($script_name, 'blog-single.php') !== false || (strpos($canonical_url, '/blog/') !== false && !$is_blog_hub));
        
        $is_pricing = (strpos($script_name, 'pricing.php') !== false || $parsed_path === 'pricing.php' || $parsed_path === 'pricing');
        $is_about = (strpos($script_name, 'about.php') !== false || $parsed_path === 'about.php' || $parsed_path === 'about');
        $is_contact = (strpos($script_name, 'contact.php') !== false || $parsed_path === 'contact.php' || $parsed_path === 'contact');
        $is_custom_page = (isset($GLOBALS['cfg']) && strpos($script_name, 'page.php') !== false) || (strpos($canonical_url, '/page/') !== false);

        // Registry references
        $services_reg = d4l_get_services_registry();
        $matched_service_key = null;
        if ($is_service_single) {
            foreach ($services_reg as $s_key => $s_data) {
                if (strpos($canonical_url, $s_key) !== false || strpos($script_name, $s_key) !== false) {
                    $matched_service_key = $s_key;
                    break;
                }
            }
        }

        $schemas = [];

        // =========================================================================
        // 1. GLOBAL WEBPAGE SCHEMA (All Pages)
        // =========================================================================
        $webpage_schema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            '@id' => rtrim($canonical_url, '/') . '/#webpage',
            'url' => $canonical_url,
            'name' => $page_title,
            'description' => $page_description,
            'isPartOf' => [
                '@type' => 'WebSite',
                '@id' => 'https://digital4local.com/#website',
                'name' => 'Digital4local',
                'url' => 'https://digital4local.com/'
            ],
            'inLanguage' => 'en-US'
        ];
        $schemas[] = $webpage_schema;

        // =========================================================================
        // 2. GLOBAL BREADCRUMB SCHEMA (All Pages with exact hierarchy)
        // =========================================================================
        $breadcrumbs_items = [];
        $breadcrumbs_items[] = [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => 'https://digital4local.com/'
        ];

        if ($is_services_hub) {
            $breadcrumbs_items[] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Services',
                'item' => 'https://digital4local.com/services.php'
            ];
        } elseif ($is_service_single && $matched_service_key) {
            $s_info = $services_reg[$matched_service_key];
            $breadcrumbs_items[] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Services',
                'item' => 'https://digital4local.com/services.php'
            ];
            $breadcrumbs_items[] = [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $s_info['breadcrumb_name'],
                'item' => $s_info['url']
            ];
        } elseif ($is_industries_hub) {
            $breadcrumbs_items[] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Industries',
                'item' => 'https://digital4local.com/industries/'
            ];
        } elseif ($is_industry_single) {
            $ind_title = $GLOBALS['industry_data']['title'] ?? 'Industry Blueprint';
            $breadcrumbs_items[] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Industries',
                'item' => 'https://digital4local.com/industries/'
            ];
            $breadcrumbs_items[] = [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $ind_title,
                'item' => $canonical_url
            ];
        } elseif ($is_blog_hub) {
            $breadcrumbs_items[] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Blog',
                'item' => 'https://digital4local.com/blog.php'
            ];
        } elseif ($is_blog_single) {
            $post_title = $GLOBALS['post']['title'] ?? 'Article';
            $breadcrumbs_items[] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Blog',
                'item' => 'https://digital4local.com/blog.php'
            ];
            $breadcrumbs_items[] = [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $post_title,
                'item' => $canonical_url
            ];
        } elseif ($is_pricing) {
            $breadcrumbs_items[] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Pricing',
                'item' => 'https://digital4local.com/pricing.php'
            ];
        } elseif ($is_about) {
            $breadcrumbs_items[] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'About Us',
                'item' => 'https://digital4local.com/about.php'
            ];
        } elseif ($is_contact) {
            $breadcrumbs_items[] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Contact',
                'item' => 'https://digital4local.com/contact.php'
            ];
        } elseif ($is_custom_page) {
            $custom_title = $GLOBALS['cfg']['title'] ?? 'Custom Solution';
            $breadcrumbs_items[] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => $custom_title,
                'item' => $canonical_url
            ];
        }

        $breadcrumb_schema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $breadcrumbs_items
        ];
        $schemas[] = $breadcrumb_schema;

        // =========================================================================
        // 3. SERVICE PAGES SCHEMA (Individual Services & Industry Services)
        // =========================================================================
        if ($is_service_single && $matched_service_key) {
            $s_info = $services_reg[$matched_service_key];
            
            $offers_list = [];
            foreach ($s_info['offers'] as $off) {
                $offers_list[] = [
                    '@type' => 'Offer',
                    'name' => $off['name'],
                    'price' => $off['price'],
                    'priceCurrency' => $off['priceCurrency'],
                    'description' => $off['description'] . ' (' . $off['priceSpecification'] . ')',
                    'url' => $s_info['url'],
                    'availability' => 'https://schema.org/InStock',
                    'seller' => [
                        '@type' => ['LocalBusiness', 'ProfessionalService', 'MarketingAgency'],
                        '@id' => 'https://digital4local.com/#localbusiness',
                        'name' => 'Digital4local',
                        'url' => 'https://digital4local.com/',
                        'image' => 'https://digital4local.com/assets/images/hero_dashboard_light_v2.png',
                        'telephone' => '+91-9131140530',
                        'priceRange' => '₹₹',
                        'address' => [
                            '@type' => 'PostalAddress',
                            'streetAddress' => 'H.N 90 Priyadarshani Co Operative Society Sant Aasharam Nagar Bagmugaliya',
                            'addressLocality' => 'Bhopal',
                            'addressRegion' => 'Madhya Pradesh',
                            'postalCode' => '462043',
                            'addressCountry' => 'IN'
                        ]
                    ]
                ];
            }

            $service_schema = [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                '@id' => $s_info['url'] . '#service',
                'name' => $s_info['name'],
                'description' => $s_info['description'],
                'serviceType' => $s_info['service_type'],
                'provider' => [
                    '@type' => ['LocalBusiness', 'ProfessionalService', 'MarketingAgency'],
                    '@id' => 'https://digital4local.com/#localbusiness',
                    'name' => 'Digital4local',
                    'url' => 'https://digital4local.com/',
                    'logo' => 'https://digital4local.com/assets/images/digital4local_logo.png',
                    'image' => 'https://digital4local.com/assets/images/hero_dashboard_light_v2.png',
                    'telephone' => '+91-9131140530',
                    'priceRange' => '₹₹',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => 'H.N 90 Priyadarshani Co Operative Society Sant Aasharam Nagar Bagmugaliya',
                        'addressLocality' => 'Bhopal',
                        'addressRegion' => 'Madhya Pradesh',
                        'postalCode' => '462043',
                        'addressCountry' => 'IN'
                    ]
                ],
                'areaServed' => ['India', 'United Kingdom', 'United States', 'Global'],
                'offers' => $offers_list
            ];
            $schemas[] = $service_schema;
        } elseif ($is_industry_single && isset($GLOBALS['industry_data'])) {
            $ind = $GLOBALS['industry_data'];
            $service_schema = [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                '@id' => $canonical_url . '#service',
                'name' => $ind['title'] ?? 'Industry Search & AI Visibility',
                'description' => $ind['direct_answer'] ?? $page_description,
                'serviceType' => $ind['service_type'] ?? 'Search Engine Optimization & Generative AI Visibility',
                'provider' => [
                    '@type' => ['LocalBusiness', 'ProfessionalService', 'MarketingAgency'],
                    '@id' => 'https://digital4local.com/#localbusiness',
                    'name' => 'Digital4local',
                    'url' => 'https://digital4local.com/',
                    'logo' => 'https://digital4local.com/assets/images/digital4local_logo.png',
                    'image' => 'https://digital4local.com/assets/images/hero_dashboard_light_v2.png',
                    'telephone' => '+91-9131140530',
                    'priceRange' => '₹₹',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => 'H.N 90 Priyadarshani Co Operative Society Sant Aasharam Nagar Bagmugaliya',
                        'addressLocality' => 'Bhopal',
                        'addressRegion' => 'Madhya Pradesh',
                        'postalCode' => '462043',
                        'addressCountry' => 'IN'
                    ]
                ],
                'areaServed' => $ind['area_served'] ?? ['India', 'United Kingdom', 'United States', 'Global']
            ];
            $schemas[] = $service_schema;
        }

        // =========================================================================
        // 4. BLOG / ARTICLE PAGES SCHEMA
        // =========================================================================
        if ($is_blog_single) {
            $post = $GLOBALS['post'] ?? [];
            $headline = !empty($post['title']) ? $post['title'] : $page_title;
            $author_name = !empty($post['author']) ? $post['author'] : 'Abhishek Raikwar';
            $author_title = !empty($post['author_title']) ? $post['author_title'] : 'Founder, Digital4Local';
            $date_pub = !empty($post['date']) ? date('c', strtotime($post['date'])) : date('c');
            $date_mod = !empty($post['date_modified']) ? date('c', strtotime($post['date_modified'])) : $date_pub;
            $article_img = !empty($post['featured_image']) ? $post['featured_image'] : $og_image;
            if (strpos($article_img, 'http') !== 0) {
                $article_img = 'https://digital4local.com/' . ltrim($article_img, '/');
            }

            $article_schema = [
                '@context' => 'https://schema.org',
                '@type' => 'BlogPosting',
                '@id' => $canonical_url . '#article',
                'isPartOf' => [
                    '@type' => 'WebPage',
                    '@id' => rtrim($canonical_url, '/') . '/#webpage'
                ],
                'headline' => $headline,
                'description' => $post['excerpt'] ?? $page_description,
                'image' => $article_img,
                'datePublished' => $date_pub,
                'dateModified' => $date_mod,
                'mainEntityOfPage' => [
                    '@type' => 'WebPage',
                    '@id' => $canonical_url
                ],
                'author' => [
                    '@type' => 'Person',
                    'name' => $author_name,
                    'jobTitle' => $author_title,
                    'url' => 'https://digital4local.com/about.php',
                    'worksFor' => [
                        '@type' => 'Organization',
                        'name' => 'Digital4local',
                        'url' => 'https://digital4local.com/'
                    ]
                ],
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => 'Digital4local',
                    'url' => 'https://digital4local.com/',
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => 'https://digital4local.com/assets/images/digital4local_logo.png'
                    ]
                ]
            ];
            $schemas[] = $article_schema;
        } elseif ($is_industry_single && isset($GLOBALS['industry_data'])) {
            $ind = $GLOBALS['industry_data'];
            $article_schema = [
                '@context' => 'https://schema.org',
                '@type' => 'Article',
                '@id' => $canonical_url . '#article',
                'headline' => strip_tags($ind['hero_h1'] ?? $ind['title'] ?? $page_title),
                'description' => $ind['meta_description'] ?? $page_description,
                'author' => [
                    '@type' => 'Person',
                    'name' => 'Abhishek Raikwar',
                    'jobTitle' => 'Founder, Digital4Local',
                    'url' => 'https://digital4local.com/about.php'
                ],
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => 'Digital4local',
                    'url' => 'https://digital4local.com/',
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => 'https://digital4local.com/assets/images/digital4local_logo.png'
                    ]
                ],
                'datePublished' => $ind['date_published'] ?? '2025-01-15',
                'dateModified' => $ind['date_modified'] ?? date('Y-m-d'),
                'mainEntityOfPage' => $canonical_url
            ];
            $schemas[] = $article_schema;
        }

        // =========================================================================
        // 5. GLOBAL FAQ SCHEMA (Any page with FAQs)
        // =========================================================================
        $faqs_raw = [];

        // Check if FAQs passed explicitly
        if (!empty($context['faqs']) && is_array($context['faqs'])) {
            $faqs_raw = $context['faqs'];
        } elseif (!empty($GLOBALS['faq_schema_items']) && is_array($GLOBALS['faq_schema_items'])) {
            // Already formatted items
            $faq_schema = [
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                '@id' => rtrim($canonical_url, '/') . '/#faq',
                'mainEntity' => $GLOBALS['faq_schema_items']
            ];
            $schemas[] = $faq_schema;
        } elseif ($is_service_single && $matched_service_key && !empty($services_reg[$matched_service_key]['faqs'])) {
            $faqs_raw = $services_reg[$matched_service_key]['faqs'];
        } elseif ($is_industry_single && !empty($GLOBALS['industry_data']['faqs'])) {
            $faqs_raw = $GLOBALS['industry_data']['faqs'];
        } elseif ($is_blog_single && !empty($GLOBALS['post']['faqs'])) {
            $faqs_raw = $GLOBALS['post']['faqs'];
        } elseif ($is_custom_page && !empty($GLOBALS['cfg']['faqs'])) {
            $faqs_raw = $GLOBALS['cfg']['faqs'];
        } elseif ($is_pricing) {
            $faqs_raw = [
                [
                    'q' => 'What is the difference between Setup Fee and Monthly Retainer?',
                    'a' => 'The One-Time Setup Fee covers complete custom web or mobile development, technical audit, and initial entity graph configuration. The Monthly Retainer covers active link acquisition, 5x5 geo-grid monitoring, schema updates, and account management.'
                ],
                [
                    'q' => 'Are there long-term contracts?',
                    'a' => 'No! All retainers operate month-to-month. You can scale, pause, or upgrade at any billing cycle.'
                ]
            ];
        } elseif ($is_contact) {
            $faqs_raw = [
                [
                    'q' => 'How quickly will a growth strategist respond?',
                    'a' => 'Our automated n8n triage system flags incoming queries instantly, and a senior strategist will respond via email or phone within 2 business hours.'
                ]
            ];
        } elseif ($is_homepage && !empty($GLOBALS['index_cfg']['faqs'])) {
            $faqs_raw = $GLOBALS['index_cfg']['faqs'];
        }

        if (!empty($faqs_raw) && is_array($faqs_raw)) {
            $faq_entities = [];
            foreach ($faqs_raw as $fq) {
                $q_text = $fq['q'] ?? $fq['name'] ?? $fq['question'] ?? '';
                $a_text = $fq['a'] ?? $fq['text'] ?? $fq['answer'] ?? '';
                if (!empty($q_text) && !empty($a_text)) {
                    $faq_entities[] = [
                        '@type' => 'Question',
                        'name' => trim(strip_tags($q_text)),
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => trim(strip_tags($a_text))
                        ]
                    ];
                }
            }

            if (!empty($faq_entities)) {
                $faq_schema = [
                    '@context' => 'https://schema.org',
                    '@type' => 'FAQPage',
                    '@id' => rtrim($canonical_url, '/') . '/#faq',
                    'mainEntity' => $faq_entities
                ];
                $schemas[] = $faq_schema;
            }
        }

        return $schemas;
    }

    /**
     * Helper to render all schema tags as formatted JSON-LD inside HTML <head>.
     */
    function d4l_render_dynamic_schema_head($context = []) {
        $schemas = d4l_generate_dynamic_schemas($context);
        if (empty($schemas)) return;

        echo "\n  <!-- ================================================================= -->\n";
        echo "  <!-- Dynamic JSON-LD Structured Data (Schema.org) -->\n";
        echo "  <!-- ================================================================= -->\n";

        foreach ($schemas as $schema_obj) {
            $type = $schema_obj['@type'] ?? 'StructuredData';
            echo "  <script type=\"application/ld+json\">\n";
            echo json_encode($schema_obj, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            echo "\n  </script>\n";
        }
    }
}
