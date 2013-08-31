<? session_start();?>
<? include('../conexion.php');?>
<? include ('../cls_encargado.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Agregar Encargado</title>

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
	with(document.form1){
		if(txtnombre.value==""){
			alert("EL NOMBRE NO PUEDE ESTAR EN BLANCO");txtnombre.focus();return;
		}
		if(txttipo.value==""){
			alert("EL TIPO NO PUEDE ESTAR EN BLANCO");txttipo.focus();return;
		}
		
		document.form1.submit();	
	}	
}
</script>

<? 
if(isset($_POST['txtnombre']) && $_POST['txtnombre']!='')
{
	$clave = $_POST['txtclave'];
	$nombre = $_POST['txtnombre'];
	$tipo = 'normal';
	$firma = "";
	
	$combo = $_POST['cmb_departamento'];
	
	
	
	
	$Sql="SELECT * FROM encargado WHERE  clave= '$clave'";
	$ISql = mysql_query($Sql);
	$num=mysql_num_rows($ISql);
	
	if($num>0)
	{
		echo '<script lenguaje="javascript">alert("YA EXISTE ESTA CLAVE");txtclave.focus();return;</script>';
	}
	else
	{
		$obj = new encargado();
		
		$obj->setclave($clave);
		$obj->setnombre($nombre);
		$obj->settipo($tipo);
		$obj->setfirma($firma);
		
		$obj->setid_departamento($combo);
		
		$obj->agregar(); 
		
		
		echo '<script lenguaje="javascript">alert("SE AGREGO EL USUARIO CORRECTAMENTE ");txtclave.focus();return;</script>';
		
		
	}
	
	
	
}

?>



</head>

<body>





<form id="form1" name="form1" method="post">
  <p>&nbsp;</p>
  <div align="center">
    <table width="393" border="0">
      <tr>
        <td colspan="2"><div align="center">Agregar Usuario</div></td>
      </tr>
      <tr>
        <td>Clave</td>
        <td><label>
          <input name="txtclave" type="text" id="txtclave" size="50" />
        </label></td>
      </tr>
      <tr>
        <td>Nombre</td>
        <td><label>
          <input name="txtnombre" type="text" id="txtnombre" size="50" />
        </label></td>
      </tr>
      
      <tr>
        <td>Departamento</td>
        <td><?  
	  	$sSQL="SELECT * FROM departamento ";
		$result=mysql_query($sSQL, $conexion);
	  ?>
    
    <select id="cmb_departamento" name="cmb_departamento" onchange="javascript:FAjax('aj_cmb_departamento.php','cmb_departamento',this.name+'='+this.value,'post')">
			<option value="0">Seleccione Departamento</option>
			<? while($otmp=mysql_fetch_object($result)){?>
				<option value="<?=$otmp->clave;?>"><?=$otmp->clave.' - '.trim($otmp->nombre);?></option>
			<? }?>
        </select></td>
      </tr>
      
      
      <tr>
        <td colspan="2"><label>
          <div align="center">
            <input type="submit" name="button" id="button" value="Guardar" onclick="javascrip:enviar();" />
          </div>
        </label></td>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>







</form>




</body>
</html>