<?php
	include('conectar-bd.php');
	$cod = $_POST['txtCod'];
	$obs = $_POST['txtObservacion'];
	mysql_query("INSERT into observaciones(soporte_cod,descripcion) VALUES('$cod','$obs')");
	header('location:folio.php');
?>