<?php

class Login
{
	protected function getUser($u_id, $password)
	{
		try {
			$serverName = "TAKY-PC\SQLEXPRESS";
			$connectionOptions = array("Database"=>"NewsSite",
				"Uid"=>"", "PWD"=>"");
			$conn = sqlsrv_connect($serverName, $connectionOptions);
			if($conn == false) {
				fwrite(fopen("test.txt", "a"), "getUser Connection Failed \n"); fclose(fopen("test.txt", "a"));
				die(print_r(sqlsrv_errors(), true));
			}
			else {
				fwrite(fopen("test.txt", "a"), "getUser Connection Established \n"); fclose(fopen("test.txt", "a"));
			}
			$tsql = "SELECT users_pwd FROM users WHERE users_id = ? OR users_email = ?";
			$parameters = array($u_id, $u_id);
			$stmt = sqlsrv_query($conn, $tsql, $parameters, array("Scrollable" => 'static'));

			if (!$stmt) {
				header("location: ../login.php?error=statusfailed");
				exit();
			}

			$stmtRows = sqlsrv_num_rows($stmt);
			if (!$stmtRows or $stmt == 0) {
				$stmt = false;
				header("location: ../login.php?error=usernotfounduid");
				exit();
			}

			$stmtFetch = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
			$pwdHashed = $stmtFetch;
			$checkPwd = password_verify($password, $pwdHashed[0]["users_pwd"]);

			if (!$checkPwd) {
				$stmt = false;
				header("location: ../login.php?error=wrongpassword");
				exit();
			} elseif ($checkPwd == true) {
				$tsql = "SELECT * FROM users WHERE users_id = ? OR users_email = ? AND users_pwd = ?";

				if (!$stmt) {
					header("location: ../login.php?error=statusfailed");
					exit();
				}

				if ($stmtRows == 0) {
					$stmt = false;
					header("location: ../login.php?error=usernotfoundpwd");
					exit();
				}

				$user = $stmtFetch;
				session_start();
				$_SESSION['userid'] = $user[0]["users_id"];
				$_SESSION['useruid'] = $user[0]["users_uid"];

				$stmt = false;
			}

			$stmt = false;
		} catch (Exception $e) {
			echo ("Error!");
		}
	}
}
