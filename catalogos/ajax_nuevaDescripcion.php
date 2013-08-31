<?
include("../conexion.php");	
if(isset($_POST['cmb_articulo']))
		
	$componida = $_POST['cmb_articulo'];
	//list($idarticulo,$idpartida) = split('separa', $componida);
	//$q_part=mysql_query("select clave from partida where id_partida=".$idparti);
	//$a_parti=mysql_fetch_array($q_part);
	$resultado=mysql_query("select id_descripcion, descripcion from descripcion where id_articulo=".$componida);	
?>
	
	<div id="div_descrip">
	    <select name="cmb_descri" id="cmb_descri" onchange="javascript:FAjax('ajax_umedida.php','umedida',this.name+'='+this.value,'post')">
        		<option value="0">Seleccionar</option> 
		<? while($res = mysql_fetch_array($resultado)){ ?>
			<option value="<?=$res['id_descripcion'];?>"><?=$res['descripcion'];?></option>
		<? }?> 
        </select>

    </div>	
		
		
	</form>