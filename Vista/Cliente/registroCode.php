<?php 

include '../Controller/Sesiones/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre_u"]) && isset($_POST["email"]) && isset($_POST["nombre_cliente"]) && isset($_POST["pass"])) {

        $nombre_u     = validar_campo($_POST["nombre_u"]);
        $email      = validar_campo($_POST["email"]);
        $nombre_cliente    = validar_campo($_POST["nombre_cliente"]);
        $pass   = validar_campo($_POST["pass"]);
        $id_rol = 1;

        if (UsuarioControlador::registrarUser($nombre_u, $email, $nombre_cliente, $pass, $id_rol)) {
            $sesiones             = UsuarioControlador::getNombre_cliente($nombre_cliente, $pass);
            $_SESSION["sesiones"] = array(
                "cod_cliente"     => $sesiones->getCod_cliente(),
                "nombre_u"          => $sesiones->getNombre_u(),
                "email"           => $sesiones->getEmail(),
                "nombre_cliente"  => $sesiones->getNombre_cliente(),
                "id_rol"          => $sesiones->getId_rol(),
                

              
            );

            header("location:admin.php");
        }

    }
    //cuando no se registre el error 
} else {
    header("location:registro.php?error=1");
}





 ?>