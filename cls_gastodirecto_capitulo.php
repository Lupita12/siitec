<?
require_once("conexion.php"); 

class GastoDirecto_Capitulo 
{
	private $id_gasto_directo = '';
	private $id_meta = 0;
	private $id_capitulo = 0;
	private $vigencia = '000000';
	private $monto = 0;
	private $id_gastodirecto_capitulo = 0;
	private $id_accion = 0;
	private $id_departamento = 0;
	private $id_partida = 0;
	private $gastado = 0;
	private $comprometido = 0;
	
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
	
	public function getid_capitulo(){
		return $this->id_capitulo;
	}
	
	public function setid_capitulo($newval){
		$this->id_capitulo=$newval;
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

	public function getid_gastodirecto_capitulo(){
		return $this->id_gastodirecto_capitulo;
	}
	
	public function setid_gastodirecto_capitulo($newval){
		$this->id_gastodirecto_capitulo = $newval;
	}
		public function getid_accion(){
		return $this->id_accion;
	}
	
	public function setid_accion($newval){
		$this->id_accion=$newval;
	}
	
	
		public function getid_departamento(){
		return $this->id_departamento;
	}
	
	public function setid_departamento($newval){
		$this->id_departamento = $newval;
	}
	
	
	
	
	
	public function getid_partida(){
		return $this->id_partida;
	}
	
	public function setid_partida($newval){
		$this->id_partida = $newval;
	}
	public function getgastado(){
		return $this->gastado;
	}
	
	public function setgastado($newval){
		$this->gastado = $newval;
	}
	public function getcomprometido(){
		return $this->comprometido;
	}
	
	public function setid_comprometido($newval){
		$this->comprometido= $newval;
	}
//-------------------------------------------------------------------------------
	function __construct($clave_gastodirecto_capitulo = 0)
	{

		if($clave_gastodirecto_capitulo != 0)
		{
			$Sql = "SElECT * FROM gastodirecto_capitulo WHERE id_gastodirecto_capitulo = $clave_gastodirecto_capitulo";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->id_gasto_directo = $row[0];
				$this->id_meta = $row[1];
				$this->id_capitulo = $row[2];
				$this->vigencia = $row[3];
				$this->monto = $row[4];
				$this->id_gastodirecto_capitulo = $clave_gastodirecto_capitulo;
				$this->id_accion = $row[6];
				$this->id_departamento = $row[7];
				$this->id_partida = $row[8];
				$this->gastado = $row[9];
				$this->comprometido = $row[10];

			}	
		}
	}

//-------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Departamento
	public function agregarGastoDirecto_Capitulo()
	{

		$Sql="INSERT INTO gastodirecto_capitulo (id_gasto_directo,id_meta,id_capitulo,vigencia,monto,id_accion,id_departamento,id_partida,gastado,comprometido)  VALUES ('".$this->id_gasto_directo."',".$this->id_meta.",".$this->id_capitulo.",'".$this->vigencia."',".$this->monto.", ".$this->id_accion.", ".$this->id_departamento.", ".$this->id_partida.", ".$this->gastado.", ".$this->comprometido.")";      
   		mysql_query($Sql); 
		
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Departamento
	public function modificarGastoDirecto_Capitulo()
	{
  
		$Sql="UPDATE gastodirecto_capitulo SET id_gasto_directo='".$this->id_gasto_directo."', id_meta=".$this->id_meta.",  id_capitulo=".$this->id_capitulo.", vigencia='".$this->vigencia."', monto=".$this->monto.", id_accion=".$this->id_accion.", id_departamento=".$this->id_departamento.", id_partida=".$this->id_partida.", gastado=".$this->gastado.", id_departamento=".$this->comprometido." WHERE id_gastodirecto_capitulo=".$this->id_gastodirecto_capitulo; 
  	 	
		mysql_query($Sql);	
		  				
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Departamento
	public function eliminarGastoDirecto_Capitulo()
	{

   		$Sql="DELETE FROM gastodirecto_capitulo WHERE id_gastodirecto_capitulo =".$this->id_gastodirecto_capitulo."";   
		
		mysql_query($Sql);
		    			
	}
//-------------------------------------------------------------------------------------
}
?>