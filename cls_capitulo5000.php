<?
include ("conexion.php");

class capitulo5000 
{

	private $clave_departamento = 0;
	private $clave_meta = '';
	private $clave_partida = 0;
	private $nombre_del_bien= '' ;
	private $denominacion_del_bien= '';
	private $cantidad = 0;
	private $costo_unitario = 0;
	private $costo_total = 0;
	private $justificacion  = '';
	private $id_capitulo5000 = 0;
	
	
	function __construct($clave_cap = 0)
	{
	
		if ($clave_cap != 0)
		
		
		{
				$cadena_sql = mysql_query("select * from capitulo5000 where clave_departamento='" .$clave_cap. "'"); 	
				$num = mysql_num_rows($cadena_sql);
				
				if($num!=0)
				{
					$resu = mysql_fetch_row($cadena_sql);
				
					$this->setclave_departamento($clave_cap);
					$this->setclave_meta($resu[1]);
					$this->setclave_partida($resu[2]);
					$this->setnombre_del_bien($resu[3]);
					$this->setdenominacion_del_bien($resu[4]);
					$this->setcantidad($resu[5]);
					$this->setcosto_unitario($resu[6]);
					$this->setcosto_total($resu[7]);
					$this->setjustificacion($resu[8]);
					$this->setid_capitulo5000($resu[9]);
		

				
				
				}
		
		
		}
	
	
	
	}
	
	function __destruct()
	{}
	
	
	
	// -- 
	
	public function agregar()
		{
		
			 $que = ("INSERT INTO capitulo5000 (clave_departamento, clave_meta, clave_partida, nombre_del_bien, denominacion_del_bien, cantidad, costo_unitario,costo_total,justificacion) VALUES (".$this->clave_departamento.",'".$this->clave_meta."',".$this->clave_partida.",'".$this->nombre_del_bien."','".$this->denominacion_del_bien."',".$this->cantidad.",".$this->costo_unitario.",".$this->costo_total.",'".$this->justificacion."')");	
	    

	   $res = mysql_query($que);
		
		}
	
	
	
	
	// --
	
	public function modificar()
	{
		
		
		
		
		
		 $que = "UPDATE capitulo5000
	  		  SET clave_departamento = ".$this->clave_departamento.",
			  	  clave_meta = '".$this->clave_meta."',
			  	  clave_partida = ".$this->clave_partida.",
				  nombre_del_bien = '".$this->nombre_del_bien."',
				  denominacion_del_bien = '".$this->denominacion_del_bien."',
				  cantidad= ".$this->cantidad.",  
				   costo_unitario=".$this->costo_unitario." , 
				    costo_total=".$this->costo_total."  ,
					 justificacion='".$this->justificacion."'  
				  
				  
				  
				  
WHERE id_capitulo5000 = ".$this->id_capitulo5000."  " ;	    
	  	$res = mysql_query($que);
		
		
		
		
		
	}
	
	
	// ___ 
	
	public function eliminar()
	{
		$que = "DELETE from capitulo5000 
	  		  WHERE id_capitulo5000 = ".$this->id_capitulo5000."  " ; 
				  
	   $res = mysql_query($que);
	}
	
	
	
	
	
	//-------
	
	function consultar($depa3)
	{
  
  
     $query = "select * from capitulo5000 where clave_departamento =".$this->clave_departamento."   order by id_capitulo5000";
	 $result = mysql_query($query);
	 
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
	
	
	
	//inserta un nuevo registro en la base de datos
 function crear($nom,$dep,$suel)
 {
  
   
   		
    		 $query = "INSERT INTO empleados (nombres, departamento, sueldo) 
						 VALUES ('$nom','$dep',$suel)";
   			  $result = mysql_query($query);
   		if (!$result)
		   return false;
        else
           return true;
  		 
 }
	
	
	
	
	//-----
	public function getclave_departamento()
	{
			return $this->clave_departamento;
	}
	
	
	public function setclave_departamento($newval)
	{
	
	 		 $this->clave_departamento = $newval;
	}		


	//-----
	public function getclave_meta()
	{
			return $this->clave_meta;
	}
	
	
	public function setclave_meta($newval)
	{
	
	 		 $this->clave_meta = $newval;
	}		

	//-----
	public function getclave_partida()
	{
			return $this->clave_partida;
	}
	
	
	public function setclave_partida($newval)
	{
	
	 		 $this->clave_partida = $newval;
	}		


	//-----
	public function getnombre_del_bien()
	{
			return $this->nombre_del_bien;
	}
	
	
	public function setnombre_del_bien($newval)
	{
	
	 		 $this->nombre_del_bien = $newval;
	}		
	
	
	
	//-----
	public function getdenominacion_del_bien()
	{
			return $this->denominacion_del_bien;
	}
	
	
	public function setdenominacion_del_bien($newval)
	{
	
	 		 $this->denominacion_del_bien = $newval;
	}		


	
	//-----
	public function getcantidad()
	{
			return $this->cantidad;
	}
	
	
	public function setcantidad($newval)
	{
	
	 		 $this->cantidad = $newval;
	}		


	//-----
	public function getcosto_unitario()
	{
			return $this->costo_unitario;
	}
	
	
	public function setcosto_unitario($newval)
	{
	
	 		 $this->costo_unitario = $newval;
	}
	
	
	
	//-----
	public function getcosto_total()
	{
			return $this->costo_total;
	}
	
	
	public function setcosto_total($newval)
	{
	
	 		 $this->costo_total = $newval;
	}


	//-----
	public function getjustificacion()
	{
			return $this->justificacion;
	}
	
	
	public function setjustificacion($newval)
	{
	
	 		 $this->justificacion = $newval;
	}


	public function getid_capitulo5000()
	{
			return $this->id_capitulo5000;
	}
	
	
	public function setid_capitulo5000($newval)
	{
	
	 		 $this->id_capitulo5000 = $newval;
	}








}



?>