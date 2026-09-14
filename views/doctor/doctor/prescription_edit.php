<div class="prescription-page">

    <div class="prescription-header">

        <div class="header-content">

            <div class="header-icon">
                ✏️
            </div>

            <div>
                <span class="header-label">PATIENT CARE</span>

                <h1>Edit Prescription</h1>

                <p>
                    Update the prescription information and medication instructions.
                </p>
            </div>

        </div>

        <a href="index.php?page=prescriptions" class="back-button">
            <span>←</span>
            Back to Prescriptions
        </a>

    </div>


    <div class="prescription-container">

        <div class="form-heading">

            <div class="form-heading-icon">
                💊
            </div>

            <div>
                <h2>Prescription Details</h2>

                <p>
                    Update the prescription information below.
                </p>
            </div>

        </div>


        <div class="form-content">

            <?php
            include __DIR__ . '/prescription_form.php';
            ?>

        </div>

    </div>

</div>


<style>

.prescription-page {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px;
}

.prescription-header {
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

.prescription-header h1 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
}

.prescription-header p {
    margin: 6px 0 0;
    font-size: 14px;
    opacity: 0.9;
}

.back-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 18px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.14);
    border: 1px solid rgba(255, 255, 255, 0.35);
    color: #fff;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    white-space: nowrap;
    transition: all 0.2s ease;
}

.back-button:hover {
    background: #fff;
    color: #0f766e;
}

.back-button span {
    font-size: 18px;
}

.prescription-container {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.form-heading {
    padding: 22px 28px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    align-items: center;
    gap: 14px;
}

.form-heading-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: #ccfbf1;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 21px;
}

.form-heading h2 {
    margin: 0;
    color: #111827;
    font-size: 19px;
    font-weight: 700;
}

.form-heading p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 13px;
}

.form-content {
    padding: 30px;
}

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
    gap: 8px;
}

.prescription-field.full-width {
    grid-column: 1 / -1;
}

.prescription-field label {
    display: flex;
    flex-direction: column;
    gap: 3px;
    color: #111827;
    font-size: 14px;
    font-weight: 700;
}

.prescription-field label small {
    color: #9ca3af;
    font-size: 11px;
    font-weight: 500;
}

.prescription-field input,
.prescription-field select,
.prescription-field textarea {
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

.prescription-field input,
.prescription-field select {
    height: 46px;
    padding: 0 13px;
}

.prescription-field textarea {
    min-height: 130px;
    padding: 12px 13px;
    resize: vertical;
}

.prescription-field input::placeholder,
.prescription-field textarea::placeholder {
    color: #9ca3af;
}

.prescription-field input:focus,
.prescription-field select:focus,
.prescription-field textarea:focus {
    border-color: #0d9488;
    box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.10);
}

.prescription-form-actions {
    margin-top: 30px;
    padding-top: 22px;
    border-top: 1px solid #e5e7eb;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 10px;
}

.prescription-cancel-button {
    min-height: 44px;
    padding: 0 18px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #fff;
    border: 1px solid #d1d5db;
    color: #4b5563;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    transition: all 0.2s ease;
}

.prescription-cancel-button:hover {
    background: #f9fafb;
    border-color: #9ca3af;
}

.prescription-save-button {
    min-height: 44px;
    padding: 0 20px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    border: none;
    border-radius: 10px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    color: #fff;
    font-family: inherit;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 5px 14px rgba(15, 118, 110, 0.20);
    transition: all 0.2s ease;
}

.prescription-save-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 18px rgba(15, 118, 110, 0.25);
}

.prescription-container .success,
.prescription-container .alert-success {
    padding: 12px 15px;
    margin-bottom: 20px;
    border-radius: 10px;
    background: #ecfdf5;
    border: 1px solid #a7f3d0;
    color: #047857;
    font-size: 13px;
}

.prescription-container .error,
.prescription-container .alert-error {
    padding: 12px 15px;
    margin-bottom: 20px;
    border-radius: 10px;
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #dc2626;
    font-size: 13px;
}

@media (max-width: 850px) {

    .prescription-page {
        padding: 20px;
    }

    .prescription-header {
        flex-direction: column;
        align-items: flex-start;
        padding: 24px;
    }

    .back-button {
        width: 100%;
    }

    .prescription-form-grid {
        grid-template-columns: 1fr;
    }

    .prescription-field.full-width {
        grid-column: auto;
    }

}

@media (max-width: 550px) {

    .prescription-page {
        padding: 15px;
    }

    .prescription-header {
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

    .prescription-header h1 {
        font-size: 23px;
    }

    .prescription-header p {
        font-size: 13px;
    }

    .form-heading {
        padding: 18px;
    }

    .form-content {
        padding: 20px;
    }

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