<? session_start(); ?>
<? include("conexion.php");?>
<? include("cls_partida.php")?>
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

<form id="form1" name="form1" method="post" action="TPartidas.php">
  <table width="860" border="0" align="center" >
  <thead>
  	
    <tr>
      <td width="850" > 
	  <table width="850"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="82%" align="right"><div align="right"><a href="AgregarPartidas.php" title="Agregar Partidas"  rel="gb_page_center[700,450]"><img src="images/add.png" width="16" height="16" alt="Agregar" border="0" /></a></div></td>
          <td width="18%"> Agregar Partida</td>
        </tr>
      </table></td>
    </tr>
    <tr>
	<td>
      <table width="850"  border="0" cellpadding="0" cellspacing="0">
	  
	</table>
    <td width="21">	
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
      <label onClick="muestra_dtos(<?=$w;?>);" style="cursor:pointer">Capitulo <?=$w;?></label> </strong>
		
	  </td>
 
	  </tr>
	  </table>
    <tr>
	  <td>
<?

	$s= $w.'0';
	$cad = mysql_query("select clave, nombre, estado, id_partida, restringir from partida where clave BETWEEN ".$s." and ".($s+9999)." order by clave"); 
	$coco=mysql_num_rows($cad);
?>	  
	  	  <div id="d_<?=$w;?>" style="display<? if($coco>12){echo ":block; height:250px; width: 850px; overflow:auto;";}?>" >
		<table width="831"  border="0" cellpadding="0" cellspacing="0">
		 
	 	 <td width="129">Partida</td>
     	 <td width="217">Nombre</td>
	   	 <td width="101" align="center">Estado</td>
      	 <td width="100" align="center"><div align="center">Modificar</div></td>
		 <td width="145" align="center"><div align="center">Activar/Desactivar</div></td>
		 <td width="139" align="center"> <div align="center">Restringir/Permitir</div></td>
		 <?

	//contador de partidas
	
	$conmil=1;
	//$variable=0;
	while($mil = mysql_fetch_array($cad)){?>		
			
			<tr <? if ($mil[2] == 0){echo 'bgcolor="#FF8040"'; } 
			
			else 
			?> >
      			<td  width="129"><span class="Estilo1"><?=$mil[0];?></span></td>
      			<td width="217"><span class="Estilo1"><?=$mil[1];?></span></td>
				<? if ($mil[2]==0)
					{
						 $t="DESACTIVADA";
					}
					else 
						$t="ACTIVADA"
				
				?>				
				<td width="101" align="center"><span class="Estilo1"><?=$t;?></span></td>
				
				<td  width="100" align="center"><div align="center"><a href="ModificaPartidas.php?idd=<?=$mil[0]; ?>" title="Modificar Partida" rel="gb_page_center[800,500]"><img src="imagenes/ico_edit.gif" width="12" height="10" border="0"/></a></div></td>
      			
    		<td align="center">
			  <div align="center">
			    <input type="checkbox" name="activar"  value="<?=$mil[2];?>" <? if ($mil[2] == 1)echo 'checked="checked"'?> onclick="enviar(<?=$mil[0];?>,<?=$mil[2]; ?>);" style="cursor:pointer"/>
			    </div></td>
			
			<td align="center">
				<label>
				  <div align="center">
				    <input type="checkbox" name="restringir"  value="<?=$mil[4];?>" <? if ($mil[4] == 1)echo 'checked="checked"'?> onclick="enviar2(<?=$mil[0];?>,<?=$mil[4]; ?>);" style="cursor:pointer"/>
				    </div>
				</label>			</td>
			
						
			</tr>
 <? 
 
 	$conmil++;
	//$variable++;
 //----------------TUPLA DEL CAPITULO 1000

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
<input name="hclave" type="hidden" id="hclave" />
<input name="hid" type="hidden" id="hid" />




<input name="hclave1" type="hidden" id="hclave1" />
<input name="hide" type="hidden" id="hide" />

</table>

<?
if (isset($_POST['hclave'])){
			
			$clave=$_POST['hclave'];
			$esta=$_POST['hid'];
			
			if ($esta == 1)
			{
				$esta = 0;
				
				$activar = new Partida($clave);
				$activar->setestado($esta);
				$activar->modificaPartidas();
			
			
			echo '<script lenguaje="javascript">alert("PARTIDA '.$clave.' DESACTIVADA");</script>';
			
			}else {
				$esta = 1;
				
				$activar = new Partida($clave);
				$activar->setestado($esta);
				$activar->modificaPartidas();
			
			
			echo '<script lenguaje="javascript">alert("PARTIDA '.$clave.' ACTIVADA");</script>';	
			
			}
	
	
		echo '<script lenguaje="javascript">open("TPartidas.php","_self");</script>';
	
}


if (isset($_POST['hclave1'])){

		$clave2=$_POST['hclave1'];
		$restri=$_POST['hide'];
		
		if ($restri == 1)
			{
				$restri = 0;
				
				$activar = new Partida($clave2);
				$activar->setrestringir($restri);
				$activar->modificaPartidas();
			
		
			echo '<script lenguaje="javascript">alert("PARTIDA '.$clave2.' PERMITIDA");</script>';
			
			}else {
				$restri = 1;
				
				$activar = new Partida($clave2);
				$activar->setrestringir($restri);
				$activar->modificaPartidas();
			
		
			echo '<script lenguaje="javascript">alert("PARTIDA '.$clave2.' RESTRINGIDA");</script>';	
			
			}
	
	
		echo '<script lenguaje="javascript">open("TPartidas.php","_self");</script>';


}

?>  

</form>



<!--<link type="text/css" rel="stylesheet" href="stylesheets/TableGear.css" /> -->
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
-->
</style>

<script language="javascript">
function enviar(campo,estado)
{
	with(document.form1)
	{
		
		document.getElementById('hclave').value = campo;
		document.getElementById('hid').value = estado;
		document.form1.submit();
		
	}
}
function enviar2(cam,estad)
{
	with(document.form1)
	{
		
		document.getElementById('hclave1').value = cam;
		document.getElementById('hide').value = estad;
		document.form1.submit();
		
	}
}
</script>
<script language="javascript">
function eliminar(elim)
{
	var campos = '&elimina='+elim; 
	open('EliminaPartida.php?id='+campos,'_self');
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

						<span class="txtcontenidoazul">ubicación</span><!-- InstanceEndEditable -->
</body>

<!-- InstanceEnd --></html>