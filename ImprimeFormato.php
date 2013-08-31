<?
session_start();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition:  filename=\"X2003.XLS\";");
?>
<? require_once("conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Concentrado por partida presupuestal y proceso estretegico</title>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script language="javascript">
$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
		$("#FormularioExportacion").submit();
});
});
</script>

<style type="text/css">
<!--
.Estilo2 {font-size: 12px}
.Estilo4 {font-size: 12px; font-weight: bold; }
.Estilo6 {font-size: 9px; font-weight: bold; }
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" >
 
 <div id="d_diva" style="display:block; height:500px; width:1100px; overflow:auto; ">
    <table width="1059" border="1" align="center" >
      <tr>
        
        <td width="425" rowspan="2"><span class="Estilo4">Nombre del documento: Formato para el concentrado por Partida Presupuestal y Proceso Estrategico </span></td>
        <td width="238"><span class="Estilo2"><strong>SENEST-PL-PO-003-02 </strong></span></td>
      </tr>
      <tr>
        <td><span class="Estilo2"><strong>Revision: 5 </strong></span></td>
      </tr>
      <tr>
        <td><span class="Estilo2"><strong>Referencia a la Norma ISO 9001-2000: 6.1 </strong></span></td>
        <td><span class="Estilo2"><strong>Pagina</strong></span></td>
      </tr>
    </table>
    <table width="1059" border="0" align="center">
      <tr>
        <td align="center" ><span class="Estilo2"><strong>PROGRAMA OPERATIVO ANUAL 2010</strong> </span></td>
      </tr>
      <tr>
        <td align="center"><span class="Estilo2"><strong>CONCENTRADO POR PARTIDA PRESUPUESTAL Y PROCESO ESTRATEGICO </strong> </span></td>
      </tr>
      <tr>
        <td><span class="Estilo2"><strong>INSTITUTO TECNOLOGICO DE COLIMA</strong> </span></td>
      </tr>
    </table>
    <label>
    <input type="button" name="Submit" value="Imprimir" onclick="javascript:imprimir()"/>
    </label>
    <table width="1059" border="1" align="center"   >
      <tr>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><span class="Estilo2">PARTIDA PRESUPUESTAL</span> </td>
        <td colspan="10" align="center" bgcolor="#CCCCCC"><span class="Estilo2">PROCESOSO ESTRATEGICOS </span></td>
        <td colspan="2" rowspan="2" align="center" bgcolor="#CCCCCC"><span class="Estilo2">PRESUPUESTO A CUBIR A TRAVEZ DE </span></td>
        <td width="84" rowspan="5" align="center" bgcolor="#CCCCCC"><span class="Estilo2">TOTAL</span></td>
      </tr>
      <tr>
        <td width="62" rowspan="4" align="center" bgcolor="#CCCCCC"><span class="Estilo2">CLAVE</span></td>
        <td width="135" rowspan="4" align="center" bgcolor="#CCCCCC"><span class="Estilo2">NOMBRE</span></td>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><span class="Estilo2">1. ACADEMICO </span></td>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><span class="Estilo2">2. VINCULACION</span> </td>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><span class="Estilo2">3.PLANEACION</span></td>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><span class="Estilo2">4.CALIDAD</span></td>
        <td colspan="2" align="center" bgcolor="#CCCCCC"><span class="Estilo2">5. ADMINISTRACION DE RECURSOS </span></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2">METAS</span></td>
        <?
		//Total de Metas que tiene el proceso estrategico ACADEMICO
	  	$meta1 = "select COUNT(pm.id_meta) from procesoclave p join `procesoestrategico` pe
		on p.`id_procesoestrategico` = pe.`id_procesoestrategico` 
		join procesoclave_meta pm on p.`id_procesoclave`=pm.`id_procesoclave`
		where pe.`clave`= 01";
		$academico=mysql_query($meta1);
		$row01 = mysql_fetch_array($academico);
		?>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2"><? echo $row01[0]; ?></span></td>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2">METAS</span></td>
        <?
		//Total de Metas que tiene el proceso estrategico VINCULACION
	  	$meta1 = "select COUNT(pm.id_meta) from procesoclave p join `procesoestrategico` pe
		on p.`id_procesoestrategico` = pe.`id_procesoestrategico` 
		join procesoclave_meta pm on p.`id_procesoclave`=pm.`id_procesoclave`
		where pe.`clave`= 02";
		$vinculacion=mysql_query($meta1);
		$row01 = mysql_fetch_array($vinculacion);
		?>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2"><? echo $row01[0]; ?></span></td>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2">METAS</span></td>
        <?
		//Total de Metas que tiene el proceso estrategico PLANEACION
	  	$meta1 = "select COUNT(pm.id_meta) from procesoclave p join `procesoestrategico` pe
		on p.`id_procesoestrategico` = pe.`id_procesoestrategico` 
		join procesoclave_meta pm on p.`id_procesoclave`=pm.`id_procesoclave`
		where pe.`clave`= 03";
		$planeacion=mysql_query($meta1);
		$row01 = mysql_fetch_array($planeacion);
		?>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2"><? echo $row01[0]; ?></span></td>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2">METAS</span></td>
        <?
		//Total de Metas que tiene el proceso estrategico CALIDAD
	  	$meta1 = "select COUNT(pm.id_meta) from procesoclave p join `procesoestrategico` pe
		on p.`id_procesoestrategico` = pe.`id_procesoestrategico` 
		join procesoclave_meta pm on p.`id_procesoclave`=pm.`id_procesoclave`
		where pe.`clave`= 04";
		$calidad=mysql_query($meta1);
		$row01 = mysql_fetch_array($calidad);
		?>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2"><? echo $row01[0]; ?></span></td>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2">METAS</span></td>
        <?
		//Total de Metas que tiene el proceso estrategico ADMINISTRACION
	  	$meta1 = "select COUNT(pm.id_meta) from procesoclave p join `procesoestrategico` pe
		on p.`id_procesoestrategico` = pe.`id_procesoestrategico` 
		join procesoclave_meta pm on p.`id_procesoclave`=pm.`id_procesoclave`
		where pe.`clave`= 05";
		$administracion=mysql_query($meta1);
		$row01 = mysql_fetch_array($administracion);
		?>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2"><? echo $row01[0]; ?></span></td>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2">METAS</span></td>
        <?
		//Total de Metas que existen
	  	$meta1 = "select COUNT(clave) from meta";
		$metas=mysql_query($meta1);
		$row01 = mysql_fetch_array($metas);
		?>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2"><? echo $row01[0]; ?></span></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2">ACCIONES</span></td>
        <?
	  	//Total de acciones que tiene el proceso estrategico ACADEMICO
		$accion1 = "select COUNT(a.`clave`) from procesoclave p join `procesoestrategico` pe
		on p.`id_procesoestrategico` = pe.`id_procesoestrategico` 
		join procesoclave_meta pm on p.`id_procesoclave`=pm.`id_procesoclave` 
		join accion a on a.`id_meta` = pm.`id_meta`
		where pe.`clave`= 01";
		$academico=mysql_query($accion1);
		$row01 = mysql_fetch_array($academico);
	  ?>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2"><? echo $row01[0]; ?></span></td>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2">ACCIONES</span></td>
        <?
	  	//Total de acciones que tiene el proceso estrategico VINCULACION
		$accion1 = "select COUNT(a.`clave`) from procesoclave p join `procesoestrategico` pe
		on p.`id_procesoestrategico` = pe.`id_procesoestrategico` 
		join procesoclave_meta pm on p.`id_procesoclave`=pm.`id_procesoclave` 
		join accion a on a.`id_meta` = pm.`id_meta`
		where pe.`clave`= 02";
		$vinculacion=mysql_query($accion1);
		$row01 = mysql_fetch_array($vinculacion);
	  ?>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2"><? echo $row01[0]; ?></span></td>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2">ACCIONES</span></td>
        <?
	  	//Total de acciones que tiene el proceso estrategico PLANEACION
		$accion1 = "select COUNT(a.`clave`) from procesoclave p join `procesoestrategico` pe
		on p.`id_procesoestrategico` = pe.`id_procesoestrategico` 
		join procesoclave_meta pm on p.`id_procesoclave`=pm.`id_procesoclave` 
		join accion a on a.`id_meta` = pm.`id_meta`
		where pe.`clave`= 03";
		$planeacion=mysql_query($accion1);
		$row01 = mysql_fetch_array($planeacion);
	  ?>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2"><? echo $row01[0]; ?></span></td>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2">ACCIONES</span></td>
        <?
	  	//Total de acciones que tiene el proceso estrategico CALIDAD
		$accion1 = "select COUNT(a.`clave`) from procesoclave p join `procesoestrategico` pe
		on p.`id_procesoestrategico` = pe.`id_procesoestrategico` 
		join procesoclave_meta pm on p.`id_procesoclave`=pm.`id_procesoclave` 
		join accion a on a.`id_meta` = pm.`id_meta`
		where pe.`clave`= 04";
		$calidad=mysql_query($accion1);
		$row01 = mysql_fetch_array($calidad);
	  ?>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2"><? echo $row01[0]; ?></span></td>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2">ACCIONES</span></td>
        <?
	  	//Total de acciones que tiene el proceso estrategico ADMINISTRACION
		$accion1 = "select COUNT(a.`clave`) from procesoclave p join `procesoestrategico` pe
		on p.`id_procesoestrategico` = pe.`id_procesoestrategico` 
		join procesoclave_meta pm on p.`id_procesoclave`=pm.`id_procesoclave` 
		join accion a on a.`id_meta` = pm.`id_meta`
		where pe.`clave`= 05";
		$administracion=mysql_query($accion1);
		$row01 = mysql_fetch_array($administracion);
	  ?>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2"><? echo $row01[0]; ?></span></td>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2">ACCIONES</span></td>
        <?
	  	//Total de acciones que existen
		$accion1 = "select COUNT(id_accion) from accion ";
		$acciones=mysql_query($accion1);
		$row01 = mysql_fetch_array($acciones);
	  ?>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2"><? echo $row01[0]; ?></span></td>
      </tr>
      <tr>
        <td width="61" align="center" bgcolor="#CCCCCC"><span class="Estilo2">INGRESOS PROPIOS </span></td>
        <td width="53" align="center" bgcolor="#CCCCCC"><span class="Estilo2">GASTO DIRECTO</span> </td>
        <td width="61" align="center" bgcolor="#CCCCCC"><span class="Estilo2">INGRESOS PROPIOS </span></td>
        <td width="53" align="center" bgcolor="#CCCCCC"><span class="Estilo2">GASTO DIRECTO</span></td>
        <td width="61" align="center" bgcolor="#CCCCCC"><span class="Estilo2">INGRESOS PROPIOS</span> </td>
        <td width="53" align="center" bgcolor="#CCCCCC"><span class="Estilo2">GASTO DIRECTO</span></td>
        <td width="61" align="center" bgcolor="#CCCCCC"><span class="Estilo2">INGRESOS PROPIOS </span></td>
        <td width="53" align="center" bgcolor="#CCCCCC"><span class="Estilo2">GASTO DIRECTO</span></td>
        <td width="61" align="center" bgcolor="#CCCCCC"><span class="Estilo2">INGRESOS PROPIOS</span> </td>
        <td width="53" align="center" bgcolor="#CCCCCC"><span class="Estilo2">GASTO DIRECTO</span></td>
        <td width="61" align="center" bgcolor="#CCCCCC"><span class="Estilo2">INGRESOS PROPIOS </span></td>
        <td width="53" align="center" bgcolor="#CCCCCC"><span class="Estilo2">GASTO DIRECTO</span></td>
      </tr>
      <?PHP
	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select clave,nombre,ingreso_propio from partida where clave BETWEEN 10000 and (10000+9999) order by clave";
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	
	
	
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
		$a=1;
		while($row = mysql_fetch_array($ISql))
		{
		if($a==0)
		{ 
		?>
      <? $a=1;}else{?>
      <tr class="odd">
        <? $a=0;}?>
        <td ><span class="Estilo2"><? echo $row[0]; ?></span></td>
        <td ><span class="Estilo2"><? echo $row[1]; ?></span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico ACADEMICO
			$co="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 01";
			$resultado=mysql_query($co);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obnter el Gasto directo por partida y proceso estrategico ACADEMICO
			$gastodir="select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 01";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);	
			?>
        <td align="center" bgcolor="#CCCCCC"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico VINCULACION
			$con="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 02";
			$resultado1=mysql_query($con);
			$row10 = mysql_fetch_array($resultado1);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row10[0], 2, '.', ',');?>
        </span> </td>
        <?
			//Obnter el Gasto directo por partida y proceso estrategico VINCULACION
			$gastodir1="select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 02";
			$resultado=mysql_query($gastodir1);
			$row11 = mysql_fetch_array($resultado);	
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico PLANEACION
			$cone="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 03";
			$resultado2=mysql_query($cone);
			$row9 = mysql_fetch_array($resultado2);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row9[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obnter el Gasto directo por partida y proceso estrategico PLANEACION
			$gastodir1="select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 03";
			$resultado=mysql_query($gastodir1);
			$row11 = mysql_fetch_array($resultado);	
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico CALIDAD
			$conex="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 04";
			$resultado3=mysql_query($conex);
			$row8 = mysql_fetch_array($resultado3);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row8[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obnter el Gasto directo por partida y proceso estrategico CALIDAD
			$gastodir1="select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 04";
			$resultado=mysql_query($gastodir1);
			$row11 = mysql_fetch_array($resultado);	
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico ADMINISTRACION
			$conexi="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 05";
			$resultado4=mysql_query($conexi);
			$row7 = mysql_fetch_array($resultado4);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row7[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obnter el Gasto directo por partida y proceso estrategico ADMINISTRACION
			$gastodir1="select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 05";
			$resultado=mysql_query($gastodir1);
			$row11 = mysql_fetch_array($resultado);	
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?	
			//Total de la partida en cuanto a ingresos propios
			$conexio ="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." 
			and pe.clave BETWEEN 01 and 09";
			$resultado5=mysql_query($conexio);
			$row6 = mysql_fetch_array($resultado5);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row6[0], 2, '.', ',');?>
        </span></td>
        <? 	
			$TotalGasto="select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida where pa.clave = ".$row[0]."
			and pe.clave BETWEEN 01 and 09";
			$res = mysql_query($TotalGasto);
			$row03 = mysql_fetch_array($res);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row03[0], 2, '.', ',');?>
        </span></td>
        <?
				//suma total de ingreso propio y gasto directo
				$sum1 = $row6[0] + $row03[0];
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($sum1, 2, '.', ',');?>
        </span></td>
      </tr>
      <? 
		} 
	
	} 
 
?>
      <td colspan="2" bgcolor="#3399FF" align="center"><strong><span class="Estilo2">Total Capitulo 1000</span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 1000  
	and pe.clave = 01";
	$academico=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($academico);
	?>
        <td align="center" ><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico ACADEMICO
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 1000  
	and pe.clave = 01";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 1000  
	and pe.clave = 02";
	$vinculacion=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($vinculacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico VINCULACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 1000  
	and pe.clave = 02";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?	
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 1000  
	and pe.clave = 03";
	$planeacion=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($planeacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico PLANEACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 1000  
	and pe.clave = 03";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 1000  
	and pe.clave = 04";
	$calidad=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($calidad);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico CALIDAD
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 1000  
	and pe.clave = 04";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 1000  
	and pe.clave = 05";
	$administracion=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($administracion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico ADMINISTRACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 1000  
	and pe.clave = 05";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select ingresos_propios from capitulo  
	where clave = 1000";
	$vinculacion=mysql_query($capitulo1);
	$rowc1 = mysql_fetch_array($vinculacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowc1[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo
	$capi="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 1000  
	and pe.clave BETWEEN 01 and 09";
	$TotGasto=mysql_query($capi);
	$rowg12=mysql_fetch_array($TotGasto);
	?>
        <td align="center" bgcolor="#CCCCCC"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowg12[0], 2, '.', ',');?>
        </span></strong></td>
        <? $suma = $rowc1[0] + $rowg12[0]; ?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($suma, 2, '.', ',');?>
        </span></strong></td>
        <?PHP //CAPITULO 2000

	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select clave,nombre,ingreso_propio from partida where clave BETWEEN 20000 and (20000+9999) ORDER BY clave";
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	
	
	
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
		$a=1;
		while($row = mysql_fetch_array($ISql))
		{
		if($a==0)
		{ 
		?>
        <? $a=1;}else{?>
      <tr class="odd">
        <? $a=0;}?>
        <td width="62" ><span class="Estilo2"><? echo $row[0]; ?></span></td>
        <td width="135" ><span class="Estilo2"><? echo $row[1]; ?></span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico ACADEMICO
			$co="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 01";
			$resultado=mysql_query($co);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td width="61" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico ACADEMICO
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 01";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td width="53" bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico VINCULACION
			$con="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 02";
			$resultado1=mysql_query($con);
			$row10 = mysql_fetch_array($resultado1);
			?>
        <td width="61" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row10[0], 2, '.', ',');?>
        </span> </td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico VINCULACION
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 02";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td width="53" bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico PLANEACION
			$cone="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 03";
			$resultado2=mysql_query($cone);
			$row9 = mysql_fetch_array($resultado2);
			?>
        <td width="61" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row9[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico PLANEACION
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 03";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td width="53" bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico CALIDAD
			$conex="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 04";
			$resultado3=mysql_query($conex);
			$row8 = mysql_fetch_array($resultado3);
			?>
        <td width="61" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row8[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico CALIDAD
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 04";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td width="53" bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico ADMINISTRACION
			$conexi="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 05";
			$resultado4=mysql_query($conexi);
			$row7 = mysql_fetch_array($resultado4);
			?>
        <td width="61" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row7[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico ADMINISTRACION
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 05";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td width="53" bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?	
			//Total de la partida en cuanto a ingresos propios
			$conexio ="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." 
			and pe.clave BETWEEN 01 and 09";
			$resultado5=mysql_query($conexio);
			$row66 = mysql_fetch_array($resultado5);
			?>
        <td width="61" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row66[0], 2, '.', ',');?>
        </span></td>
        <? 	
			$TotalGasto="select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida where pa.clave = ".$row[0]."
			and pe.clave BETWEEN 01 and 09";
			$res = mysql_query($TotalGasto);
			$row033 = mysql_fetch_array($res);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row033[0], 2, '.', ',');?>
        </span></td>
        <? $suma1 = $row66[0] + $row033[0]; ?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($suma1, 2, '.', ',');?>
        </span></td>
      </tr>
      <? 
		} 
	
	} 
 
?>
      <td colspan="2" bgcolor="#3399FF" align="center"><strong><span class="Estilo2">Total Capitulo 2000 </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo2="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 2000  
	and pe.clave = 01";
	$academico=mysql_query($capitulo2);
	$row01 = mysql_fetch_array($academico);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico ACADEMICO
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 2000  
	and pe.clave = 01";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico VINCULACION
	$capitulo2="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 2000  
	and pe.clave = 02";
	$vinculacion=mysql_query($capitulo2);
	$row01 = mysql_fetch_array($vinculacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico VINCULACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 2000  
	and pe.clave = 02";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico PLANEACION
	$capitulo2="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 2000  
	and pe.clave = 03";
	$planeacion=mysql_query($capitulo2);
	$row01 = mysql_fetch_array($planeacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico PLANEACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 2000  
	and pe.clave = 03";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico CALIDAD
	$capitulo2="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 2000  
	and pe.clave = 04";
	$calidad=mysql_query($capitulo2);
	$row01 = mysql_fetch_array($calidad);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico CALIDAD
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 2000  
	and pe.clave = 04";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ADMINISTRACION
	$capitulo2="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 2000  
	and pe.clave = 05";
	$administracion=mysql_query($capitulo2);
	$row01 = mysql_fetch_array($administracion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico ACADEMICO
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 2000  
	and pe.clave = 05";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo 2000
	$capitulo1="select ingresos_propios from capitulo  
	where clave = 2000";
	$vinculacion=mysql_query($capitulo1);
	$row21 = mysql_fetch_array($vinculacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row21[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo
	$capi="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 2000  
	and pe.clave BETWEEN 01 and 09";
	$TotGasto=mysql_query($capi);
	$rowa2=mysql_fetch_array($TotGasto);
	?>
        <td align="center" bgcolor="#CCCCCC"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowa2[0], 2, '.', ',');?>
        </span></strong></td>
        <? $suma2 = $row21[0] + $rowa2[0]; ?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($suma2, 2, '.', ',');?>
        </span></strong></td>
        <?PHP //CAPITULO 3000

	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select clave,nombre,ingreso_propio from partida where clave BETWEEN 30000 and (30000+9999) order by clave";
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	
	
	
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
		$a=1;
		while($row = mysql_fetch_array($ISql))
		{
		if($a==0)
		{ 
		?>
        <? $a=1;}else{?>
      <tr class="odd">
        <? $a=0;}?>
        <td ><span class="Estilo2"><? echo $row[0]; ?></span></td>
        <td ><span class="Estilo2"><? echo $row[1]; ?></span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico ACADEMICO
			$co="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 01";
			$resultado=mysql_query($co);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico ACADEMICO
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 01";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico VINCULACION
			$con="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 02";
			$resultado1=mysql_query($con);
			$row10 = mysql_fetch_array($resultado1);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row10[0], 2, '.', ',');?>
        </span> </td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico VINCULACION
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 02";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico PLANEACION
			$cone="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 03";
			$resultado2=mysql_query($cone);
			$row9 = mysql_fetch_array($resultado2);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row9[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico PLANEACION
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 03";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico CALIDAD
			$conex="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 04";
			$resultado3=mysql_query($conex);
			$row8 = mysql_fetch_array($resultado3);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row8[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico CALIDAD
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 04";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico ADMINISTRACION
			$conexi="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 05";
			$resultado4=mysql_query($conexi);
			$row7 = mysql_fetch_array($resultado4);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row7[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico ADMINISTRACION
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 05";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?	
			//Total de la partida en cuanto a ingresos propios
			$conexio ="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." 
			and pe.clave BETWEEN 01 and 09";
			$resultado5=mysql_query($conexio);
			$rowi6 = mysql_fetch_array($resultado5);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($rowi6[0], 2, '.', ',');?>
        </span></td>
        <? 	
			$TotalGasto="select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida where pa.clave = ".$row[0]."
			and pe.clave BETWEEN 01 and 09";
			$res = mysql_query($TotalGasto);
			$rows3 = mysql_fetch_array($res);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($rows3[0], 2, '.', ',');?>
        </span></td>
        <? $suma3 = $rowi6[0] + $rows3[0]; ?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($suma3, 2, '.', ',');?>
        </span></td>
      </tr>
      <? 
		} 
	
	} 
 
?>
      <td colspan="2" bgcolor="#3399FF" align="center"><strong><span class="Estilo2">Total Capitulo 3000</span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 3000  
	and pe.clave = 01";
	$academico=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($academico);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico ACADEMICO
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 3000  
	and pe.clave = 01";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico VINCULACION
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 3000  
	and pe.clave = 02";
	$vinculacion=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($vinculacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico VINCULACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 3000  
	and pe.clave = 02";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico PLANEACION
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 3000  
	and pe.clave = 03";
	$planeacion=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($planeacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico PLANEACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 3000  
	and pe.clave = 03";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico CALIDAD
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 3000  
	and pe.clave = 04";
	$calidad=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($calidad);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico CALIDAD
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 3000  
	and pe.clave = 04";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ADMINISTRACION
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 3000  
	and pe.clave = 05";
	$administracion=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($administracion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico ADMINISTRACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 3000  
	and pe.clave = 05";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select ingresos_propios from capitulo  
	where clave = 3000";
	$vinculacion=mysql_query($capitulo1);
	$rown1 = mysql_fetch_array($vinculacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($rown1[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo
	$capi="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 3000  
	and pe.clave BETWEEN 01 and 09";
	$TotGasto=mysql_query($capi);
	$rowt1=mysql_fetch_array($TotGasto);
	?>
        <td align="center" bgcolor="#CCCCCC"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowt1[0], 2, '.', ',');?>
        </span></strong></td>
        <? $suma4 = $rown1[0] + $rowt1[0]; ?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($suma4, 2, '.', ',');?>
        </span></strong></td>
		
		<?PHP //CAPITULO 4000

	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select clave,nombre,ingreso_propio from partida where clave BETWEEN 40000 and (40000+9999) order by clave";
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	
	
	
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
		$a=1;
		while($row = mysql_fetch_array($ISql))
		{
		if($a==0)
		{ 
		?>
        <? $a=1;}else{?>
      <tr class="odd">
        <? $a=0;}?>
        <td ><span class="Estilo2"><? echo $row[0]; ?></span></td>
        <td ><span class="Estilo2"><? echo $row[1]; ?></span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico ACADEMICO
			$co="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 01";
			$resultado=mysql_query($co);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico ACADEMICO
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 01";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico VINCULACION
			$con="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 02";
			$resultado1=mysql_query($con);
			$row10 = mysql_fetch_array($resultado1);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row10[0], 2, '.', ',');?>
        </span> </td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico VINCULACION
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 02";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico PLANEACION
			$cone="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 03";
			$resultado2=mysql_query($cone);
			$row9 = mysql_fetch_array($resultado2);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row9[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico PLANEACION
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 03";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico CALIDAD
			$conex="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 04";
			$resultado3=mysql_query($conex);
			$row8 = mysql_fetch_array($resultado3);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row8[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico CALIDAD
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 04";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico ADMINISTRACION
			$conexi="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 05";
			$resultado4=mysql_query($conexi);
			$row7 = mysql_fetch_array($resultado4);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row7[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico ADMINISTRACION
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 05";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?	
			//Total de la partida en cuanto a ingresos propios
			$conexio ="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." 
			and pe.clave BETWEEN 01 and 09";
			$resultado5=mysql_query($conexio);
			$rowi6 = mysql_fetch_array($resultado5);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($rowi6[0], 2, '.', ',');?>
        </span></td>
        <? 	
			$TotalGasto="select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida where pa.clave = ".$row[0]."
			and pe.clave BETWEEN 01 and 09";
			$res = mysql_query($TotalGasto);
			$rows3 = mysql_fetch_array($res);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($rows3[0], 2, '.', ',');?>
        </span></td>
        <? $suma3 = $rowi6[0] + $rows3[0]; ?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($suma3, 2, '.', ',');?>
        </span></td>
      </tr>
      <? 
		} 
	
	} 
 
?>
      <td colspan="2" bgcolor="#3399FF" align="center"><strong><span class="Estilo2">Total Capitulo 4000</span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 4000  
	and pe.clave = 01";
	$academico=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($academico);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico ACADEMICO
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 4000  
	and pe.clave = 01";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico VINCULACION
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 4000  
	and pe.clave = 02";
	$vinculacion=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($vinculacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico VINCULACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 4000  
	and pe.clave = 02";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico PLANEACION
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 4000  
	and pe.clave = 03";
	$planeacion=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($planeacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico PLANEACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 4000  
	and pe.clave = 03";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico CALIDAD
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 4000  
	and pe.clave = 04";
	$calidad=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($calidad);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico CALIDAD
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 4000  
	and pe.clave = 04";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ADMINISTRACION
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 4000  
	and pe.clave = 05";
	$administracion=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($administracion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico ADMINISTRACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 4000  
	and pe.clave = 05";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select ingresos_propios from capitulo  
	where clave = 4000";
	$vinculacion=mysql_query($capitulo1);
	$rown1 = mysql_fetch_array($vinculacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($rown1[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo
	$capi="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 4000  
	and pe.clave BETWEEN 01 and 09";
	$TotGasto=mysql_query($capi);
	$rowt1=mysql_fetch_array($TotGasto);
	?>
        <td align="center" bgcolor="#CCCCCC"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowt1[0], 2, '.', ',');?>
        </span></strong></td>
        <? $suma4 = $rown1[0] + $rowt1[0]; ?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($suma4, 2, '.', ',');?>
        </span></strong></td>
		
        <?PHP //CAPITULO 5000

	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sql="select clave,nombre,ingreso_propio from partida where clave BETWEEN 50000 and (50000+9999) order by clave";
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	
	
	
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
		$a=1;
		while($row = mysql_fetch_array($ISql))
		{
		if($a==0)
		{ 
		?>
        <? $a=1;}else{?>
      <tr class="odd">
        <? $a=0;}?>
        <td ><span class="Estilo2"><? echo $row[0]; ?></span></td>
        <td ><span class="Estilo2"><? echo $row[1]; ?></span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico ACADEMICO
			$co="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 01";
			$resultado=mysql_query($co);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico ACADEMICO
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 01";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico VINCULACION
			$con="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 02";
			$resultado1=mysql_query($con);
			$row10 = mysql_fetch_array($resultado1);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row10[0], 2, '.', ',');?>
        </span> </td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico VINCULACION
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 02";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico PLANEACION
			$cone="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 03";
			$resultado2=mysql_query($cone);
			$row9 = mysql_fetch_array($resultado2);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row9[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico PLANEACION
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 03";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico CALIDAD
			$conex="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 04";
			$resultado3=mysql_query($conex);
			$row8 = mysql_fetch_array($resultado3);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row8[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico CALIDAD
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 04";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?		
			//Obtener el ingreso propio por partida y proceso estrategico ADMINISTRACION
			$conexi="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." and pe.clave = 05";
			$resultado4=mysql_query($conexi);
			$row7 = mysql_fetch_array($resultado4);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($row7[0], 2, '.', ',');?>
        </span></td>
        <?
			//Obtiene el gasto directo por partida y proceso estrategico ADMINISTRACION
			$gastodir = "select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida 
			where pa.clave = ".$row[0]." and pe.clave = 05";
			$resultado=mysql_query($gastodir);
			$row11 = mysql_fetch_array($resultado);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($row11[0], 2, '.', ',');?>
        </span></td>
        <?	
			//Total de la partida en cuanto a ingresos propios
			$conexio ="select sum(pd.ingreso_propio) from `partida_departamento` pd 
			join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = pd.id_partida where pa.clave = ".$row[0]." 
			and pe.clave BETWEEN 01 and 09";
			$resultado5=mysql_query($conexio);
			$rowr6 = mysql_fetch_array($resultado5);
			?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($rowr6[0], 2, '.', ',');?>
        </span></td>
        <? 	
			$TotalGasto="select sum(g.monto) from `gastodirecto_partida` g 
			join `procesoclave_meta` pm on g.id_meta = pm.id_meta
			join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
			join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
			join partida pa on pa.id_partida = g.id_partida where pa.clave = ".$row[0]."
			and pe.clave BETWEEN 01 and 09";
			$res = mysql_query($TotalGasto);
			$rowo3 = mysql_fetch_array($res);
			?>
        <td bgcolor="#CCCCCC" align="center"><span class="Estilo2">
          <?  echo "$".number_format($rowo3[0], 2, '.', ',');?>
        </span></td>
        <? $suma5 = $rowr6[0] + $rowo3[0]; ?>
        <td align="center"><span class="Estilo2">
          <?  echo "$".number_format($suma5, 2, '.', ',');?>
        </span></td>
      </tr>
      <? 
		} 
	
	} 
 
?>
      <td colspan="2" bgcolor="#3399FF" align="center"><strong><span class="Estilo2">Total Capitulo 5000</span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 5000  
	and pe.clave = 01";
	$academico=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($academico);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico ACADEMICO
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 5000  
	and pe.clave = 01";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 5000  
	and pe.clave = 02";
	$vinculacion=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($vinculacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico VINCULACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 5000  
	and pe.clave = 02";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 5000  
	and pe.clave = 03";
	$planeacion=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($planeacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico PLANEACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 5000  
	and pe.clave = 03";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 5000  
	and pe.clave = 04";
	$calidad=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($calidad);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico CALIDAD
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 5000  
	and pe.clave = 04";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select sum(pd.ingreso_propio) from `partida_departamento` pd 
	join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join partida pa on pa.id_partida = pd.id_partida 
	join `subcapitulo2` s2 on s2.`id_subcapitulo2`= pa.`id_subcapitulo` 
    join subcapitulo s on s.`id_subcapitulo` = s2.`id_subcapitulo`
	join capitulo c on c.`id_capitulo`= s.`id_capitulo`
	where c.clave = 5000  
	and pe.clave = 05";
	$administracion=mysql_query($capitulo1);
	$row01 = mysql_fetch_array($administracion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo y proceso estrategico ADMINISTRACION
	$Gcapitulo1="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 5000  
	and pe.clave = 05";
	$academico=mysql_query($Gcapitulo1);
	$row02= mysql_fetch_array($academico); 
	?>
        <td bgcolor="#CCCCCC" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row02[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$capitulo1="select ingresos_propios from capitulo  
	where clave = 5000";
	$vinculacion=mysql_query($capitulo1);
	$rowp1 = mysql_fetch_array($vinculacion);
	?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowp1[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	//Total de gasto directo por capitulo
	$capi="select sum(gc.monto) from `gastodirecto_capitulo` gc 
	join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
	join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
	join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
	join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   	where c.clave = 5000  
	and pe.clave BETWEEN 01 and 09";
	$TotGasto=mysql_query($capi);
	$rowd12=mysql_fetch_array($TotGasto);
	?>
        <td align="center" bgcolor="#CCCCCC"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowd12[0], 2, '.', ',');?>
        </span></strong></td>
        <? $suma6 = $rowp1[0] + $rowd12[0]; ?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($suma6, 2, '.', ',');?>
        </span></strong></td>
      <tr>
        <td colspan="2" bgcolor="#3399FF" align="center"><span class="Estilo4">Total Capitulos </span></td>
        <?
	  	//Total de capitulos por proceso ACADEMICO
		$capitulos="select sum(pd.ingreso_propio) from `partida_departamento` pd 
		join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
		join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
		join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
		join partida pa on pa.id_partida = pd.id_partida where pa.clave BETWEEN 10000 and (90000+9999)  
		and pe.clave = 01 ";
		$vinculacion=mysql_query($capitulos);
		$row011 = mysql_fetch_array($vinculacion);
	  ?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($row011[0], 2, '.', ',');?>
        </span></strong></td>
        <? 
	 	 //Total de capitulo gasto directo ACADEMICO
		 $capituloG="select sum(gc.monto) from `gastodirecto_capitulo` gc 
		 join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
		 join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
		 join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
		 join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   		 where c.clave BETWEEN 1000 and (9000+999)  
		 and pe.clave = 01";
		 $vincula=mysql_query($capituloG);
		 $row022 = mysql_fetch_array($vincula);
	  ?>
        <td align="center" bgcolor="#CCCCCC"><strong><span class="Estilo2">
          <?  echo "$".number_format($row022[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	  	//Total de capitulos por proceso VINCULACION
		$capitulos="select sum(pd.ingreso_propio) from `partida_departamento` pd 
		join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
		join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
		join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
		join partida pa on pa.id_partida = pd.id_partida where pa.clave BETWEEN 10000 and (90000+9999)  
		and pe.clave = 02 ";
		$vinculacion=mysql_query($capitulos);
		$rowv01 = mysql_fetch_array($vinculacion);
	  ?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowv01[0], 2, '.', ',');?>
        </span></strong></td>
        <? 
	 	 //Total de capitulo gasto directo VINCULACION
		 $capituloG="select sum(gc.monto) from `gastodirecto_capitulo` gc 
		 join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
		 join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
		 join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
		 join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   		 where c.clave BETWEEN 1000 and (9000+999)  
		 and pe.clave = 02";
		 $vincula=mysql_query($capituloG);
		 $rowg01 = mysql_fetch_array($vincula);
	  ?>
        <td align="center" bgcolor="#CCCCCC"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowg01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	  	//Total de capitulos por proceso PLANEACION
		$capitulos="select sum(pd.ingreso_propio) from `partida_departamento` pd 
		join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
		join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
		join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
		join partida pa on pa.id_partida = pd.id_partida where pa.clave BETWEEN 10000 and (90000+9999)  
		and pe.clave = 03 ";
		$vinculacion=mysql_query($capitulos);
		$rowp01 = mysql_fetch_array($vinculacion);
	  ?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowp01[0], 2, '.', ',');?>
        </span></strong></td>
        <? 
	 	 //Total de capitulo gasto directo PLANEACION
		 $capituloG="select sum(gc.monto) from `gastodirecto_capitulo` gc 
		 join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
		 join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
		 join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
		 join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   		 where c.clave BETWEEN 1000 and (9000+999)  
		 and pe.clave = 03";
		 $vincula=mysql_query($capituloG);
		 $rowz01 = mysql_fetch_array($vincula);
	  ?>
        <td align="center" bgcolor="#CCCCCC"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowz01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	  	//Total de capitulos por proceso CALIDAD
		$capitulos="select sum(pd.ingreso_propio) from `partida_departamento` pd 
		join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
		join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
		join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
		join partida pa on pa.id_partida = pd.id_partida where pa.clave BETWEEN 10000 and (90000+9999)  
		and pe.clave = 04 ";
		$vinculacion=mysql_query($capitulos);
		$rowc01 = mysql_fetch_array($vinculacion);
	  ?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowc01[0], 2, '.', ',');?>
        </span></strong></td>
        <? 
	 	 //Total de capitulo gasto directo CALIDAD
		 $capituloG="select sum(gc.monto) from `gastodirecto_capitulo` gc 
		 join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
		 join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
		 join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
		 join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   		 where c.clave BETWEEN 1000 and (9000+999)  
		 and pe.clave = 04";
		 $vincula=mysql_query($capituloG);
		 $rows01 = mysql_fetch_array($vincula);
	  ?>
        <td align="center" bgcolor="#CCCCCC"><strong><span class="Estilo2">
          <?  echo "$".number_format($rows01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	  	//Total de capitulos por proceso AMDMINISTRACION
		$capitulos="select sum(pd.ingreso_propio) from `partida_departamento` pd 
		join `procesoclave_meta` pm on pd.id_meta = pm.id_meta
		join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
		join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
		join partida pa on pa.id_partida = pd.id_partida where pa.clave BETWEEN 10000 and (90000+9999)  
		and pe.clave = 05 ";
		$vinculacion=mysql_query($capitulos);
		$rowa01 = mysql_fetch_array($vinculacion);
	  ?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowa01[0], 2, '.', ',');?>
        </span></strong></td>
        <? 
	 	 //Total de capitulo gasto directo ADMINISTRACION
		 $capituloG="select sum(gc.monto) from `gastodirecto_capitulo` gc 
		 join `procesoclave_meta` pm on gc.id_meta = pm.id_meta
		 join `procesoclave` p on p.id_procesoclave = pm.id_procesoclave
		 join `procesoestrategico` pe on pe.id_procesoestrategico=p.id_procesoestrategico
		 join capitulo c on c.`id_capitulo` = gc.`id_capitulo` 
   		 where c.clave BETWEEN 1000 and (9000+999)  
		 and pe.clave = 05";
		 $vincula=mysql_query($capituloG);
		 $rowt01 = mysql_fetch_array($vincula);
	  ?>
        <td align="center" bgcolor="#CCCCCC"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowt01[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	  	//Obtiene de capitulos el  total de ingresos propios 
		$TotalesCapitulo="select sum(ingresos_propios) from capitulo";
		$ingresoP=mysql_query($TotalesCapitulo);
		$roww = mysql_fetch_array($ingresoP);
	  ?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($roww[0], 2, '.', ',');?>
        </span></strong></td>
        <?
	  	//Obtiene de capitulos el  total de gasto directo
		$TotalesCapitulo="select sum(gasto_directo) from capitulo";
		$ingresoP=mysql_query($TotalesCapitulo);
		$rowsi = mysql_fetch_array($ingresoP);
	  ?>
        <td align="center" bgcolor="#CCCCCC"><strong><span class="Estilo2">
          <?  echo "$".number_format($rowsi[0], 2, '.', ',');?>
        </span></strong></td>
        <? $sum5 = $roww[0] + $rowsi[0]; ?>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($sum5, 2, '.', ',');?>
        </span></strong></td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#3399FF" align="center"><span class="Estilo6">TOTAL POR PROCESO </span></td>
        <? 
	  	//suma de total por proceso 
		$sum = $row011[0] + $row022[0];
		$sum1 = $rowv01[0] + $rowg01[0];
		$sum2 = $rowp01[0] + $rowz01[0];
		$sum3 = $rowc01[0] + $rows01[0]; 
	  	$sum4 = $rowa01[0] + $rowt01[0];
		
	  ?>
        <td colspan="2" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($sum, 2, '.', ',');?>
        </span></strong></td>
        <td colspan="2" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($sum1, 2, '.', ',');?>
        </span></strong></td>
        <td colspan="2" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($sum2, 2, '.', ',');?>
        </span></strong></td>
        <td colspan="2" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($sum3, 2, '.', ',');?>
        </span></strong></td>
        <td colspan="2" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($sum4, 2, '.', ',');?>
        </span></strong></td>
        <td colspan="2" align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($sum5, 2, '.', ',');?>
        </span></strong></td>
        <td align="center"><strong><span class="Estilo2">
          <?  echo "$".number_format($sum5, 2, '.', ',');?>
        </span></strong></td>
      </tr>
    </table>
  </div>
  </form>
  
  <form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
<label></label>
<label></label>
</form>


</body>
</html>

