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
                <?php if (isset($_GET['error'])){ ?>           
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'Invalid',
                        text: '<?php echo $_GET['error']; ?>'
                        // confirmButton: '#034A23'
                        })
                    </script>
                <?php } ?> 
                <!--Display ERROR-->
                
                <label for="contact-num">Contact Number:</label>
                <input id='contact-num' class="login__contact" type="number" minlength="11" name="username">
                <label for="password">Password:</label>
                <div class="password">
                    <input type="password"  class="password__bar__input" id='password' min="8" name="password"/><!--  
                        --><button type="submit" class="password__bar__btn">
                            <svg class="password-icon password__bar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/></svg>
                        </button>
                </div>

                <button class="login__btn btn-green" type="submit" id="btn">
                    Sign in
                </button>
                <a href="">
                    <p class="login__forgot">
                        Forgot Password?
                    </p>
                </a>
            </form>
        </div>
    </main>
    
</body>
</html>