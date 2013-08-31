<?php

include ("conexion.php");
include_once("cls_capitulo5000.php");



$depa2=$_SESSION["departamento"];
// echo $depa2;
//creamos el objeto
$obj=new capitulo5000();
$obj->setclave_departamento($depa2);

//la variable $lista consulta todos los capitulos
$lista= $obj->consultar($depa2);

?>
<table align="center" style="color:#000000;width:1000px;">
<tr style="background:#99CCCC;">

      <td width="49"><div align="center">Clave Meta</div></td>
      <td width="51"><div align="center">Clave Partida</div></td>
      <td width="89"><div align="center">Nombre del Bien</div></td>
      <td width="86"><div align="center">Denominacion del Bien</div></td>
      <td width="59"><div align="center">Cantidad</div></td>
      <td width="75"><div align="center">Costo unitario</div></td>
      <td width="37"><div align="center">Costo Total</div></td>
      <td width="68"><div align="center">Justificacion</div></td>
      <td width="68"><div align="center">Cambiar</div></td>
</tr>
<?php
while($row = mysql_fetch_array($lista)){?>
  <tr>
  
		      	<td><div align="center"><? echo $row[1]; ?></div></td>
                
      			<td><div align="center"><? echo $row[2]; ?></div></td>
      			<td><div align="center"><? echo $row[3]; ?></div></td>
      			<td><div align="center"><? echo $row[4]; ?></div></td>
                <td><div align="center"><? echo $row[5]; ?></div></td>
                <td><div align="center"><? echo $row[6]; ?></div></td>
      			<td><div align="center"><? echo $row[7]; ?></div> <input type="hidden" name="hid<?=$i;?>" id="hid<?=$i;?>" value="<? echo $_GET["costo_total".$i];?>" /></td>
                <td><div align="center"><? echo $row[8]; ?></div></td>
                <td><div align="center"><img src="imagenes/reciclaje.png" height="25" width="25" style="cursor:pointer" onclick="cambiar('<?=$row[7];?>');" /></div></td>
  </tr>
<? }
?>
</table>

