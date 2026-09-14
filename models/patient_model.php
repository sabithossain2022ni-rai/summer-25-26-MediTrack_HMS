<?php

class Patient
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function findByUserId(int $userId): ?array
    {
        $stmt = mysqli_prepare(
            $this->conn,
            'SELECT id, name, full_name, patient_code, phone, email, address, age, gender, emergency_contact, status
             FROM patients WHERE user_id = ? LIMIT 1'
        );
        if (!$stmt) return null;
        mysqli_stmt_bind_param($stmt, 'i', $userId);
        mysqli_stmt_execute($stmt);
        $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)) ?: null;
        mysqli_stmt_close($stmt);
        return $row;
    }

    public function update(int $patientId, string $name, string $phone, string $address, int $age, string $gender, string $emergencyContact): bool
    {
        $stmt = mysqli_prepare(
            $this->conn,
            'UPDATE patients SET name=?, full_name=?, phone=?, address=?, age=?, gender=?, emergency_contact=? WHERE id=?'
        );
        if (!$stmt) return false;
        mysqli_stmt_bind_param($stmt, 'ssssissi', $name, $name, $phone, $address, $age, $gender, $emergencyContact, $patientId);
        $ok = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $ok;
    }
}

function patient_all(mysqli $conn) {
    return mysqli_query($conn, 'SELECT * FROM patients ORDER BY id DESC');
}

function patient_find(mysqli $conn, int $id): ?array {
    $stmt = mysqli_prepare($conn, 'SELECT * FROM patients WHERE id=? LIMIT 1');
    if (!$stmt) return null;
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)) ?: null;
    mysqli_stmt_close($stmt);
    return $row;
}

function patient_create(mysqli $conn, string $name, int $age, string $gender, string $phone, string $email, string $address): bool {
    $code = 'P' . date('ymdHis') . random_int(100, 999);
    $stmt = mysqli_prepare(
        $conn,
        'INSERT INTO patients (patient_code, name, full_name, age, gender, phone, email, address, status)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, "active")'
    );
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, 'sssissss', $code, $name, $name, $age, $gender, $phone, $email, $address);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function patient_update(mysqli $conn, int $id, string $name, int $age, string $gender, string $phone, string $email, string $address): bool {
    $stmt = mysqli_prepare(
        $conn,
        'UPDATE patients SET name=?, full_name=?, age=?, gender=?, phone=?, email=?, address=? WHERE id=?'
    );
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, 'ssissssi', $name, $name, $age, $gender, $phone, $email, $address, $id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function patient_delete(mysqli $conn, int $id): bool {
    $stmt = mysqli_prepare($conn, 'UPDATE patients SET status="inactive" WHERE id=?');
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, 'i', $id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function get_patients(mysqli $conn, string $search = ''): array {
    if ($search !== '') {
        $like = '%' . $search . '%';
        $stmt = mysqli_prepare(
            $conn,
            'SELECT * FROM patients
             WHERE full_name LIKE ? OR name LIKE ? OR patient_code LIKE ? OR phone LIKE ?
             ORDER BY id DESC'
        );
        if (!$stmt) return [];
        mysqli_stmt_bind_param($stmt, 'ssss', $like, $like, $like, $like);
    } else {
        $stmt = mysqli_prepare($conn, 'SELECT * FROM patients ORDER BY id DESC');
        if (!$stmt) return [];
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) $rows[] = $row;
    mysqli_stmt_close($stmt);
    return $rows;
}

function get_patient(mysqli $conn, int $id): ?array {
    return patient_find($conn, $id);
}

function create_patient(mysqli $conn, array $data): bool {
    $name = trim((string)($data['full_name'] ?? ''));
    $age = (int)($data['age'] ?? 0);
    $gender = (string)($data['gender'] ?? 'Other');
    $phone = trim((string)($data['phone'] ?? ''));
    $email = trim((string)($data['email'] ?? ''));
    $address = trim((string)($data['address'] ?? ''));
    $emergency = trim((string)($data['emergency_contact'] ?? ''));
    $status = in_array(($data['status'] ?? 'active'), ['active','inactive'], true) ? $data['status'] : 'active';

    $code = 'P' . date('ymdHis') . random_int(100, 999);
    $stmt = mysqli_prepare(
        $conn,
        'INSERT INTO patients
         (patient_code, name, full_name, age, gender, phone, email, address, emergency_contact, status)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
    );
    if (!$stmt) return false;

    mysqli_stmt_bind_param(
        $stmt,
        'sssissssss',
        $code, $name, $name, $age, $gender, $phone, $email, $address, $emergency, $status
    );
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function update_patient(mysqli $conn, int $id, array $data): bool {
    $stmt = mysqli_prepare(
        $conn,
        'UPDATE patients
         SET name=?, full_name=?, age=?, gender=?, phone=?, email=?, address=?, emergency_contact=?, status=?
         WHERE id=?'
    );
    if (!$stmt) return false;
    $name = trim((string)($data['full_name'] ?? ''));
    $age = (int)($data['age'] ?? 0);
    $gender = (string)($data['gender'] ?? 'Other');
    $phone = trim((string)($data['phone'] ?? ''));
    $email = trim((string)($data['email'] ?? ''));
    $address = trim((string)($data['address'] ?? ''));
    $emergency = trim((string)($data['emergency_contact'] ?? ''));
    $status = in_array(($data['status'] ?? 'active'), ['active','inactive'], true) ? $data['status'] : 'active';

    mysqli_stmt_bind_param($stmt, 'ssissssssi', $name, $name, $age, $gender, $phone, $email, $address, $emergency, $status, $id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function delete_patient(mysqli $conn, int $id): bool {
    $stmt = mysqli_prepare($conn, 'UPDATE patients SET status="inactive" WHERE id=?');
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, 'i', $id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function count_patients(mysqli $conn): int {
    $result = mysqli_query($conn, 'SELECT COUNT(*) AS total FROM patients WHERE status="active"');
    if (!$result) return 0;
    return (int)(mysqli_fetch_assoc($result)['total'] ?? 0);
}
