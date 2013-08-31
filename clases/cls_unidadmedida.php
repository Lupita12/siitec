<?
require_once("../conexion.php"); 

class UnidadMedida
{
	private $clave=0;
	private $nombre='';
	private $descripcion='';
	private $id_unidadmedida=0;
	

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
				$this->clave=$clave_unidadmedida;				
				$this->nombre=$row[1];
				$this->descripcion=$row[2];
				$this->id_unidadmedida=$row[3];
			}	
		}
	}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Encargado


	public function agregarUnidadMedida()
	{

		$Sql="INSERT INTO unidadmedida (clave,nombre,descripcion)  VALUES (".$this->clave.",'".$this->nombre."', '".$this->descripcion."')";      
   		mysql_query($Sql); 
	  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Encargado	
	public function modificarUnidadMedida()
	{
  
		$Sql="UPDATE unidadmedida SET clave=".$this->clave.", nombre='".$this->nombre."', descripcion='".$this->descripcion."' WHERE id_unidadmedida=".$this->id_unidadmedida.""; 
  	 	
		mysql_query($Sql); 
  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Encargado	
	public function eliminarUnidadMedida()
	{

   		$Sql="DELETE FROM unidadmedida WHERE clave = ".$this->clave."";   
		
		mysql_query($Sql);
		  	
	}
//-------------------------------------------------------------------------------------
}

?>