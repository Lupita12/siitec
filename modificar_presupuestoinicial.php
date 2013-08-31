<? session_start(); ?>
<? include("cls_presupuestoinicial.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MODIFICAR PRESUPUESTO INICIAL</title>
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
		if(txtmonto.value==""){
			alert("EL MONTO NO PUEDE ESTAR EN BLANCO");txtmonto.focus();return;
		}	
		document.form1.submit();
	}	
}
</script>
<form id="form1" name="form1" method="post" action="">
<?
$idd=$_GET['idd'];
$PresupuestoInicial1 = new PresupuestoInicial($idd);
?>
  <table width="548" border="0" align="center">
    <tr>
      <td colspan="2" align="center">MODIFICAR PRESUPUESTO INICIAL</td>
    </tr>
    <tr>
      <td width="98" align="right">Monto:</td>
      <td width="440"><input type="text" name="txtmonto" id="txtmonto" onkeypress="return decimales(event,this);" value="<?=$PresupuestoInicial1->getmonto(); ?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="button" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /><input name="hid" type="hidden" id="hid" value="<?=$idd;?>"/></td>
    </tr>
  </table>
<?
if(isset($_POST['txtmonto']) && $_POST['txtmonto']!='')
{

		$monto=$_POST['txtmonto'];
		$idd=$_POST['hid'];

		$PresupuestoInicial = new PresupuestoInicial($idd);

		$PresupuestoInicial->setmonto($monto);

		$PresupuestoInicial->modificarPresupuestoInicial();
		
		echo '<script lenguaje="javascript">setTimeout("presupuestoinicial.php",15000);</script>';
		echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';
}
?>
</form>
</body>
</html>