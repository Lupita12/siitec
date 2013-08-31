<?
require_once("conexion.php");
require_once("cls_procesoclave_meta.php");
require_once("cls_meta.php");

class proceso_clave 
{

	private $clave = '';
	private $id_procesoestrategico = 0;
	private $nombre = '';
	private $descripcion ='';
	private $vigencia = '000000';
	private $monto = 0;
	private $periodo='';
	private $ingreso_propio=0;
	private $gasto_directo=0;
	private $gf = 0;
	private $fn = 0;
	private $sf = 0;
	private $ai = 0;
	private $pp= '';
	private $codigo = 0;
	private $id_procesoclave=0;
	
	
	
	private $lst_meta = array();
	
	
	
	function __construct($clave_pc = 0,$perio='')
	{

		if($perio=='')
			{
				$perio=date('Y');
				$this->periodo=$perio;
			}




		if($clave_pc != 0)
			
			{
			
					$cadena_sql = mysql_query("select * from procesoclave where clave=" .$clave_pc. ""); 	
					$num = mysql_num_rows($cadena_sql);
					
					
					if($num!=0)
					{
							$resu = mysql_fetch_row($cadena_sql);
							
							
							$this->setclave($clave_pc);
							$this->setid_procesoestrategico($resu[1]);
							$this->setnombre($resu[2]);
							$this->setdescripcion($resu[3]);
							$this->setvigencia($resu[4]);
							
							$this->periodo =$perio;
							$this->setingreso_propio($resu[7]);
							$this->setgasto_directo($resu[8]);
							
							$this->setgf($resu[9]);
							$this->setfn($resu[10]);
							$this->setsf($resu[11]);
							$this->setai($resu[12]);
							$this->setpp($resu[13]);
							$this->setcodigo($resu[14]);
							
							
							
							$this->setid_procesoclave($resu[15]);
							
								
							
							
							//consulta para obtener las metas   que tiene proceso clave
							
							
							$res = mysql_query("select clave from meta m join procesoclave_meta pcm on m.id_meta = pcm.id_meta  where id_procesoclave = ".$this->id_procesoclave);
							
							
							while($meta = mysql_fetch_array($res))
								{
									$this->lst_meta[] = new Meta($meta[0],$perio);
								
												
								}	
								
								
								
								
								
								
							
							// consulta para sacar el monto 
							$mon = mysql_query ("select sum(monto) from procesoclave_meta where id_procesoclave=".$this->id_procesoclave);
							
							$res2=mysql_fetch_row($mon);
							if($res2[0]!=NULL)
							{
								$this->monto=$res2[0];
							 
							}
							else 
							{
								$this->monto=0;
							
							}
							
				
					}
		
		
			}
	
	
	
	}
	
	
	function __destruct()
	{
	
	}
	
	
	
	
	public function agregar()
		{
		
			 $que = ("INSERT INTO procesoclave (clave, id_procesoestrategico, nombre, descripcion,vigencia, monto, periodo,ingreso_propio,gasto_directo,estructura_p) VALUES ('".$this->clave."',".$this->id_procesoestrategico.",'".$this->nombre."','".$this->descripcion."','".$this->vigencia."',".$this->monto.",'".$this->periodo."',".$this->ingreso_propio.",".$this->gasto_directo.",".$this->gf.",".$this->fn.",".$this->sf.",".$this->ai.",'".$this->pp."',".$this->codigo.")");	
	    

	   $res = mysql_query($que);
		
		}
	
	
	
	
	public function modificar()
	{
		
		
		
		 $que = "UPDATE procesoclave
		 
	  		  SET clave = '".$this->clave."',
			  	  id_procesoestrategico = ".$this->id_procesoestrategico.",
			  	  nombre = '".$this->nombre."',
				  descripcion = '".$this->descripcion."',
				  vigencia = '".$this->vigencia."',
				  monto= ".$this->monto.",  
				   periodo='".$this->periodo."' , 
				    ingreso_propio=".$this->ingreso_propio."  ,
					 gasto_directo=".$this->gasto_directo."  ,
					 gf=".$this->gf.",
					 fn=".$this->fn.",
					 sf=".$this->sf.",
					 ai=".$this->ai.",
					 pp='".$this->pp."',
					 codigo=".$this->codigo."
				  
				  
				  
				  
WHERE id_procesoclave = ".$this->id_procesoclave."  " ;	    
	  	$res = mysql_query($que);
		
		
		
		
	}

	
	
	
	public function eliminar()
	{
	
		
		
		$que = "DELETE from procesoclave 
	  		  WHERE id_procesoclave = ".$this->id_procesoclave."  " ; 
				  
	   $res = mysql_query($que);
		
		
	}


	public function modificamonto(){
       $que = "update procesoclave set monto=".$this->monto. " where id_procesoclave=".$this->id_procesoclave;  
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
	public function setid_procesoestrategico($newval)
	{
		$this->id_procesoestrategico = $newval;
	}
	
	public function getid_procesoestrategico()
	{
		return $this->id_procesoestrategico;
	}
	
	//--------
	
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
	
	
	//--------------
	public function setingreso_propio($newval)
	{
		$this->ingreso_propio = $newval;
	}
	
	public function getingreso_propio()
	{
		return $this->ingreso_propio;
	}
	
	
	
	
	// ---
	public function setgasto_directo($newval)
	
	{
	
		$this->gasto_directo=$newval;
		
	
	}
	
	public function getgasto_directo()
	{
	
		return $this->ingreso_propio;
	}
	
	// --- ESTRUCTURA PROGRAMATICA_______________________________________________
	
	//____________________________
	public function setgf($newval)
	
	{
	
		$this->gf=$newval;
		
	
	}
	
	public function getgf()
	{
	
		return $this->gf;
	}

	//____________________________
	public function setfn($newval)
	
	{
	
		$this->fn=$newval;
		
	
	}
	
	public function getfn()
	{
	
		return $this->fn;
		
	}
	
	
	//____________________________
	public function setsf($newval)
	
	{
	
		$this->sf=$newval;
		
	
	}
	
	public function getsf()
	{
	
		return $this->sf;
	}
	
	
	//____________________________
	public function setai($newval)
	
	{
	
		$this->ai=$newval;
		
	
	}
	
	public function getai()
	{
	
		return $this->ai;
	}
	//____________________________
	public function setpp($newval)
	
	{
	
		$this->pp=$newval;
		
	
	}
	
	public function getpp()
	{
	
		return $this->pp;
	}

	//____________________________
	public function setcodigo($newval)
	
	{
	
		$this->codigo=$newval;
		
	
	}
	
	public function getcodigo()
	{
	
		return $this->codigo;
	}

	//____________________________________________________________________________
	
	public function getlst_meta(){
		return $this->lst_meta;
	}
	
	public function setlst_meta($newval){
		$this->lst_meta=$newval;
	}
	
	public function getid_procesoclave()
	{
			return $this->id_procesoclave;
	}
	
	
	public function setid_procesoclave($newval)
	{
	
	 		 $this->id_procesoclave = $newval;
	}




	
	
	


}



?>