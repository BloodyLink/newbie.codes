<?php
	include('conectar-bd.php');
	$dato = mysql_query("SELECT rut FROM usuarios");
	$reg = mysql_fetch_array($dato);
	do{
		$rut = $reg['rut'];
		$pass = sha1($rut);
		mysql_query("UPDATE usuarios SET password = '$pass' WHERE rut = '$rut'");
	}while($reg = mysql_fetch_array($dato));
?>