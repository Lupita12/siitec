
<?

require_once("conexion.php"); 
require_once("cls_meta.php"); 

//echo date("Y");

$res=new Meta('01.1.01');
echo "<pre>";
print_r($res);
echo "</pre>"

?>
