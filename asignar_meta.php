<? session_start();?>
<? include("conexion.php"); ?>
<? include("cls_meta_departamento.php"); ?>
<? error_reporting(E_ERROR); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<script language="javascript">
function agregar(agreg)
{
	with(document.form1){
	XXX.value=agreg;

	}
	document.form1.submit();

}
function eliminar(elim)
{
	with(document.form1){
	YYY.value=elim;

	}
	document.form1.submit();
}
</script>
<body>
<form id="form1" name="form1" method="post" action="">
<?
$clave_dep=$_GET['idd'];

?>
  <table width="786" border="0" align="center">
    <tr>
      <td colspan="4" align="center">ASIGNAR METAS<input name="XXX" type="hidden" id="XXX"/><input name="YYY" type="hidden" id="YYY"/><input name="hid" type="hidden" id="hid" value="<?=$clave_dep;?>"/></td>
    </tr>
    <tr>
      <td colspan="4" align="center">ASIGNADAS</td>
    </tr>
    <tr>
      <td width="276">Departamento</td>
      <td width="119">Clave Meta</td>
      <td width="327">Nombre</td>
      <td width="46">Quitar</td>
    </tr>
<?PHP


	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="SELECT md.id_departamento, md.id_meta, m.nombre, m.clave, d.nombre FROM (meta m join meta_departamento md on m.id_meta = md.id_meta) join departamento d on md.id_departamento = d.id_departamento WHERE md.id_departamento = $clave_dep";
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	$num=mysql_num_rows($ISql);

	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
		while($row = mysql_fetch_array($ISql))
		{?>
     <tr>
      		<td><? echo $row[4]; ?></td>
      		<td><? echo $row[3]; ?></td>
      		<td><? echo $row[2]; ?></td>
     		<td width="46"><img src="images/delete.gif" width="16" height="16" alt="Eliminar" border="0" onclick="eliminar('<?=$row[1];?>');"  /></td>
    	</tr>     
<? 
		} 
	} 
?>
    <tr>
      <td colspan="4" align="center">NO ASIGNADAS</td>
    </tr>
    <tr>
      <td>Clave Meta</td>
      <td colspan="2">Nombre</td>
      <td>Asignar</td>
    </tr>
<?PHP
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="SELECT id_meta,nombre,clave FROM meta ";
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	$num=mysql_num_rows($ISql);

	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO

		while($row = mysql_fetch_array($ISql))
		{?>
        <tr>    
      		<td><? echo $row[2]; ?></td>
      		<td colspan="2"><? echo $row[1]; ?></td>
            <td><img src="images/add.png" width="18" height="18" alt="Agregar" border="0" onclick="agregar('<?=$row[0];?>');"  /></td>
    	</tr>
    <? 
		} 
	} 
?>
  </table>
<?
if(isset($_POST['XXX']) && $_POST['XXX']!='')
{

		$id_meta=$_POST['XXX'];
		$id_departamento=$_POST['hid'];

		$Meta_departamento = new Meta_departamento($clave,$id_departamento);

		$Meta_departamento->setid_departamento($id_departamento);
		$Meta_departamento->setid_meta($id_meta);

		$Meta_departamento->agregar();



echo '<script lenguaje="javascript">open("asignar_meta.php?idd='.$id_departamento.'","_self");</script>';


}
if(isset($_POST['YYY']) && $_POST['YYY']!='')
{
		$id_meta=$_POST['YYY'];
		$id_departamento=$_POST['hid'];

		$Meta_departamento = new Meta_departamento($clave,$id_departamento);
		
		$Meta_departamento->setid_departamento($id_departamento);
		$Meta_departamento->setid_meta($id_meta);
		
		$Meta_departamento->eliminar();

echo '<script lenguaje="javascript">open("asignar_meta.php?idd='.$id_departamento.'","_self");</script>';

}	
?>
</form>
</body>
</html>