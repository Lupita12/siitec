<?
//$clv=$_GET['id'];
//echo '<br>aver si lo apanya'.$idemple;
?>
<div><a style=\"text-decoration:underline;cursor:pointer;\" onclick="pedirDatos1('<?=$_SESSION["s_idepa"];?>')"><font color="#000000"><strong>Agregar Articulo</strong></font></a></div>
<div><a style=\"text-decoration:underline;cursor:pointer;\" onclick="pedirjustificacion()"><font color="#000000"><strong>Agregar Justificaci&oacute;n</strong></font></a></div>
<div><a style=\"text-decoration:underline;cursor:pointer;\" onclick="nuevadescripcion()"><font color="#000000"><strong>Agregar Descripci&oacute;n o Unidad de medida</strong></font></a></div>

<?
//cambio 1 en id
$cadena_sql = mysql_query("select p.clave, ra.cantidad, d.descripcion, a.descripcion as desarti, u.nombre,
  ra.total, ra.id_shuffle from (((requisicion_articulo ra join partida p on ra.id_partida=p.id_partida) join articulo a on ra.id_articulo=a.id_articulo) join descripcion d on d.id_descripcion=ra.id_descripcion) join unidadmedida u on u.id_unidadmedida=ra.id_unidadmedida where ra.folio_requisicion=".$_SESSION["idrequi"]);

//aca tambien 1
$cad = mysql_query("select nombre from accion a join requisicion_accion r on a.id_accion=r.id_accion where id_meta=".$_SESSION["idmetamo"]);


$departa = mysql_fetch_array(mysql_query("select e.nombre, d.nombre from encargado e join departamento d on e.id_departamento=d.id_departamento where e.id_departamento=".$_SESSION["s_idepa"]));
echo "select e.nombre, d.nombre from encargado e join departamento d on e.id_departamento=d.id_departamento where e.id_departamento=".$_SESSION["s_idepa"];
$fecha=mysql_fetch_array(mysql_query("select fecha from requisicion where id_requisicion=".$_SESSION["idrequi"]));

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
    <td><?=$_SESSION["clv_meta"];?></td>
    <td><?=$res['clave'];?></td>
    <td><?=$res['cantidad'];?></td>
    <td><?=$res['nombre'];?></td>
    <td><?=$res['desarti']." ".$res['descripcion'];?></td>
    <td><?="$ ".(number_format($res['total']));?></td>
    <td><a style="cursor:pointer" onclick="eliminarDato(<?=$res['id_shuffle'];?>)">Borrar articulo</a></td>
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
  <p>&nbsp;</p>
