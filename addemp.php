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
	$v1=(int)$_POST['empid'];
	$v2=$_POST['empna'];
	$v3=$_POST['empoccu'];
	$v4=$_POST['empDOE'];
	$v5=$_POST['empDOR'];
	$v6=$_POST['empdob'];
	$v7=$_POST['empemail'];
	$v8=$_POST['empcon'];
	$v9=$_POST['empcone1'];
	$v10=$_POST['empadd'];
	$sql="INSERT INTO employee VALUES($v1,'$v2',$v8,$v9,'$v7','$v10','$v3','$v4','$v5','$v6')";
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	$sql="select *from countingvalues";
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	$res=mysql_query($sql);
	$row=mysql_fetch_row($res);
	$str="pass".$row[1];
	$sql="Insert into log_in values($v1,'$str',2)";
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	$row[1]++;
	$sql="update countingvalues set counter2=$row[1]";
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	
	header("location:addemp.html");
	mysql_close($link);
	
?>
