<? session_start(); ?>
<? include ('conexion.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/contenidos2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" >
<!-- #BeginEditable "doctitle" -->
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
}f
a:hover {
background: #900;
color: #fff;
}
</style>

<body onload="cargar();">
<!-- InstanceBeginEditable name="EditRegion1" -->
                                <form id="form1" name="form1" method="post"  action="programa_operativo_anual_imp.php" >
                                
                                <table width="200" border="0">
  <tr>
    <td><div align="center"><strong>PROGRAMA OPERATIVO ANUAL 2010</strong></div></td>
  </tr>
  <tr>
    <td><div align="center"><strong>CONCENTRADO POR PROCESO CLAVE Y ESTRATEGICO</strong></div></td>
  </tr>
  <tr>
    <td><div align="center"><strong>INSTITUTO TECNOLOGICO &oacute; CENTRO: COLIMA</strong></div></td>
  </tr>
</table>
                                
								
								
								<table width="200" border="1">
								  <tr>
								    <td width="19%" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>ESTRUCTURA PROGRAMATICO DEL PROCESO CLAVE</strong></div></td>
								    <td width="38%" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>PROCESO CLAVE</strong></div></td>
								    <td width="13%" rowspan="2" bgcolor="#CCCCCC"><div align="center"><strong>PRESUPUESTO TOTAL</strong></div></td>
								    <td colspan="2" bgcolor="#CCCCCC"><div align="center"><strong>PRESUPUESTO A CUBRIR A TRAVES DE</strong></div></td>
							      </tr>
								  <tr>
								    <td width="16%" bgcolor="#CCCCCC"><div align="center"><strong>INGRESOS PROPIOS</strong></div></td>
								    <td width="14%" bgcolor="#CCCCCC"><div align="center"><strong>GASTO DIRECTO</strong></div></td>
							      </tr>
                                  
                                  
                                  <?
								  	
												//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
												$Sql="select gf,fn,sf,ai,pp,codigo,nombre,monto + gasto_directo as monto,monto,gasto_directo from procesoclave where id_procesoestrategico = '1'";
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
								    <td><? echo $row[0]; echo $row[1]; echo $row[2];echo $row[3];echo $row[4];echo $row[5];  ?>
							        <div align="center"></div></td>
								    <td><? echo $row[6]; ?></td>
								    <td><div align="center"><? echo $row[7]; ?></div></td>
								    <td><div align="center"><? echo $row[8]; ?></div></td>
								    <td><div align="center"><? echo $row[9]; ?></div></td>
							      </tr>
                                  
                                   <? 
										} 
									} 
									?>
								  
                                  
                                  <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$suma="select sum(monto) + sum(gasto_directo) , sum(monto),sum(gasto_directo) from procesoclave where id_procesoestrategico ='1'";
	$academico=mysql_query($suma);
	$row01 = mysql_fetch_array($academico);
	?>
                            
								  <tr>
								    <td><div align="center"><strong>2</strong></div></td>
								    <td><div align="center"><strong>SUMA PROCESO ACADEMICO</strong></div></td>
								    <td><div align="center"><? echo $row01[0]; ?></div></td>
								    <td><div align="center"><? echo $row01[1]; ?></div></td>
								    <td><div align="center"><? echo $row01[2]; ?></div></td>
							      </tr>
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  <?
								  	
												//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
												$Sql="select  gf,fn,sf,ai,pp,codigo,nombre,monto + gasto_directo as monto,monto,gasto_directo from procesoclave where id_procesoestrategico = '2'";
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
								    <td><? echo $row[0]; echo $row[1]; echo $row[2];echo $row[3];echo $row[4];echo $row[5]; ?></td>
								    <td><? echo $row[6]; ?></td>
								    <td><div align="center"><? echo $row[7]; ?></div></td>
								    <td><div align="center"><? echo $row[8]; ?></div></td>
								    <td><div align="center"><? echo $row[9]; ?></div></td>
							      </tr>
                                  
                                   <? 
										} 
									} 
									?>
                                  
                            
                            
                            
                            
                      <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$suma2="select  sum(monto) + sum(gasto_directo), sum(monto),sum(gasto_directo) from procesoclave where id_procesoestrategico ='2'";
	$vinculacion=mysql_query($suma2);
	$row02 = mysql_fetch_array($vinculacion);
	?>      
                            
                            
     
                            
								  <tr>
								    <td><div align="center"><strong>2</strong></div></td>
								    <td><div align="center"><strong>SUMA PROCESO VINCULACION</strong></div></td>
								    <td><div align="center"><? echo $row02[0]; ?></div></td>
								    <td><div align="center"><? echo $row02[1]; ?></div></td>
								    <td><div align="center"><? echo $row02[2]; ?></div></td>
							      </tr>
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                                   <?
								  	
												//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
												$Sql="select  gf,fn,sf,ai,pp,codigo,nombre,monto + gasto_directo as monto,monto,ingreso_propio,gasto_directo from procesoclave where id_procesoestrategico = '3'";
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
								    <td><? echo $row[0]; echo $row[1]; echo $row[2];echo $row[3];echo $row[4];echo $row[5]; ?>
							        <div align="center"></div></td>
								    <td><? echo $row[6]; ?></td>
								    <td><div align="center"><? echo $row[7]; ?></div></td>
								    <td><div align="center"><? echo $row[8]; ?></div></td>
								    <td><div align="center"><? echo $row[9]; ?></div></td>
							      </tr>
                                  
                                   <? 
										} 
									} 
									?>
                                    
                                    
                              
                              
                              
                               <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$suma3="select  sum(monto) + sum(gasto_directo), sum(monto),sum(gasto_directo) from procesoclave where id_procesoestrategico ='3'";
	$planeacion=mysql_query($suma3);
	$row03 = mysql_fetch_array($planeacion);
	?>      
                              
                              
                                    
	
                                    
                                    
                                    
								  <tr>
								    <td><div align="center"><strong>3</strong></div></td>
								    <td><div align="center"><strong>SUMA PROCESO PLANEACION</strong></div></td>
								    <td><div align="center"><? echo $row03[0]; ?></div></td>
								    <td><div align="center"><? echo $row03[1]; ?></div></td>
								    <td><div align="center"><? echo $row03[2]; ?></div></td>
							      </tr>
                                  
                                  
                                  <?
								  	
												//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
												$Sql="select  gf,fn,sf,ai,pp,codigo,nombre,monto + gasto_directo as monto,monto,gasto_directo from procesoclave where id_procesoestrategico = '4'";
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
								    <td><? echo $row[0]; echo $row[1]; echo $row[2];echo $row[3];echo $row[4];echo $row[5]; ?>
							        <div align="center"></div></td>
								    <td><? echo $row[6]; ?></td>
								    <td><div align="center"><? echo $row[7]; ?></div></td>
								    <td><div align="center"><? echo $row[8]; ?></div></td>
								    <td><div align="center"><? echo $row[9]; ?></div></td>
							      </tr>
                                  
                                   <? 
										} 
									} 
									?>
                                    
                                    
                                    
                                    
                                            
                               <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$suma4="select  sum(monto) + sum(gasto_directo), sum(monto),sum(gasto_directo) from procesoclave where id_procesoestrategico ='4'";
	$calidad=mysql_query($suma4);
	$row04 = mysql_fetch_array($calidad);
	?>      
                                    
                                    
                                    
                                    
                                    
                                    
								  <tr>
								    <td><div align="center"><strong>4</strong></div></td>
								    <td><div align="center"><strong>SUMA PROCESO CALIDAD</strong></div></td>
								    <td><div align="center"><? echo $row04[0]; ?></div></td>
								    <td><div align="center"><? echo $row04[1]; ?></div></td>
								    <td><div align="center"><? echo $row04[2]; ?></div></td>
							      </tr>
								   <?
								  	
												//REALIZAS LA CONSULTA SQL PARA OBTENER LOS DATOS SOLICITADOS 
												$Sql="select  gf,fn,sf,ai,pp,codigo,nombre,monto + gasto_directo as monto,monto,gasto_directo from procesoclave where id_procesoestrategico = '5'";
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
								    <td><? echo $row[0]; echo $row[1]; echo $row[2];echo $row[3];echo $row[4];echo $row[5]; ?>
							        <div align="center"></div></td>
								    <td><? echo $row[6]; ?></td>
								    <td><div align="center"><? echo $row[7]; ?></div></td>
								    <td><div align="center"><? echo $row[8]; ?></div></td>
								    <td><div align="center"><? echo $row[9]; ?></div></td>
							      </tr>
                                  
                                   <? 
										} 
									} 
									?>
                                    
                                    
                                    
                                     <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$suma5="select  sum(monto) + sum(gasto_directo), sum(monto),sum(gasto_directo) from procesoclave where id_procesoestrategico ='5'";
	$recursos=mysql_query($suma5);
	$row05 = mysql_fetch_array($recursos);
	?>      
                                    
                                    
                                    
                                    
								  <tr>
								    <td><div align="center"><strong>5</strong></div></td>
								    <td><div align="center"><strong>SUMA PROCESO ADMON. RECURSOS</strong></div></td>
								    <td><div align="center"><? echo $row05[0]; ?></div></td>
								    <td><div align="center"><? echo $row05[1]; ?></div></td>
								    <td><div align="center"><? echo $row05[2]; ?></div></td>
							      </tr>
                                  
                                  
                                <?
	//Total de ingreso por capitulo y proceso estrategico ACADEMICO
	$suma6="select  sum(monto) + sum(gasto_directo), sum(monto),sum(gasto_directo) from procesoclave ";
	$total=mysql_query($suma6);
	$row06 = mysql_fetch_array($total);
	?>      
                                         
                                  
								  <tr>
								    <td><div align="center"></div></td>
								    <td><div align="center"><strong>TOTAL</strong></div></td>
								    <td><div align="center"><? echo $row06[0]; ?></div></td>
								    <td><div align="center"><? echo $row06[1]; ?></div></td>
								    <td><div align="center"><? echo $row06[2]; ?></div></td>
							      </tr>
							    </table>
								<table width="200" border="1">
								  <tr>
								    <td><label>
                                      <div align="right" ><h1>Exportar a Excel</h1><a  href="programa_operativo_anual_imp.php"><img src="imagenes/Excel.png" height="25" width="25" border="0"/></a>
                                      </div>
                                    </label> </td>
							      </tr>
								  </table>
								<p>&nbsp;</p>
                                </form>
                                
                                
                              
						<span class="txtcontenidoazul">Formato para el concentrado por Proceso Clave y Estrategico</span><!-- InstanceEndEditable -->


			
</body>

<!-- InstanceEnd --></html>
