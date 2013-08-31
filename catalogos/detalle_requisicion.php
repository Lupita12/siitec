<? session_start(); ?>
<? include("../conexion.php"); ?>
<? include("../clases/cls_inbox.php"); ?>
<? include("../clases/cls_requisicionn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Detalle</title>
<style>
body {


background-color:#CCC;
background-position:top;
background-repeat:repeat-x;
}

</style>

</head>

<body>
<form id="form1" name="form1" method="post" action="">
 
<p>
  <?
$idd=$_GET['idd'];

$requisicion = new requisicion($idd);
?>


<div align="center">
  <table width="963" border="1">
    <tr>
      <td><div align="center">Folio </div></td>
      <td><div align="center">Fecha</div></td>
      <td><div align="center">Nombre del director</div></td>
      <td><div align="center">Tipo de Contemplacion</div></td>
      </tr>
    <tr>
      <td><div align="center">
        <input name="folio" type="text" id="folio"  value="<?=$requisicion->getfolio(); ?>" readonly="readonly"/>
      </div></td>
      <td><div align="center">
        <input name="fecha" type="text" id="fecha"  value="<?=$requisicion->getfecha(); ?>" readonly="readonly"/>
      </div></td>
      <td><div align="center">
        <textarea name="nombre" readonly="readonly" id="nombre"><?=$requisicion->getnombre_del_director(); ?>
        </textarea>
      </div></td>
      <td><div align="center">
        <textarea name="tipo" cols="60" readonly="readonly" id="tipo"><?=$requisicion->gettipo_de_contemplacion(); ?>
        </textarea>
      </div></td>
	  
	        
      </tr>
  </table>
  <input type="hidden" name="hid" id="hid" value="<?=$requisicion->getautorizado(); ?>" />
</div>
<p>
<p align="center">
  <label>
    <input type="submit" name="button" id="button" value="Autorizar" />
  </label>
<p>
<?

if(isset($_POST['folio']) && $_POST['folio']!='')
{
	
	$i = $_POST['hid'];
	
	
	if ($i == 1) 
	{
		$Sql=mysql_query("UPDATE requisicion SET autorizado= 2 WHERE id_requisicion=".$idd.""); 
  	 	
    
	} 
	elseif($i == 2) 
	{
	    $Sql=mysql_query("UPDATE requisicion SET autorizado= 3 WHERE id_requisicion=".$idd.""); 

	}
	elseif ($i == 3) 
	{
	  $Sql=mysql_query("UPDATE requisicion SET autorizado= 4 WHERE id_requisicion=".$idd.""); 

	}
	
echo '<script lenguaje="javascript">alert("La requisicion ha sido autorizada");</script>';
echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';
}
?>







</form>
</body>
</html>