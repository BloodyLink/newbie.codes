<?php	include('conectar-bd.php');	$tipo = $_POST['txtTipo'];	$dato = mysql_query("SELECT * FROM requerimientos_tipo WHERE descripcion = '$tipo'");	$cant = mysql_num_rows($dato);	if($cant>0){		header('location:error.php');		exit();	}else{		mysql_query("INSERT into requerimientos_tipo(descripcion) VALUES('$tipo')");		header("location:requerimientos-default.php");};?>