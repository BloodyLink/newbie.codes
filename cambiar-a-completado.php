<?php
	include('conectar-bd.php');
	$codigo = $_POST['txtCod2'];
	$horas = $_POST['slHoras'];
	$minutos = $_POST['slMinutos'];
	$h_asignadas = $horas . ":" . $minutos;
	echo $codigo . " " . $h_asignadas;
	date_default_timezone_set("America/Caracas");
	$dato = mysql_query("SELECT estado FROM soportes WHERE codigo = '$codigo'");
	$reg = mysql_fetch_array($dato);
	$ft = SumarMinutosFechaStr(date("d/m/Y H:i:s"), 30);
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
	
	if($reg['estado'] == "1"){
		mysql_query("UPDATE soportes set estado = '2', ft = '$ft', h_asignadas = '$h_asignadas' WHERE codigo = $codigo");
		header("location:folio.php");
	}
?>