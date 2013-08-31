<?
session_start();
require_once("conexion.php"); 
require_once("cls_meta.php"); 
//aguas es idmateria
$no=$_GET['idacc'];
$res=new Meta($no);
$res->eliminar();
echo '<script lenguaje="javascript">open("meta1.php","_self");</script>';	
?>
