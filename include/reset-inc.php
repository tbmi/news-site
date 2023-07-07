<?php 

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRpt = $_POST['passwordRpt'];

    include "../classes/dbh-classes.php";
    include "../classes/reset-classes.php";
    include "../classes/reset-classes_contr.php";

    $reset = new passwordResetContr($email, $password, $passwordRpt);

    $reset->changePassword();
    header("location: ../forgotPasswordChange.php?error=none");
}

?>