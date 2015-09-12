<?php
session_start();
if(!isset($_SESSION['id'])){
	header('Location: ../../control/Login.php');
	exit();
}
?>
<?php include '../../maestros/cabecera.php' ?>
<?php include '../../maestros/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Empleados
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container" style="overflow-Y:scroll; height:300px; width:100%;">
			<table class="table table-bordered" >
				<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Direccion</th>
					<th>DUI</th>
					<th>Usuario</th>
					<th>Correo</th>
					<th>Operaciones</th>
				</tr>
				</thead>
				<?php
				require_once("../../conexion.php");
				$conexion = conectaDB();
				require '../../libs/Zebra_Pagination.php';
				$sql = $conexion->prepare("select count(*) from empleados ");
				$sql->execute();
				$contador = $sql->fetchColumn(0);
				/*Numero de registros que se quiere por tabla*/
				$filas = 10;
				$paginacion = new Zebra_Pagination();
				$paginacion->records($contador);
				$paginacion->records_per_page($filas);
				$paginacion->padding(false);
				$sql = $conexion->prepare('select * from empleados LIMIT '. (($paginacion->get_page() - 1) * $filas) . ', ' . $filas);
				$sql->execute();
				$resultado = $sql->fetchAll();
				foreach ($resultado as $filas) {
					echo '
		 				<tbody>
					        <tr>
					            <td>'.$filas['nombres_empleado'].'</td>
					            <td>'.$filas['apellidos_empleado'].'</td>
					            <td>'.$filas['direccion_empleado'].'</td>
					            <td>'.$filas['DUI_empleado'].'</td>
					            <td>'.$filas['usuario_empleado'].'</td>
					            <td>'.$filas['correo_empleado'].'</td>
					            <td><p><a href="modificar_empleados.php?id='.$filas['id_empleado'].'" class="btn btn-danger">Modificar</a> <a href="eliminar_empleado.php?id='.$filas['id_empleado'].'" class="btn btn-danger">Eliminar</a></p></td>
					        </tr>
					    </tbody>
		 			';
				}
				?>
			</table>
			<?php $paginacion->render();?>
		</div>

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include '../../maestros/footer.php' ?>
