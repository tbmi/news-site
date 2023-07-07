<?php session_start();?>
<script>
    $(function () {
        $("#mobile-menu").click(function () {
            $("#mobile-menu").toggleClass("is-active");
            $(".navbar__menu").toggleClass("active")
        });
    });
 </script>
<nav class="navbar">
    <div class="navbar__container">
        <label class="navbar__logo">
            <img src="images/Logo.png" alt="Logo" class="navbar__icon">
            <a href="index.php" id="navbar__title">The Weekly Insight</a>
        </label>
        <div id="mobile-menu" class="navbar__toggle">
            <div class="bars">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
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
                    <a id="userid" href="account.php" class="navbar__links"><?php echo $_SESSION['userid']; ?></a>
                </li>
                <li class="navbar__button">
                    <a id="logout" href="include/logout-inc.php" class="button">Log Out</a>
                </li>
                <?php if (isset($_SESSION['userauth'])) {?>
                    <li class="navbar__button">
                    <a id="upload" href="include/" class="button">Upload</a>
                    </li>
            <?php }} else { ?>
                <li class="navbar__button">
                    <a id="login" href="login.php" class="button">Log In</a>
                </li>
            <?php
            } ?>
        </ul>
    </div>
</nav>