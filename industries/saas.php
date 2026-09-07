<?php
/**
 * Backward-compatible redirect / alias for legacy URL
 */
header("HTTP/1.1 301 Moved Permanently");
header("Location: saas-marketing-agency.php");
require_once __DIR__ . '/saas-marketing-agency.php';
exit;
