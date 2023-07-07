<?php

class passwordReset extends Dbh {
    protected function updatePassword($email, $password) {
        try {

            $db = new Dbh;
            $conn = $db->connect();

            $tsql = "SELECT urls_token, urls_expiry FROM urls WHERE urls_email = ?";
            $param = array($email);
            $stmt = sqlsrv_query($conn, $tsql, $param, array("Scrollable"=>"static"));
            $stmtFetch = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            if ($_GET['token'] == hex2bin($stmtFetch['urls_token'])) {
                if (time() > $stmtFetch['urls_expiry']) {
                    $tsql = "UPDATE users SET users_pwd = ? WHERE users_email = ?";
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $params = array($hash, $email);
                    $stmt = sqlsrv_query($conn, $tsql, $params, array("Scrollable" => 'static'));

                    $check = $db->stmtChecks($stmt);
                    if (!$check) {
                        header("location: ../forgotPasswordChange.php?error=stmtFail");
                        exit;
                    }
                }
                else {
                    header("location: ../index.php?error=expired");
                    exit;
                }
            }
        }
        catch (Exception $e) {
        }
    }
}

?>