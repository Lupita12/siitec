<?
session_start();

require_once("conexion.php"); 
require_once("cls_departamento.php"); 
require_once("cls_meta_departamento.php"); 
//aguas es idmateria
$id=$_GET['elimina'];


	$Sql="SELECT d.clave,m.clave, md.periodo FROM (departamento d join meta_departamento md on d.id_departamento = md.id_departamento) join meta m on m.id_meta = md.id_meta WHERE d.clave = $id";
	$ISql = mysql_query($Sql);
	while($row = mysql_fetch_array($ISql))
	{

		$Meta_departamento = new Meta_departamento($row[0],$row[1],$row[2]);
		
		//$Meta_departamento->setid_departamento($id);
		
		$Meta_departamento->eliminar();
	
	}

$res=new Departamento($id);
$res->eliminarDepartamento();
echo '<script lenguaje="javascript">open("departamento.php","_self");</script>';
?>