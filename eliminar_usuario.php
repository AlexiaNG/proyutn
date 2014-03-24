<?php
	require_once 'core/init.php';

	$id = $_GET['id'];

	if (!empty($id)) {
		$sql = "DELETE FROM usuarios WHERE id = ?";
		$query = DB::getInstance()->consultar($sql, array($id));

		if ($query -> error()) {
			header("Location: listar_usuario.php");
		} else {
			header("Location: listar_usuario.php");
		}
	}
?>