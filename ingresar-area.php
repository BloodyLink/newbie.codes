<?php
	include('conectar-bd.php');
	$descripcion = $_POST['txtArea'];
	$datos = mysql_query("SELECT * FROM areas WHERE descripcion='$descripcion'");
	$cant = mysql_num_rows($datos);
	if($cant>0){
		header('location:error.php');
		exit();
	}else{
		mysql_query("INSERT into areas(descripcion) VALUES('$descripcion')");
	
	header("location:areas.php");
}
?>