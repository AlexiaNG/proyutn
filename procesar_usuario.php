<?php
	require_once 'core/init.php';

	if (!Session::exists("loginTrue") OR !Session::get("loginTrue") ){
		Session::flash("no","Tenés que registrarte primero.");
		header("Location: login.php");
	}

	$bto = $_POST["btoUsuario"];
	if (!empty($bto) and $bto == "Agregar") {
		extract($_POST);

		$sql = "INSERT INTO usuarios VALUE (
				null,?,?,?,?
			)";

		$query = DB::getInstance()->consultar($sql, array(
				$usuario,sha1($clave),$privilegio,$token
			));

		if ($query->error()) {			
			header("Location: listar_usuario.php");
		}else{			
			header("Location: listar_usuario.php");
		}

	}elseif (!empty($bto) and $bto == "Actualizar" ){

		extract($_POST);
		$sql = "UPDATE usuarios SET 
					usuario = ?,
					clave = ?,
					privilegio = ?,
					token = ?
				WHERE id = ?
			";
		$query = DB::getInstance()->consultar($sql, array(
				$usuario,sha1($clave),$privilegio,$token,$id_usuario
			));

		if ($query->error()) {					
			header("Location: listar_usuario.php");
		}else{
			header("Location: listar_usuario.php");
		}

	}else{
		echo "Error";
	}


?>