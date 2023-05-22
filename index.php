<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/icon.png" type="image/x-icon">

    <link rel="stylesheet" href="./css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Login | Brgy. Datu Esmael Patient Record Management System</title>
</head>

<body class="login">
    <div class="loader" id="loader">
        <svg width='150px' height='179px' version='1.1' xmlns='http://www.w3.org/2000/svg'>
            <path class='d-spinner d-spinner__four' d='M144.421372,121.923755 C143.963266,123.384111 143.471366,124.821563 142.945674,126.236112 C138.856723,137.238783 133.098899,146.60351 125.672029,154.330576 C118.245158,162.057643 109.358082,167.978838 99.0105324,172.094341 C89.2149248,175.990321 78.4098994,178.04219 66.5951642,178.25 L0,178.25 L144.421372,121.923755 L144.421372,121.923755 Z' />
            <path class='d-spinner d-spinner__three' d='M149.033408,92.6053108 C148.756405,103.232477 147.219069,113.005232 144.421372,121.923755 L0,178.25 L139.531816,44.0158418 C140.776016,46.5834381 141.913968,49.2553065 142.945674,52.0314515 C146.681818,62.0847774 148.711047,73.2598899 149.033408,85.5570717 L149.033408,92.6053108 L149.033408,92.6053108 Z' />
            <path class='d-spinner d-spinner__two' d='M80.3248924,1.15770478 C86.9155266,2.16812827 93.1440524,3.83996395 99.0105324,6.17322306 C109.358082,10.2887257 118.245158,16.2099212 125.672029,23.9369874 C131.224984,29.7143944 135.844889,36.4073068 139.531816,44.0158418 L0,178.25 L80.3248924,1.15770478 L80.3248924,1.15770478 Z' />
            <path class='d-spinner d-spinner__one' d='M32.2942065,0 L64.5884131,0 C70.0451992,0 75.290683,0.385899921 80.3248924,1.15770478 L0,178.25 L0,0 L32.2942065,0 L32.2942065,0 Z' />
        </svg>
    </div>

    <main>
        <div class="login__card">
            <form action="login.php" class="login__form" onsubmit="return validation()" method="POST">
                <h1 class="login__title">
                    Brgy. Datu Esmael Patient Record System
                </h1>
                <p class="login__desc">
                    Exclusive only for <b>Patients</b> and <b>Barangay Health Workers</b> of Brgy. Datu Esmael
                </p>

                <!-- Error Display -->
                <?php
                if (isset($_GET['error'])) { ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid',
                            text: '<?php echo $_GET['error']; ?>'
                            // confirmButton: '#034A23'
                        })
                    </script>
                <?php } ?>

                <?php
                if (isset($_GET['logout'])) { ?>
                    <script>
                        Swal.fire({
                            toast: true,
                            position: 'top-right',
                            icon: 'success',
                            iconColor: 'white',
                            title: 'Logout succesfully',
                            customClass: {
                                popup: 'logout'
                            },
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                        })
                    </script>
                <?php } ?>

                <?php
                if (isset($_GET['changed'])) { ?>
                    <script>
                        Swal.fire({
                            toast: true,
                            position: 'top-right',
                            icon: 'success',
                            iconColor: 'white',
                            title: 'Password changed successfully',
                            customClass: {
                                popup: 'toast'
                            },
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                        })
                    </script>
                <?php } ?>
                <!--Display ERROR-->

                <?php
                include_once "includes/functions.php";
                forgot_password();
                ?>
                <label for="contact-num">Username:</label>
                <input id='contact-num' class="login__contact" type="text" name="username">
                <label for="password">Password:</label>
                <div class="password">
                    <input type="password" class="password__bar__input" id='password' min="8" name="password" /><!--  
                        --><button type="button" class="password__bar__btn" onclick="passwordToggle('password' , 'password-show' , 'password-hide')">
                        <svg id='password-show' class="password-icon password__bar__icon password-show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                        </svg>
                        <svg id='password-hide' class="password-icon password__bar__icon password-hide password-icon--hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24M1 1l22 22" />
                        </svg>
                    </button>
                </div>

                <button class="login__btn btn-green" type="submit" id="btn" name="sign-in">
                    Sign in
                </button>
                <a href="#">
                    <p class="login__forgot" onclick="forgotPassword()">
                        Forgot Password?
                    </p>
                </a>
            </form>
        </div>
    </main>

    <script src="./js/app.js"></script>
    <script>
        var loader = document.getElementById("loader");
        var grid = document.getElementById("grid");

        window.addEventListener("load", () => {
            loader.style.display = "none";
            grid.style.overflow = "unset";
        });
    </script>
</body>

</html>