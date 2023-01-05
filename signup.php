<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml"
      lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width, intial-scale=1.0" />
    <title>News Site</title>
    <link rel="stylesheet" href="StyleSheet.css" />
    <script src="https://kit.fontawesome.com/c99ab2e3d5.js" crossorigin="anonymous"></script>
    <script src="include/jquery-3.6.3.js"></script>
    <script>
        
        

    </script>
</head>
<body>
    <nav class="navbar">
        <div class="navbar__container">
            <a href="index.php" id="navbar__logo">The Weekly Inspect</a>
            <div id="mobile-menu" class="navbar__toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a id="home-page" href="index.php" class="navbar__links">Home</a>
                </li>
                <li class="navbar__item">
                    <a id="about-page" href="index.php#about" class="navbar__links">About</a>
                </li>
                <li class="navbar__item">
                    <a id="tech-page" href="technology.php" class="navbar__links">Technology</a>
                </li>
                <li class="navbar__item">
                    <a id="econ-page" href="economics.php" class="navbar__links">Economics</a>
                </li>
                <li class="navbar__item">
                    <a id="politic-page" href="politics.php" class="navbar__links">Politics</a>
                </li>
                <li class="navbar__button">
                    <a id="login" href="login.php" class="button">Log In</a>
                </li>
            </ul>
        </div>
    </nav>
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

                
                <input class="submit--button" type="submit">

                <ul class="sidetrack">
                    <li id="login" class="sidetrack--item"><a href="login.html">Already have an account?</a></li>
                </ul>
            </div>
        </div>
    </form>
    <script src="file.js"></script>
</body>
</html>