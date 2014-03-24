<?php
	require_once 'core/init.php';

	if (!Session::exists("loginTrue") OR !Session::get("loginTrue") ){
		Session::flash("no","Tenés que registrarte primero.");
		header("Location: login.php");
	}

	$usuarios = DB::getInstance()->get('usuarios')->results();
?>

<html>
	<head>
		<title>Agregar Usuario</title>
	</head>
	<body>
		<form action="procesar_usuario.php" method="post">
				Usuario: <br>
				<textarea name="usuario" id="usuario" cols="30" rows="10"></textarea>
				<br>
				Clave: <br>
				<input type="text" name="clave"/>
				<br>
				Privilegio: <br>
				<input type="text" name="privilegio"/>
				<br>
				Token: <br>
				<input type="text" name="token"/>
				<br></br>
				<input type="submit" name="btoUsuario" value="Agregar">
		</form>
	</body>
</html>