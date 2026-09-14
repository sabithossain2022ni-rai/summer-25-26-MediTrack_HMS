<?php
$s = $edit_slot;
?>

<style>
.slot-management-page {
    max-width: 1350px;
    margin: 0 auto;
    padding: 30px;
}

.slot-management-header {
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

.slot-management-header-icon {
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

.slot-management-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.slot-management-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
}

.slot-management-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.slot-management-layout {
    display: grid;
    grid-template-columns: minmax(350px, 0.8fr) minmax(0, 1.7fr);
    gap: 24px;
    align-items: start;
}

.slot-management-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.slot-management-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 22px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.slot-management-title {
    display: flex;
    align-items: center;
    gap: 12px;
}

.slot-management-card-icon {
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

.slot-management-card-header h2 {
    margin: 0;
    color: #111827;
    font-size: 18px;
    font-weight: 800;
}

.slot-management-card-header p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 12px;
}

.slot-management-mode {
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

.slot-management-form {
    padding: 24px;
}

.slot-management-form-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 18px;
}

.slot-management-field-row {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
}

.slot-management-field {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.slot-management-field label {
    display: flex;
    flex-direction: column;
    gap: 4px;
    color: #111827;
    font-size: 13px;
    font-weight: 800;
}

.slot-management-field label small {
    color: #6b7280;
    font-size: 11px;
    font-weight: 500;
    line-height: 1.4;
}

.slot-management-field input,
.slot-management-field select {
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

.slot-management-field input:focus,
.slot-management-field select:focus {
    border-color: #0f766e;
    box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.10);
}

.slot-management-submit-area {
    margin-top: 24px;
    padding-top: 20px;
    border-top: 1px solid #e5e7eb;
}

.slot-management-submit {
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

.slot-management-submit:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(15, 118, 110, 0.28);
}

.slot-management-search {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 18px 24px;
    border-bottom: 1px solid #e5e7eb;
    background: #ffffff;
}

.slot-management-search input {
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

.slot-management-search input:focus {
    border-color: #0f766e;
    box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.10);
}

.slot-management-filter-button {
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

.slot-management-filter-button:hover {
    border-color: #0f766e;
    background: #f0fdfa;
    color: #0f766e;
}

.slot-management-table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.slot-management-table {
    width: 100%;
    min-width: 800px;
    border-collapse: collapse;
}

.slot-management-table th {
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

.slot-management-table td {
    padding: 16px;
    border-bottom: 1px solid #eef2f7;
    color: #374151;
    font-size: 12px;
    vertical-align: middle;
}

.slot-management-table tbody tr {
    transition: background 0.2s ease;
}

.slot-management-table tbody tr:hover {
    background: #f8fffe;
}

.slot-management-table tbody tr:last-child td {
    border-bottom: 0;
}

.slot-doctor {
    display: flex;
    flex-direction: column;
    gap: 4px;
    min-width: 160px;
}

.slot-doctor-name {
    color: #111827;
    font-weight: 800;
}

.slot-specialization {
    color: #6b7280;
    font-size: 11px;
}

.slot-date {
    color: #374151;
    white-space: nowrap;
    font-weight: 600;
}

.slot-time {
    color: #374151;
    white-space: nowrap;
    font-weight: 600;
}

.slot-status {
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

.slot-status.available {
    background: #dcfce7;
    color: #166534;
}

.slot-status.booked {
    background: #dbeafe;
    color: #1d4ed8;
}

.slot-status.closed {
    background: #f3f4f6;
    color: #6b7280;
}

.slot-management-actions {
    display: flex;
    align-items: center;
    gap: 7px;
    white-space: nowrap;
}

.slot-edit-button,
.slot-close-button {
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

.slot-edit-button {
    border: 1px solid #99f6e4;
    background: #f0fdfa;
    color: #0f766e;
}

.slot-edit-button:hover {
    background: #ccfbf1;
}

.slot-close-button {
    border: 1px solid #fecaca;
    background: #fff1f2;
    color: #dc2626;
}

.slot-close-button:hover {
    background: #fee2e2;
}

.slot-close-form {
    display: inline;
    margin: 0;
}

.slot-management-empty {
    padding: 45px 20px !important;
    color: #9ca3af !important;
    text-align: center;
    font-size: 13px !important;
}

@media (max-width: 1100px) {
    .slot-management-layout {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 800px) {
    .slot-management-page {
        padding: 20px;
    }

    .slot-management-header {
        padding: 25px;
    }

    .slot-management-form {
        padding: 22px;
    }
}

@media (max-width: 600px) {
    .slot-management-page {
        padding: 15px;
    }

    .slot-management-header {
        padding: 22px;
        border-radius: 16px;
    }

    .slot-management-header-icon {
        width: 52px;
        height: 52px;
        font-size: 25px;
    }

    .slot-management-header h1 {
        font-size: 24px;
    }

    .slot-management-header p {
        line-height: 1.5;
    }

    .slot-management-field-row {
        grid-template-columns: 1fr;
    }

    .slot-management-card-header {
        padding: 20px;
    }

    .slot-management-search {
        flex-direction: column;
        align-items: stretch;
        padding: 18px 20px;
    }

    .slot-management-search input,
    .slot-management-filter-button {
        width: 100%;
    }

    .slot-management-actions {
        flex-direction: column;
        align-items: stretch;
    }

    .slot-edit-button,
    .slot-close-button {
        width: 100%;
    }
}
</style>

<div class="slot-management-page">

    <div class="slot-management-header">

        <div class="slot-management-header-icon">
            🕐
        </div>

        <div>

            <span class="slot-management-label">
                RECEPTIONIST PORTAL
            </span>

            <h1>
                Manage Doctor Available Slots
            </h1>

            <p>
                Create and control the time slots available for patient appointments.
            </p>

        </div>

    </div>

    <div class="slot-management-layout">

        <div class="slot-management-card">

            <div class="slot-management-card-header">

                <div class="slot-management-title">

                    <div class="slot-management-card-icon">
                        <?=$s ? '✏️' : '🕐'?>
                    </div>

                    <div>

                        <h2>
                            <?=$s ? 'Edit Slot' : 'Add Doctor Slot'?>
                        </h2>

                        <p>
                            <?=$s
                                ? 'Update the selected doctor slot.'
                                : 'Create a new appointment time slot.'?>
                        </p>

                    </div>

                </div>

                <span class="slot-management-mode">
                    <?=$s ? 'EDIT' : 'NEW'?>
                </span>

            </div>

            <div class="slot-management-form">

                <form
                    method="post"
                    action="index.php?page=receptionist&action=slot_save"
                    class="slot-management-form-grid"
                    data-validate="slot"
                >

                    <input
                        type="hidden"
                        name="csrf_token"
                        value="<?=e(csrf_token())?>"
                    >

                    <input
                        type="hidden"
                        name="slot_id"
                        value="<?=e($s['id'] ?? '')?>"
                    >

                    <div class="slot-management-field">

                        <label for="doctor_id">
                            <span>Doctor *</span>
                            <small>Select the doctor assigned to this time slot</small>
                        </label>

                        <select
                            id="doctor_id"
                            name="doctor_id"
                            required
                        >

                            <option value="">
                                Select doctor
                            </option>

                            <?php foreach($doctors as $d): ?>

                                <option
                                    value="<?=e($d['doctor_id'])?>"
                                    <?=($s['doctor_id'] ?? '') == $d['doctor_id'] ? 'selected' : ''?>
                                >
                                    <?=e($d['full_name'])?>
                                    —
                                    <?=e($d['specialization'])?>
                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="slot-management-field">

                        <label for="slot_date">
                            <span>Date *</span>
                            <small>Select the appointment date</small>
                        </label>

                        <input
                            id="slot_date"
                            type="date"
                            name="slot_date"
                            required
                            value="<?=e($s['slot_date'] ?? date('Y-m-d'))?>"
                        >

                    </div>

                    <div class="slot-management-field-row">

                        <div class="slot-management-field">

                            <label for="start_time">
                                <span>Start Time *</span>
                                <small>When the slot begins</small>
                            </label>

                            <input
                                id="start_time"
                                type="time"
                                name="start_time"
                                required
                                value="<?=e($s['start_time'] ?? '09:00')?>"
                            >

                        </div>

                        <div class="slot-management-field">

                            <label for="end_time">
                                <span>End Time *</span>
                                <small>When the slot ends</small>
                            </label>

                            <input
                                id="end_time"
                                type="time"
                                name="end_time"
                                required
                                value="<?=e($s['end_time'] ?? '09:30')?>"
                            >

                        </div>

                    </div>

                    <div class="slot-management-field">

                        <label for="status">
                            <span>Status</span>
                            <small>Current availability of this slot</small>
                        </label>

                        <select
                            id="status"
                            name="status"
                        >

                            <option
                                value="available"
                                <?=($s['status'] ?? 'available') === 'available' ? 'selected' : ''?>
                            >
                                Available
                            </option>

                            <option
                                value="booked"
                                <?=($s['status'] ?? '') === 'booked' ? 'selected' : ''?>
                            >
                                Booked
                            </option>

                            <option
                                value="closed"
                                <?=($s['status'] ?? '') === 'closed' ? 'selected' : ''?>
                            >
                                Closed
                            </option>

                        </select>

                    </div>

                    <div class="slot-management-submit-area">

                        <button
                            class="slot-management-submit"
                            type="submit"
                        >

                            <span>
                                <?=$s ? '✓' : '＋'?>
                            </span>

                            <?=$s ? 'Update Slot' : 'Create Slot'?>

                        </button>

                    </div>

                </form>

            </div>

        </div>

        <div class="slot-management-card">

            <div class="slot-management-card-header">

                <div>

                    <h2>
                        Slot Calendar
                    </h2>

                    <p>
                        Filter doctor availability by date.
                    </p>

                </div>

            </div>

            <form
                class="slot-management-search"
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
                    value="slots"
                >

                <input
                    type="date"
                    name="date"
                    value="<?=e($_GET['date'] ?? '')?>"
                >

                <button
                    type="submit"
                    class="slot-management-filter-button"
                >
                    Filter
                </button>

            </form>

            <div class="slot-management-table-wrapper">

                <table class="slot-management-table">

                    <thead>

                        <tr>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach($slots as $row): ?>

                            <tr>

                                <td>

                                    <div class="slot-doctor">

                                        <span class="slot-doctor-name">
                                            <?=e($row['doctor_name'])?>
                                        </span>

                                        <span class="slot-specialization">
                                            <?=e($row['specialization'])?>
                                        </span>

                                    </div>

                                </td>

                                <td>

                                    <span class="slot-date">
                                        📅 <?=e(date(
                                            'd M Y',
                                            strtotime($row['slot_date'])
                                        ))?>
                                    </span>

                                </td>

                                <td>

                                    <span class="slot-time">
                                        🕐 <?=e(date(
                                            'h:i A',
                                            strtotime($row['start_time'])
                                        ))?>
                                        -
                                        <?=e(date(
                                            'h:i A',
                                            strtotime($row['end_time'])
                                        ))?>
                                    </span>

                                </td>

                                <td>

                                    <span class="slot-status <?=e($row['status'])?>">
                                        <?=e(ucfirst($row['status']))?>
                                    </span>

                                </td>

                                <td>

                                    <div class="slot-management-actions">

                                        <a
                                            class="slot-edit-button"
                                            href="index.php?page=receptionist&section=slots&edit=<?=e($row['id'])?>"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            method="post"
                                            action="index.php?page=receptionist&action=slot_delete"
                                            class="slot-close-form"
                                            onsubmit="return confirm('Close this slot?')"
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
                                                class="slot-close-button"
                                            >
                                                Close
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        <?php if(!$slots): ?>

                            <tr>

                                <td
                                    colspan="5"
                                    class="slot-management-empty"
                                >
                                    No slots found.
                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>