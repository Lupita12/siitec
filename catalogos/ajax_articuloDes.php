<?
include("../conexion.php");	
if(isset($_POST['cmb_partida']))
		
	$componida = $_POST['cmb_partida'];
	//list($idparti,$idmeta, $id_depa) = split('separa', $componida);
	//$q_part=mysql_query("select clave from partida where id_partida=".$idparti);
	//$a_parti=mysql_fetch_array($q_part);
	$resultado=mysql_query("select id_articulo, descripcion from articulo where id_partida=".$componida);	
?>
	
	<div id="articulo">
	    <select name="cmb_articulo" id="cmb_articulo"onchange="javascript:FAjax('ajax_nuevaDescripcion.php','div_descrip',this.name+'='+this.value,'post')">
        		<option value="0">Selecciona Articulo</option> 
		<? while($res = mysql_fetch_array($resultado)){ ?>
			<option value="<?=$res['id_articulo'];?>"><?=$res['descripcion'];?></option>
		<? }?> 
        </select>
	</div>	
		
		
	</form>
    