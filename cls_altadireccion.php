<?
require_once("cls_departamento.php"); 
require_once("conexion.php"); 

class AltaDireccion 
{
	private $clave = '';
	private $nombre = '';
	private $vigencia = '000000';
	private $monto = 0;
	private $gasto_propio = 0;
	private $periodo = '';
	private $id_altadireccion = 0;
	
	private $lst_departamento = array();

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
	
	public function getgasto_propio(){
		return $this->gasto_propio;
	}
	
	public function setgasto_propio($newval){
		$this->gasto_propio=$newval;
	}

	
	public function getperiodo(){
		return $this->periodo;
	}
	
	public function setperiodo($newval){
		$this->periodo=$newval;
	}
	
		public function getlst_departamento(){
		return $this->lst_departamento;
	}
	
	public function setlst_departamento($newval){
		$this->lst_departamento=$newval;
	}


//-------------------------------------------------------------------------------
	function __construct($clave_altadireccion = 0, $perio='')
	{

		if ($perio=='')
			$perio=date('Y');
		if($clave_altadireccion != 0)
		{
			$Sql = "SElECT * FROM altadireccion WHERE clave = $clave_altadireccion";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);
				$this->clave =$clave_altadireccion;				
				$this->nombre = $row[1];
				$this->vigencia = $row[2];
				$this->monto = $row[3];
				$this->gasto_propio = $row[4];
				$this->periodo = $row[5];
				$this->id_altadireccion = $row[6];

				//consulta para obtener los departamentos  q tiene altadireccion
				$cad="select clave from departamento where id_altadireccion=".$this->id_altadireccion;
				$res = mysql_query($cad);
				$i = 0;
				while($departamento = mysql_fetch_array($res))
				{
					$this->lst_departamento[$i] = new Departamento($departamento[0]);
					$i++;
				}							
				
			}
				
		}
	}

//-------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Departamento
	public function agregarAltaDireccion()
	{

		$Sql="INSERT INTO altadireccion (clave,nombre,vigencia,monto,gasto_propio,periodo)  VALUES ('".$this->clave."','".$this->nombre."', '".$this->vigencia."', ".$this->monto.", ".$this->gasto_propio.", '".$this->periodo."')";      
   		mysql_query($Sql); 
		
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Departamento
	public function modificarAltaDireccion()
	{
  
		$Sql="UPDATE altadireccion SET clave = '".$this->clave."', nombre = '".$this->nombre."', vigencia = '".$this->vigencia."', monto = ".$this->monto.", gasto_propio = ".$this->gasto_propio.", periodo = '".$this->periodo."' WHERE id_altadireccion = ".$this->id_altadireccion;
	
		
		mysql_query($Sql);
		  				
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Departamento
	public function eliminarAltaDireccion()
	{

   		$Sql="DELETE FROM altadireccion WHERE clave ='".$this->clave."'";   
		
		mysql_query($Sql);
		    			
	}
//-------------------------------------------------------------------------------------
}
?>