<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <title>TWI - Login</title>
    <?php include "include/head.php" ?>
</head>

<body>
    <?php include_once "include/navbar.php" ?>
    <form action="include/login-inc.php" method="post">
        <div class="login__popout">
            <div class="login__inputs">

                <label for="uid"><strong>Username <span>*this is required</span></strong></label>
                <input type="text" name="uid" placeholder="Enter Username" required />

                <label for="password"><strong>Password <span>*this is required</span></strong></label>
                <input type="password" name="password" placeholder="Enter Password" required />

                <label>
                    <input type="checkbox" name="remember" id="remember" /> Remember me
                </label>

                <button class="submit" name="submit">Log In</button>
                <ul class="sidetrack">
                    <li id="forgot" class="sidetrack--item"><a href="#forgot">Forgot your password?</a></li>
                    <li id="signup" class="sidetrack--item"><a href="signup.php">Don't have an account?</a></li>
                </ul>
            </div>
        </div>

    </form>
</body>

</html>