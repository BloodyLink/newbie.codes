<?php
	include('conectar-bd.php');
	$id = $_POST['idHidden'];
	$area = $_POST['slArea'];
	
	mysql_query("UPDATE usuarios SET area = '$area' WHERE rut = '$id'");
	
	header('location:usuarios.php');
?>