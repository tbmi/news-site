<!DOCTYPE html>
<html>
    <head>
        <title>TWI - Reset Password</title>
        <?php include_once "include/head.php";?>
    </head>
    <body>
        <?php include_once "include/navbar.php"?>
        <form action="include/forgot-inc.php" method="post">
            <div id="ForgotForm" class="form__box">
                <div class="form__inputs">
                    <label for="email"><strong>Email</strong></label>
                    <input id="email" type="email" name="email" placeholder="Enter Email" required >

                    <button id="forgotFormBtn" class="submit--button" name="submit">Send Reset Link</button>
                </div>
            </div>
        </form>
    </body>
</html>