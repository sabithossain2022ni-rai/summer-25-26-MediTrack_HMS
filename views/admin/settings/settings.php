<style>
.settings-page {
    max-width: 1350px;
    margin: 0 auto;
    padding: 30px;
}

.settings-header {
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

.settings-header-icon {
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

.settings-header-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.settings-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
}

.settings-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.settings-layout {
    display: grid;
    grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
    gap: 24px;
    align-items: start;
}

.settings-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.settings-card-header {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 22px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.settings-card-icon {
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

.settings-card-header h2 {
    margin: 0;
    color: #111827;
    font-size: 18px;
    font-weight: 800;
}

.settings-card-header p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 12px;
}

.settings-form {
    padding: 25px;
}

.settings-field {
    display: block;
    margin-bottom: 18px;
}

.settings-field:last-of-type {
    margin-bottom: 22px;
}

.settings-field span {
    display: block;
    margin-bottom: 7px;
    color: #374151;
    font-size: 12px;
    font-weight: 700;
}

.settings-field input,
.settings-field textarea {
    width: 100%;
    box-sizing: border-box;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    background: #ffffff;
    color: #111827;
    font-size: 13px;
    outline: none;
    transition: all 0.2s ease;
}

.settings-field input {
    height: 46px;
    padding: 0 13px;
}

.settings-field textarea {
    min-height: 110px;
    padding: 12px 13px;
    resize: vertical;
    font-family: inherit;
    line-height: 1.5;
}

.settings-field input:focus,
.settings-field textarea:focus {
    border-color: #0d9488;
    box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.12);
}

.settings-field input::placeholder,
.settings-field textarea::placeholder {
    color: #9ca3af;
}

.settings-save {
    width: 100%;
    min-height: 46px;
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

.settings-save:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(15, 118, 110, 0.25);
}

.integration-content {
    padding: 25px;
}

.integration-intro {
    margin: 0 0 20px;
    color: #4b5563;
    font-size: 13px;
    line-height: 1.7;
}

.integration-box {
    padding: 18px;
    background: #f0fdfa;
    border: 1px solid #ccfbf1;
    border-radius: 13px;
}

.integration-box-title {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 14px;
    color: #0f766e;
    font-size: 13px;
    font-weight: 800;
}

.integration-box-icon {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ffffff;
    border-radius: 8px;
    font-size: 15px;
}

.integration-tables {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.integration-table {
    padding: 7px 10px;
    background: #ffffff;
    border: 1px solid #d5f5ef;
    border-radius: 7px;
    color: #374151;
    font-family: monospace;
    font-size: 11px;
    font-weight: 700;
}

.integration-note {
    margin: 18px 0 0;
    color: #6b7280;
    font-size: 12px;
    line-height: 1.7;
}

.integration-status {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-top: 20px;
    padding: 13px 15px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    color: #374151;
    font-size: 12px;
    font-weight: 700;
}

.integration-status-dot {
    width: 9px;
    height: 9px;
    border-radius: 50%;
    background: #10b981;
    box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.12);
}

@media (max-width: 900px) {
    .settings-layout {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 700px) {
    .settings-page {
        padding: 20px;
    }

    .settings-header {
        padding: 23px;
        border-radius: 16px;
    }

    .settings-header-icon {
        width: 52px;
        height: 52px;
        font-size: 25px;
    }

    .settings-header h1 {
        font-size: 25px;
    }

    .settings-form,
    .integration-content {
        padding: 20px;
    }
}

@media (max-width: 500px) {
    .settings-page {
        padding: 15px;
    }

    .settings-header {
        gap: 12px;
        padding: 20px;
    }

    .settings-header-icon {
        width: 46px;
        height: 46px;
        font-size: 22px;
    }

    .settings-header h1 {
        font-size: 21px;
    }

    .settings-header-label {
        font-size: 9px;
    }

    .settings-card-header h2 {
        font-size: 16px;
    }
}
</style>

<div class="settings-page">

    <div class="settings-header">

        <div class="settings-header-icon">
            ⚙️
        </div>

        <div>

            <span class="settings-header-label">
                ADMINISTRATION
            </span>

            <h1>
                Hospital Settings
            </h1>

            <p>
                Configure hospital information and review system integration details.
            </p>

        </div>

    </div>

    <div class="settings-layout">

        <div class="settings-card">

            <div class="settings-card-header">

                <div class="settings-card-icon">
                    🏥
                </div>

                <div>

                    <h2>
                        Hospital Information
                    </h2>

                    <p>
                        Update the basic information displayed across the system.
                    </p>

                </div>

            </div>

            <form
                class="settings-form"
                method="post"
                action="index.php?action=settings_save"
            >

                <input
                    type="hidden"
                    name="csrf"
                    value="<?= e(csrf_token()) ?>"
                >

                <label class="settings-field">

                    <span>
                        Hospital Name *
                    </span>

                    <input
                        name="hospital_name"
                        value="<?= e($data['settings']['hospital_name'] ?? '') ?>"
                        placeholder="Enter hospital name"
                        required
                    >

                </label>

                <label class="settings-field">

                    <span>
                        Phone
                    </span>

                    <input
                        name="phone"
                        value="<?= e($data['settings']['phone'] ?? '') ?>"
                        placeholder="Hospital phone number"
                    >

                </label>

                <label class="settings-field">

                    <span>
                        Email
                    </span>

                    <input
                        name="email"
                        type="email"
                        value="<?= e($data['settings']['email'] ?? '') ?>"
                        placeholder="hospital@email.com"
                    >

                </label>

                <label class="settings-field">

                    <span>
                        Address
                    </span>

                    <textarea
                        name="address"
                        placeholder="Hospital address"
                    ><?= e($data['settings']['address'] ?? '') ?></textarea>

                </label>

                <label class="settings-field">

                    <span>
                        Currency
                    </span>

                    <input
                        name="currency"
                        value="<?= e($data['settings']['currency'] ?? 'BDT') ?>"
                        placeholder="BDT"
                    >

                </label>

                <button
                    type="submit"
                    class="settings-save"
                >
                    Save Hospital Settings
                </button>

            </form>

        </div>

        <div class="settings-card">

            <div class="settings-card-header">

                <div class="settings-card-icon">
                    🔗
                </div>

                <div>

                    <h2>
                        System Integration
                    </h2>

                    <p>
                        Shared database connection between hospital roles.
                    </p>

                </div>

            </div>

            <div class="integration-content">

                <p class="integration-intro">
                    The Doctor, Patient and Receptionist modules should use the same shared database records. This creates the connection point between all four roles and keeps hospital information synchronized.
                </p>

                <div class="integration-box">

                    <div class="integration-box-title">

                        <div class="integration-box-icon">
                            🗄️
                        </div>

                        Shared Database Tables

                    </div>

                    <div class="integration-tables">

                        <span class="integration-table">
                            users
                        </span>

                        <span class="integration-table">
                            patients
                        </span>

                        <span class="integration-table">
                            doctors
                        </span>

                        <span class="integration-table">
                            receptionists
                        </span>

                        <span class="integration-table">
                            appointments
                        </span>

                        <span class="integration-table">
                            billing
                        </span>

                        <span class="integration-table">
                            inventory
                        </span>

                    </div>

                </div>

                <p class="integration-note">
                    These shared tables allow information created by one role to be accessed by the appropriate modules without creating separate duplicate records.
                </p>

                <div class="integration-status">

                    <span class="integration-status-dot"></span>

                    Shared hospital data architecture

                </div>

            </div>

        </div>

    </div>

</div>