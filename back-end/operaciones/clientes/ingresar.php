<?php
session_start();
if(!isset($_SESSION['id'])){
	header('Location: ../../control/Login.php');
	exit();
}
?>
<?php
	require_once("../../conexion.php");
	$conexion = conectaDB(); //establecer conexion en base de datos
	if(!empty($_POST)) {
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$fecha = $_POST['fecha'];
	$direccion = $_POST['direccion'];
	$dui = $_POST['dui'];
	$usuario = $_POST['usuario'];
	$correo = $_POST['correo'];
	$contraseña = $_POST['contra'];
	$tipo = $_POST['tipo'];
	$sql_query = $conexion->prepare("insert into clientes (nombre_cliente, apellidos_cliente, fecha_nacimiento, Dui_cliente, direccion_cliente, correo_cliente, nombre_usuario, contrasena_cliente, id_tipo_cliente)values(?,?,?,?,?,?,?,?,?)");
	$sql_query->bindParam(1, $nombre);
	$sql_query->bindParam(2, $apellido);
	$sql_query->bindParam(3, $fecha);
	$sql_query->bindParam(4, $dui);
	$sql_query->bindParam(5, $direccion);
	$sql_query->bindParam(6, $correo);
	$sql_query->bindParam(7, $usuario);
	$sql_query->bindParam(8, $contraseña);
	$sql_query->bindParam(9, $tipo);
	if ($sql_query->execute() > 0) {
		header("location: ver.php");
	}
}
?>

<?php include '../../maestros/cabecera.php' ?>
<?php include '../../maestros/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Agregar Datos de Clientes
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container" style="overflow-Y:scroll; height:auto; width:100%;">
		<form action="#" method="POST" class="container">
			<div class="form-group">
				<label for="">Nombre</label>
				<input type="text" class="form-control" name="nombre" placeholder="Nombre" required/>
			</div>
			<div class="form-group">
				<label for="">Apellido</label>
				<input type="text" class="form-control" name="apellido" placeholder="Apellido" required/>
			</div>
			<div class="form-group">
				<label for="">Fecha de nacimiento</label>
				<input type="date" class="form-control" name="fecha" required/>
			</div>
			<div class="form-group">
				<label for="">Direccion</label>
				<input type="text" class="form-control" name="direccion" placeholder="Direccion" required/>
			</div>
			<div class="form-group">
				<label for="">DUI cliente</label>
				<input type="text" class="form-control"  maxlength="10" name="dui" placeholder="DUI" required/>
			</div>
			<div class="form-group">
				<label for="">Usuario</label>
				<input type="text" class="form-control" name="usuario" placeholder="Nombre Usuario" required/>
			</div>
			<div class="form-group">
				<label for="">Correo</label>
				<input type="email" class="form-control"  name="correo" placeholder="Correo"  pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required/>
			</div>
			<div class="form-group">
				<label for="">Contraseña</label>
				<input type="password" class="form-control" name="contra" placeholder="Contraseña" required/>
			</div>
			<div class="form-group">
				<label for="">Tipo cliente</label>
				<select class="form-control" name="tipo">
					<?php
					require_once("../../conexion.php");
					$db = conectaDB();
					$sql = $db->prepare("select id_tipo_cliente, tipo_cliente from tipo_cliente");
					$sql->execute();
					$resultado = $sql->fetchAll();
					foreach ($resultado as $fila) {
						echo '
		  					 <option value='.$fila['id_tipo_cliente'].'>'.$fila['tipo_cliente'].'</option>
		  				';
					}
					?>
				</select>
			</div>
			<button type="submit" class="btn btn-danger">Ingresar</button>
			<a href="ver.php" class="btn btn-danger">Regresar</a>
		</form>
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include '../../maestros/footer.php' ?>
