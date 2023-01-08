<?php
require_once("dbh-classes.php");
class Login extends Dbh
{
	protected function getUser($password, $uid)
	{
		try {
			$conn = $this->OpenConnection();

			$tsql = "SELECT users_pwd FROM users WHERE users_id = ? OR users_email = ?";

			$status = sqlsrv_query($conn, $tsql, array($uid), array("Scrollable" => 'static'));
			$statusRows = sqlsrv_num_rows($status);
			$statusFetch = sqlsrv_fetch_array($status, SQLSRV_FETCH_ASSOC);

			if (!$status) {
				$status == null;
				header("location: ../login.php?error=statusfailed");
				exit();
			}

			if ($statusRows == 0) {
				$status = null;
				header("location: ../login.php?error=usernotfounduid");
				exit();
			}

			$pwdHashed = $statusFetch;
			$checkPwd = password_verify($password, $pwdHashed[0]["users_pwd"]);

			if ($checkPwd == false) {
				$status = null;
				header("location: ../login.php?error=wrongpassword");
				exit();
			} elseif ($checkPwd == true) {
				$tsql = "SELECT * FROM users WHERE users_id = ? OR users_email = ? AND users_pwd = ?";
				$status = sqlsrv_query($conn, $tsql);

				if (!$status) {
					$status == null;
					header("location: ../login.php?error=statusfailed");
					exit();
				}

				if ($statusRows == 0) {
					$status = null;
					header("location: ../login.php?error=usernotfoundpwd");
					exit();
				}

				$user = $statusFetch;
				$testfile = fopen("../test.txt", "w");
				fwrite($testfile, "check5");
				fclose($testfile);
				session_start();
				$_SESSION['userid'] = $user[0]["users_id"];
				$_SESSION['useruid'] = $user[0]["users_uid"];

				$status = null;
			}

			$status = null;
		} catch (Exception $e) {
			echo ("Error!");
		}
	}
}
