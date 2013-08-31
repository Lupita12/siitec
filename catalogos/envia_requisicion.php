<?

require_once("../conexion.php"); 
$no=$_GET['id'];

mysql_query("update requisicion set autorizado=1 where id_requisicion=".$no);
echo '<script lenguaje="javascript">open("crea_requisicion.php","_self");</script>';

?>