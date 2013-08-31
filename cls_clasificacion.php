<?
require_once("conexion.php"); 

class Clasificacion
{
	private $clave;
	private $nombre;
	private $descripcion;
	private $imagen;

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
				$this->setclave($clave_clasificacion);				
				$this->setnombre($row[1]);
				$this->setdescripcion($row[2]);
				$this->setimagen($row[3]);
			}	
		}
	}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------

	public function mostrarClasificacion()
	{
		echo $this->clave;
			echo "<br>";
		echo $this->nombre;	
			echo "<br>";
		echo $this->descripcion;
			echo "<br>";
		echo $this->imagen;
			echo "<br>";
	}

//-----------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Encargado


	public function agregarClasificacion()
	{

		$Sql="INSERT INTO clasificacion (clave,nombre,descripcion,imagen)  VALUES (".clave.",'".nombre."', '".descripcion."', '".imagen."')";      
   		mysql_query($Sql); 
	  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Encargado	
	public function modificarClasificacion()
	{
  
		$Sql="UPDATE clasificacion SET clave=".clave.", nombre='".nombre."', descripcion='".descripcion."', imagen='".imagen."' WHERE clave=".clave.""; 
  	 	
		mysql_query($Sql); 
  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Encargado	
	public function eliminarClasificacion()
	{

   		$Sql="DELETE FROM clasificacion WHERE clave = ".clave."";   
		
		mysql_query($Sql);
		  	
	}
//-------------------------------------------------------------------------------------
}

?>