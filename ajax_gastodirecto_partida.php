<?
session_start();
 include("conexion.php");	
if(isset($_POST['combo_capitulo']))
		
	$combo_capitulo = $_POST['combo_capitulo'];	
	$resultado=mysql_query("SELECT p.id_partida,p.clave, p.nombre FROM (partida p join subcapitulo s on p.id_subcapitulo = s.id_subcapitulo) join capitulo c on s.id_capitulo = c.id_capitulo WHERE c.id_capitulo=$combo_capitulo");	
?>
	
	<div id="combo_partid">
	    <select name="combo_partida" >
			<option value="0">Selecciona</option>
		<? while($res = mysql_fetch_array($resultado)){ ?>
			<option value="<?=$res[0];?>"><?=$res[1];?>:<?=$res[2];?></option>
		<? }?> 
        </select>
	</div>	
</form>