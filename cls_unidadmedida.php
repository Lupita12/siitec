<?
require_once("conexion.php"); 

class UnidadMedida
{
	private $clave;
	private $nombre;
	private $descripcion;
	

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
	
//------------------------------------------------------------------------------	


//-------------------------------------------------------------------------------

	function __construct($clave_unidadmedida = 0)
	{

		if($clave_unidadmedida != 0)
		{
			$Sql = "SElECT * FROM unidadmedida WHERE clave = $clave_unidadmedida";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->setclave($clave_unidadmedida);				
				$this->setnombre($row[1]);
				$this->setdescripcion($row[2]);
			}	
		}
	}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------

	public function mostrarUnidadMedida()
	{
		echo $this->clave;
			echo "<br>";
		echo $this->nombre;	
			echo "<br>";
		echo $this->descripcion;
			echo "<br>";	
	}

//-----------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Encargado


	public function agregarUnidadMedida()
	{

		$Sql="INSERT INTO unidadmedida (clave,nombre,descripcion)  VALUES (".clave.",'".nombre."', '".descripcion."')";      
   		mysql_query($Sql); 
	  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Encargado	
	public function modificarUnidadMedida()
	{
  
		$Sql="UPDATE unidadmedida SET clave=".clave.", nombre='".nombre."', descripcion='".descripcion."' WHERE clave=".clave.""; 
  	 	
		mysql_query($Sql); 
  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Encargado	
	public function eliminarMarca()
	{

   		$Sql="DELETE FROM unidadmedida WHERE clave = ".clave."";   
		
		mysql_query($Sql);
		  	
	}
//-------------------------------------------------------------------------------------
}

?>