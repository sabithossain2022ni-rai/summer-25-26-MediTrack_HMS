<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>MEDITrack - Dashboard</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>


<body class="dashboard-page">


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="sidebar">

    <div class="sidebar-brand">
        MEDI<span>Track</span>
    </div>


    <nav>

        <a
            class="nav-link active"
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
            class="nav-link"
            href="index.php?page=appointments"
        >
            Appointment Booking
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



<!-- =====================================================
     MAIN CONTENT
===================================================== -->

<main class="main-content">


<!-- =====================================================
     HEADER
===================================================== -->

<header class="dashboard-header">

    <div>

        <h1>

            <?= htmlspecialchars($greeting) ?>,
            <?= htmlspecialchars($patient["name"]) ?>

        </h1>


        <p>

            Patient ID
            P<?= str_pad(
                (string)$patient_id,
                4,
                "0",
                STR_PAD_LEFT
            ) ?>

            · Last visit
            <?= htmlspecialchars($last_visit_display) ?>

        </p>

    </div>

</header>



<!-- =====================================================
     STAT CARDS
===================================================== -->

<section class="stats-grid">


    <!-- Logged Symptoms -->

    <div class="stat-card">

        <span>
            Logged symptoms
        </span>

        <strong>
            <?= $symptom_count ?>
        </strong>

    </div>



    <!-- Next Follow-up -->

    <div class="stat-card">

        <span>
            Next follow-up
        </span>

        <strong>
            <?= htmlspecialchars($followup_display) ?>
        </strong>

    </div>



    <!-- Upcoming Appointment -->

    <div class="stat-card">

        <span>
            Upcoming appointment
        </span>

        <strong>
            <?= htmlspecialchars($appointment_display) ?>
        </strong>

    </div>



    <!-- Active Prescriptions -->

    <div class="stat-card">

        <span>
            Active prescriptions
        </span>

        <strong>
            0
        </strong>

        <small>
            Prescription module not added yet
        </small>

    </div>

</section>



<!-- =====================================================
     DASHBOARD TABS
===================================================== -->

<div class="dashboard-tabs">


    <a
        href="#"
        class="tab active"
        data-section="symptoms-section"
    >
        Symptom tracking
    </a>


    <a
        href="#"
        class="tab"
        data-section="followup-section"
    >
        Follow-up reminders
    </a>


    <a
        href="#"
        class="tab"
        data-section="appointment-section"
    >
        Appointment
    </a>

</div>



<!-- =====================================================
     SYMPTOM SECTION
===================================================== -->

<section
    id="symptoms-section"
    class="dashboard-tab-section"
>


    <section class="panel">

        <div class="panel-header">

            <div>

                <h2>
                    Recent symptoms
                </h2>

                <p>
                    Your latest recorded symptoms
                </p>

            </div>


            <a
                class="small-btn"
                href="index.php?page=symptoms"
            >
                + Add symptom
            </a>

        </div>



        <div class="table-wrap">

            <table>

                <thead>

                    <tr>

                        <th>
                            Symptom
                        </th>

                        <th>
                            Severity
                        </th>

                        <th>
                            Duration
                        </th>

                        <th>
                            Frequency
                        </th>

                        <th>
                            Date
                        </th>

                        <th>
                            Note
                        </th>

                    </tr>

                </thead>


                <tbody>


                <?php if (count($symptoms_result) > 0): ?>


                    <?php foreach ($symptoms_result as $row): ?>


                        <tr>


                            <td>

                                <?= htmlspecialchars(
                                    $row["symptom"]
                                ) ?>

                            </td>


                            <td>

                                <div class="severity">

                                    <span class="severity-bars">

                                        <?php
                                        for (
                                            $i = 1;
                                            $i <= 10;
                                            $i++
                                        ):
                                        ?>

                                            <i
                                                class="<?=
                                                    $i <= (int)$row["severity"]
                                                        ? "filled"
                                                        : ""
                                                ?>"
                                            ></i>

                                        <?php endfor; ?>

                                    </span>


                                    <?= (int)$row["severity"] ?>/10

                                </div>

                            </td>


                            <td>

                                <?= htmlspecialchars(
                                    $row["duration"]
                                ) ?>

                            </td>


                            <td>

                                <?= htmlspecialchars(
                                    $row["frequency"]
                                ) ?>

                            </td>


                            <td>

                                <?= date(
                                    "d M",
                                    strtotime(
                                        $row["symptom_date"]
                                    )
                                ) ?>

                            </td>


                            <td>

                                <?= $row["notes"]
                                    ? htmlspecialchars(
                                        $row["notes"]
                                      )
                                    : "—"
                                ?>

                            </td>


                        </tr>


                    <?php endforeach; ?>


                <?php else: ?>


                    <tr>

                        <td
                            colspan="6"
                            class="empty-cell"
                        >

                            No symptoms have been recorded yet.

                        </td>

                    </tr>


                <?php endif; ?>


                </tbody>

            </table>

        </div>



        <p class="disclaimer">

            This log helps your doctor spot patterns —
            it isn't a diagnosis.

        </p>


    </section>

</section>



<!-- =====================================================
     FOLLOW-UP PREVIEW
===================================================== -->

<section
    id="followup-section"
    class="dashboard-tab-section"
    style="display:none;"
>


    <section class="panel">


        <div class="panel-header">

            <div>

                <h2>
                    Follow-up Reminder
                </h2>

                <p>
                    Your next revisit recommended by your doctor
                </p>

            </div>

        </div>



        <?php if ($next_followup): ?>


            <div class="appointment-summary">


                <div class="appointment-info">

                    <span class="appointment-label">
                        Doctor
                    </span>

                    <strong>

                        <?= htmlspecialchars(
                            $next_followup["doctor_name"]
                        ) ?>

                    </strong>

                    <span class="appointment-specialization">

                        <?= htmlspecialchars(
                            $next_followup["specialization"]
                        ) ?>

                    </span>

                </div>



                <div class="appointment-date">

                    <span class="appointment-label">
                        Revisit date
                    </span>

                    <strong>

                        <?= date(
                            "d M Y",
                            strtotime(
                                $next_followup["followup_date"]
                            )
                        ) ?>

                    </strong>

                </div>



                <div class="appointment-time">

                    <span class="appointment-label">
                        Purpose
                    </span>

                    <strong>

                        <?= htmlspecialchars(
                            $next_followup["purpose"]
                        ) ?>

                    </strong>

                </div>


            </div>


        <?php else: ?>


            <div class="empty-state">

                <p>
                    No follow-up reminder has been added yet.
                </p>

            </div>


        <?php endif; ?>


    </section>

</section>



<!-- =====================================================
     APPOINTMENT PREVIEW
===================================================== -->

<section
    id="appointment-section"
    class="dashboard-tab-section"
    style="display:none;"
>


    <section class="panel">


        <div class="panel-header">

            <div>

                <h2>
                    Appointment
                </h2>

                <p>
                    Your upcoming appointment
                </p>

            </div>


            <!-- ONLY ONE BOOK BUTTON -->

            <a
                class="small-btn"
                href="index.php?page=appointments"
            >
                Book Appointment
            </a>

        </div>



        <?php if ($upcoming_appointment): ?>


            <div class="appointment-summary">


                <div class="appointment-info">

                    <span class="appointment-label">
                        Doctor
                    </span>

                    <strong>

                        <?= htmlspecialchars(
                            $upcoming_appointment["doctor_name"]
                        ) ?>

                    </strong>

                    <span class="appointment-specialization">

                        <?= htmlspecialchars(
                            $upcoming_appointment["specialization"]
                        ) ?>

                    </span>

                </div>



                <div class="appointment-date">

                    <span class="appointment-label">
                        Date
                    </span>

                    <strong>

                        <?= date(
                            "d M Y",
                            strtotime(
                                $upcoming_appointment["appointment_date"]
                            )
                        ) ?>

                    </strong>

                </div>



                <div class="appointment-time">

                    <span class="appointment-label">
                        Time
                    </span>

                    <strong>

                        <?= date(
                            "h:i A",
                            strtotime(
                                $upcoming_appointment["appointment_time"]
                            )
                        ) ?>

                    </strong>

                </div>


            </div>


        <?php else: ?>


            <div class="empty-state">

                <p>
                    You don't have an upcoming appointment.
                </p>

            </div>


        <?php endif; ?>


    </section>

</section>



</main>

<!-- =====================================================
     TAB SWITCHING
===================================================== -->

<script>

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const tabs =
            document.querySelectorAll(
                ".dashboard-tabs .tab"
            );

        const sections =
            document.querySelectorAll(
                ".dashboard-tab-section"
            );


        tabs.forEach(function (tab) {

            tab.addEventListener(
                "click",
                function (event) {

                    event.preventDefault();


                    const target =
                        this.getAttribute(
                            "data-section"
                        );


                    /*
                     * Remove active
                     * from all tabs
                     */

                    tabs.forEach(function (item) {

                        item.classList.remove(
                            "active"
                        );

                    });


                    /*
                     * Hide all sections
                     */

                    sections.forEach(function (section) {

                        section.style.display =
                            "none";

                    });


                    /*
                     * Activate clicked tab
                     */

                    this.classList.add(
                        "active"
                    );


                    /*
                     * Show selected section
                     */

                    const selectedSection =
                        document.getElementById(
                            target
                        );


                    if (selectedSection) {

                        selectedSection.style.display =
                            "block";

                    }

                }
            );

        });

    }
);

</script>



<script src="assets/js/app.js"></script>

</body>

</html>