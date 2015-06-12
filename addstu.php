<?php
	static $i=1;
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
	$v1=(int)$_POST['stuid'];
	$v2=$_POST['stuna'];
	$v3=$_POST['stucourse'];$v4=$_POST['stuemail'];
	$v5=$_POST['studob']; $v6=$_POST['stucon'];
	$v7=$_POST['stunation'];$v8=$_POST['stublood'];
	$v9=$_POST['stufanm'];$v10=$_POST['stumanm'];$v11=$_POST['stucity'];
	$v12=$_POST['stustate'] ;$v13=$_POST['stuhost'];
	
	$v14=$_POST['log1na'];
	$v15=(int)$_POST['log1con'];
	$v16=$_POST['log1rel'];
	$v17=$_POST['log2na'];
	$v18=(int)$_POST['log2con'];
	$v19=$_POST['log2rel'];
	
	$sql="INSERT INTO student VALUES($v1,'$v2','$v3','$v4','$v5',$v6,'$v7','$v8','$v9','$v10','$v11','$v12','$v13')";
	
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	$sql="INSERT INTO locgs(stuID,logna,logcon,logrel) VALUES($v1,'$v14',$v15,'$v16')";
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	$sql="INSERT INTO locgs(stuID,logna,logcon,logrel) VALUES($v1,'$v17',$v18,'$v19')";
	
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
	$str="stupass".$row[0];
	$sql="Insert into log_in values($v1,'$str',2)";
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	$row[0]++;
	$sql="update countingvalues set counter2=$row[0]";
	if(!mysql_query($sql))
	{
		die('sql error'.mysql_error());
	}
	header("location:admin.html");
	mysql_close($link);
	
?>
