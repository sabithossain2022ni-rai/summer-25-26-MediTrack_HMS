<?php

function prescriptions_all($conn) {
    return mysqli_query(
        $conn,
        "SELECT r.*, p.name patient_name
         FROM prescriptions r
         JOIN patients p ON p.id = r.patient_id
         ORDER BY r.id DESC"
    );
}

function prescription_find($conn, $id) {
    $stmt = mysqli_prepare(
        $conn,
        "SELECT * FROM prescriptions WHERE id=?"
    );

    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt)->fetch_assoc();
}

function prescription_create($conn, $patient_id, $diagnosis, $medicine, $dosage, $frequency, $duration, $instructions) {
    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO prescriptions
        (patient_id, diagnosis, medicine, dosage, frequency, duration, instructions)
        VALUES (?, ?, ?, ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        'issssss',
        $patient_id,
        $diagnosis,
        $medicine,
        $dosage,
        $frequency,
        $duration,
        $instructions
    );

    return mysqli_stmt_execute($stmt);
}

function prescription_update($conn, $id, $patient_id, $diagnosis, $medicine, $dosage, $frequency, $duration, $instructions) {
    $stmt = mysqli_prepare(
        $conn,
        "UPDATE prescriptions
         SET patient_id=?, diagnosis=?, medicine=?, dosage=?, frequency=?, duration=?, instructions=?
         WHERE id=?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        'issssssi',
        $patient_id,
        $diagnosis,
        $medicine,
        $dosage,
        $frequency,
        $duration,
        $instructions,
        $id
    );

    return mysqli_stmt_execute($stmt);
}

function prescription_delete($conn, $id) {
    $stmt = mysqli_prepare(
        $conn,
        "DELETE FROM prescriptions WHERE id=?"
    );

    mysqli_stmt_bind_param($stmt, 'i', $id);

    return mysqli_stmt_execute($stmt);
}

?>

