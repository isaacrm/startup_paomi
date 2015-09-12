<?php
	session_start();
    if(isset($_SESSION['id']))
  	{
		session_unset();
		session_destroy();
		echo "	
		<script type=\"text/javascript\" >
		    setTimeout(\"location.href='../login.php'\",100);
		</script>";
		exit();
	}
	else
	{
	     echo "	
		<script type=\"text/javascript\" >
		    setTimeout(\"location.href='../login.php'\",100);
		</script>";
	}

?>