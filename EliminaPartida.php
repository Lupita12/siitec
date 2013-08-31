<?
 session_start();
require_once("conexion.php"); 
require_once("cls_partida.php"); 

$no=$_GET['elimina'];

$res=new Partida($no);
$res->eliminaPartidas();

echo '<script lenguaje="javascript">open("TPartidas.php","_self");</script>';


?>
