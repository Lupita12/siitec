<? include("../conexion.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/contenidos_r.dwt" codeOutsideHTMLIsLocked="false" -->

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
  <li><a  href="../index_
  <li><a >Catalogos +</a>
    <ul>
    <li> <a  href="../catalogos/encargado.php">Encargado</a> </li>
    <li> <a href="articulo.php"  >Articulo</a> </li>
    <li> <a href="clasificacion.php"  >Clasificacion</a> </li>
    <li> <a href="unidadmedida.php"  >Unidad Medida</a> </li>
    <li> <a href="tipoarticulo.php"  >Tipo Articulo</a> </li>
    <li> <a href="selecciona_departamento.php"  >Requisicion</a> </li>
      
       <li> <a href="CalizTProvedor.php"  >Proveedor</a> </li>
    <li><a href="inbox_a.php">Inbox</a></li>
      
    </ul>
  </li>
  
  
  
  
  
  
  
</ul>
						</div>
                        
					 
								<!-- #BeginEditable "body" -->

<form id="form1" name="form1" method="post" action="TPartidas.php">
 
<table width="860" border="0" align="center" >
  <thead>
  	
    <tr>
      <td width="850" > 
	  <table width="850"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="82%" align="right"><div align="right"><a href="../catalogos_agregar/AltaProveedor.php" title="Agregar Partidas" rel="gb_page_fs[]"><img src="../imagenes/add.png" width="16" height="16" alt="Agregar" border="0" /></a></div></td>
          <td width="18%"> Agregar Partida</td>
        </tr>
      </table>


<div id="Accordion1" class="Accordion" tabindex="0">
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Proveedores Aprobados</div>
		  <div class="AccordionPanelContent">
<?
	
	$cad = mysql_query("select clave, nombre_proveedor from proveedor where estatus = 2"); 
	$coco=mysql_num_rows($cad);
?>	  
	  	 
		<table border="0" align="center" >
		<tr> 
	 		 <td width="99" >Clave</td>
     	 	<td width="99" >Proveedor</td>
			<td width="99" >Seleccionar</td>
		</tr>
	
<?

	
	while($mil = mysql_fetch_array($cad)){?>		
			
			<tr>
      			<td><?=$mil[0];?></td>
      			<td><?=$mil[1];?></td>
				<td ><a href="../catalogos/SeleccionProveedor.php?idd=<?=$mil[0]; ?>" title="Seleccion Proveedor" rel="gb_page_fs[]"><img src="../imagenes/ico_edit.gif" width="12" height="10" border="0"/></a></td>
      						
			</tr>	   
	<?
}		
?>
		  
</table>	  
		</div>
		</div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Proveedores en Evaluacion</div>
          <div class="AccordionPanelContent">
<?
	
	$cad = mysql_query("select clave, nombre_proveedor from proveedor where estatus = 1"); 
	$coco=mysql_num_rows($cad);
?>	  
	  	 
		<table border="0" align="center" >
		<tr> 
	 		 <td width="99" >Clave</td>
     	 	<td width="99" >Proveedor</td>
			<td width="99" >Evaluar</td>
		</tr>
	
<?

	
	while($mil = mysql_fetch_array($cad)){?>		
			
			<tr>
      			<td><?=$mil[0];?></td>
      			<td><?=$mil[1];?></td>
				<td ><a href="../catalogos_agregar/EvaluacionProveedor.php?idd=<?=$mil[0]; ?>" title="Seleccion Proveedor" rel="gb_page_fs[]"><img src="../imagenes/evaluar.gif" width="12" height="10" border="0"/></a><a href="../catalogos/EvaluacionProveedor.php?idd=<?=$mil[0]; ?>" title="Seleccion Proveedor" rel="gb_page_fs[]"></a></td>
      						
			</tr>	   
	<?
}		
?>
		  
</table>	  		  
		 
		  </div>
        </div>
		<div class="AccordionPanel">
          <div class="AccordionPanelTab">Proveedores en Seleccion</div>
          <div class="AccordionPanelContent">
		  <?
	
	$cad = mysql_query("select clave, nombre_proveedor from proveedor where estatus = 0"); 
	$coco=mysql_num_rows($cad);
?>	  
	  	 
		<table border="0" align="center" >
		<tr> 
	 		 <td width="99" >Clave</td>
     	 	<td width="99" >Proveedor</td>
			<td width="99" >Seleccionar</td>
		</tr>
	
<?

	
	while($mil = mysql_fetch_array($cad)){?>		
			
			<tr>
      			<td><?=$mil[0];?></td>
      			<td><?=$mil[1];?></td>
				<td ><a href="../catalogos/SeleccionProveedor.php?idd=<?=$mil[0]; ?>" title="Seleccion Proveedor" rel="gb_page_fs[]"><img src="../imagenes/evaluar.gif" width="12" height="10" border="0"/></a></td>
      						
			</tr>	   
	<?
}		
?>
		  
</table>	  	
		  </div>
        </div>
		
 </div>
<script type="text/javascript">
<!--
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
//-->
    </script>


</form>

						<span class="txtcontenidoazul">Proveedores</span>
<link href="../SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryAccordion.js" type="text/javascript"></script>



<!--<link type="text/css" rel="stylesheet" href="stylesheets/TableGear.css" /> -->
<link href="../greybox/gb_styles.css" rel="stylesheet" type="text/css" />




</script>
<script type="text/javascript">
    var GB_ROOT_DIR = "../greybox/";
</script>
<script type="text/javascript" src="../greybox/AJS.js"></script>
<script type="text/javascript" src="../greybox/AJS_fx.js"></script>
<script type="text/javascript" src="../greybox/gb_scripts.js"></script>
<!-- #EndEditable --></td>
							
				

</body>

<!-- InstanceEnd --></html>
