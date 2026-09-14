<div class="followup-page">

    <div class="followup-header">
        <div class="header-content">
            <div class="header-icon">
                📅
            </div>

            <div>
                <span class="header-label">PATIENT CARE</span>
                <h1>Schedule Follow-up</h1>
                <p>
                    Create and schedule a follow-up appointment for your patient.
                </p>
            </div>
        </div>

        <a href="index.php?page=followups" class="back-button">
            <span>←</span>
            Back to Follow-ups
        </a>
    </div>


    <div class="followup-container">

        <div class="form-heading">
            <div class="form-heading-icon">
                🩺
            </div>

            <div>
                <h2>Follow-up Details</h2>
                <p>
                    Enter the appointment information below.
                </p>
            </div>
        </div>


        <div class="form-content">

            <?php
            $followup = [];
            include __DIR__ . '/followup_form.php';
            ?>

        </div>

    </div>

</div>


<style>

.followup-page {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px;
}


/* HEADER */

.followup-header {
    background: linear-gradient(
        135deg,
        #0f766e,
        #0d9488
    );

    border-radius: 20px;

    padding: 30px 35px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 25px;

    margin-bottom: 28px;

    color: #ffffff;

    box-shadow:
        0 10px 30px rgba(15, 118, 110, 0.18);
}


.header-content {
    display: flex;
    align-items: center;
    gap: 18px;
}


.header-icon {
    width: 62px;
    height: 62px;

    border-radius: 16px;

    background: rgba(255, 255, 255, 0.15);

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 30px;

    border: 1px solid rgba(255, 255, 255, 0.15);
}


.header-label {
    font-size: 11px;
    font-weight: 700;

    letter-spacing: 1.5px;

    opacity: 0.8;
}


.followup-header h1 {
    margin: 6px 0 6px;

    font-size: 30px;

    font-weight: 700;

    letter-spacing: -0.4px;
}


.followup-header p {
    margin: 0;

    font-size: 14px;

    opacity: 0.9;
}


.back-button {
    display: flex;
    align-items: center;
    gap: 8px;

    padding: 11px 16px;

    border-radius: 10px;

    background: rgba(255, 255, 255, 0.12);

    border: 1px solid rgba(255, 255, 255, 0.2);

    color: #ffffff;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;

    white-space: nowrap;

    transition: all 0.2s ease;
}


.back-button:hover {
    background: #ffffff;

    color: #0f766e;
}


.back-button span {
    font-size: 18px;
}


/* FORM CONTAINER */

.followup-container {
    background: #ffffff;

    border: 1px solid #e5e7eb;

    border-radius: 18px;

    box-shadow:
        0 5px 20px rgba(0, 0, 0, 0.05);

    overflow: hidden;
}


/* FORM HEADING */

.form-heading {
    display: flex;
    align-items: center;

    gap: 15px;

    padding: 24px 28px;

    border-bottom: 1px solid #eef0f2;

    background: #fafafa;
}


.form-heading-icon {
    width: 46px;
    height: 46px;

    border-radius: 12px;

    background: #ecfdf5;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 22px;
}


.form-heading h2 {
    margin: 0;

    font-size: 18px;

    font-weight: 700;

    color: #1f2937;
}


.form-heading p {
    margin: 4px 0 0;

    font-size: 13px;

    color: #9ca3af;
}


/* FORM CONTENT */

.form-content {
    padding: 30px;
}


/* FORM ELEMENTS INSIDE followup_form.php */

.form-content form {
    width: 100%;
}


.form-content label {
    display: block;

    margin-bottom: 7px;

    font-size: 13px;

    font-weight: 650;

    color: #374151;
}


.form-content input,
.form-content select,
.form-content textarea {
    width: 100%;

    box-sizing: border-box;

    padding: 12px 14px;

    border: 1px solid #d1d5db;

    border-radius: 10px;

    background: #ffffff;

    color: #1f2937;

    font-size: 14px;

    outline: none;

    transition: all 0.2s ease;
}


.form-content input:focus,
.form-content select:focus,
.form-content textarea:focus {
    border-color: #0f766e;

    box-shadow:
        0 0 0 3px rgba(15, 118, 110, 0.10);
}


.form-content textarea {
    min-height: 120px;

    resize: vertical;
}


.form-content input::placeholder,
.form-content textarea::placeholder {
    color: #9ca3af;
}


.form-content button,
.form-content input[type="submit"] {
    border: none;

    border-radius: 10px;

    padding: 12px 22px;

    background: linear-gradient(
        135deg,
        #0f766e,
        #0d9488
    );

    color: #ffffff;

    font-size: 14px;

    font-weight: 650;

    cursor: pointer;

    transition: all 0.2s ease;

    box-shadow:
        0 5px 12px rgba(15, 118, 110, 0.18);
}


.form-content button:hover,
.form-content input[type="submit"]:hover {
    transform: translateY(-1px);

    box-shadow:
        0 8px 18px rgba(15, 118, 110, 0.25);
}


.form-content .form-group {
    margin-bottom: 20px;
}


/* TWO COLUMN FORM SUPPORT */

.form-content .form-row {
    display: grid;

    grid-template-columns: repeat(2, 1fr);

    gap: 20px;
}


/* ERROR / SUCCESS */

.form-content .error,
.form-content .alert-error {
    padding: 12px 15px;

    margin-bottom: 20px;

    border-radius: 10px;

    background: #fef2f2;

    border: 1px solid #fecaca;

    color: #b91c1c;

    font-size: 13px;
}


.form-content .success,
.form-content .alert-success {
    padding: 12px 15px;

    margin-bottom: 20px;

    border-radius: 10px;

    background: #ecfdf5;

    border: 1px solid #a7f3d0;

    color: #047857;

    font-size: 13px;
}


/* RESPONSIVE */

@media (max-width: 800px) {

    .followup-page {
        padding: 20px;
    }

    .followup-header {
        padding: 25px;

        flex-direction: column;

        align-items: flex-start;
    }

    .back-button {
        width: 100%;

        justify-content: center;

        box-sizing: border-box;
    }

    .form-content .form-row {
        grid-template-columns: 1fr;
    }

}


@media (max-width: 550px) {

    .followup-page {
        padding: 15px;
    }

    .followup-header {
        padding: 22px;

        border-radius: 16px;
    }

    .header-icon {
        width: 52px;
        height: 52px;

        font-size: 25px;
    }

    .followup-header h1 {
        font-size: 24px;
    }

    .followup-header p {
        font-size: 13px;
    }

    .header-content {
        align-items: flex-start;
    }

    .form-heading {
        padding: 20px;
    }

    .form-content {
        padding: 20px;
    }

}

</style>