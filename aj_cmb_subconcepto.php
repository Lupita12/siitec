<?

session_start();
include("conexion.php");	
if(isset($_POST['cmb_subcapitulos']))
		
		$subcapi = $_POST['cmb_subcapitulos'];
				
		$s='SELECT s2.clave, s2.nombre FROM subcapitulo2 s2 join subcapitulo s on s2.id_subcapitulo = s.id_subcapitulo where s.clave  = '.$subcapi.' ';	
			$resultado=mysql_query($s, $conexion);	
?>

<div id="cmb_subconcepto">
	    <select name="cmb_subconceptos">
		<option value="0">Selecciona Subcapitulo</option>
		<? while($ot=mysql_fetch_object($resultado)){?>
			<option value="<?=$ot->clave;?>"><?=$ot->clave.' - '.trim($ot->nombre);?></option>
		<? }?> 
        </select>
	</div>	
		
		
	</form>