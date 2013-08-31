<?
include("../conexion.php"); 
class Proveedor
{
  	private $clave = 0;
	private $nombre_proveedor = '';
	private $rfc = '';
	private $domicilio = '';
	private $ciudad = '';
	private $numero_tel = '';
	private $numero_fax = '';
	private $actividad_comercial = '';
	private $correo_electronico ='';
	private $fecha = '';
	private $estatus =0;
	private $id_proveedor= 0;
	
	
	
	
	function __construct($cve_proveedor = 0)
	{
			
			if ($cve_proveedor != 0)
			{
						
				$cadena_sql = mysql_query("select * from proveedor where clave = " .$cve_proveedor. " "); 	
				$num = mysql_num_rows($cadena_sql);
				if($num!=0)
				{
					$resu = mysql_fetch_row($cadena_sql);
					
					$this->clave=$cve_proveedor;
					$this->nombre_proveedor=$resu[1];
					$this->rfc=$resu[2];
					$this->domicilio=$resu[3];
					$this->numero_tel=$resu[4];
					$this->numero_fax=$resu[5];
					$this->actividad_comercial=$resu[6];
					$this->correo_electronico=$resu[7];
					$this->fecha=$resu[8];
					$this->ciudad=$resu[9];
					$this->estatus=$resu[10];
					$this->id_proveedor=$resu[11];
										
				}
			
			}	
	
	}


	public function getclave(){
		return $this->clave;
	}
	public function setclave($newval){
		$this->clave = $newval;
	}
	
	public function getnombre_proveedor(){
		return $this->nombre_proveedor;
	}
	public function setnombre_proveedor($newval){
		$this->nombre_proveedor = $newval;
	}
	
	
	public function getrfc(){
		return $this->rfc;
	}
	public function setrfc($newval){
		$this->rfc = $newval;
	}
	
	public function getdomicilio(){
		return $this->domicilio;
	}
	
	public function setdomicilio($newval){
		$this->domicilio = $newval;
	}

	
	public function getnumero_tel(){
		return $this->numero_tel;
	}
	
	public function setnumero_tel($newval){
		$this->numero_tel= $newval;
	}

	
	
	public function getnumero_fax(){
		return $this->numero_fax;
	}
	
	public function setnumero_fax($newval){
		$this->numero_fax = $newval;
	}

	
	public function getcorreo_electronico(){
		return $this->correo_electronico;
	}
	
	public function setcorreo_electronico($newval){
		$this->correo_electronico= $newval;
	}
	
	
	
	public function getactividad_comercial(){
		return $this->actividad_comercial;
	}
	
	public function setactividad_comercial($newval){
		$this->actividad_comercial= $newval;
	}


	
	public function getfecha(){
		return $this->fecha;
	}
	
	public function setfecha($newval){
		$this->fecha = $newval;
	}

	
	public function getciudad(){
		return $this->ciudad;
	}
	
	public function setciudad($newval){
		$this->ciudad= $newval;
	}
	
	public function getestatus(){
		return $this->estatus;
	}
	
	public function setestatus($newval){
		$this->estatus = $newval;
	}

	public function getid_proveedor(){
		return $this->id_proveedor;
	}
	
	public function setid_proveedor($newval){
		$this->id_proveedor = $newval;
	}

//Agregar

public function agregar(){
	
	$que = mysql_query  ("INSERT INTO proveedor (clave, nombre_proveedor, rfc, domicilio, telefono, fax, actividades_comerciales,correo_electronico, fecha, ciudad, estatus) VALUES (".$this->clave.",'".$this->nombre_proveedor."', '".$this->rfc."','".$this->domicilio."','".$this->numero_tel."','".$this->numero_fax."','".$this->actividad_comercial."','".$this->correo_electronico."','".$this->fecha."', '".$this->ciudad."', ".$this->estatus.")");	
	    	    
				
	   $res = mysql_query($que);			
}


//Modificar

public function Modifica(){
	$que = "UPDATE proveedor SET estatus= ".$this->estatus."
			WHERE id_proveedor = ".$this->id_proveedor."";
		$res = mysql_query($que);
}



//Eliminar
public function Elimina(){

	
	  $que = "DELETE from proveedor 
	  		  WHERE id_proveedor = ".$this->id_proveedor." " ; 
				  
	   $res = mysql_query($que);

}

}

?>