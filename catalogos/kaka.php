<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<script type="text/javascript" src="../ajax/ajax.js"></script>
<body>
<form id="form1" name="form1" method="post" action="" onsubmit="pedirDatos1(25); return false">
  <input type="submit" name="button" id="button" value="Enviar" />
  <input type="text" name="cmb_meta" id="cmb_meta" />
</form>
<div id="formulario" >

</div>
</body>
</html>

<script language="javascript">
function enviarDatosEmpleado1(nombre,departamento,sueldo,opci){
 
	//donde se mostrará lo resultados
	divResultado = document.getElementById('contenido');
	nom = nombre;
	dep = departamento;
	suel= sueldo;
	opcion = opci;
	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//uso del medotod POST
	//archivo que realizará la operacion
	//registro.php
	ajax.open("POST","../catalogos/abc.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
				divResultado.innerHTML = ajax.responseText
			//mostrar un mensaje de actualizacion correcta
			
			divFormulario.innerHTML = "Se Agrego el Registro Correctamente<br>";
			//LimpiarCampos();
		}            
	}
	ajax.setRequestHeader("Content-Tynombrespe","application/x-www-form-urlencoded");
	//enviando los valores
	//alert("nombres="+nom+"&departamento="+dep+"&sueldo="+suel+"&opcion="+opcion);
	ajax.send("cmb_meta="+nom+"&cmb_partida="+dep+"&ingreso="+suel+"&opcion="+opcion)
}