<?
require_once("conexion.php"); 
require_once("cls_procesoclave_meta.php"); 

$res=new Procesoclave_Meta('03.1','03.1.39');

echo '<pre>'; 
print_r($res);
echo '</pre>';
?>