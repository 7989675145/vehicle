<?php
include("dbconnect.php");
$value="";
$value='<table id="mytable">
<thead>
				<tr>
					<th>NAME</th>
					<th>MOBILE</th>
					<th>AADHAR</th>
					<th>WHEELER</th>
					<th>REGISTRATION NUMBER</th>
				</tr>
			</thead>
			<tbody>';
				$details=mysqli_query($link,"select user_login.mobile as mobile,user_login.aadhar as aadhar,user_details.name as name,reg_number.registered_number as reg_number,reg_number.wheeler as wheeler from user_details,user_login,reg_number where user_login.user_id=user_details.user_id and user_login.user_id=reg_number.user_id and user_login.user_type=2 and user_details.status='APPROVED'");
				$num=mysqli_num_rows($details);
				if($num>0)
				{
					while($row=mysqli_fetch_assoc($details))
					{
					$value.='<tr>
							 <td>'.$row['name'].'</td>
							 <td>'.$row['mobile'].'</td>
							 <td>'.$row['aadhar'].'</td>
							 <td>'.$row['wheeler'].'</td>
							 <td>'.$row['reg_number'].'</td>
							 </tr>';
					}
				}
				else
				{
					$value.='<tr>
							<td colspan="9">No records found</td>
							</tr>';
				}
			$value.='</tbody>
					 </table>';
echo $value;
?>
			