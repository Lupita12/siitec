<?
session_start();
include("conexion.php");	
if(isset($_POST['combo_meta']))
		
	$combo_meta = $_POST['combo_meta'];	
	$Sql="SELECT id_accion,nombre FROM accion WHERE id_meta=$combo_meta ";	
	$resultado=mysql_query($Sql);
?>
	
	<div id="combo_met">
	    <select name="combo_accion">
			<option value="0">Selecciona</option>
		<? while($res = mysql_fetch_array($resultado)){ ?>
			<option value="<?=$res[0];?>" ><?=$res[1];?></option>
		<? }?> 
        </select>
	</div>	
</form>