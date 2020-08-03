<?php
require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.cliente.php');



if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
$modelo = new Conexion();
$connection = $modelo->conectarbd();
		$statement = $connection->prepare("
			INSERT INTO cliente (nombre_cliente, nombre_u) 
			VALUES (:nombre_cliente, :nombre_u)
		");
		$result = $statement->execute(
			array(
				':nombre_cliente'	=>	$_POST["nombre_cliente"],
				':nombre_u'	=>	$_POST["nombre_u"]
	
			)
		);
		if(!empty($result))
		{
			echo 'datos ingresados corectamente';
		}
	}






		if($_POST["operation"] == "Edit")
	{
	

	$modelo = new Conexion();
$connection = $modelo->conectarbd();
		$statement = $connection->prepare(
			"UPDATE cliente 
			SET nombre_cliente = :nombre_cliente, nombre_u = :nombre_u  
			WHERE cod_cliente = :cod_cliente
			"
		);
		$result = $statement->execute(
			array(
				':nombre_cliente'	=>	$_POST["nombre_cliente"],
				':nombre_u'	=>	$_POST["nombre_u"],
				':cod_cliente'	=>	$_POST["cod_cliente"]
			)
		);
		if(!empty($result))
		{
			echo 'datos editados correctamenete';
		}
	}


}

?>