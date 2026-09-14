<div class="patient-details-page">

    <div class="patient-details-header">

        <div class="header-content">

            <div class="header-icon">
                👤
            </div>

            <div>
                <span class="header-label">PATIENT CARE</span>
                <h1>Patient Details</h1>
                <p>
                    View the patient's personal and contact information.
                </p>
            </div>

        </div>

        <a href="index.php?page=patients" class="back-button">
            <span>←</span>
            Back to Patients
        </a>

    </div>


    <div class="patient-profile-card">

        <div class="profile-top">

            <div class="patient-avatar">
                <?=strtoupper(substr($patient['name'], 0, 1))?>
            </div>

            <div class="patient-main-info">

                <span class="profile-label">PATIENT PROFILE</span>

                <h2><?=e($patient['name'])?></h2>

                <p>
                    Patient information and contact details
                </p>

            </div>

        </div>


        <div class="details-section">

            <div class="section-title">

                <div class="section-icon">
                    🩺
                </div>

                <div>
                    <h3>Personal Information</h3>
                    <p>Basic information about the patient</p>
                </div>

            </div>


            <div class="details-grid">

                <div class="detail-item">

                    <span class="detail-icon">
                        🎂
                    </span>

                    <div>
                        <span class="detail-label">Age</span>
                        <strong><?=e($patient['age'])?></strong>
                    </div>

                </div>


                <div class="detail-item">

                    <span class="detail-icon">
                        ⚧
                    </span>

                    <div>
                        <span class="detail-label">Gender</span>
                        <strong><?=e($patient['gender'])?></strong>
                    </div>

                </div>


                <div class="detail-item">

                    <span class="detail-icon">
                        📞
                    </span>

                    <div>
                        <span class="detail-label">Phone</span>
                        <strong><?=e($patient['phone'])?></strong>
                    </div>

                </div>


                <div class="detail-item">

                    <span class="detail-icon">
                        ✉️
                    </span>

                    <div>
                        <span class="detail-label">Email</span>
                        <strong><?=e($patient['email'])?></strong>
                    </div>

                </div>


                <div class="detail-item address-item">

                    <span class="detail-icon">
                        📍
                    </span>

                    <div>
                        <span class="detail-label">Address</span>
                        <strong><?=e($patient['address'])?></strong>
                    </div>

                </div>

            </div>

        </div>


        <div class="profile-actions">

            <a
                href="index.php?page=patient_edit&id=<?=$patient['id']?>"
                class="edit-button"
            >
                ✏️ Edit Patient
            </a>

            <a
                href="index.php?page=patients"
                class="secondary-button"
            >
                Back to Patients
            </a>

        </div>

    </div>

</div>


<style>

.patient-details-page {
    max-width: 1100px;
    margin: 0 auto;
    padding: 30px;
}


/* Header */

.patient-details-header {
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

.patient-details-header h1 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
}

.patient-details-header p {
    margin: 6px 0 0;
    font-size: 14px;
    opacity: 0.9;
}


/* Back Button */

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


/* Profile Card */

.patient-profile-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}


/* Profile Top */

.profile-top {
    padding: 30px;
    display: flex;
    align-items: center;
    gap: 20px;
    border-bottom: 1px solid #e5e7eb;
    background: #f8fafc;
}

.patient-avatar {
    width: 72px;
    height: 72px;
    border-radius: 18px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    font-weight: 700;
    box-shadow: 0 8px 20px rgba(15, 118, 110, 0.18);
    flex-shrink: 0;
}

.patient-main-info h2 {
    margin: 4px 0 5px;
    color: #111827;
    font-size: 24px;
    font-weight: 700;
}

.patient-main-info p {
    margin: 0;
    color: #6b7280;
    font-size: 13px;
}

.profile-label {
    color: #0f766e;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.2px;
}


/* Details */

.details-section {
    padding: 30px;
}

.section-title {
    display: flex;
    align-items: center;
    gap: 13px;
    margin-bottom: 25px;
}

.section-icon {
    width: 44px;
    height: 44px;
    border-radius: 11px;
    background: #ccfbf1;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.section-title h3 {
    margin: 0;
    color: #111827;
    font-size: 18px;
}

.section-title p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 13px;
}


/* Details Grid */

.details-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 16px;
}

.detail-item {
    min-height: 75px;
    padding: 16px;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 14px;
    background: #fff;
    transition: all 0.2s ease;
}

.detail-item:hover {
    border-color: #99f6e4;
    box-shadow: 0 5px 15px rgba(15, 118, 110, 0.07);
    transform: translateY(-1px);
}

.detail-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: #f0fdfa;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}

.detail-item > div {
    min-width: 0;
}

.detail-label {
    display: block;
    color: #6b7280;
    font-size: 12px;
    margin-bottom: 5px;
}

.detail-item strong {
    display: block;
    color: #111827;
    font-size: 14px;
    font-weight: 600;
    word-break: break-word;
}

.address-item {
    grid-column: 1 / -1;
}


/* Actions */

.profile-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 12px;
    padding: 22px 30px;
    border-top: 1px solid #e5e7eb;
    background: #f8fafc;
}

.edit-button,
.secondary-button {
    min-height: 44px;
    padding: 0 18px;
    border-radius: 9px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 700;
    transition: all 0.2s ease;
}

.edit-button {
    background: linear-gradient(135deg, #0f766e, #0d9488);
    color: #fff;
    box-shadow: 0 4px 12px rgba(15, 118, 110, 0.15);
}

.edit-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 20px rgba(15, 118, 110, 0.22);
}

.secondary-button {
    background: #fff;
    color: #374151;
    border: 1px solid #d1d5db;
}

.secondary-button:hover {
    background: #f9fafb;
    border-color: #9ca3af;
    transform: translateY(-1px);
}


/* Responsive */

@media (max-width: 800px) {

    .patient-details-page {
        padding: 20px;
    }

    .patient-details-header {
        flex-direction: column;
        align-items: flex-start;
        padding: 24px;
    }

    .back-button {
        width: 100%;
    }

    .details-grid {
        grid-template-columns: 1fr;
    }

    .address-item {
        grid-column: auto;
    }

}

@media (max-width: 550px) {

    .patient-details-page {
        padding: 15px;
    }

    .patient-details-header {
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

    .patient-details-header h1 {
        font-size: 23px;
    }

    .patient-details-header p {
        font-size: 13px;
    }

    .profile-top {
        padding: 22px;
    }

    .patient-avatar {
        width: 58px;
        height: 58px;
        font-size: 23px;
        border-radius: 15px;
    }

    .patient-main-info h2 {
        font-size: 20px;
    }

    .details-section {
        padding: 22px;
    }

    .profile-actions {
        flex-direction: column;
        align-items: stretch;
        padding: 20px;
    }

    .edit-button,
    .secondary-button {
        width: 100%;
    }

}

</style>