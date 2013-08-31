<?
require_once("conexion.php");

class Subcapitulo2 {
	
	private  $clave =0 ;
	private  $clave_subcapitulo = 0 ;
	private  $nombre ='' ;
	private  $descripcion ='' ;
	private  $periodo ='';
	private  $id_subcapitulo2 = 0;


function __construct($cve_subcapitulo2 = 0, $periodo ='')
{
	if ($periodo == '')
			{
				$periodo = date ('Y');
			
				$this->periodo = $periodo;
	}
	
	if ($cve_subcapitulo2 != 0)
			{
				$cadena_sql = mysql_query("select * from subcapitulo2 where clave = " .$cve_subcapitulo2. " and periodo ='".$periodo."'"); 	
				$num = mysql_num_rows($cadena_sql);
				if($num!=0)
				{
				$resu = mysql_fetch_row($cadena_sql);
					
					$this->setclave($cve_subcapitulo2);
					$this->setclave_subcapitulo($resu[1]);
					$this->setnombre($resu[2]);
					$this->setdescripcion($resu[3]);
					$this->setperiodo($periodo);
					$this->setid_subcapitulo2($resu[5]);	
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
	
	
	public function getclave_subcapitulo(){
		return $this->clave_subcapitulo;
	}
	public function setclave_subcapitulo($newval){
		$this->clave_subcapitulo = $newval;
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
	
	public function getperiodo(){
		return $this->periodo;
	}
	public function setperiodo($newval){
		$this->periodo = $newval;
	}
	
	public function getid_subcapitulo2(){
		return $this->id_subcapitulo2;
	}
	
	public function setid_subcapitulo2($newval){
		$this->id_subcapitulo2 = $newval;
	}

/**
	 * Funcion agregar()
	 * Agrega una sub-subcapitulo a la lista de sub-subcapitulos (graba el sub-subcapitulo en la base de
	 * datos)
	 */
	public function agregar(){

       $que =  mysql_query ("INSERT INTO subcapitulo2 (clave, id_subcapitulo, nombre, descripcion, periodo) VALUES (".$this->clave.",".$this->clave_subcapitulo.",'".$this->nombre."', '".$this->descripcion."','".$this->periodo."' )");			
		  
	   $resultado=mysql_query($que);		  
	
	}
	
	/**
	 * Funcion modificar()
	 * Actualiza la descripcion de un sub-subcapitulo especifico
	 */
	 
	public function modificar(){
	  
	  $que = "UPDATE subcapitulo2 SET clave = ".$this->clave.",id_subcapitulo = ".$this->id_subcapitulo.", nombre = '".$this->nombre."',descripcion = '".$this->descripcion."',periodo='".$this->periodo."' WHERE id_subcapitulo2 = ".$this->id_subcapitulo2." "; 
	    
	  	$res = mysql_query($que);
		//echo $res;
		//die();
			
	}
	
	public function eliminar(){
	 
	  $que = "DELETE from subcapitulo2 
	  		  WHERE id_subcapitulo2= ".$this->id_subcapitulo2." "; 
				  
	   $res = mysql_query($que);
	
}


}


?>