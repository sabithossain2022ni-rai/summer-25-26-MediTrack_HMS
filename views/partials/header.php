<header class="main-navbar">

    <div class="navbar-container">

        <a href="index.php?page=doctor" class="brand">
            <div class="brand-icon">
                <span>✚</span>
            </div>

            <div class="brand-text">
                <strong>MEDITrack</strong>
                <small>Healthcare Management</small>
            </div>
        </a>

        <div class="navbar-right">

            <div class="portal-badge">
                <span class="portal-dot"></span>
                Doctor Portal
            </div>

            <div class="user-profile">

                <div class="user-avatar">
                    <?php
                    $userName = $_SESSION['name'] ?? 'Sabit Hossain';
                    $nameParts = explode(' ', trim($userName));

                    $initials = '';

                    foreach ($nameParts as $part) {
                        if (!empty($part)) {
                            $initials .= strtoupper(substr($part, 0, 1));
                        }

                        if (strlen($initials) >= 2) {
                            break;
                        }
                    }

                    echo htmlspecialchars($initials ?: 'SH');
                    ?>
                </div>

                <div class="user-info">
                    <strong>
                        <?= htmlspecialchars($_SESSION['name'] ?? 'Sabit Hossain') ?>
                    </strong>

                    <span>Doctor</span>
                </div>

            </div>

            <div class="navbar-divider"></div>

            <a href="index.php?page=logout" class="logout-button">
                <span class="logout-icon">↪</span>
                <span>Sign out</span>
            </a>

        </div>

    </div>

</header>

<style>

.main-navbar {
    width: 100%;
    height: 76px;
    background: #ffffff;
    border-bottom: 1px solid #e5e7eb;
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
}

.navbar-container {
    width: 100%;
    height: 100%;
    padding: 0 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.brand {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
    color: #111827;
}

.brand-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: linear-gradient(
        135deg,
        #0f766e,
        #14b8a6
    );
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 23px;
    font-weight: 800;
    box-shadow: 0 5px 14px rgba(20, 184, 166, 0.25);
}

.brand-text {
    display: flex;
    flex-direction: column;
    line-height: 1.1;
}

.brand-text strong {
    font-size: 20px;
    font-weight: 750;
    color: #0f766e;
    letter-spacing: -0.3px;
}

.brand-text small {
    margin-top: 4px;
    font-size: 10px;
    color: #9ca3af;
    font-weight: 500;
    letter-spacing: 0.3px;
}

.navbar-right {
    display: flex;
    align-items: center;
    gap: 20px;
}

.portal-badge {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 13px;
    background: #ecfdf5;
    border: 1px solid #d1fae5;
    border-radius: 20px;
    color: #047857;
    font-size: 12px;
    font-weight: 650;
}

.portal-dot {
    width: 7px;
    height: 7px;
    background: #10b981;
    border-radius: 50%;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
}

.user-profile {
    display: flex;
    align-items: center;
    gap: 11px;
}

.user-avatar {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: linear-gradient(
        135deg,
        #0f766e,
        #14b8a6
    );
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 750;
    box-shadow: 0 4px 10px rgba(15, 118, 110, 0.20);
}

.user-info {
    display: flex;
    flex-direction: column;
    line-height: 1.2;
}

.user-info strong {
    font-size: 14px;
    color: #1f2937;
    font-weight: 650;
}

.user-info span {
    margin-top: 4px;
    font-size: 11px;
    color: #9ca3af;
}

.navbar-divider {
    width: 1px;
    height: 32px;
    background: #e5e7eb;
}

.logout-button {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 15px;
    border-radius: 10px;
    color: #6b7280;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.2s ease;
}

.logout-button:hover {
    color: #dc2626;
    background: #fef2f2;
    border-color: #fecaca;
}

.logout-icon {
    font-size: 17px;
    line-height: 1;
}

@media (max-width: 850px) {

    .navbar-container {
        padding: 0 20px;
    }

    .portal-badge {
        display: none;
    }

    .navbar-right {
        gap: 14px;
    }

}

@media (max-width: 650px) {

    .main-navbar {
        height: 68px;
    }

    .navbar-container {
        padding: 0 15px;
    }

    .brand-icon {
        width: 39px;
        height: 39px;
        font-size: 20px;
    }

    .brand-text strong {
        font-size: 17px;
    }

    .brand-text small {
        display: none;
    }

    .user-info {
        display: none;
    }

    .user-avatar {
        width: 39px;
        height: 39px;
    }

    .navbar-divider {
        display: none;
    }

    .logout-button {
        padding: 9px 11px;
    }

    .logout-button span:last-child {
        display: none;
    }

}

</style>