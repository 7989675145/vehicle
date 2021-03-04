<?php 
session_start();
include('dbconnect.php');
/*
if(!isset($_SESSION['user']))
{
	header("location:index.php");
	exit;
}*/
if(isset($item))
{
	if($item==1)
	{
		?>
		<script>
		alert("Insufficient Balance Please change the card");
		</script>
		<?php
	}
}
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
  
  <title>PAYMENT</title>
	<style>
  .jumbotron 
	{
    background: url("payment.jpg") center center;    
    width: 100%;
    height: 100%;
    background-size: cover;
    overflow: hidden;
	}
	</style>			
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="#">
			PAYMENT
			</a>
		<div>
			<a class="btn btn-danger " href="logout.php">Logout</a>
		</div>
	</nav>
	
<div class="container">
	<div class="row mt-3 justify-content-center">
		<div class="col-6">
		
				<table class="table table-bordered table-striped mt-3">
			<thead>
				<tr>
					<th>CARD NUMBER</th>
					<th>EXPIRY MONTH</th>
					<th>EXPIRY YEAR</th>
					<th>CVV</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				$res=mysqli_query($link,"select * from card_details");
				
				while($row=mysqli_fetch_assoc($res))
				{
					echo '<tr>';
					echo '<td>'.$row['card'].'</td>';
					echo '<td>'.$row['month'].'</td>';
					echo '<td>'.$row['year'].'</td>';
					echo '<td>'.$row['cvv'].'</td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>

		</div>
	</div>
</div>

<div class="container">
	<div class="row mt-3 justify-content-center">
		<div class="col-4">
			<div class="card text-center">
				<div class="card-header">
				 Enter Card Details
				</div>
				<div class="card-body">
			<form  action="payment_insert.php" method="POST">
				<label>Card Number</label>
				<select name="card" class="form-control mt-2" required/>
				<option value="">Card Number</option>
				<option value="7777888899994444" >7777888899994444</option>
				<option value="9999666633332222" >9999666633332222</option>
				<option value="1111222233334444" >1111222233334444</option>
				<option value="7777888844445555" >7777888844445555</option>
				</select>
				<label>Expiry Month</label>
				<select name="month" class="form-control mt-2" required/>
				<option value="">Month</option>
				<option value="01" >1</option>
				<option value="02" >2</option>
				<option value="03" >3</option>
				<option value="04" >4</option>
				<option value="05" >5</option>
				<option value="06" >6</option>
				<option value="07" >7</option>
				<option value="08" >8</option>
				<option value="09" >9</option>
				<option value="10" >10</option>
				<option value="11" >11</option>
				<option value="12" >12</option>
				</select>
				<label>Expiry Year</label>
				<select name="year" class="form-control mt-2" required/>
				<option value="">Year</option>
				<option value="2020" >2020</option>
				<option value="2021" >2021</option>
				<option value="2022" >2022</option>
				<option value="2023" >2023</option>
				<option value="2024" >2024</option>
				<option value="2025" >2025</option>
				<option value="2026" >2026</option>
				<option value="2027" >2027</option>
				<option value="2028" >2028</option>
				<option value="2029" >2029</option>
				<option value="2030" >2030</option>
				</select>
				<label>CVV</label>
				<input type="text" class="form-control mt-2" maxlength="3" id="cvv" name="cvv" required/>
				<label>AMOUNT</label>
				<input type="number" class="form-control mt-2" name="amount" value="<?php echo $_SESSION['pay']; ?>" readonly />
				<button type="submit" class="btn btn-primary mt-2" >Pay</button>
			</form>
		</div>
    </div>
  </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function({
	$("#cvv").keypress(function (e) 
	{		 
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		{
			alert("Please enter only Numbers.");
			return false;
		}
}))
</script>
</body>
</html>