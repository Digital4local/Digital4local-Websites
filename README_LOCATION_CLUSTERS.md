# Location Clusters Architecture & Deployment Guide

This document explains the SEO-first location clustering architecture for **Digital4Local**, how to launch new city clusters (such as Indore, Jabalpur, Gwalior), and the pre-flight checklist for Schema validation and Core Web Vitals.

---

## 1. Architecture Overview

```
Digital4Local Location Engine
├── /config/
│   ├── business.ts         <-- Central TypeScript NAP & cluster definitions
│   └── business.php        <-- PHP mirror loader for runtime consistency
├── /data/
│   └── bhopal/             <-- JSON data files per location page
│       ├── seo-agency-bhopal.json (HUB)
│       ├── local-seo-bhopal.json
│       ├── google-business-profile-optimization-bhopal.json
│       ├── ai-seo-bhopal.json
│       ├── digital-marketing-agency-bhopal.json
│       └── ai-agency-bhopal.json
├── /includes/location/
│   ├── LocationServicePage.php  <-- Master Universal Template Component
│   ├── ClusterNav.php           <-- Horizontal sticky sub-nav bar
│   ├── Timeline.php             <-- Vertical numbered process timeline
│   ├── ComparisonTable.php      <-- Responsive comparison table (stacked mobile cards)
│   ├── HonestPromiseBox.php     <-- E-E-A-T "What we will not promise" callout
│   ├── FaqAccordion.php         <-- Native <details>/<summary> accordion
│   ├── RelatedServices.php      <-- 3-card related recommendations & hub backlink
│   ├── RecentInsights.php       <-- Filtered guides with dates
│   ├── AuthorBox.php            <-- Abhishek Raikwar author card
│   ├── StickyContactBar.php     <-- Mobile fixed Call & WhatsApp bar
│   ├── SchemaJsonLd.php         <-- Rich Schema.org graph generator
│   └── VerifyChip.php           <-- [[VERIFY ...]] tag parser & image placeholders
└── /content/bhopal/
    └── VERIFY.md                <-- Unresolved verification log
```

---

## 2. How to Add a New City Cluster (e.g. Indore, Jabalpur)

Adding a new city requires **ZERO code changes** to components. Simply follow these 4 steps:

### Step 1: Register City in `/config/business.ts` & `/config/business.php`
Add the new city cluster configuration under `clusters`:
```php
'indore' => [
    'city' => 'Indore',
    'state' => 'Madhya Pradesh',
    'country' => 'India',
    'hubSlug' => 'seo-agency-indore',
    'pages' => [ ... ]
]
```

### Step 2: Create Data Files in `/data/{city}/`
Create JSON files for the city (e.g. `/data/indore/seo-agency-indore.json`).
Each JSON file defines:
- `slug`, `city`, `state`, `isHub`, `schemaType`
- `h1`, `metaTitle`, `metaDescription`, `primaryKeyword`
- `heroDirectAnswer` (40–60 words direct answer)
- `sections` (content blocks, timeline steps, comparison tables, honest promises, pricing)
- `faqs`, `relatedSlugs`, `recentInsightsTags`, `cta`

### Step 3: Create Entrypoint Folders
Create the directory folder and `index.php`:
```php
<?php
require_once __DIR__ . '/../includes/location/LocationServicePage.php';
$json_file = __DIR__ . '/../data/indore/seo-agency-indore.json';
$page_data = json_decode(file_get_contents($json_file), true);
d4l_render_location_page($page_data);
```

### Step 4: Update `sitemap.php`
Add the new clean trailing-slash URLs into `sitemap.php`.

---

## 3. Pre-Flight Validation Checklist

### A. Google Rich Results & Schema Validation
Test each URL using the [Google Rich Results Test](https://search.google.com/test/rich-results) and [Schema.org Validator](https://validator.schema.org/):
- [ ] **ProfessionalService Schema**: Checks `@id: https://digital4local.com/#organization`, name, address, telephone, priceRange.
- [ ] **Person Schema**: Confirms Abhishek Raikwar author entity and LinkedIn URL.
- [ ] **Service Schema**: Present on spoke pages 2–6.
- [ ] **BreadcrumbList Schema**: Confirms exact trail (`Home › Bhopal › [Page]`).
- [ ] **FAQPage Schema**: Verifies every `<details>` Q&A is indexed in the JSON-LD graph.

### B. Core Web Vitals & Performance (Lighthouse)
Run Chrome DevTools Lighthouse audit on mobile & desktop:
- [ ] **LCP (Largest Contentful Paint) < 2.5s**: Hero heading and text render instantly with system/Google font preload.
- [ ] **CLS (Cumulative Layout Shift) < 0.1**: Images and widgets have defined dimensions; zero layout jumps during load.
- [ ] **INP (Interaction to Next Paint) < 200ms**: Pure native `<details>` FAQs with zero blocking JS frameworks.
- [ ] **Accessibility Score >= 95**: WCAG 2.1 AA color contrast, explicit `aria-current="page"` on cluster sub-nav, semantic heading hierarchy (`h1` -> `h2` -> `h3`).

### C. Mobile Quality Control
- [ ] Test at **360px viewport width** (standard small Android device).
- [ ] Ensure **zero horizontal scrollbar**.
- [ ] Comparison tables stack into clean cards on mobile.
- [ ] Sticky bottom Call & WhatsApp bar floats cleanly above content.

### D. E-E-A-T & Verification Check
- [ ] Review `/content/bhopal/VERIFY.md` to confirm all temporary chips have been verified with real business data before production launch.
