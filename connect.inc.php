<?php
$conn_error='Could not connect';
$mysqlii_host='localhost';
$mysqli_user='root';
$mysqli_pass='';
$mysqli_db='a_database';
$con=@mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass);
if(!@mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass) || !@mysqli_select_db($con,$mysqli_db)){
	die($conn_error);
}

?>