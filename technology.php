<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <title>TWI - Technology</title>
    <?php include "include/head.php" ?>
</head>

<body>
    <?php include_once "include/navbar.php" ?>
    <div class="article__page">
        <h2 id="top" class="section">
            Technology
        </h2>
        <h1 id="articleTitle" class="article--title">
            Example Title
        </h1>
        <img src="images/3g.jpg" alt="Article Thumbnail" class="article--thumbnail">
        <p class="article">
            <?php echo file_get_contents("articles/articleTech.txt")?>
        </p>
    </div>
</body>

</html>