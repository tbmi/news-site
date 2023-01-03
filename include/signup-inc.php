<?php

if(isset($_POST["submit"]))
{
	$uid = $_POST["uid"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$rptpassword = $_POST["rptpassword"];

	include "../classes/dbh-classes.php";
	include "../classes/signup-classes.php";
	include "../classes/signup-classes_contr.php";
	$signup = new SignupContr($uid, $email, $password, $rptpassword);

	$signup->signupUser();

	header("location: ../index.html?error=none");
}