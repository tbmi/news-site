<?php

$testfile = fopen("test.txt", "a");

class SignupContr extends Signup
{
	private $u_id;
	private $email;
	private $password;
	private $rptpassword;

	public function __construct($u_id, $email, $password, $rptpassword)
	{
		$this->u_id = $u_id;
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

		$this->setUser($this->u_id, $this->password, $this->email);
	}

	private function emptyInput()
	{
		$result = false;
		if (empty($this->u_id) || empty($this->email) || empty($this->password) || empty($this->rptpassword)) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

	private function invalidEmail()
	{
		$result = false;
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

	private function pwdMatch()
	{
		$result = false;
		if ($this->password !== $this->rptpassword) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}

	private function uidTakenCheck()
	{
		$result = false;
		if (!$this->checkUser($this->u_id, $this->email)) {
			$result = false;
		} else {
			$result = true;
		}

		return $result;
	}
}

fclose(fopen("test.txt", "a"));