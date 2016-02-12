<?php
	include('conectar-bd.php');
	$cod = $_GET['cod'];
	$desc = $_GET['descripcion'];
?>
<!doctype html>
<html>
<head>
<title>Editar Observacion</title>
</head>
<body>
	<form method="post" action="edit-obs.php">
		<input type="hidden" name="txtCod" value="<?php echo $cod; ?>" />
		<table>
			<tr><td><textarea name="txtObservacion" cols="30" rows="3" ><?php echo $desc; ?></textarea></td></tr>
			<tr><td><input type="submit" value="Finalizado" /></td></tr>
		</table>
	</form>
</body>
</html>