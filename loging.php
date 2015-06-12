<?php
	session_start();
	$dbdata = 'dbms_pro';
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
	$user_id=(int)$_POST['user_id'];
	$user_pswd=$_POST['user_pswd'];
	$sql="SELECT view_per FROM log_in WHERE user_id=$user_id and pass='$user_pswd'";
	$res=mysql_result(mysql_query($sql),0); 
	$name;
	if(!$res)
	{
		header("location:home.html");
	}
	if($res==1)
	{			
		header("location:admin.phtml");
		$_SESSION["id"]=$user_id;
		$_SESSION["name"]='ADMIN';
		
	}
	else if($res==2)
	{
		header("location:wardview.html");
		$_SESSION["id"]=$user_id;
		$sql="Select emp_name from employee where employee_id=$user_id";
		$res=mysql_query($sql);
		$row=mysql_fetch_row($res);
		$_SESSION["name"]=$row[0];
	 //echo $_SESSION["name"];
		
	}
	else if($res==3)
	{
		header("location:stview.html");
		$_SESSION["id"]=$user_id;
		$sql="Select stuna from student where stuid=$user_id";
		$res=mysql_query($sql);
	 $row=mysql_fetch_row($res);
	 $_SESSION["name"]=$row[0];
	}
	else
	{
		
		header("location:home.html");
	}
	mysql_close($li);
?>
