<? session_start(); ?>
<? include("../cls_encargado.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Documento sin título</title>

<script language="javascript">

function enviar(){
	with(document.form1){
		if(clave.value==""){
			alert("LA CLAVE NO PUEDE ESTAR EN BLANCO");clave.focus();return;
		}
			
		
		document.form1.submit();
	}	
}



function hola() 
{
 	combo = document.getElementById('cmb_encargado').value;
	
	if (combo == 'autorizador'){
	
	
	

	var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 19; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));


	alert ('Se ha asignado una firma al usuario');

 document.getElementById('firma').value= text;
	//alert (text);
	}
	else
	{
		
		document.getElementById('firma').value= "";
	}
	


}



</script>





</head>

<body>
<?
$idd=$_GET['idd'];
$encargado = new encargado($idd);


?>

<form  id="form" name="form"action="" method="post">

    
  

  <div align="center">
    <table width="200" border="0">
      <tr>
        <td colspan="2"><div align="center">Modificar Encargado</div></td>
      </tr>
      <tr>
        <td>Clave</td>
        <td><label>
          <input name="clave" type="text" id="clave" size="60" value="<?=$encargado->getclave(); ?>" />
        </label>
        <input name="hid2" id="hid2" type="hidden" value="<?=$encargado->getclave(); ?>" />
        </td>
      </tr>
      <tr>
        <td>Nombre</td>
        <td><label>
          <input name="nombre" type="text" id="nombre" size="60" value =" <?=$encargado->getnombre(); ?> "/>
        </label></td>
      </tr>
      <tr>
        <td>Firma </td>
        <td><label>
          <input name="firma" type="text" id="firma" value="<?=$encargado->getfirma(); ?> " size="60" readonly="readonly"/>
          
        </label></td>
      </tr>
      <tr>
        <td>Tipo</td>
        <td>
        
        <select name="cmb_encargado" id="cmb_encargado" onchange="hola();">
       	     <option value="0"></option>
          <option value="normal">normal</option>
          <option value="autorizador">autorizador</option>
        </select>
       
        
        
        
       
        </td>
      </tr>
      <tr>
        <td>Departamento</td>
        <td>     
        
        
        
        <?  
		$resi=mysql_query("select id_departamento, nombre from departamento");

	  ?>	  
        <select name="cmb_depa" id="cmb_depa">
	  <?
	  	while($rex = mysql_fetch_array($resi)){
	  ?>
	  <option value="<?=$rex[0];?>" <? if($encargado->getclave()==$rex[0]){ echo "selected";}?>><?=$rex[1];?></option>
	  <?
	  }
	  ?>	  	
        </select>     
        
        
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><label>
          <div align="center">
            <input type="submit" name="button" id="button" value="Guardar" onclick="javascript:enviar();" /><input name="hid" type="hidden" id="hid" value="<?=$idd;?>"/>
          </div>
        </label></td>
      </tr>
  </table>
  </div>
  
  
<?
if(isset($_POST['clave']) && $_POST['clave']!='')
{

	$clave = $_POST['clave'];
	$nombre =$_POST['nombre'];
	$tipo = $_POST['cmb_encargado'];
	$departamento=$_POST['cmb_depa'];
	$firma = $_POST['firma'];
	
	
	$idd2=$_POST['hid2'];
	
	
	
	
				   



													$encargado = new encargado($idd2);


													$encargado->setclave($clave);
													$encargado->setnombre($nombre);
													$encargado->settipo($tipo);
													$encargado->setid_departamento($departamento);
													$encargado->setfirma($firma);
													


													$encargado->modificar();




/*echo '<script lenguaje="javascript">alert("SE GUARDO CORRECTAMENTE");txtclave.focus();return;</script>';
echo '<script lenguaje="javascript">parent.parent.GB_hide();</script>';

*/
	
	
}

  
  
  
  ?>
  
</form>




</body>
</html>