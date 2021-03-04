<?php 
session_start();
include('dbconnect.php');
/*
if(!isset($_SESSION['user']))
{
	header("location:index.php");
	exit;
}*/
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
  .jumbotron 
	{
    background: url("welcome.jpg") center center;    
    width: 100%;
    height: 100%;
    background-size: cover;
    overflow: hidden;
	}
	.table > thead > tr > th, .table > tbody > tr > th, .table > thead > tr > td, .table > tbody > tr > td {

        padding: 1px !important; // currently 8px
    }
	</style>			
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="#">
			WELCOME DEAR CUSTOMER
			</a>
		<div>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_register">
			REGISTER HERE
			</button>
			<a class="btn btn-danger " href="logout.php">Logout</a>
		</div>
	</nav>
<img src="welcome.jpg" class="jumbotron" alt="WELCOME">

<div class="modal fade" id="modal_register" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">REGISTRATION FORM</h5>
        <button type="button" class="close" id="btn_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <p id='message'></p>
	  <form id="register" action="register_insert.php" method="POST">
			<label>Name</label>
			<input type="text" class="form-control mt-2" id="name" name="name" placeholder="Name" required/><br>
			<label>Chasis Number</label>
			<input type="text" class="form-control mt-2" maxlength="10" id="chasis" name="chasis" placeholder="Chasis Number" required/><br>
			<label>Engine Number</label>
			<input type="text" class="form-control mt-2" maxlength="10" id="engine" name="engine" placeholder="Engine Number" required/><br>
			<label>Wheeler</label>
			<select name="wheeler" class="form-control wheeler selectFilter" data-target="company" id="wheeler" required/>
			<option value="">Select</option>
			<option data-ref="Two">Two Wheeler</option>
			<option data-ref="Four">Four Wheeler</option>
			</select><br>
			<label>Company</label>
			<select name="company" class="form-control company selectFilter" id="companytwo" required/><br>
			<option value="-1">Select</option>
			<option data-belong="Two" value="HONDA">HONDA</option>
			<option data-belong="Two" value="HERO">HERO</option>
			<option data-belong="Two" value="BAJAJ">BAJAJ</option>
			<option data-belong="Two" value="TVS">TVS</option>
			<option data-belong="Four" value="TOYOTA">TOYOTA</option>
			<option data-belong="Four" value="TATA">TATA</option>
			<option data-belong="Four" value="GM">GM</option>
			<option data-belong="Four" value="TESLA">TESLA</option>
			</select><br>
			<label>Transport</label>
			<select name="transport" class="form-control mt-2" id="transport" required/><br>
			<option value="">Select</option>
			<option value="TRANSPORT">TRANSPORT</option>
			<option value="NON-TRANSPORT">NON-TRANSPORT</option>
			</select><br>
			<label>Select Number</label>
			<select name="random_custom" class="form-control mt-2" id="num_type" required/>
			<option value="">Select</option>
			<option value="RANDOM">RANDOM</option>
			<option value="CUSTOM">CUSTOM</option>
			</select><br>
			<input type="text" name="num" class="reg" id="reg"  readonly /><br>
			<label>Address</label><br>
			<textarea rows="4" cols="50" name="address"></textarea><br>
			<label>Image</label>
			<input type="file" name="uploadfile"><br>
			<center><button type="submit" class="btn btn-primary mt-2"  id="pay">Pay</button></center>
		</form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="custom_number" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Custom Number</h5>
        <button type="button" class="close" id="btn_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="container">
	<div class="row mt-3 justify-content-center">
		<div class="col-12">
			<table id="mytable" class="table table-bordered table-striped mt-3">
			<thead>
				<tr>
					<th colspan="11">Choose your number</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$j=1000;
				while($j<=2000)
				{
					$i=0;
					echo '<tr>';
					while($i<=10)
					{
						$num="";
						$s="SELECT COUNT(number) as num FROM reg_number WHERE number=($j+$i)";
						$res=mysqli_query($link,$s);
						$data=mysqli_fetch_assoc($res);
						if($data['num']!=1)
						{
						?>
							<td><button class='btn btn-success id' id='<?php echo ($j+$i); ?>'><?php echo ($j+$i);?></button></td>
						<?php
						}						
					$i++;					
					}
					echo '</tr>';
					$j=($j+11);
				}
			?>
			</tbody>
		</table>
		</div>
	</div>
</div>
</div>
    </div>
  </div>
</div>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

<script src="selectFilter.min.js"></script>

<script>
$(document).ready(function(){
$('.reg').hide();
$(document).on('click','#num_type',function()
	{
		if($("#num_type").val()=="CUSTOM")
		{
			$('#custom_number').modal('show');
			//$('#mytable').DataTable();
			//$('#num').show();
		}
	});
	
$(document).on('click','.id',function()
{
	var s = $(this).attr('id');
	$('#custom_number').modal('hide');
	$('.reg').val(s);
	$('.reg').show();
	console.log(s)
	//$('input:hidden').val(s);
});

$("#chasis").keypress(function (e) 
	{		 
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		{
			alert("Please enter only Numbers.");
			return false;
		}
	});	
	$("#engine").keypress(function (e) 
	{		 
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		{
			alert("Please enter only Numbers.");
			return false;
		}
	});
});	
</script>
	</body>
</html>