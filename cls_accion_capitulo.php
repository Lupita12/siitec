<?
 require_once ("conexion.php"); 

class Accion_Capitulo 
{
	private $id_accion = 0;
	private $id_capitulo = 0;
	private $porcentaje = 0;
	private $enero_junio = 0;
	private $julio_diciembre = 0;
	private $porcentaje_enero_junio = 0;
//	private $id_accion_capitulo = 0;
	
	public function getid_accion(){
		return $this->id_accion;
	}
	
	public function setid_accion($newval){
		$this->id_accion = $newval;
	}
	
	public function getid_capitulo(){
		return $this->id_capitulo;
	}
	
	public function setid_capitulo($newval){
		$this->id_capitulo=$newval;
	}
	
	public function getporcentaje(){
		return $this->porcentaje;
	}
	
	public function setporcentaje($newval){
		$this->porcentaje=$newval;
	}
	
	public function getenero_junio(){
		return $this->enero_junio;
	}
	
	public function setenero_junio($newval){
		$this->enero_junio=$newval;
	}
	public function getjulio_diciembre(){
		return $this->julio_diciembre;
	}
	
	public function setjulio_diciembre($newval){
		$this->julio_diciembre=$newval;
	}
	
	public function getporcentaje_enero_junio(){
		return $this->porcentaje_enero_junio;
	}
	
	public function setporcentaje_enero_junio($newval){
		$this->porcentaje_enero_junio=$newval;
	}

//-------------------------------------------------------------------------------
	function __construct($id_accion = 0, $id_capitulo=0)
	{

		if($id_accion != 0 && $id_capitulo !=0 )
		{
			$Sql = "SElECT * FROM accion_capitulo WHERE id_accion = $id_accion AND id_capitulo = $id_capitulo";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->id_accion = $id_accion;
				$this->id_capitulo = $id_capitulo;
				$this->porcentaje = $row[2];
				$this->enero_junio = $row[3];
				$this->julio_diciembre = $row[4];
				$this->porcentaje_enero_junio = $row[5];
				//$this->id_accion_capitulo = $id_accion_capitulo;
				
			}	
		}
	}

//-------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Departamento
	public function agregarAccion_Capitulo()
	{

		$Sql="INSERT INTO accion_capitulo (id_accion,id_capitulo,porcentaje,enero_junio,julio_diciembre,porcentaje_enero_junio)  VALUES (".$this->id_accion.",".$this->id_capitulo.",".$this->porcentaje.",".$this->enero_junio.",".$this->julio_diciembre.",".$this->porcentaje_enero_junio.")";      
   		mysql_query($Sql); 
		
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Departamento
	public function modificarAccion_Capitulo()
	{
  
		$Sql="UPDATE accion_capitulo SET id_accion=".$this->id_accion.", id_capitulo=".$this->id_capitulo.",  porcentaje=".$this->porcentaje.", enero_junio=".$this->enero_junio.", julio_diciembre=".$this->julio_diciembre.", porcentaje_enero_junio=".$this->porcentaje_enero_junio." WHERE id_accion=".$this->id_accion." AND id_capitulo =".$this->id_capitulo; 
  	 	
		mysql_query($Sql);	
		  				
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Departamento
	public function eliminarAccion_Capitulo()
	{

   		$Sql="DELETE FROM accion_capitulo WHERE id_accion=".$this->id_accion." AND id_capitulo =".$this->id_capitulo;   
		
		mysql_query($Sql);
		    			
	}
//-------------------------------------------------------------------------------------
}
?>