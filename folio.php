<?php
	include('conectar-bd.php');
	$dato = mysql_query("SELECT * FROM soportes ORDER BY estado,prioridad DESC,codigo");
	$reg = mysql_fetch_array($dato);
	$cant = mysql_num_rows($dato);
	
	function user($rut){
		$query = mysql_query("SELECT * FROM usuarios WHERE rut = '$rut'");
		$arr = mysql_fetch_array($query);
		$nombre_completo = $arr['nombre'] . " " . $arr['nombre_2'] . " " . $arr['apellido'] . " " . $arr['apellido_m'];
		return $nombre_completo;
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
	
	function siguienteEstado($estado,$codigo){
		if($estado == "0"){return "return confirm('Se cambiará el estado de esta solicitud a \'Pendiente\'\\n(Esta acción no puede ser desecha\)')";}
		if($estado == "1"){return "return pasarCod(" . $codigo . ")";
		}
		
		//if($estado == "1"){return "return confirm('Se cambiará el estado de esta solicitud a \'Completado\'\\n(Esta acción no puede ser desecha\)')";}
		if($estado == "2"){return "return yaCompletado()";}	
	}
	
	function checkhoras($horas){
		if($horas == ""){
			echo "--";
		}else{
			echo $horas;
		}
	}
	
	function mostrarClass($estado){
		if($estado == "0" OR $estado == "2"){
			return "";
		}else{
			return "cambiaEstado";
		}
	}
	$total = 0;
	$sinrevisar = 0;
	$enproceso = 0;
	$completados = 0;
?>
<!doctype html>
<html lang=es>
<head>
<title>Folio</title>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/solicitud.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.15.custom.min.js"></script>
</head>
<body>
<div id="luces"></div>
<div class="draggable">
<div id="popupObservaciones" class="popup">
	<img class="cerrar" src="images/close.jpg" title="Click para Cerrar" /><br />
	<div id="divTablaObservaciones"><table id="observaciones" class="tablaMuestra">
	</table></div>
	<div id="divAgregarObservacion" >
		<form method="post" action="agregarObservacion.php">
			<input type="hidden" name="txtCod" id="txtCod" value="" />
			<table id="tablaObservaciones">
				<tr><th>Agregar nueva observacion</th></tr>
				<tr><td><textarea name="txtObservacion" cols="30" rows="3"></textarea></td></tr>
				<tr><td><input type="submit" value="Agregar" /></td></tr>
			</table>
		</form>
	</div>
</div></div>
<div class="draggable">
<div id="popupEstado" class="popup">
<img class="cerrar" src="images/close.jpg" title="Click para Cerrar" /><br />
	<form method="post" action="cambiar-a-completado.php" >
		<input type="hidden" id="txtCod2" name="txtCod2" value="" />
		<table>
			<tr><th colspan="3">Esta a punto de cambiar el estado de esta solicitud a "completado"</th></tr>
			<tr><td>Tiempo requerido:</td><td>Horas
			<select name="slHoras" id="slHoras">
			</select></td>
			<td>Minutos<select name="slMinutos" id="slMinutos">
			</select>
			</td></tr>
			<tr><td></td><td><input type="submit" value="Actualizar" /></td></tr>
		</table>
	</form>
</div></div>
	<?php if($cant < 1){ echo "No hay registros que mostrar<br>"; 
		}else{?>
		<a href="folio-completo-pdf.php" TARGET='_blank'>Descargar como PDF</a>
		<table class="tablaMuestra">
			<tr class="row"><th>Codigo</th><th>User</th><th>Area</th><th>Tipo</th><th>Requerimiento</th><th>Prioridad</th><th>FS</th><th>FT</th><th>Estado</th><th>H. Asignadas</th><th></th></tr>
			<?php do{ ?>
				<tr onmouseover="this.style.backgroundColor='#FFFFFF'" onmouseout="this.style.backgroundColor='#CCCCCC'"><td><?php echo str_pad($reg['codigo'], 6, "0",STR_PAD_LEFT); ?></td><td><?php echo user($reg['usuario']); ?></td><td><?php echo $reg['area']; ?></td><td><?php echo $reg['tipo']; ?></td><td><?php echo $reg['requerimiento']; ?></td><td><a href="editar-prioridad.php?id=<?php echo $reg['codigo']; ?>"><?php echo checkprioridad($reg['prioridad']); ?></a></td><td><?php echo $reg['fs']; ?></td><td><?php echo $reg['ft']; ?></td>
				<td><a class="<?php echo mostrarClass($reg['estado']); ?>" href="cambiar-estado-solicitud.php?id=<?php echo $reg['codigo']; ?>" onclick="<?php echo siguienteEstado($reg['estado'],$reg['codigo']); ?>"><img width="15" height="15" src="images/<?php echo checkestado($reg['estado']); ?>" /></a></td><td><?php checkhoras($reg['h_asignadas']); ?></td><td><a href="#" class="linkObservaciones" onclick="obtenerObservaciones(<?php echo $reg['codigo']; ?>)">Observaciones</a></td>
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
				<?php } ?>
				</table>
<a href="index.php">Volver a index</a><br />
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
	$('.ticket').click(function(){confirm('asjdksdsad?');return 0;});
	$('.cambiaEstado').click(function(){
		apagarLuces();$('#popupEstado').animate({height:"+=200px",width:"+=550px"},100);$('#popupEstado').fadeIn("slow");
		horas();
		minutos();
		
	});
</script>
</body>
</html>