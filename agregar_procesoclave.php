<? session_start(); ?>
<? include ("cls_procesoclave.php"); ?>
<? include ("conexion.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Documento sin título</title>
</head>





<script language="javascript">

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





function enviar()
{
	with(document.form1)
    {
		if(txtclave.value=="")
        {
			alert("LA CLAVE NO PUEDE ESTAR EN BLANCO");txtclave.focus();return;
		}
		if(txtclave_proceso_estrategico.value=="")
        {
			alert("LA CLAVE DEL PROCESO ESTRATEGICO NO PUEDE ESTAR EN BLANCO");txtclave_proceso_estrategico.focus();return;
		}
		if(txtnombre.value=="")
        {
			alert("EL NOMBRE NO PUEDE ESTAR EN BLANCO");txtnombre.focus();return;
		}
		if(txtdescripcion.value=="")
        {
			alert("LA DESCRIPCION NO PUEDE ESTAR EN BLANCO");txtdescripcion.focus();return;
		} 	
		
		
		
		if(txtvigencia.value=="")
        {
			alert("LA VIGENCIA DEL BIEN NO PUEDE ESTAR EN BLANCO");txtvigencia.focus();return;
		} 
		
		if(txtmonto.value=="")
        {
			alert("EL MONTO NO PUEDE ESTAR EN BLANCO");txtmonto.focus();return;
		} 
		
		
		if(txtperiodo.value=="")
        {
			alert("EL PERIODO NO PUEDE ESTAR EN BLANCO");txtperiodo.focus();return;
		} 
		
		
		if(txtingreso_propio.value=="")
        {
			alert("EL INGRESO PROPIO NO PUEDE ESTAR EN BLANCO NO PUEDE ESTAR EN BLANCO");txtingreso_propio.focus();return;
		} 
		
		if(txtgasto_directo.value=="")
        {
			alert("EL GASTO DIRECTO NO PUEDE ESTAR EN BLANCO");txtgasto_directo.focus();return;
		} 
		
		
		
		
		document.form1.submit();
		
	}	

}


</script>







<body >

<?
if(isset($_POST['txtclave']) && $_POST['txtclave']!='')
{
	
			

 
		$clave=$_POST['txtclave'];
		$clave_proceso_estrategico=$_POST['cmb_procesoestrategico'];
		$nombre=$_POST['txtnombre'];
		$descripcion=$_POST['txtdescripcion'];
		$estruc=$_POST['txtestructura'];
		//$vigencia=$_POST['txtvigencia'];
		//$monto=$_POST['txtmonto'];
		//$periodo=$_POST['txtperiodo'];
		//$ingreso_propio=$_POST['txtingreso_propio'];
		//$gasto_directo=$_POST['txtgasto_directo'];
		
		
		
		
				if ($clave != 0)
				{



				
				
				
							if($clave > 10)
							{
		
								$total = $clave_proceso_estrategico . "." . $clave;
							}
							else
							{
								$total = $clave_proceso_estrategico . "." . $clave;
							}
				
		
		

								$proceso_clave = new proceso_clave();

								$proceso_clave->setclave($total);
								$proceso_clave->setid_procesoestrategico($clave_proceso_estrategico);
								$proceso_clave->setnombre($nombre);
								$proceso_clave->setdescripcion($descripcion);
								$proceso_clave->setestructura_p($estruc);
								// $proceso_clave->setvigencia($vigencia);
								// $proceso_clave->setmonto($monto);
								// $proceso_clave->setperiodo($periodo);
								// $proceso_clave->setingreso_propio($ingreso_propio);
								// $proceso_clave->setgasto_directo($gasto_directo);


								$proceso_clave->agregar();
								
								echo '<script lenguaje="javascript">alert("SE GUARDO CORRECTAMENTE");txtclave.focus();return;</script>';
								
		
				}
		
		

							echo '<script language="javascript">open("agregar_procesoclave.php","_self");</script>';
		
		
		
}
?>


<?
$conexion= mysql_connect("localhost","root","root") ;
mysql_select_db("planeacion2010",$conexion);


$sql="select nombre from procesoestrategico";
$result=mysql_query($sql);
$array = mysql_fetch_array($result);
// echo "$array[nombre]";

?>



<form id="form1" name="form1" method="post" action="">
  <table width="690" border="0" align="center">
    <tr>
      <td colspan="5" align="center">AGREGAR UN PROCESO CLAVE AL CATALOGO</td>
    </tr>
    <tr>
      <td width="201" align="right">Clave:</td>
      <td colspan="4"><p><input type="text" name="txtclave" id="txtclave" onkeypress="return decimales(event,this);"/></p></td>
    </tr>
    
    
    <tr>
      <td width="201" align="right">Clave Proceso Estrategico:</td>
      <td colspan="4"><p>
	  
	  <?  
	  	$sSQL="SELECT * FROM procesoestrategico ";
		$result=mysql_query($sSQL, $conexion);
	  ?>
	  
	    <select id="cmb_procesoestrategico" name="cmb_procesoestrategico" onchange="javascript:FAjax('aj_cmb_subcapitulos.php','cmb_subcapitulo',this.name+'='+this.value,'post')">
			<option value="0">Seleccione Proceso Estrategico</option>
			<? while($otmp=mysql_fetch_object($result)){?>
				<option value="<?=$otmp->clave;?>"><?=$otmp->clave.' - '.trim($otmp->nombre);?></option>
			<? }?>
        </select>

</p></td>
    </tr>
    
    <tr>
      <td width="201" align="right">Nombre:</td>
      <td colspan="4"><p><input name="txtnombre" type="text" id="txtnombre" onkeypress="return decimales(event,this);" size="70" width="600"/></p></td>
    </tr>
    
    <tr>
      <td width="201" align="right">Descripcion:</td>
      <td colspan="4"><p> 
      
      
          <label>
            <textarea name="txtdescripcion" id="txtdescripcion" cols="45" rows="5" onkeypress="return decimales(event,this);"></textarea>
          </label>
      </p></td>
    </tr>
    
   
   
    
    
    
     <tr>
      <td width="201" align="right">&nbsp;</td>
      <td colspan="4">&nbsp;</td>
    </tr>
    
    <tr>
          <td colspan="2" align="center"><input type="submit" name="Guardar" id="Guardar" value="Guardar" onclick="javascript:enviar();" /></td>
	</tr>
    
    
    
  </table>
</form>



</body>
</html>