<?php
session_start();
if(!isset($_SESSION['id'])){
	header('Location: ../../control/Login.php');
	exit();
}
?>
<?php include '../../maestros/cabecera.php' ?>
<?php include 'buscar.php' ?>
<?php include '../../maestros/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Productos
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<a href="ingresar.php" class="btn btn-primary">Nuevo</a>
			<table class="table table-striped table-bordered table-hover" >
				<thead>
				<tr>
					<th>Producto</th>
					<th>Precio</th>
					<th>Marca</th>
					<th>Tipo</th>
					<th>Operaciones</th>
				</tr>
				</thead>
				<?php
				require_once("../../conexion.php");
				$conexion = conectaDB();
				require '../../libs/Zebra_Pagination.php';
				$sql = $conexion->prepare("select count(*) from productos");
				$sql->execute();
				$contador = $sql->fetchColumn(0);
				/*Numero de registros que se quiere por tabla*/
				$filas = 10;
				$paginacion = new Zebra_Pagination();
				$paginacion->records($contador);
				$paginacion->records_per_page($filas);
				$paginacion->padding(false);
				$sql = $conexion->prepare('select * from productos  LIMIT '. (($paginacion->get_page() - 1) * $filas) . ', ' . $filas);
				$sql->execute();
				$resultado = $sql->fetchAll();
				foreach ($resultado as $filas) {
					echo '
		 				<tbody>
					        <tr>
					            <td>'.$filas['nombre_producto'].'</td>
					            <td>'.$filas['precio'].'</td>
					            <td>'.$filas['marca_producto'].'</td>
					            <td>'.$filas['id_producto'].'</td>

					            <td><p><a href="modificar.php?id='.$filas['id_producto'].'" class="btn btn-warning">Modificar</a>
					            <a href="eliminar.php?id='.$filas['id_producto'].'" class="btn btn-danger">Eliminar</a></p></td>
					        </tr>
					    </tbody>
		 			';
				}
				?>
			</table>
			<?php $paginacion->render();?>

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include '../../maestros/footer.php' ?>
