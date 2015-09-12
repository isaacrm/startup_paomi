<?php
	class crear_db
	{
		protected $pdo;
		public function __construct()
		{
			 $this->pdo = new PDO("mysql:host=localhost;", "root", "");	
		}
		//creacion de base de datos
		public function my_db()
		{
			//creamos la base de datos si no es existente
			$crear_db = $this->pdo->prepare('CREATE DATABASE IF NOT EXISTS sheer_dbase COLLATE utf8_unicode_ci');
			$crear_db->execute();
			//decimos que queremos usar la tabla que acabamos de crear 
			if($crear_db):
				$use_db = $this->pdo->prepare('USE sheer_dbase');
				$use_db->execute();
				endif;
				//si se ha creado la base de datos que ejecute lo siguente
			if($use_db):
				$tipos_cli = $this->pdo->prepare('
					CREATE TABLE IF NOT EXISTS tipo_cliente (
					  id_tipo_cliente int(11) NOT NULL AUTO_INCREMENT,
					  tipo_cliente varchar(40) COLLATE utf8_unicode_ci NOT NULL,
					  descripcion text COLLATE utf8_unicode_ci NOT NULL
					) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
					');
				$tipos_cli->execute();
				//creamos la tabla de usuarios para administrar el Front-end
				$clientes = $this->pdo->prepare('
						CREATE TABLE IF NOT EXISTS clientes (
						  id_cliente int(11) NOT NULL AUTO_INCREMENT,
						  nombre_cliente varchar(50) COLLATE utf8_unicode_ci NOT NULL,
						  apellidos_cliente varchar(50) COLLATE utf8_unicode_ci NOT NULL,
						  fecha_nacimiento date NOT NULL,
						  Dui_cliente int(8) NOT NULL,
						  direccion_cliente varchar(40) COLLATE utf8_unicode_ci NOT NULL,
						  correo_cliente varchar(20) COLLATE utf8_unicode_ci NOT NULL,
						  nombre_usuario varchar(50) COLLATE utf8_unicode_ci NOT NULL,
						  contrasena_cliente varchar(25) COLLATE utf8_unicode_ci NOT NULL,
						  id_tipo_cliente int(11) NOT NULL,
						  foreign key(id_tipo_cliente) references tipo_cliente(id_tipo_cliente)
						) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

						)');
				$clientes->execute();
				//creamos la tabla de desarrolladores
				$empleados = $this->pdo->prepare('
					CREATE TABLE IF NOT EXISTS empleados (
					  id_empleado int(11) NOT NULL AUTO_INCREMENT,
					  nombres_empleado varchar(50) COLLATE utf8_unicode_ci NOT NULL,
					  apellidos_empleado varchar(50) COLLATE utf8_unicode_ci NOT NULL,
					  fecha_nacimiento date NOT NULL,
					  edad_empleado int(11) NOT NULL,
					  DUI_empleado int(8) NOT NULL,
					  direccion_empleado varchar(100) COLLATE utf8_unicode_ci NOT NULL,
					  correo_empleado varchar(50) COLLATE utf8_unicode_ci NOT NULL,
					  contra_empleado varchar(25) COLLATE utf8_unicode_ci NOT NULL,
					  cargo_empleado varchar(10) COLLATE utf8_unicode_ci NOT NULL
					) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
				');
				$empleados->execute();
				//creando la tabla de detalle de los conocimientos 
				$t_prod = $this->pdo->prepare('
					CREATE TABLE IF NOT EXISTS tipo_productos (
					  id_tipo_producto int(11) NOT NULL AUTO_INCREMENT,
					  descripcion varchar(50) COLLATE utf8_unicode_ci NOT NULL,
					  tipo_producto varchar(100) COLLATE utf8_unicode_ci NOT NULL
					) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
				');
				$t_prod->execute();
				$productos = $this->pdo->prepare('
					CREATE TABLE IF NOT EXISTS productos (
					  id_producto int(11) NOT NULL AUTO_INCREMENT,
					  precio double NOT NULL,
					  nombre_producto varchar(50) COLLATE utf8_unicode_ci NOT NULL,
					  marca_producto varchar(50) COLLATE utf8_unicode_ci NOT NULL,
					  id_tipo_producto int(11) NOT NULL,
					  foreign key(id_tipo_producto) references tipo_productos(id_tipo_producto)
					) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

					');
				$productos->execute();
				//creando tabla de pasos instalacion
				$ventas = $this->pdo->prepare('
					CREATE TABLE IF NOT EXISTS ventas (
					  id_venta int(11) NOT NULL AUTO_INCREMENT,
					  fecha_venta date NOT NULL,
					  id_cliente int(11) NOT NULL,
					  hora_venta time NOT NULL
					) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
');
				$ventas->execute();
				
				endif;
		}	

	}
	$db = new crear_db();
	$db->my_db();
?>