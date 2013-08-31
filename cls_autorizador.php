<? 
include ("conexion.php");


class autorizador
{
	
	private $id_encargado=0;
	private $orden=0;
	private $id_departamento = 0;
	
	function _construct()
	{
			
			
			
		if ($clave_encarga != 0)
		
		
		{
				$cadena_sql = mysql_query("select * from autorizador where id_autorizador=" .$clave_encarga. ""); 	
				$num = mysql_num_rows($cadena_sql);
				
				if($num!=0)
				{
					$resu = mysql_fetch_row($cadena_sql);
				
					$this->setid_autorizador($clave_encarga);
					$this->setorden($resu[1]);
					$this->setid_departamento($resu[2]);
		

				
				}
		
		
		}
		
		
		
		
	}
	
	function _destruct(){}
	
	// METODOS___________________________________
	
	
	
	public function agregar()
	{
			 $que = ("INSERT INTO autorizador (id_autorizador, orden, id_departamento) VALUES (".$this->id_autorizador.",".$this->orden.",".$this->id_departamento.")");	
	    

	   $res = mysql_query($que);	
		
	}
	
	public function eliminar()
	{
		
			$que = "DELETE from autorizador 
	  		  WHERE id_autorizador = ".$this->id_autorizador."  " ; 
				  
	   $res = mysql_query($que);	
		
	}
	
	public function modificar()
	{
			 $que = "UPDATE autorizador
			 
	  		 SET id_autorizador = ".$this->id_autorizador.",
			  	 orden='".$this->orden."' ,
				 id_departamento=".$this->id_departamento."
				  			  
				  
			WHERE id_autorizador = ".$this->id_autorizador."  " ;	    
	  		$res = mysql_query($que);
		
		
	}
	
	
	
	//___________________________________________
	
	public function getid_autorizador()
	{
			return $this->id_autorizador;
	}
	
	
	public function setid_autorizador($newval)
	{
	
	 		 $this->id_autorizador = $newval;
	}		

	
	//-----
	public function getorden()
	{
			return $this->orden;
	}
	
	
	public function setorden($newval)
	{
	
	 		 $this->orden = $newval;
	}		

	
	
	//___________________________________________
	
	public function getid_departamento()
	{
			return $this->id_departamento;
	}
	
	
	public function setid_departamento($newval)
	{
	
	 		 $this->id_departamento = $newval;
	}		

	
	
	
	
}



?>