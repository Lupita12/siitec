<?
require_once("../conexion.php"); 

class Marca
{
	private $clave=0;
	private $nombre='';
	private $descripcion='';
	private $id_marca=0;
	

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

	function __construct($clave_marca = 0)
	{

		if($clave_marca != 0)
		{
			$Sql = "SElECT * FROM marca WHERE clave = $clave_marca";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->clave=$clave_marca;				
				$this->nombre=$row[1];
				$this->descripcion=$row[2];
				$this->id_marca=$row[3];
			}	
		}
	}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Encargado


	public function agregarMarca()
	{

		$Sql="INSERT INTO marca (clave,nombre,descripcion)  VALUES (".$this->clave.",'".$this->nombre."', '".$this->descripcion."')";      
   		mysql_query($Sql); 
	  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Encargado	
	public function modificarMarca()
	{
  
		$Sql="UPDATE marca SET clave=".$this->clave.", nombre='".$this->nombre."', descripcion='".$this->descripcion."' WHERE id_marca=".$this->id_marca.""; 
  	 	
		mysql_query($Sql); 
  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Encargado	
	public function eliminarMarca()
	{

   		$Sql="DELETE FROM marca WHERE clave = ".$this->clave."";   
		
		mysql_query($Sql);
		  	
	}
//-------------------------------------------------------------------------------------
}

?>