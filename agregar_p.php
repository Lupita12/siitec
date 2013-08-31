<? session_start(); ?>
<? include("conexion.php");
include("cls_periodo.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creacion Bd | Prueba</title>
<script language="javascript">

function enviar()
{
	with(document.form1)
    {
		if(txtperiodo.value=="")
        {
			alert("NO PUEDES DEJAR EL PERIODO EN BLANCO");txtclave.focus();return;
		}
	
		
		
		
		
		document.form1.submit();
		
	}	

}


</script>

</head>
<body>

<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="310" height="108" border="0" align="center">
    <tr>
      <td colspan="2"><div align="center">Agregar Periodo</div></td>
    </tr>
    <tr>
      <td width="176"><div align="right">Año del Periodo:</div></td>
      <td width="45"><label>
        <input type="text" name="txtperiodo" id="txtperiodo" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="2"><div align="center">
    	  <label>
    	    <input type="submit" name="guardar" id="guardar" value="Crear" onclick="javascript:enviar();" />
  	    </label>
    	</div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"></div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>




<? 
if(isset($_POST['txtperiodo']) && $_POST['txtperiodo']!='')
{
	$año = $_POST['txtperiodo'];
	
	$nombrebd= 'planeacion'.$año;
	
	
	$conexion_p= mysql_connect("localhost","root","") ;
	mysql_select_db("periodo",$conexion_p);
	
	$Sql="SELECT * FROM periodo WHERE periodo= '$año'";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		echo '<script lenguaje="javascript">alert("YA EXISTE ESE PERIODO ");txtclave.focus();return;</script>';
	}
	else
	{
		
		$periodo = new periodo;
		
		$periodo->setperiodo($año);
		
		$periodo-> agregar();
		
		
		/////////// CREACION DE LA BD 
		
		
		$sql1 = "CREATE DATABASE ".$nombrebd."";
@mysql_query($sql1);

$planeacion = "planeacion.sql";

 $sql = file_get_contents($planeacion); 




$conexion_tablas= mysql_connect("localhost","root","") ;
	mysql_select_db("$nombrebd",$conexion_tablas);
// echo $nombrebd;

	
	
		$arreglo = explode(";",$sql);
		$cantidad = count($arreglo);
		
		// echo $cantidad;
		
		for ($i = 0; $i < $cantidad; $i++) 
			{
				
				
   				
				
				$query = $arreglo[$i];
				mysql_query($query);
				 
				 
			}
			
				echo '<script lenguaje="javascript">alert("Se ha creado el periodo '.$año.' ");</script>';
				echo '<script language="javascript">open("periodos.php","_self");</script>';


			
	
	}
    
    
    
    
    
	
}


?>


</body>

<footer></footer>
</html>
