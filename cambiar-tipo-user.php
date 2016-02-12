<?php
	include('conectar-bd.php');
	$id = $_GET['id'];
	$dato = mysql_query("SELECT tipo FROM usuarios WHERE rut = '$id'");
	$reg = mysql_fetch_array($dato);
	if($reg['tipo'] == '1'){
		mysql_query("UPDATE usuarios SET tipo = 2 WHERE rut = '$id'");
	}else{
		mysql_query("UPDATE usuarios SET tipo = 1 WHERE rut = '$id'");
		}
	header('location:usuarios.php');
?>