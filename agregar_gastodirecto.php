<? session_start(); ?>
<? include("cls_gastodirecto.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AGREGAR GASTO DIRECTO </title>
<link href="estilos.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="acc_calendar/acc_calendar.js"></script>
</head>

<script language="javascript">
/*var nav4 = window.Event ? true : false;
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

}*/
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
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" align="center">
    <tr>
      <td colspan="2" align="center">AGREGAR GASTO DIRECTO</td>
    </tr>
    <tr>
      <td width="285" align="right">Clave:</td>
      <td width="643"><input type="text" name="txtclave" id="txtclave" /></td>
    </tr>
    <tr>
      <td align="right">Nombre:</td>
      <td><input name="txtnombre" type="text" id="txtnombre" size="70" /></td>
    </tr>
    <tr>
      <td align="right">Descripcion:</td>
      <td><textarea name="txtdescripcion" cols="70" id="txtdescripcion"></textarea></td>
    </tr>
    <tr>
      <td align="right">Fecha de Expedicion:</td>
      <td><p><label for="txtfechaexp"><input class="fecha rang10" type="text" name="txtfechaexp" id="txtfechaexp" readonly="readonly" /></label></p></td>
    </tr>
    <tr>
      <td align="right">Fecha de Recibido:</td>
      <td><p><label for="txtfecharec"><input class="fecha rang10" type="text" name="txtfecharec" id="txtfecharec" readonly="readonly" /></label></p></td>
    </tr>
    <tr>
      <td align="right">Fecha  de aplicacion inicial:</td>
      <td><input type="text" name="txtfecha_inicial" id="txtfecha_inicial" />(mes)</td>
    </tr>
    <tr>
      <td align="right">Fecha de aplicacion final:</td>
      <td><input type="text" name="txtfecha_final" id="txtfecha_final" />(mes)</td>
    </tr>
    <tr>
      <td align="right">Monto:</td>
      <td><input type="text" name="txtmonto" id="txtmonto" /></td>
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
	$fecha_inicial=$_POST['txtfecha_inicial'];
	$fecha_final=$_POST['txtfecha_final'];
	$fecha_expedicion=$_POST['txtfechaexp'];
	$fecha_recibido=$_POST['txtfecharec'];
	$monto=$_POST['txtmonto'];

	$Sql="SELECT * FROM gastodirecto WHERE clave= '$clave' OR nombre= '$nombre'";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		echo '<script lenguaje="javascript">alert("YA EXISTE LA CLAVE O NOMBRE ");</script>';
	}
	else
	{
		if($_POST['txtclave']!='')
		{
			$GastoDirecto = new GastoDirecto();

			$GastoDirecto->setclave($clave);
			$GastoDirecto->setnombre($nombre);
			$GastoDirecto->setdescripcion($descripcion);
			$GastoDirecto->setfecha_inicial($fecha_inicial);
			$GastoDirecto->setfecha_final($fecha_final);
			$GastoDirecto->setfecha_expedicion($fecha_expedicion);
			$GastoDirecto->setfecha_recibido($fecha_recibido);
			$GastoDirecto->setmonto($monto);

			$GastoDirecto->agregarGastoDirecto();
/*echo '<pre>';
print_r($GastoDirecto);
echo '</pre>';*/

			echo '<script lenguaje="javascript">alert("SE GUARDO CORRECTAMENTE");</script>';

		}
		else
		{
			echo '<script lenguaje="javascript">alert("NO PUEDES PONER LA CLAVE 0");</script>';

		}
	
	}

}
?>
</form>

</body>
</html>