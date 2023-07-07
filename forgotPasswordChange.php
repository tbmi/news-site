<!DOCTYPE html>
<html>
    <head>
        <title>TWI - Reset Password</title>
        <?php include_once "include/head.php";?>
    </head>
    <body>
        <?php include_once "include/navbar.php"?>
        <form action="include/forgot-inc.php" method="post">
        <div class="form__box">
            <div class="form__inputs">
                <label for="email"><strong>Email </strong></label>
                    <input id="email" type="email" name="email" placeholder="Enter Email" required >

                <label for="password"><strong>New Password</strong></label>
                    <input id="password" type="password" name="password" placeholder="Enter Password" required >
                <label for="passwordRpt"><strong>Retype Password</strong></label>
                    <input id="passwordRpt" type="password" name="passwordRpt" placeholder="Enter Password" required >

                <button id="ChangePwd" class="submit--button" name="submit">Change Password</button>
                <ul class="sidetrack">
                    <li id="forgot" class="sidetrack--item"><a href="forgot.php">Forgot your password?</a></li>
                    <li id="signup" class="sidetrack--item"><a href="signup.php">Don't have an account?</a></li>
                </ul>
            </div>
        </div>
    </form>
    </body>
</html>