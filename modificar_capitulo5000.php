<? session_start(); ?>
<? include("cls_capitulo5000.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Documento sin título</title>
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
		if(txtclave_departamento.value==""){
			alert("LA CLAVE NO PUEDE ESTAR EN BLANCO");txtclave.focus();return;
		}
		
		
		if(txtclave_meta.value==""){
			alert("LA CLAVE NO PUEDE ESTAR EN BLANCO");txtclave.focus();return;
		}
		
		if(txtclave_partida.value==""){
			alert("LA CLAVE NO PUEDE ESTAR EN BLANCO");txtclave.focus();return;
		}
		
		
		document.form1.submit();
	}	
}
</script>


<form id="form1" name="form1" method="post" action="">
<?
$idd=$_GET['idd'];
$capitulo5000 = new capitulo5000($idd);

?>
  <table width="548" border="0" align="center">
    <tr>
      <td colspan="2" align="center">MODIFICAR CAPITULO 5000</td>
    </tr>
    <tr>
      <td width="98" align="right">Clave Departamento:</td>
      <td width="440"><p><input type="text" name="txtclave_departamento" id="txtclave_departamento" onkeypress="return decimales(event,this);" value="<?=$capitulo5000->getclave_departamento(); ?>"/></p></td>
    </tr>
    <tr>
      <td align="right">Clave Meta:</td>
      <td><p><input name="txtmeta" type="text" id="txmeta" size="70" value="<?=$capitulo5000->getclave_meta(); ?>" /></p></td>
    </tr>
   
   <tr>
      <td align="right">Clave Partida:</td>
      <td><p><input name="txtpartida" type="text" id="txtpartida" size="70" value="<?=$capitulo5000->getclave_partida(); ?>" /></p></td>
    </tr>
   
   
   
   
   
    <tr>
      <td colspan="2" align="center"><input type="submit" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /><input name="hid" type="hidden" id="hid" value="<?=$idd;?>"/></td>
    </tr>
  </table>
<?
if(isset($_POST['txtclave_departamento']) && $_POST['txtclave_departamento']!=''){

		$clave_departamento=$_POST['txtclave_departamento'];
		$clave_meta=$_POST['txtmeta'];	
		$clave_partida=$_POST['txtpartida'];
		$idd=$_POST['hid'];

$capitulo5000 = new capitulo5000($idd);


$capitulo5000->setclave_departamento($clave_departamento);
$capitulo5000->setclave_meta($clave_meta);
$capitulo5000->setclave_partida($clave_partida);



$capitulo5000->modificar();

/* echo '<pre>';
print_r($capitulo5000);
echo '</pre>';
die(); */


echo '<script lenguaje="javascript">setTimeout("document.location.href="capitulo5000.php";",10000);</script>';

echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';
}
?>
</form>
</body>
</html>




</body>
</html>