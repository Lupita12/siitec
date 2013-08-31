<? session_start();?>
<? include("../conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?
$idd=$_GET['idd'];
//$Departamento1 = new Departamento($idd);
?>
  <table width="694" border="0" align="center">
    <tr>
      <td width="284">Descripcion</td>
      <td width="163">Unidad de Medida</td>
      <td width="110">Costo</td>
    </tr>
<?PHP
	$Sql="SELECT d.descripcion, u.nombre, u.precio FROM descripcion d join unidadmedida u on d.id_descripcion = u.id_descripcion where d.id_articulo = $idd";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);	
	if($num>0)
	{
		$a=1;
		while($row = mysql_fetch_array($ISql))
		{
		if($a==0)
		{ 
			$a=1;
			}else{?>
            <tr class="odd">
			<? $a=0;}?>
      			<td><?=$row[0];?></td>
		      	<td><?=$row[1];?></td>
      			<td><?=$row[2];?></td>
<?
		} 
	} 
?>
  </table>
</form>
</body>
</html>