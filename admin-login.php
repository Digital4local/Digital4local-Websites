<?php
/**
 * Digital4Local - Command Center & CMS Admin Login Portal
 */
require_once __DIR__ . '/includes/auth-middleware.php';
require_once __DIR__ . '/includes/site-config.php';

start_admin_session();

$redirect_target = $_GET['redirect'] ?? 'admin.php';
if (empty($redirect_target) || strpos($redirect_target, 'admin-login') !== false) {
    $redirect_target = 'admin.php';
}

// If already logged in, redirect straight to target
if (is_admin_logged_in()) {
    header("Location: " . $redirect_target);
    exit;
}

$error_message = '';
$success_message = '';

if (isset($_GET['logged_out'])) {
    $success_message = 'You have been securely signed out.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $result = authenticate_admin($identifier, $password);
    if ($result['success']) {
        header("Location: " . $redirect_target);
        exit;
    } else {
        $error_message = $result['message'] ?? 'Authentication failed.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | Digital4Local Command Center</title>
  <meta name="robots" content="noindex, nofollow">
  <link rel="icon" type="image/png" href="assets/images/digital4local_logo.png">

  <!-- Tailwind CSS & Fonts -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/lucide@latest"></script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: radial-gradient(circle at 50% 0%, #1E293B 0%, #0F172A 50%, #0A0E1A 100%);
    }
    .login-card {
      background: rgba(30, 41, 59, 0.7);
      backdrop-filter: blur(16px);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .glow-cyan {
      box-shadow: 0 0 40px -10px rgba(0, 180, 216, 0.3);
    }
  </style>
</head>
<body class="min-h-screen text-slate-100 flex items-center justify-center p-4 relative overflow-hidden">

  <!-- Ambient Light Orbs -->
  <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-[#1B5FAA]/20 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-[#00B4D8]/15 rounded-full blur-3xl pointer-events-none"></div>

  <div class="w-full max-w-md relative z-10 space-y-8">
    
    <!-- Brand Logo & Header -->
    <div class="text-center space-y-3">
      <div class="inline-block p-3 bg-white/10 rounded-2xl border border-white/10 backdrop-blur-md shadow-lg mb-2">
        <img src="assets/images/digital4local_logo.png" alt="Digital4Local Logo" class="h-10 w-auto object-contain mx-auto brightness-110">
      </div>
      <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-['Montserrat',sans-serif] tracking-tight">
        Command Center Portal
      </h1>
      <p class="text-xs text-slate-400 font-mono">
        ENTERPRISE ACCESS • DIGITAL4LOCAL MANAGEMENT
      </p>
    </div>

    <!-- Login Card -->
    <div class="login-card p-8 rounded-3xl shadow-2xl glow-cyan space-y-6">

      <!-- Alerts -->
      <?php if (!empty($error_message)): ?>
      <div class="p-3.5 bg-rose-500/15 border border-rose-500/30 rounded-xl text-rose-300 text-xs flex items-center gap-2.5">
        <i data-lucide="alert-circle" class="w-4 h-4 shrink-0 text-rose-400"></i>
        <span><?php echo htmlspecialchars($error_message); ?></span>
      </div>
      <?php endif; ?>

      <?php if (!empty($success_message)): ?>
      <div class="p-3.5 bg-emerald-500/15 border border-emerald-500/30 rounded-xl text-emerald-300 text-xs flex items-center gap-2.5">
        <i data-lucide="check-circle-2" class="w-4 h-4 shrink-0 text-emerald-400"></i>
        <span><?php echo htmlspecialchars($success_message); ?></span>
      </div>
      <?php endif; ?>

      <form method="POST" action="" class="space-y-5">
        
        <!-- Username / Email Field -->
        <div class="space-y-1.5">
          <label class="block text-xs font-mono font-semibold text-slate-300 uppercase tracking-wider">
            Admin Email or Username
          </label>
          <div class="relative flex items-center">
            <div class="absolute left-3.5 text-slate-400 pointer-events-none">
              <i data-lucide="user" class="w-4 h-4"></i>
            </div>
            <input 
              type="text" 
              name="username" 
              required 
              autofocus
              value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>"
              placeholder="Enter admin email or username" 
              class="w-full bg-slate-900/80 border border-slate-700/80 focus:border-[#00B4D8] focus:ring-2 focus:ring-[#00B4D8]/20 rounded-xl pl-10 pr-4 py-3 text-sm text-white placeholder-slate-500 outline-none transition-all font-mono"
            >
          </div>
        </div>

        <!-- Password Field with Show/Hide Toggle -->
        <div class="space-y-1.5">
          <div class="flex items-center justify-between">
            <label class="block text-xs font-mono font-semibold text-slate-300 uppercase tracking-wider">
              Password
            </label>
            <span class="text-[11px] text-slate-500 font-mono">Bcrypt Secured</span>
          </div>
          <div class="relative flex items-center">
            <div class="absolute left-3.5 text-slate-400 pointer-events-none">
              <i data-lucide="lock" class="w-4 h-4"></i>
            </div>
            <input 
              type="password" 
              name="password" 
              id="password-input"
              required 
              placeholder="••••••••••••" 
              class="w-full bg-slate-900/80 border border-slate-700/80 focus:border-[#00B4D8] focus:ring-2 focus:ring-[#00B4D8]/20 rounded-xl pl-10 pr-11 py-3 text-sm text-white placeholder-slate-500 outline-none transition-all font-mono"
            >
            <button 
              type="button" 
              id="toggle-password-btn" 
              class="absolute right-3.5 text-slate-400 hover:text-white transition-colors"
              aria-label="Toggle password visibility"
            >
              <i data-lucide="eye" id="eye-icon" class="w-4 h-4"></i>
            </button>
          </div>
        </div>

        <!-- Remember Me Checkbox -->
        <div class="flex items-center justify-between text-xs pt-1">
          <label class="flex items-center gap-2 cursor-pointer text-slate-400 hover:text-slate-300">
            <input type="checkbox" name="remember" checked class="rounded bg-slate-800 border-slate-700 text-[#00B4D8] focus:ring-0">
            <span>Keep session active (3 Hours)</span>
          </label>
        </div>

        <!-- Submit Button -->
        <button 
          type="submit" 
          class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-[#1B5FAA] via-[#00B4D8] to-[#10B981] text-white font-bold text-sm tracking-wide shadow-lg hover:shadow-cyan-500/25 hover:scale-[1.01] active:scale-[0.99] transition-all flex items-center justify-center gap-2"
        >
          <i data-lucide="shield-check" class="w-4 h-4"></i>
          Sign In to Command Center
        </button>

      </form>

    </div>

    <!-- Security Footer -->
    <div class="text-center text-xs text-slate-500 font-mono space-y-1">
      <div>🔒 256-Bit SSL Encrypted Admin Gateway</div>
      <div>© 2026 Digital4Local. Authorized Personnel Only.</div>
    </div>

  </div>

  <script>
    // Initialize Lucide icons
    lucide.createIcons();

    // Password show/hide toggle
    const pwdInput = document.getElementById('password-input');
    const toggleBtn = document.getElementById('toggle-password-btn');
    const eyeIcon = document.getElementById('eye-icon');

    toggleBtn.addEventListener('click', () => {
      if (pwdInput.type === 'password') {
        pwdInput.type = 'text';
        eyeIcon.setAttribute('data-lucide', 'eye-off');
      } else {
        pwdInput.type = 'password';
        eyeIcon.setAttribute('data-lucide', 'eye');
      }
      lucide.createIcons();
    });
  </script>
</body>
</html>
