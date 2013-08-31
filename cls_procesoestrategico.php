<?
include_once("conexion.php");
include_once("cls_procesoclave.php");


class proceso_estrategico 
{

		private $clave = '';
		private $nombre = '';
		private $descripcion = '';
		private $vigencia = '000000';
		private $monto=0;
		private $periodo = '';
		private $id_procesoestrategico = 0;
			
			
			
		private $lst_proceso_clave = array();
	
	
	function __construct($clave_pe = 0,$perio='')
	{
			
			if($perio=='')
			{
				$perio=date('Y');
				$this->periodo=$perio;
			}
		
		
	
		if($clave_pe != 0)
			
			{	
			
				$cadena_sql = mysql_query("select * from procesoestrategico where clave=" .$clave_pe); 	
				$num = mysql_num_rows($cadena_sql);
				
				if($num!=0)
				
				{
					$resu = mysql_fetch_row($cadena_sql);
					
					$this->setclave($clave_pe);
					$this->setnombre($resu[1]);
					$this->setdescripcion($resu[2]);
					$this->setvigencia($resu[3]);
				
					
					$this->periodo =$perio;
					$this->setid_procesoestrategico($resu[6]);
						
					
					//consulta para obtener los procesos clave  que tiene proceso estrategico
				$res=mysql_query("select clave from procesoclave where id_procesoestrategico=".$this->id_procesoestrategico);

				while($proceso_clave = mysql_fetch_array($res))
				{
					$this->lst_proceso_clave[] = new proceso_clave($proceso_clave[0]);
				}	
					
					
					
					
							// consulta para sacar el monto 
							$mon = mysql_query ("select sum(monto) from procesoclave where id_procesoestrategico=".$this->id_procesoestrategico);
							
							$res2=mysql_fetch_row($mon);
							if($res2[0]!=NULL)
						{
							$this->monto=$res2[0];
							 
						}
						else {
							$this->monto=0;
							
							}
							
					
						
					/*	
										
					$cho=mysql_query("select * from procesoetrategico where clave='".$this->clave."' and 
					clave_pe='$clave_pe'");
					$resu = mysql_fetch_row($cho);
					$this->setmonto($resu[0]);
								*/
							
						
				}
				
				
			
			}
			
			
	
	
	
	
	
	}
	
	

	
	
	function __destruct()
	{
	}
	
	
	
	public function agregar()
		{
		
			 $que = ("INSERT INTO procesoestrategico (clave,nombre,descripcion,vigencia,monto,periodo) VALUES ('".$this->clave."','".$this->nombre."','".$this->descripcion."','".$this->vigencia."',".$this->monto.",'".$this->periodo."')");	
	    

	   $res = mysql_query($que);
		
		}
		
		
		
		
		
		
		public function modificar()
	{
		 
		
		
		
		$que = "UPDATE procesoestrategico
	  		  SET clave = '".$this->clave."',
			  	  nombre = '".$this->nombre."',
			  	  descripcion = '".$this->descripcion."',
				  vigencia = '".$this->vigencia."',
				  monto = ".$this->monto.",
				  periodo= '".$this->periodo."' 
				  
				  
				  
				  
WHERE id_procesoestrategico = ".$this->id_procesoestrategico."  " ;	    
	  	$res = mysql_query($que);
		
		
		
		
		
		
	}
		
	
	
	public function eliminar()
	{
		 $que = "DELETE from procesoestrategico 
	  		  WHERE id_procesoestrategico = ".$this->id_procesoestrategico." " ; 
				  
	   $res = mysql_query($que);
	}

	
	
	
	public function modificamonto()
	{
       $que = "update procesoestrategico set monto=".$this->monto. " where id_procesoestrategico=".$this->id_procesoestrategico;  
	   mysql_query($que);
   }
	
	
	
	
	
	//--------------
	public function setclave($newval)
	{
		$this->clave = $newval;
	}
	
	public function getclave()
	{
		return $this->clave;
	}
	
	//--------------
	public function setnombre($newval)
	{
		$this->nombre = $newval;
	}
	
	public function getnombre()
	{
		return $this->nombre;
	}
	
	//--------------
	public function setdescripcion($newval)
	{
		$this->descripcion = $newval;
	}
	
	public function getdescripcion()
	{
		return $this->descripcion;
	}

	
	//--------------
	public function setvigencia($newval)
	{
		$this->vigencia = $newval;
	}
	
	public function getvigencia()
	{
		return $this->vigencia;
	
	}


	//--------------
	public function setmonto($newval)
	{
		$this->monto = $newval;
	}
	
	public function getmonto()
	{
		return $this->monto;
	}
	
	
	//--------------
	public function setperiodo($newval)
	{
		$this->periodo = $newval;
	}
	
	public function getperiodo()
	{
		return $this->periodo;
	}

	public function getlst_proceso_clave(){
		return $this->lst_proceso_clave;
	}
	
	public function setlst_proceso_clave($newval){
		$this->lst_proceso_clave=$newval;
	}

	public function getid_procesoestrategico()
	{
			return $this->id_procesoestrategico;
	}
	
	
	public function setid_procesoestrategico($newval)
	{
	
	 		 $this->id_procesoestrategico = $newval;
	}


	
	
		


} 



?>