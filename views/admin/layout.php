<?php
$view = __DIR__ . '/' . $page . '/' . $page . '.php';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= e(APP_NAME) ?> Admin</title>
<link rel="stylesheet" href="assets/css/style.css">
<style>
.admin-shell {
    display: flex;
    width: 100%;
    min-height: 100vh;
    background: #f4f8fb;
}

.admin-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 245px;
    height: 100vh;
    background: #ffffff;
    border-right: 1px solid #dbe5ec;
    z-index: 1000;
    display: flex;
    flex-direction: column;
    overflow-y: auto;
    box-sizing: border-box;
}

.admin-brand {
    height: 98px;
    display: flex;
    align-items: center;
    padding: 0 30px;
    font-size: 17px;
    font-weight: 700;
    color: #0f766e;
    border-bottom: 1px solid #edf2f5;
    box-sizing: border-box;
}

.admin-brand span {
    color: #14b8a6;
}

.admin-role {
    padding: 24px 30px 16px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.2px;
    color: #64748b;
}

.admin-nav {
    padding: 0 16px;
}

.admin-nav a {
    display: flex;
    align-items: center;
    min-height: 47px;
    padding: 0 15px;
    margin: 4px 0;
    border-radius: 11px;
    color: #334155;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    box-sizing: border-box;
    transition: .2s ease;
}

.admin-nav a:hover {
    background: #ecfdf5;
    color: #0f766e;
}

.admin-nav a.active {
    background: #dff4f1;
    color: #0f766e;
    font-weight: 700;
}

.admin-sidebar-bottom {
    margin-top: auto;
    padding: 20px 26px 24px;
    border-top: 1px solid #edf2f5;
}

.admin-user-mini {
    font-size: 15px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 12px;
}

.admin-logout {
    color: #ef4444;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
}

.admin-logout:hover {
    text-decoration: underline;
}

.admin-main {
    width: calc(100% - 245px);
    min-width: 0;
    margin-left: 245px;
    min-height: 100vh;
    box-sizing: border-box;
    overflow-x: hidden;
}

.admin-topbar {
    height: 98px;
    background: #ffffff;
    border-bottom: 1px solid #dbe5ec;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 30px;
    box-sizing: border-box;
}

.admin-topbar-title {
    margin: 0;
    font-size: 20px;
    font-weight: 700;
    color: #0f172a;
}

.admin-topbar-subtitle {
    display: block;
    margin-top: 5px;
    font-size: 12px;
    color: #64748b;
}

.admin-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 60px;
    height: 30px;
    padding: 0 12px;
    border-radius: 20px;
    background: #ecfdf5;
    color: #0f766e;
    font-size: 11px;
    font-weight: 800;
}

.admin-alert {
    margin: 20px 30px 0;
}

.admin-content {
    width: 100%;
    max-width: none;
    min-width: 0;
    padding: 30px;
    box-sizing: border-box;
    overflow-x: hidden;
}

.admin-content > * {
    max-width: 100%;
    box-sizing: border-box;
}

.admin-content .table-wrap {
    max-width: 100%;
    overflow-x: auto;
}

@media (max-width: 900px) {
    .admin-sidebar {
        width: 210px;
    }

    .admin-main {
        width: calc(100% - 210px);
        margin-left: 210px;
    }

    .admin-brand {
        padding: 0 22px;
    }

    .admin-role {
        padding-left: 22px;
        padding-right: 22px;
    }

    .admin-content {
        padding: 22px;
    }

    .admin-topbar {
        padding: 0 22px;
    }
}

@media (max-width: 700px) {
    .admin-sidebar {
        position: relative;
        width: 100%;
        height: auto;
        min-height: auto;
    }

    .admin-main {
        width: 100%;
        margin-left: 0;
    }

    .admin-shell {
        display: block;
    }

    .admin-brand {
        height: 72px;
    }

    .admin-role {
        padding-top: 16px;
        padding-bottom: 10px;
    }

    .admin-nav {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 5px;
    }

    .admin-nav a {
        margin: 0;
    }

    .admin-sidebar-bottom {
        margin-top: 15px;
    }

    .admin-topbar {
        height: 78px;
        padding: 0 18px;
    }

    .admin-topbar-title {
        font-size: 17px;
    }

    .admin-topbar-subtitle {
        font-size: 10px;
    }

    .admin-content {
        padding: 18px;
    }

    .admin-alert {
        margin: 18px 18px 0;
    }
}

@media (max-width: 450px) {
    .admin-nav {
        grid-template-columns: 1fr;
    }

    .admin-badge {
        display: none;
    }
}
</style>
</head>

<body>
<div class="admin-shell">

<aside class="admin-sidebar">
    <div class="admin-brand">MEDI<span>Track</span></div>

    <div class="admin-role">ADMIN PANEL</div>

    <nav class="admin-nav">
        <a class="<?= $page === 'dashboard' ? 'active' : '' ?>" href="index.php?page=admin&section=dashboard">Dashboard</a>
        <a class="<?= $page === 'people' ? 'active' : '' ?>" href="index.php?page=admin&section=people">People & Roles</a>
        <a class="<?= $page === 'departments' ? 'active' : '' ?>" href="index.php?page=admin&section=departments">Departments</a>
        <a class="<?= $page === 'costs' ? 'active' : '' ?>" href="index.php?page=admin&section=costs">Costs & Billing</a>
        <a class="<?= $page === 'resources' ? 'active' : '' ?>" href="index.php?page=admin&section=resources">Equipment</a>
        <a class="<?= $page === 'stock' ? 'active' : '' ?>" href="index.php?page=admin&section=stock">Smart Stock</a>
        <a class="<?= $page === 'settings' ? 'active' : '' ?>" href="index.php?page=admin&section=settings">Settings</a>
    </nav>

    <div class="admin-sidebar-bottom">
        <div class="admin-user-mini"><?= e($_SESSION['user_name'] ?? 'Admin') ?></div>
        <a class="admin-logout" href="index.php?page=logout">Logout</a>
    </div>
</aside>

<main class="admin-main">

    <header class="admin-topbar">
        <div>
            <h1 class="admin-topbar-title"><?= ucfirst(str_replace('_', ' ', $page)) ?></h1>
            <span class="admin-topbar-subtitle">MEDITrack Hospital Management System</span>
        </div>

        <div class="admin-badge">ADMIN</div>
    </header>

    <?php if ($flash): ?>
        <div class="admin-alert">
            <div class="alert <?= e($flash['type']) ?>">
                <?= e($flash['message']) ?>
            </div>
        </div>
    <?php endif; ?>

    <section class="admin-content">
        <?php include $view; ?>
    </section>

</main>

</div>

<script src="assets/js/app.js"></script>
</body>
</html>