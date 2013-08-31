/*
*Esta libreria es una libreria AJAX creada por Javier Mellado con la inestimable
*colaboracion de Beatriz Gonzalez.
*descargada del portal AJAX Hispano http://www.ajaxhispano.com
*contacto javiermellado@gmail.com
*
*Puede ser utilizada, pasada, modificada pero no olvides mantener 
*el espiritu del software libre y respeta GNU-GPL
*/

/*
Estados del readyState

0 - Sin inicializar, siempre será:
1 - Abierto (acaba de llamar open)
2 - Enviado
3 - Recibiendo
4 - A punto
*/

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
