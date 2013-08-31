<? 
session_start();
require_once("conexion.php"); 
require_once("cls_procesoestrategico.php");

$id=$_GET['elimina'];
$res=new proceso_estrategico($id);

$id_procesoestrategico= $res->getid_procesoestrategico();

mysql_query("delete from procesoclave where id_procesoestrategico =" .$idprocesoestrategico );



$res->eliminar();
echo '<script lenguaje="javascript">open("proceso_estrategico.php","_self");</script>';
?>