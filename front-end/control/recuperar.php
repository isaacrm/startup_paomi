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
            $num_caracteres = "10"; // asignamos el n�mero de caracteres que va a tener la nueva contrase�a
            $nueva_clave = substr(md5(rand()),0,$num_caracteres); // generamos una nueva contrase�a de forma aleatoria
            $usuario_clave = $nueva_clave; // la nueva contrase�a que se enviar� por correo al usuario
            $usuario_clave2 = md5($usuario_clave); // encriptamos la nueva contrase�a para guardarla en la BD

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
            $mail->Subject = "Recuperaci�n de Contrase�a";
            $mail->AltBody = "Hola, su contrase�a se ha generado con �xito. \nSe  recomienda cambiar la contrase�a cuando inicie sesi�n:.";
            $mail->MsgHTML("Inicie sesi�n con el usuario que asigno y la nueva contrase�a que le brindamos. <br>Su Nueva Contrase�a:<b>".$nueva_clave."</b>");
            $mail->AddAddress($correo, "Destinatario");
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Send();
            // actualizamos los datos (contrase�a) del usuario que solicit� su contrase�a
            $sql = $conexion->prepare("update clientes set  contrasena_cliente='" . $usuario_clave2. "' where id_cliente=" .$id_cliente);
            $sql->execute();

            header("Location: ../login-registro.php");
        }

}
?>