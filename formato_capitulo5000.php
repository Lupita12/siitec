<? session_start(); ?>
<? include ('conexion.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/contenidos2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" >
<!-- #BeginEditable "doctitle" -->
<script language="javascript" src="js/libreriaAjax.js"></script>
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
		document.form1.submit();
		}
	}
}
</script>
                    
<title>Administrador de contenidos web - Tecnológico de Colima</title>
<!-- #EndEditable -->

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

<body onload="cargar();">
<!-- InstanceBeginEditable name="EditRegion1" -->

<form id="form1" name="form1" method="post" action="">


<select name="cmb" id="cmb" onchange="valida();">
            <option value="0" >Selecciona Departamento</option>
            <?	
		$queri = mysql_query("select clave,nombre,clave FROM departamento");
		while($res = mysql_fetch_array($queri)){	
		?>	  
            <option value="<?=$res[0];?>">
              <?=$res[2];?>
              :<?=$res[1];?>
              </option>
            <? }?>
          </select>



  <table width="908" border="4" align="center">
    <tr>
      <td colspan="2" rowspan="2">&nbsp;</td>
      <td colspan="3">Nombre del documento: Formato para el Desglose del Presupuesto de Inversi&oacute;n con Cargo a Ingresos Propios</td>
      <td colspan="2">Codigo: 513-PR-14-A03</td>
    </tr>
    <tr>
      <td colspan="3">Referencia a la Norma ISO 9001-2008: 6.1</td>
      <td colspan="2">Revisi&oacute;n: 0</td>
    </tr>
    <tr>
      <td colspan="7"><div align="center">PROGRAMA OPERATIVO ANUAL <? echo date('Y') ?></div></td>
    </tr>
    <tr>
      <td colspan="7"><div align="center">DESGLOSE DEL PRESUPUESTO DE INVERSI&Oacute;N CON CARGO A INGRESOS PROPIOS (Capitulo5000)</div></td>
    </tr>
    <tr>
      <td colspan="5">INSTITUTO TECNOLOGICO O CENTRO: </td>
      <td width="83">&nbsp;</td>
      <td width="91">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#999999">Proceso Estrategico:</td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#999999">Proceso Clave:</td>
      <td colspan="4">
      
      <div id="cmb_clav"></div> 
      
      
      </td>
    </tr>
    <tr>
      <td width="24" bgcolor="#999999"><div align="center">Numero de meta</div></td>
      <td width="37" bgcolor="#999999"><div align="center">Clave de la partida</div></td>
      <td width="167" bgcolor="#999999"><div align="center">Denominacion del bien</div></td>
      <td width="241" bgcolor="#999999"><div align="center">Cantidad</div></td>
      <td width="219" bgcolor="#999999"><div align="center">Costo Unitario</div></td>
      <td bgcolor="#999999"><div align="center">Costo Total</div></td>
      <td colspan="2" bgcolor="#999999"><div align="center">Justificacion</div></td>
      </tr>
    
     <?
    if(isset($_POST['cmb']) && $_POST['cmb']!='')
{
	
	
	$clavesesion = $_POST['cmb'];
	
	 
								  	
												//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
												$Sql="select * from capitulo5000 c join departamento d on c.clave_departamento=d.clave  where clave_departamento ='$clavesesion'";
												$ISql = mysql_query($Sql);
												//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
												$num=mysql_num_rows($ISql);
	
												if($num>0)
												{
											//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE 			CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
													$a=1;
													while($row = mysql_fetch_array($ISql))
													{
													if($a==0)
													{ 
													?>  
        											    <? $a=1;}else{?>
                                  
    
    
    <tr>
     <? $a=0;}?>
      <td><? echo $row[1]; ?></td>
      <td><? echo $row[2]; ?></td>
      <td><? echo $row[4]; ?></td>
      <td><? echo $row[5]; ?></td>
      <td><? echo $row[6]; ?></td>
      <td><? echo $row[7]; ?></td>
      <td><? echo $row[8]; ?></td>
      <td><? echo $row[11] ?></td>
    </tr>
    
     <? 
				} 
			} 
}
	?>
    
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" rowspan="2">&nbsp;</td>
      <td bgcolor="#999999"><div align="right">Total por Proceso Clave:</div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#999999"><div align="right">Total por Proceso Estrategico:</div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      
      
    </tr>
    
    
     <? if(isset($_POST['cmb']) && $_POST['cmb']!='')
{
								  	
								
								$clavesesion2 = $_POST['cmb'];
								//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
												$Sql="select sum(costo_total) from capitulo5000 where clave_departamento ='$clavesesion2'";
												$ISql = mysql_query($Sql);
												//SE DEFINE UNA VARIABLE DONDE SE ALMACENAN EL NUMERO DE FILAS QUE TIENE EL ARREGLO 
												$num=mysql_num_rows($ISql);
	
												if($num>0)
												{
											//SE CREA UN ARREGLO DONDE METEN LOS DATOS QUE TRAE LA CONSULTA Y LOS ALMACENAN EN LA VARIABLE $row DONDE SE 			CILCA HASTA QUE SE ACABEN LOS DATOS QUE ESTAN EN EL ARREGLO
													$a=1;
													while($row = mysql_fetch_array($ISql))
													{
													if($a==0)
													{ 
													?>  
        											    <? $a=1;}else{?>
                                  
								  
    
    
    <tr>
     <? $a=0;}?>
      <td bgcolor="#999999"><div align="right">Total por Departamento:</div></td>
      <td colspan="2">
        <? echo $row[0];?> 
        
        
        
      </td>
      </tr>
    <? 
										} 
									} }
									?>
  </table>
  
</form>

						<span class="txtcontenidoazul">Formato capitulo 5000</span><!-- InstanceEndEditable -->


			
</body>

<!-- InstanceEnd --></html>
