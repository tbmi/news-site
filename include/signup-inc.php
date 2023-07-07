<?php

if(isset($_POST['submit'])) {
	$u_id = $_POST['u_id'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$rptpassword = $_POST['rptpassword'];
	$preference = $_POST['preference'];

	include '../classes/dbh-classes.php';
	include '../classes/signup-classes.php';
	include '../classes/signup-classes_contr.php';
	$signup = new SignupContr($u_id, $email, $password, $rptpassword, $preference);

	$signup->signupUser();

	header('Location: ../index.php?error=none');
	exit();
}
