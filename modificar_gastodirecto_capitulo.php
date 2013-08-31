<? session_start(); ?>
<? include("cls_gastodirecto_capitulo.php");  ?>
<? include("conexion.php");  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<script language="javascript">

function enviar(){
	with(document.form1){
		var indice = document.form1.combo_gastodirecto.selectedIndex 
   		var valor = document.form1.combo_gastodirecto.options[indice].value 
		if(valor==0){
			alert("SELECCIONE GASTO DIRECTO");combo_gastodirecto.focus();return;
		}
		var indice1 = document.form1.combo_meta.selectedIndex 
   		var valor1 = document.form1.combo_meta.options[indice].value 
		if(valor1==0){
			alert("SELECCIONE UNA META");combo_meta.focus();return;
		}
		var indice2 = document.form1.combo_capitulo.selectedIndex 
   		var valor2 = document.form1.combo_capitulo.options[indice].value 
		if(valor2==0){
			alert("SELECCIONE UN CAPITULO");combo_capitulo.focus();return;
		} 	
		
		document.form1.submit();
		
	}	
}
</script>
<body>
<form id="form1" name="form1" method="post" action="">
<?
$idd=$_GET['idd'];
$GastoDirecto_Capitulo1 = new GastoDirecto_Capitulo($idd);

?>
  <table width="391" border="0" align="center">
    <tr>
      <td colspan="3" align="center">MODIFICAR GASTO DIRECTO CAPITULO</td>
    </tr>
    <tr>
      <td width="112" align="right">Gasto Directo:</td>
      <td width="263" colspan="2"><label>
        <select name="combo_gastodirecto" id="combo_gastodirecto">
<?
$Sql="SELECT id_gastodirecto,nombre FROM gastodirecto ";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	while($row = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row[0]; ?>" <? if($GastoDirecto_Capitulo1->getid_gasto_directo()==$row[0]){ echo "selected";}?>><? echo $row[1]; ?></option>
 <? } ?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td align="right">Meta:</td>
      <td colspan="2"><label>
        <select name="combo_meta" id="combo_meta" onchange="javascript:FAjax('ajax_gastodirecto_accion.php','combo_accio',this.name+'='+this.value,'post')">
<?
$Sql="SELECT id_meta,clave FROM meta ";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	while($row2 = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row2[0]; ?>" <? if($GastoDirecto_Capitulo1->getid_meta()==$row2[0]){ echo "selected";}?>><? echo $row2[1]; ?></option>
 <? } ?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td align="right">Accion:</td>
      <td colspan="2"><div id="combo_accio">	  
        <select name="combo_accion" id="combo_accion">
<?

	$Sql1="SELECT id_accion,nombre FROM accion WHERE id_meta=".$GastoDirecto_Capitulo1->getid_meta();	
	$ISql1=mysql_query($Sql1);
	while($row1 = mysql_fetch_array($ISql1))
	{
?>
          <option value=" <?=$row1[0]; ?>" <? if($GastoDirecto_Capitulo1->getid_accion()==$row1[0]){ echo "selected";}?>><? echo $row1[1]; ?></option>
 <? } ?>	
        </select>
		</div> </td>
    </tr>
    <tr>
      <td align="right">Capitulo:</td>
      <td colspan="2"><label>
        <select name="combo_capitulo" id="combo_capitulo">
<?
$Sql="SELECT id_capitulo,clave FROM capitulo";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	while($row = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row[0]; ?>" <? if($GastoDirecto_Capitulo1->getid_capitulo()==$row[0]){ echo "selected";}?>><? echo $row[1]; ?></option>
 <? } ?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="button" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /><input name="hid" type="hidden" id="hid" value="<?=$idd;?>"/></td>
    </tr>
  </table>
<?
if($_POST['combo_gastodirecto']!='' && $_POST['combo_meta']!='')
{ 

		$id_gasto_directo=$_POST['combo_gastodirecto'];
		$id_meta=$_POST['combo_meta'];
		$id_capitulo=$_POST['combo_capitulo'];
		$idd=$_POST['hid'];


			$GastoDirecto_Capitulo  = new GastoDirecto_Capitulo ($idd);
			$GastoDirecto_Capitulo->setid_gasto_directo($id_gasto_directo);
			$GastoDirecto_Capitulo->setid_meta($id_meta);
			$GastoDirecto_Capitulo->setid_capitulo($id_capitulo);
			$GastoDirecto_Capitulo->modificarGastoDirecto_Capitulo();
echo '<pre>';
print_r($GastoDirecto_Capitulo);
echo '</pre>';
die();
			echo '<script lenguaje="javascript">alert("SE GUARDO CORRECTAMENTE");combo_gastodirecto.focus();return;</script>';
			echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';
}
?>
</form>
</body>
</html>