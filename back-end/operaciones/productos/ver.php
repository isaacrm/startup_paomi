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
			Productos
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container" style="overflow-Y:scroll; height:300px; width:100%;">
			<table class="table table-bordered" >
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
				$sql = $conexion->prepare('select * from productos LIMIT '. (($paginacion->get_page() - 1) * $filas) . ', ' . $filas);
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

					            <td><p><a href="modificar_productos.php?id='.$filas['id_producto'].'" class="btn btn-danger">Modificar</a>
					            <a href="eliminar_producto.php?id='.$filas['id_producto'].'" class="btn btn-danger">Eliminar</a></p></td>
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