<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/main.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>

    <title>Brgy. Datu Esmael Patient Record Management System</title>
</head>
<body class="login">
    <main>
        <div class="login__card">
            <form action="login.php" class="login__form" onsubmit = "return validation()" method = "POST">
                <h1 class="login__title">
                    Welcome Back
                </h1>
                <p class="login__desc">
                    Exclusive only for Barangay Health Workers of Brgy. Datu Esmael
                </p>

                <!-- Error Display -->
                <?php 
                if (isset($_GET['error'])){ ?>           
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
                <!--Display ERROR-->

                <?php 
                    include_once "includes/functions.php";
                    forgot_password();
                ?>
                    <select name="roles" required>
                        <option value="Health Worker">Health Worker</option>
                        <option value="Patient">Patient</option>
                    </select>
                <br><br>
                <label for="contact-num">Email or Contact Number:</label>
                <input id='contact-num' class="login__contact" type="text" name="username">
                <label for="password">Password:</label>
                <div class="password">
                    <input type="password"  class="password__bar__input" id='password' min="8" name="password"/><!--  
                        --><button type="button" class="password__bar__btn"  onclick="passwordToggle('password' , 'password-show' , 'password-hide')">
                            <svg id='password-show' class="password-icon password__bar__icon password-show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/>
                            </svg>
                            <svg id='password-hide' class="password-icon password__bar__icon password-hide password-icon--hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24M1 1l22 22"/>
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
</body>

</html>