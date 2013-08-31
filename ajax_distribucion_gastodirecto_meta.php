<?
session_start();
 include("conexion.php");	
if(isset($_POST['combo_gastodirecto']))
		
	$combo_gastodirecto = $_POST['combo_gastodirecto'];	
	$Sql="SELECT m.id_meta,m.clave FROM gastodirecto_partida gp join meta m on gp.id_meta = m.id_meta WHERE gp.id_gasto_directo= $combo_gastodirecto GROUP BY m.id_meta";	
	$resultado=mysql_query($Sql);
?>
	
	<div id="combo_met">
	    <select name="combo_meta" onchange="javascript:FAjax('ajax_distribucion_gastodirecto_capitulo.php?idd=<?=$combo_gastodirecto; ?>','combo_capitul',this.name+'='+this.value,'post')" >
			<option value="0">Selecciona</option>
		<? while($res = mysql_fetch_array($resultado)){ ?>
			<option value="<?=$res[0];?>" ><?=$res[1];?></option>
		<? }?> 
        </select>
	</div>	
</form>