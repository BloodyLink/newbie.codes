<?php
	include('conectar-bd.php');
	$id = $_GET['id'];
	$dato = mysql_query("SELECT activo FROM usuarios WHERE rut = '$id'");
	$reg = mysql_fetch_array($dato);
	if($reg['activo'] == '0'){
		mysql_query("UPDATE usuarios SET activo = 1 WHERE rut = '$id'");
	}else{
		mysql_query("UPDATE usuarios SET activo = 0 WHERE rut = '$id'");
		}
	header('location:usuarios.php');
?>