<?PHP 
  session_start();
   header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition:  filename=\"X2003.XLS\";");
?>

<?   require_once("conexion.php"); ?>
<? include("cls_accion_capitulo.php"); ?>
<? include("cls_meta.php"); ?>

<?PHP

$modi=$_POST["modi"];	
$idmeta=$_POST["idmeta"];
	
  	if($modi!=1)
  	{
		$cont=$_POST['cont'];
	  	for($v=1000;$v<=7000;$v+=1000)
		{
			$Sql="SElECT id_capitulo FROM capitulo WHERE clave =".$v;
			$ISq = mysql_query($Sql);
			$row = mysql_fetch_array($ISq);
			if($v!=4000)
			{
				if($v!=6000)
				{
					for($z=1;$z<=$cont;$z++)
					{
						$id_accion=$_POST["h_idaccion_".$z];
						$id_capitulo=$row[0];
						$porcentaje=$_POST["h_ing".$v."_".$z];
						$enero_junio=$_POST["henejuning"];
						$julio_diciembre=$_POST["hjuldicing"];
						$porcentaje_enero_junio=$_POST["txtenerojun"];
						
						$Accion_Capitulo = new Accion_Capitulo();
						$Accion_Capitulo->setid_accion($id_accion);
						$Accion_Capitulo->setid_capitulo($id_capitulo);
						$Accion_Capitulo->setporcentaje($porcentaje);
						$Accion_Capitulo->setenero_junio($enero_junio);
						$Accion_Capitulo->setjulio_diciembre($julio_diciembre);
						$Accion_Capitulo->setporcentaje_enero_junio($porcentaje_enero_junio);
			
						$Accion_Capitulo->agregarAccion_Capitulo();

					}	
				}
			}
		}
	}else
 {
	  
	$Sql1="SElECT clave FROM capitulo";
	$ISql1 = mysql_query($Sql1);
	while($row1 = mysql_fetch_array($ISql1))
	{
		$cont=$_POST['cont'];
		$Sql="SElECT id_capitulo FROM capitulo WHERE clave =".$row1[0];
		$ISq = mysql_query($Sql);
		$row = mysql_fetch_array($ISq);
		for($a=1;$a<=$cont;$a++)
		{
			$id_accion=$_POST["h_idaccion_".$a];
			$id_capitulo=$row[0];
			$porcentaje=$_POST["h_ing".$row1[0]."_".$a];
			$enero_junio=$_POST["henejuning"];
			$julio_diciembre=$_POST["hjuldicing"];
			$porcentaje_enero_junio=$_POST["txtenerojun"];
			
			$Accion_Capitulo = new Accion_Capitulo($id_accion,$id_capitulo);
			$Accion_Capitulo->setporcentaje($porcentaje);
			$Accion_Capitulo->setenero_junio($enero_junio);
			$Accion_Capitulo->setjulio_diciembre($julio_diciembre);
			$Accion_Capitulo->setporcentaje_enero_junio($porcentaje_enero_junio);
			
			$Accion_Capitulo->modificarAccion_Capitulo();

		
		}
	}
	  
	  
  }
		
		$clavesesion=$_POST["hclavesesion"];
		$Sqlmeta="SElECT clave FROM meta WHERE id_meta =".$clavesesion;
		$ISqmeta = mysql_query($Sqlmeta);
		$rowmeta = mysql_fetch_array($ISqmeta);
		
		$ingreso_propio_ene_jun=$_POST["henejuntot"];
		$setgasto_directo_ene_jun=$_POST["henejuntot1"];
		$setingreso_propio_jul_dic=$_POST["hjuldictot"];
		$setgasto_directo_jul_dic=$_POST["hjuldictot1"];
		
		$Meta = new Meta($rowmeta[0]);
		$Meta->setingreso_propio_ene_jun($ingreso_propio_ene_jun);
		$Meta->setgasto_directo_ene_jun($setgasto_directo_ene_jun);
		$Meta->setingreso_propio_jul_dic($setingreso_propio_jul_dic);
		$Meta->setgasto_directo_jul_dic($setgasto_directo_jul_dic);
			
		$Meta->modificar();



$hoja=$_POST['hoja'];
$de=$_POST['de'];

$clave1=$_POST['clave1'];
$clave2=$_POST['clave2'];
$clave3=$_POST['clave3'];
$clave4=$_POST['clave4'];
$clave5=$_POST['clave5'];
$clave6=$_POST['clave6'];

$ProcesoEstrategico=$_POST['ProcesoEstrategico'];
$Procesoclave=$_POST['Procesoclave'];
$cont=$_POST['cont'];
$clavemeta=$_POST['clavemeta'];
$desmeta=$_POST['desmeta'];
$unidadmedida=$_POST['unidadmedida'];
$cantidad=$_POST['cantidad'];
$txtenerojun=$_POST['txtenerojun'];
$txtjuldic=$_POST['txtjuldic'];
$txttotal=$_POST['txttotal'];



$accion_=array();
$hing1000_=array();
$hing2000_=array();
$hgas2000_=array();
$hing3000_=array();
$hgas3000_=array();
$hing5000_=array();
$hing7000_=array();
$hgas7000_=array();
$hingresocubrir_=array();
$montogasto_=array();
$htotalpres_=array();
$h_enejuning_=array();
$h_enejungas_=array();
$henejuntotal_=array();
$h_juldicing_=array();
$h_juldicgas_=array();
$hjuldictotal_=array();
for ($i=1; $i<=$cont; $i++) 
{
	$accion_[$i]= $_POST['accion_'.$i.''];
	$hing1000_[$i]= $_POST['hing1000_'.$i.''];
	$hing2000_[$i]= $_POST['hing2000_'.$i.''];
	$hgas2000_[$i]= $_POST['hgas2000_'.$i.''];
	$hing3000_[$i]= $_POST['hing3000_'.$i.''];
	$hgas3000_[$i]= $_POST['hgas3000_'.$i.''];
	$hing5000_[$i]= $_POST['hing5000_'.$i.''];
	$hing7000_[$i]= $_POST['hing7000_'.$i.''];
	$hgas7000_[$i]= $_POST['hgas7000_'.$i.''];
	$hingresocubrir_[$i]= $_POST['hingresocubrir_'.$i.''];
	$montogasto_[$i]= $_POST['montogasto_'.$i.''];
	$htotalpres_[$i]= $_POST['htotalpres_'.$i.''];
	$h_enejuning_[$i]= $_POST['h_enejuning_'.$i.''];
	$h_enejungas_[$i]= $_POST['h_enejungas_'.$i.''];
	$henejuntotal_[$i]= $_POST['henejuntotal_'.$i.''];
	$h_juldicing_[$i]= $_POST['h_juldicing_'.$i.''];
	$h_juldicgas_[$i]= $_POST['h_juldicgas_'.$i.''];
	$hjuldictotal_[$i]= $_POST['hjuldictotal_'.$i.''];
	
}
$monto_ing1000=$_POST['monto_ing1000'];
$monto_ing2000=$_POST['monto_ing2000'];
$monto_gas2000=$_POST['monto_gas2000'];
$monto_ing3000=$_POST['monto_ing3000'];
$monto_gas3000=$_POST['monto_gas3000'];
$monto_ing5000=$_POST['monto_ing5000'];
$monto_ing7000=$_POST['monto_ing7000'];
$monto_gas7000=$_POST['monto_gas7000'];
$presupuestotaling=$_POST['presupuestotaling'];
$presupuestotalgas=$_POST['presupuestotalgas'];
$presupuestotal=$_POST['presupuestotal'];

$henejuntot=$_POST['henejuntot'];
$henejuntot1=$_POST['henejuntot1'];
$htotalenerojunio=$_POST['htotalenerojunio'];
$hjuldictot=$_POST['hjuldictot'];
$hjuldictot1=$_POST['hjuldictot1'];
$htotaljuliodiciembre=$_POST['htotaljuliodiciembre'];

$clave_ing1000=$_POST['clave_ing1000'];
$clave_ing2000=$_POST['clave_ing2000'];
$clave_gas2000=$_POST['clave_gas2000'];
$clave_ing3000=$_POST['clave_ing3000'];
$clave_gas3000=$_POST['clave_gas3000'];
$clave_ing5000=$_POST['clave_ing5000'];
$clave_ing7000=$_POST['clave_ing7000'];
$clave_gas7000=$_POST['clave_gas7000'];
$clave_totaling=$_POST['clave_totaling'];
$clave_totalgas=$_POST['clave_totalgas'];
$clave_total=$_POST['clave_total'];
$claveenerojunioing=$_POST['claveenerojunioing'];
$claveenerojuniogas=$_POST['claveenerojuniogas'];
$claveenerojuniototal=$_POST['claveenerojuniototal'];
$clavejuliodiciembreing=$_POST['clavejuliodiciembreing'];
$clavejuliodiciembregas=$_POST['clavejuliodiciembregas'];
$clavejuliodiciembretotal=$_POST['clavejuliodiciembretotal'];


$estrategico1000=$_POST['estrategico1000'];
$estrategico2000=$_POST['estrategico2000'];
$estrategico3000=$_POST['estrategico3000'];
$estrategico5000=$_POST['estrategico5000'];
$estrategico7000=$_POST['estrategico7000'];
$estrategicoacubirir=$_POST['estrategicoacubirir'];
$estrategicototal=$_POST['estrategicototal'];
$estrategicoenejun=$_POST['estrategicoenejun'];
$estrategicojuldic=$_POST['estrategicojuldic'];

$mostrar=$_POST['mostrar'];

?>
<table width="1579" border="1" align="center">

  <tr>
    <td colspan="24" align="center" ><strong>ANTEPROYECTO DEL PROGRAMA OPERATIVO ANUAL 2010</strong> </td>
    </tr>
  <tr>
    <td colspan="24" align="center"><strong>DESGLOSE DE METAS POR PROCESO CLAVE</strong> </td>
    </tr>
  <tr>
    <td colspan="24" align="center"><strong> INSTITUTO TECNOLOGICO O CENTRO: COLIMA</strong> </td>
    </tr>
  <tr>
    <td colspan="20" align="center"><strong> Proceso Estrategico: <?=$ProcesoEstrategico;?></strong></td>
    <td width="58" align="center">HOJA:</td>
    <td width="75" align="center"><?=$hoja;?></td>
    <td width="48" align="center">DE</td>
    <td width="86" align="center"><?=$de;?></td>
  </tr>
  <tr>
    <td colspan="14" align="right"><strong>Clave Programatica y nombre del Proceso Clave:</strong></td>
    <td width="69" align="center"><?=$clave1;?></td>
    <td width="69" align="center"><?=$clave2;?></td>
    <td width="69" align="center"><?=$clave3;?></td>
    <td width="69" align="center"><?=$clave4;?></td>
    <td width="69" align="center"><?=$clave5;?></td>
    <td width="98" align="center"><?=$clave6;?></td>
    <td colspan="4"><?=$Procesoclave;?></td>
  </tr>
</table>
<table width="1579" border="1">
  <tr>
    <td height="27" colspan="3" bgcolor="#999999">Meta: <?=$clavemeta;?>
</td>
    <td width="155" rowspan="3" align="center" bgcolor="#999999"><p>Acciones</p></td>
    <td colspan="3" align="center" bgcolor="#999999">Calendario Programatico </td>
    <td colspan="8" align="center" bgcolor="#999999">Monto de recursos por capitulo de gasto.</td>
    <td colspan="2" rowspan="2" align="center" bgcolor="#999999"><p>Presupuesto a cubrir a traves de </p>      </td>
    <td width="155" rowspan="3" align="center" bgcolor="#999999">Total Presupuesto </td>
    <td colspan="6" align="center" bgcolor="#999999">Presupuestacion calendarizada </td>
  </tr>
  <tr>
    <td width="155" rowspan="2" align="center" bgcolor="#999999">Numero y Descripcion      </td>
    <td width="155" rowspan="2" align="center" bgcolor="#999999">Unidad de medida </td>
    <td width="155" rowspan="2" bgcolor="#999999">Cantidad</td>
    <td width="155" rowspan="2" align="center" bgcolor="#999999">Enero Junio </td>
    <td width="155" rowspan="2" align="center" bgcolor="#999999">Julio Dic. </td>
    <td width="155" rowspan="2" align="center" bgcolor="#999999">Total</td>
    <td width="155" align="center" bgcolor="#999999">1000</td>
    <td colspan="2" align="center" bgcolor="#999999">2000</td>
    <td colspan="2" align="center" bgcolor="#999999">3000</td>
    <td width="155" align="center" bgcolor="#999999">5000</td>
    <td colspan="2" align="center" bgcolor="#999999">7000</td>
    <td colspan="3" bgcolor="#999999" align="center">Enero Junio      </td>
    <td colspan="3" bgcolor="#999999" align="center">Julio Diciembre      </td>
  </tr>
  <tr>
    <td bgcolor="#999999">Ingresos propios </td>
    <td width="155" align="center" bgcolor="#999999">Ingresos propios</td>
    <td width="155" align="center" bgcolor="#999999">Gasto Directo </td>
    <td width="155" align="center" bgcolor="#999999">Ingresos propios</td>
    <td width="155" align="center" bgcolor="#999999">Gasto Directo</td>
    <td bgcolor="#999999">Ingresos propios</td>
    <td width="155" align="center" bgcolor="#999999">Ingresos propios</td>
    <td width="155" align="center" bgcolor="#999999">Gasto Directo</td>
    <td width="155" bgcolor="#999999">Ingresos propios</td>
    <td width="155" bgcolor="#999999">Gasto Directo</td>
    <td width="155" align="center" bgcolor="#999999">Ingresos propios      </td>
    <td width="155" align="center" bgcolor="#999999">Gasto Directo      </td>
    <td width="155" align="center" bgcolor="#999999">Total</td>
    <td width="155" align="center" bgcolor="#999999">Ingresos propios      </td>
    <td width="155" align="center" bgcolor="#999999">Gasto Directo      </td>
    <td width="155" align="center" bgcolor="#999999">Total</td>
  </tr>
<?
	$Sql="SELECT a.id_accion FROM accion a join meta m on a.id_meta=m.id_meta WHERE m.clave = '$clavemeta'";
	$ISql = mysql_query($Sql);
	$con=1;
	while($row = mysql_fetch_array($ISql))
	{
?>
   <tr>     
    <td><? if($con==1){ echo $desmeta;}?></td>
    <td><? if($con==1){ echo $unidadmedida;}?></td>
    <td><? if($con==1){ echo $cantidad;}?></td>
    <td><?=$accion_[$con];?></td>
    <td><? if($con==1){ echo $txtenerojun;}?></td>
    <td><? if($con==1){ echo $txtjuldic;}?></td>
    <td><? if($con==1){ echo $txttotal;}?></td>
    <td><?="$".number_format($hing1000_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($hing2000_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($hgas2000_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($hing3000_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($hgas3000_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($hing5000_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($hing7000_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($hgas7000_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($hingresocubrir_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($montogasto_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($htotalpres_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($h_enejuning_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($h_enejungas_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($henejuntotal_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($h_juldicing_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($h_juldicgas_[$con], 2, '.', ',');?></td>
    <td><?="$".number_format($hjuldictotal_[$con], 2, '.', ',');?></td>
  </tr>
<?
	$con++;
	}
?>
  <tr>
    <td colspan="7" align="center" bgcolor="#999999">TOTAL POR META </td>
    <td><?="$".number_format($monto_ing1000, 2, '.', ',');?></td>
    <td><?="$".number_format($monto_ing2000, 2, '.', ',');?></td>
    <td><?="$".number_format($monto_gas2000, 2, '.', ',');?></td>
    <td><?="$".number_format($monto_ing3000, 2, '.', ',');?></td>
    <td><?="$".number_format($monto_gas3000, 2, '.', ',');?></td>
    <td><?="$".number_format($monto_ing5000, 2, '.', ',');?></td>
    <td><?="$".number_format($monto_ing7000, 2, '.', ',');?></td>
    <td><?="$".number_format($monto_gas7000, 2, '.', ',');?></td>
    <td><?="$".number_format($presupuestotaling, 2, '.', ',');?></td>
    <td><?="$".number_format($presupuestotalgas, 2, '.', ',');?></td>
    <td><?="$".number_format($presupuestotal, 2, '.', ',');?></td>
    <td><?="$".number_format($henejuntot, 2, '.', ',');?></td>
    <td><?="$".number_format($henejuntot1, 2, '.', ',');?></td>
    <td><?="$".number_format($htotalenerojunio, 2, '.', ',');?></td>
    <td><?="$".number_format($hjuldictot, 2, '.', ',');?></td>
    <td><?="$".number_format($hjuldictot1, 2, '.', ',');?></td>
    <td><?="$".number_format($htotaljuliodiciembre, 2, '.', ',');?></td>
  </tr>
<?
if($mostrar==2)
{
?>
  <tr>
    <td height="26" colspan="7" align="center" bgcolor="#999999">TOTAL POR PROCESO CLAVE </td>
    <td width="155"><?="$".number_format($clave_ing1000, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($clave_ing2000, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($clave_gas2000, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($clave_ing3000, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($clave_gas3000, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($clave_ing5000, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($clave_ing7000, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($clave_gas7000, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($clave_totaling, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($clave_totalgas, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($clave_total, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($claveenerojunioing, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($claveenerojuniogas, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($claveenerojuniototal, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($clavejuliodiciembreing, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($clavejuliodiciembregas, 2, '.', ',');?></td>
    <td width="155"><?="$".number_format($clavejuliodiciembretotal, 2, '.', ',');?></td>
  </tr>
  <tr>
    <td height="26" colspan="7" align="center" bgcolor="#999999">TOTAL POR PROCESO ESTRATEGICO </td>
    <td><?="$".number_format($estrategico1000, 2, '.', ',');?></td>
    <td colspan="2"><?="$".number_format($estrategico2000, 2, '.', ',');?></td>
    <td colspan="2"><?="$".number_format($estrategico3000, 2, '.', ',');?></td>
    <td><?="$".number_format($estrategico5000, 2, '.', ',');?></td>
    <td colspan="2"><?="$".number_format($estrategico7000, 2, '.', ',');?></td>
    <td colspan="2"><?="$".number_format($estrategicoacubirir, 2, '.', ',');?></td>
    <td><?="$".number_format($estrategicototal, 2, '.', ',');?></td>
    <td colspan="2"><?="$".number_format($estrategicoenejun, 2, '.', ',');?></td>
    <td><?="$".number_format($estrategicoenejun, 2, '.', ',');?></td>
    <td colspan="2"><?="$".number_format($estrategicojuldic, 2, '.', ',');?></td>
    <td><?="$".number_format($estrategicojuldic, 2, '.', ',');?></td>
  </tr>
<?
}
?>  
</table> 
    
