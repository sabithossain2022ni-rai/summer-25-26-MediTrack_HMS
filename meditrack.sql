CREATE DATABASE IF NOT EXISTS meditrack
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE meditrack;

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS audit_logs;
DROP TABLE IF EXISTS stock_transactions;
DROP TABLE IF EXISTS inventory;
DROP TABLE IF EXISTS equipment;
DROP TABLE IF EXISTS staff_payments;
DROP TABLE IF EXISTS billing;
DROP TABLE IF EXISTS patient_risks;
DROP TABLE IF EXISTS followups;
DROP TABLE IF EXISTS prescriptions;
DROP TABLE IF EXISTS symptoms;
DROP TABLE IF EXISTS appointments;
DROP TABLE IF EXISTS doctor_slots;
DROP TABLE IF EXISTS emergency_registrations;
DROP TABLE IF EXISTS staff;
DROP TABLE IF EXISTS receptionists;
DROP TABLE IF EXISTS doctors;
DROP TABLE IF EXISTS patients;
DROP TABLE IF EXISTS departments;
DROP TABLE IF EXISTS hospital_settings;
DROP TABLE IF EXISTS users;

SET FOREIGN_KEY_CHECKS = 1;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(180) NOT NULL UNIQUE,
    contact VARCHAR(30),
    username VARCHAR(80) UNIQUE,
    password VARCHAR(255),
    password_hash VARCHAR(255),
    role ENUM('admin','doctor','receptionist','patient') NOT NULL,
    status ENUM('active','inactive') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;


CREATE TABLE departments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL UNIQUE,
    description VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;


CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    patient_code VARCHAR(40) UNIQUE,
    name VARCHAR(120) NOT NULL,
    full_name VARCHAR(120),
    dob DATE NULL,
    age INT DEFAULT 0,
    gender VARCHAR(20),
    phone VARCHAR(30),
    email VARCHAR(180),
    address TEXT,
    emergency_contact VARCHAR(150),
    emergency_contact_name VARCHAR(120),
    emergency_contact_phone VARCHAR(30),
    blood_group VARCHAR(10),
    status ENUM('active','inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    doctor_code VARCHAR(40) UNIQUE,
    name VARCHAR(120) NOT NULL,
    full_name VARCHAR(120),
    specialization VARCHAR(120) NOT NULL,
    department_id INT NULL,
    department VARCHAR(120),
    phone VARCHAR(30),
    email VARCHAR(180),
    experience_years INT DEFAULT 0,
    availability VARCHAR(255),
    status ENUM('active','inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE SET NULL,

    FOREIGN KEY (department_id)
        REFERENCES departments(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE receptionists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    receptionist_code VARCHAR(40) UNIQUE,
    name VARCHAR(120) NOT NULL,
    full_name VARCHAR(120),
    phone VARCHAR(30),
    email VARCHAR(180),
    status ENUM('active','inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    staff_code VARCHAR(40) UNIQUE,
    name VARCHAR(120) NOT NULL,
    full_name VARCHAR(120),
    role_title VARCHAR(100) NOT NULL,
    department_id INT NULL,
    phone VARCHAR(30),
    email VARCHAR(180),
    salary DECIMAL(12,2) DEFAULT 0,
    status ENUM('active','inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE SET NULL,

    FOREIGN KEY (department_id)
        REFERENCES departments(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE doctor_slots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doctor_id INT NOT NULL,
    slot_date DATE NOT NULL,
    slot_time TIME NULL,
    start_time TIME NULL,
    end_time TIME NULL,
    max_patients INT DEFAULT 1,
    status ENUM('available','booked','closed','open') DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (doctor_id)
        REFERENCES doctors(id)
        ON DELETE CASCADE
) ENGINE=InnoDB;


CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    slot_id INT NULL,
    receptionist_id INT NULL,
    department_id INT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NULL,
    start_time TIME NULL,
    end_time TIME NULL,
    reason VARCHAR(255),
    status ENUM(
        'pending',
        'booked',
        'confirmed',
        'completed',
        'cancelled',
        'no_show',
        'emergency'
    ) DEFAULT 'booked',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (patient_id)
        REFERENCES patients(id)
        ON DELETE RESTRICT,

    FOREIGN KEY (doctor_id)
        REFERENCES doctors(id)
        ON DELETE RESTRICT,

    FOREIGN KEY (slot_id)
        REFERENCES doctor_slots(id)
        ON DELETE SET NULL,

    FOREIGN KEY (receptionist_id)
        REFERENCES receptionists(id)
        ON DELETE SET NULL,

    FOREIGN KEY (department_id)
        REFERENCES departments(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE symptoms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    symptom VARCHAR(150),
    symptom_text TEXT,
    severity VARCHAR(50),
    duration VARCHAR(100),
    frequency VARCHAR(100),
    symptom_date DATE,
    notes TEXT,
    recorded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (patient_id)
        REFERENCES patients(id)
        ON DELETE CASCADE
) ENGINE=InnoDB;


CREATE TABLE patient_risks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    risk_level ENUM(
        'Low',
        'Medium',
        'High',
        'Critical'
    ) NOT NULL,
    description TEXT NOT NULL,
    risk_date DATE NOT NULL,
    status ENUM(
        'Open',
        'Resolved'
    ) NOT NULL DEFAULT 'Open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (patient_id)
        REFERENCES patients(id)
        ON DELETE CASCADE
) ENGINE=InnoDB;


CREATE TABLE prescriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NULL,
    appointment_id INT NULL,
    diagnosis VARCHAR(255),
    medicine VARCHAR(255),
    dosage VARCHAR(100),
    frequency VARCHAR(100),
    duration VARCHAR(100),
    instructions TEXT,
    notes TEXT,
    prescribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM(
        'active',
        'completed',
        'cancelled'
    ) DEFAULT 'active',

    FOREIGN KEY (patient_id)
        REFERENCES patients(id)
        ON DELETE RESTRICT,

    FOREIGN KEY (doctor_id)
        REFERENCES doctors(id)
        ON DELETE RESTRICT,

    FOREIGN KEY (appointment_id)
        REFERENCES appointments(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE followups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NULL,
    appointment_id INT NULL,
    followup_date DATE NOT NULL,
    followup_time TIME NULL,
    purpose VARCHAR(255),
    reason VARCHAR(255),
    notes TEXT,
    status ENUM(
        'pending',
        'scheduled',
        'active',
        'completed',
        'cancelled'
    ) DEFAULT 'scheduled',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (patient_id)
        REFERENCES patients(id)
        ON DELETE RESTRICT,

    FOREIGN KEY (doctor_id)
        REFERENCES doctors(id)
        ON DELETE RESTRICT,

    FOREIGN KEY (appointment_id)
        REFERENCES appointments(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE emergency_registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    emergency_code VARCHAR(30) UNIQUE,
    patient_id INT NULL,
    receptionist_id INT NULL,
    patient_name VARCHAR(120) NOT NULL,
    age INT NULL,
    gender VARCHAR(20),
    phone VARCHAR(30),
    emergency_contact VARCHAR(30),
    emergency_type VARCHAR(120),
    symptoms TEXT,
    priority ENUM(
        'critical',
        'high',
        'normal'
    ) DEFAULT 'high',
    arrival_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    notes VARCHAR(255),
    status ENUM(
        'waiting',
        'active',
        'completed',
        'transferred',
        'cancelled'
    ) DEFAULT 'waiting',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (patient_id)
        REFERENCES patients(id)
        ON DELETE SET NULL,

    FOREIGN KEY (receptionist_id)
        REFERENCES receptionists(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE billing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_no VARCHAR(50) UNIQUE NOT NULL,
    patient_id INT NOT NULL,
    doctor_id INT NULL,
    appointment_id INT NULL,
    item_type VARCHAR(60) NOT NULL,
    description VARCHAR(255) NOT NULL,
    amount DECIMAL(12,2) NOT NULL DEFAULT 0,
    paid_amount DECIMAL(12,2) NOT NULL DEFAULT 0,
    payment_status ENUM(
        'unpaid',
        'partial',
        'paid'
    ) DEFAULT 'unpaid',
    payment_method VARCHAR(40),
    transaction_date DATE NOT NULL,
    created_by INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (patient_id)
        REFERENCES patients(id)
        ON DELETE RESTRICT,

    FOREIGN KEY (doctor_id)
        REFERENCES doctors(id)
        ON DELETE SET NULL,

    FOREIGN KEY (appointment_id)
        REFERENCES appointments(id)
        ON DELETE SET NULL,

    FOREIGN KEY (created_by)
        REFERENCES users(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE staff_payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    staff_id INT NULL,
    doctor_id INT NULL,
    payment_type ENUM(
        'doctor',
        'staff'
    ) NOT NULL,
    description VARCHAR(255),
    total_amount DECIMAL(12,2) NOT NULL DEFAULT 0,
    payment_date DATE NOT NULL,
    created_by INT NULL,

    FOREIGN KEY (staff_id)
        REFERENCES staff(id)
        ON DELETE SET NULL,

    FOREIGN KEY (doctor_id)
        REFERENCES doctors(id)
        ON DELETE SET NULL,

    FOREIGN KEY (created_by)
        REFERENCES users(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE equipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    equipment_code VARCHAR(50) UNIQUE NOT NULL,
    name VARCHAR(150) NOT NULL,
    department_id INT NULL,
    quantity INT DEFAULT 1,
    purchase_date DATE NULL,
    condition_status VARCHAR(50) DEFAULT 'Good',
    status ENUM(
        'active',
        'inactive'
    ) DEFAULT 'active',
    notes VARCHAR(255),

    FOREIGN KEY (department_id)
        REFERENCES departments(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_code VARCHAR(50) UNIQUE NOT NULL,
    item_name VARCHAR(150) NOT NULL,
    category VARCHAR(80) NOT NULL,
    unit VARCHAR(30) DEFAULT 'pcs',
    current_quantity DECIMAL(12,2) NOT NULL DEFAULT 0,
    minimum_quantity DECIMAL(12,2) NOT NULL DEFAULT 0,
    critical_quantity DECIMAL(12,2) NOT NULL DEFAULT 0,
    supplier VARCHAR(150),
    department_id INT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (department_id)
        REFERENCES departments(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE stock_transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    inventory_id INT NOT NULL,
    transaction_type ENUM(
        'IN',
        'OUT',
        'ADJUST'
    ) NOT NULL,
    quantity DECIMAL(12,2) NOT NULL,
    reference VARCHAR(100),
    notes VARCHAR(255),
    created_by INT NULL,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (inventory_id)
        REFERENCES inventory(id)
        ON DELETE CASCADE,

    FOREIGN KEY (created_by)
        REFERENCES users(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE audit_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    action VARCHAR(100) NOT NULL,
    entity VARCHAR(100),
    entity_id INT NULL,
    details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE SET NULL
) ENGINE=InnoDB;


CREATE TABLE hospital_settings (
    id INT PRIMARY KEY,
    hospital_name VARCHAR(180) NOT NULL,
    phone VARCHAR(30),
    email VARCHAR(180),
    address VARCHAR(255),
    currency VARCHAR(10) DEFAULT 'BDT'
) ENGINE=InnoDB;


INSERT INTO departments
(name, description)
VALUES
('Medicine', 'General medicine and internal medicine'),
('Cardiology', 'Heart and cardiovascular care'),
('Emergency', 'Emergency and urgent care'),
('Laboratory', 'Diagnostic laboratory services'),
('Pharmacy', 'Medicine dispensing and inventory');


INSERT INTO hospital_settings
(id, hospital_name, phone, email, address, currency)
VALUES
(
    1,
    'MEDITrack Smart Hospital',
    '+8801700000000',
    'admin@meditrack.local',
    'Dhaka, Bangladesh',
    'BDT'
);


INSERT INTO inventory
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
(
    'MED-001',
    'Paracetamol 500mg',
    'Medicine',
    'box',
    80,
    30,
    10,
    'ABC Pharma',
    5
),
(
    'CON-001',
    'Disposable Syringe 5ml',
    'Syringe',
    'pcs',
    120,
    50,
    15,
    'Medical Supplies Ltd',
    3
),
(
    'CON-002',
    'Surgical Gloves',
    'Gloves',
    'box',
    18,
    10,
    3,
    'SafeMed',
    3
),
(
    'CON-003',
    'Surgical Masks',
    'Masks',
    'box',
    55,
    20,
    5,
    'SafeMed',
    3
),
(
    'MED-002',
    'Normal Saline 500ml',
    'Saline',
    'bottle',
    25,
    10,
    3,
    'HealthCare Supply',
    3
);


INSERT INTO equipment
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
(
    'EQ-001',
    'Patient Monitor',
    3,
    5,
    '2025-01-10',
    'Good',
    'active',
    'Emergency monitoring'
),
(
    'EQ-002',
    'ECG Machine',
    2,
    2,
    '2025-03-20',
    'Good',
    'active',
    'Cardiology'
),
(
    'EQ-003',
    'Wheelchair',
    3,
    8,
    '2024-08-12',
    'Good',
    'active',
    'General use'
);