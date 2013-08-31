<?
session_start();
include("conexion.php");	
if(isset($_POST['cmb_capitulos']))
		
		$capi = $_POST['cmb_capitulos'];
				
		$s='SELECT s.clave, s.nombre FROM subcapitulo s join capitulo c on s.id_capitulo = c.id_capitulo where c.clave  = '.$capi.' ';	
			$resultado=mysql_query($s, $conexion);	
?>
	
	<div id="cmb_subcapitulo">
	    <select name="cmb_subcapitulos" onchange="javascript:FAjax('aj_cmb_subconcepto.php','cmb_subconcepto',this.name+'='+this.value,'post')" >
		<option value="0">Selecciona Subcapitulo</option>
		<? while($ot=mysql_fetch_object($resultado)){?>
			<option value="<?=$ot->clave;?>"><?=$ot->clave.' - '.trim($ot->nombre);?></option>
		<? }?> 
        </select>
	</div>	
		
		
	</form>