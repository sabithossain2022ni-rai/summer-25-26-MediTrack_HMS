<style>
.billing-page {
    max-width: 1350px;
    margin: 0 auto;
    padding: 30px;
}

.billing-header {
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

.billing-header-icon {
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

.billing-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.billing-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
}

.billing-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.billing-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
    margin-bottom: 24px;
}

.billing-card-header {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 22px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.billing-card-icon {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ccfbf1;
    color: #0f766e;
    border-radius: 11px;
    font-size: 21px;
}

.billing-card-header h2 {
    margin: 0;
    color: #111827;
    font-size: 19px;
    font-weight: 800;
}

.billing-card-header p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 12px;
}

.billing-form {
    padding: 24px;
}

.billing-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
}

.billing-field {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.billing-field.full-width {
    grid-column: 1 / -1;
}

.billing-field label {
    color: #111827;
    font-size: 13px;
    font-weight: 800;
}

.billing-field input,
.billing-field select {
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

.billing-field input:focus,
.billing-field select:focus {
    border-color: #0f766e;
    box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.10);
}

.billing-submit-area {
    grid-column: 1 / -1;
    margin-top: 4px;
    padding-top: 20px;
    border-top: 1px solid #e5e7eb;
    display: flex;
    justify-content: flex-end;
}

.billing-submit {
    min-width: 170px;
    height: 46px;
    padding: 0 20px;
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

.billing-submit:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(15, 118, 110, 0.28);
}

.billing-table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.billing-table {
    width: 100%;
    min-width: 1050px;
    border-collapse: collapse;
}

.billing-table th {
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

.billing-table td {
    padding: 16px;
    border-bottom: 1px solid #eef2f7;
    color: #374151;
    font-size: 12px;
    vertical-align: middle;
}

.billing-table tbody tr {
    transition: background 0.2s ease;
}

.billing-table tbody tr:hover {
    background: #f8fffe;
}

.billing-table tbody tr:last-child td {
    border-bottom: 0;
}

.invoice-number {
    color: #0f766e;
    font-weight: 800;
    white-space: nowrap;
}

.billing-patient {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 150px;
}

.billing-patient-avatar {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 10px;
    background: #ccfbf1;
    color: #0f766e;
    font-size: 14px;
    font-weight: 800;
}

.billing-patient-name {
    color: #111827;
    font-weight: 700;
}

.billing-doctor {
    color: #374151;
    font-weight: 600;
}

.billing-type {
    display: inline-flex;
    align-items: center;
    padding: 6px 10px;
    border-radius: 999px;
    background: #f0fdfa;
    color: #0f766e;
    font-size: 10px;
    font-weight: 800;
}

.billing-amount {
    color: #111827;
    font-weight: 700;
    white-space: nowrap;
}

.billing-paid {
    color: #166534;
    font-weight: 700;
    white-space: nowrap;
}

.billing-due {
    color: #dc2626;
    font-weight: 800;
    white-space: nowrap;
}

.billing-status {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 6px 10px;
    border-radius: 999px;
    background: #dcfce7;
    color: #166534;
    font-size: 10px;
    font-weight: 800;
    text-transform: capitalize;
    white-space: nowrap;
}

.billing-status.due,
.billing-status.pending,
.billing-status.unpaid {
    background: #fef3c7;
    color: #92400e;
}

.billing-status.partial {
    background: #dbeafe;
    color: #1d4ed8;
}

.billing-status.paid {
    background: #dcfce7;
    color: #166534;
}

.billing-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 34px;
    padding: 0 12px;
    border: 1px solid #fecaca;
    border-radius: 8px;
    background: #fff1f2;
    color: #dc2626;
    font-size: 10px;
    font-weight: 800;
    cursor: pointer;
    transition: all 0.2s ease;
}

.billing-action:hover {
    background: #fee2e2;
    border-color: #fca5a5;
}

.billing-empty {
    padding: 45px 20px !important;
    color: #9ca3af !important;
    text-align: center;
    font-size: 13px !important;
}

.billing-payment-method {
    display: inline-flex;
    align-items: center;
    padding: 5px 9px;
    border-radius: 8px;
    background: #f3f4f6;
    color: #4b5563;
    font-size: 10px;
    font-weight: 700;
}

@media (max-width: 800px) {
    .billing-page {
        padding: 20px;
    }

    .billing-form-grid {
        grid-template-columns: 1fr;
    }

    .billing-field.full-width {
        grid-column: auto;
    }

    .billing-submit-area {
        grid-column: auto;
    }
}

@media (max-width: 600px) {
    .billing-page {
        padding: 15px;
    }

    .billing-header {
        padding: 22px;
        border-radius: 16px;
    }

    .billing-header-icon {
        width: 52px;
        height: 52px;
        font-size: 25px;
    }

    .billing-header h1 {
        font-size: 24px;
    }

    .billing-header p {
        line-height: 1.5;
    }

    .billing-form {
        padding: 20px;
    }

    .billing-card-header {
        padding: 20px;
    }

    .billing-submit-area {
        display: block;
    }

    .billing-submit {
        width: 100%;
    }
}
</style>

<div class="billing-page">

    <div class="billing-header">

        <div class="billing-header-icon">
            💳
        </div>

        <div>
            <span class="billing-label">
                RECEPTIONIST PORTAL
            </span>

            <h1>
                Patient Billing
            </h1>

            <p>
                Create, manage and monitor patient billing records and payments.
            </p>
        </div>

    </div>

    <div class="billing-card">

        <div class="billing-card-header">

            <div class="billing-card-icon">
                🧾
            </div>

            <div>
                <h2>
                    Create New Bill
                </h2>

                <p>
                    Enter the patient's billing and payment information.
                </p>
            </div>

        </div>

        <div class="billing-form">

            <form
                class="billing-form-grid"
                method="post"
                action="index.php?action=billing_save"
            >

                <input
                    type="hidden"
                    name="csrf"
                    value="<?=e(csrf_token())?>"
                >

                <div class="billing-field">

                    <label for="patient_id">
                        Patient *
                    </label>

                    <select
                        id="patient_id"
                        name="patient_id"
                        required
                    >

                        <option value="">
                            Select patient
                        </option>

                        <?php foreach($data['patients'] as $p): ?>

                            <option value="<?=$p['id']?>">
                                <?=e($p['patient_code'].' - '.$p['full_name'])?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="billing-field">

                    <label for="doctor_id">
                        Doctor
                    </label>

                    <select
                        id="doctor_id"
                        name="doctor_id"
                    >

                        <option value="">
                            Doctor (optional)
                        </option>

                        <?php foreach($data['doctors'] as $d): ?>

                            <option value="<?=$d['id']?>">
                                <?=e($d['doctor_code'].' - '.$d['full_name'])?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="billing-field">

                    <label for="item_type">
                        Billing Type
                    </label>

                    <select
                        id="item_type"
                        name="item_type"
                    >

                        <option>
                            Consultation
                        </option>

                        <option>
                            Lab
                        </option>

                        <option>
                            Medicine
                        </option>

                        <option>
                            Other
                        </option>

                    </select>

                </div>

                <div class="billing-field">

                    <label for="description">
                        Description *
                    </label>

                    <input
                        id="description"
                        name="description"
                        placeholder="Enter billing description"
                        required
                    >

                </div>

                <div class="billing-field">

                    <label for="amount">
                        Total Amount *
                    </label>

                    <input
                        id="amount"
                        name="amount"
                        type="number"
                        step="0.01"
                        min="0"
                        placeholder="Total amount"
                        required
                    >

                </div>

                <div class="billing-field">

                    <label for="paid_amount">
                        Paid Amount
                    </label>

                    <input
                        id="paid_amount"
                        name="paid_amount"
                        type="number"
                        step="0.01"
                        min="0"
                        placeholder="Paid amount"
                        value="0"
                    >

                </div>

                <div class="billing-field">

                    <label for="payment_method">
                        Payment Method
                    </label>

                    <select
                        id="payment_method"
                        name="payment_method"
                    >

                        <option>
                            Cash
                        </option>

                        <option>
                            Card
                        </option>

                        <option>
                            Mobile Banking
                        </option>

                        <option>
                            Bank
                        </option>

                    </select>

                </div>

                <div class="billing-field">

                    <label for="transaction_date">
                        Transaction Date
                    </label>

                    <input
                        id="transaction_date"
                        name="transaction_date"
                        type="date"
                        value="<?=date('Y-m-d')?>"
                    >

                </div>

                <div class="billing-submit-area">

                    <button
                        class="billing-submit"
                        type="submit"
                    >
                        ＋ Create Bill
                    </button>

                </div>

            </form>

        </div>

    </div>

    <div class="billing-card">

        <div class="billing-card-header">

            <div class="billing-card-icon">
                📋
            </div>

            <div>
                <h2>
                    Billing Records
                </h2>

                <p>
                    View patient invoices, payments and outstanding balances.
                </p>
            </div>

        </div>

        <div class="billing-table-wrapper">

            <table class="billing-table">

                <thead>

                    <tr>
                        <th>Invoice</th>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Type</th>
                        <th>Total</th>
                        <th>Paid</th>
                        <th>Due</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach($data['billing'] as $b): ?>

                        <tr>

                            <td>
                                <span class="invoice-number">
                                    <?=e($b['invoice_no'])?>
                                </span>
                            </td>

                            <td>

                                <div class="billing-patient">

                                    <div class="billing-patient-avatar">
                                        <?=strtoupper(substr($b['patient_name'], 0, 1))?>
                                    </div>

                                    <span class="billing-patient-name">
                                        <?=e($b['patient_name'])?>
                                    </span>

                                </div>

                            </td>

                            <td>
                                <span class="billing-doctor">
                                    <?=e($b['doctor_name'])?>
                                </span>
                            </td>

                            <td>
                                <span class="billing-type">
                                    <?=e($b['item_type'])?>
                                </span>
                            </td>

                            <td>
                                <span class="billing-amount">
                                    ৳ <?=money($b['amount'])?>
                                </span>
                            </td>

                            <td>
                                <span class="billing-paid">
                                    ৳ <?=money($b['paid_amount'])?>
                                </span>
                            </td>

                            <td>
                                <span class="billing-due">
                                    ৳ <?=money($b['amount'] - $b['paid_amount'])?>
                                </span>
                            </td>

                            <td>

                                <span class="billing-status <?=strtolower(e($b['payment_status']))?>">
                                    <?=e($b['payment_status'])?>
                                </span>

                            </td>

                            <td>

                                <form
                                    method="post"
                                    action="index.php?action=billing_delete"
                                    class="inline"
                                    onsubmit="return confirmDelete()"
                                >

                                    <input
                                        type="hidden"
                                        name="csrf"
                                        value="<?=e(csrf_token())?>"
                                    >

                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?=$b['id']?>"
                                    >

                                    <button
                                        type="submit"
                                        class="billing-action"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    <?php if(empty($data['billing'])): ?>

                        <tr>

                            <td
                                colspan="9"
                                class="billing-empty"
                            >
                                No billing records found.
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>