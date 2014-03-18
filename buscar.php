<?php  
	require_once 'core/init.php';

	$buscar = $_GET["q"];

	$sql = "SELECT 
				p.id, p.producto, p.cantidad, p.precio,
				p.imagen, c.descripcion
			FROM 
				productos as p, categorias as c
			WHERE 
				p.id_categoria = c.id
			AND 
				p.producto LIKE ?
			ORDER BY 
				p.id DESC
		";

	$productos = DB::getInstance()->consultar($sql,array("%".$buscar."%"))->results();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pantalla de Inicio</title>
</head>
<body>
	<a href="index.php">Inicio</a>
	<br>
	<a href="agregar_producto.php">Agregar Productos</a>
	<br><br>
	<form action="buscar.php" method="get">
		Buscar: <input type="search" name="q" id="q">
		<input type="submit" name="btoBuscar" value="Buscar">
	</form>
	<table border=1 class="mitabla">
		<tr>
			<th>Identificador</th>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Categoria</th>
		</tr>
		<?php foreach($productos as $row){ ?>
		<tr>
			<td> <?php echo $row->id ?> </td>
			<td> <?php echo $row->producto ?> </td>
			<td> <?php echo $row->cantidad ?> </td>
			<td> <?php echo $row->precio ?> </td>
			<td> <?php echo $row->descripcion ?> </td>
			<td> <a href="<?php echo URL_BASE ?>modificar_producto.php?id=<?php echo $row->id ?>"> Modificar </a> </td>
			<td> <a href="<?php echo URL_BASE ?>eliminar_producto.php?id=<?php echo $row->id ?>"> Eliminar </a> </td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
