<?php
	$dbdata = 'dbms_data';
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'dbms';
	$li = mysql_connect($dbhost, $dbuser, $dbpass);
	if(!$li )
	{
		  die('Could not connect: ' . mysql_error());
	}

	$conc = mysql_select_db($dbdata,$li);
	if(!$conc )
	{
 		 die('Could not connect to db: ' . mysql_error());
	}
	
	$v=(int)$_POST['empid'];
	$sql ="DELETE FROM employee WHERE employee_id = $v";
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	$sql="Delete from log_in where userid=$v";
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	mysql_close($li);
?>

