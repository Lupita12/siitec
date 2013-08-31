<?
 session_start();
require_once("conexion.php"); 
require_once("cls_accion.php"); 
//aguas es idmateria
$no=$_GET['idacc'];
$res=new Accion($no);
$res->eliminar();
	echo '<script lenguaje="javascript">open("accion1.php","_self");</script>';	
?>

