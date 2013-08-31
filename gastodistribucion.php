<? session_start(); ?>
<? include("conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link type="text/css" rel="stylesheet" href="stylesheets/TableGear.css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?
$id_gasto_directo=$_GET['idd'];
?>
  <table width="100%" border="1" align="center">
    <tr>
      <td>Gasto directo</td>
      <td>Departamento</td>
      <td>Meta</td>
      <td>Accion</td>
      <td>Capitulo</td>
      <td>Partida</td>
      <td>Monto</td>
    </tr>
<?
	 
$Sql="SELECT 
g.nombre,d.nombre,m.nombre,a.nombre,c.nombre,p.nombre, gc.monto,m.clave,c.clave,p.clave 
FROM 
(((((gastodirecto_capitulo gc join gastodirecto g on gc.id_gasto_directo = g.id_gastodirecto) 
join departamento d on d.id_departamento =gc.id_departamento)
join meta m on m.id_meta = gc.id_meta)
join accion a on a.id_accion = gc.id_accion)
join capitulo c on c.id_capitulo = gc.id_capitulo)
join partida p on p.id_partida = gc.id_partida WHERE gc.id_gasto_directo = '$id_gasto_directo'";
$ISql = mysql_query($Sql);
$num=mysql_num_rows($ISql);
if($num>0)
{
	$a=1;
	while($row = mysql_fetch_array($ISql))
	{
		if($a==0)
		{ 
		?>  
            <? $a=1;}else{?>
            <tr class="odd">
			<? $a=0;}?>
      			<td><?=$row[0]; ?></td>
      			<td><?=$row[1]; ?></td>
      			<td><?=$row[7]; ?>:  <?=$row[2]; ?></td>
      			<td><?=$row[3]; ?></td>
      			<td><?=$row[8]; ?>:  <?=$row[4]; ?></td>
     			<td><?=$row[9]; ?>:  <?=$row[5]; ?></td>
      			<td><?="$".number_format($row[6], 2, '.', ','); ?></td>
    		</tr>
<?
   }
}
?>
  </table>
</form>
</body>
</html>