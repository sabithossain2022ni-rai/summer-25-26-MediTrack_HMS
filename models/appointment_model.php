<?php

class Appointment
{
    private $conn;

    public function __construct($conn) { $this->conn = $conn; }

    public function availableSlots()
    {
        $sql = "SELECT ds.id, ds.slot_date, COALESCE(ds.start_time, ds.slot_time) AS slot_time, d.name AS doctor_name, d.specialization FROM doctor_slots ds JOIN doctors d ON d.id = ds.doctor_id WHERE ds.status IN ('available','open') AND ds.slot_date >= CURDATE() ORDER BY ds.slot_date ASC, ds.slot_time ASC LIMIT 30";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_execute($stmt);
        $rows = mysqli_fetch_all(mysqli_stmt_get_result($stmt), MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        return $rows;
    }

    public function allForPatient($patientId)
    {
        $sql = "SELECT a.id, a.appointment_date, a.appointment_time, a.status, d.name AS doctor_name, d.specialization FROM appointments a JOIN doctors d ON d.id = a.doctor_id WHERE a.patient_id = ? ORDER BY a.appointment_date DESC, a.appointment_time DESC";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $patientId);
        mysqli_stmt_execute($stmt);
        $rows = mysqli_fetch_all(mysqli_stmt_get_result($stmt), MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        return $rows;
    }

    public function searchForPatient($patientId, $query = '')
    {
        if ($query === '') return $this->allForPatient($patientId);
        $like = '%' . $query . '%';
        $sql = "SELECT a.id, a.appointment_date, a.appointment_time, a.status, d.name AS doctor_name, d.specialization FROM appointments a JOIN doctors d ON d.id = a.doctor_id WHERE a.patient_id = ? AND (d.name LIKE ? OR d.specialization LIKE ? OR a.status LIKE ? OR DATE_FORMAT(a.appointment_date, '%d %b %Y') LIKE ?) ORDER BY a.appointment_date DESC, a.appointment_time DESC";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'issss', $patientId, $like, $like, $like, $like);
        mysqli_stmt_execute($stmt);
        $rows = mysqli_fetch_all(mysqli_stmt_get_result($stmt), MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        return $rows;
    }

    public function book($patientId, $slotId)
    {
        mysqli_begin_transaction($this->conn);
        try {
            $sql = "SELECT ds.id, ds.doctor_id, ds.slot_date, COALESCE(ds.start_time, ds.slot_time) AS slot_time, d.name AS doctor_name FROM doctor_slots ds JOIN doctors d ON d.id = ds.doctor_id WHERE ds.id = ? AND ds.status IN ('available','open') FOR UPDATE";
            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, 'i', $slotId);
            mysqli_stmt_execute($stmt);
            $slot = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
            mysqli_stmt_close($stmt);
            if (!$slot) throw new Exception('That slot is no longer available.');

            $sql = "INSERT INTO appointments (patient_id, doctor_id, slot_id, appointment_date, appointment_time, status) VALUES (?, ?, ?, ?, ?, 'booked')";
            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, 'iiiss', $patientId, $slot['doctor_id'], $slot['id'], $slot['slot_date'], $slot['slot_time']);
            if (!mysqli_stmt_execute($stmt)) { mysqli_stmt_close($stmt); throw new Exception('Could not book the appointment.'); }
            mysqli_stmt_close($stmt);

            $sql = "UPDATE doctor_slots SET status = 'booked' WHERE id = ?";
            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, 'i', $slotId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_commit($this->conn);
            return ['success' => true, 'message' => 'Appointment booked successfully with ' . $slot['doctor_name'] . '.'];
        } catch (Throwable $e) {
            mysqli_rollback($this->conn);
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function cancel($patientId, $appointmentId)
    {
        mysqli_begin_transaction($this->conn);
        try {
            $sql = "SELECT slot_id FROM appointments WHERE id = ? AND patient_id = ? AND status = 'booked' LIMIT 1";
            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, 'ii', $appointmentId, $patientId);
            mysqli_stmt_execute($stmt);
            $appointment = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
            mysqli_stmt_close($stmt);
            if (!$appointment) throw new Exception('Appointment could not be cancelled.');

            $sql = "UPDATE appointments SET status = 'cancelled' WHERE id = ? AND patient_id = ?";
            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, 'ii', $appointmentId, $patientId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            $sql = "UPDATE doctor_slots SET status = 'available' WHERE id = ?";
            $stmt = mysqli_prepare($this->conn, $sql);
            mysqli_stmt_bind_param($stmt, 'i', $appointment['slot_id']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_commit($this->conn);
            return ['success' => true, 'message' => 'Appointment cancelled.'];
        } catch (Throwable $e) {
            mysqli_rollback($this->conn);
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function lastCompletedVisit($patientId)
    {
        $sql = "SELECT appointment_date FROM appointments WHERE patient_id = ? AND appointment_date <= CURDATE() AND status = 'completed' ORDER BY appointment_date DESC LIMIT 1";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $patientId);
        mysqli_stmt_execute($stmt);
        $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
        mysqli_stmt_close($stmt);
        return $row;
    }

    public function upcoming($patientId)
    {
        $sql = "SELECT a.appointment_date, a.appointment_time, a.status, d.name AS doctor_name, d.specialization FROM appointments a JOIN doctors d ON d.id = a.doctor_id WHERE a.patient_id = ? AND a.status = 'booked' AND (a.appointment_date > CURDATE() OR (a.appointment_date = CURDATE() AND a.appointment_time >= CURTIME())) ORDER BY a.appointment_date ASC, a.appointment_time ASC LIMIT 1";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $patientId);
        mysqli_stmt_execute($stmt);
        $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
        mysqli_stmt_close($stmt);
        return $row;
    }
}

function get_appointments(mysqli $conn): array {
    $sql = 'SELECT a.id AS appointment_id, a.*, p.patient_code, p.full_name AS patient_name,
                   d.full_name AS doctor_name, d.name AS doctor_display_name,
                   s.slot_date, COALESCE(s.start_time,s.slot_time) AS start_time, s.end_time
            FROM appointments a
            JOIN patients p ON p.id=a.patient_id
            JOIN doctors d ON d.id=a.doctor_id
            LEFT JOIN doctor_slots s ON s.id=a.slot_id
            ORDER BY a.appointment_date DESC, a.appointment_time DESC, a.id DESC';
    $result = mysqli_query($conn, $sql);
    if (!$result) return [];
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) $rows[] = $row;
    mysqli_free_result($result);
    return $rows;
}

function create_appointment(mysqli $conn, array $data): bool {
    $patientId = (int)$data['patient_id'];
    $slotId = (int)$data['slot_id'];
    $reason = trim((string)($data['reason'] ?? ''));

    if ($patientId <= 0 || $slotId <= 0) return false;

    mysqli_begin_transaction($conn);
    try {
        $stmt = mysqli_prepare(
            $conn,
            "SELECT id, doctor_id, slot_date, COALESCE(start_time,slot_time) AS appointment_time
             FROM doctor_slots
             WHERE id=? AND status IN ('available','open')
             FOR UPDATE"
        );
        if (!$stmt) throw new Exception('Could not prepare slot lookup.');
        mysqli_stmt_bind_param($stmt, 'i', $slotId);
        mysqli_stmt_execute($stmt);
        $slot = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
        mysqli_stmt_close($stmt);

        if (!$slot) throw new Exception('Selected slot is no longer available.');

        $status = 'booked';
        $stmt = mysqli_prepare(
            $conn,
            'INSERT INTO appointments
             (patient_id, doctor_id, slot_id, appointment_date, appointment_time, reason, status)
             VALUES (?, ?, ?, ?, ?, ?, ?)'
        );
        if (!$stmt) throw new Exception('Could not prepare appointment.');
        mysqli_stmt_bind_param(
            $stmt,
            'iiissss',
            $patientId,
            $slot['doctor_id'],
            $slot['id'],
            $slot['slot_date'],
            $slot['appointment_time'],
            $reason,
            $status
        );
        if (!mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            throw new Exception('Could not create appointment.');
        }
        mysqli_stmt_close($stmt);

        $stmt = mysqli_prepare($conn, 'UPDATE doctor_slots SET status="booked" WHERE id=?');
        if (!$stmt) throw new Exception('Could not reserve slot.');
        mysqli_stmt_bind_param($stmt, 'i', $slotId);
        if (!mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            throw new Exception('Could not reserve slot.');
        }
        mysqli_stmt_close($stmt);

        mysqli_commit($conn);
        return true;
    } catch (Throwable $e) {
        mysqli_rollback($conn);
        return false;
    }
}

function update_appointment_status(mysqli $conn, int $id, string $status): bool {
    $allowed = ['pending','booked','confirmed','completed','cancelled','no_show','emergency'];
    $status = strtolower($status);
    if (!in_array($status, $allowed, true)) return false;

    mysqli_begin_transaction($conn);
    try {
        $stmt = mysqli_prepare($conn, 'SELECT slot_id, status FROM appointments WHERE id=? LIMIT 1 FOR UPDATE');
        if (!$stmt) throw new Exception('Appointment not found.');
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
        mysqli_stmt_close($stmt);
        if (!$row) throw new Exception('Appointment not found.');

        $stmt = mysqli_prepare($conn, 'UPDATE appointments SET status=? WHERE id=?');
        if (!$stmt) throw new Exception('Could not update appointment.');
        mysqli_stmt_bind_param($stmt, 'si', $status, $id);
        $ok = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if (!$ok) throw new Exception('Could not update appointment.');

        if (!empty($row['slot_id'])) {
            $slotStatus = $status === 'cancelled' ? 'available' : ($status === 'completed' ? 'closed' : 'booked');
            $stmt = mysqli_prepare($conn, 'UPDATE doctor_slots SET status=? WHERE id=?');
            if (!$stmt) throw new Exception('Could not update slot.');
            mysqli_stmt_bind_param($stmt, 'si', $slotStatus, $row['slot_id']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        mysqli_commit($conn);
        return true;
    } catch (Throwable $e) {
        mysqli_rollback($conn);
        return false;
    }
}

function delete_appointment(mysqli $conn, int $id): bool {
    mysqli_begin_transaction($conn);
    try {
        $stmt = mysqli_prepare($conn, 'SELECT slot_id FROM appointments WHERE id=? LIMIT 1 FOR UPDATE');
        if (!$stmt) throw new Exception('Appointment not found.');
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
        mysqli_stmt_close($stmt);
        if (!$row) throw new Exception('Appointment not found.');

        $stmt = mysqli_prepare($conn, 'DELETE FROM appointments WHERE id=?');
        if (!$stmt) throw new Exception('Could not delete appointment.');
        mysqli_stmt_bind_param($stmt, 'i', $id);
        $ok = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if (!$ok) throw new Exception('Could not delete appointment.');

        if (!empty($row['slot_id'])) {
            $stmt = mysqli_prepare($conn, 'UPDATE doctor_slots SET status="available" WHERE id=?');
            if (!$stmt) throw new Exception('Could not release slot.');
            mysqli_stmt_bind_param($stmt, 'i', $row['slot_id']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        mysqli_commit($conn);
        return true;
    } catch (Throwable $e) {
        mysqli_rollback($conn);
        return false;
    }
}
