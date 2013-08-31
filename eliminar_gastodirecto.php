<?
session_start();

require_once("conexion.php"); 
require_once("cls_gastodirecto.php"); 
require_once("cls_gastodirecto_capitulo.php"); 
require_once("cls_gastodirecto_partida.php"); 

//aguas es idmateria
$id=$_GET['elimina'];


	$Sql="SELECT gc.id_gastodirecto_capitulo FROM gastodirecto g join gastodirecto_capitulo gc on g.id_gastodirecto = gc.id_gasto_directo WHERE g.clave = $id";
	$ISql = mysql_query($Sql);
	while($row = mysql_fetch_array($ISql))
	{
		
		$GastoDirecto_Capitulo=new GastoDirecto_Capitulo($row[0]);
		$GastoDirecto_Capitulo->eliminarGastoDirecto_Capitulo();
	}
	
	$Sql="SELECT gp.id_gastodirecto_partida FROM gastodirecto g join gastodirecto_partida gp on g.id_gastodirecto = gp.id_gasto_directo WHERE g.clave = $id";
	$ISql = mysql_query($Sql);
	while($row = mysql_fetch_array($ISql))
	{
		$GastoDirecto_Partida=new GastoDirecto_Partida($row[0]);
		$GastoDirecto_Partida->eliminarGastoDirecto_Partida();
		
	}
	
	

$res=new GastoDirecto($id);
$res->eliminarGastoDirecto();
echo '<script lenguaje="javascript">open("gastodirecto.php","_self");</script>';
?>