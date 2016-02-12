<?php
	include('conectar-bd.php');
	session_start();
	$texto = $_GET['tipo'];
	//$dato = mysql_query("SELECT rut, nombre, apellido FROM usuarios WHERE nombre LIKE '%$texto%' OR apellido LIKE '%$texto%' OR rut LIKE '%$texto%'");
	$dato = mysql_query("SELECT usuarios.rut, usuarios.nombre, usuarios.apellido, usuarios.apellido_m, areas.descripcion AS area FROM usuarios, areas WHERE MATCH(nombre,apellido,apellido_m) AGAINST('$texto') AND usuarios.area = areas.id ");
	$nom = mysql_fetch_array($dato);
	$cant = mysql_num_rows($dato);
	$_SESSION['rut'] = $nom['rut'];
	//$_SESSION["userReq"] = $nombreC;
	//$_SESSION["areaReq"] = $nom["area"];
	if($cant > 0){
			do{
						echo utf8_encode("<option id='opcion' value='" . $nom['rut'] . "'>" . $nom['nombre'] . " " . $nom['apellido'] . " " . $nom['apellido_m'] . " /" . $nom['area'] . "</option>");
			}while($nom = mysql_fetch_array($dato));
					
			}
?>