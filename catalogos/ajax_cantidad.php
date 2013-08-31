<?
include("../conexion.php");	
if(isset($_POST['cmb_articulo']))
?>
	
	<div id="divcantidad">
		<input type="text" name="cantidad" id="cantidad" onfocus="dato(this.name);" onblur="validacantidad();"/>
	</div>	
			
	</form>