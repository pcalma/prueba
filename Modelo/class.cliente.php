<?php

class ConsultasClientes{
	/*se crea la funcion y los parametros necesarios para ingresar a la bd*/
	public function insertarCliente( $arg_apellido_cliente,$arg_cedula,$arg_edad,$arg_email,$arg_estado,$arg_fecha_nacimiento,$arg_fecha_registro,$arg_genero,$arg_id_rol,$arg_nombre_cliente,$arg_nombre_u,$arg_pass,$arg_pass2,$arg_tel_cliente){
/*creo un objeto de la clse Conexion como no requiere un parametro se deja asi(), se crea una variable $conexion y le digo que va a ser = al modelo y llamo el metodo conectarbn()
- creo un objeto de conexion que se guarda en modelo y despues creo una variable $conexion y e digo hay voy a guardar ka conexion*/
		$modelo = new Conexion();
		$conexion = $modelo->conectarbd();

		/*creamos la consulta- se ingresa la query */
		$sql = "INSERT INTO cliente( apellido_cliente, cedula,edad,email,estado,fecha_nacimiento,fecha_registro,genero,id_rol,nombre_cliente,nombre_u,pass,pass2,tel_cliente)   
		                    VALUES (:apellido_cliente,:cedula,:edad,:email,:estado,:fecha_nacimiento,:fecha_registro,:genero,:id_rol,:nombre_cliente,:nombre_u,:pass,:pass2,:tel_cliente)";
		/*se prepara la consulta binPram(para vincular las variables de PHP a los marcadores de parámetros: las variables enlazadas pasan su valor como entrada y reciben el valor de salida, si corresponde, de sus marcadores de parámetros asociados) y evitamos sql iyecion*/

		$statement=$conexion->prepare($sql);
		
		$statement->bindParam(':apellido_cliente',$arg_apellido_cliente);
		$statement->bindParam(':cedula',$arg_cedula);
		$statement->bindParam(':edad',$arg_edad);
		$statement->bindParam(':email',$arg_email);
		$statement->bindParam(':estado',$arg_estado);		
		$statement->bindParam(':fecha_nacimiento',$arg_fecha_nacimiento);
		$statement->bindParam(':fecha_registro',$arg_fecha_registro);
		$statement->bindParam(':genero',$arg_genero);
		$statement->bindParam(':id_rol',$arg_id_rol);
		$statement->bindParam(':nombre_cliente',$arg_nombre_cliente);
		$statement->bindParam(':nombre_u',$arg_nombre_u);
		$statement->bindParam(':pass',$arg_pass);
		$statement->bindParam(':pass2',$arg_pass2);
		$statement->bindParam(':tel_cliente',$arg_tel_cliente);

		if (!$statement) {
			return "error al crear el registro";
		}else{
			$statement->execute();
			return "Registro creado correctamente";
		}

	}

		/*se crea la funcion y los parametros necesarios para ingresar a la bd*/

	public function cargarCliente(){
		$rows = null;
		$modelo = new Conexion();
			$conexion = $modelo->conectarbd();
			$sql="select * from cliente";
			$statement = $conexion->prepare($sql);
			$statement->execute();
			/*vamos a crear el resultado*/
			while ($result = $statement->fetch()){
				$rows[]=$result;
			}
return $rows;
	}

public function buscarClientes($arg_nombre_cliente){
	        $rows = null;
		    $modelo = new Conexion();
			$conexion = $modelo->conectarbd();
			$nombre_cliente ="%".$arg_nombre_cliente."%";
			$sql="select * from cliente where nombre_cliente like :nombre_cliente";
			$statement = $conexion->prepare($sql);
			$statement->bindParam(":nombre_cliente",$nombre_cliente);
			$statement->execute();
			/*vamos a crear el resultado*/
			while ($result = $statement->fetch()){
				$rows[]=$result;
			}
            return $rows;


}

public function eliminarCliente($arg_cod_cliente){
	$modelo = new Conexion();
	$conexion = $modelo->conectarbd();
	$sql = "delete from cliente where cod_cliente =:cod_cliente";
	$statement = $conexion->prepare($sql);
	$statement->bindParam(':cod_cliente',$arg_cod_cliente);
	if (!$statement) {
		return "Error al eliminar el cliente";
		# code...
	}else{
		$statement->execute();
		return "Producto eliminado correctamente";
	}
}
	

	public function cargarUnCliente($arg_cod_cliente){
			$rows = null;
		$modelo = new Conexion();
			$conexion = $modelo->conectarbd();
			$sql="select * from cliente where cod_cliente =:cod_cliente";
			$statement = $conexion->prepare($sql);
			$statement->bindParam(":cod_cliente",$arg_cod_cliente);
			$statement->execute();
			/*vamos a crear el resultado*/
			while ($result = $statement->fetch()){
				$rows[]=$result;
			}
               return $rows;

}



public function modificarCliente($arg_campo,$arg_valor,$arg_cod_cliente){

$modelo = new Conexion();
			$conexion = $modelo->conectarbd();
			$sql ="update cliente set $arg_campo = :valor where cod_cliente = :cod_cliente ";
			$statement =$conexion->prepare($sql);
			$statement->bindParam(":valor",$arg_valor);
			$statement->bindParam(":cod_cliente",$arg_cod_cliente);
			if (!$statement) {
				return "Error al modificar el producto ";
			}else{
				$statement ->execute();
				return "producto modificado correctamente";
			}
}
function get_total_all_records()
{

	$modelo = new Conexion();
    $connection = $modelo->conectarbd();
	$statement = $connection->prepare("SELECT * FROM cliente");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}


}
?>
