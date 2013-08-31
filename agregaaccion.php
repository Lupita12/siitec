<?
 session_start();
require_once("conexion.php"); 
require_once("cls_accion.php"); 

$no=$_GET['ida'];
//$no='poliedro';
$res=new Accion();
$res->setclave($no);
$res->agregar();
header("location: accion.php");
?>