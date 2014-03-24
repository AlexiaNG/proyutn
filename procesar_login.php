<?php
	require_once 'core/init.php';

	if(!empty( $_POST["btoLogin"] )){
		extract($_POST);

		/*echo "usuario: " . $usuario;
		echo "clave: " . sha1($clave);*/

		$sql = "SELECT * FROM usuarios WHERE 
				usuario = ? AND clave = ?
				LIMIT 1
				";

		$query = DB::getInstance()->consultar($sql,array(
				$usuario, sha1($clave)

			));		
		if($query->count == 1){
			$user = $query->firsts();
			
			/*
			$_SESSION["usuario"] = $user->usuario;
			$_SESSION["id"] = $user->id;
			*/

		    Session::put("usuario",$user->usuario);
		    Session::put("id",$user->id);	
		    Session::put("loginTrue",True);
		    Session::flash("ok","Bienvenido al sistema");
		    header("Location: index.php");
		}else{
		    Session::flash("no","El usuario y clave son incorrectos");
		    header("Location: login.php");
		}
	}
?>