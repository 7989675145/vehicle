<?php
session_start();
if(isset($_SESSION['valid']))
{
	if($_SESSION['valid']==false)
	{
?>
		<script>
		alert("Wrong Credentails");
		</script>
<?php 
	}
	if($_SESSION['valid']==1)
	{
?>
		<script>
		alert("Registered Successfully");
		</script>
<?php	
	}
	if($_SESSION['valid']==2)
	{
?>
		<script>
		alert("Already Registered Please Login");
		</script>
<?php	
	}
	session_destroy();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	
	<title>RTO</title>
	<style>
	.login-form
	{	
		padding-top:10%;
	}
	.jumbotron 
	{
    background: url("img.jpg") center center;    
    width: 100%;
    height: 100%;
    background-size: cover;
    overflow: hidden;
	}
	</style>
</head>

<body>
<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Welcome to RTO Online</a>
		
		<ul class="nav justify-content-end">
  <li class="nav-item">
    <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#admin">
	LOGIN</button>
  </li>
  <li class="nav-item">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">
		REGISTER
	</button>
  </li>
</ul>
		
	</nav>
	
	
<img src="img.jpg" class="jumbotron" alt="RTO">	


<div class="modal fade" id="admin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">LOGIN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<div class="row mt-9 justify-content-center login-form">
		<div class="col-7">
			<div class="card border-0">
				
			<div class="card-body">
				<form action="login_check.php" method="POST">
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="name" required/>
				 </div>
				 <div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="pwd" required/>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-info mt-2 " >Login</button>
					</div>
				</form>
			</div>
  </div>
</div>
</div>
</div>
    </div>
  </div>
</div>



<div class="modal fade" id="register" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">REGISTRATION FORM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<div class="row mt-9 justify-content-center login-form">
		<div class="col-9">
			<div class="card border-0">
				
			<div class="card-body">
				<form method="POST" id='form' action="customer_login_check.php">
				<div class="form-group">
					<label>Mobile</label>
					<input type="text" class="form-control" id="mobile" minlength="10" maxlength="10" name="mobile" placeholder="Mobile Number" required/>
				 </div>
				 <div class="form-group">
					<label>Aadhar Number</label>
					<input type="text" class="form-control" id="aadhar" maxlength="12" name="aadhar" placeholder="Aadhar Number" required/>
				</div>
				<div class="text-center">
					<button type="button" class="btn btn-info mt-2" id="login">Login</button>
					</div>
				</form>
			</div>
  </div>
</div>
</div>
</div>
    </div>
  </div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
	
<script>
$("#mobile").keypress(function (e) 
	{		 
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		{
			alert("Please enter only Numbers.");
			return false;
		}
	});	
	$("#aadhar").keypress(function (e) 
	{		 
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
		{
			alert("Please enter only Numbers.");
			return false;
		}
	});
	$(document).on('click','#login',function()
	{
		if($("#mobile").val().length!=10)
			{
			   alert("Invalid mobile number");
			   return false;
			} 
		if($("#aadhar").val().length!=12)
			{
			  alert("Invalid aadhar number");
			  return false;
			} 
		$('#form').submit();
	});
	
</script>
    
  </body>
</html>