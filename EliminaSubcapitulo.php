<?
 session_start();

require_once("conexion.php"); 
require_once("cls_subcapitulo.php"); 

$no=$_GET['elimina'];
$res=new Subcapitulo($no);
$res->eliminaSubcapitulos();
echo '<script lenguaje="javascript">open("TSubcapitulo.php","_self");</script>';
?>

