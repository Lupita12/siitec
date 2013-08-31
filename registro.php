<?php
 session_start();
 require_once ("cls_capitulo5000.php");
 include ("conexion.php");
 

if(isset($_POST['txt']) && $_POST['txt']!='')
{

//variables POST

				$h = $_POST['monto'];
                $m = $_POST['meta'];
				$p = $_POST['partida'];
				$combo = $_POST['combo'];
				$nombre = $_POST['txt'];
				
				$denominacion = $_POST['txt2'];
				$cantidad = $_POST['txt3'];
				$costo_unitario = $_POST['txt4'];
				$costo_total = $_POST['txt5'];
				$justificacion = $_POST['txt6'];
				
				


//creamos el objeto $objempleados
//y usamos su método crear


$capitulo5000 = new capitulo5000();
				
				
				$capitulo5000->setclave_meta($m);
				$capitulo5000->setclave_partida($p);
				$capitulo5000->setclave_departamento($combo);
				$capitulo5000->setnombre_del_bien($nombre);
				
				$capitulo5000->setdenominacion_del_bien($denominacion);
				$capitulo5000->setcantidad($cantidad);
				$capitulo5000->setcosto_unitario($costo_unitario);
				$capitulo5000->setcosto_total($costo_total);
				$capitulo5000->setjustificacion($justificacion);
				
				
				
				$capitulo5000->agregar();




	include ("consulta.php");

 
}
?>
