<?php

class LoginContr extends Login
{
	private $uid;
	private $password;
	private $remember;

	public function __construct($uid, $password, $remember)
	{
		$this->uid = $uid;
		$this->password = $password;
		$this->remember = $remember;
	}

	public function loginUser()
	{
		if ($this->emptyInput() == false) {
			header("location: ../signup.php?error=emptyInput");
			exit();
		}
		$this->getUser($this->uid, $this->password);
	}

	private function emptyInput()
	{
		$result = "";
		if (empty($this->uid) || empty($this->password)) {
			$result = false;
		} else {
			$result = true;
		}
		return $result;
	}
}
