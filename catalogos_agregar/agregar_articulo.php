<? session_start(); ?>
<? include("../clases/cls_articulo.php"); ?>
<? include("../conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AGREGAR ARTICULO</title>
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
		if(combo_nivel.value==0){
			alert("SELECCIONA UN NIVEL");combo_nivel.focus();return;
		}
		if(combo_partida.value==0){
			alert("SELECCIONA UNA PARTIDA");combo_partida.focus();return;
		}
		if(txtcodigo.value==""){
			alert("EL CODIGO NO DEBE DE ESTAR EN BLANCO");txtcodigo.focus();return;
		}
		if(txtdescripcion.value==""){
			alert("LA DESCRIPCION NO DEBE DE ESTAR EN BLANCO");txtdescripcion.focus();return;
		}
		if(combo_tipoarticulo.value==0){
			alert("SELECCIONA TIPO DE ARTICULO");combo_tipoarticulo.focus();return;
		}
		document.form1.submit();	
	}	
}
</script>
<form id="form1" name="form1" method="post" action="">
  <table width="548" border="0" align="center">
    <tr>
      <td colspan="2" align="center">AGREGAR ARTICULO</td>
    </tr>
    <tr>
      <td width="102" align="right">Clave:</td>
      <td width="436"><input type="text" name="txtclave" id="txtclave" onkeypress="return decimales(event,this);"/></td>
    </tr>
    <tr>
      <td align="right">Nivel:</td>
      <td><select name="combo_nivel" id="combo_nivel">
          <option value="0">Seleccionar</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select></td>
    </tr>
    <tr>
      <td align="right">Partida:</td>
      <td><select name="combo_partida" id="combo_partida">
        <option value="0">Seleccionar</option>
       
<?
$Sql="SELECT id_partida,clave,nombre FROM partida order by clave";
	$ISql = mysql_query($Sql);
	while($row = mysql_fetch_array($ISql))
	{?>
     <option value="<?=$row[0];?>"><?=$row[1];?>: <?=$row[2];?></option>
 <? } ?>
      </select></td>
    </tr>
    <tr>
      <td align="right">Codigo:</td>
      <td><input type="text" name="txtcodigo" id="txtcodigo" /></td>
    </tr>
    <tr>
      <td align="right">Descripcion:</td>
      <td><textarea name="txtdescripcion" id="txtdescripcion"></textarea></td>
    </tr>
    <tr>
      <td align="right">Tipo del Articulo</td>
      <td><select name="combo_tipoarticulo" id="combo_tipoarticulo">
          <option value="0">Seleccionar</option>
<?
$Sql="SELECT id_tipoarticulo,clave, descripcion FROM tipoarticulo order by clave";
	$ISql = mysql_query($Sql);
	while($row = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row[0]; ?>"><?=$row[1]; ?>: <?=$row[2]; ?></option>
 <? } ?>          
      </select></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="button" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /></td>
    </tr>
  </table>
  <?
if(isset($_POST['txtclave']) && $_POST['txtclave']!='')
{


	$clave=$_POST['txtclave'];
	$nivel=$_POST['combo_nivel'];
	$id_partida=$_POST['combo_partida'];
	$codigo=$_POST['txtcodigo'];
	$descripcion=$_POST['txtdescripcion'];
	$tipoarticulo=$_POST['combo_tipoarticulo'];
	
	
	$Sql="SELECT * FROM articulo WHERE clave= $clave OR descripcion= '$descripcion'";
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
		$Articulo = new Articulo();
		$Articulo->setclave($clave);
		$Articulo->setnivel($nivel);
		$Articulo->setid_partida($id_partida);
		$Articulo->setcodigo($codigo);
		$Articulo->setdescripcion($descripcion);
		$Articulo->setid_tipoarticulo($tipoarticulo);		
		
		$Articulo->agregarArticulo();
		
		
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