<?php
	include('conectar-bd.php');
	$dato = mysql_query("SELECT rut FROM usuarios");
	$reg = mysql_fetch_array($dato);
	
	do{
		$rut = $reg['rut'];
		$newrut = trim($rut);
		mysql_query("UPDATE usuarios1 SET usuario = '$newrut' WHERE usuario = '$rut'");
	}while($reg = mysql_fetch_array($dato));
?>