<style>
.risk-page {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px;
}

.risk-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    padding: 30px 32px;
    margin-bottom: 24px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    border-radius: 20px;
    color: #ffffff;
    box-shadow: 0 12px 30px rgba(15, 118, 110, 0.20);
}

.risk-header .header-content {
    display: flex;
    align-items: center;
    gap: 18px;
}

.risk-header .header-icon {
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

.risk-header .header-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.risk-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -0.5px;
}

.risk-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.back-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 0 18px;
    border-radius: 10px;
    background: #ffffff;
    color: #0f766e;
    text-decoration: none;
    font-size: 13px;
    font-weight: 800;
    white-space: nowrap;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
    transition: all 0.2s ease;
}

.back-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 9px 20px rgba(0, 0, 0, 0.16);
}

.back-button span {
    font-size: 18px;
}

.risk-container {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.form-heading {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 24px 26px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.form-heading-icon {
    width: 46px;
    height: 46px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: #ccfbf1;
    font-size: 22px;
}

.form-heading h2 {
    margin: 0;
    color: #111827;
    font-size: 19px;
    font-weight: 800;
}

.form-heading p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 13px;
}

.form-content {
    padding: 28px;
}

@media (max-width: 800px) {
    .risk-page {
        padding: 20px;
    }

    .risk-header {
        align-items: flex-start;
        flex-direction: column;
        padding: 25px;
    }

    .back-button {
        width: 100%;
    }
}

@media (max-width: 550px) {
    .risk-page {
        padding: 15px;
    }

    .risk-header {
        padding: 22px;
        border-radius: 16px;
    }

    .risk-header .header-content {
        align-items: flex-start;
    }

    .risk-header .header-icon {
        width: 52px;
        height: 52px;
        font-size: 25px;
    }

    .risk-header h1 {
        font-size: 24px;
    }

    .risk-header p {
        line-height: 1.5;
    }

    .form-heading {
        padding: 20px;
    }

    .form-content {
        padding: 20px;
    }
}
</style>

<div class="risk-page">

    <div class="risk-header">

        <div class="header-content">

            <div class="header-icon">
                ✏️
            </div>

            <div>
                <span class="header-label">PATIENT CARE</span>

                <h1>Edit Patient Risk</h1>

                <p>
                    Update the patient's risk information and keep their health record accurate.
                </p>
            </div>

        </div>

        <a href="index.php?page=risks" class="back-button">
            <span>←</span>
            Back to Patient Risks
        </a>

    </div>

    <div class="risk-container">

        <div class="form-heading">

            <div class="form-heading-icon">
                ⚠️
            </div>

            <div>
                <h2>Risk Information</h2>

                <p>
                    Update the patient risk details below.
                </p>
            </div>

        </div>

        <div class="form-content">

            <?php
            include __DIR__ . '/risk_form.php';
            ?>

        </div>

    </div>

</div>