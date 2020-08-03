<?php include 'Vista_p/partials/head.php';?>

<?php include 'Vista_p/partials/nav_vertical.php';?>

<?php include 'Vista_p/partials/nav_top.php';?>



  <div class="container">

    <div class="card o-hidden  shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">

          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create register user!</h1>
              </div>

<!---10607   LINEA DE UPDATE FORM   ---- id_rol,genero,fecha_registro-->


<form class="user" method="post" action="../../Controller/Cliente/insertarCliente.php" >

  <div class="form-group">
  <input type="perros" class="form-control" id="perros" placeholder="perros" name="perros">
  </div>
<div class="form-group row">




  <div class="col-sm-6 mb-3 mb-sm-0">
    <label for="apellido_cliente">Registre el apellido_cliente:</label>
    <input name="apellido_cliente" required type="text" id="apellido_cliente" placeholder="Escriba el apellido_cliente..." class="form-control">
  </div>

  <div class="col-sm-6">  
    <label for="cedula">Registre el cedula:</label>
    <input name="cedula" required type="text" id="cedula" placeholder="Escriba el cedula..." class="form-control">
  </div>
</div>


<div class="form-group row">

  <div class="col-sm-6 mb-3 mb-sm-0">

    <label for="edad">Registre el edad:</label>
    <input name="edad" required type="number" id="edad" placeholder="Escriba el edad..." class="form-control">
  </div>


    <br><br>

<div class="col-sm-6"> 
    <label for="email">Registre el email:</label>
    <br>
    <input name="email" required type="email" id="email" placeholder="Escriba el email..." class="form-control">
</div>
</div>

<div class="form-group row">

  <div class="col-sm-6 mb-3 mb-sm-0">
    <label for="estado">Registre el estado:</label>
    <br>
    <input name="estado" required type="estado" id="estado" placeholder="Escriba el estado..." class="form-control">
  </div>
<div class="col-sm-6"> 
    <label for="fecha_nacimiento">Registre el fecha_nacimiento:</label>
    <br>
    <input name="fecha_nacimiento" required type="date" id="fecha_nacimiento" placeholder="Escriba el nombre..." class="form-control">
  </div>
</div>

<div class="form-group row">

  <div class="col-sm-6 mb-3 mb-sm-0">
    <label for="fecha_registro">Registre el fecha_registro:</label>
    <br>
    <input name="fecha_registro" required type="date" id="fecha_registro" placeholder="Escriba el nombre..." class="form-control">
</div>

<div class="col-sm-6"> 
    <label for="genero">Género</label>
    <select name="genero" required name="genero" id="genero">
      <option value="">--Selecciona--</option>
      <option value="1">femenino</option>
      <option value="2">masculino</option>
    
    </select>
</div>
</div>

<div class="form-group row">

  <div class="col-sm-6 mb-3 mb-sm-0">


    <label for="id_rol">id_rol</label>
    <select name="id_rol" required name="id_rol" id="id_rol">
      <option value="">--Selecciona rol--</option>
      <option value="1">1</option>
      <option value="2">2</option>
    
    </select>
</div>

<div class="col-sm-6"> 
    <label for="nombre_cliente">Registre el nombre_cliente:</label>
    <br>
    <input name="nombre_cliente" required type="nombre_cliente" id="nombre_cliente" placeholder="Escriba el nombre_cliente..." class="form-control">
</div>
</div>

<div class="form-group row">

  <div class="col-sm-6 mb-3 mb-sm-0">

    <label for="nombre_u">Registre el nombre_u:</label>
    <br>
    <input name="nombre_u" required type="nombre_u" id="nombre_u" placeholder="Escriba el nombre_u..." class="form-control">
</div>
<div class="col-sm-6"> 
    <label for="pass">Registre el pass:</label>
    <input name="pass" required type="pass" id="pass" placeholder="Escriba el pass..." class="form-control">
</div>
</div>
<div class="form-group row">

  <div class="col-sm-6 mb-3 mb-sm-0">

    <label for="pass2">Registre el pass2:</label>
    <br>
    <input name="pass2" required type="pass" id="pass2" placeholder="Escriba el pass2..." class="form-control">
</div>
<div class="col-sm-6"> 
    <label for="tel_cliente">Registre el tel_cliente:</label>
    <input name="tel_cliente" required type="text" id="tel_cliente" placeholder="Escriba el tel_cliente..." class="form-control">
</div>
</div>


<input type="submit" value="registrar cliente" class="btn btn-warning btn-block">

  </form>
              <hr>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<?php include 'Vista_p/partials/footer.php';?>
