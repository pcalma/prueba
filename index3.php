<?php 
require_once('Modelo/class.conexion.php');
require_once('Modelo/class.cliente.php');
 ?>

<html>
	<head>
		<title>PDO PAULITA </title>



    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

    <link rel="stylesheet" type="text/css" href="librerias/datatable/bootstrap.min.css">

   <link rel="stylesheet" type="text/css" href="librerias/datatable/dataTables.bootstrap.min.css">
   <script src="librerias/jquery-3.2.1.min.js"></script>
   <script src="librerias/bootstrap/js/bootstrap.js"></script>
   <script src="librerias/alertifyjs/alertify.js"></script>
   <script src="librerias/select2/js/select2.js"></script>

   <script src="librerias/datatable/dataTables.bootstrap.min.js"></script>
   <script src="librerias/datatable/jquery.dataTables.min.js"></script>



    <script src="librerias/datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="librerias/datatable/buttons/jszip.min.js"></script>
    <script src="librerias/datatable/buttons/pdfmake.min.js"></script>
    <script src="librerias/datatable/buttons/vfs_fonts.js"></script>
    <script src="librerias/datatable/buttons/buttons.html5.min.js"></script>



		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
	</head>
	<body>
		<div class="container box">
			<h1 align="center">PHP PDO PAULA Modals</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
					
							<th width="">Cod cliente</th>
							<th width="">Nombre cliente</th>
							<th width="">Email</th>
							<th width="">tel_cliente</th>
							<th width="">nombre_u</th>      
							<th width="">Edit</th>
							<th width="">Delete</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add User</h4>
				</div>
				<div class="modal-body">
					<label>Nombre usuario</label>
					<input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" />
					<br />
					<label>nombre U</label>
					<input type="text" name="nombre_u" id="nombre_u" class="form-control" />

				</div>
				<div class="modal-footer">
					<input type="hidden" name="cod_cliente" id="cod_cliente" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
$('#add_button').click(function(){

$('#user_form')[0].reset();
$('.modal-title').text("Titulo del modal :) add");
$('#action').val("Add");
$('#operation').val("Add");

		});

	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"ajax":{
			url:"Controller/Cliente/fetch.php",
			type:"POST"
		},
		"columnDefs": [ { 
 "searchable": false,
  "orderable": false,
   "targets": 0 } ],
    "order": [[ 1, 'asc' ]] 

});



	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var nombre_cliente = $('#nombre_cliente').val();
		var nombre_u = $('#nombre_u').val();
	
		if(nombre_cliente != '' && nombre_u != '')
		{
			$.ajax({
				url:"Controller/Cliente/insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();

					$('#userModal').modal('hide');
					dataTable.ajax.reload();


				}

			});
//document.location = "index.php";(REDIRECCIONAR)
		}

		else
		{
			alert("Both Fields are Required");
		}	
	});

	$(document).on('click', '.update', function(){
		var cod_cliente = $(this).attr("cod_cliente");
		$.ajax({
			url:"Controller/Cliente/fetch_single.php",
			method:"POST",
			data:{cod_cliente:cod_cliente},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#nombre_cliente').val(data.nombre_cliente);
				$('#nombre_u').val(data.nombre_u);
				$('.modal-title').text("Edit User");
				$('#cod_cliente').val(cod_cliente);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var cod_cliente = $(this).attr("cod_cliente");
		if(confirm("estas seguro de eliminar?"))
		{
			$.ajax({
				url:"Controller/Cliente/delete.php",
				method:"POST",
				data:{cod_cliente:cod_cliente},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});

	});	
	
</script>