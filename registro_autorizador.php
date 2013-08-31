<?

session_start();

include ("conexion.php");
require_once("cls_autorizador.php");

$txt = $_POST['txt'];

$array = explode(",",$txt);
$contador = count($array) ;


for(i=0,i<=contador,i++)
{
	$orden = 1;
	$cadena = $array(i);
	
	$ajua = substr($cadena, 0, 2);  // 1,2
	
	
	
	/// Se crea el objeto autorizador y se emplea el metodo crear

	$autorizador = new autorizador();
	
	$autorizador->setid_encargado($ajua);
	$autorizador->setorden($orden);
	
	$autorizador->agregar();
	
	
}






?>