<? session_start(); ?>
<?  require_once("conexion.php"); ?>
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
}

a:hover {
background: #900;
color: #fff;
}
</style>







<body onload="cargar();" onunload="window.opener.history.go(0);" >


                        
						
<div  align="center" class="cssMenu">
                        
                       
							<ul id="navmenu">
  <li><a href="index_menu.php">Inicio</a></li>
  
  
  <li><a >Catalogos +</a>
    <ul>
    <li><a   href="presupuestoinicial.php">Presupuesto Inicial</a>   </li>
    <li><a  href="altadireccion.php">Alta Direccion</a></li>
    <li><a  href="departamento.php">Departamento</a></li>
     <li><a  href="meta1.php">Meta</a></li>
     
      <li><a href="TCapitulo.php">Capitulo</a></li>
      <li><a  href="TSubcapitulo.php">Conceptos</a></li>
      <li><a  href="TSubconcepto.php">Sub-conceptos</a></li>
      <li><a href="TPartidas.php">Partida</a></li>
      <li><a  href="accion1.php">Accion</a></li>
      <li><a href="proceso_clave.php">Proceso Clave</a></li>
      <li><a href="proceso_estrategico.php">Proceso Estrategico</a></li>
     
      
     
      <li><a  href="capitulo5000.php">Capitulo 5000 +</a>
     		 <ul>
            	<li><a  href="capitulo5000_especifico.php">Por departamento</a></li>
                <li><a  href="capitulo5000_pormeta.php">Por meta</a></li>
                <li><a  href="capitulo5000_porpartida.php">Por partida</a></li>
            
            </ul>  
            
                
      
      
      </li>
      		
      
      <li><a href="gastodirecto.php">Gasto Directo</a></li>
      
      
      <li><a href="periodos.php"> Administrar Periodos </a></li>
      
      
     
      
      
      
    </ul>
  </li>
  
  
  <li><a href="#">Distribucion +</a>
    <ul>
    <li><a  href="distribucion_presupuestoinicial.php">Presupuesto Incial</a></li>
      <li><a  href="distribucion_altadireccion.php">Alta Direccion </a> </li>
      <li><a  href="distribucion_departamento.php">Departamento</a>   </li>
      <li><a href="www.php">Departamento - Metas </a></li>
     
      
      
      
    </ul>
  </li>
  <li><a  href="combo_apoa.php">APOA Formato</a></li>
  <li><a   href="APOApartidaPresupuestal.php">APOA Formato Partida Prespuestal</a></li>
  <li><a  href="programa_operativo_anual.php">Concentrado PC y PE</a></li>  
  <li><a href="formato_capitulo5000.php">Capitulo 5000</a></li>
  <li><a href="index.php">Cambiar periodo</a></li>
</ul>
						</div>
<form id="form1" name="form1" method="post" action="">
  <p>
<?
$cadena_sql = mysql_query("select clave_meta, monto from meta_departamento where clave_departamento=305 and periodo='2010';");
$cade = mysql_query("select clave_meta, monto from meta_departamento where clave_departamento=305 and periodo='2010';");
$mon = mysql_query("select monto from departamento where clave=305;");
$grantotal = mysql_fetch_array($mon);
$con=mysql_num_rows($cadena_sql);
?>
  </p>
  <table width="80%" border="0" align="center">
    <tr>
      <td align="center">HOJA DE TRABAJO PARA ELABORACION DE POA <?=date('Y');?> POR DEPARTAMENTO </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="80%" border="0" align="center">
    <tr>
      <td>      <input name="grantotal" type="hidden" id="grantotal" value="<?=$grantotal[0];?>"/>
      Clave</td>
      <td>Nombre</td>
	  <?
	  $a=1;
	  while($row = mysql_fetch_array($cadena_sql)){?>
      <td align="center"><?=$row[0];?>
      <input name="hidmeta_<?=$a;?>" type="hidden" id="hidmeta" value="<?=$row[0];?>"/></td>
	  <? 
	  $a++;
	  }?>
      <td align="center"><input name="hidtotmeta" type="hidden" id="hidtotmeta" value="<?=$a-1;?>"/>
      Total</td>
    </tr>
	

	<?
	//------------------------------------------------CAPITULO 1000
	$cad = mysql_query("select clave, nombre from partida where clave BETWEEN 1000 and 1999"); 
	//contador de partidas
	$capmil=1000;
	$conmil=1;
	while($mil = mysql_fetch_array($cad)){?>
    <tr>
      <td><?=$mil[0];?></td>
      <td><?=$mil[1];?></td>
 <? for($i=1;$i<=$con;$i++){?>  
      <td align="center">
        <input name="txt_<?=$capmil;?>_<?=$conmil;?>_hidmeta_<?=$i;?>" type="text" id="txt_<?=$capmil;?>_<?=$conmil;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$conmil;?>,<?=$i;?>,<?=$capmil;?>);" size="7" onkeypress="return decimales(event,this);"/>
        <input name="hid_<?=$capmil;?>_<?=$conmil;?>_hidmeta_<?=$i;?>" type="hidden" id="hid_<?=$capmil;?>_<?=$conmil;?>_hidmeta_<?=$i;?>" value="<?=$mil[0];?>"/></td>
<? }?>	
      <td align="center"><input name="txt_total_<?=$capmil;?>_<?=$conmil;?>" type="text" id="txt_total_<?=$capmil;?>_<?=$conmil;?>" size="10" readonly="true"/></td>
    </tr>
 <? 
 	$conmil++;
 
 
 //----------------TUPLA DEL CAPITULO 1000
 
 }?>	
 
    <tr align="center">
      <td colspan="2" bgcolor="#CCCCCC"><strong>
        <input name="tot_<?=$capmil;?>_partidas" type="hidden" id="tot_<?=$capmil;?>_partidas" value="<?=$conmil-1;?>"/>
      Capitulo 1000 </strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC"><input name="txt_<?=$capmil;?>_<?=$i;?>" type="text" id="txt_<?=$capmil;?>_<?=$i;?>" size="7" readonly="true"/></td>
<? }?>
      <td bgcolor="#CCCCCC"><input name="txtall_<?=$capmil;?>" type="text" id="txtall_<?=$capmil;?>" size="10" readonly="true"/>      </td>
    </tr>
	<?
	
	
	//-----------------------------CAPITULO 2000----------------------------------------------------
	
	
	$cad2 = mysql_query("select clave, nombre from partida where clave BETWEEN 2000 and 2999"); 
	
	$capdos=2000;
	$condos=1; 
	while($dos = mysql_fetch_array($cad2)){?>	
    <tr>
      <td><?=$dos[0];?></td>
      <td><?=$dos[1];?></td>

 <? for($i=1;$i<=$con;$i++){?>  			  
      <td align="center">
        <input name="txt_<?=$capdos;?>_<?=$condos;?>_hidmeta_<?=$i;?>" type="text" id="txt_<?=$capdos;?>_<?=$condos;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$condos;?>,<?=$i;?>,<?=$capdos;?>);" size="7" onkeypress="return decimales(event,this);"/>
        <input name="hid_<?=$capdos;?>_<?=$condos;?>_hidmeta_<?=$i;?>" type="hidden" id="hid_<?=$capdos;?>_<?=$condos;?>_hidmeta_<?=$i;?>" value="<?=$dos[0];?>"/></td>	<? }?>
      <td align="center"><input name="txt_total_<?=$capdos;?>_<?=$condos;?>" type="text" id="txt_total_<?=$capdos;?>_<?=$condos;?>" size="10" readonly="true"/>      </td>
    </tr>
	<? 
	$condos++;
	
	
	 //----------------TUPLA DEL CAPITULO 2000------------------------------
	
	}?>	
    <tr bgcolor="#CCCCCC" align="center">
      <td colspan="2"><strong>
        <input name="tot_<?=$capdos;?>_partidas" type="hidden" id="tot_<?=$capdos;?>_partidas" value="<?=$condos-1;?>" />
      Capitulo 2000 </strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC"><input name="txt_<?=$capdos;?>_<?=$i;?>" type="text" id="txt_<?=$capdos;?>_<?=$i;?>" size="7" onchange="suma(<?=$capdos;?>,<?=$i;?>);" readonly="true"/></td>
<? }?>
      <td><input name="txtall_<?=$capdos;?>" type="text" id="txtall_<?=$capdos;?>" size="10"  readonly="true"/>      </td>
    </tr>
	<?
	
	
	
	
	
	//--------------------CAPITULO 3000
	
	
	$cad3 = mysql_query("select clave, nombre from partida where clave BETWEEN 3000 and 3999");
	$captre=3000;
	$contre=1;
	while($tre = mysql_fetch_array($cad3)){?>	
    <tr>
      <td><?=$tre[0];?></td>
      <td><?=$tre[1];?></td>
 <? for($i=1;$i<=$con;$i++){?>  	
      <td align="center">
        <input name="txt_<?=$captre;?>_<?=$contre;?>_hidmeta_<?=$i;?>" type="text" id="txt_<?=$captre;?>_<?=$contre;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$contre;?>,<?=$i;?>,<?=$captre;?>);" size="7" onkeypress="return decimales(event,this);"/>
        <input name="hid_<?=$captre;?>_<?=$contre;?>_hidmeta_<?=$i;?>" type="hidden" id="hid_<?=$captre;?>_<?=$contre;?>_hidmeta_<?=$i;?>" value="<?=$tre[0];?>"/></td>	<? }?>
      <td align="center"><input name="txt_total_<?=$captre;?>_<?=$contre;?>" type="text" id="txt_total_<?=$captre;?>_<?=$contre;?>" size="10" readonly="true"/></td>
    </tr>
	<? 
	 //----------------TUPLA DEL CAPITULO 3000
	
	$contre++;
	}?>	
    <tr bgcolor="#CCCCCC" align="center">
      <td colspan="2"><strong>
        <input name="tot_<?=$captre;?>_partidas" type="hidden" id="tot_<?=$captre;?>_partidas" value="<?=$contre-1;?>"/>
      Capitulo 3000 </strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC"><input name="txt_<?=$captre;?>_<?=$i;?>" type="text" id="txt_<?=$captre;?>_<?=$i;?>" size="7" readonly="true"/></td>
<? }?>
      <td><input name="txtall_<?=$captre;?>" type="text" id="txtall_<?=$captre;?>" size="10" readonly="true"/></td>
    </tr>
	<?
	
	
	//------------------------------------------------CAPITULO 5000	
	$cad4 = mysql_query("select clave, nombre from partida where clave BETWEEN 5000 and 5999"); 
	$capcin=5000;
	$concin=1; 
	while($cin = mysql_fetch_array($cad4)){?>	
    <tr>
      <td><?=$cin[0];?></td>
      <td><?=$cin[1];?></td>

 <? for($i=1;$i<=$con;$i++){?>  			  
      <td align="center">
        <input name="txt_<?=$capcin;?>_<?=$concin;?>_hidmeta_<?=$i;?>" type="text" id="txt_<?=$capcin;?>_<?=$concin;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$concin;?>,<?=$i;?>,<?=$capcin;?>);" size="7" onkeypress="return decimales(event,this);"/>
        <input name="hid_<?=$capcin;?>_<?=$concin;?>_hidmeta_<?=$i;?>" type="hidden" id="hid_<?=$capcin;?>_<?=$concin;?>_hidmeta_<?=$i;?>" value="<?=$cin[0];?>"/></td>	<? }?>
      <td align="center"><input name="txt_total_<?=$capcin;?>_<?=$concin;?>" type="text" id="txt_total_<?=$capcin;?>_<?=$concin;?>" size="10" readonly="true"/></td>
    </tr>
	<? 
	$concin++;
 //----------------TUPLA DEL CAPITULO 5000	
	
	
	}?>	
    <tr bgcolor="#CCCCCC" align="center">
      <td colspan="2"><strong>
        <input name="tot_<?=$capcin;?>_partidas" type="hidden" id="tot_<?=$capcin;?>_partidas" value="<?=$concin-1;?>"/>
      Capitulo 5000 </strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC"><input name="txt_<?=$capcin;?>_<?=$i;?>" type="text" id="txt_<?=$capcin;?>_<?=$i;?>" size="7" readonly="true"/></td>
<? }?>
      <td><input name="txtall_<?=$capcin;?>" type="text" id="txtall_<?=$capcin;?>" size="10" readonly="true"/></td>
    </tr>
	
	
	
	
	<? 
	//------------------------------------------------CAPITULO 7000	
	$cad5 = mysql_query("select clave, nombre from partida where clave BETWEEN 7000 and 7999");  
	$capsie=7000;
	$consie=1;	
	while($sie = mysql_fetch_array($cad5)){?>		
    <tr>
      <td><?=$sie[0];?></td>
      <td><?=$sie[1];?></td>

 <? for($i=1;$i<=$con;$i++){?>  	
      <td align="center">
        <input name="txt_<?=$capsie;?>_<?=$consie;?>_hidmeta_<?=$i;?>" type="text" id="txt_<?=$capsie;?>_<?=$consie;?>_hidmeta_<?=$i;?>" onblur="cal(<?=$consie;?>,<?=$i;?>,<?=$capsie;?>);" size="7" onkeypress="return decimales(event,this);"/>
        <input name="hid_<?=$capsie;?>_<?=$consie;?>_hidmeta_<?=$i;?>" type="hidden" id="hid_<?=$capsie;?>_<?=$consie;?>_hidmeta_<?=$i;?>" value="<?=$sie[0];?>"/></td>	<? }?>
      <td align="center"><input name="txt_total_<?=$capsie;?>_<?=$consie;?>" type="text" id="txt_total_<?=$capsie;?>_<?=$consie;?>" size="10" readonly="true"/></td>
    </tr>
	<? 
	$consie++;
	
//----------------TUPLA DEL CAPITULO 7000
 	
	
	
	}?>	
    <tr bgcolor="#CCCCCC" align="center">
      <td colspan="2"><strong>
        <input name="tot_<?=$capsie;?>_partidas" type="hidden" id="tot_<?=$capsie;?>_partidas" value="<?=$consie-1;?>"/>
      Capitulo 7000 </strong></td>
 <? for($i=1;$i<=$con;$i++){?>	  
      <td bgcolor="#CCCCCC"><input name="txt_<?=$capsie;?>_<?=$i;?>" type="text" id="txt_<?=$capsie;?>_<?=$i;?>" size="7" readonly="true"/></td>
<? }?>
      <td><input name="txtall_<?=$capsie;?>" type="text" id="txtall_<?=$capsie;?>" size="10" readonly="true"/></td>
    </tr>
    <tr>
      <td colspan="2"><strong>TOTAL DE CAPITULOS </strong></td>
	  
	  <?
	  $x=1;
	  while($ren = mysql_fetch_array($cade)){?>	  
      <td align="center"><input name="allcapi_<?=$x;?>" type="text" id="allcapi_<?=$x;?>" size="7" readonly="true"/>
      <input name="limeta_<?=$x;?>" type="hidden" id="limeta_<?=$x;?>" value="<?=$ren[1];?>"/></td>
<? 
$x++;
}?>	  
      <td align="center"><input name="TOTAL" type="text" id="TOTAL" size="10" readonly="true"/></td>
    </tr>
    <tr align="center">
      <td colspan="4"><input type="button" name="Button" value="Guardar" onclick="validar();"/></td>
    </tr>
  </table>
<?
if(isset($_POST['TOTAL']) && $_POST['TOTAL']!='')
{
	$cmeta=$_POST['hidtotmeta'];
	$mile=$_POST['tot_1000_partidas'];
	$dosm=$_POST['tot_2000_partidas'];
	$tres=$_POST['tot_3000_partidas'];
	$cinc=$_POST['tot_5000_partidas'];
	$siet=$_POST['tot_7000_partidas'];	
	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$mile;$q++)
		{
			if($_POST["txt_1000_".$q."_hidmeta_".$m]=='' || $_POST["txt_1000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_1000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_1000_".$q."_hidmeta_".$m];
			$meta=$_POST["hidmeta_".$m];
				
			echo "monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>";	
		}
	}
	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$dosm;$q++)
		{
			if($_POST["txt_2000_".$q."_hidmeta_".$m]=='' || $_POST["txt_2000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_2000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_2000_".$q."_hidmeta_".$m];
			$meta=$_POST["hidmeta_".$m];
				
			echo "monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>";					
		}
	}
	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$tres;$q++)
		{
			if($_POST["txt_3000_".$q."_hidmeta_".$m]=='' || $_POST["txt_3000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_3000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_3000_".$q."_hidmeta_".$m];
			$meta=$_POST["hidmeta_".$m];
				
			echo "monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>";					
		}
	}
	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$cinc;$q++)
		{
			if($_POST["txt_5000_".$q."_hidmeta_".$m]=='' || $_POST["txt_5000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_5000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_5000_".$q."_hidmeta_".$m];
			$meta=$_POST["hidmeta_".$m];
				
			echo "monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>";					
		}
	}
	for($m=1;$m<=$cmeta;$m++)
	{
		for($q=1;$q<=$siet;$q++)
		{
			if($_POST["txt_7000_".$q."_hidmeta_".$m]=='' || $_POST["txt_7000_".$q."_hidmeta_".$m]==0)
				continue;
			$monto=$_POST["txt_7000_".$q."_hidmeta_".$m];
			$partida=$_POST["hid_7000_".$q."_hidmeta_".$m];
			$meta=$_POST["hidmeta_".$m];
				
			echo "monto: ".$monto."	partida: ".$partida." meta: ".$meta."<br>";					
		}
	}			
	
}
?>  
</form>

<title>Administrador de contenidos web - Tecnológico de Colima</title>

<span class="txtcontenidoazul">Apoa</span>
</body>
</html>
