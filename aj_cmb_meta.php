<?
session_start();
 include("conexion.php");	
if(isset($_POST['cmb_departamento']))
		
		$capi = $_POST['cmb_departamento'];
				
		$s='select clave, nombre from meta join meta_departamento on meta.id_meta=meta_departamento.id_meta where id_departamento = '.$capi.' ';	
			$resultado=mysql_query($s, $conexion);	
?>
	
	<div id="cmb_meta">
	    <select name="cmb_metas" >
		<option value="0">Selecciona Meta</option>
		<? while($ot=mysql_fetch_object($resultado)){?>
			<option value="<?=$ot->clave;?>"><?=$ot->clave.' - '.trim($ot->nombre);?></option>
		<? }?> 
        </select>
	</div>	
		
		
	</form>