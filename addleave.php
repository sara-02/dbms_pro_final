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
	$v1=$_POST["stuid"];
	$v2=$_POST["since"];
	$v3=$_POST["until"];
	$v4=$_POST["res"];
	$sql="Insert into leave_table(stuid,since,until,reason) values($v1,'$v2','$v3','$v4')";
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
		}
	mysql_close($link);
?>
	
