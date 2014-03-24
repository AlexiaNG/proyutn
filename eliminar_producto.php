<?php

	require_once 'core/init.php';

	if (!Session::exists("loginTrue") OR !Session::get("loginTrue") ){
		Session::flash("no","Tenés que registrarte primero.");
		header("Location: login.php");
	}
	
	$id = $_GET["id"];
	if(!empty($id)){
		$sql = "DELETE FROM productos WHERE id = ?";
		$query = DB::getInstance()->consultar($sql,array($id));
		if($query->error()){
			//error
			header("Location: listar_producto.php");
		}else{
			//ok
			header("Location: listar_producto.php");
		}
	}
?>