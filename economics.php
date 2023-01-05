<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width, intial-scale=1.0" />
    <title>News Site</title>
    <link rel="stylesheet" href="StyleSheet.css" />
    <script src="https://kit.fontawesome.com/c99ab2e3d5.js" crossorigin="anonymous"></script>
    <script src="include/jquery-3.6.3.js"></script>
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
    <script src="file.js"></script>
</body>
</html>