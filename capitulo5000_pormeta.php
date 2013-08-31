<? session_start(); ?>
<? include ("conexion.php") ?>
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



function eliminar(elim)
{
	if(confirm('¿Esta seguro de eliminar el registro?'))
	{
	
	var campos = '&elimina='+elim; 
	open('eliminar_capitulo5000.php?id='+campos,'_self');
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


        <select name="combo" size="1" id="combo"  onchange="cmb();">
          <option value="0">Seleccionar</option>
<?
$Sql="SELECT id_meta, nombre FROM meta";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	while($row = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row[0]; ?>"><? echo $row[1]; ?></option>
 <? } ?>
        </select>


<div id="d_diva" style="display:block; height:250px; width:830px; overflow:auto; ">

  <table width="850" border="0" align="center">     
      <tr>
      
      <td width="49">Clave Meta</td>
      <td width="51">Clave Partida</td>
      <td width="89">Nombre del Bien</td>
      <td width="86">Denominacion del Bien</td>
      <td width="59">Cantidad</td>
      <td width="75">Costo unitario</td>
      <td width="37">Costo Total</td>
      <td width="68">Justificacion</td>
      <td width="54">Modificar</td>
      <td width="51">Eliminar</td>
      </tr>
<?PHP
if(isset($_POST['combo']) && $_POST['combo']!='')
{
	
	
	$clavesesion = $_POST['combo'];
	//echo $clavesesion;


	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="SELECT * FROM capitulo5000 WHERE clave_meta = '$clavesesion'";
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
		$a=1;
		while($row = mysql_fetch_array($ISql))
		{
		if($a==0)
		{ 
		?>  
            <? $a=1;}else{?>
            <tr class="odd">
			<? $a=0;}?>
      			
		      	<td><? echo $row[1]; ?></td>
      			<td><? echo $row[2]; ?></td>
      			<td><? echo $row[3]; ?></td>
      			<td><? echo $row[4]; ?></td>
                <td><? echo $row[5]; ?></td>
                <td><? echo $row[6]; ?></td>
      			<td><? echo $row[7]; ?></td>
                <td><? echo $row[8]; ?></td>
                
      			<td align="center"><a href="modificar_capitulo5000.php?idd=<?=$row[0]; ?>" title="Modificar Capitulo 5000" rel="gb_page_center[740,500]"><img src="imagenes/ico_edit.gif" width="15" height="17" border="0"/></a></td>
      			<td align="center"><img src="images/delete.gif" width="16" height="16" alt="Eliminar" border="0" onclick="eliminar('<?=$row[0];?>');" /></td>
    		</tr>
            
    <? 
		} 
	} }
?>
  </table>
  </div>
</form>






<script type="text/javascript">
    var GB_ROOT_DIR = "greybox/";
</script>

<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />


						<span class="txtcontenidoazul">Capitulo 5000 por meta</span><!-- InstanceEndEditable -->
</body>

<!-- InstanceEnd --></html>