<?php

class passwordResetContr extends passwordReset {
    private $password;
    private $passwordRpt;
    private $email;

    public function __construct($email, $password, $passwordRpt)
    {
        $this->email = $email;
        $this->password = $password;
        $this->passwordRpt = $passwordRpt;
    }

    private function EmptyInput() {
        $result = "";
        if (empty($this->password) || empty($this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch()
	{
		$result = false;
		if ($this->password !== $this->passwordRpt) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

    public function changePassword() {
        if (!$this->EmptyInput()) {
            header("location: ../forgotPasswordChange.php?error=emptyInput");
            exit;
        }
        elseif (!$this->pwdMatch()) {
            header("location: ../forgotPasswordChange.php?error=pwdMatchFailed");
            exit;
        }
        else {
            $this->updatePassword($this->email, $this->password);
        }
    }
}

?>