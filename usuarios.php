<?php
	include('conectar-bd.php');
	$dato = mysql_query("SELECT id, descripcion FROM areas WHERE activo = '1'");
	$areas = mysql_fetch_array($dato);
	$datoUbicaciones = mysql_query("SELECT id_ubicaciones AS id, descripcion_ubicaciones AS descripcion FROM ubicaciones WHERE activo = '1'");
	$ubicaciones = mysql_fetch_array($datoUbicaciones);
	$datoSecciones = mysql_query("SELECT id_secciones AS id, descripcion_secciones AS descripcion FROM secciones WHERE activo = '1'");
	$secciones = mysql_fetch_array($datoSecciones);
	$datoCargos = mysql_query("SELECT id_cargos AS id, descripcion_cargos AS descripcion FROM cargos WHERE activo = '1'");
	$cargos = mysql_fetch_array($datoCargos);
	$dato = mysql_query("SELECT id, descripcion FROM areas WHERE activo = '1'");
	$areas = mysql_fetch_array($dato);
	$dato1 = mysql_query('SELECT usuarios.rut, usuarios.nombre, usuarios.nombre_2, usuarios.apellido, usuarios.apellido_m, usuarios.mail, usuarios.activo, usuarios.tipo, areas.descripcion AS area, ubicaciones.descripcion_ubicaciones AS ubicacion, cargos.descripcion_cargos AS cargo, secciones.descripcion_secciones AS seccion FROM usuarios, areas, ubicaciones, cargos, secciones WHERE usuarios.area = areas.id AND usuarios.ubicacion = ubicaciones.id_ubicaciones AND usuarios.cargo = cargos.id_cargos AND usuarios.seccion = secciones.id_secciones ORDER BY tipo,rut');
	$usuarios = mysql_fetch_array($dato1);
	function estado($a){
		if($a == '1'){
		$estado = "Activo";
		}else{
			$estado = "Inactivo";
			}
		return $estado;
	}
	function tipo($b){
		if($b == '1'){
		$estado = "Admin";
		}else{
			$estado = "Usuario";
			}
		return $estado;
	}
?>
<!doctype html>
<html lang=es>
<head>
<title>Usuarios</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
<a href="index.php">Volver a index</a><br />
<div id="contenedor">
<div id="nuevoUsuario">
<form method="post" action="ingresar-usuarios.php" id="form-usuarios">
	<table>
		<tr><th colspan="4">Nuevo usuario</th></tr>
		<tr><td>Rut</td><td><input type="text" id="txtRut" name="txtRut" /></td><td>Area</td><td>
		<select name="slArea">
		<option>Seleccione:</option>
		<?php do{ ?>
			<option value="<?php echo $areas['id']; ?>"><?php echo $areas['descripcion']; ?></option>
		<?php }while($areas = mysql_fetch_array($dato)); ?>
		</select>
		</td></tr>
		<tr><td>Nombre</td><td><input type="text" id="txtNombre" name="txtNombre" /></td><td>Ubicacion</td><td><select id="slUbicacion" name="slUbicacion"><option>Seleccione:</option>
		<?php do{ ?>
			<option value="<?php echo $ubicaciones['id']; ?>"><?php echo $ubicaciones['descripcion']; ?></option>
		<?php }while($ubicaciones = mysql_fetch_array($datoUbicaciones)); ?></select></td></tr>
		<tr><td>2do Nombre</td><td><input type="text" id="txtNombre2" name="txtNombre2" /></td><td>Cargo</td><td><select id="slCargo" name="slCargo"><option>Seleccione:</option>
		<?php do{ ?>
			<option value="<?php echo $cargos['id']; ?>"><?php echo $cargos['descripcion']; ?></option>
		<?php }while($cargos = mysql_fetch_array($datoCargos)); ?></select></td></tr>
		<tr><td>Apellido Paterno</td><td><input type="text" id="txtApellido" name="txtApellido" /></td><td>Seccion</td><td><select id="slSeccion" name="slSeccion"><option>Seleccione:</option>
		<?php do{ ?>
			<option value="<?php echo $secciones['id']; ?>"><?php echo $secciones['descripcion']; ?></option>
		<?php }while($secciones = mysql_fetch_array($datoSecciones)); ?></select></td></tr>
		<tr><td>Apellido Materno</td><td><input type="text" id="txtApellidoM" name="txtApellidoM" /></td></tr>
		<tr><td>E-Mail</td><td><input type="text" id="txtMail" name="txtMail" /></td></tr>
		<tr><td>Tipo</td><td>Admin<input type="radio" name="radTipo" value="1"/> User<input type="radio" name="radTipo" value="2"/></td></tr>
		<tr><td></td><td><input type="submit" name="btnNuevoUsuario" id="btnNuevoUsuario" value="Registrar" /></td></tr>
	</table>
</form>
</div>
<div id="usuarios">
<table class="tablaMuestra">
	<tr><th>Rut</th><th>Nombre</th><th>2do Nombre</th><th>Apellido_P</th><th>Apellido_M</th><th>E-mail</th><th>Area</th><th>Ubicacion</th><th>Cargo</th><th>Seccion</th><th>Estado</th><th>Tipo</th></tr>
	<?php do{ ?>
	<tr><td><?php echo $usuarios['rut']; ?></td><td><?php echo $usuarios['nombre']; ?></td><td><?php echo $usuarios['nombre_2']; ?></td><td><?php echo $usuarios['apellido']; ?></td><td><?php echo $usuarios['apellido_m']; ?></td><td><?php echo $usuarios['mail'] ?></td><td><a href="usuario-editar-area.php?id=<?php echo $usuarios['rut']; ?>"><?php echo $usuarios['area']; ?></a></td><td><?php echo $usuarios['ubicacion']; ?></td><td><?php echo $usuarios['cargo']; ?></td><td><?php echo $usuarios['seccion']; ?></td><td><a href="cambiar-estado-usuario.php?id=<?php echo $usuarios['rut'];?>"><?php echo estado($usuarios['activo']); ?></a></td><td><a href="cambiar-tipo-user.php?id=<?php echo $usuarios['rut']; ?>"><?php echo tipo($usuarios['tipo']);?></a></td></tr>
	<?php }while($usuarios = mysql_fetch_array($dato1)); ?>
</table>
</div>
</div>
</body>
</html>
