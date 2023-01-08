<?php

class Signup extends Dbh
{
	protected function checkUser($uid, $email)
	{
		try {
			$dbh = new Dbh();
			$conn = $dbh->connect();
			$tsql = "SELECT users_id FROM users WHERE users_id = ? OR users_email = ?";
			$status = sqlsrv_query($conn, $tsql);
			$statusRows = sqlsrv_num_rows($status);

			if (!$status) {
				$status == null;
				header("location: ../signup.php?error=statusfailed");
				exit();
			}

			$resultCheck = "";
			if ($statusRows > 0) {
				$resultCheck = false;
			} else {
				$resultCheck = true;
			}

			return $resultCheck;
		} catch (Exception $e) {
			echo ("Error!");
		}
	}

	protected function setUser($uid, $password, $email)
	{
		try {
			$dbh = new Dbh();
			$conn = $dbh->connect();
			$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
			$tsql = "INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, $hashedPwd, ?)";


			$status = sqlsrv_query($conn, $tsql);

			if (!$status) {
				$status == null;
				header("location: ../signup.php?error=statusfailed");
				exit();
			}

			$status = null;
		} catch (Exception $e) {
			echo ("Error!");
		}
	}
}
