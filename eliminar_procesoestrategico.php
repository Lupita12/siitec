<?
 session_start();
require_once("conexion.php"); 
require_once("cls_procesoestrategico.php"); 


$id=$_GET['elimina'];
$res=new proceso_estrategico($id);
$res->eliminar();
echo '<script lenguaje="javascript">open("proceso_estrategico.php","_self");</script>';
?>