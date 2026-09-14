<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>MEDITrack - Appointments</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body class="dashboard-page">

<aside class="sidebar">

    <div class="sidebar-brand">
        MEDI<span>Track</span>
    </div>

    <nav>

        <a
            class="nav-link"
            href="index.php?page=patient"
        >
            Dashboard
        </a>

        <a
            class="nav-link"
            href="index.php?page=profile"
        >
            Profile
        </a>

        <a
            class="nav-link"
            href="index.php?page=symptoms"
        >
            Symptom tracking
        </a>

        <a
            class="nav-link"
            href="index.php?page=followups"
        >
            Follow-up reminders
        </a>

        <a
            class="nav-link active"
            href="index.php?page=appointments"
        >
            Appointments
        </a>

    </nav>

    <div class="sidebar-bottom">

        <a
            href="index.php?page=logout"
            class="signout-link"
        >
            Sign out
        </a>

    </div>

</aside>


<main class="main-content">

    <header class="dashboard-header">

        <div>

            <h1>
                Appointments
            </h1>

            <p>
                Book an available doctor slot and manage
                your appointments.
            </p>

        </div>

    </header>


    <?php if ($message): ?>

        <div class="message <?= htmlspecialchars($message_type) ?>">

            <?= htmlspecialchars($message) ?>

        </div>

    <?php endif; ?>


    <section class="panel">

        <div class="panel-header">

            <div>

                <h2>
                    Available appointment slots
                </h2>

                <p>
                    Select a slot to book an appointment.
                </p>

            </div>

        </div>


        <div class="slot-grid">

            <?php if (count($available_slots)): ?>

                <?php foreach ($available_slots as $slot): ?>

                    <div class="slot-card">

                        <div>

                            <strong>
                                <?= htmlspecialchars(
                                    $slot["doctor_name"]
                                ) ?>
                            </strong>

                            <span>
                                <?= htmlspecialchars(
                                    $slot["specialization"]
                                ) ?>
                            </span>

                        </div>


                        <p>
                            <?= date(
                                "d M Y",
                                strtotime($slot["slot_date"])
                            ) ?>
                        </p>


                        <p>
                            <?= date(
                                "H:i",
                                strtotime($slot["slot_time"])
                            ) ?>
                        </p>


                        <form method="POST" action="index.php?page=appointments">

                            <input type="hidden" name="csrf_token" value="<?= esc(csrf_token()) ?>">

                            <input
                                type="hidden"
                                name="action"
                                value="book"
                            >

                            <input
                                type="hidden"
                                name="slot_id"
                                value="<?= (int)$slot["id"] ?>"
                            >

                            <button
                                class="small-btn"
                                type="submit"
                            >
                                Book slot
                            </button>

                        </form>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <p class="empty-state">

                    No available appointment slots yet.
                    A doctor/receptionist needs to add slots first.

                </p>

            <?php endif; ?>

        </div>

    </section>


    <section class="panel">

        <div class="panel-header">

            <div>

                <h2>
                    My appointments
                </h2>

                <p>
                    Your appointment history
                </p>

            </div>

            <div class="search-box">
                <label for="appointment-search">Search appointments</label>
                <div class="search-controls">
                    <input id="appointment-search" type="search" placeholder="Search by doctor, specialization or status" autocomplete="off">
                    <button type="button" class="search-btn" id="appointment-search-button">Search</button>
                </div>
            </div>

        </div>


        <div class="table-wrap">

            <table>

                <thead>

                <tr>

                    <th>Doctor</th>
                    <th>Specialization</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

                </thead>

                <tbody id="appointment-table-body" data-empty-message="No matching appointments found.">

                <?php if (count($appointments)): ?>

                    <?php foreach ($appointments as $row): ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars(
                                    $row["doctor_name"]
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $row["specialization"]
                                ) ?>
                            </td>

                            <td>
                                <?= date(
                                    "d M Y",
                                    strtotime(
                                        $row["appointment_date"]
                                    )
                                ) ?>
                            </td>

                            <td>
                                <?= date(
                                    "H:i",
                                    strtotime(
                                        $row["appointment_time"]
                                    )
                                ) ?>
                            </td>

                            <td>

                                <span
                                    class="status <?= strtolower(
                                        $row["status"]
                                    ) ?>"
                                >
                                    <?= htmlspecialchars(
                                        $row["status"]
                                    ) ?>
                                </span>

                            </td>

                            <td>

                                <?php if (strtolower($row["status"]) === "booked"): ?>

                                    <form
                                        method="POST"
                                        action="index.php?page=appointments"
                                        class="inline-form delete-form ajax-cancel-form"
                                        data-appointment-id="<?= (int)$row["id"] ?>"
                                    >

                                        <input type="hidden" name="csrf_token" value="<?= esc(csrf_token()) ?>">

                                        <input
                                            type="hidden"
                                            name="action"
                                            value="cancel"
                                        >

                                        <input
                                            type="hidden"
                                            name="appointment_id"
                                            value="<?= (int)$row["id"] ?>"
                                        >

                                        <button
                                            class="link-danger"
                                            type="submit"
                                        >
                                            Cancel
                                        </button>

                                    </form>

                                <?php else: ?>

                                    —

                                <?php endif; ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td
                            colspan="6"
                            class="empty-cell"
                        >
                            You have no appointments yet.
                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </section>

</main>


<script
    src="assets/js/app.js"
></script>

</body>
</html>