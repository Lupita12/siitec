<?
include("../conexion.php");	
if(isset($_POST['cmb_marca']))
		
	$componida = $_POST['cmb_marca'];
	list($idmarca, $id_articulo, $idpartida) = split('separa', $componida);
	//$q_part=mysql_query("select clave from partida where id_partida=".$idparti);
	//$a_parti=mysql_fetch_array($q_part);
	$resultado=mysql_query("select c.id_clasificacion, nombre 
from articulo_clasificacion a join clasificacion c on a.id_clasificacion=c.id_clasificacion
and id_articulo=".$id_articulo);	
?>
	
	<div id="clasificacion">
	    <select name="cmb_clasificacion" id="cmb_clasificacion" onchange="javascript:FAjax('ajax_umedida.php','umedida',this.name+'='+this.value,'post')">
        		<option value="0">Seleccionar</option> 
		<? while($res = mysql_fetch_array($resultado)){ ?>
			<option value="<?=$res['id_clasificacion'].'separa'.$id_articulo.'separa'.$idpartida;?>"><?=$res['nombre'];?></option>
		<? }?> 
        </select>
	</div>	
		
		
	</form>