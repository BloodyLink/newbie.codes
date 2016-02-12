    <?php
	include('conectar-bd.php');
    include ('class.ezpdf.php');
	session_start();
	$rut = $_SESSION['rut'];
    $pdf = new Cezpdf();
	date_default_timezone_set("America/Caracas");
	$fs = SumarMinutosFechaStr(date("d/m/Y H:i:s"), 30);
	function user($rut){
		$query = mysql_query("SELECT * FROM usuarios WHERE rut = '$rut'");
		$arr = mysql_fetch_array($query);
		$nombre_completo = $arr['nombre'] . " " . $arr['nombre_2'] . " " . $arr['apellido'] . " " . $arr['apellido_m'];
		return $nombre_completo;
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
	$queEmp = "SELECT soportes.codigo AS cod ,soportes.usuario,soportes.area ,soportes.tipo ,soportes.requerimiento ,soportes.prioridad ,soportes.fs ,soportes.ft ,soportes.h_asignadas ,soportes.estado, estados.descripcion as est, prioridades.descripcion as pri FROM soportes, estados, prioridades WHERE usuario = '$rut' AND estados.id_estados = soportes.estado AND prioridades.id_prioridades = soportes.prioridad ORDER BY codigo";
	$resEmp = mysql_query($queEmp, $mysql) or die(mysql_error());
	$totEmp = mysql_num_rows($resEmp);
	//$reg = mysql_fetch_array($resEmp);
	    $ixx = 0;
    while($datatmp = mysql_fetch_assoc($resEmp)) {
       
       // $data[] = array_merge($datatmp, array('num'=>$ixx));
		//$codigo = str_pad($reg['cod'], 6, "0",STR_PAD_LEFT);
		$codigo = str_pad($datatmp['cod'], 6, "0",STR_PAD_LEFT);
		$data[] = array_merge($datatmp, array('code'=>$codigo)); 
		$ixx = $ixx+1;
    }
	    $pdf->selectFont('fonts/Helvetica.afm');
    $titles = array(
					'code'=>'<b>Codigo</b>',
                    'usuario'=>'<b>Usuario</b>',
                    'area'=>'<b>Area</b>',
                    'tipo'=>'<b>Tipo</b>',
					'requerimiento'=>'<b>Requerimiento</b>',
					'pri'=>'<b>Prioridad</b>',
					'fs'=>'<b>FS</b>',
					'ft'=>'<b>FT</b>',
					'est'=>'<b>Estado</b>',
					'h_asignadas'=>'<b>Horas asignadas</b>'
                );
    $options = array(
                    'shadeCol'=>array(0.9,0.9,0.9),
                    'xOrientation'=>'center',
                    'width'=>800
                );

	$txttit = "<b>Reporte de solicitudes</b>\n";
    $txttit.= "Registro del usuario " . user($rut) . " \n";
	$txttit.= "\nTotal: " . $total . " Sin revisar : " . $sinrevisar ." (" . number_format($porcentaje_sinrevisar,2,',','.') . "%)" . " En proceso: " . $enproceso ." (" . number_format($porcentaje_enproceso,2,',','.') . "%)" . " Completados: " . $completados ." (" . number_format($porcentaje_completados,2,',','.') . "%)\n";
	
				   
     
    $pdf->ezText($txttit, 8);
	$pdf->ezTable();
    $pdf->ezTable($data, $titles, '', $options);
    $pdf->ezText("\n\n\n", 8);
    $pdf->ezText("<b>Fecha y hora:</b> ".$fs, 8);
    $pdf->ezStream();
    $pdf->ezStream();
    ?>