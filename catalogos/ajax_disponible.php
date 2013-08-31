<?
session_start();
include("../conexion.php");	
if(isset($_POST['cmb_partida']))
		
	$componida = $_POST['cmb_partida'];
	if($_SESSION["s_contemplacion"]==1)
	{
	//list($idumedida,$idparti) = split('separa', $componida);
		$resultado=mysql_query("select ingreso_propio-gastado-comprometido from partida_departamento where id_meta=".$_SESSION["idmetamo"]." and id_departamento=".$_SESSION["s_idepa"]." and id_partida=$componida");
		$kaka=mysql_fetch_row($resultado);
	}else
	{
		if($_SESSION["s_contemplacion"]==2)
		{
				 $kaka[0]=100000000;
		}else
		{
		//--------------------------------------------------- AQUI VA LA CONSULTA PARA EL GASTO DIRECTO	
			$resultado=mysql_query("select monto-gastado-comprometido from gastodirecto_capitulo where id_meta=".$_SESSION["idmetamo"]." and id_departamento=".$_SESSION["s_idepa"]." and id_partida=$componida");
			$kaka=mysql_fetch_row($resultado);
		}
	
	}
?>
	
	<div id="dispo">    
        <input type="text" name="iva" id="iva" readonly="readonly"/>
        <input type="hidden" name="h_iva" id="h_iva"/>
        <input type="text" name="monto" id="monto" value="<? if($_SESSION["s_contemplacion"]==2){ echo "Dinero Infinito";}else{echo number_format($kaka[0]);}?>" readonly="readonly"/>
        <input type="hidden" name="h_monto" id="h_monto" value="<?=$kaka[0];?>"/>
	</div>	
			
	</form>