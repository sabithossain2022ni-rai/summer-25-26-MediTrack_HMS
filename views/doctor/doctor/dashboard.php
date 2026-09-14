<section class="doctor-dashboard">
    <div class="dashboard-header">
        <div>
            <span class="dashboard-label">DOCTOR PORTAL</span>
            <h1>Doctor Dashboard</h1>
            <p>Manage your patients, monitor risks, create prescriptions and track follow-ups.</p>
        </div>

        <div class="dashboard-icon">
            🩺
        </div>
    </div>

    <div class="dashboard-cards">

        <a class="dashboard-card patients-card" href="index.php?page=patients">
            <div class="card-top">
                <div class="card-icon">
                    👥
                </div>
                <span class="card-arrow">→</span>
            </div>

            <div class="card-content">
                <h2><?= $patient_count ?></h2>
                <p>Total Patients</p>
                <span class="card-description">View and manage patients</span>
            </div>
        </a>

        <a class="dashboard-card risks-card" href="index.php?page=risks">
            <div class="card-top">
                <div class="card-icon">
                    ⚠
                </div>
                <span class="card-arrow">→</span>
            </div>

            <div class="card-content">
                <h2><?= $risk_count ?></h2>
                <p>Patient Risks</p>
                <span class="card-description">Review patient risk factors</span>
            </div>
        </a>

        <a class="dashboard-card prescriptions-card" href="index.php?page=prescriptions">
            <div class="card-top">
                <div class="card-icon">
                    💊
                </div>
                <span class="card-arrow">→</span>
            </div>

            <div class="card-content">
                <h2><?= $prescription_count ?></h2>
                <p>Prescriptions</p>
                <span class="card-description">Manage prescriptions</span>
            </div>
        </a>

        <a class="dashboard-card followups-card" href="index.php?page=followups">
            <div class="card-top">
                <div class="card-icon">
                    📅
                </div>
                <span class="card-arrow">→</span>
            </div>

            <div class="card-content">
                <h2><?= $followup_count ?></h2>
                <p>Follow-ups</p>
                <span class="card-description">Track upcoming follow-ups</span>
            </div>
        </a>

    </div>
</section>

<style>
.doctor-dashboard {
    padding: 30px;
    max-width: 1400px;
    margin: 0 auto;
}

.dashboard-header {
    background: linear-gradient(135deg, #0f766e, #0d9488);
    border-radius: 20px;
    padding: 35px 40px;
    color: #ffffff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(15, 118, 110, 0.18);
}

.dashboard-label {
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1.5px;
    opacity: 0.85;
}

.dashboard-header h1 {
    margin: 8px 0 8px;
    font-size: 32px;
    font-weight: 700;
}

.dashboard-header p {
    margin: 0;
    font-size: 15px;
    opacity: 0.9;
    max-width: 650px;
}

.dashboard-icon {
    width: 75px;
    height: 75px;
    border-radius: 18px;
    background: rgba(255, 255, 255, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.dashboard-cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
}

.dashboard-card {
    position: relative;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    padding: 25px;
    text-decoration: none;
    color: #111827;
    min-height: 220px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
    transition: all 0.25s ease;
    box-shadow: 0 5px 18px rgba(0, 0, 0, 0.05);
}

.dashboard-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.10);
}

.dashboard-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
}

.patients-card::before {
    background: #2563eb;
}

.risks-card::before {
    background: #dc2626;
}

.prescriptions-card::before {
    background: #7c3aed;
}

.followups-card::before {
    background: #059669;
}

.card-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
}

.patients-card .card-icon {
    background: #eff6ff;
}

.risks-card .card-icon {
    background: #fef2f2;
}

.prescriptions-card .card-icon {
    background: #f5f3ff;
}

.followups-card .card-icon {
    background: #ecfdf5;
}

.card-arrow {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    transition: all 0.25s ease;
}

.dashboard-card:hover .card-arrow {
    background: #0f766e;
    color: #ffffff;
    transform: translateX(3px);
}

.card-content {
    margin-top: 20px;
}

.card-content h2 {
    margin: 0;
    font-size: 36px;
    line-height: 1;
    font-weight: 750;
    color: #111827;
}

.card-content p {
    margin: 10px 0 4px;
    font-size: 17px;
    font-weight: 650;
    color: #374151;
}

.card-description {
    font-size: 13px;
    color: #9ca3af;
}

@media (max-width: 1100px) {
    .dashboard-cards {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 700px) {
    .doctor-dashboard {
        padding: 20px;
    }

    .dashboard-header {
        padding: 28px;
    }

    .dashboard-header h1 {
        font-size: 26px;
    }

    .dashboard-icon {
        display: none;
    }

    .dashboard-cards {
        grid-template-columns: 1fr;
    }
}
</style>