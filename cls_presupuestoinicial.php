<?
require_once("conexion.php"); 

class PresupuestoInicial
{
	private $clave;
	private $vigencia;
	private $monto;
	private $periodo;
	

	public function getclave(){
		return $this->clave;
	}
	
	public function setclave($newval){
		$this->clave = $newval;
	}
	
	public function getvigencia(){
		return $this->vigencia;
	}
	
	public function setvigencia($newval){
		$this->vigencia=$newval;
	}
	
	public function getmonto(){
		return $this->monto;
	}
	
	public function setmonto($newval){
		$this->monto=$newval;
	}
	
	public function getperiodo(){
		return $this->periodo;
	}
	
	public function setperiodo($newval){
		$this->periodo=$newval;
	}

//-------------------------------------------------------------------------------
	function __construct($clave_presupuestoinicial = 0, $perio='')
	{
		if ($perio=='')
			$perio=date('Y');
		if($clave_presupuestoinicial != 0)
		{

			$Sql = "SElECT * FROM presupuestoinicial WHERE clave = $clave_presupuestoinicial";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->setclave($clave_presupuestoinicial);				
				$this->setvigencia($row[1]);
				$this->setmonto($row[2]);
				$this->setperiodo($row[3]);
			}	
		}
	}

//-------------------------------------------------------------------------------


//-------------------------------------------------------------------------------
	public function mostrarPresupuestoInicial()
	{
		echo $this->clave;
			echo "<br>";	
		echo $this->vigencia;
			echo "null<br>";
		echo $this->monto;
			echo "<br>";
		echo $this->periodo;
			echo "<br>";	
	}

//-------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Departamento
	public function agregarPresupuestoInicial()
	{

		$Sql="INSERT INTO presupuestoinicial (vigencia,monto,periodo)  VALUES ('".$this->vigencia."', ".$this->monto.", '".$this->periodo."')";      
   		mysql_query($Sql); 
		
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Departamento
	public function modificarPresupuestoInicial()
	{
		
		$Sql="UPDATE presupuestoinicial SET clave=".$this->clave.", vigencia='".$this->vigencia."', monto=".$this->monto.", periodo='".$this->periodo."' WHERE clave=".$this->clave; 
  	 	
		mysql_query($Sql);
		
		  				
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Departamento
	public function eliminarPresupuestoInicial()
	{

   		$Sql="DELETE FROM presupuestoinicial WHERE clave =".$this->clave;   
		
		mysql_query($Sql);
		    			
	}
//-------------------------------------------------------------------------------------
}
?>