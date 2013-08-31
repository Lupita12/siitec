<? session_start(); ?>
<? include("cls_capitulo.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
function decima(evt,campo)
{
	var key = nav4 ? evt.which : evt.keyCode;
	if (campo.value.indexOf('.', 0) == -1)
	{
		return (key <= 13);
	}
	else
	{
		return (key <= 13);
	}

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
<body bgcolor="#CCCCCC" >
<form id="form1" name="form1" method="post" action="">
<?
$idd=$_GET['idd'];
$Capi = new Capitulo($idd);

?>
  <table width="416" border="0" align="center">
    <tr>
      <td colspan="2" align="center">MODIFICAR CAPITULO</td>
    </tr>
    <tr>
      <td width="149" align="right">Capitulo:</td>
      <td width="257"><p><input type="text" name="txtclave" id="txtclave" maxlength="4" size="9" onkeypress="return decimales(event,this);" value="<?=$Capi->getclave(); ?>"/></p></td>
    </tr>
    <tr>
      <td align="right">Nombre:</td>
      <td><p>
        <textarea name="txtnombre" cols="40" id="txtnombre"><?=$Capi->getnombre(); ?>
        </textarea>
      </p></td>
    </tr>
    <tr>
      <td height="165" align="right" >Descripcion:</td>
      <td><textarea name="txtdescripcion"  cols="40" rows="10"  id="txtdescripcion"><?=$Capi->getdescripcion(); ?>
      </textarea></td>
    </tr>
    <tr>
      <td height="51" colspan="2" align="center"><input type="submit" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /><input name="hid" type="hidden" id="hid" value="<?=$idd;?>"/></td>
    </tr>
  </table>
<?
if(isset($_POST['txtclave']) && $_POST['txtclave']!='')
{

		$clave=$_POST['txtclave'];
		$nombre=$_POST['txtnombre'];
		$descripcion=$_POST['txtdescripcion'];
		$idd=$_POST['hid'];

$Capitulo = new Capitulo($idd);


$Capitulo->setclave($clave);
$Capitulo->setnombre($nombre);
$Capitulo->setdescripcion($descripcion);

$Capitulo->modificaCapitulos();

/*echo '<pre>';
print_r($AltaDireccion);
echo '</pre>';
die();*/


echo '<script lenguaje="javascript">setTimeout("document.location.href="Capitulo.php";",10000);</script>';

echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';


}
?>
</form>
</body>
</html>