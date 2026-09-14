<style>
.prescriptions-page {
    max-width: 1250px;
    margin: 0 auto;
    padding: 30px;
}

.prescriptions-header {
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

.prescriptions-header .header-content {
    display: flex;
    align-items: center;
    gap: 18px;
}

.prescriptions-header .header-icon {
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

.prescriptions-header .header-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.prescriptions-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -0.5px;
}

.prescriptions-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.create-prescription-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 46px;
    padding: 0 20px;
    border-radius: 10px;
    background: #ffffff;
    color: #0f766e;
    text-decoration: none;
    font-size: 14px;
    font-weight: 800;
    white-space: nowrap;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
    transition: all 0.2s ease;
}

.create-prescription-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 9px 20px rgba(0, 0, 0, 0.16);
}

.create-prescription-button span {
    font-size: 20px;
    line-height: 1;
}

.prescriptions-container {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.prescriptions-table-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 24px 26px;
    border-bottom: 1px solid #e5e7eb;
}

.prescriptions-table-heading h2 {
    margin: 0;
    color: #111827;
    font-size: 20px;
    font-weight: 800;
}

.prescriptions-table-heading p {
    margin: 5px 0 0;
    color: #6b7280;
    font-size: 13px;
}

.prescriptions-table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.prescriptions-table {
    width: 100%;
    min-width: 1050px;
    border-collapse: collapse;
}

.prescriptions-table th {
    padding: 15px 18px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
    color: #475569;
    font-size: 12px;
    font-weight: 800;
    text-align: left;
    white-space: nowrap;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.prescriptions-table td {
    padding: 17px 18px;
    border-bottom: 1px solid #f1f5f9;
    color: #374151;
    font-size: 14px;
    vertical-align: middle;
}

.prescriptions-table tbody tr {
    transition: background 0.2s ease;
}

.prescriptions-table tbody tr:hover {
    background: #f8fffe;
}

.prescriptions-table tbody tr:last-child td {
    border-bottom: none;
}

.patient-cell {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 170px;
}

.patient-avatar {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 12px;
    background: #ccfbf1;
    color: #0f766e;
    font-size: 15px;
    font-weight: 800;
}

.patient-info {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.patient-info strong {
    color: #111827;
    font-size: 14px;
    font-weight: 700;
}

.patient-info span {
    color: #9ca3af;
    font-size: 11px;
}

.diagnosis-cell {
    max-width: 190px;
    color: #374151;
    line-height: 1.4;
}

.medicine-cell {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #0f766e;
    font-weight: 700;
}

.medicine-icon {
    font-size: 17px;
}

.detail-cell {
    color: #4b5563;
}

.detail-badge {
    display: inline-flex;
    align-items: center;
    min-height: 30px;
    padding: 0 10px;
    border-radius: 8px;
    background: #f0fdfa;
    border: 1px solid #ccfbf1;
    color: #0f766e;
    font-size: 12px;
    font-weight: 700;
}

.action-buttons {
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
}

.edit-prescription-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 34px;
    padding: 0 11px;
    border: 1px solid #bfdbfe;
    border-radius: 8px;
    background: #eff6ff;
    color: #2563eb;
    text-decoration: none;
    font-size: 12px;
    font-weight: 700;
    transition: all 0.2s ease;
}

.edit-prescription-button:hover {
    background: #dbeafe;
    border-color: #93c5fd;
}

.delete-prescription-form {
    display: inline;
    margin: 0;
}

.delete-prescription-button {
    min-height: 34px;
    padding: 0 11px;
    border: 1px solid #fecaca;
    border-radius: 8px;
    background: #fef2f2;
    color: #dc2626;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s ease;
}

.delete-prescription-button:hover {
    background: #fee2e2;
    border-color: #fca5a5;
}

@media (max-width: 850px) {
    .prescriptions-page {
        padding: 20px;
    }

    .prescriptions-header {
        align-items: flex-start;
        flex-direction: column;
        padding: 25px;
    }

    .create-prescription-button {
        width: 100%;
    }
}

@media (max-width: 550px) {
    .prescriptions-page {
        padding: 15px;
    }

    .prescriptions-header {
        padding: 22px;
        border-radius: 16px;
    }

    .prescriptions-header .header-content {
        align-items: flex-start;
    }

    .prescriptions-header .header-icon {
        width: 52px;
        height: 52px;
        font-size: 25px;
    }

    .prescriptions-header h1 {
        font-size: 24px;
    }

    .prescriptions-header p {
        line-height: 1.5;
    }

    .prescriptions-table-heading {
        padding: 20px;
    }
}
</style>

<div class="prescriptions-page">

    <div class="prescriptions-header">

        <div class="header-content">

            <div class="header-icon">
                💊
            </div>

            <div>
                <span class="header-label">PATIENT CARE</span>

                <h1>Prescriptions</h1>

                <p>
                    Create, manage and update patient prescriptions.
                </p>
            </div>

        </div>

        <a href="index.php?page=prescription_add" class="create-prescription-button">
            <span>＋</span>
            Create Prescription
        </a>

    </div>

    <div class="prescriptions-container">

        <div class="prescriptions-table-heading">

            <div>
                <h2>Prescription Records</h2>

                <p>
                    View medication details and manage existing prescriptions.
                </p>
            </div>

        </div>

        <div class="prescriptions-table-wrapper">

            <table class="prescriptions-table">

                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Diagnosis</th>
                        <th>Medicine</th>
                        <th>Dosage</th>
                        <th>Frequency</th>
                        <th>Duration</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php while($r = mysqli_fetch_assoc($prescriptions)): ?>

                        <tr>

                            <td>
                                <div class="patient-cell">

                                    <div class="patient-avatar">
                                        <?=strtoupper(substr($r['patient_name'], 0, 1))?>
                                    </div>

                                    <div class="patient-info">
                                        <strong><?=e($r['patient_name'])?></strong>
                                        <span>Patient</span>
                                    </div>

                                </div>
                            </td>

                            <td>
                                <div class="diagnosis-cell">
                                    <?=e($r['diagnosis'])?>
                                </div>
                            </td>

                            <td>
                                <div class="medicine-cell">
                                    <span class="medicine-icon">💊</span>
                                    <?=e($r['medicine'])?>
                                </div>
                            </td>

                            <td>
                                <span class="detail-badge">
                                    <?=e($r['dosage'])?>
                                </span>
                            </td>

                            <td>
                                <span class="detail-badge">
                                    <?=e($r['frequency'])?>
                                </span>
                            </td>

                            <td>
                                <span class="detail-badge">
                                    <?=e($r['duration'])?>
                                </span>
                            </td>

                            <td>

                                <div class="action-buttons">

                                    <a
                                        href="index.php?page=prescription_edit&id=<?=$r['id']?>"
                                        class="edit-prescription-button"
                                    >
                                        ✏️ Edit
                                    </a>

                                    <form
                                        method="post"
                                        action="index.php?controller=doctor&action=prescription_delete"
                                        class="delete-prescription-form"
                                        onsubmit="return confirm('Delete this prescription?')"
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
                                            class="delete-prescription-button"
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