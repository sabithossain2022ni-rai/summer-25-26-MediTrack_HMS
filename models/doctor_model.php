<?php

function get_doctors(mysqli $conn): array {
    $stmt = mysqli_prepare($conn, 'SELECT * FROM doctors WHERE status="active" ORDER BY full_name, name');
    if (!$stmt) return [];
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) $rows[] = $row;
    mysqli_stmt_close($stmt);
    return $rows;
}

function get_doctor_slots(mysqli $conn, string $date = ''): array {
    if ($date !== '') {
        $stmt = mysqli_prepare(
            $conn,
            'SELECT s.*, d.full_name AS doctor_name, d.name AS doctor_display_name, d.specialization
             FROM doctor_slots s
             JOIN doctors d ON d.id=s.doctor_id
             WHERE s.slot_date=?
             ORDER BY s.start_time, s.slot_time'
        );
        if (!$stmt) return [];
        mysqli_stmt_bind_param($stmt, 's', $date);
    } else {
        $stmt = mysqli_prepare(
            $conn,
            'SELECT s.*, d.full_name AS doctor_name, d.name AS doctor_display_name, d.specialization
             FROM doctor_slots s
             JOIN doctors d ON d.id=s.doctor_id
             WHERE s.slot_date >= CURDATE()
             ORDER BY s.slot_date, s.start_time, s.slot_time'
        );
        if (!$stmt) return [];
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) $rows[] = $row;
    mysqli_stmt_close($stmt);
    return $rows;
}

function get_slot(mysqli $conn, int $id): ?array {
    $stmt = mysqli_prepare($conn, 'SELECT * FROM doctor_slots WHERE id=? LIMIT 1');
    if (!$stmt) return null;
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)) ?: null;
    mysqli_stmt_close($stmt);
    return $row;
}

function create_slot(mysqli $conn, array $data): bool {
    $status = strtolower((string)($data['status'] ?? 'available'));
    if (!in_array($status, ['available','booked','closed','open'], true)) $status = 'available';

    $slotTime = $data['slot_time'] ?? ($data['start_time'] ?? null);
    $stmt = mysqli_prepare(
        $conn,
        'INSERT INTO doctor_slots (doctor_id, slot_date, slot_time, start_time, end_time, status)
         VALUES (?, ?, ?, ?, ?, ?)'
    );
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, 'isssss', $data['doctor_id'], $data['slot_date'], $slotTime, $data['start_time'], $data['end_time'], $status);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function update_slot(mysqli $conn, int $id, array $data): bool {
    $status = strtolower((string)($data['status'] ?? 'available'));
    if (!in_array($status, ['available','booked','closed','open'], true)) $status = 'available';
    $slotTime = $data['slot_time'] ?? ($data['start_time'] ?? null);

    $stmt = mysqli_prepare(
        $conn,
        'UPDATE doctor_slots
         SET doctor_id=?, slot_date=?, slot_time=?, start_time=?, end_time=?, status=?
         WHERE id=?'
    );
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, 'isssssi', $data['doctor_id'], $data['slot_date'], $slotTime, $data['start_time'], $data['end_time'], $status, $id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function delete_slot(mysqli $conn, int $id): bool {
    $stmt = mysqli_prepare($conn, 'UPDATE doctor_slots SET status="closed" WHERE id=? AND status <> "booked"');
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, 'i', $id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function count_available_slots(mysqli $conn): int {
    $result = mysqli_query($conn, 'SELECT COUNT(*) AS total FROM doctor_slots WHERE status IN ("available","open") AND slot_date >= CURDATE()');
    if (!$result) return 0;
    return (int)(mysqli_fetch_assoc($result)['total'] ?? 0);
}
