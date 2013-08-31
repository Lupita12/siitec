<?
session_start();

require_once("../conexion.php"); 
require_once("../cls_encargado.php"); 
//aguas es idmateria
$id=$_GET['elimina'];
$res=new encargado($id);
$res->eliminar();
echo '<script lenguaje="javascript">open("../catalogos/encargado.php","_self");</script>';
?>