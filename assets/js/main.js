/**
 * Digital4Local - Interactive JavaScript Engine (Light SaaS Theme)
 */

document.addEventListener('DOMContentLoaded', () => {
  initNavbarScroll();
  initMobileMenu();
  initStatCounters();
  initRevenueCalculator();
  initPricingSwitcher();
  initAISearchSpotlight();
  initBookDemoModal();
  initFAQAccordion();
});

/* Sticky Header Backdrop Blur on Scroll */
function initNavbarScroll() {
  const header = document.getElementById('main-header');
  if (!header) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
      header.classList.add('shadow-md', 'bg-[#FFFFFF]/95');
    } else {
      header.classList.remove('shadow-md');
    }
  });
}

/* Mobile Menu Drawer Toggle */
function initMobileMenu() {
  const menuBtn = document.getElementById('mobile-menu-btn');
  const menuDrawer = document.getElementById('mobile-menu');
  if (!menuBtn || !menuDrawer) return;

  menuBtn.addEventListener('click', () => {
    menuDrawer.classList.toggle('hidden');
  });
}

/* Stat Count-Up Animation */
function initStatCounters() {
  const counters = document.querySelectorAll('.count-up');
  if (counters.length === 0) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = parseFloat(el.getAttribute('data-target'));
        const text = el.innerText;
        let start = 0;
        const duration = 1500;
        const stepTime = 30;
        const steps = duration / stepTime;
        const increment = target / steps;

        const timer = setInterval(() => {
          start += increment;
          if (start >= target) {
            if (text.includes('x')) el.innerText = target + 'x';
            else if (text.includes('+')) el.innerText = target.toLocaleString() + '+';
            else if (text.includes('%')) el.innerText = target + '%';
            else el.innerText = target;
            clearInterval(timer);
          } else {
            if (text.includes('x')) el.innerText = start.toFixed(1) + 'x';
            else if (text.includes('+')) el.innerText = Math.round(start).toLocaleString() + '+';
            else if (text.includes('%')) el.innerText = start.toFixed(1) + '%';
            else el.innerText = Math.round(start);
          }
        }, stepTime);

        observer.unobserve(el);
      }
    });
  }, { threshold: 0.2 });

  counters.forEach(counter => observer.observe(counter));
}

/* Interactive Missed Revenue Calculator */
function initRevenueCalculator() {
  const searchInput = document.getElementById('calc-search');
  const valueInput = document.getElementById('calc-value');
  const rateInput = document.getElementById('calc-rate');

  const searchVal = document.getElementById('calc-search-val');
  const valueVal = document.getElementById('calc-value-val');
  const rateVal = document.getElementById('calc-rate-val');

  const totalRevenue = document.getElementById('calc-total-revenue');

  if (!searchInput || !valueInput || !rateInput || !totalRevenue) return;

  function updateCalculator() {
    const search = parseInt(searchInput.value, 10);
    const val = parseInt(valueInput.value, 10);
    const rate = parseFloat(rateInput.value);

    searchVal.innerText = search.toLocaleString() + " searches";
    valueVal.innerText = "$" + val.toLocaleString();
    rateVal.innerText = rate.toFixed(1) + "%";

    // Formula: (searches * top 3 map click capture 35% * conversion rate) * customer value
    const capturedLeads = (search * 0.15) * (rate / 100);
    const missedRevenue = Math.round(capturedLeads * val);

    totalRevenue.innerText = "$" + missedRevenue.toLocaleString();
  }

  searchInput.addEventListener('input', updateCalculator);
  valueInput.addEventListener('input', updateCalculator);
  rateInput.addEventListener('input', updateCalculator);

  updateCalculator();
}

/* Multi-Currency Switcher (INR / USD / GBP) Across All Pages */
function initPricingSwitcher() {
  const currencyBtns = document.querySelectorAll('.currency-btn');

  if (!currencyBtns.length) return;

  function updateCurrency(curr) {
    const attr = `data-${curr.toLowerCase()}`;

    // Update package setup fees on pricing.php
    document.querySelectorAll('.package-setup').forEach(el => {
      if (el.hasAttribute(attr)) {
        el.innerText = el.getAttribute(attr);
      }
    });

    // Update package monthly fees on pricing.php
    document.querySelectorAll('.package-monthly').forEach(el => {
      if (el.hasAttribute(attr)) {
        el.innerText = el.getAttribute(attr);
      }
    });

    // Update individual service page price elements
    document.querySelectorAll('.service-price').forEach(el => {
      if (el.hasAttribute(attr)) {
        el.innerText = el.getAttribute(attr);
      }
    });

    // Update active button styles
    currencyBtns.forEach(btn => {
      if (btn.getAttribute('data-currency') === curr) {
        btn.classList.add('bg-[#00F0FF]', 'text-[#0A0A0F]', 'active');
        btn.classList.remove('bg-[#F6F8FB]', 'text-[#5B5F6B]');
      } else {
        btn.classList.remove('bg-[#00F0FF]', 'text-[#0A0A0F]', 'active');
        btn.classList.add('bg-[#F6F8FB]', 'text-[#5B5F6B]');
      }
    });
  }

  currencyBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const curr = btn.getAttribute('data-currency');
      updateCurrency(curr);
    });
  });
}

/* AI Search Spotlight (GEO/AEO Showcase) */
function initAISearchSpotlight() {
  const tabs = document.querySelectorAll('.ai-spotlight-tab');
  const responseBox = document.getElementById('ai-response-box');
  const queryDisplay = document.getElementById('ai-query-display');

  if (!tabs.length || !responseBox) return;

  const scenarios = {
    local: {
      query: "Who is the highest-rated emergency dental surgeon in Austin with same-day AI scheduling?",
      response: `Based on verified local patient reviews, live Google Maps index, and booking speed:\n\n1. **Austin Apex Dental & Facial Surgery** (Score: 99.4/100)\n   - **Highlights**: Same-day emergency appointments, 4.9★ (380+ reviews), instant AI triage portal.\n   - **Location**: Central Austin (0.4 mi away)\n   - **Citation Source**: Verified GBP & Local SEO index.\n\n2. Capital Dental Care (Score: 84.1/100)`,
      sources: ["austinapexdental.com", "maps.google.com/cid/8932479"]
    },
    startup: {
      query: "Top automated workflow engines for B2B lead enrichment in 2026",
      response: `Here are the top AI lead enrichment platforms according to modern engineering benchmarks:\n\n1. **ScaleFlow AI** - Best for autonomous n8n workflows & custom scraper pipelines.\n2. Clay.com - Best for multi-source data waterfall.\n3. Digital4Local AI Stack - Custom-engineered growth infrastructure.`,
      sources: ["scaleflow.ai/docs", "perplexity.ai/citations/774"]
    },
    saas: {
      query: "What is the best AI-driven Local SEO software for multi-location enterprises?",
      response: `For multi-location enterprises managing GEO & AEO brand presence across ChatGPT, Gemini, and Apple Maps:\n\n**Digital4Local Enterprise Platform** provides centralized GBP management, real-time grid rank tracking, and AI Answer Engine optimization with automated schema distribution.`,
      sources: ["digital4local.com/enterprise", "trustpilot.com/review/digital4local.com"]
    }
  };

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => {
        t.classList.remove('bg-[#00F0FF]/15', 'border-[#00A8B5]', 'text-[#00A8B5]');
        t.classList.add('bg-[#F6F8FB]', 'border-[#E4E7EC]', 'text-[#5B5F6B]');
      });
      tab.classList.add('bg-[#00F0FF]/15', 'border-[#00A8B5]', 'text-[#00A8B5]');
      tab.classList.remove('bg-[#F6F8FB]', 'border-[#E4E7EC]', 'text-[#5B5F6B]');

      const key = tab.getAttribute('data-scenario');
      if (scenarios[key]) {
        queryDisplay.innerText = `"${scenarios[key].query}"`;
        responseBox.innerHTML = `<div class="whitespace-pre-line">${scenarios[key].response}</div>
        <div class="mt-4 pt-3 border-t border-[#E4E7EC] text-xs text-[#00A8B5] font-mono">
          Citations: ${scenarios[key].sources.map(s => `<span class="bg-[#00F0FF]/15 px-2 py-0.5 rounded mr-2">${s}</span>`).join('')}
        </div>`;
      }
    });
  });
}

/* Multi-Step Book Demo Modal Handler */
function initBookDemoModal() {
  const modal = document.getElementById('book-demo-modal');
  const triggers = document.querySelectorAll('.trigger-book-demo');
  const closeBtn = document.getElementById('modal-close-btn');

  if (!modal) return;

  function openModal() {
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
    showStep(1);
  }

  function closeModal() {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = '';
  }

  triggers.forEach(t => t.addEventListener('click', (e) => {
    e.preventDefault();
    openModal();
  }));

  if (closeBtn) closeBtn.addEventListener('click', closeModal);

  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });

  // Modal Step Navigation Logic
  let currentStep = 1;
  const totalSteps = 4;

  window.showStep = function(step) {
    currentStep = step;
    for (let i = 1; i <= totalSteps; i++) {
      const stepEl = document.getElementById(`modal-step-${i}`);
      const indicator = document.getElementById(`step-indicator-${i}`);
      if (stepEl) {
        if (i === step) {
          stepEl.classList.remove('hidden');
        } else {
          stepEl.classList.add('hidden');
        }
      }
      if (indicator) {
        if (i <= step) {
          indicator.classList.add('bg-[#00F0FF]', 'text-[#0A0A0F]');
          indicator.classList.remove('bg-[#EEF2F6]', 'text-[#5B5F6B]');
        } else {
          indicator.classList.remove('bg-[#00F0FF]', 'text-[#0A0A0F]');
          indicator.classList.add('bg-[#EEF2F6]', 'text-[#5B5F6B]');
        }
      }
    }

    if (step === 4) {
      triggerConfetti();
    }
  };

  const step1Next = document.getElementById('step-1-next');
  const step2Next = document.getElementById('step-2-next');
  const step3Submit = document.getElementById('step-3-submit');

  if (step1Next) step1Next.addEventListener('click', () => {
    const name = document.getElementById('demo-name')?.value?.trim();
    const email = document.getElementById('demo-email')?.value?.trim();
    if (!name || !email) {
      alert('Please fill in your name and email address.');
      return;
    }
    showStep(2);
  });

  if (step2Next) step2Next.addEventListener('click', () => showStep(3));

  if (step3Submit) step3Submit.addEventListener('click', async () => {
    const name = document.getElementById('demo-name')?.value?.trim() || '';
    const email = document.getElementById('demo-email')?.value?.trim() || '';
    const phone = document.getElementById('demo-phone')?.value?.trim() || '';
    const company = document.getElementById('demo-company')?.value?.trim() || '';
    const website = document.getElementById('demo-website')?.value?.trim() || '';
    const industry = document.getElementById('demo-industry')?.value || 'General';

    let basePath = '/';
    const subMatch = window.location.pathname.match(/^(\/[^\/]+)\/(services|industries|blog|api)\//i);
    if (subMatch && !['/services', '/industries', '/blog', '/api'].includes(subMatch[1].toLowerCase())) {
      basePath = subMatch[1] + '/';
    }
    const apiPath = basePath + 'api/save-lead.php';

    try {
      await fetch(apiPath, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name, email, phone, company, website, industry, source: 'Interactive Booking Modal' })
      });
    } catch (e) {
      console.warn('Lead capture notice:', e);
    }
    showStep(4);
  });
}

/* FAQ Accordion Toggle */
function initFAQAccordion() {
  document.addEventListener('click', (e) => {
    const header = e.target.closest('.faq-header') || e.target.closest('.faq-accordion-btn');
    if (!header) return;

    const item = header.closest('.faq-item') || header.parentElement;
    if (!item) return;

    const isActive = item.classList.contains('active');
    
    // Close sibling/other FAQs in the same container or page
    const container = item.closest('#page-faq-accordion, #blog-faq-accordion, .space-y-4, .space-y-3') || document;
    container.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));

    if (!isActive) {
      item.classList.add('active');
    }
  });
}

/* Simple Canvas Confetti Trigger for Demo Confirmation */
function triggerConfetti() {
  const canvas = document.getElementById('confetti-canvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  const modalBox = canvas.parentElement;
  canvas.width = modalBox.offsetWidth || 500;
  canvas.height = modalBox.offsetHeight || 600;

  const particles = [];
  const colors = ['#00F0FF', '#16A34A', '#8B5CF6', '#D97706'];

  for (let i = 0; i < 70; i++) {
    particles.push({
      x: canvas.width / 2,
      y: canvas.height / 2,
      vx: (Math.random() - 0.5) * 12,
      vy: (Math.random() - 0.8) * 12,
      size: Math.random() * 6 + 4,
      color: colors[Math.floor(Math.random() * colors.length)],
      alpha: 1
    });
  }

  function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    let alive = false;
    particles.forEach(p => {
      p.x += p.vx;
      p.y += p.vy;
      p.vy += 0.25; // gravity
      p.alpha -= 0.015;
      if (p.alpha > 0) {
        alive = true;
        ctx.globalAlpha = p.alpha;
        ctx.fillStyle = p.color;
        ctx.fillRect(p.x, p.y, p.size, p.size);
      }
    });
    if (alive) requestAnimationFrame(animate);
  }
  animate();
}
