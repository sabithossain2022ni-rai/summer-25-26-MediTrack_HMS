# MEDITrack Hospital Management System

MEDITrack is a unified PHP + MySQL hospital management system with four role-based portals:

- Admin
- Doctor
- Receptionist
- Patient

## Included features

### Admin
- Dashboard and hospital statistics
- Doctors, receptionists and staff management
- Department management
- Patient billing and payment tracking
- Medical equipment/resource management
- Inventory and smart stock thresholds
- Stock IN / OUT / ADJUST transactions
- Hospital settings

### Doctor
- Doctor dashboard
- Patient CRUD and patient details
- Patient risk records
- Prescription management
- Follow-up scheduling
- CSRF-protected actions

### Receptionist
- Receptionist dashboard with live statistics
- Patient registration/search/update/deactivation
- Doctor appointment slot management
- Appointment booking/status/delete
- Emergency fast registration and queue
- AJAX patient/slot/statistics helpers

### Patient
- Patient dashboard
- Profile management
- Symptom CRUD and search
- Appointment booking and cancellation
- Follow-up viewing
- Prescription/risk information where provided by the UI

## Requirements

- XAMPP (Apache + MySQL) or another PHP/MySQL environment
- PHP 8.1+
- MySQL 5.7+ / 8.x
- PHP extensions: mysqli, session

## Installation

1. Extract `MediTrack_HMS` into XAMPP `htdocs`.
2. Start Apache and MySQL.
3. Open phpMyAdmin.
4. Import `meditrack.sql`.
5. Open `create_admin.php` once in the browser to create/reset the default admin account.
6. Open:

   `http://localhost/MediTrack_HMS/`

## Default admin account

- Email: `admin@meditrack.com`
- Username: `admin`
- Password: `Admin@123`

Change the default password before using the project outside a classroom/demo environment.

## Database configuration

Edit:

`config/config.php`

Default settings:

- Host: `localhost`
- User: `root`
- Password: empty
- Database: `meditrack`

## Notes

The project uses one shared database schema for all four roles. The models and controllers have been aligned to the same table/column names and the accidental duplicate/Markdown-corrupted code has been removed.

For a classroom/local XAMPP project, this package is ready to import and run after the database is created.
