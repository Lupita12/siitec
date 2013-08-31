<? session_start();?>
<? include("cls_departamento.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MODIFICAR DEPARTAMENTO</title>
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
<form id="form1" name="form1" method="post" action="">
<?
$idd=$_GET['idd'];
$Departamento1 = new Departamento($idd);

?>
  <table width="548" border="0" align="center">
    <tr>
      <td colspan="2" align="center">MODIFICAR DEPARTAMENTO</td>
    </tr>
    <tr>
      <td align="right">Alta Direccion:</td>
      <td><label>
        <select name="combo" id="combo">
        <?
$Sql="SELECT id_altadireccion, nombre FROM altadireccion";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);

	if($Departamento1->getid_altadireccion()==0)
	{?>
		
		<option value="0">Seleccionar</option>
<?  }
	while($row = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row[0]; ?>" <? if($Departamento1->getid_altadireccion()==$row[0]){ echo "selected";}?>><? echo $row[1]; ?></option>
 <? } ?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td width="98" align="right">Clave:</td>
      <td width="440"><input type="text" name="txtclave" id="txtclave" onkeypress="return decimales(event,this);" value="<?=$Departamento1->getclave(); ?>"/></td>
    </tr>
    <tr>
      <td align="right">Nombre:</td>
      <td><input name="txtnombre" type="text" id="txtnombre" size="70" value="<?=$Departamento1->getnombre(); ?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="button" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /><input name="hid" type="hidden" id="hid" value="<?=$idd;?>"/></td>
    </tr>
  </table>
<?
if(isset($_POST['txtclave']) && $_POST['txtclave']!='')
{
		$id_altadireccion=$_POST['combo'];
		$clave=$_POST['txtclave'];
		$nombre=$_POST['txtnombre'];
		$idd=$_POST['hid'];
	
	
	$Sql="SELECT * FROM departamento WHERE clave= $clave";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		if($clave==$idd)
		{
				if($_POST['txtclave']!=0)
				{
					$Departamento = new Departamento($idd);
					$Departamento->setclave($clave);
					$Departamento->setnombre($nombre);
					$Departamento->setid_altadireccion($id_altadireccion);
					$Departamento->modificarDepartamento();

					echo '<script lenguaje="javascript">setTimeout("reload("departamento.php");",10000);</script>';
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
			$Departamento = new Departamento($idd);
			$Departamento->setclave($clave);
			$Departamento->setnombre($nombre);
			$Departamento->modificarDepartamento();

			echo '<script lenguaje="javascript">setTimeout("reload("departamento.php");",10000);</script>';
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