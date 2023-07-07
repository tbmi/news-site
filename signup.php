<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <title>TWI - Signup</title>
    <?php include "include/head.php" ?>
    <script>
        $(".sector-select option").click();

    </script>
</head>

<body>
    <?php include_once "include/navbar.php" ?>
    <form action="include/signup-inc.php" method="POST">
        <div class="form__box">
            <div class="form__inputs">
                <label for="u_id"><strong>Username</strong></label>
                <input id="u_id" type="text" name="u_id" placeholder="Enter Username" required >

                <label for="email"><strong>Email</strong></label>
                <input id="email" type="email" name="email" placeholder="Enter Email" required >

                <label for="password"><strong>Password</strong></label>
                <input id="password" type="password" name="password" placeholder="Enter Password" required >

                <label for="rptpassword"><strong>Repeat Password</strong></label>
                <input id="rptpassword" type="password" name="rptpassword" placeholder="Enter Password" required >

                <label for="preference"><strong>Preferred Sector</strong></label>
                <select class="custom-select" id="preference" name="preference">
                    <option value="None">None</option>
                    <option value="Technology">Technology</option>
                    <option value="Economics">Economics</option>
                    <option value="Politics">Politics</option>
                </select>
                
                <button class="submit--button" name="submit">Sign Up</button>
                <ul class="sidetrack">
                    <li id="forgot" class="sidetrack--item"><a href="forgotForm.php">Forgot your password?</a></li>
                    <li id="login" class="sidetrack--item"><a href="login.php">Already have an account?</a></li>
                </ul>
            </div>
        </div>
    </form>
</body>

</html>