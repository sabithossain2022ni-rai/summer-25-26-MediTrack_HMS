<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>
    Create Account &mdash; <?= e(APP_NAME) ?>
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
        min-height: 650px;
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

    .side-note {
        margin-top: 28px !important;
        margin-bottom: 0 !important;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.25);
        font-size: 13px !important;
        opacity: 0.9;
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
        margin-bottom: 18px;
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
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin-top: 10px;
        margin-bottom: 25px;
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
        min-height: 62px;
        padding: 8px;
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
        margin: -12px 0 22px;
        font-size: 13px;
        color: #7a8496;
        text-align: center;
    }

    .registration-form {
        display: none;
    }

    .registration-form.active {
        display: block;
    }

    .registration-title {
        margin: 0 0 18px;
        padding-bottom: 12px;
        border-bottom: 1px solid #edf0f5;
        color: #172033;
        font-size: 18px;
        font-weight: 700;
        text-align: left;
    }

    .role-info {
        margin-bottom: 18px;
        padding: 11px 13px;
        border-radius: 8px;
        background: #f5f8fc;
        color: #697386;
        font-size: 13px;
        line-height: 1.5;
        text-align: left;
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

        .side-note {
            display: block !important;
            border-top: none;
            padding-top: 0;
            margin-top: 10px !important;
        }

        .auth-form-wrap {
            padding: 35px 25px;
        }
    }

    @media (max-width: 520px) {

        .role-options {
            grid-template-columns: 1fr;
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
        Join MEDITrack
    </h1>

    <p>
        Create your account and access the
        MEDITrack hospital management system
        according to your role.
    </p>

    <ul class="feature-list">

        <li>
            &#10003;
            Patient &mdash; appointments,
            symptoms and follow-ups
        </li>

        <li>
            &#10003;
            Doctor &mdash; patients,
            prescriptions and risks
        </li>

        <li>
            &#10003;
            Receptionist &mdash; appointments,
            patients and emergencies
        </li>

        <li>
            &#10003;
            One account for your selected role
        </li>

    </ul>

    <p class="side-note">
        Administrator accounts are not created here.
        The MEDITrack administrator uses the
        default administrator account.
    </p>

</div>


<div class="auth-form-wrap">

    <div class="auth-card">

        <h2>
            Create Account
        </h2>

        <p class="muted">
            Select your role to continue
        </p>


        <?php if (!empty($message)): ?>

            <div class="alert alert-<?= e($message_type ?? 'error') ?>">
                <?= e($message) ?>
            </div>

        <?php endif; ?>


        <?php if (!empty($error)): ?>

            <div class="alert alert-error">
                <?= e($error) ?>
            </div>

        <?php endif; ?>


        <div class="field">

            <label>
                Select your role
            </label>

            <div class="role-options">

                <div class="role-option">

                    <input
                        type="radio"
                        id="register_patient"
                        name="register_role"
                        value="patient"
                        onchange="showRegistrationForm('patient')"
                    >

                    <label for="register_patient">
                        Patient
                    </label>

                </div>


                <div class="role-option">

                    <input
                        type="radio"
                        id="register_doctor"
                        name="register_role"
                        value="doctor"
                        onchange="showRegistrationForm('doctor')"
                    >

                    <label for="register_doctor">
                        Doctor
                    </label>

                </div>


                <div class="role-option">

                    <input
                        type="radio"
                        id="register_receptionist"
                        name="register_role"
                        value="receptionist"
                        onchange="showRegistrationForm('receptionist')"
                    >

                    <label for="register_receptionist">
                        Receptionist
                    </label>

                </div>

            </div>

            <p class="role-description">
                Administrator registration is disabled.
            </p>

        </div>


        <form
            method="POST"
            action="index.php?page=register"
            class="form registration-form"
            id="patient-form"
            novalidate
            onsubmit="return validateForm(this);"
        >

            <input
                type="hidden"
                name="role"
                value="patient"
            >

            <?php if (function_exists('csrf_token')): ?>

                <input
                    type="hidden"
                    name="csrf_token"
                    value="<?= e(csrf_token()) ?>"
                >

            <?php endif; ?>


            <h3 class="registration-title">
                Patient Registration
            </h3>

            <div class="role-info">
                Create a patient account to manage
                appointments, symptoms, prescriptions
                and follow-ups.
            </div>


            <div class="field">

                <label for="patient_name">
                    Full Name
                </label>

                <input
                    type="text"
                    id="patient_name"
                    name="name"
                    data-label="Full Name"
                    data-min="2"
                    placeholder="Enter your full name"
                    required
                    autocomplete="name"
                >

            </div>


            <div class="field">

                <label for="patient_email">
                    Email
                </label>

                <input
                    type="email"
                    id="patient_email"
                    name="email"
                    data-label="Email"
                    placeholder="Enter your email address"
                    required
                    autocomplete="email"
                >

            </div>


            <div class="field">

                <label for="patient_password">
                    Password
                </label>

                <input
                    type="password"
                    id="patient_password"
                    name="password"
                    data-label="Password"
                    data-min="6"
                    placeholder="At least 6 characters"
                    required
                    minlength="6"
                    autocomplete="new-password"
                >

            </div>


            <div class="field">

                <label for="patient_confirm_password">
                    Confirm Password
                </label>

                <input
                    type="password"
                    id="patient_confirm_password"
                    name="confirm_password"
                    data-label="Confirm Password"
                    data-match="patient_password"
                    placeholder="Enter your password again"
                    required
                    minlength="6"
                    autocomplete="new-password"
                >

            </div>


            <button
                type="submit"
                class="btn btn-primary btn-block"
            >
                Create Patient Account
            </button>

        </form>


        <form
            method="POST"
            action="index.php?page=register"
            class="form registration-form"
            id="doctor-form"
            novalidate
            onsubmit="return validateForm(this);"
        >

            <input
                type="hidden"
                name="role"
                value="doctor"
            >

            <?php if (function_exists('csrf_token')): ?>

                <input
                    type="hidden"
                    name="csrf_token"
                    value="<?= e(csrf_token()) ?>"
                >

            <?php endif; ?>


            <h3 class="registration-title">
                Doctor Registration
            </h3>

            <div class="role-info">
                Create a doctor account to access
                patients, prescriptions, risks,
                follow-ups and appointments.
            </div>


            <div class="field">

                <label for="doctor_name">
                    Full Name
                </label>

                <input
                    type="text"
                    id="doctor_name"
                    name="name"
                    data-label="Full Name"
                    data-min="2"
                    placeholder="Enter doctor's full name"
                    required
                    autocomplete="name"
                >

            </div>


            <div class="field">

                <label for="doctor_email">
                    Email
                </label>

                <input
                    type="email"
                    id="doctor_email"
                    name="email"
                    data-label="Email"
                    placeholder="Enter doctor's email"
                    required
                    autocomplete="email"
                >

            </div>


            <div class="field">

                <label for="doctor_phone">
                    Contact Number
                </label>

                <input
                    type="tel"
                    id="doctor_phone"
                    name="contact"
                    data-label="Contact Number"
                    placeholder="Enter contact number"
                    required
                    autocomplete="tel"
                >

            </div>


            <div class="field">

                <label for="doctor_specialization">
                    Specialization
                </label>

                <input
                    type="text"
                    id="doctor_specialization"
                    name="specialization"
                    data-label="Specialization"
                    placeholder="Example: Cardiology"
                    required
                >

            </div>


            <div class="field">

                <label for="doctor_password">
                    Password
                </label>

                <input
                    type="password"
                    id="doctor_password"
                    name="password"
                    data-label="Password"
                    data-min="6"
                    placeholder="At least 6 characters"
                    required
                    minlength="6"
                    autocomplete="new-password"
                >

            </div>


            <div class="field">

                <label for="doctor_confirm_password">
                    Confirm Password
                </label>

                <input
                    type="password"
                    id="doctor_confirm_password"
                    name="confirm_password"
                    data-label="Confirm Password"
                    data-match="doctor_password"
                    placeholder="Enter your password again"
                    required
                    minlength="6"
                    autocomplete="new-password"
                >

            </div>


            <button
                type="submit"
                class="btn btn-primary btn-block"
            >
                Create Doctor Account
            </button>

        </form>


        <form
            method="POST"
            action="index.php?page=register"
            class="form registration-form"
            id="receptionist-form"
            novalidate
            onsubmit="return validateForm(this);"
        >

            <input
                type="hidden"
                name="role"
                value="receptionist"
            >

            <?php if (function_exists('csrf_token')): ?>

                <input
                    type="hidden"
                    name="csrf_token"
                    value="<?= e(csrf_token()) ?>"
                >

            <?php endif; ?>


            <h3 class="registration-title">
                Receptionist Registration
            </h3>

            <div class="role-info">
                Create a receptionist account to manage
                patients, appointments, doctor slots
                and emergency registrations.
            </div>


            <div class="field">

                <label for="receptionist_name">
                    Full Name
                </label>

                <input
                    type="text"
                    id="receptionist_name"
                    name="name"
                    data-label="Full Name"
                    data-min="2"
                    placeholder="Enter receptionist's full name"
                    required
                    autocomplete="name"
                >

            </div>


            <div class="field">

                <label for="receptionist_email">
                    Email
                </label>

                <input
                    type="email"
                    id="receptionist_email"
                    name="email"
                    data-label="Email"
                    placeholder="Enter receptionist's email"
                    required
                    autocomplete="email"
                >

            </div>


            <div class="field">

                <label for="receptionist_phone">
                    Contact Number
                </label>

                <input
                    type="tel"
                    id="receptionist_phone"
                    name="contact"
                    data-label="Contact Number"
                    placeholder="Enter contact number"
                    required
                    autocomplete="tel"
                >

            </div>


            <div class="field">

                <label for="receptionist_password">
                    Password
                </label>

                <input
                    type="password"
                    id="receptionist_password"
                    name="password"
                    data-label="Password"
                    data-min="6"
                    placeholder="At least 6 characters"
                    required
                    minlength="6"
                    autocomplete="new-password"
                >

            </div>


            <div class="field">

                <label for="receptionist_confirm_password">
                    Confirm Password
                </label>

                <input
                    type="password"
                    id="receptionist_confirm_password"
                    name="confirm_password"
                    data-label="Confirm Password"
                    data-match="receptionist_password"
                    placeholder="Enter your password again"
                    required
                    minlength="6"
                    autocomplete="new-password"
                >

            </div>


            <button
                type="submit"
                class="btn btn-primary btn-block"
            >
                Create Receptionist Account
            </button>

        </form>


        <p class="auth-foot">

            Already have an account?

            <a href="index.php?page=login">
                Sign in
            </a>

        </p>


        <p class="hint">
            <strong>Administrator:</strong>
            Admin accounts cannot be created from this page.
            Use the default administrator credentials to sign in.
        </p>

    </div>

</div>

</div>

<script>

function showRegistrationForm(role) {

    const forms = document.querySelectorAll(
        '.registration-form'
    );

    forms.forEach(function(form) {

        form.classList.remove('active');

        form.querySelectorAll(
            'input, select, textarea'
        ).forEach(function(input) {

            if (
                input.type !== 'hidden' &&
                input.name !== 'csrf_token' &&
                input.name !== 'role'
            ) {
                input.disabled = true;
            }

        });

    });


    const selectedForm = document.getElementById(
        role + '-form'
    );

    if (!selectedForm) {
        return;
    }


    selectedForm.classList.add('active');


    selectedForm.querySelectorAll(
        'input, select, textarea'
    ).forEach(function(input) {

        if (
            input.name !== 'csrf_token' &&
            input.name !== 'role'
        ) {
            input.disabled = false;
        }

    });


    const firstInput = selectedForm.querySelector(
        'input:not([type="hidden"]), select, textarea'
    );

    if (firstInput) {
        setTimeout(function() {
            firstInput.focus();
        }, 50);
    }

}


document.addEventListener(
    'DOMContentLoaded',
    function() {

        const checkedRole =
            document.querySelector(
                'input[name="register_role"]:checked'
            );

        if (checkedRole) {
            showRegistrationForm(
                checkedRole.value
            );
        }

    }
);

</script>

<script src="assets/js/app.js"></script>

</body>
</html>
