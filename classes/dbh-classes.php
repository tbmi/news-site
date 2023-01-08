<?php
class Dbh {
	protected function OpenConnection()
	{
		$serverName = "TAKY-PC/SQLEXPRESS";
		$connectionOptions = array("Database"=>"NewsSite",
			"Uid"=>"", "PWD"=>"");
		$conn = sqlsrv_connect($serverName, $connectionOptions);
		if($conn == false)
			die(print_r(sqlsrv_errors(), true));

		return $conn;
	}
}
?>
