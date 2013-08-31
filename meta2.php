<? session_start();?>
<? require_once("conexion.php"); ?>
<? require_once("cls_meta.php"); ?>
<? require_once("cls_procesoclave_meta.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script language="javascript" src="js/libreriaAjax.js"></script>
</head>

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
function validar()
{
	with(document.form1)
	{
		if(txtclave.value== '' || txtnombre.value== '' || cmb_encargado.value==0 || cmb_estra.value==0 || cmb_clave.value==0)
		{
			alert('Es necesario llenar todos los campos');
		}
		else
			submit();
	}
}

</script>
<body>
<form id="form1" name="form1" method="post" action="meta2.php">
  <p>&nbsp;</p>
  <table width="80%" border="0" align="center">
    <tr>
<td>Proceso Estrategico:</td>
      <td colspan="5">
	  <?  
		$result=mysql_query("SELECT clave, nombre FROM procesoestrategico ");
	  ?>
	  <select name="cmb_estra" id="cmb_estra" onchange="javascript:FAjax('ajax_proceso_clave.php','cmb_clav',this.name+'='+this.value,'post')">
			<option value="0">Selecciona Proceso Estrategico</option>	  
	  <?
	  while($res = mysql_fetch_array($result)){
	  ?>	
	  <option value="<?=$res[0];?>"><?=$res[1];?></option>
	  <?
	  }
	  ?>
        </select>      </td>
    </tr>
    <tr>
      <td>Proceso Clave:</td>
      <td colspan="5">
	  	<div id="cmb_clav">	  
        <select name="cmb_clave" id="cmb_clave">
			<option value="0">Selecciona Proceso Clave</option>		
        </select>
		</div>      </td>	
	</tr>
    <tr>
      <td>Clave:</td>
      <td colspan="5"><input name="txtclave" type="text" id="txtclave" size="5" maxlength="2" onkeypress="return decimales(event,this);"/></td>
    </tr>
    <tr>
      <td>Nombre:</td>
      <td><input name="txtnombre" type="text" id="txtnombre" size="50" /></td>
    </tr>
    <tr>
      <td>Clave Encargado: </td>
      <td><?  
		$resi=mysql_query("select id_departamento, nombre from departamento");
	  ?>	  
        <select name="cmb_encargado" id="cmb_encargado">
		<option value="0">Selecciona Encargado</option>
	  <?
	  	while($rex = mysql_fetch_array($resi)){
	  ?>
	  <option value="<?=$rex[0];?>"><?=$rex[1];?></option>
	  <?
	  }
	  ?>	  	
        </select>
      </td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="button" name="Button" value="Agregar" onclick="validar();"/></td>
    </tr>
  </table>
<?
if(isset($_POST['txtclave']) && $_POST['txtclave']!='')
{
	$cla=$_POST['txtclave'];
	$nom=$_POST['txtnombre'];
	$clven=$_POST['cmb_encargado'];
	$estra=$_POST['cmb_estra'];
	$procla=$_POST['cmb_clave'];		
	//if($estra<10)
	//	$estra="0".$estra;
	if($cla<10)
		$cla="0".$cla;		
	$compuesta=$procla.".".$cla;
	//echo $compuesta;
	$comprobar=mysql_query("SELECT id_meta, clave FROM meta where clave='".$compuesta."'");
	$aver=mysql_num_rows($comprobar);
	if($aver!=0)
	{
		echo '<script lenguaje="javascript">alert("Ya existe una Clave con ese id")</script>';
		echo '<script lenguaje="javascript">open("meta2.php","_self");</script>';			
	}
	else
	{
		$obj=new Meta();
		$obj->setclave($compuesta);
		$obj->setnombre($nom);
		$obj->setid_encargado($clven);	
		$obj->agregar();
		$proce=new Procesoclave_Meta($procla,$compuesta);
		$proce->agregarProcesoclave_meta();
	
	}

	/*
	echo "<pre>";
	print_r($obj);
	echo "</pre>";
	die();
	*/
}?>
</form>
</body>
</html>
