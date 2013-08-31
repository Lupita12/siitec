<? session_start();?>
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
function validar(e) {
    tecla = (document.all)?e.keyCode:e.which;
    if (tecla==8) return true;
    patron = /\d/;
    te = String.fromCharCode(tecla);
    return patron.test(te); 
}

function enviar(){
	with(document.form1){
		if(txtclave.value==""){
			alert("LA CLAVE NO PUEDE ESTAR EN BLANCO");txtclave.focus();return;
		}
		
		if(txtnombre.value==""){
			alert("EL NOMBRE NO PUEDE ESTAR EN BLANCO");txtnombre.focus();return;
		} 	
		
		
		
		
		document.form1.submit();
			
		
	}	

}

</script>


<body bgcolor="#CCCCCC">

<form id="form1" name="form1" method="post" action="AgregarCapitulos.php">
<table width="527" border="0" align="center" >
	  <td height="50" colspan="4" align="center"><span class="Estilo2">Agregar Capitulos	</span></td>
	<tr>
	
	  <td width="239" height="63" align="right" >Capitulo:      </td>
	  <td width="278"><input name="txtclave" type="text" id="txtclave" align="middle" maxlength="4" width="50" size="10" onkeypress="return validar(event)"  /></td>
	</tr>
	<tr>
	  <td height="65"  align="right">Nombre: </td>
	  <td><textarea name="txtnombre" cols="40" id="txtnombre" height="20"></textarea></td>
    </tr>
	<tr>
	  <td height="87" align="right" >Descripcion: </td>
	  <td><textarea name="txtdescripcion" cols="40" id="txtdescripcion" height="40"></textarea></td>
    </tr>
	
	<tr>
	  <td height="72" colspan="2" align="center" ><input name="Guardar" type="button" id="Guardar" value="Agregar" onclick="javascript:enviar();" /></td>
    </tr>
</table>
	
<?
if($_POST)
{
	if ($_POST['txtclave']!= "" && $_POST['txtnombre']!="")
	{
		$clave=$_POST['txtclave'];
		$nombre=$_POST['txtnombre'];
		$descripcion=$_POST['txtdescripcion'];
		//$periodo = $_POST['txtperiodo'];
		
		$obj=new Capitulo();
		
		//Consulta para verificar si existen registros iguales en la base de datos
		$consulta="select * from capitulo where clave=".$clave;
		$resultado=mysql_query($consulta) or die (mysql_error());
			if (mysql_num_rows($resultado)>0)
			{
				
				echo '<script lenguaje="javascript">alert("YA EXISTE EL CAPITULO '.$clave.'");</script>';
			} else {
					
					if ($clave !=0)
					{
					
					$obj->setclave($clave);
					$obj->setnombre($nombre);
					$obj->setdescripcion($descripcion);
					//$obj->setperiodo($periodo);
		
					$obj->agregarCapitulos();
				
					
					echo '<script lenguaje="javascript">alert("CAPITULO '.$clave.' INSERTADO CORRECTAMENTE");</script>';
					}
					
					else
					{
						echo '<script lenguaje="javascript">alert("NO PUEDES PONER EL CAPITULO EN 0");</script>';

					}	
			}
   
   	}
 
}

?>
</form>
</body>
</html>