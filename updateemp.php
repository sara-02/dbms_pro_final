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
	if(!$v1)
	{
		?><div class="alert alert-danger">
   			<a href="#" class="alert-link">Enter a Student Id!!!</a>
		</div>
	<?php
	}
	else
	{
	$v2=$_POST['empna'];
	$v3=$_POST['empoccu'];
	$v4=(int)$_POST['empDOE'];
	$v5=$_POST['empDOR'];
	$v6=$_POST['empdob'];
	$v7=$_POST['empemail'];
	$v8=(int)$_POST['empcon'];
	$v9=$_POST['empcone1'];
	$v10=$_POST['empadd'];
	
	$sql="UPDATE employee set emp_name='$v2',emp_contact=$v8,emer_cont=$v9,emp_email='$v7',emp_address='$v10',emp_since='$v4',emp_until='$v5',emp_dob='$v6' where employee_id=$v1";
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
		header("location:empdisp.phtml");
	}
	else
	{
		header("location:admin.html");
	}
	}
	}
	mysql_close($link);
?>
