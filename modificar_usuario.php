<?php
	require_once 'core/init.php';
	$usuarios = DB::getInstance()->get('usuarios')->results();
	$id = $_GET['id'];
	$sql = "SELECT * FROM usuarios WHERE id = ?";
	$usuarios = DB::getInstance() -> consultar($sql,array($id)) -> results();
?>

<form action="procesar_usuario.php" method="post">
	<input type="hidden" name="id_usuario" 
		value="<?php echo $usuarios[0]->id ?>">
		Usuario: <br>
	    <textarea name="usuario" id="id_usuario" cols="30" rows="10"><?php echo $usuarios[0]->usuario ?></textarea><br>
				Clave: <br>
				<input type="text" name="clave"
					value="<?php echo $usuarios[0]->clave ?>"/>
				<br>
				Privilegio: <br>
				<input type="text" name="privilegio"
					value="<?php echo $usuarios[0]->privilegio ?>"/>
				<br>
				Token: <br>
				<input type="text" name="token"
					value="<?php echo $usuarios[0]->token ?>"/>
				<br></br>
				<input type="submit" name="btoUsuario" value="Actualizar">
		</form>
	</body>
</html>