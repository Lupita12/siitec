<?
require_once("conexion.php");

class traspaso
{
	private $clave_departamento = 0;
	private $clave_requisicion = 0;
	private $clave_meta = '';
	private $clave_partida= 0;
	private $monto = 0;
	private $id_traspaso = 0;
	
	
	
	public function __construct($clave_tras = 0)
	{
				if ($clave_tras == 0)
				{	
						$this->setclave_departamento(0);
						$this->setclave_requisicion(0);
						$this->setclave_meta('');
						$this->setclave_partida(0);
						$this->setmonto(0);
						$this->setid_traspaso(0);
											
				
				}
				else 
		
				{
				
						$cadena_sql = mysql_query("select * from traspasos where clave_departamento=" .$clave_tras. ""); 	
						$num = mysql_num_rows($cadena_sql);
				
						if($num!=0)
						{
								$resu = mysql_fetch_row($cadena_sql);
								
								$this->setclave_departamento($resu[1]);
								$this->setclave_requisicion($clave_tras);
								$this->setclave_meta($resu[2]);
								$this->setclave_partida($resu[3]);
								$this->setmonto($resu[4]);

						
						
						}
				
				}
				
				
				
				
				
	
	}
	
	public function __destruct(){}
	
	//-----------
	
	public function agregar()
	{
	
	
	
	 $que = ("INSERT INTO traspasos (clave_departamento, clave_requisicion, clave_meta, clave_partida, monto) VALUES (".$this->clave_departamento.",".$this->clave_requisicion.",'".$this->clave_meta."',".$this->clave_partida.",".$this->monto.")");	
	    

	   $res = mysql_query($que);
	
	
	
			
	
	}
	
	public function modificar()
	{
	
	
			$Sql="UPDATE traspasos SET clave_departamento=".clave_departamento.", clave_requisicion=".clave_requisicion.", clave_meta='".clave_meta."', clave_partida=".clave_partida.", monto=".monto.""; 
  	 	
		mysql_query($Sql);
					
	
	}
	
	public function eliminar()
	{
		
		
		$que = "DELETE from traspasos 
	  		  WHERE id_traspaso = ".$this->id_traspaso."  " ; 
				  
	   $res = mysql_query($que);
		
		
	
	
	}
	
	
	
	
	
	// -----
	
	public function  getclave_departamento()
	{
		return $this->clave_departamento;
	
	}
	
	public function setclave_departamento($newval)
	{
			$this->clave_departamento = $newval;
	
	}
	
	
	// -----
	
	public function  getclave_requisicion()
	{
		return $this->clave_requisicion;
	
	}
	
	public function setclave_requisicion($newval)
	{
			$this->clave_requisicion = $newval;
	
	}
	
	
	// -----
	
	public function  getclave_meta()
	{
		return $this->clave_meta;
	
	}
	
	public function setclave_meta($newval)
	{
			$this->clave_meta = $newval;
	
	}
	
	
	// -----
	
	public function  getclave_partida()
	{
		return $this->clave_partida;
	
	}
	
	public function setclave_partida($newval)
	{
			$this->clave_partida = $newval;
	
	}
	
	// -----
	
	public function  getmonto()
	{
		return $this->monto;
	
	}
	
	public function setmonto($newval)
	{
			$this->monto = $newval;
	
	}
	
	
	public function  getid_traspaso()
	{
		return $this->id_traspaso;
	
	}
	
	public function setid_traspaso($newval)
	{
			$this->id_traspaso = $newval;
	
	}




}


?>