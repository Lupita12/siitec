<? require_once("../conexion.php");?>
<? include("../clases/cls_proveedor.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>

<script language="javascript">
function enviar(){
with(document.form1){

	document.form1.submit();

}

}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
<?
$clavePro=$_GET['idd'];

?>
<input name="hide" type="hidden" value="<?=$clavePro;?>" />
  <p>&nbsp;  </p>
  <table width="586" border="1" align="center">
    <tr>
      <td colspan="4"><div align="center">Criterios Evaluacion de Proveedor </div></td>
    </tr>
    <tr>
      <td width="71">1.-
     	
		
		<? 
			$hide=mysql_query("select distinct id_criterio from criterios_evalpro order by id_criterio");
			
		 $a=1;
		while ($row = mysql_fetch_array($hide))
		{  
		?>
		  <input type="hidden" name="hid<?=$a;?>" value="<?=$row[0];?>" /></td>
      				
	  	<? 
		$a++;
		}?>
	  
	  
	  <td width="177"><label>
        <?
			$sql=mysql_query("select * from criterios_evalpro where valor ='mala' ");
			$otmp=mysql_fetch_array($sql);
		?>
        <input name="radio1" type="radio" value="<?=$otmp[2]?>"  />
        Mala
	  </label>
        <label></label></td>
      <td width="134"><?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='buena' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio1" type="radio" value="<?=$otmp1[2]?>" />
        Buena</td>
	
		<td width="142"><?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='excelente' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio1" type="radio" value="<?=$otmp1[2]?>" />
        Excelente</td>
    </tr>
    <tr>
      <td>2.-</td>
      <td>
        <?
			$sql=mysql_query("select * from criterios_evalpro where valor ='mayor' ");
			$otmp=mysql_fetch_array($sql);
		?>
		<input name="radio2" type="radio" value="<?=$otmp[2]?>" />
		Mayor</td>
      <td width="134"><?
			$sql=mysql_query("select * from criterios_evalpro where valor ='igual' ");
			$otmp=mysql_fetch_array($sql);
		?>
        <input name="radio2" type="radio" value="<?=$otmp[2]?>" />
        Igual</td>
      <td><?
			$sql=mysql_query("select * from criterios_evalpro where valor ='menor' ");
			$otmp=mysql_fetch_array($sql);
		?>
        <input name="radio2" type="radio" value="<?=$otmp[2]?>" />
        Menor</td>
    </tr>
    <tr>
      <td>3.-</td>
      <td>
        <?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='5 dias' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
		
		<input name="radio3" type="radio" value="<?=$otmp1[2]?>" />
		Mas de 5 dias </td>
      <td><?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='2 a 5 dias' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio3" type="radio" value="<?=$otmp1[2]?>" />
        2 a 5 dias </td>
      <td><?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='mismo dia' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio3" type="radio" value="<?=$otmp1[2]?>" />
        El mismo dia </td>
    </tr>
    <tr>
      <td>4.-</td>
      <td colspan="2">
        
		<?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='no ofrece' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
		<input name="radio4" type="radio" value="<?=$otmp1[2]?>" />
		No ofrece </td>
      <td><?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='si ofrece' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio4" type="radio" value="<?=$otmp1[2]?>" />
        Si ofrece </td>
    </tr>
    <tr>
      <td>5.-</td>
      <td colspan="2">
        
		<?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='no proporciona' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
		<input name="radio5" type="radio" value="<?=$otmp1[2]?>" />
        No Proporciona </td>
      <td><?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='si proporciona' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio5" type="radio" value="<?=$otmp1[2]?>" />
        Si Proporciona </td>
    </tr>
    <tr>
      <td>6.-</td>
      <td >
	  	
		<?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='malaaa' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
		
        <input name="radio6" type="radio" value="<?=$otmp1[2]?>" />
        Mala</td>
      <td><?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='buenaa' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio6" type="radio" value="<?=$otmp1[2]?>" />
        Buena</td>
		
		
	  <td><?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='excelentee' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio6" type="radio" value="<?=$otmp1[2]?>" />
        Excelente</td>
    </tr>
    <tr>
      <td>7.-</td>
      <td >
        <?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='no tiene' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
		
		<input name="radio7" type="radio" value="<?=$otmp1[2]?>" />
      No tiene</td>
      <td><?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='insuficiente' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio7" type="radio" value="<?=$otmp1[2]?>" />
        Insuficiente </td>

		<td><?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='suficiente' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio7" type="radio" value="<?=$otmp1[2]?>" />
        Suficiente</td>
    </tr>
    <tr>
      <td>8.-</td>
      <td ><?
			$sql1=mysql_query("select * from criterios_evalpro where valor = 'no' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio8" type="radio" value="<?=$otmp1[2]?>" />
No </td>
      <td><?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='esporadicamente' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio8" type="radio" value="<?=$otmp1[2]?>" />
      Esporadicamente</td>
      <td><?
			$sql1=mysql_query("select * from criterios_evalpro where valor ='siempre' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio8" type="radio" value="<?=$otmp1[2]?>" />
      Siempre</td>
    </tr>
    <tr>
      <td colspan="4" align="center"><input name="Guardar"  type="reset" id="Guardar" value="Guardar" onclick="javascript:enviar();" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>

<?
if ($_POST)
{
	$var1=$_POST['radio1'];
	$var2=$_POST['radio2'];
	$var3=$_POST['radio3'];
	$var4=$_POST['radio4'];
	$var5=$_POST['radio5'];
	$var6=$_POST['radio6'];
	$var7=$_POST['radio7'];
	$var8=$_POST['radio8'];
	$sum=$var1+$var2+$var3+$var4+$var5+$var6+$var7+$var8;
	$clave=$_POST['hide'];
	
	if ($sum >=70)
	{
		$estatus = 2;
		
		$obj=new Proveedor($clave);
		$obj->setestatus($estatus);
		$obj->Modifica();
		
		for ($i=1; $i<=8; $i++)
		{
			$hiden=$_POST["hid".$i];
			$var1=$_POST["radio".$i];
		
			$sql =mysql_query("insert into califica_evalpro (clave, criterio, calificacion) values (".$clave.", ".$hiden.", ".$var1.") ");
		}
		echo '<script lenguaje="javascript">alert("Provedor Seleccionado con '.$sum .' puntos");</script>';
	}
	else 
		{
			echo '<script lenguaje="javascript">alert("No tienes los puntos suficientes");</script>';
		}
	
	//echo $sum;

	//echo $var2;



}

?>


</body>
</html>
