<?
require_once("conexion.php"); 

class TipoArticulo
{
	private $clave;
	private $descripcion;
	

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
				$this->setclave($clave_tipoarticulo);				
				$this->setdescripcion($row[1]);
			}	
		}
	}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------

	public function mostrarTipoArticulo()
	{
		echo $this->clave;
			echo "<br>";
		echo $this->descripcion;
			echo "<br>";	
	}

//-----------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Encargado


	public function agregarTipoArticulo()
	{

		$Sql="INSERT INTO unidadmedida (clave,descripcion)  VALUES ('".clave."', '".descripcion."')";      
   		mysql_query($Sql); 
	  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Encargado	
	public function modificarTipoArticulo()
	{
  
		$Sql="UPDATE tipoarticulo SET clave='".clave."', descripcion='".descripcion."' WHERE clave='".clave."'"; 
  	 	
		mysql_query($Sql); 
  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Encargado	
	public function eliminarTipoArticulo()
	{

   		$Sql="DELETE FROM tipoarticulo WHERE clave = '".clave."'";   
		
		mysql_query($Sql);
		  	
	}
//-------------------------------------------------------------------------------------
}

?>