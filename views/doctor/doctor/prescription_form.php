<style>
.prescription-form {
    width: 100%;
}

.prescription-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 24px;
}

.prescription-field {
    display: flex;
    flex-direction: column;
    gap: 9px;
}

.prescription-field.full-width {
    grid-column: 1 / -1;
}

.prescription-field label {
    display: flex;
    flex-direction: column;
    gap: 4px;
    color: #111827;
    font-size: 14px;
    font-weight: 700;
}

.prescription-field label small {
    color: #6b7280;
    font-size: 12px;
    font-weight: 400;
}

.prescription-field input,
.prescription-field select,
.prescription-field textarea {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #d1d5db;
    background: #ffffff;
    color: #111827;
    border-radius: 10px;
    padding: 0 14px;
    font-size: 14px;
    font-family: inherit;
    outline: none;
    transition: all 0.2s ease;
}

.prescription-field input,
.prescription-field select {
    height: 46px;
}

.prescription-field textarea {
    min-height: 125px;
    padding: 13px 14px;
    resize: vertical;
    line-height: 1.5;
}

.prescription-field input::placeholder,
.prescription-field textarea::placeholder {
    color: #9ca3af;
}

.prescription-field input:focus,
.prescription-field select:focus,
.prescription-field textarea:focus {
    border-color: #0f766e;
    box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.10);
}

.prescription-form-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 12px;
    margin-top: 30px;
    padding-top: 24px;
    border-top: 1px solid #e5e7eb;
}

.prescription-cancel-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 46px;
    padding: 0 20px;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    background: #ffffff;
    color: #374151;
    text-decoration: none;
    font-size: 14px;
    font-weight: 700;
    transition: all 0.2s ease;
}

.prescription-cancel-button:hover {
    background: #f9fafb;
    border-color: #9ca3af;
}

.prescription-save-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 46px;
    padding: 0 22px;
    border: none;
    border-radius: 10px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    color: #ffffff;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 6px 14px rgba(15, 118, 110, 0.20);
    transition: all 0.2s ease;
}

.prescription-save-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 18px rgba(15, 118, 110, 0.26);
}

.prescription-save-button:active {
    transform: translateY(0);
}

@media (max-width: 800px) {
    .prescription-form-grid {
        grid-template-columns: 1fr;
    }

    .prescription-field.full-width {
        grid-column: auto;
    }
}

@media (max-width: 550px) {
    .prescription-form-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .prescription-cancel-button,
    .prescription-save-button {
        width: 100%;
    }
}
</style>

<form class="prescription-form" method="post" action="index.php?controller=doctor&action=prescription_save">

    <input type="hidden" name="csrf_token" value="<?=e(csrf_token())?>">
    <input type="hidden" name="id" value="<?=e($prescription['id'] ?? 0)?>">

    <div class="prescription-form-grid">

        <div class="prescription-field">
            <label for="patient_id">
                <span>Patient</span>
                <small>Select the patient for this prescription</small>
            </label>

            <select id="patient_id" name="patient_id" required>
                <option value="">Select patient</option>

                <?php while ($p = mysqli_fetch_assoc($patients)): ?>

                    <option value="<?=$p['id']?>" <?=($p['id'] == ($prescription['patient_id'] ?? 0) ? 'selected' : '')?>>
                        <?=e($p['name'])?>
                    </option>

                <?php endwhile; ?>

            </select>
        </div>

        <div class="prescription-field">
            <label for="diagnosis">
                <span>Diagnosis</span>
                <small>Enter the patient's diagnosis</small>
            </label>

            <input
                id="diagnosis"
                type="text"
                name="diagnosis"
                required
                value="<?=e($prescription['diagnosis'] ?? '')?>"
                placeholder="Enter diagnosis"
            >
        </div>

        <div class="prescription-field">
            <label for="medicine">
                <span>Medicine</span>
                <small>Enter the prescribed medicine</small>
            </label>

            <input
                id="medicine"
                type="text"
                name="medicine"
                required
                value="<?=e($prescription['medicine'] ?? '')?>"
                placeholder="Enter medicine name"
            >
        </div>

        <div class="prescription-field">
            <label for="dosage">
                <span>Dosage</span>
                <small>Specify the medicine dosage</small>
            </label>

            <input
                id="dosage"
                type="text"
                name="dosage"
                value="<?=e($prescription['dosage'] ?? '')?>"
                placeholder="Example: 500 mg"
            >
        </div>

        <div class="prescription-field">
            <label for="frequency">
                <span>Frequency</span>
                <small>How often should it be taken?</small>
            </label>

            <input
                id="frequency"
                type="text"
                name="frequency"
                value="<?=e($prescription['frequency'] ?? '')?>"
                placeholder="Example: 2 times daily"
            >
        </div>

        <div class="prescription-field">
            <label for="duration">
                <span>Duration</span>
                <small>Specify the treatment duration</small>
            </label>

            <input
                id="duration"
                type="text"
                name="duration"
                value="<?=e($prescription['duration'] ?? '')?>"
                placeholder="Example: 7 days"
            >
        </div>

        <div class="prescription-field full-width">
            <label for="instructions">
                <span>Instructions</span>
                <small>Add additional medication instructions for the patient</small>
            </label>

            <textarea
                id="instructions"
                name="instructions"
                placeholder="Enter medication instructions, precautions or additional notes..."
            ><?=e($prescription['instructions'] ?? '')?></textarea>
        </div>

    </div>

    <div class="prescription-form-actions">

        <a href="index.php?page=prescriptions" class="prescription-cancel-button">
            Cancel
        </a>

        <button type="submit" class="prescription-save-button">
            <span>✓</span>
            Save Prescription
        </button>

    </div>

</form>