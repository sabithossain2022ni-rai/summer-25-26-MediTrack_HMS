<?php

class User
{
    private $conn;
    public function __construct($conn) { $this->conn = $conn; }

    public function findPatientByLogin($login)
    {
        $sql = "SELECT users.id AS user_id, users.email, users.password, users.role, patients.id AS patient_id, patients.name, patients.phone FROM users INNER JOIN patients ON users.id = patients.user_id WHERE (users.email = ? OR patients.phone = ?) AND users.role = 'patient' LIMIT 1";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $login, $login);
        mysqli_stmt_execute($stmt);
        $user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
        mysqli_stmt_close($stmt);
        return $user;
    }

    public function emailExists($email)
    {
        $stmt = mysqli_prepare($this->conn, 'SELECT id FROM users WHERE email = ? LIMIT 1');
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $exists = mysqli_num_rows(mysqli_stmt_get_result($stmt)) > 0;
        mysqli_stmt_close($stmt);
        return $exists;
    }

    public function createPatient($name, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        mysqli_begin_transaction($this->conn);
        try {
            $role = 'patient';
            $stmt = mysqli_prepare($this->conn, 'INSERT INTO users (email, password, role) VALUES (?, ?, ?)');
            mysqli_stmt_bind_param($stmt, 'sss', $email, $hashedPassword, $role);
            if (!mysqli_stmt_execute($stmt)) { mysqli_stmt_close($stmt); throw new Exception('Registration failed.'); }
            $userId = mysqli_insert_id($this->conn);
            mysqli_stmt_close($stmt);

            $stmt = mysqli_prepare($this->conn, 'INSERT INTO patients (user_id, name, phone, email, address) VALUES (?, ?, ?, ?, ?)');
            
            $phone = '';
            $address = '';
            mysqli_stmt_bind_param($stmt, 'issss', $userId, $name, $phone, $email, $address);
            if (!mysqli_stmt_execute($stmt)) { mysqli_stmt_close($stmt); throw new Exception('Patient information could not be saved.'); }
            mysqli_stmt_close($stmt);
            mysqli_commit($this->conn);
            return true;
        } catch (Throwable $e) {
            mysqli_rollback($this->conn);
            return false;
        }
    }
}
