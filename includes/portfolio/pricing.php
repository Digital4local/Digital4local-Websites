<?php
/**
 * Pricing Section Component with Dynamic 3-Way Billing Toggle & Expandable Comparison Matrix
 */
$pricing_cfg = $p_cfg['pricing'];
$plans = $pricing_cfg['plans'];
$clean_phone = $p_cfg['whatsapp_number_clean'];
$matrix = $p_cfg['comparison_matrix'];
?>
<section class="py-20 sm:py-28 bg-[#F6F8FB] border-y border-[#E4E7EC] relative overflow-hidden" id="pricing">
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-[#00F0FF]/15 text-[#008A94] border border-[#00F0FF]/30 mb-4">
        <i data-lucide="tag" class="w-3.5 h-3.5"></i>
        <span>Transparent Investment</span>
      </div>
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#14151A] tracking-tight font-display mb-4">
        Simple plans. <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00A8B5] via-[#00F0FF] to-[#0284C7]">Serious growth.</span>
      </h2>
      <p class="text-base sm:text-lg text-[#5B5F6B] leading-relaxed">
        All plans include strategy, management, reporting, and a dedicated Bhopal team. <?php echo htmlspecialchars($pricing_cfg['gst_note']); ?>
      </p>
    </div>

    <!-- 3-Way Billing Toggle Bar -->
    <div class="flex justify-center mb-14" data-aos="fade-up">
      <div class="inline-flex p-1.5 bg-[#FFFFFF] border-2 border-[#E4E7EC] rounded-full shadow-md max-w-full overflow-x-auto" id="billing-toggle-container" role="radiogroup" aria-label="Billing Frequency">
        
        <!-- Option 1: Monthly -->
        <button type="button" class="billing-btn active px-4 sm:px-6 py-2 rounded-full text-xs sm:text-sm font-bold text-[#14151A] bg-[#00F0FF]/15 border border-[#00A8B5] transition-all" data-billing="monthly">
          <span>Monthly</span>
        </button>

        <!-- Option 2: 6 Months (Save 10% + Free Setup) -->
        <button type="button" class="billing-btn px-4 sm:px-6 py-2 rounded-full text-xs sm:text-sm font-bold text-[#5B5F6B] hover:text-[#14151A] transition-all relative flex items-center gap-1.5" data-billing="six_month">
          <span>6 Months</span>
          <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase bg-emerald-100 text-emerald-700 border border-emerald-300">
            Save 10%
          </span>
        </button>

        <!-- Option 3: Annual (2 Months Free) -->
        <button type="button" class="billing-btn px-4 sm:px-6 py-2 rounded-full text-xs sm:text-sm font-bold text-[#5B5F6B] hover:text-[#14151A] transition-all relative flex items-center gap-1.5" data-billing="annual">
          <span>Annual</span>
          <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase bg-indigo-100 text-indigo-700 border border-indigo-300">
            2 Mo Free
          </span>
        </button>

      </div>
    </div>

    <!-- 3 Pricing Cards Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch mb-12">
      <?php foreach ($plans as $idx => $plan): 
        $is_pop = $plan['is_popular'];
        $base_p = $plan['price_monthly'];
        $six_p = round(($base_p * 0.9) / 100) * 100 - 1; // Nearest ₹99-ending
        $annual_p = round(($base_p * 10 / 12) / 100) * 100 - 1; // 2 months free equivalent/mo
        $annual_total = $base_p * 10;
      ?>
        <div class="plan-card relative rounded-3xl p-7 sm:p-9 flex flex-col justify-between transition-all duration-300 shadow-md hover:shadow-2xl <?php echo $is_pop ? 'bg-[#FFFFFF] border-2 border-[#00A8B5] ring-4 ring-[#00F0FF]/20 lg:-translate-y-2 z-10' : 'bg-[#FFFFFF] border border-[#E4E7EC] hover:border-[#00A8B5]'; ?>" data-aos="fade-up" data-aos-delay="<?php echo $idx * 100; ?>">
          
          <!-- Popular Ribbon -->
          <?php if ($is_pop): ?>
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-[#00A8B5] to-[#0284C7] text-white text-xs font-black px-4 py-1 rounded-full uppercase tracking-wider shadow-lg flex items-center gap-1">
              <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
              <span>Most Popular Choice</span>
            </div>
          <?php endif; ?>

          <div>
            <!-- Plan Header -->
            <div class="flex items-start justify-between gap-2 mb-4">
              <div>
                <h3 class="text-2xl font-extrabold text-[#14151A] tracking-tight">
                  <?php echo htmlspecialchars($plan['name']); ?>
                </h3>
                <p class="text-xs text-[#5B5F6B] mt-1 font-medium">
                  <?php echo htmlspecialchars($plan['tagline']); ?>
                </p>
              </div>
            </div>

            <!-- Best For Tag -->
            <div class="mb-6 p-2.5 rounded-xl bg-[#F6F8FB] border border-[#E4E7EC] text-[11px] text-[#5B5F6B]">
              <strong class="text-[#14151A]">Best for:</strong> <?php echo htmlspecialchars($plan['best_for']); ?>
            </div>

            <!-- Price Display (Dynamic JS-hooked) -->
            <div class="mb-6 pb-6 border-b border-[#E4E7EC]">
              <div class="flex items-baseline gap-1">
                <span class="text-2xl font-black text-[#14151A]">₹</span>
                <span class="price-val text-4xl sm:text-5xl font-black text-[#14151A] tracking-tight" 
                      data-monthly="<?php echo number_format($base_p); ?>" 
                      data-six="<?php echo number_format($six_p); ?>" 
                      data-annual="<?php echo number_format($annual_p); ?>">
                  <?php echo number_format($base_p); ?>
                </span>
                <span class="text-sm font-bold text-[#5B5F6B]">/ month</span>
              </div>

              <!-- Billing Note Subtext -->
              <div class="billing-note text-[11px] text-[#008A94] font-semibold mt-1.5"
                   data-monthly="Billed monthly · Min 3 months"
                   data-six="Billed ₹<?php echo number_format($six_p * 6); ?> every 6 months (Free Setup)"
                   data-annual="Billed ₹<?php echo number_format($annual_total); ?> yearly (Pay for 10 months only)">
                Billed monthly · Min 3 months
              </div>
            </div>

            <!-- Features List -->
            <ul class="space-y-3 mb-8" role="list">
              <?php foreach ($plan['features'] as $f_idx => $feat): 
                $is_heading = strpos($feat, 'Everything in') === 0;
              ?>
                <li class="flex items-start gap-2.5 text-xs sm:text-sm <?php echo $is_heading ? 'font-bold text-[#008A94] bg-[#00F0FF]/10 p-2 rounded-lg' : 'text-[#5B5F6B]'; ?>">
                  <?php if (!$is_heading): ?>
                    <i data-lucide="check" class="w-4 h-4 text-[#16A34A] shrink-0 mt-0.5 font-bold"></i>
                  <?php else: ?>
                    <i data-lucide="plus-circle" class="w-4 h-4 text-[#008A94] shrink-0 mt-0.5"></i>
                  <?php endif; ?>
                  <span><?php echo htmlspecialchars($feat); ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <!-- Plan Action CTA Button -->
          <div class="pt-4 border-t border-[#E4E7EC]">
            <?php 
              $default_msg = "Hi Digital4Local, I'm interested in the {$plan['name']} plan (Monthly billing).";
              $default_wa = "https://wa.me/{$clean_phone}?text=" . urlencode($default_msg);
            ?>
            <a href="<?php echo $default_wa; ?>" 
               target="_blank" 
               rel="noopener noreferrer" 
               class="plan-cta-btn <?php echo $is_pop ? 'btn-primary' : 'btn-secondary'; ?> w-full !py-3.5 !text-sm text-center font-bold"
               data-plan-name="<?php echo htmlspecialchars($plan['name']); ?>">
              <span><?php echo htmlspecialchars($plan['cta_text']); ?></span>
              <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

    <!-- Small Print Under Pricing Cards -->
    <div class="text-center text-xs text-[#5B5F6B] max-w-3xl mx-auto mb-10">
      <p><?php echo htmlspecialchars($pricing_cfg['setup_fee_note']); ?></p>
    </div>

    <!-- Expandable Full Feature Comparison Table -->
    <div class="bg-white border-2 border-[#E4E7EC] rounded-3xl p-6 sm:p-8 shadow-md" data-aos="fade-up">
      
      <!-- Accordion Header -->
      <button type="button" id="toggle-comparison-matrix-btn" class="w-full flex items-center justify-between gap-4 text-left focus:outline-none group">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-[#00F0FF]/15 text-[#008A94] flex items-center justify-center shrink-0">
            <i data-lucide="sliders-horizontal" class="w-5 h-5"></i>
          </div>
          <div>
            <h4 class="text-base sm:text-lg font-bold text-[#14151A] group-hover:text-[#00A8B5] transition-colors">
              Compare all features across Launch, Growth & Leader
            </h4>
            <p class="text-xs text-[#5B5F6B]">Click to expand full feature breakdown matrix</p>
          </div>
        </div>

        <div class="w-8 h-8 rounded-full bg-[#F6F8FB] border border-[#E4E7EC] flex items-center justify-center shrink-0 group-hover:bg-[#00F0FF]/20 transition-all">
          <i data-lucide="chevron-down" id="matrix-chevron" class="w-4 h-4 text-[#14151A] transition-transform duration-300"></i>
        </div>
      </button>

      <!-- Collapsible Content -->
      <div id="comparison-matrix-content" class="hidden mt-8 pt-6 border-t border-[#E4E7EC] overflow-x-auto">
        <table class="w-full text-left text-xs sm:text-sm border-collapse min-w-[600px]">
          <thead>
            <tr class="border-b-2 border-[#E4E7EC] text-xs font-black uppercase text-[#5B5F6B] tracking-wider">
              <th class="pb-3 w-2/5">Deliverable</th>
              <th class="pb-3 w-1/5 text-center">Launch</th>
              <th class="pb-3 w-1/5 text-center text-[#008A94] font-black">Growth ⭐</th>
              <th class="pb-3 w-1/5 text-center text-indigo-700 font-black">Leader</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#E4E7EC]">
            <?php foreach ($matrix as $cat_title => $cat_items): ?>
              <!-- Category Header Row -->
              <tr class="bg-[#F6F8FB]/80 font-bold text-[#14151A]">
                <td colspan="4" class="py-2.5 px-3 text-xs uppercase tracking-wide text-[#008A94]">
                  <?php echo htmlspecialchars($cat_title); ?>
                </td>
              </tr>

              <?php foreach ($cat_items as $item_name => $plan_values): ?>
                <tr class="hover:bg-slate-50 transition-colors">
                  <td class="py-3 px-3 font-semibold text-[#14151A]">
                    <?php echo htmlspecialchars($item_name); ?>
                  </td>
                  <td class="py-3 px-3 text-center text-[#5B5F6B]">
                    <?php echo htmlspecialchars($plan_values['Launch']); ?>
                  </td>
                  <td class="py-3 px-3 text-center font-bold text-[#008A94] bg-[#00F0FF]/5">
                    <?php echo htmlspecialchars($plan_values['Growth']); ?>
                  </td>
                  <td class="py-3 px-3 text-center font-bold text-indigo-700">
                    <?php echo htmlspecialchars($plan_values['Leader']); ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>

  </div>
</section>
