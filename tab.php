<?php
include("dbconnect.php");
$value="";
$array1=array();
$details=mysqli_query($link,"SELECT user_login.user_id AS user_id,user_login.mobile AS mobile,user_login.aadhar AS aadhar,user_details.name AS name,user_details.address AS address,vehicle_details.transport AS transport,vehicle_details.img AS img, reg_number.registered_number AS reg_number,reg_number.wheeler AS wheeler,reg_number.random_custom AS random_custom FROM user_login,user_details,vehicle_details,reg_number WHERE user_login.user_id=user_details.user_id and user_login.user_id=vehicle_details.user_id and user_login.user_id=reg_number.user_id and user_login.user_type=2 and user_details.status='Pending'");
$new=array();
while($fetch=mysqli_fetch_assoc($details))
	{
		if(sizeof($fetch)>0)
		$new[]=$fetch;
	}
	$array1[]=(['data'=>$new]);
	echo json_encode($array1);
?>