<?php

$serverName = "TAKY-PC/SQLEXPRESS";
$connectionOptions = [
	"Database"=>"DB",
	"Uid"=>"",
	"PWD"=>""
]
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn = false)
	die( print_r( sqlsrv_errors(), true));
else echo 'Connection Success';

?>