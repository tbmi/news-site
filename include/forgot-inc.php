<?php 

require 'vendor/autoload.php';

if (isset($_POST["submit"])) {
    $email = $_POST["email"];

    require "vendor/autoload.php";
    include "../classes/dbh-classes.php";
    include "../classes/forgot-classes.php";
    include "../classes/forgot-classes_contr.php";

    $reset = new passwordForgotContr($email);
    $reset->sendEmail();
    header("location:../forgotForm.php?error=sent");
}

?>