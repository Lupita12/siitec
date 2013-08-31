<?
session_start();
require_once("conexion.php"); 
require_once("cls_periodo.php"); 

$conexion_p= mysql_connect("148.208.193.14","angel","colima125") ;
	mysql_select_db("periodo",$conexion_p);


$no=$_GET['elimina'];
$res=new periodo($no);
$res->eliminar();
echo '<script lenguaje="javascript">open("periodos.php","_self");</script>';




?>