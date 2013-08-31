<? session_start(); ?>
<? include("cls_presupuestoinicial.php"); ?>
<? include("conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AGREGAR PRESUPUESTO INICIAL</title>
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
	with(document.form1)
	{
		if(txtmonto.value==""){
			alert("EL MONTO NO PUEDE ESTAR EN BLANCO");txtmonto.focus();return;
		}
		if(txtperiodo.value==""){
			alert("EL PERIODO NO PUEDE ESTAR EN BLANCO");txtperiodo.focus();return;
		} 			
		document.form1.submit();
	}	
}
function longitud(campo)
{
	with(document.form1)
	{
		if(txtperiodo.value.length<5)
		{ 
    		alert("EL PERIODO ES INCORRECTO: INSERTA 4 DIGITOS");txtperiodo.focus();return;
		}
	}
}
</script>
<body>
<?
if(isset($_POST['txtmonto']) && $_POST['txtmonto'] != '' )
{
	$Sql="SELECT * FROM presupuestoinicial";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	if($num>0)
	{
		echo '<script lenguaje="javascript">alert("NO SE PUEDE AGREGAR OTRO PRESUPUESTO EN EL MISMO AÑO");txtclave.focus();return;</script>';
	}else{

	$vigencia=date('Y/m/d');
	$monto=$_POST['txtmonto'];
	$periodo = date('Y');

	$PresupuestoInicial = new PresupuestoInicial();
	$PresupuestoInicial->setvigencia($vigencia);
	$PresupuestoInicial->setmonto($monto);
	$PresupuestoInicial->setperiodo($periodo);
	$PresupuestoInicial->agregarPresupuestoInicial();
	echo '<script lenguaje="javascript">alert("SE GUARDO CORRECTAMENTE");txtclave.focus();return;</script>';
	}
}
?>
<form id="form1" name="form1" method="post" action="" >
  <table width="35%" border="0" align="center">
    <tr>
      <td height="31" colspan="2" align="center">AGREGAR PRESUPUESTO INICIAL</td>
    </tr>
    <tr>
      <td width="92" height="58" align="right">Vigencia:</td>
      <td width="250"><input name="txtvigencia" type="text" id="txtvigencia" size="12" value="<? echo(date('d/m/Y'))?>" readonly="readonly" /></td>
    </tr>
    <tr>
      <td height="60" align="right">Monto:</td>
      <td><input name="txtmonto" type="text" id="txtmonto" onKeyPress = "return decimales(event,this);" size="12"/></td>
    </tr>
    <tr>
      <td height="28" colspan="3" align="center"><input type="button" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();"/></td>
    </tr>
  </table>
</form>
</body>
</html>