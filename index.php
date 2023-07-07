<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <?php include "include/head.php" ?>
    <title>News Site</title>
    <script>
        $(document).ready(function() {
            var carouselInner = $('.carousel-inner');
            var images = carouselInner.find('img');
            var imageCount = images.length;
            var imageWidth = images.width();
            var currentIndex = 0;

            function slideToImage(index) {
                var position = -index * imageWidth;
                carouselInner.animate({left: position}, 600);
                currentIndex = index;
            }

            $('.carousel-control').click(function(event) {
                event.preventDefault();
                var direction = $(this).hasClass('prev') ? -1 : 1;
                var newIndex = (currentIndex + direction + imageCount) % imageCount;
                slideToImage(newIndex);
            });
        });
    </script>
</head>

<body>
    <?php include_once "include/navbar.php" ?>
    <div id="home" class="hero">
        <div class="hero__container">
            <?php if (isset($_SESSION['userid'])) { 
                if (isset($_SESSION['userPref'])) {
                    if ($_SESSION['userPref'] == "Technology") {?>
                        <div class="carousel">
                            <div class="carousel-inner">
                                <img src="image1.jpg" alt="Tech Image 1">
                                <img src="image2.jpg" alt="Tech Image 2">
                                <img src="image3.jpg" alt="Tech Image 3">
                            </div>
                            <a class="carousel-control prev" href="#"><i class="fas fa-chevron-left"></i></a>
                            <a class="carousel-control next" href="#"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    <?php }
                    elseif ($_SESSION['userPref'] == "Economics") { ?>
                        <div class="carousel">
                            <div class="carousel-inner">
                                <img src="image1.jpg" alt="Econ Image 1">
                                <img src="image2.jpg" alt="Econ Image 2">
                                <img src="image3.jpg" alt="Econ Image 3">
                            </div>
                            <a class="carousel-control prev" href="#"><i class="fas fa-chevron-left"></i></a>
                            <a class="carousel-control next" href="#"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    <?php }
                    elseif ($_SESSION['userPref'] == "Politics") {?>
                        <div class="carousel">
                            <div class="carousel-inner">
                                <img src="image1.jpg" alt="Politics Image 1">
                                <img src="image2.jpg" alt="Politics Image 2">
                                <img src="image3.jpg" alt="Politics Image 3">
                            </div>
                            <a class="carousel-control prev" href="#"><i class="fas fa-chevron-left"></i></a>
                            <a class="carousel-control next" href="#"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    <?php }
                    elseif ($_SESSION['userPref'] == "None") { ?>
                        <div class="carousel">
                            <div class="carousel-inner">
                                <img src="image1.jpg" alt="None Image 1">
                                <img src="image2.jpg" alt="None Image 2">
                                <img src="image3.jpg" alt="None Image 3">
                            </div>
                            <a class="carousel-control prev" href="#"><i class="fas fa-chevron-left"></i></a>
                            <a class="carousel-control next" href="#"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    <?php }}} else { ?>
                <h1 class="hero__heading">Top Three <span>Every Week</span></h1>
                <p class="hero__description"><strong>in Tech, Economics, and Politics</strong></p>
                <button class="main__btn"><a href="signup.php">Sign Up</a></button>
            <?php } ?>
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
</body>

</html>