<? require_once("../conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<script type="text/javascript">

function envia(meta,depar)
{ 
	with(document.form1)
	{
	
	hidepa.value=depar;
	hidmeta.value=meta;
	submit();
	}	
}

</script>
<body>
<form id="form1" name="form1" method="post" action="">
<?

$clvde=$_GET['idepa'];
$queri=mysql_query("select * from partida_departamento d join partida p on d.id_partida=p.id_partida where d.id_departamento=$clvde and d.id_meta=39 and p.clave between 2000 and 2999 order by p.clave");
$resu = mysql_num_rows($queri);

?>
<table width="300" border="0" align="center">
  <tr>
    <td>
    
 <?
     $result=mysql_query("select m.id_meta, m.clave, nombre from meta_departamento d join meta m on m.id_meta=d.id_meta and d.id_departamento=$clvde order by m.clave");?>
            
        <select name="combo" id="combo" onchange="javascript:envia(this.value,<?=$clvde;?>);">
			<option value="0">Selecciona Una meta</option>	  
	  <?
	  while($res = mysql_fetch_array($result)){
	  ?>	
	  <option value="<?=$res[0];?>"><?=$res[1];?></option>
	  <?
	  }
	  ?>
        </select>
      <input name="hidepa" type="hidden" id="hidepa" value="0" />
      <input name="hidmeta" type="hidden" id="hidmeta" value="0" /></td>
    </tr>
</table>
<p>
  <?
if(isset($_POST['combo']) && $_POST['combo']!='')
{
	$clave=$_POST['hidepa'];
	$meta=$_POST['hidmeta'];	
	
	$impri=mysql_fetch_array(mysql_query("select clave, nombre from meta where id_meta=$meta"));
?>	
</p>
<table width="100%" border="0" align="center">
  <tr>
    <td align="center"><?="Meta: ".$impri[0]." ".$impri[1];?></td>
    </tr>
</table>
<p>&nbsp;</p>
<table width="800" border="0" align="center">
  <tr bgcolor="#CCCCCC">
    <td width="100">Clave</td>
    <td width="300">Nombre</td>
    <td width="100">Asignado</td>
    <td width="100">Gastado</td>
    <td width="100">Comprometido</td>
    <td width="100">Restante</td>
  </tr>
  <?
$q_todo=mysql_query("select p.clave, p.nombre, d.ingreso_propio, d.gastado, d.comprometido, (d.ingreso_propio-d.gastado-d.comprometido) as restante from partida_departamento d join partida p on d.id_partida=p.id_partida where d.id_departamento=$clave and d.id_meta=$meta order by p.clave"); 
$a=1;
while($resu = mysql_fetch_array($q_todo)){
		if($a==0)
		{ 		
		?>	 
          <tr>
        <? $a=1;}else{?>
            <tr bgcolor="#FFCC99">
			<? $a=0;}?>

    <td width="100"><?=$resu[0];?></td>
    <td width="300"><?=strtolower(htmlentities($resu[1]));?></td>
    <td width="100"><?="$ ".number_format($resu[2]);?></td>
    <td width="100"><?="$ ".number_format($resu[3]);?></td>
    <td width="100"><?="$ ".number_format($resu[4]);?></td>
    <td width="100"><?="$ ".number_format($resu[5]);?></td>
  </tr>
  <?
}
  ?>
  <tr>
    <td width="100">&nbsp;</td>
    <td width="300">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="100">&nbsp;</td>
  </tr>
</table>
<?	
}?>

</form>
</body>
</html>