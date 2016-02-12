<?php
	include('conectar-bd.php');
	
	
	/*////////////////////////////////////////////////////////////////////////////
	
	CODIGO USADO PARA RECUPERAR AREA DE USUARIOS (EN TEXTO)
	$dato = mysql_query("SELECT * FROM usuarios1");
	$reg = mysql_fetch_array($dato);
	
	do{
		$area = $reg['area'];
		$mail1 = $reg['mail'];
		$dato2 = mysql_query("SELECT mail FROM usuarios");
		$reg2 = mysql_fetch_array($dato2);
		$mail = $reg2['mail'];
		mysql_query("UPDATE usuarios SET area = '$area' WHERE mail = '$mail1'");
	}while($reg = mysql_fetch_array($dato));
	*/
	//////////////////////////////////////////////////////////////////////////////
	/*
	$dato = mysql_query("SELECT * FROM usuarios");
	
	while($reg = mysql_fetch_array($dato)){
		$areaText = $reg['area'];
		$dato1 = mysql_query("SELECT id, descripcion FROM areas");
		$reg1 = mysql_fetch_array($dato1);
		$idArea = $reg1['id'];
		$descripcion = $reg1['descripcion'];
		mysql_query("UPDATE usuarios SET area = '$idArea' WHERE area = '$descripcion'");		
	}*/
	/*
	mysql_query("UPDATE usuarios SET area = '4' WHERE area = 'CIRCULACION'");
	mysql_query("UPDATE usuarios SET area = '5' WHERE area = 'PREPRENSA'");
	mysql_query("UPDATE usuarios SET area = '6' WHERE area = 'PRENSA ROTATIVA'");
	mysql_query("UPDATE usuarios SET area = '7' WHERE area = 'MANTENCION'");
	mysql_query("UPDATE usuarios SET area = '8' WHERE area = 'CASINO'");
	mysql_query("UPDATE usuarios SET area = '9' WHERE area = 'UNIDAD ADMINISTRATIVA'");
	mysql_query("UPDATE usuarios SET area = '10' WHERE area = 'CONTABILIDAD'");
	mysql_query("UPDATE usuarios SET area = '11' WHERE area = 'PERSONAL'");
	mysql_query("UPDATE usuarios SET area = '12' WHERE area = 'ABASTECIMIENTO'");
	mysql_query("UPDATE usuarios SET area = '13' WHERE area = 'UNIDAD DISEÑO GRAFICO'");
	mysql_query("UPDATE usuarios SET area = '14' WHERE area = 'VENTAS EDICIONES E'");
	mysql_query("UPDATE usuarios SET area = '15' WHERE area = 'INFORMATICA'");
	mysql_query("UPDATE usuarios SET area = '16' WHERE area = 'BIENESTAR'");
	mysql_query("UPDATE usuarios SET area = '17' WHERE area = 'SERVICIOS GENERALES'");
	mysql_query("UPDATE usuarios SET area = '18' WHERE area = 'COBRANZAS'");
	mysql_query("UPDATE usuarios SET area = '19' WHERE area = 'CASA CLUB VIÑA'");
	mysql_query("UPDATE usuarios SET area = '20' WHERE area = 'ADMINISTRATIVO CIRCULACION'");
	mysql_query("UPDATE usuarios SET area = '21' WHERE area = 'CASA CLUB QUILPUE'");
	*/
	
	/*
	mysql_query("UPDATE usuarios SET ubicacion = '1' WHERE ubicacion = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET ubicacion = '2' WHERE ubicacion = 'ESMERALDA 1002 VALPARAÍSO'");
	mysql_query("UPDATE usuarios SET ubicacion = '3' WHERE ubicacion = 'YUNGAY 2350 VALPARAÍSO'");
	mysql_query("UPDATE usuarios SET ubicacion = '4' WHERE ubicacion = 'CORRESPONSALIA DE QUILLOTA'");
	mysql_query("UPDATE usuarios SET ubicacion = '5' WHERE ubicacion = 'ARLEGUI 501 VIÑA DEL MAR'");
	mysql_query("UPDATE usuarios SET ubicacion = '6' WHERE ubicacion = 'EL LIDER DE MELIPILLA'");
	mysql_query("UPDATE usuarios SET ubicacion = '7' WHERE ubicacion = 'CENTRO RECREATIVO OLMUE'");
	mysql_query("UPDATE usuarios SET ubicacion = '8' WHERE ubicacion = 'LA ESTRELLA DE QUILLOTA'");
	mysql_query("UPDATE usuarios SET ubicacion = '9' WHERE ubicacion = 'EL MERCURIO DE SANTIAGO'");
	mysql_query("UPDATE usuarios SET ubicacion = '10' WHERE ubicacion = 'DIRECCION PARTICULAR QUILPUE'");
	mysql_query("UPDATE usuarios SET ubicacion = '11' WHERE ubicacion = 'CASA CLUB MALL QUILPUE'");
	mysql_query("UPDATE usuarios SET ubicacion = '12' WHERE ubicacion = 'CASA CLUB MALL MARINA'");
	*/
	
	/*mysql_query("UPDATE usuarios SET cargo = '1' WHERE cargo = 'EJECUTIVO COMERCIAL'");
	
	mysql_query("UPDATE usuarios SET cargo = '2' WHERE cargo = 'JEFE CREDITO Y COBRANZA'");
	mysql_query("UPDATE usuarios SET cargo = '3' WHERE cargo = 'GRAFICO MERCURIO'");
	mysql_query("UPDATE usuarios SET cargo = '4' WHERE cargo = 'PERIODISTA'");
	mysql_query("UPDATE usuarios SET cargo = '5' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '6' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '7' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '8' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '9' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '10' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '11' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '12' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '13' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '14' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '15' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '16' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '17' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '18' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '19' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '20' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '21' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '22' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '23' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '24' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '25' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '26' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '27' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '28' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '29' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");
	mysql_query("UPDATE usuarios SET cargo = '30' WHERE cargo = 'EL LIDER DE SAN ANTONIO'");*/
	
	/*
	$dato = mysql_query("SELECT * FROM cargos");
	$reg = mysql_fetch_array($dato);
	
	do{
		$id = $reg['id_cargos'];
		$descripcion = $reg['descripcion_cargos'];
		mysql_query("UPDATE usuarios SET cargo = '" . $id . "' WHERE cargo = '" . $descripcion . "'");
	}while($reg = mysql_fetch_array($dato));
	*/
	
	$dato = mysql_query("SELECT * FROM secciones");
	$reg = mysql_fetch_array($dato);
	
	do{
		$id = $reg['id_secciones'];
		$descripcion = $reg['descripcion_secciones'];
		mysql_query("UPDATE usuarios SET seccion = '" . $id . "' WHERE seccion = '" . $descripcion . "'");
	}while($reg = mysql_fetch_array($dato));
	
	?>