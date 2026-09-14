<style>
.inventory-page {
    max-width: 1350px;
    margin: 0 auto;
    padding: 30px;
}

.inventory-header {
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

.inventory-header-icon {
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

.inventory-header-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.inventory-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
}

.inventory-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.inventory-card {
    margin-bottom: 24px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.inventory-card:last-child {
    margin-bottom: 0;
}

.inventory-card-header {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 22px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.inventory-card-icon {
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

.inventory-card-header h2 {
    margin: 0;
    color: #111827;
    font-size: 18px;
    font-weight: 800;
}

.inventory-card-header p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 12px;
}

.inventory-form {
    padding: 25px;
}

.inventory-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
}

.inventory-field {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.inventory-field.full-width {
    grid-column: 1 / -1;
}

.inventory-field span {
    color: #374151;
    font-size: 12px;
    font-weight: 700;
}

.inventory-field input,
.inventory-field select {
    width: 100%;
    height: 46px;
    box-sizing: border-box;
    padding: 0 13px;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    background: #ffffff;
    color: #111827;
    font-size: 13px;
    outline: none;
    transition: all 0.2s ease;
}

.inventory-field input:focus,
.inventory-field select:focus {
    border-color: #0d9488;
    box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.12);
}

.inventory-field input::placeholder {
    color: #9ca3af;
}

.inventory-field small {
    color: #9ca3af;
    font-size: 11px;
}

.inventory-form-actions {
    display: flex;
    justify-content: flex-end;
    margin-top: 22px;
}

.inventory-primary-btn {
    min-width: 190px;
    height: 46px;
    padding: 0 20px;
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

.inventory-primary-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(15, 118, 110, 0.25);
}

.inventory-table-container {
    padding: 0;
}

.inventory-table-wrap {
    width: 100%;
    overflow-x: auto;
}

.inventory-table {
    width: 100%;
    min-width: 950px;
    border-collapse: collapse;
}

.inventory-table th {
    padding: 15px 18px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
    color: #6b7280;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.4px;
    text-align: left;
    white-space: nowrap;
}

.inventory-table td {
    padding: 16px 18px;
    border-bottom: 1px solid #f1f5f9;
    color: #374151;
    font-size: 13px;
    vertical-align: middle;
}

.inventory-table tbody tr {
    transition: background 0.2s ease;
}

.inventory-table tbody tr:hover {
    background: #f8fafc;
}

.inventory-table tbody tr:last-child td {
    border-bottom: 0;
}

.item-code {
    color: #0f766e;
    font-family: monospace;
    font-size: 12px;
    font-weight: 800;
}

.item-name {
    color: #111827;
    font-weight: 800;
}

.item-category {
    display: inline-flex;
    align-items: center;
    padding: 6px 9px;
    background: #f0fdfa;
    border: 1px solid #ccfbf1;
    border-radius: 7px;
    color: #0f766e;
    font-size: 11px;
    font-weight: 700;
}

.stock-value {
    color: #111827;
    font-weight: 800;
}

.status {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 800;
    white-space: nowrap;
}

.status.good,
.status.normal,
.status.ok {
    background: #dcfce7;
    color: #166534;
}

.status.low {
    background: #fef3c7;
    color: #92400e;
}

.status.critical {
    background: #fee2e2;
    color: #991b1b;
}

.status.out,
.status.out-of-stock {
    background: #fee2e2;
    color: #991b1b;
}

.status.warning {
    background: #fef3c7;
    color: #92400e;
}

.inventory-delete-form {
    display: inline;
    margin: 0;
}

.inventory-delete-btn {
    min-height: 34px;
    padding: 0 12px;
    border: 1px solid #fecaca;
    border-radius: 8px;
    background: #fff1f2;
    color: #dc2626;
    font-size: 11px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
}

.inventory-delete-btn:hover {
    background: #fee2e2;
    border-color: #fca5a5;
}

.inventory-empty {
    padding: 45px 20px !important;
    text-align: center;
    color: #9ca3af !important;
    font-size: 13px !important;
}

.transaction-form {
    padding: 25px;
}

.transaction-grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr;
    gap: 18px;
}

.transaction-grid .inventory-field:nth-child(4),
.transaction-grid .inventory-field:nth-child(5) {
    grid-column: span 1;
}

.transaction-actions {
    display: flex;
    justify-content: flex-end;
    margin-top: 22px;
}

.transaction-btn {
    min-width: 190px;
    height: 46px;
    padding: 0 20px;
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

.transaction-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(15, 118, 110, 0.25);
}

.stock-action-info {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 22px;
    padding: 14px 16px;
    background: #f0fdfa;
    border: 1px solid #ccfbf1;
    border-radius: 10px;
    color: #475569;
    font-size: 12px;
    line-height: 1.6;
}

.stock-action-info-icon {
    flex-shrink: 0;
    font-size: 18px;
}

@media (max-width: 1000px) {
    .transaction-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .transaction-grid .inventory-field:first-child {
        grid-column: 1 / -1;
    }
}

@media (max-width: 800px) {
    .inventory-page {
        padding: 20px;
    }

    .inventory-header {
        padding: 24px;
    }

    .inventory-form-grid {
        grid-template-columns: 1fr;
    }

    .inventory-field.full-width {
        grid-column: auto;
    }

    .transaction-grid {
        grid-template-columns: 1fr;
    }

    .transaction-grid .inventory-field:first-child {
        grid-column: auto;
    }
}

@media (max-width: 600px) {
    .inventory-page {
        padding: 15px;
    }

    .inventory-header {
        gap: 12px;
        padding: 20px;
        border-radius: 16px;
    }

    .inventory-header-icon {
        width: 48px;
        height: 48px;
        font-size: 23px;
    }

    .inventory-header h1 {
        font-size: 22px;
    }

    .inventory-header-label {
        font-size: 9px;
    }

    .inventory-form,
    .transaction-form {
        padding: 20px;
    }

    .inventory-card-header {
        padding: 18px 20px;
    }

    .inventory-card-header h2 {
        font-size: 16px;
    }

    .inventory-form-actions,
    .transaction-actions {
        justify-content: stretch;
    }

    .inventory-primary-btn,
    .transaction-btn {
        width: 100%;
    }
}
</style>

<div class="inventory-page">

    <div class="inventory-header">

        <div class="inventory-header-icon">
            📦
        </div>

        <div>

            <span class="inventory-header-label">
                ADMINISTRATION
            </span>

            <h1>
                Inventory / Smart Stock Monitor
            </h1>

            <p>
                Monitor hospital supplies, stock thresholds and inventory transactions.
            </p>

        </div>

    </div>

    <div class="inventory-card">

        <div class="inventory-card-header">

            <div class="inventory-card-icon">
                ➕
            </div>

            <div>

                <h2>
                    Add Inventory Item
                </h2>

                <p>
                    Register medicines, consumables and equipment in the stock system.
                </p>

            </div>

        </div>

        <form
            class="inventory-form"
            method="post"
            action="index.php?action=inventory_save"
        >

            <input
                type="hidden"
                name="csrf"
                value="<?= e(csrf_token()) ?>"
            >

            <div class="inventory-form-grid">

                <label class="inventory-field">

                    <span>
                        Item Name *
                    </span>

                    <input
                        name="item_name"
                        placeholder="Medicine / consumable / equipment"
                        required
                    >

                </label>

                <label class="inventory-field">

                    <span>
                        Category
                    </span>

                    <select name="category">

                        <option>Medicine</option>
                        <option>Syringe</option>
                        <option>Gloves</option>
                        <option>Masks</option>
                        <option>Saline</option>
                        <option>Equipment</option>
                        <option>Consumable</option>
                        <option>Other</option>

                    </select>

                </label>

                <label class="inventory-field">

                    <span>
                        Unit
                    </span>

                    <input
                        name="unit"
                        placeholder="pcs, box, bottle..."
                    >

                </label>

                <label class="inventory-field">

                    <span>
                        Current Stock *
                    </span>

                    <input
                        name="current_quantity"
                        type="number"
                        step="0.01"
                        placeholder="Current stock"
                        required
                    >

                </label>

                <label class="inventory-field">

                    <span>
                        Minimum Threshold *
                    </span>

                    <input
                        name="minimum_quantity"
                        type="number"
                        step="0.01"
                        placeholder="Minimum threshold"
                        required
                    >

                </label>

                <label class="inventory-field">

                    <span>
                        Critical Threshold *
                    </span>

                    <input
                        name="critical_quantity"
                        type="number"
                        step="0.01"
                        placeholder="Critical threshold"
                        required
                    >

                </label>

                <label class="inventory-field">

                    <span>
                        Supplier
                    </span>

                    <input
                        name="supplier"
                        placeholder="Supplier name"
                    >

                </label>

                <label class="inventory-field">

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

            </div>

            <div class="inventory-form-actions">

                <button
                    type="submit"
                    class="inventory-primary-btn"
                >
                    Save Inventory Item
                </button>

            </div>

        </form>

    </div>

    <div class="inventory-card">

        <div class="inventory-card-header">

            <div class="inventory-card-icon">
                📊
            </div>

            <div>

                <h2>
                    Stock Levels
                </h2>

                <p>
                    Current inventory levels and automatic stock status.
                </p>

            </div>

        </div>

        <div class="inventory-table-container">

            <div class="inventory-table-wrap">

                <table class="inventory-table">

                    <thead>

                        <tr>

                            <th>Code</th>
                            <th>Item</th>
                            <th>Category</th>
                            <th>Current</th>
                            <th>Minimum</th>
                            <th>Critical</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach($data['inventory'] as $i): ?>

                            <?php
                            $st = stock_status(
                                (float)$i['current_quantity'],
                                (float)$i['minimum_quantity'],
                                (float)$i['critical_quantity']
                            );
                            ?>

                            <tr>

                                <td>
                                    <span class="item-code">
                                        <?= e($i['item_code']) ?>
                                    </span>
                                </td>

                                <td>
                                    <span class="item-name">
                                        <?= e($i['item_name']) ?>
                                    </span>
                                </td>

                                <td>
                                    <span class="item-category">
                                        <?= e($i['category']) ?>
                                    </span>
                                </td>

                                <td>
                                    <span class="stock-value">
                                        <?= e($i['current_quantity'].' '.$i['unit']) ?>
                                    </span>
                                </td>

                                <td>
                                    <?= e($i['minimum_quantity']) ?>
                                </td>

                                <td>
                                    <?= e($i['critical_quantity']) ?>
                                </td>

                                <td>

                                    <span class="status <?= strtolower($st) ?>">
                                        <?= e($st) ?>
                                    </span>

                                </td>

                                <td>

                                    <form
                                        method="post"
                                        action="index.php?action=inventory_delete"
                                        class="inventory-delete-form"
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
                                            value="<?= $i['id'] ?>"
                                        >

                                        <button
                                            type="submit"
                                            class="inventory-delete-btn"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        <?php if(empty($data['inventory'])): ?>

                            <tr>

                                <td
                                    colspan="8"
                                    class="inventory-empty"
                                >
                                    No inventory items found.

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="inventory-card">

        <div class="inventory-card-header">

            <div class="inventory-card-icon">
                🔄
            </div>

            <div>

                <h2>
                    Stock Entry / Issue
                </h2>

                <p>
                    Record stock received, issued or manually adjusted.
                </p>

            </div>

        </div>

        <form
            class="transaction-form"
            method="post"
            action="index.php?action=stock_transaction"
        >

            <input
                type="hidden"
                name="csrf"
                value="<?= e(csrf_token()) ?>"
            >

            <div class="stock-action-info">

                <span class="stock-action-info-icon">
                    ℹ️
                </span>

                <span>
                    Use <strong>Stock IN</strong> when adding new stock,
                    <strong>Stock OUT</strong> when issuing stock, and
                    <strong>Set Quantity</strong> when correcting the current quantity.
                </span>

            </div>

            <div class="transaction-grid">

                <label class="inventory-field">

                    <span>
                        Inventory Item *
                    </span>

                    <select
                        name="inventory_id"
                        required
                    >

                        <?php foreach($data['inventory'] as $i): ?>

                            <option value="<?= $i['id'] ?>">
                                <?= e($i['item_name'].' ('.$i['current_quantity'].' '.$i['unit'].')') ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </label>

                <label class="inventory-field">

                    <span>
                        Transaction Type
                    </span>

                    <select name="transaction_type">

                        <option value="IN">
                            Stock IN
                        </option>

                        <option value="OUT">
                            Stock OUT
                        </option>

                        <option value="ADJUST">
                            Set Quantity
                        </option>

                    </select>

                </label>

                <label class="inventory-field">

                    <span>
                        Quantity *
                    </span>

                    <input
                        name="quantity"
                        type="number"
                        min="0.01"
                        step="0.01"
                        placeholder="Quantity"
                        required
                    >

                </label>

                <label class="inventory-field">

                    <span>
                        Reference
                    </span>

                    <input
                        name="reference"
                        placeholder="Reference / invoice"
                    >

                </label>

                <label class="inventory-field">

                    <span>
                        Notes
                    </span>

                    <input
                        name="notes"
                        placeholder="Transaction notes"
                    >

                </label>

            </div>

            <div class="transaction-actions">

                <button
                    type="submit"
                    class="transaction-btn"
                >
                    Record Transaction
                </button>

            </div>

        </form>

    </div>

</div>