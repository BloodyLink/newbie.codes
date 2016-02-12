<?php
	include('conectar-bd.php');
	$cod = $_GET['cod'];
	$dato = mysql_query("SELECT * FROM observaciones WHERE soporte_cod = '$cod'");
	$reg = mysql_fetch_array($dato);
	$cant = mysql_num_rows($dato);
	echo "<tr><th>Observaciones de la solicitud " . str_pad($cod, 6, "0",STR_PAD_LEFT) . "</th></tr>";
	if($cant > 0){
		echo "<input type='hidden' name='txtCod' value='" . $cod . "' />";
		do{
			echo "<tr><td>" . $reg['descripcion'] . "</td></tr>";
		}while($reg = mysql_fetch_array($dato));
	}else{
		echo "<tr><td>No hay observaciones para esta solicitud.</td></tr>";
	}
?>