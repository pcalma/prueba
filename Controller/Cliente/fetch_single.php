<?php

require_once('../../Modelo/class.conexion.php');
require_once('../../Modelo/class.cliente.php');

if(isset($_POST["cod_cliente"]))
{
	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM cliente 
		WHERE cod_cliente = '".$_POST["cod_cliente"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nombre_cliente"] = $row["nombre_cliente"];
		$output["nombre_u"] = $row["nombre_u"];

	}
	echo json_encode($output);
}
?>