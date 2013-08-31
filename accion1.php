<? session_start(); ?>
<? require_once("conexion.php"); ?>
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
<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function eliminar(kid)
{
	if(confirm('¿Esta seguro de eliminar la acción?'))
	{
		var campos = '&idacc='+kid;
		open('eliminaaccion.php?id='+campos,'_self');
	}
}
function modificar(kid)
{
	var campos = '&idacc='+kid;
	open('modificaaccion.php?id='+campos,'_self');
}
function agregar(kid)
{
	open('accion2.php','_self');
}


</script>

<form id="form1" name="form1" method="post" action="accion.php">
  <?
$queri=mysql_query("select * from accion order by clave");
$resu = mysql_num_rows($queri);
if($resu==0)
{
?>
  <table width="80%" align="center">
    <tr align="center">
      <td><strong>No hay Acciones dadas de alta </strong></td>
    </tr>
  </table>
  <? }?>
  <table width="80%" border="0" align="center">  
    <tr>
      <td colspan="3">&nbsp;</td>
      <td colspan="2" align="center"><div align="right"><a href="accion2.php" title="Agregar Accion" rel="gb_page_center[700,500]"><img src="images/add.png" width="18" height="18" alt="Agregar"  border="0"/></a>Agregar</div></td>
    </tr>  
    </table>
  <div id="d_diva" style="display:block; height:250px; width:830px; overflow:auto; border:solid">
  <table width="80%" border="0" align="center">
    <tr align="center">
      <td width="17%">Clave de Accion </td>
      <td width="18%">Nombre</td>
      <td width="41%">Descripci&oacute;n</td>
      <td width="11%">Modificar</td>
      <td width="13%">Eliminar</td>
      </tr>
    <? 
	$a=1;
	while($res = mysql_fetch_array($queri)){
	if($a==0)
		{ 
		
		?>	
    
    
    <? $a=1;}else{?>
    <tr class="odd">
      <? $a=0;}?>
      <td><?=$res[0];?></td>
      <td><?=$res[2];?></td>
      <td><?=$res[3];?></td>
      <td align="center"><a href="modificaaccion.php?idacc=<?=$res[0];?>" title="Modificar Accion" rel="gb_page_center[740,250]"><img border="0"src="imagenes/ico_edit.gif" width="14" height="15"/></a></td>
      <td align="center"><img src="imagenes/delete.gif" width="16" height="16" onclick="eliminar('<?=$res[0];?>');"/></td>
      </tr>
    <? } ?>
    </table>
  </div>
  <p>&nbsp;</p>
</form>



<script type="text/javascript">
    var GB_ROOT_DIR = "greybox/";
</script>

<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />

<span class="txtcontenidoazul">Accion</span>
</body>
</html>