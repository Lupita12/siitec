<? session_start();?>
<? require_once("conexion.php"); ?>
<? require_once("cls_accion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="modificaaccion.php">
  <p>
    <?
$acc=$_GET['idacc'];
$oj= new Accion($acc);
//$queri=mysql_query("select * from accion where clave='".$acc."'");
//$res = mysql_fetch_array($queri);
?>
  </p>
  <p>&nbsp;</p>
  <table width="80%" border="0" align="center">
    <tr>
      <td colspan="2">Clave actual de Accion </td>
      <td colspan="4"><input name="txtclave" type="text" id="txtclave" size="10" value="<?=$oj->getclave();?>" readonly="true"/></td>
    </tr>
    <tr>
      <td colspan="2">Meta por modificar </td>
      <td colspan="4"><select name="lst" id="lst">
        <?	
		$queri = mysql_query("select id_meta, clave, nombre from meta");
		while($res = mysql_fetch_array($queri)){	
		?>
        <option value="<?=$res[0];?>" <? if($oj->getid_meta()==$res[0]){ echo "selected";}?>><?=$res[1];?>:<?=$res[2];?></option>
        <? }?>		
      </select></td>
    </tr>
    <tr>
      <td colspan="2">Nombre</td>
      <td colspan="4"><textarea name="txtnombre" id="txtnombre"><?=$oj->getnombre();?>
      </textarea></td>
    </tr>
    <tr>
      <td colspan="2">Descripci&oacute;n</td>
      <td colspan="4"><textarea name="txtdescri" id="txtdescri"><?=$oj->getdescripcion();?>
      </textarea></td>
    </tr>
    <tr align="center">
      <td colspan="3"><input type="submit" name="Submit" value="Agregar" /></td>
    </tr>
  </table>
<?
if(isset($_POST['txtnombre']) && $_POST['txtnombre']!='')
{
	$cla=$_POST['txtclave'];
	$met=$_POST['lst'];
	$nom=$_POST['txtnombre'];
	$des=$_POST['txtdescri'];
	/*
	$ipenju=$_POST['txtipenju'];
	$ipjudi=$_POST['txtipjudi'];
	$gdenju=$_POST['txtgdenju'];
	$gdjudi=$_POST['txtgdjudi'];
	$vige=$_POST['txtvigencia'];
	$peri=$_POST['txtperiodo'];	
	*/

	$obj=new Accion($cla);
	
	if(!($met==$obj->getid_meta()))
	{
		echo "no son iguales";
		$q_meta=mysql_query("select clave from meta where id_meta=".$met);
		$a_meta = mysql_fetch_array($q_meta);
		$que=mysql_query("select MAX(right(a.clave,2)) FROM accion a join meta m on a.id_meta=m.id_meta where m.clave like '".$a_meta[0]."%'");
		$a_idmeta=mysql_query("select clave from meta where id_meta=".$met);	
		$idmeta = mysql_fetch_array($a_idmeta);
		$resu = mysql_fetch_array($que);
		$va=$resu[0]+1;
		if($va<10)
			$va="0".$va;
		$ya=$idmeta[0].".".$va;
		$obj->setclave($ya);
		$obj->setid_meta($met);	
	}
	/*
	else
		$obj->setclave($cla);
		
	$obj->setclave($cla);
	$obj->setmonto($mon);
	$obj->setingreso_propio_ene_jun($ipenju);
	$obj->setingreso_propio_jul_dic($ipjudi);
	$obj->setgasto_directo_ene_jun($gdenju);
	$obj->setgasto_directo_jul_dic($gdjudi);
	$obj->setvigencia($vige);
	$obj->setclave_meta($met);	
	$obj->setperiodo($peri);	
		
	*/
	$obj->setnombre($nom);
	$obj->setdescripcion($des);

	$obj->modificar();
	echo '<script lenguaje="javascript">open("accion1.php","_self");</script>';		
}
?>
</form>
</body>
</html>
