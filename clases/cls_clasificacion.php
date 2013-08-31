<?
require_once("../conexion.php"); 

class Clasificacion
{
	private $clave=0;
	private $nombre='';
	private $descripcion='';
	private $imagen='';
	private $id_clasificacion=0;

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
		$this->nombre=$newval;
	}
	
	public function getdescripcion(){
		return $this->descripcion;
	}
	
	public function setdescripcion($newval){
		$this->descripcion=$newval;
	}
	
	public function getimagen(){
		return $this->imagen;
	}
	
	public function setimagen($newval){
		$imagen=$newval;
	}
	
//------------------------------------------------------------------------------	


//-------------------------------------------------------------------------------

	function __construct($clave_clasificacion = 0)
	{

		if($clave_clasificacion != 0)
		{
			$Sql = "SElECT * FROM clasificacion WHERE clave = $clave_clasificacion";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->clave=$clave_clasificacion;				
				$this->nombre=$row[1];
				$this->descripcion=$row[2];
				$this->imagen=$row[3];
				$this->id_clasificacion=$row[4];
			}	
		}
	}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Encargado


	public function agregarClasificacion()
	{

		$Sql="INSERT INTO clasificacion (clave,nombre,descripcion,imagen)  VALUES (".$this->clave.",'".$this->nombre."', '".$this->descripcion."', '".$this->imagen."')";      
   		mysql_query($Sql); 
	  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Encargado	
	public function modificarClasificacion()
	{
  
		$Sql="UPDATE clasificacion SET clave=".$this->clave.", nombre='".$this->nombre."', descripcion='".$this->descripcion."', imagen='".$this->imagen."' WHERE id_clasificacion=".$this->id_clasificacion.""; 
  	 	
		mysql_query($Sql); 
  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Encargado	
	public function eliminarClasificacion()
	{

   		$Sql="DELETE FROM clasificacion WHERE clave = ".$this->clave."";   
		
		mysql_query($Sql);
		  	
	}
//-------------------------------------------------------------------------------------
}

?>