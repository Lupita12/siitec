<? session_start(); ?>
<? include("../clases/cls_tipoarticulo.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MODIFICAR TIPO ARTICULO</title>
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
		if(txtdescripcion.value==""){
			alert("LA DESCRIPCION NO PUEDE ESTAR EN BLANCO");txtdescripcion.focus();return;
		}	
		document.form1.submit();
	}	
}
</script>
<form id="form1" name="form1" method="post" action="">
<?
$clave=$_GET['clav'];
$TipoArticulo1 = new TipoArticulo($clave);
?>
  <table width="548" border="0" align="center">
    <tr>
      <td colspan="2" align="center">MODIFICAR TIPO ARTICULO</td>
    </tr>
    <tr>
      <td width="98" align="right">Clave:</td>
      <td width="440"><input type="text" name="txtclave" id="txtclave" onkeypress="return decimales(event,this);" value="<?=$TipoArticulo1->getclave(); ?>"/></td>
    </tr>
    <tr>
      <td align="right">Descripcion:</td>
      <td><textarea name="txtdescripcion" cols="70" id="txtdescripcion"><?=$TipoArticulo1->getdescripcion(); ?>
      </textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /><input name="hid" type="hidden" id="hid" value="<?=$clave; ?>"/></td>
    </tr>
  </table>
<?
if(isset($_POST['txtclave']) && $_POST['txtclave']!='')
{

		$clave=$_POST['txtclave'];
		$descripcion=$_POST['txtdescripcion'];
		$idd=$_POST['hid'];
		
	$Sql="SELECT * FROM tipoarticulo WHERE clave= '$clave'";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		
		if($clave==$idd)
		{
				if($_POST['txtclave']!=0)
				{
					$TipoArticulo = new TipoArticulo($idd);
					$TipoArticulo->setclave($clave);
					$TipoArticulo->setdescripcion($descripcion);
					$TipoArticulo->modificarTipoArticulo();
					echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';
				}
				else
				{
				echo '<script lenguaje="javascript">alert("NO PUEDES PONER LA CLAVE 0");txtclave.focus();return;</script>';
				}
		}
		else
		{
		echo '<script lenguaje="javascript">alert("YA EXISTE LA CLAVE O NOMBRE ");txtclave.focus();return;</script>';
		}
	}
	else
	{
		if($_POST['txtclave']!=0)
		{
		$TipoArticulo = new TipoArticulo($idd);

		$TipoArticulo->setclave($clave);
		$TipoArticulo->setdescripcion($descripcion);

		$TipoArticulo->modificarTipoArticulo();
		echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';
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