<?
require_once("../conexion.php"); 

class Articulo_Clasificacion
{

	private $id_clasificacion=0;
	private $id_articulo=0;

	public function getid_clasificacion(){
		return $this->id_clasificacion;
	}
	
	public function setid_clasificacion($newval){
		$this->id_clasificacion = $newval;
	}
	
	public function getid_articulo(){
		return $this->id_articulo;
	}
	
	public function setid_articulo($newval){
		$this->id_articulo=$newval;
	}
	
		
//------------------------------------------------------------------------------	


//-------------------------------------------------------------------------------

	function __construct($id_articulo = 0,$id_clasificacion = 0)
	{

		if($id_articulo != 0 && id_clasificacion != 0)
		{
			$Sql = "SElECT * FROM articulo_clasificacion WHERE id_articulo = $id_articulo and id_clasificacion = $id_clasificacion" ;
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->id_articulo=$id_articulo;				
				$this->id_clasificacion=$row[1];
			}	
		}
	}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Encargado


	public function agregaArticuloClasificacion()
	{

		$Sql="INSERT INTO articulo_clasificacion (id_articulo,id_clasificacion)  VALUES (".$this->id_articulo.",".$this->id_clasificacion.")";      
   		mysql_query($Sql); 
	  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Encargado	
	public function modificarArticuloClasificacion()
	{
  
		$Sql="UPDATE articulo_clasificacion SET id_articulo=".$this->id_articulo.", id_clasificacion='".$this->id_clasificacion." WHERE id_articulo=".$this->id_articulo." and id_clasificacion=".$this->id_clasificacion; 
  	 	
		mysql_query($Sql); 
  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Encargado	
	public function eliminarArticuloClasificacion()
	{

   		$Sql="DELETE FROM articulo_clasificacion WHERE id_articulo=".$this->id_articulo." and id_clasificacion=".$this->id_clasificacion;
		
		mysql_query($Sql);
		  	
	}
//-------------------------------------------------------------------------------------
}

?>