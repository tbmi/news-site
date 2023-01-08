<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <title>TWI - Signup</title>
    <?php include "include/head.php" ?>
    <script>

    </script>
</head>

<body>
    <?php include_once "include/navbar.php" ?>
    <form action="include/signup-inc.php" method="POST">
        <div class="login__popout">
            <div class="login__inputs">
                <label for="uid"><strong>Username <span class="onBlur">*this is required</span></strong>
                    <input type="text" name="uid" placeholder="Enter Username" required />
                </label>

                <label for="email"><strong>Email <span class="onBlur">*this is required</span></strong>
                    <input type="email" name="email" placeholder="Enter Email" required />
                </label>

                <label for="password"><strong>Password <span class="onBlur">*this is required</span></strong>
                    <input type="password" name="password" placeholder="Enter Password" required />
                </label>

                <label for="password--rpt"><strong>Repeat Password <span class="onBlur">*this is required</span></strong>
                    <input type="password" name="rptpassword" placeholder="Enter Password Again" required />
                </label>


                <input class="submit--button" type="submit" name="submit">

                <ul class="sidetrack">
                    <li id="login" class="sidetrack--item"><a href="login.php">Already have an account?</a></li>
                </ul>
            </div>
        </div>
    </form>
</body>

</html>