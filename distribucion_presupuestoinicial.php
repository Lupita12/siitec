<? session_start(); ?>
<? include("cls_presupuestoinicial.php"); ?>
<? include("conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/contenidos.dwt" codeOutsideHTMLIsLocked="false" -->

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
                        <!-- InstanceBeginEditable name="body" -->
                                
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
function enviar(){
	with(document.form1)
	{
		if(txtmonto.value==""){
			alert("EL MONTO NO PUEDE ESTAR EN BLANCO");txtmonto.focus();return;
		}
		
		document.form1.submit();
	}	
}
function longitud(campo)
{
	with(document.form1)
	{
		
	}
}
</script>
                                
<?PHP	
//ESTA CONSULTA ES PARA OBTENER EL  MONTO QUE SE ASIGNO EN EL PRESUPUESTO INICIAL Y NO PASARSE DE TAL MONTO  
	$var="SELECT monto FROM presupuestoinicial";
	$var2 = mysql_query($var);
	$row=mysql_fetch_array($var2);
	$total = $row['monto'];
	
?>
<form id="form1" name="form1" method="post" action="" >
  <table width="51%" border="0" align="center">
    <tr>
      <td height="31" colspan="2" align="center">AGREGAR PRESUPUESTO INICIAL</td>
    </tr>
    <tr>
      <td width="311">Vigencia:</td>
      <td width="295" height="21">Monto:</td>
      </tr>
    <tr>
      <td><input name="txtvigencia" type="text" id="txtvigencia" size="20" value="<? echo(date('d/m/Y'))?>" readonly="readonly" /></td>
      <td height="24"><input name="txtmonto" type="text" id="txtmonto" onkeypress = "return decimales(event,this);" size="20" value="<?=$total;?>"/></td>
      </tr>
    <tr>
      <td height="28" colspan="3" align="center"><div align="center">
        <input type="button" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();"/>
      </div></td>
    </tr>
  </table>
  <?
if(isset($_POST['txtmonto']) && $_POST['txtmonto'] != '' )
{
	$Sql="SELECT * FROM presupuestoinicial";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	if($num>0)
	{
		echo '<script lenguaje="javascript">alert("NO SE PUEDE AGREGAR OTRO PRESUPUESTO EN EL MISMO AÑO");txtclave.focus();</script>';
	}else{

	$vigencia=date('Y/m/d');
	$monto=$_POST['txtmonto'];
	$periodo = date('Y');

	$PresupuestoInicial = new PresupuestoInicial();
	$PresupuestoInicial->setvigencia($vigencia);
	$PresupuestoInicial->setmonto($monto);
	$PresupuestoInicial->setperiodo($periodo);
	$PresupuestoInicial->agregarPresupuestoInicial();
	echo '<script lenguaje="javascript">alert("SE GUARDO CORRECTAMENTE");txtclave.focus();</script>';
	}
}
?>
</form>

<title>Administrador de contenidos web - Tecnológico de Colima</title>

						<span class="txtcontenidoazul">Distribucion Presupuesto Inicial</span><!-- InstanceEndEditable -->
</body>

<!-- InstanceEnd --></html>