<? session_start(); ?>	
<? include("conexion.php"); ?>
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
<script language="javascript">
function eliminar(elim)
{
	if(window.confirm('DESEA ELIMINAR EL DEPARTAMENTO?'))
	{
		var campos = '&elimina='+elim; 
		open('eliminar_departamento.php?id='+campos,'_self');
	}
}
function muestra_dtos(kapi)
{
	with(document.form1)
	{
		if(document.getElementById('h_'+kapi).value==1)
		{		
			document.getElementById('d_'+kapi).style.display = "block";
			document.getElementById('h_'+kapi).value=2;
		}
		else{
			document.getElementById('d_'+kapi).style.display = "none";
			document.getElementById('h_'+kapi).value=1;
			}					
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
  <table width="850" border="0" align="center">
    <tr>
      <td colspan="9">
      <table width="100%" border="0">
        <tr>
          <td width="76%" style="font-size:14px"><a href="poa_departamento.php" title="Autorizar Distribucion" rel="gb_page_center[740,250]">Volver a Distribuir <img src="imagenes/reciclaje.png" height="25" width="25" border="0" /></a></td>
          <td width="3%"><a href="agregar_departamento.php" title="Agregar Departamento" rel="gb_page_center[740,250]"><img src="images/add.png" width="18" height="18" alt="Agregar"  border="0"/></a></td>
          <td width="21%">Agregar Departamento</td>
        </tr>
      </table>
      </td>
    </tr>
    </table>
<?
$ja="SELECT nombre FROM altadireccion";
$ja1 = mysql_query($ja);
$ja2=mysql_num_rows($ja1);
for($i=1;$i<=$ja2;$i++)
{
$coco1="SELECT nombre FROM altadireccion  WHERE id_altadireccion = $i order by clave";
$coco2 = mysql_query($coco1);
$coco3= mysql_fetch_array($coco2);
$coco=mysql_num_rows($coco2);
?>
<input name="h_<?=$i;?>" type="hidden" id="h_<?=$i;?>" value="1" />
   <table>
	<tr align="center" bgcolor="#BDD5AC" onmouseover="this.style.background='#808080'" onmouseout="this.style.background='#BDD5AC'">	
	   <td width="850">	  
	  <strong><label onClick="muestra_dtos(<?=$i;?>);" style="cursor:pointer"><?=$coco3[0];?></label> </strong>
		</td>
	</tr>
    </table>

<div id="d_<?=$i;?>" style="display<? if($coco>12){echo ":block; height:250px; width: 850px; overflow:auto;";}?>" >
<table>
    <tr>
      <td width="850">Clave</td>
      <td width="219">Nombre</td>
      <td width="85">Vigencia</td>
      <td width="83">Monto</td>
      <td width="88">% Avanze Distribuido</td>
      <td width="77">Periodo</td>
      <td width="98">Asignar Metas</td>
      <td width="73">Modificar</td>
      <td width="80">Eliminar</td>

    </tr>
<?PHP
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
$Sql="SELECT clave,nombre,DATE_FORMAT(vigencia,'%d/%m/%Y') as vigencia, monto, periodo, id_departamento, id_altadireccion FROM departamento WHERE id_altadireccion = $i order by clave";
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
		}
		else
		{?>
        	<tr class="odd">
		<? 
			$a=0;
		}
		?>
      		<td><? echo $row[0]; ?></td>
		    <td><? echo $row[1]; ?></td>
      		<td><? echo $row[2]; ?></td>
      		<td><? echo "$".number_format($row[3], 2, '.', ','); ?></td>
      		<td><? 
				$Sql1="SELECT SUM(ingreso_propio) FROM partida_departamento WHERE id_departamento =$row[5]";
				$ISql1 = mysql_query($Sql1);
				$row1 = mysql_fetch_array($ISql1);
				$sum=$row1[0];
				if($sum==0)
				{
					$valor=0;
				}else
				{
					$valor= $row1[0]/$row[3]*100;
				}
				echo $valor."%";?></td>
      		<td><? echo $row[4]; ?></td>
      		<td><a href="asignar_meta.php?idd=<?=$row[5]; ?>" title="Asignar Meta" rel="gb_page_center[940,450]"><img src="images/add.png" width="18" height="18" alt="Agregar"  border="0"/></a></td>
			<td align="center"><a href="modificar_departamento.php?idd=<?=$row[0]; ?>" title="Modificar Departamento" rel="gb_page_center[740,250]"><img src="imagenes/ico_edit.gif" width="15" height="17" border="0"/></a></td>
      		<? $val=$row[3]; if($val==0){ ?>
            <td align="center"><img src="images/delete.gif" width="16" height="16" alt="Eliminar" border="0" onclick="eliminar('<?=$row[0];?>');" /></td>
                <? }else{ ?><td align="center"></td><? }?>
    		</tr>  
<? 
	} 
}
?> 
</table>
</div>
	<script language="javascript">
		document.getElementById('d_'+<?=$i;?>).style.display = "none"; 
    </script>
 
<?
}
?>

</form>



<link type="text/css" rel="stylesheet" href="stylesheets/TableGear.css" />
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />


<span class="txtcontenidoazul">Departamento</span>
</body>
</html>