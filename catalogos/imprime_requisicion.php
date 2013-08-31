<?
session_start();
 header("Content-type: application/vnd.ms-excel");
 header("Content-Disposition:  filename=\"X2003.XLS\";");
require_once("../conexion.php");
$id_requisicion=$_GET['id'];

?>


<?
//cambio 1 en id
$cadena_sql = mysql_query("select p.clave, ra.cantidad, d.descripcion, a.descripcion as desarti, u.nombre,
  ra.total, ra.id_shuffle from (((requisicion_articulo ra join partida p on ra.id_partida=p.id_partida) join articulo a on ra.id_articulo=a.id_articulo) join descripcion d on d.id_descripcion=ra.id_descripcion) join unidadmedida u on u.id_unidadmedida=ra.id_unidadmedida where ra.folio_requisicion=".$id_requisicion);


//aca tambien 1
$cad = mysql_query("select nombre from accion a join requisicion_accion r on a.id_accion=r.id_accion where id_requisicion=".$id_requisicion);

$departa = mysql_fetch_array(mysql_query("select e.nombre, d.nombre from encargado e join departamento d on e.id_departamento=d.id_departamento where e.id_departamento=".$_SESSION["s_idepa"]));

$fecha=mysql_fetch_array(mysql_query("select fecha from requisicion where id_requisicion=".$id_requisicion));

$clv_met = mysql_fetch_array(mysql_query("select clave from meta m join requisicion r on m.id_meta=r.id_meta where r.id_requisicion=".$id_requisicion));

list($anio, $mes, $dia) = split('[-]', $fecha[0]);
if ($mes==01) $mes="Enero";
if ($mes==02) $mes="Febrero";
if ($mes==03) $mes="Marzo";
if ($mes==04) $mes="Abril";
if ($mes==05) $mes="Mayo";
if ($mes==06) $mes="Junio";
if ($mes==07) $mes="Julio";
if ($mes==08) $mes="Agosto";
if ($mes==09) $mes="Septiembre";
if ($mes==10) $mes="Octubre";
if ($mes==11) $mes="Noviembre";
if ($mes==12) $mes="Diciembre";
$fechabien=$dia."-".$mes."-".$anio;

?>Fecha:<?=$fechabien;?>
  <table width="1000" border="1">
  <tr>
    <td>NOMBRE Y FIRMA DEL JEFE DEL AREA SOLICITANTE: <?=$departa[0];?></td>
    </tr>
  <tr>
    <td>FECHA Y AREA SOLICITANTE: <?=$fechabien."  ";?><?=$departa[1];?></td>
    </tr>    
    </table>
  <table width="1000" border="1">
  <tr>
    <td><strong>CLAVE PRESUPUESTAL</strong></td>
    <td><strong>PARTIDA</strong></td>
    <td><strong>CANTIDAD</strong></td>
    <td><strong>UNIDAD</strong></td>
    <td><strong>DESCRIPCI&Oacute;N DE LOS BIENES O SERVICIOS</strong></td>
    <td colspan="2"><strong>COSTO ESTIMADO + IVA</strong></td>
  </tr>
	<? 
	while($res = mysql_fetch_array($cadena_sql)){?>  
  <tr>
    <td><?=$clv_met[0];?></td>
    <td><?=$res['clave'];?></td>
    <td><?=$res['cantidad'];?></td>
    <td><?=$res['nombre'];?></td>
    <td><?=$res['desarti']." ".$res['descripcion'];?></td>
    <td><?="$ ".(number_format($res['total']));?></td>
  </tr>
  <?
	}
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
  <table width="1000" border="1">
    <tr>
      <td>LO ANTERIOR PARA SER UTILIZADO EN LA ACCI&Oacute;N:<? while($a_justi=mysql_fetch_array($cad)){ echo $a_justi[0]."<br>";}?></td>
    </tr>
</table>