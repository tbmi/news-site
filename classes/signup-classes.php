<?php

class Signup extends Dbh
{
	protected function checkUser($u_id, $email)
	{
		try {
			$db = new Dbh();
			$conn = $db->connect();
			$tsql = "SELECT users_id FROM users WHERE users_id = ? OR users_email = ?";
			$parameter = array($u_id, $email);
			$stmt = sqlsrv_query($conn, $tsql, $parameter, array("Scrollable" => 'static'));

			if (!$stmt) {
				header("location: ../signup.php?error=selectfail");
				exit();
			}

			$stmtRows = sqlsrv_num_rows($stmt);
			$resultCheck = true;
			if ($stmtRows > 0) {
				$resultCheck = false;
			} else {
				$resultCheck = true;
			}

			return $resultCheck;
		} catch (Exception $e) {
			echo ("Error!");
		}
	}

	protected function setUser($u_id, $password, $email, $preference)
	{
		try {
			$db = new Dbh();
			$conn = $db->connect();
			$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
			$tsql = "INSERT INTO users (users_id, users_pwd, users_email, users_preference) VALUES (?, ?, ?, ?)";
			$parameter = array($u_id, $hashedPwd, $email, $preference);

			$stmt = sqlsrv_query($conn, $tsql, $parameter, array("Scrollable" => 'static'));

			if (!$stmt) {
				header("location: ../signup.php?error=insertfail");
				exit();
			}

			$stmt = false;
		} catch (Exception $e) {
			echo ("Error!");
		}
	}
}
