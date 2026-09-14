<form class="followup-form" method="post" action="index.php?controller=doctor&action=followup_save">

    <input type="hidden" name="csrf_token" value="<?=e(csrf_token())?>">
    <input type="hidden" name="id" value="<?=e($followup['id'] ?? 0)?>">

    <div class="form-grid">

        <div class="form-field">
            <label for="patient_id">
                <span>Patient</span>
                <small>Choose the patient for this follow-up</small>
            </label>

            <select id="patient_id" name="patient_id" required>
                <option value="">Select patient</option>

                <?php while ($p = mysqli_fetch_assoc($patients)): ?>
                    <option value="<?=$p['id']?>" <?=($p['id'] == ($followup['patient_id'] ?? 0) ? 'selected' : '')?>>
                        <?=e($p['name'])?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-field">
            <label for="followup_date">
                <span>Follow-up Date</span>
                <small>Select the appointment date</small>
            </label>

            <input
                id="followup_date"
                type="date"
                name="followup_date"
                required
                value="<?=e($followup['followup_date'] ?? date('Y-m-d'))?>"
            >
        </div>

        <div class="form-field">
            <label for="followup_time">
                <span>Follow-up Time</span>
                <small>Select the appointment time</small>
            </label>

            <input
                id="followup_time"
                type="time"
                name="followup_time"
                required
                value="<?=e($followup['followup_time'] ?? '09:00')?>"
            >
        </div>

        <div class="form-field">
            <label for="status">
                <span>Status</span>
                <small>Current follow-up status</small>
            </label>

            <select id="status" name="status">
                <option value="scheduled" <?=strtolower($followup['status'] ?? '') === 'scheduled' ? 'selected' : ''?>>
                    Scheduled
                </option>

                <option value="active" <?=strtolower($followup['status'] ?? '') === 'active' ? 'selected' : ''?>>
                    Active
                </option>

                <option value="completed" <?=strtolower($followup['status'] ?? '') === 'completed' ? 'selected' : ''?>>
                    Completed
                </option>

                <option value="cancelled" <?=strtolower($followup['status'] ?? '') === 'cancelled' ? 'selected' : ''?>>
                    Cancelled
                </option>
            </select>
        </div>

        <div class="form-field full-width">
            <label for="reason">
                <span>Reason for Follow-up</span>
                <small>Describe the purpose of the appointment</small>
            </label>

            <input
                id="reason"
                type="text"
                name="reason"
                required
                value="<?=e($followup['reason'] ?? '')?>"
                placeholder="Enter follow-up reason"
            >
        </div>

        <div class="form-field full-width">
            <label for="notes">
                <span>Notes</span>
                <small>Add any additional information for the follow-up</small>
            </label>

            <textarea
                id="notes"
                name="notes"
                placeholder="Enter additional notes..."
            ><?=e($followup['notes'] ?? '')?></textarea>
        </div>

    </div>

    <div class="form-actions">
        <a href="index.php?page=followups" class="cancel-button">
            Cancel
        </a>

        <button type="submit" class="save-button">
            <span>✓</span>
            Save Follow-up
        </button>
    </div>

</form>

<style>
.followup-form {
    width: 100%;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 24px;
}

.form-field {
    display: flex;
    flex-direction: column;
}

.form-field.full-width {
    grid-column: 1 / -1;
}

.form-field label {
    display: flex;
    flex-direction: column;
    gap: 4px;
    margin-bottom: 9px;
}

.form-field label span {
    color: #1f2937;
    font-size: 14px;
    font-weight: 700;
}

.form-field label small {
    color: #9ca3af;
    font-size: 12px;
    font-weight: 400;
}

.form-field input,
.form-field select,
.form-field textarea {
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

.form-field input,
.form-field select {
    height: 46px;
    padding: 0 14px;
}

.form-field textarea {
    min-height: 130px;
    padding: 13px 14px;
    resize: vertical;
    line-height: 1.6;
}

.form-field input::placeholder,
.form-field textarea::placeholder {
    color: #9ca3af;
}

.form-field input:hover,
.form-field select:hover,
.form-field textarea:hover {
    border-color: #9ca3af;
}

.form-field input:focus,
.form-field select:focus,
.form-field textarea:focus {
    border-color: #0d9488;
    box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.12);
}

.form-field select {
    cursor: pointer;
    appearance: auto;
}

.form-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 30px;
    padding-top: 24px;
    border-top: 1px solid #e5e7eb;
}

.cancel-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 90px;
    height: 44px;
    padding: 0 18px;
    border: 1px solid #d1d5db;
    border-radius: 9px;
    background: #fff;
    color: #4b5563;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.2s ease;
    box-sizing: border-box;
}

.cancel-button:hover {
    background: #f9fafb;
    border-color: #9ca3af;
    color: #111827;
}

.save-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-width: 155px;
    height: 44px;
    padding: 0 20px;
    border: none;
    border-radius: 9px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    color: #fff;
    font-family: inherit;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 5px 14px rgba(15, 118, 110, 0.18);
    transition: all 0.2s ease;
}

.save-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 20px rgba(15, 118, 110, 0.25);
}

.save-button:active {
    transform: translateY(0);
}

.save-button span {
    font-size: 17px;
    line-height: 1;
}

@media (max-width: 800px) {
    .form-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .form-field.full-width {
        grid-column: auto;
    }

    .form-actions {
        justify-content: stretch;
    }

    .cancel-button,
    .save-button {
        flex: 1;
    }
}

@media (max-width: 500px) {
    .form-grid {
        gap: 18px;
    }

    .form-actions {
        flex-direction: column-reverse;
    }

    .cancel-button,
    .save-button {
        width: 100%;
    }
}
</style>