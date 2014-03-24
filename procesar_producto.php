<?php
	require_once 'core/init.php';

	if (!Session::exists("loginTrue") OR !Session::get("loginTrue") ){
		Session::flash("no","Tenés que registrarte primero.");
		header("Location: login.php");
	}	

	$bto = $_POST["btoProducto"];
	if(!empty($bto) and $bto == "Agregar"){
		extract($_POST);

		$sql = "INSERT INTO productos VALUE (
			null,?,?,?,?,?
		)";
	$query = DB::getInstance()->consultar($sql, array(
			$producto,$cantidad,$precio,"imagen1.jpg",$categoria
			));
	
		if($query->error()){
			//error producido - no se insertó
			header("Location: listar_producto.php");
		}else{
			//TODO OK - se insertó correctamente
			header("Location: listar_producto.php");
		}

	}elseif(!empty($bto) and $bto == "Actualizar"){
		extract($_POST);

		$sql = "UPDATE productos SET 
				    producto = ?,
				    cantidad = ?,
					precio = ?,
					imagen = ?,
					id_categoria = ?
				WHERE 
					id = ?
		";
	$query = DB::getInstance()->consultar($sql, array(
			$producto,$cantidad,$precio,"imagen1.jpg",$categoria,$id_producto
			));
	
		if($query->error()){
			//error producido - no se insertó
			header("Location: listar_producto.php");
		}else{
			//TODO OK - se insertó correctamente
			header("Location: listar_producto.php");
		}

	}else{
		echo "No se mandaron datos para insertar";
	}
?>