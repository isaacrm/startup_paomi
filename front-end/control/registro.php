<?php
require_once("../conexion.php");
$conexion = conectaDB(); //establecer conexion en base de datos
if(!empty($_POST)) {
    $nombre = $_POST['nombre_cliente'];
    $apellido = $_POST['apellido_cliente'];
    $fecha = $_POST['fecha_nacimiento'];
    $direccion = $_POST['domicilio'];
    $dui = $_POST['dui'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['email'];

    $num_caracteres = "10"; // asignamos el número de caracteres que va a tener la nueva contraseña
    $nueva_clave = substr(md5(rand()),0,$num_caracteres); // generamos una nueva contraseña de forma aleatoria
    $usuario_clave = $nueva_clave; // la nueva contraseña que se enviará por correo al usuario
    $usuario_clave2 = md5($usuario_clave); // encriptamos la nueva contraseña para guardarla en la BD

    $sql_query = $conexion->prepare("insert into clientes (nombre_cliente, apellidos_cliente, fecha_nacimiento, Dui_cliente, direccion_cliente, correo_cliente, nombre_usuario, contrasena_cliente)values(?,?,?,?,?,?,?,?)");
    $sql_query->bindParam(1, $nombre);
    $sql_query->bindParam(2, $apellido);
    $sql_query->bindParam(3, $fecha);
    $sql_query->bindParam(4, $dui);
    $sql_query->bindParam(5, $direccion);
    $sql_query->bindParam(6, $correo);
    $sql_query->bindParam(7, $usuario);
    $sql_query->bindParam(8, $usuario_clave2);

    if ($sql_query->execute() > 0) {
//Enviamos por correo
        include("../libs/class.phpmailer.php");
        include("../libs/class.smtp.php");
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->Username = "winefunofficial@gmail.com";
        $mail->Password = "winefun123";
        $mail->From = "winefunofficial@gmail.com";
        $mail->FromName = "SHEER";
        $mail->Subject = "Su Contraseña";
        $mail->AltBody = "Hola, su contraseña se ha generado con éxito. \nSe  recomienda cambiar la contraseña cuando inicie sesión:.";
        $mail->MsgHTML("Inicie sesión con el usuario que asigno y la contraseña que le brindamos. <br>Su Contraseña es:<b>".$nueva_clave."</b>");
        $mail->AddAddress($correo, "Destinatario");
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Send();

        echo "<script>
			alert('Confirmar su registro en su correo');
			window.location.href='../login-registro.php';
		</script>";
    }
    else{
        echo "<script>
			alert('Hubo un error');
			window.location.href='../login-registro.php';
		</script>";
    }
}
?>