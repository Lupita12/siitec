<?
session_start();
include("conexion.php");	
if(isset($_POST['cmb_departamento']))
		
		$capi = $_POST['cmb_empleado'];
				
			
		$ss="SELECT e.id_encargado, e.nombre, a.orden FROM encargado e join autorizador a on e.id_encargado = a.id_autorizador where tipo='autorizador' and clave  = '.$capi.'' ";
			$resultado=mysql_query($s, $conexion);	
?>
	
	<div id="cmb_empleado">
	    <select name="cmb_empleados" onchange="javascript:FAjax('aj_cmb_subconcepto.php','cmb_subconcepto',this.name+'='+this.value,'post')" >
		<option value="0">Selecciona Empleado</option>
		<? while($ot=mysql_fetch_object($resultado)){?>
			<option value="<?=$ot->clave;?>"><?=$ot->clave.' - '.trim($ot->nombre);?></option>
		<? }?> 
        </select>
	</div>	
		
		
	