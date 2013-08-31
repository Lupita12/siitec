<? session_start();?>
<? include("conexion.php"); ?>
<? include("cls_accion_capitulo.php"); ?>
<? include("cls_meta.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" >
<title>Administrador de contenidos web - Tecnológico de Colima</title>
<script language="javascript">
var valor3=0;
var valor4=0;
var valor5=0;
var valor6=0;
var valor7=0;
var valor8=0;
var valor9=0;

function dato(campo,campo1)
{
 with(document.form1)
 {
 	if(document.getElementById('txt_'+campo+'_'+campo1).value =='')
		valor3=0;
	else
		valor3=document.getElementById('txt_'+campo+'_'+campo1).value;
	if(document.getElementById('txt'+campo+'_'+campo1).value =='')
		valor4=0;
	else
		valor4=document.getElementById('txt'+campo+'_'+campo1).value
	if(document.getElementById('txtingresocubrir_'+campo1).value =='')
		valor5=0;
	else
		valor5=document.getElementById('txtingresocubrir_'+campo1).value
	if(document.getElementById('txttotalpres_'+campo1).value =='')
		valor6=0;
	else
		valor6=document.getElementById('txttotalpres_'+campo1).value
	if(document.getElementById('txtenejuntotal_'+campo1).value =='')
		valor7=0;
	else
		valor7=document.getElementById('txtenejuntotal_'+campo1).value
	if(document.getElementById('txtjuldictotal_'+campo1).value =='')
		valor8=0;
	else
		valor8=document.getElementById('txtjuldictotal_'+campo1).value
	
  }
}

function calendarioprogramatico()
{
 with(document.form1)
 {
	var valor=0;
	var valor2=0;
	var resultado=0;
	if(document.getElementById('txtenerojun').value =='')
		return;
	if(document.getElementById('txtenerojun').value >100){
		alert("NO TE PUEDES PASAR DEL 100%");
		document.getElementById('txtenerojun').value=0;}
	valor = parseInt(document.getElementById('txtenerojun').value);
	resultado=100-valor;
	document.getElementById('porcentaje_enero_junio').value=valor;
	document.getElementById('txtjuldic').value=resultado;
	document.getElementById('txttotal').value = 100;

 }
}
function monto(campo,campo1)
{
 with(document.form1)
 {

	var valor=0;
	var valor2=0;
	var resultado=0;
	var resultotal=0;
	var sum1=0;
	var total1=0;
	var resultotal1=0;
	var bla=0;
	var dat=0;
	var dat2=0;

//VALIDO QUE NO SE PASE DEL 100%
	for(i=1;i<=hidc.value;i++)
	{
		if(document.getElementById('txt_'+campo+'_'+i).value =='')
			continue;
		dat+=parseInt(document.getElementById('txt_'+campo+'_'+i).value);
	}
	if(dat>100)
	{
		alert("NO TE DEBES PASAR DEL 100%");
		document.getElementById('txt_'+campo+'_'+campo1).value=valor3;
		document.getElementById('txt'+campo+'_'+campo1).value=valor4;
		return;
	}
	
	if(document.getElementById('txt_'+campo+'_'+campo1).value =='')
		return;
	if(document.getElementById('monto_'+campo).value==0){
		alert("NO EXISTE UN MONTO TOTAL");
		document.getElementById('txt_'+campo+'_'+campo1).value =''
		return;}
	
	document.getElementById('h_'+campo+'_'+campo1).value=parseInt(document.getElementById('txt_'+campo+'_'+campo1).value);	
	valor = parseInt(document.getElementById('txt_'+campo+'_'+campo1).value);
	valor2 = parseInt(document.getElementById('monto_'+campo).value);
	resultado = valor*valor2;
	bla=resultado/100;
	
	
	document.getElementById('h'+campo+'_'+campo1).value=bla;
	document.getElementById('txt'+campo+'_'+campo1).value=formatNumber((resultado/100),'$');

	//document.getElementById('txt'+campo+'_'+campo1).value=0
	//document.getElementById('txt'+campo+'_'+campo1).value=bla;
//VALIDO QUE NO SEA MENOS DEL 100%
//DE AQUI PA ARRIBA SAQUE LOS PORCENTAJES


	//for(i=campo1;i<=campo1;i++)//continue;
	//{
		if(document.getElementById('txting1000_'+campo1).value==''){
			resultotal+=parseInt(document.getElementById('hing1000_'+campo1).value=0);
		}else{resultotal+=parseInt(document.getElementById('hing1000_'+campo1).value);}
		if(document.getElementById('txting2000_'+campo1).value==''){
			resultotal+=parseInt(document.getElementById('hing2000_'+campo1).value=0);
		}else{resultotal+=parseInt(document.getElementById('hing2000_'+campo1).value);}
		if(document.getElementById('txting3000_'+campo1).value==''){
			resultotal+=parseInt(document.getElementById('hing3000_'+campo1).value=0);
		}else{resultotal+=parseInt(document.getElementById('hing3000_'+campo1).value);}
		if(document.getElementById('txting5000_'+campo1).value==''){
			resultotal+=parseInt(document.getElementById('hing5000_'+campo1).value=0);
		}else{resultotal+=parseInt(document.getElementById('hing5000_'+campo1).value);}
		if(document.getElementById('txting7000_'+campo1).value==''){
			resultotal+=parseInt(document.getElementById('hing7000_'+campo1).value=0);
		}else{resultotal+=parseInt(document.getElementById('hing7000_'+campo1).value);}
	//}

	document.getElementById('txtingresocubrir_'+campo1).value=0;
	
	document.getElementById('hingresocubrir_'+campo1).value=resultotal;
	document.getElementById('txtingresocubrir_'+campo1).value=formatNumber((resultotal),'$');
//AQUI PA ARRIBA TOTALES DE GASTO DIRECTO E INGRESO PROPIO
	sum1=parseInt(document.getElementById('hingresocubrir_'+campo1).value);
	if(document.getElementById('montogasto_'+campo1).value==''){
		total1=total1=document.getElementById('montogasto_'+campo1).value=0;;
	}else{
		total1=parseInt(document.getElementById('montogasto_'+campo1).value);
	}
	resultotal1=sum1+total1;
	document.getElementById('txttotalpres_'+campo1).value=0;
	
	document.getElementById('htotalpres_'+campo1).value=resultotal1;
	document.getElementById('txttotalpres_'+campo1).value=formatNumber((resultotal1),'$');
	
	
	
	
	
	var valin=document.getElementById('txt_'+campo+'_'+campo1).value
	
	if(document.getElementById('monto_ing1000').value!=0 && document.getElementById('txt_ing1000_'+campo1).value=='')
	{
		document.getElementById('txt_ing1000_'+campo1).value=document.getElementById('txt_'+campo+'_'+campo1).value
		cargar();
	}else{
		if (document.getElementById('txt_ing1000_'+campo1).value!=valin && document.getElementById('monto_ing1000').value!=0)
		{
		document.getElementById('txt_ing1000_'+campo1).value=valin;
		cargar();
		}
	}
	
	if(document.getElementById('monto_ing2000').value!=0 && document.getElementById('txt_ing2000_'+campo1).value=='')
	{
		document.getElementById('txt_ing2000_'+campo1).value=document.getElementById('txt_'+campo+'_'+campo1).value
		cargar();
	}else{
		if (document.getElementById('txt_ing2000_'+campo1).value!=valin && document.getElementById('monto_ing2000').value!=0)
		{
		document.getElementById('txt_ing2000_'+campo1).value=valin;
		cargar();
		}
	}
	
	
		if(document.getElementById('monto_ing3000').value!=0 && document.getElementById('txt_ing3000_'+campo1).value=='')
	{
		document.getElementById('txt_ing3000_'+campo1).value=document.getElementById('txt_'+campo+'_'+campo1).value
		cargar();
	}else{
		if (document.getElementById('txt_ing3000_'+campo1).value!=valin && document.getElementById('monto_ing3000').value!=0)
		{
		document.getElementById('txt_ing3000_'+campo1).value=valin;
		cargar();
		}
	}
	
	
		if(document.getElementById('monto_ing5000').value!=0 && document.getElementById('txt_ing5000_'+campo1).value=='')
	{
		document.getElementById('txt_ing5000_'+campo1).value=document.getElementById('txt_'+campo+'_'+campo1).value
		cargar();
	}else{
		if (document.getElementById('txt_ing5000_'+campo1).value!=valin && document.getElementById('monto_ing5000').value!=0)
		{
		document.getElementById('txt_ing5000_'+campo1).value=valin;
		cargar();
		}
	}
	
	
	
	
//AQUI PA ARRIBA LOS TOTALES DE TODO
	for(i=1;i<=hidc.value;i++)
	{
		if(document.getElementById('txt_'+campo+'_'+i).value !='')
		{
		dat2+=parseInt(document.getElementById('txt_'+campo+'_'+i).value);
		}else{return;}
	}
	if(dat2<100)
	{
		alert("NO ASIGNASTE EL 100%");
		//document.getElementById('txt_'+campo+'_'+campo1).value=valor3;
		//document.getElementById('txt'+campo+'_'+campo1).value=valor4;
		//document.getElementById('txtingresocubrir_'+campo1).value=valor5;
		//document.getElementById('txttotalpres_'+campo1).value=valor6;
		return;
	}
	
 }
}
function monto1(campo)
{
 with(document.form1)
 {
	var variable=0;
	var variable1=0;
	var variable2=0;
	var variable3=0;
	var valor=0;
	var valor1=0;
	var resultado1=0;
	var resultado=0;
	var dato=0;
	var dato1=0;
	var dato2=0;
	var dato3=0;
	var total=0;
	var total1=0;
	var total2=0;
	var valor9=0;

	 if(document.getElementById('txtenejuning').value=='')
		return;
	if(document.getElementById('txtenejuning').value >100){
		alert("NO TE PUEDES PASAR DEL 100%");
		document.getElementById('txtenejuning').value=valor9;}

	for(i=1;i<=hidc.value;i++)
	{

		
		if(document.getElementById('txtingresocubrir_'+i).value==''){
			alert("ASIGNA LOS MONTOS PRIMERO");
			for(i=1;i<=hidc.value;i++)
			{
			document.getElementById('txtenejuning').value=''
			document.getElementById('txt_enejuning_'+i).value='';
			document.getElementById('txt_enejungas_'+i).value='';
			document.getElementById('txtenejuntotal_'+i).value='';
			document.getElementById('txtenejuntot').value='';
			document.getElementById('txtenejuntot1').value=''
			document.getElementById('txttotalenerojunio').value='';
			}
			return;
		}else{
			variable = parseInt(document.getElementById('txtenejuning').value);
			variable1 = parseInt(document.getElementById('hingresocubrir_'+i).value);
		}
		variable2 = variable*variable1;
		resultado=variable2/100;
		document.getElementById('txt_enejuning_'+i).value=0;
		
		document.getElementById('h_enejuning_'+i).value=resultado;
		document.getElementById('txt_enejuning_'+i).value=formatNumber((resultado),'$');
		
		valor=parseInt(document.getElementById('montogasto_'+i).value);
		valor1 = variable*valor;
		resultado1=valor1/100;
		document.getElementById('txt_enejungas_'+i).value=0;
		
		document.getElementById('h_enejungas_'+i).value=resultado1;
		document.getElementById('txt_enejungas_'+i).value=formatNumber((resultado1),'$');

		
		total=resultado+resultado1;
		document.getElementById('txtenejuntotal_'+i).value=0;
		
		document.getElementById('henejuntotal_'+i).value=total;
		document.getElementById('txtenejuntotal_'+i).value=formatNumber((total),'$');

		
		dato+=parseInt(document.getElementById('h_enejuning_'+i).value);
		document.getElementById('txtenejuntot').value=0;
		
		document.getElementById('henejuntot').value=dato;
		document.getElementById('txtenejuntot').value=formatNumber((dato),'$');
		
		
		dato1+=parseInt(document.getElementById('h_enejungas_'+i).value);
		document.getElementById('txtenejuntot1').value=0;
		
		document.getElementById('henejuntot1').value=dato1;
		document.getElementById('txtenejuntot1').value=formatNumber((dato1),'$');

		
		total1+=parseInt(document.getElementById('henejuntotal_'+i).value);
		document.getElementById('txttotalenerojunio').value=0;
		
		document.getElementById('htotalenerojunio').value=total1;		
		document.getElementById('txttotalenerojunio').value=formatNumber((total1),'$');
		
	}

	variable = parseInt(document.getElementById('txtenejuning').value);
	variable3=100-variable;
	
	document.getElementById('henejuning').value= parseInt(document.getElementById('txtenejuning').value);
	document.getElementById('hjuldicing').value=variable3;
	
	document.getElementById('txtjuldicing').value=0;
	document.getElementById('txtjuldicing').value=variable3;
	for(i=1;i<=hidc.value;i++)
	{

		variable = parseInt(document.getElementById('txtjuldicing').value);
		variable1 = parseInt(document.getElementById('hingresocubrir_'+i).value);

		variable2 = variable*variable1;
		resultado=variable2/100;
		document.getElementById('txt_juldicing_'+i).value=0;
		
		document.getElementById('h_juldicing_'+i).value=resultado;		
		document.getElementById('txt_juldicing_'+i).value=formatNumber((resultado),'$');
		
		valor=parseInt(document.getElementById('montogasto_'+i).value);
		valor1 = variable*valor;
		resultado1=valor1/100;
		document.getElementById('txt_juldicgas_'+i).value=0;
		
		document.getElementById('h_juldicgas_'+i).value=resultado1;
		document.getElementById('txt_juldicgas_'+i).value=formatNumber((resultado1),'$');
		
		total=resultado+resultado1;
		document.getElementById('txtjuldictotal_'+i).value=0;
		
		document.getElementById('hjuldictotal_'+i).value=total;		
		document.getElementById('txtjuldictotal_'+i).value=formatNumber((total),'$');
		
		dato2+=parseInt(document.getElementById('h_juldicing_'+i).value);
		document.getElementById('txtjuldictot').value=0;
		
		document.getElementById('hjuldictot').value=dato2;		
		document.getElementById('txtjuldictot').value=formatNumber((dato2),'$');
		
		dato3+=parseInt(document.getElementById('h_juldicgas_'+i).value);
		document.getElementById('txtjuldictot1').value=0;
		
		document.getElementById('hjuldictot1').value=dato3;
		document.getElementById('txtjuldictot1').value=formatNumber((dato3),'$');
		
		total2+=parseInt(document.getElementById('hjuldictotal_'+i).value);
		document.getElementById('txttotaljuliodiciembre').value=0;
		
		document.getElementById('htotaljuliodiciembre').value=total2;
		document.getElementById('txttotaljuliodiciembre').value=formatNumber((total2),'$');

	}
 }
}
function impri()
{
 with(document.form1)
 {
	for(i=1;i<=hidc.value;i++)
	{
		if(document.getElementById('monto_ing1000').value==0){
			//alert("ya lo brinco el 1000");
		}else{
		if(document.getElementById('txt_ing1000_'+i).value ==''){
			alert("DEJASTE UN CAMPO EN BLANCO");
			document.getElementById('txt_ing1000_'+i).focus();
			return;}
		}
		if(document.getElementById('monto_ing2000').value==0){
			//alert("ya lo brinco el 2000");
		}else{
		if(document.getElementById('txt_ing2000_'+i).value ==''){
			alert("DEJASTE UN CAMPO EN BLANCO");
			document.getElementById('txt_ing2000_'+i).focus();
			return;}
		}
		if(document.getElementById('monto_ing3000').value==0){
			//alert("ya lo brinco el 3000");
		}else{
		if(document.getElementById('txt_ing3000_'+i).value ==''){
			alert("DEJASTE UN CAMPO EN BLANCO");
			document.getElementById('txt_ing3000_'+i).focus();
			return;}
		}
		if(document.getElementById('monto_ing5000').value==0){
			//alert("ya lo brinco el 4000");
		}else{
		if(document.getElementById('txt_ing5000_'+i).value ==''){
			alert("DEJASTE UN CAMPO EN BLANCO");
			document.getElementById('txt_ing5000_'+i).focus();
			return;}
		}
		if(document.getElementById('monto_ing7000').value==0){
			//alert("ya lo brinco el 5000");
		}else{
		if(document.getElementById('txt_ing7000_'+i).value ==''){
			alert("DEJASTE UN CAMPO EN BLANCO");
			document.getElementById('txt_ing7000_'+i).focus();
			return;}
		}
		if(document.getElementById('txtenejuning').value ==''){
			alert("DEJASTE UN CAMPO EN BLANCO");
			document.getElementById('txtenejuning').focus();
			return;}

	} 
	 		document.form1.submit();
			//document.from1.method="POST".action="imprimir_apoa.php";
			//open('imprimir_apoa.php','_self','post');

 }
}
function redireccionar(meta){
	 with(document.form1)
 {
		var campos = '&metas='+meta; 
		open('calis_apoa.php?id='+campos,'_self');
 }
}
function cambiarDisplay(id,id2) {
	
  if (!document.getElementById) return false;
  fila = document.getElementById(id);
  if (fila.style.display != "none") {
    fila.style.display = "none"; //ocultar fila
	document.getElementById('mostrar').value=1;
  } else {
    fila.style.display = ""; //mostrar fila	
	document.getElementById('mostrar').value=2;
  }
  
   if (!document.getElementById) return false;
  fila = document.getElementById(id2);
  if (fila.style.display != "none") {
    fila.style.display = "none"; //ocultar fila
	document.getElementById('mostrar').value=1;
  } else {
    fila.style.display = ""; //mostrar fila 
	document.getElementById('mostrar').value=2;
  }
}
function formatNumber(num,prefix){
	prefix = prefix || '';
	num += '';
	var splitStr = num.split('.');
	var splitLeft = splitStr[0];
	var splitRight = splitStr.length > 1 ? '.' + splitStr[1] : '';
	var regx = /(\d+)(\d{3})/;
	while (regx.test(splitLeft)) {
		splitLeft = splitLeft.replace(regx, '$1' + ',' + '$2');
	}
	return prefix + splitLeft + splitRight;
}

function cargar()
{
	with(document.form1)
	{
			

			
			for(v=1000;v<=5000;v+=1000)
			{
				//alert(v);
				if(v!=4000)
				{
					if(v!=6000)
					{
						for(z=1;z<=parseInt(cont.value);z++)
						{
							if(document.getElementById('txt_ing'+v+'_'+z).value !=0)
							{
								modi.value=1;
								monto('ing'+v,z);
							}
						}	
					}
				}
			}
			for(a=1;a<=parseInt(cont.value);a++)
			{
				monto1('enejuning');
			}
			for(b=1;b<=parseInt(cont.value);b++)
			{
				monto1('juldicing');
			}
			//for(c=1;c<=parseInt(cont.value);b++)
			//{
				calendarioprogramatico();
			//}	
	
	}
}
function guar()
{
	with(document.form1)
	{
		condicion.value=1;
		document.form1.submit();
	}
}

</script>
</head>

<style type="text/css">
<!--
@import"cssmenuhorizontal.css";
-->
/*
body {
margin: 0;
padding: 30px;
background: #FFF;
color: #666;
}
*/
h1 {
font: bold 16px Arial, Helvetica, sans-serif;
}
p {
font: 11px Arial, Helvetica, sans-serif;
}
a {
color: #900;
text-decoration: none;
}f
a:hover {
background: #900;
color: #fff;
}
</style>

<body onload="cargar();">
<form id="form1" name="form1" method="post" action="imprimir_apoa.php" >
  <?PHP

$clavesesion =$_GET['combo_meta'];


	//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
	$Sqlaso="SELECT clave, nombre, id_accion FROM accion WHERE id_meta = $clavesesion";
	$ISqlaso = mysql_query($Sqlaso);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	//$num=mysql_num_rows($ISql);
	while($rowq = mysql_fetch_array($ISqlaso))
	{
		$vas=$rowq[2];	
	}
	$aso="SELECT enero_junio,julio_diciembre,porcentaje_enero_junio FROM accion_capitulo WHERE id_accion = $vas";
	$asos = mysql_query($aso);
	$rowaso = mysql_fetch_array($asos);

	
?>
  <table width="1579" border="0" align="center"><input name="condicion" type="hidden" id="condicion" />
    
    <tr>
      <td colspan="16" align="center" ><strong>ANTEPROYECTO DEL PROGRAMA OPERATIVO ANUAL 2010</strong> </td>
    </tr>
    <tr>
      <td colspan="16" align="center"><strong>DESGLOSE DE METAS POR PROCESO CLAVE</strong> </td>
    </tr>
    <tr>
      <td colspan="16" align="center"><strong> INSTITUTO TECNOLOGICO O CENTRO: COLIMA</strong> </td>
    </tr>
    <tr>
  <?
	$Sqlestra="SELECT pe.nombre FROM (procesoclave_meta pm join procesoclave p on pm.id_procesoclave = p.id_procesoclave) join procesoestrategico pe on pe.id_procesoestrategico = p.id_procesoestrategico WHERE pm.id_meta =$clavesesion"; 
	$ISqlestra = mysql_query($Sqlestra);;
	$rowestra = mysql_fetch_array($ISqlestra);

?>
      <td colspan="7" align="center"><strong> Proceso Estrategico: <?=$rowestra['0']; ?><input name="ProcesoEstrategico" type="hidden" id="ProcesoEstrategico" value="<?=$rowestra['0']; ?>"/></strong></td>
      <td width="173" align="center">&nbsp;</td>
      <td width="48" align="center">HOJA:</td>
      <td width="60" align="center"><label>
        <input name="hoja" type="text" id="hoja" size="10" />
      </label></td>
      <td width="38" align="center">DE</td>
      <td width="69" align="center"><label>
        <input name="de" type="text" id="de" size="10" />
      </label></td>
    </tr>
    <?
	$Sqlproce="SELECT pc.gf, pc.fn, pc.sf, pc.ai, pc.pp, pc.codigo FROM procesoclave_meta pm join procesoclave pc on pm.id_procesoclave = pc.id_procesoclave WHERE id_meta =$clavesesion";
	$ISqlproce = mysql_query($Sqlproce);
	$rowproce = mysql_fetch_array($ISqlproce);

?> 
    
    <tr>
      <td width="729" align="right"><strong>Clave Programatica y nombre del Proceso Clave:</strong> </td>
      <td width="61" align="center"><input name="clave1" type="text" id="clave1" size="10" value="<?=$rowproce[0];?>" /></td>
      <td width="60" align="center"><input name="clave2" type="text" id="clave2" size="10" value="<?=$rowproce[1];?>" /></td>
      <td width="60" align="center"><input name="clave3" type="text" id="clave3" size="10" value="<?=$rowproce[2];?>" /></td>
      <td width="60" align="center"><input name="clave4" type="text" id="clave4" size="10" value="<?=$rowproce[3];?>" /></td>
      <td width="63" align="center"><input name="clave5" type="text" id="clave5" size="10" value="<?=$rowproce[4];?>" /></td>
      <td width="108" align="center"><input name="clave6" type="text" id="clave6" size="10" value="<?=$rowproce[5];?>" /></td>
      <?
	$Sqlprocesoclave="SELECT pc.nombre FROM procesoclave_meta pm join procesoclave pc on pm.id_procesoclave = pc.id_procesoclave WHERE id_meta =$clavesesion";
	$ISqlprocesoclave = mysql_query($Sqlprocesoclave);;
	$rowprocesoclave = mysql_fetch_array($ISqlprocesoclave);

?>
      <td colspan="5" align="left"><strong><?=$rowprocesoclave['0']; ?><input name="Procesoclave" type="hidden" id="Procesoclave" value="<?=$rowprocesoclave['0']; ?>"/></strong></td>
    </tr>
    
  </table>
  <table width="1579" border="1">
    <tr>
  <?
$Sqlclave="SELECT clave FROM meta WHERE id_meta =$clavesesion";
	$ISqlclave = mysql_query($Sqlclave);;
	$rowclave = mysql_fetch_array($ISqlclave);
	$clavemeta = $rowclave['clave'];
?> 
      <td height="27" colspan="3" bgcolor="#999999">Meta: <?=$clavemeta; ?><input name="clavemeta" type="hidden" id="clavemeta" value="<?=$clavemeta; ?>"/></td>
      <td width="56" rowspan="3" align="center" bgcolor="#999999"><p>Acciones</p></td>
      <td colspan="3" align="center" bgcolor="#999999">Calendario Programatico </td>
      <td colspan="8" align="center" bgcolor="#999999">Monto de recursos por capitulo de gasto.</td>
      <td colspan="2" rowspan="2" align="center" bgcolor="#999999"><p>Presupuesto a cubrir a traves de </p>      </td>
      <td width="78" rowspan="3" align="center" bgcolor="#999999">Total Presupuesto </td>
      <td colspan="6" align="center" bgcolor="#999999">Presupuestacion calendarizada </td>
    </tr>
    <tr>
      <td width="76" rowspan="2" align="center" bgcolor="#999999">Numero y Descripcion      </td>
      <td width="48" rowspan="2" align="center" bgcolor="#999999">Unidad de medida </td>
      <td width="55" rowspan="2" bgcolor="#999999">Cantidad</td>
      <td width="63" rowspan="2" align="center" bgcolor="#999999">Enero Junio </td>
      <td width="63" rowspan="2" align="center" bgcolor="#999999">Julio Dic. </td>
      <td width="63" rowspan="2" align="center" bgcolor="#999999">Total</td>
      <td width="55" align="center" bgcolor="#999999">1000</td>
      <td colspan="2" align="center" bgcolor="#999999">2000</td>
      <td colspan="2" align="center" bgcolor="#999999">3000</td>
      <td width="55" align="center" bgcolor="#999999">4000</td>
      <td colspan="2" align="center" bgcolor="#999999">5000</td>
      <td colspan="3" bgcolor="#999999" align="center">Enero Junio 
        <input name="txtenejuning" type="text" id="txtenejuning" size="2" onblur="monto1('enejuning');" value="<? if ($rowaso['enero_junio']!=0) echo $rowaso['enero_junio'];?>" />
        %
      <input name="henejuning" type="hidden" id="henejuning"/></td>
      <td colspan="3" bgcolor="#999999" align="center">Julio Diciembre
        <input name="txtjuldicing" type="text" id="txtjuldicing" onfocus="dato('juldicing',<?=$con;?>);" onblur="monto1('juldicing',<?=$con;?>);" size="2" readonly="readonly" value="<? if($rowaso['julio_diciembre']!=0) echo $rowaso['julio_diciembre'];?>" />
        %
      <input name="hjuldicing" type="hidden" id="hjuldicing"/></td>
    </tr>
    <tr>
      <td bgcolor="#999999">Ingresos propios </td>
      <td width="55" align="center" bgcolor="#999999">Ingresos propios</td>
      <td width="55" align="center" bgcolor="#999999">Gasto Directo </td>
      <td width="55" align="center" bgcolor="#999999">Ingresos propios</td>
      <td width="52" align="center" bgcolor="#999999">Gasto Directo</td>
      <td bgcolor="#999999">Ingresos propios</td>
      <td width="55" align="center" bgcolor="#999999">Ingresos propios</td>
      <td width="55" align="center" bgcolor="#999999">Gasto Directo</td>
      <td width="60" bgcolor="#999999">Ingresos propios</td>
      <td width="60" bgcolor="#999999">Gasto Directo</td>
      <td width="60" align="center" bgcolor="#999999">Ingresos propios      </td>
      <td width="60" align="center" bgcolor="#999999">Gasto Directo      </td>
      <td width="60" align="center" bgcolor="#999999">Total</td>
      <td width="60" align="center" bgcolor="#999999">Ingresos propios      </td>
      <td width="60" align="center" bgcolor="#999999">Gasto Directo      </td>
      <td width="72" align="center" bgcolor="#999999">Total</td>
    </tr>
  <?PHP
	$Sql="SELECT clave, nombre, id_accion FROM accion WHERE id_meta = $clavesesion";
	$ISql = mysql_query($Sql);
	//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
	$num=mysql_num_rows($ISql);
	if($num>0)
	{
		//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
		$a=1;
		$con=1;
		while($row = mysql_fetch_array($ISql))
		{
		if($a==0)
		{  
        $a=1;}else{?>
    <tr class="odd">
      <? $a=0;}?>      
  <?

	$cap1000="SELECT id_capitulo FROM capitulo WHERE clave = 1000";
	$capi1000 = mysql_query($cap1000);
	$rowcap1000 = mysql_fetch_array($capi1000);
    $Accion_Capitulo1 = new Accion_Capitulo($row[2],$rowcap1000[0]);
	
	$cap2000="SELECT id_capitulo FROM capitulo WHERE clave = 2000";
	$capi2000 = mysql_query($cap2000);
	$rowcap2000 = mysql_fetch_array($capi2000);
    $Accion_Capitulo2 = new Accion_Capitulo($row[2],$rowcap2000[0]);
	
	$cap3000="SELECT id_capitulo FROM capitulo WHERE clave = 3000";
	$capi3000 = mysql_query($cap3000);
	$rowcap3000 = mysql_fetch_array($capi3000);
    $Accion_Capitulo3 = new Accion_Capitulo($row[2],$rowcap3000[0]);

	$cap5000="SELECT id_capitulo FROM capitulo WHERE clave = 4000";
	$capi5000 = mysql_query($cap5000);
	$rowcap5000 = mysql_fetch_array($capi5000);
    $Accion_Capitulo5 = new Accion_Capitulo($row[2],$rowcap5000[0]);

	$cap7000="SELECT id_capitulo FROM capitulo WHERE clave = 5000";
	$capi7000 = mysql_query($cap7000);
	$rowcap7000 = mysql_fetch_array($capi7000);
    $Accion_Capitulo7 = new Accion_Capitulo($row[2],$rowcap7000[0]);
	

	



	$Sqldes="SELECT descripcion FROM meta WHERE id_meta = $clavesesion";
	$ISqldes = mysql_query($Sqldes);
	$rowdes = mysql_fetch_array($ISqldes);
	$desmeta=$rowdes[0];
	
?>
      <td rowspan="2"><? if($con==1){ echo $rowdes[0];}?><input name="desmeta" type="hidden" id="desmeta" value="<?=$rowdes[0];?>" /></td>
  <?
	$Sqluni="SELECT unidad_de_medida FROM meta WHERE id_meta = $clavesesion";
	$ISqluni = mysql_query($Sqluni);
	$rowuni = mysql_fetch_array($ISqluni);
	
?>
      <td rowspan="2"><? if($con==1){ echo $rowuni[0];} ?><input name="unidadmedida" type="hidden" id="unidadmedida" value="<?=$rowuni[0];?>" /></td>
  <?
	$Sqlcant="SELECT cantidad FROM meta WHERE id_meta = $clavesesion";
	$ISqlcant = mysql_query($Sqlcant);
	$rowcant = mysql_fetch_array($ISqlcant);
	
?>
      <td rowspan="2"><? if($con==1){ echo $rowcant[0];} ?><input name="cantidad" type="hidden" id="cantidad" value="<?=$rowcant[0];?>" /></td>
      <td rowspan="2"><?=$row[1];?><input name="h_idaccion_<?=$con;?>" type="hidden" id="h_idaccion_<?=$con;?>" value="<?=$row[2];?>"/><input name="accion_<?=$con;?>" type="hidden" id="accion_<?=$con;?>" value="<?=$row[1];?>" /></td>
      <td rowspan="2"><? if($con==1){ ?><input name="txtenerojun" type="text" id="txtenerojun" size="10" onblur="calendarioprogramatico();" value="<? if ($rowaso['porcentaje_enero_junio']!=0) echo $rowaso['porcentaje_enero_junio'];?>" /> <? }?><input name="porcentaje_enero_junio" type="hidden" id="porcentaje_enero_junio"/></td>
      <td rowspan="2"><? if($con==1){ ?><input name="txtjuldic" type="text" id="txtjuldic" onblur="calendarioprogramatico();" size="10" readonly="readonly" /><? }?></td>
      <td rowspan="2"><? if($con==1){ ?><input name="txttotal" type="text" id="txttotal" size="10" readonly="readonly" /><? }?></td>
      <td><input name="txt_ing1000_<?=$con;?>" type="text" id="txt_ing1000_<?=$con;?>" size="2" onblur="monto('ing1000',<?=$con;?>);" onfocus="dato('ing1000',<?=$con;?>);" value="<? if($Accion_Capitulo1->getporcentaje()!=0) echo $Accion_Capitulo1->getporcentaje();?>" />%<input name="h_ing1000_<?=$con;?>" type="hidden" id="h_ing1000_<?=$con;?>"/></td>
      <td><input name="txt_ing2000_<?=$con;?>" type="text" id="txt_ing2000_<?=$con;?>" size="2" onblur="monto('ing2000',<?=$con;?>);" onfocus="dato('ing2000',<?=$con;?>);" value="<? if($Accion_Capitulo2->getporcentaje()!=0) echo $Accion_Capitulo2->getporcentaje();?>" />%
      <input name="h_ing2000_<?=$con;?>" type="hidden" id="h_ing2000_<?=$con;?>"/></td>
  <?
	$Sqlmonto="SELECT gc.id_accion,gc.monto FROM gastodirecto_capitulo gc join capitulo c on gc.id_capitulo = c.id_capitulo WHERE gc.id_meta = $clavesesion AND c.clave = 2000 ";
	$ISqlmonto = mysql_query($Sqlmonto);
	$rowmonto = mysql_fetch_array($ISqlmonto);
	
?>
      <td rowspan="2"><? if($row[2]==$rowmonto[0]){ $gas2000=$rowmonto[1]; echo "$".number_format($gas2000, 2, '.', ',');}else{$gas2000=0; echo "$".number_format($gas2000, 2, '.', ',');}?>
      <input name="hgas2000_<?=$con;?>" type="hidden" id="hgas2000_<?=$con;?>" value="<?=$gas2000?>"/></td>
      <td><input name="txt_ing3000_<?=$con;?>" type="text" id="txt_ing3000_<?=$con;?>" size="2" onblur="monto('ing3000',<?=$con;?>);" onfocus="dato('ing3000',<?=$con;?>);" value="<? if($Accion_Capitulo3->getporcentaje()!=0) echo $Accion_Capitulo3->getporcentaje();?>" />%
      <input name="h_ing3000_<?=$con;?>" type="hidden" id="h_ing3000_<?=$con;?>"/></td>
  <?
	$Sqlmonto1="SELECT gc.id_accion,gc.monto FROM gastodirecto_capitulo gc join capitulo c on gc.id_capitulo = c.id_capitulo WHERE gc.id_meta = $clavesesion AND c.clave = 3000 ";
	$ISqlmonto1 = mysql_query($Sqlmonto1);
	$rowmonto1 = mysql_fetch_array($ISqlmonto1);
	
?>
      <td rowspan="2"><? if($row[2]==$rowmonto1[0]){ $gas3000=$rowmonto1[1]; echo "$".number_format($gas3000, 2, '.', ',');}else{ $gas3000=0; echo "$".number_format($gas3000, 2, '.', ',');}?><input name="hgas3000_<?=$con;?>" type="hidden" id="hgas3000_<?=$con;?>" value="<?=$gas3000;?>"/></td>
      <td><input name="txt_ing5000_<?=$con;?>" type="text" id="txt_ing5000_<?=$con;?>" size="2" onblur="monto('ing5000',<?=$con;?>);" value="<? if($Accion_Capitulo5->getporcentaje()!=0) echo $Accion_Capitulo5->getporcentaje();?>" />%
      <input name="h_ing5000_<?=$con;?>" type="hidden" id="h_ing5000_<?=$con;?>"/></td>
      <td><input name="txt_ing7000_<?=$con;?>" type="text" id="txt_ing7000_<?=$con;?>" size="2" onblur="monto('ing7000',<?=$con;?>);" value="<? if($Accion_Capitulo7->getporcentaje()!=0) echo $Accion_Capitulo7->getporcentaje();?>" />%
      <input name="h_ing7000_<?=$con;?>" type="hidden" id="h_ing7000_<?=$con;?>"/></td>
      <td rowspan="2"><? echo 0;?><input name="hgas7000_<?=$con;?>" type="hidden" id="hgas7000_<?=$con;?>" value="<? echo 0;?>"/></td>
      <td rowspan="2"><input name="txtingresocubrir_<?=$con;?>" type="text" id="txtingresocubrir_<?=$con;?>" size="10" readonly="readonly" /><input name="hingresocubrir_<?=$con;?>" type="hidden" id="hingresocubrir_<?=$con;?>"/></td>
      <td rowspan="2"><? if($row[2]==$rowmonto1[0] || $row[2]==$rowmonto[0]){$gasto=$rowmonto1[1]+$rowmonto[1];echo "$".number_format($gasto, 2, '.', ',');}else{$gasto=0; echo "$".number_format($gasto, 2, '.', ',');}?><input name="montogasto_<?=$con;?>" type="hidden" id="montogasto_<?=$con;?>" value="<?=$gasto;?>"/></td>
      <td rowspan="2"><input name="txttotalpres_<?=$con;?>" type="text" id="txttotalpres_<?=$con;?>" size="10" readonly="readonly" /><input name="htotalpres_<?=$con;?>" type="hidden" id="htotalpres_<?=$con;?>"/></td>
      <td rowspan="2"><input name="txt_enejuning_<?=$con;?>" type="text" id="txt_enejuning_<?=$con;?>" size="10" readonly="readonly" /><input name="h_enejuning_<?=$con;?>" type="hidden" id="h_enejuning_<?=$con;?>"/></td>
      <td rowspan="2"><input name="txt_enejungas_<?=$con;?>" type="text" id="txt_enejungas_<?=$con;?>" size="10" readonly="readonly" /><input name="h_enejungas_<?=$con;?>" type="hidden" id="h_enejungas_<?=$con;?>"/></td>
      <td rowspan="2"><input name="txtenejuntotal_<?=$con;?>" type="text" id="txtenejuntotal_<?=$con;?>" size="10" readonly="readonly" /><input name="henejuntotal_<?=$con;?>" type="hidden" id="henejuntotal_<?=$con;?>"/></td>
      <td rowspan="2"><input name="txt_juldicing_<?=$con;?>" type="text" id="txt_juldicing_<?=$con;?>" size="10" readonly="readonly" /><input name="h_juldicing_<?=$con;?>" type="hidden" id="h_juldicing_<?=$con;?>"/></td>
      <td rowspan="2"><input name="txt_juldicgas_<?=$con;?>" type="text" id="txt_juldicgas_<?=$con;?>" size="10" readonly="readonly" /><input name="h_juldicgas_<?=$con;?>" type="hidden" id="h_juldicgas_<?=$con;?>"/></td>
      <td rowspan="2"><input name="txtjuldictotal_<?=$con;?>" type="text" id="txtjuldictotal_<?=$con;?>" size="10" readonly="readonly" /><input name="hjuldictotal_<?=$con;?>" type="hidden" id="hjuldictotal_<?=$con;?>"/></td>
    </tr>
    <tr class="odd">
      <td height="26"><input name="txting1000_<?=$con;?>" type="text" id="txting1000_<?=$con;?>" size="10" readonly="readonly"/><input name="hing1000_<?=$con;?>" type="hidden" id="hing1000_<?=$con;?>"/></td>
      <td><input name="txting2000_<?=$con;?>" type="text" id="txting2000_<?=$con;?>" size="10" readonly="readonly" /><input name="hing2000_<?=$con;?>" type="hidden" id="hing2000_<?=$con;?>"/></td>
      <td><input name="txting3000_<?=$con;?>" type="text" id="txting3000_<?=$con;?>" size="10" readonly="readonly" /><input name="hing3000_<?=$con;?>" type="hidden" id="hing3000_<?=$con;?>"/></td>
      <td><input name="txting5000_<?=$con;?>" type="text" id="txting5000_<?=$con;?>" size="10" readonly="readonly" /><input name="hing5000_<?=$con;?>" type="hidden" id="hing5000_<?=$con;?>"/></td>
      <td><input name="txting7000_<?=$con;?>" type="text" id="txting7000_<?=$con;?>" size="10" readonly="readonly" /><input name="hing7000_<?=$con;?>" type="hidden" id="hing7000_<?=$con;?>"/></td>
     </tr>
    <? $con++;
		} 
       
	} 
 
?>
    <tr>
      <td colspan="7" align="center" bgcolor="#999999">TOTAL POR META </td><input name="hclavesesion" type="hidden" id="hclavesesion" value="<?=$clavesesion;?>"/>
  <?
	$Sql1="select sum(pa.ingreso_propio) from partida_departamento pa join partida p on pa.id_partida=p.id_partida WHERE pa.id_meta= $clavesesion and clave between 10000 and (10000+9999)";
	$ISql1 = mysql_query($Sql1);
	$row2 = mysql_fetch_array($ISql1);
?>
      <td><?="$".number_format($row2[0], 2, '.', ',');?>
      <input name="monto_ing1000" type="hidden" id="monto_ing1000" value="<?=$row2[0];?>"/></td>
  <?
	$Sql2="select sum(pa.ingreso_propio) from partida_departamento pa join partida p on pa.id_partida=p.id_partida WHERE pa.id_meta=$clavesesion and clave between 20000 and (20000 +9999)";
	$ISql2 = mysql_query($Sql2);
	$row3 = mysql_fetch_array($ISql2);
?>
      <td><?="$".number_format($row3[0], 2, '.', ',');?><input name="monto_ing2000" type="hidden" id="monto_ing2000" value="<?=$row3[0];?>"/></td>
  <?
	$Sqlgastodirecto="SELECT mc.gasto_directo FROM meta_capitulo mc join capitulo c on mc.id_capitulo = c.id_capitulo WHERE mc.id_meta = $clavesesion AND c.clave = 2000";
	$ISqlgastodirecto = mysql_query($Sqlgastodirecto);
	$rowgastodirecto = mysql_fetch_array($ISqlgastodirecto);
?>
      <td><?="$".number_format($rowgastodirecto[0], 2, '.', ','); ?><input name="monto_gas2000" type="hidden" id="monto_gas2000" value="<?=$rowgastodirecto[0];?>"/></td>
  <?
	$Sql3="select sum(pa.ingreso_propio) from partida_departamento pa join partida p on pa.id_partida=p.id_partida WHERE pa.id_meta=$clavesesion and clave between 30000 and (30000 +9999)";
	$ISql3 = mysql_query($Sql3);
	$row4 = mysql_fetch_array($ISql3);
?>
      <td><?="$".number_format($row4[0], 2, '.', ',');?><input name="monto_ing3000" type="hidden" id="monto_ing3000" value="<?=$row4[0];?>"/></td>
  <?
	$Sqlgastodirecto1="SELECT mc.gasto_directo FROM meta_capitulo mc join capitulo c on mc.id_capitulo = c.id_capitulo WHERE mc.id_meta = $clavesesion AND c.clave = 3000";
	$ISqlgastodirecto1 = mysql_query($Sqlgastodirecto1);
	$rowgastodirecto1 = mysql_fetch_array($ISqlgastodirecto1);
?>
      <td><?="$".number_format($rowgastodirecto1[0], 2, '.', ',');?><input name="monto_gas3000" type="hidden" id="monto_gas3000" value="<?=$rowgastodirecto1[0];?>"/></td>
  <?
	$Sql4="select sum(pa.ingreso_propio) from partida_departamento pa join partida p on pa.id_partida=p.id_partida WHERE pa.id_meta=$clavesesion and clave between 40000 and (40000 +9999)";
	$ISql4 = mysql_query($Sql4);
	$row5 = mysql_fetch_array($ISql4);
?>
      <td><?="$".number_format($row5[0], 2, '.', ',');?><input name="monto_ing5000" type="hidden" id="monto_ing5000" value="<?=$row5[0];?>"/></td>
  <?
	$Sql5="select sum(pa.ingreso_propio) from partida_departamento pa join partida p on pa.id_partida=p.id_partida WHERE pa.id_meta=$clavesesion and clave between 50000 and (50000 +9999)";
	$ISql5 = mysql_query($Sql5);
	$row6 = mysql_fetch_array($ISql5);
?>
      <td><?="$".number_format($row6[0], 2, '.', ',');?><input name="monto_ing7000" type="hidden" id="monto_ing7000" value="<?=$row6[0];?>"/></td>
  <?
	$Sqlgastodirecto2="SELECT mc.gasto_directo FROM meta_capitulo mc join capitulo c on mc.id_capitulo = c.id_capitulo WHERE mc.id_meta = $clavesesion AND c.clave = 5000";
	$ISqlgastodirecto2 = mysql_query($Sqlgastodirecto2);
	$rowgastodirecto2 = mysql_fetch_array($ISqlgastodirecto2);
?>
      <td><?="$".number_format($rowgastodirecto2[0], 2, '.', ',');?><input name="monto_gas7000" type="hidden" id="monto_gas7000" value="<?=$rowgastodirecto2[0];?>"/>
      <input name="hidc" type="hidden" id="hidc" value="<?=$con-1;?>"/></td>
  <?
	$Sql11="select sum(ingreso_propio) FROM partida_departamento where id_meta = $clavesesion";
	$ISql11 = mysql_query($Sql11);
	$row12 = mysql_fetch_array($ISql11);
?>
      <td><?="$".number_format($row12[0], 2, '.', ',');?><input name="presupuestotaling" type="hidden" id="presupuestotaling" value="<?=$row12[0];?>" /></td>
  <?
	$Sql12="SELECT SUM(monto) as gasto_directo FROM gastodirecto_capitulo WHERE id_meta = $clavesesion";
	$ISql12 = mysql_query($Sql12);
	$row13 = mysql_fetch_array($ISql12);
?>
      <td><?="$".number_format($row13[0], 2, '.', ',');?><input name="presupuestotalgas" type="hidden" id="presupuestotalgas" value="<?=$row13[0];?>" /></td>
  <?
	$Sqlmontototal="SELECT SUM(ingreso_propio) + (SELECT SUM(gasto_directo) as monto_total FROM meta_capitulo WHERE id_meta = $clavesesion) as montototal FROM partida_departamento WHERE id_meta = $clavesesion";
	$ISqlmontototal = mysql_query($Sqlmontototal);
	$rowmontototal = mysql_fetch_array($ISqlmontototal);
?>
      <td><?="$".number_format($rowmontototal[0], 2, '.', ',');?><input name="presupuestotal" type="hidden" id="presupuestotal" value="<?=$rowmontototal[0];?>" /></td>
      <td><label>
        <input name="txtenejuntot" type="text" id="txtenejuntot" size="10" readonly="readonly" /><input name="henejuntot" type="hidden" id="henejuntot"/>
      </label></td>
      <td><label>
        <input name="txtenejuntot1" type="text" id="txtenejuntot1" size="10" readonly="readonly" /><input name="henejuntot1" type="hidden" id="henejuntot1"/>
      </label></td>
      <td><input name="txttotalenerojunio" type="text" id="txttotalenerojunio" size="10" readonly="readonly" /><input name="htotalenerojunio" type="hidden" id="htotalenerojunio"/></td>
      <td><label>
        <input name="txtjuldictot" type="text" id="txtjuldictot" size="10" readonly="readonly" /><input name="hjuldictot" type="hidden" id="hjuldictot"/>
      </label></td>
      <td><label>
        <input name="txtjuldictot1" type="text" id="txtjuldictot1" size="10" readonly="readonly" /><input name="hjuldictot1" type="hidden" id="hjuldictot1"/>
      </label></td>
      <td><label>
        <input name="txttotaljuliodiciembre" type="text" id="txttotaljuliodiciembre" size="10" readonly="readonly" />
      <input name="htotaljuliodiciembre" type="hidden" id="htotaljuliodiciembre"/></label></td>
    </tr>
    <tr id="row1" style="display:none">
      <td height="26" colspan="7" align="center" bgcolor="#999999">TOTAL POR PROCESO CLAVE <input name="mostrar" type="hidden" id="mostrar"/></td>
  <?
	$Sql6="select sum(pa.ingreso_propio) 
from (partida_departamento pa join partida p on pa.id_partida=p.id_partida) 
	join procesoclave_meta pcm on pcm.id_meta = pa.id_meta 
WHERE  clave between 10000 and (10000 +9999)AND pcm.id_procesoclave = (SELECT id_procesoclave 
											FROM procesoclave_meta 
                                            WHERE id_meta = $clavesesion)";
	$ISql6 = mysql_query($Sql6);
	$row7 = mysql_fetch_array($ISql6);
?>
      <td width="66"><?="$".number_format($row7[0], 2, '.', ',');?><input name="clave_ing1000" type="hidden" id="clave_ing1000" value="<?=$row7[0];?>"/></td>
  <?
	$Sql7="select sum(pa.ingreso_propio) 
from (partida_departamento pa join partida p on pa.id_partida=p.id_partida) 
	join procesoclave_meta pcm on pcm.id_meta = pa.id_meta 
WHERE  clave between 20000 and (20000 +9999)AND pcm.id_procesoclave = (SELECT id_procesoclave 
											FROM procesoclave_meta 
                                            WHERE id_meta = $clavesesion)";
	$ISql7 = mysql_query($Sql7);
	$row8 = mysql_fetch_array($ISql7);
?>
      <td width="61"><?="$".number_format($row8[0], 2, '.', ',');?><input name="clave_ing2000" type="hidden" id="clave_ing2000" value="<?=$row8[0];?>"/></td>
  <?
	$Sqlgastodirecto3="SElECT SUM(mc.gasto_directo) as gasto_directo FROM (procesoclave_meta pm join meta_capitulo mc on pm.id_meta = mc.id_meta) join capitulo c on mc.id_capitulo = c.id_capitulo WHERE c.clave = 2000  AND pm.id_procesoclave = (SELECT id_procesoclave FROM procesoclave_meta WHERE id_meta = $clavesesion)";
	$ISqlgastodirecto3 = mysql_query($Sqlgastodirecto3);
	$rowgastodirecto3 = mysql_fetch_array($ISqlgastodirecto3);
?>
      <td width="47"><?="$".number_format($rowgastodirecto3[0], 2, '.', ',');?><input name="clave_gas2000" type="hidden" id="clave_gas2000" value="<?=$rowgastodirecto3[0];?>"/></td>
  <?
	$Sql8="select sum(pa.ingreso_propio) 
from (partida_departamento pa join partida p on pa.id_partida=p.id_partida) 
	join procesoclave_meta pcm on pcm.id_meta = pa.id_meta 
WHERE  clave between 30000 and (30000 +9999)AND pcm.id_procesoclave = (SELECT id_procesoclave 
											FROM procesoclave_meta 
                                            WHERE id_meta = $clavesesion)";
	$ISql8 = mysql_query($Sql8);
	$row9 = mysql_fetch_array($ISql8);
?>
      <td width="62"><?="$".number_format($row9[0], 2, '.', ',');?><input name="clave_ing3000" type="hidden" id="clave_ing3000" value="<?=$row9[0];?>"/></td>
  <?
	$Sqlgastodirecto4="SElECT SUM(mc.gasto_directo) as gasto_directo FROM (procesoclave_meta pm join meta_capitulo mc on pm.id_meta = mc.id_meta) join capitulo c on mc.id_capitulo = c.id_capitulo WHERE c.clave = 3000  AND pm.id_procesoclave = (SELECT id_procesoclave FROM procesoclave_meta WHERE id_meta = $clavesesion)";
	$ISqlgastodirecto4 = mysql_query($Sqlgastodirecto4);
	$rowgastodirecto4 = mysql_fetch_array($ISqlgastodirecto4);
?>
      <td width="45"><?="$".number_format($rowgastodirecto4[0], 2, '.', ',');?><input name="clave_gas3000" type="hidden" id="clave_gas3000" value="<?=$rowgastodirecto4[0];?>"/></td>
  <?
	$Sql9="select sum(pa.ingreso_propio) 
from (partida_departamento pa join partida p on pa.id_partida=p.id_partida) 
	join procesoclave_meta pcm on pcm.id_meta = pa.id_meta 
WHERE  clave between 40000 and (40000 +9999)AND pcm.id_procesoclave = (SELECT id_procesoclave 
											FROM procesoclave_meta 
                                            WHERE id_meta = $clavesesion)";
	$ISql9 = mysql_query($Sql9);
	$row10 = mysql_fetch_array($ISql9);
?>
      <td width="64"><?="$".number_format($row10[0], 2, '.', ',');?><input name="clave_ing5000" type="hidden" id="clave_ing5000" value="<?=$row10[0];?>"/></td>
  <?
	$Sql10="select sum(pa.ingreso_propio) 
from (partida_departamento pa join partida p on pa.id_partida=p.id_partida) 
	join procesoclave_meta pcm on pcm.id_meta = pa.id_meta 
WHERE  clave between 50000 and (50000 +9999)AND pcm.id_procesoclave = (SELECT id_procesoclave 
											FROM procesoclave_meta 
                                            WHERE id_meta = $clavesesion)";
	$ISql10 = mysql_query($Sql10);
	$row11 = mysql_fetch_array($ISql10);
?>
      <td width="60"><?="$".number_format($row11[0], 2, '.', ',');?><input name="clave_ing7000" type="hidden" id="clave_ing7000" value="<?=$row11[0];?>"/></td>
  <?
	$Sqlgastodirecto5="SElECT SUM(mc.gasto_directo) as gasto_directo FROM (procesoclave_meta pm join meta_capitulo mc on pm.id_meta = mc.id_meta) join capitulo c on mc.id_capitulo = c.id_capitulo WHERE c.clave = 5000  AND pm.id_procesoclave = (SELECT id_procesoclave FROM procesoclave_meta WHERE id_meta = $clavesesion)";
	$ISqlgastodirecto5 = mysql_query($Sqlgastodirecto5);
	$rowgastodirecto5 = mysql_fetch_array($ISqlgastodirecto5);
?>
      <td width="45"><?="$".number_format($rowgastodirecto5[0], 2, '.', ',');?><input name="clave_gas7000" type="hidden" id="clave_gas7000" value="<?=$rowgastodirecto5[0];?>"/></td>
  <?
	$Sql13="select sum(pa.ingreso_propio) as ingreso_propio
from (partida_departamento pa join partida p on pa.id_partida=p.id_partida) 
	join procesoclave_meta pcm on pcm.id_meta = pa.id_meta 
WHERE pcm.id_procesoclave = (SELECT id_procesoclave 
								FROM procesoclave_meta 
                                WHERE id_meta = $clavesesion)";
	$ISql13 = mysql_query($Sql13);
	$row14 = mysql_fetch_array($ISql13);
?>
      <td width="64"><?="$".number_format($row14[0], 2, '.', ',');?><input name="clave_totaling" type="hidden" id="clave_totaling" value="<?=$row14[0];?>"/></td>
  <?
	$Sqlgastodirecto6="SElECT SUM(mc.gasto_directo) as gasto_directo FROM procesoclave_meta pm join meta_capitulo mc on pm.id_meta = mc.id_meta WHERE pm.id_procesoclave = (SELECT id_procesoclave FROM procesoclave_meta WHERE id_meta = $clavesesion)";
	$ISqlgastodirecto6 = mysql_query($Sqlgastodirecto6);
	$rowgastodirecto6 = mysql_fetch_array($ISqlgastodirecto6);
?>
      <td width="50"><?="$".number_format($rowgastodirecto6[0], 2, '.', ',');?><input name="clave_totalgas" type="hidden" id="clave_totalgas" value="<?=$rowgastodirecto6[0];?>"/></td>
  <?
	$Sqlmontototal1="select sum(pa.ingreso_propio) + (SELECT SUM(gasto_directo) as monto_total 
    							FROM meta_capitulo 
                            	WHERE id_meta = $clavesesion) as montototal
from (partida_departamento pa join partida p on pa.id_partida=p.id_partida) 
	join procesoclave_meta pcm on pcm.id_meta = pa.id_meta 
WHERE pcm.id_procesoclave = (SELECT id_procesoclave 
								FROM procesoclave_meta 
                                WHERE id_meta = $clavesesion)";
	$ISqlmontototal1 = mysql_query($Sqlmontototal1);
	$rowmontototal1 = mysql_fetch_array($ISqlmontototal1);
?>
      <td width="79"><?="$".number_format($rowmontototal1[0], 2, '.', ',');?><input name="clave_total" type="hidden" id="clave_total" value="<?=$rowmontototal1[0];?>"/></td>
  <?
	$Sqlingresoenejun="SELECT SUM(m.ingreso_propio_ene_jun) as ingreso_propio_ene_jun FROM meta m join procesoclave_meta pm on pm.id_meta = m.id_meta WHERE pm.id_procesoclave = (SELECT id_procesoclave FROM procesoclave_meta WHERE id_meta = $clavesesion)";
	$ISqlingresoenejun = mysql_query($Sqlingresoenejun);
	$rowingresoenejun = mysql_fetch_array($ISqlingresoenejun);
?>
      <td width="58"><?="$".number_format($rowingresoenejun[0], 2, '.', ',');?><input name="claveenerojunioing" type="hidden" id="claveenerojunioing" value="<?=$rowingresoenejun[0];?>"/></td
><?
	$Sqlgastoenejun="SELECT SUM(m.gasto_directo_ene_jun) as gasto_directo_ene_jun FROM meta m join procesoclave_meta pm on pm.id_meta = m.id_meta WHERE pm.id_procesoclave = (SELECT id_procesoclave FROM procesoclave_meta WHERE id_meta = $clavesesion)";
	$ISqlgastoenejun = mysql_query($Sqlgastoenejun);
	$rowgastoenejun = mysql_fetch_array($ISqlgastoenejun);
?>
      <td width="61"><?="$".number_format($rowgastoenejun[0], 2, '.', ',');?><input name="claveenerojuniogas" type="hidden" id="claveenerojuniogas" value="<?=$rowgastoenejun[0];?>"/></td
><?
	$Sqlingresoenejun1="SELECT SUM(m.ingreso_propio_ene_jun) as ingreso_propio_ene_jun,SUM(m.gasto_directo_ene_jun) as gasto_directo_ene_jun FROM meta m join procesoclave_meta pm on pm.id_meta = m.id_meta WHERE pm.id_procesoclave = (SELECT id_procesoclave FROM procesoclave_meta WHERE id_meta = $clavesesion)";
	$ISqlingresoenejun1 = mysql_query($Sqlingresoenejun1);
	$rowingresoenejun1 = mysql_fetch_array($ISqlingresoenejun1);
	$sum2=$rowingresoenejun1['ingreso_propio_ene_jun']+$rowingresoenejun1['gasto_directo_ene_jun'];
?>
      <td width="59"><?="$".number_format($sum2, 2, '.', ',');?><input name="claveenerojuniototal" type="hidden" id="claveenerojuniototal" value="<?=$sum2;?>"/></td
><?
	$Sqlingresojuldic="SELECT SUM(m.ingreso_propio_jul_dic) as ingreso_propio_jul_dic FROM meta m join procesoclave_meta pm on pm.id_meta = m.id_meta WHERE pm.id_procesoclave = (SELECT id_procesoclave FROM procesoclave_meta WHERE id_meta = $clavesesion)";
	$ISqlingresojuldic = mysql_query($Sqlingresojuldic);
	$rowingresojuldic = mysql_fetch_array($ISqlingresojuldic);
?>
      <td width="59"><?="$".number_format($rowingresojuldic[0], 2, '.', ',');?><input name="clavejuliodiciembreing" type="hidden" id="clavejuliodiciembreing" value="<?=$rowingresojuldic[0];?>"/></td
><?
	$Sqlgastojuldic="SELECT SUM(m.gasto_directo_ene_jun) as gasto_directo_jul_dic FROM meta m join procesoclave_meta pm on pm.id_meta = m.id_meta WHERE pm.id_procesoclave = (SELECT id_procesoclave FROM procesoclave_meta WHERE id_meta = $clavesesion)";
	$ISqlgastojuldic = mysql_query($Sqlgastojuldic);
	$rowgastojuldic = mysql_fetch_array($ISqlgastojuldic);
?>
      <td width="61"><?="$".number_format($rowgastojuldic[0], 2, '.', ',');?><input name="clavejuliodiciembregas" type="hidden" id="clavejuliodiciembregas" value="<?=$rowgastojuldic[0];?>"/></td
><?
	$Sqlingresoenejun2="SELECT SUM(m.ingreso_propio_jul_dic) as ingreso_propio_jul_dic,SUM(m.gasto_directo_jul_dic) as gasto_directo_jul_dic FROM meta m join procesoclave_meta pm on pm.id_meta = m.id_meta WHERE pm.id_procesoclave = (SELECT id_procesoclave FROM procesoclave_meta WHERE id_meta = $clavesesion)";
	$ISqlingresoenejun2 = mysql_query($Sqlingresoenejun2);
	$rowingresoenejun2 = mysql_fetch_array($ISqlingresoenejun2);
	$sum3=$rowingresoenejun2['ingreso_propio_jul_dic']+$rowingresoenejun2['gasto_directo_jul_dic'];
?>
      <td width="68"><?="$".number_format($sum3, 2, '.', ',');?><input name="clavejuliodiciembretotal" type="hidden" id="clavejuliodiciembretotal" value="<?=$sum3;?>"/></td>
    </tr>
    <tr id="row2" style="display:none">
      <td colspan="7" align="center" bgcolor="#999999">TOTAL POR PROCESO ESTRATEGICO </td>
  <?




//AQUI ME QUEDE PARA EL FORMATO CATAFRACTA







	$Sql14="select sum(pa.ingreso_propio) + (SELECT SUM(mc.gasto_directo) as monto_total 
    							FROM meta_capitulo mc join capitulo c on mc.id_capitulo = c.id_capitulo
                            	WHERE mc.id_meta = $clavesesion and c.clave = 1000) as monto_total
from ((partida_departamento pa join partida p on pa.id_partida=p.id_partida) 
	join procesoclave_meta pm on pm.id_meta = pa.id_meta) 
    join procesoclave pc on pc.id_procesoclave = pm.id_procesoclave
WHERE p.clave between 10000 and (10000 +9999)
	  AND 
      pc.id_procesoestrategico = (SELECT  pc.id_procesoestrategico 
    							FROM procesoclave_meta pm 
                                   	join procesoclave pc on pm.id_procesoclave = pc.id_procesoclave 
                                WHERE id_meta = $clavesesion)";
	$ISql4 = mysql_query($Sql14);
	$row15 = mysql_fetch_array($ISql4);
?>
      <td><?="$".number_format($row15[0], 2, '.', ',');?><input name="estrategico1000" type="hidden" id="estrategico1000" value="<?=$row15[0];?>"/></td>
  <?
	$Sql15="select sum(pa.ingreso_propio) + (SELECT SUM(mc.gasto_directo) as monto_total 
    							FROM meta_capitulo mc join capitulo c on mc.id_capitulo = c.id_capitulo
                            	WHERE mc.id_meta = $clavesesion and c.clave = 2000) as monto_total
from ((partida_departamento pa join partida p on pa.id_partida=p.id_partida) 
	join procesoclave_meta pm on pm.id_meta = pa.id_meta) 
    join procesoclave pc on pc.id_procesoclave = pm.id_procesoclave
WHERE p.clave between 20000 and (20000 +9999)
	  AND 
      pc.id_procesoestrategico = (SELECT  pc.id_procesoestrategico 
    							FROM procesoclave_meta pm 
                                   	join procesoclave pc on pm.id_procesoclave = pc.id_procesoclave 
                                WHERE id_meta = $clavesesion)";
	$ISql5 = mysql_query($Sql15);
	$row16 = mysql_fetch_array($ISql5);
?>
      <td colspan="2"><?="$".number_format($row16[0], 2, '.', ',');?><input name="estrategico2000" type="hidden" id="estrategico2000" value="<?=$row16[0];?>"/></td>
  <?
	$Sql16="select sum(pa.ingreso_propio) + (SELECT SUM(mc.gasto_directo) as monto_total 
    							FROM meta_capitulo mc join capitulo c on mc.id_capitulo = c.id_capitulo
                            	WHERE mc.id_meta = $clavesesion and c.clave = 3000) as monto_total
from ((partida_departamento pa join partida p on pa.id_partida=p.id_partida) 
	join procesoclave_meta pm on pm.id_meta = pa.id_meta) 
    join procesoclave pc on pc.id_procesoclave = pm.id_procesoclave
WHERE p.clave between 30000 and (30000 +9999)
	  AND 
      pc.id_procesoestrategico = (SELECT  pc.id_procesoestrategico 
    							FROM procesoclave_meta pm 
                                   	join procesoclave pc on pm.id_procesoclave = pc.id_procesoclave 
                                WHERE id_meta = $clavesesion)";
	$ISql6 = mysql_query($Sql16);
	$row17 = mysql_fetch_array($ISql6);
?>
      <td colspan="2"><?="$".number_format($row17[0], 2, '.', ',');?><input name="estrategico3000" type="hidden" id="estrategico3000" value="<?=$row17[0];?>"/></td>
  <?
	$Sql17="select sum(pa.ingreso_propio) + (SELECT SUM(mc.gasto_directo) as monto_total 
    							FROM meta_capitulo mc join capitulo c on mc.id_capitulo = c.id_capitulo
                            	WHERE mc.id_meta = $clavesesion and c.clave = 4000) as monto_total
from ((partida_departamento pa join partida p on pa.id_partida=p.id_partida) 
	join procesoclave_meta pm on pm.id_meta = pa.id_meta) 
    join procesoclave pc on pc.id_procesoclave = pm.id_procesoclave
WHERE p.clave between 40000 and (40000 +9999)
	  AND 
      pc.id_procesoestrategico = (SELECT  pc.id_procesoestrategico 
    							FROM procesoclave_meta pm 
                                   	join procesoclave pc on pm.id_procesoclave = pc.id_procesoclave 
                                WHERE id_meta = $clavesesion)";
	$ISql7 = mysql_query($Sql17);
	$row18 = mysql_fetch_array($ISql7);
?>
      <td><?="$".number_format($row18[0], 2, '.', ',');?><input name="estrategico5000" type="hidden" id="estrategico5000" value="<?=$row18[0];?>"/></td>
  <?
	$Sql18="select sum(pa.ingreso_propio) + (SELECT SUM(mc.gasto_directo) as monto_total 
    							FROM meta_capitulo mc join capitulo c on mc.id_capitulo = c.id_capitulo
                            	WHERE mc.id_meta = $clavesesion and c.clave = 5000) as monto_total
from ((partida_departamento pa join partida p on pa.id_partida=p.id_partida) 
	join procesoclave_meta pm on pm.id_meta = pa.id_meta) 
    join procesoclave pc on pc.id_procesoclave = pm.id_procesoclave
WHERE p.clave between 50000 and (50000 +9999)
	  AND 
      pc.id_procesoestrategico = (SELECT  pc.id_procesoestrategico 
    							FROM procesoclave_meta pm 
                                   	join procesoclave pc on pm.id_procesoclave = pc.id_procesoclave 
                                WHERE id_meta = $clavesesion)";
	$ISql8 = mysql_query($Sql18);
	$row19 = mysql_fetch_array($ISql8);
?>
      <td colspan="2"><?="$".number_format($row19[0], 2, '.', ',');?><input name="estrategico7000" type="hidden" id="estrategico7000" value="<?=$row19[0];?>"/></td>
  <?
	$Sql19="select sum(pa.ingreso_propio) + (SELECT SUM(gasto_directo) as monto_total 
    							FROM meta_capitulo 
                            	WHERE id_meta = $clavesesion ) as monto_total
from ((partida_departamento pa join partida p on pa.id_partida=p.id_partida) 
	join procesoclave_meta pm on pm.id_meta = pa.id_meta) 
    join procesoclave pc on pc.id_procesoclave = pm.id_procesoclave
WHERE pc.id_procesoestrategico = (SELECT  pc.id_procesoestrategico 
    							FROM procesoclave_meta pm 
                                   	join procesoclave pc on pm.id_procesoclave = pc.id_procesoclave 
                                WHERE id_meta = $clavesesion)";
	$ISql9 = mysql_query($Sql19);
	$row20 = mysql_fetch_array($ISql9);
?>
      <td colspan="2"><?="$".number_format($row20[0], 2, '.', ',');?><input name="estrategicoacubirir" type="hidden" id="estrategicoacubirir" value="<?=$row20[0];?>"/></td>
      <td><?="$".number_format($row20[0], 2, '.', ',');?><input name="estrategicototal" type="hidden" id="estrategicototal" value="<?=$row20[0];?>"/></td>
      <?
	$Sql20="SELECT SUM(m.ingreso_propio_ene_jun) as ingreso_propio_ene_jun, SUM(m.gasto_directo_ene_jun) as gasto_directo_ene_jun
FROM (meta m join procesoclave_meta pm on pm.id_meta = m.id_meta ) join procesoclave pc on pm.id_procesoclave = pc.id_procesoclave
WHERE pc.id_procesoestrategico = (SELECT pc.id_procesoestrategico FROM procesoclave_meta pm join procesoclave pc on pm.id_procesoclave = pc.id_procesoclave WHERE pm.id_meta = $clavesesion)";
	$ISq20 = mysql_query($Sql20);
	$row21 = mysql_fetch_array($ISq20);
	$sum=$row21['ingreso_propio_ene_jun']+$row21['gasto_directo_ene_jun'];
?>
      <td colspan="2"><?="$".number_format($sum, 2, '.', ',');?><input name="estrategicoenejun" type="hidden" id="estrategicoenejun" value="<?=$sum;?>"/></td>
      <td><?="$".number_format($sum, 2, '.', ',');?></td>
  <?
	$Sql21="SELECT SUM(m.ingreso_propio_jul_dic) as ingreso_propio_jul_dic, SUM(m.gasto_directo_jul_dic) as gasto_directo_jul_dic
FROM (meta m join procesoclave_meta pm on pm.id_meta = m.id_meta ) join procesoclave pc on pm.id_procesoclave = pc.id_procesoclave
WHERE pc.id_procesoestrategico = (SELECT pc.id_procesoestrategico FROM procesoclave_meta pm join procesoclave pc on pm.id_procesoclave = pc.id_procesoclave WHERE pm.id_meta = $clavesesion)";
	$ISq21 = mysql_query($Sql21);
	$row22 = mysql_fetch_array($ISq21);
	$sum1=$row22['ingreso_propio_jul_dic']+$row22['gasto_directo_jul_dic'];
?>
      <td colspan="2"><?="$".number_format($sum1, 2, '.', ',');?><input name="estrategicojuldic" type="hidden" id="estrategicojuldic" value="<?=$sum1;?>"/></td>
      <td><?="$".number_format($sum1, 2, '.', ',');?></td>
    </tr>
    <tr>
      <td width="155" colspan="24" align="center" bgcolor="#FFFFFF"><label>
        <input type="button" name="Guardar" id="Guardar" value="Guardar" onclick="guar();" />
        </label>
      <input type="button" name="imprimir" id="imprimir" value="Imprimir" onclick="impri();" /><input name="cont" type="hidden" id="cont" value="<?=$con-1;?>"/><input name="modi" type="hidden" id="modi" /> <input name="idmeta" type="hidden" id="idmeta" value="<?=$clavesesion;?>"/></td>
    </tr>  
  </table>
  <a href="javascript:cambiarDisplay('row1','row2')">mostrar/ocultar</a> 
  <p>&nbsp;</p>
  <? 
if(isset($_POST['txtenejuntot']) && $_POST['txtenejuntot']!='')
{
	/*
	$modi=$_POST["modi"];	
	$idmeta=$_POST["idmeta"];
	
  	if($modi!=1)
  	{
		$cont=$_POST['cont'];
	  	for($v=1000;$v<=5000;$v+=1000)
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
						echo '<script lenguaje="javascript">alert("entro agregar");</script>';

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
			
		$Meta->modificar();*/
/*		
echo '<pre>';
print_r($Accion_Capitulo);
echo '</pre>';
die();
*/
echo '<script lenguaje="javascript">alert("SE GUARDO CORRECTAMENTE");</script>';
/*echo '<script lenguaje="javascript">open("combo_apoa.php","_self");</script>';*/

/*print "<script>"; 
print "redireccionar(".$idmeta.");"; 
print "</script>"; */


		//var campos = '&metas='+meta; 
		//open('imprimir_apoa.php?id='+campos,'_self');
}
?>
</form>


						<span class="txtcontenidoazul">APOA Formato</span>
</body>
</html>
