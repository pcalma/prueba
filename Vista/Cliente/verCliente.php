<?php 
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.cliente.php');
 ?>


<?php include 'Vista_p/partials/headTable.php';?>
<?php include 'Vista_p/partials/nav_vertical.php';?>

<?php include 'Vista_p/partials/nav_top.php';?>


<div class="container-fluid" style="padding: 8px 40px;">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Clientes</h1>
          <p class="mb-4">Encontraras todos los clientes registrados con la docmumentacion completa</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style="color: #610B5E;">Clientes </h6>
            </div>

            <div class="card-body">





      <div class="table-responsive">
        <br />
        <div align="right">
          <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
        </div>
        <br /><br />
        <table id="myTable" class="table table-bordered" width="90%">
          <thead>
            <tr>
          
              <th width="5%">Cod cliente</th>
              <th width="25%">Nombre cliente</th>
              <th width="20%">Email</th>
              <th width="10%">tel_cliente</th>
              <th width="20%">nombre_u</th>      
              <th width="10%">Edit</th>
              <th width="13%">Delete</th>
            </tr>
          </thead>
        </table>
        
      </div>
    </div>
        </div>
            </div>
            

<?php include 'Vista_p/partials/footerTable.php';?>

