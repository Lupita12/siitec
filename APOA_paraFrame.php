<?
session_start();

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>APOA</title>
 <script language="javascript">
var nav4 = window.Event ? true : false;
function imprimir(kidd)
{
	var campos = '&id='+kidd;
	open('APOA_impresion.php?'+campos,'_self');	
}

function decimales(evt,campo)
{
	var key = nav4 ? evt.which : evt.keyCode;
	if (campo.value.indexOf('.', 0) == -1)
	{
		return (key <= 13 || key == 46 || (key >= 48 && key <= 57));
	}
	else
	{
		return (key <=13 || (key >= 48 && key <= 57));
	}
}

function validar()
{
	with(document.form1)
	{
		if(confirm('¿Esta seguro de enviar la distribución? Esto indica que ya no podra hacer mas modificaciónes'))
		{
			if(TOTAL.value== '' || TOTAL.value== '$0')
			{
				alert('Es necesario asignar montos');
				return 0;
			}
			else
			{
				if((parseInt(hTOTAL.value)!=parseInt(grantotal.value))){
					alert('La cantidad total debe de ser exacta a la asignada:'+grantotal.value);
					return 0;
				}
				ja=0;
				for(i=1;i<=hidtotmeta.value;i++)
				{
					if(document.getElementById('allcapi_'+i).value=='$0')
						ja++;
				}
				if(ja==0)
				{
					document.getElementById('h_enviar').value=1;
					submit();
				}
				else
					alert('Todas las metas deben de tener dinero');
						
			}
		}
		else{
			return;
		}
	}
}
function salvar()
{
	with(document.form1)
	{

		if((parseInt(hTOTAL.value)>parseInt(grantotal.value))){
			alert('La cantidad no debe sobrepasar su presupuesto asignado:'+grantotal.value);
			return 0;
		}
		else{
			submit();	
		}
	}
}
function formatNumber(num,prefix)
{
    prefix = prefix || '';
    num += '';
    var splitStr = num.split('.');
    var splitLeft = splitStr[0];
    var splitRight = splitStr.length > 1 ? '.' + splitStr[1] : '';
    var regx = /(\d+)(\d{3})/;
    while (regx.test(splitLeft)){
    splitLeft = splitLeft.replace(regx, '$1' + ',' + '$2');
    }
    return prefix + splitLeft + splitRight;
}
function unformatNumber(num)
{
    return num.replace(/([^0-9\.\-])/g,'')*1;
}

function cal(partida,meta,mil)
{
	var dat;
	dat=0;
	sum=0;
	conta=0;
	mas=0;
	totporcapi=0;
	maton=0;
	ceros=0;
	with(document.form1)
	{
		
		ceros=unformatNumber(document.getElementById('txt_'+mil+'_'+partida+'_hidmeta_'+meta).value)
		if(!(document.getElementById('txt_'+mil+'_'+partida+'_hidmeta_'+meta).value==''))
		{
			document.getElementById('txt_'+mil+'_'+partida+'_hidmeta_'+meta).value=0;
			document.getElementById('txt_'+mil+'_'+partida+'_hidmeta_'+meta).value=formatNumber(ceros,'$');			
		}
		document.getElementById('h_'+mil+'_'+partida+'_meta_'+meta).value=0;
		document.getElementById('h_'+mil+'_'+partida+'_meta_'+meta).value=ceros;
		for(i=1;i<=hidtotmeta.value;i++)
		{
			if(document.getElementById('txt_'+mil+'_'+partida+'_hidmeta_'+i).value=='')
				continue;
			dat+=parseInt(document.getElementById('h_'+mil+'_'+partida+'_meta_'+i).value);
		}
		document.getElementById('txt_total_'+mil+'_'+partida).value=0;
		document.getElementById('txt_total_'+mil+'_'+partida).value=formatNumber(dat,'$');		
		document.getElementById('h_total_'+mil+'_'+partida).value=0;		
		document.getElementById('h_total_'+mil+'_'+partida).value=dat;
		conta=parseInt(document.getElementById('tot_'+mil+'_partidas').value);
		for(i=1;i<=conta;i++)
		{
			if(document.getElementById('txt_'+mil+'_'+i+'_hidmeta_'+meta).value=='')
				continue;
			sum+=parseInt(document.getElementById('h_'+mil+'_'+i+'_meta_'+meta).value);
		}
		document.getElementById('txt_'+mil+'_'+meta).value=0;
		document.getElementById('txt_'+mil+'_'+meta).value=formatNumber(sum,'$');
		document.getElementById('h_'+mil+'_'+meta).value=0;		
		document.getElementById('h_'+mil+'_'+meta).value=sum;
		
		for(i=1;i<=hidtotmeta.value;i++)
		{
			if(document.getElementById('txt_'+mil+'_'+i).value=='')
				continue;
			mas+=parseInt(document.getElementById('h_'+mil+'_'+i).value);
		}
		document.getElementById('txtall_'+mil).value=0;
		document.getElementById('txtall_'+mil).value=formatNumber(mas,'$');
		document.getElementById('Hall_'+mil).value=0;		
		document.getElementById('Hall_'+mil).value=mas;
		for(i=1000;i<=9000;i+=1000)
		{
			if(!(document.getElementById('txt_'+i+'_'+meta).value==''))
				totporcapi+=parseInt(document.getElementById('h_'+i+'_'+meta).value)
		}				
		//alert(totporcapi);
		document.getElementById('allcapi_'+meta).value=0;
		document.getElementById('allcapi_'+meta).value=formatNumber(totporcapi,'$');
		document.getElementById('Hallcapi_'+meta).value=0;				
		document.getElementById('Hallcapi_'+meta).value=totporcapi;
		for(i=1;i<=hidtotmeta.value;i++)
		{
			if(document.getElementById('allcapi_'+i).value=='')
				continue;
			maton+=parseInt(document.getElementById('Hallcapi_'+i).value);
		}
		document.getElementById('TOTAL').value=0;
		document.getElementById('TOTAL').value=formatNumber(maton,'$');
		document.getElementById('hTOTAL').value=0;		
		document.getElementById('hTOTAL').value=maton;
		document.getElementById('restante').value=0;
		sumatot=0;
		sumatot=parseInt((grantotal.value)-maton);
		document.getElementById('restante').value=formatNumber(sumatot,'$');
		document.getElementById('hrestante').value=0;				
		document.getElementById('hrestante').value=parseInt(grantotal.value)-maton;	
	}
}
function muestra_dtos(kapi)
{
	with(document.form1)
	{
		if(document.getElementById('h_'+kapi).value==1)
		{		
			document.getElementById('d_'+kapi).style.display = "block";
			document.getElementById('h_'+kapi).value=2;
		}
		else{
			document.getElementById('d_'+kapi).style.display = "none";
			document.getElementById('h_'+kapi).value=1;
			}					
	}
}
function cargar()
{
	with(document.form1)
	{
		for(v=1000;v<=9000;v+=1000)
		{
			for(z=1;z<=parseInt(document.getElementById('tot_'+v+'_partidas').value);z++)
			{
				for(w=1;w<=parseInt(hidtotmeta.value);w++)
				{
					if(document.getElementById('txt_'+v+'_'+z+'_hidmeta_'+w).value=='')
						continue;
					cal(z,w,v);
				}

			}	
		}
						
	}
}

</script>


</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>
<?
$clvdepa=$_GET['id'];
$cadena_sql = mysql_query("select m.clave, d.monto from meta_departamento d join meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." order by m.clave");
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
  <table width="30%" border="0" align="center">
    <tr>
      <td width="50%" align="right">Cantidad Restante:</td>
      <td width="50%" align="left"><input name="restante" type="text" id="restante" size="8" readonly="true"/>
        <input name="hrestante" type="hidden" id="hrestante" /></td>
    </tr>
  </table>
  <table width="<?=$totabla;?>" border="0" align="center">
    <tr>
      <td>
		<table  width="<?=$totabla;?>" border="0" cellpadding="0" cellspacing="0">
			<tr>	
      			<td width="50">
	    <input name="grantotal" type="hidden" id="grantotal" value="<?=$grantotal[0];?>"/>
        <input name="clvdepa" type="hidden" id="clvdepa" value="<?=$clvdepa;?>"/>
      Clave
      <input name="h_1000" type="hidden" id="h_1000" value="1" />
      <input name="h_2000" type="hidden" id="h_2000" value="1" />
      <input name="h_3000" type="hidden" id="h_3000" value="1" />
      <input name="h_4000" type="hidden" id="h_4000" value="1" />
      <input name="h_5000" type="hidden" id="h_5000" value="1" />
      <input name="h_6000" type="hidden" id="h_6000" value="1" />
      <input name="h_7000" type="hidden" id="h_7000" value="1" />
      <input name="h_8000" type="hidden" id="h_8000" value="1" />
      <input name="h_9000" type="hidden" id="h_9000" value="1" />	  </td>
      <td width="200"><input name="clvdeparta" type="hidden" id="clvdeparta" value="<?=$grantotal[1];?>"/>
        Nombre</td>
	  <?
	  $a=1;
	  while($row = mysql_fetch_array($cadena_sql)){?>
      <td align="center" width="<?=$wit;?>"><?=$row[0];?>
      <input name="hidmeta_<?=$a;?>" type="hidden" id="hidmeta" value="<?=$row[0];?>"/></td>
	  <? 
	  $a++;
	  }?>
      <td width="80" align="center"><input name="hidtotmeta" type="hidden" id="hidtotmeta" value="<?=$a-1;?>"/>
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
<?
	$cad = mysql_query("select clave, nombre, id_partida from partida where clave BETWEEN ".$w." and ".($w+999)." order by clave"); 
	$coco=mysql_num_rows($cad);
?>	  
    <tr>
      <td bgcolor="#CCCCCC">
		<table width="<?=$totabla;?>"  border="0" cellpadding="0" cellspacing="0">
		<tr align="center">
		<td width="250">	  
	  <strong>
        <input name="tot_<?=$w;?>_partidas" type="hidden" id="tot_<?=$w;?>_partidas" value="<?=$coco;?>"/>
      <label onClick="muestra_dtos(<?=$w;?>);" style="cursor:pointer">Capitulo <?=$w;?></label> </strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC" width="<?=$wit;?>"><input name="txt_<?=$w;?>_<?=$i;?>" type="text" id="txt_<?=$w;?>_<?=$i;?>" size="8" readonly="true"/>
        <input name="h_<?=$w;?>_<?=$i;?>" type="hidden" id="h_<?=$w;?>_<?=$i;?>"/>
        </td>
<? }

?>
      <td bgcolor="#CCCCCC" width="80"><input name="txtall_<?=$w;?>" type="text" id="txtall_<?=$w;?>" size="9" />
        <input name="Hall_<?=$w;?>" type="hidden" id="Hall_<?=$w;?>" value="<? //$totacapi;?>"/>	  </td>
	  </tr>
	  </table>
    </tr>
	<tr>
	  <td>

	  	  <div id="d_<?=$w;?>" style="display<? if($coco>12){echo ":block; height:250px; width:".$dive."px; overflow:auto;";}?>">
		<table width="<?=$totabla;?>"  border="0" cellpadding="0" cellspacing="0">
		<?

	//contador de partidas
	$totacapi=0;
	unset($arreglo);
	$conmil=1;
	while($mil = mysql_fetch_array($cad)){?>		
			<tr onmouseover="this.style.background='#00FF66';" onmouseout="this.style.background='#FFFFFF';">
      			<td width="50"><?=$mil[0];?></td>
      			<td width="200" style="font-size:14px"><?=strtolower($mil[1]);?></td>
				<?
 $palmil = mysql_query("select m.id_meta, m.clave, d.monto from meta_departamento d join
 meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." order by m.clave"); 
  $sumilla=0;
 $yo=1;
 $i=1;
 while($milpa = mysql_fetch_array($palmil)){
	 if($yo>$con)
	 {
		 $yo=1;
	 }
	$obj=new partida_departamento($milpa[1],$mil[0],$grantotal[1]);

?>  
   			  <td align="center" width="<?=$wit;?>">
                   <input name="txt_<?=$w;?>_<?=$conmil;?>_hidmeta_<?=$i;?>" type="text" id="txt_<?=$w;?>_<?=$conmil;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$conmil;?>,<?=$i;?>,<?=$w;?>);" onkeypress="return decimales(event,this);" size="8" value="<? if($obj->getingreso_propio()!=0){ echo "$".number_format($obj->getingreso_propio());}?>" title="<?=$mil[0];?>"/>

        <input name="hid_<?=$w;?>_<?=$conmil;?>" type="hidden" id="hid_<?=$w;?>_<?=$conmil;?>" value="<?=$mil[0];?>"/>
        <input type="hidden" name="h_<?=$w;?>_<?=$conmil;?>_meta_<?=$i;?>" id="h_<?=$w;?>_<?=$conmil;?>_meta_<?=$i;?>" /></td>
   			  <? 
$i++;
$yo++;
}
?>	
   			  <td align="center" width="80"><input name="txt_total_<?=$w;?>_<?=$conmil;?>" type="text" id="txt_total_<?=$w;?>_<?=$conmil;?>" size="9" readonly="true" />
		      <input name="h_total_<?=$w;?>_<?=$conmil;?>" type="hidden" id="h_total_<?=$w;?>_<?=$conmil;?>" /></td>
    		</tr>
 <? 
 	$conmil++;
 //----------------TUPLA DEL CAPITULO 1000

 }?>		
 		</table>
		  </div>
</td> 
    </tr>
		  	  <script language="javascript">
	  		document.getElementById('d_<?=$w;?>').style.display = "none"; </script>	
    
	<?
}	
	 //-------------------- ULTIMA TUPLA -------------------?>
	
    <tr>
      <td>
		<table width="<?=$totabla;?>"  border="0" cellpadding="0" cellspacing="0">
			<tr align="center">
			<td width="250">
	  <strong>TOTAL DE CAPITULOS </strong></td>
	  
 <? for($x=1;$x<=$con;$x++){?>	
      <td align="center" width="<?=$wit;?>"><input name="allcapi_<?=$x;?>" type="text" id="allcapi_<?=$x;?>" size="8" readonly="true" />
        <input name="Hallcapi_<?=$x;?>" type="hidden" id="Hallcapi_<?=$x;?>"/></td>
<? }?>	  
      <td width="80" align="center"><input name="TOTAL" type="text" id="TOTAL" size="9" readonly="true"/>
        <input name="hTOTAL" type="hidden" id="hTOTAL" /></td>
    </tr>
	</table>
	</td>
	</tr>
    <tr>
      <td>&nbsp;</td>
	</tr>
  </table>

  <table width="50%" border="0" align="center">
  <tr>
    <td colspan="2" align="center"><input type="button" name="button" id="button" value="Imprimir" onclick="imprimir(<?=$clvdepa;?>)"/></td>  
  </tr>  
  </table>
  <?
$c_poa = mysql_query("select poa from departamento where id_departamento=".$clvdepa);
$poa = mysql_fetch_array($c_poa);
if($poa[0]==0)
{
  
  ?>  
<table width="50%" border="0" align="center">
  <tr>
    <td align="center"><input type="button" name="Button" value="Guardar cambios" onclick="salvar();"/></td>
    <td align="center"><input type="button" name="Button" value="Enviar Distribucci&oacute;n" onclick="validar();"/>
      <input name="h_enviar" type="hidden" id="h_enviar" value="0" /></td>
  </tr>
</table>  
<?
}
if(isset($_POST['TOTAL']) && $_POST['TOTAL']!='')
{
	$cmeta=$_POST['hidtotmeta'];
	$depar=$_POST['clvdepa'];
	$clvdepartamento=$_POST['clvdeparta'];
	//mysql_query("delete from partida_departamento where id_departamento=".$depar. " and periodo='".date('Y')."'");
	//$resu = mysql_fetch_row($cho);
	//$depar=$resu[0];
	//------------------al momento de mandar llamar a los obj verificar si es un agregar o un modificar
	//echo "<br>cmeta:".$cmeta;
	$cad='';
	$sum=0;		
	for($z=1000;$z<=9000;$z+=1000)
	{	
		$mile=$_POST["tot_".$z."_partidas"];
		for($m=1;$m<=$cmeta;$m++)
		{
			for($q=1;$q<=$mile;$q++)
			{
				if($_POST["txt_".$z."_".$q."_hidmeta_".$m]=='' || $_POST["txt_".$z."_".$q."_hidmeta_".$m]=='$0')
					continue;
				$monto=$_POST["h_".$z."_".$q."_meta_".$m];
				$partida=$_POST["hid_".$z."_".$q];
				$meta=$_POST["hidmeta_".$m];
				
				if($z==5000)
				{
					$cad.="&monto".$sum."=".$monto."&partida".$sum."=".$partida."&meta".$sum."=".$meta."&poli";
					$sum++;
				}	
			
				//$obj_meta=new Meta($meta);			
				//$id_meta =$obj_meta->getid_meta();			
				//$obj_parti=new Partida($partida);	
				//$id_partida =$obj_parti->getid_partida();
				$id_meta = mysql_fetch_array(mysql_query("select id_meta FROM meta where clave='".$meta."'")); 
				$id_partida = mysql_fetch_array(mysql_query("select id_partida from partida where clave = " .$partida)); 
				//se crea el objeto y se rellena con los datos
				$obj=new partida_departamento();
				$obj->setid_meta($id_meta[0]);
				$obj->setid_partida($id_partida[0]);
				$obj->setid_departamento($depar);
				$obj->setingreso_propio($monto);
				$obj->setvigencia(date("Y/m/d"));
				$obj->agregar();
				$obj_pa=new Partida($partida);
				$obj_pa->modificamonto();
							
				//echo "<br>monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>objeto partida: ". $partida. "<br>";		
			}
		}
	}	
	
	//echo "<br>";	
	//-------------------------------------------------------------------------------------------
	//for para mandar llamar al objeto meta y al objero meta_departamento

	for($m=1;$m<=$cmeta;$m++)
	{

		if($_POST["allcapi_".$m]=='' || $_POST["allcapi_".$m]=='$0')
			continue;
		$meta=$_POST["hidmeta_".$m];
				
		//echo "objeto meta llama: ".$meta."<br>objeto meta departamento: ".$meta." ".$clvdepartamento."<br>";	
		
		//creo objeto para meta departamento
		$obj_metadepa=new Meta_departamento($clvdepartamento,$meta);
		$obj_metadepa->modificar();
		$uidmeta=$obj_metadepa->getid_meta();
		//creo objeto para meta
		$arameta=mysql_fetch_array(mysql_query("select sum(ingreso_propio) FROM partida_departamento where id_meta=".$uidmeta));
		mysql_query("UPDATE meta SET monto = ".$arameta[0]." WHERE id_meta = ".$uidmeta);
		//$obj_meta=new Meta($meta);
		//$obj_meta->modificamonto();		
		
	}
	//for para mandar llamar al objeto capitulo y meta_capitulo
	//echo "<br>";
	for($c=1000;$c<=9000;$c+=1000)
	{
		for($m=1;$m<=$cmeta;$m++)
		{
			if($_POST["txtall_".$c]=='' || $_POST["txtall_".$c]=='$0' || $_POST["txt_".$c."_".$m]=='' || $_POST["txt_".$c."_".$m]=='$0')	
				continue;
				
			if($_POST["h_enviar"]==1)
			{
				$meta=$_POST["hidmeta_".$m];	
			//	echo "objeto meta capitulo: ".$meta." ".$c."<br>";
				//echo "enviar=1<br>";
				//mando llamar al objeto meta_capitulo se obtiene el id del capitulo y meta
				
				//$obj_meta=new Meta($meta);			
				//$id_meta =$obj_meta->getid_meta();
				//$obj_capi=new Capitulo($c);						
				//$id_capitulo=$obj_capi->getid_capitulo();
				$id_meta = mysql_fetch_array(mysql_query("select id_meta FROM meta where clave='".$meta."'")); 
				$id_capitulo = mysql_fetch_array(mysql_query("select id_capitulo FROM capitulo where clave=".$c)); 
				$peri=date('Y');
				//consulta para chekar si ya existe esa tupla
			//	echo "<br>el id de la meta: ".$id_meta." el id del capitulo: ".$id_capitulo."<br>";
							
				$obj_mc=new Meta_capitulo($meta,$c);
				$numero =$obj_mc->getclave_meta();
			
				if($numero!='')
				{			
					$obj_mc->modificar();
				}
				else
				{
					$obj_mc->setid_meta($id_meta[0]);
					$obj_mc->setid_capitulo($id_capitulo[0]);
					$obj_mc->agregar();			
				}
							
			}													
		}	
		if($_POST["txtall_".$c]=='' || $_POST["txtall_".$c]=='$0')	
			continue;
		//mando llamar al objeto capitulo
		//echo "Objeto capitulo:".$c."<br>";
		$aracapi=mysql_fetch_array(mysql_query("select SUM(p.ingreso_propio) from partida_departamento p join partida pa on p.id_partida=pa.id_partida where pa.clave BETWEEN ".$c." and (".$c." +999)"));
		if($aracapi[0]!=NULL)
		{
			$money=$aracapi[0];
		}else{
			$money=0;
		}
		mysql_query("UPDATE capitulo SET ingresos_propios = ".$money." WHERE clave = ".$c);
		//$obj_capitulo=new Capitulo($c);
		//$obj_capitulo->modificaCapitulos();
	}
	//for para mandar llamar al objeto proceso_clave_meta
	//echo "<br>FOR PARA PROCESO CLAVE META<br>";
	for($m=1;$m<=$cmeta;$m++)
	{
		$meta=$_POST["hidmeta_".$m];
		list($p_estra, $p_clave, $y_meta) = split('[.]', $meta);
		list($a_estra_repe[], $a_clave_repe[], $pornomas) = split('[.]', $meta);		

		//concateno estrategico con clave pa tener la clave de proceso clave
		$clvcomp=$p_estra.".".$p_clave;
		//echo "proceso clave: ".$clvcomp." meta:".$meta."<br>";		
		$pclv_clave[]=$clvcomp;	
		//creo objeto procesoclave_meta
		$obj_pclvmeta=new Procesoclave_Meta($clvcomp,$meta);
		$obj_pclvmeta->modificamonto();
	}	
	$a_estra=array_unique($a_estra_repe);
	$a_clave=array_unique($a_clave_repe);
	$a_clavematon=array_unique($pclv_clave);

	foreach($a_clavematon as $procesoclave)
	{
		//echo "objeto proceso clace:".$procesoclave."<br>";
		//objeto proceso clave
		$uidpcla=mysql_fetch_array(mysql_query("select id_procesoclave from procesoclave where clave='".$procesoclave."'"));
		$dinero=mysql_fetch_array(mysql_query("select sum(monto) from procesoclave_meta where id_procesoclave=".$uidpcla[0]));
		mysql_query("update procesoclave set monto=".$dinero[0]. " where id_procesoclave=".$uidpcla[0]);

		//$obj_pclave=new proceso_clave($procesoclave);
		//$obj_pclave->modificamonto();		
	}
	
	//echo "<br>FOR PARA PROCESO ESTRATEGICO<br>";
	foreach($a_estra as $estrategico)
	{
		$uidpest=mysql_fetch_array(mysql_query("select id_procesoestrategico from procesoestrategico where clave='".$estrategico."'"));
		$dineros=mysql_fetch_array(mysql_query("select sum(monto) from procesoclave where id_procesoestrategico=".$uidpest[0]));
		mysql_query("update procesoestrategico set monto=".$dineros[0]." where id_procesoestrategico=".$uidpest[0]);
		//echo "objeto proceso estrategico:".$estrategico."<br>";
		//creo objeto para proceso estrategico
		//$obj_pestrate=new proceso_estrategico($estrategico);
		//$obj_pestrate->modificamonto();
	}	
	if($_POST["h_enviar"]==1)
	{
		$departame=new Departamento($clvdepartamento);
		$departame->setpoa(1);
		$departame->modificarDepartamento();
	}	
	

	if(!($cad==''))
	{
		$cad.="&sum=".$sum;	
		echo '<script lenguaje="javascript">open("cincomil.php?'.$cad.'","_self");</script>';		
	}		 

}
?>

</form>

</body>
</html>