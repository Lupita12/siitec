<?
require_once("conexion.php"); 

class Procesoclave_Meta 
{
	//private $clave_proceso_clave = 0;
	//private $clave_meta = '';
	private $id_proceso_clave = 0;
	private $id_meta=0;
	private $monto = 0;
	private $periodo = '';
	
	
	public function getid_proceso_clave(){
		return $this->id_proceso_clave;
	}
	
	public function setid_proceso_clave($newval){
		$this->id_proceso_clave = $newval;
	}
	
	public function getid_meta(){
		return $this->id_meta;
	}
	
	public function setid_meta($newval){
		$this->id_meta=$newval;
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


	function __construct($clave_proc_clave = 0,$clave_met='',$period ='')
	{
		if ($period=='')
			{
				$period=date('Y');
				$this->periodo=$period;				
			}
			
		
		
		if($clave_proc_clave != 0 && $clave_met !='' && $period !='')
		{
		
				$id_procesoClave = mysql_query("select id_procesoclave from procesoclave where clave='".$clave_proc_clave."' and periodo='".$period."'");
				$id_demeta = mysql_query("select id_meta from meta where clave='".$clave_met."' and periodo='".$period."'");
				$row = mysql_fetch_array($id_procesoClave);
				$row2 = mysql_fetch_array($id_demeta);
					
				$this->id_proceso_clave=$row[0];
				$this->id_meta=$row2[0];
			

			$cadena_sql = mysql_query("select * from procesoclave_meta where id_procesoclave= ".$this->id_proceso_clave." and id_meta=".$this->id_meta." and periodo='".$period."'");
					
			$num = mysql_num_rows($cadena_sql);
			if($num!=0)
			{
				$resu = mysql_fetch_row($cadena_sql);
					
					$this->periodo=$period;
					
					//mando llamar al metodo para sacar el gasto directo
					
					$que=mysql_query("select Sum(ingreso_propio) from partida_departamento where id_meta = ".$this->id_meta);
					$res = mysql_fetch_row($que);
					if($res[0]!=NULL)
						{
							$this->monto=$res[0];
							 
						}else{
							$this->monto=0;
						}	
		}
	}

}

//Agregar
	public function agregarProcesoclave_meta()
	{

		$que="INSERT INTO procesoclave_meta (id_procesoclave, id_meta, monto, periodo)  VALUES (".$this->id_proceso_clave.",".$this->id_meta.", ".$this->monto.", '".$this->periodo."')";      
   		$res = mysql_query($que); 
		
	}


//Modificar
	public function modificarProcesoclave_meta()
	{
  
		$que="UPDATE procesoclave_meta 
				SET monto =".$this->monto.", periodo ='".$this->periodo."'
				WHERE id_procesoclave=".$this->id_proceso_clave." 
					and id_meta =".$this->id_meta." 
					and periodo='".$this->periodo."' "; 
  	 	
		$res = mysql_query($que);
		  				
	}
	
	public function modificamonto(){
		$que = "UPDATE procesoclave_meta SET monto = ".$this->monto." WHERE id_procesoclave=".$this->id_proceso_clave." and id_meta =".$this->id_meta." and periodo='".$this->periodo."' "; 
		$res = mysql_query($que);
		
	}

//Eliminar
	public function eliminarProcesoclave_meta()
	{

   		$que="DELETE FROM procesoclave_meta  
					WHERE id_procesoclave=".$this->id_proceso_clave." 
					and id_meta ='".$this->id_meta."' 
					and perido='".$this->periodo."' ";    
		
		$res = mysql_query($que);
		    			
	}
}
?>