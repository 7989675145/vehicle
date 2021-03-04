<?php 
session_start();
include('dbconnect.php');
/*
if(!isset($_SESSION['user']))
{
	header("location:index.php");
	exit;
}*/
//echo $_SESSION['c_mobile'];
?>
<!doctype html>
<html lang="en">
  <head>
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
  <title>REGISTRATION</title>
	<style>
  
	</style>
					
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="#">
			WELCOME DEAR CUSTOMER
			</a>
		<div>
		<?php
		$s="select user_login.user_id as id,user_details.name as name,user_details.address as address,vehicle_details.transport as transport,vehicle_details.img as img, user_details.status as status,reg_number.registered_number as reg_number,reg_number.wheeler as wheeler,reg_number.random_custom as random_custom from user_login,user_details,vehicle_details,reg_number where user_login.mobile='".$_SESSION['c_mobile']."' and user_login.aadhar='".$_SESSION['c_aadhar']."' and user_login.user_id=user_details.user_id and user_login.user_id=vehicle_details.user_id and user_login.user_id=reg_number.user_id";
		$details=mysqli_query($link,$s);
		$fetch=mysqli_fetch_assoc($details);
		if($fetch['status']=='APPROVED')
		{
		?>
			<button class="btn btn-success" onclick="window.print()">Print</button>
		<?php 
		}
		?>
			<a class="btn btn-danger " href="logout.php">Logout</a>
		</div>
	</nav>

<div class="container">
<div class="row mt-3 justify-content-center">
<div class="col-12">
	<table class="table table-bordered table-striped mt-3">
			<thead>
				<tr>
					<th>NAME</th>
					<th>MOBILE</th>
					<th>AADHAR</th>
					<th>NUMBER</th>
					<th>TRANSPORT</th>
					<th>WHEELER</th>
					<th>ADDRESS</th>
					<th>Image</th>
					<th>STATUS</th>
				</tr>
			</thead>
			<tbody>
					<?php
				
				
						echo '<tr>';
						//echo '<td>'.$fetch['id'].'</td>';
						echo '<td>'.$fetch['name'].'</td>';
						echo '<td>'.$_SESSION['c_mobile'].'</td>';
						echo '<td>'.$_SESSION['c_aadhar'].'</td>';
						echo '<td>'.$fetch['reg_number'].'</td>';
						echo '<td>'.$fetch['transport'].'</td>';
						echo '<td>'.$fetch['wheeler'].'</td>';
						echo '<td>'.$fetch['address'].'</td>';
					?>
						<td class='text-center'><img src='images/<?php echo $fetch['img'];?>' style='width:100px; height:100px;'></td>
					<?php	
						echo '<td>'.$fetch['status'].'</td>';
						echo '</tr>';
				?>				
		</tbody>				
	</table>
</div>
</div>
</div>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

</body>
</html>
