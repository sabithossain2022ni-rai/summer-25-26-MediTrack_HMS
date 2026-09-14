<?php

require_once __DIR__ . '/config/config.php';

$password = 'Admin@123';
$hash = password_hash($password, PASSWORD_DEFAULT);

$name = 'Administrator';
$email = 'admin@meditrack.com';
$username = 'admin';

$stmt = mysqli_prepare(
    $conn,
    'INSERT INTO users
     (name, email, username, password, password_hash, role, status)
     VALUES (?, ?, ?, ?, ?, "admin", "active")
     ON DUPLICATE KEY UPDATE
        name=VALUES(name),
        password=VALUES(password),
        password_hash=VALUES(password_hash),
        role="admin",
        status="active"'
);

if (!$stmt) {
    exit('Could not prepare admin account: ' . mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt,
    'sssss',
    $name,
    $email,
    $username,
    $hash,
    $hash
);

if (mysqli_stmt_execute($stmt)) {
    echo 'Admin account is ready.<br><br>';
    echo 'Email: admin@meditrack.com<br>';
    echo 'Username: admin<br>';
    echo 'Password: Admin@123';
} else {
    echo 'Failed to create admin: ' . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
