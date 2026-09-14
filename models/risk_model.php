<?php

function risks_all($conn) {
    return mysqli_query(
        $conn,
        "SELECT r.*, p.name patient_name
         FROM patient_risks r
         JOIN patients p ON p.id = r.patient_id
         ORDER BY r.risk_date DESC, r.id DESC"
    );
}

function risk_find($conn, $id) {
    $stmt = mysqli_prepare(
        $conn,
        "SELECT * FROM patient_risks WHERE id=?"
    );

    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt)->fetch_assoc();
}

function risk_create($conn, $patient_id, $level, $description, $date) {
    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO patient_risks
        (patient_id, risk_level, description, risk_date, status)
        VALUES (?, ?, ?, ?, 'Open')"
    );

    mysqli_stmt_bind_param(
        $stmt,
        'isss',
        $patient_id,
        $level,
        $description,
        $date
    );

    return mysqli_stmt_execute($stmt);
}

function risk_update($conn, $id, $patient_id, $level, $description, $date, $status) {
    $stmt = mysqli_prepare(
        $conn,
        "UPDATE patient_risks
         SET patient_id=?, risk_level=?, description=?, risk_date=?, status=?
         WHERE id=?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        'issssi',
        $patient_id,
        $level,
        $description,
        $date,
        $status,
        $id
    );

    return mysqli_stmt_execute($stmt);
}

function risk_delete($conn, $id) {
    $stmt = mysqli_prepare(
        $conn,
        "DELETE FROM patient_risks WHERE id=?"
    );

    mysqli_stmt_bind_param($stmt, 'i', $id);

    return mysqli_stmt_execute($stmt);
}

function risk_resolve($conn, $id) {
    $stmt = mysqli_prepare(
        $conn,
        "UPDATE patient_risks SET status='Resolved' WHERE id=?"
    );

    mysqli_stmt_bind_param($stmt, 'i', $id);

    return mysqli_stmt_execute($stmt);
}

?>

