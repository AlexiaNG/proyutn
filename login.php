<?php
	require_once 'core/init.php';

if (Session::exists("loginTrue") AND Session::get("loginTrue") ){
	header("Location: index.php");

	}

	if (Session::exists("no")) {
		echo Session::flash("no");
	}
?>

<h2>Login</h2>
<br>
<form action="procesar_login.php" method="post">
		<label for="">Usuario:</label>
		<input type="text" name="usuario">
		<br>
		<label for="">Clave:</label>
		<input type="password" name="clave">
		<br>
		<input type="submit" name="btoLogin">
</form>