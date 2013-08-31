<?
require_once("../conexion.php"); 

class TipoArticulo
{
	private $clave='';
	private $descripcion='';
	private $id_tipoarticulo=0;

	public function getclave(){
		return $this->clave;
	}
	
	public function setclave($newval){
		$this->clave = $newval;
	}
	
	public function getdescripcion(){
		return $this->descripcion;
	}
	
	public function setdescripcion($newval){
		$this->descripcion=$newval;
	}
	
//------------------------------------------------------------------------------	


//-------------------------------------------------------------------------------

	function __construct($clave_tipoarticulo = 0)
	{

		if($clave_tipoarticulo != 0)
		{
			$Sql = "SElECT * FROM tipoarticulo WHERE clave = $clave_tipoarticulo";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->clave=$clave_tipoarticulo;				
				$this->descripcion=$row[1];
				$this->id_tipoarticulo=$row[2];
			}	
		}
	}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Encargado


	public function agregarTipoArticulo()
	{

		$Sql="INSERT INTO tipoarticulo (clave,descripcion)  VALUES ('".$this->clave."', '".$this->descripcion."')";      
   		mysql_query($Sql); 
	  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Encargado	
	public function modificarTipoArticulo()
	{
  
		$Sql="UPDATE tipoarticulo SET clave='".$this->clave."', descripcion='".$this->descripcion."' WHERE id_tipoarticulo='".$this->id_tipoarticulo."'"; 
  	 	
		mysql_query($Sql); 
  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Encargado	
	public function eliminarTipoArticulo()
	{

   		$Sql="DELETE FROM tipoarticulo WHERE clave = '".$this->clave."'";   
		
		mysql_query($Sql);
		  	
	}
//-------------------------------------------------------------------------------------
}

?>