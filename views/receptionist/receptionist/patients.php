<?php
$p = $edit_patient;
?>

<style>
.patient-management-page {
    max-width: 1350px;
    margin: 0 auto;
    padding: 30px;
}

.patient-management-header {
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

.patient-management-header-icon {
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

.patient-management-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.patient-management-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
}

.patient-management-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.patient-management-layout {
    display: grid;
    grid-template-columns: minmax(350px, 0.8fr) minmax(0, 1.7fr);
    gap: 24px;
    align-items: start;
}

.patient-management-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.patient-management-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 22px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.patient-management-title {
    display: flex;
    align-items: center;
    gap: 12px;
}

.patient-management-card-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: #ccfbf1;
    color: #0f766e;
    border-radius: 11px;
    font-size: 20px;
}

.patient-management-card-header h2 {
    margin: 0;
    color: #111827;
    font-size: 18px;
    font-weight: 800;
}

.patient-management-card-header p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 12px;
}

.patient-management-mode {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 6px 10px;
    border-radius: 999px;
    background: #ccfbf1;
    color: #0f766e;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 0.5px;
}

.patient-management-form {
    padding: 24px;
}

.patient-management-form-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 18px;
}

.patient-management-field-row {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
}

.patient-management-field {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.patient-management-field label {
    display: flex;
    flex-direction: column;
    gap: 4px;
    color: #111827;
    font-size: 13px;
    font-weight: 800;
}

.patient-management-field label small {
    color: #6b7280;
    font-size: 11px;
    font-weight: 500;
    line-height: 1.4;
}

.patient-management-field input,
.patient-management-field select {
    width: 100%;
    height: 46px;
    box-sizing: border-box;
    padding: 0 13px;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    background: #ffffff;
    color: #111827;
    font-family: inherit;
    font-size: 13px;
    outline: none;
    transition: all 0.2s ease;
}

.patient-management-field input::placeholder {
    color: #9ca3af;
}

.patient-management-field input:focus,
.patient-management-field select:focus {
    border-color: #0f766e;
    box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.10);
}

.patient-management-submit-area {
    margin-top: 24px;
    padding-top: 20px;
    border-top: 1px solid #e5e7eb;
}

.patient-management-submit {
    width: 100%;
    min-height: 46px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 0 18px;
    border: 0;
    border-radius: 10px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    color: #ffffff;
    font-size: 13px;
    font-weight: 800;
    cursor: pointer;
    box-shadow: 0 7px 16px rgba(15, 118, 110, 0.20);
    transition: all 0.2s ease;
}

.patient-management-submit:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(15, 118, 110, 0.28);
}

.patient-management-search {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 18px 24px;
    border-bottom: 1px solid #e5e7eb;
    background: #ffffff;
}

.patient-management-search input {
    flex: 1;
    min-width: 0;
    height: 42px;
    box-sizing: border-box;
    padding: 0 13px;
    border: 1px solid #d1d5db;
    border-radius: 9px;
    background: #ffffff;
    color: #111827;
    font-family: inherit;
    font-size: 12px;
    outline: none;
    transition: all 0.2s ease;
}

.patient-management-search input::placeholder {
    color: #9ca3af;
}

.patient-management-search input:focus {
    border-color: #0f766e;
    box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.10);
}

.patient-management-search-button {
    height: 42px;
    padding: 0 16px;
    border: 1px solid #d1d5db;
    border-radius: 9px;
    background: #ffffff;
    color: #374151;
    font-size: 12px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
}

.patient-management-search-button:hover {
    border-color: #0f766e;
    background: #f0fdfa;
    color: #0f766e;
}

.patient-management-table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.patient-management-table {
    width: 100%;
    min-width: 760px;
    border-collapse: collapse;
}

.patient-management-table th {
    padding: 14px 16px;
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

.patient-management-table td {
    padding: 16px;
    border-bottom: 1px solid #eef2f7;
    color: #374151;
    font-size: 12px;
    vertical-align: middle;
}

.patient-management-table tbody tr {
    transition: background 0.2s ease;
}

.patient-management-table tbody tr:hover {
    background: #f8fffe;
}

.patient-management-table tbody tr:last-child td {
    border-bottom: 0;
}

.patient-code {
    color: #0f766e;
    font-weight: 800;
    white-space: nowrap;
}

.patient-name-cell {
    display: flex;
    flex-direction: column;
    gap: 4px;
    min-width: 150px;
}

.patient-name {
    color: #111827;
    font-weight: 800;
}

.patient-details {
    color: #6b7280;
    font-size: 11px;
}

.patient-phone {
    color: #374151;
    white-space: nowrap;
}

.patient-status {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 72px;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 800;
    text-transform: capitalize;
}

.patient-status.active {
    background: #dcfce7;
    color: #166534;
}

.patient-status.inactive {
    background: #f3f4f6;
    color: #6b7280;
}

.patient-management-actions {
    display: flex;
    align-items: center;
    gap: 7px;
    white-space: nowrap;
}

.patient-edit-button,
.patient-deactivate-button {
    min-height: 34px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 11px;
    border-radius: 8px;
    font-size: 10px;
    font-weight: 800;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s ease;
}

.patient-edit-button {
    border: 1px solid #99f6e4;
    background: #f0fdfa;
    color: #0f766e;
}

.patient-edit-button:hover {
    background: #ccfbf1;
}

.patient-deactivate-button {
    border: 1px solid #fecaca;
    background: #fff1f2;
    color: #dc2626;
}

.patient-deactivate-button:hover {
    background: #fee2e2;
}

.patient-deactivate-form {
    display: inline;
    margin: 0;
}

.patient-management-empty {
    padding: 45px 20px !important;
    color: #9ca3af !important;
    text-align: center;
    font-size: 13px !important;
}

@media (max-width: 1100px) {
    .patient-management-layout {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 800px) {
    .patient-management-page {
        padding: 20px;
    }

    .patient-management-header {
        padding: 25px;
    }

    .patient-management-form {
        padding: 22px;
    }
}

@media (max-width: 600px) {
    .patient-management-page {
        padding: 15px;
    }

    .patient-management-header {
        padding: 22px;
        border-radius: 16px;
    }

    .patient-management-header-icon {
        width: 52px;
        height: 52px;
        font-size: 25px;
    }

    .patient-management-header h1 {
        font-size: 24px;
    }

    .patient-management-header p {
        line-height: 1.5;
    }

    .patient-management-field-row {
        grid-template-columns: 1fr;
    }

    .patient-management-card-header {
        padding: 20px;
    }

    .patient-management-search {
        flex-direction: column;
        align-items: stretch;
        padding: 18px 20px;
    }

    .patient-management-search-button {
        width: 100%;
    }

    .patient-management-actions {
        flex-direction: column;
        align-items: stretch;
    }

    .patient-edit-button,
    .patient-deactivate-button {
        width: 100%;
    }
}
</style>

<div class="patient-management-page">

    <div class="patient-management-header">

        <div class="patient-management-header-icon">
            👥
        </div>

        <div>

            <span class="patient-management-label">
                RECEPTIONIST PORTAL
            </span>

            <h1>
                Manage Patients
            </h1>

            <p>
                Register, search, update and manage basic patient information.
            </p>

        </div>

    </div>

    <div class="patient-management-layout">

        <div class="patient-management-card">

            <div class="patient-management-card-header">

                <div class="patient-management-title">

                    <div class="patient-management-card-icon">
                        <?=$p ? '✏️' : '👤'?>
                    </div>

                    <div>

                        <h2>
                            <?=$p ? 'Edit Patient' : 'Register Patient'?>
                        </h2>

                        <p>
                            <?=$p
                                ? 'Update the patient information below.'
                                : 'Add a new patient to the system.'?>
                        </p>

                    </div>

                </div>

                <span class="patient-management-mode">
                    <?=$p ? 'EDIT' : 'NEW'?>
                </span>

            </div>

            <div class="patient-management-form">

                <form
                    method="post"
                    action="index.php?page=receptionist&action=patient_save"
                    class="patient-management-form-grid"
                    data-validate="patient"
                >

                    <input
                        type="hidden"
                        name="csrf_token"
                        value="<?=e(csrf_token())?>"
                    >

                    <input
                        type="hidden"
                        name="patient_id"
                        value="<?=e($p['id'] ?? '')?>"
                    >

                    <div class="patient-management-field">

                        <label for="full_name">
                            <span>Full Name *</span>
                            <small>Enter the patient's complete name</small>
                        </label>

                        <input
                            id="full_name"
                            name="full_name"
                            required
                            value="<?=e($p['full_name'] ?? '')?>"
                            placeholder="e.g. Rahim Ahmed"
                        >

                    </div>

                    <div class="patient-management-field-row">

                        <div class="patient-management-field">

                            <label for="age">
                                <span>Age *</span>
                                <small>Patient age</small>
                            </label>

                            <input
                                id="age"
                                type="number"
                                name="age"
                                min="0"
                                max="120"
                                required
                                value="<?=e($p['age'] ?? '')?>"
                                placeholder="Age"
                            >

                        </div>

                        <div class="patient-management-field">

                            <label for="gender">
                                <span>Gender *</span>
                                <small>Select patient's gender</small>
                            </label>

                            <select
                                id="gender"
                                name="gender"
                            >

                                <option value="Male" <?=($p['gender'] ?? '') === 'Male' ? 'selected' : ''?>>
                                    Male
                                </option>

                                <option value="Female" <?=($p['gender'] ?? '') === 'Female' ? 'selected' : ''?>>
                                    Female
                                </option>

                                <option value="Other" <?=($p['gender'] ?? '') === 'Other' ? 'selected' : ''?>>
                                    Other
                                </option>

                            </select>

                        </div>

                    </div>

                    <div class="patient-management-field-row">

                        <div class="patient-management-field">

                            <label for="phone">
                                <span>Phone *</span>
                                <small>Primary contact number</small>
                            </label>

                            <input
                                id="phone"
                                name="phone"
                                required
                                value="<?=e($p['phone'] ?? '')?>"
                                placeholder="01XXXXXXXXX"
                            >

                        </div>

                        <div class="patient-management-field">

                            <label for="email">
                                <span>Email</span>
                                <small>Optional email address</small>
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="<?=e($p['email'] ?? '')?>"
                                placeholder="patient@email.com"
                            >

                        </div>

                    </div>

                    <div class="patient-management-field">

                        <label for="address">
                            <span>Address</span>
                            <small>Patient's current address</small>
                        </label>

                        <input
                            id="address"
                            name="address"
                            value="<?=e($p['address'] ?? '')?>"
                            placeholder="Area, city"
                        >

                    </div>

                    <div class="patient-management-field">

                        <label for="emergency_contact">
                            <span>Emergency Contact</span>
                            <small>Contact number for emergencies</small>
                        </label>

                        <input
                            id="emergency_contact"
                            name="emergency_contact"
                            value="<?=e($p['emergency_contact'] ?? '')?>"
                            placeholder="Contact number"
                        >

                    </div>

                    <div class="patient-management-field">

                        <label for="status">
                            <span>Status</span>
                            <small>Current patient record status</small>
                        </label>

                        <select
                            id="status"
                            name="status"
                        >

                            <option
                                value="active"
                                <?=($p['status'] ?? 'active') === 'active' ? 'selected' : ''?>
                            >
                                Active
                            </option>

                            <option
                                value="inactive"
                                <?=($p['status'] ?? '') === 'inactive' ? 'selected' : ''?>
                            >
                                Inactive
                            </option>

                        </select>

                    </div>

                    <div class="patient-management-submit-area">

                        <button
                            class="patient-management-submit"
                            type="submit"
                        >

                            <span>
                                <?=$p ? '✓' : '＋'?>
                            </span>

                            <?=$p ? 'Update Patient' : 'Register Patient'?>

                        </button>

                    </div>

                </form>

            </div>

        </div>

        <div class="patient-management-card">

            <div class="patient-management-card-header">

                <div>

                    <h2>
                        Patient List
                    </h2>

                    <p>
                        Search and manage registered patient records.
                    </p>

                </div>

            </div>

            <form
                class="patient-management-search"
                method="get"
            >

                <input
                    type="hidden"
                    name="page"
                    value="receptionist"
                >

                <input
                    type="hidden"
                    name="section"
                    value="patients"
                >

                <input
                    name="search"
                    value="<?=e($_GET['search'] ?? '')?>"
                    placeholder="Search name, patient ID or phone"
                >

                <button
                    type="submit"
                    class="patient-management-search-button"
                >
                    Search
                </button>

            </form>

            <div class="patient-management-table-wrapper">

                <table class="patient-management-table">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody id="patient-live-results">

                        <?php foreach($patients as $row): ?>

                            <tr>

                                <td>
                                    <span class="patient-code">
                                        <?=e($row['patient_code'])?>
                                    </span>
                                </td>

                                <td>

                                    <div class="patient-name-cell">

                                        <span class="patient-name">
                                            <?=e($row['full_name'])?>
                                        </span>

                                        <span class="patient-details">
                                            <?=e($row['gender'])?>
                                            ·
                                            <?=e($row['age'])?> years
                                        </span>

                                    </div>

                                </td>

                                <td>

                                    <span class="patient-phone">
                                        <?=e($row['phone'])?>
                                    </span>

                                </td>

                                <td>

                                    <span class="patient-status <?=e($row['status'])?>">
                                        <?=e(ucfirst($row['status']))?>
                                    </span>

                                </td>

                                <td>

                                    <div class="patient-management-actions">

                                        <a
                                            class="patient-edit-button"
                                            href="index.php?page=receptionist&section=patients&edit=<?=e($row['id'])?>"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            method="post"
                                            action="index.php?page=receptionist&action=patient_delete"
                                            class="patient-deactivate-form"
                                            onsubmit="return confirm('Deactivate this patient?')"
                                        >

                                            <input
                                                type="hidden"
                                                name="csrf_token"
                                                value="<?=e(csrf_token())?>"
                                            >

                                            <input
                                                type="hidden"
                                                name="id"
                                                value="<?=e($row['id'])?>"
                                            >

                                            <button
                                                type="submit"
                                                class="patient-deactivate-button"
                                            >
                                                Deactivate
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        <?php if(!$patients): ?>

                            <tr>

                                <td
                                    colspan="5"
                                    class="patient-management-empty"
                                >
                                    No patients found.
                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>