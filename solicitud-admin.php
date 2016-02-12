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
	
	$dato = mysql_query("SELECT descripcion FROM requerimientos_tipo WHERE activo = '1'");
	$tipos = mysql_fetch_array($dato);
	$dato1 = mysql_query("SELECT descripcion FROM requerimientos_default WHERE activo = '1' AND tipo = '$tipo'");
	$reqDef = mysql_fetch_array($dato1);
	$cant = mysql_num_rows($dato1);
	
	
?>
<!DOCTYPE html">
<html lang=es>
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
	<form id="frmRequerimiento" method="post" action="enviarRequerimiento-admin.php">
	<div class="edicionUser">
		<input autocomplete="off" id="txtUser" type="text" name="txtUser" value="<?php echo $user ?>" tabindex="1" onkeyup="mostrarUsuario(this.value)"/>
		
		<a href="#" id='editar' onclick="limpiarUser()" >Editar</a><br />
		<select tabindex="2" class="listaSelect" id="listaUsuarios" name="listaUsuarios" size="2" onchange="cambiarTxtUser(this.options[this.selectedIndex].value,this.selectedIndex)">
		</select>
		<input type="hidden" id="txtRut" name="txtRut" value=""/>
		<input type="hidden" id="txtUserH" name="txtUserH" value=""/>
		<input type="hidden" id="txtAreaH" name="txtAreaH" value=""/>
	</div>
	
		<table>
			<tr><th>Seleccione Problema:</th></tr>
			<tr>
			<td>
			<form action="">
				<select tabindex="3" class="listaSelect" name="lista1" size="2" onchange="mostrarRequerimiento(this.value)">
				<?php do{ ?>
					<option value="<?php echo $tipos['descripcion']; ?>" ><?php echo $tipos['descripcion']; ?></option>
				<?php }while($tipos = mysql_fetch_array($dato));?>
			</select><br />
			</form>
			</td>
			<td><select tabindex="4" class="listaSelect" id="lista2" name="slDescripcion" size="2">
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
</body>
</html>