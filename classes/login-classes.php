<?php

class Login extends Dbh {

	protected function getUser($password, $uid) {
		try
		{
			$conn = connect();
			$tsql = "SELECT users_pwd FROM users WHERE users_id = ? OR users_email = ?";

			$status = sqlsrv_query($conn, $tsql);

			if(!$status->execute(array($uid, $password))) {
				$status == null;
				header("location: ../login.html?error=statusfailed");
				exit();
			}
			
			if ($status->rowCount() == 0) {
				$status = null;
				header("location: ../login.html?error=usernotfound");
				exit();
			}

			$pwdHashed = $status->fetchAll(PDO::FETCH_ASSOC);
			$checkPwd = password_verify($password, $pwdHashed[0]["users_pwd"]);

			if ($checkPwd == false) {
				$status = null;
				header("location: ../login.html?error=wrongpassword");
				exit();
			}
			elseif ($checkPwd == true) {
				$tsql = "SELECT * FROM users WHERE users_id = ? OR users_email = ? AND users_pwd = ?";
				$status = sqlsrv_query($conn, $tsql);
				
				if(!$status->execute(array($uid, $uid, $password))) {
					$status == null;
					header("location: ../login.html?error=statusfailed");
					exit();
				}

				if ($status->rowCount() == 0) {
				$status = null;
				header("location: ../login.html?error=usernotfound");
				exit();
				}

				$user = $status->fetchALL(PDO::FETCH_ASSOC);

				session_start();
				$_SESSION["userid"] = $user[0]["users_id"];
				$_SESSION["useruid"] = $user[0]["users_uid"];

				$status = null;
			}

			$status = null;
		}
		catch(Exception $e)
        {
            echo("Error!");
        }
	}
}