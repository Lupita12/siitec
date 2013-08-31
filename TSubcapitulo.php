<? session_start(); ?>
<? include("conexion.php");?>

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
	var campos = '&elimina='+elim; 
	open('EliminaSubcapitulo.php?id='+campos,'_self');
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

<script langiage="javascript" type="text/javascript">


</script>
<script type="text/javascript">
    var GB_ROOT_DIR = "greybox/";
</script>
<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>

<form id="form1" name="form1" method="post" action="TSubcapitulo.php">
  <table width="850" border="0" align="center" >
  <thead>
  	
    <tr>
      <td width="850" > 
	  <table width="850"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="82%" align="right"><div align="right"><a href="AgregarSubcapitulo.php" title="Agregar Conceptos" rel="gb_page_fs[]"><img src="imagenes/add.png" width="16" height="16" alt="Agregar" border="0" /></a></div></td>
          <td width="18%"> Agregar Conceptos </td>
        </tr>
      </table></td>
    </tr>
    <tr>
	<td>
      <table width="850"  border="0" cellpadding="0" cellspacing="0">
	  
	</table>
    <td>
	</tr>
	
	
<?PHP
for($w=1000;$w<=9000;$w+=1000)
{	
 
?>
<input name="h_<?=$w;?>" type="hidden" id="h_<?=$w;?>" value="1" />
	
	
	  
	  <script language="javascript">
	  		document.getElementById('d_'+<?=$w;?>).style.display = "none"; </script>	
    <tr>
      <td onMouseOver="this.style.backgroundColor='#808080';"  onMouseOut="this.style.backgroundColor='#BDD5AC';"  bgcolor="#BDD5AC">
		<table width="850"  border="0" cellpadding="0" cellspacing="0">
		<tr align="center">
		
		<td width="850">	  
	  <strong>
      <label onClick="muestra_dtos(<?=$w;?>);" style="cursor:pointer" title="Mostrar/Ocultar Conceptos" >Capitulo <?=$w;?></label> </strong>
		
	  </td>
 
	  </tr>
	  </table>
	  <tr>
	  <td>
<?
	$cad = mysql_query("select clave, nombre from subcapitulo where clave BETWEEN ".$w." and ".($w+999)." order by clave"); 
	$coco=mysql_num_rows($cad);
?>	  
  	    <div id="d_<?=$w;?>" style="display<? if($coco>12){echo ":block; height:250px; width: 850px; overflow:auto;";}?>" >
		<table width="850"  border="0" cellpadding="0" cellspacing="0">
		 
	 	   <td width="175">Concepto</td>
     	     <td width="435">Nombre</td>
      	 <td width="107">Modificar</td>
      	 <td width="121">Eliminar</td>
		 <td width="12">&nbsp;</td>
		<?

	//contador de partidas
	
	$conmil=1;
	//$variable=0;
	while($mil = mysql_fetch_array($cad)){?>		
			
			<tr onMouseOver="this.style.backgroundColor='#808080';"  onMouseOut="this.style.backgroundColor='#FFFFFF';">
      			<td width="175"><span class="Estilo1"><?=$mil[0];?></span></td>
      			<td width="435"><span class="Estilo1"><?=$mil[1];?></span></td>
		
				
				<td  width="107"><a href="ModiSubcapitulo.php?idd=<?=$mil[0]; ?>" title="Modificar Concepto" rel="gb_page_center[740,450]"><img src="imagenes/ico_edit.gif" width="12" height="10" border="0"/></a></td>
      			<td width="121"><img src="images/delete.gif" title="Eliminar Concepto" style="cursor:pointer" width="16" height="16" alt="Eliminar" onclick="eliminar('<?=$mil[0];?>');" /></td>
			</tr>
 <? 
 
 	$conmil++;
	

 }?>		
 		</table>
	    </div>
</td> 
    </tr>
		  	  <script language="javascript">
	  		document.getElementById('d_'+<?=$w;?>).style.display = "none"; </script>	
    
	  
	<?
}		
?>

</table>

</form>



<!--<link type="text/css" rel="stylesheet" href="stylesheets/TableGear.css" /> -->
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
-->
</style>

						<span class="txtcontenidoazul">Conceptos</span><!-- InstanceEndEditable -->
</body>

<!-- InstanceEnd --></html>