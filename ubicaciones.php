<?php
	include('conectar-bd.php');
	/*
	$dato = mysql_query("SELECT ubicacion FROM usuarios");
	$reg = mysql_fetch_array($dato);
	
	do{
		$ubicacion = $reg['ubicacion'];
		$dato2 = mysql_query("SELECT descripcion_ubicaciones FROM ubicaciones WHERE descripcion_ubicaciones = '$ubicacion'");
		$cant = mysql_num_rows($dato2);
		if($cant > 0){
			echo ".<br>";
		}else{
			mysql_query("INSERT INTO ubicaciones(descripcion_ubicaciones) VALUES('$ubicacion')");
		}
	}while($reg = mysql_fetch_array($dato));
	*/
	/*
	$dato = mysql_query("SELECT cargo FROM usuarios");
	$reg = mysql_fetch_array($dato);
	
	do{
		$cargo = $reg['cargo'];
		$dato2 = mysql_query("SELECT descripcion_cargos FROM cargos WHERE descripcion_cargos = '$cargo'");
		$cant = mysql_num_rows($dato2);
		if($cant > 0){
			echo ".<br>";
		}else{
			mysql_query("INSERT INTO cargos(descripcion_cargos) VALUES('$cargo')");
		}
	}while($reg = mysql_fetch_array($dato));
	*/
	
	$dato = mysql_query("SELECT seccion FROM usuarios");
	$reg = mysql_fetch_array($dato);
	
	do{
		$seccion = $reg['seccion'];
		$dato2 = mysql_query("SELECT descripcion_secciones FROM secciones WHERE descripcion_secciones = '$seccion'");
		$cant = mysql_num_rows($dato2);
		if($cant > 0){
			echo ".<br>";
		}else{
			mysql_query("INSERT INTO secciones(descripcion_secciones) VALUES('$seccion')");
		}
	}while($reg = mysql_fetch_array($dato));
?>