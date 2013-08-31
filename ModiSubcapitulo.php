<? session_start(); ?>
<? include("cls_capitulo.php"); ?>
<? require_once("cls_subcapitulo.php"); ?>
<? error_reporting(E_ERROR); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
		if(txtclave.value==""){
			alert("LA CLAVE NO PUEDE ESTAR EN BLANCO");txtclave.focus();return;
		}
		if(txtcapitulo.value==""){
			alert("EL CAPITULO NO PUEDE ESTAR EN BLANCO");txtcapitulo.focus();return;
		}
		if(txtnombre.value==""){
			alert("EL NOMBRE NO PUEDE ESTAR EN BLANCO");txtnombre.focus();return;
		}	
		
		document.form1.submit();

	}	
}
</script>
<body bgcolor="#CCCCCC">
<form id="form1" name="form1" method="post" action="">
<?
$idd=$_GET['idd'];
$Capi = new Subcapitulo($idd);
$subcapi = $Capi->getclave();

?>
  <table width="634" border="0" align="center">
    <tr>
      <td colspan="2" align="center">MODIFICAR CONCEPTO</td>
    </tr>
    <tr>
      <td width="281" height="71" align="right">Subcapitulo Seleccionado:</td>
      <td width="343"><input type="text" name="txtclave" readonly="" id="txtclave" maxlength="4" size="9" onkeypress="return decimales(event,this);" value="<?=$Capi->getclave(); ?>"/></td>
    </tr>
    <tr>
      <td align="right">Capitulo:</td>
      <td>
       <select id="cmb_capitulos" name="cmb_capitulo">
        
<?
	$sql="select id_capitulo,clave from capitulo";
	$isql= mysql_query($sql);
	$num=mysql_num_rows($isql);
	while ($row1=mysql_fetch_array($isql))
	{
?>
	<option value " <?=$row1[1];?>" <? if($Capi->getid_capitulo()==$row1[0]){ $capitulo=$row1[1]; echo "selected";}?>><? echo $row1[1];?> </option>
	<? } ?>
		</select>      </td>
    </tr>
    <tr>
      <td align="right">Subcapitulo:</td>
      <?
		$resta = $subcapi - $capitulo;
	 ?>
	  <td><select name="cmb_subca">
        <option value="100" <? if($resta==100) { echo "selected";}?> >100</option>
        <option value="200" <? if($resta==200) { echo "selected";}?> >200</option>
        <option value="300" <? if($resta==300) { echo "selected";}?> >300</option>
        <option value="400"<? if($resta==400) { echo "selected";}?>> 400</option>
        <option value="500" <? if($resta==500) { echo "selected";}?>> 500</option>
        <option value="600" <? if($resta==600) { echo "selected";}?>> 600</option>
        <option value="700" <? if($resta==700) { echo "selected";}?>> 700</option>
        <option value="800" <? if($resta==800) { echo "selected";}?>> 800</option>
        <option value="900" <? if($resta==900) { echo "selected";}?>> 900</option>
      </select>            </td>
    </tr>
    <tr>
      <td align="right">Nombre:</td>
      <td><textarea name="txtnombre" cols="40" id="txtnombre"><?=$Capi->getnombre(); ?>
        </textarea></td>
    </tr>
    <tr>
      <td height="51" colspan="2" align="center"><input type="submit" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /><input name="hid" type="hidden" id="hid" value="<?=$idd;?>"/></td>
    </tr>
  </table>
<?
if($_POST)
{
	if($_POST['cmb_subca']!="0" && $_POST['txtnombre']!='' && $_POST['cmb_capitulo']!="0")
	{
		//$cap=$_POST['$capitulo'];
		$clave=$_POST['cmb_subca'];
		$nombre=$_POST['txtnombre'];
	
		$idd=$_POST['hid'];
	
		//concatenar
		 $div = $capitulo / 1000;
		 $concatena = $div.$clave;
			 
		 //obtener el id_capitulo
		 $consulta2="Select id_capitulo from capitulo where clave =".$capitulo;
		 $resultado2=mysql_query($consulta2); 
		 $row16 =  mysql_fetch_array($resultado2);
		 
		 $Sql="SELECT * FROM subcapitulo WHERE clave= '$concatena'";
		 $ISql = mysql_query($Sql);
		 $num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		
		if($concatena==$idd)
		{
				if($_POST['cmb_subca']!='')
				{
					$Capitulo = new Subcapitulo($idd);

					$Capitulo->setclave($concatena);
					$Capitulo->setid_capitulo($row16[0]);
					$Capitulo->setnombre($nombre);

					$Capitulo->modificaSubcapitulos();
		
					echo '<script lenguaje="javascript">alert("SUBCAPITULO '.$concatena.' MODIFICADO");</script>';
					echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';
				}
				else
				{
				echo '<script lenguaje="javascript">alert("NO PUEDES PONER LA CLAVE 0");</script>';
				}
		}
		else
		{
		echo '<script lenguaje="javascript">alert("YA EXISTE LA CLAVE '.$concatena.'");</script>';
		}
	}
	else
	{
		if($_POST['cmb_subca']!='')
		{
		$Capitulo = new Subcapitulo($idd);

		$Capitulo->setclave($concatena);
		$Capitulo->setid_capitulo($row16[0]);
		$Capitulo->setnombre($nombre);

		$Capitulo->modificaSubcapitulos();
		
		echo '<script lenguaje="javascript">setTimeout("document.location.href="TSubcapitulo.php";",10000);</script>';	
		echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';

		}
		else
		{
			echo '<script lenguaje="javascript">alert("NO PUEDES PONER LA CLAVE 0")</script>';

		}
	}
		 
		 
		 
		 
		 

		$Capitulo = new Subcapitulo($idd);

		$Capitulo->setclave($concatena);
		$Capitulo->setid_capitulo($row16[0]);
		$Capitulo->setnombre($nombre);

		$Capitulo->modificaSubcapitulos();
		
echo '<script lenguaje="javascript">setTimeout("document.location.href="TSubcapitulo.php";",10000);</script>';
echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';


	}
}

?>

</form>
</body>
</html>