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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" >
<title>Administrador de contenidos web - Tecnológico de Colima</title>
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
<script language="javascript">
var nav4 = window.Event ? true : false;
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
function trim(cadena)
{
	for(i=0; i<cadena.length; )
	{
		if(cadena.charAt(i)==0)
			cadena=cadena.substring(i+1, cadena.length);
		else
			break;
	}
	return cadena;
}
function validar()
{
	with(document.form1)
	{
		if(TOTAL.value== '' || TOTAL.value== 0)
		{
			alert('Es necesario asignar montos');
			return 0;
		}
		else
		{
			if((parseInt(TOTAL.value)!=parseInt(grantotal.value))){
				alert('La cantidad total debe de ser exacta a la asignada:'+grantotal.value);
				return 0;
			}
			ja=0;
			for(i=1;i<=hidtotmeta.value;i++)
			{
				if(document.getElementById('allcapi_'+i).value==0)
					ja++;
			}
			if(ja==0)
				submit();
			else
				alert('Todas las metas deben de tener dinero');
						
		}
	}
}
function salvar()
{
	with(document.form1)
	{

		if((parseInt(TOTAL.value)>parseInt(grantotal.value))){
			alert('La cantidad no debe sobrepasar su presupuesto asignado:'+grantotal.value);
			return 0;
		}
		else{
			submit();	
		}
	}
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
		ceros=trim(document.getElementById('txt_'+mil+'_'+partida+'_hidmeta_'+meta).value)
		document.getElementById('txt_'+mil+'_'+partida+'_hidmeta_'+meta).value=0;
		document.getElementById('txt_'+mil+'_'+partida+'_hidmeta_'+meta).value=ceros;
		for(i=1;i<=hidtotmeta.value;i++)
		{
			if(document.getElementById('txt_'+mil+'_'+partida+'_hidmeta_'+i).value=='')
				continue;
			dat+=parseInt(document.getElementById('txt_'+mil+'_'+partida+'_hidmeta_'+i).value);
		}
		document.getElementById('txt_total_'+mil+'_'+partida).value=0;
		document.getElementById('txt_total_'+mil+'_'+partida).value=dat;
		conta=parseInt(document.getElementById('tot_'+mil+'_partidas').value);
		for(i=1;i<=conta;i++)
		{
			if(document.getElementById('txt_'+mil+'_'+i+'_hidmeta_'+meta).value=='')
				continue;
			sum+=parseInt(document.getElementById('txt_'+mil+'_'+i+'_hidmeta_'+meta).value);
		}
		document.getElementById('txt_'+mil+'_'+meta).value=0;
		document.getElementById('txt_'+mil+'_'+meta).value=sum;
		
		for(i=1;i<=hidtotmeta.value;i++)
		{
			if(document.getElementById('txt_'+mil+'_'+i).value=='')
				continue;
			mas+=parseInt(document.getElementById('txt_'+mil+'_'+i).value);
		}
		document.getElementById('txtall_'+mil).value=0;
		document.getElementById('txtall_'+mil).value=mas;
		if(!(document.getElementById('txt_1000_'+meta).value==''))
			totporcapi+=parseInt(document.getElementById('txt_1000_'+meta).value)
		if(!(document.getElementById('txt_2000_'+meta).value==''))
			totporcapi+=parseInt(document.getElementById('txt_2000_'+meta).value)
		if(!(document.getElementById('txt_3000_'+meta).value==''))
			totporcapi+=parseInt(document.getElementById('txt_3000_'+meta).value)
		if(!(document.getElementById('txt_4000_'+meta).value==''))
			totporcapi+=parseInt(document.getElementById('txt_4000_'+meta).value)			
		if(!(document.getElementById('txt_5000_'+meta).value==''))
			totporcapi+=parseInt(document.getElementById('txt_5000_'+meta).value)
		if(!(document.getElementById('txt_6000_'+meta).value==''))
			totporcapi+=parseInt(document.getElementById('txt_6000_'+meta).value)										
		if(!(document.getElementById('txt_7000_'+meta).value==''))
			totporcapi+=parseInt(document.getElementById('txt_7000_'+meta).value)
		if(!(document.getElementById('txt_8000_'+meta).value==''))
			totporcapi+=parseInt(document.getElementById('txt_8000_'+meta).value)		
		if(!(document.getElementById('txt_9000_'+meta).value==''))
			totporcapi+=parseInt(document.getElementById('txt_9000_'+meta).value)								
			

		document.getElementById('allcapi_'+meta).value=0;
		document.getElementById('allcapi_'+meta).value=totporcapi;
		for(i=1;i<=hidtotmeta.value;i++)
		{
			if(document.getElementById('allcapi_'+i).value=='')
				continue;
			maton+=parseInt(document.getElementById('allcapi_'+i).value);
		}
		document.getElementById('TOTAL').value=0;
		document.getElementById('TOTAL').value=maton;
		document.getElementById('restante').value=0;
		document.getElementById('restante').value=parseInt(grantotal.value)-maton;	
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
					cal(z,w,v);
			}	
		}
						
	}
}

</script>
                                
                                

<form id="form1" name="form1" method="post" action="">
  <p>
<?
$clvdepa=$_GET['id'];
$cadena_sql = mysql_query("select m.clave, d.monto from meta_departamento d join meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." and d.periodo='2010' order by m.clave");
$mon = mysql_query("select monto, clave from departamento where id_departamento=".$clvdepa);
$grantotal = mysql_fetch_array($mon);
$con=mysql_num_rows($cadena_sql);
$wit=670/$con;
?>
  </p>
  <table width="80%" border="0" align="center">
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center">Presupuesto con el que cuenta:<?=$grantotal[0];?> </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="1000" border="0" align="center">
    <tr>
      <td>
		<table  width="1000" border="0" cellpadding="0" cellspacing="0">
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
      <input name="h_9000" type="hidden" id="h_9000" value="1" />
	  </td>
      <td width="200"><input name="clvdeparta" type="hidden" id="clvdeparta" value="<?=$grantotal[1]?>"/>
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
?>
	<tr>
	  <td>
<?
	$cad = mysql_query("select clave, nombre, id_partida from partida where clave BETWEEN 1000 and 1999"); 
	$coco=mysql_num_rows($cad);
?>	  
	  	  <div id="d_1000" sstyle="display<? if($coco>12){echo ":block; height:250px; width:1020px; overflow:auto;";}?>">
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
		<?

	//contador de partidas
	$capmil=1000;
	$conmil=1;
	while($mil = mysql_fetch_array($cad)){?>		
			<tr>
      			<td width="50"><?=$mil[0];?></td>
      			<td width="200"><?=$mil[1];?></td>
				<?
 $palmil = mysql_query("select m.id_meta, m.clave, d.monto from meta_departamento d join
 meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." and d.periodo='2010' order by m.clave"); 
 $i=1;
 while($milpa = mysql_fetch_array($palmil)){
	$obj=new partida_departamento($milpa[1],$mil[0],$grantotal[1]);

?>  
     			 <td align="center" width="<?=$wit;?>">
                   <input name="txt_1000_<?=$conmil;?>_hidmeta_<?=$i;?>" type="text" id="txt_1000_<?=$conmil;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$conmil;?>,<?=$i;?>,1000);" onkeypress="return decimales(event,this);" size="6" value="<? if($obj->getingreso_propio()!=0){ echo $obj->getingreso_propio();}?>"/>
        <input name="hid_1000_<?=$conmil;?>" type="hidden" id="hid_1000_<?=$conmil;?>" value="<?=$mil[0];?>"/></td>
<? 
$i++;
}?>	
   			  <td align="center" width="80"><input name="txt_total_1000_<?=$conmil;?>" type="text" id="txt_total_1000_<?=$conmil;?>" size="7" readonly="true"/></td>
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
	  		document.getElementById('d_1000').style.display = "none"; </script>	
    <tr>
      <td bgcolor="#CCCCCC">
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
		<tr align="center">
		<td width="250">	  
	  <strong>
        <input name="tot_1000_partidas" type="hidden" id="tot_1000_partidas" value="<?=$conmil-1;?>"/>
      <label onClick="muestra_dtos(1000);" style="cursor:pointer">Capitulo 1000</label> </strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC" width="<?=$wit;?>"><input name="txt_1000_<?=$i;?>" type="text" id="txt_1000_<?=$i;?>" size="6" readonly="true"/></td>
<? }?>
      <td bgcolor="#CCCCCC" width="80"><input name="txtall_1000" type="text" id="txtall_1000" size="7" readonly="true"/>
	  </td>
	  </tr>
	  </table>
    </tr>
	<?
	
	
	//-----------------------------CAPITULO 2000----------------------------------------------------
	
?>
	<tr>
	  <td>
<?
	$cad2 = mysql_query("select clave, nombre from partida where clave BETWEEN 2000 and 2999"); 
	$coco=mysql_num_rows($cad2);
?>
	 	<div id="d_2000" style="display<? if($coco>12){echo ":block; height:250px; width:1020px; overflow:auto;";}?>">
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
<?
	$cad2 = mysql_query("select clave, nombre from partida where clave BETWEEN 2000 and 2999"); 
	$capdos=2000;
	$condos=1; 
	while($dos = mysql_fetch_array($cad2)){
?>		
			<tr>	
    		  <td width="50"><?=$dos[0];?></td>
    		  <td width="200"><?=$dos[1];?></td>

				<?
 $palmil = mysql_query("select m.id_meta, m.clave, d.monto from meta_departamento d join
 meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." and d.periodo='2010' order by m.clave"); 
 $i=1;
 while($dospa = mysql_fetch_array($palmil)){
	$obj=new partida_departamento($dospa[1],$dos[0],$grantotal[1]);

?>   			  
      		<td align="center" width="<?=$wit;?>">
        <input name="txt_2000_<?=$condos;?>_hidmeta_<?=$i;?>" type="text" id="txt_2000_<?=$condos;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$condos;?>,<?=$i;?>,2000);" size="6" onkeypress="return decimales(event,this);" value="<? if($obj->getingreso_propio()!=0){ echo $obj->getingreso_propio();}?>"/>
        <input name="hid_2000_<?=$condos;?>" type="hidden" id="hid_2000_<?=$condos;?>" value="<?=$dos[0];?>"/></td>
		<? 
		$i++;
		}?>
      		<td align="center" width="80"><input name="txt_total_2000_<?=$condos;?>" type="text" id="txt_total_2000_<?=$condos;?>" size="7" readonly="true"/>      </td>
    		</tr>
	<? 
	$condos++;
	
	 //----------------TUPLA DEL CAPITULO 2000------------------------------
	}?>	
	</table>
	    </div></td>
	</tr>
		  	  <script language="javascript">
	  		document.getElementById('d_2000').style.display = "none"; </script>	
    <tr bgcolor="#CCCCCC">
	<td>
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
			<tr align="center">
			  <td width="250"><strong>
        <input name="tot_2000_partidas" type="hidden" id="tot_2000_partidas" value="<?=$condos-1;?>" />
      <label onClick="muestra_dtos(2000);" style="cursor:pointer">Capitulo 2000</label> </strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC" width="<?=$wit;?>"><input name="txt_2000_<?=$i;?>" type="text" id="txt_2000_<?=$i;?>" size="6" onchange="suma(2000,<?=$i;?>);" readonly="true"/></td>
<? }?>
      <td width="80"><input name="txtall_2000" type="text" id="txtall_2000" size="7"  readonly="true"/>      </td>
    </tr>
	<?	
	//--------------------CAPITULO 3000
	?>
	</table>
	</td>
	</tr>
	
    <tr>
 <td>
<?
	$cad3 = mysql_query("select clave, nombre from partida where clave BETWEEN 3000 and 3999");
	$coco=mysql_num_rows($cad3);
?> 
	 	<div id="d_3000" style="display:block<? if($coco>12){echo ":block; height:250px; width:1020px; overflow:auto;";}?>">
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
<?

	$captre=3000;
	$contre=1;
	while($tre = mysql_fetch_array($cad3)){
?>
			<tr>
    		  <td width="50"><?=$tre[0];?></td>
    		  <td width="200"><?=$tre[1];?></td>
				<?
 $palmil = mysql_query("select m.id_meta, m.clave, d.monto from meta_departamento d join
 meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." and d.periodo='2010' order by m.clave"); 
 $i=1;
 while($trepa = mysql_fetch_array($palmil)){
	$obj=new partida_departamento($trepa[1],$tre[0],$grantotal[1]);

?> 	
      		  <td align="center" width="<?=$wit;?>">
        <input name="txt_3000_<?=$contre;?>_hidmeta_<?=$i;?>" type="text" id="txt_3000_<?=$contre;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$contre;?>,<?=$i;?>,3000);" size="6" onkeypress="return decimales(event,this);" value="<? if($obj->getingreso_propio()!=0){ echo $obj->getingreso_propio();}?>"/>
        <input name="hid_3000_<?=$contre;?>" type="hidden" id="hid_3000_<?=$contre;?>" value="<?=$tre[0];?>"/></td>	<? $i++;}?>
      		  <td align="center" width="80"><input name="txt_total_3000_<?=$contre;?>" type="text" id="txt_total_3000_<?=$contre;?>" size="7" readonly="true"/></td>
    		</tr>
	<? 
	 //----------------TUPLA DEL CAPITULO 3000
	$contre++;
	}?>	
	</table>
	    </div>	  </td>
    </tr> 
		  	  <script language="javascript">
	  		document.getElementById('d_3000').style.display = "none"; </script>		
    <tr bgcolor="#CCCCCC">
	<td>
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
			<tr align="center">	
   			  <td width="250"><strong>
        <input name="tot_3000_partidas" type="hidden" id="tot_3000_partidas" value="<?=$contre-1;?>"/>
      <label onClick="muestra_dtos(3000);" style="cursor:pointer">Capitulo 3000</label> </strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC" width="<?=$wit;?>"><input name="txt_3000_<?=$i;?>" type="text" id="txt_3000_<?=$i;?>" size="6" readonly="true"/></td>
<? }?>
      <td width="80"><input name="txtall_3000" type="text" id="txtall_3000" size="7" readonly="true"/></td>
    </tr>
	</table>
	</td>
	</tr>

<?	
	//--------------------CAPITULO 4000
	
?>	
    <tr>
 <td>
<?
	$cad4 = mysql_query("select clave, nombre from partida where clave BETWEEN 4000 and 4999");
	$coco=mysql_num_rows($cad4);
?>  
	 	<div id="d_4000" style="display:block<? if($coco>12){echo ":block; height:250px; width:1020px; overflow:auto;";}?>">
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
<?

	$capcua=4000;
	$concua=1;
	while($cua = mysql_fetch_array($cad4)){
?>			
			<tr>	
      			<td width="50"><?=$cua[0];?></td>
      			<td width="200"><?=$cua[1];?></td>
				<?
 $palmil = mysql_query("select m.id_meta, m.clave, d.monto from meta_departamento d join
 meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." and d.periodo='2010' order by m.clave"); 
 $i=1;
 while($cuapa = mysql_fetch_array($palmil)){
	$obj=new partida_departamento($cuapa[1],$cua[0],$grantotal[1]);

?>  	
      			<td align="center" width="<?=$wit;?>">
        <input name="txt_4000_<?=$concua;?>_hidmeta_<?=$i;?>" type="text" id="txt_4000_<?=$concua;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$concua;?>,<?=$i;?>,4000);" size="6" onkeypress="return decimales(event,this);" value="<? if($obj->getingreso_propio()!=0){ echo $obj->getingreso_propio();}?>"/>
        <input name="hid_4000_<?=$concua;?>" type="hidden" id="hid_4000_<?=$concua;?>" value="<?=$cua[0];?>"/></td>	<? $i++;}?>
   			  <td align="center" width="80"><input name="txt_total_4000_<?=$concua;?>" type="text" id="txt_total_4000_<?=$concua;?>" size="7" readonly="true"/></td>
    		</tr>
	<? 
	 //----------------TUPLA DEL CAPITULO 4000
	$concua++;
	}?>	
	</table>
		</div>	  </td>
	</tr>
		  	  <script language="javascript">
	  		document.getElementById('d_4000').style.display = "none"; </script>		
    <tr bgcolor="#CCCCCC">
	<td>
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
			<tr align="center">	
   			  <td width="250"><strong>
        <input name="tot_4000_partidas" type="hidden" id="tot_4000_partidas" value="<?=$concua-1;?>"/>
      <label onClick="muestra_dtos(4000);" style="cursor:pointer">Capitulo 4000</label> </strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC" width="<?=$wit;?>"><input name="txt_4000_<?=$i;?>" type="text" id="txt_4000_<?=$i;?>" size="6" readonly="true"/></td>
<? }?>
      <td width="80"><input name="txtall_4000" type="text" id="txtall_4000" size="7" readonly="true"/></td>
    </tr>
	</table>
	</td>
	</tr>


	
	<?
		
	//------------------------------------------------CAPITULO 5000	
?>	
    <tr>
 <td>
<?
	$cad5 = mysql_query("select clave, nombre from partida where clave BETWEEN 5000 and 5999"); 
	$coco=mysql_num_rows($cad5);
?>  
	 	<div id="d_5000" style="display:block<? if($coco>12){echo ":block; height:250px; width:1020px; overflow:auto;";}?>">
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
<?

	$capcin=5000;
	$concin=1; 
	while($cin = mysql_fetch_array($cad5)){
?>	
		<tr>
      <td width="50"><?=$cin[0];?></td>
      <td width="200"><?=$cin[1];?></td>

				<?
 $palmil = mysql_query("select m.id_meta, m.clave, d.monto from meta_departamento d join
 meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." and d.periodo='2010' order by m.clave"); 
 $i=1;
 while($cinpa = mysql_fetch_array($palmil)){
	$obj=new partida_departamento($cinpa[1],$cin[0],$grantotal[1]);

?>   			  
      <td align="center" width="<?=$wit;?>">
        <input name="txt_5000_<?=$concin;?>_hidmeta_<?=$i;?>" type="text" id="txt_5000_<?=$concin;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$concin;?>,<?=$i;?>,5000);" size="6" onkeypress="return decimales(event,this);" value="<? if($obj->getingreso_propio()!=0){ echo $obj->getingreso_propio();}?>"/>
        <input name="hid_5000_<?=$concin;?>" type="hidden" id="hid_5000_<?=$concin;?>" value="<?=$cin[0];?>"/></td>	<? $i++;}?>
      <td align="center" width="80"><input name="txt_total_5000_<?=$concin;?>" type="text" id="txt_total_5000_<?=$concin;?>" size="7" readonly="true"/></td>
    </tr>
	<? 
	$concin++;
 //----------------TUPLA DEL CAPITULO 5000	
	}?>	
	</table>
		</div>	  </td>
	</tr>
<script language="javascript">document.getElementById('d_5000').style.display = "none"; </script>
    <tr bgcolor="#CCCCCC">
	<td>
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
			<tr align="center">	
      <td width="250"><strong>
        <input name="tot_5000_partidas" type="hidden" id="tot_5000_partidas" value="<?=$concin-1;?>"/>
      <label onClick="muestra_dtos(5000);" style="cursor:pointer">Capitulo 5000 </label></strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC" width="<?=$wit;?>"><input name="txt_5000_<?=$i;?>" type="text" id="txt_5000_<?=$i;?>" size="6" readonly="true"/></td>
<? }?>
      <td width="80"><input name="txtall_5000" type="text" id="txtall_5000" size="7" readonly="true"/></td>
    </tr>
		</table>
	  </td>
	</tr>
		
		<?
	
	
	//------------------------------------------------CAPITULO 6000	
?>	
    <tr>
 <td>
<?
	$cad6 = mysql_query("select clave, nombre from partida where clave BETWEEN 6000 and 6999"); 
	$coco=mysql_num_rows($cad6);
?>  
	 	<div id="d_6000" style="display:block<? if($coco>12){echo ":block; height:250px; width:1020px; overflow:auto;";}?>">
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
<? 

	$capsei=6000;
	$consei=1; 
	while($sei = mysql_fetch_array($cad6)){
?>	
		<tr>
      <td width="50"><?=$sei[0];?></td>
      <td width="200"><?=$sei[1];?></td>
				<?
 $palmil = mysql_query("select m.id_meta, m.clave, d.monto from meta_departamento d join
 meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." and d.periodo='2010' order by m.clave"); 
 $i=1;
 while($seipa = mysql_fetch_array($palmil)){
	$obj=new partida_departamento($seipa[1],$sei[0],$grantotal[1]);

?>  			  
      <td align="center" width="<?=$wit;?>">
        <input name="txt_6000_<?=$consei;?>_hidmeta_<?=$i;?>" type="text" id="txt_6000_<?=$consei;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$concin;?>,<?=$i;?>,6000);" size="6" onkeypress="return decimales(event,this);" value="<? if($obj->getingreso_propio()!=0){ echo $obj->getingreso_propio();}?>"/>
        <input name="hid_6000_<?=$consei;?>" type="hidden" id="hid_6000_<?=$consei;?>" value="<?=$sei[0];?>"/></td>	<? $i++;}?>
      <td align="center" width="80"><input name="txt_total_6000_<?=$consei;?>" type="text" id="txt_total_6000_<?=$consei;?>" size="7" readonly="true"/></td>
    </tr>
	<? 
	$consei++;
 //----------------TUPLA DEL CAPITULO 6000	
	
	
	}?>	
	</table>
		</div>	  </td>
	</tr>
<script language="javascript">document.getElementById('d_6000').style.display = "none"; </script>	
    <tr bgcolor="#CCCCCC">
	<td>
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
			<tr align="center">	
      <td width="250"><strong>
        <input name="tot_6000_partidas" type="hidden" id="tot_6000_partidas" value="<?=$consei-1;?>"/>
      <label onClick="muestra_dtos(6000);" style="cursor:pointer">Capitulo 6000</label></strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC" width="<?=$wit;?>"><input name="txt_6000_<?=$i;?>" type="text" id="txt_6000_<?=$i;?>" size="6" readonly="true"/></td>
<? }?>
      <td width="80"><input name="txtall_6000" type="text" id="txtall_6000" size="7" readonly="true"/></td>
    </tr>
	</table>
	</td>
	</tr>
	
	<? 
	//------------------------------------------------CAPITULO 7000	
?>		
    <tr>
 <td>
<?
	$cad7 = mysql_query("select clave, nombre from partida where clave BETWEEN 7000 and 7999"); 
	$coco=mysql_num_rows($cad7);
?>  
	 	<div id="d_7000" style="display:block<? if($coco>12){echo ":block; height:250px; width:1020px; overflow:auto;";}?>">
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
<? 
 
	$capsie=7000;
	$consie=1;	
	while($sie = mysql_fetch_array($cad7)){
?>	
		<tr>
      <td width="50"><?=$sie[0];?></td>
      <td width="200"><?=$sie[1];?></td>
				<?
 $palmil = mysql_query("select m.id_meta, m.clave, d.monto from meta_departamento d join
 meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." and d.periodo='2010' order by m.clave"); 
 $i=1;
 while($siepa = mysql_fetch_array($palmil)){
	$obj=new partida_departamento($siepa[1],$sie[0],$grantotal[1]);

?>   	
      <td align="center" width="<?=$wit;?>">
        <input name="txt_7000_<?=$consie;?>_hidmeta_<?=$i;?>" type="text" id="txt_7000_<?=$consie;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$consie;?>,<?=$i;?>,7000);" size="6" onkeypress="return decimales(event,this);" value="<? if($obj->getingreso_propio()!=0){ echo $obj->getingreso_propio();}?>"/>
        <input name="hid_7000_<?=$consie;?>" type="hidden" id="hid_7000_<?=$consie;?>" value="<?=$sie[0];?>"/></td>	<? $i++;}?>
      <td align="center" width="80"><input name="txt_total_7000_<?=$consie;?>" type="text" id="txt_total_7000_<?=$consie;?>" size="7" readonly="true"/></td>
    </tr>
	<? 
	$consie++;
	
//----------------TUPLA DEL CAPITULO 7000
 	
	}?>
	</table>
		</div>	  </td>
	</tr>
<script language="javascript">document.getElementById('d_7000').style.display = "none"; </script>			
    <tr bgcolor="#CCCCCC">
	<td>
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
			<tr align="center">	
      <td width="250"><strong>
        <input name="tot_7000_partidas" type="hidden" id="tot_7000_partidas" value="<?=$consie-1;?>"/>
      <label onClick="muestra_dtos(7000);" style="cursor:pointer">Capitulo 7000 </label>
      </strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC" width="<?=$wit;?>"><input name="txt_7000_<?=$i;?>" type="text" id="txt_7000_<?=$i;?>" size="6" readonly="true"/></td>
<? }?>
      <td width="80"><input name="txtall_7000" type="text" id="txtall_7000" size="7" readonly="true"/></td>
    </tr>
	</table>
	</td>
	</tr>
<?
		
	//------------------------------------------------CAPITULO 8000	
?>	
    <tr>
 <td>
<?
	$cad8 = mysql_query("select clave, nombre from partida where clave BETWEEN 8000 and 8999"); 
	$coco=mysql_num_rows($cad8);
?>
	 	<div id="d_8000" style="display:block<? if($coco>12){echo ":block; height:250px; width:1020px; overflow:auto;";}?>">
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
<? 

	$capoch=8000;
	$conoch=1; 
	while($och = mysql_fetch_array($cad8)){
?>	
		<tr>
      <td width="50"><?=$och[0];?></td>
      <td width="200"><?=$och[1];?></td>
				<?
 $palmil = mysql_query("select m.id_meta, m.clave, d.monto from meta_departamento d join
 meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." and d.periodo='2010' order by m.clave"); 
 $i=1;
 while($ochpa = mysql_fetch_array($palmil)){
	$obj=new partida_departamento($ochpa[1],$och[0],$grantotal[1]);

?> 			  
      <td align="center" width="<?=$wit;?>">
        <input name="txt_8000_<?=$conoch;?>_hidmeta_<?=$i;?>" type="text" id="txt_8000_<?=$conoch;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$conoch;?>,<?=$i;?>,8000);" size="6" onkeypress="return decimales(event,this);" value="<? if($obj->getingreso_propio()!=0){ echo $obj->getingreso_propio();}?>"/>
        <input name="hid_8000_<?=$conoch;?>" type="hidden" id="hid_8000_<?=$conoch;?>" value="<?=$och[0];?>"/></td>	<? $i++;}?>
      <td align="center" width="80"><input name="txt_total_8000_<?=$conoch;?>" type="text" id="txt_total_8000_<?=$conoch;?>" size="7" readonly="true"/></td>
    </tr>
	<? 
	$conoch++;
 //----------------TUPLA DEL CAPITULO 8000	
	}?>	
	</table>
		</div>	  </td>
	</tr>
<script language="javascript">document.getElementById('d_8000').style.display = "none"; </script>	
    <tr bgcolor="#CCCCCC">
	<td>
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
			<tr align="center">	
      <td width="250"><strong>
        <input name="tot_8000_partidas" type="hidden" id="tot_8000_partidas" value="<?=$conoch-1;?>"/>
      <label onClick="muestra_dtos(8000);" style="cursor:pointer">Capitulo 8000</label></strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC" width="<?=$wit;?>"><input name="txt_8000_<?=$i;?>" type="text" id="txt_8000_<?=$i;?>" size="6" readonly="true"/></td>
<? }?>
      <td width="80"><input name="txtall_8000" type="text" id="txtall_8000" size="7" readonly="true"/></td>
    </tr>
	</table>
	</td>
	</tr>
	
<?
		
	//------------------------------------------------CAPITULO 9000	
?>	
    <tr>
 <td>
<?
	$cad9 = mysql_query("select clave, nombre from partida where clave BETWEEN 9000 and 9999"); 
	$coco=mysql_num_rows($cad9);
?>
	 	<div id="d_9000" style="display:block<? if($coco>12){echo ":block; height:250px; width:1020px; overflow:auto;";}?>">
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">			
<? 

	$capnue=9000;
	$connue=1; 
	while($nue = mysql_fetch_array($cad9)){
?>	
		<tr>
      <td width="50"><?=$nue[0];?></td>
      <td width="200"><?=$nue[1];?></td>
				<?
 $palmil = mysql_query("select m.id_meta, m.clave, d.monto from meta_departamento d join
 meta m on d.id_meta=m.id_meta where id_departamento=".$clvdepa." and d.periodo='2010' order by m.clave"); 
 $i=1;
 while($nuepa = mysql_fetch_array($palmil)){
	$obj=new partida_departamento($milpa[1],$nue[0],$grantotal[1]);

?>  			  
      <td align="center" width="<?=$wit;?>">
        <input name="txt_9000_<?=$connue;?>_hidmeta_<?=$i;?>" type="text" id="txt_9000_<?=$connue;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$connue;?>,<?=$i;?>,<?=$capnue;?>);" size="6" onkeypress="return decimales(event,this);" value="<? if($obj->getingreso_propio()!=0){ echo $obj->getingreso_propio();}?>"/>
        <input name="hid_9000_<?=$connue;?>" type="hidden" id="hid_9000_<?=$connue;?>" value="<?=$nue[0];?>"/></td>	<? $i++;}?>
      <td align="center" width="80"><input name="txt_total_9000_<?=$connue;?>" type="text" id="txt_total_9000_<?=$connue;?>" size="7" readonly="true"/></td>
    </tr>
	<? 
	$connue++;
 //----------------TUPLA DEL CAPITULO 9000	
	
	
	}?>	
	</table>
		</div>	  </td>
	</tr>
<script language="javascript">document.getElementById('d_9000').style.display = "none"; </script>		
    <tr bgcolor="#CCCCCC">
	<td>
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
			<tr align="center">	
      <td width="250"><strong>
        <input name="tot_9000_partidas" type="hidden" id="tot_9000_partidas" value="<?=$connue-1;?>"/>
      <label onClick="muestra_dtos(9000);" style="cursor:pointer">Capitulo 9000</label></strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC" width="<?=$wit;?>"><input name="txt_9000_<?=$i;?>" type="text" id="txt_9000_<?=$i;?>" size="6" readonly="true"/></td>
<? }?>
      <td width="80"><input name="txtall_9000" type="text" id="txtall_9000" size="7" readonly="true"/></td>
    </tr>
	</table>
	</td>
	</tr>
	
	
		<? //-------------------- ULTIMA TUPLA -------------------
		?>
	
    <tr>
      <td>
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
			<tr align="center">
			<td width="250">
	  <strong>TOTAL DE CAPITULOS </strong></td>
	  
 <? for($x=1;$x<=$con;$x++){?>	
      <td align="center" width="<?=$wit;?>"><input name="allcapi_<?=$x;?>" type="text" id="allcapi_<?=$x;?>" size="6" readonly="true"/>
  		</td>
<? }?>	  
      <td width="80" align="center"><input name="TOTAL" type="text" id="TOTAL" size="7" readonly="true"/></td>
    </tr>
	</table>
	</td>
	</tr>
    <tr>
      <td>
		<table width="1000"  border="0" cellpadding="0" cellspacing="0">
			<tr align="center">	
      <td>&nbsp;</td>
      <td align="right"><div align="right">Cantidad Restante </div></td>
      <td width="80" align="center"><input name="restante" type="text" id="restante" size="7" /></td>
    </tr>
	</table>
	</td>
	</tr>
  </table>
<?
if(isset($_POST['TOTAL']) && $_POST['TOTAL']!='')
{
	$cmeta=$_POST['hidtotmeta'];
	$mile=$_POST['tot_1000_partidas'];
	$dosm=$_POST['tot_2000_partidas'];
	$tres=$_POST['tot_3000_partidas'];
	$cuat=$_POST['tot_4000_partidas'];
	$cinc=$_POST['tot_5000_partidas'];
	$seis=$_POST['tot_6000_partidas'];
	$siet=$_POST['tot_7000_partidas'];
	$ocho=$_POST['tot_8000_partidas'];
	$nuev=$_POST['tot_9000_partidas'];
	$depar=$_POST['clvdepa'];
	$clvdepartamento=$_POST['clvdeparta'];
	mysql_query("delete from partida_departamento where id_departamento=".$depar. " and periodo='".date('Y')."'");
	//$resu = mysql_fetch_row($cho);
	//$depar=$resu[0];
	//------------------al momento de mandar llamar a los obj verificar si es un agregar o un modificar
	echo "<br>cmeta:".$cmeta." mile:".$dosm;

	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$mile;$q++)
		{
			if($_POST["txt_1000_".$q."_hidmeta_".$m]=='' || $_POST["txt_1000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_1000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_1000_".$q];
			$meta=$_POST["hidmeta_".$m];
			
			$obj_meta=new Meta($meta);			
			$id_meta =$obj_meta->getid_meta();			
			$obj_parti=new Partida($partida);	
			$id_partida =$obj_parti->getid_partida();
			//se crea el objeto y se rellena con los datos
			$obj=new partida_departamento();
			$obj->setid_meta($id_meta);
			$obj->setid_partida($id_partida);
			$obj->setid_departamento($depar);
			$obj->setingreso_propio($monto);		
			$obj->setvigencia(date("Y/m/d"));
			$obj->agregar();
			$obj_pa=new Partida($partida);
			$obj_pa->modificamonto();
			echo "<br>monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>objeto partida: ". $partida. "<br>";		
		}
	}
	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$dosm;$q++)
		{
			if($_POST["txt_2000_".$q."_hidmeta_".$m]=='' || $_POST["txt_2000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_2000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_2000_".$q];
			$meta=$_POST["hidmeta_".$m];
			
			$obj_meta=new Meta($meta);			
			$id_meta =$obj_meta->getid_meta();			
			$obj_parti=new Partida($partida);	
			$id_partida =$obj_parti->getid_partida();
			//se crea el objeto y se rellena con los datos

			$obj=new partida_departamento();
			$obj->setid_meta($id_meta);
			$obj->setid_partida($id_partida);
			$obj->setid_departamento($depar);
			$obj->setingreso_propio($monto);		
			$obj->setvigencia(date("Y/m/d"));
			$obj->agregar();
			$obj_pa=new Partida($partida);
			$obj_pa->modificamonto();
			echo "<br>monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>objeto partida: ". $partida. "<br>";		
		}
	}
	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$tres;$q++)
		{
			if($_POST["txt_3000_".$q."_hidmeta_".$m]=='' || $_POST["txt_3000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_3000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_3000_".$q];
			$meta=$_POST["hidmeta_".$m];
							
			$obj_meta=new Meta($meta);			
			$id_meta =$obj_meta->getid_meta();			
			$obj_parti=new Partida($partida);	
			$id_partida =$obj_parti->getid_partida();
			//se crea el objeto y se rellena con los datos

			$obj=new partida_departamento();
			$obj->setid_meta($id_meta);
			$obj->setid_partida($id_partida);
			$obj->setid_departamento($depar);
			$obj->setingreso_propio($monto);		
			$obj->setvigencia(date("Y/m/d"));
			$obj->agregar();
			$obj_pa=new Partida($partida);
			$obj_pa->modificamonto();
			echo "<br>monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>objeto partida: ". $partida. "<br>";		
		}
	}
	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$cuat;$q++)
		{
			if($_POST["txt_4000_".$q."_hidmeta_".$m]=='' || $_POST["txt_4000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_4000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_4000_".$q];
			$meta=$_POST["hidmeta_".$m];
				
			$obj_meta=new Meta($meta);			
			$id_meta =$obj_meta->getid_meta();			
			$obj_parti=new Partida($partida);	
			$id_partida =$obj_parti->getid_partida();
			//se crea el objeto y se rellena con los datos

			$obj=new partida_departamento();
			$obj->setid_meta($id_meta);
			$obj->setid_partida($id_partida);
			$obj->setid_departamento($depar);
			$obj->setingreso_propio($monto);		
			$obj->setvigencia(date("Y/m/d"));
			$obj->agregar();
			$obj_pa=new Partida($partida);
			$obj_pa->modificamonto();
			echo "<br>monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>objeto partida: ". $partida. "<br>";
		}
	}
	$cad='';
	$sum=0;	
	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$cinc;$q++)
		{
			if($_POST["txt_5000_".$q."_hidmeta_".$m]=='' || $_POST["txt_5000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_5000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_5000_".$q];
			$meta=$_POST["hidmeta_".$m];

			$cad.="&monto".$sum."=".$monto."&partida".$sum."=".$partida."&meta".$sum."=".$meta."&poli";
			$sum++;			
			
			$obj_meta=new Meta($meta);			
			$id_meta =$obj_meta->getid_meta();			
			$obj_parti=new Partida($partida);	
			$id_partida =$obj_parti->getid_partida();
			//se crea el objeto y se rellena con los datos

			$obj=new partida_departamento();
			$obj->setid_meta($id_meta);
			$obj->setid_partida($id_partida);
			$obj->setid_departamento($depar);
			$obj->setingreso_propio($monto);		
			$obj->setvigencia(date("Y/m/d"));
			$obj->agregar();
			$obj_pa=new Partida($partida);
			$obj_pa->modificamonto();
			echo "<br>monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>objeto partida: ". $partida. "<br>";
		}
	}
	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$seis;$q++)
		{
			if($_POST["txt_6000_".$q."_hidmeta_".$m]=='' || $_POST["txt_6000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_6000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_6000_".$q];
			$meta=$_POST["hidmeta_".$m];
				
			$obj_meta=new Meta($meta);			
			$id_meta =$obj_meta->getid_meta();			
			$obj_parti=new Partida($partida);	
			$id_partida =$obj_parti->getid_partida();
			//se crea el objeto y se rellena con los datos

			$obj=new partida_departamento();
			$obj->setid_meta($id_meta);
			$obj->setid_partida($id_partida);
			$obj->setid_departamento($depar);
			$obj->setingreso_propio($monto);		
			$obj->setvigencia(date("Y/m/d"));
			$obj->agregar();
			$obj_pa=new Partida($partida);
			$obj_pa->modificamonto();
			echo "<br>monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>objeto partida: ". $partida. "<br>";		
		}
	}	
	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$siet;$q++)
		{
			if($_POST["txt_7000_".$q."_hidmeta_".$m]=='' || $_POST["txt_7000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_7000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_7000_".$q];
			$meta=$_POST["hidmeta_".$m];
				
			$obj_meta=new Meta($meta);			
			$id_meta =$obj_meta->getid_meta();			
			$obj_parti=new Partida($partida);	
			$id_partida =$obj_parti->getid_partida();
			//se crea el objeto y se rellena con los datos

			$obj=new partida_departamento();
			$obj->setid_meta($id_meta);
			$obj->setid_partida($id_partida);
			$obj->setid_departamento($depar);
			$obj->setingreso_propio($monto);		
			$obj->setvigencia(date("Y/m/d"));
			$obj->agregar();
			$obj_pa=new Partida($partida);
			$obj_pa->modificamonto();
			echo "<br>monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>objeto partida: ". $partida. "<br>";
		}
	}			
	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$ocho;$q++)
		{
			if($_POST["txt_8000_".$q."_hidmeta_".$m]=='' || $_POST["txt_8000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_8000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_8000_".$q];
			$meta=$_POST["hidmeta_".$m];
				
			$obj_meta=new Meta($meta);			
			$id_meta =$obj_meta->getid_meta();			
			$obj_parti=new Partida($partida);	
			$id_partida =$obj_parti->getid_partida();
			//se crea el objeto y se rellena con los datos

			$obj=new partida_departamento();
			$obj->setid_meta($id_meta);
			$obj->setid_partida($id_partida);
			$obj->setid_departamento($depar);
			$obj->setingreso_propio($monto);		
			$obj->setvigencia(date("Y/m/d"));
			$obj->agregar();
			$obj_pa=new Partida($partida);
			$obj_pa->modificamonto();
			echo "<br>monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>objeto partida: ". $partida. "<br>";
		}
	}
	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$nuev;$q++)
		{
			if($_POST["txt_9000_".$q."_hidmeta_".$m]=='' || $_POST["txt_9000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_9000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_9000_".$q];
			$meta=$_POST["hidmeta_".$m];
				
			$obj_meta=new Meta($meta);			
			$id_meta =$obj_meta->getid_meta();			
			$obj_parti=new Partida($partida);	
			$id_partida =$obj_parti->getid_partida();
			//se crea el objeto y se rellena con los datos

			$obj=new partida_departamento();
			$obj->setid_meta($id_meta);
			$obj->setid_partida($id_partida);
			$obj->setid_departamento($depar);
			$obj->setingreso_propio($monto);		
			$obj->setvigencia(date("Y/m/d"));
			$obj->agregar();
			$obj_pa=new Partida($partida);
			$obj_pa->modificamonto();
			echo "<br>monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>objeto partida: ". $partida. "<br>";
		}
	}
	echo "<br>";	
	//-------------------------------------------------------------------------------------------
	//for para mandar llamar al objeto meta y al objero meta_departamento

	for($m=1;$m<=$cmeta;$m++)
	{

		if($_POST["allcapi_".$m]=='' || $_POST["allcapi_".$m]==0)
			continue;
		$meta=$_POST["hidmeta_".$m];
				
		echo "objeto meta llama: ".$meta."<br>objeto meta departamento: ".$meta." ".$clvdepartamento."<br>";	
		//creo objeto para meta departamento
		$obj_metadepa=new Meta_departamento($clvdepartamento,$meta);
		$obj_metadepa->modificar();
		//creo objeto para meta
		$obj_meta=new Meta($meta);
		$obj_meta->modificar();		
		
	}
	//for para mandar llamar al objeto capitulo y meta_capitulo
	echo "<br>";
	for($c=1000;$c<=9000;$c+=1000)
	{
		for($m=1;$m<=$cmeta;$m++)
		{
			if($_POST["txtall_".$c]=='' || $_POST["txtall_".$c]==0 || $_POST["txt_".$c."_".$m]=='' || $_POST["txt_".$c."_".$m]==0)	
				continue;
			$meta=$_POST["hidmeta_".$m];	
			echo "objeto meta capitulo: ".$meta." ".$c."<br>";
			//mando llamar al objeto meta_capitulo
			//se obtiene el id del capitulo y meta
			
			$obj_meta=new Meta($meta);			
			$id_meta =$obj_meta->getid_meta();
			$obj_capi=new Capitulo($c);						
			$id_capitulo=$obj_capi->getid_capitulo();
			$peri=date('Y');
			//consulta para chekar si ya existe esa tupla
			echo "<br>el id de la meta: ".$id_meta." el id del capitulo: ".$id_capitulo."<br>";
			$obj_mc=new Meta_capitulo($meta,$c);
			$numero =$obj_mc->getclave_meta();
			
			if($numero!='')
			{			
				$obj_mc->modificar();
			}
			else
			{
				$obj_mc->setid_meta($id_meta);
				$obj_mc->setid_capitulo($id_capitulo);
				$obj_mc->agregar();			
			}				
												
		}	
		if($_POST["txtall_".$c]=='' || $_POST["txtall_".$c]==0)	
			continue;
		//mando llamar al objeto capitulo
		echo "Objeto capitulo:".$c."<br>";
		$obj_capitulo=new Capitulo($c);
		$obj_capitulo->modificaCapitulos();
	}
	//for para mandar llamar al objeto proceso_clave_meta
	echo "<br>FOR PARA PROCESO CLAVE META<br>";
	for($m=1;$m<=$cmeta;$m++)
	{
		$meta=$_POST["hidmeta_".$m];
		list($p_estra, $p_clave, $y_meta) = split('[.]', $meta);
		list($a_estra_repe[], $a_clave_repe[], $pornomas) = split('[.]', $meta);		

		//concateno estrategico con clave pa tener la clave de proceso clave
		$clvcomp=$p_estra.".".$p_clave;
		echo "proceso clave: ".$clvcomp." meta:".$meta."<br>";		
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
		echo "objeto proceso clace:".$procesoclave."<br>";
		//objeto proceso clave
		$obj_pclave=new proceso_clave($procesoclave);
		$obj_pclave->modificamonto();		
	}
	
	echo "<br>FOR PARA PROCESO ESTRATEGICO<br>";
	foreach($a_estra as $estrategico)
	{
		echo "objeto proceso estrategico:".$estrategico."<br>";
		//creo objeto para proceso estrategico
		$obj_pestrate=new proceso_estrategico($estrategico);
		$obj_pestrate->modificamonto();
	}	

	
	
	if(!($cad==''))
	{
		$cad.="&sum=".$sum;	
		echo '<script lenguaje="javascript">open("cincomil.php?'.$cad.'","_self");</script>';		
	}
	

}
?>
<table width="50%" border="0" align="center">
  <tr>
    <td align="center"><div align="center">
      <input type="button" name="Button" value="Guardar cambios" onclick="salvar();"/>
    </div></td>
    <td align="center"><div align="center">
      <input type="button" name="Button" value="Concluir Distribucci&oacute;n" onclick="validar();"/>
    </div></td>
  </tr>
</table>
</form>
HOJA DE TRABAJO PARA ELABORACION DE POA
                        <?=date('Y');?>
POR DEPARTAMENTO 
</body>
</html>
