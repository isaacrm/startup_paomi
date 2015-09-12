<?php 
	session_start();
	if(isset($_SESSION['id'])){
		include('txt/consulta_tproducto.txt');
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
