<? session_start();?>
<? include("cls_departamento.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AGREGAR DEPARTAMENTO</title>
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
		var indice = document.form1.combo.selectedIndex 
   		var valor = document.form1.combo.options[indice].value 
		if(valor==0){
			alert("SELECCIONE UNA ALTA DIRECCION");combo.focus();return;
		}
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
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="581" border="0" align="center">
    <tr>
      <td colspan="2" align="center">AGREGAR DEPARTAMENTO</td>
    </tr>
    <tr>
      <td align="right">Alta Direccion:</td>
      <td><label>
        <select name="combo" id="combo">
         <option value="0">Seleccionar</option>
<?
$Sql="SELECT id_altadireccion, nombre FROM altadireccion";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	while($row = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row[0]; ?>"><? echo $row[1]; ?></option>
 <? } ?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td width="140" align="right">Clave:</td>
      <td width="431"><input type="text" name="txtclave" id="txtclave" onkeypress="return decimales(event,this);"/></td>
    </tr>
    <tr>
      <td align="right">Nombre:</td>
      <td><input name="txtnombre" type="text" id="txtnombre" size="70" /></td>
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
		$id_altadireccion=$_POST['combo'];
		$periodo=date('Y');

$Sql="SELECT * FROM departamento WHERE clave= $clave OR nombre= '$nombre'";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		echo '<script lenguaje="javascript">alert("YA EXISTE LA CLAVE O NOMBRE ");txtclave.focus();return;</script>';
	}
	else
	{
		if($_POST['txtclave']!=0)
		{
		$Departamento = new Departamento();
		$Departamento->setclave($clave);
		$Departamento->setnombre($nombre);
		$Departamento->setperiodo($periodo);
		$Departamento->setid_altadireccion($id_altadireccion);
		$Departamento->agregarDepartamento();
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