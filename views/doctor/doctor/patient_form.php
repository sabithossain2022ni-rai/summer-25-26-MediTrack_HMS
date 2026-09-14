<form class="patient-form" method="post" action="index.php?controller=doctor&action=patient_save">

    <input type="hidden" name="csrf_token" value="<?=e(csrf_token())?>">
    <input type="hidden" name="id" value="<?=e($patient['id'] ?? 0)?>">

    <div class="patient-form-grid">

        <div class="patient-field full-width">
            <label for="patient_name">
                <span>Full Name</span>
                <small>Enter the patient's complete name</small>
            </label>

            <input
                id="patient_name"
                type="text"
                name="name"
                required
                value="<?=e($patient['name'] ?? '')?>"
                placeholder="Enter patient's full name"
            >
        </div>

        <div class="patient-field">
            <label for="patient_age">
                <span>Age</span>
                <small>Enter the patient's age</small>
            </label>

            <input
                id="patient_age"
                type="number"
                name="age"
                min="0"
                value="<?=e($patient['age'] ?? '')?>"
                placeholder="Enter age"
            >
        </div>

        <div class="patient-field">
            <label for="patient_gender">
                <span>Gender</span>
                <small>Select the patient's gender</small>
            </label>

            <select id="patient_gender" name="gender">

                <option value="Male" <?=($patient['gender'] ?? '') === 'Male' ? 'selected' : ''?>>
                    Male
                </option>

                <option value="Female" <?=($patient['gender'] ?? '') === 'Female' ? 'selected' : ''?>>
                    Female
                </option>

                <option value="Other" <?=($patient['gender'] ?? '') === 'Other' ? 'selected' : ''?>>
                    Other
                </option>

            </select>
        </div>

        <div class="patient-field">
            <label for="patient_phone">
                <span>Phone</span>
                <small>Enter the patient's contact number</small>
            </label>

            <input
                id="patient_phone"
                type="tel"
                name="phone"
                value="<?=e($patient['phone'] ?? '')?>"
                placeholder="Enter phone number"
            >
        </div>

        <div class="patient-field">
            <label for="patient_email">
                <span>Email</span>
                <small>Enter the patient's email address</small>
            </label>

            <input
                id="patient_email"
                type="email"
                name="email"
                value="<?=e($patient['email'] ?? '')?>"
                placeholder="Enter email address"
            >
        </div>

        <div class="patient-field full-width">
            <label for="patient_address">
                <span>Address</span>
                <small>Enter the patient's residential address</small>
            </label>

            <textarea
                id="patient_address"
                name="address"
                placeholder="Enter patient's address..."
            ><?=e($patient['address'] ?? '')?></textarea>
        </div>

    </div>

    <div class="patient-form-actions">

        <a
            href="index.php?page=patients"
            class="patient-cancel-button"
        >
            Cancel
        </a>

        <button
            type="submit"
            class="patient-save-button"
        >
            <span>✓</span>
            Save Patient
        </button>

    </div>

</form>

<style>
.patient-form {
    width: 100%;
}

.patient-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 24px;
}

.patient-field {
    display: flex;
    flex-direction: column;
    min-width: 0;
}

.patient-field.full-width {
    grid-column: 1 / -1;
}

.patient-field label {
    display: flex;
    flex-direction: column;
    gap: 4px;
    margin-bottom: 8px;
    color: #374151;
}

.patient-field label span {
    font-size: 14px;
    font-weight: 700;
}

.patient-field label small {
    color: #6b7280;
    font-size: 12px;
    font-weight: 400;
}

.patient-field input,
.patient-field select,
.patient-field textarea {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    background: #fff;
    color: #111827;
    font-family: inherit;
    font-size: 14px;
    outline: none;
    transition: all 0.2s ease;
}

.patient-field input,
.patient-field select {
    height: 46px;
    padding: 0 14px;
}

.patient-field textarea {
    min-height: 130px;
    padding: 13px 14px;
    resize: vertical;
    line-height: 1.5;
}

.patient-field input::placeholder,
.patient-field textarea::placeholder {
    color: #9ca3af;
}

.patient-field input:hover,
.patient-field select:hover,
.patient-field textarea:hover {
    border-color: #9ca3af;
}

.patient-field input:focus,
.patient-field select:focus,
.patient-field textarea:focus {
    border-color: #0d9488;
    box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.12);
}

.patient-form-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 12px;
    margin-top: 30px;
    padding-top: 24px;
    border-top: 1px solid #e5e7eb;
}

.patient-cancel-button,
.patient-save-button {
    min-height: 44px;
    padding: 0 20px;
    border-radius: 9px;
    font-family: inherit;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    box-sizing: border-box;
    cursor: pointer;
    transition: all 0.2s ease;
}

.patient-cancel-button {
    background: #fff;
    color: #374151;
    border: 1px solid #d1d5db;
}

.patient-cancel-button:hover {
    background: #f9fafb;
    border-color: #9ca3af;
    transform: translateY(-1px);
}

.patient-save-button {
    border: none;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    color: #fff;
    box-shadow: 0 4px 12px rgba(15, 118, 110, 0.15);
}

.patient-save-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 20px rgba(15, 118, 110, 0.22);
}

.patient-save-button span {
    font-size: 16px;
}

@media (max-width: 800px) {

    .patient-form-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .patient-field.full-width {
        grid-column: auto;
    }

}

@media (max-width: 550px) {

    .patient-form-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .patient-cancel-button,
    .patient-save-button {
        width: 100%;
    }

}
</style>