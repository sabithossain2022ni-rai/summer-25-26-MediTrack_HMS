<style>
.admin-dashboard-page {
    max-width: 1350px;
    margin: 0 auto;
    padding: 30px;
}

.admin-dashboard-header {
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

.admin-dashboard-header-icon {
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

.admin-dashboard-label {
    display: block;
    margin-bottom: 5px;
    color: rgba(255, 255, 255, 0.75);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.admin-dashboard-header h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 800;
}

.admin-dashboard-header p {
    margin: 7px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
}

.admin-stats-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 18px;
    margin-bottom: 24px;
}

.admin-stat-card {
    position: relative;
    padding: 22px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 17px;
    box-shadow: 0 7px 22px rgba(15, 23, 42, 0.05);
    overflow: hidden;
    transition: all 0.2s ease;
}

.admin-stat-card:hover {
    transform: translateY(-3px);
    border-color: #99f6e4;
    box-shadow: 0 12px 28px rgba(15, 118, 110, 0.10);
}

.admin-stat-card::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(180deg, #0f766e, #0d9488);
}

.admin-stat-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 16px;
}

.admin-stat-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ccfbf1;
    color: #0f766e;
    border-radius: 11px;
    font-size: 20px;
}

.admin-stat-title {
    color: #6b7280;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.admin-stat-value {
    margin-bottom: 5px;
    color: #111827;
    font-size: 27px;
    font-weight: 800;
    line-height: 1.15;
    word-break: break-word;
}

.admin-stat-description {
    color: #9ca3af;
    font-size: 11px;
    font-weight: 500;
}

.admin-content-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin-bottom: 24px;
}

.admin-panel {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.admin-panel-header {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 22px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.admin-panel-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: #ccfbf1;
    color: #0f766e;
    border-radius: 11px;
    font-size: 20px;
}

.admin-panel-header h2 {
    margin: 0;
    color: #111827;
    font-size: 18px;
    font-weight: 800;
}

.admin-panel-header p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 12px;
}

.admin-panel-body {
    padding: 24px;
}

.admin-checklist {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.admin-checklist li {
    position: relative;
    padding-left: 30px;
    color: #374151;
    font-size: 13px;
    line-height: 1.5;
}

.admin-checklist li::before {
    content: "✓";
    position: absolute;
    left: 0;
    top: 0;
    width: 21px;
    height: 21px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ccfbf1;
    color: #0f766e;
    border-radius: 50%;
    font-size: 11px;
    font-weight: 900;
}

.admin-stock-summary {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
    margin-bottom: 20px;
}

.admin-stock-box {
    padding: 18px;
    border: 1px solid #e5e7eb;
    border-radius: 13px;
    background: #f9fafb;
}

.admin-stock-box strong {
    display: block;
    margin-bottom: 4px;
    color: #111827;
    font-size: 26px;
    font-weight: 800;
}

.admin-stock-box span {
    color: #6b7280;
    font-size: 11px;
    font-weight: 600;
}

.admin-stock-box.low strong {
    color: #d97706;
}

.admin-stock-box.critical strong {
    color: #dc2626;
}

.admin-stock-button {
    width: 100%;
    min-height: 46px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    color: #ffffff;
    font-size: 13px;
    font-weight: 800;
    text-decoration: none;
    box-shadow: 0 7px 16px rgba(15, 118, 110, 0.18);
    transition: all 0.2s ease;
}

.admin-stock-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(15, 118, 110, 0.25);
}

.admin-management-panel {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
}

.admin-management-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 22px 24px;
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
}

.admin-management-header h2 {
    margin: 0;
    color: #111827;
    font-size: 19px;
    font-weight: 800;
}

.admin-management-header p {
    margin: 5px 0 0;
    color: #6b7280;
    font-size: 12px;
}

.admin-management-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 16px;
    padding: 24px;
}

.admin-management-card {
    position: relative;
    min-height: 180px;
    display: flex;
    flex-direction: column;
    padding: 20px;
    border: 1px solid #e5e7eb;
    border-radius: 15px;
    background: #ffffff;
    text-decoration: none;
    transition: all 0.2s ease;
    overflow: hidden;
}

.admin-management-card:hover {
    transform: translateY(-3px);
    border-color: #99f6e4;
    background: #f8fffe;
    box-shadow: 0 10px 24px rgba(15, 118, 110, 0.10);
}

.admin-management-icon {
    width: 46px;
    height: 46px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    background: #ccfbf1;
    color: #0f766e;
    border-radius: 12px;
    font-size: 22px;
}

.admin-management-title {
    margin-bottom: 7px;
    color: #111827;
    font-size: 15px;
    font-weight: 800;
}

.admin-management-description {
    color: #6b7280;
    font-size: 12px;
    line-height: 1.5;
}

.admin-management-link {
    margin-top: auto;
    padding-top: 18px;
    color: #0f766e;
    font-size: 11px;
    font-weight: 800;
}

@media (max-width: 1100px) {
    .admin-stats-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .admin-management-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 800px) {
    .admin-dashboard-page {
        padding: 20px;
    }

    .admin-content-grid {
        grid-template-columns: 1fr;
    }

    .admin-management-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width: 600px) {
    .admin-dashboard-page {
        padding: 15px;
    }

    .admin-dashboard-header {
        padding: 22px;
        border-radius: 16px;
    }

    .admin-dashboard-header-icon {
        width: 52px;
        height: 52px;
        font-size: 25px;
    }

    .admin-dashboard-header h1 {
        font-size: 24px;
    }

    .admin-dashboard-header p {
        line-height: 1.5;
    }

    .admin-stats-grid {
        grid-template-columns: 1fr;
    }

    .admin-stock-summary {
        grid-template-columns: 1fr;
    }

    .admin-management-grid {
        grid-template-columns: 1fr;
        padding: 20px;
    }

    .admin-management-card {
        min-height: 165px;
    }

    .admin-panel-header,
    .admin-management-header {
        padding: 20px;
    }

    .admin-panel-body {
        padding: 20px;
    }
}
</style>

<div class="admin-dashboard-page">

    <div class="admin-dashboard-header">

        <div class="admin-dashboard-header-icon">
            🏥
        </div>

        <div>

            <span class="admin-dashboard-label">
                ADMIN PORTAL
            </span>

            <h1>
                Admin Dashboard
            </h1>

            <p>
                Hospital overview, monitoring and management controls.
            </p>

        </div>

    </div>

    <div class="admin-stats-grid">

        <?php foreach ([

            [
                'Patients',
                $data['patients'] ?? 0,
                'active patient records',
                '👥'
            ],

            [
                'Doctors',
                $data['doctors'] ?? 0,
                'active doctors',
                '🩺'
            ],

            [
                'Receptionists',
                $data['receptionists'] ?? 0,
                'active receptionists',
                '👨‍💼'
            ],

            [
                'Appointments',
                $data['appointments_today'] ?? 0,
                'today',
                '📅'
            ],

            [
                'Today Revenue',
                '৳ ' . money($data['today_revenue'] ?? 0),
                'paid today',
                '💰'
            ],

            [
                'Patient Due',
                '৳ ' . money($data['patient_due'] ?? 0),
                'outstanding',
                '💳'
            ],

            [
                'Monthly Revenue',
                '৳ ' . money($data['monthly_revenue'] ?? 0),
                'this month',
                '📈'
            ],

            [
                'Critical Stock',
                $data['critical_stock'] ?? 0,
                'items need attention',
                '⚠️'
            ]

        ] as $c): ?>

            <div class="admin-stat-card">

                <div class="admin-stat-top">

                    <div class="admin-stat-icon">
                        <?=e($c[3])?>
                    </div>

                    <div class="admin-stat-title">
                        <?=e($c[0])?>
                    </div>

                </div>

                <div class="admin-stat-value">
                    <?=e($c[1])?>
                </div>

                <div class="admin-stat-description">
                    <?=e($c[2])?>
                </div>

            </div>

        <?php endforeach; ?>

    </div>

    <div class="admin-content-grid">

        <div class="admin-panel">

            <div class="admin-panel-header">

                <div class="admin-panel-icon">
                    📋
                </div>

                <div>

                    <h2>
                        Admin Responsibilities
                    </h2>

                    <p>
                        Key areas requiring administrative attention
                    </p>

                </div>

            </div>

            <div class="admin-panel-body">

                <ul class="admin-checklist">

                    <li>
                        Monitor hospital cost and patient billing
                    </li>

                    <li>
                        Manage doctors, receptionists and hospital staff
                    </li>

                    <li>
                        Manage medical equipment and resources
                    </li>

                    <li>
                        Monitor medicines and consumables with thresholds
                    </li>

                    <li>
                        Connect shared Patient, Doctor and Receptionist records
                    </li>

                    <li>
                        Maintain role-based access and audit-ready data
                    </li>

                </ul>

            </div>

        </div>

        <div class="admin-panel">

            <div class="admin-panel-header">

                <div class="admin-panel-icon">
                    📦
                </div>

                <div>

                    <h2>
                        Stock Alerts
                    </h2>

                    <p>
                        Monitor inventory levels that require attention
                    </p>

                </div>

            </div>

            <div class="admin-panel-body">

                <div class="admin-stock-summary">

                    <div class="admin-stock-box low">

                        <strong>
                            <?=e($data['low_stock'] ?? 0)?>
                        </strong>

                        <span>
                            Low-stock items
                        </span>

                    </div>

                    <div class="admin-stock-box critical">

                        <strong>
                            <?=e($data['critical_stock'] ?? 0)?>
                        </strong>

                        <span>
                            Critical items
                        </span>

                    </div>

                </div>

                <a
                    class="admin-stock-button"
                    href="index.php?page=admin&section=stock"
                >
                    📦 Open Stock Monitor
                </a>

            </div>

        </div>

    </div>

    <div class="admin-management-panel">

        <div class="admin-management-header">

            <div>

                <h2>
                    Quick Management
                </h2>

                <p>
                    Select a section to manage the hospital.
                </p>

            </div>

        </div>

        <div class="admin-management-grid">

            <a
                class="admin-management-card"
                href="index.php?page=admin&section=people"
            >

                <div class="admin-management-icon">
                    👥
                </div>

                <div class="admin-management-title">
                    People & Roles
                </div>

                <div class="admin-management-description">
                    Manage doctors, receptionists, staff and patients.
                </div>

                <span class="admin-management-link">
                    Open People →
                </span>

            </a>

            <a
                class="admin-management-card"
                href="index.php?page=admin&section=departments"
            >

                <div class="admin-management-icon">
                    🏥
                </div>

                <div class="admin-management-title">
                    Departments
                </div>

                <div class="admin-management-description">
                    Create and manage hospital departments.
                </div>

                <span class="admin-management-link">
                    Open Departments →
                </span>

            </a>

            <a
                class="admin-management-card"
                href="index.php?page=admin&section=costs"
            >

                <div class="admin-management-icon">
                    💰
                </div>

                <div class="admin-management-title">
                    Costs & Billing
                </div>

                <div class="admin-management-description">
                    Manage patient billing, payments and hospital costs.
                </div>

                <span class="admin-management-link">
                    Open Billing →
                </span>

            </a>

            <a
                class="admin-management-card"
                href="index.php?page=admin&section=resources"
            >

                <div class="admin-management-icon">
                    🩺
                </div>

                <div class="admin-management-title">
                    Equipment
                </div>

                <div class="admin-management-description">
                    Manage medical equipment and hospital resources.
                </div>

                <span class="admin-management-link">
                    Open Equipment →
                </span>

            </a>

            <a
                class="admin-management-card"
                href="index.php?page=admin&section=stock"
            >

                <div class="admin-management-icon">
                    📦
                </div>

                <div class="admin-management-title">
                    Smart Stock
                </div>

                <div class="admin-management-description">
                    Monitor medicines, supplies and stock levels.
                </div>

                <span class="admin-management-link">
                    Open Inventory →
                </span>

            </a>

            <a
                class="admin-management-card"
                href="index.php?page=admin&section=settings"
            >

                <div class="admin-management-icon">
                    ⚙️
                </div>

                <div class="admin-management-title">
                    Settings
                </div>

                <div class="admin-management-description">
                    Manage hospital information and system settings.
                </div>

                <span class="admin-management-link">
                    Open Settings →
                </span>

            </a>

        </div>

    </div>

</div>