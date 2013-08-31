<?
session_start();

require_once("../conexion.php"); 
$no=$_GET['id'];

$q_r=mysql_query("select * from requisicion_articulo where folio_requisicion=".$no);
$conta = mysql_fetch_array($q_r);
						//si el resultado de la consulta es nulo asigna cero a monto
			if($conta[0]!=NULL)
			{
				
				echo '<script lenguaje="javascript">open("crea_requisicion.php","_self");</script>';
				echo '<script lenguaje="javascript">alert("La requisicion todavia tiene articulos, actualizar la pagina para verlos);</script>';
			}else{
				mysql_query("delete from requisicion where id_requisicion = ".$no);
				mysql_query("delete from requisicion_accion where id_requisicion = ".$no);
				echo '<script lenguaje="javascript">open("crea_requisicion.php","_self");</script>';
			}



?>