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
				fwrite(fopen("../test.txt", "a"), "getUser Connection Failed \n"); fclose(fopen("../test.txt", "a"));
				die(print_r(sqlsrv_errors(), true));
			}
			else {
				fwrite(fopen("../test.txt", "a"), "getUser Connection Established \n"); fclose(fopen("../test.txt", "a"));
			}
			$tsql = "SELECT users_id, users_pwd FROM users WHERE users_id = ? OR users_email = ?";
			$parameters = array($u_id, $u_id);
			$hash_query = sqlsrv_query($conn, $tsql, $parameters, array("Scrollable" => 'static'));

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
			fwrite(fopen("../test.txt", "a"), implode($hash)); fclose(fopen("../test.txt", "a"));
			$checkPwd = password_verify($password, $hash['users_pwd']);

			if (!$checkPwd) {
				$hash = false;
				header("location: ../login.php?error=wrongpassword");
				exit();
			} elseif ($checkPwd == true) {
				$tsql = "SELECT * FROM users WHERE users_id = ? OR users_email = ? AND users_pwd = ?";
				$parameter = array($u_id, $u_id, $hash['users_pwd']);
				$stmt = sqlsrv_query($conn, $tsql, $parameter, array("Scrollable" => 'static'));

				if (!$stmt) {
					header("location: ../login.php?error=stmtfailed");
					exit();
				}

				if ($stmtRows == 0) {
					$stmt = false;
					header("location: ../login.php?error=usernotfoundpwd");
					exit();
				}

				session_start();
				$_SESSION['userid'] = $hash['users_id'];

				$hash = false;
			}

			$hash = false;
		} catch (Exception $e) {
			echo ("Error!");
		}
	}
}
