<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <?php include "include/head.php" ?>
    <title>TWI - Login</title>
</head>

<body>
    <?php include_once "include/navbar.php" ?>
    <form action="include/login-inc.php" method="post">
        <div class="form__box">
            <div class="form__inputs">
                <label for="u_id"><strong>Username</strong></label>
                <input id="u_id" type="text" name="u_id" placeholder="Enter Username" required >

                <label for="password"><strong>Password</strong></label>
                <input id="password" type="password" name="password" placeholder="Enter Password" required >

                <label>
                    <input type="checkbox" name="remember" id="remember" > Remember me
                </label>

                <button class="submit--button" name="submit">Log In</button>
                <ul class="sidetrack">
                    <li id="forgot" class="sidetrack--item"><a href="forgotForm.php">Forgot your password?</a></li>
                    <li id="signup" class="sidetrack--item"><a href="signup.php">Don't have an account?</a></li>
                </ul>
            </div>
        </div>
    </form>
</body>
</html>
