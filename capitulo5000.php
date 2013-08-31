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
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Proceso Academico</li>
    <li class="TabbedPanelsTab" tabindex="0">Proceso de Vinculaci&oacute;n</li>
    <li class="TabbedPanelsTab" tabindex="0">Proceso de Planeaci&oacute;n</li>
    <li class="TabbedPanelsTab" tabindex="0">Proceso de Calidad</li>
    <li class="TabbedPanelsTab" tabindex="0">Administraci&oacute;n de Recursos Humanos</li>
    
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
      <div id="Accordion1" class="Accordion" tabindex="0">
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Formaci&oacute;n Profesional</div>
          <div class="AccordionPanelContent">
          
           
          
          
      
    <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=1">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=1">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>
      
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento , c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion ,todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 1 ";
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
	} 
?>
  </table>
  
  
  </div>
  
  
  
          
          
          
       
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Desarrollo Profesional</div>
          <div class="AccordionPanelContent">
          
          
          
           <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=6">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=6">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>
          
          
          
          
           <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 6 ";
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
	} 
?>
  </table>
          
          
          
          </div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Investigaci&oacute;n y Estudios de Posgrado</div>
          <div class="AccordionPanelContent">
          
          
           <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=10">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=10">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>
          
          
          
           <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 10 ";
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
	} 
?>
  </table>
          
          
          </div>
        </div>
      </div>
    </div>
    <div class="TabbedPanelsContent">
      <div id="Accordion2" class="Accordion" tabindex="0">
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Vinculaci&oacute;n Institucional</div>
          <div class="AccordionPanelContent">
          
          
          
          
           <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=7">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=7">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>
          
                    
          
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 7 ";
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
	} 
?>
  </table>
  
          
          
          
          </div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Difusi&oacute;n y Divulgaci&oacute;n</div>
          <div class="AccordionPanelContent">
          
          
           <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=19">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=19">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>
                    
          
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 19 ";
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
	} 
?>
  </table>
  
          
          
          
          
          </div>
        </div>
      </div>
    </div>
    <div class="TabbedPanelsContent">
      <div id="Accordion3" class="Accordion" tabindex="0">
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Soporte T&eacute;cnico en Computo y Telecomunicaciones</div>
          <div class="AccordionPanelContent">
          
          
           <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=4">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=4">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>
                    
          
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 4 ";
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
	} 
?>
  </table>
  
          
          
          </div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Difusion Cultural y Promoci&oacute;n Deportiva</div>
          <div class="AccordionPanelContent">
          
          
           <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=5">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=5">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>
                    
          
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 5 ";
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
	} 
?>
  </table>
  
          
          
          
          </div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Planeaci&oacute;n Estrategica y T&aacute;ctica de Org.</div>
          <div class="AccordionPanelContent">
          
             
             
             
              <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=8">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=8">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>       
          
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 8 ";
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
	} 
?>
  </table>
  
          
          
          </div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Programa Presupuestal e Infraestructura Fisica </div>
          <div class="AccordionPanelContent">          
          
          
          
           <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=9">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=9">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 9 ";
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
	} 
?>
  </table>
  </div>
        </div>
      </div>
    </div>
    <div class="TabbedPanelsContent">
      <div id="Accordion4" class="Accordion" tabindex="0">
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Gestion de la Calidad</div>
          <div class="AccordionPanelContent">
          
          
            <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=2">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=2">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>         
          
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 2 ";
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
	} 
?>
  </table>
  
          
          
          </div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Servicios Escolares</div>
          <div class="AccordionPanelContent">
          
          
           <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=3">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=3">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>
                    
          
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 3 ";
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
	} 
?>
  </table>
  
          
          
          </div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Capacitaci&oacute;n y Desarrollo</div>
          <div class="AccordionPanelContent">
          
          
               <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=11">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=11">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>      
          
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 11 ";
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
	} 
?>
  </table>
  
          
          
          
          </div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Aseguramiento de la Calidad</div>
          <div class="AccordionPanelContent">
          
          
                
                 <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=20">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=20">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>    
          
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 20 ";
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
	} 
?>
  </table>
  
          
          
          </div>
        </div>
      </div>
    </div>
    <div class="TabbedPanelsContent">
      <div id="Accordion5" class="Accordion" tabindex="0">
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Administraci&oacute;n de Recursos Humanos</div>
          <div class="AccordionPanelContent">
          
          
              <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=12">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=12">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>       
          
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 12 ";
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
	} 
?>
  </table>
  
          
          
          
          </div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Administraci&oacute;n de Recursos Financieros</div>
          <div class="AccordionPanelContent">
          
              
               <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=16">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=16">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>      
          
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 16 ";
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
	} 
?>
  </table>
  
          
          
          
          </div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Apoyo Juridico </div>
          <div class="AccordionPanelContent">
          
          
               
                <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=17">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=17">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>     
          
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 17 ";
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
	} 
?>
  </table>
  
          
          
          
          </div>
        </div>
        <div class="AccordionPanel">
          <div class="AccordionPanelTab">Administracion de Recursos Materiales y de Servicios</div>
          <div class="AccordionPanelContent">
          
          
             
              <table width="200" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="57%"><div align="right">Revisar Formato</div></td>
    <td width="7%"><a  href="nuevo_formato_5000.php?idd=18">
      <div align="right"><img src="imagenes/evaluar.gif" height="25" width="25" border="0"/></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">Exportar a Excel</div></td>
    <td><a  href="nuevo_formato_5000imp.php?idd=18">
      <div align="right"><img  src="imagenes/Excel.png" height="25" width="25" border="0"/></div></td>
  </tr>
</table>
                    
          
      
  <table border= "1" align="center">     
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
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select c.clave_departamento, c.clave_meta, c.clave_partida, c.nombre_del_bien, c.denominacion_del_bien, c.cantidad,c.costo_unitario,c.costo_total, c.justificacion, todo.id_procesoclave from (select pcm.id_procesoclave, m.clave from procesoclave_meta pcm join meta m on pcm.id_meta = m.id_meta ) todo join capitulo5000 c on c.clave_meta = todo.clave where todo.id_procesoclave = 18 ";
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
	} 
?>
  </table>
  
          
          
          
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
var Accordion2 = new Spry.Widget.Accordion("Accordion2");
var Accordion3 = new Spry.Widget.Accordion("Accordion3");
var Accordion4 = new Spry.Widget.Accordion("Accordion4");
var Accordion5 = new Spry.Widget.Accordion("Accordion5");
//-->
</script>




<script type="text/javascript">
    var GB_ROOT_DIR = "greybox/";
</script>

<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />




<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />

						<span class="txtcontenidoazul">Capitulo 5000</span><!-- InstanceEndEditable -->
</body>

<!-- InstanceEnd --></html>