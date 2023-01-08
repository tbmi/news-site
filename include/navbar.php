<?php session_start();?>
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
            <?php
            if (isset($_SESSION['userid'])) { ?>
                <li class="navbar__item">
                    <a id="userid" href="" class="navbar__links"><?php echo $_SESSION['userid']; ?></a>
                </li>
            <?php } else { ?>
                <li class="navbar__button">
                    <a id="login" href="login.php" class="button">Log In</a>
                </li>
            <?php
            } ?>
        </ul>
    </div>
</nav>
<?php
?>