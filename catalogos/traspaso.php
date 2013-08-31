<? 
session_start();
require_once("../conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?
$_SESSION["s_idrequisicion"]=$_GET['id'];
//$clvdepa=25/*$_POST['idepa']*/;
$cadena_sql = mysql_query("select id_departamento, nombre from departamento");
$boriu =mysql_fetch_array(mysql_query("select id_traspaso from requisicion where id_requisicion=".$_SESSION["s_idrequisicion"]));
?>
  <table width="500" border="1" align="center">
    <tr>
      <td>Seleccione el departamento para hacer el traspaso:</td>
      <td><select name="cmb_depa" id="cmb_depa">
 <?
	while($row = mysql_fetch_array($cadena_sql)){
		  ?>
          	  <option value="<?=$row[0];?>" <? if($row[0]==$boriu[0]){echo 'selected="selected"';}?>><?=htmlentities($row[1]);?></option><? }?>     
      </select></td>
    </tr>
    <tr>
      <td><input type="button" name="button" id="button" value="Aceptar" onclick="submit();"/></td>
      <td>&nbsp;</td>
    </tr>
  </table>
<?
if(isset($_POST['cmb_depa']) && $_POST['cmb_depa']!=0)
{
	$cla=$_POST['cmb_depa'];
	
	mysql_query("update requisicion set id_traspaso=$cla where id_requisicion=".$_SESSION["s_idrequisicion"]);

	echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';
}?>  
</form>
</body>
</html>