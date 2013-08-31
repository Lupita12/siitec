<?php
require_once("conexion.php");
require_once("cls_subcapitulo.php"); 
class Capitulo{

	private $clave  = 0;
	private $nombre ='' ;
	private $descripción = '';
	private $ingreso_propio =0;  
	private $gasto_directo =0;
	private $vigencia ='000000';
	private $periodo ='';
	private $id_capitulo=0;
	//private $id = 0;
	
	private $lst_subcapitulo = array(); // Declaramos un array de objetos tipo subcapitulo
	
	function __construct($cve_capitulo = 0, $periodo = '', $depa = 0, $meta = '')
	{
			if ($periodo=='')
			{
				$periodo=date('Y');
				$this->periodo=$periodo;
			}
				
			
			if ($cve_capitulo != 0)
			{
				
				$cadena_sql = mysql_query("select * from capitulo where clave = " .$cve_capitulo. " and periodo = '".$periodo."'"); 	
				$num = mysql_num_rows($cadena_sql);
				
				if($num!=0)
				{
					$resu = mysql_fetch_row($cadena_sql);
					
					$this->clave=$cve_capitulo;
					$this->nombre=$resu[1];
					$this->descripcion=$resu[2];
					$this->gasto_directo=$resu[4];
					$this->periodo=$periodo;
					$this->vigencia=$resu[5];
					$this->id_capitulo=$resu[7];
					
					
					if ($depa == 0 && $meta== '')
					{
					
					$cad="select clave from subcapitulo where id_capitulo=".$this->id_capitulo." and periodo = '".$periodo."' ";
					$res = mysql_query($cad);
					while($subcapitulo = mysql_fetch_array($res)){
						$this->lst_subcapitulo[] = new Subcapitulo($subcapitulo[0]);
					
					}
					
					$cho=mysql_query("select SUM(p.ingreso_propio) from partida_departamento p join partida pa on p.id_partida=pa.id_partida where pa.clave BETWEEN ".$cve_capitulo." and (".$cve_capitulo." +999) ");
					$resu = mysql_fetch_row($cho);
					
					//Si el ingreso es null se asigna cero
					if($resu[0]!=NULL)
					{
							$this->ingreso_propio=$resu[0];
						}else{
							$this->ingreso_propio=0;
						}
					
					//Gasto directo 
					$quee=mysql_query("select SUM(monto) from gastodirecto_capitulo where id_capitulo = ".$this->id_capitulo."");
					$res2=mysql_fetch_row($quee);
						
						if($res2[0]!=NULL)
						{
							$this->gasto_directo=$res2[0];
							 
						}else{
							$this->gasto_directo=0;
						}
					
					}else{
						//
						//quite el periodo
						$id_depar =mysql_query("select id_departamento from departamento where clave = ".$depa." ");
						$id_dmeta =mysql_query("select id_meta from meta where clave ='".$meta."' ");
						$row = mysql_fetch_array($id_depar);
						$row2 = mysql_fetch_array($id_dmeta);
						
						// modifique esto 
						$cade= mysql_query("select clave from subcapitulo where clave in(select cast(concat(lpad(pa.clave,2,0),'00') as binary) from partida_departamento p join partida pa on p.id_partida=pa.id_partida where p.id_meta= ".$row2[0]." and p.id_departamento =".$row[0]." and p.periodo = '".$periodo."' and id_capitulo = ".$this->id_capitulo.")");
						
						//$re = mysql_query($cade);
							while($subcapitulo = mysql_fetch_array($cade)){
								$this->lst_subcapitulo[] = new Subcapitulo($subcapitulo[0],$periodo,$depa,$meta);
							}
					
						// obtener el ingreso propio del capitulo cuando llega el dep y la meta .......
						$cad= "select sum(p.ingreso_propio) from partida_departamento p join partida pa on p.id_partida=pa.id_partida where p.id_departamento = ".$row[0]." and p.id_meta = ".$row2[0]." and pa.clave BETWEEN ".$cve_capitulo." and (".$cve_capitulo."+999)  ";
						//echo $cad;
						$que=mysql_query($cad);
						
						$result = mysql_fetch_row($que);
						//$this->setingreso_propio($result[0]);
						//Si el ingreso es null se asigna cero
						if($result[0]!=NULL)
						{
							$this->ingreso_propio=$result[0];
						}else{
							$this->ingreso_propio=0;
						}		
						
						
					 }
					
					}		
						
				}
			
			}	
	
	
		

	function __destruct()
	{
	}


	public function getclave(){
		return $this->clave;
	}
	public function setclave($newval){
		$this->clave = $newval;
	}
	
	
	public function getnombre(){
		return $this->nombre;
	}
	public function setnombre($newval){
		$this->nombre = $newval;
	}
	
	
	
	public function getdescripcion(){
		return $this->descripcion;
	}
	public function setdescripcion($newval){
		$this->descripcion = $newval;
	}
	
	
	public function getingreso_propio(){
		return $this->ingreso_propio;
	}
	public function setingreso_propio($newval){
		$this->ingreso_propio = $newval;
	}
	
	
	public function getgasto_directo(){
		return $this->gasto_directo;
	}
	public function setgasto_directo($newval){
		$this->gasto_directo = $newval;
	}
	
	public function getvigencia(){
		return $this->vigencia;
	}
	public function setvigencia($newval){
		$this->vigencia = $newval;
	}
	
	
	public function getperiodo(){
		return $this->periodo;
	}
	public function setperiodo($newval){
		$this->periodo = $newval;
	}
	
	
	public function getid_capitulo(){
		return $this->id_capitulo;
	}
	
	public function setid_capitulo($newval){
		$this->id_capitulo = $newval;
	}
	
	public function getlst_subcapitulo(){
		return $this->lst_subcapitulo;
	}
	
	public function setlst_subcapitulo($newval){
		$this->lst_subcapitulo= $newval;
	}
	
	
	/**
	 * Funcion agregarCapitulos()
	 * Agrega un Capitulo a la lista de Capitulos (graba el Capitulo en la base de
	 * datos)
	 */
	
	public function agregarCapitulos()
	{

       $que = ("INSERT INTO capitulo (clave, nombre, descripcion, ingresos_propios, gasto_directo, vigencia, periodo) VALUES (".$this->clave.",'".$this->nombre."','".$this->descripcion."',".$this->ingreso_propio.",".$this->gasto_directo.",'".$this->vigencia."','".$this->periodo."')");	
	    

	   $res = mysql_query($que);
	
	
	}
	
	
	/**
	 * Funcion modificaCapitulos()
	 * Actualiza los datos de un capitulo especifico
	 */
	 
	public function modificaCapitulos(){
	  
	  $que = "UPDATE capitulo
	  		  SET clave = ".$this->clave.",
			  	  nombre = '".$this->nombre."',
				  ingresos_propios = ".$this->ingreso_propio.",
			  	  descripcion = '".$this->descripcion."',
				  gasto_directo = ".$this->gasto_directo.",
				  vigencia = '".$this->vigencia."',
				  periodo='".$this->periodo."'  
			  WHERE id_capitulo = ".$this->id_capitulo;
	    
	  	$res = mysql_query($que);
		
	}
	
	public function modificamonto(){
		$que = "UPDATE capitulo SET ingresos_propios = ".$this->ingreso_propio." WHERE id_capitulo = ".$this->id_capitulo." ";
		$res = mysql_query($que);
		
	}
	
	/**
	 * Funcion eliminaCapitulo()
	 * Elimina un capitulo de la lista
	 */
	
	public function eliminaCapitulos(){
	 
	  $que = "DELETE from capitulo 
	  		  WHERE id_capitulo = ".$this->id_capitulo."  " ; 
				  
	   $res = mysql_query($que);
	  
	 	
	  	
	}


}

?>