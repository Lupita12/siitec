<?
require_once("conexion.php"); 

class GastoDirecto 
{
	private $clave = '';
	private $nombre = '';
	private $descripcion = '';
	private $vigencia = '000000';
	private $monto = 0;
	private $fecha_inicial = '';
	private $fecha_final = '';
	private $id_gastodirecto = 0;
	private $fecha_expedicion = '000000';
	private $fecha_recibido = '000000';
	

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
	
	public function getfecha_inicial(){
		return $this->fecha_inicial;
	}
	
	public function setfecha_inicial($newval){
		$this->fecha_inicial=$newval;
	}

	
	public function getfecha_final(){
		return $this->fecha_final;
	}
	
	public function setfecha_final($newval){
		$this->fecha_final=$newval;
	}
	
	
	
	public function getfecha_expedicion(){
		return $this->fecha_expedicion;
	}
	
	public function setfecha_expedicion($newval){
		$this->fecha_expedicion=$newval;
	}
	
	public function getfecha_recibido(){
		return $this->fecha_recibido;
	}
	
	public function setfecha_recibido($newval){
		$this->fecha_recibido=$newval;
	}

//-------------------------------------------------------------------------------
	function __construct($clave_gastodirecto = '')
	{

		if($clave_gastodirecto != '')
		{
		
			$Sql = "SElECT * FROM gastodirecto WHERE clave = '$clave_gastodirecto'";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->clave = $clave_gastodirecto;				
				$this->nombre = $row[1];
				$this->descripcion = $row[2];
				$this->vigencia = $row[3];
				$this->monto = $row[4];
				$this->fecha_inicial = $row[5];
				$this->fecha_final = $row[6];
				$this->id_gastodirecto = $row[7];
				$this->fecha_expedicion = $row[8];
				$this->fecha_recibido = $row[9];

			}	
		}
	}

//-------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Departamento
	public function agregarGastoDirecto()
	{

		$Sql="INSERT INTO gastodirecto (clave,nombre,descripcion,vigencia,monto,fecha_inicial,fecha_final,fecha_expedicion, fecha_recibido)  VALUES ('".$this->clave."', '".$this->nombre."', '".$this->descripcion."', '".$this->vigencia."', ".$this->monto.", '".$this->fecha_inicial."', '".$this->fecha_final."', '".$this->fecha_expedicion."', '".$this->fecha_recibido."')";      
   		mysql_query($Sql); 
		//echo $Sql;
		
		
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Departamento
	public function modificarGastoDirecto()
	{
  
		$Sql="UPDATE gastodirecto SET clave='".$this->clave."', nombre='".$this->nombre."', descripcion='".$this->descripcion."', vigencia='".$this->vigencia."', monto=".$this->monto.", fecha_inicial='".$this->fecha_inicial."', fecha_final='".$this->fecha_final."', fecha_expedicion='".$this->fecha_expedicion."', fecha_recibido='".$this->fecha_recibido."' WHERE id_gastodirecto=".$this->id_gastodirecto; 
  	 	
		mysql_query($Sql);

		  				
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Departamento
	public function eliminarGastoDirecto()
	{

   		$Sql="DELETE FROM gastodirecto WHERE clave =".$this->clave;   
		
		mysql_query($Sql);
		    			
	}
//-------------------------------------------------------------------------------------
}
?>