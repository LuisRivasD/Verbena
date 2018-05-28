<?php
session_start();
$error="";
	/*Verificar que hayan llegado los datos*/
	if (isset($_SESSION["usuario"])){
		session_destroy();
	}
	else {
		$error = "No a iniciado sesión.";
	}

	if ($error == "") {
		header("Location: login.php");
	}else
		header("Location: index.php");
  exit();

?>
