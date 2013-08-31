<? session_start(); ?>
<? require_once("../clases/cls_clasificacion.php"); ?>
<? require_once("../conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AGREGAR CLASIFICACION</title>
</head>
<script language="javascript">
var nav4 = window.Event ? true : false;
function decimales(evt,campo)
{
	var key = nav4 ? evt.which : evt.keyCode;
	if (campo.value.indexOf('.', 0) == -1)
	{
		return (key <= 13 || key == 46 || (key >= 48 && key <= 57));
	}
	else
	{
		return (key <=13 || (key >= 48 && key <= 57));
	}
}
function enviar(){
	with(document.form1){
		if(txtclave.value==""){
			alert("LA CLAVE NO PUEDE ESTAR EN BLANCO");txtclave.focus();return;
		}
		if(txtnombre.value==""){
			alert("EL NOMBRE NO DEBE DE ESTAR EN BLANCO");txtnombre.focus();return;
		}
		if(txtdescripcion.value==""){
			alert("LA DESCRIPCION NO DEBE DE ESTAR EN BLANCO");txtdescripcion.focus();return;
		}
		document.form1.submit();	
	}	
}
</script>
<form id="form1" name="form1" method="post" action="">
  <table width="548" border="0" align="center">
    <tr>
      <td colspan="2" align="center">AGREGAR CLASIFICACION</td>
    </tr>
    <tr>
      <td width="102" align="right">Clave:</td>
      <td width="436"><input type="text" name="txtclave" id="txtclave" onkeypress="return decimales(event,this);"/></td>
    </tr>
    <tr>
      <td align="right">Nombre:</td>
      <td><input name="txtnombre" type="text" id="txtnombre" size="50" /></td>
    </tr>
    <tr>
      <td align="right">Descripcion:</td>
      <td><textarea name="txtdescripcion" cols="50" id="txtdescripcion"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="button" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /></td>
    </tr>
  </table>
  <?
if(isset($_POST['txtclave']) && $_POST['txtclave']!='')
{


	$clave=$_POST['txtclave'];
	$nombre=$_POST['txtnombre'];
	$descripcion=$_POST['txtdescripcion'];
	
	
	
	$Sql="SELECT * FROM clasificacion WHERE clave= $clave OR descripcion= '$descripcion'";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		echo '<script lenguaje="javascript">alert("YA EXISTE LA CLAVE O DESCRIPCION ");txtclave.focus();return;</script>';
	}
	else
	{
		if($_POST['txtclave']!=0)
		{
		$Clasificacion = new Clasificacion();
		$Clasificacion->setclave($clave);
		$Clasificacion->setnombre($nombre);
		$Clasificacion->setdescripcion($descripcion);		
		
		$Clasificacion->agregarClasificacion();
		
		
		echo '<script lenguaje="javascript">alert("SE GUARDO CORRECTAMENTE");txtclave.focus();return;</script>';

		}
		else
		{
			echo '<script lenguaje="javascript">alert("NO PUEDES PONER LA CLAVE 0");txtclave.focus();return;</script>';

		}
	
	}
}
?>
</form>
</body>
</html>