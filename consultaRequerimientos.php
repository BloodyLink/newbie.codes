<?php
	include('conectar-bd.php');
	$tipo = $_GET['tipo'];
	$dato = mysql_query("SELECT descripcion FROM requerimientos_default WHERE activo = '1' AND tipo = '$tipo'");
	$reqDef = mysql_fetch_array($dato);
	$cant = mysql_num_rows($dato);
	if($cant > 0){
			do{
						echo "<option onclick='mostrarBotonEnviar()'>" . $reqDef['descripcion'] . "</option>";
					 }while($reqDef = mysql_fetch_array($dato));
					echo "<option onclick='especificarRequerimiento()'>Otro...</option>";
			}
?>