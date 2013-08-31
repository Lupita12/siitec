<?php 

if(isset($_SESSION['bd'])) {


$conexion= mysql_connect("localhost","root","") ;
mysql_select_db($_SESSION['bd'],$conexion);



}
else
{
	
	// header('location:index.php?msg=ES%20NECESARIO%20SELECCIONAR%20UN%20PERIODO.');
	
	
	//$conexion= mysql_connect("localhost","root","root") ;
    //mysql_select_db($_SESSION['bd'],$conexion);

	
	
	}

?>