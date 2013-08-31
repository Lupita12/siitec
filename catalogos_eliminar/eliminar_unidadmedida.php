<?
session_start();
require_once("../conexion.php"); 
require_once("../clases/cls_unidadmedida.php"); 

//aguas es idmateria
$id=$_GET['elimina'];

/*
	$Sql="SELECT d.clave FROM departamento d join altadireccion a on d.id_altadireccion = a.id_altadireccion WHERE a.clave = $id";
	$ISql = mysql_query($Sql);
	while($row = mysql_fetch_array($ISql))
	{
		$valor=0;
		$Departamento=new Departamento($row[0]);
		$Departamento->setid_altadireccion($valor);
		$Departamento->modificarDepartamento();

	}*/

$res=new UnidadMedida($id);
$res->eliminarUnidadMedida();

echo '<script lenguaje="javascript">open("../catalogos/unidadmedida.php","_self");</script>';
?>