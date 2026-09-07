<?php
require_once __DIR__ . '/includes/site-config.php';
$cnt_cfg = get_page_config('contact');
$page_title = $cnt_cfg['meta_title'] ?? "Contact Digital4Local | Book Your Growth Strategy Session";
$page_description = $cnt_cfg['meta_description'] ?? "Get in touch with Digital4Local's AI growth strategists in London, Austin, and Bhopal.";

$contact_info = $site_config['contact'] ?? [];
$hubs = $contact_info['hubs'] ?? [
    ['city' => 'London', 'country' => 'UK', 'label' => 'Europe & Global Operations Hub'],
    ['city' => 'Austin', 'country' => 'USA', 'label' => 'North America Client Operations'],
    ['city' => 'Bhopal', 'country' => 'India', 'label' => 'Asia-Pacific Engineering & R&D Center']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once 'includes/seo.php'; ?>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] min-h-screen relative selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <div class="bg-ambient-glow"></div>
  <?php include_once 'includes/header.php'; ?>

  <main class="relative z-10 pt-32 pb-24">
    <!-- Hero -->
    <section class="max-w-4xl mx-auto px-4 text-center space-y-6 pb-16" data-aos="fade-up">
      <span class="pulse-badge"><?php echo htmlspecialchars($cnt_cfg['badge'] ?? 'CONNECT WITH OUR STRATEGISTS'); ?></span>
      <h1 class="text-4xl sm:text-6xl font-extrabold text-[#14151A] tracking-tight">
        <?php echo htmlspecialchars($cnt_cfg['hero_title'] ?? 'Ready to Scale Your'); ?> <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#1D70B8] via-[#00A8B5] to-[#70B22C]"><?php echo htmlspecialchars($cnt_cfg['hero_highlight'] ?? 'Local Market Share?'); ?></span>
      </h1>
      <p class="text-lg text-[#5B5F6B] leading-relaxed"><?php echo htmlspecialchars($cnt_cfg['hero_subheading'] ?? 'Get in touch with our team in London, Austin, or Bhopal for custom audits, proposals, and strategy sessions.'); ?></p>
    </section>

    <!-- Main Form & Info Grid -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-20">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        
        <!-- Left: Direct Contact Form -->
        <div class="card-dark p-8 space-y-6">
          <h2 class="text-2xl font-bold text-[#14151A]"><?php echo htmlspecialchars($cnt_cfg['form_title'] ?? 'Send Us A Direct Message'); ?></h2>
          <form id="direct-contact-form" class="space-y-4" onsubmit="handleContactSubmit(event)">
            <div>
              <label class="block text-xs font-mono text-[#5B5F6B] mb-1 font-bold">FULL NAME *</label>
              <input type="text" id="contact-name" required placeholder="John Doe" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl px-4 py-3 text-xs text-[#14151A] focus:outline-none focus:border-[#00A8B5]">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label class="block text-xs font-mono text-[#5B5F6B] mb-1 font-bold">WORK EMAIL *</label>
                <input type="email" id="contact-email" required placeholder="john@company.com" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl px-4 py-3 text-xs text-[#14151A] focus:outline-none focus:border-[#00A8B5]">
              </div>
              <div>
                <label class="block text-xs font-mono text-[#5B5F6B] mb-1 font-bold">PHONE NUMBER</label>
                <input type="tel" id="contact-phone" placeholder="+1 (555) 000-0000" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl px-4 py-3 text-xs text-[#14151A] focus:outline-none focus:border-[#00A8B5]">
              </div>
            </div>
            <div>
              <label class="block text-xs font-mono text-[#5B5F6B] mb-1 font-bold">WEBSITE URL</label>
              <input type="url" id="contact-website" placeholder="https://yourcompany.com" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl px-4 py-3 text-xs text-[#14151A] focus:outline-none focus:border-[#00A8B5]">
            </div>
            <div>
              <label class="block text-xs font-mono text-[#5B5F6B] mb-1 font-bold">PROJECT DETAILS / GOALS</label>
              <textarea id="contact-message" rows="4" placeholder="Tell us about your target keywords, locations, or current search bottlenecks..." class="w-full bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl px-4 py-3 text-xs text-[#14151A] focus:outline-none focus:border-[#00A8B5]"></textarea>
            </div>
            <div id="contact-status-box" class="hidden p-3 rounded-xl text-xs font-bold text-center"></div>
            <button type="submit" id="contact-submit-btn" class="btn-primary w-full text-xs justify-center">
              <i data-lucide="send" class="w-4 h-4"></i> Send Direct Message
            </button>
          </form>

          <script>
            async function handleContactSubmit(e) {
              e.preventDefault();
              const btn = document.getElementById('contact-submit-btn');
              const statusBox = document.getElementById('contact-status-box');
              btn.disabled = true;
              btn.innerHTML = 'Sending message...';

              const payload = {
                name: document.getElementById('contact-name').value.trim(),
                email: document.getElementById('contact-email').value.trim(),
                phone: document.getElementById('contact-phone').value.trim(),
                website: document.getElementById('contact-website').value.trim(),
                message: document.getElementById('contact-message').value.trim(),
                source: 'Contact Page Form'
              };

              try {
                const res = await fetch('api/save-lead.php', {
                  method: 'POST',
                  headers: { 'Content-Type': 'application/json' },
                  body: JSON.stringify(payload)
                });
                const result = await res.json();
                statusBox.classList.remove('hidden', 'bg-[#EF4444]/20', 'text-[#EF4444]', 'bg-[#10B981]/20', 'text-[#10B981]');
                if (result.success) {
                  statusBox.classList.add('bg-[#10B981]/20', 'text-[#10B981]');
                  statusBox.textContent = '✓ Message sent successfully! A senior strategist will respond within 2 hours.';
                  document.getElementById('direct-contact-form').reset();
                } else {
                  statusBox.classList.add('bg-[#EF4444]/20', 'text-[#EF4444]');
                  statusBox.textContent = result.message || 'Error submitting message.';
                }
              } catch (err) {
                statusBox.classList.remove('hidden');
                statusBox.classList.add('bg-[#EF4444]/20', 'text-[#EF4444]');
                statusBox.textContent = 'Network error. Please email us directly at info@digital4local.com.';
              } finally {
                btn.disabled = false;
                btn.innerHTML = '<i data-lucide="send" class="w-4 h-4"></i> Send Direct Message';
                if (typeof lucide !== 'undefined') lucide.createIcons();
              }
            }
          </script>
        </div>

        <!-- Right: Office Hubs & Instant Demo Booking -->
        <div class="space-y-6">
          
          <!-- Instant Booking Trigger Box -->
          <div class="card-elevated p-8 space-y-4 border-2 border-[#00A8B5]">
            <div class="flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-[#16A34A] animate-ping"></span>
              <span class="text-xs font-mono text-[#16A34A] font-bold">INSTANT CALENDAR ACCESS</span>
            </div>
            <h3 class="text-2xl font-bold text-[#14151A]"><?php echo htmlspecialchars($cnt_cfg['booking_title'] ?? 'Prefer an interactive live walk-through?'); ?></h3>
            <p class="text-xs text-[#5B5F6B] leading-relaxed"><?php echo htmlspecialchars($cnt_cfg['booking_desc'] ?? 'Book a 15-minute live rank audit with our lead search engineer and get immediate insights into your Google Map pack rankings.'); ?></p>
            <button class="trigger-book-demo btn-primary w-full text-xs justify-center">
              <i data-lucide="calendar" class="w-4 h-4"></i> Launch Interactive Booking Modal
            </button>
          </div>

          <!-- Office Locations Grid -->
          <div class="card-dark p-8 space-y-6">
            <h3 class="text-lg font-bold text-[#14151A]">Global Office Hubs</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
              <?php foreach ($hubs as $hub): ?>
              <div class="p-3 bg-[#F6F8FB] rounded-xl border border-[#E4E7EC] space-y-1">
                <div class="flex items-center gap-1.5 font-bold text-[#14151A]">
                  <i data-lucide="map-pin" class="w-4 h-4 text-[#00A8B5]"></i> <?php echo htmlspecialchars($hub['city'] . ', ' . $hub['country']); ?>
                </div>
                <div class="text-[11px] text-[#5B5F6B]"><?php echo htmlspecialchars($hub['label']); ?></div>
              </div>
              <?php endforeach; ?>
            </div>

            <!-- Email & Direct Channels List -->
            <div class="border-t border-[#E4E7EC] pt-6 space-y-3">
              <h4 class="text-xs font-mono text-[#14151A] uppercase font-bold tracking-wider">Direct Communication Channels</h4>
              <div class="space-y-2 text-xs">
                <div class="flex items-center justify-between p-3 bg-[#F6F8FB] rounded-xl border border-[#E4E7EC]">
                  <span class="text-[#5B5F6B] font-semibold">General Inquiries</span>
                  <a href="mailto:<?php echo htmlspecialchars($contact_info['email_secondary'] ?? 'info@digital4local.com'); ?>" class="text-[#00A8B5] font-mono font-bold hover:underline"><?php echo htmlspecialchars($contact_info['email_secondary'] ?? 'info@digital4local.com'); ?></a>
                </div>
                <div class="flex items-center justify-between p-3 bg-[#F6F8FB] rounded-xl border border-[#E4E7EC]">
                  <span class="text-[#5B5F6B] font-semibold">Primary Client Operations</span>
                  <a href="mailto:<?php echo htmlspecialchars($contact_info['email_primary'] ?? 'info@digital4local.com'); ?>" class="text-[#16A34A] font-mono font-bold hover:underline"><?php echo htmlspecialchars($contact_info['email_primary'] ?? 'info@digital4local.com'); ?></a>
                </div>
                <div class="flex items-center justify-between p-3 bg-[#F6F8FB] rounded-xl border border-[#E4E7EC]">
                  <span class="text-[#5B5F6B] font-semibold">Phone (Direct)</span>
                  <a href="tel:<?php echo htmlspecialchars(str_replace([' ', '(', ')', '-'], '', $contact_info['phone'] ?? '+15128904400')); ?>" class="text-[#8B5CF6] font-mono font-bold hover:underline"><?php echo htmlspecialchars($contact_info['phone'] ?? '+1 (512) 890-4400'); ?></a>
                </div>
                <div class="flex items-center justify-between p-3 bg-[#F6F8FB] rounded-xl border border-[#E4E7EC]">
                  <span class="text-[#5B5F6B] font-semibold">WhatsApp Business</span>
                  <a href="https://wa.me/<?php echo htmlspecialchars(preg_replace('/[^0-9]/', '', $contact_info['whatsapp'] ?? '442079460912')); ?>" target="_blank" class="text-[#16A34A] font-mono font-bold hover:underline"><?php echo htmlspecialchars($contact_info['whatsapp'] ?? '+44 20 7946 0912'); ?></a>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section>

    <!-- FAQs Section -->
    <section class="max-w-4xl mx-auto px-4 pb-20">
      <div class="text-center space-y-4 mb-12">
        <span class="pulse-badge">CONTACT FAQS</span>
        <h2 class="text-3xl font-bold text-[#14151A]">Frequently Asked Questions</h2>
      </div>

      <div class="space-y-4">
        <div class="faq-item card-dark p-6 cursor-pointer">
          <div class="faq-header flex items-center justify-between font-bold text-sm text-[#14151A]">
            <span>How quickly will a growth strategist respond?</span>
            <i data-lucide="chevron-down" class="w-5 h-5 text-[#00A8B5] faq-chevron transition-transform"></i>
          </div>
          <div class="faq-answer text-xs text-[#5B5F6B] mt-3 leading-relaxed">
            Our automated n8n triage system flags incoming queries instantly, and a senior strategist will respond via email or phone within 2 business hours.
          </div>
        </div>
      </div>
    </section>

    <!-- Recent Published Research & Articles -->
    <?php include_once 'includes/recent-blogs.php'; ?>

  </main>

  <?php include_once 'includes/footer.php'; ?>
</body>
</html>
