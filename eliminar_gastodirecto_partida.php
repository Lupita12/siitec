<?
session_start();
require_once("conexion.php"); 
require_once("cls_gastodirecto_partida.php"); 
//aguas es idmateria
$id=$_GET['elimina'];
$res=new GastoDirecto_Partida($id);
$res->eliminarGastoDirecto_Partida();

echo '<script lenguaje="javascript">open("gastodirecto_partida.php","_self");</script>';
?>