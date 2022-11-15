<?php
	$mysql_host='localhost';
	$mysql_user='root';
	$mysql_pass='';
	$mysql_db='sql_injection';
	$con=mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
	if(! $con )	
	{
		die('<h3>* Could not connect to database right now.Please try again later.</h3>');
	}
?>