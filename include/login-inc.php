<?php

if (isset($_POST["submit"])) {
	$uid = $_POST["uid"];
	$password = $_POST["password"];
	$remember = $_POST["remember"];

	include "../classes/dbh-classes.php";
	include "../classes/login-classes.php";
	include "../classes/login-classes_contr.php";
	$login = new LoginContr($uid, $password, $remember);

	$login->loginUser();

	header("location: ../index.php?error=none");
}
