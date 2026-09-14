<style>
.people-page {
    max-width: 1350px;
    margin: 0 auto;
    padding: 30px;
}

.people-header {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 30px 32px;
    margin-bottom: 24px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    border-radius: 20px;
    color: #ffffff;
    box-shadow: 0 12px 30px rgba(15, 118, 110, 0.20);
}

.people-header-icon {
    width: 62px;
    height: 62px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: rgba(255, 255, 255, 0.16);
    border: 1px solid rgba(255, 255, 255, 0.25);
    border-radius: 16px;
    font-size: 30px;
}

.people-header-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.people-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
}

.people-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.people-section {
    margin-bottom: 24px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.people-section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 22px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.people-section-title {
    display: flex;
    align-items: center;
    gap: 13px;
}

.people-section-icon {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: #ccfbf1;
    color: #0f766e;
    border-radius: 11px;
    font-size: 21px;
}

.people-section-header h2 {
    margin: 0;
    color: #111827;
    font-size: 18px;
    font-weight: 800;
}

.people-section-header p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 12px;
}

.people-count {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 36px;
    height: 30px;
    padding: 0 10px;
    background: #ccfbf1;
    color: #0f766e;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 800;
}

.people-form {
    padding: 24px;
}

.people-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 17px;
}

.people-field {
    display: block;
}

.people-field.full {
    grid-column: 1 / -1;
}

.people-field span {
    display: block;
    margin-bottom: 7px;
    color: #374151;
    font-size: 12px;
    font-weight: 700;
}

.people-field input,
.people-field select {
    width: 100%;
    height: 46px;
    padding: 0 13px;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    background: #ffffff;
    color: #111827;
    font-size: 13px;
    outline: none;
    box-sizing: border-box;
    transition: all 0.2s ease;
}

.people-field input::placeholder {
    color: #9ca3af;
}

.people-field input:focus,
.people-field select:focus {
    border-color: #0d9488;
    box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.12);
}

.people-submit {
    grid-column: 1 / -1;
    min-height: 46px;
    margin-top: 2px;
    border: 0;
    border-radius: 10px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    color: #ffffff;
    font-size: 13px;
    font-weight: 800;
    cursor: pointer;
    box-shadow: 0 7px 16px rgba(15, 118, 110, 0.18);
    transition: all 0.2s ease;
}

.people-submit:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(15, 118, 110, 0.25);
}

.people-table-wrap {
    width: 100%;
    overflow-x: auto;
}

.people-table {
    width: 100%;
    min-width: 760px;
    border-collapse: collapse;
}

.people-table th {
    padding: 14px 18px;
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    color: #6b7280;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 0.7px;
    text-align: left;
    text-transform: uppercase;
    white-space: nowrap;
}

.people-table td {
    padding: 15px 18px;
    border-bottom: 1px solid #f1f5f9;
    color: #374151;
    font-size: 13px;
    vertical-align: middle;
}

.people-table tbody tr {
    transition: background 0.2s ease;
}

.people-table tbody tr:hover {
    background: #f8fffe;
}

.person-code {
    color: #0f766e;
    font-size: 11px;
    font-weight: 800;
    white-space: nowrap;
}

.person-name {
    display: flex;
    align-items: center;
    gap: 11px;
    color: #111827;
    font-weight: 800;
}

.person-avatar {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: #ccfbf1;
    color: #0f766e;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 900;
}

.person-secondary {
    color: #6b7280;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 68px;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 800;
    text-transform: capitalize;
}

.status-badge.active {
    background: #dcfce7;
    color: #15803d;
}

.status-badge.inactive {
    background: #f3f4f6;
    color: #6b7280;
}

.people-action {
    min-height: 34px;
    padding: 0 12px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    background: #ffffff;
    color: #374151;
    font-size: 11px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
}

.people-action:hover {
    border-color: #0d9488;
    background: #f0fdfa;
    color: #0f766e;
    transform: translateY(-1px);
}

.people-salary {
    color: #0f766e;
    font-weight: 800;
    white-space: nowrap;
}

.people-note {
    margin: 0;
    padding: 0 24px 22px;
    color: #6b7280;
    font-size: 12px;
    line-height: 1.6;
}

.people-empty {
    padding: 42px 20px !important;
    color: #9ca3af !important;
    text-align: center;
}

@media (max-width: 900px) {
    .people-form-grid {
        grid-template-columns: 1fr;
    }

    .people-field.full {
        grid-column: auto;
    }

    .people-submit {
        grid-column: auto;
    }
}

@media (max-width: 700px) {
    .people-page {
        padding: 20px;
    }

    .people-header {
        padding: 23px;
        border-radius: 16px;
    }

    .people-header-icon {
        width: 52px;
        height: 52px;
        font-size: 25px;
    }

    .people-header h1 {
        font-size: 25px;
    }

    .people-section-header {
        padding: 19px;
    }

    .people-form {
        padding: 20px;
    }
}

@media (max-width: 500px) {
    .people-page {
        padding: 15px;
    }

    .people-header {
        gap: 12px;
        padding: 20px;
    }

    .people-header-icon {
        width: 46px;
        height: 46px;
        font-size: 22px;
    }

    .people-header h1 {
        font-size: 21px;
    }

    .people-header-label {
        font-size: 9px;
    }

    .people-section-header h2 {
        font-size: 16px;
    }
}
</style>

<div class="people-page">

    <div class="people-header">

        <div class="people-header-icon">
            👥
        </div>

        <div>

            <span class="people-header-label">
                ADMINISTRATION
            </span>

            <h1>
                People & Roles
            </h1>

            <p>
                Manage doctors, receptionists, hospital staff and shared patient records.
            </p>

        </div>

    </div>

    <div class="people-section">

        <div class="people-section-header">

            <div class="people-section-title">

                <div class="people-section-icon">
                    🩺
                </div>

                <div>

                    <h2>
                        Add / Update Doctor
                    </h2>

                    <p>
                        Register doctors and assign their hospital information.
                    </p>

                </div>

            </div>

            <span class="people-count">
                <?= count($data['doctors']) ?>
            </span>

        </div>

        <form
            class="people-form people-form-grid"
            method="post"
            action="index.php?action=person_save"
        >

            <input
                type="hidden"
                name="csrf"
                value="<?= e(csrf_token()) ?>"
            >

            <input
                type="hidden"
                name="person_type"
                value="doctor"
            >

            <input
                type="hidden"
                name="return_page"
                value="people"
            >

            <label class="people-field">

                <span>
                    Doctor Name *
                </span>

                <input
                    name="full_name"
                    placeholder="e.g. Dr. Rahim Ahmed"
                    required
                >

            </label>

            <label class="people-field">

                <span>
                    Specialization *
                </span>

                <input
                    name="specialization"
                    placeholder="e.g. Cardiology"
                    required
                >

            </label>

            <label class="people-field">

                <span>
                    Phone
                </span>

                <input
                    name="phone"
                    placeholder="01XXXXXXXXX"
                >

            </label>

            <label class="people-field">

                <span>
                    Email
                </span>

                <input
                    name="email"
                    type="email"
                    placeholder="doctor@email.com"
                >

            </label>

            <label class="people-field">

                <span>
                    Experience Years
                </span>

                <input
                    name="experience_years"
                    type="number"
                    min="0"
                    placeholder="e.g. 8"
                >

            </label>

            <label class="people-field">

                <span>
                    Department
                </span>

                <select name="department_id">

                    <option value="">
                        Department
                    </option>

                    <?php foreach($data['departments'] as $d): ?>

                        <option value="<?= $d['id'] ?>">
                            <?= e($d['name']) ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </label>

            <label class="people-field">

                <span>
                    Availability
                </span>

                <input
                    name="availability"
                    placeholder="e.g. Sat-Thu 5-9 PM"
                >

            </label>

            <label class="people-field">

                <span>
                    Status
                </span>

                <select name="status">

                    <option value="active">
                        Active
                    </option>

                    <option value="inactive">
                        Inactive
                    </option>

                </select>

            </label>

            <button
                type="submit"
                class="people-submit"
            >
                + Save Doctor
            </button>

        </form>

        <div class="people-table-wrap">

            <table class="people-table">

                <thead>

                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Specialization</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach($data['doctors'] as $r): ?>

                        <tr>

                            <td>
                                <span class="person-code">
                                    <?= e($r['doctor_code']) ?>
                                </span>
                            </td>

                            <td>

                                <div class="person-name">

                                    <div class="person-avatar">
                                        <?= e(strtoupper(substr($r['full_name'], 0, 1))) ?>
                                    </div>

                                    <?= e($r['full_name']) ?>

                                </div>

                            </td>

                            <td>
                                <?= e($r['specialization']) ?>
                            </td>

                            <td>
                                <?= e($r['department_name']) ?>
                            </td>

                            <td>

                                <span class="status-badge <?= e($r['status']) ?>">
                                    <?= e($r['status']) ?>
                                </span>

                            </td>

                            <td>

                                <form
                                    method="post"
                                    action="index.php?action=person_status"
                                    class="inline"
                                >

                                    <input
                                        type="hidden"
                                        name="csrf"
                                        value="<?= e(csrf_token()) ?>"
                                    >

                                    <input
                                        type="hidden"
                                        name="type"
                                        value="doctor"
                                    >

                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?= $r['id'] ?>"
                                    >

                                    <button
                                        type="submit"
                                        class="people-action"
                                    >
                                        Toggle
                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    <?php if(empty($data['doctors'])): ?>

                        <tr>

                            <td
                                colspan="6"
                                class="people-empty"
                            >
                                No doctors found.

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

    <div class="people-section">

        <div class="people-section-header">

            <div class="people-section-title">

                <div class="people-section-icon">
                    👨‍💼
                </div>

                <div>

                    <h2>
                        Receptionists
                    </h2>

                    <p>
                        Manage front-desk and reception staff.
                    </p>

                </div>

            </div>

            <span class="people-count">
                <?= count($data['receptionists']) ?>
            </span>

        </div>

        <form
            class="people-form people-form-grid"
            method="post"
            action="index.php?action=person_save"
        >

            <input
                type="hidden"
                name="csrf"
                value="<?= e(csrf_token()) ?>"
            >

            <input
                type="hidden"
                name="person_type"
                value="receptionist"
            >

            <input
                type="hidden"
                name="return_page"
                value="people"
            >

            <label class="people-field">

                <span>
                    Receptionist Name *
                </span>

                <input
                    name="full_name"
                    placeholder="e.g. Nusrat Jahan"
                    required
                >

            </label>

            <label class="people-field">

                <span>
                    Phone
                </span>

                <input
                    name="phone"
                    placeholder="01XXXXXXXXX"
                >

            </label>

            <label class="people-field">

                <span>
                    Email
                </span>

                <input
                    name="email"
                    type="email"
                    placeholder="receptionist@email.com"
                >

            </label>

            <label class="people-field">

                <span>
                    Status
                </span>

                <select name="status">

                    <option value="active">
                        Active
                    </option>

                    <option value="inactive">
                        Inactive
                    </option>

                </select>

            </label>

            <button
                type="submit"
                class="people-submit"
            >
                + Add Receptionist
            </button>

        </form>

        <div class="people-table-wrap">

            <table class="people-table">

                <thead>

                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach($data['receptionists'] as $r): ?>

                        <tr>

                            <td>

                                <span class="person-code">
                                    <?= e($r['receptionist_code']) ?>
                                </span>

                            </td>

                            <td>

                                <div class="person-name">

                                    <div class="person-avatar">
                                        <?= e(strtoupper(substr($r['full_name'], 0, 1))) ?>
                                    </div>

                                    <?= e($r['full_name']) ?>

                                </div>

                            </td>

                            <td>
                                <span class="person-secondary">
                                    <?= e($r['phone']) ?>
                                </span>
                            </td>

                            <td>

                                <span class="status-badge <?= e($r['status']) ?>">
                                    <?= e($r['status']) ?>
                                </span>

                            </td>

                            <td>

                                <form
                                    method="post"
                                    action="index.php?action=person_status"
                                    class="inline"
                                >

                                    <input
                                        type="hidden"
                                        name="csrf"
                                        value="<?= e(csrf_token()) ?>"
                                    >

                                    <input
                                        type="hidden"
                                        name="type"
                                        value="receptionist"
                                    >

                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?= $r['id'] ?>"
                                    >

                                    <button
                                        type="submit"
                                        class="people-action"
                                    >
                                        Toggle
                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    <?php if(empty($data['receptionists'])): ?>

                        <tr>

                            <td
                                colspan="5"
                                class="people-empty"
                            >
                                No receptionists found.
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

    <div class="people-section">

        <div class="people-section-header">

            <div class="people-section-title">

                <div class="people-section-icon">
                    🧑‍⚕️
                </div>

                <div>

                    <h2>
                        Hospital Staff
                    </h2>

                    <p>
                        Add nurses, technicians and other hospital personnel.
                    </p>

                </div>

            </div>

            <span class="people-count">
                <?= count($data['staff']) ?>
            </span>

        </div>

        <form
            class="people-form people-form-grid"
            method="post"
            action="index.php?action=person_save"
        >

            <input
                type="hidden"
                name="csrf"
                value="<?= e(csrf_token()) ?>"
            >

            <input
                type="hidden"
                name="person_type"
                value="staff"
            >

            <input
                type="hidden"
                name="return_page"
                value="people"
            >

            <label class="people-field">

                <span>
                    Staff Name *
                </span>

                <input
                    name="full_name"
                    placeholder="e.g. Md. Karim"
                    required
                >

            </label>

            <label class="people-field">

                <span>
                    Role *
                </span>

                <input
                    name="role_title"
                    placeholder="e.g. Nurse / Technician"
                    required
                >

            </label>

            <label class="people-field">

                <span>
                    Department
                </span>

                <select name="department_id">

                    <option value="">
                        Department
                    </option>

                    <?php foreach($data['departments'] as $d): ?>

                        <option value="<?= $d['id'] ?>">
                            <?= e($d['name']) ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </label>

            <label class="people-field">

                <span>
                    Phone
                </span>

                <input
                    name="phone"
                    placeholder="01XXXXXXXXX"
                >

            </label>

            <label class="people-field">

                <span>
                    Email
                </span>

                <input
                    name="email"
                    type="email"
                    placeholder="staff@email.com"
                >

            </label>

            <label class="people-field">

                <span>
                    Salary
                </span>

                <input
                    name="salary"
                    type="number"
                    step="0.01"
                    placeholder="Monthly salary"
                >

            </label>

            <label class="people-field">

                <span>
                    Status
                </span>

                <select name="status">

                    <option value="active">
                        Active
                    </option>

                    <option value="inactive">
                        Inactive
                    </option>

                </select>

            </label>

            <button
                type="submit"
                class="people-submit"
            >
                + Add Staff
            </button>

        </form>

        <div class="people-table-wrap">

            <table class="people-table">

                <thead>

                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach($data['staff'] as $r): ?>

                        <tr>

                            <td>

                                <span class="person-code">
                                    <?= e($r['staff_code']) ?>
                                </span>

                            </td>

                            <td>

                                <div class="person-name">

                                    <div class="person-avatar">
                                        <?= e(strtoupper(substr($r['full_name'], 0, 1))) ?>
                                    </div>

                                    <?= e($r['full_name']) ?>

                                </div>

                            </td>

                            <td>
                                <?= e($r['role_title']) ?>
                            </td>

                            <td>
                                <?= e($r['department_name']) ?>
                            </td>

                            <td>

                                <span class="people-salary">
                                    ৳ <?= money($r['salary']) ?>
                                </span>

                            </td>

                            <td>

                                <span class="status-badge <?= e($r['status']) ?>">
                                    <?= e($r['status']) ?>
                                </span>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    <?php if(empty($data['staff'])): ?>

                        <tr>

                            <td
                                colspan="6"
                                class="people-empty"
                            >
                                No hospital staff found.
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

    <div class="people-section">

        <div class="people-section-header">

            <div class="people-section-title">

                <div class="people-section-icon">
                    👤
                </div>

                <div>

                    <h2>
                        Patients
                    </h2>

                    <p>
                        Shared patient records connected across the hospital system.
                    </p>

                </div>

            </div>

            <span class="people-count">
                <?= count($data['patients']) ?>
            </span>

        </div>

        <p class="people-note">
            Admin can review patient records for operational connection; patient identity is not physically deleted from this Admin module.
        </p>

        <div class="people-table-wrap">

            <table class="people-table">

                <thead>

                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach($data['patients'] as $r): ?>

                        <tr>

                            <td>

                                <span class="person-code">
                                    <?= e($r['patient_code']) ?>
                                </span>

                            </td>

                            <td>

                                <div class="person-name">

                                    <div class="person-avatar">
                                        <?= e(strtoupper(substr($r['full_name'], 0, 1))) ?>
                                    </div>

                                    <?= e($r['full_name']) ?>

                                </div>

                            </td>

                            <td>
                                <?= e($r['phone']) ?>
                            </td>

                            <td>
                                <?= e($r['gender']) ?>
                            </td>

                            <td>

                                <span class="status-badge <?= e($r['status']) ?>">
                                    <?= e($r['status']) ?>
                                </span>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    <?php if(empty($data['patients'])): ?>

                        <tr>

                            <td
                                colspan="5"
                                class="people-empty"
                            >
                                No patient records found.
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>