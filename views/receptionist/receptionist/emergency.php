<?php
$er = $edit_emergency;
?>

<style>
.emergency-page {
    max-width: 1350px;
    margin: 0 auto;
    padding: 30px;
}

.emergency-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    padding: 30px 32px;
    margin-bottom: 24px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    border-radius: 20px;
    color: #ffffff;
    box-shadow: 0 12px 30px rgba(15, 118, 110, 0.20);
}

.emergency-header-content {
    display: flex;
    align-items: center;
    gap: 18px;
}

.emergency-header-icon {
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

.emergency-header-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.emergency-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
}

.emergency-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.emergency-layout {
    display: grid;
    grid-template-columns: minmax(350px, 0.85fr) minmax(0, 1.65fr);
    gap: 24px;
    align-items: start;
}

.emergency-container {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.emergency-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 22px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.emergency-title-group {
    display: flex;
    align-items: center;
    gap: 12px;
}

.emergency-card-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: #fee2e2;
    color: #dc2626;
    border-radius: 11px;
    font-size: 20px;
}

.emergency-card-header h2 {
    margin: 0;
    color: #111827;
    font-size: 18px;
    font-weight: 800;
}

.emergency-card-header p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 12px;
}

.emergency-priority-tag {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 6px 10px;
    border-radius: 999px;
    background: #fee2e2;
    color: #b91c1c;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 0.6px;
}

.emergency-form {
    padding: 24px;
}

.emergency-form-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 18px;
}

.emergency-field {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.emergency-field.full-width {
    grid-column: 1 / -1;
}

.emergency-field label {
    display: flex;
    flex-direction: column;
    gap: 4px;
    color: #111827;
    font-size: 13px;
    font-weight: 800;
}

.emergency-field label small {
    color: #6b7280;
    font-size: 11px;
    font-weight: 500;
    line-height: 1.4;
}

.emergency-field input,
.emergency-field select {
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

.emergency-field input::placeholder {
    color: #9ca3af;
}

.emergency-field input:focus,
.emergency-field select:focus {
    border-color: #0f766e;
    box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.10);
}

.emergency-field-row {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
}

.emergency-submit-area {
    margin-top: 24px;
    padding-top: 20px;
    border-top: 1px solid #e5e7eb;
}

.emergency-submit-button {
    width: 100%;
    min-height: 46px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 0 18px;
    border: 0;
    border-radius: 10px;
    background: linear-gradient(135deg, #dc2626, #ef4444);
    color: #ffffff;
    font-size: 13px;
    font-weight: 800;
    cursor: pointer;
    box-shadow: 0 7px 16px rgba(220, 38, 38, 0.20);
    transition: all 0.2s ease;
}

.emergency-submit-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(220, 38, 38, 0.28);
}

.emergency-submit-button.update-mode {
    background: linear-gradient(135deg, #0f766e, #0d9488);
    box-shadow: 0 7px 16px rgba(15, 118, 110, 0.20);
}

.emergency-submit-button.update-mode:hover {
    box-shadow: 0 10px 22px rgba(15, 118, 110, 0.28);
}

.emergency-search {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 18px 24px;
    border-bottom: 1px solid #e5e7eb;
    background: #ffffff;
}

.emergency-search input {
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

.emergency-search input::placeholder {
    color: #9ca3af;
}

.emergency-search input:focus {
    border-color: #0f766e;
    box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.10);
}

.emergency-search-button {
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

.emergency-search-button:hover {
    border-color: #0f766e;
    background: #f0fdfa;
    color: #0f766e;
}

.emergency-table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.emergency-table {
    width: 100%;
    min-width: 900px;
    border-collapse: collapse;
}

.emergency-table th {
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

.emergency-table td {
    padding: 16px;
    border-bottom: 1px solid #eef2f7;
    color: #374151;
    font-size: 12px;
    vertical-align: middle;
}

.emergency-table tbody tr {
    transition: background 0.2s ease;
}

.emergency-table tbody tr:hover {
    background: #fffafa;
}

.emergency-table tbody tr:last-child td {
    border-bottom: 0;
}

.emergency-code {
    color: #dc2626;
    font-weight: 800;
    white-space: nowrap;
}

.emergency-patient {
    display: flex;
    flex-direction: column;
    gap: 4px;
    min-width: 135px;
}

.emergency-patient-name {
    color: #111827;
    font-weight: 800;
}

.emergency-phone {
    color: #6b7280;
    font-size: 11px;
}

.emergency-type {
    max-width: 180px;
    color: #374151;
    line-height: 1.4;
}

.emergency-arrival {
    color: #4b5563;
    white-space: nowrap;
}

.emergency-status {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 78px;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 800;
    text-transform: capitalize;
}

.emergency-status.waiting {
    background: #fef3c7;
    color: #92400e;
}

.emergency-status.completed {
    background: #dcfce7;
    color: #166534;
}

.emergency-status.cancelled {
    background: #fee2e2;
    color: #b91c1c;
}

.emergency-actions {
    display: flex;
    align-items: center;
    gap: 7px;
    white-space: nowrap;
}

.emergency-edit-button,
.emergency-cancel-button {
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

.emergency-edit-button {
    border: 1px solid #99f6e4;
    background: #f0fdfa;
    color: #0f766e;
}

.emergency-edit-button:hover {
    background: #ccfbf1;
}

.emergency-cancel-button {
    border: 1px solid #fecaca;
    background: #fff1f2;
    color: #dc2626;
}

.emergency-cancel-button:hover {
    background: #fee2e2;
}

.emergency-delete-form {
    display: inline;
    margin: 0;
}

.emergency-empty {
    padding: 45px 20px !important;
    color: #9ca3af !important;
    text-align: center;
    font-size: 13px !important;
}

@media (max-width: 1100px) {
    .emergency-layout {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 800px) {
    .emergency-page {
        padding: 20px;
    }

    .emergency-header {
        align-items: flex-start;
        padding: 25px;
    }

    .emergency-form {
        padding: 22px;
    }
}

@media (max-width: 600px) {
    .emergency-page {
        padding: 15px;
    }

    .emergency-header {
        padding: 22px;
        border-radius: 16px;
    }

    .emergency-header-content {
        align-items: flex-start;
    }

    .emergency-header-icon {
        width: 52px;
        height: 52px;
        font-size: 25px;
    }

    .emergency-header h1 {
        font-size: 24px;
    }

    .emergency-header p {
        line-height: 1.5;
    }

    .emergency-field-row {
        grid-template-columns: 1fr;
    }

    .emergency-card-header {
        padding: 20px;
    }

    .emergency-search {
        flex-direction: column;
        align-items: stretch;
        padding: 18px 20px;
    }

    .emergency-search-button {
        width: 100%;
    }

    .emergency-actions {
        flex-direction: column;
        align-items: stretch;
    }

    .emergency-edit-button,
    .emergency-cancel-button {
        width: 100%;
    }
}
</style>

<div class="emergency-page">

    <div class="emergency-header">

        <div class="emergency-header-content">

            <div class="emergency-header-icon">
                🚨
            </div>

            <div>

                <span class="emergency-header-label">
                    EMERGENCY CARE
                </span>

                <h1>
                    Emergency Patient Registration
                </h1>

                <p>
                    Register essential emergency information first.
                    Complete the patient's full details later.
                </p>

            </div>

        </div>

    </div>

    <div class="emergency-layout">

        <div class="emergency-container">

            <div class="emergency-card-header">

                <div class="emergency-title-group">

                    <div class="emergency-card-icon">
                        🚑
                    </div>

                    <div>

                        <h2>
                            <?=$er ? 'Edit Emergency Record' : 'Fast Emergency Registration'?>
                        </h2>

                        <p>
                            <?=$er
                                ? 'Update the emergency patient information.'
                                : 'Enter the essential patient information.'?>
                        </p>

                    </div>

                </div>

                <span class="emergency-priority-tag">
                    Priority
                </span>

            </div>

            <div class="emergency-form">

                <form
                    method="post"
                    action="index.php?page=receptionist&action=emergency_save"
                    class="emergency-form-grid"
                    data-validate="emergency"
                >

                    <input
                        type="hidden"
                        name="csrf_token"
                        value="<?=e(csrf_token())?>"
                    >

                    <input
                        type="hidden"
                        name="emergency_id"
                        value="<?=e($er['id'] ?? '')?>"
                    >

                    <div class="emergency-field">

                        <label for="patient_name">
                            <span>Patient Name *</span>
                            <small>Enter the patient's name or use Unknown if unavailable</small>
                        </label>

                        <input
                            id="patient_name"
                            name="patient_name"
                            required
                            value="<?=e($er['patient_name'] ?? '')?>"
                            placeholder="Name or Unknown"
                        >

                    </div>

                    <div class="emergency-field-row">

                        <div class="emergency-field">

                            <label for="age">
                                <span>Age</span>
                                <small>Patient age</small>
                            </label>

                            <input
                                id="age"
                                type="number"
                                min="0"
                                max="120"
                                name="age"
                                value="<?=e($er['age'] ?? '')?>"
                                placeholder="Age"
                            >

                        </div>

                        <div class="emergency-field">

                            <label for="gender">
                                <span>Gender</span>
                                <small>Select if known</small>
                            </label>

                            <select id="gender" name="gender">

                                <option value="">
                                    Not known
                                </option>

                                <option
                                    value="Male"
                                    <?=($er['gender'] ?? '') === 'Male' ? 'selected' : ''?>
                                >
                                    Male
                                </option>

                                <option
                                    value="Female"
                                    <?=($er['gender'] ?? '') === 'Female' ? 'selected' : ''?>
                                >
                                    Female
                                </option>

                                <option
                                    value="Other"
                                    <?=($er['gender'] ?? '') === 'Other' ? 'selected' : ''?>
                                >
                                    Other
                                </option>

                            </select>

                        </div>

                    </div>

                    <div class="emergency-field-row">

                        <div class="emergency-field">

                            <label for="phone">
                                <span>Phone</span>
                                <small>Patient phone number</small>
                            </label>

                            <input
                                id="phone"
                                name="phone"
                                value="<?=e($er['phone'] ?? '')?>"
                                placeholder="Phone number"
                            >

                        </div>

                        <div class="emergency-field">

                            <label for="emergency_contact">
                                <span>Emergency Contact</span>
                                <small>Contact person or number</small>
                            </label>

                            <input
                                id="emergency_contact"
                                name="emergency_contact"
                                value="<?=e($er['emergency_contact'] ?? '')?>"
                                placeholder="Emergency contact"
                            >

                        </div>

                    </div>

                    <div class="emergency-field">

                        <label for="emergency_type">
                            <span>Emergency Type *</span>
                            <small>Describe the main emergency condition</small>
                        </label>

                        <input
                            id="emergency_type"
                            name="emergency_type"
                            required
                            value="<?=e($er['emergency_type'] ?? '')?>"
                            placeholder="Accident, chest pain, injury..."
                        >

                    </div>

                    <div class="emergency-field">

                        <label for="arrival_time">
                            <span>Arrival Time</span>
                            <small>When the patient arrived at the facility</small>
                        </label>

                        <input
                            id="arrival_time"
                            type="datetime-local"
                            name="arrival_time"
                            value="<?=e(
                                isset($er['arrival_time'])
                                    ? date('Y-m-d\TH:i', strtotime($er['arrival_time']))
                                    : date('Y-m-d\TH:i')
                            )?>"
                        >

                    </div>

                    <div class="emergency-field">

                        <label for="notes">
                            <span>Notes</span>
                            <small>Add any short important information</small>
                        </label>

                        <input
                            id="notes"
                            name="notes"
                            value="<?=e($er['notes'] ?? '')?>"
                            placeholder="Short important note"
                        >

                    </div>

                    <div class="emergency-field">

                        <label for="status">
                            <span>Status</span>
                            <small>Current emergency record status</small>
                        </label>

                        <select id="status" name="status">

                            <option
                                value="waiting"
                                <?=($er['status'] ?? 'waiting') === 'waiting' ? 'selected' : ''?>
                            >
                                Waiting
                            </option>

                            <option
                                value="completed"
                                <?=($er['status'] ?? '') === 'completed' ? 'selected' : ''?>
                            >
                                Completed
                            </option>

                            <option
                                value="cancelled"
                                <?=($er['status'] ?? '') === 'cancelled' ? 'selected' : ''?>
                            >
                                Cancelled
                            </option>

                        </select>

                    </div>

                    <div class="emergency-submit-area">

                        <button
                            type="submit"
                            class="emergency-submit-button <?=$er ? 'update-mode' : ''?>"
                        >

                            <span>
                                <?=$er ? '✓' : '🚨'?>
                            </span>

                            <?=$er ? 'Update Emergency Record' : 'FAST REGISTER NOW'?>

                        </button>

                    </div>

                </form>

            </div>

        </div>

        <div class="emergency-container">

            <div class="emergency-card-header">

                <div>

                    <h2>
                        Emergency Queue
                    </h2>

                    <p>
                        Newest emergency records appear first.
                    </p>

                </div>

            </div>

            <form
                class="emergency-search"
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
                    value="emergency"
                >

                <input
                    name="search"
                    value="<?=e($_GET['search'] ?? '')?>"
                    placeholder="Search emergency ID, patient or type"
                >

                <button
                    type="submit"
                    class="emergency-search-button"
                >
                    Search
                </button>

            </form>

            <div class="emergency-table-wrapper">

                <table class="emergency-table">

                    <thead>

                        <tr>
                            <th>Emergency ID</th>
                            <th>Patient</th>
                            <th>Type</th>
                            <th>Arrival</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach($emergencies as $row): ?>

                            <tr>

                                <td>
                                    <span class="emergency-code">
                                        <?=e($row['emergency_code'])?>
                                    </span>
                                </td>

                                <td>

                                    <div class="emergency-patient">

                                        <span class="emergency-patient-name">
                                            <?=e($row['patient_name'])?>
                                        </span>

                                        <span class="emergency-phone">
                                            <?=e($row['phone'] ?: 'No phone')?>
                                        </span>

                                    </div>

                                </td>

                                <td>

                                    <div class="emergency-type">
                                        <?=e($row['emergency_type'])?>
                                    </div>

                                </td>

                                <td>

                                    <div class="emergency-arrival">
                                        📅 <?=e(date(
                                            'd M, h:i A',
                                            strtotime($row['arrival_time'])
                                        ))?>
                                    </div>

                                </td>

                                <td>

                                    <span class="emergency-status <?=e($row['status'])?>">
                                        <?=e(ucfirst($row['status']))?>
                                    </span>

                                </td>

                                <td>

                                    <div class="emergency-actions">

                                        <a
                                            class="emergency-edit-button"
                                            href="index.php?page=receptionist&section=emergency&edit=<?=e($row['id'])?>"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            method="post"
                                            action="index.php?page=receptionist&action=emergency_delete"
                                            class="emergency-delete-form"
                                            onsubmit="return confirm('Cancel this emergency record?')"
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
                                                class="emergency-cancel-button"
                                            >
                                                Cancel
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        <?php if(!$emergencies): ?>

                            <tr>

                                <td
                                    colspan="6"
                                    class="emergency-empty"
                                >
                                    No emergency records found.
                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

