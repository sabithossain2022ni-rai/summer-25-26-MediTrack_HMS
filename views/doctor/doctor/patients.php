<div class="patients-page">

    <div class="patients-header">

        <div class="header-content">

            <div class="header-icon">
                👥
            </div>

            <div>
                <span class="header-label">PATIENT CARE</span>
                <h1>Patient Management</h1>
                <p>
                    View, manage and update all registered patients.
                </p>
            </div>

        </div>

        <a href="index.php?page=patient_add" class="add-patient-button">
            <span>＋</span>
            Add Patient
        </a>

    </div>


    <div class="patients-container">

        <div class="table-heading">

            <div>
                <h2>Registered Patients</h2>
                <p>
                    Manage patient profiles, information and records.
                </p>
            </div>

        </div>


        <div class="patients-table-wrapper">

            <table class="patients-table">

                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php while ($p = mysqli_fetch_assoc($patients)): ?>

                        <tr>

                            <td>
                                <div class="patient-cell">

                                    <div class="patient-avatar">
                                        <?=strtoupper(substr($p['name'], 0, 1))?>
                                    </div>

                                    <div class="patient-name">

                                        <strong>
                                            <?=e($p['name'])?>
                                        </strong>

                                        <span>
                                            Patient
                                        </span>

                                    </div>

                                </div>
                            </td>


                            <td>
                                <div class="info-cell">
                                    <span class="info-icon">🎂</span>
                                    <?=e($p['age'])?>
                                </div>
                            </td>


                            <td>

                                <?php
                                $gender = strtolower($p['gender']);
                                $genderClass = 'gender-other';

                                if ($gender === 'male') {
                                    $genderClass = 'gender-male';
                                } elseif ($gender === 'female') {
                                    $genderClass = 'gender-female';
                                }
                                ?>

                                <span class="gender-badge <?=$genderClass?>">
                                    <?=e($p['gender'])?>
                                </span>

                            </td>


                            <td>

                                <div class="info-cell">
                                    <span class="info-icon">📞</span>
                                    <?=e($p['phone'])?>
                                </div>

                            </td>


                            <td>

                                <div class="action-buttons">

                                    <a
                                        href="index.php?page=patient_view&id=<?=$p['id']?>"
                                        class="view-button"
                                    >
                                        👁 View
                                    </a>


                                    <a
                                        href="index.php?page=patient_edit&id=<?=$p['id']?>"
                                        class="edit-button"
                                    >
                                        ✏️ Edit
                                    </a>


                                    <form
                                        method="post"
                                        action="index.php?controller=doctor&action=patient_delete"
                                        class="delete-form"
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
                                            value="<?=e($p['id'])?>"
                                        >

                                        <button
                                            type="submit"
                                            class="delete-button"
                                        >
                                            🗑 Deactivate
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

.patients-page {
    max-width: 1250px;
    margin: 0 auto;
    padding: 30px;
}


/* Header */

.patients-header {
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

.patients-header h1 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
}

.patients-header p {
    margin: 6px 0 0;
    font-size: 14px;
    opacity: 0.9;
}


/* Add Patient */

.add-patient-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 12px 18px;
    border-radius: 10px;
    background: #fff;
    color: #0f766e;
    text-decoration: none;
    font-size: 14px;
    font-weight: 700;
    white-space: nowrap;
    transition: all 0.2s ease;
}

.add-patient-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 7px 18px rgba(0, 0, 0, 0.12);
}

.add-patient-button span {
    font-size: 19px;
}


/* Main Container */

.patients-container {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}


/* Table Heading */

.table-heading {
    padding: 22px 28px;
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


/* Table */

.patients-table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.patients-table {
    width: 100%;
    min-width: 900px;
    border-collapse: collapse;
}

.patients-table thead th {
    padding: 15px 20px;
    background: #fff;
    border-bottom: 1px solid #e5e7eb;
    color: #6b7280;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    text-align: left;
    white-space: nowrap;
}

.patients-table tbody td {
    padding: 17px 20px;
    border-bottom: 1px solid #f1f5f9;
    color: #374151;
    font-size: 14px;
    vertical-align: middle;
}

.patients-table tbody tr {
    transition: background 0.2s ease;
}

.patients-table tbody tr:hover {
    background: #f8fafc;
}

.patients-table tbody tr:last-child td {
    border-bottom: none;
}


/* Patient */

.patient-cell {
    display: flex;
    align-items: center;
    gap: 12px;
}

.patient-avatar {
    width: 42px;
    height: 42px;
    border-radius: 11px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    font-weight: 700;
    flex-shrink: 0;
}

.patient-name {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.patient-name strong {
    color: #111827;
    font-size: 14px;
    font-weight: 700;
}

.patient-name span {
    color: #9ca3af;
    font-size: 11px;
}


/* Information */

.info-cell {
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
}

.info-icon {
    font-size: 15px;
}


/* Gender */

.gender-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 6px 11px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
}

.gender-male {
    background: #eff6ff;
    color: #2563eb;
}

.gender-female {
    background: #fdf2f8;
    color: #db2777;
}

.gender-other {
    background: #f3f4f6;
    color: #4b5563;
}


/* Actions */

.action-buttons {
    display: flex;
    align-items: center;
    gap: 7px;
    white-space: nowrap;
}

.view-button,
.edit-button,
.delete-button {
    min-height: 34px;
    padding: 0 10px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    font-family: inherit;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s ease;
    box-sizing: border-box;
}

.view-button {
    background: #f0fdfa;
    color: #0f766e;
    border: 1px solid #99f6e4;
}

.view-button:hover {
    background: #ccfbf1;
    transform: translateY(-1px);
}

.edit-button {
    background: #fff;
    color: #0f766e;
    border: 1px solid #d1d5db;
}

.edit-button:hover {
    background: #f0fdfa;
    border-color: #5eead4;
    transform: translateY(-1px);
}

.delete-form {
    margin: 0;
    padding: 0;
}

.delete-button {
    background: #fff;
    color: #dc2626;
    border: 1px solid #fecaca;
}

.delete-button:hover {
    background: #fef2f2;
    border-color: #fca5a5;
    transform: translateY(-1px);
}


/* Responsive */

@media (max-width: 850px) {

    .patients-page {
        padding: 20px;
    }

    .patients-header {
        flex-direction: column;
        align-items: flex-start;
        padding: 24px;
    }

    .add-patient-button {
        width: 100%;
    }

}


@media (max-width: 550px) {

    .patients-page {
        padding: 15px;
    }

    .patients-header {
        padding: 20px;
        border-radius: 15px;
    }

    .header-content {
        align-items: flex-start;
    }

    .header-icon {
        width: 48px;
        height: 48px;
        font-size: 23px;
    }

    .patients-header h1 {
        font-size: 23px;
    }

    .patients-header p {
        font-size: 13px;
    }

    .table-heading {
        padding: 18px;
    }

}

</style>