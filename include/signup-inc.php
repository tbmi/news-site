<?php

if(isset($_POST["submit"]))
{
	$uid = $_POST["uid"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$rptpassword = $_POST["rptpassword"];
	$remember = $_POST["remember"];

	include "../classes/dbh-classes.php";
	include "../classes/signup-classes.php";
	include "../classes/signup-classes_contr.php";
	$signup = new SignupContr($uid, $email, $password, $rptpassword, $remember);

	$signup->signupUser();

	header("location: ../index.html?error=none");
}