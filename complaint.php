<?php
	$dbdata='dbms_pro';
	$dbhost='localhost';
	$dbuser='root';
	$dbpass='dbms';

	$link=mysql_connect($dbhost,$dbuser,$dbpass);
	if(!$link)
	{
		 die('Could not connect:' . mysql_error());
	}
	$conc = mysql_select_db($dbdata,$link);
	if(!$conc )
	{
 		 die('Could not connect to db:' . mysql_error());
	}
	$v1=$_POST['comstuid'];
	$v2=$_POST['complaint'];
	
	$sql="INSERT INTO complaint (stuid,problem) VALUES($v1,'$v2')";
	if(!mysql_query($sql))
	{
		die("sql error :".mysql_error());
	}
	header("location:stview.html");
	session_start();
	mysql_close($link);
?>
