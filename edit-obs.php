<?php
	include('conectar-bd.php');
	$cod = $_POST['txtCod'];
	$desc = $_POST['txtObservacion'];
	//echo $cod;
	mysql_query("UPDATE observaciones SET descripcion = '$desc' WHERE id = '$cod'");
	header('location:folio.php');
?>