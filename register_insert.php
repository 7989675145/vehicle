<?php 
session_start();
include('dbconnect.php');
$name=$_POST['name'];
$transport=$_POST['transport'];
$random_custom=$_POST['random_custom'];
$wheeler=$_POST['wheeler'];
$address=$_POST['address'];
$company=$_POST['company'];
$chasis=$_POST['chasis'];
$engine=$_POST['engine'];
$num=$_POST['num'];

$filename=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="images/".$filename;

if($wheeler=="Two Wheeler" and $random_custom=="RANDOM")
{
	$_SESSION['pay']=1000;
}
if($wheeler=="Four Wheeler" and $random_custom=="RANDOM")
{
	$_SESSION['pay']=2000;
}
if($wheeler=="Two Wheeler" and $random_custom=="CUSTOM")
{
	$_SESSION['pay']=2000;
}
if($wheeler=="Four Wheeler" and $random_custom=="CUSTOM")
{
	$_SESSION['pay']=4000;
}

if($random_custom=="RANDOM")
{	
	$gen=rand(1111,9999);
	$final='AP39EH'.$gen;
}
else
{
	$final='AP39EH'.$num;
}
$number=substr($final,6);
$ch=mysqli_query($link,"SELECT chasis_number as chas,engine_number as eng FROM vehicle_details");
while($fetch=mysqli_fetch_assoc($ch))
{
	if($chasis==$fetch['chas'] || $engine==$fetch['eng'])
	{
		header("location:register.php");
	}
}
mysqli_query($link,"INSERT INTO `user_login`(`mobile`,`aadhar`) VALUES ('".$_SESSION['mobile']."','".$_SESSION['aadhar']."')");
$t=mysqli_query($link,"SELECT * FROM `user_login` WHERE mobile='".$_SESSION['mobile']."' and aadhar='".$_SESSION['aadhar']."'");
$fetch=mysqli_fetch_assoc($t);
mysqli_query($link,"INSERT INTO `user_details`(`user_id`,`name`, `address`) VALUES ('".$fetch['user_id']."','".$name."','".$address."')");
mysqli_query($link,"INSERT INTO `vehicle_details`(`user_id`, `transport`, `chasis_number`, `engine_number`, `company`, `wheeler`, `img`) VALUES ('".$fetch['user_id']."','".$transport."','".$chasis."','".$engine."','".$company."','".$wheeler."','".$filename."')");
mysqli_query($link,"INSERT INTO `reg_number`(`user_id`, `registered_number`, `wheeler`, `random_custom`, `number`) VALUES ('".$fetch['user_id']."','".$final."','".$wheeler."','".$random_custom."','".$number."')");
header("location:pay.php");
?>