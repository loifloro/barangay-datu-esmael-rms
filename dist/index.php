<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/main.css">
    <title>Document</title>
</head>
<body class="login">
    <main>
        <div class="login__card">
            <form action="login.php" class="login__form" onsubmit = "return validation()" method = "POST">
                <h1 class="login__title">
                    Welcome Back
                </h1>
                <p class="login__desc">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>

                <!-- Error Display -->
                <?php if (isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?> 
                <!--Display ERROR-->
                
                <label for="contact-num">Contact Number:</label>
                <input id='contact-num' class="login__contact" type="number" minlength="11" name="username">
                <label for="password">Password:</label>
                <!-- put pattern here -->
                <input id='password' class="login__password" type="password" min="8" name="password">

                <button class="login__btn btn-green" type =  "submit" id = "btn">
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