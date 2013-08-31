<?
session_start();
require_once("conexion.php"); 
require_once("cls_procesoclave.php"); 


$no=$_GET['elimina'];
$res=new proceso_clave($no);
$res->eliminar();
echo '<script lenguaje="javascript">open("proceso_clave.php","_self");</script>';




?>