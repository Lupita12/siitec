<?
session_start();

require_once("conexion.php"); 
require_once("cls_gastodirecto_capitulo.php"); 
//aguas es idmateria
$id=$_GET['elimina'];
$res=new GastoDirecto_Capitulo($id);
$res->eliminarGastoDirecto_Capitulo();

echo '<script lenguaje="javascript">open("gastodirecto_capitulo.php","_self");</script>';
?>
