<style>
.risk-form {
    width: 100%;
}

.risk-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 22px;
}

.risk-field {
    display: flex;
    flex-direction: column;
    gap: 9px;
}

.risk-field.full-width {
    grid-column: 1 / -1;
}

.risk-field label {
    display: flex;
    flex-direction: column;
    gap: 4px;
    color: #111827;
    font-size: 14px;
    font-weight: 800;
}

.risk-field label small {
    color: #6b7280;
    font-size: 12px;
    font-weight: 500;
    line-height: 1.4;
}

.risk-field input,
.risk-field select,
.risk-field textarea {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    background: #ffffff;
    color: #111827;
    font-family: inherit;
    font-size: 14px;
    outline: none;
    transition: all 0.2s ease;
}

.risk-field input,
.risk-field select {
    height: 46px;
    padding: 0 13px;
}

.risk-field textarea {
    min-height: 130px;
    padding: 13px;
    resize: vertical;
    line-height: 1.5;
}

.risk-field input::placeholder,
.risk-field textarea::placeholder {
    color: #9ca3af;
}

.risk-field input:focus,
.risk-field select:focus,
.risk-field textarea:focus {
    border-color: #0f766e;
    box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.10);
}

.risk-form-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 12px;
    margin-top: 28px;
    padding-top: 22px;
    border-top: 1px solid #e5e7eb;
}

.risk-cancel-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 44px;
    padding: 0 18px;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    background: #ffffff;
    color: #374151;
    text-decoration: none;
    font-size: 13px;
    font-weight: 800;
    transition: all 0.2s ease;
}

.risk-cancel-button:hover {
    background: #f9fafb;
    border-color: #9ca3af;
}

.risk-save-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 0 20px;
    border: 0;
    border-radius: 10px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    color: #ffffff;
    font-size: 13px;
    font-weight: 800;
    cursor: pointer;
    box-shadow: 0 6px 15px rgba(15, 118, 110, 0.20);
    transition: all 0.2s ease;
}

.risk-save-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 9px 20px rgba(15, 118, 110, 0.28);
}

.risk-save-button span {
    font-size: 16px;
}

@media (max-width: 800px) {
    .risk-form-grid {
        grid-template-columns: 1fr;
    }

    .risk-field.full-width {
        grid-column: auto;
    }
}

@media (max-width: 550px) {
    .risk-form-grid {
        gap: 18px;
    }

    .risk-form-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .risk-cancel-button,
    .risk-save-button {
        width: 100%;
    }
}
</style>

<form class="risk-form" method="post" action="index.php?controller=doctor&action=risk_save">

    <input type="hidden" name="csrf_token" value="<?=e(csrf_token())?>">

    <input type="hidden" name="id" value="<?=e($risk['id'] ?? 0)?>">

    <div class="risk-form-grid">

        <div class="risk-field">

            <label for="patient_id">
                <span>Patient</span>
                <small>Select the patient associated with this risk</small>
            </label>

            <select id="patient_id" name="patient_id" required>

                <option value="">Select Patient</option>

                <?php while ($p = mysqli_fetch_assoc($patients)): ?>

                    <option
                        value="<?=$p['id']?>"
                        <?=($p['id'] == ($risk['patient_id'] ?? 0)) ? 'selected' : ''?>
                    >
                        <?=e($p['name'])?>
                    </option>

                <?php endwhile; ?>

            </select>

        </div>

        <div class="risk-field">

            <label for="risk_level">
                <span>Risk Level</span>
                <small>Choose the severity of the patient risk</small>
            </label>

            <select id="risk_level" name="risk_level" required>

                <option value="">Select Risk Level</option>

                <option value="Low"
                    <?= (($risk['risk_level'] ?? '') === 'Low') ? 'selected' : '' ?>>
                    Low
                </option>

                <option value="Medium"
                    <?= (($risk['risk_level'] ?? '') === 'Medium') ? 'selected' : '' ?>>
                    Medium
                </option>

                <option value="High"
                    <?= (($risk['risk_level'] ?? '') === 'High') ? 'selected' : '' ?>>
                    High
                </option>

                <option value="Critical"
                    <?= (($risk['risk_level'] ?? '') === 'Critical') ? 'selected' : '' ?>>
                    Critical
                </option>

            </select>

        </div>

        <div class="risk-field">

            <label for="risk_date">
                <span>Risk Date</span>
                <small>Select the date when the risk was identified</small>
            </label>

            <input
                id="risk_date"
                type="date"
                name="risk_date"
                required
                value="<?=e($risk['risk_date'] ?? date('Y-m-d'))?>"
            >

        </div>

        <div class="risk-field">

            <label for="status">
                <span>Status</span>
                <small>Set the current status of this risk</small>
            </label>

            <select id="status" name="status">

                <option value="Open"
                    <?= (($risk['status'] ?? 'Open') === 'Open') ? 'selected' : '' ?>>
                    Open
                </option>

                <option value="Resolved"
                    <?= (($risk['status'] ?? '') === 'Resolved') ? 'selected' : '' ?>>
                    Resolved
                </option>

            </select>

        </div>

        <div class="risk-field full-width">

            <label for="description">
                <span>Description</span>
                <small>Describe the patient's health risk and relevant details</small>
            </label>

            <textarea
                id="description"
                name="description"
                required
                placeholder="Enter patient risk description"
            ><?=e($risk['description'] ?? '')?></textarea>

        </div>

    </div>

    <div class="risk-form-actions">

        <a href="index.php?page=risks" class="risk-cancel-button">
            Cancel
        </a>

        <button type="submit" class="risk-save-button">
            <span>✓</span>
            <?=!empty($risk) ? 'Update Risk' : 'Save Risk'?>
        </button>

    </div>

</form>