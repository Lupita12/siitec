<? session_start(); ?>
<? include("../conexion.php"); ?>
<? include("../clases/cls_articulo_marca.php"); ?>
<? error_reporting(E_ERROR); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ASIGNAR MARCA</title>
</head>
<script language="javascript">
function agregar1(agreg)
{
	with(document.form1){
	agregar.value=agreg;

	}
	document.form1.submit();

}
function eliminar1(elim)
{
	with(document.form1){
	eliminar.value=elim;

	}
	document.form1.submit();
}
</script>
<body>
<form id="form1" name="form1" method="post" action="">
<?
$id_articulo=$_GET['idd'];

?>
  <table width="786" border="0" align="center">
    <tr>
      <td colspan="3" align="center">ASIGNAR MARCA<input name="agregar" type="hidden" id="agregar"/><input name="eliminar" type="hidden" id="eliminar"/><input name="hid" type="hidden" id="hid" value="<?=$id_articulo;?>"/></td>
    </tr>
    <tr>
      <td colspan="3" align="center">ASIGNADAS</td>
    </tr>
    <tr>
      <td width="173">Nombre</td>
      <td width="494">Descripcion</td>
      <td width="46">Quitar</td>
    </tr>
<?PHP


	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="SELECT m.nombre, m.descripcion, m.id_marca FROM marca m join articulo_marca am on m.id_marca = am.id_marca WHERE am.id_articulo = $id_articulo";
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	$num=mysql_num_rows($ISql);

	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
		while($row = mysql_fetch_array($ISql))
		{?>
     <tr>
      		<td><? echo $row[0]; ?></td>
      		<td><? echo $row[1]; ?></td>
      		<td width="46"><img src="imagenes/delete.gif" width="16" height="16" alt="Eliminar" border="0" onclick="eliminar1('<?=$row[2];?>');"  /></td>
    	</tr>     
<? 
		} 
	} 
?>
    <tr>
      <td colspan="3" align="center">NO ASIGNADAS</td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td>Descripcion</td>
      <td>Asignar</td>
    </tr>
<?PHP
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$ver="SELECT * FROM articulo_marca WHERE id_articulo = $id_articulo";
	$ver1 = mysql_query($ver);
	$ver2=mysql_num_rows($ver1);
	if($ver2>0)
	{	
	$Sql="SELECT nombre, descripcion, id_marca FROM marca WHERE id_marca not in (Select id_marca from articulo_marca where id_articulo = $id_articulo)";
	}
	else
	{
		$Sql="SELECT nombre, descripcion, id_marca FROM marca";
	}
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	$num=mysql_num_rows($ISql);

	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO

		while($row = mysql_fetch_array($ISql))
		{?>
        <tr>    
      		<td><? echo $row[0]; ?></td>
      		<td><? echo $row[1]; ?></td>
      		<td><img src="imagenes/add.png" width="18" height="18" alt="Agregar" border="0" onclick="agregar1('<?=$row[2];?>');"  /></td>
    	</tr>
    <? 
		} 
	} 
?>
  </table>
<?
if(isset($_POST['agregar']) && $_POST['agregar']!='')
{

		$id_marca=$_POST['agregar'];
		$id_articulo=$_POST['hid'];

		$Articulo_Marca = new Articulo_Marca();

		$Articulo_Marca->setid_marca($id_marca);
		$Articulo_Marca->setid_articulo($id_articulo);

		$Articulo_Marca->agregaArticuloMarca();



echo '<script lenguaje="javascript">open("asignar_marca.php?idd='.$id_articulo.'","_self");</script>';


}
if(isset($_POST['eliminar']) && $_POST['eliminar']!='')
{
		$id_marca=$_POST['eliminar'];
		$id_articulo=$_POST['hid'];

		$Articulo_Marca = new Articulo_Marca($id_articulo,$id_marca);
		
		$Articulo_Marca->setid_marca($id_marca);
		$Articulo_Marca->setid_articulo($id_articulo);
		
		$Articulo_Marca->eliminarArticuloMarca();

echo '<script lenguaje="javascript">open("asignar_marca.php?idd='.$id_articulo.'","_self");</script>';

}	
?>
</form>
</body>
</html>