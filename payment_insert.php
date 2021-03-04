<?php
include("dbconnect.php");
session_start();
$card=$_POST['card'];
$month=$_POST['month'];
$year=$_POST['year'];
$cvv=$_POST['cvv'];
$amount=$_POST['amount'];
$s=mysqli_query($link,"SELECT amount FROM card_details WHERE card='".$card."' and month='".$month."' and year='".$year."' and cvv='".$cvv."'");
$data=mysqli_fetch_assoc($s);
if(($data['amount']-$amount)>0)
{
	$balance=$data['amount']-$amount;
	mysqli_query($link,"UPDATE `card_details` SET `amount`='".$balance."' WHERE card='".$card."' and month='".$month."' and year='".$year."' and cvv='".$cvv."'");
	$s=mysqli_query($link,"SELECT user_login.user_id as id FROM user_login WHERE user_login.mobile='".$_SESSION['mobile']."' and user_login.aadhar='".$_SESSION['aadhar']."'");
	$data=mysqli_fetch_assoc($s);
	mysqli_query($link,"UPDATE `reg_number` SET `payment`='Paid' WHERE reg_number.user_id='".$data['id']."'");
	$_SESSION['valid']=1;
	header("location:index.php");
}
else
{
	$_SESSION['fail']=1;
	header("location:pay.php?item=1");
}
?>