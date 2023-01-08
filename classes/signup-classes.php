<?php

class Signup
{
	protected function checkUser($u_id, $email)
	{
		try {
			$serverName = "TAKY-PC\SQLEXPRESS";
			$connectionOptions = array("Database"=>"NewsSite",
				"Uid"=>"", "PWD"=>"");
			$conn = sqlsrv_connect($serverName, $connectionOptions);
			if($conn == false) {
				$testfile = fopen("test.txt", "a"); fwrite($testfile, "checkUser Connection Failed \n"); fclose($testfile);
				die(print_r(sqlsrv_errors(), true));
			}
			else {
				$testfile = fopen("test.txt", "a"); fwrite($testfile, "checkUser Connection Established \n"); fclose($testfile);
			}
			$tsql = "SELECT users_id FROM users WHERE users_id = ? OR users_email = ?";
			$parameter = array($u_id, $email);
			$stmt = sqlsrv_query($conn, $tsql, $parameter, array("Scrollable" => 'static'));

			if (!$stmt) {
				$stmt = false;
				header("location: ../signup.php?error=statusfailed1");
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

	protected function setUser($u_id, $password, $email)
	{
		try {
			$serverName = "TAKY-PC\SQLEXPRESS";
			$connectionOptions = array("Database"=>"NewsSite",
				"Uid"=>"", "PWD"=>"");
			$conn = sqlsrv_connect($serverName, $connectionOptions);
			if($conn == false) {
				fwrite(fopen("test.txt", "a"), "setUser Connection Failed \n"); fclose(fopen("test.txt", "a"));
				die(print_r(sqlsrv_errors(), true));
			}
			else {
				fwrite(fopen("test.txt", "a"), "setUser Connection Established \n"); fclose(fopen("test.txt", "a"));
			}
			$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
			$tsql = "INSERT INTO users (users_id, users_pwd, users_email) VALUES (?, $hashedPwd, ?)";
			$parameter = array($u_id, $email);

			$stmt = sqlsrv_query($conn, $tsql, $parameter, array("Scrollable" => 'static'));

			if (!$stmt) {
				header("location: ../signup.php?error=statusfailed2");
				exit();
			}

			$stmt = false;
		} catch (Exception $e) {
			echo ("Error!");
		}
	}
}
