<style>
.department-page {
    max-width: 1350px;
    margin: 0 auto;
    padding: 30px;
}

.department-header {
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

.department-header-icon {
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

.department-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.department-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
}

.department-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.department-layout {
    display: grid;
    grid-template-columns: 0.8fr 1.7fr;
    gap: 24px;
    align-items: start;
}

.department-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.department-card-header {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 22px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.department-card-icon {
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

.department-card-header h2 {
    margin: 0;
    color: #111827;
    font-size: 18px;
    font-weight: 800;
}

.department-card-header p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 12px;
}

.department-form {
    padding: 24px;
}

.department-field {
    display: block;
    margin-bottom: 17px;
}

.department-field span {
    display: block;
    margin-bottom: 7px;
    color: #374151;
    font-size: 12px;
    font-weight: 700;
}

.department-field input {
    width: 100%;
    height: 46px;
    padding: 0 13px;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    background: #ffffff;
    color: #111827;
    font-size: 13px;
    outline: none;
    transition: all 0.2s ease;
    box-sizing: border-box;
}

.department-field input::placeholder {
    color: #9ca3af;
}

.department-field input:focus {
    border-color: #0d9488;
    box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.12);
}

.department-submit {
    width: 100%;
    min-height: 46px;
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

.department-submit:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(15, 118, 110, 0.25);
}

.department-table-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 22px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.department-table-header h2 {
    margin: 0;
    color: #111827;
    font-size: 18px;
    font-weight: 800;
}

.department-table-header p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 12px;
}

.department-count {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 34px;
    height: 30px;
    padding: 0 10px;
    background: #ccfbf1;
    color: #0f766e;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 800;
}

.department-table-wrap {
    width: 100%;
    overflow-x: auto;
}

.department-table {
    width: 100%;
    min-width: 650px;
    border-collapse: collapse;
}

.department-table th {
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

.department-table td {
    padding: 16px 18px;
    border-bottom: 1px solid #f1f5f9;
    color: #374151;
    font-size: 13px;
    vertical-align: middle;
}

.department-table tbody tr {
    transition: background 0.2s ease;
}

.department-table tbody tr:hover {
    background: #f8fffe;
}

.department-name {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #111827;
    font-weight: 800;
}

.department-icon {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: #ccfbf1;
    color: #0f766e;
    border-radius: 10px;
    font-size: 17px;
}

.department-description {
    max-width: 350px;
    color: #6b7280;
    line-height: 1.5;
}

.doctor-count {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 38px;
    height: 28px;
    padding: 0 9px;
    background: #f0fdfa;
    border: 1px solid #ccfbf1;
    border-radius: 8px;
    color: #0f766e;
    font-size: 11px;
    font-weight: 800;
}

.department-delete {
    min-height: 34px;
    padding: 0 12px;
    border: 1px solid #fecaca;
    border-radius: 8px;
    background: #fffafa;
    color: #dc2626;
    font-size: 11px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
}

.department-delete:hover {
    background: #fef2f2;
    border-color: #fca5a5;
    transform: translateY(-1px);
}

.department-empty {
    padding: 45px 20px !important;
    color: #9ca3af !important;
    text-align: center;
    font-size: 13px !important;
}

@media (max-width: 1000px) {
    .department-layout {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 700px) {
    .department-page {
        padding: 20px;
    }

    .department-header {
        padding: 23px;
        border-radius: 16px;
    }

    .department-header-icon {
        width: 52px;
        height: 52px;
        font-size: 25px;
    }

    .department-header h1 {
        font-size: 25px;
    }

    .department-header p {
        line-height: 1.5;
    }

    .department-card-header,
    .department-table-header {
        padding: 19px;
    }

    .department-form {
        padding: 20px;
    }
}

@media (max-width: 500px) {
    .department-page {
        padding: 15px;
    }

    .department-header {
        gap: 12px;
        padding: 20px;
    }

    .department-header-icon {
        width: 46px;
        height: 46px;
        font-size: 22px;
    }

    .department-header h1 {
        font-size: 21px;
    }

    .department-label {
        font-size: 9px;
    }
}
</style>

<div class="department-page">

    <div class="department-header">

        <div class="department-header-icon">
            🏥
        </div>

        <div>

            <span class="department-label">
                ADMINISTRATION
            </span>

            <h1>
                Department Management
            </h1>

            <p>
                Create and manage hospital departments and their doctor assignments.
            </p>

        </div>

    </div>

    <div class="department-layout">

        <div class="department-card">

            <div class="department-card-header">

                <div class="department-card-icon">
                    ➕
                </div>

                <div>

                    <h2>
                        Add Department
                    </h2>

                    <p>
                        Create a new hospital department.
                    </p>

                </div>

            </div>

            <form
                class="department-form"
                method="post"
                action="index.php?action=department_save"
            >

                <input
                    type="hidden"
                    name="csrf"
                    value="<?= e(csrf_token()) ?>"
                >

                <label class="department-field">

                    <span>
                        Department Name *
                    </span>

                    <input
                        name="name"
                        placeholder="e.g. Cardiology"
                        required
                    >

                </label>

                <label class="department-field">

                    <span>
                        Description
                    </span>

                    <input
                        name="description"
                        placeholder="Short department description"
                    >

                </label>

                <button
                    type="submit"
                    class="department-submit"
                >
                    + Create Department
                </button>

            </form>

        </div>

        <div class="department-card">

            <div class="department-table-header">

                <div>

                    <h2>
                        Hospital Departments
                    </h2>

                    <p>
                        Manage currently registered departments.
                    </p>

                </div>

                <span class="department-count">
                    <?= count($data['departments']) ?>
                </span>

            </div>

            <div class="department-table-wrap">

                <table class="department-table">

                    <thead>

                        <tr>
                            <th>Department</th>
                            <th>Description</th>
                            <th>Doctors</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach($data['departments'] as $d): ?>

                            <tr>

                                <td>

                                    <div class="department-name">

                                        <div class="department-icon">
                                            🏥
                                        </div>

                                        <span>
                                            <?= e($d['name']) ?>
                                        </span>

                                    </div>

                                </td>

                                <td>

                                    <div class="department-description">

                                        <?= e($d['description']) ?>

                                    </div>

                                </td>

                                <td>

                                    <span class="doctor-count">

                                        👨‍⚕️ <?= e($d['doctor_count']) ?>

                                    </span>

                                </td>

                                <td>

                                    <form
                                        method="post"
                                        action="index.php?action=department_delete"
                                        class="inline"
                                        onsubmit="return confirmDelete()"
                                    >

                                        <input
                                            type="hidden"
                                            name="csrf"
                                            value="<?= e(csrf_token()) ?>"
                                        >

                                        <input
                                            type="hidden"
                                            name="id"
                                            value="<?= $d['id'] ?>"
                                        >

                                        <button
                                            type="submit"
                                            class="department-delete"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        <?php if(empty($data['departments'])): ?>

                            <tr>

                                <td
                                    colspan="4"
                                    class="department-empty"
                                >
                                    No departments found.
                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>