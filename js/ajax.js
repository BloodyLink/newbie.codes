function mostrarRequerimiento(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("lista2").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("lista2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","consultaRequerimientos.php?tipo="+str,true);
xmlhttp.send();
}

function mostrarUsuario(str,ad)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("listaUsuarios").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("listaUsuarios").innerHTML=xmlhttp.responseText;
    }
  }	
xmlhttp.open("GET","consultaUsuarios.php?tipo="+str,true);
xmlhttp.send();
}

function obtenerObservaciones(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("observaciones").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("observaciones").innerHTML=xmlhttp.responseText;
    }
  }
document.getElementById("txtCod").value = str;
xmlhttp.open("GET","obtenerobservaciones.php?cod="+str,true);
xmlhttp.send();
}

function obtenerCod(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("lista2").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("lista2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","consultaRequerimientos.php?tipo="+str+"&ad="+ad,true);
xmlhttp.send();
}

function obtenerObservacionesUser(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("observaciones").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("observaciones").innerHTML=xmlhttp.responseText;
    }
  }
document.getElementById("txtCod").value = str;
xmlhttp.open("GET","obtenerobservacionesuser.php?cod="+str,true);
xmlhttp.send();
}
