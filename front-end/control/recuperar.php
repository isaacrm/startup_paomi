<?php

require_once("../conexion.php");
$conexion = conectaDB();
if(!empty($_POST)) {
    $correo = $_POST['correo'];
    $correo = trim($correo);
    $sql = $conexion->prepare("select id_cliente from clientes where correo_cliente='".$correo."'" );
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $filas) {
        $id_cliente = $filas['id_cliente'];
    }
        if ($id_cliente == "") {
            echo "<script>
			alert('Este correo electronico no esta asociado a ningun usuario');
			window.location.href='../recuperar.php';
		</script>";
        } else  {
            $num_caracteres = "10"; // asignamos el número de caracteres que va a tener la nueva contraseña
            $nueva_clave = substr(md5(rand()),0,$num_caracteres); // generamos una nueva contraseña de forma aleatoria
            $usuario_clave = $nueva_clave; // la nueva contraseña que se enviará por correo al usuario
            $usuario_clave2 = md5($usuario_clave); // encriptamos la nueva contraseña para guardarla en la BD

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
            $mail->Subject = "Recuperación de Contraseña";
            $mail->AltBody = "Hola, su contraseña se ha generado con éxito. \nSe  recomienda cambiar la contraseña cuando inicie sesión:.";
            $mail->MsgHTML("Inicie sesión con el usuario que asigno y la nueva contraseña que le brindamos. <br>Su Nueva Contraseña:<b>".$nueva_clave."</b>");
            $mail->AddAddress($correo, "Destinatario");
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Send();
            // actualizamos los datos (contraseña) del usuario que solicitó su contraseña
            $sql = $conexion->prepare("update clientes set  contrasena_cliente='" . $usuario_clave2. "' where id_cliente=" .$id_cliente);
            $sql->execute();

            header("Location: ../login-registro.php");
        }

}
?>