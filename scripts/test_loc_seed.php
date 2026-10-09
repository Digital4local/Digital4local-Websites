<?php
require_once __DIR__ . '/../includes/db.php';
$pdo = get_db();
echo "Driver: " . $pdo->getAttribute(PDO::ATTR_DRIVER_NAME) . "\n";
$cnt = (int)$pdo->query("SELECT count(*) FROM location_pages")->fetchColumn();
echo "Current location_pages count: " . $cnt . "\n";
if ($cnt === 0) {
    echo "Running seed...\n";
    seed_db_from_json($pdo);
    $cnt2 = (int)$pdo->query("SELECT count(*) FROM location_pages")->fetchColumn();
    echo "After seed location_pages count: " . $cnt2 . "\n";
}
