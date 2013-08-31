<?
session_start();
include("conexion.php");	
if(isset($_POST['combo_departamento']))
		
	$combo_departamento = $_POST['combo_departamento'];	

	$Sql="SELECT m.id_meta,m.clave,m.nombre FROM meta_departamento md join meta m on md.id_meta = m.id_meta WHERE md.id_departamento= $combo_departamento GROUP BY m.id_meta";	
	$resultado=mysql_query($Sql);
?>
	
	<div id="combo_met">
	    <select name="combo_meta" onchange="javascript:FAjax('ajax_gastodirecto_accion.php','combo_accio',this.name+'='+this.value,'post')" >
			<option value="0">Selecciona</option>
		<? while($res = mysql_fetch_array($resultado)){ ?>
			<option value="<?=$res[0];?>" ><?=$res[1];?>:<?=$res[2];?></option>
		<? }?> 
        </select>
	</div>	
</form>