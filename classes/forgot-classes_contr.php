<?php

class passwordForgotContr extends passwordForgot {

    private $email;
    private $url;
    private $token;

    public function __construct($email)
    {
        $this->email = $email;
        $this->url = $this->createUrl();
        $this->token = random_bytes(32);
    }

    private function emptyInput() {
        $result = "";
        if (empty($this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function createUrl() {
        $userUrl = "";
        $db = new Dbh;
        $conn = $db->connect();
        $tsql_removeOld = "DELETE FROM url WHERE url_userEmail = ?";
        $param = array($this->email);
        $stmt = sqlsrv_query($conn, $tsql_removeOld, $param, array("Scrollable"=>"static"));

        if($db->stmtChecks($stmt)) {
            $hexToken = bin2hex($this->token);
            $expiry = time() + 1800;
            $userUrl = "http://localhost/NewsWebsite/forgotPasswordChange.php?token=$this->token";
            $tsql_insertUrl = "INSERT INTO url (url_token, url_expiry, url_userEmail) VALUES (?, ?, ?)";
            $params = array($hexToken, $expiry, $this->email);
            $stmt = sqlsrv_query($conn, $tsql_insertUrl, $params, array("Scrollable"=>"static"));
            
            return $userUrl;
        }
    }

    public function sendEmail() {
        if (!$this->emptyInput()) {
            header("location: ../forgotForm.php?error=emptyInput");
            exit();
        }
        else {
            $this->checkEmail($this->email, $this->url);
        }
    }
}

?>