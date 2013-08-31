<? session_start(); ?>
<? require_once("conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Elegir Departamento</title>

</head>

<body>



<form action="definir_encargado.php" method="post">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="50%" border="0">
    <tr>
      <td>
        
        
        <div align="center">
          <p>
            <select name="cmb" id="cmb">
              <option value="0" >Selecciona Departamento</option>
              <?	
		$queri = mysql_query("select id_departamento,nombre,clave FROM departamento");
		while($res = mysql_fetch_array($queri)){	
		?>	  
              <option value="<?=$res[0];?>">
                <?=$res[2];?>
                :<?=$res[1];?>
                </option>
              <? }    
			  
			  
			 
			  
			  ?>
            </select>
          </p>
          <p>
          
          <?   
		  $_SESSION["k_username"] = $res[2];
			  ?>
            <label>
              <input type="submit" name="button" id="button" value="Entrar" />
            </label>
          </p>
        </div></td>
      </tr>
  </table>
</div>
<div align="center"></div>
</form>



</body>
</html>