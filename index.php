<?php
	require_once 'core/init.php';

	if (!Session::exists("loginTrue") OR !Session::get("loginTrue") ){
		Session::logout();
		header("Location: login.php");
	}

	if (Session::exists("ok")) {
		echo Session::flash("ok");
	}
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pantalla de inicio</title>
</head>
<body>
	<h1>Sistema PROYUTN</h1>
	<h2>Un ABM de Productos</h2>
	<a href="listar_producto.php">Listar Productos</a>
	<br>
	<a href="agregar_producto.php">Agregar Productos</a>
	<br>
 	<a href="listar_usuario.php">Listar Usuario</a>
 	<br>
 	<a href="agregar_usuario.php">Agregar Usuario</a>
 	<br>
 	<a href="salir.php">Salir</a>
</body>
</html>
