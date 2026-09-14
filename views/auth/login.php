<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>
    Sign in &mdash; <?= e(APP_NAME) ?>
</title>

<link
    rel="stylesheet"
    href="assets/css/style.css"
>

<style>

    .auth-body {
        min-height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f4f7fb;
        font-family: Arial, sans-serif;
    }

    .auth-shell {
        width: 100%;
        max-width: 1050px;
        min-height: 620px;
        margin: 30px auto;
        display: flex;
        align-items: stretch;
        justify-content: center;
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.10);
    }

    .auth-side {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 55px;
        text-align: center;
        background: linear-gradient(
            135deg,
            #1769aa,
            #0d47a1
        );
        color: #ffffff;
    }

    .logo-big {
        font-size: 58px;
        margin-bottom: 10px;
    }

    .auth-side h1 {
        margin: 0 0 12px;
        font-size: 42px;
    }

    .auth-side > p {
        max-width: 430px;
        margin: 0 auto 30px;
        line-height: 1.7;
        font-size: 16px;
    }

    .feature-list {
        margin: 0 auto;
        padding: 0;
        list-style: none;
        text-align: left;
        max-width: 430px;
    }

    .feature-list li {
        margin: 15px 0;
        line-height: 1.5;
        font-size: 15px;
    }

    .auth-form-wrap {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 45px;
        background: #ffffff;
    }

    .auth-card {
        width: 100%;
        max-width: 430px;
        text-align: center;
    }

    .auth-card h2 {
        margin: 0 0 8px;
        font-size: 30px;
        color: #172033;
    }

    .muted {
        margin: 0 0 28px;
        color: #697386;
    }

    .form {
        width: 100%;
        text-align: left;
    }

    .field {
        margin-bottom: 20px;
    }

    .field label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #253047;
    }

    .field input,
    .field select {
        width: 100%;
        box-sizing: border-box;
        padding: 13px 14px;
        border: 1px solid #d8dee9;
        border-radius: 9px;
        background: #ffffff;
        color: #172033;
        font-size: 15px;
        outline: none;
        transition:
            border-color 0.2s,
            box-shadow 0.2s;
    }

    .field input:focus,
    .field select:focus {
        border-color: #1769aa;
        box-shadow:
            0 0 0 3px rgba(23, 105, 170, 0.12);
    }

    .role-options {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        margin-top: 10px;
    }

    .role-option {
        position: relative;
    }

    .role-option input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .role-option label {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 58px;
        padding: 8px 10px;
        box-sizing: border-box;
        border: 1px solid #d8dee9;
        border-radius: 10px;
        background: #ffffff;
        color: #344054;
        font-weight: 600;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .role-option label:hover {
        border-color: #1769aa;
    }

    .role-option input:checked + label {
        border-color: #1769aa;
        background: #eaf4ff;
        color: #0d47a1;
        box-shadow:
            0 0 0 2px rgba(23, 105, 170, 0.10);
    }

    .role-description {
        margin: 8px 0 0;
        font-size: 13px;
        color: #7a8496;
        text-align: center;
    }

    .btn-block {
        width: 100%;
        margin-top: 5px;
    }

    .auth-foot {
        margin-top: 22px;
        color: #697386;
    }

    .auth-foot a {
        color: #1769aa;
        font-weight: 600;
        text-decoration: none;
    }

    .auth-foot a:hover {
        text-decoration: underline;
    }

    .hint {
        margin-top: 18px;
        padding: 12px;
        border-radius: 8px;
        background: #f5f8fc;
        color: #697386;
        font-size: 13px;
        line-height: 1.5;
    }

    .alert {
        margin-bottom: 20px;
        padding: 12px 14px;
        border-radius: 8px;
        text-align: left;
    }

    .alert-error,
    .alert.error {
        background: #fff1f1;
        color: #b42318;
        border: 1px solid #f5c2c0;
    }

    .alert-success,
    .alert.success {
        background: #ecfdf3;
        color: #027a48;
        border: 1px solid #abefc6;
    }

    @media (max-width: 850px) {

        .auth-shell {
            max-width: 520px;
            min-height: auto;
            flex-direction: column;
            margin: 20px;
        }

        .auth-side {
            padding: 35px 25px;
        }

        .auth-side h1 {
            font-size: 34px;
        }

        .feature-list {
            display: none;
        }

        .auth-form-wrap {
            padding: 35px 25px;
        }
    }

    @media (max-width: 480px) {

        .auth-shell {
            margin: 10px;
            border-radius: 14px;
        }

        .auth-side {
            padding: 30px 20px;
        }

        .auth-form-wrap {
            padding: 30px 20px;
        }

        .role-options {
            grid-template-columns: 1fr;
        }
    }

</style>

</head>

<body class="auth-body">

<div class="auth-shell">

<div class="auth-side">

    <div class="logo-big">
        &#127973;
    </div>

    <h1>
        MEDITrack
    </h1>

    <p>
        Smart Hospital Patient, Appointment
        &amp; Resource Management System.
    </p>

    <ul class="feature-list">

        <li>
            &#10003;
            Admin &mdash; hospital operations,
            staff, equipment and inventory
        </li>

        <li>
            &#10003;
            Doctor &mdash; patients, risks,
            prescriptions and follow-ups
        </li>

        <li>
            &#10003;
            Receptionist &mdash; patients,
            appointments and emergencies
        </li>

        <li>
            &#10003;
            Patient &mdash; symptoms,
            appointments and follow-ups
        </li>

    </ul>

</div>


<div class="auth-form-wrap">

    <div class="auth-card">

        <h2>
            Welcome Back
        </h2>

        <p class="muted">
            Select your role and sign in
            to continue.
        </p>


        <?php if (!empty($error)): ?>

            <div class="alert alert-error">
                <?= e($error) ?>
            </div>

        <?php endif; ?>


        <?php

        $flash = get_flash();

        if ($flash):
        ?>

            <div class="alert alert-<?= e($flash['type']) ?>">
                <?= e($flash['message']) ?>
            </div>

        <?php endif; ?>


        <form
            method="POST"
            action="index.php?page=login"
            class="form"
            novalidate
            onsubmit="return validateForm(this);"
        >


            <input
                type="hidden"
                name="csrf_token"
                value="<?= e(csrf_token()) ?>"
            >


            <div class="field">

                <label>
                    Select your role
                </label>

                <div class="role-options">


                    <div class="role-option">

                        <input
                            type="radio"
                            id="role_patient"
                            name="selected_role"
                            value="patient"
                            required
                        >

                        <label for="role_patient">
                            Patient
                        </label>

                    </div>


                    <div class="role-option">

                        <input
                            type="radio"
                            id="role_doctor"
                            name="selected_role"
                            value="doctor"
                            required
                        >

                        <label for="role_doctor">
                            Doctor
                        </label>

                    </div>


                    <div class="role-option">

                        <input
                            type="radio"
                            id="role_receptionist"
                            name="selected_role"
                            value="receptionist"
                            required
                        >

                        <label for="role_receptionist">
                            Receptionist
                        </label>

                    </div>


                    <div class="role-option">

                        <input
                            type="radio"
                            id="role_admin"
                            name="selected_role"
                            value="admin"
                            required
                        >

                        <label for="role_admin">
                            Admin
                        </label>

                    </div>


                </div>

                <p class="role-description">
                    Choose the portal you want to access.
                </p>

            </div>


            <div class="field">

                <label for="login">
                    Email or Username
                </label>

                <input
                    type="text"
                    id="login"
                    name="login"
                    data-label="Email or Username"
                    value="<?= e($login ?? '') ?>"
                    placeholder="Enter your email or username"
                    required
                    autocomplete="username"
                >

            </div>


            <div class="field">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    data-label="Password"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password"
                >

            </div>


            <button
                type="submit"
                class="btn btn-primary btn-block"
            >
                Sign In
            </button>


        </form>


        <p class="auth-foot">

            Don't have an account?

            <a href="index.php?page=register">
                Create Account
            </a>

        </p>


        <p class="hint">

            <strong>Account information:</strong>

            Patients, Doctors and Receptionists can
            create their own accounts.

            The Administrator uses the default
            Admin email and password and does not
            need to create an account.

        </p>


    </div>

</div>

</div>

<script src="assets/js/app.js"></script>

</body>

</html>
