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
                                <script language="javascript">
function eliminar(elim)
{
	if(window.confirm('¿DESEA ELIMINAR AL ENCARGADO?'))
	{	
		var campos = '&elimina='+elim; 
		open('../catalogos_eliminar/eliminar_encargado.php?id='+campos,'_self');
	}
}
</script>
<script type="text/javascript">
    var GB_ROOT_DIR = "../greybox/";
</script>
<script type="text/javascript" src="../greybox/AJS.js"></script>
<script type="text/javascript" src="../greybox/AJS_fx.js"></script>
<script type="text/javascript" src="../greybox/gb_scripts.js"></script>

<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" align="center">
    <tr>
     	 <td colspan="3">Definir Autorizadores</td>
        
          <td width="82%"> <a style="cursor:pointer"  rel="gb_page_center[1100,500]"  title="Definir Autorizadores" href="../definir_encargado.php" > 
          <img  src="../imagenes/reciclaje.png" width="22" height="22" style="border:none"/> </a></td>
          <td width="4%"><a  href="../catalogos_agregar/agregar_encargado.php" title="Agregar Encargado" rel="gb_page_center[740,350]"><img  src="../imagenes/add.png" width="18" height="18" alt="Agregar" border="0" /></a></td>
          <td width="14%">Agregar Encargado</td>
       </tr>
   </table>
   
   <table>
   
    <tr>
      <td width="778">Nombre</td>
       
      <td width="65">Modificar</td>
      <td width="58">Eliminar</td>
    </tr>
<?PHP
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="SELECT * FROM encargado";

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
			$a=1;
			}else{?>
            <tr class="odd">
			<? $a=0;}?>
      			<td><? echo $row[1]; ?></td>
                
      			<td align="center"><div align="center"><a href="../catalogos_modificar/modificar_encargado.php?idd=<?=$row[0]; ?>" title="Modificar Encargado" rel="gb_page_center[740,250]"><img  src="../imagenes/ico_edit.gif" width="15" height="17" border="0"/></a></div></td>
      			<td align="center"><div align="center"><img  src="../imagenes/delete.gif" width="16" height="16" alt="Eliminar" border="0" onclick="eliminar('<?=$row[0];?>');" /></div></td>
    		</tr>     
<? 
		} 
	} 
?>
  </table>
</form>

						<span class="txtcontenidoazul">Encargado</span>


<link type="text/css" rel="stylesheet" href="../stylesheets/TableGear.css" />
<link href="../greybox/gb_styles.css" rel="stylesheet" type="text/css" />
<!-- #EndEditable --></td>
							
				

</body>

<!-- InstanceEnd --></html>