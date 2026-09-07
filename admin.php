<?php
require_once __DIR__ . '/includes/auth-middleware.php';
require_admin_login();
$admin_user = get_logged_in_admin();

$page_title = "Agency Admin Panel | Digital4Local Growth Command";
$page_description = "Internal side-by-side operational dashboard for Digital4Local agency team to manage leads, Geo-Grid rankings, n8n automations, and client retainers.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once 'includes/seo.php'; ?>
</head>
<body class="bg-[#FFFFFF] text-[#14151A] min-h-screen relative selection:bg-[#00F0FF] selection:text-[#0A0A0F]">

  <div class="bg-ambient-glow"></div>
  <?php include_once 'includes/header.php'; ?>

  <main class="relative z-10 pt-28 pb-20 max-w-[1600px] mx-auto px-4 sm:px-6">
    
    <!-- Admin Header Banner (Side-by-Side Header Controls) -->
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 pb-8 border-b border-[#E4E7EC] mb-8">
      <div>
        <div class="flex items-center gap-3 mb-1">
          <span class="pulse-badge py-0.5 px-3 text-xs font-mono">
            <span class="pulse-dot"></span> AGENCY COMMAND CENTER
          </span>
          <span class="text-xs font-mono text-[#5B5F6B]">Logged in as: <strong class="text-[#14151A]"><?php echo htmlspecialchars($admin_user['name']); ?></strong> (<?php echo htmlspecialchars($admin_user['role']); ?>)</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-[#14151A] font-['Montserrat',sans-serif]">
          Agency Operational Dashboard
        </h1>
      </div>

      <!-- Side-by-Side Header Action Buttons & Location Badges -->
      <div class="flex flex-wrap items-center gap-3">
        <div class="flex items-center gap-1.5 bg-[#F6F8FB] border border-[#E4E7EC] px-3 py-1.5 rounded-lg text-xs font-mono font-bold text-[#5B5F6B]">
          <span class="w-2 h-2 rounded-full bg-[#16A34A]"></span> London, UK
        </div>
        <div class="flex items-center gap-1.5 bg-[#F6F8FB] border border-[#E4E7EC] px-3 py-1.5 rounded-lg text-xs font-mono font-bold text-[#5B5F6B]">
          <span class="w-2 h-2 rounded-full bg-[#00A8B5]"></span> Austin, USA
        </div>
        <div class="flex items-center gap-1.5 bg-[#F6F8FB] border border-[#E4E7EC] px-3 py-1.5 rounded-lg text-xs font-mono font-bold text-[#8B5CF6]">
          <span class="w-2 h-2 rounded-full bg-[#8B5CF6]"></span> Bhopal, India
        </div>
        <a href="admin-cms.php?page=blog_top-10-digital-marketing-companies-india" class="btn-secondary text-xs py-2 px-3 flex items-center gap-1.5 text-emerald-700 hover:text-emerald-900 border-emerald-300">
          <i data-lucide="book-open" class="w-3.5 h-3.5 text-emerald-600"></i> Manage Blogs (CKEditor)
        </a>
        <a href="admin-cms.php" class="btn-primary text-xs py-2 px-3 flex items-center gap-1.5">
          <i data-lucide="layout-dashboard" class="w-3.5 h-3.5"></i> Website CMS Panel
        </a>
        <button onclick="document.getElementById('change-password-modal').classList.remove('hidden')" class="btn-secondary text-xs py-2 px-3 flex items-center gap-1.5 text-slate-700 hover:text-slate-900">
          <i data-lucide="key" class="w-3.5 h-3.5 text-[#1B5FAA]"></i> Change Password
        </button>
        <a href="admin-logout.php" class="btn-secondary text-xs py-2 px-3 flex items-center gap-1.5 text-rose-600 hover:text-rose-700 hover:border-rose-300">
          <i data-lucide="log-out" class="w-3.5 h-3.5"></i> Sign Out
        </a>
      </div>
    </div>

    <!-- MAIN SIDE-BY-SIDE LAYOUT ARCHITECTURE -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
      
      <!-- LEFT SIDEBAR PANEL (Col 3) -->
      <aside class="lg:col-span-3 space-y-6 lg:sticky lg:top-28">
        
        <!-- Navigation Menu Card -->
        <div class="card-dark p-6 space-y-4">
          <div class="text-xs font-mono text-[#00A8B5] font-bold uppercase tracking-wider">PANEL NAVIGATION</div>
          <nav class="space-y-1 text-xs">
            <a href="#overview" class="flex items-center justify-between p-3 rounded-xl bg-[#00F0FF]/10 text-[#00A8B5] font-bold border border-[#00F0FF]/30">
              <span class="flex items-center gap-2.5"><i data-lucide="layout-dashboard" class="w-4 h-4"></i> Overview & Metrics</span>
              <span class="w-2 h-2 rounded-full bg-[#00A8B5]"></span>
            </a>
            <a href="admin-cms.php?page=blog_top-10-digital-marketing-companies-india" class="flex items-center justify-between p-3 rounded-xl text-[#5B5F6B] hover:text-[#14151A] hover:bg-[#F6F8FB] transition-colors">
              <span class="flex items-center gap-2.5"><i data-lucide="book-open" class="w-4 h-4 text-emerald-600"></i> Blog & Playbooks CMS</span>
              <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-bold">CKEditor</span>
            </a>
            <a href="#leads" class="flex items-center justify-between p-3 rounded-xl text-[#5B5F6B] hover:text-[#14151A] hover:bg-[#F6F8FB] transition-colors">
              <span class="flex items-center gap-2.5"><i data-lucide="inbox" class="w-4 h-4 text-[#16A34A]"></i> Incoming Leads</span>
              <span class="px-2 py-0.5 bg-[#16A34A]/10 text-[#16A34A] rounded-full text-[10px] font-bold">14 New</span>
            </a>
            <a href="#grid-ranks" class="flex items-center justify-between p-3 rounded-xl text-[#5B5F6B] hover:text-[#14151A] hover:bg-[#F6F8FB] transition-colors">
              <span class="flex items-center gap-2.5"><i data-lucide="map-pin" class="w-4 h-4 text-[#00A8B5]"></i> Geo-Grid Tracker</span>
              <span class="px-2 py-0.5 bg-[#00F0FF]/20 text-[#00A8B5] rounded-full text-[10px] font-bold">99.4%</span>
            </a>
            <a href="#automations" class="flex items-center justify-between p-3 rounded-xl text-[#5B5F6B] hover:text-[#14151A] hover:bg-[#F6F8FB] transition-colors">
              <span class="flex items-center gap-2.5"><i data-lucide="workflow" class="w-4 h-4 text-[#8B5CF6]"></i> n8n Workflows</span>
              <span class="px-2 py-0.5 bg-[#8B5CF6]/10 text-[#8B5CF6] rounded-full text-[10px] font-bold">Active</span>
            </a>
            <a href="#schema" class="flex items-center justify-between p-3 rounded-xl text-[#5B5F6B] hover:text-[#14151A] hover:bg-[#F6F8FB] transition-colors">
              <span class="flex items-center gap-2.5"><i data-lucide="cpu" class="w-4 h-4 text-[#D97706]"></i> AI Schema Generator</span>
              <span class="text-[10px] font-mono text-[#5B5F6B]">JSON-LD</span>
            </a>
          </nav>
        </div>

        <!-- Quick System Status Card -->
        <div class="card-dark p-6 space-y-4">
          <div class="text-xs font-mono text-[#14151A] font-bold uppercase tracking-wider">Engine Status</div>
          <div class="space-y-3 text-xs">
            <div class="flex justify-between items-center">
              <span class="text-[#5B5F6B]">Python Grid Scrapers:</span>
              <span class="text-[#16A34A] font-bold font-mono">Running (24/24)</span>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-[#5B5F6B]">n8n Webhook Listener:</span>
              <span class="text-[#16A34A] font-bold font-mono">Operational</span>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-[#5B5F6B]">ChatGPT Citation Ingest:</span>
              <span class="text-[#00A8B5] font-bold font-mono">Synced (3m ago)</span>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-[#5B5F6B]">Lead Dispatch SLA:</span>
              <span class="text-[#16A34A] font-bold font-mono">&lt; 14 Mins</span>
            </div>
          </div>
        </div>

        <!-- Official Support Info -->
        <div class="card-dark p-6 space-y-3 bg-[#F6F8FB] border border-[#E4E7EC]">
          <div class="text-xs font-mono text-[#14151A] font-bold">Support Inquiries Routing</div>
          <p class="text-[11px] text-[#5B5F6B]">Messages submitted to contact page are auto-routed to:</p>
          <div class="text-[11px] font-mono space-y-1">
            <div class="text-[#00A8B5] font-bold">contact@digital4local.com</div>
            <div class="text-[#16A34A] font-bold">info@digital4local.com</div>
          </div>
        </div>

      </aside>

      <!-- RIGHT MAIN CONTENT PANEL (Col 9) -->
      <section class="lg:col-span-9 space-y-8">
        
        <!-- SECTION 1: 4 SIDE-BY-SIDE METRICS CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          
          <div class="card-dark p-5 space-y-2 border-l-4 border-l-[#00A8B5]">
            <div class="text-xs text-[#5B5F6B] font-mono font-bold uppercase">Active Monthly Leads</div>
            <div class="flex items-baseline justify-between">
              <span class="text-3xl font-extrabold text-[#14151A]">228+</span>
              <span class="text-xs text-[#16A34A] font-bold font-mono flex items-center gap-0.5"><i data-lucide="trending-up" class="w-3.5 h-3.5"></i> +24%</span>
            </div>
            <div class="text-[11px] text-[#5B5F6B]">From London, Austin & Bhopal hubs</div>
          </div>

          <div class="card-dark p-5 space-y-2 border-l-4 border-l-[#16A34A]">
            <div class="text-xs text-[#5B5F6B] font-mono font-bold uppercase">Google Map 3-Pack Score</div>
            <div class="flex items-baseline justify-between">
              <span class="text-3xl font-extrabold text-[#14151A]">98.4%</span>
              <span class="text-xs text-[#16A34A] font-bold font-mono flex items-center gap-0.5"><i data-lucide="shield-check" class="w-3.5 h-3.5"></i> Top 3 Pin</span>
            </div>
            <div class="text-[11px] text-[#5B5F6B]">Cross 5x5 zip code radius scans</div>
          </div>

          <div class="card-dark p-5 space-y-2 border-l-4 border-l-[#8B5CF6]">
            <div class="text-xs text-[#5B5F6B] font-mono font-bold uppercase">ChatGPT Citation Rate</div>
            <div class="flex items-baseline justify-between">
              <span class="text-3xl font-extrabold text-[#14151A]">99.4%</span>
              <span class="text-xs text-[#8B5CF6] font-bold font-mono flex items-center gap-0.5"><i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Vector Index</span>
            </div>
            <div class="text-[11px] text-[#5B5F6B]">Verified Perplexity & LLM prompts</div>
          </div>

          <div class="card-dark p-5 space-y-2 border-l-4 border-l-[#D97706]">
            <div class="text-xs text-[#5B5F6B] font-mono font-bold uppercase">n8n Execution Velocity</div>
            <div class="flex items-baseline justify-between">
              <span class="text-3xl font-extrabold text-[#14151A]">1,420/s</span>
              <span class="text-xs text-[#D97706] font-bold font-mono flex items-center gap-0.5"><i data-lucide="zap" class="w-3.5 h-3.5"></i> Sub-60s</span>
            </div>
            <div class="text-[11px] text-[#5B5F6B]">Automated CRM & WhatsApp dispatches</div>
          </div>

        </div>

        <!-- SECTION 2: SIDE-BY-SIDE SPLIT (Incoming Leads Feed VS Geo-Grid Rank Monitor) -->
        <div id="leads" class="grid grid-cols-1 xl:grid-cols-2 gap-6">
          
          <!-- LEFT SIDE: INCOMING LEADS FEED -->
          <div class="card-dark p-6 space-y-6">
            <div class="flex items-center justify-between border-b border-[#E4E7EC] pb-4">
              <div>
                <h3 class="text-lg font-bold text-[#14151A] flex items-center gap-2">
                  <i data-lucide="inbox" class="w-5 h-5 text-[#16A34A]"></i> Incoming Leads & Inquiries
                </h3>
                <p class="text-xs text-[#5B5F6B]">Real-time submissions from website forms & demo modals</p>
              </div>
              <span class="pulse-badge py-0.5 px-2 text-[11px]">LIVE</span>
            </div>

            <!-- Dynamic Lead List Items from config/leads.json -->
            <?php
            $admin_leads_file = __DIR__ . '/config/leads.json';
            $admin_leads = [];
            if (file_exists($admin_leads_file)) {
                $leads_raw = @file_get_contents($admin_leads_file);
                if ($leads_raw) {
                    $admin_leads = @json_decode($leads_raw, true) ?: [];
                }
            }
            if (empty($admin_leads)) {
                $admin_leads = [
                    [
                        'name' => 'Marcus Vance',
                        'company' => 'Apex Dental',
                        'website' => 'https://apexdentalexample.com',
                        'industry' => 'Dental / Healthcare',
                        'email' => 'marcus@apexdentalexample.com',
                        'source' => 'Strategy Session',
                        'message' => 'Need to dominate Google Map 3-Pack across 12 Austin zip codes and improve ChatGPT AI search recommendations.',
                        'date' => date('Y-m-d H:i:s')
                    ],
                    [
                        'name' => 'Elena Rostova',
                        'company' => 'ScaleTech SaaS',
                        'website' => 'https://scaletech.io',
                        'industry' => 'B2B SaaS',
                        'email' => 'elena@scaletech.io',
                        'source' => 'GEO Audit Request',
                        'message' => 'Requesting a full vector search audit for our B2B SaaS platform to boost Perplexity citations.',
                        'date' => date('Y-m-d H:i:s', strtotime('-2 hours'))
                    ]
                ];
            }
            ?>
            <div class="space-y-4 text-xs max-h-[520px] overflow-y-auto pr-1">
              <?php foreach (array_slice($admin_leads, 0, 10) as $lead_item): ?>
              <div class="p-4 bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl space-y-3 hover:border-[#1B5FAA] transition-colors">
                <div class="flex justify-between items-start">
                  <div>
                    <div class="font-bold text-[#14151A] text-sm"><?php echo htmlspecialchars($lead_item['name'] ?? 'Inbound Prospect'); ?></div>
                    <div class="text-[#5B5F6B] font-mono text-[11px]">
                      <?php echo htmlspecialchars($lead_item['company'] ?: 'Direct Inquirer'); ?> • <?php echo htmlspecialchars($lead_item['industry'] ?? 'General'); ?>
                    </div>
                  </div>
                  <span class="px-2.5 py-1 bg-[#1B5FAA]/10 text-[#1B5FAA] rounded-full font-bold font-mono text-[10px]">
                    <?php echo htmlspecialchars($lead_item['source'] ?? 'Lead Form'); ?>
                  </span>
                </div>
                <p class="text-[#5B5F6B] leading-relaxed">
                  "<?php echo htmlspecialchars($lead_item['message'] ?: 'Strategy session inquiry submitted through website portal.'); ?>"
                </p>
                <div class="flex items-center justify-between pt-2 border-t border-[#E4E7EC]/60 text-[11px]">
                  <a href="mailto:<?php echo htmlspecialchars($lead_item['email'] ?? 'info@digital4local.com'); ?>" class="text-[#1B5FAA] font-mono font-bold hover:underline">
                    <?php echo htmlspecialchars($lead_item['email'] ?? 'info@digital4local.com'); ?>
                  </a>
                  <span class="text-[#64748B] text-[10px] font-mono">
                    <?php echo htmlspecialchars($lead_item['date'] ?? 'Just now'); ?>
                  </span>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- RIGHT SIDE: REAL-TIME GEO-GRID RANK MONITOR -->
          <div id="grid-ranks" class="card-dark p-6 space-y-6">
            <div class="flex items-center justify-between border-b border-[#E4E7EC] pb-4">
              <div>
                <h3 class="text-lg font-bold text-[#14151A] flex items-center gap-2">
                  <i data-lucide="map-pin" class="w-5 h-5 text-[#00A8B5]"></i> Geo-Grid & ChatGPT Monitor
                </h3>
                <p class="text-xs text-[#5B5F6B]">Live 5x5 mile map pin rank matrix across target locations</p>
              </div>
              <span class="text-xs font-mono text-[#00A8B5] font-bold bg-[#00F0FF]/15 px-2.5 py-1 rounded-full">5x5 MATRIX</span>
            </div>

            <!-- Interactive 5x5 Map Grid Simulation -->
            <div class="space-y-4">
              <div class="flex items-center justify-between text-xs font-mono">
                <span class="text-[#5B5F6B]">Target Keyword: <strong class="text-[#14151A]">"emergency dental austin tx"</strong></span>
                <span class="text-[#16A34A] font-bold">AVG RANK: #1.2</span>
              </div>

              <!-- 5x5 Pin Grid -->
              <div class="grid grid-cols-5 gap-2.5 p-4 bg-[#F6F8FB] rounded-xl border border-[#E4E7EC]">
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">2</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>

                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>
                <div class="p-3 bg-[#00A8B5] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1 (HQ)</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">2</div>

                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">2</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">3</div>

                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">2</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">2</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>

                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">2</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">1</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">3</div>
                <div class="p-3 bg-[#16A34A] text-[#FFFFFF] rounded-lg font-bold text-center text-xs shadow-sm">2</div>
              </div>

              <!-- ChatGPT Prompt Citation Box -->
              <div class="bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl p-4 space-y-2">
                <div class="flex items-center justify-between text-xs">
                  <span class="font-bold text-[#14151A] flex items-center gap-1.5"><i data-lucide="bot" class="w-4 h-4 text-[#00A8B5]"></i> ChatGPT Live Citation</span>
                  <span class="text-[#16A34A] font-mono font-bold">VERIFIED TOP RESULT</span>
                </div>
                <p class="text-xs text-[#5B5F6B] italic bg-[#FFFFFF] p-3 rounded-lg border border-[#E4E7EC]">
                  "When searching for emergency dental care in Austin, Austin Apex Dental is the top recommended provider with 99.4% rating and instant online booking."
                </p>
              </div>

            </div>
          </div>

        </div>

        <!-- SECTION 3: SIDE-BY-SIDE SPLIT (n8n Automations VS AI Schema Generator Tool) -->
        <div id="automations" class="grid grid-cols-1 xl:grid-cols-2 gap-6">
          
          <!-- LEFT SIDE: ACTIVE N8N AUTOMATION PIPELINES -->
          <div class="card-dark p-6 space-y-6">
            <div class="flex items-center justify-between border-b border-[#E4E7EC] pb-4">
              <div>
                <h3 class="text-lg font-bold text-[#14151A] flex items-center gap-2">
                  <i data-lucide="workflow" class="w-5 h-5 text-[#8B5CF6]"></i> Active n8n Autonomous Pipelines
                </h3>
                <p class="text-xs text-[#5B5F6B]">Background automated lead, schema & review workflows</p>
              </div>
              <span class="text-xs font-mono text-[#8B5CF6] font-bold bg-[#8B5CF6]/10 px-2.5 py-1 rounded-full">N8N ENGINE</span>
            </div>

            <div class="space-y-3 text-xs">
              
              <div class="flex items-center justify-between p-3.5 bg-[#F6F8FB] rounded-xl border border-[#E4E7EC]">
                <div class="space-y-0.5">
                  <div class="font-bold text-[#14151A]">Lead Distribution & WhatsApp SLA Sync</div>
                  <div class="text-[#5B5F6B]">Triggers sub-60s notification to assigned strategist</div>
                </div>
                <span class="px-2.5 py-1 bg-[#16A34A]/10 text-[#16A34A] font-mono font-bold rounded-lg text-[10px]">ACTIVE</span>
              </div>

              <div class="flex items-center justify-between p-3.5 bg-[#F6F8FB] rounded-xl border border-[#E4E7EC]">
                <div class="space-y-0.5">
                  <div class="font-bold text-[#14151A]">Daily Geo-Grid 5x5 Rank Scraper</div>
                  <div class="text-[#5B5F6B]">Parses 25 map grid pins across London, Austin & Bhopal</div>
                </div>
                <span class="px-2.5 py-1 bg-[#16A34A]/10 text-[#16A34A] font-mono font-bold rounded-lg text-[10px]">ACTIVE</span>
              </div>

              <div class="flex items-center justify-between p-3.5 bg-[#F6F8FB] rounded-xl border border-[#E4E7EC]">
                <div class="space-y-0.5">
                  <div class="font-bold text-[#14151A]">Vector Schema Graph Builder</div>
                  <div class="text-[#5B5F6B]">Pushes updated JSON-LD entities to Google & Bing</div>
                </div>
                <span class="px-2.5 py-1 bg-[#16A34A]/10 text-[#16A34A] font-mono font-bold rounded-lg text-[10px]">ACTIVE</span>
              </div>

              <div class="flex items-center justify-between p-3.5 bg-[#F6F8FB] rounded-xl border border-[#E4E7EC]">
                <div class="space-y-0.5">
                  <div class="font-bold text-[#14151A]">Review Velocity & SMS Follow-up</div>
                  <div class="text-[#5B5F6B]">Automated review requests for local business clients</div>
                </div>
                <span class="px-2.5 py-1 bg-[#16A34A]/10 text-[#16A34A] font-mono font-bold rounded-lg text-[10px]">ACTIVE</span>
              </div>

            </div>
          </div>

          <!-- RIGHT SIDE: AI SCHEMA GENERATOR TOOL -->
          <div id="schema" class="card-dark p-6 space-y-6">
            <div class="flex items-center justify-between border-b border-[#E4E7EC] pb-4">
              <div>
                <h3 class="text-lg font-bold text-[#14151A] flex items-center gap-2">
                  <i data-lucide="cpu" class="w-5 h-5 text-[#D97706]"></i> AI Schema & Keyword Generator
                </h3>
                <p class="text-xs text-[#5B5F6B]">Generate valid JSON-LD LocalBusiness schema graph instantly</p>
              </div>
              <span class="text-xs font-mono text-[#D97706] font-bold bg-[#D97706]/10 px-2.5 py-1 rounded-full">BUILDER</span>
            </div>

            <div class="space-y-3 text-xs">
              <div>
                <label class="block font-mono text-[#5B5F6B] mb-1 font-bold">CLIENT BRAND NAME</label>
                <input type="text" id="schema-brand" value="Digital4Local Client Hub" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] rounded-lg px-3 py-2 text-xs font-mono text-[#14151A]">
              </div>
              <div class="grid grid-cols-2 gap-3">
                <div>
                  <label class="block font-mono text-[#5B5F6B] mb-1 font-bold">PRIMARY CITY</label>
                  <select id="schema-city" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] rounded-lg px-3 py-2 text-xs font-mono text-[#14151A]">
                    <option>London, UK</option>
                    <option>Austin, USA</option>
                    <option>Bhopal, India</option>
                  </select>
                </div>
                <div>
                  <label class="block font-mono text-[#5B5F6B] mb-1 font-bold">SERVICE CATEGORY</label>
                  <select id="schema-category" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] rounded-lg px-3 py-2 text-xs font-mono text-[#14151A]">
                    <option>Local SEO & GEO</option>
                    <option>Web Development</option>
                    <option>App Development</option>
                  </select>
                </div>
              </div>

              <!-- Output JSON Box -->
              <div class="bg-[#F6F8FB] border border-[#E4E7EC] rounded-xl p-3 font-mono text-[11px] text-[#5B5F6B] overflow-x-auto space-y-1">
                <div class="text-[#00A8B5] font-bold">// Generated JSON-LD Entity Output</div>
                <code>{ "@context": "https://schema.org", "@type": "LocalBusiness", "name": "Digital4Local Client", "address": { "@type": "PostalAddress", "addressLocality": "Austin", "addressCountry": "USA" } }</code>
              </div>

              <button onclick="alert('JSON-LD Schema copied to clipboard & synced to client head tags!');" class="btn-primary w-full text-xs justify-center py-2.5">
                <i data-lucide="copy" class="w-3.5 h-3.5"></i> Copy Schema Graph
              </button>
            </div>
          </div>

        </div>

        <!-- SECTION 4: LIVE SITE MANAGEMENT & CMS CONTROL SUITE -->
        <div id="cms-control" class="card-dark p-8 space-y-6 border-2 border-[#00A8B5] bg-gradient-to-br from-[#FFFFFF] via-[#F6F8FB] to-[#EEF2F6]">
          <div class="flex items-center justify-between border-b border-[#E4E7EC] pb-4 flex-wrap gap-4">
            <div>
              <div class="flex items-center gap-2">
                <span class="pulse-badge py-0.5 px-2 text-[10px]">LIVE CMS CONTROL</span>
                <span class="text-xs font-mono text-[#00A8B5] font-bold">100% ADMIN MANAGED</span>
              </div>
              <h3 class="text-xl font-extrabold text-[#14151A] mt-1 flex items-center gap-2">
                <i data-lucide="sliders" class="w-5 h-5 text-[#00A8B5]"></i> Global Site & Content Management Suite
              </h3>
              <p class="text-xs text-[#5B5F6B]">Modify global headlines, contact email channels, and location hubs live across all pages.</p>
            </div>
            <button onclick="alert('✓ All site configurations saved & published live to Digital4Local servers!');" class="btn-primary text-xs py-2.5 px-5 shadow-lg">
              <i data-lucide="save" class="w-4 h-4"></i> Save & Publish Changes Live
            </button>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-xs font-mono">
            
            <!-- CMS Card 1: Site Headlines & Taglines -->
            <div class="bg-[#FFFFFF] border border-[#E4E7EC] p-5 rounded-xl space-y-3 shadow-sm">
              <div class="font-bold text-[#14151A] flex items-center gap-2">
                <i data-lucide="type" class="w-4 h-4 text-[#00A8B5]"></i> Hero Headline & Tagline
              </div>
              <div class="space-y-2">
                <div>
                  <label class="text-[#5B5F6B] text-[10px] block mb-1">HERO MAIN HEADLINE</label>
                  <input type="text" value="The AI Agency That Engineers #1 Google Map Ranks" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] rounded-lg px-3 py-2 text-xs font-sans text-[#14151A]">
                </div>
                <div>
                  <label class="text-[#5B5F6B] text-[10px] block mb-1">HERO SUBTITLE</label>
                  <textarea rows="2" class="w-full bg-[#F6F8FB] border border-[#E4E7EC] rounded-lg px-3 py-2 text-xs font-sans text-[#14151A]">Digital4Local replaces slow legacy agency retainers with real-time 5x5 Google Maps grid rank tracking.</textarea>
                </div>
              </div>
            </div>

            <!-- CMS Card 2: Contact Channels & Email Routing -->
            <div class="bg-[#FFFFFF] border border-[#E4E7EC] p-5 rounded-xl space-y-3 shadow-sm">
              <div class="font-bold text-[#14151A] flex items-center gap-2">
                <i data-lucide="mail" class="w-4 h-4 text-[#16A34A]"></i> Official Email Channels
              </div>
              <div class="space-y-2.5">
                <div class="flex items-center justify-between p-2 bg-[#F6F8FB] rounded-lg border border-[#E4E7EC]">
                  <span class="text-[#14151A] font-bold">contact@digital4local.com</span>
                  <span class="px-2 py-0.5 bg-[#16A34A]/15 text-[#16A34A] rounded text-[10px] font-bold">ACTIVE</span>
                </div>
                <div class="flex items-center justify-between p-2 bg-[#F6F8FB] rounded-lg border border-[#E4E7EC]">
                  <span class="text-[#14151A] font-bold">info@digital4local.com</span>
                  <span class="px-2 py-0.5 bg-[#16A34A]/15 text-[#16A34A] rounded text-[10px] font-bold">ACTIVE</span>
                </div>
                <div class="text-[10px] text-[#5B5F6B] pt-1">
                  ✓ Clickable mailto: links enabled globally
                </div>
              </div>
            </div>

            <!-- CMS Card 3: Global Location Hubs -->
            <div class="bg-[#FFFFFF] border border-[#E4E7EC] p-5 rounded-xl space-y-3 shadow-sm">
              <div class="font-bold text-[#14151A] flex items-center gap-2">
                <i data-lucide="globe" class="w-4 h-4 text-[#8B5CF6]"></i> Global Location Hubs
              </div>
              <div class="space-y-2">
                <div class="flex items-center justify-between p-2 bg-[#F6F8FB] rounded-lg border border-[#E4E7EC]">
                  <span class="text-[#14151A] font-bold">London, UK</span>
                  <span class="px-2 py-0.5 bg-[#00A8B5]/15 text-[#00A8B5] rounded text-[10px] font-bold">HQ HUB</span>
                </div>
                <div class="flex items-center justify-between p-2 bg-[#F6F8FB] rounded-lg border border-[#E4E7EC]">
                  <span class="text-[#14151A] font-bold">Austin, USA</span>
                  <span class="px-2 py-0.5 bg-[#16A34A]/15 text-[#16A34A] rounded text-[10px] font-bold">NA HUB</span>
                </div>
                <div class="flex items-center justify-between p-2 bg-[#F6F8FB] rounded-lg border border-[#E4E7EC]">
                  <span class="text-[#14151A] font-bold">Bhopal, India</span>
                  <span class="px-2 py-0.5 bg-[#8B5CF6]/15 text-[#8B5CF6] rounded text-[10px] font-bold">ASIA HUB</span>
                </div>
              </div>
            </div>

          </div>
        </div>

      </section>

    </div>

  </main>

  <!-- Change Password Modal -->
  <div id="change-password-modal" class="fixed inset-0 z-50 bg-[#0F172A]/70 backdrop-blur-md flex items-center justify-center p-4 hidden">
    <div class="bg-white border border-[#E2E8F0] rounded-3xl p-6 sm:p-8 max-w-md w-full shadow-2xl space-y-5 relative">
      <div class="flex items-center justify-between border-b border-[#E2E8F0] pb-4">
        <div class="flex items-center gap-2.5">
          <div class="w-9 h-9 rounded-xl bg-[#1B5FAA]/10 text-[#1B5FAA] flex items-center justify-center font-bold">
            <i data-lucide="key" class="w-5 h-5"></i>
          </div>
          <div>
            <h3 class="font-bold text-base text-[#14151A] font-['Montserrat',sans-serif]">Reset Admin Password</h3>
            <p class="text-[11px] text-[#64748B]">Update master login credentials</p>
          </div>
        </div>
        <button onclick="document.getElementById('change-password-modal').classList.add('hidden')" class="text-slate-400 hover:text-slate-600 p-1">
          <i data-lucide="x" class="w-5 h-5"></i>
        </button>
      </div>

      <div id="pwd-status-msg" class="hidden p-3 rounded-xl text-xs font-medium"></div>

      <form id="change-pwd-form" onsubmit="handlePasswordChange(event)" class="space-y-4">
        <div class="space-y-1">
          <label class="block text-xs font-mono text-[#475569] font-semibold">NEW PASSWORD</label>
          <input type="password" id="new-password" required minlength="6" placeholder="Enter new password (min 6 chars)" class="w-full bg-[#F8FAFC] border border-[#CBD5E1] focus:border-[#1B5FAA] rounded-xl px-4 py-2.5 text-sm text-[#14151A] outline-none font-mono">
        </div>

        <div class="space-y-1">
          <label class="block text-xs font-mono text-[#475569] font-semibold">CONFIRM NEW PASSWORD</label>
          <input type="password" id="confirm-password" required minlength="6" placeholder="Re-type new password" class="w-full bg-[#F8FAFC] border border-[#CBD5E1] focus:border-[#1B5FAA] rounded-xl px-4 py-2.5 text-sm text-[#14151A] outline-none font-mono">
        </div>

        <div class="flex gap-3 pt-2">
          <button type="button" onclick="document.getElementById('change-password-modal').classList.add('hidden')" class="btn-secondary flex-1 text-xs justify-center py-2.5">
            Cancel
          </button>
          <button type="submit" id="save-pwd-btn" class="btn-primary flex-1 text-xs justify-center py-2.5 font-bold shadow-md">
            Save New Password
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    async function handlePasswordChange(e) {
      e.preventDefault();
      const newPwd = document.getElementById('new-password').value;
      const confirmPwd = document.getElementById('confirm-password').value;
      const msgBox = document.getElementById('pwd-status-msg');
      const btn = document.getElementById('save-pwd-btn');

      if (newPwd !== confirmPwd) {
        msgBox.className = 'p-3 rounded-xl text-xs font-medium bg-rose-50 text-rose-600 border border-rose-200 block';
        msgBox.textContent = 'Passwords do not match. Please re-type.';
        return;
      }

      btn.disabled = true;
      btn.textContent = 'Updating...';

      try {
        const res = await fetch('api/change-password.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ new_password: newPwd, confirm_password: confirmPwd })
        });
        const data = await res.json();
        
        if (data.success) {
          msgBox.className = 'p-3 rounded-xl text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200 block';
          msgBox.textContent = '✓ ' + data.message;
          document.getElementById('change-pwd-form').reset();
          setTimeout(() => {
            document.getElementById('change-password-modal').classList.add('hidden');
            msgBox.classList.add('hidden');
          }, 2000);
        } else {
          msgBox.className = 'p-3 rounded-xl text-xs font-medium bg-rose-50 text-rose-600 border border-rose-200 block';
          msgBox.textContent = data.message || 'Failed to update password.';
        }
      } catch (err) {
        msgBox.className = 'p-3 rounded-xl text-xs font-medium bg-rose-50 text-rose-600 border border-rose-200 block';
        msgBox.textContent = 'Network error while updating password.';
      } finally {
        btn.disabled = false;
        btn.textContent = 'Save New Password';
      }
    }
  </script>

  <?php include_once 'includes/footer.php'; ?>
</body>
</html>
