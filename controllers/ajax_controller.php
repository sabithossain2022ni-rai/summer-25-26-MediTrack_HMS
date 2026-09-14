<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../helpers/helpers.php';

if (file_exists(__DIR__ . '/../models/patient_model.php')) {
    require_once __DIR__ . '/../models/patient_model.php';
}

if (file_exists(__DIR__ . '/../models/risk_model.php')) {
    require_once __DIR__ . '/../models/risk_model.php';
}

if (file_exists(__DIR__ . '/../models/prescription_model.php')) {
    require_once __DIR__ . '/../models/prescription_model.php';
}

if (file_exists(__DIR__ . '/../models/followup_model.php')) {
    require_once __DIR__ . '/../models/followup_model.php';
}

if (file_exists(__DIR__ . '/../models/symptom_model.php')) {
    require_once __DIR__ . '/../models/symptom_model.php';
}

if (file_exists(__DIR__ . '/../models/appointment_model.php')) {
    require_once __DIR__ . '/../models/appointment_model.php';
}

$action = $_GET['action'] ?? '';

function ajax_response(array $data, int $status = 200): never
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

function ajax_require_role(string $role): void
{
    if (function_exists('require_role')) {
        require_role($role);
        return;
    }

    if (!isset($_SESSION['user_id'])) {
        ajax_response([
            'success' => false,
            'message' => 'Authentication required.'
        ], 401);
    }

    if (isset($_SESSION['role']) && $_SESSION['role'] !== $role) {
        ajax_response([
            'success' => false,
            'message' => 'Access denied.'
        ], 403);
    }
}

function ajax_require_patient(): int
{
    if (function_exists('require_patient_ajax')) {
        $userId = require_patient_ajax();
    } else {
        if (empty($_SESSION['user_id'])) {
            ajax_response([
                'success' => false,
                'message' => 'Authentication required.'
            ], 401);
        }

        if (
            isset($_SESSION['role']) &&
            $_SESSION['role'] !== 'patient'
        ) {
            ajax_response([
                'success' => false,
                'message' => 'Access denied.'
            ], 403);
        }

        $userId = (int)$_SESSION['user_id'];
    }

    if (class_exists('Patient')) {
        $model = new Patient($GLOBALS['conn']);
        $patient = $model->findByUserId($userId);

        if (!$patient) {
            ajax_response([
                'success' => false,
                'message' => 'Patient profile not found.'
            ], 404);
        }

        return (int)$patient['id'];
    }

    $stmt = mysqli_prepare(
        $GLOBALS['conn'],
        "SELECT id FROM patients WHERE user_id = ? LIMIT 1"
    );

    if (!$stmt) {
        ajax_response([
            'success' => false,
            'message' => 'Could not find patient profile.'
        ], 500);
    }

    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $patient = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    if (!$patient) {
        ajax_response([
            'success' => false,
            'message' => 'Patient profile not found.'
        ], 404);
    }

    return (int)$patient['id'];
}

if ($action === 'search_symptoms') {

    $patientId = ajax_require_patient();

    $query = trim($_GET['q'] ?? '');

    if (class_exists('Symptom')) {

        $model = new Symptom($conn);

        $rows = $model->searchForPatient(
            $patientId,
            $query
        );

        ajax_response([
            'success' => true,
            'query' => $query,
            'rows' => $rows
        ]);
    }

    ajax_response([
        'success' => false,
        'message' => 'Symptom module is unavailable.'
    ], 500);
}

if ($action === 'search_appointments') {

    $patientId = ajax_require_patient();

    $query = trim($_GET['q'] ?? '');

    if (class_exists('Appointment')) {

        $model = new Appointment($conn);

        $rows = $model->searchForPatient(
            $patientId,
            $query
        );

        ajax_response([
            'success' => true,
            'query' => $query,
            'rows' => $rows
        ]);
    }

    ajax_response([
        'success' => false,
        'message' => 'Appointment module is unavailable.'
    ], 500);
}

if ($action === 'cancel_appointment') {

    $patientId = ajax_require_patient();

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        ajax_response([
            'success' => false,
            'message' => 'POST request required.'
        ], 405);
    }

    if (function_exists('verify_csrf') && !verify_csrf()) {
        ajax_response([
            'success' => false,
            'message' => 'Invalid security token. Refresh the page and try again.'
        ], 403);
    }

    $appointmentId = (int)($_POST['appointment_id'] ?? 0);

    if ($appointmentId <= 0) {
        ajax_response([
            'success' => false,
            'message' => 'Invalid appointment.'
        ], 422);
    }

    if (class_exists('Appointment')) {

        $model = new Appointment($conn);

        $result = $model->cancel(
            $patientId,
            $appointmentId
        );

        ajax_response(
            $result,
            !empty($result['success']) ? 200 : 422
        );
    }

    ajax_response([
        'success' => false,
        'message' => 'Appointment module is unavailable.'
    ], 500);
}

if ($action === 'search_patients') {

    ajax_require_role('receptionist');

    $search = trim($_GET['q'] ?? '');

    if (!function_exists('get_patients')) {
        ajax_response([
            'success' => false,
            'message' => 'Patient module is unavailable.'
        ], 500);
    }

    $patients = get_patients($conn, $search);

    $items = [];

    foreach (array_slice($patients, 0, 10) as $p) {

        $id = $p['patient_id']
            ?? $p['id']
            ?? 0;

        $code = $p['patient_code']
            ?? $p['code']
            ?? '';

        $name = $p['full_name']
            ?? $p['name']
            ?? '';

        $phone = $p['phone']
            ?? '';

        $status = $p['status']
            ?? 'active';

        $items[] = [
            'id' => (int)$id,
            'code' => $code,
            'name' => $name,
            'phone' => $phone,
            'status' => $status
        ];
    }

    ajax_response([
        'success' => true,
        'data' => $items
    ]);
}

if ($action === 'available_slots') {

    ajax_require_role('receptionist');

    $date = trim($_GET['date'] ?? '');

    if (!function_exists('get_doctor_slots')) {
        ajax_response([
            'success' => false,
            'message' => 'Doctor slot module is unavailable.'
        ], 500);
    }

    $slots = get_doctor_slots($conn, $date);

    $items = [];

    foreach ($slots as $slot) {

        $status = strtolower(
            $slot['status'] ?? ''
        );

        if (
            $status === 'available' ||
            $status === 'open'
        ) {

            $items[] = [
                'id' => (int)(
                    $slot['slot_id']
                    ?? $slot['id']
                    ?? 0
                ),
                'doctor' =>
                    $slot['doctor_name']
                    ?? $slot['doctor']
                    ?? '',
                'specialization' =>
                    $slot['specialization']
                    ?? '',
                'start' =>
                    $slot['start_time']
                    ?? $slot['start']
                    ?? $slot['slot_time']
                    ?? '',
                'end' =>
                    $slot['end_time']
                    ?? $slot['end']
                    ?? ''
            ];
        }
    }

    ajax_response([
        'success' => true,
        'data' => $items
    ]);
}

if ($action === 'stats') {

    ajax_require_role('receptionist');

    $patients = function_exists('count_patients')
        ? count_patients($conn)
        : 0;

    $slots = function_exists('count_available_slots')
        ? count_available_slots($conn)
        : 0;

    $emergencies = function_exists('count_waiting_emergencies')
        ? count_waiting_emergencies($conn)
        : 0;

    $appointments = 0;

    if (function_exists('get_appointments')) {
        $appointmentRows = get_appointments($conn);
        $appointments = is_array($appointmentRows)
            ? count($appointmentRows)
            : 0;
    }

    ajax_response([
        'success' => true,
        'data' => [
            'patients' => $patients,
            'slots' => $slots,
            'emergencies' => $emergencies,
            'appointments' => $appointments
        ]
    ]);
}

if ($action === 'stock_status') {

    ajax_require_role('admin');

    $id = (int)($_GET['id'] ?? 0);

    $stmt = mysqli_prepare(
        $conn,
        "SELECT current_quantity,
                minimum_quantity,
                critical_quantity
         FROM inventory
         WHERE id = ?"
    );

    if (!$stmt) {
        ajax_response([
            'success' => false,
            'message' => 'Database error.'
        ], 500);
    }

    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    if (!$row) {
        ajax_response([
            'success' => false,
            'message' => 'Inventory item not found.'
        ], 404);
    }

    if (function_exists('stock_status')) {

        $status = stock_status(
            $row['current_quantity'],
            $row['minimum_quantity'],
            $row['critical_quantity']
        );

    } else {

        if (
            $row['current_quantity'] <=
            $row['critical_quantity']
        ) {
            $status = 'critical';
        } elseif (
            $row['current_quantity'] <=
            $row['minimum_quantity']
        ) {
            $status = 'low';
        } else {
            $status = 'normal';
        }
    }

    ajax_response([
        'success' => true,
        'ok' => true,
        'status' => $status
    ]);
}

if (
    in_array(
        $action,
        [
            'doctor_test',
            'doctor_ajax'
        ],
        true
    )
) {

    if (function_exists('require_doctor')) {
        require_doctor();
    } else {
        ajax_require_role('doctor');
    }

    ajax_response([
        'success' => true
    ]);
}

ajax_response([
    'success' => false,
    'message' => 'Unknown AJAX action.'
], 404);
