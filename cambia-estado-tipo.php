<?php
	include('conectar-bd.php');
	$id = $_GET['id'];
	$dato = mysql_query("SELECT activo FROM requerimientos_tipo WHERE id = '$id'");
	$reg = mysql_fetch_array($dato);
	if($reg['activo'] == '0'){
		mysql_query("UPDATE requerimientos_tipo SET activo = 1 WHERE id = '$id'");
	}else{
		mysql_query("UPDATE requerimientos_tipo SET activo = 0 WHERE id = '$id'");
		}
	header('location:agregar-tipoReq.php');
?>