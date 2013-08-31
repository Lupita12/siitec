<? session_start(); ?>
<? include("conexion.php"); ?>
<? include("cls_departamento.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<script language="javascript">
function enviar(campo)
{
	with(document.form1)
	{
		hid.value = campo;
		document.form1.submit();
		
	}
}
</script>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="581" border="0" align="center">
    <tr>
      <td width="110">Opcion<input name="hid" type="hidden" id="hid"/></td>
      <td width="103">Clave</td>
      <td width="354">Nombre</td>
    </tr>
<?PHP
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="SELECT clave,nombre FROM departamento WHERE poa = 1";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		$con=1;
		while($row = mysql_fetch_array($ISql))
		{?>
    <tr>
      <td><input type="checkbox" name="checkbox_<?=$con;?>" id="checkbox_<?=$con;?>" onclick="javascript:enviar(<?=$row[0]; ?>);" />Autorizar</td>
      <td><?=$row[0]; ?></td>
      <td><?=$row[1]; ?></td>
    </tr>
    <? 
		$con++;
		} 
	} 
?>
  </table>
<?
if(isset($_POST['hid']) && $_POST['hid']!='')
{


			$clave=$_POST["hid"];
			$poa=0;
			
			$Departamento = new Departamento($clave);
			$Departamento->setpoa($poa);
			$Departamento->modificarDepartamento();
		
		echo '<script lenguaje="javascript">open("poa_departamento.php","_self");</script>';
}
?>  
</form>
</body>
</html>