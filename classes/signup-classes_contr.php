<?php

class SignupContr extends Signup
{
	private $uid;
	private $email;
	private $password;
	private $rptpassword;

	public function __construct($uid, $email, $password, $rptpassword)
	{
		$this->uid = $uid;
		$this->email = $email;
		$this->password = $password;
		$this->rptpassword = $rptpassword;
	}

	public function signupUser()
	{
		if ($this->emptyInput() == false) {
			header("location: ../signup.php?error=emptyInput");
			exit();
		}
		if ($this->invalidEmail() == false) {
			header("location: ../signup.php?error=invalidEmail");
			exit();
		}
		if ($this->pwdMatch() == false) {
			header("location: ../signup.php?error=passwordMatch");
			exit();
		}
		if ($this->uidTakenCheck() == false) {
			header("location: ../signup.php?error=usertaken");
			exit();
		}

		$this->setUser($this->uid, $this->password, $this->email);
	}

	private function emptyInput()
	{
		$result = "";
		if (empty($this->uid) || empty($this->email) || empty($this->password) || empty($this->rptpassword)) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

	private function invalidEmail()
	{
		$result = "";
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

	private function pwdMatch()
	{
		$result = "";
		if ($this->password !== $this->rptpassword) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

	private function uidTakenCheck()
	{
		$result = "";
		if (!$this->checkUser($this->uid, $this->email)) {
			$result = false;
		} else {
			$result = true;
		}

		return $result;
	}
}
