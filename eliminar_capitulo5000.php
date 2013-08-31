<?

session_start();

require_once("conexion.php"); 
require_once("cls_capitulo5000.php"); 

$no=$_GET['elimina'];
$res=new capitulo5000($no);
$res->eliminar();
 echo '<script lenguaje="javascript">open("cincomil2.php","_self");</script>';



?>


