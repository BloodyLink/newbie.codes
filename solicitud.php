<?php
	include('conectar-bd.php');
	session_start();
	$user = $_SESSION["user"];
	$area = $_SESSION["area"];
	if(isset($_SESSION["rut"])){
		$rut = $_SESSION["rut"];
	}
	$tipoUser = $_SESSION["tipo"];
	if(isset($_GET['tipo'])){
		$tipo = $_GET['tipo'];
		}else{
			$tipo = "";
		}
	
	$dato = mysql_query("SELECT * FROM requerimientos_tipo WHERE activo = '1'");
	$tipos = mysql_fetch_array($dato);
	$dato1 = mysql_query("SELECT descripcion FROM requerimientos_default WHERE activo = '1' AND tipo = '$tipo'");
	$reqDef = mysql_fetch_array($dato1);
	$cant = mysql_num_rows($dato1);
	
	function editar($tipoUser){
		if($tipoUser == 1){
			echo "<a href='#' id='editar'>Editar</a>";
		}
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Solicitud de Requerimientos</title>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/solicitud.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>
<!--
Codigo 		se generará automaticamente
Usuario 	será la variable de sesion $user (pendiente)
Area 		será el area correspondiente a $user
-->


<div id="contenedor">
	<form id="frmRequerimiento" method="post" action="enviarRequerimiento.php">
	<div class="edicionUser">
		<input id="txtUser" type="text" name="txtUser" value="<?php echo $user ?>" onkeyup="mostrarUsuario(this.value)"/>
		
		<?php editar($tipoUser); ?><br />
		<input type="hidden" name="txtRut" value="<?php echo $rut; ?>"/>
	</div>
	
		<table>
			<tr><th>Seleccione Problema:</th></tr>
			<tr>
			<td>
			<form action="">
				<select class="listaSelect" name="lista1" size="2" onchange="mostrarRequerimiento(this.value)">
				<?php do{ ?>
					<option value="<?php echo $tipos['id']; ?>" ><?php echo $tipos['descripcion']; ?></option>
				<?php }while($tipos = mysql_fetch_array($dato));?>
			</select><br />
			</form>
			</td>
			<td><select class="listaSelect" id="lista2" name="slDescripcion" size="2">
				<?php
					if($cant > 0){
						do{ ?>
						<option onchange="mostrarBotonEnviar()"><?php echo $reqDef['descripcion']; ?></option>
					<?php }while($reqDef = mysql_fetch_array($dato1));
					echo "<option onclick='especificarRequerimiento()'>Otro...</option>";
					}
				?>
			</select>
			</td>
			<td id="finSolicitud">
			</td>
			</tr>
		</table>
	</form>
	<a href="index.php">Volver a index</a><br />
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#txtUser').attr('readonly', 'readonly');
		$('#txtArea').attr('readonly', 'readonly');
	});
	/*$('#editar').click(function(){
		$('#txtUser').removeAttr('readonly');
		$('#txtUser').val('');
		$('#txtUser').focus();
		//$('#area').html("<select name='txtArea'><?php do{ ?><option><?php echo $areas['descripcion']; ?></option><?php }while($areas = mysql_fetch_array($dato)); ?></select>");
		//$('#txtArea').removeAttr('readonly');
		$('.edicionUser').css('height','auto');
	});*/
</script>
</body>
</html>