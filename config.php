<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'meditrack');

define('APP_NAME', 'MEDITrack');
define('APP_URL', 'http://localhost/MEDITrack');
define('SESSION_TIMEOUT', 1800);

date_default_timezone_set('Asia/Dhaka');

mysqli_report(MYSQLI_REPORT_OFF);

if (session_status() === PHP_SESSION_NONE) {
    $secure = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';

    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => $secure,
        'httponly' => true,
        'samesite' => 'Lax'
    ]);

    session_start();
}

$conn = mysqli_connect(
    DB_HOST,
    DB_USER,
    DB_PASS,
    DB_NAME
);

if (!$conn) {
    die(
        'Database connection failed. Did you import the MEDITrack database? Details: ' .
        mysqli_connect_error()
    );
}

mysqli_set_charset($conn, 'utf8mb4');

if (isset($_SESSION['user_id'], $_SESSION['last_activity'])) {
    if (time() - $_SESSION['last_activity'] > SESSION_TIMEOUT) {
        session_unset();
        session_destroy();

        session_start();

        $_SESSION['flash_error'] =
            'Your session expired. Please sign in again.';
    }
}

if (isset($_SESSION['user_id'])) {
    $_SESSION['last_activity'] = time();
}