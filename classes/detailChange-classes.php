<?php

class detailChange extends Dbh {
    protected function setAccount($u_id, $email, $pref, $pwd) {
        try {
            $db = new Dbh;
            $conn = $db->connect();
            $tsql = "SELECT users_pwd FROM users WHERE users_email = ?";
            $param = array($email);
            $stmt = sqlsrv_query($conn, $tsql, $param, array("Scrollable"=>"static"));
            $stmtFetch = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

            if (!$stmt) {
                header("location:../account.php?error=stmtfail1");
                exit;
            }

            elseif (sqlsrv_num_rows($stmt) == 0) {
                header("location:../account.php?error=noUser");
                exit;
            }

            else {
                if (password_verify($pwd, $stmtFetch['users_pwd'])){
                    $tsql = "UPDATE users SET users_id = ?, users_preference = ? WHERE users_email = ?";
                    $params = array($u_id, $pref, $email);
                    $stmt = sqlsrv_query($conn, $tsql, $params, array("Scrollable"=>"static"));
                    if (!$db->stmtChecks($stmt)) {
                        header("location:../account.php?error=stmtfail2");
                        exit;
                    }
                    elseif ($db->stmtChecks($stmt)) {
                        header("location:../account.php?error=none");
                        exit;
                    }
                }
                else {
                    header("location:../account.php?error=wrongpwd");
                    exit;
                }
            }
            
        }
        catch (Exception $e) {

        }
    }
}

?>