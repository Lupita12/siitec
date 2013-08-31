<?
  session_start();
//  session_register("idemple","idmetamo","idrequi","clv_meta","s_contemplacion");
  require_once("../conexion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<script language="javascript">
var valor=0;
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

function validaingreso()
{
	var multi,a,b,iva;
	multi=0;
	a=0;
	b=0;
	iva=0;
 with(document.nuevareq)
 {
	 a=parseInt(unformatNumber(document.getElementById('ingreso').value));

	document.getElementById('h_ingreso').value=a;
	document.getElementById('ingreso').value=formatNumber(a,'$');
	 
	if(document.getElementById('cantidad').value=='')
	 	return 0;
	else
	{
		b=parseInt(document.getElementById('cantidad').value);
		multi=a*b;
		multi=multi*1.16;
	}

	if(multi>parseInt(unformatNumber(document.getElementById('h_monto').value)))
	{
		alert("La cantidad supera lo disponible: $ "+multi);
		document.getElementById('ingreso').value=formatNumber(valor,'$');
		document.getElementById('h_ingreso').value=valor;
		return 0;
	}
	document.getElementById('iva').value=formatNumber(multi,'$');
	document.getElementById('h_iva').value=multi;
  }
}
function validacantidad()
{
	var multia
	var c;
	var d;
	multia=0;
	c=0;
	d=0;
 with(document.nuevareq)
 {
	 c=parseInt(unformatNumber(document.getElementById('cantidad').value));
	 document.getElementById('cantidad').value=c;

	if(document.getElementById('ingreso').value=='')
	 	return 0;
	else
	{
		d=parseInt(document.getElementById('h_ingreso').value);
		multia=c*d;
		multia=multia*1.16;
	}

	if(multia>parseInt(document.getElementById('h_monto').value))
	{
		alert("La cantidad supera lo disponible: "+multia);
		document.getElementById('cantidad').value=valor;
		return 0;
	}
	document.getElementById('iva').value=formatNumber(multia,'$');
	document.getElementById('h_iva').value=multia;
  }
}

function unformatNumber(num)
{
    return num.replace(/([^0-9\.\-])/g,'')*1;
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
function dato(juas)
{
 with(document.nuevareq)
 {
 	if(document.getElementById(juas).value=='')
		valor=0;
	else
		valor=unformatNumber(document.getElementById(juas).value);
  }
 
}


</script>
<script type="text/javascript" src="ajax.js"></script>
<?
$clv=$_GET['id'];
$idmet=$_GET['idmeta'];
$_SESSION["idrequi"]=$clv;
//$idemple = 25;
$_SESSION["idmetamo"] = $idmet;
$cadena_meta = mysql_query("select clave from meta where id_meta=".$idmet);
$arra_meta = mysql_fetch_row($cadena_meta);
$conte=mysql_fetch_array(mysql_query("select tipo_de_contemplacion from requisicion where id_requisicion=".$_SESSION["idrequi"]));
$_SESSION["s_contemplacion"]=$conte['tipo_de_contemplacion'];
$_SESSION["clv_meta"]=$arra_meta[0];
?>
<div id="formulario" style="border:0;top:0;" align="center">
</div>
<div id="contenido" align="center">

<?php include('cata.php'); ?>

</div>

</html>