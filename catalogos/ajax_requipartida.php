<?
include("../conexion.php");	
if(isset($_POST['cmb_meta']))
		
	$componida = $_POST['cmb_meta'];
	list($idmeta, $id_depa) = split('pachon', $componida);
	$resultado=mysql_query("select p.id_partida, clave from partida_departamento p join partida pa on p.id_partida=pa.id_partida
where p.id_departamento=".$id_depa." and p.id_meta=".$idmeta);	
?>
	
	<div id="cmb_parti">
	    <select name="cmb_partida" id="cmb_partida" onchange="javascript:FAjax('ajax_articulo.php','articulo',this.name+'='+this.value,'post')">
        		<option value="0">Selecciona Partida</option> 
		<? while($res = mysql_fetch_array($resultado)){ ?>
			<option value="<?=$res[0].'separa'.$idmeta.'separa'.$id_depa;?>"><?=$res[1];?></option>
		<? }?> 
        </select>
	</div>	
		
		
	</form>