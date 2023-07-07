<?php
class Dbh {
	private $serverName;
	private $dbName;
	private $conn;

	protected function connect() {
		$this->serverName = "TAKY-PC\SQLEXPRESS";
		$this->dbName = "NewsSite";

		try {
			$this->conn = sqlsrv_connect($this->serverName, array("Database"=>$this->dbName));
		}
		catch (Exception $e) {
			$this->conn = false;
		}
		return $this->conn;
	}

	protected function stmtChecks($stmt) {
		$result = false;
		$stmtRows = sqlsrv_num_rows($stmt);

		if (!$stmt) {
			$result = false;
		}

		if ($stmtRows == 0) {
			$result = false;
		}
		elseif ($stmtRows > 0) {
			$result = true;
		}
		return $result;
	}
}
?>
