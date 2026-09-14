<?php

function get_emergencies(mysqli $conn, string $search=''): array {
    if ($search !== '') {
        $like = '%' . $search . '%';
        $stmt = mysqli_prepare(
            $conn,
            'SELECT * FROM emergency_registrations
             WHERE emergency_code LIKE ? OR patient_name LIKE ? OR emergency_type LIKE ?
             ORDER BY id DESC'
        );
        if (!$stmt) return [];
        mysqli_stmt_bind_param($stmt, 'sss', $like, $like, $like);
    } else {
        $stmt = mysqli_prepare($conn, 'SELECT * FROM emergency_registrations ORDER BY id DESC');
        if (!$stmt) return [];
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) $rows[] = $row;
    mysqli_stmt_close($stmt);
    return $rows;
}

function get_emergency(mysqli $conn, int $id): ?array {
    $stmt = mysqli_prepare($conn, 'SELECT * FROM emergency_registrations WHERE id=? LIMIT 1');
    if (!$stmt) return null;
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)) ?: null;
    mysqli_stmt_close($stmt);
    return $row;
}

function create_emergency(mysqli $conn, array $data): bool {
    $code = 'ER-' . date('Ymd-His') . '-' . random_int(10,99);
    $status = in_array(($data['status'] ?? 'waiting'), ['waiting','active','completed','transferred','cancelled'], true)
        ? $data['status'] : 'waiting';
    $arrival = str_replace('T', ' ', (string)$data['arrival_time']);

    $stmt = mysqli_prepare(
        $conn,
        'INSERT INTO emergency_registrations
         (emergency_code, patient_name, age, gender, phone, emergency_contact, emergency_type, arrival_time, notes, status)
         VALUES (?,?,?,?,?,?,?,?,?,?)'
    );
    if (!$stmt) return false;
    $age = $data['age'];
    $gender = $data['gender'];
    mysqli_stmt_bind_param(
        $stmt,
        'ssisssssss',
        $code,
        $data['patient_name'],
        $age,
        $gender,
        $data['phone'],
        $data['emergency_contact'],
        $data['emergency_type'],
        $arrival,
        $data['notes'],
        $status
    );
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function update_emergency(mysqli $conn, int $id, array $data): bool {
    $status = in_array(($data['status'] ?? 'waiting'), ['waiting','active','completed','transferred','cancelled'], true)
        ? $data['status'] : 'waiting';
    $arrival = str_replace('T', ' ', (string)$data['arrival_time']);
    $stmt = mysqli_prepare(
        $conn,
        'UPDATE emergency_registrations
         SET patient_name=?, age=?, gender=?, phone=?, emergency_contact=?, emergency_type=?, arrival_time=?, notes=?, status=?
         WHERE id=?'
    );
    if (!$stmt) return false;
    mysqli_stmt_bind_param(
        $stmt,
        'sisssssssi',
        $data['patient_name'],
        $data['age'],
        $data['gender'],
        $data['phone'],
        $data['emergency_contact'],
        $data['emergency_type'],
        $arrival,
        $data['notes'],
        $status,
        $id
    );
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function delete_emergency(mysqli $conn, int $id): bool {
    $stmt = mysqli_prepare($conn, 'UPDATE emergency_registrations SET status="cancelled" WHERE id=?');
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, 'i', $id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function count_waiting_emergencies(mysqli $conn): int {
    $result = mysqli_query($conn, 'SELECT COUNT(*) AS total FROM emergency_registrations WHERE status="waiting"');
    if (!$result) return 0;
    return (int)(mysqli_fetch_assoc($result)['total'] ?? 0);
}
