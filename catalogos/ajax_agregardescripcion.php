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

<form id="f_nuevadescripcion" name="f_nuevadescripcion" method="post" action="" onsubmit="valida_descripcion(); return false">
  <?
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
	
		$resultado=mysql_query("select p.id_partida, clave, nombre from gastodirecto_capitulo g join partida p on g.id_partida=p.id_partida where id_departamento=".$_SESSION["s_idepa"]);

	}
} 
 
//$cadena_sql = mysql_query("select m.id_meta, clave from partida_departamento p join meta m on p.id_meta=m.id_meta
//where id_departamento=".$s_idepa." group by clave");

?>
  <table width="700">
    <tr>
      <td>Selecciona la partida:</td>
      <td><div id="cmb_parti">
          <select name="cmb_partida" id="cmb_partida" onchange="javascript:FAjax('ajax_articuloDes.php','articulo',this.name+'='+this.value,'post')">
            <option value="0">Selecciona Partida</option> 
            <? while($res = mysql_fetch_array($resultado)){ ?>
            <option value="<?=$res[0];?>"><?=$res[1]." ".$res[2];?></option>
            <? }?> 
          </select>
        </div></td>
    </tr>
    <tr>
      <td>Articulo:</td>
      <td><div id="articulo">
        <select name="cmb_articulo" id="cmb_articulo">
          <option value="0">Sin seleccion</option>
        </select>
      </div></td>
    </tr>
    <tr>
      <td>Descripcion:</td>
      <td>
      <div id="div_descrip">
      <select name="cmb_descri" id="cmb_descri">
      	<option value="0">Sin seleccion</option>
      </select>
      </div>
      </td>
    </tr>
    <tr>
      <td>Nueva Descripcion</td>
      <td><textarea name="txtDescri" id="txtDescri" cols="60" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Agregar unidad de medida</td>
      <td><input type="text" name="txtUniMed" id="txtUniMed" /></td>
    </tr>
  </table>
<table width="400" align="center">
  <tr align="center">
      <td><input type="submit" name="button" id="button" value="Agregar"/></td>
      <td><input type="button" name="button2" id="button2" value="Cancelar" onClick="Cancelar()"/></td>
    </tr>
</table>  
</form>
</body>  
</html> 