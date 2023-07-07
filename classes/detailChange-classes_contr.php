<?php

class detailChangeContr extends detailChange {
    private $u_id;
    private $email;
    private $pref;
    private $pwd;

    public function __construct($u_id, $email, $pref, $pwd)
    {
        $this->u_id = $u_id;
        $this->email = $email;
        $this->pref = $pref;
        $this->pwd = $pwd;
    }

    private function emptyInput() {
        $result = "";
        if (empty($this->u_id) || empty($this->pref) || empty($this->pwd)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    public function updateAccount() {
        if (!$this->emptyInput()) {
            header("location: ../account.php?error=emptyInput");
            exit;
        }
        else {
            $this->setAccount($this->u_id, $this->email, $this->pref, $this->pwd);
            exit;
        }
    }
}

?>