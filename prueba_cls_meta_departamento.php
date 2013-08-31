<?

require_once("conexion.php"); 
require_once("cls_meta_departamento.php"); 

//echo date("Y");

$res=new Meta_departamento(5,'03.2.27');
echo "<pre>";
print_r($res);
echo "</pre>"

?>