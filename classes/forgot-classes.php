<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class passwordForgot extends Dbh {
    protected function checkEmail($email, $url) {
        try {
            $db = new Dbh;
            $conn = $db->connect();

            $tsql = "SELECT users_id FROM users WHERE users_email = ?";
            $params = array($email);
            $stmt = sqlsrv_query($conn, $tsql, $params, array("Scrollable" => 'static'));
            $stmtRows = sqlsrv_num_rows($stmt);
            $stmtFetch = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

            if (!$stmt) {
                header("location: ../forgotForm.php?error=failedStatement");
                exit();
            }

            if ($stmtRows == 0) {
                header("location: ../forgotForm.php?error=userNotFound");
                exit;
            }
            elseif ($stmtRows > 0) {
                try {
                    $mail = new PHPMailer(true);
                    $mail->SMTPDebug = 2;									
                    $mail->isSMTP();	
                    $mail->Host	 = 'smtp.mailfence.com';
                    $mail->Port = 587;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->SMTPAuth = true;
                    $mail->Username = 'benjamin.martin';
                    $mail->Password = 'Vampire472004!';

                    $mail->setFrom('chpstk.media@mailfence.com', 'CHPSTK Media');	

                    $mail->isHTML(true);	

                    $mail->addAddress($email, $stmtFetch['users_id']);
                    #$mail->addAddress('receiver2@gfg.com', 'Name');
                    $mail->addReplyTo($email, $stmtFetch['users_id']);
                    $mail->Subject = "Password Reset Request on The Weekly Insight";
                    $mail->Body = "<b>Reset Password Link: <b>$url";
                    #$mail->msgHTML(file_get_contents());
                    $mail->AltBody = "Reset Password Link: $url";
                    #$mail->addAttachment();
                    $mail->send();
                    fwrite(fopen("../test.txt","a"), "test3"); fclose(fopen("test.txt", "a"));
                }
                catch (Exception $e) {
                    echo("Error!");
                    fwrite(fopen("../test.txt","a"), $mail->ErrorInfo); fclose(fopen("test.txt", "a"));
                }
            }
        }
        catch (Exception $e) {
            echo("Error!");
        }
    }
}

?>