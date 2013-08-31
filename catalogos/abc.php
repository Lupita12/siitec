<?php
//session_start();
require_once("../conexion.php");
//if(isset($_POST['ingreso']))
//{
$opcion=$_POST['opcion'];
$opci=$_GET['opcion'];
//si veo que no llegan las variables pos prueba cual no llega y cual no
//echo "cmb_partida ".$x1."<br>cmb_arti ".$x2."<br>cmb_marc ".$x3."<br>opcion ".$x4."<br>cmb_clas ".$x5."<br>cmb_ume ".$x6."<br>canti ".$x7."<br>descri ".$x8."<br>ingreso ".$x9."<br>iv ".$x."<br>";
//recupero las opcion tanto de borrado como modificado para ver que opcion entrara en el case


if($opcion == "")
{
  $opcion = $opci;
}
//echo $opcion."<br>";
//Armo el Switch para ver en que caso entra el formulario y pueda realizar la operacion alta,bajas,modificaciones.
switch($opcion)
{
//Si es Caso 1 Guarda el Nuevo Empleado 
case 1:
	$x1=$_POST['cmb_partida'];
	$id_articulo=$_POST['cmb_arti'];
	$id_descripcion=$_POST['cmb_marc'];
	$x5=$_POST['cmb_clas'];
	$x6=$_POST['cmb_ume'];
	$x7=$_POST['canti'];
	$x8=$_POST['unidad'];
	$x9=$_POST['ingreso'];
	$x=$_POST['iv'];
/*	if($id_descripcion==0)
	{
		mysql_query("insert into descripcion (descripcion, id_articulo, precio) values ('".$x8."', ".$id_articulo.",".$x9.")");	
		$id_descripcion=mysql_insert_id(); 
	}
	echo "el ultimo id ".$id_descripcion;
	*/
	mysql_query("update unidadmedida set precio=".$x9." where id_unidadmedida=".$x8);
	mysql_query("insert into requisicion_articulo (folio_requisicion, id_articulo,id_partida, cantidad,id_descripcion,id_unidadmedida,precio,total) values (".$_SESSION["idrequi"].", '".$id_articulo."',".$x1.",".$x7.",".$id_descripcion.",".$x8.",".$x9.",".$x.")");
	
	if($_SESSION["s_contemplacion"]==1)
	{
		mysql_query("update partida_departamento set comprometido=comprometido+".$x." where id_meta=".$_SESSION["idmetamo"]." and id_departamento =".$_SESSION["s_idepa"]." and id_partida=".$x1);
	}
	if($_SESSION["s_contemplacion"]==3)
	{
		mysql_query("update gastodirecto_capitulo set comprometido=comprometido+".$x." where id_meta=".$_SESSION["idmetamo"]." and id_departamento =".$_SESSION["s_idepa"]." and id_partida=".$x1);
	}
break;
//En Caso 2 Borra el Nuevo Empleado
case 2:
	$justificate=$_POST['txt_just'];
	echo $justificate."<br>";
	$a_idaccion = explode('#', $justificate);
	mysql_query("delete from requisicion_accion where id_requisicion=".$_SESSION["idrequi"]);
	echo $a_idaccion[0]." y el otro q pedo".$a_idaccion[1];
	foreach($a_idaccion as $as_idacci)
	{
		mysql_query("insert into requisicion_accion (id_requisicion,id_accion) values (".$_SESSION["idrequi"].",".$as_idacci.")");
		echo "id: ".$as_idacci." ";
	}
	//mysql_query("update requisicion set justificacion = '".$justificate."' where id_requisicion=".$idrequi);
break;
//En Caso 3 Actualizamos Registro
case 3:
	$idarticu=$_GET['idarticulo'];
	if($_SESSION["s_contemplacion"]==1)
	{
		$q_consu=mysql_query("select total, id_partida from requisicion_articulo where id_shuffle=".$idarticu);
		$a_consu=mysql_fetch_row($q_consu);
		mysql_query("delete from requisicion_articulo where id_shuffle=".$idarticu);
		mysql_query("update partida_departamento set comprometido=comprometido-".$a_consu[0]." where id_meta=".$_SESSION["idmetamo"]." and id_departamento=".$_SESSION["s_idepa"]." and id_partida=".$a_consu[1]);
	}else{
		if($_SESSION["s_contemplacion"]==2)
		{
			mysql_query("delete from requisicion_articulo where id_shuffle=".$idarticu);
		}else{
			$a_consu=mysql_fetch_row(mysql_query("select total, id_partida from requisicion_articulo where id_shuffle=".$idarticu));
			mysql_query("delete from requisicion_articulo where id_shuffle=".$idarticu);
			mysql_query("update gastodirecto_capitulo set comprometido=comprometido-".$a_consu[0]." where id_meta=".$_SESSION["idmetamo"]." and id_departamento=".$_SESSION["s_idepa"]." and id_partida=".$a_consu[1]);		
		}
	}

break;
}
//$cad="insert into articulo (clave,nivel,partida,codigo) values ('$nom',$dep,$suel,$opcion)";
//mysql_query("insert into articulo (clave,nivel,partida,codigo) values ('$nom',$dep,$suel,$opcion)");
//echo $cad;

//Si Todo Sale Bien Incluimos el Listado De Paginacion
include('cata.php');
//}
?>