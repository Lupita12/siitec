<?
require_once("../conexion.php"); 

class Articulo_Unidadmedida
{

	private $id_unidadmedida=0;
	private $id_articulo=0;

	public function getid_unidadmedida(){
		return $this->id_unidadmedida;
	}
	
	public function setid_unidadmedida($newval){
		$this->id_unidadmedida = $newval;
	}
	
	public function getid_articulo(){
		return $this->id_articulo;
	}
	
	public function setid_articulo($newval){
		$this->id_articulo=$newval;
	}
	
		
//------------------------------------------------------------------------------	


//-------------------------------------------------------------------------------

	function __construct($id_articulo = 0,$id_unidadmedida = 0)
	{

		if($id_articulo != 0 && id_unidadmedida != 0 )
		{
			$Sql = "SElECT * FROM articulo_unidadmedida WHERE id_articulo = $id_articulo and id_unidadmedida = $id_unidadmedida" ;
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->id_articulo=$id_articulo;				
				$this->id_unidadmedida=$row[1];
			}	
		}
	}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Encargado


	public function agregaArticuloUnidadmedida()
	{

		$Sql="INSERT INTO articulo_unidadmedida (id_articulo,id_unidadmedida)  VALUES (".$this->id_articulo.",".$this->id_unidadmedida.")";      
   		mysql_query($Sql); 
	  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Encargado	
	public function modificarArticuloUnidadmedida()
	{
  
		$Sql="UPDATE articulo_unidadmedida SET id_articulo=".$this->id_articulo.", id_unidadmedida='".$this->id_unidadmedida." WHERE id_articulo=".$this->id_articulo." and id_unidadmedida=".$this->id_unidadmedida; 
  	 	
		mysql_query($Sql); 
  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Encargado	
	public function eliminarArticuloUnidadmedida()
	{

   		$Sql="DELETE FROM articulo_unidadmedida WHERE id_articulo=".$this->id_articulo." and id_unidadmedida=".$this->id_unidadmedida;
		
		mysql_query($Sql);
		  	
	}
//-------------------------------------------------------------------------------------
}

?>