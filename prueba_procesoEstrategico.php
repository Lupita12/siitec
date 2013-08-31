
<?
require_once("conexion.php"); 
require_once("cls_procesoestrategico.php"); 


$res=new proceso_estrategico(03);

echo '<pre>'; 
print_r($res);
echo '</pre>';
?>
