<?php
/**
 * Digital4Local - Admin Logout Endpoint
 */
require_once __DIR__ . '/includes/auth-middleware.php';

admin_logout();
header("Location: admin-login.php?logged_out=1");
exit;
