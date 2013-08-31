<?
//require_once("conexion.php");
class periodo 
{
	private $periodo = 0;
	private $id_periodo = 0;
	
	
	
	
	
	
	////////////////////////////////////////////// contructor
	
	function __construct($peri = 0)
	{

		if($peri != 0)
		{
			$Sql = "SElECT * FROM periodo WHERE periodo = $peri";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);				
				$this->periodo = $peri ;				
				$this->id_periodo = $row[1];
				
				
						
			}	
		}
	}
	
	
	//Se encarga de agregar los valores a la tabla periodo
	public function agregar()
	{
$conexion_p= mysql_connect("localhost","root","root") ;
	mysql_select_db("periodo",$conexion_p);


		$Sql="INSERT INTO periodo (periodo,id_periodo)  VALUES (".$this->periodo.", ".$this->id_periodo.")";      
   		mysql_query($Sql); 

	}
//------------------------------------------------------------------------------------
	
	//Se encarga de modificar los valores de la tabla periodo
/*	public function modificar()
	{
  
		$Sql="UPDATE periodo SET  periodo = '".$this->periodo."', id_periodo = ".$this->id_periodo."";
 		mysql_query($Sql);
		
	}
	
	
	*/
//Elimina alguna tupla del Departamento
	
	
	public function eliminar()
	{
	
		
		
		$que = "DELETE from periodo 
	  		  WHERE id_periodo = ".$this->id_periodo."  " ; 
				  
	   $res = mysql_query($que);
		
		
	}
	
	////////////////////////////////
	
	public function getperiodo(){
		return $this->periodo;
	}
	
	public function setperiodo($newval){
		$this->periodo=$newval;
	}
	
	
	
	
	public function getid_periodo()
	{
		return $this->id_periodo;
	}
	
	public function setid_periodo($newval)
	{
		$this->id_periodo=$newval;
	}
	
	
	
}



?>