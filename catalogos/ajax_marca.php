<?
include("../conexion.php");	
if(isset($_POST['cmb_articulo']))
		
	$componida = $_POST['cmb_articulo'];
	list($idarticulo,$idpartida) = split('separa', $componida);
	//$q_part=mysql_query("select clave from partida where id_partida=".$idparti);
	//$a_parti=mysql_fetch_array($q_part);
	$resultado=mysql_query("select m.id_marca, nombre from articulo_marca a join marca m on a.id_marca=m.id_marca
and id_articulo=".$idarticulo);	
?>
	
	<div id="marca">
	    <select name="cmb_marca" id="cmb_marca" onchange="javascript:FAjax('ajax_clasificacion.php','clasificacion',this.name+'='+this.value,'post')">
        		<option value="0">Seleccionar</option> 
		<? while($res = mysql_fetch_array($resultado)){ ?>
			<option value="<?=$res['id_marca'].'separa'.$idarticulo.'separa'.$idpartida;?>"><?=$res['nombre'];?></option>
		<? }?> 
        </select>
	</div>	
		
		
	</form>