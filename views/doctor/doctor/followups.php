<div class="followups-page">

    <div class="followups-header">
        <div class="header-content">
            <div class="header-icon">
                📅
            </div>

            <div>
                <span class="header-label">PATIENT CARE</span>
                <h1>Manage Follow-ups</h1>
                <p>
                    View, edit and manage all scheduled patient follow-ups.
                </p>
            </div>
        </div>

        <a href="index.php?page=followup_add" class="schedule-button">
            <span>＋</span>
            Schedule Follow-up
        </a>
    </div>

    <div class="followups-container">

        <div class="table-heading">
            <div>
                <h2>Follow-up Appointments</h2>
                <p>Manage your patient's upcoming and previous follow-ups.</p>
            </div>
        </div>

        <div class="table-wrapper">

            <table class="followups-table">

                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php while ($f = mysqli_fetch_assoc($followups)): ?>

                        <tr>

                            <td>
                                <div class="patient-cell">
                                    <div class="patient-avatar">
                                        <?=strtoupper(substr($f['patient_name'], 0, 1))?>
                                    </div>

                                    <div>
                                        <strong><?=e($f['patient_name'])?></strong>
                                        <span>Patient</span>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="date-cell">
                                    <span class="date-icon">📅</span>
                                    <?=e($f['followup_date'])?>
                                </div>
                            </td>

                            <td>
                                <div class="time-cell">
                                    <span>🕐</span>
                                    <?=e($f['followup_time'])?>
                                </div>
                            </td>

                            <td>
                                <div class="reason-cell">
                                    <?=e($f['reason'])?>
                                </div>
                            </td>

                            <td>
                                <?php
                                $status = strtolower($f['status']);
                                $statusClass = 'status-scheduled';

                                if ($status === 'active') {
                                    $statusClass = 'status-active';
                                } elseif ($status === 'completed') {
                                    $statusClass = 'status-completed';
                                } elseif ($status === 'cancelled') {
                                    $statusClass = 'status-cancelled';
                                }
                                ?>

                                <span class="status-badge <?=$statusClass?>">
                                    <span class="status-dot"></span>
                                    <?=e(ucfirst($f['status']))?>
                                </span>
                            </td>

                            <td>

                                <div class="action-buttons">

                                    <a
                                        href="index.php?page=followup_edit&id=<?=$f['id']?>"
                                        class="edit-button"
                                    >
                                        ✏️ Edit
                                    </a>

                                    <form
                                        method="post"
                                        action="index.php?controller=doctor&action=followup_delete"
                                        class="delete-form"
                                        onsubmit="return confirm('Delete this follow-up?')"
                                    >

                                        <input
                                            type="hidden"
                                            name="csrf_token"
                                            value="<?=e(csrf_token())?>"
                                        >

                                        <input
                                            type="hidden"
                                            name="id"
                                            value="<?=e($f['id'])?>"
                                        >

                                        <button
                                            type="submit"
                                            class="delete-button"
                                        >
                                            🗑 Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    <?php endwhile; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<style>
.followups-page {
    max-width: 1250px;
    margin: 0 auto;
    padding: 30px;
}

.followups-header {
    background: linear-gradient(135deg, #0f766e, #0d9488);
    border-radius: 20px;
    padding: 28px 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    color: #fff;
    box-shadow: 0 10px 30px rgba(15, 118, 110, 0.18);
    margin-bottom: 25px;
}

.header-content {
    display: flex;
    align-items: center;
    gap: 18px;
}

.header-icon {
    width: 58px;
    height: 58px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.16);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    flex-shrink: 0;
}

.header-label {
    display: block;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
    margin-bottom: 5px;
    opacity: 0.8;
}

.followups-header h1 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.4px;
}

.followups-header p {
    margin: 6px 0 0;
    font-size: 14px;
    opacity: 0.9;
}

.schedule-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 18px;
    border-radius: 10px;
    background: #fff;
    color: #0f766e;
    text-decoration: none;
    font-size: 14px;
    font-weight: 700;
    white-space: nowrap;
    transition: all 0.2s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.schedule-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.13);
}

.schedule-button span {
    font-size: 20px;
    line-height: 1;
}

.followups-container {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.table-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 23px 28px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.table-heading h2 {
    margin: 0;
    color: #111827;
    font-size: 19px;
    font-weight: 700;
}

.table-heading p {
    margin: 5px 0 0;
    color: #6b7280;
    font-size: 13px;
}

.table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.followups-table {
    width: 100%;
    min-width: 900px;
    border-collapse: collapse;
}

.followups-table thead {
    background: #f9fafb;
}

.followups-table th {
    padding: 15px 18px;
    border-bottom: 1px solid #e5e7eb;
    color: #6b7280;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    text-align: left;
    white-space: nowrap;
}

.followups-table td {
    padding: 17px 18px;
    border-bottom: 1px solid #f1f5f9;
    color: #374151;
    font-size: 14px;
    vertical-align: middle;
}

.followups-table tbody tr {
    transition: background 0.2s ease;
}

.followups-table tbody tr:hover {
    background: #f8fafc;
}

.followups-table tbody tr:last-child td {
    border-bottom: none;
}

.patient-cell {
    display: flex;
    align-items: center;
    gap: 11px;
    min-width: 180px;
}

.patient-avatar {
    width: 38px;
    height: 38px;
    border-radius: 11px;
    background: #ccfbf1;
    color: #0f766e;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 800;
    flex-shrink: 0;
}

.patient-cell strong {
    display: block;
    color: #111827;
    font-size: 14px;
    font-weight: 700;
}

.patient-cell span {
    display: block;
    margin-top: 2px;
    color: #9ca3af;
    font-size: 11px;
}

.date-cell,
.time-cell {
    display: flex;
    align-items: center;
    gap: 7px;
    color: #374151;
    white-space: nowrap;
}

.date-icon,
.time-cell span {
    font-size: 14px;
}

.reason-cell {
    max-width: 220px;
    color: #4b5563;
    line-height: 1.4;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 6px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
}

.status-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    display: inline-block;
}

.status-scheduled {
    background: #eff6ff;
    color: #2563eb;
}

.status-scheduled .status-dot {
    background: #3b82f6;
}

.status-active {
    background: #ecfdf5;
    color: #047857;
}

.status-active .status-dot {
    background: #10b981;
}

.status-completed {
    background: #f3f4f6;
    color: #4b5563;
}

.status-completed .status-dot {
    background: #6b7280;
}

.status-cancelled {
    background: #fef2f2;
    color: #dc2626;
}

.status-cancelled .status-dot {
    background: #ef4444;
}

.action-buttons {
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
}

.edit-button,
.delete-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    height: 34px;
    padding: 0 11px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
    box-sizing: border-box;
}

.edit-button {
    border: 1px solid #99f6e4;
    background: #f0fdfa;
    color: #0f766e;
}

.edit-button:hover {
    background: #ccfbf1;
    border-color: #5eead4;
}

.delete-form {
    display: inline;
    margin: 0;
}

.delete-button {
    border: 1px solid #fecaca;
    background: #fef2f2;
    color: #dc2626;
    cursor: pointer;
    font-family: inherit;
}

.delete-button:hover {
    background: #fee2e2;
    border-color: #fca5a5;
}

@media (max-width: 850px) {
    .followups-page {
        padding: 20px;
    }

    .followups-header {
        flex-direction: column;
        align-items: flex-start;
        padding: 24px;
    }

    .schedule-button {
        width: 100%;
    }

    .table-heading {
        padding: 20px;
    }
}

@media (max-width: 550px) {
    .followups-page {
        padding: 15px;
    }

    .followups-header {
        border-radius: 15px;
        padding: 20px;
    }

    .header-content {
        align-items: flex-start;
    }

    .header-icon {
        width: 48px;
        height: 48px;
        font-size: 23px;
    }

    .followups-header h1 {
        font-size: 23px;
    }

    .followups-header p {
        font-size: 13px;
    }

    .table-heading h2 {
        font-size: 17px;
    }

    .table-heading p {
        font-size: 12px;
    }
}
</style>