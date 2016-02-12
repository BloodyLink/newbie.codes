<?php
	//include('restringirAcceso.php');
	session_start();
	$user = $_SESSION["user"];
	$area = $_SESSION["area"];
	$tipo = $_SESSION["tipo"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Index</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
<h3>Bienvenido: <?php echo $user;?></h3><h5>Area: <?php echo $area?></h5>
<ul>
	<?php if($tipo == "1"){ 
		echo "<li><a href='usuarios.php'>Usuarios</a></li><li><a href='areas.php'>Areas</a></li><li><a href='requerimientos-default.php'>Requerimientos por default</a></li><li><a href='solicitud-admin.php'>Solicitud de Requerimientos</a></li><li><a href='folio.php'>Folio-admin</a></li>";
	}
	if($tipo == "2"){ 
		echo "<li><a href='solicitud.php'>Solicitud de Requerimientos</a></li><li><a href='folio-user.php'>Folio</a></li>";
	} 

	?>
</ul>
<br />
<a href="cerrarSesion.php">Cerrar Sesion</a>
</body>
</html>
