<? session_start(); ?>
<? include("cls_gastodirecto_capitulo.php");  ?>
<? include("cls_gastodirecto_partida.php");  ?>
<? include("cls_meta_capitulo.php"); ?>
<? include("conexion.php");  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script language="javascript" src="js/libreriaAjax.js"></script>
</head>
<script language="javascript">

function enviar(){
	with(document.form1){
		/*var indice = document.form1.combo_gastodirecto.selectedIndex 
   		var valor = document.form1.combo_gastodirecto.options[indice].value 
		if(valor==0){
			alert("SELECCIONE GASTO DIRECTO");combo_gastodirecto.focus();return;
		}*/
		//var indice1 = document.form1.combo_meta.selectedIndex 
		
   		var valor5 = document.form1.combo_departamento.value 
		if(valor5==0){
			alert("SELECCIONE UN DEPARTAMENTO");combo_departamento.focus();return;
		}
		var valor1 = document.form1.combo_meta.value 
		if(valor1==0){
			alert("SELECCIONE UNA META");combo_meta.focus();return;
		}	
		//var indice3 = document.form1.combo_accion.selectedIndex 
   		var valor3 = document.form1.combo_accion.value 
		if(valor3==0){
			alert("SELECCIONE UNA ACCION");combo_accion.focus();return;
		}
				//var indice2 = document.form1.combo_capitulo.selectedIndex 
   		var valor2 = document.form1.combo_capitulo.value 
		if(valor2==0){
			alert("SELECCIONE UN CAPITULO");combo_capitulo.focus();return;
		} 
				//var indice2 = document.form1.combo_capitulo.selectedIndex 
   		var valor4 = document.form1.combo_partida.value 
		if(valor4==0){
			alert("SELECCIONE UNA PARTIDA");combo_partida.focus();return;
		}
		var valor6 = document.form1.txtmonto.value 
		if(valor6==0){
		alert("INGRESE UN MONTO");txtmonto.focus();return;
		}
		document.form1.submit();
		
	}	
}
</script>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="504" border="0" align="center">
    <tr><? $id_gasto_directo=$_GET['idd'];
			$monto=$_GET['monto'];
			$Sql1="SELECT id_gastodirecto FROM gastodirecto WHERE clave = '$id_gasto_directo' ";
			$ISql1 = mysql_query($Sql1);
			$row1 = mysql_fetch_array($ISql1);
			
			$Sql2="SELECT sum(monto) FROM gastodirecto_capitulo WHERE id_gasto_directo  = '$row1[0]' ";
			$ISql2 = mysql_query($Sql2);
			$row2 = mysql_fetch_array($ISql2);
			$restante=$monto-$row2[0];
			
		?>
      <td colspan="5" align="center">Asignar el Gasto directo </td><input name="hid" type="hidden" id="hid" value="<?=$row1[0];?>"/>
    </tr>
    <tr>
      <td colspan="2">Monto: <? echo "$".number_format($monto, 2, '.', ',');?> </td>
      <td width="164">Distribuido: <? echo "$".number_format($row2[0], 2, '.', ','); ?></td>
      <td width="147">Restante: <? echo "$".number_format($restante, 2, '.', ',');?></td>
      <td width="4">&nbsp;</td>
    </tr>
    <tr>
      <td width="106" align="right">Departamento:</td>
      <td colspan="4"><label>
        <select name="combo_departamento" id="combo_departamento" onchange="javascript:FAjax('ajax_gastodirecto_meta.php','combo_met',this.name+'='+this.value,'post')">
        <option value="0">Seleccionar</option>
        <?
$Sql="SELECT id_departamento,nombre FROM departamento";
	$ISql = mysql_query($Sql);
	while($row = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row[0]; ?>"<? if($_POST['combo_departamento']==$row[0]){ echo ' selected="selected"'; $condi=$row[0];} ?> ><?=$row[1]; ?></option>
 <? } ?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td align="right">Meta:</td>
      <td colspan="4"><div id="combo_met">
        <select name="combo_meta" id="combo_meta" >
        <?
		
		if($_POST['combo_meta'])
		{
		$Sql="SELECT m.id_meta,m.clave,m.nombre FROM meta_departamento md join meta m on md.id_meta = m.id_meta WHERE md.id_departamento= $condi GROUP BY m.id_meta";	
	$resultado=mysql_query($Sql);
	while($row = mysql_fetch_array($resultado))
	{
?>
          <option value=" <?=$row[0]; ?>"<? if($_POST['combo_meta']==$row[0]){ echo ' selected="selected"'; $condi1=$row[0]; } ?> ><?=$row[1]; ?>:<?=$row[2];?></option>
 <? } 
 }else{?><option value="0">Seleccionar</option><? }?>
        </select>
      </div></td>
    </tr>
    <tr>
      <td align="right">Accion:</td>
      <td colspan="4"><div id="combo_accio">	  
        <select name="combo_accion" id="combo_accion" >
        <?
		if($_POST['combo_accion'])
		{	
	$Sql="SELECT id_accion,nombre FROM accion WHERE id_meta=$condi1";	
	$resultado=mysql_query($Sql);
	while($row = mysql_fetch_array($resultado))
	{
?>
          <option value=" <?=$row[0]; ?>"<? if($_POST['combo_accion']==$row[0]){ echo ' selected="selected"';} ?> ><?=$row[1]; ?></option>
 <? } 
 }else{?><option value="0">Seleccionar</option><? }?>
        </select>
		</div> </td>
    </tr>
    <tr>
      <td align="right">Capitulo:</td>
      <td colspan="4"><label>
        <select name="combo_capitulo" id="combo_capitulo" onchange="javascript:FAjax('ajax_gastodirecto_partida.php','combo_partid',this.name+'='+this.value,'post')">>
          <option value="0">Seleccionar</option>
<?
$Sql="SELECT id_capitulo,clave FROM capitulo WHERE clave >= 2000 and clave <=3000";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	while($row = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row[0]; ?>"><?=$row[1]; ?></option>
 <? } ?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td align="right">Partida:</td>
      <td colspan="4"><div id="combo_partid">
      <select name="combo_partida" id="combo_partida">
        <option value="0">Selecciona</option>
      </select>
      </div></td>
    </tr>
    <tr>
      <td align="right">Monto:</td>
      <td colspan="4"><input type="text" name="txtmonto" id="txtmonto" /></td>
    </tr>
    <tr>
      <td colspan="5" align="center"><input type="button" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /></td>
    </tr>
  </table>
<?
if(isset($_POST['combo_meta']) && $_POST['combo_meta']!='')
{ 

		$id_gasto_directo=$_POST['hid'];
		$id_meta=$_POST['combo_meta'];
		$id_capitulo=$_POST['combo_capitulo'];
		$id_accion=$_POST['combo_accion'];
		$id_partida=$_POST['combo_partida'];
		$id_departamento=$_POST['combo_departamento'];
		$monto=$_POST['txtmonto'];
		



$Sql="SELECT * FROM gastodirecto_capitulo  WHERE id_gasto_directo= '$id_gasto_directo' AND id_meta = $id_meta AND id_capitulo = $id_capitulo AND id_accion = $id_accion AND id_partida = $id_partida";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		echo '<script lenguaje="javascript">alert("YA EXISTE ESE DATO ");</script>';
	}
	else
	{			
			
			$GastoDirecto_Capitulo  = new GastoDirecto_Capitulo ();
			$GastoDirecto_Capitulo->setid_gasto_directo($id_gasto_directo);
			$GastoDirecto_Capitulo->setid_meta($id_meta);
			$GastoDirecto_Capitulo->setid_capitulo($id_capitulo);
			$GastoDirecto_Capitulo->setid_accion($id_accion);
			$GastoDirecto_Capitulo->setid_partida($id_partida);
			$GastoDirecto_Capitulo->setid_departamento($id_departamento);
			$GastoDirecto_Capitulo->setmonto($monto);

			$GastoDirecto_Capitulo->agregarGastoDirecto_Capitulo();


			echo '<script lenguaje="javascript">alert("SE GUARDO CORRECTAMENTE");</script>';
			
			
	}
	
	// FFFFFAAAAAAAALLLLLLLLTTTTTTTAAAAANNNNNNNNNTTTTTTTTEEEEEEEEEEE
	/*
	
			$Sql="SELECT m.clave, c.clave, m.periodo,SUM(gc.monto),gc.id_meta,gc.id_capitulo FROM (gastodirecto_capitulo gc join meta m on gc.id_meta = m.id_meta) join capitulo c on gc.id_capitulo = c.id_capitulo group by gc.id_capitulo";
	$ISql = mysql_query($Sql);
	while($row = mysql_fetch_array($ISql))
	{
			
			$Meta_capitulo = new Meta_capitulo($row[0],$row[1],$row[2]);
			$Meta_capitulo->setgasto_directo($row[3]);
			$Meta_capitulo->modificar();
			
	}*/
/*echo '<pre>';
print_r($GastoDirecto_Capitulo);
echo '</pre>';
die();*/
	
}
?>
</form>
</body>
</html>