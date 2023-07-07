<?php

if (isset($_POST["submit"])) {
	$u_id = $_POST["u_id"];
	$password = $_POST["password"];
	if (isset($_GET["remember"])) {
		$remember = $_POST["remember"];
	}
	else {
		$remember = false;
	}
	include "../classes/dbh-classes.php";
	include "../classes/login-classes.php";
	include "../classes/login-classes_contr.php";
	$login = new LoginContr($u_id, $password, $remember);

	$login->loginUser();

	header("location: ../index.php?error=none");
}
