<? session_start(); ?>
<? include("conexion.php"); ?>
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
	if(window.confirm('DESEA ELIMINAR EL GASTO DIRECTO CAPITULO?'))
	{
		var campos = '&elimina='+elim; 
		open('eliminar_gastodirecto_capitulo.php?id='+campos,'_self');
	}
}


</script>
<script type="text/javascript">
    var GB_ROOT_DIR = "greybox/";
</script>
<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
                                
                                
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" align="center">
    <tr>
      <td height="27" colspan="8"><table width="96%" border="0">
        <tr>
          <td width="73%">&nbsp;</td>
          <td width="4%"><a href="agregar_gastodirecto_capitulo.php" title="Agregar Gasto Directo Capitulo" rel="gb_page_center[740,250]"><img src="images/add.png" width="18" height="18" alt="Agregar" border="0" /></a></td>
          <td width="23%">Agregar Gasto Directo Capitulo</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="142" height="21"> Gasto Directo</td>
      <td width="90">Meta</td>
      <td width="87">Accion</td>
      <td width="131"> Capitulo</td>
      <td width="160">Vigencia</td>
      <td width="126">Monto</td>
      <td width="74">Modificar</td>
      <td width="71">Eliminar</td>
    </tr>
<?PHP
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="SELECT gc.id_gasto_directo,gc.id_meta,gc.id_capitulo,DATE_FORMAT(gc.vigencia,'%d/%m/%Y') as vigencia,gc.monto,gc.id_gastodirecto_capitulo, c.clave,m.clave,g.nombre,a.nombre FROM (((gastodirecto_capitulo gc join capitulo c on gc.id_capitulo = c.id_capitulo) join meta m on gc.id_meta = m.id_meta) join gastodirecto g on id_gastodirecto = gc.id_gasto_directo) join accion a on a.id_accion = gc.id_accion";
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
      			<td height="23"><? echo $row[8]; ?></td>
		      	<td><? echo $row[7]; ?></td>
		      	<td><? echo $row[9]; ?></td>
                <td><? echo $row[6]; ?></td>
      			<td><? echo $row[3]; ?></td>
      			<td><? echo "$".number_format($row[4], 2, '.', ','); ?></td>
      			<td align="center"><a href="modificar_gastodirecto_capitulo.php?idd=<?=$row[5]; ?>" title="Modificar Gasto Directocapitulo " rel="gb_page_center[740,250]"><img src="imagenes/ico_edit.gif" width="15" height="17" border="0"/></a></td>
                <? $val=$row[4]; if($val==0){ ?>
      			<td align="center"><img src="images/delete.gif" width="16" height="16" alt="Eliminar" border="0" onclick="eliminar('<?=$row[5];?>');" /></td><? }else{ ?><td align="center"></td><? }?>
    		</tr>
            
    <? 
		} 
	} 
?>
  </table>
</form>



<link type="text/css" rel="stylesheet" href="stylesheets/TableGear.css" />
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />

						<span class="txtcontenidoazul">Gasto Directo - Capitulo</span><!-- InstanceEndEditable -->
</body>

<!-- InstanceEnd --></html>