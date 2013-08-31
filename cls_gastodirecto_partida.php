<?
require_once("conexion.php"); 

class GastoDirecto_Partida 
{
	private $id_gasto_directo = 0;
	private $id_meta = 0;
	private $id_partida = 0;
	private $vigencia = '000000';
	private $monto = 0;
	private $id_gastodirecto_partida = 0;
	
	public function getid_gasto_directo(){
		return $this->id_gasto_directo;
	}
	
	public function setid_gasto_directo($newval){
		$this->id_gasto_directo = $newval;
	}
	
	public function getid_meta(){
		return $this->id_meta;
	}
	
	public function setid_meta($newval){
		$this->id_meta=$newval;
	}
	
	public function getid_partida(){
		return $this->id_partida;
	}
	
	public function setid_partida($newval){
		$this->id_partida=$newval;
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

	public function getid_gastodirecto_partida(){
		return $this->id_gastodirecto_partida;
	}
	
	public function setid_gastodirecto_partida($newval){
		$this->id_gastodirecto_partida = $newval;
	}
//-------------------------------------------------------------------------------
	function __construct($clave_gastodirecto_partida = 0)
	{

		if($clave_gastodirecto_partida != 0)
		{
			$Sql = "SElECT * FROM gastodirecto_partida WHERE id_gastodirecto_partida = $clave_gastodirecto_partida";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->id_gasto_directo = $row[0];
				$this->id_meta = $row[1];
				$this->id_partida = $row[2];
				$this->vigencia = $row[3];
				$this->monto = $row[4];
				$this->id_gastodirecto_partida = $clave_gastodirecto_partida;

			}			
		}
	}

//-------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Departamento
	public function agregarGastoDirecto_Partida()
	{

		$Sql="INSERT INTO gastodirecto_partida (id_gasto_directo,id_meta,id_partida,vigencia,monto)  VALUES (".$this->id_gasto_directo.", '".$this->id_meta."', ".$this->id_partida.",'".$this->vigencia."', ".$this->monto.")";      
   		mysql_query($Sql); 

	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Departamento
	public function modificarGastoDirecto_Partida()
	{
  
		$Sql="UPDATE gastodirecto_partida SET id_gasto_directo=".$this->id_gasto_directo.", id_meta='".$this->id_meta."', id_partida=".$this->id_partida.", vigencia='".$this->vigencia."', monto=".$this->monto." WHERE id_gastodirecto_partida=".$this->id_gastodirecto_partida; 
  	 	
		mysql_query($Sql);
		  				
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Departamento
	public function eliminarGastoDirecto_Partida()
	{

   		$Sql="DELETE FROM gastodirecto_partida WHERE id_gastodirecto_partida =".$this->id_gastodirecto_partida;   
		
		mysql_query($Sql);
		    			
	}
//-------------------------------------------------------------------------------------
}
?>