<?
require_once("conexion.php");
require_once("cls_meta.php");


class Departamento 
{
	private $clave = 0;
	private $nombre = '';
	private $vigencia = '000000';
	private $monto = 0;
	private $periodo = '';
	private $id_departamento = 0;
	private $id_altadireccion = 0;
	private $poa=0;
	private $lst_meta = array();
	
	public function getpoa(){
		return $this->poa;
	}
	
	public function setpoa($newval){
		$this->poa = $newval;
	}
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
	
		public function getperiodo(){
		return $this->periodo;
	}
	
	public function setperiodo($newval){
		$this->periodo=$newval;
	}
	
	public function getid_altadireccion(){
		return $this->id_altadireccion;
	}
	
	public function setid_altadireccion($newval){
		$this->id_altadireccion=$newval;
	}

//-------------------------------------------------------------------------------
	function __construct($clave_departamento = 0, $perio='')
	{

		if ($perio=='')
			$perio=date('Y');
		if($clave_departamento != 0)
		{
			$Sql = "SElECT * FROM departamento WHERE clave = $clave_departamento";
					
			$ISql = mysql_query($Sql);
			$num = mysql_num_rows($ISql);
			if($num!=0)
			{
				$row = mysql_fetch_row($ISql);				
				$this->clave = $clave_departamento;				
				$this->nombre = $row[1];
				$this->vigencia = $row[2];
				$this->monto = $row[3];
				$this->periodo = $row[4];
				$this->id_departamento = $row[5];
				$this->id_altadireccion = $row[6]; 
				$this->poa = $row[7];
				
						//consulta para obtener las acciones q tiene una meta
				$cad="select clave from meta_departamento d join meta m on d.id_meta=m.id_meta where id_departamento=".$this->id_departamento." and d.periodo='".$perio."'";

				$res = mysql_query($cad);
				while($meta = mysql_fetch_array($res)){
					$this->lst_meta[] = new Meta($meta[0],$perio,$clave_departamento);
				}
			}	
		}
	}

//-------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------

//Se encarga de agregar los valores a la tabla Departamento
	public function agregarDepartamento()
	{

		$Sql="INSERT INTO departamento (clave,nombre,vigencia,monto,periodo,id_altadireccion,poa)  VALUES (".$this->clave.",'".$this->nombre."', '".$this->vigencia."', ".$this->monto.", '".$this->periodo."', ".$this->id_altadireccion.", ".$this->poa.")";      
   		mysql_query($Sql); 

	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Se encarga de modificar los valores de la tabla Departamento
	public function modificarDepartamento()
	{
  
		$Sql="UPDATE departamento SET clave = ".$this->clave.", nombre = '".$this->nombre."', vigencia = '".$this->vigencia."', monto = ".$this->monto.", periodo = '".$this->periodo."', id_altadireccion = ".$this->id_altadireccion.", poa = ".$this->poa." WHERE id_departamento = ".$this->id_departamento;
 		mysql_query($Sql);
		
	}
//------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------

//Elimina alguna tupla del Departamento
	public function eliminarDepartamento()
	{

   		$Sql="DELETE FROM departamento WHERE clave = ".$this->clave."";   
		
		mysql_query($Sql);
		    			
	}
//-------------------------------------------------------------------------------------
}
?>