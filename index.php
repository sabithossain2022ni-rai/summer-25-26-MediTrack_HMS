<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/helpers/helpers.php';

if (file_exists(__DIR__ . '/controllers/AuthController.php')) {
    require_once __DIR__ . '/controllers/AuthController.php';
}

$page = $_GET['page'] ?? '';
$action = $_GET['action'] ?? '';
$controller = $_GET['controller'] ?? '';

if ($page === 'logout' || isset($_GET['logout'])) {

    if (class_exists('AuthController')) {
        $auth = new AuthController($conn);
        $auth->logout();
        exit;
    }

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

    header('Location: index.php?page=login');
    exit;
}

if ($page === 'ajax') {
    require_once __DIR__ . '/controllers/ajax_controller.php';
    exit;
}

if ($page === 'login') {

    if (!class_exists('AuthController')) {
        http_response_code(500);
        exit('AuthController.php is missing.');
    }

    $auth = new AuthController($conn);
    $auth->login();
    exit;
}

if ($page === 'register') {

    if (!class_exists('AuthController')) {
        http_response_code(500);
        exit('AuthController.php is missing.');
    }

    $auth = new AuthController($conn);
    $auth->register();
    exit;
}

if ($controller === 'doctor' || in_array($page, ['doctor','patients','patient_add','patient_edit','patient_view','risks','risk_add','risk_edit','prescriptions','prescription_add','prescription_edit','followups','followup_add','followup_edit'], true)) {

    require_doctor();

    $doctorController =
        __DIR__ . '/controllers/doctor_controller.php';

    if (!file_exists($doctorController)) {
        http_response_code(500);
        exit('doctor_controller.php is missing.');
    }

    require_once $doctorController;
    exit;
}

if ($page === 'admin') {

    require_admin();

    $adminController =
        __DIR__ . '/controllers/admin_controller.php';

    if (!file_exists($adminController)) {
        http_response_code(500);
        exit('admin_controller.php is missing.');
    }

    require_once $adminController;

    if (function_exists('render_admin_page')) {

        $section =
            $_GET['section']
            ?? $_GET['view']
            ?? 'dashboard';

        $allowedSections = [
            'dashboard',
            'people',
            'departments',
            'costs',
            'resources',
            'stock',
            'settings'
        ];

        if (!in_array($section, $allowedSections, true)) {
            $section = 'dashboard';
        }

        render_admin_page($section);
        exit;
    }

    if (function_exists('admin_controller')) {
        admin_controller($conn, $action);
        exit;
    }

    if (function_exists('handle_action') && $action !== '') {
        handle_action($action);
        exit;
    }

    http_response_code(500);
    exit('Admin controller is not configured correctly.');
}

if ($page === 'receptionist') {

    require_receptionist();

    $receptionistController =
        __DIR__ . '/controllers/receptionist_controller.php';

    if (!file_exists($receptionistController)) {
        http_response_code(500);
        exit('receptionist_controller.php is missing.');
    }

    require_once $receptionistController;

    if (function_exists('receptionist_controller')) {
        receptionist_controller($conn, $action);
        exit;
    }

    if (function_exists('handle_action') && $action !== '') {
        handle_action($action);
        exit;
    }

    http_response_code(500);
    exit(
        'Receptionist controller is not configured correctly.'
    );
}

if ($page === 'patient') {

    require_patient();

    $patientControllerFile =
        __DIR__ . '/controllers/patient_controller.php';

    if (!file_exists($patientControllerFile)) {
        http_response_code(500);
        exit('patient_controller.php is missing.');
    }

    require_once $patientControllerFile;

    if (!class_exists('PatientController')) {
        http_response_code(500);
        exit('PatientController class is missing.');
    }

    $patientController =
        new PatientController($conn);

    if (method_exists($patientController, 'dashboard')) {
        $patientController->dashboard();
        exit;
    }

    http_response_code(500);
    exit('Patient dashboard method is missing.');
}

if (
    in_array(
        $page,
        [
            'profile',
            'symptoms',
            'followups',
            'appointments'
        ],
        true
    )
) {

    require_patient();

    $patientControllerFile =
        __DIR__ . '/controllers/patient_controller.php';

    if (!file_exists($patientControllerFile)) {
        http_response_code(500);
        exit('patient_controller.php is missing.');
    }

    require_once $patientControllerFile;

    if (!class_exists('PatientController')) {
        http_response_code(500);
        exit('PatientController class is missing.');
    }

    $patientController =
        new PatientController($conn);

    switch ($page) {

        case 'profile':

            if (method_exists($patientController, 'profile')) {
                $patientController->profile();
                exit;
            }

            break;

        case 'symptoms':

            if (method_exists($patientController, 'symptoms')) {
                $patientController->symptoms();
                exit;
            }

            break;

        case 'followups':

            if (method_exists($patientController, 'followups')) {
                $patientController->followups();
                exit;
            }

            break;

        case 'appointments':

            if (method_exists($patientController, 'appointments')) {
                $patientController->appointments();
                exit;
            }

            break;
    }

    http_response_code(500);
    exit('Requested patient page is not available.');
}

if (!empty($_SESSION['user_id']) && ($_SESSION['role'] ?? '') === 'admin' && $action !== '') {
    require_admin();
    require_once __DIR__ . '/controllers/admin_controller.php';
    handle_action($action);
    exit;
}

if (!empty($_SESSION['user_id'])) {

    $role = strtolower(
        (string)($_SESSION['role'] ?? '')
    );

    switch ($role) {

        case 'admin':
            redirect('index.php?page=admin');
            break;

        case 'doctor':
            redirect('index.php?page=doctor');
            break;

        case 'receptionist':
            redirect('index.php?page=receptionist');
            break;

        case 'patient':
            redirect('index.php?page=patient');
            break;

        default:

            $_SESSION = [];

            redirect('index.php?page=login');
            break;
    }

    exit;
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>
    <?= e(APP_NAME) ?> - Portal
</title>

<link
    rel="stylesheet"
    href="assets/css/style.css"
>

</head>

<body class="auth-body">

<main class="portal">

<section class="portal-card">

    <div class="brand">
        MEDI<span>Track</span>
    </div>

    <p class="tagline">
        Smart Hospital Patient, Appointment
        &amp; Resource Management System
    </p>

    <h1>
        Choose your portal
    </h1>

    <p class="intro">
        Select your role before signing in.
    </p>

    <div class="role-grid">

        <div class="role-card">

            <h2>
                Patient
            </h2>

            <p>
                Symptoms, appointments,
                follow-ups and prescriptions
            </p>

            <a
                class="button"
                href="index.php?page=login"
            >
                Sign in as Patient
            </a>

            <a
                class="register-link"
                href="index.php?page=register"
            >
                Create Patient Account
            </a>

        </div>

        <div class="role-card">

            <h2>
                Doctor
            </h2>

            <p>
                Patients, prescriptions,
                risks and follow-ups
            </p>

            <a
                class="button"
                href="index.php?page=login"
            >
                Sign in as Doctor
            </a>

        </div>

        <div class="role-card">

            <h2>
                Receptionist
            </h2>

            <p>
                Patients, doctor slots
                and emergency registration
            </p>

            <a
                class="button"
                href="index.php?page=login"
            >
                Sign in as Receptionist
            </a>

        </div>

        <div class="role-card">

            <h2>
                Admin
            </h2>

            <p>
                Billing, staff, equipment
                and stock monitoring
            </p>

            <a
                class="button"
                href="index.php?page=login"
            >
                Sign in as Admin
            </a>

        </div>

    </div>

    <div class="notice">

        One common MEDITrack system for
        Admin, Doctor, Receptionist and Patient.

    </div>

</section>

</main>

<script src="assets/js/app.js"></script>

</body>

</html>
