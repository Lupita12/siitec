<? 
session_start();
require_once("../conexion.php"); 
require_once("../clases/cls_partida_departamento.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/contenidos_r.dwt" codeOutsideHTMLIsLocked="false" -->

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
  <li><a  href="../index_
  <li><a >Catalogos +</a>
    <ul>
    <li> <a  href="../catalogos/encargado.php">Encargado</a> </li>
    <li> <a href="articulo.php"  >Articulo</a> </li>
    <li> <a href="clasificacion.php"  >Clasificacion</a> </li>
    <li> <a href="unidadmedida.php"  >Unidad Medida</a> </li>
    <li> <a href="tipoarticulo.php"  >Tipo Articulo</a> </li>
    <li> <a href="selecciona_departamento.php"  >Requisicion</a> </li>
      
       <li> <a href="CalizTProvedor.php"  >Proveedor</a> </li>
    <li><a href="inbox_a.php">Inbox</a></li>
      
    </ul>
  </li>
  
  
  
  
  
  
  
</ul>
						</div>
                        
					 
								<!-- #BeginEditable "body" -->
<form id="form1" name="form1" method="post" action="">
<?
//$clvde=$_GET['idepa'];
$queri=mysql_query(" select * from requisicion r join meta m on r.id_meta=m.id_meta where id_departamento=".$_SESSION["s_idepa"]);
  //---------------------------------------------------------------------------ESTO Q
//$resu = mysql_num_rows($queri);

?>
  <table width="700" border="1" align="center">
    <tr>
      <td>&nbsp;</td>
      <td><a href="new_requisicion.php" title="Agregar Requisicion" rel="gb_page_center[740,250]"><img border="0"  src="../imagenes/add.png" width="16" height="16"/>Agregar nueva requisici&oacute;n</a></td>
      <td>&nbsp;</td>
            <td>
           </td>
            <td></td>
    </tr>
  <?
  //---------------------------------------------------------------------------ESTO Q
        //    $result=mysql_query("select m.id_meta, m.clave, nombre from meta_departamento d join meta m on m.id_meta=d.id_meta and d.id_departamento=$s_idepa order by m.clave");
 
			?>  
    <tr>
      <td>&nbsp;</td>
      <td>Estado</td>
      <td>Requisici&oacute;n</td>
      <td>Opciones</td>
      <td>Imprimir</td>
    </tr>
<? 
	while($res = mysql_fetch_array($queri)){?>     
    <tr>
      <td><?=$res['clave'];?></td>
<? $q_r=mysql_query("select * from requisicion_articulo where folio_requisicion=".$res['id_requisicion']);
$conta = mysql_fetch_row($q_r);
$acci=mysql_fetch_row(mysql_query("select * from requisicion_accion where id_requisicion=".$res['id_requisicion']));
$validos=0;
if($acci[0]!=NULL)
{
	$justi="Justificada";
	$validos+=1;
}else{
		$justi="Sin Justificación";
	}
						//si el resultado de la consulta es nulo asigna cero a monto
			?><td><? if($conta[0]!=NULL)
			{ echo "Con articulos"; $validos+=1;}else{ echo 'Sin articulos ';} echo ", y ".$justi;?></td>
            

<td>
<?
//--------------------- COLUMNA PARA TIPO DE REQUISICION



if($res['tipo_de_contemplacion']==1){
	echo "Por Ingreso Propio";
	}else
	{
		if($res['tipo_de_contemplacion']==2){
			echo "Por Gobierno del Estado";
		}else
		{
			echo "Por Gasto Directo";
		}
	}	
	
?>
</td>
			 
                  <td><? if($res['autorizado']==0){?><a href="requisi.php?id=<?=$res['id_requisicion'];?>&idmeta=<?=$res['id_meta'];?>">Editar</a><? if($conta[0]==NULL){ echo '<input type="button" name="button2" id="button2" value="Borrar" onclick="eliminar('.$res["id_requisicion"].');"/>';}?><? if($validos==2){ echo '<input type="button" name="btn" id="btn" value="Enviar" onclick="enviar('.$res["id_requisicion"].');"/>';;}?><a href="traspaso.php?id=<?=$res['id_requisicion'];?>" title="Agregar Traspaso" rel="gb_page_center[740,250]"><img border="0" src="../imagenes/add.png" width="16" height="16"/>Traspasar</a><? }else{ if($res['autorizado']==1){ echo "Esperando Primera Firma";}
				  if($res['autorizado']==2){ echo "Esperando Segunda Firma";}
				  if($res['autorizado']==3){ echo "Esperando Tercera Firma";}
				  if($res['autorizado']==4){ echo "AUTORIZADA";}
				  }?></td>
                  <td><a href="imprime_requisicion.php?id=<?=$res['id_requisicion'];?>">Excel</a></td>    
    </tr>
    <? }?>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

  <p>

  </p>
 
</form>

						<span class="txtcontenidoazul">Crea Requisicion</span>



<script type="text/javascript">
	//AQUI LE CAMBIAS LA DIRECCION DE TU CARPETA residen
    var GB_ROOT_DIR = "greybox/";
</script>
<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<script type="text/javascript">
function eliminar(kid)
{
	if(confirm('¿Esta seguro de borrar la Requisicion?'))
	{	
		var campos = 'id='+kid;
		open('elimina_requisicion.php?'+campos,'_self');
	}	
}
function enviar(kaos)
{ 
	if(confirm('¿Esta seguro de Enviar la Requisicion?'))
	{	
		var campos = 'id='+kaos;
		open('envia_requisicion.php?'+campos,'_self');
	}	
}

</script>

<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />
<!-- #EndEditable --></td>
							
				

</body>

<!-- InstanceEnd --></html>