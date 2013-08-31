<?
include("../conexion.php");	
if(isset($_POST['cmb_umedida']))
	$componida = $_POST['cmb_umedida'];
	$resultado=mysql_fetch_array(mysql_query("select precio from unidadmedida where id_unidadmedida=".$componida));	
?>
	
	<div id="txtmon">
		<input type="text" name="ingreso" id="ingreso" onfocus="dato(this.name);" onblur="validaingreso();"/>
        <input type="hidden" name="h_ingreso" id="h_ingreso" />
        <input type="text" name="precio_sugerido" id="precio_sugerido" readonly="readonly" value="<?="$".number_format($resultado[0]);?>"/>
	</div>	
			
	</form>