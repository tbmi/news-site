<?php

class Signup extends Dbh {
	protected function checkUser($uid, $email) {
		try
		{
			$conn = connect();
			$tsql = "SELECT users_id FROM users WHERE users_id = ? OR users_email = ?";
			$status = sqlsrv_query($conn, $tsql);

			if(!$status->execute(array($uid, $email))) {
				$status == null;
				header("location: ../signup.html?error=statusfailed");
				exit();
			}

			$resultCheck;
			if($status->rowCount() > 0) {
				$resultCheck = false;
			}
			else {
				$resultCheck = true;
			}

			return $resultCheck;
		}
		catch(Exception $e)
        {
            echo("Error!");
        }
	}

	protected function setUser($uid, $password, $email) {
		try
		{
			$conn = connect();
			$tsql = "INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?)";

			$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

			$status = sqlsrv_query($conn, $tsql);

			if(!$status->execute(array($uid, $hashedPwd, $email))) {
				$status == null;
				header("location: ../signup.html?error=statusfailed");
				exit();
			}
			
			$status = null;
		}
		catch(Exception $e)
        {
            echo("Error!");
        }
	}
}