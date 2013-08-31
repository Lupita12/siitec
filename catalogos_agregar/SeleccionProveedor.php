<? require_once("../conexion.php");?>
<? include("../clases/cls_proveedor.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<script language="javascript">
function enviar(){
with(document.form1){

	
	document.form1.submit();

}

}
</script>
<body>
<form id="form1" name="form1" method="post" action="">
<?
$clavePro=$_GET['idd'];

?>
<input name="hide" type="hidden" value="<?=$clavePro;?>" />
  <p>&nbsp;  </p>
  <table width="552" border="1" align="center">
    <tr>
      <td colspan="5"><div align="center">Criterios Seleccion de Proveedor </div></td>
    </tr>
    <tr>
      <td width="71">1.-
     	
		
		<? 
			$hide=mysql_query("select distinct id_criterio from criterios_selpro order by id_criterio");
			
		 $a=1;
		while ($row = mysql_fetch_array($hide))
		{  
		?>
		  <input type="hidden" name="hid<?=$a;?>" value="<?=$row[0];?>" /></td>
      				
	  	<? 
		$a++;
		}?>
	  
	  
	  <td colspan="3"><label>
        <?
			$sql=mysql_query("select * from criterios_selpro where valor ='NO' ");
			$otmp=mysql_fetch_array($sql);
		?>
        <input name="radio1" type="radio" value="<?=$otmp[2]?>"  />
        No Cumple
      </label>
        <label></label></td>
      <td width="136"><?
			$sql1=mysql_query("select * from criterios_selpro where valor ='SI' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio1" type="radio" value="<?=$otmp1[2]?>" />
Si Cumple </td>
    </tr>
    <tr>
      <td>2.-</td>
      <td colspan="2">
        <?
			$sql=mysql_query("select * from criterios_selpro where valor ='5' ");
			$otmp=mysql_fetch_array($sql);
		?>
		<input name="radio2" type="radio" value="<?=$otmp[2]?>" />
        5%</td>
      <td width="111"><?
			$sql=mysql_query("select * from criterios_selpro where valor ='10' ");
			$otmp=mysql_fetch_array($sql);
		?>
        <input name="radio2" type="radio" value="<?=$otmp[2]?>" />
10%</td>
      <td><?
			$sql=mysql_query("select * from criterios_selpro where valor ='15 o mas' ");
			$otmp=mysql_fetch_array($sql);
		?>
        <input name="radio2" type="radio" value="<?=$otmp[2]?>" />
15% </td>
    </tr>
    <tr>
      <td>3.-</td>
      <td width="101">
        <?
			$sql1=mysql_query("select * from criterios_selpro where valor ='no ofrece' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
		
		<input name="radio3" type="radio" value="<?=$otmp1[2]?>" />
      No      </td>
      <td width="99"><?
			$sql1=mysql_query("select * from criterios_selpro where valor ='15 dias' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio3" type="radio" value="<?=$otmp1[2]?>" />
15 dias </td>
      <td><?
			$sql1=mysql_query("select * from criterios_selpro where valor ='30 dias' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio3" type="radio" value="<?=$otmp1[2]?>" />
30 dias</td>
      <td><?
			$sql1=mysql_query("select * from criterios_selpro where valor ='45 dias o mas' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio3" type="radio" value="<?=$otmp1[2]?>" />
45 dias o mas </td>
    </tr>
    <tr>
      <td>4.-</td>
      <td colspan="2">
        
		<?
			$sql1=mysql_query("select * from criterios_selpro where valor ='Vespertino' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
		<input name="radio4" type="radio" value="<?=$otmp1[2]?>" />
      Vespertino</td>
      <td><?
			$sql1=mysql_query("select * from criterios_selpro where valor ='Matutino' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio4" type="radio" value="<?=$otmp1[2]?>" />
Matutino</td>
      <td><?
			$sql1=mysql_query("select * from criterios_selpro where valor ='Mixto' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio4" type="radio" value="<?=$otmp1[2]?>" />
Mixto </td>
    </tr>
    <tr>
      <td>5.-</td>
      <td colspan="2">
        
		<?
			$sql1=mysql_query("select * from criterios_selpro where valor ='Telefono' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
		<input name="radio5" type="radio" value="<?=$otmp1[2]?>" />
        Telefono       </td>
      <td><?
			$sql1=mysql_query("select * from criterios_selpro where valor ='Fax' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio5" type="radio" value="<?=$otmp1[2]?>" />
Fax </td>
      <td><?
			$sql1=mysql_query("select * from criterios_selpro where valor ='Internet' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio5" type="radio" value="<?=$otmp1[2]?>" />
Internet </td>
    </tr>
    <tr>
      <td>6.-</td>
      <td colspan="3">
	  	
		<?
			$sql1=mysql_query("select * from criterios_selpro where valor ='No cuenta' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
		
        <input name="radio6" type="radio" value="<?=$otmp1[2]?>" />
      No cuenta</td>
      <td><?
			$sql1=mysql_query("select * from criterios_selpro where valor ='Si cuenta' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio6" type="radio" value="<?=$otmp1[2]?>" />
Si cuenta </td>
    </tr>
    <tr>
      <td>7.-</td>
      <td colspan="3">
        <?
			$sql1=mysql_query("select * from criterios_selpro where valor ='No tiene' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
		
		<input name="radio7" type="radio" value="<?=$otmp1[2]?>" />
      No tiene</td>
      <td><?
			$sql1=mysql_query("select * from criterios_selpro where valor ='Si tiene' ");
			$otmp1=mysql_fetch_array($sql1);
		?>
        <input name="radio7" type="radio" value="<?=$otmp1[2]?>" />
Si tiene </td>
    </tr>
    <tr>
      <td colspan="5" align="center"><input name="Guardar"  type="reset" id="Guardar" value="Guardar" onclick="javascript:enviar();" /></td>
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
	$sum=$var1+$var2+$var3+$var4+$var5+$var6+$var7;
	$clave=$_POST['hide'];
	
	if ($sum >=70)
	{
		$estatus = 1;
		
		$obj=new Proveedor($clave);
		$obj->setestatus($estatus);
		$obj->Modifica();
		
		for ($i=1; $i<=7; $i++)
		{
			$hiden=$_POST["hid".$i];
			$var1=$_POST["radio".$i];
		
			$sql =mysql_query("insert into califica_selpro (clave, criterio, calificacion) values (".$clave.", ".$hiden.", ".$var1.") ");
		}
		echo '<script lenguaje="javascript">alert("Provedor Seleccionado con '.$sum .' puntos");</script>';
	}
	else 
		{
			echo '<script lenguaje="javascript">alert("No tienes los puntos suficientes  ");</script>';
		}
	
	//echo $sum;

	//echo $var2;


}

?>


</body>
</html>
