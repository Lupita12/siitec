<? session_start(); ?>
<? include("cls_subcapitulo.php"); ?>
<? include("cls_capitulo.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link type="text/css" rel="stylesheet" href="js/dhtmlgoodies_calendar.css?random=20051112" media="screen"></link>

<script type="text/javascript" src="js/dhtmlgoodies_calendar.js?random 20060118"></script>
<script type="text/javascript" src="acc_calendar/acc_calendar.js"></script>
<title>Documento sin t&iacute;tulo</title>
</head>

<script language="javascript">

function enviar(){
	with(document.form1){
		
		if (cmb_capitulo.options[cmb_capitulo.selectedIndex].value =="0") 

		{ 
			alert("SELECCIONA CAPITULO"); 
			cmb_capitulo.focus(); return false; 
		}
		
		if (cmb_subca.options[cmb_subca.selectedIndex].value =="0") 

		{ 
			alert("SELECCIONA SUBCAPITULO"); 
			cmb_subca.focus(); return false; 
		}
		
		
		if(txtnombre.value==""){
			alert("EL NOMBRE NO PUEDE ESTAR EN BLANCO");txtnombre.focus();return;
		} 	
		
		
		
		
		document.form1.submit();
		
	}	
}

</script>


<body bgcolor="#CCCCCC">

<form id="form1" name="form1" method="post" action="AgregarSubcapitulo.php">
<table width="527" border="0" align="center" >
	<td height="50" colspan="4" align="center"><span class="Estilo2">Agregar Conceptos	</span></td>
	<tr>
	
	  <td width="247" height="63" align="right" >Capitulo:</td>
	  <td width="270">
	  <?  
	  	$sSQL="SELECT * FROM capitulo order by clave ";
		$result=mysql_query($sSQL, $conexion);
	  ?>
	  
	    <select id="cmb_capitulos" name="cmb_capitulo" onchange="">
		
			<option value="0">Seleccione Capitulo</option>
			<? while($otmp=mysql_fetch_object($result)){?>
				<option value="<?=$otmp->clave;?>"><?=$otmp->clave.' - '.trim($otmp->nombre);?></option>
			<? }?>
				
        </select></td>
	</tr>
	<tr>
	  <td height="65"  align="right">Subcapitulo: </td>
	  <td>
	    <select name="cmb_subca">
		<option value="0"> Seleccione Subcapitulo:</option>
		<option value="100"> 100</option>
		<option value="200"> 200</option>
		<option value="300"> 300</option>
		<option value="400"> 400</option>
		<option value="500"> 500</option>
		<option value="600"> 600</option>
		<option value="700"> 700</option>
		<option value="800"> 800</option>
		<option value="900"> 900</option>
        </select>
	          </td>
	</tr>
	<tr>
	  <td height="87" align="right" >Nombre</td>
	  <td><textarea name="txtnombre" cols="40" id="txtnombre" height="20"></textarea></td>
	</tr>
	
	<tr>
	  <td height="72" colspan="2" align="center" ><input name="Guardar" type="button" id="Guardar" value="Guardar" onclick="javascript:enviar();" /></td>
    </tr>
</table>

<?
if($_POST)
{
	if ($_POST['cmb_capitulo']!="0" && $_POST['cmb_subca']!="0" && $_POST['txtnombre']!="")
	
	{
				
		$subcapitulo=$_POST['cmb_subca'];
		$capitulo=$_POST['cmb_capitulo'];
		$nombre=$_POST['txtnombre'];
		//$periodo = $_POST['txtperiodo'];
		 
		 //concatenar
		 $div = $capitulo / 1000;
		 $concatena = $div.$subcapitulo;
			 
		//obtener el id_capitulo
		 $consulta2="Select id_capitulo from capitulo where clave =".$capitulo;
		 $resultado2=mysql_query($consulta2); 
		 $row16 =  mysql_fetch_array($resultado2);
		
		$obj=new Subcapitulo();
		
		//Consulta para verificar si existen registros iguales en la base de datos
		$consulta="select * from subcapitulo where clave=".$concatena;
		$resultado=mysql_query($consulta) or die (mysql_error());
			if (mysql_num_rows($resultado)>0)
			{
				
				echo '<script lenguaje="javascript">alert("YA EXISTE EL SUBCAPITULO '.$concatena.'");</script>';
			} else {
					$obj->setclave($concatena);
					$obj->setid_capitulo($row16[0]);
					$obj->setnombre($nombre);
					//$obj->setperiodo($periodo);
		
					$obj->agregarSubcapitulos();
				
					echo '<script lenguaje="javascript">alert("SUBCAPITULO '.$concatena.' INSERTADO CORRECTAMENTE");</script>';
		}
	
   }
 
}
?>

</form>
</body>
</html>