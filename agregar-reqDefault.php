<?php
	include('conectar-bd.php');
	$nuevoReq = $_POST['txtNuevoReq'];
	$tipoReq = $_POST['slTipo'];
	
	//echo "Requerimiento: " . $nuevoReq . "<br>" . "Tipo: " . $tipoReq;
	
	mysql_query("INSERT INTO requerimientos_default(descripcion,tipo) VALUES('$nuevoReq','$tipoReq')");
	
	header('location:requerimientos-default.php');
?>