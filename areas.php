<?php
	include('conectar-bd.php');
	$dato = mysql_query("SELECT * FROM areas ORDER BY descripcion");
	$reg = mysql_fetch_array($dato);
	
	function estado($a){
		if($a == '1'){
		$estado = "Activo";
		}else{
			$estado = "Inactivo";
			}
		return $estado;
	}
?>
<!DOCTYPE html>
<html lang=es>
<head>
<title>Areas</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
<div id="contenedor">
	<form id="formArea" method="post" action="ingresar-area.php">
		<table>
			<tr><th colspan="2">Nueva Area</th></tr>
			<tr><td>Nombre</td><td><input type="text" name="txtArea" id="txtArea" /></td></tr>
			<tr><td></td><td><input type="submit" name="btnNuevaArea" id="btnNuevaArea" value="Guardar"/></td></tr>
		</table>
	</form>
	<div id="areas">
		<table class="tablaMuestra">
			<tr><th colspan="3">Areas</th></tr>
			<?php do{ ?>
			<tr><td><?php echo $reg['descripcion']; ?></td><td><a href="cambiar-estado-area.php?id=<?php echo $reg['id'];?>"><?php echo estado($reg['activo']); ?></td></td></td></tr>
			<?php }while($reg = mysql_fetch_array($dato));?>
		</table>
	</div>
<a href="index.php">Volver a index</a>
</div>
</body>
</html>