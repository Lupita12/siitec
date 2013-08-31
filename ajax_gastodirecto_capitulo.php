<?
session_start();

 include("conexion.php");
include("cls_gastodirecto_partida.php");
if(isset($_POST['combo_meta']))
		
	$combo_meta = $_POST['combo_meta'];	
	$combo_gastodirecto=$_GET['idd'];

	$resultado=mysql_query("SELECT c.id_capitulo, c.clave FROM capitulo c join gastodirecto_capitulo gc on c.id_capitulo = gc.id_capitulo WHERE gc.id_meta=$combo_meta AND gc.id_gasto_directo = $combo_gastodirecto");

?>
	
	<div id="combo_capitul">
	    <select name="combo_capitulo"  onchange="javascript:FAjax('ajax_gastodirecto_partida.php','combo_partid',this.name+'='+this.value,'post')" >
			<option value="0">Selecciona</option>
		<? while($res = mysql_fetch_array($resultado)){ ?>
			<option value="<?=$res[0];?>" ><?=$res[1];?></option>
		<? }?> 
        </select>
	</div>	
</form>