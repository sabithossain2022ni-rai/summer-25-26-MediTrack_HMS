<style>
.appointment-page {
    max-width: 1350px;
    margin: 0 auto;
    padding: 30px;
}

.appointment-header {
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

.appointment-header-content {
    display: flex;
    align-items: center;
    gap: 18px;
}

.appointment-header-icon {
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

.appointment-header-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.appointment-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
}

.appointment-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.appointment-layout {
    display: grid;
    grid-template-columns: minmax(320px, 0.8fr) minmax(0, 1.7fr);
    gap: 24px;
    align-items: start;
}

.appointment-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.appointment-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 22px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.appointment-card-title {
    display: flex;
    align-items: center;
    gap: 12px;
}

.appointment-card-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: #ccfbf1;
    color: #0f766e;
    border-radius: 11px;
    font-size: 19px;
}

.appointment-card-header h2,
.appointment-card-header h3 {
    margin: 0;
    color: #111827;
    font-size: 18px;
    font-weight: 800;
}

.appointment-card-header p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 12px;
    line-height: 1.5;
}

.appointment-mini-tag {
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

.appointment-form {
    padding: 24px;
}

.appointment-form-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
}

.appointment-field {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.appointment-field label {
    display: flex;
    flex-direction: column;
    gap: 4px;
    color: #111827;
    font-size: 13px;
    font-weight: 800;
}

.appointment-field label small {
    color: #6b7280;
    font-size: 11px;
    font-weight: 500;
    line-height: 1.4;
}

.appointment-field input,
.appointment-field select {
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

.appointment-field input::placeholder {
    color: #9ca3af;
}

.appointment-field input:focus,
.appointment-field select:focus {
    border-color: #0f766e;
    box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.10);
}

.appointment-form-actions {
    margin-top: 24px;
    padding-top: 20px;
    border-top: 1px solid #e5e7eb;
}

.appointment-create-button {
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

.appointment-create-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(15, 118, 110, 0.28);
}

.appointment-table-card {
    min-width: 0;
}

.appointment-table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.appointment-table {
    width: 100%;
    min-width: 850px;
    border-collapse: collapse;
}

.appointment-table th {
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

.appointment-table td {
    padding: 16px;
    border-bottom: 1px solid #eef2f7;
    color: #374151;
    font-size: 12px;
    vertical-align: middle;
}

.appointment-table tbody tr {
    transition: background 0.2s ease;
}

.appointment-table tbody tr:hover {
    background: #f8fafc;
}

.appointment-table tbody tr:last-child td {
    border-bottom: 0;
}

.patient-info {
    display: flex;
    flex-direction: column;
    gap: 4px;
    min-width: 130px;
}

.patient-code {
    color: #0f766e;
    font-size: 12px;
    font-weight: 800;
}

.patient-name {
    color: #374151;
    font-size: 12px;
    line-height: 1.4;
}

.doctor-name {
    color: #111827;
    font-weight: 700;
    white-space: nowrap;
}

.schedule-info {
    display: flex;
    flex-direction: column;
    gap: 5px;
    min-width: 120px;
}

.schedule-date {
    color: #374151;
    font-weight: 700;
    white-space: nowrap;
}

.schedule-time {
    color: #6b7280;
    font-size: 11px;
    white-space: nowrap;
}

.appointment-status {
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

.appointment-status.booked {
    background: #dbeafe;
    color: #1d4ed8;
}

.appointment-status.completed {
    background: #dcfce7;
    color: #166534;
}

.appointment-status.cancelled {
    background: #fee2e2;
    color: #b91c1c;
}

.appointment-actions {
    display: flex;
    align-items: center;
    gap: 7px;
    flex-wrap: wrap;
    min-width: 245px;
}

.appointment-status-form,
.appointment-delete-form {
    display: flex;
    align-items: center;
    gap: 6px;
    margin: 0;
}

.appointment-tiny-select {
    height: 34px;
    min-width: 105px;
    padding: 0 8px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    background: #ffffff;
    color: #374151;
    font-family: inherit;
    font-size: 11px;
    font-weight: 700;
    outline: none;
}

.appointment-tiny-select:focus {
    border-color: #0f766e;
    box-shadow: 0 0 0 2px rgba(15, 118, 110, 0.10);
}

.appointment-save-button,
.appointment-delete-button {
    min-height: 34px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 11px;
    border-radius: 8px;
    font-size: 10px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
}

.appointment-save-button {
    border: 1px solid #99f6e4;
    background: #f0fdfa;
    color: #0f766e;
}

.appointment-save-button:hover {
    background: #ccfbf1;
}

.appointment-delete-button {
    border: 1px solid #fecaca;
    background: #fff1f2;
    color: #dc2626;
}

.appointment-delete-button:hover {
    background: #fee2e2;
}

.appointment-empty {
    padding: 45px 20px !important;
    color: #9ca3af !important;
    text-align: center;
    font-size: 13px !important;
}

@media (max-width: 1050px) {
    .appointment-layout {
        grid-template-columns: 1fr;
    }

    .appointment-form-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .appointment-field:last-child {
        grid-column: 1 / -1;
    }
}

@media (max-width: 800px) {
    .appointment-page {
        padding: 20px;
    }

    .appointment-header {
        align-items: flex-start;
        padding: 25px;
    }

    .appointment-form-grid {
        grid-template-columns: 1fr;
    }

    .appointment-field:last-child {
        grid-column: auto;
    }
}

@media (max-width: 550px) {
    .appointment-page {
        padding: 15px;
    }

    .appointment-header {
        padding: 22px;
        border-radius: 16px;
    }

    .appointment-header-content {
        align-items: flex-start;
    }

    .appointment-header-icon {
        width: 52px;
        height: 52px;
        font-size: 25px;
    }

    .appointment-header h1 {
        font-size: 24px;
    }

    .appointment-header p {
        line-height: 1.5;
    }

    .appointment-card-header,
    .appointment-form {
        padding: 20px;
    }

    .appointment-actions {
        align-items: flex-start;
        flex-direction: column;
    }

    .appointment-status-form,
    .appointment-delete-form {
        width: 100%;
    }

    .appointment-tiny-select {
        flex: 1;
    }
}
</style>

<div class="appointment-page">

    <div class="appointment-header">

        <div class="appointment-header-content">

            <div class="appointment-header-icon">
                📅
            </div>

            <div>
                <span class="appointment-header-label">RECEPTIONIST PORTAL</span>

                <h1>Appointment Management</h1>

                <p>
                    Book patients into available doctor slots and manage appointment status.
                </p>
            </div>

        </div>

    </div>

    <div class="appointment-layout">

        <div class="appointment-card">

            <div class="appointment-card-header">

                <div class="appointment-card-title">

                    <div class="appointment-card-icon">
                        ➕
                    </div>

                    <div>
                        <h3>Book Appointment</h3>
                        <p>Create a new patient appointment.</p>
                    </div>

                </div>

                <span class="appointment-mini-tag">
                    CRUD
                </span>

            </div>

            <div class="appointment-form">

                <form
                    method="post"
                    action="index.php?page=receptionist&action=appointment_create"
                    class="appointment-form-grid"
                    data-validate="appointment"
                >

                    <input
                        type="hidden"
                        name="csrf_token"
                        value="<?=e(csrf_token())?>"
                    >

                    <div class="appointment-field">

                        <label for="patient_id">
                            <span>Patient *</span>
                            <small>Select an active patient</small>
                        </label>

                        <select
                            id="patient_id"
                            name="patient_id"
                            required
                        >
                            <option value="">Select patient</option>

                            <?php foreach($patients as $p): ?>

                                <?php if($p['status']==='active'): ?>

                                    <option value="<?=e($p['id'])?>">
                                        <?=e($p['patient_code'])?> — <?=e($p['full_name'])?>
                                    </option>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="appointment-field">

                        <label for="appointment-date">
                            <span>Slot Date</span>
                            <small>Use the date to quickly search available slots</small>
                        </label>

                        <input
                            type="date"
                            id="appointment-date"
                            value="<?=e(date('Y-m-d'))?>"
                        >

                    </div>

                    <div class="appointment-field">

                        <label for="slot-select">
                            <span>Available Doctor Slot *</span>
                            <small>Select an available doctor schedule</small>
                        </label>

                        <select
                            name="slot_id"
                            id="slot-select"
                            required
                        >
                            <option value="">
                                Select date first or choose a slot
                            </option>

                            <?php foreach($slots as $slot): ?>

                                <?php if($slot['status']==='available'): ?>

                                    <option value="<?=e($slot['id'])?>">
                                        <?=e($slot['doctor_name'])?> —
                                        <?=e(date('d M',strtotime($slot['slot_date'])))?>
                                        <?=e(date('h:i A',strtotime($slot['start_time'])))?>
                                    </option>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="appointment-field">

                        <label for="reason">
                            <span>Reason / Note</span>
                            <small>Optional appointment information</small>
                        </label>

                        <input
                            id="reason"
                            name="reason"
                            placeholder="Routine check-up"
                        >

                    </div>

                    <div class="appointment-form-actions">

                        <button
                            type="submit"
                            class="appointment-create-button"
                        >
                            <span>✓</span>
                            Create Appointment
                        </button>

                    </div>

                </form>

            </div>

        </div>

        <div class="appointment-card appointment-table-card">

            <div class="appointment-card-header">

                <div>

                    <h3>Appointment List</h3>

                    <p>
                        Update appointment status or delete an appointment.
                    </p>

                </div>

            </div>

            <div class="appointment-table-wrapper">

                <table class="appointment-table">

                    <thead>

                        <tr>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Schedule</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach($appointments as $a): ?>

                            <tr>

                                <td>

                                    <div class="patient-info">

                                        <span class="patient-code">
                                            <?=e($a['patient_code'])?>
                                        </span>

                                        <span class="patient-name">
                                            <?=e($a['patient_name'])?>
                                        </span>

                                    </div>

                                </td>

                                <td>

                                    <div class="doctor-name">
                                        <?=e($a['doctor_name'])?>
                                    </div>

                                </td>

                                <td>

                                    <div class="schedule-info">

                                        <span class="schedule-date">
                                            📅 <?=e(date('d M Y',strtotime($a['slot_date'])))?>
                                        </span>

                                        <span class="schedule-time">
                                            🕐 <?=e(date('h:i A',strtotime($a['start_time'])))?>
                                        </span>

                                    </div>

                                </td>

                                <td>

                                    <span class="appointment-status <?=e($a['status'])?>">
                                        <?=e(ucfirst($a['status']))?>
                                    </span>

                                </td>

                                <td>

                                    <div class="appointment-actions">

                                        <form
                                            method="post"
                                            action="index.php?page=receptionist&action=appointment_status"
                                            class="appointment-status-form"
                                        >

                                            <input
                                                type="hidden"
                                                name="csrf_token"
                                                value="<?=e(csrf_token())?>"
                                            >

                                            <input
                                                type="hidden"
                                                name="appointment_id"
                                                value="<?=e($a['appointment_id'])?>"
                                            >

                                            <select
                                                name="status"
                                                class="appointment-tiny-select"
                                            >

                                                <option
                                                    value="booked"
                                                    <?=($a['status']==='booked'?'selected':'')?>
                                                >
                                                    Booked
                                                </option>

                                                <option
                                                    value="completed"
                                                    <?=($a['status']==='completed'?'selected':'')?>
                                                >
                                                    Completed
                                                </option>

                                                <option
                                                    value="cancelled"
                                                    <?=($a['status']==='cancelled'?'selected':'')?>
                                                >
                                                    Cancelled
                                                </option>

                                            </select>

                                            <button
                                                type="submit"
                                                class="appointment-save-button"
                                            >
                                                Save
                                            </button>

                                        </form>

                                        <form
                                            method="post"
                                            action="index.php?page=receptionist&action=appointment_delete"
                                            class="appointment-delete-form"
                                            onsubmit="return confirm('Delete appointment and release its slot?')"
                                        >

                                            <input
                                                type="hidden"
                                                name="csrf_token"
                                                value="<?=e(csrf_token())?>"
                                            >

                                            <input
                                                type="hidden"
                                                name="id"
                                                value="<?=e($a['appointment_id'])?>"
                                            >

                                            <button
                                                type="submit"
                                                class="appointment-delete-button"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        <?php if(!$appointments): ?>

                            <tr>
                                <td colspan="5" class="appointment-empty">
                                    No appointments found.
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>