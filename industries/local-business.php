<?php
/**
 * Backward-compatible redirect / alias for legacy URL
 */
header("HTTP/1.1 301 Moved Permanently");
header("Location: local-business-seo.php");
require_once __DIR__ . '/local-business-seo.php';
exit;
