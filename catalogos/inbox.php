<? session_start(); ?>
<? include("../conexion.php"); ?>
<? include("../clases/cls_inbox.php"); ?>
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

<form  name="form1" id="form1" action="" method="post">


  <div align="center">
    <table width="81%" height="61" border="0" align="center">
      
      
         
      
      <tr>
        <td colspan="7">
          
          <div align="center">
            <select name="combo" size="1" id="combo"  onchange="cmb();">
              <option value="0">Seleccionar</option>
              <?
$Sql="SELECT e.id_encargado, e.nombre, a.orden FROM encargado e join autorizador a on e.id_encargado = a.id_autorizador where tipo='autorizador' and id_departamento=".$_SESSION["s_idepa"] ;
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	while($row = mysql_fetch_array($ISql))
	{
?>
              <option value=" <?=$row[2]; ?>">
                <?=$row[2]; ?>
                -<? echo $row[1]; ?></option>
              <? } ?>
              </select>
            </div></td>
        </tr>
      <tr>
        
        <td width="537"><div align="center">Folio Requisicion</div></td>
        <td width="537"><div align="center">Fecha</div></td>
        <td width="537"><div align="center">Departamento</div></td>
        
        <td width="537"><div align="center">Detalle</div><input name="hid" type="hidden" id="hid"/></td>
        <td>&nbsp;</td>
        
        </tr>
      <?PHP
	if(isset($_POST['combo']) && $_POST['combo']!='')
{
	
	$estado = $_POST['combo'];
	
	/*
	if ($i == 1) 
	{
    $estado = 0;
} 
elseif($i == 2) 
{
    $estado = 1;

} 
elseif ($i == 3) 
{
   $estado = 2;

}
elseif ($i == 4) 
{
   $estado = 3;

}
elseif ($i == 5) 
{
   $estado = 4;

}
elseif ($i == 6) 
{
   $estado = 5;

}
elseif ($i == 7) 
{
   $estado = 6;

}
*/
	
	
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	
	
	$Sql="SELECT * FROM requisicion where autorizado =" .$estado. " ";
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
		$a=1;
		$con=1;
		while($row = mysql_fetch_array($ISql))
		{
		if($a==0)
		{ 
		?>  
      <? $a=1;}else{?>
      <tr class="odd">
        <? $a=0;}?>
        
        <td align="center"><div align="center"><? echo $row[0]; ?></div></td>
        <td align="center"><div align="center"><? echo $row[1]; ?></div></td>
        <td align="center"><div align="center"><? echo $row[7]; ?></div></td>
        
        
        
        
        <td align="center"><div align="center">
          <a href="../catalogos/detalle_requisicion.php?idd=<?=$row[8];?>" onclick="return GB_showPage('Detallle', this.href)" ><img src="../imagenes/search.png" width="25" height="25" border="0" /> </a>
          </div></td>
        
        
        <td>&nbsp;</td>
        </tr>
      
      <? 
	$con++;
		} 
	} }
?>
    </table>
  </div>
</form>
  
  
  
  
  
  <form id="guardar" name="guardar" action="" method="post">
  
  <input name="hid" id="hid" type="hidden" value="<?=$estado ?>"/>
  
  
  
  
  
  <?PHP
  
  if(isset($_POST['hid1']) && $_POST['hid1']!='')
{
 
 
 
  $clave=$_POST['hid'];
  
  
  $inbox = new inbox($clave);
 
 
  $id_encargado =  $clave + 1;
  $id_requisicion = $_POST['hid1'];
  $departamento = $_POST['hid2'];
  $fecha_entrada =  $_POST['hid3'];
  $fecha_salida =  date(Y);
  
  
  
  
  echo $id_encargado;
  echo $id_requisicion;
  echo $departamento;
  echo $fecha_entrada;
  echo $fecha_salida;
  
  
  
   $inbox = new inbox();
   
   $inbox->setid_encargado($id_encargado);
   $inbox->setid_requisicion($id_requisicion);
   $inbox->setid_departamento($departamento);
   $inbox->setfecha_entrada($fecha_entrada);
   $inbox->setfecha_salida($fecha_salida);
   
  $inbox->agregar();
  
  
  
 // echo '<script lenguaje="javascript">open("inbox.php","_self");</script>';
  
}
  ?>
  
  
  <p>&nbsp;</p>
</form>




						<span class="txtcontenidoazul">Inbox</span>
<script language="javascript">
function cmb()
{
	with(document.form1)
	{
		document.form1.submit();
	}
}



	
	function guardar(campo)
{
	
		
		alert ('');
		
		
	
}
	
	




</script>

<link type="text/css" rel="stylesheet" href="../stylesheets/TableGear.css" />
<link href="../greybox/gb_styles.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
    var GB_ROOT_DIR = "../greybox/";
</script>
<script type="text/javascript" src="../greybox/AJS.js"></script>
<script type="text/javascript" src="../greybox/AJS_fx.js"></script>
<script type="text/javascript" src="../greybox/gb_scripts.js"></script>
<!-- #EndEditable --></td>
							
				

</body>

<!-- InstanceEnd --></html>