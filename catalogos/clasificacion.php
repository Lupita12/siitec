<? session_start(); ?>
<? include("../conexion.php"); ?>
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
<form id="form1" name="form1" method="post" action="">
  <table width="850" border="0" align="center">
    <tr>
      <td colspan="5"><table width="100%" border="0">
        <tr>
          <td width="76%">&nbsp;</td>
          <td width="3%"><a  href="../catalogos_agregar/agregar_clasificacion.php" title="Agregar Clasificacion" rel="gb_page_center[740,250]"><img src="../imagenes/add.png" width="18" height="18" alt="Agregar" border="0" /></a></td>
          <th width="21%">Agregar Clasificacion</th>
        </tr>
      </table></td>
    </tr>
    <tr>
      <th width="86">Clave</th>
      <th width="208">Nombre</th>
      <th width="339">Descrpcion</th>
      <th width="66">Modificar</th>
      <th width="56">Eliminar</th>
    </tr>
<?PHP
//JALA TODOS LOS DATOS PARA PODER IMPRIMIR EN LA TABLA Y PODER MANDAR ID_ALTADIRECCION A LA PAGINA ASIGNAR_META Y MODIFICAR ALTADIRECCION
	$Sql="SELECT * FROM clasificacion order by clave";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);	
	if($num>0)
	{
		$a=1;
		while($row = mysql_fetch_array($ISql))
		{
		if($a==0)
		{ 
			$a=1;
			}else{?>
            <tr class="odd">
			<? $a=0;}?>
      			<td><?=$row[0];?></td>
		      	<td><?=$row[1];?></td>
      			<td><?=$row[2];?></td>
      			<td align="center"><a href="../catalogos_modificar/modificar_clasificacion.php?idd=<?=$row[0]; ?>" title="Modificar Clasificacion" rel="gb_page_center[740,250]"><img src="../imagenes/ico_edit.gif" width="15" height="17" border="0"/></a></td>
                <td align="center"><img src="../imagenes/delete.gif" width="16" height="16" alt="Eliminar" border="0" onclick="eliminar('<?=$row[0];?>');" /></tr>     
<? 
		} 
	} 
?>
  </table>
</form>

						<span class="txtcontenidoazul">Clasificacion</span>



<link href="../greybox/gb_styles.css" rel="stylesheet" type="text/css" />

<script language="javascript">
function eliminar(elim)
{
	if(window.confirm('DESEA ELIMINAR UNA CLASIFICACION?'))
	{
		var campos = '&elimina='+elim; 
		open('../catalogos_eliminar/eliminar_clasificacion.php?id='+campos,'_self');
	}
}
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