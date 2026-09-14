<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../helpers/helpers.php';

class AuthController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function login()
    {
        if (!empty($_SESSION['user_id'])) {
            $this->redirectByRole($_SESSION['role'] ?? '');
        }

        $error = '';
        $login = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (function_exists('require_csrf')) {
                require_csrf();
            }

            $login = trim(
                $_POST['login']
                ?? $_POST['email']
                ?? $_POST['username']
                ?? ''
            );

            $password = $_POST['password'] ?? '';

            if ($login === '' || $password === '') {

                $error = 'Please enter your username/email and password.';

            } else {

                $user = $this->findUser($login);

                if (!$user) {

                    $error = 'Invalid username/email or password.';

                } elseif (!$this->verifyPassword($password, $user)) {

                    $error = 'Invalid username/email or password.';

                } elseif (
                    isset($user['status']) &&
                    strtolower((string)$user['status']) !== 'active'
                ) {

                    $error = 'Your account is inactive. Please contact the administrator.';

                } else {

                    session_regenerate_id(true);

                    $_SESSION['user_id'] = (int)$user['id'];

                    $_SESSION['role'] = strtolower(
                        (string)($user['role'] ?? '')
                    );

                    $_SESSION['user_name'] =
                        $user['name']
                        ?? $user['full_name']
                        ?? '';

                    $_SESSION['full_name'] =
                        $user['name']
                        ?? $user['full_name']
                        ?? '';

                    $_SESSION['user_email'] =
                        $user['email']
                        ?? '';

                    $_SESSION['username'] =
                        $user['username']
                        ?? '';

                    $_SESSION['last_activity'] = time();

                    unset(
                        $_SESSION['patient_id'],
                        $_SESSION['doctor_id'],
                        $_SESSION['receptionist_id']
                    );

                    if ($_SESSION['role'] === 'patient') {

                        $patient = $this->findPatient(
                            (int)$user['id']
                        );

                        if ($patient) {

                            $_SESSION['patient_id'] =
                                (int)$patient['id'];

                            $_SESSION['patient_name'] =
                                $patient['name']
                                ?? $patient['full_name']
                                ?? $_SESSION['user_name'];
                        }
                    }

                    if ($_SESSION['role'] === 'doctor') {

                        $doctor = $this->findDoctor(
                            (int)$user['id']
                        );

                        if ($doctor) {

                            $_SESSION['doctor_id'] =
                                (int)$doctor['id'];

                            $_SESSION['doctor_name'] =
                                $doctor['name']
                                ?? $doctor['full_name']
                                ?? $_SESSION['user_name'];
                        }
                    }

                    if ($_SESSION['role'] === 'receptionist') {

                        $receptionist = $this->findReceptionist(
                            (int)$user['id']
                        );

                        if ($receptionist) {

                            $_SESSION['receptionist_id'] =
                                (int)$receptionist['id'];

                            $_SESSION['receptionist_name'] =
                                $receptionist['name']
                                ?? $receptionist['full_name']
                                ?? $_SESSION['user_name'];
                        }
                    }

                    flash(
                        'success',
                        'Welcome to ' . APP_NAME . '.'
                    );

                    $this->redirectByRole(
                        $_SESSION['role']
                    );
                }
            }
        }

        if (function_exists('render_view')) {

            render_view(
                'auth/login',
                [
                    'error' => $error,
                    'login' => $login
                ]
            );

            return;
        }

        $this->renderLoginPage(
            $error,
            $login
        );
    }

    public function register()
    {
        $message = '';
        $message_type = '';
        $name = '';
        $email = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (function_exists('require_csrf')) {
                require_csrf();
            }

            $name = trim(
                $_POST['name'] ?? ''
            );

            $email = trim(
                $_POST['email'] ?? ''
            );

            $password = $_POST['password'] ?? '';

            $confirmPassword =
                $_POST['confirm_password'] ?? '';

            $role = strtolower(
                trim(
                    (string)($_POST['role'] ?? 'patient')
                )
            );

            $contact = trim(
                (string)($_POST['contact'] ?? '')
            );

            $specialization = trim(
                (string)($_POST['specialization'] ?? '')
            );

            if (
                !in_array(
                    $role,
                    ['patient', 'doctor', 'receptionist'],
                    true
                )
            ) {
                $role = 'patient';
            }

            if (
                $name === '' ||
                $email === '' ||
                $password === '' ||
                $confirmPassword === ''
            ) {

                $message =
                    'Please fill in all required fields.';

            } elseif (
                strlen($name) < 2 ||
                strlen($name) > 120
            ) {

                $message =
                    'Name must be between 2 and 120 characters.';

            } elseif (
                !filter_var(
                    $email,
                    FILTER_VALIDATE_EMAIL
                )
            ) {

                $message =
                    'Please enter a valid email address.';

            } elseif (
                $password !== $confirmPassword
            ) {

                $message =
                    'Passwords do not match.';

            } elseif (
                strlen($password) < 6
            ) {

                $message =
                    'Password must be at least 6 characters.';

            } elseif (
                in_array(
                    $role,
                    ['doctor', 'receptionist'],
                    true
                ) &&
                $contact === ''
            ) {

                $message =
                    'Contact number is required for this role.';

            } elseif (
                $role === 'doctor' &&
                $specialization === ''
            ) {

                $message =
                    'Specialization is required for doctors.';

            } elseif (
                $this->emailExists($email)
            ) {

                $message =
                    'An account with this email already exists.';

            } else {

                if (
                    $this->createAccount(
                        $name,
                        $email,
                        $password,
                        $role,
                        $contact,
                        $specialization
                    )
                ) {

                    header(
                        'Location: index.php?page=login&registered=1'
                    );

                    exit;

                } else {

                    $message =
                        'Registration failed. Please try again.';
                }
            }

            $message_type = 'error';
        }

        if (function_exists('render_view')) {

            render_view(
                'auth/register',
                [
                    'message' => $message,
                    'message_type' => $message_type,
                    'name' => $name,
                    'email' => $email
                ]
            );

            return;
        }

        $this->renderRegisterPage(
            $message,
            $message_type,
            $name,
            $email
        );
    }

    public function logout()
    {
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {

            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'] ?? '',
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();

        header(
            'Location: index.php?page=login'
        );

        exit;
    }

    private function findUser($login)
    {
        $stmt = mysqli_prepare(
            $this->conn,
            "SELECT
                id,
                name,
                email,
                username,
                password,
                password_hash,
                role,
                status
             FROM users
             WHERE email = ?
                OR username = ?
             LIMIT 1"
        );

        if (!$stmt) {
            return null;
        }

        mysqli_stmt_bind_param(
            $stmt,
            'ss',
            $login,
            $login
        );

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $user = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);

        return $user ?: null;
    }

    private function verifyPassword($password, $user)
    {
        if (
            !empty($user['password']) &&
            password_verify(
                $password,
                $user['password']
            )
        ) {
            return true;
        }

        if (
            !empty($user['password_hash']) &&
            password_verify(
                $password,
                $user['password_hash']
            )
        ) {
            return true;
        }

        return false;
    }

    private function emailExists($email)
    {
        $stmt = mysqli_prepare(
            $this->conn,
            "SELECT id
             FROM users
             WHERE email = ?
             LIMIT 1"
        );

        if (!$stmt) {
            return false;
        }

        mysqli_stmt_bind_param(
            $stmt,
            's',
            $email
        );

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $exists = mysqli_num_rows($result) > 0;

        mysqli_stmt_close($stmt);

        return $exists;
    }

    private function usernameExists($username)
    {
        $stmt = mysqli_prepare(
            $this->conn,
            "SELECT id
             FROM users
             WHERE username = ?
             LIMIT 1"
        );

        if (!$stmt) {
            return false;
        }

        mysqli_stmt_bind_param(
            $stmt,
            's',
            $username
        );

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $exists = mysqli_num_rows($result) > 0;

        mysqli_stmt_close($stmt);

        return $exists;
    }

    private function createAccount(
        string $name,
        string $email,
        string $password,
        string $role,
        string $contact = '',
        string $specialization = ''
    ): bool {

        $hash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $baseUsername = strtolower(
            preg_replace(
                '/[^a-zA-Z0-9]/',
                '',
                $name
            )
        ) ?: 'user';

        $username = $baseUsername;
        $counter = 1;

        while (
            $this->usernameExists($username)
        ) {

            $username =
                $baseUsername . $counter;

            $counter++;
        }

        mysqli_begin_transaction($this->conn);

        try {

            $stmt = mysqli_prepare(
                $this->conn,
                'INSERT INTO users
                 (name, email, username, password, password_hash, role, status)
                 VALUES (?, ?, ?, ?, ?, ?, "active")'
            );

            if (!$stmt) {
                throw new Exception(
                    'Could not prepare account creation.'
                );
            }

            mysqli_stmt_bind_param(
                $stmt,
                'ssssss',
                $name,
                $email,
                $username,
                $hash,
                $hash,
                $role
            );

            if (!mysqli_stmt_execute($stmt)) {

                $error = mysqli_stmt_error($stmt);

                mysqli_stmt_close($stmt);

                throw new Exception(
                    'Could not create account: ' . $error
                );
            }

            $userId = mysqli_insert_id(
                $this->conn
            );

            mysqli_stmt_close($stmt);

            if ($role === 'patient') {

                $patientCode =
                    'P' .
                    str_pad(
                        (string)$userId,
                        5,
                        '0',
                        STR_PAD_LEFT
                    );

                $stmt = mysqli_prepare(
                    $this->conn,
                    'INSERT INTO patients
                     (user_id, patient_code, name, full_name, phone, email, status)
                     VALUES (?, ?, ?, ?, ?, ?, "active")'
                );

                if (!$stmt) {
                    throw new Exception(
                        'Could not prepare patient profile.'
                    );
                }

                mysqli_stmt_bind_param(
                    $stmt,
                    'isssss',
                    $userId,
                    $patientCode,
                    $name,
                    $name,
                    $contact,
                    $email
                );

            } elseif ($role === 'doctor') {

                $doctorCode =
                    'DOC-' .
                    date('ymdHis') .
                    random_int(10, 99);

                $department = null;

                $stmt = mysqli_prepare(
                    $this->conn,
                    'INSERT INTO doctors
                     (user_id, doctor_code, name, full_name, specialization, phone, email, department_id, status)
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, "active")'
                );

                if (!$stmt) {
                    throw new Exception(
                        'Could not prepare doctor profile.'
                    );
                }

                mysqli_stmt_bind_param(
                    $stmt,
                    'issssssi',
                    $userId,
                    $doctorCode,
                    $name,
                    $name,
                    $specialization,
                    $contact,
                    $email,
                    $department
                );

            } else {

                $receptionistCode =
                    'REC-' .
                    date('ymdHis') .
                    random_int(10, 99);

                $stmt = mysqli_prepare(
                    $this->conn,
                    'INSERT INTO receptionists
                     (user_id, receptionist_code, name, full_name, phone, email, status)
                     VALUES (?, ?, ?, ?, ?, ?, "active")'
                );

                if (!$stmt) {
                    throw new Exception(
                        'Could not prepare receptionist profile.'
                    );
                }

                mysqli_stmt_bind_param(
                    $stmt,
                    'isssss',
                    $userId,
                    $receptionistCode,
                    $name,
                    $name,
                    $contact,
                    $email
                );
            }

            if (!mysqli_stmt_execute($stmt)) {

                $error = mysqli_stmt_error($stmt);

                mysqli_stmt_close($stmt);

                throw new Exception(
                    'Could not create role profile: ' . $error
                );
            }

            mysqli_stmt_close($stmt);

            mysqli_commit($this->conn);

            return true;

        } catch (Throwable $e) {

            mysqli_rollback($this->conn);

            return false;
        }
    }

    private function createPatientAccount(
        $name,
        $email,
        $password
    ) {
        return $this->createAccount(
            $name,
            $email,
            $password,
            'patient'
        );
    }

    private function findPatient($userId)
    {
        $stmt = mysqli_prepare(
            $this->conn,
            "SELECT
                id,
                name,
                full_name,
                patient_code
             FROM patients
             WHERE user_id = ?
             LIMIT 1"
        );

        if (!$stmt) {
            return null;
        }

        mysqli_stmt_bind_param(
            $stmt,
            'i',
            $userId
        );

        mysqli_stmt_execute($stmt);

        $result =
            mysqli_stmt_get_result($stmt);

        $patient =
            mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);

        return $patient ?: null;
    }

    private function findDoctor($userId)
    {
        $stmt = mysqli_prepare(
            $this->conn,
            "SELECT
                id,
                name,
                full_name,
                doctor_code
             FROM doctors
             WHERE user_id = ?
             LIMIT 1"
        );

        if (!$stmt) {
            return null;
        }

        mysqli_stmt_bind_param(
            $stmt,
            'i',
            $userId
        );

        mysqli_stmt_execute($stmt);

        $result =
            mysqli_stmt_get_result($stmt);

        $doctor =
            mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);

        return $doctor ?: null;
    }

    private function findReceptionist($userId)
    {
        $stmt = mysqli_prepare(
            $this->conn,
            "SELECT
                id,
                name,
                full_name,
                receptionist_code
             FROM receptionists
             WHERE user_id = ?
             LIMIT 1"
        );

        if (!$stmt) {
            return null;
        }

        mysqli_stmt_bind_param(
            $stmt,
            'i',
            $userId
        );

        mysqli_stmt_execute($stmt);

        $result =
            mysqli_stmt_get_result($stmt);

        $receptionist =
            mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);

        return $receptionist ?: null;
    }

    private function redirectByRole($role)
    {
        switch (
            strtolower(
                (string)$role
            )
        ) {

            case 'admin':

                header(
                    'Location: index.php?page=admin'
                );

                exit;

            case 'doctor':

                header(
                    'Location: index.php?page=doctor'
                );

                exit;

            case 'receptionist':

                header(
                    'Location: index.php?page=receptionist'
                );

                exit;

            case 'patient':

                header(
                    'Location: index.php?page=patient'
                );

                exit;

            default:

                header(
                    'Location: index.php?page=login'
                );

                exit;
        }
    }

    private function renderLoginPage(
        $error,
        $login
    ) {
        ?>

    <!doctype html>
    <html lang="en">

    <head>

        <meta charset="utf-8">

        <meta
            name="viewport"
            content="width=device-width,initial-scale=1"
        >

        <title>
            <?= e(APP_NAME) ?> Login
        </title>

        <link
            rel="stylesheet"
            href="assets/css/style.css"
        >

    </head>

    <body class="login-page">

    <div class="login-card">

        <h1>
            <?= e(APP_NAME) ?>
        </h1>

        <p>
            Smart Hospital Management System
        </p>

        <?php if ($error): ?>

            <div class="alert error">
                <?= e($error) ?>
            </div>

        <?php endif; ?>

        <?php if (isset($_GET['registered'])): ?>

            <div class="alert success">
                Registration successful.
                Please sign in.
            </div>

        <?php endif; ?>

        <form
            method="post"
            action="index.php?page=login"
        >

            <input
                type="hidden"
                name="csrf_token"
                value="<?= e(csrf_token()) ?>"
            >

            <label>
                Email or Username
            </label>

            <input
                type="text"
                name="login"
                value="<?= e($login) ?>"
                required
                autocomplete="username"
            >

            <label>
                Password
            </label>

            <input
                type="password"
                name="password"
                required
                autocomplete="current-password"
            >

            <button
                type="submit"
                class="btn primary full"
            >
                Sign In
            </button>

        </form>

        <p>
            Don't have an account?
            <a href="index.php?page=register">
                Register as Patient
            </a>
        </p>

    </div>

    <script src="assets/js/app.js"></script>

    </body>
    </html>

    <?php
    }

    private function renderRegisterPage(
        $message,
        $messageType,
        $name,
        $email
    ) {
        ?>

    <!doctype html>
    <html lang="en">

    <head>

        <meta charset="utf-8">

        <meta
            name="viewport"
            content="width=device-width,initial-scale=1"
        >

        <title>
            <?= e(APP_NAME) ?> Registration
        </title>

        <link
            rel="stylesheet"
            href="assets/css/style.css"
        >

    </head>

    <body class="login-page">

    <div class="login-card">

        <h1>
            <?= e(APP_NAME) ?>
        </h1>

        <p>
            Patient Registration
        </p>

        <?php if ($message): ?>

            <div class="alert <?= e($messageType) ?>">
                <?= e($message) ?>
            </div>

        <?php endif; ?>

        <form
            method="post"
            action="index.php?page=register"
        >

            <input
                type="hidden"
                name="csrf_token"
                value="<?= e(csrf_token()) ?>"
            >

            <label>
                Full Name
            </label>

            <input
                type="text"
                name="name"
                value="<?= e($name) ?>"
                required
            >

            <label>
                Email
            </label>

            <input
                type="email"
                name="email"
                value="<?= e($email) ?>"
                required
            >

            <label>
                Password
            </label>

            <input
                type="password"
                name="password"
                required
                minlength="6"
            >

            <label>
                Confirm Password
            </label>

            <input
                type="password"
                name="confirm_password"
                required
                minlength="6"
            >

            <button
                type="submit"
                class="btn primary full"
            >
                Register
            </button>

        </form>

        <p>
            Already have an account?
            <a href="index.php?page=login">
                Sign In
            </a>
        </p>

    </div>

    <script src="assets/js/app.js"></script>

    </body>
    </html>

    <?php
    }
}
?>