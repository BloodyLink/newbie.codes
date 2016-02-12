<?php
	include('conectar-bd.php');
	$id = $_GET['id'];
	$dato = mysql_query("SELECT activo FROM requerimientos_default WHERE id = '$id'");
	$reg = mysql_fetch_array($dato);
	if($reg['activo'] == '0'){
		mysql_query("UPDATE requerimientos_default SET activo = 1 WHERE id = '$id'");
	}else{
		mysql_query("UPDATE requerimientos_default SET activo = 0 WHERE id = '$id'");
		}
	header('location:requerimientos-default.php');
?>