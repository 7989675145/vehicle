<?php
session_start();
include('dbconnect.php');
$mobile=mysqli_real_escape_string($link,$_POST['mobile']);
$aadhar=mysqli_real_escape_string($link,$_POST['aadhar']);
$s="select * from user_login where mobile='".$mobile."' || aadhar='".$aadhar."'";
$result=mysqli_query($link,$s);
$num=mysqli_num_rows($result);
if($num>0)
{
	$_SESSION['valid']=2;
	header("location:index.php");
}
else 
	{
		$_SESSION['mobile']=$mobile;
		$_SESSION['aadhar']=$aadhar;
		header("location:register.php");
		
	}
?>