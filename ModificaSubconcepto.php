<? session_start(); ?>
<? require_once("conexion.php"); ?>
<? require_once("cls_subcapitulo2.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script language="javascript" src="js/libreriaAjax.js"></script>
<title>Documento sin t&iacute;tulo</title>
</head>
<script language="javascript" src="js/libreriaAjax.js"></script>
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
		if(txtclaveSubca.value==""){
			alert("EL NOMBRE NO PUEDE ESTAR EN BLANCO");txtclaveSubca.focus();return;
		}	
		
		document.form1.submit();

	}	
}
</script>


<body>
<form id="form1" name="form1" method="post" action="">
<?
	
$idd=$_GET['idd'];
$par = new Subcapitulo2($idd);
$partida= $par->getclave();

?>


<table width="759" border="0" align="center">
	  <tr>
      <td colspan="2" align="center">MODIFICAR SUBCONCEPTO</td>
    </tr>
	  <tr>
	    <td width="363" height="27" align="right">Subconcepto:</td>
	    <td width="257"><input name="txtclave" type="text" readonly="" size="7" id="txtclave" maxlength="4" onkeypress="return decimales(event,this);" value="<?=$par->getclave(); ?>" align="middle" width="100"  /></td>
    </tr>
	  <tr>
	    <td height="27" align="right">Capitulo:</td>
	    <td>
		<?  
	  	$sSQL="select c.clave from capitulo c join subcapitulo s  on c.id_capitulo= s.id_capitulo join subcapitulo2 s2 on s2.id_subcapitulo = s.id_subcapitulo where s2.clave = ".$par->getclave()." ";
			
		$result1=mysql_query($sSQL);
		$result11=mysql_fetch_array($result1);

		
		$ca1="select clave,nombre from capitulo";
		$result=mysql_query($ca1);
		//echo $result;
	  ?>
	  
	    <select id="cmb_capitulos" name="cmb_capitulos" onchange="javascript:FAjax('aj_cmb_subcapitulos.php','cmb_subcapitulo',this.name+'='+this.value,'post')">
			<option value="0">Seleccione Capitulo</option>
			<? while($otmp=mysql_fetch_array($result)){?>
				<option value="<?=$otmp[0];?>" <? if($otmp[0]==$result11[0]){echo "selected";}?>><?=$otmp[0].' - '.trim($otmp[1]);?></option>
			<? }?>
        </select>		</td>
    </tr>
	  <tr>
	    <td height="27" align="right">Concepto:</td>
	    <td>
		<div id="cmb_subcapitulo" >
		<select name="cmb_subcapitulos"  >
	    <? 
	$sql="select s2.id_subcapitulo,s.clave from subcapitulo2 s2 
 			join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
 		  where s2.clave = ".$par->getclave()."";
	$isql= mysql_query($sql);
	$num=mysql_num_rows($isql);
	while ($row=mysql_fetch_array($isql))
	{
?>
	<option value="<?=$row[1];?>" <? if($par->getclave_subcapitulo()==$row[0]){echo "selected";}?>><? echo $row[1];?></option>
	<? } ?>
        </select> 
		</div>		</td>
    </tr>
	  
	  <tr>
	    <td height="27" align="right">Subconcepto:</td>
	    <?
		
		$partida = substr($partida , -1, 2);
		?>
		<td>
	      <input name="txtNoPartida" type="text" id="txtNoPartida" maxlength="2" size="2" value="<? echo $partida; ?>" />	    </td>
    </tr>
    
	<tr>
	  <td height="27" align="right">Nombre:</td>
	  <td ><textarea name="txtnombre" cols="40" id="txtnombre"  height="20"><?=$par->getnombre(); ?>
	  </textarea></td>
    </tr>
	
	<tr>
	  <td height="27" rowspan="2" align="right">&nbsp;</td>
      <td height="12" align="center"><label>
        <input name="Submit" type="submit" value="Modificar" />
      </label></td>
	</tr>
	<tr>
	  <td height="67" align="right">&nbsp;</td>
	  <td width="125" align="left"><input name="hid" type="hidden" id="hid" value="<?=$idd;?>"/></td>
    </tr>
</table>
	
	
<?
if($_POST)
{
if( $_POST['cmb_capitulos']!="0" && $_POST['cmb_subcapitulos']!="0" && $_POST['txtnombre']!='')

{
	
	$capitulo=$_POST['cmb_capitulos'];
	$subcapitulo=$_POST['cmb_subcapitulos'];
	$cla=$_POST['txtNoPartida'];
	$nom=$_POST['txtnombre'];
	//$des=$_POST['txtdescripcion'];
	$idd=$_POST['hid'];
	
	$capitulo  = substr($capitulo , -4, 1);  // ESTO ES LO QUE AGREGUE 
	$auxsubcapitulo = substr($subcapitulo , -3, 1);
	$estra = $capitulo . $auxsubcapitulo. $cla ;
		
		
		//Obtener el id de subcapitulo
		$consulta2="Select id_subcapitulo from subcapitulo where clave =".$subcapitulo;
		$resultado2=mysql_query($consulta2);
		$row16 =  mysql_fetch_array($resultado2);
	
	//$div2 = $subcapitulo + $cla ; // remplazar por $estra
	
	$Sql="SELECT * FROM subcapitulo2 WHERE clave= '$estra'";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		
		if($estra==$idd)
		{
				if($_POST['txtNoPartida']!=0)
				{
					$obj=new Subcapitulo2($idd);
	
					$obj->setclave($estra);
					$obj->setclave_subcapitulo($row16[0]);
					$obj->setnombre($nom);
				//$obj->setdescripcion($descripcion);
				//$obj->setperiodo($periodo);
				//$obj->setestado(0);
				
					$obj->modificar();
					echo '<script lenguaje="javascript">alert("subconcepto '.$estra.' modificado");</script>';
					echo '<script lenguaje="javascript">setTimeout("document.location.href="TSubconcepto.php";",10000);</script>';
					echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';
				}
				else
				{
				echo '<script lenguaje="javascript">alert("NO PUEDES PONER LA CLAVE 0");</script>';
				}
		}
		else
		{
		echo '<script lenguaje="javascript">alert("YA EXISTE EL SUBCONCEPTO '.$estra.'");</script>';
		}
	}
	else
	{
		if($_POST['txtNoPartida']!=0)
		{
			$obj=new Subcapitulo2($idd);
	
					$obj->setclave($estra);
					$obj->setclave_subcapitulo($row16[0]);
					$obj->setnombre($nom);
					$obj->modificar();
					
			echo '<script lenguaje="javascript">alert("subconcepto modificado");</script>';
			echo '<script lenguaje="javascript">setTimeout("document.location.href="TSubconcepto.php";",10000);</script>';
			echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';

		}
		else
		{
			echo '<script lenguaje="javascript">alert("NO PUEDES PONER LA CLAVE 0");</script>';

		}
	}
	
}
}
?>
</form>
</body>
</html>
