<?
session_start();
if (isset($conexion))
{
	mysql_close();
	
}
	session_unset();

// include ("conexion.php"); 
include ("cls_periodo.php");


if(!isset($_POST['cmb_periodo'])){
	$conexion1= mysql_connect("localhost","root","") ;
mysql_select_db("planeacion2010",$conexion1);

$conexion2= mysql_connect("localhost","root","") ;
mysql_select_db("periodo",$conexion2);

	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<title>Administrador de contenidos web - Tecnológico de Colima</title>
<head>
</head>








<body onload="cargar();">
         <form id="form1" name="form1" method="post"  >
                                
								
     
        <div align="center">
        
      		 <?  
	  		$sSQL="SELECT * FROM periodo where mostrar = 1 ";
			$result=mysql_query($sSQL, $conexion2);
	  		?>
            
        	<select id="cmb_periodo" name="cmb_periodo" >
              <option value="0">Seleccione Periodo</option>
              <? while($otmp=mysql_fetch_object($result)){?>
              <option value="<?=$otmp->periodo;?>">
              <?=$otmp->periodo;?>
                </option>
              <? 
			  }
			  ?>
            </select>
                    
             <input type="submit" name="button" id="button" value="Entrar" />
           
        </div>
      
    
        
        <?
    		if(isset($_GET['msg'])){?>
    		<script language="javascript">
			alert('<?=str_replace('%20',' ',trim($_GET['msg']));?>');
			open('index.php','_self');
			</script>
    	<? 
			}
    	?>
        
      
       
       <?
			} 
			else
			{
				if(isset($_POST['cmb_periodo']) && $_POST['cmb_periodo']!='')
				{
					$periodo = $_POST['cmb_periodo'];
		
					$base = "planeacion" . $periodo;
		
					// echo $base;
		
					$_SESSION["bd"] = $base;
		
		
					 header("location:index_menu.php");

				}					
			}
		?>		 
                
        </form>

</body>
</html>
