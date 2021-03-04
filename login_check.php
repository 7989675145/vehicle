<?php
session_start();
include('dbconnect.php');

$user_name=$_POST['name'];
$pass=$_POST['pwd'];
$s="select * from user_login where mobile='".$user_name."' and aadhar='".$pass."'";
$result=mysqli_query($link,$s);
$data=mysqli_fetch_assoc($result);

if($data!==null)
{
	if($data['user_type']==1)
	{
		$_SESSION['user']='ADMIN';
		header("location:admin.php");
	}
	else if($data['user_type']==2)
	{
		$_SESSION['user']='CUSTOMER';
		$_SESSION['c_mobile']=$user_name;
		$_SESSION['c_aadhar']=$pass;
		header("location:customer.php");
	}
}
else
	{
		$_SESSION['valid']=false;
		header("location:index.php");
		exit;
	}
	
?>