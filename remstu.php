<?php
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
	$s=1;
	$v=(int)$_POST['stuID'];
	if($v==0)
	{
		?>
		<div class="alert alert-danger">
   			<a href="#" class="alert-link">No such studentId present!!!</a>
		</div>
		<?php
	}
	else
	{
	$sql ="DELETE FROM student WHERE stuid = $v";
	if($sql==NULL)
	{
		?>
		<div class="alert alert-danger">
   			<a href="#" class="alert-link">No such studentId present!!!</a>
		</div>
		<?php
	}
	else
	{	
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	$sql="Delete from log_in where userid=$v";
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	}
	}
	mysql_close($li);
?>
