<?php 

if (isset($_POST['submit'])) {

    $u_id = $_POST['u_id'];
    $email = $_POST['email'];
    $pref = $_POST['pref'];
    $pwd = $_POST['pwd'];

    include "../classes/dbh-classes.php";
    include "../classes/detailChange-classes.php";
    include "../classes/detailChange-classes_contr.php";

    $update = new detailChangeContr($u_id, $email, $pref, $pwd);
    $update->updateAccount();
    
    header("location:../account.php?error=none");
    exit;
}

?>