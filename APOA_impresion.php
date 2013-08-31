<?   
session_start();
 header("Content-type: application/vnd.ms-excel");
 header("Content-Disposition:  filename=\"X2003.XLS\";");

require_once("conexion.php");
require_once("conexion.php");
require_once("cls_capitulo.php");
require_once("cls_departamento.php");
require_once("cls_meta.php");
require_once("cls_meta_capitulo.php");
require_once("cls_meta_departamento.php");
require_once("cls_partida.php");
require_once("cls_partida_departamento.php");
require_once("cls_procesoclave.php");
require_once("cls_procesoclave_meta.php");
require_once("cls_procesoestrategico.php");
require_once("cls_subcapitulo.php");
//localhost/residen/Copia de APOA_reduccion13.php?id=21
?>
  <p>
<?
$clvdepa=$_GET['id'];
$cadena_sql = mysql_query("select m.clave, d.monto from meta_departamento d join meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." and d.periodo='2010' order by m.clave");
$mon = mysql_query("select monto, clave from departamento where id_departamento=".$clvdepa);
$grantotal = mysql_fetch_array($mon);
$con=mysql_num_rows($cadena_sql);
$metas=$con*80;
$totabla=$metas+330;
$dive=$totabla+20;
$wit=$metas/$con;
?>
  </p>
  <table width="80%" border="0" align="center">
    <tr>
      <td align="center">HOJA DE TRABAJO PARA ELABORACION DE POA <?=date('Y');?> POR DEPARTAMENTO </td>
    </tr>
    <tr>
      <td align="center">Presupuesto con el que cuenta:<?=$grantotal[0];?> </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="<?=$totabla;?>" border="1" align="center">
    <tr>
      <td>
		<table  width="<?=$totabla;?>" border="0" cellpadding="0" cellspacing="0">
			<tr>	
      			<td width="50">Clave</td>
      <td width="200">
        Nombre</td>
	  <?
	  $a=1;
	  while($row = mysql_fetch_array($cadena_sql)){?>
      <td align="center" width="<?=$wit;?>"><?=$row[0];?>
     	</td>
	  <? 
	  $a++;
	  }?>
      <td width="80" align="center">
      Total</td>
    </tr>
</table>	
</td>
</tr>
	<?
	//------------------------------------------------CAPITULO 1000
for($w=1000;$w<=9000;$w+=1000)
{	
?>
	<tr>
	  <td>
<?
	$diez=$w;
	$diez=$diez."0";
	$cad = mysql_query("select clave, nombre, p.id_partida from partida p join partida_departamento d on p.id_partida=d.id_partida where clave BETWEEN ".$diez." and ".($diez+9999)." and d.id_departamento=".$clvdepa." group by clave order by clave"); 
	$coco=mysql_num_rows($cad);
?>	  
	  	 
		<table width="<?=$totabla;?>"  border="1" cellpadding="0" cellspacing="0">
		<?

	//contador de partidas
	$conmil=1;
	$totacapi=0;
	unset($arreglo);
	while($mil = mysql_fetch_array($cad)){?>		
			<tr>
      			<td width="50"><?=$mil[0];?></td>
      			<td width="200" style="font-size:14px"><?=strtolower($mil[1]);?></td>
				<?
 $palmil = mysql_query("select m.id_meta, m.clave, d.monto from meta_departamento d join
 meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." order by m.clave"); 
 $i=1;
 $sumilla=0;
 $yo=1;
 while($milpa = mysql_fetch_array($palmil)){
	 if($yo>$con)
	 {
		 $yo=1;
	}
	$obj=new partida_departamento($milpa[1],$mil[0],$grantotal[1]);

?>  
   			  <td align="center" width="<?=$wit;?>"><? if($obj->getingreso_propio()!=0) echo $obj->getingreso_propio();?>
                   <?
                   $sumilla+=$obj->getingreso_propio();
				   $arreglo[$yo]+=$obj->getingreso_propio();
				   ?>
				</td>
   			  <? 
$i++;
$yo++;
}   $totacapi+=$sumilla;

?>	
   			  <td align="center" width="80"><?=$sumilla;?>
		      </td>
    		</tr>
 <? 
 	$conmil++;
 //----------------TUPLA DEL CAPITULO 1000

 }?>		
 		</table>
</td> 
    </tr>
		  	
    <tr>
      <td bgcolor="#CCCCCC">
		<table width="<?=$totabla;?>"  border="1" cellpadding="0" cellspacing="0">
		<tr align="center">
        <td width="50">
        </td>
		<td width="200">	  
      Capitulo <?=$w;?></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC" width="<?=$wit;?>"><?=$arreglo[$i];?>
      <? $maton[$i]+=$arreglo[$i];?>
       </td>
<? }
$totalall+=$totacapi;
?>
      <td bgcolor="#CCCCCC" width="80"><?=$totacapi;?></td>
	  </tr>
	  </table>
    </tr>
	<?
}	
	 //-------------------- ULTIMA TUPLA -------------------?>
	
    <tr>
      <td>
		<table width="<?=$totabla;?>"  border="1" cellpadding="0" cellspacing="0">
			<tr align="center">
            <td width="50">
            </td>
			<td width="200">
	  <strong>TOTAL DE CAPITULOS </strong></td>
	  
 <? for($x=1;$x<=$con;$x++){?>	
      <td align="center" width="<?=$wit;?>"><?=$maton[$x];?>	</td>
<? }?>	  
      <td width="80" align="center"><?=$totalall;?></td>
    </tr>
	</table>
	</td>
	</tr>
    <tr>
      <td>&nbsp;</td>
	</tr>
  </table>

