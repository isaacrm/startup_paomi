<?php
session_start();
if(isset($_SESSION['id_cliente']))
{
    session_unset();
    session_destroy();
    echo "
		<script type=\"text/javascript\" >
		    setTimeout(\"location.href='../login-registro.php'\",100);
		</script>";
    exit();
}
else
{
    echo "
		<script type=\"text/javascript\" >
		    setTimeout(\"location.href='../login-registro.php'\",100);
		</script>";
}

?>