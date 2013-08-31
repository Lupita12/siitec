<? 
session_start();
require_once("../conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nueva Requisicion</title>

<script language="javascript">
function validar()
{
	with(document.form1)
	{
		if(sel_meta.value== 0)
		{
			alert('Es necesario Asignar una meta');
			return 0;
		}
		else
			submit();
	}
}

</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?
//$clvdepa=25/*$_POST['idepa']*/;
echo "el id del depa".$_SESSION["s_idepa"];
$cadena_sql = mysql_query("select m.id_meta, clave, m.nombre from partida_departamento p join meta m on p.id_meta=m.id_meta
where id_departamento=".$_SESSION["s_idepa"]." group by clave");
?>
<input type="hidden" name="h_clv" id="h_clv" value="<?=$_SESSION["s_idepa"];?>"/>
  <table width="500" border="1" align="center">
    <tr>
      <td>Sobre la meta:</td>
      <td><select name="sel_meta" id="sel_meta">
      <option value="0">Seleccione Meta</option>
 <?
	while($row = mysql_fetch_array($cadena_sql)){
		  ?>
          	  <option value="<?=$row[0];?>"><?=$row[1]." ".htmlentities($row[2]);?></option><? }?>     
      </select></td>
    </tr>
    <tr>
      <td>El dinero esta contemplado en:</td>
      <td><select name="cmb_poa" id="cmb_poa">
        <option value="1" selected="selected">Ingreso Propio</option>
        <option value="2">Gobierno Del Estado</option>
        <option value="3">Gasto Directo</option>
      </select></td>
    </tr>
    <tr>
      <td><input type="button" name="button" id="button" value="Agregar" onclick="validar();"/></td>
      <td>&nbsp;</td>
    </tr>
  </table>
<?
if(isset($_POST['sel_meta']) && $_POST['sel_meta']!=0)
{
	$cla=$_POST['sel_meta'];
	$depar=$_POST['h_clv'];
	$poa=$_POST['cmb_poa'];
	
	//if($estra<10)
	//	$estra="0".$estra;
	if($poa==1)
	{
		$comprobar=mysql_query("insert into requisicion (folio,fecha,autorizado,nombre_director,tipo_de_contemplacion,id_traspaso,id_meta,id_departamento) values ('','".date("Y/m/d")."',0,'',1,".$_SESSION["s_idepa"].",$cla,".$_SESSION["s_idepa"].")");
	}
	else
	{
		if($poa==2)
		{
		$comprobar=mysql_query("insert into requisicion (folio,fecha,autorizado,nombre_director,tipo_de_contemplacion,id_traspaso,id_meta,id_departamento) values ('','".date("Y/m/d")."',0,'',2,".$_SESSION["s_idepa"].",$cla,".$_SESSION["s_idepa"].")");		
		}
		else
		{
			$comprobar=mysql_query("insert into requisicion (folio,fecha,autorizado,nombre_director,tipo_de_contemplacion,id_traspaso,id_meta,id_departamento) values ('','".date("Y/m/d")."',0,'',3,".$_SESSION["s_idepa"].",$cla,".$_SESSION["s_idepa"].")");				
			
		}
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