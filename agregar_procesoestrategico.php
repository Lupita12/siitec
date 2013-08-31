<? session_start(); ?>
<? include ("cls_procesoestrategico.php")?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Agregar Proceso Estrategico</title>
</head>

<script type="text/javascript" src="js/dhtmlgoodies_calendar.js?random 20060118"></script>
<link href="estilos.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="acc_calendar/acc_calendar.js"></script>


<script language="javascript">


function enviar(){
	with(document.form1){
		if(txtclave.value==""){
			alert("LA CLAVE NO PUEDE ESTAR EN BLANCO");txtclave.focus();return;
		}
		if(txtnombre.value==""){
			alert("EL NOMBRE NO PUEDE ESTAR EN BLANCO");txtnombre.focus();return;
		}
		
		document.form1.submit();
		
	}	
}
</script>

<?
if(isset($_POST['txtclave']) && $_POST['txtclave']!=''){


		$clave=$_POST['txtclave'];
		$nombre=$_POST['txtnombre'];
		$descripcion=$_POST['txtdescripcion'];
		// $vigencia=$_POST['txtvigencia'];
		// $monto=$_POST['txtmonto'];
		// $periodo=$_POST['txtperiodo'];




				if ($clave != 0)
				{

						if ($clave < 10)
						{

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
						{

								$total = "0" . $clave;
						}
				
						else
						{
						$total = $clave;
	
						}




				$proceso_estrategico = new proceso_estrategico();

				$proceso_estrategico->setclave($total);
				$proceso_estrategico->setnombre($nombre);
				$proceso_estrategico->setdescripcion($descripcion);
				// $proceso_estrategico->setvigencia($vigencia);
				// $proceso_estrategico->setmonto($monto);
				// $proceso_estrategico->setperiodo($periodo);



				$proceso_estrategico->agregar();

				echo '<script lenguaje="javascript">alert("SE GUARDO CORRECTAMENTE");txtclave.focus();return;</script>';


			}
			else
			{
			if ($clave == 0)
			{
			echo '<script lenguaje="javascript">alert("NO PUEDES PONER LA CLAVE 0");txtclave.focus();return;</script>';
			}

		}



	}}
		
		
		
		
		echo '<script language="javascript">open("agregar_procesoestrategico.php","_self");</script>';
}
?>

<form id="form1" name="form1" method="post" action="">
  <table width="548" border="0" align="center">
    <tr>
      <td colspan="2" align="center">AGREGAR PROCESO ESTRATEGICO</td>
    </tr>
    <tr>
      <td width="90" align="right">Clave:</td>
      <td width="448"><p><input type="text" name="txtclave" id="txtclave" onkeypress="return decimales(event,this);"/></p></td>
    </tr>
    <tr>
      <td align="right">Nombre:</td>
      <td><p><input name="txtnombre" type="text" id="txtnombre" size="70" /></p></td>
    </tr>
    <tr>
      <td align="right">Descripcion:</td>
      <td><p><input name="txtdescripcion" type="text" id="txtdescripcion" size="70" /></p></td>
    </tr>
    
    
    
    
    
    
    
    
    
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /></td>
    </tr>
  </table>
</form>






</body>
</html>