<?php
	require_once 'core/init.php';

    if (!Session::exists("loginTrue") OR !Session::get("loginTrue") ){
		Session::flash("no","Tenés que registrarte primero.");
		header("Location: login.php");
	}

	$users = DB::getInstance()->get("usuarios")->results();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pantalla de inicio</title>
</head>
<body>
	<a href="index.php">Inicio</a>
	<br>
	<a href="agregar_usuario.php">Agregar Usuario</a>
	<br><br>
	<form action="buscar.php" method="get">
		Buscar: <input type="search" name="q" id="q">
	</form>
		<table border=1 class="mi tabla">
			<tr>
				<th>Identificador</th>
				<th>Usuario</th>
				<th>Clave</th>	
				<th>Privilegio</th>
				<th>Token</th>
			</tr>
			<?php foreach($users as $row) { ?>
			<tr>
				<td> <?php echo $row->id ?> </td>
				<td> <?php echo $row->usuario ?> </td>
				<td> <?php echo $row->clave ?> </td>
				<td> <?php echo $row->privilegio ?> </td>
				<td> <?php echo $row->token ?> </td>
				<td> <a href="<?php echo URL_BASE ?>modificar_usuario.php?id=<?php echo $row->id ?>"> Modificar </a> </td>
				<td> <a href="<?php echo URL_BASE ?>eliminar_usuario.php?id=<?php echo $row->id ?>"> Eliminar </a> </td>
			</tr>	
			<?php }  ?>
		</table>	
 </body>
</html>
