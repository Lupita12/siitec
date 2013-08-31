<? session_start(); ?>
<? require_once("conexion.php"); ?>
<? require_once("cls_meta.php"); ?>
<? require_once("cls_accion.php"); ?>
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
$acc=$_GET['idacc'];
$oj=new Meta($acc);
list($p_estra, $p_clave, $y_meta) = split('[.]', $acc);
$clvcomp=$p_estra.".".$p_clave;
$jakuna=mysql_query("SELECT id_procesoestrategico FROM procesoestrategico where clave='".$p_estra."'");	
$jos = mysql_fetch_array($jakuna);
?>
  </p>
  <p>&nbsp;</p>
  <table width="500" border="0" align="center">
    <tr>
      <td width="150">Clave Actual
        <input name="hid" type="hidden" id="hid" value="1" /></td>
      <td width="400"><input name="txtclave" type="text" id="txtclave" size="5" value="<?=$oj->getclave();?>" readonly="true"/> 
      <label onClick="muestra_dtos();" style="cursor:pointer">Cambiarla</label></td>
    </tr>
    <tr>
      <td colspan="2">
	 	<div id="d_2000" style="display:block">	  
		<table width="500"  border="0" cellpadding="0" cellspacing="0">
			<tr>
<td width="150">Proceso Estrategico: </td>
      <td width="400"><select name="cmb_estra" id="cmb_estra" onchange="javascript:FAjax('ajax_modificameta.php','cmb_clav',this.name+'='+this.value,'post')">
        <?
		$result=mysql_query("SELECT id_procesoestrategico, clave, nombre FROM procesoestrategico ");		
	  while($res = mysql_fetch_array($result)){
	  ?>
        <option value="<?=$res[0];?>" <? if($p_estra==$res[1]){ echo "selected";}?>><?=$res[2];?></option>
        <?
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td>Proceso Clave: </td>
      <td>
	  	<div id="cmb_clav">		  
	  <select name="cmb_clave" id="cmb_clave">
        <?
		$result=mysql_query("SELECT clave, nombre FROM procesoclave where id_procesoestrategico=".$jos[0]);
	  while($res = mysql_fetch_array($result)){
	  ?>	  
        <option value="<?=$res[0];?>" <? if($clvcomp==$res[0]){ echo "selected";}?>><?=$res[1];?></option>
		<? }?>
      </select>
	  </div></td>
    </tr>
    <tr>
      <td>Clave:</td>
      <td><input name="txtnewclv" type="text" id="txtnewclv" size="5" value="<?=$y_meta;?>"onkeypress="return decimales(event,this);"/></td>
			</tr>
	  </table>
	  </div>
<script language="javascript">document.getElementById('d_2000').style.display = "none";</script></td>
    </tr>
    <tr>
      <td width="100">Nombre:</td>
      <td><input name="txtnombre" type="text" id="txtnombre" value="<?=$oj->getnombre();?>" size="40"/></td>
    </tr>
    <tr>
      <td>Descripcion:</td>
      <td><textarea name="txtdescri" cols="40" rows="3" id="txtdescri"><?=$oj->getdescripcion();?></textarea></td>
    </tr>
    <tr>
      <td width="100">Clave Encargado:</td>
      <td><?  
		$resi=mysql_query("select id_departamento, nombre from departamento");
//$r=mysql_query("select nombre from departamento where id_departamento=".$oj->getclave_encargado());	
//$name=mysql_fetch_array($r);	
	  ?>	  
        <select name="cmb_encargado" id="cmb_encargado">
	  <?
	  	while($rex = mysql_fetch_array($resi)){
	  ?>
	  <option value="<?=$rex[0];?>" <? if($oj->getclave_encargado()==$rex[0]){ echo "selected";}?>><?=$rex[1];?></option>
	  <?
	  }
	  ?>	  	
        </select>      </td>
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
	$clven=$_POST['cmb_encargado'];
	$des=$_POST['txtdescri'];
	$estra=$_POST['cmb_estra'];
	$procla=$_POST['cmb_clave'];
	$newclv=$_POST['txtnewclv'];

//echo "estra:".$cla."<br>";
//echo "estra:".$estra."<br>";
//echo "clave:".$procla."<br>";
	$compuesta=$procla.".".$newclv;
	
	$obj=new Meta($cla);
	
	$obj->setdescripcion($des);
	$obj->setnombre($nom);
	$obj->setid_encargado($clven);		
	$obj->modificar();	
	
	$comprobar=mysql_query("SELECT id_meta, clave FROM meta where clave='".$compuesta."'");
	$aver=mysql_num_rows($comprobar);
	if($aver!=0)
	{
		echo '<script lenguaje="javascript">alert("Ya existe una Clave con ese id")</script>';
	}
	else
	{
		$cadena=mysql_query("select clave from accion where clave like '".$cla."%'");
		while($a_clv = mysql_fetch_array($cadena))
		{
			echo "<br>".$a_clv[0];

			list($p_estra, $p_clave, $c_meta, $c_accion) = split('[.]', $a_clv[0]);
			$componida=$compuesta.".".$c_accion;
			$obj_acci=new Accion($a_clv[0]);
			$obj_acci->setclave($componida);
			//echo "<pre>";
			//print_r($obj_acci);
			//echo "</pre>";	
			$obj_acci->modificar();
		}			
		$obj->setclave($compuesta);
		$obj->modificar();
	}
			echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';	
	/*
	echo "<pre>";
	print_r($obj);
	echo "</pre>";
	die();
	*/
	
}
?>  
</form>
</body>
</html>
