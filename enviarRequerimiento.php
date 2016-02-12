<?php
	include('conectar-bd.php');
	session_start();
	$user = $_SESSION["rut"];
	$area = $_SESSION["area"];
	$tipo = $_SESSION["tipo"];
	date_default_timezone_set("America/Caracas");
	$fs = SumarMinutosFechaStr(date("d/m/Y H:i:s"), 90);
	include('conectar-bd.php');
	$tipo = $_POST['lista1'];
	if(isset($_POST['especifico'])){
		$descripcion = $_POST['especifico'];
	}else{
		$descripcion = $_POST['slDescripcion'];
	}	
	function SumarMinutosFechaStr($FechaStr, $MinASumar){
		  $FechaStr = str_replace("/", " ", $FechaStr);
		  $FechaStr = str_replace(":", " ", $FechaStr);
			
		  $FechaOrigen = explode(" ", $FechaStr);
			
		  $Dia = $FechaOrigen[0];
		  $Mes = $FechaOrigen[1];
		  $Anyo = $FechaOrigen[2];
			
		  $Horas = $FechaOrigen[3];
		  $Minutos = $FechaOrigen[4];
		  $Segundos = $FechaOrigen[5];
		  $Minutos = ((int)$Minutos) + ((int)$MinASumar); 
		  $FechaNueva = date("d/m/Y H:i:s",mktime($Horas,$Minutos,$Segundos,$Mes,$Dia,$Anyo));
			
		  return $FechaNueva;
	}
	
	mysql_query("INSERT INTO soportes(usuario,area,tipo,requerimiento,fs) VALUES('$user','$area','$tipo','$descripcion','$fs')");
	header('location:solicitud.php');
?>