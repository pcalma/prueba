
<?php include 'Vista_p/partials/head.php';?>


<?php include 'Vista_p/partials/nav_vertical.php';?>

<?php include 'Vista_p/partials/nav_top.php';?>



<?php 
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.cliente.php');
require_once('../../Controller/Cliente/tabla.php');
 ?>







<!-- /.container -->
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


<form class="table table-bordered">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
     <form method= "get" >

<div class="input-group "  >
  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" name="buscar">
 

  <div class="input-group-append">
<input type="submit" value="buscar" >


</div>
</div>
</form>   
    </div>




    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
      <?php include 'modalDelete.php';?>

      <input   type='button' class='form-control btn btn-warning' data-toggle='modal' data-target='#paula' value="Agregar Usuario" > 
    </div>




  </div>
</form>










<table class="table table-bordered" id="myTable" width="90%" style="border-radius: 20%;"> 
  <thead>


<tr class="header">
  <?php 

if (isset($_GET['buscar'])){
  buscar($_GET['buscar']);
  # code...
}else{ 

  cargar();
}
   ?>


   </tr>
</thead>

<tfoot>
<tr class="header">
<th>cod</th>
<th>Rol</th>
<th>Nombre</th>
<th>Apellido</th>
<th>user</th>
<th>Cedula</th>
<th>E-mail</th>
<th >cel</th>
<th>Edad</th>
<th>Estado</th>
<th>F_nacimiento</th>
<th>F_registro</th>
<th>Genero</th>
<th>Editar</th>
<th>Eliminar</th>
                    </tr>
                  </tfoot>


   <?php include 'modalEdit.php';?>


      </table>


                 </div>
            </div>

          </div>

        </div>



     <div>

      

    <a href="registrar.php">nuevo Cliente</a>
     <a href="cerrar-session.php" class="btn btn-primary btn-lg">cerrar sessión</a>

   </div>

  <?php include 'Vista_p/partials/footer.php';?>