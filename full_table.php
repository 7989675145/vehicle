<?php
include("dbconnect.php");
$value="";
$value='<table id="mytable">
			<thead>
				<tr>
					<th>NAME</th>
					<th>MOBILE</th>
					<th>AADHAR</th>
					<th>ADDRESS</th>
					<th>TRANSPORT</th>
					<th>CUSTOM/RANDOM</th>
					<th>WHEELER</th>
					<th>REGISTRATION NUMBER</th>
					<th>IMAGE</th>
					<th>APPROVE</th>
				</tr>
			</thead>
			<tbody>';
$details=mysqli_query($link,"SELECT user_login.user_id AS user_id,user_login.mobile AS mobile,user_login.aadhar AS aadhar,user_details.name AS name,user_details.address AS address,vehicle_details.transport AS transport,vehicle_details.img AS img, reg_number.registered_number AS reg_number,reg_number.wheeler AS wheeler,reg_number.random_custom AS random_custom FROM user_login,user_details,vehicle_details,reg_number WHERE user_login.user_id=user_details.user_id and user_login.user_id=vehicle_details.user_id and user_login.user_id=reg_number.user_id and user_login.user_type=2 and user_details.status='Pending'");
$num=mysqli_num_rows($details);
if($num>0)
{	
	while($fetch=mysqli_fetch_assoc($details))
	{
	$value.='<tr>
			<td>'.$fetch['name'].'</td>
			<td>'.$fetch['mobile'].'</td>
			<td>'.$fetch['aadhar'].'</td>
			<td>'.$fetch['address'].'</td>
			<td>'.$fetch['transport'].'</td>
			<td>'.$fetch['random_custom'].'</td>
			<td>'.$fetch['wheeler'].'</td>
			<td>'.$fetch['reg_number'].'</td>
			<td class="text-center"><img src="images/'.$fetch['img'].'" style="width:100px; height:100px;"></td>
			<td><button class="btn btn-success" id="btn_approve" data-id='.$fetch['user_id'].'>APPROVE</button></td>
			</tr>';
	}
}
else
{
	$value.='<tr>
			<td colspan="10">No records found</td>
			</tr>';
}
$value.='</tbody>				
		</table>';
echo $value;
?>