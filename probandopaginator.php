<?php
$con = mysql_connect("localhost","root","") or die (mysql_error()); 
mysql_select_db("soporte",$con) or die (mysql_error());
$_pagi_sql = "SELECT * FROM soportes"; 
$_pagi_cuantos = 2;
include("paginator.inc.php");
while($row = mysql_fetch_array($_pagi_result)){ 
    echo $row['codigo']."<br />"; 
} 

//Incluimos la barra de navegación 
echo"<p>".$_pagi_navegacion."</p>";  
?>