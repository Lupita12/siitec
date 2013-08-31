<? session_start();?>
<? require_once("conexion.php"); ?>
<? require_once("cls_accion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>accion</title>

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
function validar()
{
	with(document.form1)
	{
		if(txtnombre.value== '' || txtdescri.value== '' || lstmeta.value==0)
		{
			alert('Es necesario llenar todos los campos');
		}
		else
			submit();
	}
}
</script>
<body>

<form id="form1" name="form1" method="post" action="accion2.php">
  <p>&nbsp;</p>
  <table width="80%" border="0" align="center">
    <tr>
      <td>Meta a la que pertenece:</td>
      <td colspan="6"><select name="lstmeta" id="lstmeta">
        <option value="0">Selecciona Meta</option>
        <?	
		$queri = mysql_query("select clave,nombre from meta");
		while($res = mysql_fetch_array($queri)){	
		?>
        <option value="<?=$res[0];?>">
        <?=$res[0];?>
          :
          <?=$res[1];?>
        </option>
        <? }?>
      </select></td>
    </tr>
    <tr>
      <td>Nombre:</td>
      <td colspan="6"><textarea name="txtnombre" id="txtnombre" cols="45" rows="2"></textarea></td>
    </tr>
    <tr>
      <td>Descripcion:</td>
      <td colspan="6"><textarea name="txtdescri" id="txtdescri" cols="45" rows="4"></textarea></td>
    </tr>
    <tr align="center">
      <td colspan="3"><input type="button" name="Button" value="Agregar" onclick="validar();"/>
      </td>
    </tr>
  </table>
<?
if(isset($_POST['txtnombre']) && $_POST['txtnombre']!='')
{
	$ju=$_POST['lstmeta'];	
	$nom=$_POST['txtnombre'];
	$des=$_POST['txtdescri'];	

	$queri=mysql_query("select MAX(right(a.clave,2)) FROM accion a join meta m on a.id_meta=m.id_meta where m.clave like '".$ju."%'");
	$res = mysql_fetch_array($queri);
	$ka=$res[0]+1;
	if($ka<10)
		$ka="0".$ka;
	$ya=$ju.".".$ka;
	
	//echo $ya;
	$obj=new Accion();
	$obj->setclave($ya);
	$id_de_meta=mysql_query("select id_meta from meta where clave='".$ju."'");
	$ahorasi = mysql_fetch_array($id_de_meta);
	$obj->setid_meta($ahorasi[0]);
	$obj->setnombre($nom);
	$obj->setdescripcion($des);	
	$obj->agregar();

	echo '<script lenguaje="javascript">open("accion2.php","_self");</script>';		


	
}
 ?>
<p>&nbsp;</p>
</form>
</body>
</html>