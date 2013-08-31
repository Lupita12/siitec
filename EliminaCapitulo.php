<?
session_start();
require_once("conexion.php"); 
require_once("cls_capitulo.php"); 

$no=$_GET['elimina'];
$res=new Capitulo($no);
$res->eliminaCapitulos();
echo '<script lenguaje="javascript">open("TCapitulo.php","_self");</script>';
?>

