<?php
	function conectaDB()
	{
		$con = new PDO('mysql:dbname=sheer_dbase2;host=127.0.0.1', 'root', '');
		return($con);
	}
?>