<? session_start(); ?>
<? include ("conexion.php")?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/contenidos.dwt" codeOutsideHTMLIsLocked="false" -->

<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" >
<title>Administrador de contenidos web - Tecnol�gico de Colima</title>
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

function actualizar()
{

setTimeout('open("proceso_clave.php");,5000');

}


function eliminar(elim)
{
	if(confirm('�Esta seguro de eliminar el proceso clave?'))
	{
	
	var campos = '&elimina='+elim; 
	open('eliminar_procesoclave.php?id='+campos,'_self');
	
	}
}
</script>


<form id="form1" name="form1" method="post" action="">

  <table width="850" border="0" align="center">
    <tr>
      <td colspan="7"><table width="125%" height="30" border="0">
        <tr>
          
          <td width="3%" align="center"><div align="right"><a href="agregar_procesoclave.php" title="Agregar Proceso clave" rel="gb_page_center[700,500]"><img src="images/add.png" width="18" height="18" alt="Agregar"  border="0"/></a>Agregar Proceso Clave</div></td>
          
        </tr>
      </table>
   <div id="d_diva" style="display:block; height:250px; width:850px; overflow:auto; ">
    <table
    <tr>
      <td width="81">Clave</td>
          

      <td width="211">Nombre</td>
      <td width="112">Descripcion</td>
     
      <td width="99">Monto</td>
      <td width="99">Periodo</td>
            <td width="81">Ingreso Propio</td>
                  <td width="81">Gasto Directo</td>


      <td width="59">Modificar</td>
      <td width="49">Eliminar</td>
    </tr>
  
   
   
    
<?PHP
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="SELECT * FROM procesoclave order by clave";
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
      			<td><? echo $row[0]; ?></td>
		      
      			<td><? echo $row[2]; ?></td>
      			<td><? echo $row[3]; ?></td>
      			
                <td><? echo $row[5]; ?></td>
                <td><? echo $row[6]; ?></td>
                <td><? echo $row[7]; ?></td>
                <td><? echo $row[8]; ?></td>
                
                
                
      			<td align="center"><a href="modif_clave_pc.php?idd=<?=$row[0]; ?>" title="Modificar Proceso Clave" rel="gb_page_center[740,400]"><img src="imagenes/ico_edit.gif" width="15" height="17" border="0"/></a></td>
      			<td align="center"><img src="images/delete.gif" width="16" height="16" alt="Eliminar" border="0" onclick="eliminar('<?=$row[0];?>');" /></td>
    		</tr>
            
    <? 
		} 
	} 
?>
  </table>
  </div>
</form>




<script type="text/javascript">
    var GB_ROOT_DIR = "greybox/";
</script>

<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />


<title>Administrador de contenidos web - Tecnol�gico de Colima</title>

						<span class="txtcontenidoazul">Proceso Clave</span><!-- InstanceEndEditable -->
</body>

<!-- InstanceEnd --></html>