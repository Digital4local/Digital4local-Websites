<?php
/**
 * Digital4Local - Central Database Configuration
 * Supports MySQL / MariaDB (production / local XAMPP) and SQLite (zero-config fallback).
 * 
 * Edit MySQL parameters here or in your hosting control panel (cPanel / Hostinger).
 */

return [
    // Preferred database driver: 'mysql' (recommended for live server / XAMPP) or 'sqlite'
    'driver' => getenv('DB_DRIVER') ?: 'mysql',

    'mysql' => [
        'host' => getenv('DB_HOST') ?: '127.0.0.1',
        'port' => (int)(getenv('DB_PORT') ?: 3306),
        'database' => getenv('DB_NAME') ?: 'digital4local_db',
        'username' => getenv('DB_USER') ?: 'root',
        'password' => getenv('DB_PASS') !== false ? getenv('DB_PASS') : '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
        ]
    ],

    'sqlite' => [
        'path' => __DIR__ . '/database.sqlite',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    ]
];
