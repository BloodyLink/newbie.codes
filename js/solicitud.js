function especificarRequerimiento(){
	var solicitud = document.getElementById("finSolicitud");
	solicitud.innerHTML = "Especifique:<br /><textarea tabindex='5' cols='50' rows='5' name='especifico' ></textarea><br /><input type='submit' value='Enviar' name='btnSolicitud' />";
}
function mostrarBotonEnviar(){
	var solicitud = document.getElementById("finSolicitud");
	solicitud.innerHTML = "<input tabindex='6' type='submit' value='Enviar' name='btnSolicitud' />"
}
function yaCompletado(){
	alert('El requerimiento ya ha sido marcado como \'Completado\' y ya no puede ser cambiado.');
	return false;
}

function pasarCod(cod){
	document.getElementById("txtCod2").value = cod;
	return false;
}

/*function variable(a){
	span = document.getElementById("form");
	span.innerHTML = "<form action='' onsubmit='MostrarConsulta('consultaRequerimientos.php?tipo=" + a + "'); return false'>"
}*/

/*function editarUsuario(text){
	//<select id="listaUsuarios" name="listaUsuarios" size="2" onchange="mostrarUsuario(.value)">
	var lista = document.getElementById();
}*/
function cambiarTxtUser(str,index){
	var user = document.getElementById("txtUser");
	var frm = document.getElementById("frmRequerimiento");
	var rut = document.getElementById("txtRut");
	var area = document.getElementById("txtAreaH");
	var user = document.getElementById("txtUserH");
	var lista = document.getElementById("listaUsuarios");
	user.value = str;
	var texto = lista.options[index].text;
	rut.value = frm.listaUsuarios.value;
	area.value = texto.substr(texto.indexOf('/')+1);
	user.value = texto.substr(texto.indexOf(' '),texto.indexOf('/')-10);
}

function limpiarUser(){
		var user = document.getElementById("txtUser");
		user.value = "";
		user.focus();
	}
	
function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

function horas(){
	var horas = document.getElementById("slHoras");
	horas.options[0] = new Option("Horas");
	var i = 1;
	horas.options[1] = new Option("0");
	for(i=2;i<=24;i++){
		horas.options[i] = new Option(i);
	}
	return false;
}

function minutos(){
	var minutos = document.getElementById("slMinutos");
	minutos.options[0] = new Option("Minutos");
	var j = 1;
	minutos.options[1] = new Option("00");
	minutos.options[2] = new Option("01");
	minutos.options[3] = new Option("02");
	minutos.options[4] = new Option("03");
	minutos.options[5] = new Option("04");
	minutos.options[6] = new Option("05");
	minutos.options[7] = new Option("06");
	minutos.options[8] = new Option("07");
	minutos.options[9] = new Option("08");
	minutos.options[10] = new Option("09");
	for(j=11;j<=61;j++){
		minutos.options[j] = new Option(j-1);
	}
	return false;
}