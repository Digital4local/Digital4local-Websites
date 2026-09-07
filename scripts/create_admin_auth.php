<?php
$auth_file = __DIR__ . '/../config/admin_auth.json';

$password = 'Digital4Local@2026!';
$hash = password_hash($password, PASSWORD_BCRYPT);

$auth_data = [
    'users' => [
        [
            'id' => 'USR-001',
            'username' => 'admin',
            'email' => 'admin@digital4local.com',
            'name' => 'Abhishek Raikwar',
            'role' => 'Super Admin',
            'password_hash' => $hash,
            'created_at' => date('Y-m-d H:i:s'),
            'last_login' => null
        ],
        [
            'id' => 'USR-002',
            'username' => 'abhishek',
            'email' => 'abhishek@digital4local.com',
            'name' => 'Abhishek Raikwar',
            'role' => 'Founder & Principal Search Engineer',
            'password_hash' => $hash,
            'created_at' => date('Y-m-d H:i:s'),
            'last_login' => null
        ]
    ],
    'session_lifetime_minutes' => 180,
    'max_login_attempts' => 5
];

file_put_contents($auth_file, json_encode($auth_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
echo "admin_auth.json created successfully with bcrypt hashes!\n";
echo "Password verified: " . (password_verify($password, $hash) ? "YES" : "NO") . "\n";
