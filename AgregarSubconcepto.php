<? session_start(); ?>
<? include("conexion.php"); ?>
<? include("cls_partida.php"); ?>
<? include("cls_subcapitulo.php");?>
<? include("cls_subcapitulo2.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script language="javascript" src="js/libreriaAjax.js"></script>
<title>Documento sin t&iacute;tulo</title>
</head>

<script language="javascript">
function validar(e) {
    tecla = (document.all)?e.keyCode:e.which;
    if (tecla==8) return true;
    patron = /\d/;
    te = String.fromCharCode(tecla);
    return patron.test(te); 
} 

function enviar(){
	with(document.form1){
		
		if(txtsubconcepto.value==""){
			alert("EL SUBCONCEPTO NO PUEDE ESTAR EN BLANCO");txtpartida.focus();return;
		}
		
		if(txtnombre.value==""){
			alert("EL NOMBRE NO PUEDE ESTAR EN BLANCO");txtnombre.focus();return;
		} 	
		
		
		
		
		if (cmb_capitulos.options[cmb_capitulos.selectedIndex].value =="0") 

		{ 
			alert("SELECCIONA CAPITULO"); 
			cmb_capitulos.focus(); return false; 
		}
		
		if (cmb_subcapitulos.options[cmb_subcapitulos.selectedIndex].value =="0") 

		{ 
			alert("SELECCIONA CONCEPTO"); 
			cmb_subcapitulos.focus(); return false; 
		}

		document.form1.submit();
	}	
}

</script>


<body bgcolor="#CCCCCC">

<form id="form1" name="form1" method="post" action="AgregarSubconcepto.php">
<table width="527" border="0" align="center" >
	<td height="50" colspan="4" align="center"><span class="Estilo2">Agregar Subconcepto	</span></td>
	<tr>
	
	  <td width="239" height="40" align="right" >Capitulo:</td>
	  <td width="278">
	 
	  <?  
	  	$sSQL="SELECT * FROM capitulo order by clave ";
		$result=mysql_query($sSQL, $conexion);
	  ?>
	  
	    <select id="cmb_capitulos" name="cmb_capitulos" onchange="javascript:FAjax('aj_cmb_subcapitulos.php','cmb_subcapitulo',this.name+'='+this.value,'post')">
			<option value="0">Seleccione Capitulo</option>
			<? while($otmp=mysql_fetch_object($result)){?>
				<option value="<?=$otmp->clave;?>"><?=$otmp->clave.' - '.trim($otmp->nombre);?></option>
			<? }?> 
        </select>
	  </td>
	</tr>
	
	<tr>
	  <td height="40" align="right" >Concepto:</td>
	  <td>
	  	<div id="cmb_subcapitulo" >
	    <select name="cmb_subcapitulos" >
		<option value="0">Seleccione Subcapitulo</option>
        </select>
		</div>


	  </td>
    </tr>
	<tr>
	  <td height="40" align="right" >Subconcepto</td>
	  <td>
	    <input name="txtsubconcepto" type="text" id="txtsubconcepto" size="9" maxlength="1" onkeypress="return validar(event)" />
	 </td>
	</tr>
	<tr>
	  <td height="48"  align="right">Nombre: </td>
	  <td><textarea name="txtnombre" cols="40" id="txtnombre" height="20"></textarea></td>
    </tr>
	
	
	<tr>
	  <td height="72" colspan="2" align="center" ><input name="Guardar"  type="button" id="Guardar" value="Guardar" onclick="javascript:enviar();" /></td>
    </tr>
</table>

	
<?
if($_POST)
{

	if ($_POST['txtsubconcepto']!= ""  && $_POST['txtnombre']!="" && $_POST['cmb_capitulos']!="0" && $_POST['cmb_subcapitulos']!="0")
	{
		
		$capitulo=$_POST['cmb_capitulos'];
		$subcapitulo=$_POST['cmb_subcapitulos'];
		$sub=$_POST['txtsubconcepto'];
		$nombre=$_POST['txtnombre'];
		
		//$periodo = $_POST['txtperiodo'];
		
	$capitulo  = substr($capitulo , -4, 1);  // ESTO ES LO QUE AGREGUE 
	$auxsubcapitulo = substr($subcapitulo , -3, 1);
	$estra = $capitulo . $auxsubcapitulo. $sub ;
	
	
	
		//Obtener el id de subcapitulo
		$consulta2="Select id_subcapitulo from subcapitulo where clave =".$subcapitulo;
		$resultado2=mysql_query($consulta2);
		$row16 =  mysql_fetch_array($resultado2);
	
		// concatenar el subcap y la partida
		//$div2 = $subcapitulo + $parti ;
		
		$obj=new Subcapitulo2();
		
		//Consulta para verificar si existen registros iguales en la base de datos
		$consulta="select * from subcapitulo2 where clave=".$estra;
		$resultado=mysql_query($consulta) or die (mysql_error());
			if (mysql_num_rows($resultado)>0)
			{
				
				echo '<script lenguaje="javascript">alert("YA EXISTE EL SUBCONCEPTO '.$estra.'");</script>';
			} else {
				
				if ($sub != 0)
				{
				
				$obj->setclave($estra);
				$obj->setclave_subcapitulo($row16[0]);
				$obj->setnombre($nombre);
				//$obj->setdescripcion($descripcion);
				//$obj->setperiodo($periodo);
				//$obj->setestado(0);
				
				$obj->agregar();
				
				
				echo '<script lenguaje="javascript">alert("SUBCONCEPTO '.$estra.' INSERTADO CORRECTAMENTE");</script>';
				}
				
		//else
		//{
			//echo '<script lenguaje="javascript">alert("NO PUEDES PONER LA PARTIDA EN 0");</script>';

		//}	
		
		}
	
	}
 
}


?>

</form>
</body>
</html>
