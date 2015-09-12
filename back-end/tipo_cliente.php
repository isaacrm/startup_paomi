<?php 
	session_start();
	if(isset($_SESSION['id'])){
		include('txt/tipo_cliente.txt');
	}
	else
	{
		echo '
 			<script>
				alert("No ha iniciado sesion");
 			</script>
		';
		header("location: ../login.php");
	}
 ?>
