<?php
	include('conectar-bd.php');
	$rut = $_POST['txtRut'];
	$nombre = $_POST['txtNombre'];
	$nombre2 = $_POST['txtNombre2'];
	$apellido = $_POST['txtApellido'];
	$apellidoM = $_POST['txtApellidoM'];
	$mail = $_POST['txtMail'];
	$pass = $rut;
	$tipo = $_POST['radTipo'];
	$passE = sha1($pass);
	$slArea = $_POST['slArea'];
	
	//echo "Rut: " . $rut . "<br>Nombre: " . $nombre . "<br>Apellido: " . $apellido . "<br>Pass: " . $pass . "<br>Pass Encriptada: " . $passE . "<br>Area: " . $slArea . "<br>Tipo: " . $tipo;
	$dato = mysql_query("SELECT * FROM usuarios WHERE rut = '$rut'");
	$cant = mysql_num_rows($dato);
	if($cant>0){
		header('location:error.php');
		exit();
	}else{
		mysql_query("INSERT into usuarios(rut,nombre,nombre_2,apellido,apellido_m,mail,password,tipo,area) VALUES('$rut','$nombre','$nombre2','$apellido','$apellidoM','$mail','$passE','$tipo','$slArea')");
	
	//header("location:usuarios.php");
};
	function createRandomPassword() { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 7) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 

	} 
	
	echo "Su Password es: " . $pass;
	echo "<br><a href='usuarios.php'>Volver</a>";
?>