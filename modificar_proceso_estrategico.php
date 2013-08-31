<? session_start();?>
<? include("cls_procesoestrategico.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Modificar Proceso Estrategico</title>
</head>
<script type="text/javascript" src="js/dhtmlgoodies_calendar.js?random 20060118"></script>
<link href="estilos.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="acc_calendar/acc_calendar.js"></script>
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
function decima(evt,campo)
{
	var key = nav4 ? evt.which : evt.keyCode;
	if (campo.value.indexOf('.', 0) == -1)
	{
		return (key <= 13);
	}
	else
	{
		return (key <= 13);
	}

}
function enviar(){
	with(document.form1){
		if(txtclave.value==""){
			alert("LA CLAVE NO PUEDE ESTAR EN BLANCO");txtclave.focus();return;
		}
			
		
		document.form1.submit();
	}	
}
</script>

<?
$idd=$_GET['idd'];
$proceso_estrategico = new proceso_estrategico($idd);
?>
<form id="form1" name="form1" method="post" action="">

  <table width="548" border="0" align="center">
    <tr>
      <td colspan="2" align="center">MODIFICAR PROCESO ESTRATEGICO</td>
    </tr>
    <tr>
      <td width="98" align="right">Clave:</td>
      <td width="479"><p><input type="text" name="txtclave"  id="txtclave" onkeypress="return decimales(event,this);" value="<?=$proceso_estrategico->getclave(); ?>"/>
        <input type="hidden" name="hid2" id="hid2" value="<?=$proceso_estrategico->getclave(); ?>" />
      </p></td>
    </tr>
    <tr>
      <td align="right">Nombre:</td>
      <td><p><input name="txtnombre" type="text" id="txtnombre" size="70" value="<?=$proceso_estrategico->getnombre(); ?>" /></p></td>
    </tr>
   
   <tr>
      <td align="right">Descripcion:</td>
      <td><p><input name="txtdescripcion" type="text" id="txtdescripcion" size="70" value="<?=$proceso_estrategico->getdescripcion(); ?>" /></p></td>
    </tr>
   
   
   
    <tr>
      <td colspan="2" align="center"><input type="submit" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /><input name="hid" type="hidden" id="hid" value="<?=$idd;?>"/></td>
    </tr>
  </table>
<?
if(isset($_POST['txtclave']) && $_POST['txtclave']!=''){

	
		
	
	$hid =$_POST['hid2'];
	
	
	
	
	$clave=$_POST['txtclave'];
	$nombre=$_POST['txtnombre'];
	$descripcion=$_POST['txtdescripcion'];
			
		
		
		
		$idd=$_POST['hid'];
		
		
		if ($hid == $clave)
		{
		
		
		
			
							if($_POST['txtclave']!=0)
							{	
		
										
										if ($clave != 0)
										{

												if ($clave < 10)
												{
													
														$clave = substr($clave, -1);  // ESTO ES LO QUE AGREGUE 
														$total = "0" . $clave;
												}
				
												else
												{
													$total = $clave;
		
												}
										
													
													
			
													
													$proceso_estrategico = new proceso_estrategico($idd);


													$proceso_estrategico->setclave($total);
													$proceso_estrategico->setnombre($nombre);
													$proceso_estrategico->setdescripcion($descripcion);


													$proceso_estrategico->modificar();
													
													
													
													
													
													
										}
										
										
										else
										{
											if ($clave == 0)
											{
											echo '<script lenguaje="javascript">alert("NO PUEDES PONER LA CLAVE 0");txtclave.focus();return;</script>';
											}

										}


									}
							
	
						}
			
		else
		{
			
			
				
				if ($clave != 0)
				{

						if ($clave < 10)
						{
							$clave = substr($clave, -1);  // ESTO ES LO QUE AGREGUE

								$compara = "0" . $clave;
						}
				
						else
						{
								$compara = $clave;
	
						}


				}
			
			
					$Sql="SELECT * FROM procesoestrategico WHERE clave= '$compara'";
					$ISql = mysql_query($Sql);
					$num=mysql_num_rows($ISql);
					
				
					if($num>0)
					{
						echo '<script lenguaje="javascript">alert("YA EXISTE EL PROCESO CON ESA CLAVE");txtclave.focus();return;</script>';
					}
					
					else
					{
							if($_POST['txtclave']!=0)
							{	



									if ($clave != 0)
									{

											if ($clave < 10)
											{$clave = substr($clave, -1);  // ESTO ES LO QUE AGREGUE

													$total = "0" . $clave;
											}
				
											else
											{
													$total = $clave;
	
											}
					
									$proceso_estrategico = new proceso_estrategico($idd);


									$proceso_estrategico->setclave($total);
									$proceso_estrategico->setnombre($nombre);
									$proceso_estrategico->setdescripcion($descripcion);


									$proceso_estrategico->modificar();
					
					
									}
									else
									{
									if ($clave == 0)
									{
									echo '<script lenguaje="javascript">alert("NO PUEDES PONER LA CLAVE 0");txtclave.focus();return;</script>';
									}

							}
					
							}
							}
					
					
						
		}			

echo '<script lenguaje="javascript">alert("SE GUARDO CORRECTAMENTE");txtclave.focus();return;</script>';

 echo '<script lenguaje="javascript">setTimeout("document.location.href="proceso_estrategico.php";",10000);</script>';

echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';
	
	

}
?>
</form>

</body>
</html>