<? session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" >
	
<script type="text/javascript">
	
	$(document).ready(function () {

		//transitions
		//for more transition, goto http://gsgd.co.uk/sandbox/jquery/easing/
		var style = 'easeOutExpo';
		var default_left = Math.round($('#menu li.selected').offset().left - $('#menu').offset().left);
		var default_top = $('#menu li.selected').height();

		//Set the default position and text for the tooltips
		$('#box').css({left: default_left, top: default_top});
		$('#box .head').html($('#menu li.selected').find('img').attr('alt'));				
		
		//if mouseover the menu item
		$('#menu li').hover(function () {
			
			left = Math.round($(this).offset().left - $('#menu').offset().left);

			//Set it to current item position and text
			$('#box .head').html($(this).find('img').attr('alt'));
			$('#box').stop(false, true).animate({left: left},{duration:500, easing: style});	

		
		//if user click on the menu
		}).click(function () {
			
			//reset the selected item
			$('#menu li').removeClass('selected');	
			
			//select the current item
			$(this).addClass('selected');
	
		});
		
		//If the mouse leave the menu, reset the floating bar to the selected item
		$('#menu').mouseleave(function () {

			default_left = Math.round($('#menu li.selected').offset().left - $('#menu').offset().left);

			//Set it back to default position and text
			$('#box .head').html($('#menu li.selected').find('img').attr('alt'));				
			$('#box').stop(false, true).animate({left: default_left},{duration:1500, easing: style});	
			
		});
		
	});

	

	</script>




<style type="text/css">

	
	a {
		text-decoration:none; 
		color: #000;
		outline:0;
	}
	
	img {
		outline:0; 
		border:0;
	}
	
	#menu {
	/* you must set it to relative, so that you can use absolute position for children elements */
		position:relative;
	text-align:center;
	width:580px;
	height:40px;
	}
	
	#menu ul {
	/* remove the list style and spaces*/
		margin:0;
	padding:0;
	list-style:none;
	display:inline;
	/* position absolute so that z-index can be defined */
		position:absolute;
	/* center the menu, depend on the width of you menu*/
		left:31px;
	top:5px;
	}
	
	#menu ul li {
		
		/* give some spaces between the list items */
		margin:0 5px; 
		
		/* display the list item in single row */
		float:left;
	}
	
	#menu #box {
	/* position absolute so that z-index can be defined and able to move this item using javascript */
		position:absolute;
	left:2px;
	top:0px;
	z-index:200;
	/* image of the right rounded corner */
		background:url(imagenes/tail.gif) no-repeat right center;
	height:35px;
	/* add padding 8px so that the tail would appear */
		padding-right:8px;
	/* set the box position manually */
		margin-left:5px;
	}
	
	#menu #box .head {
		/* image of the left rounded corner */
		background:url(imagenes/head.gif) no-repeat 0 0;
		height:35px;
		color:#eee;
		
		/* force text display in one line */
		white-space:nowrap;

		/* set the text position manually */
		padding-left:8px;
		padding-top:12px;
	}
	</style>



<title>Administrador de contenidos web - Tecnológico de Colima</title>

</head>



<style type="text/css">
<!--
@import"cssmenuhorizontal.css";
-->
/*
body {
margin: 0;
padding: 30px;
background: #FFF;
color: #666;
}
*/
h1 {
font: bold 16px Arial, Helvetica, sans-serif;
}

p {
font: 11px Arial, Helvetica, sans-serif;
}

a {
color: #900;
text-decoration: none;
}

a:hover {
background: #900;
color: #fff;
}
</style>







<body onload="cargar();" onunload="window.opener.history.go(0);" >


						
						
                        
						
                        <div  align="center" class="cssMenu">
                        
                       
							<ul id="navmenu">
  <li><a href="index_menu.php">Inicio</a></li>
  
  
  <li><a >Catalogos +</a>
    <ul>
    <li><a   href="presupuestoinicial.php">Presupuesto Inicial</a>   </li>
    <li><a  href="altadireccion.php">Alta Direccion</a></li>
    <li><a  href="departamento.php">Departamento</a></li>
     <li><a  href="meta1.php">Meta</a></li>
     
      <li><a href="TCapitulo.php">Capitulo</a></li>
      <li><a  href="TSubcapitulo.php">Conceptos</a></li>
      <li><a  href="TSubconcepto.php">Sub-conceptos</a></li>
      <li><a href="TPartidas.php">Partida</a></li>
      <li><a  href="accion1.php">Accion</a></li>
      <li><a href="proceso_clave.php">Proceso Clave</a></li>
      <li><a href="proceso_estrategico.php">Proceso Estrategico</a></li>
     
      
     
      <li><a  href="capitulo5000.php">Capitulo 5000 +</a>
     		 <ul>
            	<li><a  href="capitulo5000_especifico.php">Por departamento</a></li>
                <li><a  href="capitulo5000_pormeta.php">Por meta</a></li>
                <li><a  href="capitulo5000_porpartida.php">Por partida</a></li>
            
            </ul>  
            
                
      
      
      </li>
      		
      
      <li><a href="gastodirecto.php">Gasto Directo</a></li>
      
      
      <li><a href="periodos.php"> Administrar Periodos </a></li>
      
      
     
      
      
      
    </ul>
  </li>
  
  
  <li><a href="#">Distribucion +</a>
    <ul>
    <li><a  href="distribucion_presupuestoinicial.php">Presupuesto Incial</a></li>
      <li><a  href="distribucion_altadireccion.php">Alta Direccion </a> </li>
      <li><a  href="distribucion_departamento.php">Departamento</a>   </li>
      <li><a href="www.php">Departamento - Metas </a></li>
     
      
      
      
    </ul>
  </li>
  <li><a  href="combo_apoa.php">APOA Formato</a></li>
  <li><a   href="APOApartidaPresupuestal.php">APOA Formato Partida Prespuestal</a></li>
  <li><a  href="programa_operativo_anual.php">Concentrado PC y PE</a></li>  
  <li><a href="formato_capitulo5000.php">Capitulo 5000</a></li>
  <li><a href="index.php">Cambiar periodo</a></li>
</ul>
						</div>
                       
					 <script language="javascript">

function requisicion();
{
	window.location='index_requisicion.php';
	
}




</script>

<form action="" method="get">
  
  <a href="index_requisicion.php" >Requisicion</a>
  
  
  
  
  
</form>
				

</body>
</html>
