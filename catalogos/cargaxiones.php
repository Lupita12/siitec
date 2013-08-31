<? require_once("../conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<script type="text/javascript">
function enviar()
{
	with(document.justi)
	{
		
		var concate;
		concate=0;		
		b=0;
		accio=hid.value;
		for(i=1;i<=accio;i++)
		{
			if(document.getElementById('radio'+i).checked==true)
			{
				b++;
				if(concate==0)
					concate=document.getElementById('radio'+i).value;
				else
					concate=concate+'#'+document.getElementById('radio'+i).value;					
			}

		}
		if(b==0)
		{
			alert("Debes seleccionar almenos 1 acción")
			return 0;
		}
		else
		{
			alert(concate);
			submit();
		}
	}
}
</script>
<body>
<form id="justi" name="justi" method="post" action="">
  <p>&nbsp;</p>
  <p>

  

  </p>
  <table width="500" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  <? 
  $queri = mysql_query("select a.nombre, id_accion from meta m join accion a on a.id_meta=m.id_meta where m.id_meta=6");
  $a=1;
		while($res = mysql_fetch_array($queri)){
 ?>    
    <tr>
      <td>
      <input type="checkbox" name="radio<?=$a;?>" id="radio<?=$a;?>" value="<?=$res[1];?>" /></td>
      <td colspan="2"><?=$res[0];?></td>
    </tr>
<? $a++;}?>     
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="hidden" name="hid" id="hid" value="<?=--$a;?>"/>        <input type="button" name="button" id="button" value="Guardar" onclick="enviar();"/></td>
      <td><input type="submit" name="button2" id="button2" value="Cancelar" /></td>
    </tr>
  </table>
<?
if(isset($_POST['hid']) && $_POST['hid']!='')
{
	$vari=$_POST['hid'];
	for($i=1;$i<=$vari;$i++)
	{
		$ratio=$_POST['radio'.$i];
		if($ratio==NULL)
			echo "esta pollito";
		echo $ratio."<br>";
	}
	

}?>  
  
</form>
</body>
</html>