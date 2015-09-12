<?php 
	session_start();
	if(isset($_SESSION['id'])){
		include('txt/mod_cargo.txt');
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
