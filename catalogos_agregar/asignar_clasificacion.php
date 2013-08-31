<? session_start(); ?>
<? include("../conexion.php"); ?>
<? include("../clases/cls_articulo_clasificacion.php"); ?>
<? error_reporting(E_ERROR); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ASIGNAR CLASIFICACION</title>
</head>
<script language="javascript">
function agregar1(agreg)
{
	with(document.form1){
		agregar.value=0;
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
      <td colspan="3" align="center">ASIGNAR CLASIFICACION<input name="agregar" type="hidden" id="agregar"/><input name="eliminar" type="hidden" id="eliminar"/><input name="hid" type="hidden" id="hid" value="<?=$id_articulo;?>"/></td>
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
	$Sql="SELECT c.nombre, c.descripcion, c.imagen, c.id_clasificacion FROM	clasificacion c join articulo_clasificacion ac on c.id_clasificacion = ac.id_clasificacion WHERE ac.id_articulo = $id_articulo";
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
      		<td width="46"><div align="center"><img src="../imagenes/no.png" width="16" height="16" alt="Eliminar" border="0" onclick="eliminar1('<?=$row[3];?>');"  /></div></td>
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
	$ver="SELECT * FROM articulo_clasificacion WHERE id_articulo = $id_articulo";
	$ver1 = mysql_query($ver);
	$ver2=mysql_num_rows($ver1);
	if($ver2>0)
	{	
	$Sql="SELECT nombre, descripcion, imagen, id_clasificacion FROM clasificacion WHERE id_clasificacion not in (Select id_clasificacion from articulo_clasificacion where id_articulo = $id_articulo)";
	}
	else
	{
		$Sql="SELECT nombre, descripcion, imagen, id_clasificacion FROM clasificacion ";
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
      		<td><div align="center"><img src="../imagenes/si.png" width="18" height="18" alt="Agregar" border="0" onclick="agregar1(<?=$row[3];?>);"  /></div></td>
    	</tr>
    <? 
		} 
	} 
?>
  </table>
<?
if(isset($_POST['agregar']) && $_POST['agregar']!='')
{

		$id_clasificacion=$_POST['agregar'];
		$id_articulo=$_POST['hid'];

		$Articulo_Clasificacion = new Articulo_Clasificacion();

		$Articulo_Clasificacion->setid_clasificacion($id_clasificacion);
		$Articulo_Clasificacion->setid_articulo($id_articulo);

		$Articulo_Clasificacion->agregaArticuloClasificacion();



echo '<script lenguaje="javascript">open("asignar_clasificacion.php?idd='.$id_articulo.'","_self");</script>';


}
if(isset($_POST['eliminar']) && $_POST['eliminar']!='')
{
		$id_clasificacion=$_POST['eliminar'];
		$id_articulo=$_POST['hid'];

		$Articulo_Clasificacion = new Articulo_Clasificacion($id_articulo,$id_clasificacion);
		
		$Articulo_Clasificacion->setid_clasificacion($id_clasificacion);
		$Articulo_Clasificacion->setid_articulo($id_articulo);
		
		$Articulo_Clasificacion->eliminarArticuloClasificacion();

echo '<script lenguaje="javascript">open("asignar_clasificacion.php?idd='.$id_articulo.'","_self");</script>';

}	
?>
</form>
</body>
</html>