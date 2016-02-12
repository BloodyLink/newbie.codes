<?php
	include('conectar-bd.php');
	$dato = mysql_query("SELECT * FROM requerimientos_tipo WHERE activo = '1' ORDER BY descripcion");
	$reg = mysql_fetch_array($dato);
	$dato1 = mysql_query("SELECT * FROM requerimientos_default ORDER BY activo DESC,tipo");
	$requerimientos = mysql_fetch_array($dato1);
	function estado($a){
		if($a == '1'){
		$estado = "Activo";
		}else{
			$estado = "Inactivo";
			}
		return $estado;
	}
?>
<!doctype html>
<html lang=es>
<head>
<title>Ingreso Req. por default</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<form method="post" id="frmReq" action="agregar-reqDefault.php">
		<table>
			<tr><th>Ingrese Req:</th></tr>
			<tr><td colspan="3"><textarea cols="70" rows="5" name="txtNuevoReq"></textarea></td></tr>
			<tr><td>Tipo:</td>
				<td><select name="slTipo">
						<option>Seleccione:</option>
						<?php do{ ?>
							<option><?php echo $reg['descripcion']; ?></option>
						<?php }while($reg = mysql_fetch_array($dato)); ?>
					</select></td>
				<td><a href="agregar-tipoReq.php">Agregar/quitar Tipo</a></td>
			</tr>
			<tr><td><input type="submit" id="btnReq" value="Agregar" /></td></tr>
		</table>
	</form>
	<table class="tablaMuestra">
		<tr><th>Descripcion</th><th>Tipo</th><th>Estado</th></tr>
		<?php do{ ?>
		<tr><td><?php echo $requerimientos['descripcion']; ?></td><td><?php echo $requerimientos['tipo']; ?></td><td><a href="cambiar-estadoReq.php?id=<?php echo $requerimientos['id']; ?>"><?php echo estado($requerimientos['activo']); ?></a></td></tr>
		<?php }while($requerimientos = mysql_fetch_array($dato1));?>
	</table>
	<a href="index.php">Volver a index</a><br />
</body>
</html>