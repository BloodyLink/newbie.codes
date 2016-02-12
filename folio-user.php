<?php
//	Codigo	Usuario	Area	Tipo	Requerimiento	Prioridad	FS	FT    Estado    H.Asignadas
	include('conectar-bd.php');
	session_start();
	$rut = $_SESSION['rut'];
	$dato = mysql_query("SELECT soportes.codigo, soportes.usuario, areas.descripcion as area, requerimientos_tipo.descripcion as tipo, soportes.requerimiento, prioridades.descripcion as prioridad, soportes.fs, soportes.ft, soportes.h_asignadas, soportes.estado FROM soportes, prioridades, requerimientos_tipo, areas WHERE usuario = '$rut' AND soportes.area = areas.id AND soportes.tipo = requerimientos_tipo.id AND soportes.prioridad = prioridades.id_prioridades ORDER BY estado,prioridad DESC,codigo");
	$reg = mysql_fetch_array($dato);
	$cant = mysql_num_rows($dato);
	function user($rut){
		$query = mysql_query("SELECT * FROM usuarios WHERE rut = '$rut'");
		$arr = mysql_fetch_array($query);
		$nombre_completo = $arr['nombre'] . " " . $arr['nombre_2'] . " " . $arr['apellido'] . " " . $arr['apellido_m'];
		return $nombre_completo;
	}
	function checkhoras($horas){
		if($horas == ""){
			echo "--";
		}else{
			echo $horas;
		}
	}
	function checkestado($estado){
		if($estado == "0"){return "alert.png";}
		if($estado == "1"){return "enespera.gif";}
		if($estado == "2"){return "completado.gif";}
	}
	
	function checkprioridad($prioridad){
		if($prioridad == "0"){return "Baja";}
		if($prioridad == "1"){return "Media";}
		if($prioridad == "2"){return "Alta";}
	}
	$total = 0;
	$sinrevisar = 0;
	$enproceso = 0;
	$completados = 0;
?>
<!doctype html>
<html lang=es>
<head>
<title>Sus solicitudes</title>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/solicitud.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.15.custom.min.js"></script>
</head>
<body>
<div class="draggable">
<div id="popupObservaciones" class="popup">
	<img class="cerrar" src="images/close.jpg" title="Click para Cerrar" /><br />
	<div id="divTablaObservacionesUser"><table id="observaciones" class="tablaMuestra">
	</table></div>
			<input type="hidden" name="txtCod" id="txtCod" value="" />
</div></div>
<a href="folio-user-pdf.php" TARGET='_blank'>Descargar como PDF</a><a href="index.php">Volver a index</a>
<table class="tablaMuestra">
<tr><th>Codigo</th><th>Usuario</th><th>Area</th><th>Tipo</th><th>Requerimiento</th><th>Prioridad</th><th>FS</th><th>FT</th><th>Estado</th><th>H.Asignadas</th><th></th></tr>
<?php do{ ?>
				<tr onmouseover="this.style.backgroundColor='#FFFFFF'" onmouseout="this.style.backgroundColor='#CCCCCC'"><td><?php echo str_pad($reg['codigo'], 6, "0",STR_PAD_LEFT); ?></td><td><?php echo user($reg['usuario']); ?></td><td><?php echo $reg['area']; ?></td><td><?php echo $reg['tipo']; ?></td><td><?php echo $reg['requerimiento']; ?></td><td><?php echo checkprioridad($reg['prioridad']); ?></td><td><?php echo $reg['fs']; ?></td><td><?php echo $reg['ft']; ?></td>
				<td><img width="15" height="15" src="images/<?php echo checkestado($reg['estado']); ?>" /></td><td><?php checkhoras($reg['h_asignadas']); ?></td><td><a href="#" class="linkObservaciones" onclick="obtenerObservacionesUser(<?php echo $reg['codigo']; ?>,0)">Observaciones</a></td>
				</tr>
	
<?php 
$total += 1;
			if($reg['estado'] == 0){
				$sinrevisar += 1;
			}
			if($reg['estado'] == 1){
				$enproceso += 1;
			}
			if($reg['estado'] == 2){
				$completados += 1;
			}
}while($reg = mysql_fetch_array($dato)); ?>
</table>
<?php 
$porcentaje_enproceso = (100*$enproceso)/$total;
$porcentaje_completados = (100*$completados)/$total;
$porcentaje_sinrevisar = (100*$sinrevisar)/$total;

echo "<br>Total: " . $total . "<br>Sin revisar : " . $sinrevisar ." (" . number_format($porcentaje_sinrevisar,2,',','.') . "%)" . "<br>En proceso: " . $enproceso ." (" . number_format($porcentaje_enproceso,2,',','.') . "%)" . "<br>Completados: " . $completados ." (" . number_format($porcentaje_completados,2,',','.') . "%)";?>
<script type="text/javascript">
function apagarLuces(){$('#luces').css('visibility','visible');$('#luces').css('z-index','2');}
	function encenderLuces(){$('#luces').css('visibility','hidden');$('#luces').css('z-index','-1');}
	function loading(){$('#observaciones').html("<img src='images/loading.gif'/>");}
	$('.linkObservaciones').click(function(){loading();});
	$('.cerrar').click(function(){$(this).parent().fadeOut("slow");encenderLuces();$(this).parent().animate({height:"0px",width:"0px"},100);});
	$('.linkObservaciones').click(function(){apagarLuces();$('#popupObservaciones').animate({height:"+=400px",width:"+=700px"},100);$('#popupObservaciones').fadeIn("slow");});
</script>
</body>
</html>