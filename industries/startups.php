<?php
/**
 * Backward-compatible redirect / alias for legacy URL
 */
header("HTTP/1.1 301 Moved Permanently");
header("Location: startup-seo-agency.php");
require_once __DIR__ . '/startup-seo-agency.php';
exit;
