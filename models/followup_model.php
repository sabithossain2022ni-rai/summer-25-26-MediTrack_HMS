<?php

class Followup
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function allForPatient(int $patientId): array
    {
        $stmt = mysqli_prepare(
            $this->conn,
            'SELECT f.id, f.patient_id, f.doctor_id, f.appointment_id,
                    f.followup_date, f.followup_time, f.purpose, f.reason, f.notes, f.status,
                    d.name AS doctor_name, d.specialization
             FROM followups f
             LEFT JOIN doctors d ON d.id=f.doctor_id
             WHERE f.patient_id=?
             ORDER BY f.followup_date ASC, f.followup_time ASC, f.id ASC'
        );
        if (!$stmt) return [];
        mysqli_stmt_bind_param($stmt, 'i', $patientId);
        mysqli_stmt_execute($stmt);
        $rows = mysqli_fetch_all(mysqli_stmt_get_result($stmt), MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        return $rows;
    }

    public function nextActive(int $patientId): ?array
    {
        $stmt = mysqli_prepare(
            $this->conn,
            "SELECT f.followup_date, f.followup_time, f.purpose, f.reason, f.status,
                    d.name AS doctor_name, d.specialization
             FROM followups f
             LEFT JOIN doctors d ON d.id=f.doctor_id
             WHERE f.patient_id=?
               AND f.status IN ('scheduled','active')
               AND (f.followup_date > CURDATE()
                    OR (f.followup_date=CURDATE() AND (f.followup_time IS NULL OR f.followup_time>=CURTIME())))
             ORDER BY f.followup_date ASC, f.followup_time ASC, f.id ASC
             LIMIT 1"
        );
        if (!$stmt) return null;
        mysqli_stmt_bind_param($stmt, 'i', $patientId);
        mysqli_stmt_execute($stmt);
        $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)) ?: null;
        mysqli_stmt_close($stmt);
        return $row;
    }
}

function followups_all(mysqli $conn) {
    return mysqli_query(
        $conn,
        "SELECT f.*, p.name AS patient_name
         FROM followups f
         JOIN patients p ON p.id=f.patient_id
         ORDER BY f.followup_date DESC, f.followup_time DESC, f.id DESC"
    );
}

function followup_find(mysqli $conn, int $id) {
    $stmt = mysqli_prepare($conn, 'SELECT * FROM followups WHERE id=? LIMIT 1');
    if (!$stmt) return null;
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)) ?: null;
    mysqli_stmt_close($stmt);
    return $row;
}

function followup_create(mysqli $conn, int $patient_id, string $date, string $time, string $reason, string $notes, ?int $doctor_id = null): bool {
    $status = 'scheduled';
    $purpose = $reason;

    $stmt = mysqli_prepare(
        $conn,
        'INSERT INTO followups (patient_id, doctor_id, followup_date, followup_time, purpose, reason, notes, status)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
    );
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, 'iissssss', $patient_id, $doctor_id, $date, $time, $purpose, $reason, $notes, $status);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function followup_update(mysqli $conn, int $id, int $patient_id, string $date, string $time, string $reason, string $notes, string $status, ?int $doctor_id = null): bool {
    $allowed = ['pending','scheduled','active','completed','cancelled'];
    $status = strtolower($status);
    if (!in_array($status, $allowed, true)) $status = 'scheduled';

    $purpose = $reason;
    $stmt = mysqli_prepare(
        $conn,
        'UPDATE followups
         SET patient_id=?, doctor_id=?, followup_date=?, followup_time=?, purpose=?, reason=?, notes=?, status=?
         WHERE id=?'
    );
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, 'iissssssi', $patient_id, $doctor_id, $date, $time, $purpose, $reason, $notes, $status, $id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}

function followup_delete(mysqli $conn, int $id): bool {
    $stmt = mysqli_prepare($conn, 'DELETE FROM followups WHERE id=?');
    if (!$stmt) return false;
    mysqli_stmt_bind_param($stmt, 'i', $id);
    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $ok;
}
