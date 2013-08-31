<?
session_start();

require_once("conexion.php"); 
require_once("cls_subcapitulo2.php"); 

$no=$_GET['elimina'];
$res=new Subcapitulo2($no);
$res->eliminar();
echo '<script lenguaje="javascript">open("TSubconcepto.php","_self");</script>';
?>
