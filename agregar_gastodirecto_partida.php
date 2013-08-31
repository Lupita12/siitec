<? session_start();?>
<? include("cls_gastodirecto_partida.php");  ?>
<? include("conexion.php");  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AGREGAR GASTO DIRECTO PARTIDA</title>
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
   		var valor1 = document.form1.combo_meta.options[indice1].value 
		if(valor1==0){
			alert("SELECCIONE UNA META");combo_meta.focus();return;
		}
		var indice2 = document.form1.combo_capitulo.selectedIndex 
   		var valor2 = document.form1.combo_capitulo.options[indice2].value 
		if(valor2==0){
			alert("SELECCIONE UN CAPITULO");combo_capitulo.focus();return;
		} 	
		var indice3 = document.form1.combo_partida.selectedIndex 
   		var valor3 = document.form1.combo_partida.options[indice3].value 
		if(valor3==0){
			alert("SELECCIONE UN PARTIDA");combo_partida.focus();return;
		}
		document.form1.submit();
		
	}	
}
</script>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="391" border="0" align="center">
    <tr>
      <td colspan="3" align="center">AGREGAR GASTO DIRECTO PARTIDA</td>
    </tr>
    <tr>
      <td width="112" align="right">Gasto Directo:</td>
      <td width="263" colspan="2">
        <select name="combo_gastodirecto" id="combo_gastodirecto" onchange="javascript:FAjax('ajax_gastodirecto_meta.php','combo_met',this.name+'='+this.value,'post')">
          <option value="0">Seleccionar</option>
<?
$Sql="SELECT id_gastodirecto, nombre FROM gastodirecto";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	while($row = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row[0]; ?>"><? echo $row[1]; ?></option>
 <? } ?>
        </select>
      </td>
    </tr>
    <tr>
      <td align="right">Meta:</td>
      <td colspan="2">
      <div id="combo_met">	  
        <select name="combo_meta" id="combo_meta" onchange="javascript:FAjax('ajax_gastodirecto_capitulo.php','combo_capitul',this.name+'='+this.value,'post')" >
			<option value="0">Selecciona</option>		
        </select>
		</div> </td>
    </tr>
    <tr>
      <td align="right">Capitulo:</td>
      <td colspan="2"> <div id="combo_capitul">	  
        <select name="combo_capitulo" id="combo_capitulo">
			<option value="0">Selecciona</option>		
        </select>
		</div> </td>
    </tr>
    <tr>
      <td align="right">Partida:</td>
      <td colspan="2"> <div id="combo_partid">	  
        <select name="combo_partida" id="combo_partida">
			<option value="0">Selecciona</option>		
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

		$id_gasto_directo=$_POST['combo_gastodirecto'];
		$id_meta=$_POST['combo_meta'];
		$id_capitulo=$_POST['combo_capitulo'];
		$id_partida=$_POST['combo_partida'];

	$Sql="SELECT * FROM gastodirecto_partida WHERE id_gasto_directo= $id_gasto_directo AND id_meta = $id_meta AND id_partida = $id_partida";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		echo '<script lenguaje="javascript">alert("YA EXISTE LA CLAVE O NOMBRE ");combo_gastodirecto.focus();</script>';
	}
	else
	{

			$GastoDirecto_Partida  = new GastoDirecto_Partida ();
			$GastoDirecto_Partida->setid_gasto_directo($id_gasto_directo);
			$GastoDirecto_Partida->setid_meta($id_meta);
			$GastoDirecto_Partida->setid_partida($id_partida);
			$GastoDirecto_Partida->agregarGastoDirecto_Partida();

			echo '<script lenguaje="javascript">alert("SE GUARDO CORRECTAMENTE");combo_gastodirecto.focus();</script>';

	}
}
?>
</form>
</body>
</html>