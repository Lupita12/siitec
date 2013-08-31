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

function cmb(meta)
{
	with(document.form1)
	{	
	var campos='&combo_meta='+meta;
	open('ApoaFormato.php?id='+campos,'_self')
		
	}
}
function cmb1()
{
	with(document.form1)
	{	
		document.form1.submit();
	}
}

</script>
                                
                                
                                
<form id="form1" name="form1" method="post" >
<table width="57%" border="1" align="center">
       <tr>
       <td width="56%">Seleccionar Meta</td>
       <td width="44%"><label>
         <select name="combo_meta" id="combo_meta" onchange="cmb(this.value)">
           <option value="0">Seleccionar</option>
           <?

$Sql="SELECT id_meta,clave FROM meta";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	
	while($row = mysql_fetch_array($ISql))
	{
?>
           <option value=" <?=$row[0]; ?>"><? echo $row[1]; ?></option>
           <? } ?>
          </select>
       </label></td>
       </tr>
       <tr>
         <td>Imprimir Metas por Proceso Estrategico</td>
         <td><select name="combo_estrategico" id="combo_estrategico" onchange="cmb1()">
           <option value="0">Seleccionar</option>
           <?

$Sql1="SELECT 
	id_procesoestrategico, nombre
from
	procesoestrategico";
	$ISql1 = mysql_query($Sql1);
	$num1=mysql_num_rows($ISql1);
	while($row1 = mysql_fetch_array($ISql1))
	{
?>
           <option value=" <?=$row1[0]; ?>"><? echo $row1[1]; ?></option>
           <? } ?>
         </select></td>
       </tr>
<?
if($_POST)
{
	$id_procesoestrategico=$_POST['combo_estrategico'];
$iSql="	 
SELECT 
	m.clave,m.id_meta 
FROM 
	((((procesoclave_meta pm join procesoclave p on pm.id_procesoclave = p.id_procesoclave) 
    join procesoestrategico pe on pe.id_procesoestrategico = p.id_procesoestrategico)
    join meta m on m.id_meta = pm.id_meta) 
    join accion a on m.id_meta = a.id_meta)
    join accion_capitulo ac on ac.id_accion = a.id_accion
WHERE 
	pe.id_procesoestrategico =$id_procesoestrategico
group by 
	m.id_meta";
	$Isql = mysql_query($iSql);
	$num=mysql_num_rows($Isql);	
	if($num>0)
	{?>
    	<tr align="center">
       		<td align="center"><strong>Clave</strong></td>
       		<td align="center"><strong>Distribuida</strong></td>
    	</tr>
    
		<? $a=1;
		while($rrow = mysql_fetch_array($Isql))
		{
			if($a==0)
			{ 
				$a=1;
			}
			else
			{?>
       			<tr class="odd">
       			<? $a=0;
			}?>
       		<td><?=$rrow[0]; ?></td>
       		<td><img src="imagenes/si.png" width="18" height="18" alt="Agregar" border="0" /></td>
    	</tr>
<?
		}
	}		

$sql="SELECT 
	m.clave 
FROM 
	((procesoclave_meta pm join procesoclave p on pm.id_procesoclave = p.id_procesoclave) 
    join procesoestrategico pe on pe.id_procesoestrategico = p.id_procesoestrategico)
    join meta m on m.id_meta = pm.id_meta 
WHERE 
	pe.id_procesoestrategico =$id_procesoestrategico
AND	
	m.clave not IN (SELECT 
	m.clave
FROM 
	(meta m join accion a on m.id_meta = a.id_meta) 
    join accion_capitulo ac on ac.id_accion = a.id_accion
group by m.id_meta)";
	$isql = mysql_query($sql);
	$num=mysql_num_rows($isql);	
	if($num>0)
	{?>
		<tr>
        	<td align="center"><strong>Clave</strong></td>
       		<td align="center"><strong>No Distribuida</strong></td>
        </tr>
        
       <? $a=1;
		while($roww = mysql_fetch_array($isql))
		{
			if($a==0)
			{ 
				$a=1;
			}
			else
			{?>
       			<tr class="odd">
       			<? $a=0;
			}?>
         <td><?=$roww[0]; ?></td>
         <td><img src="imagenes/no.png" width="18" height="18" alt="Agregar" border="0" /></td>
       </tr>
<?
		}
	}
}
?>       

</table>
</form>

<title>Administrador de contenidos web - Tecnológico de Colima</title>
<script language="javascript">

function cmb(meta)
{
	with(document.form1)
	{	
		var campos = '&combo_meta='+meta;
		open('ApoaFormato.php?id='+campos,'_self');
		//document.form1.submit();
	}
}
function cmb1()
{
	with(document.form1)
	{	
		document.form1.submit();
	}
}

</script>

						<span class="txtcontenidoazul">APOA Seleccion</span><!-- InstanceEndEditable -->
</body>

<!-- InstanceEnd --></html>