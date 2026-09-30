<?php
/**
 * Digital4Local - Bhopal Sales & Portfolio Conversion Landing Page
 * Route: /portfolio or /bhopal
 * 
 * Engineered for maximum conversion rate, trustworthy craft, and rapid mobile lead generation.
 */

require_once __DIR__ . '/includes/site-config.php';
$p_cfg = require __DIR__ . '/config/portfolio-config.php';

$page_title = "Digital4Local | Local SEO, Google Maps & Social Media Agency in Bhopal";
$page_description = "Bhopal's premier Local SEO & Google Business Profile marketing agency. We rank local businesses #1 on Google Maps, create viral Instagram reels, and optimize for AI search.";
$page_keywords = "Local SEO Bhopal, Google Maps Optimization Bhopal, Social Media Marketing Bhopal, Google Business Profile Bhopal, Digital Marketing Agency Bhopal, SEO Agency Bhopal";
$canonical_url = "https://digital4local.com/portfolio";
$og_image = "https://digital4local.com/assets/images/hero_dashboard_light_v2.png";
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <?php include_once __DIR__ . '/includes/seo.php'; ?>

  <!-- Portfolio Specific JSON-LD Structured Data (LocalBusiness, Services, FAQPage) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "additionalType": "https://schema.org/MarketingAgency",
    "@id": "https://digital4local.com/#localbusiness",
    "name": "<?php echo htmlspecialchars($p_cfg['business_name']); ?>",
    "url": "https://digital4local.com/portfolio",
    "telephone": "<?php echo htmlspecialchars($p_cfg['whatsapp_number']); ?>",
    "priceRange": "₹₹",
    "currenciesAccepted": "INR, USD, GBP",
    "paymentAccepted": "Cash, Credit Card, Bank Transfer, UPI",
    "description": "<?php echo htmlspecialchars($page_description); ?>",
    "image": "https://digital4local.com/assets/images/hero_dashboard_light_v2.png",
    "logo": "https://digital4local.com/assets/images/digital4local_logo.png",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "H.N 90 Priyadarshani Co Operative Society Sant Aasharam Nagar Bagmugaliya",
      "addressLocality": "Bhopal",
      "addressRegion": "Madhya Pradesh",
      "postalCode": "462043",
      "addressCountry": "IN"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": <?php echo $p_cfg['geo']['lat']; ?>,
      "longitude": <?php echo $p_cfg['geo']['lng']; ?>
    },
    "hasMap": "https://maps.google.com/maps?cid=2147305461476048816",
    "areaServed": [
      {
        "@type": "City",
        "name": "Bhopal, Madhya Pradesh"
      },
      {
        "@type": "City",
        "name": "Indore, Madhya Pradesh"
      },
      {
        "@type": "Country",
        "name": "India"
      },
      {
        "@type": "Country",
        "name": "United Kingdom"
      }
    ],
    "sameAs": [
      "<?php echo htmlspecialchars($p_cfg['gbp_url']); ?>",
      "<?php echo htmlspecialchars($p_cfg['instagram_url']); ?>",
      "https://in.linkedin.com/company/digital4local"
    ]
  }
  </script>

  <!-- FAQPage Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      <?php 
      $faq_json_arr = [];
      foreach ($p_cfg['faqs'] as $fq) {
          $faq_json_arr[] = json_encode([
              '@type' => 'Question',
              'name' => $fq['q'],
              'acceptedAnswer' => [
                  '@type' => 'Answer',
                  'text' => $fq['a']
              ]
          ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
      }
      echo implode(",\n      ", $faq_json_arr);
      ?>
    ]
  }
  </script>

  <style>
    /* Landing Page Specific Micro-Interactions */
    html {
      scroll-padding-top: 80px;
    }
    .billing-btn.active {
      background: linear-gradient(135deg, #00F0FF 0%, #00A8B5 100%) !important;
      color: #0A0A0F !important;
      box-shadow: 0 4px 15px -2px rgba(0, 240, 255, 0.4) !important;
    }
    .counter-running {
      font-feature-settings: "tnum";
      font-variant-numeric: tabular-nums;
    }
  </style>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] font-sans antialiased selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <!-- Floating Elements (Sticky Header & Floating WhatsApp) -->
  <?php include __DIR__ . '/includes/portfolio/floating-elements.php'; ?>

  <!-- MAIN LANDING PAGE CONTENT (Exact 18 Sections Order) -->
  <main class="relative z-10">

    <!-- 1. Hero Section -->
    <?php include __DIR__ . '/includes/portfolio/hero.php'; ?>

    <!-- 2. Problem Section -->
    <?php include __DIR__ . '/includes/portfolio/problem.php'; ?>

    <!-- 3. Services Section -->
    <?php include __DIR__ . '/includes/portfolio/services.php'; ?>

    <!-- 4. The D4L Local Growth System™ -->
    <?php include __DIR__ . '/includes/portfolio/system.php'; ?>

    <!-- 5. Case Study / Results -->
    <?php include __DIR__ . '/includes/portfolio/case-studies.php'; ?>

    <!-- 6. Google Reviews Section (100% Real Transcripts) -->
    <?php include __DIR__ . '/includes/portfolio/reviews.php'; ?>

    <!-- 7. Google Business Profile / Find Us -->
    <?php include __DIR__ . '/includes/portfolio/gbp-find-us.php'; ?>

    <!-- 8. Instagram Section -->
    <?php include __DIR__ . '/includes/portfolio/instagram.php'; ?>

    <!-- 9. Typical Agency vs Digital4Local -->
    <?php include __DIR__ . '/includes/portfolio/comparison.php'; ?>

    <!-- 10. Industry Playbooks -->
    <?php include __DIR__ . '/includes/portfolio/industries.php'; ?>

    <!-- 11. Pricing Section -->
    <?php include __DIR__ . '/includes/portfolio/pricing.php'; ?>

    <!-- 12. Add-ons Menu -->
    <?php include __DIR__ . '/includes/portfolio/addons.php'; ?>

    <!-- 13. ROI Calculator -->
    <?php include __DIR__ . '/includes/portfolio/calculator.php'; ?>

    <!-- 14. What You Get Every Month (Dashboard Preview Mock) -->
    <?php include __DIR__ . '/includes/portfolio/monthly-deliverables.php'; ?>

    <!-- 15. Our Promise / 90-Day Guarantee -->
    <?php include __DIR__ . '/includes/portfolio/promise.php'; ?>

    <!-- 16. FAQ Accordion -->
    <?php include __DIR__ . '/includes/portfolio/faq.php'; ?>

    <!-- 17. Final CTA + Free Audit Form -->
    <?php include __DIR__ . '/includes/portfolio/contact.php'; ?>

  </main>

  <!-- 18. Footer -->
  <?php include __DIR__ . '/includes/portfolio/footer.php'; ?>

  <!-- Scripts: AOS, Lucide, Interactive Landing Page Controller -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // 1. Initialize AOS Animation Library
      if (typeof AOS !== 'undefined') {
        AOS.init({
          once: true,
          duration: 600,
          easing: 'ease-out-cubic',
          offset: 40
        });
      }

      // 2. Initialize Lucide Icons
      if (typeof lucide !== 'undefined') {
        lucide.createIcons();
      }

      const WHATSAPP_PHONE = '<?php echo $p_cfg['whatsapp_number_clean']; ?>';

      // =========================================================================
      // 3. Dynamic 3-Way Pricing Toggle (Monthly / 6 Months / Annual)
      // =========================================================================
      const billingButtons = document.querySelectorAll('.billing-btn');
      const priceValElements = document.querySelectorAll('.price-val');
      const billingNoteElements = document.querySelectorAll('.billing-note');
      const planCtaButtons = document.querySelectorAll('.plan-cta-btn');

      billingButtons.forEach(btn => {
        btn.addEventListener('click', function() {
          billingButtons.forEach(b => b.classList.remove('active'));
          this.classList.add('active');

          const billingType = this.getAttribute('data-billing'); // monthly, six_month, annual

          // Update prices with smooth micro-animation
          priceValElements.forEach(priceEl => {
            priceEl.style.opacity = '0';
            setTimeout(() => {
              if (billingType === 'monthly') {
                priceEl.textContent = priceEl.getAttribute('data-monthly');
              } else if (billingType === 'six_month') {
                priceEl.textContent = priceEl.getAttribute('data-six');
              } else if (billingType === 'annual') {
                priceEl.textContent = priceEl.getAttribute('data-annual');
              }
              priceEl.style.opacity = '1';
            }, 150);
          });

          // Update billing notes
          billingNoteElements.forEach(noteEl => {
            if (billingType === 'monthly') {
              noteEl.textContent = noteEl.getAttribute('data-monthly');
            } else if (billingType === 'six_month') {
              noteEl.textContent = noteEl.getAttribute('data-six');
            } else if (billingType === 'annual') {
              noteEl.textContent = noteEl.getAttribute('data-annual');
            }
          });

          // Update WhatsApp CTA prefilled links for each plan card
          planCtaButtons.forEach(ctaBtn => {
            const planName = ctaBtn.getAttribute('data-plan-name');
            let billingLabel = 'Monthly billing';
            if (billingType === 'six_month') billingLabel = '6 Months billing - Save 10% + Free Setup';
            if (billingType === 'annual') billingLabel = 'Annual billing - 2 Months Free';

            const msg = `Hi Digital4Local, I'm interested in the ${planName} plan (${billingLabel}).`;
            ctaBtn.href = `https://wa.me/${WHATSAPP_PHONE}?text=${encodeURIComponent(msg)}`;
          });
        });
      });

      // =========================================================================
      // 4. Expandable Comparison Matrix Toggle
      // =========================================================================
      const toggleMatrixBtn = document.getElementById('toggle-comparison-matrix-btn');
      const matrixContent = document.getElementById('comparison-matrix-content');
      const matrixChevron = document.getElementById('matrix-chevron');

      if (toggleMatrixBtn && matrixContent && matrixChevron) {
        toggleMatrixBtn.addEventListener('click', function() {
          const isHidden = matrixContent.classList.contains('hidden');
          if (isHidden) {
            matrixContent.classList.remove('hidden');
            matrixChevron.style.transform = 'rotate(180deg)';
          } else {
            matrixContent.classList.add('hidden');
            matrixChevron.style.transform = 'rotate(0deg)';
          }
        });
      }

      // =========================================================================
      // 5. Interactive ROI Calculator Logic
      // =========================================================================
      const custValInput = document.getElementById('roi-customer-val');
      const planSelect = document.getElementById('roi-plan-select');
      const custNeededEl = document.getElementById('roi-customers-needed');

      function calculateROI() {
        if (!custValInput || !planSelect || !custNeededEl) return;

        let custVal = parseFloat(custValInput.value) || 0;
        let planCost = parseFloat(planSelect.value) || 24999;

        if (custVal <= 0) {
          custVal = 1;
        }

        const needed = Math.ceil(planCost / custVal);
        custNeededEl.textContent = needed.toLocaleString('en-IN');
      }

      if (custValInput && planSelect) {
        custValInput.addEventListener('input', calculateROI);
        planSelect.addEventListener('change', calculateROI);
        calculateROI(); // Initial calculation
      }

      // =========================================================================
      // 6. FAQ Accordion Click Handler
      // =========================================================================
      const faqItems = document.querySelectorAll('.faq-item');
      faqItems.forEach(item => {
        const questionBtn = item.querySelector('.faq-question-btn');
        if (questionBtn) {
          questionBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const isActive = item.classList.contains('active');

            // Close other FAQs
            faqItems.forEach(otherItem => {
              if (otherItem !== item) {
                otherItem.classList.remove('active');
                const btn = otherItem.querySelector('.faq-question-btn');
                if (btn) btn.setAttribute('aria-expanded', 'false');
              }
            });

            // Toggle current
            if (isActive) {
              item.classList.remove('active');
              questionBtn.setAttribute('aria-expanded', 'false');
            } else {
              item.classList.add('active');
              questionBtn.setAttribute('aria-expanded', 'true');
            }
          });
        }
      });

      // =========================================================================
      // 7. Free Audit Form Validation & Instant WhatsApp Submission
      // =========================================================================
      const leadForm = document.getElementById('audit-lead-form');
      const formAlert = document.getElementById('form-alert');
      const submitBtn = document.getElementById('form-submit-btn');

      if (leadForm) {
        leadForm.addEventListener('submit', function(e) {
          e.preventDefault();

          if (formAlert) {
            formAlert.classList.add('hidden');
            formAlert.textContent = '';
          }

          const name = (document.getElementById('form-name').value || '').trim();
          const bizName = (document.getElementById('form-biz-name').value || '').trim();
          const phone = (document.getElementById('form-phone').value || '').trim();
          const category = (document.getElementById('form-category').value || '').trim();
          const mapsLink = (document.getElementById('form-link').value || '').trim();
          const message = (document.getElementById('form-message').value || '').trim();

          // Basic validation
          if (!name || !bizName || !phone || !category) {
            if (formAlert) {
              formAlert.classList.remove('hidden');
              formAlert.textContent = 'Please fill in all required fields (Name, Business Name, Phone, and Category).';
            }
            return;
          }

          // Format WhatsApp message
          let waMessage = `🚀 *New Free Local Visibility Audit Request*\n\n`;
          waMessage += `• *Name:* ${name}\n`;
          waMessage += `• *Business Name:* ${bizName}\n`;
          waMessage += `• *Phone / WhatsApp:* ${phone}\n`;
          waMessage += `• *Industry Category:* ${category}\n`;
          if (mapsLink) {
            waMessage += `• *Maps / Website:* ${mapsLink}\n`;
          }
          if (message) {
            waMessage += `• *Goal / Challenge:* ${message}\n`;
          }
          waMessage += `\n_Sent via Digital4Local Bhopal Landing Page_`;

          const waUrl = `https://wa.me/${WHATSAPP_PHONE}?text=${encodeURIComponent(waMessage)}`;

          // Button feedback state
          if (submitBtn) {
            submitBtn.innerHTML = '<i data-lucide="check" class="w-4 h-4"></i><span>Redirecting to WhatsApp...</span>';
            if (typeof lucide !== 'undefined') lucide.createIcons();
          }

          // Open WhatsApp in new tab
          window.open(waUrl, '_blank');

          // Reset Form after delay
          setTimeout(() => {
            leadForm.reset();
            if (submitBtn) {
              submitBtn.innerHTML = '<i data-lucide="send" class="w-4 h-4"></i><span>Get My Free Audit on WhatsApp Now</span>';
              if (typeof lucide !== 'undefined') lucide.createIcons();
            }
          }, 2000);
        });
      }

    });
  </script>
</body>
</html>
