<style>
.equipment-page {
    max-width: 1350px;
    margin: 0 auto;
    padding: 30px;
}

.equipment-header {
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

.equipment-header-icon {
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

.equipment-header-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.equipment-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
}

.equipment-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.equipment-card {
    margin-bottom: 24px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.equipment-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 22px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.equipment-title {
    display: flex;
    align-items: center;
    gap: 13px;
}

.equipment-title-icon {
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

.equipment-card-header h2 {
    margin: 0;
    color: #111827;
    font-size: 18px;
    font-weight: 800;
}

.equipment-card-header p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 12px;
}

.equipment-count {
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

.equipment-form {
    padding: 24px;
}

.equipment-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 17px;
}

.equipment-field {
    display: block;
}

.equipment-field span {
    display: block;
    margin-bottom: 7px;
    color: #374151;
    font-size: 12px;
    font-weight: 700;
}

.equipment-field input,
.equipment-field select {
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

.equipment-field input::placeholder {
    color: #9ca3af;
}

.equipment-field input:focus,
.equipment-field select:focus {
    border-color: #0d9488;
    box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.12);
}

.equipment-submit {
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

.equipment-submit:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(15, 118, 110, 0.25);
}

.equipment-table-wrap {
    width: 100%;
    overflow-x: auto;
}

.equipment-table {
    width: 100%;
    min-width: 900px;
    border-collapse: collapse;
}

.equipment-table th {
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

.equipment-table td {
    padding: 15px 18px;
    border-bottom: 1px solid #f1f5f9;
    color: #374151;
    font-size: 13px;
    vertical-align: middle;
}

.equipment-table tbody tr {
    transition: background 0.2s ease;
}

.equipment-table tbody tr:hover {
    background: #f8fffe;
}

.equipment-code {
    color: #0f766e;
    font-size: 11px;
    font-weight: 800;
    white-space: nowrap;
}

.equipment-name {
    display: flex;
    align-items: center;
    gap: 11px;
    color: #111827;
    font-weight: 800;
}

.equipment-avatar {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: #ccfbf1;
    color: #0f766e;
    border-radius: 10px;
    font-size: 18px;
}

.equipment-quantity {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 38px;
    padding: 6px 9px;
    background: #f0fdfa;
    color: #0f766e;
    border-radius: 8px;
    font-weight: 800;
}

.equipment-condition {
    display: inline-flex;
    align-items: center;
    padding: 6px 10px;
    border-radius: 999px;
    background: #ecfdf5;
    color: #047857;
    font-size: 10px;
    font-weight: 800;
    white-space: nowrap;
}

.equipment-condition.maintenance {
    background: #fffbeb;
    color: #b45309;
}

.equipment-condition.damaged {
    background: #fef2f2;
    color: #dc2626;
}

.equipment-delete {
    min-height: 34px;
    padding: 0 12px;
    border: 1px solid #fecaca;
    border-radius: 8px;
    background: #ffffff;
    color: #dc2626;
    font-size: 11px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
}

.equipment-delete:hover {
    background: #fef2f2;
    border-color: #ef4444;
    transform: translateY(-1px);
}

.equipment-empty {
    padding: 42px 20px !important;
    color: #9ca3af !important;
    text-align: center;
}

@media (max-width: 900px) {
    .equipment-form-grid {
        grid-template-columns: 1fr;
    }

    .equipment-submit {
        grid-column: auto;
    }
}

@media (max-width: 700px) {
    .equipment-page {
        padding: 20px;
    }

    .equipment-header {
        padding: 23px;
        border-radius: 16px;
    }

    .equipment-header-icon {
        width: 52px;
        height: 52px;
        font-size: 25px;
    }

    .equipment-header h1 {
        font-size: 25px;
    }

    .equipment-card-header {
        padding: 19px;
    }

    .equipment-form {
        padding: 20px;
    }
}

@media (max-width: 500px) {
    .equipment-page {
        padding: 15px;
    }

    .equipment-header {
        gap: 12px;
        padding: 20px;
    }

    .equipment-header-icon {
        width: 46px;
        height: 46px;
        font-size: 22px;
    }

    .equipment-header h1 {
        font-size: 21px;
    }

    .equipment-header-label {
        font-size: 9px;
    }

    .equipment-card-header h2 {
        font-size: 16px;
    }
}
</style>

<div class="equipment-page">

    <div class="equipment-header">

        <div class="equipment-header-icon">
            🩺
        </div>

        <div>

            <span class="equipment-header-label">
                ADMINISTRATION
            </span>

            <h1>
                Medical Equipment
            </h1>

            <p>
                Manage hospital equipment, quantities, departments and maintenance conditions.
            </p>

        </div>

    </div>

    <div class="equipment-card">

        <div class="equipment-card-header">

            <div class="equipment-title">

                <div class="equipment-title-icon">
                    ➕
                </div>

                <div>

                    <h2>
                        Add Medical Equipment
                    </h2>

                    <p>
                        Register equipment and assign it to a hospital department.
                    </p>

                </div>

            </div>

            <span class="equipment-count">
                New
            </span>

        </div>

        <form
            class="equipment-form equipment-form-grid"
            method="post"
            action="index.php?action=equipment_save"
        >

            <input
                type="hidden"
                name="csrf"
                value="<?= e(csrf_token()) ?>"
            >

            <label class="equipment-field">

                <span>
                    Equipment Name *
                </span>

                <input
                    name="name"
                    placeholder="e.g. ECG Machine"
                    required
                >

            </label>

            <label class="equipment-field">

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

            <label class="equipment-field">

                <span>
                    Quantity
                </span>

                <input
                    name="quantity"
                    type="number"
                    min="0"
                    value="1"
                    placeholder="Quantity"
                >

            </label>

            <label class="equipment-field">

                <span>
                    Purchase Date
                </span>

                <input
                    name="purchase_date"
                    type="date"
                >

            </label>

            <label class="equipment-field">

                <span>
                    Condition
                </span>

                <select name="condition_status">

                    <option>
                        Good
                    </option>

                    <option>
                        Needs Maintenance
                    </option>

                    <option>
                        Damaged
                    </option>

                </select>

            </label>

            <label class="equipment-field">

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

            <label class="equipment-field">

                <span>
                    Notes
                </span>

                <input
                    name="notes"
                    placeholder="Additional equipment notes"
                >

            </label>

            <button
                type="submit"
                class="equipment-submit"
            >
                + Add Equipment
            </button>

        </form>

    </div>

    <div class="equipment-card">

        <div class="equipment-card-header">

            <div class="equipment-title">

                <div class="equipment-title-icon">
                    📦
                </div>

                <div>

                    <h2>
                        Equipment List
                    </h2>

                    <p>
                        View and manage registered medical equipment.
                    </p>

                </div>

            </div>

            <span class="equipment-count">
                <?= count($data['equipment']) ?>
            </span>

        </div>

        <div class="equipment-table-wrap">

            <table class="equipment-table">

                <thead>

                    <tr>
                        <th>Code</th>
                        <th>Equipment</th>
                        <th>Department</th>
                        <th>Quantity</th>
                        <th>Purchase</th>
                        <th>Condition</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach($data['equipment'] as $e): ?>

                        <tr>

                            <td>

                                <span class="equipment-code">
                                    <?= e($e['equipment_code']) ?>
                                </span>

                            </td>

                            <td>

                                <div class="equipment-name">

                                    <div class="equipment-avatar">
                                        🩺
                                    </div>

                                    <?= e($e['name']) ?>

                                </div>

                            </td>

                            <td>
                                <?= e($e['department_name']) ?>
                            </td>

                            <td>

                                <span class="equipment-quantity">
                                    <?= e($e['quantity']) ?>
                                </span>

                            </td>

                            <td>
                                <?= e($e['purchase_date']) ?>
                            </td>

                            <td>

                                <span class="equipment-condition <?= strtolower(str_replace(' ', '-', $e['condition_status'])) === 'needs-maintenance' ? 'maintenance' : (strtolower($e['condition_status']) === 'damaged' ? 'damaged' : '') ?>">
                                    <?= e($e['condition_status']) ?>
                                </span>

                            </td>

                            <td>

                                <form
                                    method="post"
                                    action="index.php?action=equipment_delete"
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
                                        value="<?= $e['id'] ?>"
                                    >

                                    <button
                                        type="submit"
                                        class="equipment-delete"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    <?php if(empty($data['equipment'])): ?>

                        <tr>

                            <td
                                colspan="7"
                                class="equipment-empty"
                            >
                                No medical equipment found.
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>