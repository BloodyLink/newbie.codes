<?php
	include('conectar-bd.php');
	/*$dato = mysql_query("SELECT area FROM usuarios");
	$reg = mysql_fetch_array($dato);
	
	do{
		$area = $reg['area'];
		$dato1 = mysql_query("SELECT descripcion FROM areas WHERE descripcion = '$area'");
		$cant = mysql_num_rows($dato1);
		
		if($cant < 1){
			mysql_query("INSERT INTO areas(descripcion) VALUES('$area')");
		}
		
	}while($reg = mysql_fetch_array($dato));*/
	
	$dato = mysql_query("SELECT rut FROM usuarios");
	$reg = mysql_fetch_array($dato);
	
	do{
		$rut = $reg['rut'];
		$rut_sin_puntos = str_replace(".","",$rut);
		mysql_query("UPDATE usuarios SET rut = '$rut_sin_puntos'");
	}while($reg = mysql_fetch_array($dato));
?>