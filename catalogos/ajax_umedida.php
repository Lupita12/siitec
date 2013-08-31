<?
include("../conexion.php");	
if(isset($_POST['cmb_descripcion']))
		
	$componida = $_POST['cmb_descripcion'];
	//list($idclasificacion, $id_articulo,$idpartida) = split('separa', $componida);
	//$q_part=mysql_query("select clave from partida where id_partida=".$idparti);
	//$a_parti=mysql_fetch_array($q_part);
	$resultado=mysql_query("select id_unidadmedida, nombre from unidadmedida where id_descripcion=".$componida);	
?>
	
	<div id="umedida">
	    <select name="cmb_umedida" id="cmb_umedida" onchange="javascript:FAjax('ajax_monto.php','txtmon',this.name+'='+this.value,'post'),FAjax('ajax_cantidad.php','divcantidad',this.name+'='+this.value,'post')">
        		<option value="0">Seleccionar</option> 
		<? while($res = mysql_fetch_array($resultado)){ ?>
			<option value="<?=$res['id_unidadmedida'];?>"><?=$res['nombre'];?></option>
		<? }?> 
        </select>
	</div>	
		
		
	</form>