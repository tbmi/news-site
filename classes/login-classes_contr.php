<?php

class LoginContr extends Login
{
	private $u_id;
	private $password;
	private $remember;

	public function __construct($u_id, $password, $remember)
	{
		$this->u_id = $u_id;
		$this->password = $password;
		$this->remember = $remember;
	}

	private function emptyInput()
	{
		$result = false;
		if (empty($this->u_id) || empty($this->password)) {
			fwrite(fopen("../test.txt", "a"), "Empty Input false \n");
			$result = false;
		} else {
			fwrite(fopen("../test.txt", "a"), "Empty Input true \n");
			$result = true;
		}
		return $result;
	}

	public function loginUser()
	{
		if ($this->emptyInput() == false) {
			header("location: ../login.php?error=emptyInput");
			exit();
		}
		$this->getUser($this->u_id, $this->password);
	}
}

fclose(fopen("test.txt", "a"));