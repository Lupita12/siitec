<?
session_start();

require_once("conexion.php"); 
require_once("cls_meta.php"); 
//aguas es idmateria
$no=$_GET['idacc'];
$pe=$_GET['jua'];

$res=new Meta($no); 
$id_meta=$res->getid_meta();
mysql_query("delete from partida_departamento where id_meta = ".$id_meta);
mysql_query("delete from meta_capitulo where id_meta = ".$id_meta); 
mysql_query("delete from meta_departamento where id_meta = ".$id_meta); 
mysql_query("delete from procesoclave_meta where id_meta = ".$id_meta); 
mysql_query("delete from accion where id_meta = ".$id_meta); 

$res->eliminar();
echo '<script lenguaje="javascript">open("meta1.php","_self");</script>';

?>