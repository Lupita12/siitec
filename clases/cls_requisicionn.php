<?
require_once("../conexion.php");


class requisicion
{

	private $folio = 0;
	private $fecha = '';
	private $autorizado = 0;
	private $nombre_del_director ='';
	private $tipo_de_contemplacion = '';
	private $id_traspaso = 0;
	private $id_meta=0;
	private $id_departamento=0;
	private $id_requisicion=0;
	
	
	function __construct($clave = 0)
	{

		if($clave  != 0)
			
			{
			
					$cadena_sql = mysql_query("select * from requisicion where id_requisicion=" .$clave. ""); 	
					$num = mysql_num_rows($cadena_sql);
					
					
					if($num!=0)
					{
							$resu = mysql_fetch_row($cadena_sql);
							
							
							$this->setfolio($resu[0]);
							$this->setfecha($resu[1]);
							$this->setautorizado($resu[2]);
							$this->setnombre_del_director($resu[3]);
							$this->settipo_de_contemplacion($resu[4]);
							$this->setid_traspaso($resu[5]);
							$this->setid_meta($resu[6]);
							$this->setid_departamento($resu[7]);
							$this->setid_requisicion($clave);
							
							
					}
		
		
			}
	
	
	
	}
	
	
	function __destruct()
	{
	
	}
	
	
	
	
	public function eliminar()
	{
	
		
		
		$que = "DELETE from requisicion 
	  		  WHERE id_requisicion = ".$this->id_requisicion."  " ; 
				  
	   $res = mysql_query($que);
		
		
	}


	
	
	//--------------
	public function setfolio($newval)
	{
		$this->folio = $newval;
	}
	
	public function getfolio()
	{
		return $this->folio;
	}

	//--------------
	public function setfecha($newval)
	{
		$this->fecha = $newval;
	}
	
	public function getfecha()
	{
		return $this->fecha;
	}
	
	//--------
	
	public function setautorizado($newval)
	{
		$this->autorizado = $newval;
		
	}
	
	
	public function getautorizado()
	{
		return $this->autorizado;
	}
	
	//--------------
	public function setnombre_del_director($newval)
	{
		$this->nombre_del_director = $newval;
	}
	
	public function getnombre_del_director()
	{
		return $this->nombre_del_director;
	}

	
	//--------------
	public function settipo_de_contemplacion($newval)
	{
		$this->tipo_de_contemplacion = $newval;
	}
	
	public function gettipo_de_contemplacion()
	{
		return $this->tipo_de_contemplacion;
	
	}


	//--------------
	public function setid_traspaso($newval)
	{
		$this->id_traspaso = $newval;
	}
	
	public function getid_traspaso()
	{
		return $this->id_traspaso;
	}

	//--------------
	public function setid_meta($newval)
	{
		$this->id_meta = $newval;
	}
	
	public function getid_meta()
	{
		return $this->id_meta;
	}
	
	
	//--------------
	public function setid_departamento($newval)
	{
		$this->id_departamento = $newval;
	}
	
	public function getid_departamento()
	{
		return $this->id_departamento;
	}
	
	
	
	
	// ---
	public function setid_requisicion($newval)
	
	{
	
		$this->id_requisicion=$newval;
		
	
	}
	
	public function getid_requisicion()
	{
	
		return $this->id_requisicion;
	}
	

}



?>