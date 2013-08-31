<? session_start(); ?>
<? include("../conexion.php"); ?>
<? include("../clases/cls_inbox.php"); ?>
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
  <table width="50%" border="0">
    <tr>
      <td>
        
        <div align="center">
          <select name="cmb" id="cmb" onchange="valida();">
            <option value="0" >Selecciona Departamento</option>
            <?	
		$queri = mysql_query("select id_departamento,nombre,clave FROM departamento");
		while($res = mysql_fetch_array($queri)){	
		?>	  
            <option value="<?=$res[0];?>">
              <?=$res[2];?>
              :<?=$res[1];?>
              </option>
            <? }?>
          </select>
        </div></td>
      </tr>
  </table>
<?
if(isset($_POST['cmb']) && $_POST['cmb']!='')
{
	$_SESSION["s_idepa"]=$_POST['cmb'];
	echo '<script lenguaje="javascript">open("inbox.php","_self");</script>';	
}?>  
</form>

						<span class="txtcontenidoazul">Inbox</span>
<script language="javascript">
function valida()
{
	with(document.form1)
	{
		if(cmb.value==0)
		{
				alert('asigna una departamento');
				return 0;
		}
		else
		{
			submit();
		}
	}
}
</script>

<!-- #EndEditable --></td>
							
				

</body>

<!-- InstanceEnd --></html>