<?php
	include('conectar-bd.php');
	$cod = $_GET['cod'];
	$dato = mysql_query("SELECT * FROM soportes");
?>
<!doctype html>
<html lang=es>
<head>
<title>Observaciones</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<form id="frmObservacion" name="frmObservacion" method="post" action="agregar-observacion.php?cod=<?php echo $cod; ?>">
	<table>
		<tr><th colspan="2">Agregar observacion</th></tr>
		<tr><td><textarea tabindex='5' cols='50' rows='5' name='observacion' ></textarea></td></tr>
		<tr><td><input type="submit" value="Agregar" /></td></tr>
	</table><br />
	<table class="tablaMuestra">
		<tr><th>Codigo</th><th>Observacion</th><th></th></tr>
	</table>
</form>
</body>
</html>