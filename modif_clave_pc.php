<? session_start(); ?>
<? require_once("conexion.php"); ?>
<? include("cls_procesoclave.php"); ?>
<? include("cls_procesoestrategico.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script language="javascript" src="js/libreriaAjax.js"></script>
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
function muestra_dtos()
{
	with(document.form1)
	{

		if(hid.value == 1)
		{
			document.getElementById('d_2000').style.display = "block";
			hid.value=0;
			return;
		}
		if(hid.value == 0)
		{
			document.getElementById('d_2000').style.display = "none";
			hid.value=1;
			return;
		}					
	}
}
</script>


<body>
<form id="form1" name="form1" method="post" action="">
  <p>
    <?
$idd=$_GET['idd'];
$proceso_clave = new proceso_clave($idd);
list($p_estra, $p_clave) = split('[.]', $idd);

?>
  </p>
  <p>&nbsp;</p>
  <table width="500" border="0" align="center">
    <tr>
      <td width="150">Clave Actual
        <input name="hid" type="hidden" id="hid" value="1" /></td>
      <td width="400"><input name="txtclave" type="text" id="txtclave" onkeypress="return decimales(event,this);" value="<?=$proceso_clave->getclave(); ?>" readonly="readonly"/> 
      <label onClick="muestra_dtos();" style="cursor:pointer">Cambiarla</label></td>
    </tr>
    <tr>
      <td colspan="2">
	 	<div id="d_2000" style="display:block">	  
		<table width="500"  border="0" cellpadding="0" cellspacing="0">
			<tr>
<td width="150">Proceso Estrategico: </td>
      <td width="400">
    
    
    
    
    
    
    
    
    <select name="cmb_estra" id="cmb_estra" onchange="javascript:FAjax('ajax_modificameta.php','cmb_clav',this.name+'='+this.value,'post')">
        <?
		$result=mysql_query("SELECT id_procesoestrategico, clave, nombre FROM procesoestrategico ");		
	  while($res = mysql_fetch_array($result)){
	  ?>
        <option value="<?=$res[1];?>" <? if($p_estra==$res[1]){ echo "selected";}?>><?=$res[2];?></option>
        <?
	  }
	  ?>
      </select></td>
    </tr>
    
    <tr>
      <td>Clave:</td>
      <td><input name="txtnewclv" type="text" id="txtnewclv" size="5"  value="<?=$p_clave;?>" onkeypress="return decimales(event,this);"/></td>
			</tr>
	  </table>
	  </div>
<script language="javascript">document.getElementById('d_2000').style.display = "none";</script></td>
    </tr>
    <tr>
      <td width="100">Nombre:</td>
      <td><input name="txtnombre" type="text" id="txtnombre" size="70" value="<?=$proceso_clave->getnombre(); ?>" /></td>
    </tr>
    <tr>
      <td>Descripcion:</td>
      <td><textarea name="txtdescripcion" id="txtdescripcion" cols="45" rows="5" ><?=$proceso_clave->getdescripcion(); ?></textarea></td>
    </tr>
    <tr>
    	<td>Estructura Programatica</td>
        <td><input name="txtgf" type="text" id="txtgf" value="<?=$proceso_clave->getgf(); ?>" size="3" /> <input name="txtfn" type="text" id="txtfn" value="<?=$proceso_clave->getfn(); ?>" size="3" />  <input name="txtsf" type="text" id="txtsf" value="<?=$proceso_clave->getsf(); ?>" size="3" /> <input name="txtai" type="text" id="txtai" value="<?=$proceso_clave->getai(); ?>" size="3" /> <input name="txtpp" type="text" id="txtpp" value="<?=$proceso_clave->getpp(); ?>" size="3" />  <input name="txtcodigo" type="text" id="txtcodigo" value="<?=$proceso_clave->getcodigo(); ?>" size="3" /> </td>
    
    </tr>
    
  
    <tr align="center">
      <td colspan="2"><input type="submit" name="Submit" value="Modificar" /></td>
    </tr>
  </table>
  
<?
if(isset($_POST['txtclave']) && $_POST['txtclave']!='')
{
	$cla=$_POST['txtclave'];
	$nom=$_POST['txtnombre'];
	
	$des=$_POST['txtdescripcion'];
	
	
	$estra1=$_POST['cmb_estra'];
	
	$newclv=$_POST['txtnewclv'];

	$gf = $_POST['txtgf'];
	$fn = $_POST['txtfn'];
	$sf = $_POST['txtsf'];
	$ai = $_POST['txtai'];
	$pp = $_POST['txtpp'];
	$codigo= $_POST['txtcodigo'];
	
//echo "estra:".$cla."<br>";
//echo "estra:".$estra."<br>";
//echo "clave:".$procla."<br>";


						if ($estra1 < 10)
						{
								$estra1 = substr($estra1, -1);  // ESTO ES LO QUE AGREGUE 

								$estra = "0" . $estra1;
						}
				
						else
						{
						$estra = $estra1;
						
	
						}





	$compuesta=$estra.".".$newclv;
	
	$proceso_clave = new proceso_clave($cla);


$proceso_clave->setnombre($nom);
$proceso_clave->setdescripcion($des);
$proceso_clave->setgf($gf);
$proceso_clave->setfn($fn);
$proceso_clave->setsf($sf);
$proceso_clave->setai($ai);
$proceso_clave->setpp($pp);
$proceso_clave->setcodigo($codigo);



$proceso_clave->setclave($compuesta);		
		
		
		
		$proceso_clave->modificar();
	
	/*$comprobar=mysql_query("SELECT id_procesoclave, clave FROM procesoclave where clave='".$compuesta."'");
	$aver=mysql_num_rows($comprobar);
	if($aver!=0)
	{
		echo '<script lenguaje="javascript">alert("Ya existe una Clave con ese id")</script>';
		echo '<script lenguaje="javascript">open("modif_clave_pc.php","_self");</script>';			
	}
	else
	{
		
		$proceso_clave->setclave($compuesta);
		$proceso_clave->modificar();
		
	}*/
		
	
	
	
	

	
	
echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';
	
}
?>  
</form>
</body>
</html>
