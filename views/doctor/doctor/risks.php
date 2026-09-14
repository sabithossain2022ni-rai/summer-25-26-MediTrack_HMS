<style>
.risks-page {
    max-width: 1250px;
    margin: 0 auto;
    padding: 30px;
}

.risks-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    padding: 30px 32px;
    margin-bottom: 24px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    border-radius: 20px;
    color: #fff;
    box-shadow: 0 12px 30px rgba(15, 118, 110, 0.2);
}

.risks-header-content {
    display: flex;
    align-items: center;
    gap: 18px;
}

.risks-header-icon {
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

.risks-header-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.risks-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
}

.risks-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.add-risk-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 0 18px;
    border-radius: 10px;
    background: #fff;
    color: #0f766e;
    text-decoration: none;
    font-size: 13px;
    font-weight: 800;
    white-space: nowrap;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
    transition: all 0.2s ease;
}

.add-risk-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 9px 20px rgba(0, 0, 0, 0.16);
}

.risks-container {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.risks-table-heading {
    padding: 22px 26px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.risks-table-heading h2 {
    margin: 0;
    color: #111827;
    font-size: 19px;
    font-weight: 800;
}

.risks-table-heading p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 13px;
}

.risks-table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.risks-table {
    width: 100%;
    min-width: 1000px;
    border-collapse: collapse;
}

.risks-table th {
    padding: 14px 18px;
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    color: #6b7280;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.7px;
    text-align: left;
    text-transform: uppercase;
    white-space: nowrap;
}

.risks-table td {
    padding: 17px 18px;
    border-bottom: 1px solid #eef2f7;
    color: #374151;
    font-size: 13px;
    vertical-align: middle;
}

.risks-table tbody tr {
    transition: background 0.2s ease;
}

.risks-table tbody tr:hover {
    background: #f8fafc;
}

.risks-table tbody tr:last-child td {
    border-bottom: 0;
}

.patient-cell {
    display: flex;
    align-items: center;
    gap: 11px;
    min-width: 160px;
}

.patient-avatar {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 11px;
    background: #ccfbf1;
    color: #0f766e;
    font-size: 14px;
    font-weight: 800;
}

.patient-name {
    color: #111827;
    font-weight: 800;
}

.risk-level {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 70px;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 800;
}

.risk-level.low {
    background: #dcfce7;
    color: #166534;
}

.risk-level.medium {
    background: #fef3c7;
    color: #92400e;
}

.risk-level.high {
    background: #ffedd5;
    color: #c2410c;
}

.risk-level.critical {
    background: #fee2e2;
    color: #b91c1c;
}

.description-cell {
    max-width: 300px;
    color: #4b5563;
    line-height: 1.5;
}

.date-cell {
    color: #4b5563;
    white-space: nowrap;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 75px;
    padding: 6px 11px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 800;
}

.status-open {
    background: #dbeafe;
    color: #1d4ed8;
}

.status-resolved {
    background: #dcfce7;
    color: #166534;
}

.risk-actions {
    display: flex;
    align-items: center;
    gap: 7px;
    white-space: nowrap;
}

.risk-edit-button,
.risk-resolve-button,
.risk-delete-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 34px;
    padding: 0 11px;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 800;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s ease;
}

.risk-edit-button {
    border: 1px solid #99f6e4;
    background: #f0fdfa;
    color: #0f766e;
}

.risk-edit-button:hover {
    background: #ccfbf1;
}

.risk-resolve-button {
    border: 1px solid #bbf7d0;
    background: #f0fdf4;
    color: #15803d;
}

.risk-resolve-button:hover {
    background: #dcfce7;
}

.risk-delete-button {
    border: 1px solid #fecaca;
    background: #fff1f2;
    color: #dc2626;
}

.risk-delete-button:hover {
    background: #fee2e2;
}

.inline-risk-form {
    display: inline;
    margin: 0;
}

@media (max-width: 800px) {
    .risks-page {
        padding: 20px;
    }

    .risks-header {
        align-items: flex-start;
        flex-direction: column;
        padding: 25px;
    }

    .add-risk-button {
        width: 100%;
    }
}

@media (max-width: 550px) {
    .risks-page {
        padding: 15px;
    }

    .risks-header {
        padding: 22px;
        border-radius: 16px;
    }

    .risks-header-content {
        align-items: flex-start;
    }

    .risks-header-icon {
        width: 52px;
        height: 52px;
        font-size: 25px;
    }

    .risks-header h1 {
        font-size: 24px;
    }

    .risks-header p {
        line-height: 1.5;
    }

    .risks-table-heading {
        padding: 20px;
    }
}
</style>

<div class="risks-page">

    <div class="risks-header">

        <div class="risks-header-content">

            <div class="risks-header-icon">
                ⚠️
            </div>

            <div>
                <span class="risks-header-label">PATIENT CARE</span>

                <h1>Patient Risks</h1>

                <p>
                    Monitor, manage and update important patient health risks.
                </p>
            </div>

        </div>

        <a href="index.php?page=risk_add" class="add-risk-button">
            <span>＋</span>
            Add Risk
        </a>

    </div>

    <div class="risks-container">

        <div class="risks-table-heading">

            <div>
                <h2>Risk Records</h2>

                <p>
                    Review current and resolved patient risks.
                </p>
            </div>

        </div>

        <div class="risks-table-wrapper">

            <table class="risks-table">

                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Risk Level</th>
                        <th>Description</th>
                        <th>Risk Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php while ($r = mysqli_fetch_assoc($risks)): ?>

                        <tr>

                            <td>
                                <div class="patient-cell">

                                    <div class="patient-avatar">
                                        <?=strtoupper(substr($r['patient_name'], 0, 1))?>
                                    </div>

                                    <div class="patient-name">
                                        <?=e($r['patient_name'])?>
                                    </div>

                                </div>
                            </td>

                            <td>
                                <span class="risk-level <?=strtolower($r['risk_level'])?>">
                                    <?=e($r['risk_level'])?>
                                </span>
                            </td>

                            <td>
                                <div class="description-cell">
                                    <?=e($r['description'])?>
                                </div>
                            </td>

                            <td>
                                <div class="date-cell">
                                    📅 <?=e($r['risk_date'])?>
                                </div>
                            </td>

                            <td>

                                <?php
                                $statusClass = strtolower($r['status']) === 'resolved'
                                    ? 'status-resolved'
                                    : 'status-open';
                                ?>

                                <span class="status-badge <?=$statusClass?>">
                                    <?=e($r['status'])?>
                                </span>

                            </td>

                            <td>

                                <div class="risk-actions">

                                    <a
                                        href="index.php?page=risk_edit&id=<?=$r['id']?>"
                                        class="risk-edit-button"
                                    >
                                        Edit
                                    </a>

                                    <?php if (strtolower($r['status']) !== 'resolved'): ?>

                                        <form
                                            method="post"
                                            action="index.php?controller=doctor&action=risk_resolve"
                                            class="inline-risk-form"
                                        >

                                            <input
                                                type="hidden"
                                                name="csrf_token"
                                                value="<?=e(csrf_token())?>"
                                            >

                                            <input
                                                type="hidden"
                                                name="id"
                                                value="<?=e($r['id'])?>"
                                            >

                                            <button
                                                type="submit"
                                                class="risk-resolve-button"
                                            >
                                                Resolve
                                            </button>

                                        </form>

                                    <?php endif; ?>

                                    <form
                                        method="post"
                                        action="index.php?controller=doctor&action=risk_delete"
                                        class="inline-risk-form"
                                        onsubmit="return confirm('Delete this risk?')"
                                    >

                                        <input
                                            type="hidden"
                                            name="csrf_token"
                                            value="<?=e(csrf_token())?>"
                                        >

                                        <input
                                            type="hidden"
                                            name="id"
                                            value="<?=e($r['id'])?>"
                                        >

                                        <button
                                            type="submit"
                                            class="risk-delete-button"
                                        >
                                            Delete
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