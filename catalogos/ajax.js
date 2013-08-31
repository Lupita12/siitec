
//creo el objeto ajax
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

/*
//Funcion Para Paginar Resultados de una Consulta
function Pagina(nropagina){
	//donde se mostrará los registros
	divContenido = document.getElementById('contenido');
	
	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizará el proceso de paginar
	//junto con un valor que representa el nro de pagina
	ajax.open("POST", "catalogue_empleados.php");
	//divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
			divContenido.style.display="block";
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("pag="+nropagina)
}

//funcion que recupero los datos del formulario y los envio al archivo clase lo cual realizara tal operacion depende de la opcion que tenga en este caso actualizacion
function enviarDatosEmpleado(){
	//donde se mostrará lo resultados
	divResultado = document.getElementById('contenido');
	divFormulario = document.getElementById('formulario');
	//valores de los inputs
	id=document.frmempleado.idempleado.value;
	nom=document.frmempleado.nombres.value;
	dep=document.frmempleado.departamento.value;
	suel=document.frmempleado.sueldo.value;
	opcion=document.frmempleado.opcion.value;
	
	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//usando del medoto POST
	//archivo que realizará la operacion
	//actualizacion.php
	ajax.open("POST", "clase.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar los nuevos registros en esta capa
			divResultado.innerHTML = ajax.responseText
			//mostrar un mensaje de actualizacion correcta
			divFormulario.innerHTML = "La actualizaci&oacute;n se realiz&oacute; correctamente";
		}
	}
	//muy importante este encabezado ya que hacemos uso de un formulario
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores paso el parametro opcion para que realize la operacion indicada en el switch de php
	ajax.send("idempleado="+id+"&nombres="+nom+"&departamento="+dep+"&sueldo="+suel+"&opcion="+opcion)
}


//Muestro los datos actuales en el formulario 
function pedirDatos(idempleado){
	//donde se mostrará el formulario con los datos
	divFormulario = document.getElementById('formulario');
	
	//instanciamos el objetoAjax
	ajax=objetoAjax();

//	ajax.open("POST", "consulta_por_id.php?idemp="+idempleado);
	ajax.open("POST", "consulta_por_id.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divFormulario.innerHTML = ajax.responseText
			//mostrar el formulario
			divFormulario.style.display="block";
		}
	}
	//como hacemos uso del metodo GET
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

	
	ajax.send("idemp="+idempleado)
}
*/

//funcion que va a mandar los datos a php para que elimine el registro aqui le pongo por default la opcion 2 que siempre  y se cumpla la condicion del confirm elimine el registro 
function eliminarDato(idempleado){
	//donde se mostrará el resultado de la eliminacion
	divContenido = document.getElementById('contenido');
	divFormulario = document.getElementById('formulario');
	
	
	//usaremos un cuadro de confirmacion	
	var eliminar = confirm("De verdad desea eliminar este Articulo?")
	if ( eliminar ) {
	var opcion = 3;
		//instanciamos el objetoAjax
		ajax=objetoAjax();
		//uso del medotod GET
		//indicamos el archivo que realizará el proceso de eliminación
		//junto con un valor que representa el id del empleado
	        ajax.open("GET", "abc.php?idarticulo="+idempleado+"&opcion="+opcion);

		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
			//mostrar un mensaje de actualizacion correcta
			divFormulario.innerHTML = "Registro Borrado correctamente";

			}
		}
		
		//como hacemos uso del metodo GET
		//colocamos null
		ajax.send(null)
	}
}


//repito la funcion de pedir datos pero ahora vacio para poder ingresar registro nuevos 
//aqui mucho cuidado si de manera local se utiliza get si lo usas en un Servidor Dedicado se utiliza POST
//para llamar al formulario
function pedirDatos1(ja){
	//donde se mostrará el formulario con los datos
	divFormulario = document.getElementById('formulario');
	
	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//uso del medotod GET Manera Local GEt
	//Manera Servidor POST , True
	ajax.open("POST","nuevo.php",true);
	
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
		divFormulario.innerHTML = ajax.responseText
			//mostrar el formulario
			divFormulario.style.display="block";
			
				}
	}
	//como hacemos uso del metodo GET
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");	
	//ajax.send(null)
	ajax.send("idepa="+ja)	
}


//Funcion Valido Empleado aqui hago la validacion simple del empleado si no introdujo nada en la cajitas le mando mensaje que ponga algo
function valida_empleado(){
	//donde se mostrará lo resultados
	divResultado = document.getElementById('contenido');
	//valores de los inputs

	par=document.nuevareq.cmb_partida.value;
	art=document.nuevareq.cmb_articulo.value;	
	mar=document.nuevareq.cmb_descripcion.value;
	uni=document.nuevareq.cmb_umedida.value;
	opci=document.nuevareq.opcion.value;
	
//	clas=document.nuevareq.cmb_clasificacion.value;
//	ume=document.nuevareq.cmb_umedida.value;
	can=document.nuevareq.cantidad.value;
//	des=document.nuevareq.descripcion.value;
	ing=document.nuevareq.ingreso.value;
	iva=document.nuevareq.iva.value;
	hing=document.nuevareq.h_ingreso.value;
	hiva=document.nuevareq.h_iva.value;
	if(par == 0)
		alert('Error!! no ha seleccionado la Partida');
	else 
	{	
		if(art == 0)
			alert("Error No ha seleccionado el Articulo");
		else
		{
			if(mar==0)
				alert('Error!! no ha seleccionado una descripcion');
			else
			{
				if(uni==0)
					alert('Error!! no ha selecionado la Unidad de Medida');
				else
				{
					if(can=='' || can==0)
						alert('Error!! no ha indicado la Cantidad');
					else
					{
						if(ing=='' || ing=='$0')
							alert('Error!! no ha indicado el Precio');
						else
						{
							alert('se envio todo'+uni);
							enviarDatosEmpleado1(par,art,mar,opci,can,uni,hing,hiva);
						}
					}
				}
			}
		}
	}
	
}
//enviar datos del empleado le paso los parametros para que estos parametro lo mande a la pagina de php y pueda realizar la operacion de altas                         par,art,mar,opci,clas,ume,can,des,hing,hiv
function enviarDatosEmpleado1(par,art,mar,opci,can,uni,ing,iva){
 
	//donde se mostrará lo resultados
	divResultado = document.getElementById('contenido');
	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//uso del medotod POST
	//archivo que realizará la operacion
	//registro.php
	ajax.open("POST","abc.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
				divResultado.innerHTML = ajax.responseText
			//mostrar un mensaje de actualizacion correcta
			
			divFormulario.innerHTML = "Se Agrego el Registro Correctamente<br>";
			//LimpiarCampos();
		}            
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("cmb_partida="+par+"&cmb_arti="+art+"&cmb_marc="+mar+"&opcion="+opci+"&canti="+can+"&unidad="+uni+"&ingreso="+ing+"&iv="+iva)
}

//Para Finalizar la opcion de Cancelar solo nos borrara el formulario y nos mostrara el listado actual normal
function Cancelar(){
	//donde se mostrará el formulario con los datos
	divFormulario = document.getElementById('formulario');
		//instanciamos el objetoAjax
	ajax=objetoAjax();
	//uso del medotod GET
	ajax.open("POST", "cancelar.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divFormulario.innerHTML = ajax.responseText
			//mostrar el formulario
			divFormulario.innerHTML = "No se Realizo Ninguna Operacion<br>";
		}
	}
	
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(null)
}


function creaAjax()
{
	var objetoAjax=false;
	try {
		/*Para navegadores distintos a internet explorer*/
		objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e)
	{
		try {
			/*Para explorer*/
			objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			objetoAjax = false;
			}
		}
	
	if (!objetoAjax && typeof XMLHttpRequest!='undefined') {
		objetoAjax = new XMLHttpRequest();
	}
	return objetoAjax;
}



function FAjax (url,capa,valores,metodo)
{
	
	var ajax=creaAjax();
	var capaContenedora = document.getElementById(capa);

	/*Creamos y ejecutamos la instancia si el metodo elegido es POST*/
	if(metodo.toUpperCase()=='POST')
	{
		ajax.open ('POST', url, true);
		ajax.onreadystatechange = function()
		{
			if (ajax.readyState==1)
			{
				//capaContenedora.innerHTML="Procesando...";
			}
			else if (ajax.readyState==4)
			{
				if(ajax.status==200)
				{
					document.getElementById(capa).innerHTML=ajax.responseText; 
				}
				else if(ajax.status==404)
				{
					capaContenedora.innerHTML = "La direccion NO existe";
				}
				else
				{
					capaContenedora.innerHTML += "<br>Error: Interno";
				}
			}
		}
		ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		ajax.send(valores);
		return;
	}
	
	/*Creamos y ejecutamos la instancia si el metodo elegido es GET*/
	if (metodo.toUpperCase()=='GET')
	{
		ajax.open ('GET', url, true);
		ajax.onreadystatechange = function()
		{
			if (ajax.readyState==1)
			{
				//capaContenedora.innerHTML="Procesando...";
			}
			else if (ajax.readyState==4)
			{
				if(ajax.status==200)
				{ 
					document.getElementById(capa).innerHTML=ajax.responseText; 
				}
				else if(ajax.status==404)
				{
					capaContenedora.innerHTML = "La direccion NO existe";
				}
				else
				{
					capaContenedora.innerHTML = "Error: ".ajax.status;
				}
			}
		}
		ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		ajax.send(null);
		return
	}
}

function pedirjustificacion(){
	//donde se mostrará el formulario con los datos
	divFormulario = document.getElementById('formulario');
	
	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//uso del medotod GET Manera Local GEt
	//Manera Servidor POST , True
	ajax.open("GET","justifica.php");
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
		divFormulario.innerHTML = ajax.responseText
			//mostrar el formulario
			divFormulario.style.display="block";
			
				}
	}
	//como hacemos uso del metodo GET
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");	
	ajax.send(null)
}


function valida_justificacion(){
	//donde se mostrará lo resultados
	divResultado = document.getElementById('contenido');
	//valores de los inputs
	var concate;
	concate=0;
	opci=document.justi.opcion.value;
	with(document.justi)
	{
			b=0;
			accio=hid.value;
			for(i=1;i<=accio;i++)
			{
				if(document.getElementById('radio'+i).checked==true)
				{
					b++;
					if(concate==0)
						concate=document.getElementById('radio'+i).value;
					else
						concate=concate+'#'+document.getElementById('radio'+i).value;					
				}	
			}
			if(b==0)
			{
				alert("Debes seleccionar almenos 1 acción");
				//return 0;
			}
			else
				enviarDatos(concate,opci);
	}	

}

function enviarDatos(jus,opci){
 
	//donde se mostrará lo resultados
	divResultado = document.getElementById('contenido');
	//instanciamos el objetoAjax
	ajax=objetoAjax();

	ajax.open("POST","abc.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
				divResultado.innerHTML = ajax.responseText
			//mostrar un mensaje de actualizacion correcta
			
			divFormulario.innerHTML = "Se Agrego el Registro Correctamente<br>";
			//LimpiarCampos();
		}            
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	//alert("nombres="+nom+"&departamento="+dep+"&sueldo="+suel+"&opcion="+opcion);
	ajax.send("txt_just="+jus+"&opcion="+opci)
}
//////////////////////////////////////////////////////////////ajax para la descripcion
function nuevadescripcion(){
	//donde se mostrará el formulario con los datos
	divFormulario = document.getElementById('formulario');
	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//uso del medotod GET Manera Local GEt
	//Manera Servidor POST , True
	ajax.open("GET","ajax_agregardescripcion.php",true);
	
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
		divFormulario.innerHTML = ajax.responseText
			//mostrar el formulario
			divFormulario.style.display="block";
			
				}
	}
	//como hacemos uso del metodo GET
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");	
	//ajax.send(null)
	ajax.send(null)	
}

function valida_descripcion(){
	//donde se mostrará lo resultados
	divResultado = document.getElementById('contenido');
	//valores de los inputs
	var conta;
	conta=0;
	
	par=document.f_nuevadescripcion.cmb_partida.value;
	art=document.f_nuevadescripcion.cmb_articulo.value;
	des=document.f_nuevadescripcion.txtDescri.value;
	uni=document.f_nuevadescripcion.txtUniMed.value;	
	combo=document.f_nuevadescripcion.cmb_descri.value;
	if(par==0)
		alert('Error!! no ha indicado la partida');	
	else
	{
		if(art==0)
			alert('Error!! no ha indicado el articulo');
		else
		{
		//if(combo !=0)
		//	conta+=1;
			alert(combo+' alsdj '+des);
			if(des == '' && combo ==0)
			{
				conta++;
				//alert('Error!! no tiene descripción');		
			}

			if(des != '' && combo !=0)//si solo descripcion truena
			{
				conta++;
				//alert('Error!! solo 1 descripción');
			}
	
			if(conta>0)
			{
				alert('Error al agregar descripción');			
			}
			else
			{

				if(uni == '')
					alert("Error No tien unidad de medida");
				else
				{
					alert('todo ok marito');
					enviarDescripcion(art,des,uni,combo);
				}
			}
		}
	}
}
function enviarDescripcion(art,des,uni,combo){
 
	//donde se mostrará lo resultados
	divResultado = document.getElementById('contenido');
	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//uso del medotod POST
	//archivo que realizará la operacion
	//registro.php
	ajax.open("POST","abc2.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
				divResultado.innerHTML = ajax.responseText
			//mostrar un mensaje de actualizacion correcta
			
			divFormulario.innerHTML = "Se Agrego el Registro Correctamente<br>";
			//LimpiarCampos();
		}            
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("articulo="+art+"&descripcion="+des+"&unidadmedida="+uni+"&valorcombo="+combo)
}