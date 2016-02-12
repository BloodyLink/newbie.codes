<?php
	include('conectar-bd.php');
	$id = $_GET['id'];
	$dato = mysql_query("SELECT activo FROM areas WHERE id = '$id'");
	$reg = mysql_fetch_array($dato);
	if($reg['activo'] == '0'){
		mysql_query("UPDATE areas SET activo = 1 WHERE id = '$id'");
	}else{
		mysql_query("UPDATE areas SET activo = 0 WHERE id = '$id'");
		}
	header('location:areas.php');
?>