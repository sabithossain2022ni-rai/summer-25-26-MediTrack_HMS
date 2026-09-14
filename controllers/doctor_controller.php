<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../helpers/helpers.php';
require_once __DIR__ . '/../models/patient_model.php';
require_once __DIR__ . '/../models/risk_model.php';
require_once __DIR__ . '/../models/prescription_model.php';
require_once __DIR__ . '/../models/followup_model.php';

require_doctor();

function doctor_page(string $view, array $data = [], string $title = 'Doctor Dashboard', string $heading = '', string $sub = ''): void
{
    extract($data);
    $pageTitle = $title;
    $pageHeading = $heading;
    $pageSub = $sub;
    require __DIR__ . '/../views/partials/header.php';
    require __DIR__ . '/../views/doctor/doctor/' . $view . '.php';
    require __DIR__ . '/../views/partials/footer.php';
}

function doctor_count(mysqli $conn, string $table): int
{
    $allowed = ['patients', 'patient_risks', 'prescriptions', 'followups'];
    if (!in_array($table, $allowed, true)) return 0;
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM {$table}");
    return $result ? (int)(mysqli_fetch_assoc($result)['total'] ?? 0) : 0;
}

$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action !== '') {
    require_csrf();
}

if ($action === 'patient_save') {
    $id = (int)($_POST['id'] ?? 0);
    $name = trim((string)post('name'));
    $age = (int)post('age');
    $gender = post('gender');
    $phone = post('phone');
    $email = post('email');
    $address = post('address');

    if ($name === '' || $age < 0 || $age > 120 || !in_array($gender, ['Male','Female','Other'], true)) {
        flash('error', 'Please provide valid patient information.');
    } else {
        $ok = $id
            ? patient_update($conn, $id, $name, $age, $gender, $phone, $email, $address)
            : patient_create($conn, $name, $age, $gender, $phone, $email, $address);
        flash($ok ? 'success' : 'error', $ok ? 'Patient saved successfully.' : 'Could not save patient.');
    }
    redirect('index.php?page=patients');
}

if ($action === 'patient_delete') {
    $id = (int)($_POST['id'] ?? $_GET['id'] ?? 0);
    $ok = $id > 0 ? patient_delete($conn, $id) : false;
    flash($ok ? 'success' : 'error', $ok ? 'Patient deactivated.' : 'Could not update patient.');
    redirect('index.php?page=patients');
}

if ($action === 'risk_save') {
    $id = (int)($_POST['id'] ?? 0);
    $pid = (int)post('patient_id');
    $level = post('risk_level');
    $desc = post('description');
    $date = post('risk_date') ?: date('Y-m-d');
    $status = post('status', 'Open');

    if (!$pid || !in_array($level, ['Low','Medium','High','Critical'], true) || $desc === '') {
        flash('error', 'Please complete all risk fields.');
    } else {
        $ok = $id
            ? risk_update($conn, $id, $pid, $level, $desc, $date, $status)
            : risk_create($conn, $pid, $level, $desc, $date);
        flash($ok ? 'success' : 'error', $ok ? 'Risk saved successfully.' : 'Could not save risk.');
    }
    redirect('index.php?page=risks');
}

if ($action === 'risk_delete') {
    $id = (int)($_POST['id'] ?? $_GET['id'] ?? 0);
    $ok = $id > 0 ? risk_delete($conn, $id) : false;
    flash($ok ? 'success' : 'error', $ok ? 'Risk deleted.' : 'Could not delete risk.');
    redirect('index.php?page=risks');
}

if ($action === 'risk_resolve') {
    $id = (int)($_POST['id'] ?? $_GET['id'] ?? 0);
    $ok = $id > 0 ? risk_resolve($conn, $id) : false;
    flash($ok ? 'success' : 'error', $ok ? 'Risk resolved.' : 'Could not resolve risk.');
    redirect('index.php?page=risks');
}

if ($action === 'prescription_save') {
    $id = (int)($_POST['id'] ?? 0);
    $data = [
        (int)post('patient_id'),
        post('diagnosis'),
        post('medicine'),
        post('dosage'),
        post('frequency'),
        post('duration'),
        post('instructions')
    ];

    if (!$data[0] || $data[1] === '' || $data[2] === '') {
        flash('error', 'Patient, diagnosis and medicine are required.');
    } else {
        $ok = $id
            ? prescription_update($conn, $id, ...$data)
            : prescription_create($conn, ...$data);
        flash($ok ? 'success' : 'error', $ok ? 'Prescription saved successfully.' : 'Could not save prescription.');
    }
    redirect('index.php?page=prescriptions');
}

if ($action === 'prescription_delete') {
    $id = (int)($_POST['id'] ?? $_GET['id'] ?? 0);
    $ok = $id > 0 ? prescription_delete($conn, $id) : false;
    flash($ok ? 'success' : 'error', $ok ? 'Prescription deleted.' : 'Could not delete prescription.');
    redirect('index.php?page=prescriptions');
}

if ($action === 'followup_save') {
    $id = (int)($_POST['id'] ?? 0);
    $patientId = (int)post('patient_id');
    $date = post('followup_date');
    $time = post('followup_time');
    $reason = post('reason');
    $notes = post('notes');
    $status = post('status', 'scheduled');
    $doctorId = (int)($_SESSION['doctor_id'] ?? 0);

    if (!$patientId || !$date || !$time || $reason === '') {
        flash('error', 'Patient, date, time and reason are required.');
    } else {
        $ok = $id
            ? followup_update($conn, $id, $patientId, $date, $time, $reason, $notes, $status, $doctorId ?: null)
            : followup_create($conn, $patientId, $date, $time, $reason, $notes, $doctorId ?: null);
        flash($ok ? 'success' : 'error', $ok ? 'Follow-up saved successfully.' : 'Could not save follow-up.');
    }
    redirect('index.php?page=followups');
}

if ($action === 'followup_delete') {
    $id = (int)($_POST['id'] ?? $_GET['id'] ?? 0);
    $ok = $id > 0 ? followup_delete($conn, $id) : false;
    flash($ok ? 'success' : 'error', $ok ? 'Follow-up deleted.' : 'Could not delete follow-up.');
    redirect('index.php?page=followups');
}

$page = $_GET['page'] ?? 'doctor';

switch ($page) {
    case 'patients':
        $patients = patient_all($conn);
        doctor_page('patients', compact('patients'), 'Patients', 'Patients', 'Manage patient records.');
        break;

    case 'patient_add':
        $patients = patient_all($conn);
        doctor_page('patient_add', compact('patients'), 'Add Patient', 'Add Patient');
        break;

    case 'patient_edit':
        $patient = patient_find($conn, (int)($_GET['id'] ?? 0));
        if (!$patient) {
            flash('error', 'Patient not found.');
            redirect('index.php?page=patients');
        }
        doctor_page('patient_edit', compact('patient'), 'Edit Patient', 'Edit Patient');
        break;

    case 'patient_view':
        $patient = patient_find($conn, (int)($_GET['id'] ?? 0));
        if (!$patient) {
            flash('error', 'Patient not found.');
            redirect('index.php?page=patients');
        }
        doctor_page('patient_view', compact('patient'), 'Patient Details', 'Patient Details');
        break;

    case 'risks':
        $risks = risks_all($conn);
        doctor_page('risks', compact('risks'), 'Patient Risks', 'Patient Risks', 'Monitor and manage patient risk records.');
        break;

    case 'risk_add':
        $risk = [];
        $patients = patient_all($conn);
        doctor_page('risk_add', compact('risk','patients'), 'Add Patient Risk', 'Add Patient Risk');
        break;

    case 'risk_edit':
        $risk = risk_find($conn, (int)($_GET['id'] ?? 0));
        if (!$risk) {
            flash('error', 'Risk record not found.');
            redirect('index.php?page=risks');
        }
        $patients = patient_all($conn);
        doctor_page('risk_edit', compact('risk','patients'), 'Edit Patient Risk', 'Edit Patient Risk');
        break;

    case 'prescriptions':
        $prescriptions = prescriptions_all($conn);
        doctor_page('prescriptions', compact('prescriptions'), 'Prescriptions', 'Prescriptions', 'Create and manage patient prescriptions.');
        break;

    case 'prescription_add':
        $prescription = [];
        $patients = patient_all($conn);
        doctor_page('prescription_add', compact('prescription','patients'), 'Create Prescription', 'Create Prescription');
        break;

    case 'prescription_edit':
        $prescription = prescription_find($conn, (int)($_GET['id'] ?? 0));
        if (!$prescription) {
            flash('error', 'Prescription not found.');
            redirect('index.php?page=prescriptions');
        }
        $patients = patient_all($conn);
        doctor_page('prescription_edit', compact('prescription','patients'), 'Edit Prescription', 'Edit Prescription');
        break;

    case 'followups':
        $followups = followups_all($conn);
        doctor_page('followups', compact('followups'), 'Follow-ups', 'Follow-ups', 'Schedule and manage follow-up visits.');
        break;

    case 'followup_add':
        $followup = [];
        $patients = patient_all($conn);
        doctor_page('followup_add', compact('followup','patients'), 'Schedule Follow-up', 'Schedule Follow-up');
        break;

    case 'followup_edit':
        $followup = followup_find($conn, (int)($_GET['id'] ?? 0));
        if (!$followup) {
            flash('error', 'Follow-up not found.');
            redirect('index.php?page=followups');
        }
        $patients = patient_all($conn);
        doctor_page('followup_edit', compact('followup','patients'), 'Edit Follow-up', 'Edit Follow-up');
        break;

    default:
        $patient_count = doctor_count($conn, 'patients');
        $risk_count = doctor_count($conn, 'patient_risks');
        $prescription_count = doctor_count($conn, 'prescriptions');
        $followup_count = doctor_count($conn, 'followups');
        doctor_page(
            'dashboard',
            compact('patient_count','risk_count','prescription_count','followup_count'),
            'Doctor Dashboard',
            'Doctor Dashboard',
            'Manage patients, risks, prescriptions and follow-ups.'
        );
        break;
}
