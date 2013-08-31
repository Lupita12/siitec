<?
require_once("../conexion.php"); 

class Articulo_Marca
{

	private $id_marca=0;
	private $id_articulo=0;

	public function getid_marca(){
		return $this->id_marca;
	}
	
	public function setid_marca($newval){
		$this->id_marca = $newval;
	}
	
	public function getid_articulo(){
		return $this->id_articulo;
	}
	
	public function setid_articulo($newval){
		$this->id_articulo=$newval;
	}
	
		
//------------------------------------------------------------------------------	


//-------------------------------------------------------------------------------

	function __construct($id_articulo = 0,$id_marca = 0)
	{

		if($id_articulo != 0 && id_marca != 0 )
		{
			$Sql = "SElECT * FROM articulo_marca WHERE id_articulo = $id_articulo and id_marca = $id_marca" ;
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->id_articulo=$id_articulo;				
				$this->id_marca=$row[1];
			}	
		}
	}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Encargado


	public function agregaArticuloMarca()
	{

		$Sql="INSERT INTO articulo_marca (id_articulo,id_marca)  VALUES (".$this->id_articulo.",".$this->id_marca.")";      
   		mysql_query($Sql); 
	  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Encargado	
	public function modificarArticuloMarca()
	{
  
		$Sql="UPDATE articulo_marca SET id_articulo=".$this->id_articulo.", id_marca='".$this->id_marca." WHERE id_articulo=".$this->id_articulo." and id_marca=".$this->id_marca; 
  	 	
		mysql_query($Sql); 
  
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Encargado	
	public function eliminarArticuloMarca()
	{

   		$Sql="DELETE FROM articulo_marca WHERE id_articulo=".$this->id_articulo." and id_marca=".$this->id_marca;
		
		mysql_query($Sql);
		  	
	}
//-------------------------------------------------------------------------------------
}

?>