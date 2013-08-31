<? 
session_start();
require_once("../conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  

<html>  
 
<head>

<!---<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />  ---> 
 
<title>Catalogo Usuarios</title>  
<script language="JavaScript" type="text/javascript" src="ajax.js"></script>
</head>  
<body> 
<?
$clvdepa=$_POST['idepa'];
//echo "q pedo".$clvdepa;
//$cadena_sql = mysql_query("select m.id_meta, clave from partida_departamento p join meta m on p.id_meta=m.id_meta
//where id_departamento=".$clvdepa." group by clave");

?>

<form id="nuevareq" name="nuevareq" method="post" action="" onsubmit="valida_empleado(); return false">
  <?


 // $idemple = 25;
 //   $idmetamo = 22;
//$clvdepa=25/*$_GET['id']*/;
//echo $_SESSION["s_idepa"]."akjshdkjasfhkajsf";
//echo $_SESSION["idmetamo"];
//$cadena_sql = mysql_query("select m.id_meta, clave from partida_departamento p join meta m on p.id_meta=m.id_meta
//where id_departamento=".$s_idepa." group by clave");
if($_SESSION["s_contemplacion"]==1)
{
	$resultado=mysql_query("select p.id_partida, clave, pa.nombre from partida_departamento p join partida pa on p.id_partida=pa.id_partida
where p.id_departamento=".$_SESSION["s_idepa"]." and p.id_meta=".$_SESSION["idmetamo"]);
}else{
	if($_SESSION["s_contemplacion"]==2)
	{
		 
		$resultado=mysql_query("select id_partida, clave, nombre from partida where estado=1 and clave BETWEEN 2000 and 3999 order by clave");
	}else{
		
		//--------------------------------------------------AQUI VA LA CONSULTA PARA EL GASTO DIRECTO
		/*
gastodirecto_capitulo
id_gasto_directo
id_meta
id_capitulo
vigencia
monto
id_gastodirecto_capitulo
id_accion
id_departamento
id_partida
gastado
comprometido
*/
		$resultado=mysql_query("select p.id_partida, clave, nombre from gastodirecto_capitulo g join partida p on g.id_partida=p.id_partida where id_departamento=".$_SESSION["s_idepa"]);

	}
}

?>
  <input type="hidden" name="opcion" value=1>
  <table width="700">
    <tr>
      <td>Partida</td>
      <td><div id="cmb_parti">
          <select name="cmb_partida" id="cmb_partida" onchange="javascript:FAjax('ajax_articulo.php','articulo',this.name+'='+this.value,'post'),FAjax('ajax_disponible.php','dispo',this.name+'='+this.value,'post')">
            <option value="0">Selecciona Partida</option> 
            <? while($res = mysql_fetch_array($resultado)){ ?>
            <option value="<?=$res[0];?>"><?=$res[1]." ".$res[2];?></option>
            <? }?> 
          </select>
        </div>	</td>
    </tr>
    <tr>
      <td>Articulo</td>
      <td><div id="articulo">
        <select name="cmb_articulo" id="cmb_articulo">
          <option value="0">Sin seleccion</option>
        </select>
      </div></td>
    </tr>
    <tr>
      <td>Descripcion</td>
      <td><div id="descr">
        <select name="cmb_descripcion" id="cmb_descripcion">
          <option value="0" selected="selected">Sin seleccion</option>
        </select>              
</div>

</td>
    </tr>
    <tr>
      <td>Unidad de Medida</td>
      <td><div id="umedida"><select name="cmb_umedida" id="cmb_umedida">
        		<option value="0">Sin seleccion</option>
                </select></div></td>
    </tr>
    <tr>
      <td>Cantidad</td>
      <td><div id="divcantidad"><input type="text" name="cantidad" id="cantidad" readonly="readonly"/></div></td>
    </tr>
    <tr>
      <td>Descripcion </td>
      <td><div id="descripcion">
        <textarea name="descripcion" id="descripcion" cols="45" rows="3" readonly="readonly"></textarea>
      </div></td>
    </tr>
    <tr>
      <td>Monto y Precio actual</td>
      <td><div id="txtmon"><input type="text" name="ingreso" id="ingreso" readonly="readonly"/>
        <input type="hidden" name="h_ingreso" id="h_ingreso" /><input type="text" name="precio_sugerido" id="precio_sugerido" readonly="readonly"/>
      </div></td>
    </tr>
    <tr>
      <td>Total y Disponible</td>
      <td><div id="dispo"><input type="text" name="iva" id="iva" readonly="readonly"/>
      <input type="hidden" name="h_iva" id="h_iva" />
        <input type="text" name="monto" id="monto" readonly="readonly"/>
        <input type="hidden" name="h_monto" id="h_monto" />	</div></td>
    </tr>
  </table>
<table width="400" align="center">
  <tr align="center">
      <td><input type="submit" name="button" id="button" value="Agregar" /></td>
      <td><input type="button" name="button2" id="button2" value="Cancelar" onClick="Cancelar()"/></td>
    </tr>
</table>  
</form>
</body>  
</html>  