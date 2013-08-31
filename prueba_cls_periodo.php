<?
session_start();
require_once("conexion.php"); 
require_once("cls_periodo.php"); 



$res=new periodo(2010);
echo "<pre>";
print_r($res);
echo "</pre>"

?>
