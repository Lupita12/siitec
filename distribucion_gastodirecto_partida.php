<? session_start(); ?>
<? include("conexion.php"); ?>
<? include("cls_gastodirecto_partida.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/contenidos.dwt" codeOutsideHTMLIsLocked="false" -->

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







<body onload="cargar();" onunload="window.opener.history.go(0);" >


                        
						
<div  align="center" class="cssMenu">
                        
                       
							<ul id="navmenu">
  <li><a href="index_menu.php">Inicio</a></li>
  
  
  <li><a >Catalogos +</a>
    <ul>
    <li><a   href="presupuestoinicial.php">Presupuesto Inicial</a>   </li>
    <li><a  href="altadireccion.php">Alta Direccion</a></li>
    <li><a  href="departamento.php">Departamento</a></li>
     <li><a  href="meta1.php">Meta</a></li>
     
      <li><a href="TCapitulo.php">Capitulo</a></li>
      <li><a  href="TSubcapitulo.php">Conceptos</a></li>
      <li><a  href="TSubconcepto.php">Sub-conceptos</a></li>
      <li><a href="TPartidas.php">Partida</a></li>
      <li><a  href="accion1.php">Accion</a></li>
      <li><a href="proceso_clave.php">Proceso Clave</a></li>
      <li><a href="proceso_estrategico.php">Proceso Estrategico</a></li>
     
      
     
      <li><a  href="capitulo5000.php">Capitulo 5000 +</a>
     		 <ul>
            	<li><a  href="capitulo5000_especifico.php">Por departamento</a></li>
                <li><a  href="capitulo5000_pormeta.php">Por meta</a></li>
                <li><a  href="capitulo5000_porpartida.php">Por partida</a></li>
            
            </ul>  
            
                
      
      
      </li>
      		
      
      <li><a href="gastodirecto.php">Gasto Directo</a></li>
      
      
      <li><a href="periodos.php"> Administrar Periodos </a></li>
      
      
     
      
      
      
    </ul>
  </li>
  
  
  <li><a href="#">Distribucion +</a>
    <ul>
    <li><a  href="distribucion_presupuestoinicial.php">Presupuesto Incial</a></li>
      <li><a  href="distribucion_altadireccion.php">Alta Direccion </a> </li>
      <li><a  href="distribucion_departamento.php">Departamento</a>   </li>
      <li><a href="www.php">Departamento - Metas </a></li>
     
      
      
      
    </ul>
  </li>
  <li><a  href="combo_apoa.php">APOA Formato</a></li>
  <li><a   href="APOApartidaPresupuestal.php">APOA Formato Partida Prespuestal</a></li>
  <li><a  href="programa_operativo_anual.php">Concentrado PC y PE</a></li>  
  <li><a href="formato_capitulo5000.php">Capitulo 5000</a></li>
  <li><a href="index.php">Cambiar periodo</a></li>
</ul>
						</div>
                        <!-- InstanceBeginEditable name="body" -->
                                <script language="javascript">
var valor=0;
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
function valida(campo)
{
 with(document.form1)
 {
 	var b,a,dat;
	dat=0;
	var valo = document.getElementById('txtmonto_'+campo).value;
 	b=parseInt(valo);
	a=parseInt(tot.value);
	for(i=1;i<=hidc.value;i++)
	{
		if(document.getElementById('txtmonto_'+i).value=='')
			continue;
		dat+=parseInt(document.getElementById('txtmonto_'+i).value);
	}
	if(dat>hid.value)
	{
		alert("LA CANTIDAD NO SE DEBE PASAR DEL PRESUPUESTO INICIAL");
		document.getElementById('txtmonto_'+campo).value=valor;
		return 0;
	}
	tot.value=0;
	tot.value=dat;
	restante.value=hid.value-dat;
 }
}
function gasto(campo)
{

 with(document.form1)
 {
 	if(document.getElementById('txtmonto_'+campo).value=='')
	{
		alert("TIENES QUE PRIMERO ASIGNAR UN MONTO");
		document.getElementById('txtgastopropio_'+campo).value=0;
		return 0;
	}
 }
 
}
function dato(campo)
{
 with(document.form1)
 {
 	if(document.getElementById('txtmonto_'+campo).value=='')
		valor=0;
	else
		valor=document.getElementById('txtmonto_'+campo).value;
  }
}
function enviar(campo)
{
	with(document.form1)
	{
		var vari;
		vari = 0;
		var variable;
		variable = 1;

		while(variable != campo)
		{
			if(document.getElementById('txtmonto_'+variable).value==''){
				alert("EL MONTO NO PUEDE ESTAR EN BLANCO");document.getElementById('txtmonto_'+variable).focus();return;
				vari++;
				document.write(vari);
			}
			variable++;
		}
		if(parseInt(document.getElementById('tot').value)<parseInt(document.getElementById('hid').value))
		{
		alert("DEBES DE DISTRIBUIR TODO EL PRESUPUESTO INICIAL");
		return;
		}
		if(vari == 0)
		{
			document.form1.submit();
		}
	}	
}
function cmb()
{
	with(document.form1)
	{
		document.form1.submit();
	}
}
</script>
                                
                                
                                
                                
                                
                                
<form id="form1" name="form1" method="post" action="">
  <table width="98%" border="0" align="center">
    <tr>
      <th width="19%" height="24">Seleccione Gasto Directo:</th>
      <th width="18%" align="left">
        <select name="combo_gastodirecto" size="1" id="combo_gastodirecto"  onchange="javascript:FAjax('ajax_distribucion_gastodirecto_meta.php','combo_met',this.name+'='+this.value,'post')">
          <option value="0">Seleccionar</option>
<?
$Sql="SELECT id_gastodirecto, nombre FROM gastodirecto";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	while($row = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row[0]; ?>"><? echo $row[1]; ?></option>
 <? } ?>
        </select></th>
      <th width="13%" align="left">Seleccione Meta</th>
      <th width="15%" align="left"><div id="combo_met">	  
        <select name="combo_meta" id="combo_meta" >
			<option value="0">Selecciona</option>		
        </select>
		</div> </th>
      <th width="17%" align="left">Seleccione Capitulo</th>
      <th width="18%" align="left"><div id="combo_capitul">	  
        <select name="combo_capitulo" id="combo_capitulo">
			<option value="0">Selecciona</option>		
        </select>
		</div> </th>
    </tr>
  </table>
<?PHP
if(isset($_POST['combo']) && $_POST['combo']!=''){

$id_gastodirecto = $_POST['combo_gastodirecto'];
$id_meta = $_POST['combo_meta'];
$id_capitulo = $_POST['combo_capitulo'];

	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="SELECT gp.id_gasto_directo, gp.id_meta, gp.id_partida, gp.id_gastodirecto_partida, gp.monto,g.nombre,m.clave,p.nombre FROM (((gastodirecto_capitulo gc join gastodirecto_partida gp on gc.id_gasto_directo = gp.id_gasto_directo) join gastodirecto g on g.id_gastodirecto = gp.id_gasto_directo) join meta m on m.id_meta = gp.id_meta) join partida p on p.id_partida = gp.id_partida WHERE gp.id_gasto_directo = $id_gastodirecto AND gp.id_meta = $id_meta AND gc.id_capitulo = $id_capitulo";
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	$num=mysql_num_rows($ISql);
	
	$var="SELECT monto FROM gastodirecto_capitulo  WHERE id_gasto_directo = $id_gastodirecto AND id_meta = $id_meta AND id_capitulo = $id_capitulo";
	$var2 = mysql_query($var);
	$row=mysql_fetch_array($var2);
	$total = $row['monto'];
?>
    <table width="98%" border="0" align="center">
    <tr>
      <th colspan="4">DINERO DISPONIBLE:<?="$".number_format($total, 2, '.', ',');?></th>
      <th>DINERO RESTANTE:<input name="restante" type="text" id="restante" value="0" size="14" readonly="readonly" /></th>
    </tr>
    <tr>
      <th width="119">Gasto Directo</th>
      <th width="241">Meta</th>
      <th width="215">Partida</th>
      <th width="105">Monto</th>
      <th width="265">&nbsp;</th>
    </tr>
<?PHP
	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
		$a=1;
		$con=1;
		while($row = mysql_fetch_array($ISql))
		{
		if($a==0)
		{ 
		?>  
            <? $a=1;}else{?>
            <tr class="odd">
			<? $a=0;}?>
      			<td><? echo $row[5]; ?>
   			    <input name="hidclv_<?=$con;?>" type="hidden" id="hidclv_<?=$con;?>" value="<?=$row[0];?>"/><input name="id_<?=$con;?>" type="hidden" id="id_<?=$con;?>" value="<?=$row[3];?>"/></td>
		      	<td><? echo $row[6]; ?></td>
      	  	  	<td><? echo $row[7]; ?></td>
      			<td><input name="txtmonto_<?=$con;?>" type="text" onkeypress="return decimales(event,this);"  id="txtmonto_<?=$con;?>" size="14" onblur="valida(<?=$con;?>);" onfocus="dato(<?=$con;?>);" value="<?=$row[4];?>"/></td>
      			<td>&nbsp;</td>
   			</tr>
           
            
    <? $con++;
		} 
	} 
?> 
			<tr class="odd">
              <td height="36">&nbsp;</td>
              <td><input name="hid" type="hidden" id="hid" value="<?=$total;?>"/>
              <input name="hidc" type="hidden" id="hidc" value="<?=$con-1;?>"/></td>
              <td>&nbsp;</td>
              <td><input name="tot" type="text" id="tot" value="0" size="14" readonly="readonly" /></td>
              <td align="center"><input type="button" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar(<?=$con;?>);"/></td>
      </tr>
  </table>
<?
}
if(isset($_POST['txtmonto_1']) && $_POST['txtmonto_1']!='')
{

		$cont=$_POST['hidc'];
		for($a=1;$a<=$cont;$a++)
		{

			$clave=$_POST["hidclv_".$a];
			$monto=$_POST["txtmonto_".$a];
			$id=$_POST["id_".$a];
			$vigencia=date('Y/m/d');
			$GastoDirecto_Partida = new GastoDirecto_Partida($id);
			$GastoDirecto_Partida->setmonto($monto);
			$GastoDirecto_Partida->setvigencia($vigencia);

			
			$GastoDirecto_Partida->modificarGastoDirecto_Partida();
		}
	echo '<script lenguaje="javascript">alert("LA DISTRIBUCION SE REALIZO CORRECTAMENTE");txtclave.focus();return;</script>';
}
?>  
</form>



<link type="text/css" rel="stylesheet" href="stylesheets/TableGear.css" />
<script language="javascript" src="js/libreriaAjax.js"></script>

						<span class="txtcontenidoazul">Distribución Gasto Directo Partida</span><!-- InstanceEndEditable -->
</body>

<!-- InstanceEnd --></html>