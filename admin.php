<?php 
session_start();
include('dbconnect.php');
if(!isset($_SESSION['user']))
{
	header("location:index.php");
	exit;
}
	
if(isset($_SESSION['user']) && $_SESSION['user']!='ADMIN')
	{
		header("location:index.php");
		exit;
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
  
  <title>ADMIN</title>
					
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="#">
			WELCOME <?php echo $_SESSION['user']; ?>
			</a>
		<div>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#approved">
			Approved
			</button>
			<a class="btn btn-danger " href="logout.php">Logout</a>
		</div>
	</nav>
	
<div class="container">
	<div class="row mt-3 justify-content-center">
		<div class="col-13">
			<table id="mytable" class="table table-bordered table-striped mt-3">
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="approved" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Approved</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="container">
		<div class="row mt-3 justify-content-center">
		<div class="col-12">
			<table id="appr" class="table table-bordered table-striped mt-3">
			</table>
			</div>
			</div>
			</div>
	</div>
</div>
</div>
</div>

<div class="modal" id="approve">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Approve Record</h3>
          </div>
          <div class="modal-body">
            <p> Do You want to Approve the Record ?</p>
            <button type="button" class="btn btn-success" id="btn_final_approve" data-id2="ap_id">Approve</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>
	
	
<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

<script>
$(document).ready(function(){
	table();
	appr();
 $(document).on('click','#btn_approve',function()
    {
        var approve_id = $(this).attr('data-id');
        $('#approve').modal('show');
		console.log(approve_id)
		$('#btn_final_approve').data('data-id2', approve_id);//sending id value to approve button in the model
	});

        $(document).on('click','#btn_final_approve',function()
        {
			var approve_id = $('#btn_final_approve').data('data-id2');
			approve(approve_id);
		});
		
	function approve(approve_id)
	{
            $.ajax(
                {
                    url: 'approve.php',
                    method: 'post',
                    data:{app_id:approve_id},
                    success: function(data)
                    {
                        $('#approve').modal('hide');
						//alert("Approved");
						//window.location.reload();
						table();
						appr();
                    }
                });
    }
	function table()
	{
		$.ajax({
			url: "full_table.php",
			type: "POST",
			datatype: "html",
			success:function(data)
			{
				//$data=$.parseJSON(data);
				console.log(data);
				// load_table(data);
				$("#mytable").html(data);
			}
		});
	}
	
	function appr()
	{
		$.ajax({
			url: "m_approved.php",
			type: "POST",
			datatype: "html",
			success:function(data)
			{
			$("#appr").html(data);
			}
		});
	}

function load_table(table)
{
	console.log(1)
	var x="";
	var j=0;
	var i= new Array();
	// console.log(table)
	i = JSON.parse(table['data']);
	x+="<div class='container col-6 row mt-3 justify-content-center'>";
	x+="<table class='table table-bordered table-striped mt-3'>"
			+"<thead>"
				+"<tr>"
					+"<th>NAME</th>"
					+"<th>MOBILE</th>"
					+"<th>AADHAR</th>"
					+"<th>ADDRESS</th>"
					+"<th>TRANSPORT</th>"
					+"<th>CUSTOM/RANDOM</th>"
					+"<th>WHEELER</th>"
					+"<th>REGISTRATION NUMBER</th>"
					+"<th>IMAGE</th>"
					+"<th>APPROVE</th>"
				+"</tr>"
			+"</thead>"
			+"<tbody>";
			console.log(i)
	if(i['data'] && i['data'].length>0)
{
	console.log(2)
	for (var k = 0; k < i.data.length; k++) 
	{
		var row=i.data[k];
		console.log(row)
		x+="<tr>"
				+"<td>"+row.name+"</td>"
				+"<td>"+row.mobile+"</td>"
				+"<td>"+row.aadhar+"</td>"
				+"<td>"+row.address+"</td>"
				+"<td>"+row.transport+"</td>"
				+"<td>"+row.random_custom+"</td>"
				+"<td>"+row.wheeler+"</td>"
				+"<td>"+row.reg_number+"</td>"
				+"<td class='text-center'><img src='images/'+row.img+'' style='width:100px; height:100px;'></td>"
				+"<td><button class='btn btn-success' id='btn_approve' data-id='"+row.user_id+"'>APPROVE</button></td>"
			+"</tr>";
	}
}
else
{
		x+="<tr>"
			+"<td colspan='10'>No records found</td>"
			+"</tr>";
}
		x+="</tbody>"
			+"</table></div>";
		
	
$('#mytable').html(x);
}
});
</script>
</body>
</html>