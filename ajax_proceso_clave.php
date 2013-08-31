<? 
session_start();
 include("conexion.php");	
if(isset($_POST['cmb_estra']))
		
	$estra = $_POST['cmb_estra'];	
	$resultado=mysql_query("select clave,nombre from procesoclave where id_procesoestrategico=".$estra);	
?>
	
	<div id="cmb_clav">
	    <select name="cmb_clave" >
			<option value="0">Selecciona Proceso Clave</option>
		<? while($res = mysql_fetch_array($resultado)){ ?>
			<option value="<?=$res[0];?>"><?=$res[1];?></option>
		<? }?> 
        </select>
	</div>	
    
		
		
	</form>