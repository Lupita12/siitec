<? include("../conexion.php"); ?>
<? include("../clases/cls_proveedor.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<script languaje="javascript">
function enviar(){
	with(document.form1){
	
	if(txtclave.value==""){
		alert("LA CLAVE NO PUEDE ESTAR EN BLANCO");txtclave.focus();return;
	}
		
	if(txtempresa.value==""){
		alert("EL NOMBRE NO PUEDE ESTAR EN BLANCO");txtempresa.focus();return;
	}
	
	if(txtdomicilio.value==""){
		alert("EL DOMICILIO NO PUEDE ESTAR EN BLANCO");txtdomicilio.focus();return;
	}
	
	if(txtciudad.value==""){
		alert("LA CIUDAD NO PUEDE ESTAR EN BLANCO");txtciudad.focus();return;
	}
	
	if(txttelefono.value==""){
		alert("EL TELEFONO NO PUEDE ESTAR EN BLANCO");txttelefono.focus();return;
	}
	
	if(txtlegal.value==""){
		alert("EL PROPIETARIO NO PUEDE ESTAR EN BLANCO");txtlegal.focus();return;
	}
	
	if(txtrfc.value==""){
		alert("EL RFC NO PUEDE ESTAR EN BLANCO");txtrfc.focus();return;
	}
	
	
	document.form1.submit();
	}	

}
</script>
<body>
<form id="form1" name="form1" method="post" action="">
<table width="637" height="388" border="0" align="center">
    <tr>
      <td colspan="7" align="center">ALTA  PROVEEDOR</td>
    </tr>
    <tr>
      <td height="70" colspan="4" align="center">Clave:
        <label>
        <input type="text" name="txtclave" />
      </label></td>
    </tr>
    <tr>
      <td height="33" colspan="3">Nombre de la Empresa:      
      <input type="text" name="txtempresa" size="72" /></td>
      <td width="144">Fecha:
        <? $fecha_actual=date ("d/m/Y"); ?>
	  <input type="text" name="txtfecha" size="15" disabled="disabled"  value="<?=$fecha_actual;?>" />      </td>
    </tr>
    <tr>
      <td height="28" colspan="3">Domicilio:
      <input type="text" name="txtdomicilio" size="73" /></td>
      <td>Ciudad:
        <input type="text" name="txtciudad" /></td>
    </tr>
    <tr>
      <td width="188" height="24">Telefono: 
      
      <input type="text" name="txttelefono" />     </td>
      <td width="144">Fax: 
      <input type="text" name="txtfax" /></td>
      <td width="143">&nbsp;</td>
	  <td width="144">Correo electronico:
      <input type="text" name="txtcorreo" /></td>
    </tr>
    <tr>
      <td height="24" colspan="3">Propietario o representante legal: 
        
        <input type="text" name="txtlegal" size="60" />      </td>
      <td>RFC:
        
        <input type="text" name="txtrfc" />    </td>
    </tr>
    <tr>
      <td height="56" colspan="4" align="center"><p>Actividades Comerciales:
  
        <textarea  name="textfield" cols="70" rows=""></textarea>
     </td>
    </tr>
    <tr>
      <td height="32" colspan="4" align="center">
        <input type="button" name="Submit" value="Enviar" onclick="javascript:enviar();" />      </td>
    </tr>
  </table>

<?

if ($_POST){

	if ($_POST['txtclave']!= ""  && $_POST['txtempresa']!="" && $_POST['txtdomicilio']!="" && $_POST['txtciudad']!="" && $_POST['txttelefono']!="" && $_POST['txtlegal']!="" && $_POST['txtrfc']!="")
	{	
		$clave=$_POST['txtclave'];
		$nombre=$_POST['txtempresa'];
		$fecha=$_POST['txtfecha'];
		$domi=$_POST['txtdomicilio'];
		$ciudad=$_POST['txtciudad'];
		$tel=$_POST['txttelefono'];
		$fax=$_POST['txtfax'];
		$correo=$_POST['txtcorreo'];
		//$fecha=$_POST['txtfecha'];
		$legal=$_POST['txtlegal'];
		$rfc=$_POST['txtrfc'];
		
		
	
		$obj=new Proveedor();
		
		
		//Consulta para verificar si existen registros iguales en la base de datos
		$consulta="select * from proveedor where clave=".$clave;
		$resultado=mysql_query($consulta) or die (mysql_error());
		
		if (mysql_num_rows($resultado)>0)
			{
				
				echo '<script lenguaje="javascript">alert("YA EXISTE EL PROVEEDOR '.$clave.'");</script>';
			} else {
				
				if ($clave !=0)
				{
	
					$obj->setclave($clave);
					$obj->setnombre_proveedor($nombre);
					//$obj->setfecha($fecha);
					$obj->setdomicilio($domi);
					$obj->setciudad($ciudad);
					$obj->setnumero_tel($tel);
					$obj->setnumero_fax($fax);
					$obj->setcorreo_electronico($correo);
					$obj->setfecha($fecha);
					$obj->setrfc($rfc);
					$obj->agregar();
					
					echo '<script lenguaje="javascript">alert("PROVEEDOR '.$clave.' INSERTADO CORRECTAMENTE");</script>';
				
				}
				else
		{
			echo '<script lenguaje="javascript">alert("NO PUEDES PONER LA CLAVE EN 0");</script>';

		}	
		
		}
		
	}
}

?>

</form>
</body>
</html>
