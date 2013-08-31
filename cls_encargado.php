<?
require_once("conexion.php"); 

class encargado
{
	private $clave = '';
	private $nombre = '';
	private $firma = '';
	private $tipo = '';
	private $periodo='';
	private $id_departamento =0;
	private $id_encargado = 0;
	
	

	
//-------------------------------------------------------------------------------

	function __construct($clave_encargado = 0, $perio='')
	{

		if ($perio=='')
			$perio=date('Y');
		if($clave_encargado != 0)
		{
			$Sql = "SElECT * FROM encargado WHERE clave = $clave_encargado";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->clave = $clave_encargado;				
				$this->nombre = $row[1];
				$this->firma = $row[2];
				$this->tipo = $row[3];
				$this->periodo = $row[4];
				$this->id_departamento = $row[5];
				$this->id_encargado = $row[6];
				
			}	
		}
	}
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------

	/* public function mostrarEncargado()
	{
		echo $this->clave;
			echo "<br>";
		echo $this->nombre;	
			echo "<br>";
		echo $this->periodo;
			echo "<br>";	
	}
*/
//-----------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Encargado
/*

	public function agregar()
	{

		$Sql="INSERT INTO encargado (clave,nombre,firma,tipo,periodo,id_encargado,id_departamento)  VALUES ('".$this->clave."','".$this->nombre."', '".$this->firma."','".$this->tipo."','".$this->periodo."',".$this->id_encargado.",".$this->id_departamento.")";      
   		mysql_query($Sql); 
	  
	} 
	*/
//------------------------------------------------------------------------------------
// PRUEBAAAAAAAA

public function agregar()
	{

		$Sql="INSERT INTO encargado (clave,nombre,firma,tipo,periodo,id_departamento,id_encargado)  VALUES ('".$this->clave."','".$this->nombre."', '".$this->firma."', '".$this->tipo."', '".$this->periodo."', ".$this->id_departamento.", ".$this->id_encargado.")";      
   		mysql_query($Sql); 

	}


//////////////////////////////////////////

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Encargado	
	public function modificar()
	{
  
		$Sql="UPDATE encargado SET clave='".$this->clave."', nombre='".$this->nombre."', firma='".$this->firma."', tipo ='".$this->tipo."',periodo='".$this->periodo."',id_encargado=".$this->id_encargado.",id_encargado=".$this->id_encargado." WHERE id_encargado=".$this->id_encargado; 
  	 	
		mysql_query($Sql); 
  
	}
	
	
/////////////////////// PRUEBA



//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Encargado	
	public function eliminar()
	{

   		$Sql="DELETE FROM encargado WHERE clave = '".$this->clave."'";   
		
		mysql_query($Sql);
		  	
	}
//-------------------------------------------------------------------------------------


//-----
	public function getclave()
	{
			return $this->clave;
	}
	
	
	public function setclave($newval)
	{
	
	 		 $this->clave = $newval;
	}		



//-----
	public function getnombre()
	{
			return $this->nombre;
	}
	
	
	public function setnombre($newval)
	{
	
	 		 $this->nombre = $newval;
	}		
	

//-----
	public function getfirma()
	{
			return $this->firma;
	}
	
	
	public function setfirma($newval)
	{
	
	 		 $this->firma = $newval;
	}		


//-----
	public function gettipo()
	{
			return $this->tipo;
	}
	
	
	public function settipo($newval)
	{
	
	 		 $this->tipo = $newval;
	}		
	
	
//-----
	public function getperiodo()
	{
			return $this->periodo;
	}
	
	
	public function setperiodo($newval)
	{
	
	 		 $this->periodo = $newval;
	}		


//-----
	public function getid_departamento()
	{
			return $this->id_departamento;
	}
	
	
	public function setid_departamento($newval)
	{
	
	 		 $this->id_departamento = $newval;
	}		



//-----
	public function getid_encargado()
	{
			return $this->id_encargado;
	}
	
	
	public function setid_encargado($newval)
	{
	
	 		 $this->id_encargado = $newval;
	}	










}

?>