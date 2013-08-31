<? session_start(); ?>
<? include("conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link type="text/css" rel="stylesheet" href="stylesheets/TableGear.css" />
</head>
<script language="javascript">
function valida(campo2,campo)
{
 with(document.form1)
 {

 	var b,a,dat;
	dat=0;
	var valo = document.getElementById('txt'+campo2+'_'+campo).value;
 	b=parseInt(valo);
	a=parseInt(tot.value);
	for(i=1;i<=hidc.value;i++)
	{
		if(document.getElementById('txt'+campo2+'_'+i).value=='')
			continue;
		dat+=parseInt(document.getElementById('txt'+campo2+'_'+i).value);
		alert(dat);
	}
	if(dat>hid.value)
	{
		alert("TE PASASTE DEL 100%");
		document.getElementById('txt'+campo2+'_'+campo).value=valor;
		return 0;
	}
	
 }
}

function cmb()
{
	with(document.form1)
	{
		
		document.form1.submit();
	}
}
</script>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="148%" border="1">
    <tr>
      <td height="33" colspan="11"><table width="100%" border="1">
        <tr>
          <td width="117" height="26">Seleccione la Meta</td>
          <td width="766"><select name="combo_meta" id="combo_meta" onchange="cmb();">
              <option value="0">Seleccionar</option>
<?
$Sql="SELECT id_meta FROM meta";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	while($row = mysql_fetch_array($ISql))
	{
?>
          <option value=" <?=$row[0]; ?>"><? echo $row[0]; ?></option>
 <? } ?>
            </select></td>
        </tr>
      </table></td>
<?PHP
if($_POST['combo_meta']!=0){

$clavesesion = $_POST['combo_meta'];

	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="SELECT clave, nombre FROM accion WHERE id_meta = $clavesesion";
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	$num=mysql_num_rows($ISql);
	
	$Sql1="SELECT mc.monto_total FROM meta_capitulo mc join capitulo c on mc.id_capitulo = c.id_capitulo  WHERE id_meta = $clavesesion";
	$ISql1 = mysql_query($Sql1);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	
?>
    </tr>
    <tr>
      <td width="52">Accion</td>
      <td width="156" colspan="2">Capitulo 1000</td>
      <td colspan="2">Capitulo 2000</td>
      <td colspan="2">Capitulo 3000</td>
      <td width="156" colspan="2">Capitulo 5000</td>
      <td colspan="2">Capitulo 7000</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td></td>
      <td width="156">Ingreso Propio</td>
      <td width="156">Gasto Directo</td>
      <td width="156">Ingreso Propio</td>
      <td width="156">Gasto Directo</td>
      <td>Ingreso Propio</td>
      <td>&nbsp;</td>
      <td width="156">Ingreso Propio</td>
      <td width="156">Gasto Directo</td>
    </tr>
<?PHP
	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
		$a=1;
		$con=1;
		while($row = mysql_fetch_array($ISql))
		{
		$con=1;
		if($a==0)
		{ ?>  
        <? $a=1;}else{?>
     <tr class="odd">
			<? $a=0;}?>      
      <td><? echo $row[1]; ?></td>
      <td><input type="text" name="txt1000_<?=$con;?>" id="txt1000_<?=$con;?>" onblur="valida(1000,<?=$con;?>);" /></td>
      <td></td>
      <td><input type="text" name="txt2000_<?=$con;?>" id="txt2000_<?=$con;?>" onblur="valida(2000,<?=$con;?>);" /></td>
      <td><label>
        <input type="text" name="textfield" id="textfield" />
      </label></td>
      <td><input type="text" name="txt3000_<?=$con;?>" id="txt3000_<?=$con;?>" onblur="valida(3000,<?=$con;?>);" /></td>
      <td><label>
        <input type="text" name="textfield2" id="textfield2" />
      </label></td>
      <td><input type="text" name="txt5000_<?=$con;?>" id="txt5000_<?=$con;?>" onblur="valida(5000,<?=$con;?>);" /></td>
      <td></td>
      <td><input type="text" name="txt7000_<?=$con;?>" id="txt7000_<?=$con;?>" onblur="valida(7000,<?=$con;?>);" /></td>
      <td><label>
        <input type="text" name="textfield3" id="textfield3" />
      </label></td>
    </tr>
    <? $con++;
		} 
       
	} 
 
?>
    <tr class="odd">
      <td>Total</td>
      <?
      while($row2 = mysql_fetch_array($ISql1))
		{?>
      <td><? echo $row2[0]; ?></td>
      <td>&nbsp;</td>
      <? }?>
    </tr>
    <tr>
      <td height="28" colspan="9">
      <input name="hid" type="hidden" id="hid" value="100"/>
      <input name="hidc" type="hidden" id="hidc" value="<?=$con-1;?>"/>
      <? echo $con; ?>
      <input name="tot" type="hidden" id="tot" value="0"/></td>
      <td colspan="2"><input type="submit" name="Imprimir" id="Imprimir" value="Imprimir" /></td>
    </tr>

<?
}
?>
  </table>
  

</form>
</body>
</html>