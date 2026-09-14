<?php

function e($value): string
{
    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES,
        'UTF-8'
    );
}

function esc($value): string
{
    return htmlspecialchars(
        (string)$value,
        ENT_QUOTES,
        'UTF-8'
    );
}

function redirect(string $url): never
{
    header('Location: ' . $url);
    exit;
}

function is_logged_in(): bool
{
    return !empty($_SESSION['user_id']);
}

function require_role(string $role): void
{
    if (
        !is_logged_in() ||
        ($_SESSION['role'] ?? '') !== $role
    ) {
        redirect('index.php?page=login');
    }

    check_session_timeout();
}

function require_admin(): void
{
    require_role('admin');
}

function require_doctor(): void
{
    require_role('doctor');
}

function require_receptionist(): void
{
    require_role('receptionist');
}

function require_patient(): int
{
    require_role('patient');

    return (int)$_SESSION['user_id'];
}

function require_patient_ajax(): int
{
    if (
        !is_logged_in() ||
        ($_SESSION['role'] ?? '') !== 'patient'
    ) {
        json_response([
            'success' => false,
            'message' => 'Unauthorized.'
        ], 401);
    }

    check_session_timeout(true);

    return (int)$_SESSION['user_id'];
}

function check_session_timeout(bool $json = false): void
{
    if (
        defined('SESSION_TIMEOUT') &&
        !empty($_SESSION['last_activity']) &&
        time() - $_SESSION['last_activity'] > SESSION_TIMEOUT
    ) {

        $_SESSION = [];

        if ($json) {
            json_response([
                'success' => false,
                'message' => 'Session expired. Please sign in again.'
            ], 401);
        }

        redirect('index.php?page=login');
    }

    if (is_logged_in()) {
        $_SESSION['last_activity'] = time();
    }
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {

        $_SESSION['csrf_token'] =
            bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function verify_csrf(): bool
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return true;
    }

    $token =
        $_POST['csrf_token']
        ?? $_POST['csrf']
        ?? $_SERVER['HTTP_X_CSRF_TOKEN']
        ?? '';

    if (
        !is_string($token) ||
        empty($_SESSION['csrf_token']) ||
        !hash_equals(
            $_SESSION['csrf_token'],
            $token
        )
    ) {
        return false;
    }

    return true;
}

function require_csrf(): void
{
    if (!verify_csrf()) {

        http_response_code(419);

        exit(
            'Invalid CSRF token. Please refresh the page and try again.'
        );
    }
}

function json_response(
    array $data,
    int $status = 200
): never
{
    http_response_code($status);

    header(
        'Content-Type: application/json; charset=utf-8'
    );

    echo json_encode(
        $data,
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

function flash(
    string $type,
    string $message
): void
{
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message
    ];
}

function get_flash(): ?array
{
    $flash =
        $_SESSION['flash']
        ?? null;

    unset($_SESSION['flash']);

    return $flash;
}

function post(
    string $key,
    $default = ''
): string
{
    return trim(
        (string)($_POST[$key] ?? $default)
    );
}

function old(
    string $key,
    $default = ''
): string
{
    return e(
        $_POST[$key] ?? $default
    );
}

function money($number): string
{
    return number_format(
        (float)$number,
        2
    );
}

function stock_status(
    float $current,
    float $minimum,
    float $critical
): string
{
    if ($current <= $critical) {
        return 'Critical';
    }

    if ($current <= $minimum) {
        return 'Low';
    }

    return 'Normal';
}

function validate_required(
    array $data,
    array $fields
): array
{
    $errors = [];

    foreach ($fields as $field => $label) {

        if (
            trim(
                (string)($data[$field] ?? '')
            ) === ''
        ) {
            $errors[] =
                $label . ' is required.';
        }
    }

    return $errors;
}

function render_view(
    string $view,
    array $data = []
): void
{
    extract($data);

    require __DIR__ .
        '/../views/' .
        $view .
        '.php';
}

