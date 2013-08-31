<? session_start(); ?>
<? include("cls_gastodirecto_partida.php");  ?>
<? include("conexion.php");  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MODIFICAR GASTO DIRECTO PARTIDA</title>
<script language="javascript" src="js/libreriaAjax.js"></script>
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
$GastoDirecto_partida1 = new GastoDirecto_partida($idd);
?>
  <table width="391" border="0" align="center">
    <tr>
      <td colspan="3" align="center">MODIFICAR GASTO DIRECTO PARTIDA</td>
    </tr>
    <tr>
      <td width="112" align="right">Gasto Directo:</td>
      <td width="263" colspan="2">
        <select name="combo_gastodirecto" id="combo_gastodirecto" onchange="javascript:FAjax('ajax_gastodirecto_meta.php?idd='<?=$idd; ?>,'combo_met',this.name+'='+this.value,'post')">
<?
	$Sql="SELECT id_gastodirecto, nombre FROM gastodirecto";
	$ISql = mysql_query($Sql);
	while($row = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row[0]; ?>" <? if($GastoDirecto_partida1->getid_gasto_directo()==$row[0]){ echo "selected";}?>><?=$row[1]; ?></option>
 <? } ?>
        </select>
      </td>
    </tr>
    <tr>
      <td align="right">Meta:</td>
      <td colspan="2">
      <div id="combo_met">	  
        <select name="combo_meta" id="combo_meta" >
<?
$Sql="SELECT id_meta,clave FROM meta ";
	$ISql = mysql_query($Sql);
	while($row1 = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row1[0]; ?>" <? if($GastoDirecto_partida1->getid_meta()==$row1[0]){ echo "selected";}?>><?=$row1[1]; ?></option>
 <? } ?>	
        </select>
		</div> </td>
    </tr>
    <tr>
      <td align="right">Capitulo:</td>
      <td colspan="2"> <div id="combo_capitul">	  
        <select name="combo_capitulo" id="combo_capitulo">
<?
$Sql="SELECT 
	c.id_capitulo, c.clave, gp.id_gastodirecto_partida
FROM 
	((capitulo c join subcapitulo sc on c.id_capitulo = sc.id_capitulo)
    join partida p on sc.id_subcapitulo = p.id_subcapitulo) 
    join gastodirecto_partida gp on p.id_partida = gp.id_partida
WHERE 
	gp.id_partida=".$GastoDirecto_partida1->getid_partida()."
    AND
    gp.id_gastodirecto_partida=".$GastoDirecto_partida1->getid_gastodirecto_partida();
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	while($row2 = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row2[0]; ?>" <? if($GastoDirecto_partida1->getid_gastodirecto_partida()==$row1[2]){ echo "selected";}?>><?=$row2[1]; ?></option>
 <? } ?>		
        </select>
		</div> </td>
    </tr>
    <tr>
      <td align="right">Partida:</td>
      <td colspan="2"> <div id="combo_partid">	  
        <select name="combo_partida" id="combo_partida">
<?
$Sql="SELECT id_partida,clave FROM partida ";
	$ISql = mysql_query($Sql);
	while($row3 = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row3[0]; ?>" <? if($GastoDirecto_partida1->getid_partida()==$row3[0]){ echo "selected";}?>><?=$row3[1]; ?></option>
 <? } ?>		
        </select>
		</div> </td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="button" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /></td>
    </tr>
  </table>
<?
if($_POST['combo_gastodirecto']!=0 && $_POST['combo_meta']!=0 && $_POST['combo_partida']!=0)
{ 

		$clave_gasto_directo=$_POST['combo_gastodirecto'];
		$clave_meta=$_POST['combo_meta'];
		$clave_partida=$_POST['combo_partida'];

$Sql="SELECT * FROM gastodirecto_partida WHERE clave_gasto_directo= $clave_gasto_directo AND clave_meta = '$clave_meta' AND clave_partida = $clave_partida ";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		echo '<script lenguaje="javascript">alert("YA EXISTE LA CLAVE O NOMBRE ");combo_gastodirecto.focus();return;</script>';
	}
	else
	{

			$GastoDirecto_Partida  = new GastoDirecto_Partida ();
			$GastoDirecto_Partida->setclave_gasto_directo($clave_gasto_directo);
			$GastoDirecto_Partida->setclave_meta($clave_meta);
			$GastoDirecto_Partida->setclave_partida($clave_partida);
			$GastoDirecto_Partida->agregarGastoDirecto_Partida();

			echo '<script lenguaje="javascript">alert("SE GUARDO CORRECTAMENTE");combo_gastodirecto.focus();return;</script>';

	}
}
?>
</form>
</body>
</html>