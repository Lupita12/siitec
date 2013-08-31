<? session_start(); ?>
<? include ("conexion.php");?>
<? include ("cls_encargado.php"); ?>
<? include ("cls_autorizador.php") ;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Asignar Encargados</title>


<script language="javascript">

function cmb()
{
	with(document.form1)
	{
		document.form1.submit();
	}
}

</script>

<script type="text/javascript" src="js/jquery.js"></script>
<!-- Select Box PlugIn (for Ascending and Descending order)-->
<script type="text/javascript" src="http://jqueryjs.googlecode.com/svn/trunk/plugins/selectboxes/jquery.selectboxes.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	//Moving selected item(s) to right select box provided
	$('#moveright').click(function() { 
		//If none of the items are selected, inform the user using an alert
		if(!isSelected("#fromSelectBox")){return;} 
		//If atleast one of the item is selected, initially the selected option would be 'removed' and then it is appended to 'toSelectBox' (select box)
		$('#fromSelectBox option:selected').remove().appendTo('#toSelectBox'); 
		return false;
	});
	
	//Moving selected item(s) to left select box provided
	$('#moveleft').click(function() {
		//If no items are present in 'toSelectBox' (or) if none of the items are selected inform the user using an alert
		if(!noOptions("#toSelectBox") || !isSelected("#toSelectBox")){return;} 
		//If atleast one of the item is selected, initially the selected option would be 'removed' and then it is appended to 'fromSelectBox' (select box)
		$('#toSelectBox option:selected').remove().appendTo('#fromSelectBox');
		return false;
	});
	
	//Moving selected item(s) to upwards
	$('#moveup').click(function(){
		//If no items are present in 'toSelectBox' (or) if none of the items are selected inform the user using an alert
		if(!noOptions("#toSelectBox") || !isSelected("#toSelectBox")){return;}
		//If atleast one of the item is selected, through loop - the selected option would be moved upwards
		$('#toSelectBox option:selected').each(function(){$(this).insertBefore($(this).prev());});
		return false;
	});
	
	//Moving selected item(s) to upwards
	$('#movedown').click(function(){
		//If no items are present in 'toSelectBox' (or) if none of the items are selected inform the user using an alert
		if(!noOptions("#toSelectBox") || !isSelected("#toSelectBox")){return;}
		//If atleast one of the item is selected, through loop - the selected option would be moved downwards
		var eleValue = $('#toSelectBox option:selected:last').next();
		$("#toSelectBox option:selected").each(function(){
			$(this).insertAfter(eleValue);
			eleValue = $(eleValue).next();
		});
		return false;
	});
	
	//Moving selected item(s) to topmost
	$('#topmost').click(function(){
		//If no items are present in 'toSelectBox' (or) if none of the items are selected inform the user using an alert
		if(!noOptions("#toSelectBox") || !isSelected("#toSelectBox")){return;}
		//If the selected item(s) index is greater than first item (option) index then move that item to the first position
		if($('#toSelectBox option:selected').attr('index') > $('#toSelectBox option:first').attr('index')){
			$('#toSelectBox option:selected').insertBefore($('#toSelectBox option:first'));
		}
		return false;
	});
	
	$('#bottommost').click(function(){
		//If no items are present in 'toSelectBox' (or) if none of the items are selected inform the user using an alert	
		if(!noOptions("#toSelectBox") || !isSelected("#toSelectBox")){return;}
		//If the selected item(s) index is less than last item (option) index then move that item to the last position
		if($('#toSelectBox option:selected').attr('index') < $('#toSelectBox option:last').attr('index')){
			$('#toSelectBox option:selected').insertAfter($('#toSelectBox option:last'));
		}
		return false;
	});
});

//Below function is to validate the select box, if none of the item(s) is selected then it alerts saying 'Please select atleast one option' if user selects an item then it returns true
function isSelected(thisObj){
	if (!$(thisObj+" option:selected").length){
		alert("Debes seleccionar al menos una opción");
		return 0;
	}
	return 1;
}

//Below function is to validate the select box, if none of the item(s) where present in the select box provided then it alerts saying 'There are no options to select/move' if select box has more than one item it returns true
function noOptions(thisObj){
	if(!$(thisObj+" option").length){
		alert("No hay nombres para seleccionar/mover");
		return 0;
	}
	return 1;
}

//Below function is to de-select all items if any of the item(s) are selected
function clearAll(thisObj){
	$('#'+thisObj).each(function(){$(this).find('option:selected').removeAttr("selected");});
}//function close

//Below function is to select all items
function selectAll(thisObj){
	if(!noOptions("#"+thisObj)){return;}
	$('#'+thisObj+' option').each(function(){$(this).attr("selected","selected");});
}//function close

//Below function is to arrange all items in Ascending Order [this is used from plug-in which we have attached]
function ascOrderFunction(){
	$("#toSelectBox").sortOptions();
}//function close

//Below function is to arrange all items in Descending Order [this is used from plug-in which we have attached]
function desOrderFunction(){
	$("#toSelectBox").sortOptions(false);
}//function close

</script>

<script type="text/javascript">

function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}




function getOptions()
{
	

var x=document.getElementById('toSelectBox');
var txt="";
for (i=0;i<x.length;i++)
  {
  txt=txt + "," + x.options[i].text;
  
  }
 

			
			
				 document.getElementById('hidorden').value= txt;
			
	
			 	 document.form1.submit();
			 
			 
		

}





</script>



<style type="text/css">
  /* Used background image and background color */
 
  
  /* Div Containers */
  .from_container, .buttons_container{
	float:left;
	text-align: center;
	margin: 10px;
  }
  
  .to_container{
	float:left;
	text-align: center;
	margin: 10px 0px 10px 10px;
  }
  
  /* Div Container for Ascending and Descending icons */
  .ascdes_container{
	float:left;
	margin: 10px 0px 0px 0px;
  }
  
  /* Styles for select box */
  select {
   width: 450px;
   height: 252px;
   *height: 246px; /* for IE Browers */
   border:1px #000033 solid;
   background-color:#b3d1fd;
   font-family:Arial, Helvetica, sans-serif;
   font-size:18px;
  }
  
  /* This is for img input */
  input{outline:none;}
  
  /* Whole main container which holds all div containers */
  #container{
  	margin:0 auto;
	background-color: #DEE5F9;
	padding:10px;
	width:1000px;
	*width:580px; /* for IE Browers */
	clear:both;
  }
</style>

</head>

<body>
<form name="form1" action="" method="post">
<div align="center">
  <select name="combo"  style="height:auto"  id="combo"   >
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
			  
			  
			 	
	$clavesesion = $_POST['combo'];
	
			  
			  ?>
  </select>
  
  
  
  
  <!-- Container -->
</div>
<div id="container">
    <!-- From Container -->
    <div class="from_container">
    
    <?  
	  	$sSQL="SELECT id_encargado, nombre, id_departamento FROM encargado where tipo = 'autorizador' and id_encargado not in (select id_autorizador from autorizador)  ";
		$result=mysql_query($sSQL, $conexion);
	  ?>
	  
    
      <select id="fromSelectBox" multiple="multiple">
       
       <? while($otmp=mysql_fetch_object($result)){?>
       <option value="<?=$otmp->id_encargado;?>"><?=$otmp->id_encargado;?>.<?=$otmp->nombre;?></option>
       <? }?>
      </select><br />
    </div>
    <!-- From Container [Close] -->
    <!-- Buttons Container -->
    <div class="buttons_container"><br />
        <input type="image" src="imagenes/moveup.jpg" id="moveup" /><br />
        <input type="image" src="imagenes/moveright.jpg" id="moveright" /><br />
        <input type="image" src="imagenes/moveleft.jpg" id="moveleft" /><br />
        <input type="image" src="imagenes/movedown.jpg" id="movedown" /><br /><br />
  </div>
    <!-- Buttons Container [Close] -->
    <!-- To Container -->
    <div class="to_container">
	  <select name="toSelectBox" id="toSelectBox" multiple="multiple"></select><br />
    </div>
    <!-- To Container [Close] -->
    <!-- To Container -->
    <div class="ascdes_container"><br />
    </div>
    <!-- To Container [Close] -->
    <div style="clear:both"></div>
</div>
<!-- Container [Close] -->

<table align="center"><tr>

<td align="center"> <input type="button" onclick="getOptions()" value="Definir">  </td>

</tr></table>


  
  
<p>&nbsp;</p>
<p>
  <input type="hidden" name="hidorden" id="hidorden" />
</p>
<p>&nbsp;</p>

<?php 
if(isset($_POST['hidorden']) && $_POST['hidorden']!='')
{
	
		
	$clavesesion = $_POST['combo'];
	
	
 $orden = $_POST['hidorden'];
 
 
 $array = explode(",",$orden);
 $contador = count($array) ;
 $contador_b = $contador - 1;
 
 
 
//  print_r($array);

// list($id, $nombre) = split('[.]', $array);
  
 
 for ($i=1;$i<= $contador_b;$i++)
 {
	  
	list($id, $nombre) = split('[.]', $array[$i]);
    // echo "id: $id; nombre: $nombre<br/>\n";
	
	
	$autorizador = new autorizador();
	
	$autorizador->setid_autorizador($id);
	$autorizador->setorden($i);
	$autorizador->setid_departamento($clavesesion);
	
	
	$autorizador->agregar();
	 


}
echo '<script lenguaje="javascript">alert("AUTORIZADORES DEFINIDOS");</script>';
 
 
 


}


?>
 

</form>
</body>
</html>