<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <title>TWI - Technology</title>
    <?php include "include/head.php" ?>
</head>

<body>
    <?php include_once "include/navbar.php" ?>
    <div class="news__article">

    <?php
      // Define article data
      $articleTitle = "Lorem Ipsum Dolor Sit Amet";
      $articleAuthor = "John Doe";
      $articleDate = "February 28, 2023";
      $articleContent = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus ac mauris vestibulum blandit vel in leo. Nam ac ipsum vitae neque bibendum commodo. Ut luctus tortor vel ullamcorper vulputate. Fusce vitae nulla a velit dapibus tincidunt. Integer et mi lacus. Sed quis lectus eu nisl commodo hendrerit. Sed id risus pharetra, pretium quam ac, facilisis nulla. Vestibulum nec libero at justo commodo ornare.</p><p>Donec quis tincidunt velit. Suspendisse vel dolor eget purus convallis varius vel at nulla. Aenean imperdiet, risus vel finibus dapibus, ex metus blandit ante, eu ultricies mi quam eget ex. Nullam eget nunc at orci consequat ultricies. Sed luctus nisl dolor, ac blandit ex malesuada sed. Etiam vehicula sem at lacus fermentum, eu rutrum mi porttitor. Nam vel quam et lectus tristique fermentum.</p>";
    ?>

    <h1 class="article-title"><?php echo $articleTitle; ?></h1>
    <p class="article-meta">By <?php echo $articleAuthor; ?> | <?php echo $articleDate; ?></p>
    <div class="article-content"><?php echo $articleContent; ?></div>

  </div>
</body>

</html>