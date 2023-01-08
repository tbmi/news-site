<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <?php include "include/head.php" ?>
    <title>News Site</title>
</head>

<body>
    <?php include_once "include/navbar.php" ?>
    <div id="home" class="hero">
        <div class="hero__container">
            <h1 class="hero__heading">Top Three <span>Every Week</span></h1>
            <p class="hero__description"><strong>in Tech, Economics, and Politics</strong></p>
            <button class="main__btn"><a href="signup.php">Sign Up</a></button>
        </div>
    </div>

    <div id="about" class="main">
        <div class="main__container">
            <div class="main__img--container">
                <img src="images/placeholder.png" alt="Group Image" />
            </div>
            <div class="main__content">
                <h1>What do we do?</h1>
                <h2>We search for the most important news of the week</h2>
                <p class="desktop">Check them out in the bar at the top</p>
                <p class="mobile">Check them out in the burger menu at the top</p>
            </div>
        </div>
    </div>
    <script src="file.js"></script>
</body>

</html>