<? // session_start();?>
<? require_once ("cls_capitulo5000.php");?>
<? require_once ("conexion.php");?>
<? include ("registro.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" >

<title>Administrador de contenidos web - Tecnológico de Colima</title>

</head>

<style type="text/css">
<!--
@import"cssmenuhorizontal.css";
-->
/*
body {
margin: 0;
padding: 30px;
background: #FFF;
color: #666;
}
*/
h1 {
font: bold 16px Arial, Helvetica, sans-serif;
}

p {
font: 11px Arial, Helvetica, sans-serif;
}

a {
color: #900;
text-decoration: none;
}

a:hover {
background: #900;
color: #fff;
}
</style>







<body onload="cargar();">
<script language="javascript">


function cambiar(elim)
{	

if(confirm('¿Esta seguro de eliminar el articulo?'))
	{
	
	//costo_total = document.getElementById('costo_total'+m).value;
	var campos = '&elimina='+elim; 
	
		//var total = total; 

	
	
	 open('eliminar_capitulo5000.php?id='+campos,'_self');
	//document.getElementById('monto'+m).value = total;
	//alert ('Este monto ha sido reciclado');

	
	}



	
	
}


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






function enviarDatos(m){
	
	n = document.getElementById('txt'+m).value;
	n2 = document.getElementById('txt2'+m).value;
	n6 = document.getElementById('txt6'+m).value;
	
	m3 = document.getElementById('txt5'+m).value;
	m4 = document.getElementById('monto'+m).value;
	hidmonto = document.getElementById('hid'+m).value; 
	
	
	if (m3 != 0){
	
	
	
  //donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  divResultado.innerHTML= '<img src="anim.gif">';
  //valores de las cajas de texto
  monto=document.getElementById('monto'+m).value;
  meta=document.getElementById('meta'+m).value;
  partida=document.getElementById('partida'+m).value;
  combo= document.getElementById('hiddepa'+m).value;
  
  txt=document.getElementById('txt'+m).value;
  txt2=document.getElementById('txt2'+m).value;
  txt3=document.getElementById('txt3'+m).value;
  txt4=document.getElementById('txt4'+m).value;
  txt5=document.getElementById('txt5'+m).value;
  txt6=document.getElementById('txt6'+m).value;
  
  
  
  //instanciamos el objetoAjax
  ajax=objetoAjax();
  //uso del medoto POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "registro.php",true);
  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
  //mostrar resultados en esta capa
  divResultado.innerHTML = ajax.responseText
  //llamar a funcion para limpiar los inputs
  LimpiarCampos();
  
 /*  document.getElementById('cmb'+m).value = 0; */
  document.getElementById('txt'+m).value = "";
  document.getElementById('txt2'+m).value="";
  document.getElementById('txt3'+m).value="";
  document.getElementById('txt4'+m).value = "";
  document.getElementById('txt5'+m).value = "";
  document.getElementById('txt6'+m).value= "";
  
	 
	  
  }
  }

  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores
  ajax.send("monto="+monto+"&meta="+meta+"&partida="+partida+"&combo="+combo+"&txt="+txt+"&txt2="+txt2+"&txt3="+txt3+"&txt4="+txt4+"&txt5="+txt5+"&txt6="+txt6)
  
  /*document.getElementById('cmb'+m).value = 0; */
  document.getElementById('txt'+m).value = "Nombre";
  document.getElementById('txt2'+m).value="Denominacion";
  document.getElementById('txt3'+m).value="";
  document.getElementById('txt4'+m).value = "";
  document.getElementById('txt5'+m).value = "";
  document.getElementById('txt6'+m).value= "Justificacion";
  
  
  
  alert ('Articulo agregado correctamente, puedes seguir agregando');
  
	r = txt3*txt4;
	
	resto = m4 - r;
	document.getElementById('monto'+m).value = resto;
	
	
	
	
	
	
	
	
	}
	else
	{ 		
				if (m4 == 0)
				{
			
		
					alert('Ya no tienes presupuesto para utilizar');	
				
				}
				else
				{
					alert('El monto no puede estar en cero');	
					
				}
				
			
	}
		
	
	
}


function multi(m)
{
	
	
with(document.form1)
{
m1 = document.getElementById('txt3'+m).value;
m2 = document.getElementById('txt4'+m).value;
m3 = document.getElementById('monto'+m).value;
m4 = document.getElementById('hid'+m).value;

r = m1*m2;
resto = m3 - r;
resto2 = m4 -r;

suma = m3 + r;




	if(r > m3)
	{
			
			alert('EL MONTO TOTAL NO PUEDE SER MAYOR AL DINERO ASIGNADO');
			
			document.getElementById('txt3'+m).value = 0;
			document.getElementById('txt4'+m).value = 0;
			 document.getElementById('txt5'+m).value = "";
			 
			 
			 
			 document.getElementById('monto'+m).value = m3;
			
	}

	else
	{
		
		if ( m3 != 0)
		{
		
				document.getElementById('txt5'+m).value = r;
		
				
			
				
			
		}
		else
		{ 
				alert('Ya no tienes presupuesto para utilizar en esta meta');
				
		}
		
		
		
		
		
		
		
	 }
}
	
	
	
	

} 



var nav4 = window.Event ? true : false;
function decimales(evt,campo)
{
	var key = nav4 ? evt.which : evt.keyCode;
	if (campo.value.indexOf('.', 0) == -1)
	{
		return (key <= 13 || key == 46 || (key >= 48 && key <= 57));
	}
	else
	{
		return (key <=13 || (key >= 48 && key <= 57));
	}

}



function salir	()
{
con=0;
	with(document.form1)
	{
		 for(i=0;i<=parseInt(conta.value);i++)
		 {
			if(document.getElementById('monto'+i).value==0)
				con++;
		 }
		 if(con==0)
		 {
		 	alert('Es necesario terminar la distribucion para salir');
			return;
		 }	
		 else
		 
		 
		 	submit();
			

 	}

}




</script>
                          
<form id="form1" name="form1" method="post" action="capitulo5000.php" >
  <?
$canti=$_GET['sum'];
$canti--;


$depa=$_GET['ideparta'];
$_SESSION["departamento"] = $depa;


//list($mon[], $par[], $met[]) = split('[poli]', $meta);
?>
  
  
  
  <table width="88%" border="0" align="center">
    <tr>
      <td width="12%">Dinero asignado 
      <input name="conta" type="hidden" id="conta" value="<?=$canti;?>"/></td>
      <td width="7%">Meta</td>
      <td width="7%">Partida</td>
      
      
      
      <td width="20%">Nombre </td>
      <td width="19%">Denominacion del bien</td>
      <td width="12%">Cantidad</td>
      <td width="11%">Costo Unitario($)</td>
      <td width="6%">Costo Total($)</td>
      <td width="6%">Justificacion</td>
      <td> Agregar </td>
    </tr>
  <?
$a=1;
for($i=0;$i<=$canti;$i++){

if($a==0)
		{ 
		
?>
    
    
    
    
    <? $a=1;}else{?>
    <tr class="odd">
      <? $a=0;}?>
      
      
      
      
      
      <td><label>
        <input name="monto<?=$i;?>" type="text" id="monto<?=$i;?>" value="<? echo $_GET["monto".$i];?>" size="8" readonly="readonly" />
        </label>
        <input type="hidden" name="hid<?=$i;?>" id="hid<?=$i;?>" value="<? echo $_GET["monto".$i];?>" />
        
        
        
      </td>
      <td><input name="meta<?=$i;?>" type="text" id="meta<?=$i;?>" value="<? echo $_GET["meta".$i];?>" size="8" readonly="readonly" />      <input type="hidden" name="hidm<?=$i;?>" id="hidm<?=$i;?>" value="<? echo $_GET["meta".$i];?>" /></td>
      <td>
        <label>
          <input name="partida<?=$i;?>" type="text" id="partida<?=$i;?>" value="<? echo $_GET["partida".$i];?>" size="8" readonly="readonly" />
        </label>
        
        
        
      <input type="hidden" name="hidp<?=$i;?>" id="hidp<?=$i;?>"  value="<? echo $_GET["partida".$i];?>"/></td>
      
      <input type="hidden" name="hiddepa<?=$i;?>" id="hiddepa<?=$i;?>" value="<? echo $_GET["ideparta"];?>" />
      
      
      
      
      
      <td><textarea name="txt<?=$i;?>" cols="15" rows="5" id="txt<?=$i;?>">Nombre</textarea></td>
      <td><textarea name="txt2<?=$i;?>" cols="15" rows="5" id="txt2<?=$i;?>">Denominacion</textarea></td>
      
      
      
      
      <td><label>
        <input name="txt3<?=$i;?>" type="text" id="txt3<?=$i;?>" onblur="multi(<?= $i;?>);" onkeypress="return decimales(event,this);" value="0" size="4" />
      </label></td>
      
      <td><input name="txt4<?=$i;?>" type="text" id="txt4<?=$i;?>" onblur="multi(<?= $i; ?>);" onkeypress="return decimales(event,this);" value="0" size="10"/></td>
      
      <td><input name="txt5<?=$i;?>" type="text" id="txt5<?=$i;?>" size="10" readonly="readonly"  /></td>
      
      
      
      
      
      <td><textarea name="txt6<?=$i;?>" cols="15" rows="5" id="txt6<?=$i;?>">Justificacion</textarea></td>
      <td> <input name="btn<?=$i;?>" type="button" id="btn<?=$i;?>" value="Agregar" onclick="enviarDatos(<?= $i; ?>);"  /> 
        
      </td>
    </tr>
    
    
    
  <? }?>	
    
    <tr>
      <td colspan="9" align="center"><div align="center">
        
      </td>
    </tr>	
  </table>
  
  <div align="center">
    <input name="Bot&oacute;n" type="button"  value="Finalizar" onclick="javascript:salir();" />
    
    
    
  </div>
  
  
  <table align="center">
  <tr>
  <td align="center">
  <div id="resultado"><?php  include('consulta.php');?></div>
  </td>
  </tr>
  </table>
  
  
</form>





<span class="txtcontenidoazul">Distribucion Capitulo 5000</span></td>
							

</body>
</html>