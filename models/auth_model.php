<?php
function find_user_by_username(mysqli $conn, string $username): ?array {
    $sql = 'SELECT * FROM users WHERE username = ? LIMIT 1';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result) ?: null;
    mysqli_stmt_close($stmt);
    return $user;
}
