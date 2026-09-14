
<?php
$pageTitle = 'Receptionist Dashboard';
require __DIR__ . '/../../partials/header.php';
?>

<?php
$currentHour = (int)date('G');

if ($currentHour < 12) {
    $greeting = 'Good morning';
} elseif ($currentHour < 18) {
    $greeting = 'Good afternoon';
} else {
    $greeting = 'Good evening';
}
?>

<style>
.receptionist-page {
    max-width: 1350px;
    margin: 0 auto;
    padding: 30px;
}

.receptionist-topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 24px;
}

.receptionist-topbar h1 {
    margin: 0;
    color: #111827;
    font-size: 28px;
    font-weight: 800;
}

.receptionist-topbar p {
    margin: 6px 0 0;
    color: #6b7280;
    font-size: 13px;
}

.receptionist-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    padding: 32px;
    margin-bottom: 24px;
    background: linear-gradient(135deg, #0f766e, #0d9488);
    border-radius: 20px;
    color: #ffffff;
    box-shadow: 0 12px 30px rgba(15, 118, 110, 0.20);
}

.receptionist-header-content {
    max-width: 800px;
}

.receptionist-badge {
    display: inline-flex;
    align-items: center;
    padding: 6px 11px;
    margin-bottom: 12px;
    border: 1px solid rgba(255, 255, 255, 0.25);
    border-radius: 999px;
    background: rgba(255, 255, 255, 0.14);
    color: rgba(255, 255, 255, 0.90);
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.receptionist-header h2 {
    margin: 0;
    font-size: 30px;
    line-height: 1.25;
    font-weight: 800;
}

.receptionist-header p {
    max-width: 700px;
    margin: 10px 0 0;
    color: rgba(255, 255, 255, 0.88);
    font-size: 14px;
    line-height: 1.6;
}

.receptionist-header-icon {
    width: 105px;
    height: 105px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border: 1px solid rgba(255, 255, 255, 0.22);
    border-radius: 25px;
    background: rgba(255, 255, 255, 0.14);
    font-size: 52px;
}

.receptionist-stats {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 18px;
    margin-bottom: 24px;
}

.receptionist-stat {
    position: relative;
    padding: 22px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    box-shadow: 0 7px 22px rgba(15, 23, 42, 0.05);
    overflow: hidden;
}

.receptionist-stat::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: #0f766e;
}

.receptionist-stat.warning::after {
    background: #f59e0b;
}

.receptionist-stat-label {
    display: block;
    margin-bottom: 9px;
    color: #6b7280;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.receptionist-stat-value {
    display: block;
    color: #111827;
    font-size: 31px;
    line-height: 1;
    font-weight: 800;
}

.receptionist-stat-description {
    display: block;
    margin-top: 8px;
    color: #9ca3af;
    font-size: 11px;
}

.receptionist-stat-icon {
    position: absolute;
    top: 18px;
    right: 18px;
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    background: #f0fdfa;
    color: #0f766e;
    font-size: 18px;
}

.receptionist-stat.warning .receptionist-stat-icon {
    background: #fffbeb;
    color: #d97706;
}

.receptionist-section-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 14px;
}

.receptionist-section-heading h3 {
    margin: 0;
    color: #111827;
    font-size: 18px;
    font-weight: 800;
}

.receptionist-section-heading p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 12px;
}

.receptionist-quick-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
}

.receptionist-quick-card {
    display: flex;
    align-items: center;
    gap: 16px;
    min-height: 110px;
    padding: 20px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    color: inherit;
    text-decoration: none;
    box-shadow: 0 7px 22px rgba(15, 23, 42, 0.05);
    transition: all 0.2s ease;
}

.receptionist-quick-card:hover {
    transform: translateY(-3px);
    border-color: #99f6e4;
    box-shadow: 0 12px 28px rgba(15, 118, 110, 0.12);
}

.receptionist-quick-card.danger:hover {
    border-color: #fecaca;
    box-shadow: 0 12px 28px rgba(220, 38, 38, 0.10);
}

.receptionist-quick-icon {
    width: 52px;
    height: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 14px;
    background: #ccfbf1;
    color: #0f766e;
    font-size: 25px;
}

.receptionist-quick-card.danger .receptionist-quick-icon {
    background: #fee2e2;
}

.receptionist-quick-content {
    min-width: 0;
    flex: 1;
}

.receptionist-quick-content h4 {
    margin: 0;
    color: #111827;
    font-size: 15px;
    font-weight: 800;
}

.receptionist-quick-content p {
    margin: 5px 0 0;
    color: #6b7280;
    font-size: 12px;
    line-height: 1.5;
}

.receptionist-quick-arrow {
    color: #0f766e;
    font-size: 22px;
    font-weight: 700;
    transition: transform 0.2s ease;
}

.receptionist-quick-card:hover .receptionist-quick-arrow {
    transform: translateX(4px);
}

.receptionist-quick-card.danger .receptionist-quick-arrow {
    color: #dc2626;
}

.receptionist-module-page {
    width: 100%;
}

@media (max-width: 1050px) {
    .receptionist-stats {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 800px) {
    .receptionist-page {
        padding: 20px;
    }

    .receptionist-header {
        align-items: flex-start;
        padding: 26px;
    }

    .receptionist-header-icon {
        width: 80px;
        height: 80px;
        font-size: 40px;
    }

    .receptionist-quick-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 550px) {
    .receptionist-page {
        padding: 15px;
    }

    .receptionist-topbar h1 {
        font-size: 23px;
    }

    .receptionist-header {
        padding: 22px;
        border-radius: 16px;
    }

    .receptionist-header-icon {
        display: none;
    }

    .receptionist-header h2 {
        font-size: 24px;
    }

    .receptionist-header p {
        font-size: 13px;
    }

    .receptionist-stats {
        grid-template-columns: 1fr;
        gap: 14px;
    }

    .receptionist-stat {
        padding: 20px;
    }

    .receptionist-quick-card {
        padding: 18px;
    }
}
</style>

<div class="receptionist-page">

    <?php if($section==='dashboard'): ?>

        <div class="receptionist-topbar">
            <div>
                <h1>
                    <?=e($greeting)?>, <?=e($_SESSION['full_name'] ?? 'Receptionist')?>
                </h1>

                <p>
                    Welcome back to your MEDITrack front desk workspace.
                </p>
            </div>
        </div>

        <section class="receptionist-header">

            <div class="receptionist-header-content">

                <span class="receptionist-badge">
                    Front Desk Workspace
                </span>

                <h2>
                    Keep every patient journey organized.
                </h2>

                <p>
                    Use the quick actions below to register patients,
                    control doctor availability, handle emergency cases
                    and manage appointments.
                </p>

            </div>

            <div class="receptionist-header-icon">
                🏥
            </div>

        </section>

        <section
            class="receptionist-stats"
            id="liveStats"
            data-stats-url="index.php?page=ajax&action=stats"
        >

            <div class="receptionist-stat">

                <div class="receptionist-stat-icon">
                    👤
                </div>

                <span class="receptionist-stat-label">
                    Active Patients
                </span>

                <strong
                    class="receptionist-stat-value"
                    id="stat-patients"
                >
                    <?=e($stats['patients'])?>
                </strong>

                <small class="receptionist-stat-description">
                    Patient records
                </small>

            </div>

            <div class="receptionist-stat">

                <div class="receptionist-stat-icon">
                    🕐
                </div>

                <span class="receptionist-stat-label">
                    Available Slots
                </span>

                <strong
                    class="receptionist-stat-value"
                    id="stat-slots"
                >
                    <?=e($stats['slots'])?>
                </strong>

                <small class="receptionist-stat-description">
                    Ready to book
                </small>

            </div>

            <div class="receptionist-stat warning">

                <div class="receptionist-stat-icon">
                    🚨
                </div>

                <span class="receptionist-stat-label">
                    Emergency Waiting
                </span>

                <strong
                    class="receptionist-stat-value"
                    id="stat-emergencies"
                >
                    <?=e($stats['emergencies'])?>
                </strong>

                <small class="receptionist-stat-description">
                    Needs attention
                </small>

            </div>

            <div class="receptionist-stat">

                <div class="receptionist-stat-icon">
                    📅
                </div>

                <span class="receptionist-stat-label">
                    Total Appointments
                </span>

                <strong
                    class="receptionist-stat-value"
                    id="stat-appointments"
                >
                    <?=e($stats['appointments'])?>
                </strong>

                <small class="receptionist-stat-description">
                    All statuses
                </small>

            </div>

        </section>

        <div class="receptionist-section-heading">

            <div>
                <h3>Quick Actions</h3>

                <p>
                    Access the most frequently used receptionist functions.
                </p>
            </div>

        </div>

        <section class="receptionist-quick-grid">

            <a
                href="index.php?page=receptionist&section=patients"
                class="receptionist-quick-card"
            >

                <span class="receptionist-quick-icon">
                    👤
                </span>

                <div class="receptionist-quick-content">

                    <h4>
                        Manage Patients
                    </h4>

                    <p>
                        Create, search, update and deactivate patient records.
                    </p>

                </div>

                <span class="receptionist-quick-arrow">
                    →
                </span>

            </a>

            <a
                href="index.php?page=receptionist&section=slots"
                class="receptionist-quick-card"
            >

                <span class="receptionist-quick-icon">
                    🕐
                </span>

                <div class="receptionist-quick-content">

                    <h4>
                        Doctor Available Slots
                    </h4>

                    <p>
                        Add and control doctor appointment time slots.
                    </p>

                </div>

                <span class="receptionist-quick-arrow">
                    →
                </span>

            </a>

            <a
                href="index.php?page=receptionist&section=emergency"
                class="receptionist-quick-card danger"
            >

                <span class="receptionist-quick-icon">
                    🚨
                </span>

                <div class="receptionist-quick-content">

                    <h4>
                        Emergency Fast Registration
                    </h4>

                    <p>
                        Register an emergency patient with only essential details.
                    </p>

                </div>

                <span class="receptionist-quick-arrow">
                    →
                </span>

            </a>

            <a
                href="index.php?page=receptionist&section=appointments"
                class="receptionist-quick-card"
            >

                <span class="receptionist-quick-icon">
                    📅
                </span>

                <div class="receptionist-quick-content">

                    <h4>
                        Appointments
                    </h4>

                    <p>
                        Create, view, update status and delete appointments.
                    </p>

                </div>

                <span class="receptionist-quick-arrow">
                    →
                </span>

            </a>

        </section>

    <?php elseif($section==='patients'): ?>

        <div class="receptionist-module-page">
            <?php require __DIR__.'/patients.php'; ?>
        </div>

    <?php elseif($section==='slots'): ?>

        <div class="receptionist-module-page">
            <?php require __DIR__.'/slots.php'; ?>
        </div>

    <?php elseif($section==='emergency'): ?>

        <div class="receptionist-module-page">
            <?php require __DIR__.'/emergency.php'; ?>
        </div>

    <?php elseif($section==='appointments'): ?>

        <div class="receptionist-module-page">
            <?php require __DIR__.'/appointments.php'; ?>
        </div>

    <?php endif; ?>

</div>

<?php require __DIR__ . '/../../partials/footer.php'; ?>

