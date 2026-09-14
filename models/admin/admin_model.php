<?php

class AdminModel
{
    private mysqli $db;

    public function __construct(mysqli $conn)
    {
        $this->db = $conn;
    }

    private function fetchAll(string $sql): array
    {
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            throw new Exception(mysqli_error($this->db));
        }

        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        mysqli_free_result($result);

        return $rows;
    }

    private function fetchOne(string $sql): array
    {
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            throw new Exception(mysqli_error($this->db));
        }

        $row = mysqli_fetch_assoc($result);

        mysqli_free_result($result);

        return $row ?: [];
    }

    private function scalar(string $sql)
    {
        $result = mysqli_query($this->db, $sql);

        if (!$result) {
            throw new Exception(mysqli_error($this->db));
        }

        $row = mysqli_fetch_row($result);

        mysqli_free_result($result);

        return $row[0] ?? 0;
    }

    private function prepare(string $sql)
    {
        $stmt = mysqli_prepare($this->db, $sql);

        if (!$stmt) {
            throw new Exception(mysqli_error($this->db));
        }

        return $stmt;
    }

    private function execute(
        string $sql,
        string $types = '',
        array $params = []
    ): bool {
        $stmt = $this->prepare($sql);

        if ($types !== '') {
            mysqli_stmt_bind_param(
                $stmt,
                $types,
                ...$params
            );
        }

        $success = mysqli_stmt_execute($stmt);

        if (!$success) {
            $error = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
            throw new Exception($error);
        }

        mysqli_stmt_close($stmt);

        return true;
    }

    public function dashboard(): array
    {
        return [
            'patients' => (int)$this->scalar(
                "SELECT COUNT(*)
                 FROM patients
                 WHERE status='active'"
            ),

            'doctors' => (int)$this->scalar(
                "SELECT COUNT(*)
                 FROM doctors
                 WHERE status='active'"
            ),

            'receptionists' => (int)$this->scalar(
                "SELECT COUNT(*)
                 FROM receptionists
                 WHERE status='active'"
            ),

            'equipment' => (int)$this->scalar(
                "SELECT COALESCE(SUM(quantity),0)
                 FROM equipment
                 WHERE status='active'"
            ),

            'today_revenue' => (float)$this->scalar(
                "SELECT COALESCE(SUM(paid_amount),0)
                 FROM billing
                 WHERE transaction_date=CURDATE()"
            ),

            'patient_due' => (float)$this->scalar(
                "SELECT COALESCE(SUM(amount-paid_amount),0)
                 FROM billing
                 WHERE amount>paid_amount"
            ),

            'doctor_payments' => (float)$this->scalar(
                "SELECT COALESCE(SUM(total_amount),0)
                 FROM staff_payments
                 WHERE payment_date >=
                 DATE_FORMAT(CURDATE(),'%Y-%m-01')
                 AND payment_type='doctor'"
            ),

            'monthly_revenue' => (float)$this->scalar(
                "SELECT COALESCE(SUM(paid_amount),0)
                 FROM billing
                 WHERE transaction_date >=
                 DATE_FORMAT(CURDATE(),'%Y-%m-01')"
            ),

            'low_stock' => (int)$this->scalar(
                "SELECT COUNT(*)
                 FROM inventory
                 WHERE current_quantity <= minimum_quantity"
            ),

            'critical_stock' => (int)$this->scalar(
                "SELECT COUNT(*)
                 FROM inventory
                 WHERE current_quantity <= critical_quantity"
            ),

            'appointments_today' => (int)$this->scalar(
                "SELECT COUNT(*)
                 FROM appointments
                 WHERE appointment_date=CURDATE()"
            )
        ];
    }

    public function peopleData(): array
    {
        return [
            'doctors' => $this->fetchAll(
                "SELECT
                    d.*,
                    dep.name AS department_name
                 FROM doctors d
                 LEFT JOIN departments dep
                    ON dep.id=d.department_id
                 ORDER BY d.id DESC"
            ),

            'receptionists' => $this->fetchAll(
                "SELECT *
                 FROM receptionists
                 ORDER BY id DESC"
            ),

            'staff' => $this->fetchAll(
                "SELECT
                    s.*,
                    dep.name AS department_name
                 FROM staff s
                 LEFT JOIN departments dep
                    ON dep.id=s.department_id
                 ORDER BY s.id DESC"
            ),

            'patients' => $this->fetchAll(
                "SELECT *
                 FROM patients
                 ORDER BY id DESC
                 LIMIT 100"
            ),

            'departments' => $this->fetchAll(
                "SELECT *
                 FROM departments
                 ORDER BY name"
            )
        ];
    }

    public function departmentsData(): array
    {
        return [
            'departments' => $this->fetchAll(
                "SELECT
                    d.*,
                    COUNT(DISTINCT doc.id) AS doctor_count
                 FROM departments d
                 LEFT JOIN doctors doc
                    ON doc.department_id=d.id
                 GROUP BY d.id
                 ORDER BY d.name"
            )
        ];
    }

    public function costsData(): array
    {
        return [
            'billing' => $this->fetchAll(
                "SELECT
                    b.*,
                    p.full_name AS patient_name,
                    d.full_name AS doctor_name
                 FROM billing b
                 JOIN patients p
                    ON p.id=b.patient_id
                 LEFT JOIN doctors d
                    ON d.id=b.doctor_id
                 ORDER BY b.id DESC
                 LIMIT 200"
            ),

            'patients' => $this->fetchAll(
                "SELECT
                    id,
                    patient_code,
                    full_name
                 FROM patients
                 ORDER BY full_name"
            ),

            'doctors' => $this->fetchAll(
                "SELECT
                    id,
                    doctor_code,
                    full_name
                 FROM doctors
                 ORDER BY full_name"
            )
        ];
    }

    public function resourcesData(): array
    {
        return [
            'equipment' => $this->fetchAll(
                "SELECT
                    e.*,
                    dep.name AS department_name
                 FROM equipment e
                 LEFT JOIN departments dep
                    ON dep.id=e.department_id
                 ORDER BY e.id DESC"
            ),

            'departments' => $this->fetchAll(
                "SELECT *
                 FROM departments
                 ORDER BY name"
            )
        ];
    }

    public function stockData(): array
    {
        return [
            'inventory' => $this->fetchAll(
                "SELECT
                    i.*,
                    dep.name AS department_name
                 FROM inventory i
                 LEFT JOIN departments dep
                    ON dep.id=i.department_id
                 ORDER BY i.id DESC"
            ),

            'departments' => $this->fetchAll(
                "SELECT *
                 FROM departments
                 ORDER BY name"
            )
        ];
    }

    public function settingsData(): array
    {
        $settings = $this->fetchOne(
            "SELECT *
             FROM hospital_settings
             LIMIT 1"
        );

        return [
            'settings' => $settings
        ];
    }

    public function createDepartment(
        $name,
        $description
    ): void {
        $name = trim((string)$name);
        $description = trim((string)$description);

        if ($name === '') {
            throw new Exception(
                'Department name is required.'
            );
        }

        $this->execute(
            "INSERT INTO departments
             (name, description)
             VALUES (?, ?)",
            'ss',
            [
                $name,
                $description
            ]
        );
    }

    public function updateDepartment(
        $id,
        $name,
        $description
    ): void {
        $id = (int)$id;
        $name = trim((string)$name);
        $description = trim((string)$description);

        if ($name === '') {
            throw new Exception(
                'Department name is required.'
            );
        }

        $this->execute(
            "UPDATE departments
             SET name=?, description=?
             WHERE id=?",
            'ssi',
            [
                $name,
                $description,
                $id
            ]
        );
    }

    public function deleteDepartment($id): void
    {
        $id = (int)$id;

        $count = (int)$this->scalar(
            "SELECT COUNT(*)
             FROM doctors
             WHERE department_id=" . $id
        );

        if ($count > 0) {
            throw new Exception(
                'Cannot delete a department that is assigned to doctors.'
            );
        }

        $this->execute(
            "DELETE FROM departments
             WHERE id=?",
            'i',
            [$id]
        );
    }

    public function savePerson(array $p): void
    {
        $type = $p['person_type'] ?? '';
        $id = (int)($p['id'] ?? 0);
        $status = $p['status'] ?? 'active';

        if ($type === 'doctor') {

            $name = trim($p['full_name'] ?? '');
            $specialization = trim(
                $p['specialization'] ?? ''
            );
            $phone = trim($p['phone'] ?? '');
            $email = trim($p['email'] ?? '');
            $experience = (int)(
                $p['experience_years'] ?? 0
            );
            $department = !empty($p['department_id'])
                ? (int)$p['department_id']
                : null;
            $availability = trim(
                $p['availability'] ?? ''
            );

            if ($name === '') {
                throw new Exception(
                    'Doctor name is required.'
                );
            }

            if ($id) {

                $this->execute(
                    "UPDATE doctors
                     SET full_name=?,
                         name=?,
                         specialization=?,
                         phone=?,
                         contact=?,
                         email=?,
                         experience_years=?,
                         department_id=?,
                         availability=?,
                         status=?
                     WHERE id=?",
                    'ssssssiissi',
                    [
                        $name,
                        $name,
                        $specialization,
                        $phone,
                        $phone,
                        $email,
                        $experience,
                        $department,
                        $availability,
                        $status,
                        $id
                    ]
                );

            } else {

                $code =
                    'DOC-' .
                    date('ymdHis') .
                    random_int(10, 99);

                $this->execute(
                    "INSERT INTO doctors
                     (
                        full_name,
                        name,
                        specialization,
                        phone,
                        contact,
                        email,
                        experience_years,
                        department_id,
                        availability,
                        status,
                        doctor_code
                     )
                     VALUES
                     (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
                    'ssssssiisss',
                    [
                        $name,
                        $name,
                        $specialization,
                        $phone,
                        $phone,
                        $email,
                        $experience,
                        $department,
                        $availability,
                        $status,
                        $code
                    ]
                );
            }

            return;
        }

        if ($type === 'receptionist') {

            $name = trim($p['full_name'] ?? '');
            $phone = trim($p['phone'] ?? '');
            $email = trim($p['email'] ?? '');

            if ($name === '') {
                throw new Exception(
                    'Receptionist name is required.'
                );
            }

            if ($id) {

                $this->execute(
                    "UPDATE receptionists
                     SET full_name=?,
                         name=?,
                         phone=?,
                         contact=?,
                         email=?,
                         status=?
                     WHERE id=?",
                    'ssssssi',
                    [
                        $name,
                        $name,
                        $phone,
                        $phone,
                        $email,
                        $status,
                        $id
                    ]
                );

            } else {

                $code =
                    'REC-' .
                    date('ymdHis') .
                    random_int(10, 99);

                $this->execute(
                    "INSERT INTO receptionists
                     (
                        full_name,
                        name,
                        phone,
                        contact,
                        email,
                        status,
                        receptionist_code
                     )
                     VALUES
                     (?, ?, ?, ?, ?, ?, ?)",
                    'sssssss',
                    [
                        $name,
                        $name,
                        $phone,
                        $phone,
                        $email,
                        $status,
                        $code
                    ]
                );
            }

            return;
        }

        if ($type === 'staff') {

            $name = trim($p['full_name'] ?? '');
            $roleTitle = trim(
                $p['role_title'] ?? ''
            );
            $department = !empty($p['department_id'])
                ? (int)$p['department_id']
                : null;
            $phone = trim($p['phone'] ?? '');
            $email = trim($p['email'] ?? '');
            $salary = (float)($p['salary'] ?? 0);

            if ($name === '') {
                throw new Exception(
                    'Staff name is required.'
                );
            }

            if ($id) {

                $this->execute(
                    "UPDATE staff
                     SET full_name=?,
                         role_title=?,
                         department_id=?,
                         phone=?,
                         email=?,
                         salary=?,
                         status=?
                     WHERE id=?",
                    'ssisdsii',
                    [
                        $name,
                        $roleTitle,
                        $department,
                        $phone,
                        $email,
                        $salary,
                        $status,
                        $id
                    ]
                );

            } else {

                $code =
                    'STF-' .
                    date('ymdHis') .
                    random_int(10, 99);

                $this->execute(
                    "INSERT INTO staff
                     (
                        full_name,
                        role_title,
                        department_id,
                        phone,
                        email,
                        salary,
                        status,
                        staff_code
                     )
                     VALUES
                     (?, ?, ?, ?, ?, ?, ?, ?)",
                    'ssissdss',
                    [
                        $name,
                        $roleTitle,
                        $department,
                        $phone,
                        $email,
                        $salary,
                        $status,
                        $code
                    ]
                );
            }

            return;
        }

        throw new Exception(
            'Invalid person type.'
        );
    }

    public function togglePersonStatus(
        $type,
        $id
    ): void {
        $tables = [
            'doctor' => 'doctors',
            'receptionist' => 'receptionists',
            'staff' => 'staff'
        ];

        if (!isset($tables[$type])) {
            throw new Exception(
                'Invalid person type.'
            );
        }

        $table = $tables[$type];
        $id = (int)$id;

        $sql =
            "UPDATE {$table}
             SET status =
                 IF(status='active',
                    'inactive',
                    'active')
             WHERE id=?";

        $this->execute(
            $sql,
            'i',
            [$id]
        );
    }

    public function saveBilling(array $p): void
    {
        $id = (int)($p['id'] ?? 0);

        $patientId = (int)(
            $p['patient_id'] ?? 0
        );

        $doctorId = !empty($p['doctor_id'])
            ? (int)$p['doctor_id']
            : null;

        $appointmentId =
            !empty($p['appointment_id'])
            ? (int)$p['appointment_id']
            : null;

        $itemType = trim(
            $p['item_type'] ?? ''
        );

        $description = trim(
            $p['description'] ?? ''
        );

        $amount = (float)(
            $p['amount'] ?? 0
        );

        $paid = (float)(
            $p['paid_amount'] ?? 0
        );

        $paymentMethod = trim(
            $p['payment_method'] ?? ''
        );

        $transactionDate =
            !empty($p['transaction_date'])
            ? $p['transaction_date']
            : date('Y-m-d');

        $status =
            $paid <= 0
            ? 'unpaid'
            : (
                $paid < $amount
                ? 'partial'
                : 'paid'
            );

        if ($id) {

            $this->execute(
                "UPDATE billing
                 SET patient_id=?,
                     doctor_id=?,
                     appointment_id=?,
                     item_type=?,
                     description=?,
                     amount=?,
                     paid_amount=?,
                     payment_status=?,
                     payment_method=?,
                     transaction_date=?
                 WHERE id=?",
                'iiissddsssi',
                [
                    $patientId,
                    $doctorId,
                    $appointmentId,
                    $itemType,
                    $description,
                    $amount,
                    $paid,
                    $status,
                    $paymentMethod,
                    $transactionDate,
                    $id
                ]
            );

        } else {

            $invoice =
                'INV-' .
                date('YmdHis') .
                random_int(10, 99);

            $createdBy =
                (int)($_SESSION['user_id'] ?? 0);

            $this->execute(
                "INSERT INTO billing
                 (
                    invoice_no,
                    patient_id,
                    doctor_id,
                    appointment_id,
                    item_type,
                    description,
                    amount,
                    paid_amount,
                    payment_status,
                    payment_method,
                    transaction_date,
                    created_by
                 )
                 VALUES
                 (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
                'siiissddsssi',
                [
                    $invoice,
                    $patientId,
                    $doctorId,
                    $appointmentId,
                    $itemType,
                    $description,
                    $amount,
                    $paid,
                    $status,
                    $paymentMethod,
                    $transactionDate,
                    $createdBy
                ]
            );
        }
    }

    public function deleteBilling($id): void
    {
        $this->execute(
            "DELETE FROM billing WHERE id=?",
            'i',
            [(int)$id]
        );
    }

    public function saveEquipment(array $p): void
    {
        $id = (int)($p['id'] ?? 0);

        $name = trim(
            $p['name'] ?? ''
        );

        $department = !empty($p['department_id'])
            ? (int)$p['department_id']
            : null;

        $quantity = (int)(
            $p['quantity'] ?? 0
        );

        $purchaseDate =
            !empty($p['purchase_date'])
            ? $p['purchase_date']
            : null;

        $condition = trim(
            $p['condition_status'] ?? ''
        );

        $status = trim(
            $p['status'] ?? 'active'
        );

        $notes = trim(
            $p['notes'] ?? ''
        );

        if ($id) {

            $this->execute(
                "UPDATE equipment
                 SET name=?,
                     department_id=?,
                     quantity=?,
                     purchase_date=?,
                     condition_status=?,
                     status=?,
                     notes=?
                 WHERE id=?",
                'siissssi',
                [
                    $name,
                    $department,
                    $quantity,
                    $purchaseDate,
                    $condition,
                    $status,
                    $notes,
                    $id
                ]
            );

        } else {

            $code =
                'EQ-' .
                date('ymdHis') .
                random_int(10, 99);

            $this->execute(
                "INSERT INTO equipment
                 (
                    equipment_code,
                    name,
                    department_id,
                    quantity,
                    purchase_date,
                    condition_status,
                    status,
                    notes
                 )
                 VALUES
                 (?, ?, ?, ?, ?, ?, ?, ?)",
                'ssiissss',
                [
                    $code,
                    $name,
                    $department,
                    $quantity,
                    $purchaseDate,
                    $condition,
                    $status,
                    $notes
                ]
            );
        }
    }

    public function deleteEquipment($id): void
    {
        $this->execute(
            "DELETE FROM equipment WHERE id=?",
            'i',
            [(int)$id]
        );
    }

    public function saveInventory(array $p): void
    {
        $id = (int)($p['id'] ?? 0);

        $itemName = trim(
            $p['item_name'] ?? ''
        );

        $category = trim(
            $p['category'] ?? ''
        );

        $unit = trim(
            $p['unit'] ?? ''
        );

        $current = (float)(
            $p['current_quantity'] ?? 0
        );

        $minimum = (float)(
            $p['minimum_quantity'] ?? 0
        );

        $critical = (float)(
            $p['critical_quantity'] ?? 0
        );

        $supplier = trim(
            $p['supplier'] ?? ''
        );

        $department = !empty($p['department_id'])
            ? (int)$p['department_id']
            : null;

        if ($id) {

            $this->execute(
                "UPDATE inventory
                 SET item_name=?,
                     category=?,
                     unit=?,
                     current_quantity=?,
                     minimum_quantity=?,
                     critical_quantity=?,
                     supplier=?,
                     department_id=?
                 WHERE id=?",
                'sssdddsii',
                [
                    $itemName,
                    $category,
                    $unit,
                    $current,
                    $minimum,
                    $critical,
                    $supplier,
                    $department,
                    $id
                ]
            );

        } else {

            $code =
                'INVST-' .
                date('ymdHis') .
                random_int(10, 99);

            $this->execute(
                "INSERT INTO inventory
                 (
                    item_code,
                    item_name,
                    category,
                    unit,
                    current_quantity,
                    minimum_quantity,
                    critical_quantity,
                    supplier,
                    department_id
                 )
                 VALUES
                 (?, ?, ?, ?, ?, ?, ?, ?, ?)",
                'ssssdddsi',
                [
                    $code,
                    $itemName,
                    $category,
                    $unit,
                    $current,
                    $minimum,
                    $critical,
                    $supplier,
                    $department
                ]
            );
        }
    }

    public function deleteInventory($id): void
    {
        $this->execute(
            "DELETE FROM inventory WHERE id=?",
            'i',
            [(int)$id]
        );
    }

    public function stockTransaction(
        array $p
    ): void {
        $id = (int)(
            $p['inventory_id'] ?? 0
        );

        $qty = (float)(
            $p['quantity'] ?? 0
        );

        $type = strtoupper(
            trim(
                $p['transaction_type'] ?? ''
            )
        );

        if ($qty <= 0) {
            throw new Exception(
                'Quantity must be greater than zero.'
            );
        }

        if (!in_array(
            $type,
            ['IN', 'OUT', 'ADJUST'],
            true
        )) {
            throw new Exception(
                'Invalid transaction type.'
            );
        }

        mysqli_begin_transaction($this->db);

        try {

            $stmt = $this->prepare(
                "SELECT current_quantity
                 FROM inventory
                 WHERE id=?
                 FOR UPDATE"
            );

            mysqli_stmt_bind_param(
                $stmt,
                'i',
                $id
            );

            mysqli_stmt_execute($stmt);

            $result =
                mysqli_stmt_get_result($stmt);

            $row =
                mysqli_fetch_assoc($result);

            mysqli_stmt_close($stmt);

            if (!$row) {
                throw new Exception(
                    'Inventory item not found.'
                );
            }

            $current =
                (float)$row['current_quantity'];

            if (
                $type === 'OUT' &&
                $qty > $current
            ) {
                throw new Exception(
                    'Not enough stock for OUT transaction.'
                );
            }

            if ($type === 'IN') {
                $newQuantity =
                    $current + $qty;
            } elseif ($type === 'OUT') {
                $newQuantity =
                    $current - $qty;
            } else {
                $newQuantity = $qty;
            }

            $this->execute(
                "UPDATE inventory
                 SET current_quantity=?
                 WHERE id=?",
                'di',
                [
                    $newQuantity,
                    $id
                ]
            );

            $createdBy =
                (int)($_SESSION['user_id'] ?? 0);

            $reference = trim(
                $p['reference'] ?? ''
            );

            $notes = trim(
                $p['notes'] ?? ''
            );

            $this->execute(
                "INSERT INTO stock_transactions
                 (
                    inventory_id,
                    transaction_type,
                    quantity,
                    reference,
                    notes,
                    created_by
                 )
                 VALUES
                 (?, ?, ?, ?, ?, ?)",
                'isdssi',
                [
                    $id,
                    $type,
                    $qty,
                    $reference,
                    $notes,
                    $createdBy
                ]
            );

            mysqli_commit($this->db);

        } catch (Throwable $e) {

            mysqli_rollback($this->db);

            throw $e;
        }
    }

    public function saveSettings(
        array $p
    ): void {
        $this->execute(
            "UPDATE hospital_settings
             SET hospital_name=?,
                 phone=?,
                 email=?,
                 address=?,
                 currency=?
             WHERE id=1",
            'sssss',
            [
                $p['hospital_name'] ?? '',
                $p['phone'] ?? '',
                $p['email'] ?? '',
                $p['address'] ?? '',
                $p['currency'] ?? ''
            ]
        );
    }
}