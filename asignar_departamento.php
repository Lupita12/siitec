<? session_start(); ?>
<? include("conexion.php"); ?>
<? include("cls_departamento.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ASIGNAR DEPARTAMENTO</title>
</head>
<script language="javascript">
function eliminar(elim)
{
//RECIBE EL VALOR CLAVE QUE SE LO ASIGNA A UN HIDDEN LLAMADO YYY PARA PODERLO MODIFICAR	
	with(document.form1){
	YYY.value=elim;
	}
	document.form1.submit();
}
function agregar(agreg)
{
	with(document.form1){
	XXX.value=agreg;
	}
	document.form1.submit();

}
</script>

<body>
<form id="form1" name="form1" method="post" action="">
<?
//RECIBE EL ID_ALTADIRECCION LA TABLA ALTADIRECCION, ESTE DATO LO MANDA LA PAG. ALTADIRECCION.PHP
$id_altadireccion=$_GET['idd'];

?>
  <table width="529" border="0" align="center">
    <tr>
      <td colspan="3" align="center">ASIGNAR DEPARTAMENTOS<input name="YYY" type="hidden" id="YYY"/><input name="XXX" type="hidden" id="XXX"/><input name="hid" type="hidden" id="hid" value="<?=$id_altadireccion;?>"/></td>
    </tr>
    <tr>
      <td colspan="3" align="center">ASIGANDOS</td>
    </tr>
    <tr>
      <td width="68">Clave</td>
      <td width="376">Nombre</td>
      <td width="63">Quitar</td>
    </tr>
<?PHP
//BUSCA LOS DATOS CLAVE, NOMBRE E ID_ALTADIRECCION,  PARA MOSTRAR EN PANTALLA LA CLAVE Y EL NOMBRE. LA CLAVE ES PARA SABER QUE DATO VOY A MODIFICAR
	$Sql="SELECT clave, nombre  FROM departamento WHERE id_altadireccion = $id_altadireccion";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);

	if($num>0)
	{
		while($row = mysql_fetch_array($ISql))
		{?>
        <tr>
      		<td><? echo $row[0]; ?></td>
      		<td><? echo $row[1]; ?></td>
     		<td><img src="images/delete.gif" width="16" height="16" alt="Eliminar" border="0" onclick="eliminar('<?=$row[0];?>');"  /></td>
    	</tr>     
<? 
		} 
	} 
?>
    <tr>
      <td colspan="3" align="center">NO ASIGNADOS</td>
    </tr>
    <tr>
      <td>Clave</td>
      <td>Nombre</td>
      <td>Asignar</td>
    </tr>
<?PHP
//BUSCA LOS DATOS CLAVE Y NOMBRE,  PARA MOSTRAR EN PANTALLA LA CLAVE Y EL NOMBRE. LA CLAVE ES PARA SABER QUE DATO VAMOS A MODIFICAR
	$Sql="SELECT clave, nombre  FROM departamento WHERE id_altadireccion = 0";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);

	if($num>0)
	{
		while($row = mysql_fetch_array($ISql))
		{?>
        <tr>    
      		<td><? echo $row[0]; ?></td>
      		<td><? echo $row[1]; ?></td>
     		<td><img src="images/add.png" width="18" height="18" alt="Agregar" border="0" onclick="agregar('<?=$row[0];?>');"  /></td>
    	</tr>
    <? 
		} 
	} 
?>
</table>
<?
if(isset($_POST['YYY']) && $_POST['YYY']!='')
{

//RECIBE LA CLAVE DE DEPARTAMENTO PARA PODER BUSCAR Y MODIFCARLA ESE DATO DE LA TABLA DEPARTAMENTO.
//RECIBE HID QUE ES EL ID_ALTADIRECCION DE ALTADIRECCION QUE RECIBIO DE LA PAG. ALTADIRECCION.PHP QUE SE OCUPA PARA ACTUALIZAR LA PAGINA CON EL MISMO ID_ALTADIRECCION QUE LLEGO.
//EL ID_ALTADIRECCION ESTA EN CERO PORQUE ES LO QUE SE LE ASIGNA AL CAMPO ID_ALTADIRECCION PARA NO RELACIONARSE CON NADIE 	
		$clave=$_POST['YYY'];
		$id_altadireccion=0;
		$hid=$_POST['hid'];
		
		$Departamento = new Departamento($clave);
		$Departamento->setid_altadireccion($id_altadireccion);
		$Departamento->modificarDepartamento();


echo '<script lenguaje="javascript">open("asignar_departamento.php?idd='.$hid.'","_self");</script>';
}
if(isset($_POST['XXX']) && $_POST['XXX']!='')
{
//RECIBE LA CLAVE DE DEPARTAMENTO PARA PODER BUSCAR Y MODIFCARLA ESE DATO DE LA TABLA DEPARTAMENTO. 
//RECIBE HID QUE ES EL ID_ALTADIRECCION DE ALTADIRECCION QUE RECIBIO DE LA PAG. ALTADIRECCION.PHP QUE SE OCUPA PARA ACTUALIZAR LA PAGINA Y PARA RELACIONAL LA TABLA ALTADIRECCION Y DEPARTAMENTO 
		$clave=$_POST['XXX'];
		$id_altadireccion=$_POST['hid'];
		$Departamento = new Departamento($clave);
		$Departamento->setid_altadireccion($id_altadireccion);
		$Departamento->modificarDepartamento();

echo '<script lenguaje="javascript">open("asignar_departamento.php?idd='.$id_altadireccion.'","_self");</script>';


}
	
?>
</form>
</body>
</html>