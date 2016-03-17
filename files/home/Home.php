<?php
if(isset($_POST['Login']))
{
	mysql_connect("localhost","admin","admin");
	mysql_select_db("E_M_S");
	
	$user=$_POST['username'];
	$pass=$_POST['password'];
	
	$que1=mysql_query("select * from Users where Email='$user' ");
		$rec=mysql_fetch_array($que1);
		$password=$rec[3];
		$name=$rec[1];
		$email=$rec[3];
		if($password==$pass)
		{
		echo "Success";
		$que2=mysql_query("select * from Profile_pic where EmailID=$email");
		$rec1=mysql_fetch_array($que2);
		$image=$rec1[1];
		echo "$image";
		
		}
		else{
		echo "Wrong Password";
		}
		
}
?>