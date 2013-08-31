<?
///MUERTAAAAAAAAAAAAA
include("../conexion.php");	
if(isset($_POST['cmb_descripcion']))
	$componida = $_POST['cmb_descripcion'];
	$resultado=mysql_fetch_array(mysql_query("select precio from descripcion where id_descripcion=".$componida));	
?>
	
	<div id="txtmon">
		<input type="text" name="ingreso" id="ingreso" onfocus="dato(this.name);" onblur="validaingreso();"/>
        <input type="hidden" name="h_ingreso" id="h_ingreso" />
        <input type="text" name="precio_sugerido" id="precio_sugerido" readonly="readonly"  value="<?="$".number_format($resultado[0]);?>"/>
	</div>	
			
	</form>
    
 