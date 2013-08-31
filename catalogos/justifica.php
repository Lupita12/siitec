<? 
session_start();
require_once("../conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html>  
<head>
<!---<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />  --->  
<title>Asignar jusstificacion</title>  
<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
</head>
<body> 

<form id="justi" name="justi" method="post" action="" onsubmit="valida_justificacion(); return false">
<?

//$cadena_sql = mysql_query("select justificacion from requisicion where id_requisicion=".$idrequi);
//$a_jus=mysql_fetch_array($cadena_sql);
?>
<p>&nbsp;</p>
<table width="500" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  <? 
  $queri = mysql_query("select nombre, a.id_accion, r.id_accion from accion a left join requisicion_accion r on a.id_accion=r.id_accion where id_meta=".$_SESSION["idmetamo"]);
  $a=1;
		while($res = mysql_fetch_array($queri)){
 ?>    
    <tr>
      <td>
      <input type="checkbox" name="radio<?=$a;?>" id="radio<?=$a;?>" value="<?=$res[1];?>" <? if($res[2]!=NULL){ echo 'checked="checked"';}?>/></td>
      <td colspan="2"><?=$res[0];?></td>
    </tr>
<? $a++;}?>     
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="hidden" name="opcion" value=2>
      <input type="hidden" name="hid" id="hid" value="<?=--$a;?>"/>        <input type="submit" name="button" id="button" value="Guardar" /></td>
      <td><input type="submit" name="button2" id="button2" value="Cancelar" onClick="Cancelar()"/></td>
    </tr>
  </table>


</p>
</form>


</body>
</html>