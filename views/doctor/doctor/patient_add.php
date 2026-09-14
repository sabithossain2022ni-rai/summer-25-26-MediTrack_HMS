<div class="patient-page">

    <div class="patient-header">
        <div class="header-content">
            <div class="header-icon">
                👤
            </div>

            <div>
                <span class="header-label">PATIENT CARE</span>
                <h1>Add Patient</h1>
                <p>
                    Register a new patient and add their information to the system.
                </p>
            </div>
        </div>

        <a href="index.php?page=patients" class="back-button">
            <span>←</span>
            Back to Patients
        </a>
    </div>

    <div class="patient-container">

        <div class="form-heading">
            <div class="form-heading-icon">
                🩺
            </div>

            <div>
                <h2>Patient Information</h2>
                <p>
                    Enter the patient's details below.
                </p>
            </div>
        </div>

        <div class="form-content">

            <?php
            $patient = [];
            include __DIR__ . '/patient_form.php';
            ?>

        </div>

    </div>

</div>

<style>
.patient-page {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px;
}

.patient-header {
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

.patient-header h1 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.4px;
}

.patient-header p {
    margin: 6px 0 0;
    font-size: 14px;
    opacity: 0.9;
}

.back-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 11px 17px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.14);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #fff;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.back-button:hover {
    background: #fff;
    color: #0f766e;
    transform: translateY(-1px);
}

.back-button span {
    font-size: 18px;
}

.patient-container {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.form-heading {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 22px 28px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.form-heading-icon {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    background: #ccfbf1;
    color: #0f766e;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
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

.form-content .form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 24px;
}

.form-content .form-group,
.form-content label {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.form-content label {
    color: #374151;
    font-size: 14px;
    font-weight: 600;
}

.form-content input,
.form-content select,
.form-content textarea {
    width: 100%;
    box-sizing: border-box;
    padding: 12px 14px;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    background: #fff;
    color: #111827;
    font-family: inherit;
    font-size: 14px;
    outline: none;
    transition: all 0.2s ease;
}

.form-content input,
.form-content select {
    height: 46px;
}

.form-content textarea {
    min-height: 120px;
    resize: vertical;
}

.form-content input:focus,
.form-content select:focus,
.form-content textarea:focus {
    border-color: #0d9488;
    box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.12);
}

.form-content input:hover,
.form-content select:hover,
.form-content textarea:hover {
    border-color: #9ca3af;
}

.form-content button,
.form-content input[type="submit"] {
    min-height: 44px;
    padding: 0 20px;
    border: none;
    border-radius: 9px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    color: #fff;
    font-family: inherit;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s ease;
}

.form-content button:hover,
.form-content input[type="submit"]:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 20px rgba(15, 118, 110, 0.22);
}

.form-content .full {
    grid-column: 1 / -1;
}

@media (max-width: 800px) {

    .patient-page {
        padding: 20px;
    }

    .patient-header {
        flex-direction: column;
        align-items: flex-start;
        padding: 24px;
    }

    .back-button {
        width: 100%;
    }

    .form-content .form-grid {
        grid-template-columns: 1fr;
    }

    .form-content .full {
        grid-column: auto;
    }
}

@media (max-width: 550px) {

    .patient-page {
        padding: 15px;
    }

    .patient-header {
        border-radius: 15px;
        padding: 20px;
    }

    .header-content {
        align-items: flex-start;
    }

    .header-icon {
        width: 48px;
        height: 48px;
        font-size: 23px;
    }

    .patient-header h1 {
        font-size: 23px;
    }

    .patient-header p {
        font-size: 13px;
    }

    .form-heading {
        padding: 18px;
    }

    .form-content {
        padding: 20px;
    }
}
</style>