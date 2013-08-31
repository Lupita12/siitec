<?
require_once("conexion.php"); 
require_once("cls_procesoclave.php"); 

$res=new proceso_clave('01.3');

echo '<pre>'; 
print_r($res);
echo '</pre>';
?>
