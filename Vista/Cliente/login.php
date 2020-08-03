
<?php include 'Vista_p/partials/headLogin.php';?>
<?php include 'Vista_p/partials/menu.php';?>

<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="loginForm" action="validarCode.php" method="POST" role="form">
							<legend>Iniciar sesión</legend>

							<div class="form-group">
								<label for="nombre_cliente">nombre_cliente</label>
								<input type="text" name="nombre_cliente" class="form-control" id="nombre_cliente" autofocus required placeholder="usuario">
							</div>

							<div class="form-group">
								<label for="pass">pass</label>
								<input type="password" name="pass" class="form-control" required id="pass" placeholder="****">
							</div>

							<button type="submit" class="btn btn-success">Ingresar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

  <?php include 'Vista_p/partials/footerLogin.php';?>