<?php

class Login extends Dbh
{
	protected function getUser($u_id, $password)
	{
		try {
			$db = new Dbh();
			$conn = $db->connect();
			$tsql = "SELECT * FROM users WHERE users_id = ? OR users_email = ?";
			$parameters = array($u_id, $u_id);
			$hash_query = sqlsrv_query($conn, $tsql, $parameters, array("Scrollable"=>"static"));

			if (!$hash_query) {
				header("location: ../login.php?error=statusfailed");
				exit();
			}

			$stmtRows = sqlsrv_num_rows($hash_query);
			if (!$stmtRows or $hash_query == 0) {
				$hash_query = false;
				header("location: ../login.php?error=usernotfounduid");
				exit();
			}

			$hash = sqlsrv_fetch_array($hash_query, SQLSRV_FETCH_ASSOC);
			$checkPwd = password_verify($password, $hash['users_pwd']);

			if (!$checkPwd) {
				$hash = false;
				header("location: ../login.php?error=wrongpassword");
				exit();
			} elseif ($checkPwd == true) {
				session_start();
				$_SESSION['userid'] = $hash['users_id'];
				$_SESSION['email'] = $hash['users_email'];
				$_SESSION['password'] = $password;
				$_SESSION['userPref'] = $hash['users_preference'];

				if ($hash['users_auth']) {
					$_SESSION['userauth'] = $hash['users_auth'];
				}

				$hash = false;
				sqlsrv_close($conn);
			}

			$hash = false;
		} catch (Exception $e) {
			echo ("Error!");
		}
	}
}
